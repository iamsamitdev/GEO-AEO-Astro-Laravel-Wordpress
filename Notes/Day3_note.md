# ทำเว็บให้ติดอันดับ AI Search 2026 - วันที่ 3: WordPress GEO/AEO - ทำเว็บเดิมให้ AI อ้างอิงได้

**หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ: ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO Full Stack Modern Web)**
**วันที่ 3: GEO Retrofit บน WordPress - Audit, Metadata/Canonical/Heading, ฉีด JSON-LD ด้วย Child Theme, FAQ ด้วย ACF และ Performance**
วันที่: เสาร์ที่ 12 กันยายน 2569 | เวลา 20:30-23:30 น. | ออนไลน์ผ่าน Zoom (บันทึกวิดีโอย้อนหลัง)
ผู้สอน: อ.สามิตร โกยม

---

## 🎯 วัตถุประสงค์การเรียนรู้ประจำวัน

เมื่อจบการอบรมวันที่ 3 ผู้เรียนจะสามารถ:

1. อธิบายได้ว่า WordPress เรนเดอร์ HTML อย่างไร เหตุใดจึงยัง "AI-readable" และอะไรใน Theme/Plugin/Page Builder ที่ทำให้มันเสียไป
2. ทำ **GEO Audit** เว็บ WordPress ด้วย Checklist 20 ข้อ โดยใช้ View Source, Query Monitor และ PageSpeed Insights แล้วจัดลำดับงานแบบ Impact vs Effort
3. ตั้งค่า Rank Math / Yoast ให้ถูกหลัก (Title Template, Meta Description ที่เขียนจริง, Canonical, OG) และแก้ Canonical ที่ผิดจาก query string, Pagination และ Archive
4. แก้ Heading Hierarchy ที่ Theme/Page Builder สร้างผิด **ที่ระดับ Template** ไม่ใช่ทีละหน้า
5. สร้าง **Child Theme** ที่ปลอดภัยต่อการอัปเดต และเขียนโค้ดฉีด JSON-LD ผ่าน `wp_head` ครบทุก Schema (Organization/LocalBusiness, WebSite, Service, Article, Person, BreadcrumbList) จากข้อมูลจริงใน WordPress
6. **De-duplicate Schema** โดยตรวจว่า Plugin SEO ออก Schema อะไร แล้วปิด/รวมให้เหลือชุดเดียวที่ถูกต้อง พร้อมจัดการ Encoding ภาษาไทยใน PHP
7. สร้างระบบ FAQ ด้วย ACF Repeater บน Custom Post Type `service` แสดงผลด้วย Template Part และสร้าง FAQPage Schema อัตโนมัติจากข้อมูลเดียวกัน
8. ปรับ Performance ของ WordPress (Page Cache, WebP, Lazy Load, ลด CSS/JS) ให้ TTFB, LCP และขนาด HTML อยู่ในเกณฑ์ และวัดผลก่อน-หลังได้
9. ตัดสินใจได้ว่าโปรเจกต์ควรอยู่กับ WordPress ต่อหรือย้ายไป Astro SSG และวางเส้นทาง Migration ที่รักษา URL/อันดับเดิม (Workshop Day 3)

> **หมายเหตุ:** วันนี้ใช้เว็บ **GeniusCorp WP** - เว็บ WordPress ที่มีเนื้อหาเหมือน GeniusCorp Modern แต่ถูกสร้างให้ "มีปัญหา GEO ครบชุด" ตามที่พบจริงในเว็บองค์กรทั่วไป เป้าหมายคือทำให้เว็บนี้ผ่าน Checklist ให้ได้มากที่สุดภายในคืนนี้ โดยใช้หลักการทั้งหมดจาก Day 2 แต่ลงมือด้วย PHP/WordPress
>
> กติกาการเขียนโค้ด: **PHP ใส่ semicolon ตามปกติ** และยึด WordPress Coding Standards (ใช้ `wp_json_encode`, `esc_*`, `sanitize_*` และ prefix ฟังก์ชันด้วย `gc_` ทุกตัว)

---

## 🧭 กำหนดการวันที่ 3 (โดยสังเขป)

| เวลา        | หัวข้อ                                                                                        |
| ----------- | --------------------------------------------------------------------------------------------- |
| 20:30-20:45 | Import เว็บ GeniusCorp WP (Demo Site) + ทัวร์ปัญหาที่ตั้งใจใส่ไว้                                |
| 20:45-21:05 | **Module 1** WordPress ในสายตา AI Crawlers                                                     |
| 21:05-21:30 | **Module 2** GEO Audit สำหรับ WordPress (Checklist 20 ข้อ + เครื่องมือ + Impact vs Effort)     |
| 21:30-21:55 | **Module 3** จัดการ Metadata, Canonical & Heading บน WordPress                                 |
| 21:55-22:40 | **Module 4** ฉีด JSON-LD เข้า WordPress ด้วย Child Theme + De-duplicate Schema                  |
| 22:40-23:00 | **Module 5** FAQ System บน WordPress ด้วย ACF + FAQPage Schema                                  |
| 23:00-23:15 | **Module 6** Content Structure & Performance บน WordPress                                       |
| 23:15-23:20 | **Module 7** เมื่อไหร่ควรอยู่กับ WordPress ต่อ เมื่อไหร่ควรย้าย                                    |
| 23:20-23:30 | **Workshop Day 3** วัดผลก่อน-หลัง + Checklist                                                   |

---

## ✅ Import เว็บ GeniusCorp WP และทัวร์ปัญหา

### เวลา 20:30-20:45 น.

**ขั้นที่ 0 - ตรวจ theme และ plugin ที่ต้องมีก่อนเริ่ม** (ตามที่ precourse ส่วน B2 ให้เตรียมไว้ ถ้ายังไม่ได้ทำให้ทำตอนนี้ ใช้เวลา ~5 นาที)

**0.1 Theme: ติดตั้งและเปิดใช้ Astra (ฟรี) ก่อน Import**

WordPress ติดตั้งใหม่มาพร้อม theme **Twenty Twenty-Five** ซึ่งเป็น **block theme (Full Site Editing)**: header/footer เป็นไฟล์ `.html` ใน `templates/` และ `parts/` แก้ผ่าน Site Editor ไม่มี `header.php` / `single.php` ให้ override และไม่มี filter ชื่อ site title ส่วน Child Theme `geniuscorp-geo` ที่เราจะเขียนวันนี้เป็น **classic theme** (`single-service.php`, `archive-service.php` เรียก `get_header()` / `get_footer()`) ถ้าเปิดบน Twenty Twenty-Five หน้าบริการจะออกมาไม่มี header/footer ของ theme และโค้ด heading ใน Module 3.4 จะไม่ทำงาน ดังนั้น:

1. Appearance → Themes → **Add New Theme** → ค้นหา **Astra** → Install → **Activate** (ข้อความชวนติดตั้ง "Starter Templates" ปิดได้เลย ไม่ต้องใช้)
2. ตรวจ: Appearance → Themes แสดง **Astra: Active** และเมนู Appearance มี **Customize** (ถ้าเห็น **Editor** แทน แสดงว่ายังเป็น block theme อยู่)

เหตุผลที่คอร์สเลือก Astra: เป็น classic theme ที่เว็บองค์กรไทยใช้กันมาก (active installs 1 ล้าน+ บน wordpress.org) มี filter `astra_site_title_tag` ให้แก้ tag ของโลโก้โดยไม่ต้อง override template และมี Schema แบบ microdata ในตัว (attribute `itemtype` / `itemprop` ในแท็ก HTML) ซึ่งเป็นตัวอย่างจริงของ "Schema ซ้อนกันหลายแหล่ง" ในปัญหาข้อ 6 · ผู้เรียนที่ใช้ GeneratePress หรือ Kadence กับเว็บจริงทำได้เหมือนกัน (`geo-headings.php` มี filter ของทั้ง 3 theme) แต่ในคลาสขอให้ใช้ Astra เพื่อให้ทุกคนเห็นผลตรงกัน

**0.2 Plugin**

Child Theme `geniuscorp-geo` **พึ่งพา plugin 2 ตัว** และใช้อีก 2 ตัวเป็นเครื่องมือ ตรวจที่ Plugins → Installed Plugins ให้สถานะตรงตามตารางนี้ก่อน Import:

| Plugin | สถานะที่ต้องเป็นตอนนี้ | ใช้ทำอะไร / ใช้ใน Module ไหน | ไฟล์ใน Child Theme ที่พึ่งพา |
| --- | --- | --- | --- |
| **Rank Math SEO** (หรือ Yoast SEO ถ้าถนัดกว่า) | **เปิดใช้งาน (Active)** | Title / Meta / Canonical / OG / Sitemap (Module 3) และเป็นตัวที่เราต้อง "ปิด Schema" ของมัน (Module 4) | `geo-cleanup.php`, `geo-metadata.php`, `geo-post-types.php`, `geo-llms.php` (Day 4) |
| **Advanced Custom Fields (ACF)** | **เปิดใช้งาน (Active)** | ฟิลด์ราคา/ระยะเวลา/FAQ ของบริการ (Module 4-5) และตำแหน่ง/social ของผู้เขียน (Day 4) | `geo-post-types.php`, `geo-faq.php`, `geo-eeat.php` (Day 4) |
| **Query Monitor** | ติดตั้งไว้ เปิดได้เลย (ใช้เฉพาะเครื่องพัฒนา) | หา query/scripts/hook ที่ทำให้ช้า และหาชื่อ callback ของ theme ที่ต้อง remove (Module 2, 4) | ไม่ผูกกับโค้ด |
| **LiteSpeed Cache** (หรือ WP Super Cache / WP Rocket) | ติดตั้งไว้ **แต่ห้ามเปิด** จนถึง Module 6 | Page cache, minify, WebP (Module 6) | ไม่ผูกกับโค้ด |

> 📌 **ถ้าไม่มี ACF จะเกิดอะไร:** Child Theme ไม่พัง (ทุกจุดครอบด้วย `function_exists('get_field')`) แต่หน้า Admin จะไม่มีช่องกรอกราคา/FAQ/ตำแหน่งผู้เขียน ทำให้ Service Schema ไม่มี `Offer`, ไม่มี FAQPage และ Person ไม่มี `jobTitle` · **ถ้าไม่มี Rank Math/Yoast:** จะไม่มีใครสร้าง Title/Description/Canonical/OG/Sitemap เพราะ Child Theme ตั้งใจไม่เขียนส่วนนี้เอง (ดูขอบเขต plugin vs โค้ดใน Module 1.4)
>
> 📌 **ACF ฟรี vs ACF PRO:** ฟิลด์ FAQ แบบ Repeater ต้องใช้ **ACF PRO** ถ้ามีเฉพาะ ACF ฟรี โค้ดใน `geo-faq.php` จะสลับไปใช้ Custom Post Type `faq` แยกให้อัตโนมัติ (อธิบายใน Module 5.1) ผลลัพธ์ปลายทางเหมือนกัน
>
> ⚠️ **ห้ามเปิด plugin cache ตอนนี้** เพราะจะเก็บหน้าเว็บไว้ ทำให้แก้โค้ดแล้วไม่เห็นผล เดี๋ยวเปิดพร้อมกันตอนวัด Performance ใน Module 6

**ขั้นที่ 1 - Import Demo Site** (เว็บ WordPress เปล่าที่เตรียมไว้ตาม precourse ส่วน B)

ไฟล์ Demo Site เป็น **WordPress eXtended RSS (.xml)** Import ได้ด้วยเครื่องมือในตัว WordPress ไม่ต้องติดตั้ง plugin เสริม และ **ไม่มีผู้ใช้/รหัสผ่านใด ๆ ในไฟล์** ผู้เรียนใช้บัญชี admin ที่สร้างเองตอนติดตั้ง WordPress

| สิ่งที่ต้องมี | อยู่ที่ไหน |
| --- | --- |
| `geniuscorp-wp-demo.xml` (Demo Site) | โฟลเดอร์โค้ดเฉลย `Code/Day3/geniuscorp-wp/demo-site/` หรือแตกจาก `Code/geniuscorp-Day3-solution.zip` → `geniuscorp-wp/demo-site/` |
| `README.md` (วิธี Import + รายการปัญหาที่ใส่ไว้) | โฟลเดอร์เดียวกัน |
| `fix-lastmod-after-import.sql` (ใช้ท้าย Day 3 / Day 4) | `Code/Day4/geniuscorp-wp/demo-site/` |

ขั้นตอน Import:

1. เข้า `http://geniuscorp.test/wp-admin` → **Tools → Import** → แถว **WordPress** กด **Install Now** แล้วกด **Run Importer**
2. **Choose File** → เลือก `geniuscorp-wp-demo.xml` → **Upload file and import**
3. หน้า Assign Authors: เลือก **assign posts to an existing user** = บัญชี admin ของคุณ (ไม่ต้องติ๊ก Download and import file attachments เพราะ Demo ไม่มีรูป) → **Submit** รอจนขึ้น "All done. Have fun!"
4. **Settings → Reading** → Your homepage displays = **A static page** → Homepage = **หน้าแรก**, Posts page = **บทความ** → Save Changes
5. **Settings → Permalinks** → เลือก **Post name** → Save Changes (flush rewrite rules)
6. เปิด `http://geniuscorp.test/` ต้องเห็นหน้าแรก, `/services/` (หน้า "บริการ"), `/blog/` และ `/web-development/` ถ้า theme ไม่แสดงเมนูให้สร้างที่ Appearance → Menus (ใส่หน้า หน้าแรก, เกี่ยวกับเรา, บริการ, บทความ, ติดต่อเรา)
7. **Settings → General** (ตั้งค่า → ทั่วไป) → ชื่อเว็บ = `GeniusCorp` และช่อง **คำโปรย (Tagline)** วางข้อความนี้ทั้งบรรทัด:
   `บริษัทพัฒนาเว็บ แอป ซอฟต์แวร์ ERP CRM ครบวงจร ราคาถูก คุณภาพดี บริการทั่วประเทศ รับทำเว็บไซต์ รับเขียนโปรแกรม รับทำแอป`
   แล้ว Save Changes (ตั้งใจให้ยาวและยัด keyword เพื่อจำลอง "ปัญหาข้อ 3": Rank Math ค่าเริ่มต้นใช้ Tagline (`%sitedesc%`) ใน **Title ของหน้าแรก** และ theme ส่วนใหญ่แสดง Tagline ใต้โลโก้หรือใน footer ทุกหน้า เราจะแก้ใน Module 3) · หมายเหตุ: WordPress Importer นำเข้าเฉพาะโพสต์/หน้า/หมวดหมู่ ไม่แตะ Settings จึงต้องตั้งเองข้อนี้

ตรวจผลก่อนไปต่อ: เปิด `view-source:http://geniuscorp.test/web-development/` ควรเห็น `<h1` **2 ตัว** (ของ theme + ในเนื้อหา), `application/ld+json` **1 block** ของ Rank Math ที่มี `"@type":"Article"` และ `"name":"..."` ขององค์กรเป็นชื่อเก่าจากตอนติดตั้ง WordPress, `<meta name="description"` เป็นย่อหน้าแนะนำบริษัท, และ `<title>` สั้น (`รับพัฒนาเว็บไซต์องค์กร - GeniusCorp`) ถ้าได้แบบนี้แปลว่า "สภาพก่อน Retrofit" ถูกต้องแล้ว

> ⛔ **ถ้า Import ไม่ขึ้นหน้า Assign Authors หรือ error "This does not appear to be a WXR file":** ตรวจว่าเลือกไฟล์ `.xml` ไม่ใช่ `.zip` และไฟล์ไม่ถูกเปิดแก้ด้วย Word/Notepad จนเปลี่ยน encoding · **ถ้าอัปโหลดไม่ได้เพราะไฟล์ใหญ่กว่า `upload_max_filesize`:** ไฟล์นี้ขนาดเพียง ~42 KB จึงไม่ควรเกิด ถ้าเกิดให้ตรวจ php.ini ของ Laragon

**ขั้นที่ 2 - ทัวร์ปัญหาที่ตั้งใจใส่ไว้ใน Demo Site** (ตรงกับที่พบใน Audit เว็บจริงทั้งหมด)

