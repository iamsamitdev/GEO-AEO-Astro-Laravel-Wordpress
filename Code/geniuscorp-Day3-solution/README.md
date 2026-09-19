# Day 3 - WordPress GEO/AEO (โค้ดเฉลย = Day2 + geniuscorp-wp)

## ติดตั้ง

1. WordPress เปล่าในเครื่อง (ตาม precourse ส่วน B) + เปิดใช้ **Rank Math SEO** และ **Advanced Custom Fields**
2. Import Demo Site: `geniuscorp-wp/demo-site/geniuscorp-wp-demo.xml` (อ่าน `demo-site/README.md`)
3. คัดลอก `geniuscorp-wp/wp-content/themes/geniuscorp-geo/` ไปที่ `wp-content/themes/` ของเว็บ
4. แก้ `Template:` ใน `style.css` ให้ตรงกับ parent theme ที่ใช้ (เช่น `astra`) และแก้ชื่อ callback ใน `inc/geo-cleanup.php` / filter ใน `inc/geo-headings.php` ให้ตรงกับ theme จริง (ดูจาก Query Monitor)
5. Appearance → Themes → Activate **GeniusCorp GEO**
6. Settings → Permalinks → Save (flush rewrite ให้ CPT `service`)
7. ตั้งค่า Rank Math ตามตาราง Day3_note.md หัวข้อ 3.2 (Schema Type = None สำหรับ post/service)

## โครงสร้าง Child Theme

```
geniuscorp-geo/
├── style.css                 ← header + CSS ของ FAQ/breadcrumb/facts/author-box
├── functions.php             ← enqueue + require inc/*.php
├── header.php.example        ← ตัวอย่าง override โลโก้ (ถ้า theme ไม่มี filter)
├── single-service.php        ← หน้าบริการ
├── archive-service.php       ← หน้ารวมบริการ (การ์ดเป็น H3)
├── template-parts/faq.php, breadcrumb.php
├── assets/logo.png, og-default.png   ← placeholder แทนที่ด้วยรูปจริง
└── inc/
    ├── geo-cleanup.php       ← ลบ head noise, ปิด Schema ของ Rank Math/Yoast/Theme, ปิด XML-RPC
    ├── geo-post-types.php    ← CPT service + ACF fields (price_from, duration_days, faqs)
    ├── geo-metadata.php      ← บังคับ excerpt, canonical filter, OG เสริม
    ├── geo-headings.php      ← site title tag (Astra/GeneratePress/Kadence ตัวอย่าง)
    ├── geo-schema.php        ← gc_site(), builders, gc_build_graph(), wp_head
    ├── geo-faq.php           ← gc_get_faqs() (Repeater หรือ CPT faq), guideline ใน Admin
    └── geo-performance.php   ← dequeue, jquery-migrate, WebP, image sizes, LCP
```

## การบ้าน

ย้ายบริการ 3 หน้าจาก Page → CPT `service` ใส่ราคา/ระยะเวลา/FAQ แล้วตั้ง 301 จาก URL เดิม, รัน `demo-site/fix-lastmod-after-import.sql` (มีใน Day4) หลัง backup
