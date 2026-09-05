# ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL

## หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ 4 วัน: GEO/AEO Full Stack Modern Web ให้เว็บถูกค้นเจอและอ้างอิงโดย ChatGPT / Gemini / Perplexity / Claude

**รูปแบบการอบรม:** คอร์ส Public — อบรมออนไลน์สดผ่าน Zoom พร้อมบันทึกวิดีโอย้อนหลัง
**ระยะเวลา:** 4 วัน วันละ 3 ชั่วโมง (รวม 12 ชั่วโมง)
**วันที่อบรม:** (กำหนดการตามรอบอบรมของสถาบัน)
**ผู้สอน:** อ.สามิตร โกยม
**ประสบการณ์:** สอนและพัฒนาซอฟต์แวร์กว่า 15 ปี

---

## แนวคิดหลักของหลักสูตร

ในปี 2026 พฤติกรรมการค้นหาข้อมูลของผู้ใช้เปลี่ยนไปอย่างสิ้นเชิง - ผู้คนจำนวนมากไม่ได้ค้นหาผ่าน Google แบบเดิมอีกต่อไป แต่ถามคำถามกับ ChatGPT, Perplexity, Claude และ Gemini โดยตรง เว็บไซต์ที่ AI "อ่านเข้าใจและเลือกอ้างอิง" เท่านั้นที่จะถูกแนะนำต่อผู้ใช้ นี่คือยุคของ **GEO (Generative Engine Optimization)** และ **AEO (Answer Engine Optimization)** ที่นักพัฒนาเว็บทุกคนต้องปรับตัว

หลักสูตรนี้ออกแบบมาสำหรับนักพัฒนาโดยเฉพาะ ไม่ใช่คอร์สการตลาด - ผู้เรียนจะได้ลงมือทำ GEO/AEO บน **สองสถาปัตยกรรมที่ใช้งานจริงมากที่สุดในประเทศไทย** ควบคู่กัน คือ (1) **Modern Stack** — Astro (SSG) + Laravel 13 API (Sanctum) + MySQL/MariaDB สำหรับเว็บที่สร้างใหม่ และ (2) **WordPress Stack** — เว็บ WordPress เดิมที่องค์กรส่วนใหญ่ใช้อยู่ ซึ่งต้องทำ GEO Retrofit ให้พร้อมสำหรับ AI Search โดยไม่ต้อง Rebuild ทั้งเว็บ

ตลอดหลักสูตรจะฝังเทคนิค GEO/AEO ครบทุกชั้น ตั้งแต่ Structured Data (JSON-LD), Canonical, Dynamic Sitemap, FAQ Schema, E-E-A-T, llms.txt ไปจนถึงการวัดผลว่า AI crawlers เข้ามาเก็บข้อมูลเว็บของเราจริงหรือไม่ เนื้อหาทั้งหมดกลั่นจากการ Audit เว็บไซต์จริงและงานวิจัย GEO ระดับสากล เพื่อให้ผู้เรียนนำไปใช้กับโปรเจกต์ของตนเองได้ทันทีหลังจบคอร์ส ไม่ว่าเว็บนั้นจะเป็น Astro หรือ WordPress

---

## วัตถุประสงค์ของหลักสูตร

- เพื่อให้ผู้เข้าอบรมเข้าใจหลักการทำงานของ Generative Engine / Answer Engine (ChatGPT Search, Perplexity, Claude, Gemini, Google AI Overviews) และปัจจัยที่ทำให้เว็บไซต์ถูก AI เลือกอ้างอิง
- เพื่อให้สามารถออกแบบสถาปัตยกรรม Full Stack แบบ Astro SSG + Laravel API + MySQL/MariaDB ที่ Deploy บน Apache/Nginx ได้โดยไม่ต้องติดตั้ง Node.js บนเซิร์ฟเวอร์
- เพื่อให้สามารถพัฒนา REST API ด้วย Laravel พร้อมระบบยืนยันตัวตนด้วย Sanctum และออกแบบฐานข้อมูลรองรับเนื้อหาแบบ answer-ready
- เพื่อให้สามารถทำ **GEO/AEO บนเว็บ WordPress เดิม** ได้อย่างเป็นระบบ ทั้งการ Audit, การจัดการ Schema, การแก้ปัญหา Theme/Plugin ที่ทำลายโครงสร้าง HTML, Performance และ Sitemap/llms.txt
- เพื่อให้สามารถสร้าง Structured Data (JSON-LD) ครบทุก Schema ที่จำเป็นสำหรับเว็บองค์กร ได้แก่ Organization/LocalBusiness, WebSite, Service, Article, Person, BreadcrumbList และ FAQPage พร้อม Validate ผ่านเครื่องมือมาตรฐาน บนทั้งสองสถาปัตยกรรม
- เพื่อให้สามารถจัดการ Technical SEO/GEO ได้อย่างถูกต้อง ทั้ง Canonical Tag, Metadata, Open Graph, Heading Hierarchy, robots.txt, Dynamic Sitemap และ llms.txt
- เพื่อให้เข้าใจหลัก E-E-A-T และ Answer-Ready Content ที่เพิ่มโอกาสถูก AI อ้างอิงตามผลงานวิจัย GEO
- เพื่อให้สามารถ Deploy เว็บ Production จริงบน Apache/Nginx พร้อมระบบ Rebuild อัตโนมัติเมื่อเนื้อหาในฐานข้อมูลเปลี่ยน
- เพื่อให้สามารถวัดผลและติดตามการเข้ามาของ AI Crawlers (GPTBot, ClaudeBot, PerplexityBot ฯลฯ) ได้อย่างเป็นระบบ
- เพื่อให้สามารถ **ตัดสินใจเชิงสถาปัตยกรรม** ได้ว่าโปรเจกต์ไหนควรใช้ WordPress ต่อ โปรเจกต์ไหนควรย้ายไป Astro SSG และมีเส้นทาง Migration อย่างไร

