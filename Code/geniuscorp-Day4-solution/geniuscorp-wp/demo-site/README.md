# GeniusCorp WP Demo Site (ไฟล์ WXR สำหรับ Workshop Day 3)

ไฟล์ `geniuscorp-wp-demo.xml` คือ WordPress eXtended RSS (WXR 1.2) ที่มีเนื้อหาเหมือน GeniusCorp Modern
แต่ตั้งใจใส่ "ปัญหา GEO" ไว้ครบชุดตาม Day3_note.md เพื่อให้ผู้เรียนทำ Retrofit

## วิธี Import (ใช้ได้กับ WordPress เปล่าทุกแบบ ไม่ต้องมี plugin เสริม)

1. เข้า `/wp-admin` → Tools → Import → WordPress → **Install Now** → **Run Importer**
2. เลือกไฟล์ `geniuscorp-wp-demo.xml` → Upload file and import
3. Assign Authors: เลือก "assign posts to an existing user" = ผู้ใช้ของคุณ (ไม่ต้องติ๊ก Download attachments เพราะไม่มีรูป)
4. Settings → Reading → "A static page": Homepage = **หน้าแรก**, Posts page = **บทความ** → Save
5. Settings → General → Tagline: จะเห็นข้อความยาว keyword stuffing ที่นำเข้ามา (ปล่อยไว้ก่อน เป็นปัญหาข้อ 3 ที่จะแก้ใน Module 3)
6. Settings → Permalinks → Post name → Save (flush rewrite)
7. เปิด http://geniuscorp.test/ ตรวจว่าเห็นหน้าแรก (สร้างเมนูที่ Appearance → Menus ถ้า theme ไม่แสดงอัตโนมัติ)

## ปัญหาที่ตั้งใจใส่ไว้ (ตรงกับตาราง "ทัวร์ปัญหา" ใน Day3_note.md)

| # | ปัญหา | อยู่ที่ |
|---|---|---|
| 1 | H1 ซ้ำ (theme + ในเนื้อหา) | หน้าบริการทั้ง 3 หน้า (Page ธรรมดา) |
| 2 | หน้าแรกไม่มี H1, ตัวเลขสถิติเป็น H2, การ์ดเป็น H2 | หน้าแรก, หน้า "บริการ" |
| 3 | Tagline/Title ยาว keyword stuffing | Settings → General → Tagline |
| 4 | ไม่มี excerpt → description auto จาก boilerplate เดียวกันทุกหน้า | ทุกโพสต์และหน้าบริการ |
| 8 | บริการเป็น Page ธรรมดา ไม่มี CPT, ไม่มีราคา/FAQ แบบมีโครงสร้าง | /web-development/ ฯลฯ |
| 11 | post_modified เท่ากันทุกโพสต์ (2026-09-12) | ทุก item |

ปัญหาข้อ 5-7, 9-10, 12 (canonical pagination, Schema ซ้ำจาก plugin, รูปใหญ่, plugin 23 ตัว, llms.txt)
ขึ้นกับ theme/plugin ที่ติดตั้ง ให้ผู้สอนเปิด Rank Math + theme ที่มี Schema ในตัว (เช่น Astra) เพื่อสาธิต

## รหัสผ่านและผู้ใช้

ไฟล์นี้ **ไม่มี** รหัสผ่านใด ๆ ผู้เรียนใช้บัญชี admin ที่สร้างเองตอนติดตั้ง WordPress

## หลัง Retrofit เสร็จ (การบ้าน Day 3)

ย้ายหน้าบริการ 3 หน้าจาก Page เป็น CPT `service` (สร้างใหม่ + คัดลอกเนื้อหา หรือใช้ plugin "Post Type Switcher")
แล้วตั้ง Redirect 301 ใน Rank Math → Redirections: `/web-development/` → `/services/web-development/` (ทำครบ 3 หน้า)
