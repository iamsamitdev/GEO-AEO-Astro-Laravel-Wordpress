# Deployment: ขั้นตอนขึ้น Production ทั้ง 3 ระบบ (Astro + Laravel API + WordPress)

> เอกสารสรุปสั้นสำหรับใช้คู่กับ `Day4_note.md` Module 4-5 (รายละเอียดเต็มและโค้ดทุกไฟล์) และโค้ดเฉลย `Code/Day4/geniuscorp-web/deploy/`
> สมมติฐาน: Ubuntu 24.04, Apache 2.4 (หรือ Nginx 1.24), PHP-FPM 8.3, MariaDB 10.11, โดเมน `geniuscorp.example`

---

## ภาพรวม: 3 ระบบ 3 วิธี

| ระบบ | โดเมน | ลักษณะการ Deploy | ต้องการอะไรบนเซิร์ฟเวอร์ |
| --- | --- | --- | --- |
| **Astro (เว็บหลัก)** | `www.geniuscorp.example` | Build ที่เครื่องอื่น แล้ว rsync ไฟล์ static ไปวาง | ไม่ต้องมี Node.js เลย มีแค่ web server |
| **Laravel API** | `api.geniuscorp.example` | git clone + composer + migrate | PHP-FPM + MariaDB + queue worker |
| **WordPress** | `www.geniuscorp-wp.example` | ย้ายทั้งเว็บด้วย All-in-One WP Migration (.wpress) | PHP-FPM + MariaDB |

จุดสำคัญ: **เครื่องที่รัน `astro build` ต้องเข้าถึง API ได้ แต่ไม่จำเป็นต้องเป็นเครื่องที่เสิร์ฟเว็บ** จะเป็นเครื่องพัฒนาของอาจารย์เอง, GitHub Actions runner หรือ VM เล็ก ๆ อีกตัวก็ได้

```
เครื่อง build                         เซิร์ฟเวอร์ production
npm run build ──▶ dist/  ──rsync──▶  /var/www/geniuscorp-web-releases/release-YYYYmmdd-HHMMSS/
     ▲                                        │ ln -sfn
     │ ดึงข้อมูล                               ▼
     └──────────── API ◀──────────  /var/www/geniuscorp-web-current  ← DocumentRoot
```

---

## A. เตรียมเซิร์ฟเวอร์ (ทำครั้งเดียว ประมาณ 30 นาที)

1. ชี้ DNS A record ของ `www`, `@`, `api` มาที่ IP เซิร์ฟเวอร์ (ต้องทำก่อนขอใบรับรอง HTTPS)
2. ติดตั้งแพ็กเกจและเปิดโมดูล

   ```bash
   sudo apt update && sudo apt install -y apache2 php8.3-fpm \
     php8.3-{mysql,mbstring,xml,curl,zip,gd,intl,bcmath} \
     mariadb-server certbot python3-certbot-apache rsync unzip
   sudo a2enmod rewrite headers expires deflate brotli proxy_fcgi setenvif ssl
   sudo a2enconf php8.3-fpm && sudo systemctl restart apache2
   ```

3. สร้างผู้ใช้ `deploy` (ห้าม deploy ด้วย root) และโฟลเดอร์เว็บ

   ```bash
   sudo adduser --disabled-password deploy
   sudo usermod -aG www-data deploy
   sudo mkdir -p /var/www/{geniuscorp-web,geniuscorp-api,geniuscorp-wp}
   sudo chown -R deploy:www-data /var/www
   ```

4. ใส่ SSH public key ของเครื่อง build ไว้ใน `/home/deploy/.ssh/authorized_keys` แล้วทดสอบ `ssh deploy@www.geniuscorp.example` ต้องเข้าได้โดยไม่ถามรหัสผ่าน
5. `sudo mysql_secure_installation` แล้วสร้างฐานข้อมูล + ผู้ใช้แยกกันสำหรับ Laravel และ WordPress

---

## B. Deploy เว็บ Astro (static)

### B1. ตั้ง Virtual Host และ HTTPS

6. คัดลอก `Code/Day4/geniuscorp-web/deploy/apache/geniuscorp-web.conf` ไป `/etc/apache2/sites-available/` (สาย Nginx ใช้ `deploy/nginx/geniuscorp-web.conf`) แล้วแก้ชื่อโดเมน
7. ชี้ `DocumentRoot` ไปที่ `/var/www/geniuscorp-web-current` (symlink) ไม่ใช่โฟลเดอร์จริง เพื่อให้ atomic deploy และ rollback ทำงาน และต้องมี `Options +FollowSymLinks`
8. เปิดเว็บไซต์และออกใบรับรอง

   ```bash
   sudo a2ensite geniuscorp-web && sudo systemctl reload apache2
   sudo certbot --apache -d www.geniuscorp.example -d geniuscorp.example
   ```