---

## จุดเด่นของหลักสูตร

- **ครอบคลุมทั้งเว็บใหม่และเว็บเดิม:** เรียนทั้ง Modern Stack (Astro + Laravel + MySQL) และ WordPress ที่องค์กรส่วนใหญ่ใช้อยู่จริง - กลับไปทำงานได้ทันทีไม่ว่าเว็บของคุณจะเป็นแบบไหน
- **คอร์ส GEO/AEO สำหรับ Developer โดยเฉพาะ:** ไม่ใช่ทฤษฎีการตลาด แต่เป็นการลงมือเขียนโค้ดจริงทุกเทคนิค ตั้งแต่ Schema Component จนถึงการอ่าน Server Log หา AI Crawlers
- **กลั่นจาก Audit เว็บไซต์จริง:** เนื้อหาอ้างอิงจากผลการตรวจสอบ GEO/AEO ของเว็บไซต์ที่มีผู้เข้าชมจริง พร้อมลำดับความสำคัญ (Priority Roadmap) ว่าอะไรควรทำก่อน-หลัง
- **สถาปัตยกรรมที่ Deploy ง่ายและ AI อ่านได้ 100%:** Astro SSG สร้าง Static HTML สมบูรณ์ตั้งแต่ build time นำขึ้น Apache/Nginx ได้ทันทีโดยไม่ต้องมี Node.js บนเซิร์ฟเวอร์
- **WordPress GEO แบบ Developer:** ไม่ใช่แค่ "ลง Plugin แล้วจบ" แต่ลงลึกถึง functions.php, Hook, ACF, Custom Post Type, การ De-duplicate Schema และการวัด Performance จริง
- **อิงงานวิจัยและมาตรฐานสากล:** อ้างอิงงานวิจัย GEO ของ Princeton, สเปก llms.txt, Google Search Central และ Schema.org ตลอดหลักสูตร
- **Workshop ต่อเนื่องโปรเจกต์เดียว:** ผู้เรียนสร้างเว็บจริงตั้งแต่วันแรกถึงวันสุดท้าย จบคอร์สได้เว็บที่ Deploy แล้วพร้อม GEO ครบทุกชั้น ทั้งฝั่ง Astro และฝั่ง WordPress

---

## หลักสูตรนี้เหมาะกับใคร (กลุ่มเป้าหมาย)

- นักพัฒนาเว็บ (Web Developers) ที่ต้องการยกระดับเว็บไซต์ให้ถูกค้นเจอและถูกอ้างอิงโดย AI Search Engines
- Full Stack / Backend Developers สาย PHP/Laravel ที่ต้องการเรียนรู้สถาปัตยกรรม Frontend สมัยใหม่แบบ Astro SSG
- **WordPress Developers / ผู้ดูแลเว็บองค์กรบน WordPress** ที่ต้องการทำเว็บเดิมให้พร้อมสำหรับยุค AI Search โดยไม่ต้อง Rebuild ทั้งระบบ
- Tech Leads และเจ้าของเว็บไซต์ที่วางแผน Rebuild เว็บเดิม (เช่น จาก CMS หรือ Framework ยุคเก่า) ให้เป็น Modern Stack ที่พร้อมสำหรับยุค AI Search
- นักการตลาดสายเทคนิค (Technical SEO) ที่เขียนโค้ดได้ และต้องการเข้าใจการทำ GEO/AEO ในระดับ Implementation จริง

---

## ผู้เรียนต้องมีพื้นฐานอะไรบ้าง

- เขียนโปรแกรมภาษา PHP ได้ และเคยใช้งาน Laravel เบื้องต้น (เข้าใจ Route, Controller, Model, Migration)
- มีความเข้าใจ HTML/CSS และ JavaScript พื้นฐาน
- เคยใช้งานฐานข้อมูล MySQL หรือ MariaDB (เขียน SQL พื้นฐาน, ออกแบบตารางเบื้องต้น)
- เคยติดตั้งและใช้งาน WordPress เบื้องต้น (เข้าใจ Post/Page, Theme, Plugin) - ไม่จำเป็นต้องเขียน Theme เป็น
- ใช้งาน Git และ Command Line พื้นฐานได้

> **หมายเหตุ:** ไม่จำเป็นต้องเคยใช้ Astro หรือเคยทำ SEO/GEO มาก่อน จะมีการปูพื้นฐานให้ในคลาสเรียน

---

## Tech Stack ที่ใช้ในหลักสูตร

| หมวด | เครื่องมือ / เทคโนโลยี |
| --- | --- |
| Frontend (SSG) | Astro (Static Site Generation, Islands Architecture) |
| Backend API | Laravel 13 (REST API, API Resources) |
| Authentication | Laravel Sanctum (API Token) |
| CMS | WordPress (Theme/Child Theme, functions.php, Hooks, Custom Post Type, ACF) |
| ฐานข้อมูล | MySQL / MariaDB (ใช้ร่วมทั้งฝั่ง Laravel และ WordPress) |
| Structured Data | JSON-LD (Schema.org: Organization/LocalBusiness, Service, Article, Person, FAQPage, BreadcrumbList) |
| GEO Essentials | Canonical, Open Graph, Dynamic Sitemap, robots.txt, llms.txt |
| WordPress GEO Tools | Rank Math / Yoast SEO, WP Rocket หรือ LiteSpeed Cache, WebP Converter, Query Monitor |
| Web Server / Deploy | Apache / Nginx (ไม่ต้องติดตั้ง Node.js บนเซิร์ฟเวอร์) + gzip/brotli |
| Image Optimization | astro:assets (WebP, lazy loading) และ WebP/Lazy Load ฝั่ง WordPress |
| เครื่องมือตรวจสอบ | validator.schema.org, Google Rich Results Test, Google Search Console, Bing Webmaster Tools, PageSpeed Insights |
| เครื่องมือพัฒนา | VS Code, Git, Postman/Thunder Client, Laragon/XAMPP หรือ Docker |

