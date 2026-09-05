# Recap ฉบับคนมีเวลาจำกัด - ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (4 วัน)

**หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ GEO/AEO Full Stack Modern Web** | 4 วัน × 3 ชั่วโมง (5-6 และ 12-13 กันยายน 2569, 20:30-23:30 น.)
ผู้สอน: อ.สามิตร โกยม | เอกสารฉบับนี้สรุปแก่นของ Day1_note.md ถึง Day4_note.md ให้อ่านจบใน **30-45 นาที** และมีเส้นทางอ่าน 10 นาทีสำหรับคนที่รีบมาก

---

## ⏱️ เลือกเส้นทางอ่านตามเวลาที่มี

| มีเวลา       | อ่านส่วน                                                        | จะได้อะไร                                                                 |
| ------------ | --------------------------------------------------------------- | ------------------------------------------------------------------------- |
| **10 นาที**  | ส่วนที่ 1 (แก่น 12 ข้อ) + ส่วนที่ 7 (Checklist ย่อ)                | เข้าใจว่า GEO คืออะไร และต้องทำอะไรกับเว็บของตัวเอง                          |
| **30 นาที**  | + ส่วนที่ 2-5 (สรุปรายวัน)                                        | เห็นภาพระบบทั้งหมดและโค้ดชิ้นสำคัญ                                           |
| **45 นาที**  | + ส่วนที่ 6 (โค้ดที่ต้องจำ) + ส่วนที่ 8 (ตัดสินใจเชิงสถาปัตยกรรม)   | พร้อมเปิด Note รายวันไปทำจริง                                                |
| **มีเวลาเต็ม** | Day1_note.md → Day4_note.md ตามลำดับ (รวม ~7,700 บรรทัด มีโค้ดครบทุกไฟล์) | ทำ Workshop ได้ครบทั้ง GeniusCorp Modern และ GeniusCorp WP                  |

> กติกาของเอกสารทั้งชุด: โค้ด **TypeScript/JavaScript ไม่ใส่ semicolon** ส่วน **PHP ใส่ตามปกติ** · เวอร์ชัน: Laravel 13, Astro 6, PHP 8.3+, Node.js 22.12+ (เลขคู่), MySQL 8 / MariaDB 10.6+

---

## ส่วนที่ 1 - แก่นของทั้งคอร์สใน 12 ข้อ