9. ตรวจ redirect ว่าไม่เกิน 2 hop ถึงปลายทาง (redirect chain ยาวทำให้ crawler บางตัวหยุดตาม)

   ```bash
   curl -sIL http://geniuscorp.example/about | grep -iE "^(HTTP|location)"
   ```

   ควรได้ `http://geniuscorp.example/about` → `https://www.geniuscorp.example/about` → `https://www.geniuscorp.example/about/` (200)

### B2. Deploy ครั้งแรกและครั้งต่อ ๆ ไป

10. บนเครื่อง build ตั้งค่า `.env` ของ Astro ให้ชี้ API production (`API_URL`, `API_TOKEN` จาก `php artisan geo:issue-build-token`)
11. รัน `./deploy/deploy.sh` ซึ่งทำ 4 ขั้นในคำสั่งเดียว

    | ขั้น | ทำอะไร | ถ้าไม่ผ่าน |
    | --- | --- | --- |
    | 1 | `npm ci` แล้ว `npm run build` (รวม `check-geo.mjs`) | **หยุดทันที ไม่ deploy** เว็บเดิมยังอยู่ |
    | 2 | ตรวจว่ามี `index.html`, `sitemap.xml`, `llms.txt`, `robots.txt`, `404.html` ใน `dist/` แล้วคัดลอก `.htaccess` เข้าไป | หยุด |
    | 3 | rsync เข้าโฟลเดอร์ `release-YYYYmmdd-HHMMSS` ใหม่ แล้ว `ln -sfn` สลับ symlink และลบ release เก่าเหลือ 3 ชุด | - |
    | 4 | curl ตรวจ home, sitemap.xml, llms.txt พร้อมวัด TTFB | แจ้งเตือนให้ rollback |

12. **Rollback** เมื่อมีปัญหา: `ssh deploy@... "ln -sfn /var/www/geniuscorp-web-releases/<release-ก่อนหน้า> /var/www/geniuscorp-web-current"` ใช้เวลาไม่ถึงวินาที

> `.htaccess` ที่คัดลอกไปคือไฟล์ `deploy/apache/.htaccess` ซึ่งทำ 3 เรื่อง: บีบอัด brotli/deflate, cache 1 ปีสำหรับ asset (10 นาทีสำหรับ HTML) และ redirect `/about` → `/about/` ให้ตรง canonical

---

## C. Deploy Laravel API

13. Clone และติดตั้ง

    ```bash
    cd /var/www/geniuscorp-api
    git clone git@github.com:geniuscorp/geniuscorp-api.git .
    composer install --no-dev --optimize-autoloader
    cp .env.example .env && nano .env
    # APP_ENV=production, APP_DEBUG=false, APP_URL=https://api..., DB_*, REBUILD_*
    php artisan key:generate
    php artisan migrate --force
    php artisan db:seed --force          # ครั้งแรกเท่านั้น
    php artisan geo:issue-build-token    # เก็บ token ไปใส่เครื่อง build / GitHub Secrets
    php artisan config:cache && php artisan route:cache && php artisan view:cache
    ```

14. ตั้งสิทธิ์ไฟล์: โค้ดอ่านอย่างเดียว (dir 750, file 640), `storage/` และ `bootstrap/cache/` ให้ www-data เขียนได้ (770), `.env` สิทธิ์ 640
15. Virtual Host ชี้ `DocumentRoot` ไปที่ `/var/www/geniuscorp-api/**public**` เท่านั้น, ส่ง `.php` เข้า PHP-FPM socket และใส่ `X-Robots-Tag: noindex, nofollow` (API ไม่ควรถูก index) แล้ว certbot ออกใบรับรองให้ `api.geniuscorp.example`
16. ตั้ง queue worker ด้วย systemd (จำเป็นถ้าใช้ระบบ rebuild อัตโนมัติในข้อ E)

    ```bash
    php artisan queue:table && php artisan migrate --force
    # systemd service: ExecStart=/usr/bin/php /var/www/geniuscorp-api/artisan queue:work --tries=3
    ```

17. ตรวจ: `curl https://api.geniuscorp.example/api/health` ได้ `{"ok":true}` และเรียก `/api/v1/services` ด้วย Bearer token ได้ข้อมูลจริง

---

## D. Deploy WordPress