---

## ภาพรวมการเรียน 4 วัน

| วัน | โฟกัส | ผลลัพธ์หลัก (Workshop) |
| --- | --- | --- |
| Day 1 | GEO/AEO Mindset & Full Stack Foundation | Laravel API + MySQL พร้อมใช้งาน และเว็บ Astro SSG ดึงข้อมูลจริงมาแสดงผล |
| Day 2 | GEO Core Engineering — Structured Data & Technical SEO | ทุกหน้าติด JSON-LD, Canonical, Metadata ครบ พร้อม FAQ Section และ Validate ผ่าน |
| Day 3 | WordPress GEO/AEO — ทำเว็บเดิมให้ AI อ้างอิงได้ | เว็บ WordPress ที่ผ่าน GEO Audit, ติด Schema ครบ, FAQ Block, Performance ดีขึ้นวัดผลได้ |
| Day 4 | E-E-A-T, llms.txt, Deployment & Measurement | เว็บทั้งสองฝั่ง Deploy จริงบน Apache/Nginx พร้อม Sitemap, llms.txt, Rebuild อัตโนมัติ และแผนวัดผล AI Crawlers |

---

## Workshop Project: GeniusCorp — เว็บ Corporate Website ที่ AI ค้นเจอ

ตลอดทั้ง 4 วัน ผู้เรียนจะพัฒนาเว็บต่อเนื่องภายใต้โจทย์เดียวคือ **GeniusCorp** — เว็บไซต์องค์กร (Corporate Website) จำลองของบริษัทซอฟต์แวร์ ที่มีเมนูพื้นฐานครบถ้วนตามมาตรฐานเว็บองค์กรทั่วไป ได้แก่ หน้าแรก (Home), เกี่ยวกับเรา (About Us), สินค้าและบริการ (Services), ผลงาน/ลูกค้าของเรา (Portfolio), บทความและข่าวสาร (Blog/News), ทีมงาน (Team) และติดต่อเรา (Contact)

โจทย์นี้จะถูกทำ **สองเวอร์ชันคู่ขนาน** เพื่อให้ผู้เรียนเห็นภาพเปรียบเทียบชัดเจน:

- **GeniusCorp Modern (Day 1-2)** — ข้อมูลอยู่ใน MySQL/MariaDB ให้บริการผ่าน Laravel API และเรนเดอร์เป็น Static HTML ด้วย Astro
- **GeniusCorp WP (Day 3)** — เว็บ WordPress เดิมที่มีเนื้อหาเหมือนกัน แต่เต็มไปด้วยปัญหา GEO ตามที่พบจริงในเว็บองค์กรทั่วไป ผู้เรียนจะทำ GEO Retrofit ให้เว็บนี้จนผ่าน Checklist
- **Day 4** — นำทั้งสองเว็บขึ้น Production พร้อม Sitemap, llms.txt, ระบบวัดผล และเปรียบเทียบผลลัพธ์ GEO ของทั้งสองสถาปัตยกรรม

รายละเอียด Workshop รายวัน:

- **Workshop Day 1** — สร้างฐานข้อมูล + Laravel API (บริการ ผลงาน บทความ ทีมงาน) และเว็บ Astro SSG ครบทุกเมนูหลัก ดึงข้อมูลจริงตอน build
- **Workshop Day 2** — ติดตั้ง GEO Layer เต็มระบบบน Astro: SEO Head Component, JSON-LD ครบทุก Schema, FAQ Section จากฐานข้อมูล พร้อม Validate
- **Workshop Day 3** — GEO Retrofit บน WordPress: Audit เว็บเดิม, แก้ Heading/Metadata/Canonical, ฉีด JSON-LD ผ่าน Child Theme, สร้าง FAQ ด้วย Custom Field พร้อม FAQPage Schema และปรับ Performance
- **Workshop Day 4 (Master Workshop)** — Deploy ทั้งสองเว็บขึ้น Apache/Nginx, สร้าง Sitemap/llms.txt จากข้อมูลจริง, ตั้งระบบ Rebuild อัตโนมัติ และตรวจ GEO-Ready Checklist ครบทุกข้อ

> **หมายเหตุ:** รายละเอียดเชิงลึกของแต่ละ Workshop จะมีเอกสาร Note การเรียนรู้แยกในแต่ละวัน พร้อม Starter Code และไฟล์ WordPress Demo Site (.wpress / SQL dump) ให้ผู้เรียนเพื่อประหยัดเวลา Setup

---

## สิ่งที่ผู้เรียนจะได้ลงมือทำจริง

