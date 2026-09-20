# WordPress GEO/AEO Retrofit: ขั้นตอนตั้งแต่ติดตั้งใหม่จนผ่าน Checklist 20 ข้อ

> เอกสารสรุปสั้นสำหรับใช้คู่กับ `Day3_note.md` (รายละเอียดเต็ม) และโค้ดเฉลย `Code/Day3` · `Code/Day4`
> ทดสอบจริงบน WordPress 7.1 + Astra 4.13 + Rank Math 1.0.278 + ACF ฟรี
> ตัวเลขในวงเล็บคือข้อใน Checklist 20 ข้อที่ผ่านจากขั้นตอนนั้น

---

## ภาพรวม: ใครแก้ข้อไหน

Checklist 20 ข้อไม่ได้ผ่านด้วยการเปิด Child Theme อย่างเดียว แต่ละข้อมีเจ้าของต่างกัน 4 กลุ่ม

| กลุ่ม | ใครแก้ | ข้อที่ผ่าน | เวลาโดยประมาณ |
| --- | --- | --- | --- |
| **A** | โค้ดใน Child Theme (แค่ Activate) | 3, 5, 6, 8, 11, 12, 13, 14 (บางส่วน), 4 (บางส่วน) | 2 นาที |
| **B** | ตั้งค่า plugin (Rank Math + Tagline) | 1, 2 (template), 4 (og:type) | 10 นาที หรือ 1 คลิกด้วย GEO Setup |
| **C** | เนื้อหา (ทีมคอนเทนต์) | 2 (เขียนจริง), 9, 10, 14 (Service+Offer), 15 | ขึ้นกับจำนวนหน้า |
| **D** | Performance (Module 6) | 18, 19, 20 | 30 นาที |
| **Day 4** | Deploy + Sitemap + robots/llms.txt | 7, 16, 17 | Day 4 |

---

## A. เตรียม WordPress (ประมาณ 15 นาที)

1. ติดตั้ง WordPress เปล่าใน Laragon ที่ `geniuscorp.test` ตั้งชื่อเว็บ `GeniusCorp`
2. Appearance → Themes → Add New → ค้นหา **Astra** → Install → **Activate**
   (WordPress ติดตั้งใหม่ให้ Twenty Twenty-Five ซึ่งเป็น block theme ใช้กับ Child Theme ของคอร์สไม่ได้)
3. ติดตั้ง plugin

   | Plugin | สถานะ | หมายเหตุ |
   | --- | --- | --- |
   | Rank Math SEO | **Activate** | ต้องผ่านหน้า Setup Wizard (กด Skip ได้) ไม่งั้น Rank Math ไม่ทำงานฝั่งหน้าเว็บ |
   | Advanced Custom Fields | **Activate** | ACF ฟรีใช้ได้ FAQ จะเป็น CPT `faq` แทน Repeater |
   | Query Monitor | Activate | เครื่องมือหา callback/hook |
   | LiteSpeed Cache | ติดตั้ง **ยังไม่เปิด** | เปิดตอน Module 6 เท่านั้น |

4. Settings → Permalinks → **Post name** → Save

---

## B. สร้างสภาพ "ก่อนแก้" สำหรับทัวร์ปัญหา

5. Tools → Import → WordPress → Run Importer → เลือก `Code/Day3/geniuscorp-wp/demo-site/geniuscorp-wp-demo.xml` → assign posts to an existing user = admin ของคุณ
6. Settings → Reading → A static page → Homepage = **หน้าแรก**, Posts page = **บทความ** → Save
7. Settings → General → คำโปรย (Tagline) วางข้อความยาว keyword stuffing ตาม Note ข้อ 7 → Save
8. Appearance → Customize → Header Builder → Site Title & Logo → เปิด **Display Site Tagline** → Publish
   (Astra ปิดไว้เป็นค่าเริ่มต้น เปิดเพื่อให้เห็นปัญหาข้อ 3 ในทุกหน้า)
9. เปิด `view-source:http://geniuscorp.test/web-development/` แล้วกรอกคอลัมน์ "ก่อน" ในตาราง Workshop
   ควรเห็น: `<h1` 2 ตัว, `application/ld+json` 1 block ที่เป็น `Article` ผิดประเภท, `itemtype=` ของ Astra, meta description เป็นย่อหน้าแนะนำบริษัท