18. **Backup ก่อนเสมอ**: Export `.wpress` จากเว็บในเครื่องที่ Retrofit เสร็จแล้ว (All-in-One WP Migration) และเก็บ SQL dump แยกอีกชุด
19. ติดตั้ง WordPress เปล่าบน production → ติดตั้ง All-in-One WP Migration → Import ไฟล์ `.wpress` → ล็อกอินด้วยบัญชีของเว็บในเครื่อง → Settings → Permalinks → Save
20. แก้ `wp-config.php` บน production

    ```php
    define('DISALLOW_FILE_EDIT', true);   // ปิดแก้ไฟล์ theme/plugin จากหน้า Admin
    define('FORCE_SSL_ADMIN', true);
    define('WP_DEBUG', false);
    define('DISABLE_WP_CRON', true);      // ใช้ crontab จริงแทน (ข้อ 23)
    define('WP_MEMORY_LIMIT', '256M');
    ```

    พร้อมเปลี่ยน salt ใหม่จาก `api.wordpress.org/secret-key/1.1/salt/`

21. สิทธิ์ไฟล์: โฟลเดอร์ 755, ไฟล์ 644, `wp-config.php` 640, `wp-content/uploads` เขียนได้โดย www-data และ **ห้าม 777 เด็ดขาด**
22. ความปลอดภัย: XML-RPC ปิดแล้วจาก Child Theme, ปิด user enumeration `/?author=1`, จำกัด login attempts, Deactivate **Query Monitor** บน production
23. Cron จริงแทน WP-Cron: `*/10 * * * * curl -s https://www.geniuscorp-wp.example/wp-cron.php > /dev/null`
24. certbot ออกใบรับรอง → Settings → General ตั้ง WordPress Address และ Site Address เป็น `https://www...` → เปิด LiteSpeed/WP Rocket แล้ว Purge All
25. ตั้ง backup อัตโนมัติรายวัน (UpdraftPlus หรือ mysqldump + rsync ไปเครื่องอื่น)

---

## E. ระบบ Rebuild อัตโนมัติ (แก้จุดอ่อนของ SSG)

ปัญหา: ทีมแก้บทความใน Admin แล้วเว็บ static ยังเป็นของเก่าจนกว่าจะมีคน build
วิธีแก้: Laravel ยิง webhook ทุกครั้งที่เนื้อหาเปลี่ยน แล้วให้ฝั่งรับ build และ deploy ให้เอง

```
Admin แก้ Article/Service/FAQ
  └▶ ContentObserver (saved/deleted)
       └▶ TriggerRebuild job (debounce 2 นาที = แก้ 5 บทความติดกัน build ครั้งเดียว)
            ├▶ ตัวเลือก A: GitHub Actions (repository_dispatch)
            └▶ ตัวเลือก B: webhook receiver ของเราเอง (Node + HMAC) → รัน deploy.sh
```

26. ฝั่งส่ง (Laravel): เปิดใน `.env` → `REBUILD_ENABLED=true`, `REBUILD_DRIVER=github` หรือ `webhook`, ใส่ token/secret ให้ครบ และต้องมี queue worker รันอยู่ (ถ้าไม่อยากมี worker ให้ใช้ `QUEUE_CONNECTION=sync` แล้วตัด delay ออก)
27. **ตัวเลือก A - GitHub Actions** (เหมาะกับทีมที่โค้ดอยู่บน GitHub แล้ว): ใช้ `.github/workflows/deploy.yml` ที่ trigger จาก push, `repository_dispatch`, cron รายวันกันเหนียว และกดเองได้ · ตั้ง Secrets: `API_URL`, `API_TOKEN`, `DEPLOY_SSH_KEY`, `DEPLOY_HOST`
28. **ตัวเลือก B - Webhook receiver ในองค์กร**: รัน `deploy/webhook-server.mjs` เป็น systemd service (`geo-webhook.service`) บนเครื่อง build, ตรวจลายเซ็น HMAC ด้วย `REBUILD_WEBHOOK_SECRET` ค่าเดียวกับฝั่ง Laravel, เปิดผ่าน reverse proxy + HTTPS
29. ทดสอบ: แก้ข้อมูลบริการหนึ่งรายการ → ดู log Laravel ขึ้น `Rebuild triggered` → ภายใน 3 นาทีเปิดหน้านั้นบน production เห็นข้อความใหม่ และ `sitemap.xml` มี `lastmod` ใหม่

---

## F. หลัง Deploy: ทำให้ AI และ Search Engine รู้จัก