- ออกแบบฐานข้อมูล MySQL/MariaDB สำหรับเนื้อหาเว็บองค์กร (บริการ ผลงาน บทความ ทีมงาน FAQ) ที่รองรับ GEO ตั้งแต่ระดับ Schema ของตาราง
- สร้าง REST API ด้วย Laravel + API Resources พร้อมป้องกันด้วย Sanctum Token
- สร้างเว็บ Corporate ครบทุกเมนูหลักด้วย Astro SSG ดึงข้อมูลจาก API ตอน build time และสร้างหน้าแบบ Dynamic Routes ด้วย getStaticPaths
- เขียน SEO Head Component จัดการ Title, Meta Description, Canonical, Open Graph และ hreflang ในที่เดียว
- สร้าง JSON-LD Component ครอบคลุม Organization/LocalBusiness, WebSite, Service + Offer, Article, Person, BreadcrumbList และ FAQPage
- สร้างระบบ FAQ จากตารางฐานข้อมูล แสดงผลบนหน้าบริการพร้อม FAQPage Schema
- **ทำ GEO Audit เว็บ WordPress เดิม** ด้วย Checklist มาตรฐาน แล้วจัดลำดับความสำคัญของงานแก้ไข
- **เขียนโค้ดฉีด JSON-LD เข้า WordPress** ผ่าน Child Theme + `wp_head` Hook โดยไม่พึ่ง Plugin และจัดการปัญหา Schema ซ้ำซ้อนจาก Plugin SEO
- **สร้าง FAQ Section บน WordPress** ด้วย ACF / Custom Field + FAQPage Schema อัตโนมัติ
- **ปรับ Performance ของ WordPress** ให้ผ่านเกณฑ์ Core Web Vitals ด้วย Caching, WebP, Lazy Load และการลด Plugin ที่ไม่จำเป็น
- เพิ่ม Author Box และวันที่แบบ machine-readable เพื่อสร้างสัญญาณ E-E-A-T บนทั้ง Astro และ WordPress
- Generate sitemap.xml ที่มี lastmod จริงจากฐานข้อมูล และเขียน llms.txt ตามสเปกมาตรฐาน (ทั้งแบบ Static และแบบ generate จาก WordPress)
- Deploy เว็บ Static ขึ้น Apache/Nginx พร้อมเปิด gzip/brotli และตั้ง Webhook สั่ง Rebuild เมื่อเนื้อหาเปลี่ยน
- ตรวจ Server Log หา AI Crawlers และตั้งระบบวัดผลการถูกอ้างอิงใน ChatGPT / Perplexity / Claude / Gemini

---

# Day 1: GEO/AEO Mindset & Full Stack Foundation

## เป้าหมายของวันแรก

ผู้เรียนจะเข้าใจภาพรวมว่า AI Search Engines ทำงานอย่างไรและใช้เกณฑ์อะไรเลือกอ้างอิงเว็บไซต์ พร้อมวางรากฐาน Full Stack ทั้งระบบ - ฐานข้อมูล, Laravel API และเว็บ Astro SSG ที่ดึงข้อมูลจริงมาแสดงผล

### จาก SEO สู่ GEO/AEO — ทำไมนักพัฒนาต้องปรับตัวในปี 2026

- ภูมิทัศน์การค้นหายุคใหม่: ChatGPT Search, Perplexity, Claude, Gemini และ Google AI Overviews เปลี่ยนพฤติกรรมผู้ใช้อย่างไร
- GEO vs AEO vs SEO แตกต่างกันอย่างไร และอะไรที่ยังใช้ร่วมกันได้
- AI Crawlers อ่านเว็บเราอย่างไร: GPTBot, OAI-SearchBot, ClaudeBot, PerplexityBot, Google-Extended และผลของ robots.txt
- ปัจจัยที่เพิ่มโอกาสถูก AI อ้างอิง: สรุปจากงานวิจัย GEO (Princeton) - สถิติ ตัวเลข แหล่งอ้างอิง เพิ่มโอกาสถูก cite ราว 30-40%
- Case Study: ผล Audit เว็บไซต์จริง - จุดแข็ง จุดอ่อน และ Priority Roadmap ที่นำมาใช้เป็นโจทย์ของคอร์สนี้

### สถาปัตยกรรม AI-Findable Full Stack

- ทำไม Static Site Generation (SSG) คือคำตอบสำหรับ GEO: HTML สมบูรณ์ 100% โดยไม่ต้องรัน JavaScript
- ภาพรวมสถาปัตยกรรม: Astro SSG ↔ Laravel API (Sanctum) ↔ MySQL/MariaDB และการ Deploy บน Apache/Nginx โดยไม่ต้องมี Node.js บนเซิร์ฟเวอร์
- เปรียบเทียบ SSG vs SSR vs SPA vs WordPress (PHP Rendering) ในมุมมองของ AI Crawlers และ Performance
- **แผนที่การตัดสินใจ:** โปรเจกต์แบบไหนควรใช้ WordPress ต่อ แบบไหนควรไป Astro SSG และต้นทุนของแต่ละทาง

### Laravel API Foundation

- ออกแบบฐานข้อมูลเว็บองค์กรที่รองรับ GEO: ตาราง services, portfolios, articles, team_members, faqs พร้อมฟิลด์สำคัญ (updated_at, published_at, author_id)
- สร้าง Migration, Model, Seeder และความสัมพันธ์ระหว่างตาราง
- สร้าง REST API ด้วย API Resources: ส่งข้อมูลเท่าที่จำเป็นในรูปแบบที่ Astro ใช้ง่าย
- ป้องกัน API ด้วย Laravel Sanctum: สร้าง Token สำหรับ build process ของ Astro

### Astro Fundamentals for SSG

- โครงสร้างโปรเจกต์ Astro, ไฟล์ .astro, Layouts และ Components
- แนวคิด Zero-JS by Default และ Islands Architecture (ใช้ JavaScript เฉพาะจุดที่จำเป็น)
- ดึงข้อมูลจาก Laravel API ตอน build time และสร้างหน้ารายละเอียดด้วย Dynamic Routes + getStaticPaths
- ผลลัพธ์ของ `astro build`: Static HTML ที่พร้อมนำขึ้น Apache/Nginx ทันที