| # | ปัญหาใน GeniusCorp WP                                                                | ที่มาจาก Audit จริง           | แก้ใน Module |
| - | ------------------------------------------------------------------------------------ | ----------------------------- | ------------ |
| 1 | หน้าบริการมี `<h1>` **ในเนื้อหา** (คนเขียนใส่เองใน editor) ซ้อนกับ `<h1 class="entry-title">` ที่ theme ใส่ให้ → H1 ซ้ำ 2 ตัว (theme บางตัวยังทำโลโก้เป็น `<h1>` ทุกหน้าซ้ำอีกชั้น; Astra ทำโลโก้เป็น H1 เฉพาะหน้าแรก) | Theme/เนื้อหา สร้าง H1 ซ้ำ    | 3            |
| 2 | หน้าแรก: เนื้อหา **ไม่มี H1** (hero เป็น `div`, ตัวเลขสถิติเป็น `h2`) H1 เดียวที่มีคือชื่อเว็บจากโลโก้ซึ่งบอกแค่ "GeniusCorp" ไม่บอกว่าทำอะไร + หน้ารวมบริการทำการ์ดเป็น `<h2>` 8 ตัว | Heading เป็น noise, หน้าแรกไม่มี H1 | 3       |
| 3 | Tagline ที่ตั้งไว้ในขั้นที่ 1 ข้อ 7 ยาว 100+ ตัวอักษรแบบ keyword stuffing → Rank Math ค่าเริ่มต้นของหน้าแรก `%sitename% %page% %sep% %sitedesc%` ทำให้ **Title หน้าแรกยาว 120+ ตัวอักษร** และ theme แสดง Tagline ใต้โลโก้/ใน footer ทุกหน้า (หน้าอื่น Title ยังสั้นเพราะค่าเริ่มต้นคือ `%title% %sep% %sitename%` แต่เว็บจริงจำนวนมากถูกแก้ให้ต่อ `%sitedesc%` ทุกหน้า) | Title ยาว + keyword stuffing | 3            |
| 4 | Meta description ว่างทุกหน้า → Rank Math auto-generate จากย่อหน้าแรกที่เป็น boilerplate  | description boilerplate       | 3            |
| 5 | มี `?utm_source=`, `?ref=` และหน้า `/services/?page=2` ที่ canonical ชี้ผิด             | ไม่มี/ผิด Canonical           | 3            |
| 6 | Rank Math เปิด Schema "Article" ให้ **ทุก post type** รวมหน้าบริการ + Theme ฉีด Organization ของตัวเอง + Page Builder ฉีด WebPage → Schema ซ้อน 3 ชุด ขัดกัน | Schema ซ้ำจากหลาย Plugin | 4 |
| 7 | ไม่มี Person/Author ไม่มี BreadcrumbList ไม่มี Service Schema                           | ไม่มี JSON-LD ที่ต้องการ       | 4            |
| 8 | บริการเป็น Page ธรรมดา ไม่มี Custom Post Type ไม่มี FAQ                                  | ไม่มี FAQ section             | 5            |
| 9 | รูป Featured Image 4000×3000 px JPEG 2.8MB ทุกหน้า ไม่มี WebP ไม่มี lazy load             | ภาพใหญ่เกินจำเป็น              | 6            |
| 10 | เปิด Plugin 23 ตัว (slider 2 ตัว, contact form 2 ตัว, page builder + addon 5 ตัว) ไม่มี cache | Plugin ทำเว็บช้า, HTML 480KB | 6           |
| 11 | robots.txt เป็นค่าเริ่มต้นและ sitemap ของ Rank Math มี `lastmod` เท่ากันทุก URL (เพราะ import) | Sitemap lastmod ไม่จริง      | Day 4        |
| 12 | ไม่มี llms.txt                                                                        | ไม่มี llms.txt                | Day 4        |

> 📌 **ปัญหาไหนอยู่ในไฟล์ Demo (.xml) และปัญหาไหนมาจากเครื่องของผู้เรียน:** ไฟล์ WXR นำเข้าได้เฉพาะ "เนื้อหา" (หน้า โพสต์ หมวดหมู่ tagline) จึงมีปัญหาข้อ **1, 2, 4, 8, 11** ติดมาในไฟล์ ข้อ **3** ผู้เรียนตั้งเองในขั้นที่ 1 ข้อ 7 (Tagline) ส่วนข้อ **5, 6, 7, 9, 10, 12** ขึ้นกับ theme/plugin/รูปที่ติดตั้งบนเครื่อง: ข้อ 6-7 เห็นทันทีเมื่อเปิด Rank Math + Astra ตามขั้นที่ 0 (Rank Math: Schema Type ค่าเริ่มต้น = Article ทุก post type, `og:site_name` และ Organization ใน `@graph` ยังเป็นชื่อเว็บเก่าจากตอนติดตั้ง WordPress หรือจาก Setup Wizard; Astra: microdata `itemtype` ซ้อนอีกชั้น); ข้อ 9-10 ผู้สอนสาธิตจากเว็บตัวอย่างบนเครื่องผู้สอน ผู้เรียนที่ต้องการทดลองเองให้อัปโหลดรูป JPEG ขนาดใหญ่ 1 รูปเป็น Featured Image และเปิด plugin ที่มีอยู่แล้วในเครื่องเพิ่ม 2-3 ตัว

> 🧪 **ก่อนแก้อะไร ให้วัดค่าเริ่มต้นไว้ก่อน** (Workshop ท้ายวันจะเทียบก่อน-หลัง): เปิด `view-source:http://geniuscorp.test/` นับ `<h1`, นับ `application/ld+json`, ดูขนาดหน้า (DevTools → Network → Doc → Size) และรัน Query Monitor ดูจำนวน query กับเวลา (ยังไม่ต้องรัน PageSpeed เพราะเว็บอยู่ในเครื่อง จะวัดจริงตอน Deploy ใน Day 4 หรือใช้ Lighthouse ใน Chrome DevTools แทน)

---

## 📚 Module 1: WordPress ในสายตา AI Crawlers

### เวลา 20:45-21:05 น.

> 💡 **หัวใจของ Module นี้:** WordPress เรนเดอร์ HTML ด้วย PHP ฝั่งเซิร์ฟเวอร์ ซึ่งในมุม AI Crawlers คือสถาปัตยกรรม "SSR" ที่อ่านได้ครบ 100% เช่นเดียวกับ Astro SSG ปัญหาไม่ได้อยู่ที่ WordPress แต่อยู่ที่สิ่งที่ Theme, Page Builder และ Plugin ใส่เพิ่มเข้ามาจน HTML เต็มไปด้วย noise และสัญญาณที่ขัดแย้งกัน

---

### 1.1 WordPress เรนเดอร์ HTML อย่างไร (และ hook ที่เราจะใช้อยู่ตรงไหน)

```
Request /services/web-development/
   │
   ▼
index.php → wp-load.php → wp-settings.php   (โหลด core + plugins ที่ active ทั้งหมด + theme functions.php)
   │
   ▼
WP::main() → parse_request → WP_Query (query หลัก: post_type=service, name=web-development)
   │
   ▼
template-loader.php → เลือกไฟล์ template ตาม Template Hierarchy
   │      single-service.php → single.php → singular.php → index.php
   ▼
Theme template รัน:
   get_header()  ─▶ header.php ─▶ wp_head()   ◀── Plugin SEO, Theme, Page Builder และ "เรา" ฉีด <meta>, JSON-LD ตรงนี้
   the_content() ─▶ เนื้อหา + shortcode/blocks ของ Page Builder ถูก render เป็น HTML
   get_footer()  ─▶ footer.php ─▶ wp_footer() ◀── JS ของ plugin ทั้งหลาย
   │
   ▼
HTML สมบูรณ์ส่งกลับ (ถ้ามี Page Cache: เก็บไฟล์ HTML นี้ไว้ ส่งซ้ำได้โดยไม่ต้องรัน PHP)
```

สิ่งที่ต้องเข้าใจ:

| ประเด็น                                           | ความหมายกับ GEO                                                                                                 |
| ------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- |
| HTML ครบจากเซิร์ฟเวอร์                              | AI crawlers อ่านได้ทันที **ยกเว้น** เนื้อหาที่ Page Builder/Plugin โหลดด้วย AJAX/JS ทีหลัง (เช่น tab, accordion บางตัว, infinite scroll) |
| `wp_head()` คือจุดรวมของทุกคนที่อยากใส่อะไรใน `<head>` | Rank Math ใส่ title/meta/canonical/OG/Schema, Theme ใส่ของตัวเอง, Page Builder ใส่ CSS inline หลายร้อย KB และ **Schema ของตัวเอง** → นี่คือต้นเหตุ Schema ซ้ำ |
| Template Hierarchy                                 | เราแก้ Heading/โครงสร้างที่ไฟล์ template ใน Child Theme ครั้งเดียว มีผลทุกหน้าของ post type นั้น                     |
| ทุก request รัน PHP + query DB (ถ้าไม่มี cache)      | TTFB สูง (0.8-2s) → ต้องมี Page Cache จึงจะแข่งกับ SSG ได้ในมิติ Performance                                     |

### 1.2 ปัญหาที่พบบ่อยจาก Audit เว็บ WordPress จริง

| ปัญหา                                                      | ต้นเหตุ                                                                  | ผลต่อ AI                                                                       |
| ---------------------------------------------------------- | ------------------------------------------------------------------------ | ------------------------------------------------------------------------------ |
| **H1 ซ้ำ** (โลโก้ + ชื่อเรื่อง) หรือ **ไม่มี H1** ในหน้าแรก | Theme ใช้ `<h1 class="site-title">` ทุกหน้า / หน้าแรกสร้างด้วย Page Builder ที่ heading เป็น `<div>` | AI ไม่รู้ว่า "หัวข้อหลัก" ของหน้าคืออะไร                                       |
| **Metadata ซ้ำทั้งเว็บ**                                    | Title template ใส่ keyword ยาวเหมือนกันทุกหน้า, description ว่างให้ plugin auto | ทุกหน้า "ดูเหมือนกัน" ไม่มีเหตุผลอ้างอิงหน้าใดหน้าหนึ่ง                            |
| **Schema ซ้อนกัน 2-4 ชุด**                                  | Rank Math/Yoast + Theme (Astra, GeneratePress, Avada ฯลฯ มี Schema ในตัว) + Page Builder + plugin review/FAQ | สัญญาณขัดแย้ง: Organization 3 ชื่อ, Article บนหน้าบริการ, WebPage 2 ตัว `@id` ต่างกัน |
| **Page Builder ยัด `<div>`** 15-20 ชั้น และ heading เป็น `<span>` | Elementor/WPBakery/Divi สร้าง markup ของตัวเอง                          | เนื้อหาถูกฝังลึก, chunking ของ AI ไม่เห็นโครงสร้าง, HTML ใหญ่ 300-600KB           |
| **ภาพขนาดเต็ม** 3-5MB                                       | อัปโหลดจากกล้องตรง ๆ ไม่มี resize/WebP                                   | LCP ช้า, crawler budget หมดไปกับรูป                                              |
| **Plugin 20-40 ตัว**                                        | สะสมมาหลายปี ไม่มีใครกล้าลบ                                              | CSS/JS หลายสิบไฟล์ต่อหน้า, TTFB สูง, ความเสี่ยงด้านความปลอดภัย                      |
| **เนื้อหาซ่อนใน tab/accordion ที่โหลดด้วย AJAX**            | Widget ของ Page Builder                                                  | AI ไม่เห็นเนื้อหาส่วนนั้นเลย                                                      |
| **Canonical ชี้ผิด**                                        | Plugin SEO ตั้ง canonical เป็น URL ที่มี query, หรือหน้า paginated ชี้ไปหน้าแรก | URL ซ้ำหรือหน้า 2-3 ถูกมองเป็นซ้ำหน้าแรก                                          |

### 1.3 Plugin ที่ช่วยได้จริง กับ Plugin ที่ทำให้ช้าลงโดยไม่จำเป็น

เกณฑ์การคัดเลือก Plugin สำหรับเว็บที่ต้องการ GEO (ใช้เป็น policy ขององค์กรได้):

1. **ทำสิ่งที่โค้ด 20 บรรทัดทำไม่ได้** (SEO plugin, cache, ACF) ไม่ใช่สิ่งที่ `functions.php` ทำได้ (ปิด emoji, เพิ่ม CPT, ใส่ Schema)
2. **ไม่ฉีด CSS/JS ทุกหน้า** ถ้าใช้แค่หน้าเดียว (ตรวจด้วย Query Monitor → Scripts/Styles)
3. **มีการอัปเดตภายใน 6 เดือน** และรองรับ PHP 8.3
4. **ไม่ทำหน้าที่ซ้ำกับตัวที่มี** (slider 2 ตัว, form 2 ตัว, SEO 2 ตัว = ต้องเลือกหนึ่ง)
5. **Schema ต้องมาจากแหล่งเดียว** (ปิดของตัวอื่นทั้งหมด - Module 4)

| ✅ ช่วยได้จริง (ใช้ในคอร์ส)               | หน้าที่                                                   | ⚠️ มักทำให้ช้าโดยไม่จำเป็น                              |
| ----------------------------------------- | --------------------------------------------------------- | ------------------------------------------------------- |
| Rank Math SEO (หรือ Yoast SEO)             | Title/Meta/Canonical/OG/Sitemap + Schema **บางส่วน**       | Page Builder + Addon packs (โหลด CSS/JS ทุกหน้า)          |
| Advanced Custom Fields (ACF)              | โครงสร้างข้อมูล FAQ, ฟิลด์เพิ่มของ CPT                    | Slider/Carousel plugin (jQuery + CSS ใหญ่)                |
| LiteSpeed Cache / WP Rocket / WP Super Cache | Page Cache, Object Cache, minify, defer JS, WebP           | Plugin "SEO all-in-one" ตัวที่ 2-3 ที่ทับกัน              |
| Query Monitor (เฉพาะตอนพัฒนา)              | ดู query, hook, scripts, styles ที่โหลดแต่ละหน้า           | Social share buttons ที่โหลด SDK ของทุกโซเชียล            |
| All-in-One WP Migration (เฉพาะย้ายเว็บ)    | Import/Export                                             | Google Fonts plugin ที่โหลด 10 ฟอนต์                       |
| Redirection (ถ้าต้องทำ 301 จำนวนมาก)        | จัดการ redirect ตอน migration (Day 4)                     | Analytics/Tracking หลายตัวที่ inject script ซ้ำ            |

### 1.4 ขอบเขตของสิ่งที่ Plugin ทำให้ได้ กับสิ่งที่ต้องเขียนโค้ดเอง

| งาน GEO                                   | Rank Math / Yoast ทำให้                                 | ต้องเขียนโค้ดเอง (Child Theme)                                         |
| ----------------------------------------- | ------------------------------------------------------- | ---------------------------------------------------------------------- |
| Title / Meta Description                  | ✅ ทั้ง template และรายหน้า                              | -                                                                      |
| Canonical / OG / Twitter                   | ✅ (ต้องตั้งค่าให้ถูก)                                    | กรณีพิเศษ: filter `rank_math/frontend/canonical`                       |
| Sitemap                                    | ✅ (Day 4 ตรวจ lastmod)                                   | เพิ่ม CPT/taxonomy เข้า sitemap ผ่านหน้าตั้งค่า                          |
| Organization / WebSite / Person (author) / BreadcrumbList / Article | ✅ แต่ควบคุมรายละเอียดได้จำกัด, ชื่อฟิลด์ตามที่ plugin กำหนด | เราปิดของ plugin แล้วเขียนเองทั้งชุดเพื่อให้ควบคุมได้ 100% และเหมือนฝั่ง Astro |
| Service + Offer จากข้อมูลจริง (CPT + ACF)   | ❌ (ใส่ได้ทีละหน้าด้วยมือใน Schema Generator)              | ✅ ต้องเขียน                                                            |
| FAQPage จาก ACF Repeater                   | ❌ (มี FAQ block แต่ต้องพิมพ์ในแต่ละ post)                  | ✅ ต้องเขียน                                                            |
| Heading Hierarchy                          | ❌                                                       | ✅ แก้ template / filter                                                |
| llms.txt                                   | ❌                                                       | ✅ (Day 4)                                                              |
| De-duplicate Schema                        | ❌ (plugin ไม่รู้จัก Schema ของ Theme)                     | ✅ ต้องเขียน filter ปิด                                                 |