1. **ผู้ใช้ปี 2026 "ถาม AI" แทน "ค้น Google"** (ChatGPT Search, Perplexity, Claude, Gemini/AI Overviews, Copilot) และ AI จะพูดถึงเฉพาะเว็บที่มัน **อ่านเข้าใจ เชื่อถือ และเลือกอ้างอิง (cite)** อันดับไม่ใช่รางวัลอีกต่อไป การถูกอ้างอิงต่างหาก
2. **SEO = ให้เจอ · AEO = ให้ถูกดึงไปตอบ · GEO = ให้ถูกเชื่อและอ้างอิง · AIO (AI Optimization) = คำร่มที่ครอบทั้งหมด ให้ AI ทุกประเภท (search, chatbot, agent) เข้าถึงและใช้เว็บเราได้** ทั้งสี่ซ้อนกัน และ Technical SEO ที่ถูกต้องคือพื้นฐานของทุกชั้น ไม่ใช่สิ่งที่ต้องทิ้ง
3. **AI crawlers ส่วนใหญ่ไม่รัน JavaScript** สิ่งที่อยู่ใน HTML ตอนเซิร์ฟเวอร์ตอบคือทั้งหมดที่ AI เห็น → SPA ล้วนคือสถาปัตยกรรมที่แย่ที่สุด, SSG (Astro) ดีที่สุด, WordPress (PHP SSR) ยังดีถ้าไม่ถูก Theme/Plugin ทำพัง
4. **แต่ละค่ายมี bot หลายตัวหน้าที่ต่างกัน** (`GPTBot` = ฝึกโมเดล, `OAI-SearchBot` = ChatGPT Search, `ClaudeBot`/`Claude-SearchBot`, `PerplexityBot`, `Google-Extended`) บล็อกผิดตัว = หายจาก AI Search ทั้งที่ตั้งใจแค่ไม่ให้ฝึก
5. **งานวิจัย GEO ของ Princeton (arXiv:2311.09735)**: ใส่ **สถิติ/ตัวเลข**, **แหล่งอ้างอิง**, **คำพูดผู้เชี่ยวชาญ** เพิ่มโอกาสถูกอ้างอิง ~30-40% ส่วน keyword stuffing ไม่ช่วยหรือลดลง
6. **ฐานข้อมูลคือแหล่งความจริงของสัญญาณ GEO**: ตารางต้องมี `slug`, `published_at`, `updated_at` (ที่จริง), `author_id`, ฟิลด์ตัวเลข (`price_from`, `duration_days`) เพราะมันกลายเป็น `datePublished`, `dateModified`, `author`, `Offer.price`, `lastmod`
7. **Metadata ที่ถูกต้อง**: Title ~50-60 ตัวอักษร ไม่ซ้ำ ไม่ยัด keyword, Description ~150-160 จากเนื้อหาจริง (excerpt ใน DB), ไม่มี meta keywords, OG ครบ (บทความมี `article:published_time`), Canonical absolute ตัด query ทุกหน้า, H1 เดียว/H2 หัวข้อหลัก/การ์ดใช้ H3
8. **JSON-LD คือหัวใจของ GEO**: `Organization/LocalBusiness`, `WebSite`, `WebPage`, `Service+Offer`, `Article`, `Person`, `BreadcrumbList`, `FAQPage` ใน `@graph` เดียว เชื่อมกันด้วย `@id` และ **ประกอบจากข้อมูลจริงด้วยโค้ด** (schema.ts / geo-schema.php) ไม่ใช่พิมพ์มือ → HTML กับ Schema ตรงกันเสมอ
9. **FAQ แบบ answer-ready**: คำถามอย่างที่คนถาม AI จริง (เหมาะกับใคร/เท่าไร/กี่วัน/มี X ไหม), คำตอบ 2-4 ประโยค ประโยคแรกตอบตรง มีตัวเลข, เก็บใน DB/ACF แล้วแตกเป็นทั้ง HTML (`<details>`) และ FAQPage Schema
10. **E-E-A-T ที่เครื่องอ่านได้**: Author Box (ชื่อ ตำแหน่ง bio รูป sameAs) เชื่อม `Person` Schema, `<time datetime="ISO ค.ศ.">` และ "แก้ไขล่าสุด" เฉพาะเมื่อแก้จริง, หน้า Contact ตรงกับ `LocalBusiness`
11. **Sitemap ที่ lastmod จริง + robots.txt ที่เปิด AI + llms.txt** generate จากข้อมูลเดียวกัน (Astro: static endpoint จาก `/sitemap-entries`; WP: Rank Math + PHP route) และ **Validate ทุกครั้งก่อน deploy** (validator.schema.org, Rich Results Test, `check-geo.mjs`)
12. **Deploy แล้วต้องยังจริงอยู่เดือนหน้า**: Astro static บน Apache/Nginx ไม่ต้องมี Node.js + Webhook Rebuild เมื่อ DB เปลี่ยน, WP มี cache auto-purge, และวัดผล 3 ชั้น: Server Log (crawler มาจริงไหม), GSC + Bing/IndexNow (index แล้วไหม), ถาม AI รายเดือน (ถูกอ้างอิงไหม → citation rate)

---

## ส่วนที่ 2 - Day 1: GEO/AEO Mindset & Full Stack Foundation (สรุป)

**ประเด็นสำคัญ**