**Workshop Day 1 (GeniusCorp Modern):** สร้างฐานข้อมูล MySQL + Laravel API (บริการ ผลงาน บทความ ทีมงาน) ป้องกันด้วย Sanctum แล้วสร้างเว็บ Corporate ด้วย Astro ครบเมนูหลัก - หน้าแรก, เกี่ยวกับเรา, บริการ (หน้ารวม + รายละเอียด), ผลงาน, บทความ, ทีมงาน และติดต่อเรา จากข้อมูลจริง

---

# Day 2: GEO Core Engineering — Structured Data & Technical SEO

## เป้าหมายของวันที่สอง

ผู้เรียนจะติดตั้ง "GEO Layer" ให้เว็บครบทุกชั้น ตั้งแต่ Metadata ที่ถูกต้อง, Canonical, Heading Hierarchy ไปจนถึง JSON-LD Structured Data ครบทุก Schema และระบบ FAQ จากฐานข้อมูล พร้อม Validate ผ่านเครื่องมือมาตรฐานทุกหน้า

### Metadata ที่ถูกต้องในยุค AI Search

- กายวิภาคของ Title ที่ดี (~50-60 ตัวอักษร) และ Meta Description รายหน้า (~150-160 ตัวอักษร) ที่สรุปเนื้อหาจริง ไม่ใช่ boilerplate
- สิ่งที่ควรเลิกทำ: meta keywords stuffing, Title ยาว 400+ ตัวอักษร - บทเรียนจาก Audit จริง
- Open Graph ครบชุดสำหรับบทความ: og:type=article, article:published_time, article:modified_time, article:author
- สร้าง SeoHead Component ใน Astro: จุดเดียวจัดการ Metadata ทุกหน้า รับ props จากข้อมูลจริงในฐานข้อมูล

### Canonical, hreflang & Heading Hierarchy

- Canonical Tag ป้องกัน Duplicate Content จาก query string - implement ใน Astro Layout ด้วย Astro.url
- แนวทางตัดสินใจเรื่องเว็บหลายภาษา และการใส่ hreflang (th / en / x-default) อย่างถูกต้อง
- Heading Hierarchy ที่ AI อ่านรู้เรื่อง: H1 เดียวต่อหน้า, H2 เป็นหัวข้อหลัก (หรือรูปแบบคำถาม), การ์ดรายการไม่ใช้ H2 พร่ำเพรื่อ

### JSON-LD Structured Data — หัวใจของ GEO

- Schema.org และ JSON-LD: ทำไมเป็นรูปแบบที่ Google และ AI Engines แนะนำ
- สร้าง JsonLd Component กลางใน Astro แล้วประกอบ Schema ทีละตัว:
  - `Organization` / `LocalBusiness` - ข้อมูลองค์กร, logo, telephone, address, sameAs (social profiles)
  - `WebSite` + `SearchAction` - ช่องค้นหาภายในเว็บ
  - `Service` + `Offer` - สินค้าและบริการขององค์กร พร้อมราคา (priceCurrency: THB) จากข้อมูลจริงในฐานข้อมูล
  - `Article` / `NewsArticle` - headline, datePublished, dateModified, author, image, inLanguage
  - `Person` - โปรไฟล์ทีมงาน/ผู้เขียนบทความ + jobTitle + worksFor + sameAs
  - `BreadcrumbList` - เส้นทางหน้าเว็บแบบ machine-readable
- แนวทางปรับ Schema เดียวกันไปใช้กับธุรกิจแบบอื่น เช่น `Product`, `Course`, `Event` (Pattern เดียวกัน เปลี่ยนเฉพาะ @type และฟิลด์)
- ข้อควรระวังกับเนื้อหาภาษาไทยใน JSON-LD และการ escape อักขระ

### FAQ System + FAQPage Schema

- ออกแบบตาราง faqs (service_id, question, answer, sort_order) ใน MySQL + Laravel API endpoint
- เขียน FAQ อย่างไรให้เป็น "answer-ready": คำถามที่ผู้ใช้ถาม AI จริง เช่น บริการนี้เหมาะกับใคร ราคาเริ่มต้นเท่าไร ใช้เวลาดำเนินการกี่วัน มีบริการหลังการขายหรือไม่
- แสดงผล FAQ Section บนหน้าบริการใน Astro พร้อมผูก FAQPage Schema อัตโนมัติ

### Validation Workflow

- ตรวจ Structured Data ด้วย validator.schema.org และ Google Rich Results Test
- ทำ Validation ให้เป็นส่วนหนึ่งของ workflow ก่อน Deploy ทุกครั้ง

**Workshop Day 2 (GeniusCorp Modern):** ติดตั้ง GEO Layer เต็มระบบ - SeoHead Component, Canonical, JSON-LD ครบทุก Schema (Organization/LocalBusiness, Service, Article, Person, BreadcrumbList), ระบบ FAQ จากฐานข้อมูลพร้อม FAQPage Schema และ Validate ผ่านทุกหน้า

---

# Day 3: WordPress GEO/AEO — ทำเว็บเดิมให้ AI อ้างอิงได้

## เป้าหมายของวันที่สาม

เว็บองค์กรส่วนใหญ่ในประเทศไทยยังอยู่บน WordPress และการ Rebuild ทั้งเว็บไม่ใช่ทางเลือกที่ทำได้เสมอไป วันนี้ผู้เรียนจะได้ **ยกเครื่องเว็บ WordPress เดิมให้พร้อมสำหรับ AI Search** ด้วยเทคนิคระดับ Developer โดยนำหลักการ GEO ทั้งหมดจาก Day 2 มาลงมือทำจริงบนสถาปัตยกรรม PHP/WordPress พร้อมทั้งเข้าใจข้อจำกัดของ WordPress และวิธีรับมือ

### WordPress ในสายตา AI Crawlers