30. Google Search Console: Add property แบบ Domain ยืนยันด้วย DNS TXT → Sitemaps submit `https://www.geniuscorp.example/sitemap.xml` (WordPress ใช้ `sitemap_index.xml`)
31. Bing Webmaster Tools: เพิ่มเว็บและ submit sitemap (สำคัญเพราะ ChatGPT Search และ Copilot ใช้ดัชนีของ Bing)
32. IndexNow: รัน `node scripts/indexnow.mjs` หลัง deploy เพื่อแจ้ง URL ที่เปลี่ยน
33. ตรวจ Server Log หา AI crawlers ด้วย `scripts/geo-crawler-report.sh` (นับ GPTBot, OAI-SearchBot, ClaudeBot, Claude-SearchBot, PerplexityBot, Google-Extended) ทำเดือนละครั้งแล้วบันทึกไว้เทียบ
34. ทดสอบถาม AI ด้วยคำถามจริงของลูกค้าเดือนละครั้ง แล้วจดว่าถูกอ้างอิงหรือไม่

---

## ตรวจจบ Production

```bash
curl -sIL http://geniuscorp.example/about | grep -iE "^(HTTP|location)"   # redirect ไม่เกิน 2 hop
curl -sI https://www.geniuscorp.example/ | grep -i "content-encoding"     # br หรือ gzip
curl -s https://www.geniuscorp.example/sitemap.xml | head -5              # มี <urlset และ lastmod จริง
curl -s https://www.geniuscorp.example/llms.txt | head -3                 # ขึ้นต้นด้วย "# "
curl -s https://www.geniuscorp.example/robots.txt                         # ไม่ Disallow AI crawlers + มี Sitemap:
curl -sI https://api.geniuscorp.example/api/health | grep -i x-robots-tag # noindex
curl -sI https://www.geniuscorp.example/ | grep -i strict-transport       # HSTS (ถ้าเปิด)
```

เปิด `view-source:` หน้าบริการบน production แล้วตรวจซ้ำว่า H1 เดียว, JSON-LD ชุดเดียว, canonical เป็น `https://www...` ตรงกับ `site` ใน `astro.config.mjs`

---

## H. ทางเลือกฟรีสำหรับคอร์ส: Render (Astro + Laravel) และ WordPress ในเครื่อง

เส้นทาง A-G ข้างบนคือ production จริงบน VPS ส่วนหัวข้อนี้คือเส้นทางที่ใช้ในคลาส ซึ่งไม่มีค่าใช้จ่าย

| ระบบ | ที่อยู่ | เหตุผล |
| --- | --- | --- |
| Astro | Render **Static Site** (ฟรี) | ไม่หลับ วัด TTFB ได้จริง crawler เข้าถึงตลอด |
| Laravel API | Render **Web Service** (ฟรี) + Docker + **SQLite** | แผนฟรีไม่มี MySQL และ API เราเป็นงานอ่านอย่างเดียว |
| WordPress | **ในเครื่อง (Laragon) เท่านั้น** | แผนฟรีไม่มี persistent disk และไม่มี MySQL รูป/plugin/ฐานข้อมูลจะหายทุกครั้งที่ container เกิดใหม่ |

### ข้อจำกัดของแผนฟรีและวิธีรับมือ

| ข้อจำกัด | ผลกระทบ | วิธีรับมือในโค้ดเฉลย |
| --- | --- | --- |
| หลับหลังไม่มี traffic 15 นาที ตื่นราว 1 นาที | Astro build ยิง fetch แล้ว timeout | `scripts/wait-for-api.sh` ปลุกก่อน build (เรียกใน `deploy.sh` และ workflow) |
| Filesystem ephemeral | ไฟล์ SQLite หายทุก deploy/restart | `docker-entrypoint.sh` รัน `migrate` + `db:seed` ทุกครั้งที่บูต (`SEED_ON_BOOT=true`) |
| ไม่มี Shell / one-off jobs | รัน artisan จาก Dashboard ไม่ได้ | ทุกคำสั่งอยู่ใน entrypoint |
| Sanctum token อยู่ใน DB ที่รีเซ็ต | Astro ถือ token เก่า build ได้ 401 | `php artisan geo:issue-build-token --token=$BUILD_TOKEN` ออก token ค่าเดิมซ้ำทุกครั้ง |
| ไม่มี Background Worker / Cron | queue worker รันไม่ได้ | `QUEUE_CONNECTION=sync` และ `ContentObserver` ยิง rebuild ทันทีเมื่อเจอ sync |
| ขณะหลับตอบ `/robots.txt` เป็น `Disallow: /` | AI crawler เข้าใจว่าห้าม crawl | เว็บหลักต้องเป็น **Static Site** ไม่ใช่ Web Service ส่วน API เราใส่ `noindex` อยู่แล้ว |