---

## 📚 Module 2: GEO Audit สำหรับ WordPress

### เวลา 21:05-21:30 น.

> 💡 **หัวใจของ Module นี้:** ห้ามแก้อะไรจนกว่าจะ Audit ครบ เพราะการ Audit จะบอกว่า "งานไหนได้ผลมากที่สุดด้วยแรงน้อยที่สุด" และให้ตัวเลขก่อนแก้ไว้เทียบ Checklist 20 ข้อนี้คือเครื่องมือที่ผู้เรียนจะเอาไปใช้กับเว็บลูกค้าได้ทันทีหลังจบคอร์ส

---

### 2.1 Audit Checklist 20 ข้อสำหรับเว็บ WordPress

ให้ทำสำเนา Checklist นี้ (มีใน `geo-ready-checklist.md` ฉบับ WordPress) แล้วกรอกผลของ GeniusCorp WP ตอนนี้:

**A. Metadata (4 ข้อ)**

| #  | ข้อตรวจ                                                                     | วิธีตรวจ                                                    | ผ่านเมื่อ                                    | GeniusCorp WP (ก่อนแก้) |
| -- | --------------------------------------------------------------------------- | ----------------------------------------------------------- | -------------------------------------------- | ----------------------- |
| 1  | Title ไม่ซ้ำกัน ยาว ~50-60 ตัวอักษร ไม่ยัด keyword                             | View Source `<title>` 5 หน้าต่างประเภท / Rank Math → SEO Analysis | ทุกหน้าต่างกันและอ่านรู้เรื่อง             | ❌ หน้าแรกยาว 120+ (Tagline), หน้าอื่นสั้นแต่ไม่บอกคุณค่า |
| 2  | Meta description รายหน้าเขียนจริง ~150-160 ตัวอักษร                           | View Source `<meta name="description">`                     | ไม่ใช่ auto-generate/boilerplate             | ❌ ว่าง → auto           |
| 3  | ไม่มี `<meta name="keywords">`                                               | View Source                                                 | ไม่พบ                                        | ✅ (Astra/Rank Math ไม่ใส่; เว็บเก่ามักมี) |
| 4  | OG ครบ (type, title, description, image, url) และบทความมี `article:published_time` | View Source / Facebook Sharing Debugger                | ครบ                                          | 🟡 มีแต่ไม่มี published_time |

**B. Canonical & URL (3 ข้อ)**

| #  | ข้อตรวจ                                                    | วิธีตรวจ                                             | ผ่านเมื่อ                                         | ก่อนแก้ |
| -- | ---------------------------------------------------------- | ---------------------------------------------------- | ------------------------------------------------- | ------- |
| 5  | ทุกหน้ามี `<link rel="canonical">` absolute ไม่มี query      | เปิด `/services/?utm_source=x` ดู canonical           | ชี้ไป URL สะอาด                                    | 🟡 ชี้รวม query |
| 6  | หน้า pagination canonical ไปที่ตัวเอง                       | เปิด `/blog/page/2/`                                 | canonical = `/blog/page/2/`                        | ❌ ชี้หน้าแรก |
| 7  | http→https, non-www→www เป็น 301 และ trailing slash สม่ำเสมอ | `curl -I http://...`                                  | 301 ครั้งเดียวถึงปลายทาง                           | (Day 4) |

**C. Heading & Content Structure (4 ข้อ)**

| #  | ข้อตรวจ                                                        | วิธีตรวจ                                                     | ผ่านเมื่อ                       | ก่อนแก้ |
| -- | -------------------------------------------------------------- | ------------------------------------------------------------ | ------------------------------- | ------- |
| 8  | H1 เดียวต่อหน้า ทุกหน้า รวมหน้าแรก                              | DevTools Console: `document.querySelectorAll('h1').length`   | = 1                             | ❌ 2 (หน้าเดี่ยว) / 1 แต่เป็นโลโก้ (หน้าแรก) |
| 9  | H2 คือหัวข้อหลัก การ์ด/รายการใช้ H3, ไม่ข้ามระดับ                | Extension "HeadingsMap" หรือ Console                          | โครงสร้างเป็นต้นไม้              | ❌ การ์ดเป็น H2 |
| 10 | ย่อหน้าแรกของหน้าบริการ/บทความตอบคำถามหลักได้ทันที (Inverted Pyramid) | อ่านเอง                                                      | 2-3 ประโยคแรกสรุปครบ             | 🟡      |
| 11 | ไม่มีเนื้อหาสำคัญที่โหลดด้วย AJAX/JS หลัง page load              | View Source แล้วค้นข้อความที่เห็นบนจอ                         | พบใน source ทั้งหมด              | ✅      |

**D. Structured Data (4 ข้อ)**

| #  | ข้อตรวจ                                                        | วิธีตรวจ                                    | ผ่านเมื่อ                                       | ก่อนแก้ |
| -- | -------------------------------------------------------------- | ------------------------------------------- | ----------------------------------------------- | ------- |
| 12 | มี JSON-LD ชุดเดียว (ไม่ซ้ำซ้อนจากหลายแหล่ง)                    | View Source นับ `application/ld+json` และดู `@type` | 1 block (หรือหลาย block ที่ไม่ซ้ำ type)   | ❌ 2 แหล่ง (Rank Math JSON-LD + Astra microdata) ขัดกัน |
| 13 | Organization/LocalBusiness + WebSite ในหน้าแรก, ข้อมูลตรงกับหน้า Contact | validator.schema.org                   | 0 error, ชื่อ/เบอร์/ที่อยู่ตรง                    | 🟡 มีแต่ชื่อไม่ตรง |
| 14 | Article + Person(author) + BreadcrumbList ในบทความ / Service + Offer ในหน้าบริการ | Rich Results Test              | type ถูกต้องตามประเภทหน้า                        | ❌ Article บนหน้าบริการ, ไม่มี Person |
| 15 | FAQPage บนหน้าบริการ เนื้อหาตรงกับที่แสดง                       | Rich Results Test                           | มี และตรง                                        | ❌ ไม่มี |

**E. Sitemap, robots & llms.txt (2 ข้อ)**

| #  | ข้อตรวจ                                                    | วิธีตรวจ                             | ผ่านเมื่อ                            | ก่อนแก้ |
| -- | ---------------------------------------------------------- | ------------------------------------ | ------------------------------------ | ------- |
| 16 | `/sitemap_index.xml` มี URL ครบทุก post type ที่ต้องการ และ `lastmod` เป็นวันที่แก้จริง | เปิด sitemap                | lastmod ต่างกันตามจริง, ไม่มี URL ขยะ (tag ว่าง, attachment) | ❌ (Day 4) |
| 17 | `robots.txt` ไม่บล็อก AI crawlers ที่ต้องการ และชี้ sitemap  | เปิด `/robots.txt`                    | มี Sitemap: และไม่มี Disallow ที่ผิด    | 🟡 (Day 4) |

**F. Performance (3 ข้อ)**

| #  | ข้อตรวจ                                                    | วิธีตรวจ                                          | ผ่านเมื่อ                       | ก่อนแก้ |
| -- | ---------------------------------------------------------- | ------------------------------------------------- | ------------------------------- | ------- |
| 18 | TTFB < 0.6s (WP มี cache) / < 0.4s (SSG)                    | DevTools Network → Doc → Timing / PageSpeed        | ผ่านเกณฑ์                        | ❌ 1.4s |
| 19 | HTML ของหน้า < 150KB, รูปเป็น WebP ขนาดตามจริง, lazy load     | DevTools Network                                  | ผ่านเกณฑ์                        | ❌ 480KB, JPEG 2.8MB |
| 20 | LCP < 2.5s, ไม่มี CSS/JS ที่ไม่ได้ใช้เกิน 50%                | PageSpeed Insights / Lighthouse → Coverage          | ผ่านเกณฑ์                        | ❌ LCP 5.1s |

### 2.2 เครื่องมือหาจุดที่ต้องแก้

**View Source** (`view-source:` หรือ `Ctrl+U`) คือเครื่องมือหลัก เพราะมันคือ "สิ่งที่ AI เห็น" ไม่ใช่ DOM หลัง JS ทำงาน ให้ค้นหา (`Ctrl+F`) คำเหล่านี้ตามลำดับ:

```
<h1            → นับจำนวน
application/ld+json → นับ block และอ่าน @type แต่ละอัน
rel="canonical"
name="description"
name="keywords"   → ต้องไม่มี
og:type
article:published_time
data-elementor  หรือ  wp-block-  → รู้ว่าหน้าถูกสร้างด้วยอะไร
<script         → นับจำนวน (เว็บที่ดีควร < 10)
```

**Query Monitor** (เปิดใช้เฉพาะตอนพัฒนา ปิดก่อนขึ้น production): เข้าเว็บแล้วดูแถบด้านบน

| แท็บ           | ดูอะไร                                                                                   |
| -------------- | ---------------------------------------------------------------------------------------- |
| Overview       | Page generation time (ควร < 0.3s ก่อน cache), Peak memory, จำนวน DB queries (ควร < 50)    |
| Queries        | query ที่ช้าและซ้ำ (มักมาจาก plugin ที่ query ทุกหน้า)                                     |
| Scripts / Styles | ไฟล์ CSS/JS ทั้งหมดที่โหลดในหน้านี้ พร้อมชื่อ plugin/theme ต้นทาง → รู้ว่าจะ dequeue อะไร |
| Hooks & Actions | ใครทำอะไรใน `wp_head` บ้าง (หา Schema ที่ซ้ำได้จากตรงนี้)                                  |
| Template       | ไฟล์ template ที่ใช้จริง และ template parts → รู้ว่าต้อง override ไฟล์ไหนใน Child Theme     |

**PageSpeed Insights / Lighthouse**: ใช้ Lighthouse ใน DevTools (แท็บ Lighthouse → Mode: Navigation, Device: Mobile) สำหรับเว็บในเครื่อง และใช้ pagespeed.web.dev เมื่อ Deploy แล้ว จดค่า LCP, TBT, CLS และดู "Reduce unused CSS/JS" ว่ามาจาก plugin ไหน

### 2.3 จัดลำดับความสำคัญแบบ Impact vs Effort

จาก Checklist นำข้อที่ไม่ผ่านมาวางใน matrix แล้วทำจากช่องบนซ้ายก่อน:

```
                Effort ต่ำ (< 1 ชม.)                    Effort สูง (หลายชม.-วัน)
            ┌──────────────────────────────────┬──────────────────────────────────┐
Impact สูง  │ ★ ทำก่อนทันที                      │ ทำเป็นโปรเจกต์                    │
            │ - ปิด Schema ซ้ำของ Theme/Builder  │ - ฉีด JSON-LD ครบทุก Schema เอง   │
            │ - ปิด Rank Math Article บน service │ - สร้าง CPT service + ACF FAQ     │
            │ - แก้ Title template               │ - แก้ Heading ที่ Page Builder     │
            │ - เปิด Page Cache                  │   (ต้อง rebuild หน้าด้วย block)    │
            │ - ลบ meta keywords                 │ - แปลงรูปเป็น WebP ทั้งคลัง        │
            ├──────────────────────────────────┼──────────────────────────────────┤
Impact กลาง │ ทำเมื่อว่าง                         │ พิจารณาความคุ้มค่า                 │
            │ - ปิด emoji script, oEmbed         │ - ลด plugin จาก 23 → 10           │
            │ - แก้ canonical pagination         │ - เขียน description ใหม่ 200 หน้า  │
            │ - ใส่ published_time ใน OG          │ - เปลี่ยน Page Builder             │
            └──────────────────────────────────┴──────────────────────────────────┘
```

> ✅ **แผนของคืนนี้** เรียงตาม matrix: Module 3 (ช่องบนซ้ายเรื่อง Metadata/Canonical/Heading) → Module 4 (ปิด Schema ซ้ำ = บนซ้าย, ฉีด Schema เอง = บนขวา) → Module 5 (CPT + FAQ = บนขวา) → Module 6 (cache = บนซ้าย, รูป = บนขวา)

---

## 📚 Module 3: จัดการ Metadata, Canonical & Heading บน WordPress

### เวลา 21:30-21:55 น.

> 💡 **หัวใจของ Module นี้:** งานส่วนใหญ่ใน Module นี้คือ "ตั้งค่า Plugin ให้ถูก" และ "แก้ Template ครั้งเดียว" ไม่ใช่ไล่แก้ทีละหน้า และทุกอย่างที่เป็นโค้ดต้องอยู่ใน Child Theme เพื่อให้รอดจากการอัปเดต Theme

---

### 3.1 สร้าง Child Theme ที่ปลอดภัยต่อการอัปเดต (ทำก่อนทุกอย่าง)

GeniusCorp WP ใช้ Theme **Astra** เป็น parent (ติดตั้งไว้ในขั้นที่ 0) ผู้เรียนที่ทำกับเว็บจริงที่ใช้ GeneratePress, Kadence หรือ classic theme อื่น ทำเหมือนกันทุกประการ เปลี่ยนแค่ค่า `Template:` ให้ตรงกับชื่อโฟลเดอร์ของ parent (ถ้าเว็บจริงใช้ block theme เช่น Twenty Twenty-Five ต้องแปลง template เป็น block markup `.html` ซึ่งอยู่นอกขอบเขตคอร์สนี้)

```
wp-content/themes/
├── astra/                    ← Parent (ห้ามแก้ไฟล์ในนี้ อัปเดตแล้วหาย)
└── geniuscorp-geo/           ← Child Theme ของเรา (สร้างใหม่)
    ├── style.css             ← header ประกาศ child theme
    ├── functions.php         ← โหลดไฟล์ใน inc/
    ├── inc/
    │   ├── geo-cleanup.php   ← ปิดของที่ไม่ใช้ (emoji, oEmbed, meta keywords, Schema ซ้ำ)
    │   ├── geo-metadata.php  ← filter ของ Rank Math (canonical, OG)
    │   ├── geo-headings.php  ← แก้ heading ของ theme
    │   ├── geo-post-types.php← CPT service + taxonomy
    │   ├── geo-schema.php    ← JSON-LD builders + wp_head hook
    │   ├── geo-faq.php       ← ACF FAQ + template part
    │   └── geo-performance.php ← WebP, lazy load, dequeue
    ├── template-parts/
    │   ├── faq.php           ← FAQ Section
    │   └── author-box.php    ← (Day 4)
    ├── single-service.php    ← template หน้าบริการ (override)
    └── archive-service.php   ← template หน้ารวมบริการ
```

```css
/*
Theme Name:  GeniusCorp GEO
Description: Child theme สำหรับ GEO/AEO Retrofit - Schema, FAQ, Heading, Performance
Template:    astra
Version:     1.0.0
Text Domain: geniuscorp-geo
*/
```

> 📌 `Template:` ต้องตรงกับ **ชื่อโฟลเดอร์** ของ parent ใน `wp-content/themes/` (ตัวพิมพ์เล็ก) ไม่ใช่ชื่อที่แสดงในหน้า Themes ถ้าพิมพ์ผิด WordPress จะขึ้น "The parent theme is missing" และไม่ให้ Activate

```php
<?php
// wp-content/themes/geniuscorp-geo/functions.php

defined('ABSPATH') || exit;

define('GC_GEO_VERSION', '1.0.0');
define('GC_GEO_DIR', get_stylesheet_directory());
define('GC_GEO_URI', get_stylesheet_directory_uri());

// โหลด CSS ของ parent แล้วตามด้วยของ child (ใช้ get_template() จึงไม่ต้องแก้เมื่อเปลี่ยน parent)
add_action('wp_enqueue_scripts', function () {
    $parent = wp_get_theme(get_template());
    wp_enqueue_style('gc-parent-style', get_template_directory_uri() . '/style.css', [], $parent->get('Version'));
    wp_enqueue_style('geniuscorp-geo', GC_GEO_URI . '/style.css', ['gc-parent-style'], GC_GEO_VERSION);
});

// แยกโค้ดเป็นไฟล์ตามหน้าที่ (ลำดับสำคัญ: post-types ต้องมาก่อน schema/faq)
foreach ([
    'geo-cleanup',
    'geo-post-types',
    'geo-metadata',
    'geo-headings',
    'geo-schema',
    'geo-faq',
    'geo-performance',
] as $file) {
    require_once GC_GEO_DIR . '/inc/' . $file . '.php';
}
```