- WordPress เรนเดอร์ HTML อย่างไร และเหตุใดจึงยัง "AI-readable" ได้ดีถ้าจัดการถูกวิธี
- ปัญหาที่พบบ่อยจาก Audit เว็บ WordPress จริง: Theme สร้าง H1 ซ้ำ, Metadata ซ้ำทั้งเว็บ, Schema ซ้อนกันจากหลาย Plugin, Page Builder ยัด `<div>` จนโครงสร้างเนื้อหาหาย, ภาพขนาดใหญ่เกินจำเป็น
- Plugin ที่ช่วยได้จริงกับ Plugin ที่ทำให้เว็บช้าลงโดยไม่จำเป็น - เกณฑ์การคัดเลือก
- ขอบเขตของสิ่งที่ Plugin ทำให้ได้ กับสิ่งที่ต้องเขียนโค้ดเอง

### GEO Audit สำหรับ WordPress

- Audit Checklist 20 ข้อสำหรับเว็บ WordPress: Metadata, Canonical, Heading, Schema, Sitemap, robots.txt, Performance, Content Structure
- ใช้ View Source / Query Monitor / PageSpeed Insights หาจุดที่ต้องแก้
- จัดลำดับความสำคัญแบบ Impact vs Effort เพื่อทำสิ่งที่ได้ผลมากที่สุดก่อน

### จัดการ Metadata, Canonical & Heading บน WordPress

- ตั้งค่า Rank Math / Yoast ให้ถูกหลัก: Title Template รายประเภทเนื้อหา, Meta Description ที่เขียนจริงไม่ใช่ auto-generate
- แก้ปัญหา Canonical ผิดจาก query string, Pagination และ Archive Page
- ตรวจและแก้ Heading Hierarchy ที่ Theme/Page Builder สร้างผิด - เทคนิคแก้ที่ Template ไม่ใช่แก้ทีละหน้า
- Open Graph ที่ถูกต้องสำหรับบทความ พร้อม article:published_time / modified_time

### ฉีด JSON-LD เข้า WordPress ด้วยโค้ดของเราเอง

- สร้าง Child Theme ที่ปลอดภัยต่อการอัปเดต และวางโครงไฟล์ให้จัดการ Schema ได้เป็นระบบ
- เขียนฟังก์ชันฉีด JSON-LD ผ่าน `wp_head` Hook: Organization/LocalBusiness, WebSite, Service, Article, Person, BreadcrumbList
- ดึงข้อมูลจริงจาก WordPress มาประกอบ Schema: `get_post_meta`, ACF Fields, Custom Post Type, Taxonomy
- **De-duplicate Schema:** ตรวจว่า Plugin SEO ออก Schema อะไรอยู่แล้ว แล้วปิด/รวมให้เหลือชุดเดียวที่ถูกต้อง
- จัดการ Escape และ Encoding ภาษาไทยใน JSON-LD บน PHP อย่างปลอดภัย

### FAQ System บน WordPress + FAQPage Schema

- ออกแบบโครงเก็บ FAQ ด้วย ACF Repeater หรือ Custom Post Type + Meta Field
- สร้าง Template Part แสดง FAQ Section บนหน้าบริการ พร้อมสร้าง FAQPage Schema อัตโนมัติจากข้อมูลเดียวกัน
- แนวทางเขียน FAQ แบบ answer-ready ให้ทีมคอนเทนต์ใช้งานผ่านหน้า Admin ได้เอง

### Content Structure & Performance บน WordPress

- ปรับโครงเนื้อหาให้ answer-ready: Inverted Pyramid, H2 แบบคำถาม, ตารางเปรียบเทียบ, ตัวเลขและแหล่งอ้างอิง
- Performance: Page Cache (WP Rocket / LiteSpeed Cache), Object Cache, ลด CSS/JS ที่ไม่ได้ใช้, Defer JS
- Image Optimization: WebP, ขนาดภาพตามจริง, Lazy Load และการเลือก Featured Image ที่เหมาะกับ og:image
- เป้าหมายที่วัดได้: TTFB, LCP และขนาด HTML ที่ควรอยู่ในเกณฑ์

### เมื่อไหร่ควรอยู่กับ WordPress ต่อ เมื่อไหร่ควรย้าย

- ตารางเปรียบเทียบ WordPress vs Astro SSG ในมิติ GEO, Performance, ต้นทุนดูแล และความยืดหยุ่นของทีมคอนเทนต์
- เส้นทาง Migration แบบค่อยเป็นค่อยไป และการรักษา URL/Redirect ไม่ให้เสียอันดับที่มีอยู่

**Workshop Day 3 (GeniusCorp WP):** รับเว็บ WordPress ที่มีปัญหา GEO ตามสภาพจริง แล้วลงมือแก้ทั้งชุด - ทำ Audit ตาม Checklist, แก้ Metadata/Canonical/Heading, สร้าง Child Theme ฉีด JSON-LD ครบทุก Schema, สร้าง FAQ ด้วย ACF พร้อม FAQPage Schema, ปรับ Performance แล้ววัดผลก่อน-หลังด้วย PageSpeed Insights และ Rich Results Test

---

# Day 4: E-E-A-T, llms.txt, Deployment & Measurement

## เป้าหมายของวันที่สี่

ผู้เรียนจะเสริมสัญญาณความน่าเชื่อถือ (E-E-A-T) และเนื้อหาแบบ answer-ready จากนั้นพาเว็บทั้งสองฝั่ง (Astro และ WordPress) ขึ้น Production จริงบน Apache/Nginx พร้อม Sitemap, robots.txt, llms.txt, ระบบ Rebuild อัตโนมัติ และวางระบบวัดผลการถูกอ้างอิงโดย AI