- ภูมิทัศน์การค้นหาเปลี่ยนจาก "10 ลิงก์" เป็น "คำตอบเดียวพร้อม citation" · ChatGPT Search ใช้ Bing ป้อนข้อมูล → **Bing Webmaster Tools สำคัญ**
- Case Study Audit เว็บจริง (CI3 + MySQL, SSR, บทความทุกวัน): จุดแข็งคือ HTML ครบ robots เปิด เนื้อหาดี · จุดอ่อน 🔴 ไม่มี JSON-LD เลย, ไม่มี Canonical, sitemap 30,000 URL lastmod ปี 2019 · 🟠 Title 440 ตัวอักษร, meta keywords, description boilerplate, หน้าแรกไม่มี H1, การ์ดเป็น H2 · 🟡 ไม่มี llms.txt, FAQ, author, breadcrumb schema → **Priority Roadmap นี้คือลำดับเนื้อหาของคอร์ส**
- สถาปัตยกรรม: **Astro 6 SSG ↔ Laravel 13 API (Sanctum) ↔ MySQL** build ที่เครื่องพัฒนา/CI แล้ว rsync `dist/` ขึ้น Apache/Nginx; Sanctum Token แบบ read-only (`content:read`) ออกด้วยคำสั่ง `php artisan geo:issue-build-token`
- แผนที่ตัดสินใจ: เว็บใหม่ → Astro; WP ที่ทีมคอนเทนต์แก้เองทุกวัน/ใช้ plugin เยอะ → อยู่ต่อ + Retrofit; WP ช้า/พังบ่อย + มี Dev → ย้ายแบบค่อยเป็นค่อยไป; เนื้อหาเยอะมาก → Headless WP + Astro

**สิ่งที่สร้าง (GeniusCorp Modern)**

| ฝั่ง Laravel                                                                                                  | ฝั่ง Astro                                                                                                    |
| ------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- |
| `laravel new` + `php artisan install:api` (Sanctum + routes/api.php)                                          | `npm create astro@latest -- --template minimal`, `astro.config.mjs`: `site`, `trailingSlash: 'always'`, `env.schema` (API_URL public, API_TOKEN secret, `validateSecrets`) |
| ตาราง `team_members`, `services`, `portfolios`, `articles`, `faqs` (slug unique, published_at, is_published, author_id, price_from decimal) | `src/lib/api.ts`: `apiGet()` ใส่ Bearer จาก `astro:env/server` และ **throw ถ้า API ไม่ 200** (build พังดีกว่าเว็บว่าง) |
| Model: `casts()`, `scopePublished()`, `getRouteKeyName() = slug`                                              | `BaseLayout.astro`, `Header/Footer`, `ServiceCard/ArticleCard` (การ์ดใช้ `<h3>`)                                 |
| API Resources: วันที่ ISO 8601, ส่ง `url` path มาด้วย, `faqs` เมื่อ `whenLoaded`, `body` เฉพาะ show           | `pages/services/[slug].astro` ใช้ `getStaticPaths()` คืน `params + props` (Astro 6: ใช้ `import.meta.env.SITE` แทน `Astro.site` ในฟังก์ชันนี้) |
| Routes `/api/v1/*` หลัง `auth:sanctum` + `ability:content:read` (alias ใน `bootstrap/app.php`)                | 7 เมนู: `/`, `/about/`, `/services/`, `/services/[slug]/`, `/portfolio/…`, `/blog/…`, `/team/`, `/contact/` → `npm run build` ได้ `dist/` HTML ล้วน ไม่มี `<script>` |

---

## ส่วนที่ 3 - Day 2: GEO Core Engineering - Structured Data & Technical SEO (สรุป)

**ประเด็นสำคัญ**