Appearance → Themes → Activate **GeniusCorp GEO** (Child) แล้วตรวจว่าเว็บยังแสดงผลเหมือนเดิม

> ⚠️ **สำรอง (Backup) ก่อนเปิด Child Theme และก่อนแก้ทุกครั้ง:** Tools → Export (.xml เฉพาะเนื้อหา) หรือติดตั้ง All-in-One WP Migration แล้ว Export (.wpress ทั้งเว็บ) เก็บเป็นไฟล์ไว้ นิสัยนี้จะมีผลมากตอนทำกับเว็บจริงของลูกค้าใน Day 4

### 3.2 ตั้งค่า Rank Math ให้ถูกหลัก

**Title Template** (Rank Math → Titles & Meta):

| ที่ตั้งค่า                     | ค่าเดิม (ปัญหา)                                                        | ค่าใหม่                                                     |
| ------------------------------ | ---------------------------------------------------------------------- | ----------------------------------------------------------- |
| Global Meta → Separator        | `-`                                                                    | `\|` (หรือคงเดิม ไม่สำคัญ)                                   |
| Homepage → Title               | `%sitename% %page% %sep% %sitedesc%` (ค่าเริ่มต้น) → ได้ `GeniusCorp - บริษัทพัฒนาเว็บ แอป ซอฟต์แวร์ ERP CRM ... รับทำแอป` (120+ ตัวอักษร) | `GeniusCorp - บริษัทพัฒนาซอฟต์แวร์และเว็บไซต์องค์กรที่ AI ค้นเจอ` (พิมพ์ข้อความจริง ไม่ใช้ `%sitedesc%`) |
| Homepage → Description         | (ว่าง)                                                                 | เขียนจริง 150-160 ตัวอักษร เหมือน `SITE.defaultDescription` ฝั่ง Astro |
| Settings → General → Tagline   | ข้อความ keyword stuffing 100+ ตัวอักษร (ขั้นที่ 1 ข้อ 7)                  | ประโยคสั้น 40-60 ตัวอักษร เช่น `พัฒนาเว็บไซต์และซอฟต์แวร์องค์กร` (theme แสดง Tagline ใต้โลโก้/ footer และ Rank Math ใช้เป็น `WebSite.description`) |
| Post Types → Posts → Title     | `%title% %sep% %sitename%` (ค่าเริ่มต้นถูกอยู่แล้ว - เว็บจริงมักถูกแก้เป็น `%title% %sep% %sitename% %sep% %sitedesc%`) | คง `%title% %sep% %sitename%` และตรวจว่าไม่มี `%sitedesc%` ต่อท้าย |
| Post Types → Posts → Description | `%excerpt%` (ดึงย่อหน้าแรก)                                          | `%excerpt%` **แต่ต้องเขียน Excerpt จริงทุกโพสต์** (ดูด้านล่าง) |
| Post Types → Pages → Title     | เหมือน Posts                                                           | `%title% %sep% %sitename%`                                  |
| Titles & Meta → Local SEO (หรือ Setup Wizard) → Person or Company / Name | **Person** + ชื่อเว็บเก่าตอนติดตั้ง WordPress (ทำให้ `og:site_name` และ Organization ใน `@graph` ผิด) | **Company** ชื่อ `GeniusCorp` + โลโก้ 1200×630 (ใช้ชั่วคราวจนกว่าเราจะปิด Schema ของ Rank Math ใน Module 4 แต่ `og:site_name` ยังมาจากตรงนี้) |
| Post Types → Services (CPT ใหม่ Module 5) → Title | -                                                    | `%title% %sep% %sitename%`                                  |
| Post Types → Services → Schema Type | Article (ค่าเริ่มต้นผิด!)                                          | **None** (เราจะฉีด Service เอง)                              |
| Post Types → Posts → Schema Type | Article                                                              | **None** (เราฉีดเองเพื่อควบคุม author/dates - Module 4) หรือคง Article ถ้าไม่เขียนเอง |
| Social Meta → Open Graph        | ปิด                                                                   | เปิด + ใส่ Default OG image 1200×630                         |

> 📌 **ทำไม `%excerpt%` ถึงเป็น boilerplate:** Rank Math ใช้ Excerpt ถ้ามี ถ้าไม่มีจะตัดจากเนื้อหา และเว็บส่วนใหญ่เริ่มทุกบทความด้วยย่อหน้าแนะนำบริษัท → description เหมือนกันทุกหน้า วิธีแก้ที่ยั่งยืนคือ **บังคับให้ทีมคอนเทนต์กรอก Excerpt** (Screen Options → เปิด Excerpt box) และใช้ Excerpt เป็นทั้ง meta description และ `Article.description` เหมือนที่ฝั่ง Laravel มีฟิลด์ `excerpt`

บังคับ Excerpt ตอนกด Publish ด้วยโค้ด (ทีมจะได้ไม่ลืม):

```php
<?php
// inc/geo-metadata.php

defined('ABSPATH') || exit;

/**
 * บังคับให้ post/service ที่จะ publish ต้องมี excerpt 70-170 ตัวอักษร
 * (excerpt = meta description = Article.description → เขียนครั้งเดียวใช้ 3 ที่)
 */
add_action('admin_notices', function () {
    if (! isset($_GET['gc_excerpt_warning'])) {
        return;
    }
    echo '<div class="notice notice-error"><p><strong>GEO:</strong> ยังไม่ได้เขียนคำอธิบายย่อ (Excerpt) 70-170 ตัวอักษร โพสต์ถูกบันทึกเป็นฉบับร่างแทน</p></div>';
});

add_filter('wp_insert_post_data', function (array $data, array $postarr) {
    if (! in_array($data['post_type'], ['post', 'service'], true) || $data['post_status'] !== 'publish') {
        return $data;
    }

    $length = mb_strlen(trim(wp_strip_all_tags($data['post_excerpt'])));

    if ($length < 70 || $length > 170) {
        $data['post_status'] = 'draft';
        add_filter('redirect_post_location', fn ($location) => add_query_arg('gc_excerpt_warning', 1, $location));
    }

    return $data;
}, 10, 2);
```

### 3.3 แก้ปัญหา Canonical จาก query string, Pagination และ Archive

Rank Math สร้าง canonical ให้ทุกหน้าอยู่แล้ว แต่มี 3 กรณีที่ต้องตรวจ:

**กรณี 1 - Query string:** เปิด `http://geniuscorp.test/services/?utm_source=line` → View Source → canonical ควรเป็น `http://geniuscorp.test/services/` (Rank Math ทำถูกโดยค่าเริ่มต้น ถ้าไม่ถูกแสดงว่ามี plugin อื่นทับ)

**กรณี 2 - Pagination ของ archive:** เปิด `/blog/page/2/` → canonical ต้องเป็นตัวเอง Rank Math ทำถูก แต่ Theme บางตัว/plugin บางตัว force เป็นหน้าแรก แก้ด้วย filter:

```php
// inc/geo-metadata.php (ต่อ)

/**
 * Canonical: บังคับกฎ 3 ข้อ
 * 1) หน้า paginated → canonical ของหน้านั้นเอง
 * 2) ไม่มี query string เสมอ
 * 3) trailing slash เสมอ (ยกเว้นไฟล์)
 */
add_filter('rank_math/frontend/canonical', function (string $canonical): string {
    if (is_paged()) {
        $canonical = get_pagenum_link(get_query_var('paged'));
    }

    $canonical = strtok($canonical, '?');   // ตัด query string
    $canonical = strtok($canonical, '#');

    if (! preg_match('/\.[a-z0-9]{2,5}$/i', $canonical)) {
        $canonical = trailingslashit($canonical);
    }

    return $canonical;
});

// Yoast ใช้ filter นี้แทน:  add_filter('wpseo_canonical', ...same logic...);
```

**กรณี 3 - Archive ที่ไม่ควร index:** หน้า tag ว่าง, author archive (ถ้าไม่ใช้), attachment page, `?s=` search → Rank Math → Titles & Meta → เลือกประเภท → **Robots Meta: noindex** และ **Redirect attachments to parent** = On

### 3.4 ตรวจและแก้ Heading Hierarchy ที่ Theme/Page Builder สร้างผิด

**ปัญหา 1 - H1 ซ้ำ 2 ตัวในหน้าบริการ:** มี 2 ชั้นที่ต้องดู

ชั้นที่ 1 - `<h1>` ในเนื้อหา: เปิด `view-source:/web-development/` จะเห็น `<h1 class="entry-title">` ของ Astra แล้วตามด้วย `<h1>รับพัฒนาเว็บไซต์องค์กร</h1>` ที่อยู่ในตัวเนื้อหา (คนเขียนใส่ block Heading ระดับ H1 เอง พบบ่อยมากในเว็บจริง) วิธีแก้คือแก้ที่เนื้อหา ไม่ใช่โค้ด: Pages → แก้ไขหน้าบริการทั้ง 3 หน้า → คลิก block Heading นั้น → เปลี่ยนระดับเป็น **H2** หรือลบทิ้ง (เพราะ theme ใส่ชื่อเรื่องเป็น H1 ให้แล้ว) → Update · และตอนย้ายไป CPT `service` ในการบ้าน อย่าคัดลอก H1 ติดไปด้วย

ชั้นที่ 2 - โลโก้เป็น `<h1>`: Astra ทำถูกอยู่แล้ว (โลโก้เป็น `<h1>` เฉพาะหน้าแรก หน้าอื่นเป็น `<span class="site-title">`) แต่ theme จำนวนมากใส่ `<h1 class="site-title">` ใน header.php ให้ทุกหน้า เราจึงใส่ filter ไว้ใน Child Theme เผื่อไว้ทุกกรณี วิธีแก้มี 2 ระดับ:

ระดับ filter (ถ้า theme มี filter ให้ เช่น Astra: `astra_site_title_tag`, GeneratePress: `generate_site_title_output`, Kadence: `kadence_site_title_tag`):

```php
<?php
// inc/geo-headings.php

defined('ABSPATH') || exit;

/**
 * โลโก้/ชื่อเว็บใน header ต้องเป็น <p> ไม่ใช่ <h1> (ยกเว้นหน้าแรก ถ้าหน้าแรกไม่มี H1 อื่น)
 */
$gc_site_title_tag = fn () => is_front_page() ? 'h1' : 'p';

// Astra (parent ของคอร์ส)
add_filter('astra_site_title_tag', $gc_site_title_tag);

// GeneratePress (ไม่มี tag filter ใช้ output filter แทน)
add_filter('generate_site_title_output', function (string $output): string {
    if (is_front_page()) {
        return $output;
    }
    return str_replace(['<h1', '</h1>'], ['<p', '</p>'], $output);
});

// Kadence
add_filter('kadence_site_title_tag', $gc_site_title_tag);
```

ระดับ template override (ถ้า theme ไม่มี filter): คัดลอก `header.php` จาก parent มาไว้ใน child แล้วแก้:

```php
<?php // geniuscorp-geo/header.php (เฉพาะส่วนโลโก้) ?>
<?php $tag = is_front_page() ? 'h1' : 'p'; ?>
<<?php echo $tag; ?> class="site-title">
    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
</<?php echo $tag; ?>>
```

**ปัญหา 2 - หน้าแรกไม่มี H1 ในเนื้อหา เพราะ hero เป็น `<div>` (หรือ Page Builder ทำ heading เป็น `<span>`):** ใน Demo หน้าแรกมี H1 อยู่ตัวเดียวคือโลโก้ "GeniusCorp" (Astra ใส่ให้ในหน้าแรก) ซึ่งผ่านเกณฑ์ "มี H1" ในเชิงเทคนิค แต่ไม่ได้บอก AI ว่าเว็บนี้ทำอะไร ทางที่ดีกว่าคือ Pages → แก้ไข "หน้าแรก" → เปลี่ยน `<div class="hero-title">พัฒนาเว็บไซต์และซอฟต์แวร์องค์กรครบวงจร</div>` เป็น block Heading ระดับ **H1** (ใน Code editor แก้ `div` เป็น `h1` ได้เลย) (ถ้าใช้ Page Builder แก้ที่ widget heading → HTML tag = H1) แล้วให้โลโก้เป็น `<p>` ทุกหน้ารวมหน้าแรก โดยแก้บรรทัดใน `geo-headings.php` เป็น `$gc_site_title_tag = fn () => 'p';` (เลือกได้ทั้ง 2 แบบ แต่ห้ามมี H1 สองตัวในหน้าแรก)

**ปัญหา 3 - การ์ดเป็น `<h2>` 8 ตัวในหน้ารวมบริการ:** ถ้าหน้ารวมสร้างด้วย loop ของ theme (archive template) แก้ที่ template ครั้งเดียว:

```php
<?php
// geniuscorp-geo/archive-service.php - หน้ารวมบริการ (override จาก parent)
get_header(); ?>

<main id="main" class="site-main container">
    <h1><?php post_type_archive_title(); ?></h1>
    <p class="lead"><?php echo esc_html(get_option('gc_service_archive_intro', 'เราให้บริการ ' . wp_count_posts('service')->publish . ' ด้านหลัก ครอบคลุมตั้งแต่การพัฒนาเว็บไซต์องค์กร โมบายแอปพลิเคชัน จนถึงการทำให้เว็บถูกอ้างอิงโดย AI Search')); ?></p>

    <div class="grid">
        <?php while (have_posts()) : the_post(); ?>
            <article class="card" id="post-<?php the_ID(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large', ['loading' => 'lazy']); ?></a>
                <?php endif; ?>
                <?php // การ์ดใช้ h3 ไม่ใช่ h2 ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php
                $price = get_field('price_from');     // ACF (Module 5)
                $days  = get_field('duration_days');
                if ($price || $days) : ?>
                    <dl class="meta">
                        <?php if ($price) : ?><dt>เริ่มต้น</dt><dd><?php echo number_format((float) $price); ?> บาท</dd><?php endif; ?>
                        <?php if ($days) : ?><dt>ระยะเวลา</dt><dd><?php echo (int) $days; ?> วัน</dd><?php endif; ?>
                    </dl>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer();
```

ถ้าหน้ารวมสร้างด้วย Page Builder (Elementor Posts widget ฯลฯ): ตั้งค่า widget → Title HTML Tag = **H3** ครั้งเดียว มีผลทุกการ์ด

**ปัญหา 4 - Page Builder ใส่ heading ใน widget ที่ไม่ใช่หัวข้อ** (เช่น ตัวเลขสถิติ "40+" เป็น `<h2>`): เปลี่ยน tag เป็น `div`/`p` แล้วจัดขนาดด้วย CSS class

ตรวจสอบหลังแก้ทั้งเว็บด้วยสคริปต์ WP-CLI (ถ้ามี) หรือใช้ Console ในแต่ละหน้า:

```js
// วางใน DevTools Console ของทุกหน้าที่ตรวจ (ไม่มี semicolon ตามกติกาของเรา)
const h = [...document.querySelectorAll('h1,h2,h3,h4,h5,h6')]
console.table(h.map((el) => ({ tag: el.tagName, text: el.textContent.trim().slice(0, 60) })))
console.log('H1 count:', document.querySelectorAll('h1').length)
```

### 3.5 Open Graph ที่ถูกต้องสำหรับบทความ

Rank Math ใส่ `article:published_time`/`article:modified_time` ให้บทความอัตโนมัติเมื่อเปิด Social Meta แต่ **ไม่ใส่ `article:author` เป็น URL** และหน้าบริการ (CPT) ควรเป็น `og:type=website` ไม่ใช่ article ตรวจแล้วเสริมด้วย filter:

```php
// inc/geo-metadata.php (ต่อ)

/**
 * เสริม OG ของบทความ: article:author = URL หน้าผู้เขียน (ตรงกับ Person @id ใน Schema)
 * และบังคับ og:type ของ service = website
 */
add_filter('rank_math/opengraph/facebook/og_type', function (string $type): string {
    return is_singular('service') ? 'website' : $type;
});

add_action('rank_math/opengraph/facebook', function ($og) {
    if (! is_singular('post')) {
        return;
    }
    $author_url = get_author_posts_url((int) get_post_field('post_author', get_the_ID()));
    $og->tag('article:author', esc_url($author_url));
    $og->tag('article:section', 'บทความ');
});
```

