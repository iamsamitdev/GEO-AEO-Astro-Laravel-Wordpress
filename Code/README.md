# โค้ดเฉลย (Solution Code) - ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL

โค้ดชุดนี้เป็น **snapshot สะสมรายวัน** คู่กับเอกสาร `Notes/Day1_note.md` ถึง `Day4_note.md`
แต่ละโฟลเดอร์ `DayN/` คือสถานะของโปรเจกต์ "ณ สิ้นวันนั้น" (Day2 = Day1 + สิ่งที่เพิ่มใน Day 2 ...)
ผู้เรียนที่ทำ Workshop ไม่ทัน ให้เปิดโฟลเดอร์ของวันถัดไปแล้วเรียนต่อได้ทันที

```
Code/
├── README.md                ← ไฟล์นี้
├── Day1/
│   ├── README.md            ← ขั้นตอนติดตั้งและสิ่งที่มีในวันนี้
│   ├── geniuscorp-api/      ← Laravel 13 (เฉพาะไฟล์ที่เขียนเอง วางทับ laravel new)
│   └── geniuscorp-web/      ← Astro 6 (โปรเจกต์ครบ รัน npm install ได้เลย)
├── Day2/                    ← Day1 + GEO Layer (SeoHead, JsonLd, schema.ts, FAQ, check-geo.mjs)
├── Day3/                    ← Day2 + geniuscorp-wp/ (Child Theme GEO + Demo Site WXR)
└── Day4/                    ← Day3 + E-E-A-T, sitemap/llms.txt/robots, deploy/, webhook rebuild
```

## ขอบเขตของโค้ดที่ให้

| โปรเจกต์ | สิ่งที่มีในชุดนี้ | สิ่งที่ผู้เรียนต้องทำเอง |
|---|---|---|
| `geniuscorp-api` (Laravel 13) | `app/`, `database/`, `routes/api.php`, `bootstrap/app.php`, `config/geo.php`, `.env.example` | `laravel new geniuscorp-api` + `php artisan install:api` แล้วคัดลอกไฟล์ในชุดนี้ **วางทับ** (ดู README ของ Day1) |
| `geniuscorp-web` (Astro 6) | โปรเจกต์ครบ (`package.json`, `astro.config.mjs`, `src/`, `public/`, `scripts/`, `deploy/`) | `npm install` + สร้าง `.env` จาก `.env.example` |
| `geniuscorp-wp` (WordPress) | Child Theme `wp-content/themes/geniuscorp-geo/` + `demo-site/*.xml` | ติดตั้ง WordPress + Rank Math + ACF เอง แล้วคัดลอก Child Theme + Import WXR |

ไม่รวม `vendor/`, `node_modules/`, ไฟล์ skeleton ของ Laravel ที่ไม่ได้แก้ และ WordPress core

## เวอร์ชันที่ทดสอบ

- Astro **6.4.x** (Node.js 22.12+ เลขคู่) - โค้ดฝั่ง Astro ทุกวันผ่าน `npm run build` และ `check-geo.mjs` แล้วกับ mock API
- Laravel **13.x** / PHP 8.3+ - ไฟล์ PHP ทั้งหมดผ่านการตรวจ syntax (ทดสอบรันจริงบนเครื่องผู้สอนก่อนแจก)
- WordPress 6.x + Rank Math + ACF (Repeater ใช้ ACF PRO; มี fallback สำหรับ ACF ฟรี)

## กติกาโค้ด

- TypeScript / JavaScript / Astro **ไม่ใส่ semicolon**
- PHP ใส่ semicolon ตามปกติ, ฟังก์ชันใน WordPress ขึ้นต้นด้วย `gc_`
- ข้อมูลทั้งหมดเป็นข้อมูลจำลองของบริษัท GeniusCorp (ไม่มีข้อมูลจริง/รหัสผ่านใด ๆ)