- **SeoHead.astro** จุดเดียวจัดการ title (`<เนื้อหา> | <แบรนด์>`, หน้าแรกใช้ defaultTitle), description, canonical (`new URL(Astro.url.pathname, SITE.url)` ตัด query/hash), OG/Twitter, `article:*`, hreflang (เฉพาะเมื่อมีหลายภาษาจริง), noindex + เตือนใน build log ถ้ายาวเกิน
- **ค่ากลางองค์กรใน `src/lib/site.ts`** (ชื่อ ที่อยู่ เบอร์ sameAs) ใช้ทั้ง Metadata, Organization Schema, Footer, llms.txt
- **hreflang**: ถ้าไม่มีเนื้อหาอังกฤษจริงครบ → ทำภาษาเดียว ถอด `?lang=en` (ครึ่ง ๆ กลาง ๆ แย่กว่าไม่มี); ถ้ามีจริง → path `/en/` + `th/en/x-default` ชี้กลับกัน
- **Heading**: H1 เดียวทุกหน้า, H2 = หัวข้อหลัก (คำถามเมื่อเหมาะ) ไม่เกิน 5-8, การ์ดเป็น H3, ไม่ข้ามระดับ, โลโก้ไม่ใช่ H1
- **JsonLd.astro**: `clean()` ตัดค่าว่าง, `JSON.stringify` แล้ว replace `<`/`>`/`&`/U+2028/U+2029 เป็น `\uXXXX` กัน `</script>` ปิดก่อนเวลา, ใส่ด้วย `set:html` (ไม่งั้น `"` กลายเป็น `&quot;`)
- **schema.ts**: builders `organizationSchema` (`@type: ['Organization','LocalBusiness']`), `websiteSchema` (SearchAction เฉพาะเมื่อมีหน้าค้นหาจริง), `webPageSchema`, `serviceSchema` (Offer + PriceSpecification.minPrice), `articleSchema` (headline ≤ 110, author → `@id` Person), `personSchema`, `breadcrumbSchema`, `faqSchema`, `portfolioSchema`, `itemListSchema` และ `graph(...)` รวมเป็น `@context` + `@graph` เดียว · ปรับใช้กับ Product/Course/Event ได้ด้วย pattern เดียวกัน
- **นโยบาย Google**: Schema ต้องตรงกับเนื้อหาที่มองเห็น → ประกอบจากข้อมูลชุดเดียวจึงปลอดภัย · FAQ rich result ของ Google จำกัดแล้ว แต่ FAQPage ยังมีค่ากับ AI/Bing
- **Validation**: validator.schema.org (ทุก type) + Rich Results Test (เฉพาะที่ Google ใช้) ตอน dev วางเป็น code snippet; **`scripts/check-geo.mjs`** ตรวจทุกหน้าใน `dist/` (canonical, H1 = 1, description, JSON-LD parse ได้, วันที่ ISO, @type ตามประเภทหน้า) ผูกใน `"build": "astro build && node scripts/check-geo.mjs"` → ไม่ผ่าน = ไม่ deploy

**Spec ว่าแต่ละหน้าต้องมี Schema อะไร**

| หน้า                  | @graph                                                                 |
| --------------------- | ---------------------------------------------------------------------- |
| `/`                   | Organization/LocalBusiness, WebSite, WebPage                           |
| `/services/[slug]/`   | Organization, WebPage, **Service+Offer**, BreadcrumbList, **FAQPage**  |
| `/blog/[slug]/`       | Organization, WebPage, **Article**, **Person(author)**, BreadcrumbList |
| `/portfolio/[slug]/`  | Organization, WebPage, CreativeWork, BreadcrumbList                    |
| `/team/`              | Organization, WebPage, Person × N, BreadcrumbList                      |
| `/about/`, `/contact/` | Organization(LocalBusiness เต็ม), WebPage(AboutPage/ContactPage), BreadcrumbList |
| หน้ารวม               | Organization, WebPage(CollectionPage), ItemList, BreadcrumbList        |

---

## ส่วนที่ 4 - Day 3: WordPress GEO/AEO - ทำเว็บเดิมให้ AI อ้างอิงได้ (สรุป)

**ประเด็นสำคัญ**