### E-E-A-T — สร้างความน่าเชื่อถือที่ AI ตรวจสอบได้

- E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness) สำคัญกับ GEO อย่างไร
- Author Box บนหน้าบทความ: รูป ชื่อ ตำแหน่ง ลิงก์ไปหน้าโปรไฟล์ทีมงาน - เชื่อมด้วย Person Schema
- วันที่เผยแพร่/แก้ไขแบบ machine-readable ด้วย `<time datetime="...">`
- ทำ Author Box และ Person Schema ทั้งบน Astro Component และ WordPress Template Part

### Answer-Ready Content Guidelines

- หลัก Inverted Pyramid: ย่อหน้าแรกตอบคำถามหลักจบใน 2-3 ประโยค ก่อนขยายรายละเอียด
- ใช้ H2 เป็นรูปแบบคำถาม, ใส่ตัวเลข/สถิติ/แหล่งอ้างอิง, ใช้ตารางและ bullet กับข้อมูลเปรียบเทียบ
- แนวทางส่งต่อ Guidelines ให้ทีมคอนเทนต์ทำงานร่วมกับนักพัฒนา (รวมถึงการวาง Template ใน WordPress Editor ให้ทีมเขียนตามได้ง่าย)

### Sitemap, robots.txt & llms.txt

- Generate sitemap.xml ตอน build ด้วยข้อมูล lastmod จริงจาก MySQL (ผ่าน Laravel API) - บทเรียนจาก sitemap ล้าสมัย 30,000 URLs
- ตรวจและปรับ Sitemap ที่ Plugin SEO สร้างให้บน WordPress ให้สะอาดและมี lastmod ที่ถูกต้อง
- แนวทาง Sitemap Index เมื่อ URL เกิน 50,000 รายการ
- เขียน robots.txt ที่เปิดรับ AI Crawlers อย่างถูกต้อง และชี้ Sitemap ของตนเอง
- สร้าง llms.txt ตามสเปก llmstxt.org: แผนที่เว็บฉบับ AI - ทั้งแบบ generate อัตโนมัติตอน build บน Astro และแบบ generate จากเนื้อหา WordPress ด้วย PHP

### Performance for GEO

- จุดแข็งของ Astro: Zero-JS by Default ทำให้ HTML เบาและเร็วตั้งแต่ต้น
- Image Optimization ด้วย astro:assets: WebP, ขนาดภาพตามจริง, loading="lazy"
- เปิด gzip/brotli บน Apache/Nginx และเป้าหมายที่วัดได้: TTFB < 0.4s, HTML < 150KB
- เปรียบเทียบตัวเลข Performance จริงระหว่าง GeniusCorp Modern กับ GeniusCorp WP หลังปรับแต่งแล้ว

### Production Deployment บน Apache/Nginx

- โครงสร้าง Deploy: Static files จาก `astro build` + Laravel API + MySQL บนเซิร์ฟเวอร์เดียวหรือแยกกัน
- Deploy WordPress อย่างปลอดภัย: สิทธิ์ไฟล์, wp-config, การปิดช่องทางที่ไม่ใช้ และ Backup ก่อนแก้ทุกครั้ง
- ตั้งค่า Virtual Host, HTTPS และ Redirect (http→https, non-www→www) อย่างถูกต้อง
- ระบบ Rebuild อัตโนมัติ: Webhook / Deploy Script สั่ง build ใหม่เมื่อเนื้อหาในฐานข้อมูลเปลี่ยน - แก้จุดอ่อนสำคัญของ SSG

### Measurement & Monitoring — รู้ได้อย่างไรว่า AI ค้นเจอเราแล้ว

- ตั้งค่า Google Search Console และ Bing Webmaster Tools (Bing สำคัญเพราะป้อนข้อมูลให้ ChatGPT Search / Copilot)
- ตรวจ Server Log หา User-Agent ของ AI Crawlers: GPTBot, OAI-SearchBot, ClaudeBot, Claude-SearchBot, PerplexityBot, Google-Extended
- แผนทดสอบรายเดือน: ถาม ChatGPT / Perplexity / Claude / Gemini ด้วยคำถามเป้าหมาย แล้วบันทึกว่าเว็บถูกอ้างอิงหรือไม่
- GEO-Ready Checklist ฉบับสมบูรณ์ (ฉบับ Astro และฉบับ WordPress) สำหรับนำไปใช้กับโปรเจกต์จริงของตนเอง

**Workshop Day 4 (Master Workshop · GeniusCorp):** ประกอบร่างเว็บให้สมบูรณ์ทั้งสองฝั่ง - เพิ่ม Author Box + E-E-A-T signals, Generate sitemap.xml และ llms.txt จากข้อมูลจริง, Deploy ขึ้น Apache/Nginx พร้อม gzip และ HTTPS, ตั้ง Webhook Rebuild อัตโนมัติ และตรวจผ่าน GEO-Ready Checklist ครบทุกข้อ พร้อมเปรียบเทียบผลลัพธ์ระหว่าง Astro SSG กับ WordPress

---

## เรียนจบแล้วได้อะไร

