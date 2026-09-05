# ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL

**หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ 4 วัน: GEO/AEO Full Stack Modern Web**
ให้เว็บถูกค้นเจอและอ้างอิงโดย ChatGPT / Gemini / Perplexity / Claude

**รูปแบบ:** อบรมสดผ่าน Zoom พร้อมบันทึกวิดีโอย้อนหลัง · 4 วัน วันละ 3 ชั่วโมง (รวม 12 ชั่วโมง)
**ผู้สอน:** อ.สามิตร โกยม — สถาบันไอทีจีเนียส เอ็นจิเนียริ่ง

รีโพซิทอรีนี้เป็นคลังเอกสารและโค้ดประกอบการสอนทั้งหมดของคอร์ส ครอบคลุมทั้งสถาปัตยกรรม **Modern Stack** (Astro SSG + Laravel 13 API + MySQL/MariaDB) และ **WordPress Stack** (GEO Retrofit บนเว็บเดิม)

---

## โครงสร้างไฟล์ในโปรเจกต์

```
GEO-AEO Astro Laravel 13/
├── README.md                          ไฟล์นี้
├── Outlines/                          เค้าโครงหลักสูตรฉบับเต็ม
│   └── AI-Search-Astro-Laravel-WordPress-Course-Outline-4Days.md
├── Notes/                             เอกสารประกอบการสอนรายวัน (สไลด์เนื้อหา/บทเรียน)
│   ├── Day1_note.md                   Day 1: GEO/AEO/AIO Mindset & Full Stack Foundation
│   ├── Day2_note.md                   Day 2: GEO Core Engineering - Structured Data & Technical SEO
│   ├── Day3_note.md                   Day 3: WordPress GEO/AEO - ทำเว็บเดิมให้ AI อ้างอิงได้
│   ├── Day4_note.md                   Day 4: E-E-A-T, llms.txt, Deployment & Measurement
│   ├── Course_Recap_Overview.md       สรุปย่อทั้งคอร์สสำหรับคนมีเวลาจำกัด
│   └── GEO_AEO_AIO_Course_Recap.pdf   เวอร์ชัน PDF ของสรุปย่อ
├── Code/                              โค้ดเฉลย (Solution Code) แบบ snapshot สะสมรายวัน
│   ├── README.md                      คำอธิบายภาพรวมของโค้ดเฉลยทั้งหมด
│   ├── geniuscorp-Day1-solution.zip   ไฟล์ zip โค้ดเฉลยแต่ละวัน (สำรอง/แจกจ่าย)
│   ├── geniuscorp-Day2-solution.zip
│   ├── geniuscorp-Day3-solution.zip
│   └── geniuscorp-Day4-solution.zip
└── Presentation/                      ไฟล์สไลด์นำเสนอ
    └── GEO-AEO-Astro-Laravel.pdf
```

---

## เนื้อหาคอร์สโดยสรุป (4 วัน)

| วัน | หัวข้อหลัก | สิ่งที่ได้ |
|---|---|---|
| **Day 1** | GEO/AEO/AIO Mindset & Full Stack Foundation | ตั้งค่า Laravel 13 API (Sanctum) + MySQL และ Astro SSG พร้อมดึงข้อมูลจริงตอน build |
| **Day 2** | GEO Core Engineering — Structured Data & Technical SEO | JSON-LD Schema, SeoHead Component, FAQ Schema, สคริปต์ตรวจสอบ GEO (`check-geo.mjs`) |
| **Day 3** | WordPress GEO/AEO | ทำเว็บ WordPress เดิมให้พร้อมสำหรับ AI Search ด้วย Child Theme, Rank Math, ACF โดยไม่ต้อง Rebuild ทั้งเว็บ |
| **Day 4** | E-E-A-T, llms.txt, Deployment & Measurement | Sitemap แบบ Dynamic, `llms.txt`, `robots.txt`, Deploy จริงบน Apache/Nginx, ระบบ Rebuild อัตโนมัติ, วัดผล AI Crawlers |

รายละเอียดเต็มดูได้ที่ [`Outlines/AI-Search-Astro-Laravel-WordPress-Course-Outline-4Days.md`](Outlines/AI-Search-Astro-Laravel-WordPress-Course-Outline-4Days.md)

## Tech Stack

- **Frontend (SSG):** Astro 6 (Islands Architecture)
- **Backend API:** Laravel 13 (REST API, API Resources)
- **Authentication:** Laravel Sanctum
- **CMS:** WordPress (Child Theme, Hooks, Custom Post Type, ACF, Rank Math)
- **ฐานข้อมูล:** MySQL / MariaDB

## โปรเจกต์ตัวอย่างในคอร์ส

โปรเจกต์เดียวต่อเนื่องตลอดคอร์ส ชื่อ **GeniusCorp** ประกอบด้วย 3 ส่วน:

- `geniuscorp-api` — Laravel 13 REST API
- `geniuscorp-web` — Astro 6 เว็บไซต์ SSG
- `geniuscorp-wp` — WordPress Child Theme สำหรับ GEO Retrofit

ดูรายละเอียดการติดตั้งและขอบเขตของโค้ดแต่ละวันได้ที่ [`Code/README.md`](Code/README.md)