- WordPress เรนเดอร์ด้วย PHP = SSR อ่านได้ครบ ปัญหาอยู่ที่ `wp_head()` ที่ทุก plugin/theme/builder ยัดของใส่ (Schema ซ้ำ 2-4 ชุด, CSS inline, meta keywords) และ Page Builder ยัด `<div>` จนโครงสร้างหาย
- **Audit Checklist 20 ข้อ** (Metadata 4, Canonical 3, Heading/Content 4, Structured Data 4, Sitemap/robots 2, Performance 3) ตรวจด้วย View Source (= สิ่งที่ AI เห็น), Query Monitor (query/scripts/hooks/template), Lighthouse/PSI → จัดลำดับด้วย **Impact vs Effort** ทำ "บนซ้าย" ก่อน (ปิด Schema ซ้ำ, แก้ Title template, เปิด cache, ลบ meta keywords)
- **เกณฑ์คัด Plugin**: ทำสิ่งที่โค้ด 20 บรรทัดทำไม่ได้, ไม่ฉีด CSS/JS ทุกหน้า, อัปเดตใน 6 เดือน, ไม่ซ้ำหน้าที่, Schema มาจากแหล่งเดียว
- **Child Theme `geniuscorp-geo`** แยกโค้ดเป็น `inc/geo-*.php` (cleanup, post-types, metadata, headings, schema, faq, performance) + `single-service.php`, `archive-service.php`, `template-parts/faq.php`
- **Rank Math ตั้งค่า**: Title template สั้น, Description = `%excerpt%` **และบังคับ excerpt 70-170 ตัวอักษรตอน publish ด้วย `wp_insert_post_data`**, Schema Type = None (เราฉีดเอง), OG เปิด · filter `rank_math/frontend/canonical` (pagination ชี้ตัวเอง, ตัด query, trailing slash) · `rank_math/opengraph/*` ใส่ `article:author` เป็น URL
- **Heading**: โลโก้เป็น `<p>` ยกเว้นหน้าแรก (filter ของ theme หรือ override header.php), การ์ดใน archive template เป็น `<h3>`, widget ของ builder ตั้ง tag ครั้งเดียว
- **De-duplicate Schema**: `add_filter('rank_math/json_ld', fn () => [], 99)` (Yoast: `wpseo_json_ld_output` false), `remove_action('wp_head', <theme callback>)` หา callback จาก Query Monitor → เหลือ 0 block ก่อนฉีดของเรา
- **CPT `service` + ACF** (`price_from`, `duration_days`, `faqs` repeater; ACF ฟรีใช้ CPT `faq` + Post Object แทน) ลงทะเบียนด้วยโค้ดเพื่อ version control และ 301 จาก URL เดิม
- **geo-schema.php** = schema.ts ฉบับ PHP: `gc_site()`, builders ทุกตัว, `gc_breadcrumb_items()` ใช้ร่วม HTML/Schema, `gc_build_graph()` เลือกตามประเภทหน้า, `wp_head` priority 20, **`wp_json_encode(..., JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP)`** และ `wp_date(DATE_ATOM)` ให้ +07:00
- **Performance**: LiteSpeed/WP Rocket (Page cache, auto purge, minify, defer; Combine CSS = Off), dequeue CSS/JS รายหน้า, ปิด jquery-migrate, WebP ผ่าน `image_editor_output_format`, `big_image_size_threshold`, LCP eager + fetchpriority, ลด plugin 23 → ~10 · เป้า TTFB < 0.6s (cache hit ~0.2s), HTML < 150KB, LCP < 2.5s
- **อยู่ต่อหรือย้าย**: Astro ชนะด้าน GEO คงทน/Performance/Security/ค่าดูแล; WP ชนะด้านทีมคอนเทนต์/เห็นผลทันที/ระบบเสริม · Migration 4 ระยะ (Retrofit → Strangler ทีละส่วน → ย้ายบทความพร้อม slug/วันที่/author เดิม + 301 → Headless/ปิด WP) กฎเหล็ก: URL เดิม = URL ใหม่, ไม่มี redirect chain

---

## ส่วนที่ 5 - Day 4: E-E-A-T, llms.txt, Deployment & Measurement (สรุป)

**ประเด็นสำคัญ**