### 3.6 ปิดสิ่งที่ไม่ต้องการใน head (Cleanup)

```php
<?php
// inc/geo-cleanup.php

defined('ABSPATH') || exit;

// ตัวอย่าง: ลบ meta keywords ที่ theme เก่า/plugin เก่าใส่ไว้ (Astra และ Rank Math ไม่ใส่อยู่แล้ว)
// ชื่อ callback ดูจาก Query Monitor → Hooks & Actions → wp_head แล้วแก้ให้ตรงกับเว็บจริง
add_action('init', function () {
    remove_action('wp_head', 'my_old_theme_meta_keywords');
});

// ลด noise ใน <head> ที่ไม่มีประโยชน์กับผู้ใช้/AI และเพิ่ม request
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_generator');                      // ซ่อนเวอร์ชัน WP
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'rest_output_link_wp_head');          // ถ้าไม่ได้ใช้ REST จาก client
});

// ปิด XML-RPC (ความปลอดภัย + ลด request ขยะ)
add_filter('xmlrpc_enabled', '__return_false');
```

> 🧪 **ทดสอบ Module 3:** View Source หน้าบทความ → title สั้นลง, description เป็นข้อความจริง, ไม่มี `keywords`, canonical สะอาด, `article:author` เป็น URL · Console → `h1` = 1 ทุกหน้า (โลโก้ไม่ใช่ H1 แล้วในหน้าเดี่ยว) · Checklist ข้อ 1-6, 8-9 ควรกลายเป็น ✅

---

## 📚 Module 4: ฉีด JSON-LD เข้า WordPress ด้วยโค้ดของเราเอง

### เวลา 21:55-22:40 น.

> 💡 **หัวใจของ Module นี้:** เราจะเขียน "สิ่งเดียวกับ `schema.ts` ของ Day 2" ด้วย PHP โดยดึงข้อมูลจาก WordPress (`get_post_meta`, ACF, CPT, Taxonomy, `get_the_author_meta`) แล้ว echo ผ่าน `wp_head` แต่ก่อนจะฉีดของเรา **ต้องปิดของคนอื่นให้หมดก่อน** เพราะ Schema ซ้ำที่ขัดกันแย่กว่าไม่มี

---

### 4.1 De-duplicate Schema: ตรวจว่าใครออก Schema อยู่บ้าง

View Source หน้าบริการของ GeniusCorp WP ก่อนแก้ (Astra + Rank Math) พบ Schema จาก 2 แหล่งซ้อนกัน และถ้าเว็บจริงมี Page Builder จะมีแหล่งที่ 3:

| แหล่ง                | รูปแบบ / @type ที่ออก                              | ปัญหา                                                     | วิธีปิด                                                              |
| -------------------- | -------------------------------------------------- | --------------------------------------------------------- | -------------------------------------------------------------------- |
| Rank Math            | JSON-LD 1 block `@graph`: Person/Organization (ชื่อเก่า "MyWPSite"), WebSite, WebPage, **Article** (บนหน้าบริการ), Person(author "admin" ไม่มี jobTitle) | Article ผิดประเภทบนหน้าบริการ; ชื่อองค์กรมาจาก Setup Wizard ไม่ตรงกับชื่อเว็บ | ตั้ง Schema Type = None ต่อ post type, หรือ filter `rank_math/json_ld` ตัด key ที่ไม่ต้องการ |
| Theme Astra          | **microdata** ในแท็ก HTML (`itemscope itemtype="https://schema.org/..."` บน header, โลโก้, บทความ; ค้นหา `itemtype` ใน View Source) | เป็น Schema อีกภาษาหนึ่งที่ขัดกับ JSON-LD (ชื่อ/ประเภทไม่ตรงกัน) และเพิ่มขนาด HTML | `add_filter('astra_schema_enabled', '__return_false')` · theme อื่น: `remove_action('wp_head', ...)` โดยหา callback จาก Query Monitor |
| Page Builder (ถ้ามี) | JSON-LD WebPage + ImageObject ทุกรูป               | WebPage 2 ตัว `@id` ต่างกัน                               | ปิดในหน้าตั้งค่า builder (Settings → Features → Schema/Structured Data) หรือ filter |

**กลยุทธ์ที่เลือกในคอร์ส:** ปิดทั้งหมดแล้วเขียนเองชุดเดียว (เหมือนฝั่ง Astro 100%) เหตุผลคือควบคุมได้ ทดสอบได้ และย้ายไป Astro ในอนาคตได้โดย logic ไม่เปลี่ยน ทางเลือกอื่นคือให้ Rank Math ออก Organization/WebSite/Breadcrumb แล้วเราเสริมเฉพาะ Service/FAQ ก็ทำได้ แต่ต้องระวังไม่ให้ `@id` ชนกัน

```php
<?php
// inc/geo-cleanup.php (ต่อ) - ปิด Schema ของทุกแหล่ง

/**
 * 1) Rank Math: ปิด JSON-LD ทั้งหมด (เราออกเองครบ)
 *    ถ้าต้องการเก็บบางส่วนไว้ ให้ unset เฉพาะ key แทน return []
 */
add_filter('rank_math/json_ld', function (array $data, $jsonld): array {
    return [];
    // ตัวอย่างเก็บเฉพาะ BreadcrumbList ของ Rank Math:
    // return array_filter($data, fn ($key) => $key === 'BreadcrumbList', ARRAY_FILTER_USE_KEY);
}, 99, 2);

/**
 * Yoast SEO ใช้แทนถ้าใช้ Yoast:
 * add_filter('wpseo_json_ld_output', '__return_false');
 * หรือแบบละเอียด: add_filter('wpseo_schema_graph_pieces', fn ($pieces) => [], 10);
 */

/**
 * 2) Theme: ปิด Schema ของ parent theme
 *    Astra ออกเป็น microdata (itemtype/itemprop) มี filter ปิดให้
 *    theme อื่นที่ echo JSON-LD ผ่าน wp_head ให้หา callback จาก Query Monitor → Hooks & Actions → wp_head
 */
add_filter('astra_schema_enabled', '__return_false');

add_action('init', function () {
    // ตัวอย่างสำหรับ theme อื่น: remove_action('wp_head', 'my_theme_organization_schema', 5);
});

/**
 * 3) Page Builder (ตัวอย่าง Elementor): ปิด schema ของ widget
 *    Elementor Pro ไม่มี global switch ให้ปิด แต่ schema ส่วนใหญ่มาจาก widget เฉพาะ (FAQ, Review)
 *    ที่เราไม่ใช้อยู่แล้ว - ตรวจซ้ำด้วย View Source หลังแก้
 */
```

> ✅ **ทดสอบ:** View Source หน้าบริการ → ต้องเหลือ `application/ld+json` **0 block** ก่อนไปหัวข้อถัดไป (เราจะเพิ่มของเราเป็น block เดียว)

### 4.2 Custom Post Type `service` และฟิลด์ ACF (พื้นฐานสำหรับ Service Schema)

หน้าบริการใน Demo Site เป็น Page ธรรมดา ทำให้ไม่มีฟิลด์ราคา/ระยะเวลา และ Rank Math มองเป็น Page เราสร้าง CPT `service` ให้เทียบเท่าตาราง `services` ของ Laravel

```php
<?php
// inc/geo-post-types.php

defined('ABSPATH') || exit;

add_action('init', function () {
    register_post_type('service', [
        'labels' => [
            'name'          => 'บริการ',
            'singular_name' => 'บริการ',
            'add_new_item'  => 'เพิ่มบริการใหม่',
            'edit_item'     => 'แก้ไขบริการ',
        ],
        'public'       => true,
        'has_archive'  => true,                       // /services/ เป็นหน้ารวม
        'rewrite'      => ['slug' => 'services', 'with_front' => false],
        'menu_icon'    => 'dashicons-hammer',
        'supports'     => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'],
        'show_in_rest' => true,                       // ใช้ Block Editor + WP REST API (เผื่อ Headless ในอนาคต)
    ]);
});

// ให้ post type ใหม่เข้า sitemap ของ Rank Math และมีการตั้งค่า Titles & Meta
add_filter('rank_math/sitemap/post_types', fn (array $types) => array_unique([...$types, 'service']));
```

ฟิลด์ ACF ของ `service` (สร้างผ่าน ACF → Field Groups หรือ register ด้วยโค้ดเพื่อให้ version control ได้):

```php
<?php
// inc/geo-post-types.php (ต่อ) - ACF fields แบบโค้ด (ทีมทำงานร่วมกันผ่าน Git ได้)

add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'    => 'group_gc_service',
        'title'  => 'ข้อมูลบริการ (GEO)',
        'fields' => [
            [
                'key'   => 'field_gc_price_from',
                'label' => 'ราคาเริ่มต้น (บาท)',
                'name'  => 'price_from',
                'type'  => 'number',
                'min'   => 0,
                'instructions' => 'ตัวเลขล้วน ไม่ใส่ comma - ใช้ใน Offer.price',
            ],
            [
                'key'   => 'field_gc_duration_days',
                'label' => 'ระยะเวลาดำเนินการ (วัน)',
                'name'  => 'duration_days',
                'type'  => 'number',
                'min'   => 0,
            ],
            [
                'key'          => 'field_gc_faqs',
                'label'        => 'คำถามที่พบบ่อย (FAQ)',
                'name'         => 'faqs',
                'type'         => 'repeater',
                'instructions' => 'เขียนคำถามอย่างที่ลูกค้าถามจริง คำตอบ 2-4 ประโยค ประโยคแรกตอบตรง มีตัวเลขถ้าทำได้',
                'min'          => 0,
                'max'          => 8,
                'layout'       => 'block',
                'button_label' => 'เพิ่มคำถาม',
                'sub_fields'   => [
                    [
                        'key'       => 'field_gc_faq_question',
                        'label'     => 'คำถาม',
                        'name'      => 'question',
                        'type'      => 'text',
                        'required'  => 1,
                        'maxlength' => 300,
                    ],
                    [
                        'key'      => 'field_gc_faq_answer',
                        'label'    => 'คำตอบ',
                        'name'     => 'answer',
                        'type'     => 'textarea',
                        'required' => 1,
                        'rows'     => 4,
                        'new_lines' => '',   // เก็บ plain text ไม่แปลงเป็น <br> (Schema ใช้ plain text)
                    ],
                ],
            ],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'service']]],
        'position' => 'normal',
    ]);
});
```

> 📌 **ACF Repeater เป็นฟีเจอร์ของ ACF PRO** ถ้าใช้ ACF ฟรี ให้เปลี่ยนเป็น **CPT `faq` แยก + ฟิลด์ `service_id` (Post Object)** แล้ว query ด้วย `WP_Query` ตาม `meta_query` ซึ่ง logic ใน Module 5 ปรับได้เล็กน้อย (แสดงทั้งสองแบบใน Module 5)

หลังเพิ่ม CPT: Settings → Permalinks → Save (flush) แล้วย้าย 3 หน้าบริการจาก Page มาเป็น Service (สร้างใหม่ + คัดลอกเนื้อหา หรือใช้ plugin "Post Type Switcher") และตั้ง **Redirect 301** จาก URL เก่า `/web-development/` → `/services/web-development/` ด้วย Rank Math → Redirections

### 4.3 เขียน JSON-LD Builders ด้วย PHP (เทียบเท่า schema.ts)