- **เข้าใจ GEO/AEO ระดับ Implementation:** รู้ว่า AI Search เลือกอ้างอิงเว็บอย่างไร และลงมือทำได้จริงทุกเทคนิค ไม่ใช่แค่ทฤษฎี
- **Full Stack สมัยใหม่ครบวงจร:** สร้างเว็บ Astro SSG + Laravel API + MySQL/MariaDB ได้ตั้งแต่ศูนย์จนถึง Deploy
- **ทำ GEO บน WordPress ได้จริง:** Audit เว็บเดิม แก้ Metadata/Heading/Canonical ฉีด JSON-LD ด้วยโค้ดของตัวเอง สร้าง FAQ Schema และปรับ Performance ให้ผ่านเกณฑ์
- **Structured Data ครบทุก Schema:** เขียน JSON-LD ทั้ง Organization/LocalBusiness, Service, Article, Person, BreadcrumbList และ FAQPage พร้อม Validate ผ่าน และรู้แนวทางปรับใช้กับ Product / Course / Event
- **Technical SEO/GEO แม่นยำ:** จัดการ Canonical, Metadata, OG Tags, Heading Hierarchy, Sitemap, robots.txt และ llms.txt ได้ถูกต้องตามมาตรฐาน
- **E-E-A-T และ Answer-Ready Content:** สร้างสัญญาณความน่าเชื่อถือและโครงสร้างเนื้อหาที่เพิ่มโอกาสถูก AI อ้างอิง
- **Deploy Production ได้จริง:** นำเว็บขึ้น Apache/Nginx พร้อม HTTPS, Compression และระบบ Rebuild อัตโนมัติ โดยไม่ต้องมี Node.js บนเซิร์ฟเวอร์
- **ตัดสินใจเชิงสถาปัตยกรรมได้:** รู้ว่าโปรเจกต์ไหนควรอยู่กับ WordPress ต่อ โปรเจกต์ไหนควรย้ายไป Astro SSG และมีเส้นทาง Migration ที่ปลอดภัย
- **วัดผลเป็นระบบ:** ติดตาม AI Crawlers จาก Server Log และทดสอบการถูกอ้างอิงใน AI Engines ได้ด้วยตนเอง
- **GEO-Ready Checklist + Starter Code:** เอกสารและโค้ดตัวอย่างทั้งฉบับ Astro และฉบับ WordPress พร้อมนำไปปรับใช้กับโปรเจกต์จริงทันทีหลังจบคอร์ส

---

## ขอบเขตของหลักสูตร

หลักสูตรนี้มุ่งเน้นแก่นของการทำ GEO/AEO ในระดับโค้ดบนสองสถาปัตยกรรมหลัก คือ Astro SSG + Laravel API และ WordPress โดยตัดเนื้อหาที่ไม่ใช่แก่นออก เช่น การทำ UI/UX ขั้นสูง, การเขียน WordPress Theme จากศูนย์, ระบบ Admin Panel เต็มรูปแบบ, WooCommerce และการตลาดคอนเทนต์เชิงลึก เพื่อให้เวลา 12 ชั่วโมงโฟกัสที่ Structured Data, Technical GEO, Deployment และ Measurement อย่างเต็มที่ ผู้เรียนควรมีพื้นฐาน PHP/Laravel, WordPress เบื้องต้น และ HTML ตามที่ระบุไว้ เพื่อให้ได้ประโยชน์สูงสุดจากการอบรมเชิงปฏิบัติการ

---

## สิ่งที่ควรเตรียมมาก่อนเรียน

- คอมพิวเตอร์ที่ติดตั้ง PHP 8.3+, Composer, Node.js LTS (ใช้เฉพาะเครื่องพัฒนา), MySQL/MariaDB และ VS Code พร้อมใช้งาน
- ติดตั้ง Laragon / XAMPP / Docker อย่างใดอย่างหนึ่งสำหรับรัน Laravel + MySQL + WordPress ในเครื่อง
- ติดตั้ง WordPress ในเครื่อง (Local) เตรียมไว้ 1 ชุด สำหรับ Workshop วันที่ 3 - จะมีไฟล์ Demo Site ให้ Import
- บัญชี Git และเครื่องมือพื้นฐาน เช่น Postman หรือ Thunder Client
- อินเทอร์เน็ตเสถียรสำหรับเข้าเรียนผ่าน Zoom (แนะนำจอที่สอง เพื่อดูสาธิตพร้อมพิมพ์โค้ดตาม)
- ความพร้อมที่จะลงมือทำ Workshop และทดลองแก้ปัญหาจริงตลอดทั้ง 4 วัน

---

## ข้อมูลผู้สอน

**อ.สามิตร โกยม**
ผู้สอนและผู้พัฒนาซอฟต์แวร์ที่มีประสบการณ์กว่า 15 ปี ถ่ายทอดความรู้ด้าน Web Development, Mobile App Development, AI Tools และการประยุกต์ใช้เทคโนโลยีในงานจริงให้กับผู้เรียนและองค์กรจำนวนมาก

จุดเด่นของการสอนคือการอธิบายเรื่องเทคนิคให้เข้าใจง่าย เชื่อมโยงกับงานจริง และพาผู้เรียนลงมือทำจนเห็นผลลัพธ์ด้วยตัวเอง

---

## แหล่งอ้างอิงหลักของหลักสูตร

- Aggarwal et al. (Princeton) — *GEO: Generative Engine Optimization* (arXiv:2311.09735)
- Google Search Central — Structured data documentation: https://developers.google.com/search/docs/appearance/structured-data
- Schema.org — Organization / Service / FAQPage / NewsArticle / Person: https://schema.org
- llms.txt specification: https://llmstxt.org
- Astro Documentation: https://docs.astro.build
- Laravel Documentation: https://laravel.com/docs
- WordPress Developer Resources — Plugin/Theme Handbook & Hooks: https://developer.wordpress.org
- Google Rich Results Test: https://search.google.com/test/rich-results
- Schema Validator: https://validator.schema.org
- PageSpeed Insights: https://pagespeed.web.dev
- Bing Webmaster Tools: https://www.bing.com/webmasters

---

> **จัดอบรมโดย**
> สถาบันไอทีจีเนียส เอ็นจิเนียริ่ง — โทร. 02-570-8449 | มือถือ 088-807-9770
> เว็บไซต์: www.itgenius.co.th