### ขั้นตอน

35. เตรียม repo Laravel ให้มี `Dockerfile`, `docker-entrypoint.sh`, `render.yaml` (มีใน `Code/Day4/geniuscorp-api/`) และ `composer.json` / `composer.lock` ของโปรเจกต์จริง
36. สุ่มค่า token หนึ่งค่าใช้ร่วมกันสองฝั่ง: `openssl rand -hex 24`
37. Render → New → **Blueprint** → เลือก repo ของ API → กรอก `APP_KEY` (จาก `php artisan key:generate --show`) และ `BUILD_TOKEN` → Deploy
38. ตรวจ `curl https://<api>.onrender.com/api/health` ต้องได้ `{"ok":true}` (ครั้งแรกอาจรอ 1 นาที)
39. Render → New → **Static Site** → เลือก repo ของ Astro → Build Command `npm ci && bash scripts/wait-for-api.sh && npm run build`, Publish Directory `dist` → ตั้ง `API_URL`, `API_TOKEN` (ค่าเดียวกับ `BUILD_TOKEN`), `SITE`
40. เปิดเว็บที่ได้แล้วตรวจด้วยชุดคำสั่งในหัวข้อ "ตรวจจบ Production" ยกเว้นข้อ TTFB ที่ยังไม่มีความหมายบนแผนฟรี
41. WordPress ทำในเครื่องตาม `WordPress_GEO_Retrofit_Steps.md` และใช้ `/llms.txt` กับ `robots.txt` ของเว็บในเครื่องเพื่อสาธิตเท่านั้น

> ⚠️ ห้ามใช้เส้นทางนี้กับเว็บลูกค้าจริง: cold start ทำให้ข้อ 18 ไม่ผ่าน ฐานข้อมูลรีเซ็ตทุกครั้งทำให้แก้ข้อมูลผ่าน Admin แล้วหาย และ Free Postgres ของ Render เองก็หมดอายุ 30 วันหลังสร้าง

---

## ไฟล์ที่เกี่ยวข้องในโค้ดเฉลย

```
Code/Day4/geniuscorp-web/
├── deploy/
│   ├── deploy.sh                      ← build → check → rsync atomic release
│   ├── apache/.htaccess               ← compression, cache, trailing slash
│   ├── apache/geniuscorp-web.conf     ← vhost เว็บหลัก + HTTPS + 301
│   ├── apache/geniuscorp-api.conf     ← vhost API + PHP-FPM + noindex
│   ├── nginx/geniuscorp-web.conf      ← สาย Nginx
│   ├── webhook-server.mjs             ← ตัวเลือก B: รับ webhook + HMAC
│   └── geo-webhook.service            ← systemd unit ของ webhook-server
├── .github/workflows/deploy.yml       ← ตัวเลือก A: GitHub Actions
├── render.yaml                        ← Blueprint ของ Static Site บน Render
└── scripts/
    ├── check-geo.mjs                  ← ด่านกั้นก่อน deploy
    ├── wait-for-api.sh                ← ปลุก API ที่หลับอยู่ก่อน build (PaaS แผนฟรี)
    ├── indexnow.mjs                   ← แจ้ง URL ใหม่
    └── geo-crawler-report.sh          ← นับ AI crawlers จาก access log

Code/Day4/geniuscorp-api/
├── Dockerfile                         ← image สำหรับ Render (php-cli + artisan serve)
├── docker-entrypoint.sh               ← migrate + seed + ออก build token ทุกครั้งที่บูต
└── render.yaml                        ← Blueprint ของ Web Service (SQLite, queue=sync)

Code/Day4/geniuscorp-wp/
├── wp-config-production.snippet.php   ← ค่าที่ต้องเพิ่มบน production
└── demo-site/fix-lastmod-after-import.sql
```

---

## แหล่งอ้างอิง

- Astro deploy static: https://docs.astro.build/en/guides/deploy/
- Laravel deployment: https://laravel.com/docs/deployment
- Certbot (Let's Encrypt): https://certbot.eff.org/
- WordPress hardening: https://developer.wordpress.org/advanced-administration/security/hardening/
- GitHub Actions `repository_dispatch`: https://docs.github.com/en/actions/using-workflows/events-that-trigger-workflows#repository_dispatch
- IndexNow: https://www.indexnow.org/
- Render Deploy for Free (ข้อจำกัดของแผนฟรี): https://render.com/docs/free
- Render Laravel + Docker: https://render.com/docs/deploy-php-laravel-docker
- Bing Webmaster Tools: https://www.bing.com/webmasters