```php
<?php
// inc/geo-schema.php

defined('ABSPATH') || exit;

/**
 * ค่ากลางขององค์กร: ใช้ทั้งใน Schema, Footer และ llms.txt (Day 4)
 * ควรย้ายไป Theme Options/ACF Options Page ให้ทีมแก้เองได้ แต่ในคอร์สใช้ค่าคงที่เพื่อความชัดเจน
 */
function gc_site(): array
{
    static $site = null;
    if ($site !== null) {
        return $site;
    }

    $site = [
        'name'       => get_bloginfo('name'),
        'legal_name' => 'GeniusCorp Co., Ltd.',
        'url'        => trailingslashit(home_url()),
        'language'   => 'th',
        'logo'       => GC_GEO_URI . '/assets/logo.png',
        'og_image'   => GC_GEO_URI . '/assets/og-default.jpg',
        'telephone'  => '+66-2-000-0000',
        'email'      => 'hello@geniuscorp.example',
        'founding'   => '2011',
        'address'    => [
            'streetAddress'   => '123 ถนนสุขุมวิท แขวงคลองเตย',
            'addressLocality' => 'เขตคลองเตย',
            'addressRegion'   => 'กรุงเทพมหานคร',
            'postalCode'      => '10110',
            'addressCountry'  => 'TH',
        ],
        'geo'        => ['latitude' => 13.7222, 'longitude' => 100.5850],
        'hours'      => 'Mo-Fr 09:00-18:00',
        'same_as'    => [
            'https://www.facebook.com/geniuscorp.example',
            'https://www.linkedin.com/company/geniuscorp-example',
        ],
    ];

    return $site;
}

function gc_org_id(): string     { return gc_site()['url'] . '#organization'; }
function gc_website_id(): string { return gc_site()['url'] . '#website'; }
function gc_person_id(int $user_id): string { return get_author_posts_url($user_id) . '#person'; }

/** ตัด key ที่ค่าว่าง/null ออกแบบ recursive (เหมือน clean() ใน JsonLd.astro) */
function gc_schema_clean(array $data): array
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $value = gc_schema_clean($value);
            if ($value === []) {
                unset($data[$key]);
                continue;
            }
            $data[$key] = $value;
        } elseif ($value === null || $value === '') {
            unset($data[$key]);
        }
    }
    return $data;
}

/** วันที่ของโพสต์เป็น ISO 8601 พร้อม timezone ของเว็บ (Settings → Timezone) */
function gc_iso_date(string $mysql_datetime): string
{
    return wp_date(DATE_ATOM, strtotime($mysql_datetime));   // 2026-09-12T20:30:00+07:00
}

// ── Organization / LocalBusiness ─────────────────────────────────────────────
function gc_schema_organization(): array
{
    $s = gc_site();
    return [
        '@type'        => ['Organization', 'LocalBusiness'],
        '@id'          => gc_org_id(),
        'name'         => $s['name'],
        'legalName'    => $s['legal_name'],
        'url'          => $s['url'],
        'logo'         => ['@type' => 'ImageObject', 'url' => $s['logo']],
        'image'        => $s['og_image'],
        'telephone'    => $s['telephone'],
        'email'        => $s['email'],
        'foundingDate' => $s['founding'],
        'address'      => ['@type' => 'PostalAddress'] + $s['address'],
        'geo'          => ['@type' => 'GeoCoordinates'] + $s['geo'],
        'openingHours' => $s['hours'],
        'sameAs'       => $s['same_as'],
    ];
}

// ── WebSite ──────────────────────────────────────────────────────────────────
function gc_schema_website(): array
{
    $s = gc_site();
    return [
        '@type'       => 'WebSite',
        '@id'         => gc_website_id(),
        'url'         => $s['url'],
        'name'        => $s['name'],
        'description' => get_bloginfo('description'),
        'inLanguage'  => $s['language'],
        'publisher'   => ['@id' => gc_org_id()],
        // WordPress มีหน้าค้นหาในตัว (?s=) → SearchAction ใส่ได้จริง
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => ['@type' => 'EntryPoint', 'urlTemplate' => $s['url'] . '?s={search_term_string}'],
            'query-input' => 'required name=search_term_string',
        ],
    ];
}

// ── WebPage ──────────────────────────────────────────────────────────────────
function gc_schema_webpage(string $type = 'WebPage'): array
{
    $url = gc_current_url();
    $post = is_singular() ? get_post() : null;

    return [
        '@type'         => $type,
        '@id'           => $url . '#webpage',
        'url'           => $url,
        'name'          => wp_get_document_title(),
        'description'   => gc_current_description(),
        'inLanguage'    => gc_site()['language'],
        'isPartOf'      => ['@id' => gc_website_id()],
        'about'         => ['@id' => gc_org_id()],
        'datePublished' => $post ? gc_iso_date($post->post_date) : null,
        'dateModified'  => $post ? gc_iso_date($post->post_modified) : null,
    ];
}

/** URL ปัจจุบันแบบ canonical (ใช้ค่าจาก Rank Math ถ้ามี) */
function gc_current_url(): string
{
    if (function_exists('rank_math') && class_exists('RankMath\Paper\Paper')) {
        $canonical = RankMath\Paper\Paper::get()->get_canonical();
        if ($canonical) {
            return $canonical;
        }
    }
    return is_singular() ? get_permalink() : trailingslashit(home_url(add_query_arg([], $GLOBALS['wp']->request)));
}

/** description ปัจจุบัน: excerpt ของโพสต์ หรือ description ของเว็บ */
function gc_current_description(): string
{
    if (is_singular() && has_excerpt()) {
        return wp_strip_all_tags(get_the_excerpt());
    }
    return get_bloginfo('description');
}

// ── Service + Offer ──────────────────────────────────────────────────────────
function gc_schema_service(WP_Post $post): array
{
    $url   = get_permalink($post);
    $price = get_field('price_from', $post->ID);

    $schema = [
        '@type'       => 'Service',
        '@id'         => $url . '#service',
        'name'        => get_the_title($post),
        'description' => wp_strip_all_tags(get_the_excerpt($post)),
        'url'         => $url,
        'serviceType' => get_the_title($post),
        'provider'    => ['@id' => gc_org_id()],
        'areaServed'  => ['@type' => 'Country', 'name' => 'Thailand'],
        'image'       => get_the_post_thumbnail_url($post, 'large') ?: null,
    ];

    if ($price !== null && $price !== '') {
        $schema['offers'] = [
            '@type'              => 'Offer',
            'price'              => (float) $price,
            'priceCurrency'      => 'THB',
            'priceSpecification' => [
                '@type'         => 'PriceSpecification',
                'minPrice'      => (float) $price,
                'priceCurrency' => 'THB',
            ],
            'availability' => 'https://schema.org/InStock',
            'url'          => $url,
        ];
    }

    return $schema;
}

// ── Article + Person(author) ─────────────────────────────────────────────────
function gc_schema_article(WP_Post $post): array
{
    $url = get_permalink($post);
    return [
        '@type'            => 'Article',
        '@id'              => $url . '#article',
        'headline'         => mb_substr(get_the_title($post), 0, 110),
        'description'      => wp_strip_all_tags(get_the_excerpt($post)),
        'url'              => $url,
        'mainEntityOfPage' => ['@id' => $url . '#webpage'],
        'image'            => has_post_thumbnail($post) ? [get_the_post_thumbnail_url($post, 'full')] : null,
        'datePublished'    => gc_iso_date($post->post_date),
        'dateModified'     => gc_iso_date($post->post_modified),
        'inLanguage'       => gc_site()['language'],
        'author'           => ['@id' => gc_person_id((int) $post->post_author)],
        'publisher'        => ['@id' => gc_org_id()],
        'isPartOf'         => ['@id' => gc_website_id()],
        'articleSection'   => implode(', ', wp_list_pluck(get_the_category($post->ID), 'name')) ?: null,
    ];
}

function gc_schema_person(int $user_id): array
{
    // ข้อมูลผู้เขียนจาก Users → Profile (Biographical Info, Website) + ACF user fields ถ้ามี (job_title, social_links)
    $job_title = function_exists('get_field') ? get_field('job_title', 'user_' . $user_id) : '';
    $social    = function_exists('get_field') ? (array) get_field('social_links', 'user_' . $user_id) : [];
    $social    = array_values(array_filter(array_map(fn ($row) => is_array($row) ? ($row['url'] ?? '') : $row, $social)));

    return [
        '@type'       => 'Person',
        '@id'         => gc_person_id($user_id),
        'name'        => get_the_author_meta('display_name', $user_id),
        'jobTitle'    => $job_title ?: null,
        'description' => get_the_author_meta('description', $user_id) ?: null,
        'image'       => get_avatar_url($user_id, ['size' => 320]),
        'url'         => get_author_posts_url($user_id),
        'worksFor'    => ['@id' => gc_org_id()],
        'sameAs'      => $social ?: null,
    ];
}

// ── BreadcrumbList ───────────────────────────────────────────────────────────
/** คืน array ของ ['name' => ..., 'url' => ...] สำหรับหน้าปัจจุบัน (ใช้ทั้ง HTML และ Schema) */
function gc_breadcrumb_items(): array
{
    $items = [['name' => 'หน้าแรก', 'url' => home_url('/')]];

    if (is_singular('service')) {
        $items[] = ['name' => 'บริการ', 'url' => get_post_type_archive_link('service')];
        $items[] = ['name' => get_the_title()];
    } elseif (is_singular('post')) {
        $items[] = ['name' => 'บทความ', 'url' => get_permalink(get_option('page_for_posts'))];
        $items[] = ['name' => get_the_title()];
    } elseif (is_post_type_archive('service')) {
        $items[] = ['name' => 'บริการ'];
    } elseif (is_home()) {
        $items[] = ['name' => 'บทความ'];
    } elseif (is_page() && ! is_front_page()) {
        $items[] = ['name' => get_the_title()];
    }

    return $items;
}

function gc_schema_breadcrumb(array $items): array
{
    $list = [];
    foreach ($items as $i => $item) {
        $list[] = gc_schema_clean([
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $item['name'],
            'item'     => $item['url'] ?? null,
        ]);
    }
    return ['@type' => 'BreadcrumbList', 'itemListElement' => $list];
}

// ── FAQPage (จาก ACF repeater ของ service - Module 5) ────────────────────────
function gc_schema_faq(array $faqs): ?array
{
    if (! $faqs) {
        return null;
    }
    return [
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn ($faq) => [
            '@type'          => 'Question',
            'name'           => $faq['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
        ], $faqs),
    ];
}

// ── ประกอบเป็น @graph ตามประเภทหน้า แล้วฉีดผ่าน wp_head ──────────────────────
function gc_build_graph(): array
{
    $graph = [gc_schema_organization()];

    if (is_front_page()) {
        $graph[] = gc_schema_website();
        $graph[] = gc_schema_webpage();
    } elseif (is_singular('service')) {
        $post = get_post();
        $graph[] = gc_schema_webpage();
        $graph[] = gc_schema_service($post);
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
        $graph[] = gc_schema_faq(gc_get_faqs($post->ID));     // จาก inc/geo-faq.php
    } elseif (is_singular('post')) {
        $post = get_post();
        $graph[] = gc_schema_webpage();
        $graph[] = gc_schema_article($post);
        $graph[] = gc_schema_person((int) $post->post_author);
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } elseif (is_author()) {
        $graph[] = gc_schema_webpage('ProfilePage');
        $graph[] = gc_schema_person((int) get_queried_object_id());
    } elseif (is_page_template('page-contact.php') || is_page('contact')) {
        $graph[] = gc_schema_webpage('ContactPage');
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } elseif (is_page('about')) {
        $graph[] = gc_schema_webpage('AboutPage');
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } elseif (is_post_type_archive('service') || is_home()) {
        $graph[] = gc_schema_webpage('CollectionPage');
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } else {
        $graph[] = gc_schema_webpage();
    }

    // ตัด null (เช่น FAQ ว่าง) และ clean ทุกตัว
    $graph = array_map('gc_schema_clean', array_filter($graph));

    return ['@context' => 'https://schema.org', '@graph' => array_values($graph)];
}

/**
 * ฉีด JSON-LD: priority 20 เพื่ออยู่หลัง title/meta ของ Rank Math (priority 1) ใน <head>
 * ไม่ฉีดในหน้า admin, feed, 404, search
 */
add_action('wp_head', function () {
    if (is_admin() || is_feed() || is_404() || is_search()) {
        return;
    }

    $json = wp_json_encode(
        gc_build_graph(),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP
    );

    echo "\n<script type=\"application/ld+json\">" . $json . "</script>\n";
}, 20);
```

### 4.4 จัดการ Escape และ Encoding ภาษาไทยใน PHP อย่างปลอดภัย

| flag ของ `wp_json_encode` / `json_encode` | ทำอะไร                                                          | ทำไมต้องใส่                                                                                   |
| ----------------------------------------- | --------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `JSON_UNESCAPED_UNICODE`                  | เก็บ "กา" ไว้แทนที่จะเป็น `\u0e01\u0e32`                         | HTML เล็กลง ~6 เท่าในส่วนภาษาไทย อ่าน debug ง่าย (ถ้าไม่ใส่ก็ยังถูกต้อง แต่ไฟล์ใหญ่)             |
| `JSON_UNESCAPED_SLASHES`                  | `https://` แทน `https:\/\/`                                     | URL อ่านง่าย validator บางตัวเคยมีปัญหากับ escaped slash                                        |
| `JSON_HEX_TAG`                            | `<` → `\u003C`, `>` → `\u003E`                                  | ป้องกัน `</script>` ในข้อมูลปิด script ก่อนเวลา (เทียบเท่า replace ใน JsonLd.astro)             |
| `JSON_HEX_AMP`                            | `&` → `\u0026`                                                | ปลอดภัยเมื่อ HTML ถูก process ซ้ำโดย plugin minify บางตัว                                       |
| (ไม่ใช้) `JSON_PRETTY_PRINT`              | ขึ้นบรรทัดใหม่สวย ๆ                                              | ทำให้ HTML ใหญ่ขึ้น ใช้เฉพาะตอน debug                                                           |

ข้อควรระวังเพิ่มเติมเฉพาะ WordPress:

- **`wp_json_encode` ดีกว่า `json_encode`** เพราะจัดการสตริงที่ไม่ใช่ UTF-8 ที่ถูกต้อง (จากข้อมูลเก่าที่ import มา) ให้ไม่ทำให้ทั้ง JSON พัง (`json_encode` จะคืน `false` ถ้าเจอ byte ผิด → Schema หายทั้งหน้าเงียบ ๆ)
- **`wp_strip_all_tags()` ก่อนใส่ใน description/answer** เพราะ excerpt/ACF อาจมี HTML และ `&nbsp;` ที่ Page Builder ใส่ให้ ควรตามด้วย `html_entity_decode(..., ENT_QUOTES, 'UTF-8')` ถ้าพบ `&amp;` ในข้อมูล
- **Timezone:** `wp_date()` ใช้ timezone จาก Settings → General (ตั้งเป็น Bangkok) จะได้ `+07:00` ถ้าใช้ `date()` ของ PHP จะเป็น UTC ของเซิร์ฟเวอร์ → เวลาคลาดเคลื่อน 7 ชั่วโมงและ `dateModified` ไม่ตรงกับที่แสดง
- **ตรวจว่า DB เป็น utf8mb4:** `wp-config.php` → `DB_CHARSET = 'utf8mb4'` และตารางเป็น `utf8mb4_unicode_520_ci` (Site Health → Info → Database)

### 4.5 ทดสอบ JSON-LD บน WordPress

```
1. View Source หน้าบริการ → มี application/ld+json 1 block เดียว
2. คัดลอก JSON → validator.schema.org → 0 errors; @type ต้องมี Organization, WebPage, Service, BreadcrumbList (FAQPage หลัง Module 5)
3. หน้าบทความ → Article + Person + BreadcrumbList; ตรวจ dateModified = วันที่แก้ล่าสุดจริง (+07:00)
4. หน้าแรก → Organization + WebSite(SearchAction) + WebPage
5. หน้า author (`/author/<username ของคุณ>/` เช่น `/author/admin/`) → ProfilePage + Person - ให้ทีมกรอก Biographical Info + job_title ให้ครบ
```

> ⛔ **ถ้า JSON-LD ไม่ปรากฏ:** (1) Page Cache/Object Cache ยังเปิดอยู่ → ล้าง cache หรือปิดชั่วคราว (2) Theme parent ไม่เรียก `wp_head()` ใน header.php (พบใน theme ที่เขียนเองบางตัว) (3) มี fatal error ใน geo-schema.php → เปิด `WP_DEBUG` ใน wp-config.php ดู error · **ถ้า validator บอก JSON พัง:** มักเป็น `false` จาก `wp_json_encode` เพราะข้อมูลไม่ใช่ UTF-8 → หา post ที่มีปัญหาด้วยการ `var_dump(json_last_error_msg())`

---

## 📚 Module 5: FAQ System บน WordPress + FAQPage Schema

### เวลา 22:40-23:00 น.

> 💡 **หัวใจของ Module นี้:** เหมือน Day 2 ทุกประการ: ข้อมูล FAQ อยู่ที่เดียว (ACF Repeater ในหน้าบริการ) แล้วแตกออกเป็น 2 ทาง คือ HTML ที่คนเห็น (Template Part) และ FAQPage Schema ที่เครื่องเห็น ทีมคอนเทนต์เพิ่ม FAQ ผ่านหน้า Admin ได้เองโดยไม่ต้องรู้เรื่อง Schema

---

### 5.1 ฟังก์ชันอ่าน FAQ (รองรับทั้ง ACF PRO Repeater และ ACF ฟรี + CPT)

```php
<?php
// inc/geo-faq.php

defined('ABSPATH') || exit;

/**
 * คืน FAQ ของบริการเป็น array [['question' => ..., 'answer' => ...], ...]
 * แหล่งที่ 1: ACF PRO Repeater 'faqs' ในหน้าบริการ
 * แหล่งที่ 2 (fallback สำหรับ ACF ฟรี): CPT 'faq' ที่มี Post Object field 'faq_service' ชี้มาที่บริการนี้
 */
function gc_get_faqs(int $service_id): array
{
    $faqs = [];

    // แหล่งที่ 1: Repeater
    if (function_exists('have_rows') && have_rows('faqs', $service_id)) {
        while (have_rows('faqs', $service_id)) {
            the_row();
            $q = trim(wp_strip_all_tags((string) get_sub_field('question')));
            $a = trim(wp_strip_all_tags((string) get_sub_field('answer')));
            if ($q !== '' && $a !== '') {
                $faqs[] = ['question' => $q, 'answer' => $a];
            }
        }
        return $faqs;
    }

    // แหล่งที่ 2: CPT faq (ACF ฟรี)
    $query = new WP_Query([
        'post_type'      => 'faq',
        'posts_per_page' => 20,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'meta_query'     => [['key' => 'faq_service', 'value' => $service_id]],
        'no_found_rows'  => true,
    ]);

    foreach ($query->posts as $post) {
        $faqs[] = [
            'question' => trim(wp_strip_all_tags($post->post_title)),
            'answer'   => trim(wp_strip_all_tags($post->post_content)),
        ];
    }

    return $faqs;
}

// CPT faq สำหรับผู้ที่ใช้ ACF ฟรี (ไม่มี Repeater) - ถ้าใช้ ACF PRO ข้ามส่วนนี้ได้
add_action('init', function () {
    if (function_exists('acf_get_setting') && acf_get_setting('pro')) {
        return;   // มี PRO → ใช้ Repeater ไม่ต้องมี CPT นี้
    }

    register_post_type('faq', [
        'labels'       => ['name' => 'FAQ', 'singular_name' => 'FAQ'],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'editor', 'page-attributes'],
        'menu_icon'    => 'dashicons-editor-help',
        'show_in_rest' => true,
    ]);
});
```

### 5.2 Template Part แสดง FAQ Section

```php
<?php
// template-parts/faq.php
// ใช้: get_template_part('template-parts/faq', null, ['faqs' => gc_get_faqs(get_the_ID())]);

defined('ABSPATH') || exit;

$faqs = $args['faqs'] ?? [];
if (! $faqs) {
    return;
}
?>
<section class="faq" aria-labelledby="faq-heading">
    <h2 id="faq-heading">คำถามที่พบบ่อย</h2>
    <?php foreach ($faqs as $index => $faq) : ?>
        <?php // <details>/<summary> = HTML ล้วน ไม่ต้องใช้ JS ของ Page Builder ?>
        <details class="faq-item"<?php echo $index === 0 ? ' open' : ''; ?>>
            <summary><h3><?php echo esc_html($faq['question']); ?></h3></summary>
            <div class="faq-answer">
                <p><?php echo esc_html($faq['answer']); ?></p>
            </div>
        </details>
    <?php endforeach; ?>
</section>
```