- **E-E-A-T**: Author Box (Astro `AuthorBox.astro` / WP `template-parts/author-box.php` ผ่าน `the_content` filter) เชื่อม `Person.@id` เดียวกับหน้าโปรไฟล์ที่มีข้อมูลจริง · `<time datetime="ISO ค.ศ.">` คนอ่าน พ.ศ. เครื่องอ่าน ISO (ระวัง datetime เป็น 2569) · Laravel เพิ่ม `content_updated_at` อัปเดตเฉพาะเมื่อ title/body/excerpt เปลี่ยน (WP เทียบ modified-published > 1 วัน)
- **Guidelines 10 ข้อ** ให้ทีมคอนเทนต์ (Inverted Pyramid, H2 คำถาม, ตัวเลข, อ้างอิง, คำพูด, ตาราง, ไม่ใช้ "เรา" ลอย ๆ, excerpt, FAQ, อัปเดตจริง) + Block Pattern "หน้าบริการมาตรฐาน" ใน WP
- **Sitemap**: Laravel `/api/v1/sitemap-entries` (url, lastmod จริง, type, title, summary) → Astro `src/pages/sitemap.xml.ts` (static endpoint) และ `src/pages/llms.txt.ts` จากข้อมูลเดียวกัน · WP: Rank Math เปิด CPT ใน sitemap, แก้ lastmod ที่เพี้ยนจาก import, filter `rank_math/sitemap/entry` · เกิน 50,000 URL → sitemap index
- **robots.txt**: `User-agent: * / Allow: /` + `Sitemap:`; ถ้าจะห้ามฝึกโมเดล บล็อกเฉพาะ `GPTBot`/`ClaudeBot`/`Google-Extended` ไม่ใช่ตัว Search; ห้าม Disallow `/wp-content/`
- **llms.txt** (llmstxt.org): `# ชื่อ` + `> สรุป` + `## หมวด` + `- [ชื่อ](URL): คำอธิบาย` + `## Optional`; WP ทำผ่าน `add_rewrite_rule('^llms\.txt$')` + `template_redirect` + transient
- **Performance**: `<Image>` จาก `astro:assets` (WebP, widths/sizes, width/height, LCP eager) + `image.domains`; Apache `.htaccess` (brotli/deflate, Expires/Cache-Control immutable สำหรับ `_astro/`, `AddDefaultCharset UTF-8`, trailing slash 301) / Nginx เทียบเท่า · ตัวเลขจริง: Astro TTFB ~0.08s HTML 32KB PSI 99 vs WP ก่อน 1.4s/480KB/38 vs WP หลัง+cache 0.18s/110KB/84
- **Deploy**: `/var/www/geniuscorp-web` (static, DocumentRoot ชี้ symlink `-current`), `geniuscorp-api/public`, `geniuscorp-wp` · vhost: :80 → https+www hop เดียว, `AllowOverride All`, `ErrorDocument 404`, access log `combined` · certbot · Laravel: `composer install --no-dev`, `config/route/view:cache`, สิทธิ์ 750/640 + storage 770, API `X-Robots-Tag: noindex` · WP: `DISALLOW_FILE_EDIT`, `FORCE_SSL_ADMIN`, `DISABLE_WP_CRON` + crontab, ปิด Query Monitor, backup อัตโนมัติ
- **deploy.sh**: build (รวม GEO check) → ตรวจไฟล์ → rsync เข้า release ใหม่ → สลับ symlink (atomic, rollback ได้) → curl smoke test
- **Rebuild อัตโนมัติ**: `ContentObserver` (saved/deleted, debounce 2 นาทีด้วย `Cache::add`) → `TriggerRebuild` job → GitHub `repository_dispatch` (workflow build → rsync → smoke test → IndexNow) หรือ webhook server ของเราเอง (Node + HMAC + คิว build เดียว) · ต้องมี queue worker
- **Measurement**: GSC (Domain property, submit sitemap, URL Inspection, Crawl stats), Bing (import จาก GSC, IndexNow script หลัง deploy), **server log** `zgrep` หา `OAI-SearchBot|PerplexityBot|Claude-SearchBot|…` นับ request/pages/errors รายสัปดาห์, **ทดสอบถาม AI รายเดือน** 15-20 คำถาม × 4 Engine → citation rate (เป้า 15-25% ใน 3 เดือน, brand query 100%)
- **GEO-Ready Checklist 30 ข้อ** (A Architecture 6, B Metadata 6, C Structured Data 7, D Content/E-E-A-T 7, E Performance 4, F Operations 6) + Action Plan 30 วัน

---

## ส่วนที่ 6 - โค้ด 10 ชิ้นที่ต้องจำได้ (ฉบับย่อ)

**1. Sanctum token แบบ read-only สำหรับ build (Laravel)**

```php
$user->tokens()->where('name', 'astro-build')->delete();
$token = $user->createToken('astro-build', ['content:read']);
// routes: Route::prefix('v1')->middleware(['auth:sanctum', 'ability:content:read'])
```

**2. astro.config.mjs ที่ GEO ต้องการ**

```js
import { defineConfig, envField } from 'astro/config'
export default defineConfig({
  site: 'https://www.geniuscorp.example',
  trailingSlash: 'always',
  output: 'static',
  build: { format: 'directory' },
  env: {
    schema: {
      API_URL: envField.string({ context: 'server', access: 'public' }),
      API_TOKEN: envField.string({ context: 'server', access: 'secret' }),
    },
    validateSecrets: true,
  },
})
```

**3. ดึง API ตอน build และทำให้ build พังเมื่อ API พัง**