---

## C. กลุ่ม A: เปิด Child Theme (2 นาที)

10. คัดลอกโฟลเดอร์ `Code/Day3/geniuscorp-wp/wp-content/themes/geniuscorp-geo` ไปไว้ใน `wp-content/themes/` ของเว็บ
11. Appearance → Themes → Activate **GeniusCorp GEO**
12. Settings → Permalinks → Save (flush rewrite rules)

**ผ่านทันที:** 3 (ไม่มี meta keywords), 5 (canonical สะอาด), 6 (pagination canonical), 8 (H1 เดียวทุกหน้า), 11 (ไม่มีเนื้อหาที่โหลดด้วย JS), 12 (JSON-LD ชุดเดียว), 13 (Organization/WebSite), 14 บางส่วน (Article + Person + BreadcrumbList), 4 บางส่วน (`article:author`, `article:published_time`, `og:site_name`)

---

## D. กลุ่ม B: ตั้งค่า Rank Math (10 นาที หรือ 1 คลิก)

13. **ทางสอน:** ตั้งค่าเองตามตารางใน `Day3_note.md` หัวข้อ 3.2 ทุกแถว
    **ทางลัด/ตรวจคำตอบ:** Tools → **GEO Setup** → ดูตารางค่าปัจจุบันเทียบค่าที่จะตั้ง → กดปุ่ม "ตั้งค่าทั้งหมดตามตาราง"

    สิ่งที่ถูกตั้ง: Title template ของ post/page/service, Description = `%excerpt%`, Schema Type = **None** ทุก post type, Knowledge Graph = **Company** + ชื่อ + โลโก้, SEO Title/Description ของหน้าแรก, Tagline สั้น, เปิด CPT `service` ใน sitemap, ปิด attachment sitemap

**ผ่าน:** 1 (Title ไม่ซ้ำ ไม่ยัด keyword), 2 บางส่วน (template ถูก รอเนื้อหา), 4 (og:type ถูกประเภท)

---

## E. กลุ่ม C: แก้เนื้อหา

14. **Excerpt:** ทุกโพสต์และทุกบริการต้องมีคำอธิบายย่อ 70-170 ตัวอักษร (ถ้าไม่ครบ Child Theme จะไม่ให้ Publish และขึ้นข้อความเตือน) และย่อหน้าแรกต้องตอบคำถามหลักของหน้านั้น ไม่ใช่ประโยคแนะนำบริษัทซ้ำทุกหน้า → **ผ่าน 2, 10**
15. **Heading:** หน้าแรกเปลี่ยน `<div class="hero-title">` เป็น **H1**, การ์ดบริการในหน้ารวมเป็น **H3**, หน้าบริการลบ `<h1>` ที่อยู่ในเนื้อหาออก (theme ใส่ชื่อเรื่องเป็น H1 ให้แล้ว) → **ผ่าน 9**
16. **ย้ายบริการเป็น CPT:**
    - บริการ → เพิ่มบริการใหม่ 3 ตัว คัดลอกเนื้อหามาโดยไม่เอา `<h1>` ติดมา
    - ใส่ Excerpt, ราคาเริ่มต้น, ระยะเวลา, FAQ 4 ข้อต่อบริการ (ACF ฟรี: ไปที่เมนู FAQ แล้วผูกกับบริการ)
    - Trash หน้า Page "บริการ" (slug `services`) และ 3 หน้าบริการเดิม
    - Settings → Permalinks → Save (URL `/services/` จะกลายเป็น archive ของ CPT เมื่อไม่มี Page slug นี้แล้ว)
    - Rank Math → Redirections ตั้ง 301 จาก `/web-development/` → `/services/web-development/` ครบทั้ง 3 หน้า
    → **ผ่าน 14 (Service + Offer), 15 (FAQPage)**
17. **ผู้เขียน:** Users → Profile กรอก Biographical Info, Website และตำแหน่ง (ฟิลด์ ACF `job_title`) ให้ครบ เพื่อให้ Person schema สมบูรณ์ (ต่อยอดเป็น Author Box ใน Day 4)