```css
/* geniuscorp-geo/style.css (ต่อจาก header) */
.faq { margin-top: 3rem; }
.faq-item { border: 1px solid #dde4ec; border-radius: 10px; margin-bottom: .75rem; padding: 0 1rem; }
.faq-item summary { cursor: pointer; padding: .9rem 0; list-style: none; }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary h3 { display: inline; font-size: 1.05rem; margin: 0; }
.faq-item summary::before { content: '+'; display: inline-block; width: 1.5rem; font-weight: 700; color: #1855a3; }
.faq-item[open] summary::before { content: '−'; }
.faq-answer { padding: 0 0 1rem 1.5rem; color: #4a5a78; line-height: 1.7; }
```

### 5.3 Template หน้าบริการ (single-service.php) ที่ประกอบทุกอย่างเข้าด้วยกัน

```php
<?php
// geniuscorp-geo/single-service.php
get_header();

while (have_posts()) : the_post();
    $price = get_field('price_from');
    $days  = get_field('duration_days');
    $faqs  = gc_get_faqs(get_the_ID());
    $crumbs = gc_breadcrumb_items();
?>
<main id="main" class="site-main container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php // Breadcrumb ที่มองเห็น มาจาก array เดียวกับ BreadcrumbList Schema ?>
        <nav aria-label="breadcrumb" class="breadcrumb">
            <ol>
                <?php foreach ($crumbs as $i => $crumb) : ?>
                    <li>
                        <?php if (! empty($crumb['url']) && $i < count($crumbs) - 1) : ?>
                            <a href="<?php echo esc_url($crumb['url']); ?>"><?php echo esc_html($crumb['name']); ?></a>
                        <?php else : ?>
                            <span aria-current="page"><?php echo esc_html($crumb['name']); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>

        <h1><?php the_title(); ?></h1>

        <?php if (has_excerpt()) : ?>
            <p class="lead"><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>

        <?php if ($price || $days) : ?>
            <dl class="facts">
                <?php if ($price) : ?><dt>ราคาเริ่มต้น</dt><dd><?php echo number_format((float) $price); ?> บาท</dd><?php endif; ?>
                <?php if ($days) : ?><dt>ระยะเวลาดำเนินการ</dt><dd><?php echo (int) $days; ?> วัน</dd><?php endif; ?>
            </dl>
        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large', ['loading' => 'lazy', 'class' => 'cover']); ?>
        <?php endif; ?>

        <div class="prose">
            <?php the_content(); ?>
        </div>

        <?php get_template_part('template-parts/faq', null, ['faqs' => $faqs]); ?>

    </article>
</main>
<?php
endwhile;

get_footer();
```

FAQPage Schema ถูกใส่ให้อัตโนมัติจาก `gc_build_graph()` ใน Module 4 (`gc_schema_faq(gc_get_faqs($post->ID))`) โดยใช้ฟังก์ชัน `gc_get_faqs()` ตัวเดียวกับ template → HTML และ Schema ตรงกันเสมอ

### 5.4 แนวทางเขียน FAQ แบบ answer-ready ให้ทีมคอนเทนต์ผ่านหน้า Admin

ใส่คำแนะนำไว้ **ในหน้า Admin เอง** (ACF `instructions` ทำแล้วในหัวข้อ 4.2) และเสริมด้วยกล่องเตือนในหน้าแก้ไขบริการ:

```php
// inc/geo-faq.php (ต่อ) - แสดง guideline ในหน้าแก้ไข service

add_action('edit_form_after_title', function (WP_Post $post) {
    if ($post->post_type !== 'service') {
        return;
    }
    ?>
    <div class="notice notice-info inline" style="margin:12px 0">
        <p><strong>แนวทางเขียนหน้าบริการให้ AI อ้างอิงได้:</strong></p>
        <ol style="margin-left:1.2em">
            <li><strong>คำอธิบายย่อ (Excerpt)</strong> 70-170 ตัวอักษร ระบุราคาเริ่มต้นและระยะเวลา (ใช้เป็น meta description และ Schema)</li>
            <li><strong>ย่อหน้าแรกของเนื้อหา</strong> ตอบว่า "บริการนี้คืออะไร เหมาะกับใคร" ให้จบใน 2-3 ประโยค</li>
            <li><strong>หัวข้อ (H2)</strong> เขียนเป็นคำถาม เช่น "เหมาะกับใคร", "ขั้นตอนการทำงานเป็นอย่างไร"</li>
            <li><strong>FAQ 4-6 ข้อ</strong> คำถามอย่างที่ลูกค้าถามจริง คำตอบ 2-4 ประโยค ประโยคแรกตอบตรง มีตัวเลขอย่างน้อย 1 ตัว</li>
            <li>ใส่ <strong>ตัวเลข/สถิติ/แหล่งอ้างอิง</strong> ในเนื้อหา (เพิ่มโอกาสถูกอ้างอิง 30-40% ตามงานวิจัย GEO)</li>
        </ol>
    </div>
    <?php
});
```

> 🧪 **ทดสอบ Module 5:** เพิ่ม FAQ 4 ข้อให้บริการ "รับพัฒนาเว็บไซต์องค์กร" (ใช้ข้อความเดียวกับ FaqSeeder ของ Day 1) → เปิดหน้าบริการ เห็น FAQ Section เปิด-ปิดได้ → View Source มี `FAQPage` ใน @graph มี Question 4 ตัว → Rich Results Test ผ่าน · Checklist ข้อ 12-15 กลายเป็น ✅

---

## 📚 Module 6: Content Structure & Performance บน WordPress

### เวลา 23:00-23:15 น.

> 💡 **หัวใจของ Module นี้:** WordPress ช้าไม่ใช่เพราะ WordPress แต่เพราะ "ทุก request รัน PHP + 40 query + โหลด 60 ไฟล์ + รูป 3MB" การแก้ 4 อย่างคือ cache, รูป, ตัด CSS/JS และลด plugin ทำให้ WordPress ไปถึง 70-80% ของ SSG ได้ และเป้าหมายต้องวัดได้เป็นตัวเลข

---

### 6.1 ปรับโครงเนื้อหาให้ answer-ready (เหมือน Astro แต่ทำผ่าน Editor)

| หลักการ                      | ทำใน WordPress อย่างไร                                                                                   |
| ---------------------------- | -------------------------------------------------------------------------------------------------------- |
| Inverted Pyramid             | ย่อหน้าแรกใน Editor = คำตอบหลัก 2-3 ประโยค (และตรงกับ Excerpt)                                              |
| H2 แบบคำถาม                  | ใช้ Heading block ระดับ H2 พิมพ์เป็นคำถาม (Block Editor ไม่ให้เลือก H1 ในเนื้อหาอยู่แล้ว ดี)                    |
| ตารางเปรียบเทียบ             | Table block (ออกมาเป็น `<table>` จริง ต่างจาก Page Builder บางตัวที่ทำตารางด้วย div)                        |
| ตัวเลขและแหล่งอ้างอิง          | ใส่ลิงก์ไปแหล่งที่มาด้วย `rel="noopener"` ปกติ ไม่ต้อง nofollow ถ้าเป็นแหล่งที่เชื่อถือได้                    |
| Block Pattern สำหรับทีม       | สร้าง Pattern "หน้าบริการมาตรฐาน" (ย่อหน้าสรุป → H2 เหมาะกับใคร → H2 ราคาและระยะเวลา → H2 ขั้นตอน → FAQ) ให้ทีมกดใช้ (Day 4 อธิบายเพิ่ม) |

### 6.2 Page Cache, Object Cache และการลด CSS/JS

**เปิด LiteSpeed Cache ตอนนี้** (ที่ precourse บอกให้ติดตั้งไว้แต่ยังไม่เปิด) หรือ WP Rocket / WP Super Cache ตามที่มี ตั้งค่าขั้นต่ำที่ได้ผลและปลอดภัย:

| หมวด                | ตั้งค่า                                                                                  | ผล                                                        |
| ------------------- | ---------------------------------------------------------------------------------------- | --------------------------------------------------------- |
| Cache → Enable Cache | On (Cache logged-in users = Off)                                                         | TTFB จาก 1.4s → ~0.2s สำหรับผู้ใช้ทั่วไปและ crawler         |
| Cache → TTL         | Public 1 สัปดาห์ (604800), Front page 1 วัน                                              | ลด cache miss                                              |
| Cache → Purge       | Auto purge on post update = On, รวมหน้า archive/หน้าแรก                                    | เนื้อหาใหม่เห็นทันทีเมื่อกด Update (เทียบเท่า Webhook Rebuild ของ Astro) |
| Object Cache        | On ถ้าเซิร์ฟเวอร์มี Redis/Memcached (Laragon ไม่มี ข้ามได้)                                | ลด DB query ซ้ำ                                            |
| Page Optimization → CSS | Minify On, Combine **Off** (combine ทำให้ cache แตกง่ายและ CSS ใหญ่), Load CSS Async **ทดสอบก่อน** | ลดขนาด CSS                                                |
| Page Optimization → JS  | Minify On, Defer JS On (ยกเว้น jQuery ถ้า theme ใช้ inline), Delay JS **ทดสอบก่อน**       | ลด TBT                                                     |
| Page Optimization → Optimization | Remove Google Fonts (ถ้าโหลดฟอนต์เองได้), Remove WP emoji, Remove noscript tag Off  | ลด request                                                 |
| Image Optimization  | ดูหัวข้อ 6.3                                                                             |

> ⚠️ **หลังเปิด cache ทุกครั้งที่แก้โค้ดใน Child Theme ต้อง Purge All** ไม่เช่นนั้นจะไม่เห็นผล (นี่คือเหตุผลที่ precourse ให้ปิดไว้จนถึงตอนนี้)

**ตัด CSS/JS ที่ไม่ได้ใช้ด้วยโค้ด** (ดูรายการจาก Query Monitor → Scripts/Styles):

```php
<?php
// inc/geo-performance.php

defined('ABSPATH') || exit;

/**
 * Dequeue CSS/JS ของ plugin ที่โหลดทุกหน้าแต่ใช้แค่บางหน้า
 * ชื่อ handle ดูจาก Query Monitor → Scripts / Styles
 */
add_action('wp_enqueue_scripts', function () {
    // Contact Form 7 ใช้แค่หน้า contact
    if (! is_page('contact')) {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_script('contact-form-7');
        wp_dequeue_script('wpcf7-recaptcha');
    }

    // Slider ใช้แค่หน้าแรก
    if (! is_front_page()) {
        wp_dequeue_style('slick-slider');
        wp_dequeue_script('slick-slider');
    }

    // Block Library CSS ของ core (ถ้า theme ไม่ได้ใช้ block styles ในหน้าที่ไม่ใช่ post)
    if (! is_singular(['post', 'service', 'page'])) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('global-styles');
    }

    // Dashicons สำหรับผู้ที่ไม่ได้ล็อกอิน
    if (! is_user_logged_in()) {
        wp_dequeue_style('dashicons');
    }
}, 100);

// ปิด jQuery Migrate (theme สมัยใหม่ไม่ต้องใช้)
add_action('wp_default_scripts', function ($scripts) {
    if (! is_admin() && isset($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});
```

**ลด Plugin จาก 23 → ประมาณ 10** (ทำเป็นการบ้าน): เกณฑ์จาก Module 1.3 ใน Demo Site ควรเหลือ Rank Math, ACF, LiteSpeed Cache, Contact Form (1 ตัว), Redirection, All-in-One WP Migration (ปิดไว้เปิดเมื่อใช้), Query Monitor (ปิดบน production) และ Page Builder ถ้ายังต้องใช้ ส่วน slider ตัวที่ 2, form ตัวที่ 2, addon ที่ไม่ได้ใช้, social share, Google Fonts plugin ลบทิ้ง

### 6.3 Image Optimization: WebP, ขนาดตามจริง, Lazy Load และ og:image

```php
// inc/geo-performance.php (ต่อ)

// 1) WordPress 6.x สร้าง WebP ได้เอง เมื่ออัปโหลด JPEG/PNG ใหม่ (ต้องมี Imagick/GD ที่รองรับ WebP)
add_filter('image_editor_output_format', function (array $formats): array {
    $formats['image/jpeg'] = 'image/webp';
    $formats['image/png']  = 'image/webp';
    return $formats;
});

// 2) ขนาดใหญ่สุดที่ให้ WP เก็บไว้ (รูปต้นฉบับ 4000px จะถูกย่อเป็น 2560px อัตโนมัติผ่าน big_image_size_threshold)
add_filter('big_image_size_threshold', fn () => 1920);

// 3) ขนาดรูปที่ theme ใช้จริง (ไม่สร้างขนาดที่ไม่ใช้ให้เปลืองพื้นที่)
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);          // og:image + cover
    add_image_size('card', 800, 450, true);            // การ์ดในหน้ารวม
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
});

// 4) Lazy load: WP ใส่ loading="lazy" ให้รูปในเนื้อหาอยู่แล้ว (ตั้งแต่ 5.5)
//    แต่รูปแรกของหน้า (LCP) ต้อง "ไม่" lazy และควร fetchpriority="high" - WP 6.3+ ทำให้อัตโนมัติ
//    ถ้า theme เรียก the_post_thumbnail เองเหนือ the_content ให้ระบุชัด:
add_filter('wp_get_attachment_image_attributes', function (array $attr, $attachment, $size): array {
    if ($size === 'post-thumbnail' && is_singular()) {
        $attr['loading']       = 'eager';
        $attr['fetchpriority'] = 'high';
    }
    return $attr;
}, 10, 3);
```

สำหรับรูปเก่าที่อัปโหลดไว้แล้ว (Demo Site มี JPEG 2.8MB): ใช้ **LiteSpeed Cache → Image Optimization** (ฟรี ผ่าน QUIC.cloud) หรือ plugin แปลง WebP เช่น "Converter for Media" รันครั้งเดียวทั้งคลัง หรือ WP-CLI `wp media regenerate` หลังตั้ง filter ด้านบน

**og:image:** Rank Math ใช้ Featured Image เป็น og:image โดยอัตโนมัติ (ต้องเป็น 1200×630 ขึ้นไป ไม่เกิน 8MB แต่ควร < 300KB) ให้ตั้ง `set_post_thumbnail_size(1200, 630)` และเลือกรูปที่มีจุดโฟกัสกลางภาพ เพราะจะถูก crop

### 6.4 เป้าหมายที่วัดได้

| ตัวชี้วัด                 | ก่อนแก้ (Demo) | เป้าหมาย WordPress + Cache | เป้าหมาย Astro SSG (เทียบ) | วัดด้วย                                   |
| ------------------------- | -------------- | -------------------------- | -------------------------- | ----------------------------------------- |
| TTFB                      | 1.4s           | < 0.6s (cache hit ~0.2s)    | < 0.4s                      | DevTools Network → Doc → Timing / PSI     |
| ขนาด HTML (uncompressed)  | 480KB          | < 150KB                     | < 50KB                      | DevTools Network → Doc → Size              |
| LCP (mobile)              | 5.1s           | < 2.5s                      | < 1.5s                      | Lighthouse / PSI                           |
| จำนวน request             | 94             | < 30                        | < 10                        | DevTools Network                           |
| รูป cover                 | JPEG 2.8MB     | WebP < 150KB                | WebP < 150KB                | DevTools Network → Img                     |
| DB queries ต่อหน้า        | 112            | < 40 (0 เมื่อ cache hit)     | 0                           | Query Monitor                              |

---

## 📚 Module 7: เมื่อไหร่ควรอยู่กับ WordPress ต่อ เมื่อไหร่ควรย้าย

### เวลา 23:15-23:20 น.

หลังจากทำ Retrofit มาทั้งคืน ผู้เรียนจะเห็นภาพชัดว่า WordPress "ไปถึง GEO-Ready ได้" แต่ต้องดูแลไม่ให้ Plugin/Theme/Page Builder ทำพังซ้ำ ตารางนี้สรุปมิติที่ใช้ตัดสินใจ (ต่อยอดจาก Day 1 หัวข้อ 2.4):