```ts
import { API_URL, API_TOKEN } from 'astro:env/server'
async function apiGet<T>(path: string): Promise<T> {
  const res = await fetch(`${API_URL}${path}`, { headers: { Accept: 'application/json', Authorization: `Bearer ${API_TOKEN}` } })
  if (!res.ok) throw new Error(`API ${res.status} at ${path}`)
  return (await res.json()).data
}
```

**4. getStaticPaths (Astro 6)**

```ts
export async function getStaticPaths() {
  const services = await getServices()
  return services.map((service) => ({ params: { slug: service.slug }, props: { service } }))
}
```

**5. Canonical ที่ตัด query เสมอ (SeoHead)**

```ts
const canonicalUrl = canonical ? absoluteUrl(canonical) : new URL(Astro.url.pathname, SITE.url).toString()
```

**6. JsonLd ฝังอย่างปลอดภัย**

```ts
const json = JSON.stringify(clean(data)).replace(/</g, '\\u003c').replace(/>/g, '\\u003e').replace(/&/g, '\\u0026')
// <script type="application/ld+json" set:html={json} />
```

**7. graph() รวมทุก Schema ของหน้า**

```ts
const jsonLd = graph(organizationSchema(), webPageSchema({...}), serviceSchema(service), breadcrumbSchema(crumbs), faqSchema(faqs))
```

**8. ปิด Schema ของ Rank Math แล้วฉีดเอง (WordPress)**

```php
add_filter('rank_math/json_ld', fn (array $data) => [], 99);
add_action('wp_head', function () {
    echo '<script type="application/ld+json">'
        . wp_json_encode(gc_build_graph(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP)
        . '</script>';
}, 20);
```

**9. sitemap.xml เป็น static endpoint จาก lastmod จริง**