> เฉลยเนื้อหาทั้งหมดอยู่ใน `demo-site/geniuscorp-wp-demo-after.xml` สำหรับ Import ลงเว็บเปล่าเพื่อดูผลลัพธ์ที่ควรได้

---

## F. กลุ่ม D: Performance (Module 6)

18. อัปโหลดรูปใหม่ (Child Theme แปลงเป็น WebP และจำกัดขนาดให้อัตโนมัติ), ตรวจว่ารูปแรกของหน้าไม่ lazy load
19. ลด plugin ให้เหลือ 10 ตัวหรือน้อยกว่า จดว่าปิดอะไรไปบ้าง
20. เปิด LiteSpeed Cache: Page Cache + Minify CSS/JS → ล้าง cache ทุกครั้งที่แก้โค้ด
21. วัดผลด้วย DevTools → Lighthouse (mobile) และ Network → Doc

**ผ่าน:** 18 (TTFB), 19 (HTML < 150KB, WebP, lazy), 20 (LCP < 2.5s)

---

## G. Day 4: ที่เหลืออีก 3 ข้อ

22. รัน `Code/Day4/geniuscorp-wp/demo-site/fix-lastmod-after-import.sql` (หลัง backup) เพื่อแก้ `lastmod` ที่เท่ากันทุก URL จากการ Import → **ผ่าน 16**
23. Deploy ขึ้น HTTPS และบังคับ www/trailing slash ให้เป็นรูปแบบเดียวใน `.htaccess` → **ผ่าน 7**
24. คัดลอก `inc/geo-llms.php` จาก Day 4 เข้า Child Theme (มีอยู่แล้วใน `Code/Day4`) → Settings → Permalinks → Save แล้วเปิด `/llms.txt`, ตั้ง `robots.txt` ให้เปิด AI crawlers และชี้ sitemap → **ผ่าน 17**

---

## ตรวจจบ

เปิด `view-source:` หน้าบริการแล้วต้องได้ครบทุกข้อนี้

- `<h1` มีแค่ 1 ตัว และเป็นชื่อบริการ
- `application/ld+json` มี 1 block เดียว ประกอบด้วย Organization/LocalBusiness, WebPage, Service, Offer, FAQPage, BreadcrumbList
- ไม่มี `itemtype=` (microdata ของ Astra ถูกปิด)
- ไม่มี emoji script, oEmbed, RSD, shortlink, jquery-migrate, meta generator
- `<link rel="canonical">` เป็น URL สะอาดไม่มี query string
- meta description เป็น excerpt ที่เขียนเอง ไม่ใช่ย่อหน้า boilerplate

จากนั้นวาง URL ที่ [validator.schema.org](https://validator.schema.org/) และ [Rich Results Test](https://search.google.com/test/rich-results) ต้องไม่มี error

---

## ทางลัดสำหรับสาธิตในคลาส

ถ้าต้องการสภาพ "หลัง Retrofit" ภายใน 5 นาทีโดยไม่ต้องไล่แก้เนื้อหา

1. ทำขั้น A ข้อ 1-4 (เว็บเปล่า + Astra + plugin + Permalinks)
2. Activate Child Theme **ก่อน** Import (ไม่งั้น post type `service` และ `faq` ยังไม่มี Importer จะข้าม)
3. Tools → Import → WordPress → `demo-site/geniuscorp-wp-demo-after.xml`
4. Settings → Reading (Homepage/Posts page) → Settings → Permalinks → Save
5. Tools → GEO Setup → กดปุ่ม

ได้สภาพที่ผ่านกลุ่ม A + B + C ครบทันที เหลือเฉพาะกลุ่ม D (Performance) และ Day 4

---

## แหล่งอ้างอิง

- Rank Math filters และ hooks: https://rankmath.com/kb/filters-hooks-api-developer/
- Rank Math variables (`%title%`, `%sitename%`, `%sitedesc%`, `%excerpt%`): https://rankmath.com/kb/variables/
- WordPress Child Themes: https://developer.wordpress.org/themes/advanced-topics/child-themes/
- `rest_pre_insert_{$post_type}`: https://developer.wordpress.org/reference/hooks/rest_pre_insert_this-post_type/
- Schema.org Service, Offer, FAQPage: https://schema.org/Service
- Google Structured data general guidelines: https://developers.google.com/search/docs/appearance/structured-data/sd-policies