| มิติ                              | WordPress (หลัง Retrofit)                               | Astro SSG + Laravel API                              | ใครได้เปรียบ                |
| --------------------------------- | ------------------------------------------------------- | ---------------------------------------------------- | --------------------------- |
| GEO: ควบคุม HTML/Schema           | ได้ผ่าน Child Theme แต่ Page Builder ยังแทรก markup      | ควบคุม 100%                                          | Astro                       |
| GEO: ความคงทนของสิ่งที่ทำ          | อัปเดต plugin/theme อาจทำ Schema ซ้ำหรือ heading พังอีก   | ไม่มีอะไรเปลี่ยนเองถ้าไม่แก้โค้ด                        | Astro                       |
| Performance                       | ดีเมื่อ cache hit (~0.2s) แต่ cache miss ช้า และ HTML ยังใหญ่ | ดีเสมอ ไม่มี cache miss                            | Astro                       |
| ต้นทุนดูแลรายเดือน                | อัปเดต core/plugin/theme, security scan, backup           | แทบไม่มี (static) + ดูแล Laravel API                   | Astro                       |
| ทีมคอนเทนต์แก้เองได้               | ได้ทันทีผ่าน Admin (Block Editor + ACF)                   | ต้องมี Admin สำหรับ Laravel (สร้างเพิ่ม เช่น Filament) หรือใช้ WP เป็น Headless | WordPress                   |
| เนื้อหาเห็นผลทันที                 | ทันที (purge cache)                                       | ต้อง rebuild (1-3 นาที ผ่าน Webhook)                   | WordPress                   |
| ระบบเสริม (ฟอร์ม, สมาชิก, e-commerce) | มี plugin สำเร็จรูป                                    | ต้องพัฒนาเอง หรือใช้ SaaS                              | WordPress                   |
| ความปลอดภัย                       | เป็นเป้าโจมตีอันดับ 1 ต้องดูแลตลอด                          | หน้าเว็บ static โจมตีไม่ได้ API อยู่หลังบ้าน              | Astro                       |
| ต้นทุนเริ่มต้น                     | ต่ำ (มีอยู่แล้ว)                                          | ปานกลาง (สร้างใหม่ + ย้ายเนื้อหา)                       | WordPress                   |

**เส้นทาง Migration แบบค่อยเป็นค่อยไป** (สำหรับเว็บที่ตัดสินใจย้าย):

```
ระยะที่ 0  Retrofit WordPress ตาม Day 3 ก่อน (ได้ baseline GEO และซื้อเวลา)
   │
ระยะที่ 1  Strangler pattern: สร้าง Astro สำหรับ "หน้าใหม่" หรือ "หน้าที่สำคัญที่สุด" (landing บริการ)
   │        Reverse proxy ที่ Nginx: /services/* → Astro static, ที่เหลือ → WordPress
   │        URL เดิมทุกอันต้องเหมือนเดิม 100% (slug เดียวกัน trailing slash เดียวกัน)
   │
ระยะที่ 2  ย้ายบทความ: export จาก WP REST API → import เข้า MySQL ของ Laravel (เก็บ slug, published_at, author เดิม)
   │        ตั้ง 301 ทุก URL ที่เปลี่ยน (ถ้ามี) ผ่าน Nginx map หรือ Laravel redirect table
   │        Sitemap ใหม่ต้องมี URL เดิมครบ และ submit ใน Search Console/Bing ทันที
   │
ระยะที่ 3  WordPress เหลือเป็น Headless CMS (ทีมคอนเทนต์ยังใช้ Admin เดิม) หรือถอดออกเมื่อ Laravel Admin พร้อม
   │        ตรวจ Search Console → Coverage ว่าไม่มี 404 พุ่ง และ AI crawlers ยังเข้าตามปกติ (Day 4)
   │
ระยะที่ 4  ปิด WordPress, เก็บ backup, ตรวจ redirect ทุก 3 เดือนว่ายังทำงาน
```

กฎเหล็กของการย้าย: **URL เดิม = URL ใหม่** ถ้าเป็นไปได้ · ทุก URL ที่เปลี่ยน = 301 เดียว ไม่ใช่ chain · `published_at`/author เดิมต้องติดไปด้วย (ไม่ให้บทความอายุ 5 ปีกลายเป็น "เผยแพร่วันนี้") · ทำทีละส่วนและวัดผลก่อนไปต่อ

---

## 🛠️ Workshop Day 3 - GeniusCorp WP: วัดผลก่อน-หลัง และผ่าน Checklist

### เวลา 23:20-23:30 น. (ส่วนที่เหลือทำต่อเป็นการบ้านก่อน Day 4)

> **โจทย์:** เว็บ GeniusCorp WP ต้องผ่าน Checklist 20 ข้อให้ได้มากที่สุด (ข้อ 7, 16, 17 ทำใน Day 4) โดยมีตัวเลขก่อน-หลังยืนยัน และมี Child Theme ที่พร้อมนำไปใช้กับเว็บ WordPress จริงของตัวเอง

### ขั้นที่ 1 - ตารางวัดผลก่อน-หลัง (กรอกจริง)

| ตัวชี้วัด                              | ก่อน (จากช่วง 20:30) | หลัง Module 3-6 | เครื่องมือ                     |
| -------------------------------------- | -------------------- | --------------- | ------------------------------ |
| จำนวน `<h1>` หน้าบริการ / หน้าแรก       | 2 / 1 (โลโก้)         |                 | Console                        |
| ความยาว `<title>` หน้าแรก               | 120+                 |                 | View Source                    |
| meta description หน้าบทความ            | auto/boilerplate     |                 | View Source                    |
| จำนวน `application/ld+json` หน้าบริการ  | 1 (Article ผิด) + microdata ของ Astra |   | View Source                    |
| @type ในหน้าบริการ                      | Article (ผิด)         |                 | validator.schema.org           |
| FAQPage                                | ไม่มี                 |                 | Rich Results Test              |
| canonical `/blog/page/2/`               | ชี้หน้าแรก             |                 | View Source                    |
| ขนาด HTML หน้าแรก                       | 480KB                |                 | DevTools Network               |
| จำนวน request หน้าแรก                   | 94                   |                 | DevTools Network               |
| TTFB (cache hit)                        | 1.4s                 |                 | DevTools Network               |
| Lighthouse Mobile Performance           |                      |                 | DevTools Lighthouse            |
| LCP                                    | 5.1s                 |                 | Lighthouse                     |
| Plugin ที่เปิดใช้                        | 23                   |                 | Plugins page                   |

### ขั้นที่ 2 - Checklist 20 ข้อ (ติ๊กจริง)

- [ ] 1 Title ไม่ซ้ำ ~50-60 ตัวอักษร
- [ ] 2 Meta description รายหน้าเขียนจริง
- [ ] 3 ไม่มี meta keywords
- [ ] 4 OG ครบ + article:published_time/author
- [ ] 5 Canonical สะอาดไม่มี query
- [ ] 6 Pagination canonical ถูก
- [ ] 7 https/www/trailing slash (Day 4)
- [ ] 8 H1 เดียวทุกหน้า
- [ ] 9 H2/H3 เป็นต้นไม้
- [ ] 10 ย่อหน้าแรกตอบคำถามหลัก
- [ ] 11 ไม่มีเนื้อหาสำคัญที่โหลดด้วย JS
- [ ] 12 JSON-LD ชุดเดียว
- [ ] 13 Organization/WebSite ถูกต้อง ตรง Contact
- [ ] 14 Service+Offer / Article+Person / Breadcrumb ถูกประเภท
- [ ] 15 FAQPage ตรงกับหน้า
- [ ] 16 Sitemap lastmod จริง (Day 4)
- [ ] 17 robots.txt (Day 4)
- [ ] 18 TTFB ผ่านเกณฑ์
- [ ] 19 HTML < 150KB, WebP, lazy
- [ ] 20 LCP < 2.5s

### ขั้นที่ 3 - การบ้านก่อน Day 4

1. ทำ Checklist ให้ครบยกเว้นข้อ 7, 16, 17
2. ย้าย 3 บริการเป็น CPT `service` + ใส่ราคา/ระยะเวลา/FAQ ครบ + ตั้ง 301 จาก URL เดิม
3. กรอกโปรไฟล์ผู้เขียน (Users → Profile: Biographical Info, Website, ACF job_title/social_links) ให้ครบ เพราะ Day 4 จะทำ Author Box จากข้อมูลนี้
4. ลด plugin ให้เหลือ ≤ 10 และจดว่าลบอะไรไปบ้าง
5. Export เว็บเก็บไว้เป็น snapshot "หลัง Retrofit" สำหรับ Deploy ใน Day 4: ถ้าต้องการย้ายทั้งเว็บ (รวม theme/plugin/รูป) ให้ติดตั้ง All-in-One WP Migration แล้ว Export เป็น `.wpress` ถ้าต้องการเฉพาะเนื้อหาให้ใช้ Tools → Export (.xml)

---

## 📁 โครงสร้างไฟล์สรุปวันที่ 3 (Child Theme GeniusCorp GEO)

```
wp-content/themes/geniuscorp-geo/
├── style.css                     ← header child theme + CSS ของ FAQ/breadcrumb
├── functions.php                 ← enqueue + require inc/*.php
├── header.php                    ← (override เฉพาะถ้า theme ไม่มี filter) โลโก้เป็น h1 เฉพาะหน้าแรก
├── archive-service.php           ← หน้ารวมบริการ: H1 + การ์ดเป็น H3 + ราคา/วัน
├── single-service.php            ← หน้าบริการ: breadcrumb + H1 + facts + content + FAQ
├── template-parts/
│   └── faq.php                   ← <details>/<summary> FAQ Section
├── assets/
│   ├── logo.png                  ← Organization.logo
│   └── og-default.jpg            ← og:image default 1200×630
└── inc/
    ├── geo-cleanup.php           ← ลบ meta keywords/emoji/oEmbed, ปิด Schema ของ Rank Math/Theme/Builder, ปิด XML-RPC
    ├── geo-post-types.php        ← CPT service + ACF fields (price_from, duration_days, faqs repeater) + sitemap
    ├── geo-metadata.php          ← บังคับ excerpt, canonical filter, OG article:author/og:type
    ├── geo-headings.php          ← filter site title tag
    ├── geo-schema.php            ← gc_site(), builders (organization/website/webpage/service/article/person/breadcrumb/faq), gc_build_graph(), wp_head hook
    ├── geo-faq.php               ← gc_get_faqs() (Repeater หรือ CPT faq), guideline ในหน้า Admin
    └── geo-performance.php       ← dequeue CSS/JS, jquery-migrate, WebP, image sizes, LCP eager
```

---

## 📝 สรุปประจำวันที่ 3

| หัวข้อ                                  | สิ่งที่ทำได้แล้ว                                                                                                    |
| --------------------------------------- | ------------------------------------------------------------------------------------------------------------------- |
| Module 1 - WP ในสายตา AI                | เข้าใจการเรนเดอร์และ wp_head, รู้ปัญหาที่ Theme/Builder/Plugin สร้าง, มีเกณฑ์คัด Plugin และรู้ขอบเขต Plugin vs โค้ดเอง |
| ★ Module 2 - GEO Audit                   | Checklist 20 ข้อ + View Source/Query Monitor/Lighthouse + Impact vs Effort matrix ที่ใช้กับเว็บลูกค้าได้ทันที          |
| Module 3 - Metadata/Canonical/Heading   | Child Theme, Rank Math ตั้งค่าถูก, บังคับ Excerpt, canonical filter, โลโก้ไม่ใช่ H1, การ์ดเป็น H3, cleanup head        |
| ★ Module 4 - JSON-LD ด้วยโค้ดเอง         | ปิด Schema ซ้ำ 3 แหล่ง, CPT service + ACF, geo-schema.php ครบทุก builder เทียบเท่า schema.ts, encoding ไทยปลอดภัย     |
| Module 5 - FAQ                           | ACF Repeater (หรือ CPT faq) → gc_get_faqs() → Template Part + FAQPage Schema จากข้อมูลเดียวกัน + guideline ใน Admin   |
| Module 6 - Content & Performance         | Block/Pattern สำหรับ answer-ready, LiteSpeed Cache ตั้งค่า, dequeue, WebP/ขนาดรูป/LCP, เป้าหมายตัวเลข                 |
| Module 7 - อยู่ต่อหรือย้าย               | ตารางเปรียบเทียบ 9 มิติ + เส้นทาง Migration 4 ระยะที่รักษา URL                                                        |
| ★ Workshop Day 3                         | GeniusCorp WP ผ่าน Checklist 17/20 พร้อมตัวเลขก่อน-หลัง                                                               |

### ✅ ตรวจสอบความพร้อมก่อน Day 4 (Deployment & Measurement - วันอาทิตย์ที่ 13 กันยายน)

> ให้แน่ใจว่า:
>
> - ทั้ง GeniusCorp Modern (`npm run build` ผ่าน GEO check) และ GeniusCorp WP (Checklist 17/20) พร้อม
> - โปรไฟล์ผู้เขียนใน WordPress กรอกครบ และ `team_members` ใน MySQL ของ Laravel มีข้อมูลครบ (Author Box ทั้งสองฝั่ง)
> - มีบัญชี Google Search Console และ Bing Webmaster Tools พร้อมล็อกอิน
> - ถ้ามีเว็บจริงหรือเซิร์ฟเวอร์ของตัวเอง (Apache/Nginx + SSH) เตรียมข้อมูลเข้าถึงไว้ จะได้ Deploy จริงตามไปพร้อมกัน (ถ้าไม่มี จะดูสาธิตบนเซิร์ฟเวอร์ของสถาบัน)
> - ติดตั้ง `rsync` (มีใน Git Bash/WSL/macOS) และทดสอบ `ssh` เข้าเซิร์ฟเวอร์ได้ถ้ามี

---

## 📖 แหล่งอ้างอิงประจำวันที่ 3

- WordPress Developer Resources - Theme Handbook: Child Themes, Template Hierarchy: https://developer.wordpress.org/themes/
- WordPress Developer Resources - Plugin Handbook: Hooks (`wp_head`, `init`, `wp_enqueue_scripts`), `register_post_type`, `wp_json_encode`: https://developer.wordpress.org/plugins/ และ https://developer.wordpress.org/reference/
- WordPress Developer Resources - Performance: Images (WebP, lazy loading, fetchpriority): https://developer.wordpress.org/advanced-administration/performance/
- Rank Math - Filters and Hooks (`rank_math/json_ld`, `rank_math/frontend/canonical`, `rank_math/opengraph/*`, `rank_math/sitemap/post_types`): https://rankmath.com/kb/filters-hooks-api-developer/
- Yoast SEO - Developer documentation (`wpseo_json_ld_output`, `wpseo_schema_graph_pieces`, `wpseo_canonical`): https://developer.yoast.com/
- Advanced Custom Fields - Documentation: Repeater, `have_rows()`, `get_field()`, Local JSON/PHP field groups, Options Page: https://www.advancedcustomfields.com/resources/
- Query Monitor: https://querymonitor.com/
- LiteSpeed Cache for WordPress - Documentation: https://docs.litespeedtech.com/lscache/lscwp/
- Google Search Central - Structured data (Service ไม่มี rich result แต่ใช้ Organization/LocalBusiness/Article/FAQ/Breadcrumb): https://developers.google.com/search/docs/appearance/structured-data
- Google Search Central - Site moves with URL changes (301, sitemap, monitoring): https://developers.google.com/search/docs/crawling-indexing/site-move-with-url-changes
- web.dev - Largest Contentful Paint (LCP), Optimize LCP: https://web.dev/articles/lcp
- PHP Manual - `json_encode` flags (`JSON_UNESCAPED_UNICODE`, `JSON_HEX_TAG`): https://www.php.net/manual/en/json.constants.php

---

**💡 คำคมประจำวัน:**

> "WordPress ไม่ได้แย่สำหรับ AI Search แต่มันถูกทำให้แย่ด้วยของที่เราติดตั้งเพิ่มเข้าไปโดยไม่รู้ว่ามันทำอะไรกับ HTML ของเรา การ Retrofit จึงเริ่มจากการ 'ถอดออก' ก่อน 'ใส่เพิ่ม' เสมอ"

---

_เอกสารจัดทำโดย: อาจารย์สามิตร โกยม | IT Genius Engineering Co., Ltd._
_หลักสูตร ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO) - วันที่ 3 จาก 4_
