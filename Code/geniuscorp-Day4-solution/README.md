# Day 4 - E-E-A-T, llms.txt, Deployment & Measurement (โค้ดเฉลย = Day3 + ทั้งหมดนี้)

## สิ่งที่เพิ่มจาก Day 3

**Laravel**
- `SitemapController` + route `GET /api/v1/sitemap-entries`
- migration `content_updated_at` + `Article::booted()` (อัปเดตเฉพาะเมื่อเนื้อหาเปลี่ยน) + `ArticleResource.updated_at` ใช้ค่านี้
- `config/geo.php`, `app/Observers/ContentObserver.php`, `app/Jobs/TriggerRebuild.php`, `AppServiceProvider` observe 5 models
- `.env.example` เพิ่ม `REBUILD_*` (ต้องรัน `php artisan queue:work` เมื่อเปิดใช้)

```bash
php artisan migrate            # เพิ่มคอลัมน์ content_updated_at
php artisan queue:table && php artisan migrate   # ถ้ายังไม่มีตาราง jobs
```

**Astro**
- `src/components/AuthorBox.astro` (ใช้ใน `blog/[slug].astro`)
- `src/pages/sitemap.xml.ts`, `src/pages/llms.txt.ts`, `src/pages/404.astro`, `public/robots.txt`
- `astro.config.mjs` เพิ่ม `image.domains`
- `deploy/deploy.sh` (atomic release), `deploy/apache/{.htaccess,geniuscorp-web.conf,geniuscorp-api.conf}`, `deploy/nginx/geniuscorp-web.conf`
- `deploy/webhook-server.mjs` + `deploy/geo-webhook.service` (ตัวเลือก B) และ `.github/workflows/deploy.yml` (ตัวเลือก A)
- `scripts/indexnow.mjs`, `scripts/geo-crawler-report.sh`

**WordPress**
- `inc/geo-eeat.php` (ACF user fields, Author Box hook, Block Pattern), `template-parts/author-box.php`
- `inc/geo-llms.php` (`/llms.txt` + transient + sitemap lastmod filter) → หลังเพิ่มต้อง Settings → Permalinks → Save
- `wp-config-production.snippet.php`, `demo-site/fix-lastmod-after-import.sql`

## Deploy (สรุป)

```bash
# บนเซิร์ฟเวอร์ครั้งเดียว: ดู Day4_note.md Module 5.2-5.5
# จากเครื่อง build:
DEPLOY_SERVER=deploy@www.example.com ./deploy/deploy.sh
```

GitHub Secrets ที่ workflow ใช้: `API_URL`, `API_TOKEN`, `DEPLOY_SSH_KEY`, `DEPLOY_HOST`, (`INDEXNOW_KEY`)

## ทดสอบ

```bash
npm run build      # ✓ GEO check + dist/sitemap.xml + dist/llms.txt + dist/404.html
```