```ts
export const GET: APIRoute = async () => {
  const entries = await getSitemapEntries()
  const urls = entries.map((e) => `<url><loc>${absoluteUrl(e.url)}</loc>${e.lastmod ? `<lastmod>${e.lastmod}</lastmod>` : ''}</url>`).join('')
  return new Response(`<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">${urls}</urlset>`, { headers: { 'Content-Type': 'application/xml; charset=utf-8' } })
}
```

**10. Observer → Rebuild (debounce)**

```php
if (Cache::add('geo:rebuild-pending', $reason, now()->addMinutes(2))) {
    TriggerRebuild::dispatch($reason)->delay(now()->addMinutes(2));
}
```

และคำสั่งตรวจ crawler บนเซิร์ฟเวอร์:

```bash
zgrep -hE 'GPTBot|OAI-SearchBot|ClaudeBot|Claude-SearchBot|PerplexityBot|Google-Extended|Googlebot|Bingbot' /var/log/apache2/*access.log* \
  | grep -oE 'GPTBot|OAI-SearchBot|ClaudeBot|Claude-SearchBot|PerplexityBot|Google-Extended|Googlebot|Bingbot' | sort | uniq -c | sort -rn
```

---

## ส่วนที่ 7 - Checklist ย่อ 15 ข้อ "เว็บของฉัน GEO-Ready หรือยัง" (ใช้ได้ทั้ง Astro และ WordPress)

- [ ] 1 View Source แล้วเห็นเนื้อหาครบโดยไม่ต้องรัน JS
- [ ] 2 robots.txt ไม่บล็อก `OAI-SearchBot`, `PerplexityBot`, `Claude-SearchBot`, `Googlebot`, `Bingbot` และชี้ sitemap
- [ ] 3 sitemap.xml lastmod เป็นวันแก้จริง ไม่มี URL ขยะ และ submit ใน GSC + Bing แล้ว
- [ ] 4 มี `/llms.txt`
- [ ] 5 https + www/non-www + trailing slash เป็น 301 hop เดียว
- [ ] 6 Title ไม่ซ้ำ ~50-60 ตัวอักษร, Description ~150-160 จากเนื้อหาจริง, ไม่มี meta keywords
- [ ] 7 Canonical absolute ทุกหน้า ตัด query
- [ ] 8 H1 เดียวทุกหน้า (รวมหน้าแรก) การ์ดไม่ใช่ H2
- [ ] 9 JSON-LD ชุดเดียว มี Organization/LocalBusiness + WebPage + Breadcrumb ทุกหน้า และ Service+Offer / Article+Person / FAQPage ตามประเภท
- [ ] 10 validator.schema.org 0 error และมีสคริปต์ตรวจก่อน deploy
- [ ] 11 บทความมี Author Box + `<time datetime>` ISO ค.ศ. + `article:published_time`
- [ ] 12 หน้าบริการมี FAQ 4-6 ข้อ แบบ answer-ready ตรงกับ FAQPage Schema
- [ ] 13 TTFB < 0.4s (SSG) / < 0.6s (WP), HTML < 150KB, รูป WebP, brotli/gzip เปิด
- [ ] 14 เนื้อหาเปลี่ยนแล้วเว็บอัปเดตเอง (Webhook Rebuild / cache purge)
- [ ] 15 มีรายงาน AI crawler จาก log และตารางทดสอบถาม AI รายเดือน

---

## ส่วนที่ 8 - ตัดสินใจเชิงสถาปัตยกรรมใน 1 นาที

```
เว็บใหม่                                    → Astro 6 SSG + Laravel 13 API + MySQL
WP เดิม + ทีมคอนเทนต์แก้เองทุกวัน + ไม่มี Dev  → อยู่กับ WP + Retrofit (Day 3) + cache
WP เดิม + WooCommerce/Membership/Forms เยอะ   → อยู่กับ WP + Retrofit
WP เดิม + ช้า/พังบ่อย + มี Dev Laravel        → ย้ายไป Astro แบบ Strangler (Day 3 Module 7) รักษา URL + 301
เนื้อหาหลายพันหน้า + ทีมใหญ่                  → WP เป็น Headless CMS + Astro SSG
```

| ถ้าเลือก Astro คุณจะได้                                   | ถ้าเลือก WordPress คุณจะได้                                   |
| --------------------------------------------------------- | ------------------------------------------------------------- |
| ควบคุม HTML/Schema 100%, Performance ดีที่สุดโดยไม่ต้อง cache, ไม่มีอะไรพังเองจากการอัปเดต, ค่าดูแลต่ำ | เริ่มได้ทันที, ทีมคอนเทนต์แก้เองผ่าน Admin, เห็นผลทันที, plugin สำเร็จรูป |
| ต้องสร้าง Admin (หรือใช้ WP Headless), ต้องมี Rebuild pipeline | ต้องดูแล cache/plugin/security ตลอด, Page Builder ทำ HTML พังได้อีก, ช้ากว่า 2-5 เท่า |

---

## ส่วนที่ 9 - แหล่งอ้างอิงหลัก (สั้น)

- Aggarwal et al. (2024) *GEO: Generative Engine Optimization*, KDD '24 - https://arxiv.org/abs/2311.09735
- Google Search Central - Structured data, Canonical, Sitemap, robots.txt, E-E-A-T: https://developers.google.com/search/docs
- Schema.org: https://schema.org · Validator: https://validator.schema.org · Rich Results Test: https://search.google.com/test/rich-results
- llms.txt spec: https://llmstxt.org · IndexNow: https://www.indexnow.org · Bing Webmaster Tools: https://www.bing.com/webmasters
- OpenAI bots: https://platform.openai.com/docs/bots · Perplexity bots: https://docs.perplexity.ai/guides/bots · Anthropic crawler: https://support.anthropic.com
- Astro 6 Docs: https://docs.astro.build · Laravel 13 Docs: https://laravel.com/docs/13.x · WordPress Developer Resources: https://developer.wordpress.org
- Rank Math hooks: https://rankmath.com/kb/filters-hooks-api-developer/ · ACF: https://www.advancedcustomfields.com/resources/
- PageSpeed Insights: https://pagespeed.web.dev · web.dev Core Web Vitals: https://web.dev/articles/vitals

---

**💡 ประโยคเดียวที่สรุปทั้งคอร์ส:**

> "ทำให้ HTML ของคุณบอกเครื่องได้ว่า คุณคือใคร ทำอะไร ราคาเท่าไร ใครเขียน เมื่อไหร่ ด้วยข้อมูลชุดเดียวกับที่คนเห็น แล้วสร้างระบบให้มันยังจริงอยู่โดยไม่ต้องมีใครจำ"

---

_เอกสารจัดทำโดย: อาจารย์สามิตร โกยม | IT Genius Engineering Co., Ltd._
_หลักสูตร ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO) - Recap ทั้ง 4 วัน_
