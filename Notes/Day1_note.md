# ทำเว็บให้ติดอันดับ AI Search 2026 - วันที่ 1: GEO/AEO/AIO Mindset & Full Stack Foundation

**หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ: ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO/AIO Full Stack Modern Web)**
**วันที่ 1: เข้าใจ AI Search และวางรากฐาน Full Stack (Laravel API + MySQL + Astro SSG)**
วันที่: เสาร์ที่ 5 กันยายน 2569 | เวลา 20:30-23:30 น. | ออนไลน์ผ่าน Zoom (บันทึกวิดีโอย้อนหลัง)
ผู้สอน: อ.สามิตร โกยม

---

## 🎯 วัตถุประสงค์การเรียนรู้ประจำวัน

เมื่อจบการอบรมวันที่ 1 ผู้เรียนจะสามารถ:

1. อธิบายความแตกต่างของ **SEO / AEO / GEO / AIO** และเหตุผลที่ AI Search Engines (ChatGPT Search, Perplexity, Claude, Gemini, Google AI Overviews) เปลี่ยนวิธี "ค้นเจอ" เว็บไซต์ในปี 2026 ได้
2. ระบุได้ว่า AI Crawlers แต่ละตัว (GPTBot, OAI-SearchBot, ClaudeBot, PerplexityBot, Google-Extended) อ่านเว็บอย่างไร และ `robots.txt` มีผลอย่างไร
3. สรุปปัจจัยจากงานวิจัย GEO ของ Princeton ที่เพิ่มโอกาสถูก AI อ้างอิง และเชื่อมโยงกับผล Audit เว็บไซต์จริงได้
4. อธิบายสถาปัตยกรรม **Astro SSG ↔ Laravel API (Sanctum) ↔ MySQL/MariaDB** และเหตุผลที่ Deploy บน Apache/Nginx ได้โดยไม่ต้องมี Node.js บนเซิร์ฟเวอร์
5. ออกแบบฐานข้อมูลเว็บองค์กรที่ "รองรับ GEO ตั้งแต่ระดับตาราง" และสร้าง Migration, Model, Seeder, API Resource, Controller และ Route ใน Laravel 13 ได้
6. ป้องกัน API ด้วย **Laravel Sanctum** และออก Token สำหรับ build process ของ Astro ได้
7. สร้างโปรเจกต์ **Astro 6** ดึงข้อมูลจาก Laravel API ตอน build time สร้างหน้า Dynamic Routes ด้วย `getStaticPaths` และรัน `astro build` ได้ Static HTML ครบทุกเมนู (Workshop Day 1)

> **หมายเหตุสำคัญของหลักสูตรนี้:** ตลอด 4 วันเราจะพัฒนาโปรเจกต์เดียวต่อเนื่องคือ **GeniusCorp** - เว็บไซต์องค์กรจำลองของบริษัทซอฟต์แวร์ (ข้อมูลจำลองทั้งหมด) โดยทำ **สองเวอร์ชันคู่ขนาน** ได้แก่ **GeniusCorp Modern** (Day 1-2: MySQL → Laravel API → Astro SSG) และ **GeniusCorp WP** (Day 3: WordPress เดิมที่ต้องทำ GEO Retrofit) แล้วนำทั้งสองเว็บขึ้น Production พร้อมระบบวัดผลใน Day 4
>
> เวอร์ชันที่ใช้ในเอกสารนี้: **Laravel 13**, **Astro 6**, **PHP 8.3+**, **Node.js 22.12+ (เลขคู่เท่านั้น)**, **MySQL 8 / MariaDB 10.6+**
>
> กติกาการเขียนโค้ดในเอกสารชุดนี้: โค้ด **TypeScript / JavaScript ไม่ใส่ semicolon** ส่วน **PHP ใส่ semicolon ตามปกติ**

---

## 🧭 กำหนดการวันที่ 1 (โดยสังเขป)

| เวลา        | หัวข้อ                                                                                     |
| ----------- | ------------------------------------------------------------------------------------------ |
| 20:30-20:45 | ทดสอบก่อนเรียน (Pretest) + แนะนำหลักสูตร โปรเจกต์ GeniusCorp และตรวจความพร้อมเครื่อง       |
| 20:45-21:20 | **Module 1** จาก SEO สู่ GEO/AEO/AIO - ทำไมนักพัฒนาต้องปรับตัวในปี 2026 + Case Study Audit จริง |
| 21:20-21:40 | **Module 2** สถาปัตยกรรม AI-Findable Full Stack (SSG vs SSR vs SPA vs WordPress)           |
| 21:40-22:35 | **Module 3** Laravel API Foundation (DB Design → Migration → Seeder → Resource → Sanctum)   |
| 22:35-23:05 | **Module 4** Astro Fundamentals for SSG (โครงสร้าง, Layout, ดึง API, getStaticPaths)       |
| 23:05-23:30 | **Workshop Day 1** ประกอบเว็บ GeniusCorp Modern ครบเมนูหลัก + `astro build`                 |

> ⏱️ เวลา 3 ชั่วโมงค่อนข้างจำกัด ผู้สอนจะ "พาทำ" ส่วนที่เป็นแก่นในคลาส ส่วนไฟล์ที่เป็น boilerplate (Seeder ข้อมูลจำลอง, CSS, หน้า static เช่น Contact) มีให้ใน **Starter Code** ที่ส่งในกลุ่มไลน์ล่วงหน้า ผู้เรียนที่พิมพ์ตามไม่ทันให้ใช้ Starter Code แล้วตามเนื้อหาต่อได้ทันที เอกสารฉบับนี้มีโค้ดครบทุกไฟล์หลักเพื่อให้ทบทวนย้อนหลังได้เอง

---

## ✅ ทดสอบก่อนเรียน (Pretest) และตรวจความพร้อมเครื่อง

### เวลา 20:30-20:45 น.

ก่อนเริ่มเรียน ให้ผู้เรียนทำแบบทดสอบก่อนเรียนตามลิงก์ที่วิทยากรแจ้งในห้อง Zoom เพื่อวัดพื้นฐานความเข้าใจเดิมเกี่ยวกับ SEO, Laravel, WordPress และ HTML ผลทดสอบนี้ **ไม่มีผลต่อการประเมิน** ใช้เพียงเพื่อปรับจังหวะการสอนให้เหมาะกับกลุ่มผู้เรียน

**ตรวจความพร้อมเครื่องมือก่อนเริ่ม** - เปิด Terminal (ถ้าใช้ Laragon ให้เปิด Terminal จากใน Laragon เพราะ PHP/MySQL ยังไม่อยู่ใน PATH ของ Windows) แล้วรัน:

```bash
php -v          # ต้องขึ้น 8.3 ขึ้นไป
composer -V     # ต้องขึ้น 2.x
node -v         # ต้องขึ้น v22.12.0 ขึ้นไป และเลขหลัง v ต้องเป็นเลขคู่
git --version
mysql --version # MySQL 8 หรือ MariaDB 10.6 ขึ้นไป
```

> ⚠️ **Node.js เลขคี่ (v23, v25) ใช้กับ Astro 6 ไม่ได้** ถ้าเผลอติดตั้งไว้ ให้ถอนออกแล้วลง LTS เลขคู่ใหม่ก่อน มิฉะนั้น `npm create astro` จะพังทันที รายละเอียดการติดตั้งทั้งหมดอยู่ในเอกสาร **precourse (เตรียมเครื่องก่อนเข้าอบรม)** ที่ส่งให้ก่อนหน้านี้ ถ้ารันสคริปต์ตรวจในส่วน D1 ของเอกสารนั้นผ่านครบ 5 บรรทัด ถือว่าพร้อม

**สิ่งที่สถาบันเตรียมให้ (ส่งในกลุ่มไลน์ก่อนวันเรียน 1 วัน)**

| ไฟล์                          | ใช้เมื่อ                    | เนื้อหา                                                                     |
| ----------------------------- | --------------------------- | --------------------------------------------------------------------------- |
| `geniuscorp-api-starter.zip`  | Day 1 Module 3              | โปรเจกต์ Laravel 13 พร้อม Seeder ข้อมูลจำลอง (บริการ ผลงาน บทความ ทีมงาน FAQ) |
| `geniuscorp-web-starter.zip`  | Day 1 Module 4 / Workshop   | โปรเจกต์ Astro 6 พร้อม CSS พื้นฐานและหน้า static                             |
| `geniuscorp-wp-demo.wpress`   | Day 3                       | เว็บ WordPress ตัวอย่างที่ "มีปัญหา GEO ครบชุด" สำหรับทำ Retrofit             |
| `geo-ready-checklist.md`      | Day 3-4                     | Checklist ฉบับ Astro และฉบับ WordPress                                       |

---

## 📚 Module 1: จาก SEO สู่ GEO/AEO/AIO - ทำไมนักพัฒนาต้องปรับตัวในปี 2026

### เวลา 20:45-21:20 น.

> 💡 **หัวใจของ Module นี้:** ผู้ใช้จำนวนมากไม่ได้ "ค้นหา" แล้วคลิกลิงก์อีกต่อไป แต่ "ถาม" AI แล้วรับคำตอบสำเร็จรูป เว็บไซต์ที่ AI อ่านเข้าใจ เชื่อถือ และเลือกอ้างอิงเท่านั้นที่จะถูกพูดถึง นี่ไม่ใช่เรื่องของนักการตลาดอย่างเดียว แต่เป็นเรื่องของ **โครงสร้าง HTML, Structured Data และสถาปัตยกรรมเว็บ** ซึ่งเป็นงานของนักพัฒนาโดยตรง

---

### 1.1 ภูมิทัศน์การค้นหายุคใหม่: จาก 10 ลิงก์สีน้ำเงิน สู่คำตอบเดียวพร้อมแหล่งอ้างอิง

ในยุค SEO แบบเดิม Google แสดงผลลัพธ์เป็นรายการลิงก์ ผู้ใช้เลือกคลิกเอง เว็บที่อยู่อันดับ 1-3 ได้ traffic มากที่สุด แต่ในปี 2026 พฤติกรรมเปลี่ยนไปเป็นสองทางพร้อมกัน:

```
ยุค SEO (Search Engine):                     ยุค GEO/AEO/AIO (Generative / Answer Engine):
┌────────────────────────────────┐          ┌──────────────────────────────────────────┐
│ ผู้ใช้พิมพ์ keyword             │          │ ผู้ใช้ถามเป็นประโยคยาว ๆ                  │
│   ↓                            │          │   ↓                                      │
│ Google จัดอันดับ 10 ลิงก์       │   ⟶      │ AI ค้น + อ่านหลายเว็บ + สังเคราะห์คำตอบ    │
│   ↓                            │          │   ↓                                      │
│ ผู้ใช้คลิกเว็บที่อยู่บนสุด      │          │ ผู้ใช้อ่านคำตอบเดียว + เห็น "แหล่งอ้างอิง"  │
│                                │          │   (เว็บที่ถูก cite เท่านั้นที่ได้ traffic)  │
└────────────────────────────────┘          └──────────────────────────────────────────┘
      อันดับคือทุกอย่าง                              "ถูกอ้างอิง" คือทุกอย่าง
```

เครื่องมือหลักที่ผู้ใช้ไทยใช้จริงในปี 2026 และแหล่งข้อมูลที่แต่ละตัวใช้:

| AI Engine                     | วิธีหาข้อมูล                                                     | สิ่งที่นักพัฒนาต้องรู้                                                                 |
| ----------------------------- | ---------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| **ChatGPT Search** (OpenAI)   | ใช้ index ของตัวเอง (OAI-SearchBot) ร่วมกับข้อมูลจาก **Bing**    | ต้องไม่บล็อก `OAI-SearchBot` และควร submit เว็บใน **Bing Webmaster Tools**             |
| **Perplexity**                | Crawler ของตัวเอง (PerplexityBot) + ค้นแบบ real-time             | ชอบเนื้อหาที่มีตัวเลข วันที่ และแหล่งอ้างอิงชัดเจน แสดง citation ทุกคำตอบ              |
| **Claude** (Anthropic)        | ClaudeBot เก็บข้อมูลฝึก + Claude-SearchBot สำหรับค้นตอบคำถาม     | อ่าน HTML ตรง ๆ ไม่รัน JavaScript ต้องมีเนื้อหาใน HTML ตั้งแต่แรก                       |
| **Gemini / Google AI Overviews** | ใช้ Google index เดิม + Google-Extended สำหรับฝึกโมเดล          | Structured Data และ Search Console ยังสำคัญเหมือนเดิม และ AI Overviews ดึงจาก top results |
| **Microsoft Copilot**         | ใช้ Bing index โดยตรง                                            | Bing Webmaster Tools คือประตูสำคัญที่คนไทยมักมองข้าม                                    |

> 📌 **ข้อสังเกตสำคัญ:** ทุก Engine ในตารางนี้ **อ่าน HTML ที่เซิร์ฟเวอร์ส่งมา** เป็นหลัก ต่างจาก Googlebot ที่รัน JavaScript ได้ (แต่ก็ใช้เวลาและงบประมาณ crawl มากกว่า) นี่คือเหตุผลที่สถาปัตยกรรม **SSG/SSR** ได้เปรียบ SPA อย่างชัดเจนในยุค AI Search ซึ่งเราจะลงลึกใน Module 2

### 1.2 SEO vs AEO vs GEO vs AIO - ต่างกันอย่างไร และอะไรใช้ร่วมกันได้

สี่คำนี้มักถูกใช้ปนกัน ให้แยกตาม "เป้าหมายของการ optimize" และ "ใครเป็นผู้ตัดสิน":

| มิติ                | **SEO** (Search Engine Optimization)          | **AEO** (Answer Engine Optimization)                            | **GEO** (Generative Engine Optimization)                                       | **AIO** (AI Optimization)                                                         |
| ------------------- | --------------------------------------------- | ---------------------------------------------------------------- | ------------------------------------------------------------------------------ | --------------------------------------------------------------------------------- |
| เป้าหมาย            | ติดอันดับสูงในหน้าผลค้นหา                     | ถูกดึงไปเป็น "คำตอบ" โดยตรง (Featured Snippet, AI Overview, Voice) | ถูก AI สังเคราะห์และ **อ้างอิง (cite)** ในคำตอบที่สร้างขึ้น                      | ให้ **ระบบ AI ทุกประเภท** (search, chatbot, agent, ผู้ช่วยในแอป) เข้าใจ เข้าถึง และใช้งานเว็บ/ข้อมูลของเราได้ |
| ผู้ตัดสิน           | อัลกอริทึมจัดอันดับ                            | ระบบดึงคำตอบ (extraction)                                        | LLM + ระบบค้นคืน (RAG / retrieval)                                              | LLM, retrieval, และ **AI agent** ที่เปิดหน้าเว็บ/เรียก API แทนผู้ใช้                 |
| หน่วยของเนื้อหา     | ทั้งหน้า (page)                                | ย่อหน้า / บล็อกคำตอบ                                              | ย่อหน้า / ข้อเท็จจริง / ตัวเลข ที่ตรวจสอบได้                                     | ทั้งเว็บในฐานะ "แหล่งข้อมูลที่เครื่องใช้ได้" (หน้า, ไฟล์สรุป, API, ข้อมูลมีโครงสร้าง)   |
| สัญญาณสำคัญ         | Backlink, keyword, technical SEO               | โครงสร้างคำถาม-คำตอบ, FAQ Schema, ความกระชับ                      | ความน่าเชื่อถือ (E-E-A-T), สถิติ, การอ้างอิงแหล่งที่มา, Structured Data, ความสด | ทุกอย่างของ GEO + การเข้าถึงได้ของเครื่อง: robots.txt ที่เปิด AI, llms.txt, HTML ที่ไม่พึ่ง JS, เนื้อหา/ข้อมูลที่เครื่องหยิบใช้ได้ (Markdown, JSON-LD, API) |
| ตัวอย่างเทคนิค      | Title, Meta, Sitemap, Canonical                | FAQPage, H2 แบบคำถาม, Inverted Pyramid                             | JSON-LD ครบทุก Schema, Author/Person, llms.txt, ตัวเลขและ citation ในเนื้อหา     | นโยบาย AI crawlers ใน robots.txt, llms.txt / llms-full.txt, Static HTML (SSG), Structured Data, Server Log วัดการเข้าถึงของ AI |
| ขอบเขต              | เครื่องมือค้นหาแบบเดิม                          | ส่วน "คำตอบ" ของเครื่องมือค้นหาและผู้ช่วยเสียง                       | AI Search Engines (ChatGPT Search, Perplexity, Claude, Gemini)                   | **คำร่ม (umbrella)** ที่ครอบ AEO และ GEO รวมถึง AI ที่ไม่ใช่ search เช่น agent และผู้ช่วยในองค์กร |

วิธีมองความสัมพันธ์ของทั้งสี่คำ:

```
┌──────────────────────────────── AIO (AI Optimization) ────────────────────────────────┐
│  "ทำให้ระบบ AI ทุกประเภทเข้าใจ เข้าถึง และใช้เว็บของเราได้"                              │
│                                                                                       │
│   ┌────────── GEO ──────────┐   ┌────────── AEO ──────────┐   ┌──── AI Agents ────┐  │
│   │ ถูก AI Search อ้างอิง     │   │ ถูกดึงไปเป็นคำตอบ        │   │ AI เปิดหน้า/เรียก  │  │
│   │ (ChatGPT, Perplexity,    │   │ (AI Overviews, Snippet, │   │ API แทนผู้ใช้      │  │
│   │  Claude, Gemini)         │   │  Voice)                 │   │ (ChatGPT-User,    │  │
│   └────────────┬────────────┘   └────────────┬────────────┘   │  Claude-User)     │  │
│                │                             │                └──────────┬────────┘  │
│                └──────────────┬──────────────┘                           │           │
│                               ▼                                          │           │
│            ┌─────────────── SEO / Technical SEO ───────────────┐          │           │
│            │ HTML ครบ, Heading, Metadata, Canonical, Sitemap,  │◀─────────┘           │
│            │ Structured Data, Performance = พื้นฐานของทุกชั้น   │                      │
│            └───────────────────────────────────────────────────┘                      │
└───────────────────────────────────────────────────────────────────────────────────────┘
```

สิ่งที่ **ใช้ร่วมกันได้ทั้งสี่แบบ** (และเป็นแกนของคอร์สนี้): HTML ที่สมบูรณ์ตั้งแต่เซิร์ฟเวอร์, Heading Hierarchy ที่ถูกต้อง, Metadata ที่สรุปเนื้อหาจริง, Canonical, Sitemap ที่มี `lastmod` จริง, Structured Data และ Performance ที่ดี พูดง่าย ๆ คือ **Technical SEO ที่ทำถูกต้องคือพื้นฐานของ GEO และ AIO** ไม่ใช่สิ่งที่ต้องทิ้งไป

สิ่งที่ AIO เพิ่มเข้ามาจาก GEO และเราจะทำในคอร์สนี้: (1) ตัดสินใจนโยบาย AI crawlers ใน `robots.txt` อย่างรู้ผล ไม่ใช่คัดลอกตามกัน (หัวข้อ 1.3 และ Day 4) (2) สร้าง `llms.txt` ให้ AI อ่านภาพรวมเว็บได้โดยไม่ต้อง crawl ทั้งเว็บ (Day 4) (3) เลือกสถาปัตยกรรมที่เครื่อง "เปิดแล้วอ่านได้ทันที" คือ SSG (Module 2) (4) วัดผลว่า AI เข้าถึงเราจริงจาก Server Log ไม่ใช่แค่ดูอันดับ (Day 4)

> 📌 **ระวังคำว่า AIO อีกความหมายหนึ่ง:** ในบางบทความ AIO ย่อมาจาก "AI Overviews Optimization" คือการทำให้เว็บถูกดึงไปแสดงใน Google AI Overviews / AI Mode โดยเฉพาะ ซึ่งในกรอบของคอร์สนี้ถือเป็นส่วนย่อยของ AEO/GEO เมื่ออ่านบทความหรือคุยกับลูกค้า ให้ถามก่อนว่าหมายถึงความหมายไหน

> ✅ **สรุปให้จำ:** SEO = ให้เจอ · AEO = ให้ถูกดึงไปตอบ · GEO = ให้ถูกเชื่อและอ้างอิง · AIO = ให้ AI ทุกประเภทใช้เว็บเราได้ (คำร่มที่ครอบทั้งหมด) ทั้งสี่ซ้อนทับกัน และคอร์สนี้ทำครบทุกชั้นในโค้ดเดียวกัน

### 1.3 AI Crawlers อ่านเว็บเราอย่างไร และ robots.txt มีผลอย่างไร

AI แต่ละค่ายมี Crawler มากกว่าหนึ่งตัว และ **แต่ละตัวมีหน้าที่ต่างกัน** การบล็อกผิดตัวอาจทำให้เว็บหายจาก AI Search ทั้งที่ตั้งใจแค่ไม่ให้เอาไปฝึกโมเดล

| User-Agent            | บริษัท     | หน้าที่                                                    | ถ้าบล็อกจะเกิดอะไร                                                     |
| --------------------- | ---------- | ---------------------------------------------------------- | ---------------------------------------------------------------------- |
| `GPTBot`              | OpenAI     | เก็บข้อมูลเพื่อ **ฝึกโมเดล**                               | เนื้อหาไม่ถูกใช้ฝึก แต่ยังค้นเจอใน ChatGPT Search ได้                    |
| `OAI-SearchBot`       | OpenAI     | เก็บ index สำหรับ **ChatGPT Search** (แสดงผลพร้อมลิงก์)     | **หายจาก ChatGPT Search**                                              |
| `ChatGPT-User`        | OpenAI     | ดึงหน้าเว็บแบบ real-time เมื่อผู้ใช้ถามถึง URL/หัวข้อนั้น    | ChatGPT เปิดอ่านหน้านั้นไม่ได้                                          |
| `ClaudeBot`           | Anthropic  | เก็บข้อมูลเพื่อฝึกโมเดล                                     | ไม่ถูกใช้ฝึก                                                            |
| `Claude-SearchBot`    | Anthropic  | index สำหรับการค้นหาใน Claude                              | **หายจากผลค้นหาของ Claude**                                             |
| `Claude-User`         | Anthropic  | ดึงหน้าเว็บตามคำขอผู้ใช้                                    | Claude เปิดอ่านหน้านั้นไม่ได้                                           |
| `PerplexityBot`       | Perplexity | index สำหรับ Perplexity                                    | **หายจาก Perplexity**                                                  |
| `Perplexity-User`     | Perplexity | ดึงหน้าเว็บตามคำขอผู้ใช้                                    | เปิดอ่านไม่ได้                                                          |
| `Google-Extended`     | Google     | token ควบคุมการใช้ข้อมูลฝึก Gemini (ไม่ใช่ crawler แยก)     | ไม่ถูกใช้ฝึก Gemini แต่ **ไม่กระทบ** Google Search และ AI Overviews      |
| `Googlebot`           | Google     | index ของ Google Search (รวม AI Overviews)                 | หายจาก Google ทั้งหมด                                                   |
| `Bingbot`             | Microsoft  | index ของ Bing (ป้อน Copilot และส่วนหนึ่งของ ChatGPT Search) | หายจาก Bing, Copilot และกระทบ ChatGPT Search                            |

> 🔎 **ตรวจสอบรายชื่อ User-Agent ล่าสุดเสมอ** เพราะแต่ละค่ายเพิ่ม/เปลี่ยนชื่อ bot อยู่เรื่อย ๆ แหล่งอ้างอิงทางการ: OpenAI (platform.openai.com/docs/bots), Anthropic (support.anthropic.com ค้นคำว่า "web crawler"), Perplexity (docs.perplexity.ai/guides/bots), Google (developers.google.com/search/docs/crawling-indexing/overview-google-crawlers)

**robots.txt ที่ "เปิดรับ AI Search" อย่างมีสติ** (จะเขียนจริงใน Day 4 แต่ให้เห็นภาพตั้งแต่วันนี้):

```
# robots.txt - เปิดให้ทุก crawler อ่านได้ และชี้ sitemap ของเราเอง
User-agent: *
Allow: /

# ถ้าต้องการ "ไม่ให้เอาไปฝึกโมเดล" แต่ "ยังอยากถูกค้นเจอ" ให้บล็อกเฉพาะตัวฝึก ไม่บล็อกตัวค้นหา
# User-agent: GPTBot
# Disallow: /
# User-agent: Google-Extended
# Disallow: /

Sitemap: https://www.geniuscorp.example/sitemap.xml
```

> ⚠️ **ข้อผิดพลาดที่พบบ่อยจากการ Audit:** เว็บองค์กรหลายแห่งคัดลอก robots.txt "บล็อก AI ทั้งหมด" มาจากอินเทอร์เน็ตโดยไม่รู้ว่าได้บล็อก `OAI-SearchBot` และ `PerplexityBot` ไปด้วย ผลคือเว็บหายจาก AI Search ทั้งที่คู่แข่งถูกอ้างอิงแทน การตัดสินใจเรื่องนี้ควรเป็นการตัดสินใจทางธุรกิจที่รู้ผลลัพธ์ ไม่ใช่การคัดลอกตาม ๆ กัน

### 1.4 ปัจจัยที่เพิ่มโอกาสถูก AI อ้างอิง - สรุปจากงานวิจัย GEO (Princeton)

งานวิจัย *GEO: Generative Engine Optimization* โดย Aggarwal และคณะ (Princeton University, Georgia Tech, IIT Delhi และ Allen Institute for AI, เผยแพร่ใน arXiv:2311.09735 และนำเสนอที่ KDD 2024) เป็นงานชิ้นแรกที่ทดลองอย่างเป็นระบบว่า "การปรับเนื้อหาแบบไหน" ทำให้เว็บถูก Generative Engine มองเห็น (visibility) มากขึ้น โดยสร้างชุดทดสอบ GEO-bench 10,000 คำถาม และวัดผลจากตำแหน่งและปริมาณที่เนื้อหาถูกอ้างอิงในคำตอบ

ผลลัพธ์ที่นักพัฒนาควรจำ (ตัวเลขเป็นค่าโดยประมาณจากงานวิจัย ขึ้นกับประเภทคำถามและโมเดลที่ทดสอบ):

| กลยุทธ์ (ตามชื่อในงานวิจัย)      | ทำอะไร                                                            | ผลต่อ visibility โดยประมาณ      | สิ่งที่เราจะทำในคอร์ส                                         |
| -------------------------------- | ----------------------------------------------------------------- | ------------------------------- | ------------------------------------------------------------- |
| **Cite Sources**                 | ใส่การอ้างอิงแหล่งที่มาที่เชื่อถือได้ในเนื้อหา                      | เพิ่มราว **30-40%**             | Answer-Ready Content Guidelines (Day 4)                        |
| **Statistics Addition**          | ใส่ตัวเลข สถิติ เชิงปริมาณแทนคำกว้าง ๆ                             | เพิ่มราว **30-40%**             | FAQ และหน้าบริการที่ระบุราคา ระยะเวลา จำนวน (Day 2-3)          |
| **Quotation Addition**           | ใส่คำพูดอ้างอิงจากผู้เชี่ยวชาญ/แหล่งข้อมูล                          | เพิ่มราว **30%+**               | Author Box + Person Schema (Day 4)                             |
| **Fluency / Easy-to-understand** | เขียนให้อ่านลื่น เข้าใจง่าย                                        | เพิ่มราว **15-30%**             | Inverted Pyramid, H2 แบบคำถาม (Day 3-4)                        |
| **Authoritative**                | น้ำเสียงมั่นใจ มีหลักฐาน                                           | เพิ่มเล็กน้อยถึงปานกลาง          | E-E-A-T signals (Day 4)                                        |
| **Keyword Stuffing**             | ยัด keyword แบบ SEO ยุคเก่า                                        | **ไม่ช่วย หรือลดลง**            | สิ่งที่ต้องเลิกทำ (Day 2 Metadata)                              |

> 📖 **อ้างอิง:** Aggarwal, P., Murahari, V., Rajpurohit, T., Kalyan, A., Narasimhan, K., & Deshpande, A. (2024). *GEO: Generative Engine Optimization*. Proceedings of KDD '24. arXiv:2311.09735 - https://arxiv.org/abs/2311.09735

สิ่งที่งานวิจัยนี้ **ไม่ได้บอก** แต่นักพัฒนาต้องเติมเอง คือ AI จะ "อ่าน" ตัวเลขและแหล่งอ้างอิงเหล่านั้นได้ก็ต่อเมื่อ HTML ของเรามีโครงสร้างที่เครื่องอ่านออก นี่คือจุดที่ **Structured Data (JSON-LD)**, **Heading Hierarchy**, **Canonical** และ **Sitemap** เข้ามามีบทบาท และเป็นเหตุผลที่คอร์สนี้เป็นคอร์สสำหรับ Developer

### 1.5 Case Study: ผล Audit เว็บไซต์จริง - จุดแข็ง จุดอ่อน และ Priority Roadmap

เนื้อหาของคอร์สนี้กลั่นมาจากการ Audit เว็บไซต์สถาบันฝึกอบรมแห่งหนึ่งที่มีผู้เข้าชมจริง (PHP + CodeIgniter 3 + MySQL, Server-Side Rendering, มีบทความใหม่แทบทุกวัน) ตรวจ 5 หน้าหลัก ได้แก่ หน้าแรก, หน้ารวมคอร์ส, หน้ารวมคอร์สออนไลน์, หน้ารายละเอียดคอร์ส และหน้าบทความ

**จุดแข็งที่มีอยู่แล้ว** (สิ่งที่เว็บส่วนใหญ่ที่ทำ SSR ก็มักจะได้มาฟรี):

| รายการ                     | สถานะ   | หมายเหตุ                                                                                  |
| -------------------------- | ------- | ----------------------------------------------------------------------------------------- |
| Server-Side Rendering      | ✅ ดีมาก | HTML ครบจากเซิร์ฟเวอร์ AI crawlers อ่านได้ 100% โดยไม่ต้องรัน JS                           |
| robots.txt เปิดกว้าง       | ✅ ดี    | `User-agent: *` ไม่บล็อก GPTBot / ClaudeBot / PerplexityBot                                |
| โครงสร้างเนื้อหาหน้าคอร์ส  | ✅ ดีมาก | มีวัตถุประสงค์ กลุ่มเป้าหมาย พื้นฐาน ระยะเวลา ราคา วิทยากร แบ่ง section - เป็น answer-ready อยู่แล้ว |
| Content Freshness          | ✅ ดี    | มีบทความใหม่แทบทุกวัน                                                                      |
| HTTPS + Canonical host     | ✅ ดี    | http→https และ non-www→www redirect 301 ถูกต้อง                                             |
| H1 หน้าคอร์ส/บทความ        | ✅ มี    | H1 เดียวต่อหน้า                                                                            |
| Performance                | 🟡 พอใช้ | TTFB ~0.5s, HTML หน้าแรก ~300KB (หนักเกินไป)                                               |

**ปัญหาที่ตรวจพบ เรียงตามความรุนแรง:**

```
🔴 CRITICAL
├─ ไม่มี Structured Data (JSON-LD) เลยแม้แต่หน้าเดียว
│    ขาด Organization, Course, Offer, Article, Person, BreadcrumbList, FAQPage
├─ ไม่มี Canonical Tag ทุกหน้า
│    มี ?schid= และ ?lang=th/en → เสี่ยง duplicate content
└─ Sitemap ล้าสมัยรุนแรง
     ชี้ไปบริการภายนอก, ~30,000 URLs ที่ lastmod = 2019-08-19 ทั้งหมด
     (ขัดกับความจริงที่เว็บอัปเดตทุกวัน → AI/Google ไม่เชื่อ sitemap นี้)

🟠 HIGH
├─ Title หน้าแรกยาว ~440 ตัวอักษร + keyword stuffing (ควร ~50-60)
├─ meta keywords stuffing ทุกหน้า (ไม่มีผลบวก อาจเป็นสัญญาณ spam)
├─ meta description บทความเป็น boilerplate เหมือนกันทุกหน้า
├─ หน้าแรกไม่มี H1 / หน้ารวมคอร์สใช้ <h2> เป็นชื่อการ์ด 20+ ตัว (heading เป็น noise)
├─ ไม่มี article:published_time / datePublished
└─ มี ?lang=en แต่ไม่มี hreflang

🟡 MEDIUM
├─ ไม่มี llms.txt (404)
├─ หน้าคอร์สไม่มี FAQ section
├─ บทความไม่มีย่อหน้าสรุปตอบคำถามตรง ๆ ในย่อหน้าแรก
├─ บทความไม่ระบุผู้เขียน ทั้งที่มีหน้าโปรไฟล์วิทยากรอยู่แล้ว (เสีย E-E-A-T ฟรี)
└─ ไม่มี BreadcrumbList schema (breadcrumb เป็น visual อย่างเดียว)
```

**Priority Roadmap ที่ได้จาก Audit** (จัดตาม Impact vs Effort) - และนี่คือ **ลำดับเนื้อหาของคอร์ส**:

| ลำดับ | งาน                                                  | Effort    | Impact     | เรียนวันไหน  |
| ----- | ---------------------------------------------------- | --------- | ---------- | ------------ |
| 1     | JSON-LD Schema ครบทุกประเภท                          | 2-3 วัน   | 🔥 สูงมาก  | Day 2 (Astro), Day 3 (WP) |
| 2     | Canonical + robots.txt + Dynamic Sitemap             | 1 วัน     | 🔥 สูงมาก  | Day 2, Day 4 |
| 3     | FAQ + FAQPage Schema                                 | 2-3 วัน   | สูง        | Day 2, Day 3 |
| 4     | Author Box + Person Schema + วันที่ machine-readable | 1-2 วัน   | สูง        | Day 4        |
| 5     | ล้าง Metadata + Heading Hierarchy                    | 1-2 วัน   | กลาง       | Day 2, Day 3 |
| 6     | llms.txt                                             | ครึ่งวัน  | กลาง       | Day 4        |
| 7     | Content Guidelines + Performance                     | ต่อเนื่อง | กลาง       | Day 3, Day 4 |
| 8     | Monitoring (Search Console, Bing, Server Log)        | ต่อเนื่อง | -          | Day 4        |

> 💡 **บทเรียนสำคัญจาก Case Study นี้:** เว็บที่ "ดูดี" ในสายตาคนและมี SSR อยู่แล้ว ยังขาดสัญญาณที่เครื่องอ่านออกเกือบทั้งหมด งานทั้งหมดใน Roadmap เป็น logic ระดับ view/helper/controller ที่พอร์ตไปใช้กับ Astro + Laravel ได้เกือบ 100% นั่นคือสิ่งที่เราจะสร้างตั้งแต่วันนี้ให้ถูกตั้งแต่ต้น แทนที่จะไปแก้ทีหลัง

---

## 📚 Module 2: สถาปัตยกรรม AI-Findable Full Stack

### เวลา 21:20-21:40 น.

> 💡 **หัวใจของ Module นี้:** AI crawlers ส่วนใหญ่ **ไม่รัน JavaScript** ดังนั้นสิ่งที่อยู่ใน HTML ตอนที่เซิร์ฟเวอร์ตอบกลับคือ "ทั้งหมดที่ AI เห็น" สถาปัตยกรรมที่ดีที่สุดสำหรับ GEO จึงเป็นสถาปัตยกรรมที่ HTML สมบูรณ์ 100% ตั้งแต่แรก และ Static Site Generation (SSG) คือคำตอบที่ทั้งเร็วที่สุด ปลอดภัยที่สุด และ Deploy ง่ายที่สุด

---

### 2.1 ทำไม Static Site Generation (SSG) คือคำตอบสำหรับ GEO

SSG คือการ "เรนเดอร์ล่วงหน้า" ทุกหน้าเป็นไฟล์ `.html` ตอน build แล้วนำไฟล์ไปวางบนเว็บเซิร์ฟเวอร์ธรรมดา เมื่อ crawler หรือผู้ใช้ขอหน้าเว็บ เซิร์ฟเวอร์แค่ส่งไฟล์กลับ ไม่ต้องประมวลผลอะไรเลย

```
ตอน build (เครื่องพัฒนา / CI):                    ตอน serve (Apache/Nginx บน production):
┌──────────────────────────────────────────┐    ┌──────────────────────────────────────┐
│ MySQL ──→ Laravel API ──→ Astro build     │    │ ผู้ใช้ / AI crawler ขอ /services/web  │
│                              ↓            │ ⟶  │            ↓                         │
│                    dist/services/web/     │    │ Apache ส่ง index.html กลับทันที        │
│                          index.html       │    │   (TTFB ต่ำมาก, HTML ครบ, ไม่ต้อง JS)  │
└──────────────────────────────────────────┘    └──────────────────────────────────────┘
      ต้องมี Node.js เฉพาะตรงนี้                        ไม่ต้องมี Node.js / PHP สำหรับหน้าเว็บ
```

ข้อได้เปรียบของ SSG ในมุม GEO:

- **HTML สมบูรณ์ 100%** ทุก crawler อ่านเนื้อหาได้ครบโดยไม่ต้องรัน JavaScript รวมถึง JSON-LD ที่ฝังอยู่ใน `<head>`
- **เร็วที่สุดเท่าที่จะเป็นไปได้** TTFB ต่ำ เพราะไม่มี database query หรือ PHP ประมวลผลตอน request
- **ปลอดภัย** ไม่มี runtime ที่โจมตีได้บนหน้าเว็บ ฐานข้อมูลและ API อยู่หลังบ้าน
- **Deploy ง่าย** วางบน Apache/Nginx, Shared Hosting, CDN หรือ S3 ได้หมด ไม่ต้องติดตั้ง Node.js บนเซิร์ฟเวอร์

จุดอ่อนที่ต้องจัดการ (และเราจะจัดการใน Day 4): **เนื้อหาเปลี่ยนแล้วต้อง build ใหม่** ซึ่งแก้ได้ด้วยระบบ Rebuild อัตโนมัติผ่าน Webhook เมื่อข้อมูลในฐานข้อมูลเปลี่ยน

### 2.2 ภาพรวมสถาปัตยกรรม GeniusCorp Modern

```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                          GeniusCorp Modern (Day 1-2, Day 4)                      │
│                                                                                 │
│   ┌────────────────┐   REST + Bearer Token   ┌────────────────┐   Eloquent      │
│   │  Astro 6 (SSG) │ ◀──────────────────────▶│ Laravel 13 API │ ◀────────────▶ │
│   │  geniuscorp-web│    (เฉพาะตอน build)      │ + Sanctum      │   MySQL /      │
│   └───────┬────────┘                          │ geniuscorp-api │   MariaDB      │
│           │ astro build                       └───────▲────────┘                │
│           ▼                                           │ Admin แก้ข้อมูล          │
│   ┌────────────────┐                                  │ (Day 4: Observer →       │
│   │  dist/ (HTML)  │ ──── rsync / scp ────▶  Apache/Nginx     Webhook → Rebuild) │
│   └────────────────┘                          www.geniuscorp.example            │
│                                               api.geniuscorp.example (Laravel)  │
└─────────────────────────────────────────────────────────────────────────────────┘
```

บทบาทของแต่ละส่วน:

| ส่วน                     | หน้าที่                                                                                                 | รันที่ไหน                          |
| ------------------------ | ------------------------------------------------------------------------------------------------------- | ---------------------------------- |
| **MySQL / MariaDB**      | เก็บเนื้อหาจริง (บริการ ผลงาน บทความ ทีมงาน FAQ) พร้อมฟิลด์ที่ GEO ต้องใช้ เช่น `published_at`, `updated_at`, `author_id` | เซิร์ฟเวอร์ (หรือ Laragon ตอนพัฒนา) |
| **Laravel 13 API**       | ส่งข้อมูลเป็น JSON ผ่าน API Resources, ป้องกันด้วย Sanctum Token, (Day 4) ส่ง sitemap entries และยิง Webhook | เซิร์ฟเวอร์ PHP (Apache/Nginx + PHP-FPM) |
| **Astro 6**              | ดึงข้อมูลจาก API ตอน build แล้วเรนเดอร์เป็น Static HTML พร้อม SEO Head และ JSON-LD                        | เครื่องพัฒนา / CI เท่านั้น         |
| **Apache / Nginx**       | ส่งไฟล์ static + เปิด gzip/brotli + HTTPS + redirect                                                    | Production                         |

> 🔐 **ทำไมต้องมี Sanctum ทั้งที่ข้อมูลเป็น public อยู่แล้ว?** เพราะ API นี้ส่งข้อมูล "ทั้งหมด" รวมถึงข้อมูลที่ยังไม่เผยแพร่ (draft), ฟิลด์ภายใน และในอนาคตจะมี endpoint สำหรับ Admin การมี Token ตั้งแต่ต้นทำให้เราควบคุมได้ว่าใครดึงข้อมูลไปได้บ้าง และป้องกันคนอื่นมา scrape API เราไปทำเว็บซ้ำ

### 2.3 เปรียบเทียบ SSG vs SSR vs SPA vs WordPress ในสายตา AI Crawlers

| มิติ                                | **SSG** (Astro)                    | **SSR** (Laravel Blade / Next.js SSR)  | **SPA** (React/Vue ล้วน)                 | **WordPress** (PHP Rendering)                 |
| ----------------------------------- | ---------------------------------- | -------------------------------------- | ---------------------------------------- | --------------------------------------------- |
| HTML ครบตอน response แรก            | ✅ 100%                            | ✅ 100%                                | ❌ ว่างเปล่า ต้องรัน JS                   | ✅ 100% (ถ้า Theme ไม่ทำพัง)                   |
| AI crawlers (ไม่รัน JS) อ่านได้      | ✅                                 | ✅                                     | ❌ เห็นแค่ `<div id="app">`               | ✅                                            |
| TTFB                                | ต่ำที่สุด (ส่งไฟล์)                 | ปานกลาง (ประมวลผลทุก request)           | ต่ำ (แต่เนื้อหายังไม่มา)                  | สูง ถ้าไม่มี cache (PHP + DB ทุก request)      |
| ขนาด HTML                           | เล็ก (Zero-JS by default)           | ขึ้นกับ framework                       | เล็กแต่ JS bundle ใหญ่                    | มักใหญ่ (Page Builder ยัด div/CSS inline)      |
| เนื้อหาเปลี่ยน                       | ต้อง rebuild (แก้ด้วย Webhook)     | ทันที                                  | ทันที                                    | ทันที (แต่ต้องล้าง cache)                      |
| ต้องมี runtime บนเซิร์ฟเวอร์         | ไม่ต้อง (แค่เว็บเซิร์ฟเวอร์)        | ต้อง (PHP/Node)                         | ไม่ต้อง (แต่ AI อ่านไม่ได้)                | ต้อง (PHP + MySQL)                             |
| เหมาะกับ                            | เว็บองค์กร, เนื้อหาเปลี่ยนไม่บ่อยมาก | เว็บที่ต้องการข้อมูล real-time, มี login | Web App หลัง login (ไม่ต้องการ SEO)        | เว็บที่ทีมคอนเทนต์ต้องแก้เองบ่อยและมีทีมดูแล WP |
| Structured Data                     | ฝังตอน build ควบคุมได้เต็มที่        | ฝังตอน render                          | ต้องใช้ prerender/SSR เพิ่ม                | ผ่าน Plugin หรือโค้ดเอง (มักซ้ำซ้อน)            |

> 📌 **ข้อสรุป:** SPA ล้วน ๆ คือสถาปัตยกรรมที่แย่ที่สุดสำหรับ GEO และเป็นสาเหตุที่เว็บที่ rebuild ด้วย React/Vue โดยไม่ทำ SSR/SSG "หายจาก AI Search" ทั้งที่ดูทันสมัย ส่วน WordPress ยัง AI-readable ได้ดีถ้าจัดการถูกวิธี ซึ่งเป็นเนื้อหาทั้งวันของ Day 3

### 2.4 แผนที่การตัดสินใจ: โปรเจกต์แบบไหนควรใช้ WordPress ต่อ แบบไหนควรไป Astro SSG

การตัดสินใจเชิงสถาปัตยกรรมไม่ควรตัดสินจาก "เทคโนโลยีไหนใหม่กว่า" แต่จาก **ต้นทุนรวม** และ **ความสามารถของทีม** ใช้แผนที่นี้ประกอบการตัดสินใจ (จะขยายความพร้อมเส้นทาง Migration ใน Day 3):

```
เริ่ม: เว็บนี้เป็นเว็บอะไร?
│
├─ เว็บใหม่ (สร้างจากศูนย์) ────────────────────────────────▶ Astro SSG + Laravel API
│     เหตุผล: ไม่มีต้นทุน migration, ได้ GEO ถูกตั้งแต่ต้น, Deploy ง่าย
│
└─ เว็บเดิมบน WordPress
      │
      ├─ ทีมคอนเทนต์แก้เว็บเองทุกวัน + ไม่มี Dev ประจำ ───────▶ อยู่กับ WordPress + ทำ GEO Retrofit (Day 3)
      │
      ├─ ใช้ Plugin เยอะ (WooCommerce, Membership, Forms) ───▶ อยู่กับ WordPress + GEO Retrofit
      │     เหตุผล: ต้นทุน rebuild ระบบเหล่านี้สูงมาก
      │
      ├─ เว็บช้า, Theme/Page Builder ทำ HTML พัง, แก้แล้วแก้อีก
      │     และมี Dev ที่ดูแล Laravel ได้ ─────────────────────▶ ย้ายไป Astro SSG แบบค่อยเป็นค่อยไป
      │     (เริ่มจากหน้า landing/บริการ แล้วค่อย ๆ ย้าย โดยรักษา URL เดิม + Redirect)
      │
      └─ เนื้อหาเยอะมาก (หลายพันหน้า) + ทีมใหญ่ ──────────────▶ Hybrid: WordPress เป็น Headless CMS
            (WP REST API) + Astro SSG เรนเดอร์หน้าเว็บ
```

| ปัจจัย                          | WordPress (Retrofit)            | Astro SSG + Laravel API         |
| ------------------------------- | ------------------------------- | ------------------------------- |
| ต้นทุนเริ่มต้น                  | ต่ำ (มีอยู่แล้ว)                 | ปานกลาง (สร้างใหม่)              |
| ต้นทุนดูแลระยะยาว               | ปานกลาง-สูง (อัปเดต Plugin, Security) | ต่ำ (static ไม่มีอะไรให้แฮ็ก)   |
| ความยืดหยุ่นทีมคอนเทนต์          | สูงมาก (Admin สำเร็จรูป)         | ต้องสร้าง Admin หรือใช้ CMS เสริม |
| Performance                     | ต้องพึ่ง Cache Plugin            | ดีที่สุดโดยธรรมชาติ              |
| ควบคุม HTML/Schema              | จำกัดโดย Theme/Plugin            | ควบคุมได้ 100%                   |
| GEO-Ready                       | ทำได้ แต่ต้องดูแลไม่ให้ Plugin ทำพัง | ทำได้ครบและคงทน                 |

---

## 📚 Module 3: Laravel API Foundation

### เวลา 21:40-22:35 น.

> 💡 **หัวใจของ Module นี้:** ฐานข้อมูลคือ "แหล่งความจริง" ของสัญญาณ GEO ทั้งหมด ถ้าตารางไม่มี `published_at`, `updated_at`, `author_id` หรือ `slug` ที่ดี เราจะไม่มีทางสร้าง `datePublished`, `dateModified`, `author` ใน JSON-LD หรือ `lastmod` ใน sitemap ที่ถูกต้องได้ วันนี้เราออกแบบตารางให้ "answer-ready" ตั้งแต่ต้น แล้วเปิด API ที่ส่งข้อมูลเท่าที่ Astro ต้องใช้

---

### 3.1 สร้างโปรเจกต์ Laravel 13 และตั้งค่าฐานข้อมูล

```bash
# สร้างโปรเจกต์ (ถ้าติดตั้ง laravel/installer ไว้แล้วตาม precourse)
laravel new geniuscorp-api
# ตอบคำถามของ installer: Starter kit = None, Testing = Pest หรือ PHPUnit ตามถนัด, Database = MySQL

cd geniuscorp-api

# ติดตั้ง API scaffolding: จะเพิ่ม routes/api.php และติดตั้ง Laravel Sanctum ให้อัตโนมัติ
php artisan install:api
```

> 📌 **Laravel 12/13 เปลี่ยนโครงสร้างจากยุค Laravel 10:** ไม่มี `app/Http/Kernel.php` และไม่มี `routes/api.php` ตั้งแต่แรก middleware ตั้งค่าที่ `bootstrap/app.php` และต้องรัน `php artisan install:api` เพื่อเปิดใช้ API routes (คำสั่งนี้ติดตั้ง Sanctum พร้อม migration ของตาราง `personal_access_tokens` ให้ด้วย)

สร้างฐานข้อมูลใน MySQL (ผ่าน HeidiSQL ที่มากับ Laragon, phpMyAdmin หรือ CLI):

```sql
CREATE DATABASE geniuscorp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

แก้ไฟล์ `.env`:

```dotenv
APP_NAME="GeniusCorp API"
APP_URL=http://geniuscorp-api.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=geniuscorp
DB_USERNAME=root
DB_PASSWORD=

# ข้อมูลองค์กรที่ใช้ประกอบ Organization Schema (Day 2) และ Author (Day 4)
COMPANY_NAME="GeniusCorp Co., Ltd."
COMPANY_SITE_URL=https://www.geniuscorp.example
```

> ⚠️ **utf8mb4 สำคัญกับภาษาไทยและอีโมจิ** ถ้าสร้าง database เป็น `utf8` (3 ไบต์) จะเก็บอีโมจิไม่ได้และเรียงลำดับภาษาไทยผิดในบางกรณี Laravel 13 ตั้งค่า `charset=utf8mb4` ไว้ใน `config/database.php` อยู่แล้ว ขอเพียง database ที่สร้างตรงกัน

> ✅ ตรวจว่าเชื่อมต่อได้: `php artisan migrate` (จะสร้างตารางพื้นฐาน users, cache, jobs, personal_access_tokens) แล้ว `php artisan serve` เปิด http://127.0.0.1:8000 เห็นหน้า Laravel

### 3.2 ออกแบบฐานข้อมูลเว็บองค์กรที่รองรับ GEO

หลักการออกแบบ 5 ข้อที่ใช้กับทุกตาราง:

1. **`slug` unique** สำหรับ URL ที่อ่านได้และคงที่ (`/services/web-development` ไม่ใช่ `/services?id=3`) - เป็นพื้นฐานของ Canonical และ BreadcrumbList
2. **`published_at` แยกจาก `created_at`** เพราะวันที่ "เผยแพร่" กับวันที่ "สร้าง record" ไม่ใช่วันเดียวกัน และ `datePublished` ใน Schema ต้องใช้ตัวแรก
3. **`updated_at` ต้องสะท้อนการแก้ไขเนื้อหาจริง** เพื่อใช้เป็น `dateModified` และ `lastmod` ใน sitemap (Laravel จัดการให้อัตโนมัติ)
4. **`author_id` เชื่อมไปยัง `team_members`** เพื่อสร้าง E-E-A-T: บทความทุกชิ้นมีผู้เขียนที่มีตัวตน มีตำแหน่ง มีโปรไฟล์
5. **ฟิลด์เชิงปริมาณ** เช่น `price_from`, `duration_days` เก็บเป็นตัวเลข ไม่ใช่ข้อความ เพื่อใส่ใน `Offer` Schema และให้ AI ดึง "ตัวเลข" ได้ (ตามงานวิจัย GEO)

```
┌──────────────────┐        ┌──────────────────┐        ┌──────────────────┐
│   team_members   │        │     services     │        │      faqs        │
├──────────────────┤        ├──────────────────┤        ├──────────────────┤
│ id               │◀──┐    │ id               │◀───────│ service_id (FK)  │
│ slug (unique)    │   │    │ slug (unique)    │        │ question         │
│ name             │   │    │ name             │        │ answer           │
│ job_title        │   │    │ short_description│        │ sort_order       │
│ bio              │   │    │ description      │        └──────────────────┘
│ photo            │   │    │ price_from       │              (Day 2)
│ email            │   │    │ price_currency   │
│ social_links(json)│  │    │ duration_days    │        ┌──────────────────┐
│ sort_order       │   │    │ icon             │        │    portfolios    │
└──────────────────┘   │    │ sort_order       │        ├──────────────────┤
                       │    │ is_published     │   ┌───▶│ service_id (FK)  │
┌──────────────────┐   │    │ published_at     │   │    │ slug (unique)    │
│     articles     │   │    └──────────────────┘   │    │ title            │
├──────────────────┤   │             │             │    │ client_name      │
│ author_id (FK) ──┼───┘             └─────────────┘    │ summary          │
│ slug (unique)    │                                    │ description      │
│ title            │                                    │ cover_image      │
│ excerpt          │                                    │ completed_at     │
│ body             │                                    │ is_published     │
│ cover_image      │                                    └──────────────────┘
│ is_published     │
│ published_at     │
└──────────────────┘
```

สร้าง Model, Migration, Seeder และ Controller ในคำสั่งเดียวต่อ entity:

```bash
php artisan make:model TeamMember -msc --api
php artisan make:model Service -msc --api
php artisan make:model Portfolio -msc --api
php artisan make:model Article -msc --api
php artisan make:model Faq -ms
```

> `-m` = migration, `-s` = seeder, `-c` = controller, `--api` = controller แบบ API (ไม่มี create/edit) ตาราง `faqs` สร้างไว้ตั้งแต่วันนี้เพื่อให้โครงสร้างครบ แต่จะเขียน API และแสดงผลใน Day 2

### 3.3 Migration ทั้ง 5 ตาราง

ลำดับสำคัญ: ตารางที่ถูกอ้างอิง (`team_members`, `services`) ต้องถูกสร้างก่อนตารางที่มี Foreign Key ชี้ไปหา Laravel รัน migration ตามชื่อไฟล์ (timestamp) ให้แน่ใจว่าไฟล์ของ `team_members` และ `services` มี timestamp น้อยกว่า `articles`, `portfolios`, `faqs` (ถ้ารันคำสั่ง `make:model` ตามลำดับด้านบนจะถูกต้องอยู่แล้ว)

```php
<?php
// database/migrations/xxxx_create_team_members_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();            // ใช้ทำ URL /team/#slug และ Person @id
            $table->string('name');
            $table->string('job_title');                  // → Person.jobTitle
            $table->text('bio')->nullable();              // → Person.description
            $table->string('photo')->nullable();          // → Person.image
            $table->string('email')->nullable();
            $table->json('social_links')->nullable();     // → Person.sameAs (array ของ URL)
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
```

```php
<?php
// database/migrations/xxxx_create_services_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');                                   // → Service.name
            $table->string('short_description', 300);                 // → meta description + Service.description
            $table->longText('description');                          // เนื้อหาเต็ม (HTML หรือ Markdown)
            $table->decimal('price_from', 10, 2)->nullable();         // → Offer.price (ตัวเลขจริง)
            $table->string('price_currency', 3)->default('THB');      // → Offer.priceCurrency
            $table->unsignedSmallInteger('duration_days')->nullable(); // "ใช้เวลากี่วัน" ตัวเลขที่ AI ชอบดึง
            $table->string('icon')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();            // → datePublished
            $table->timestamps();                                     // updated_at → dateModified / lastmod

            $table->index(['is_published', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
```

```php
<?php
// database/migrations/xxxx_create_portfolios_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('client_name')->nullable();
            $table->string('summary', 300);
            $table->longText('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('completed_at')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
```

```php
<?php
// database/migrations/xxxx_create_articles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // ผู้เขียนคือสมาชิกทีม → E-E-A-T (Article.author = Person ที่มีตัวตนจริง)
            $table->foreignId('author_id')->constrained('team_members')->restrictOnDelete();
            $table->string('slug')->unique();
            $table->string('title');                          // → Article.headline (ควร <= 110 ตัวอักษร)
            $table->string('excerpt', 300);                   // → meta description + Article.description
            $table->longText('body');                         // HTML ของเนื้อหา
            $table->string('cover_image')->nullable();        // → Article.image + og:image
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();    // → datePublished + article:published_time
            $table->timestamps();                             // updated_at → dateModified + article:modified_time

            $table->index(['is_published', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
```

```php
<?php
// database/migrations/xxxx_create_faqs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('question', 300);   // → Question.name (เขียนเป็นคำถามที่ผู้ใช้ถาม AI จริง)
            $table->text('answer');            // → Answer.text (ตอบตรง 2-4 ประโยค มีตัวเลข)
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
```

```bash
php artisan migrate
```

> ✅ **ผลลัพธ์ที่คาดหวัง:** เห็นตาราง `team_members`, `services`, `portfolios`, `articles`, `faqs` ใน database `geniuscorp` พร้อม Foreign Key ครบ ถ้าเจอ error เรื่อง FK ให้ตรวจลำดับ timestamp ของไฟล์ migration

### 3.4 Model และความสัมพันธ์

Laravel 13 ใช้เมธอด `casts()` แทน property `$casts` (ใช้ได้ทั้งสองแบบ แต่เมธอดเป็นแนวทางที่แนะนำตั้งแต่ Laravel 11) และเราเพิ่ม **Query Scope `published()`** ในทุก Model ที่มีสถานะเผยแพร่ เพื่อให้ API ไม่หลุดข้อมูล draft ออกไปโดยไม่ตั้งใจ

```php
<?php
// app/Models/TeamMember.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'name', 'job_title', 'bio', 'photo', 'email', 'social_links', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'social_links' => 'array',   // เก็บเป็น JSON ใน DB, ใช้เป็น array ใน PHP
        ];
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id');
    }
}
```

```php
<?php
// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'name', 'short_description', 'description', 'price_from', 'price_currency',
        'duration_days', 'icon', 'sort_order', 'is_published', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'price_from'    => 'decimal:2',
            'is_published'  => 'boolean',
            'published_at'  => 'datetime',
        ];
    }

    // ใช้ slug แทน id เมื่อ bind ใน route: /api/v1/services/{service:slug}
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Scope: เฉพาะที่เผยแพร่แล้วและถึงเวลาเผยแพร่แล้ว
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class)->orderBy('sort_order');
    }

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }
}
```

```php
<?php
// app/Models/Portfolio.php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'slug', 'title', 'client_name', 'summary', 'description',
        'cover_image', 'completed_at', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'date',
            'is_published' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
```

```php
<?php
// app/Models/Article.php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id', 'slug', 'title', 'excerpt', 'body', 'cover_image', 'is_published', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(TeamMember::class, 'author_id');
    }
}
```

```php
<?php
// app/Models/Faq.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'question', 'answer', 'sort_order'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
```

### 3.5 Seeder ข้อมูลจำลอง GeniusCorp

ข้อมูลจำลองถูกออกแบบให้ "มีตัวเลข" และ "ตอบคำถามจริง" ตั้งแต่ต้น (ราคาเริ่มต้น ระยะเวลา จำนวนโปรเจกต์) เพราะเราจะเห็นผลของมันใน JSON-LD และ FAQ ในวันพรุ่งนี้ ไฟล์เต็มอยู่ใน Starter Code ด้านล่างคือฉบับย่อที่แสดงโครงสร้างครบทุกตาราง

```php
<?php
// database/seeders/TeamMemberSeeder.php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'slug' => 'somchai-techlead',
                'name' => 'สมชาย ใจดี',
                'job_title' => 'Chief Technology Officer',
                'bio' => 'สถาปนิกซอฟต์แวร์ประสบการณ์ 15 ปี ดูแลระบบให้ลูกค้าองค์กรมากกว่า 40 โปรเจกต์ เชี่ยวชาญ Laravel, Astro และ Cloud Architecture',
                'photo' => '/images/team/somchai.jpg',
                'email' => 'somchai@geniuscorp.example',
                'social_links' => [
                    'https://www.linkedin.com/in/somchai-example',
                    'https://github.com/somchai-example',
                ],
                'sort_order' => 1,
            ],
            [
                'slug' => 'nattaya-pm',
                'name' => 'ณัฐญา วงศ์สว่าง',
                'job_title' => 'Project Manager',
                'bio' => 'บริหารโปรเจกต์พัฒนาซอฟต์แวร์ให้ลูกค้าภาครัฐและเอกชนมากกว่า 25 โครงการ ได้รับการรับรอง PMP',
                'photo' => '/images/team/nattaya.jpg',
                'email' => 'nattaya@geniuscorp.example',
                'social_links' => ['https://www.linkedin.com/in/nattaya-example'],
                'sort_order' => 2,
            ],
            [
                'slug' => 'peerapat-dev',
                'name' => 'พีรพัฒน์ ศรีสุข',
                'job_title' => 'Senior Full Stack Developer',
                'bio' => 'นักพัฒนา Full Stack สาย PHP/Laravel และ TypeScript เขียนบทความเทคนิคประจำบล็อกของบริษัท',
                'photo' => '/images/team/peerapat.jpg',
                'email' => null,
                'social_links' => ['https://github.com/peerapat-example'],
                'sort_order' => 3,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['slug' => $member['slug']], $member);
        }
    }
}
```

```php
<?php
// database/seeders/ServiceSeeder.php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug' => 'web-development',
                'name' => 'รับพัฒนาเว็บไซต์องค์กร',
                'short_description' => 'พัฒนาเว็บไซต์องค์กรด้วย Astro และ Laravel โหลดเร็ว รองรับ AI Search ตั้งแต่วันแรก เริ่มต้น 45,000 บาท ใช้เวลา 30 วัน',
                'description' => '<p>เราพัฒนาเว็บไซต์องค์กรด้วยสถาปัตยกรรม Static Site Generation ที่ให้ HTML สมบูรณ์ 100% ทำให้ทั้ง Google และ AI Search Engines อ่านเนื้อหาได้ครบ...</p><h2>เหมาะกับใคร</h2><p>บริษัทที่ต้องการเว็บองค์กรใหม่หรือต้องการย้ายจาก WordPress...</p>',
                'price_from' => 45000,
                'price_currency' => 'THB',
                'duration_days' => 30,
                'icon' => 'globe',
                'sort_order' => 1,
                'is_published' => true,
                'published_at' => now()->subMonths(6),
            ],
            [
                'slug' => 'mobile-app-development',
                'name' => 'รับพัฒนาโมบายแอปพลิเคชัน',
                'short_description' => 'พัฒนาแอป iOS และ Android ด้วย Flutter จากทีมที่ส่งมอบแล้วมากกว่า 30 แอป เริ่มต้น 150,000 บาท ใช้เวลา 60-90 วัน',
                'description' => '<p>พัฒนาแอปด้วย Flutter ครั้งเดียวได้ทั้ง iOS และ Android...</p>',
                'price_from' => 150000,
                'price_currency' => 'THB',
                'duration_days' => 75,
                'icon' => 'smartphone',
                'sort_order' => 2,
                'is_published' => true,
                'published_at' => now()->subMonths(5),
            ],
            [
                'slug' => 'geo-aeo-consulting',
                'name' => 'ที่ปรึกษา GEO/AEO/AIO ให้เว็บถูก AI อ้างอิง',
                'short_description' => 'ตรวจสอบและปรับเว็บไซต์ให้ถูกอ้างอิงโดย ChatGPT, Perplexity, Claude และ Gemini พร้อมรายงานวัดผลรายเดือน เริ่มต้น 25,000 บาท',
                'description' => '<p>บริการ Audit เว็บไซต์ตาม GEO-Ready Checklist 20 ข้อ...</p>',
                'price_from' => 25000,
                'price_currency' => 'THB',
                'duration_days' => 14,
                'icon' => 'sparkles',
                'sort_order' => 3,
                'is_published' => true,
                'published_at' => now()->subMonths(2),
            ],
            [
                'slug' => 'internal-draft-service',
                'name' => 'บริการที่ยังไม่เผยแพร่ (ทดสอบ scope published)',
                'short_description' => 'ข้อมูลนี้ต้องไม่หลุดออกไปทาง API',
                'description' => '<p>draft</p>',
                'price_from' => null,
                'duration_days' => null,
                'sort_order' => 99,
                'is_published' => false,
                'published_at' => null,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
```

```php
<?php
// database/seeders/PortfolioSeeder.php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $web = Service::where('slug', 'web-development')->first();
        $app = Service::where('slug', 'mobile-app-development')->first();

        $items = [
            [
                'service_id' => $web?->id,
                'slug' => 'siam-logistics-corporate-site',
                'title' => 'เว็บไซต์องค์กร Siam Logistics',
                'client_name' => 'Siam Logistics Co., Ltd.',
                'summary' => 'ย้ายเว็บจาก WordPress มาเป็น Astro SSG ลดเวลาโหลดจาก 4.2 วินาที เหลือ 0.8 วินาที และถูก Perplexity อ้างอิงภายใน 6 สัปดาห์',
                'description' => '<p>รายละเอียดโปรเจกต์...</p>',
                'cover_image' => '/images/portfolio/siam-logistics.jpg',
                'completed_at' => '2026-03-15',
                'is_published' => true,
            ],
            [
                'service_id' => $app?->id,
                'slug' => 'healthplus-patient-app',
                'title' => 'แอปนัดหมายผู้ป่วย HealthPlus',
                'client_name' => 'HealthPlus Clinic Network',
                'summary' => 'แอป Flutter สำหรับนัดหมายและดูผลตรวจ ผู้ใช้งาน 12,000 คนภายใน 3 เดือนแรก',
                'description' => '<p>รายละเอียดโปรเจกต์...</p>',
                'cover_image' => '/images/portfolio/healthplus.jpg',
                'completed_at' => '2025-11-30',
                'is_published' => true,
            ],
        ];

        foreach ($items as $item) {
            Portfolio::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
```

```php
<?php
// database/seeders/ArticleSeeder.php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $somchai = TeamMember::where('slug', 'somchai-techlead')->first();
        $peerapat = TeamMember::where('slug', 'peerapat-dev')->first();

        $articles = [
            [
                'author_id' => $somchai->id,
                'slug' => 'geo-vs-seo-2026',
                'title' => 'GEO ต่างจาก SEO อย่างไร และเว็บองค์กรต้องปรับอะไรบ้างในปี 2026',
                'excerpt' => 'GEO คือการทำให้เว็บถูก AI อ้างอิง ต่างจาก SEO ที่เน้นอันดับ บทความนี้สรุป 7 สิ่งที่นักพัฒนาต้องทำ พร้อมตัวเลขจากงานวิจัย Princeton',
                'body' => '<p>ในปี 2026 ผู้ใช้กว่าครึ่งเริ่มต้นการค้นหาด้วยการถาม AI แทน Google...</p><h2>GEO คืออะไร</h2><p>...</p><h2>เว็บองค์กรต้องทำอะไรบ้าง</h2><p>...</p>',
                'cover_image' => '/images/blog/geo-vs-seo.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'author_id' => $peerapat->id,
                'slug' => 'astro-laravel-ssg-architecture',
                'title' => 'สถาปัตยกรรม Astro SSG + Laravel API: ทำไมไม่ต้องมี Node.js บนเซิร์ฟเวอร์',
                'excerpt' => 'อธิบายการทำงานของ Astro SSG ร่วมกับ Laravel API และ MySQL ตั้งแต่ build จนถึง deploy บน Apache พร้อมตัวเลข TTFB ที่วัดได้จริง',
                'body' => '<p>หลายคนเข้าใจว่าเว็บที่สร้างด้วย JavaScript framework ต้องรัน Node.js บนเซิร์ฟเวอร์เสมอ...</p>',
                'cover_image' => '/images/blog/astro-laravel.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'author_id' => $somchai->id,
                'slug' => 'wordpress-geo-retrofit-checklist',
                'title' => 'Checklist 20 ข้อ ทำเว็บ WordPress เดิมให้ AI อ้างอิงได้โดยไม่ต้อง Rebuild',
                'excerpt' => 'รวม Checklist สำหรับ GEO Retrofit บน WordPress ตั้งแต่ Metadata, Canonical, Schema จนถึง Performance พร้อมเครื่องมือตรวจฟรี',
                'body' => '<p>...</p>',
                'cover_image' => '/images/blog/wp-geo-checklist.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['slug' => $article['slug']], $article);
        }
    }
}
```

```php
<?php
// database/seeders/FaqSeeder.php  (ข้อมูลพร้อมใช้ใน Day 2)

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Service;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            'web-development' => [
                ['บริการพัฒนาเว็บไซต์องค์กรเหมาะกับใคร', 'เหมาะกับบริษัทที่ต้องการเว็บองค์กรใหม่ หรือต้องการย้ายจาก WordPress ที่ช้าและดูแลยาก โดยเฉพาะองค์กรที่ต้องการให้เว็บถูกค้นเจอทั้งใน Google และ AI Search เช่น ChatGPT และ Perplexity'],
                ['ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง', 'เริ่มต้น 45,000 บาท สำหรับเว็บ 7 หน้ามาตรฐาน (หน้าแรก เกี่ยวกับเรา บริการ ผลงาน บทความ ทีมงาน ติดต่อ) รวมการติดตั้ง Structured Data, Sitemap, llms.txt และ Deploy ขึ้นเซิร์ฟเวอร์ของลูกค้า'],
                ['ใช้เวลาดำเนินการกี่วัน', 'ประมาณ 30 วันทำการ แบ่งเป็นออกแบบ 7 วัน พัฒนา 15 วัน และทดสอบพร้อม Deploy 8 วัน'],
                ['มีบริการหลังการขายหรือไม่', 'มีการรับประกันแก้ไขข้อผิดพลาด 90 วันหลังส่งมอบ และมีแพ็กเกจดูแลรายเดือนเริ่มต้น 3,000 บาท ซึ่งรวมการ Rebuild เมื่อเนื้อหาเปลี่ยนและรายงาน AI Crawler รายเดือน'],
            ],
            'geo-aeo-consulting' => [
                ['GEO/AEO/AIO คืออะไร ต่างจาก SEO อย่างไร', 'GEO (Generative Engine Optimization) คือการทำให้เว็บถูก AI เช่น ChatGPT, Perplexity, Claude และ Gemini เลือกอ้างอิงในคำตอบ ส่วน SEO เน้นการติดอันดับในหน้าผลการค้นหา ทั้งสองใช้พื้นฐาน Technical SEO ร่วมกัน แต่ GEO เพิ่มเรื่อง Structured Data, E-E-A-T และเนื้อหาที่มีตัวเลขและแหล่งอ้างอิง'],
                ['ใช้เวลานานแค่ไหนกว่าจะเห็นผล', 'โดยทั่วไป AI Crawlers จะเข้ามาเก็บข้อมูลใหม่ภายใน 1-4 สัปดาห์หลังปรับปรุง และจากโปรเจกต์ที่ผ่านมา ลูกค้าเริ่มถูกอ้างอิงใน Perplexity ภายใน 6-8 สัปดาห์'],
                ['วัดผลอย่างไรว่าเว็บถูก AI อ้างอิงแล้ว', 'เราตรวจ Server Log หา User-Agent ของ AI Crawlers และทดสอบถาม AI แต่ละตัวด้วยชุดคำถามเป้าหมาย 20 คำถามทุกเดือน แล้วรายงานว่าเว็บถูกอ้างอิงกี่ครั้ง'],
            ],
        ];

        foreach ($faqs as $serviceSlug => $items) {
            $service = Service::where('slug', $serviceSlug)->first();
            if (! $service) {
                continue;
            }

            foreach ($items as $index => [$question, $answer]) {
                Faq::updateOrCreate(
                    ['service_id' => $service->id, 'question' => $question],
                    ['answer' => $answer, 'sort_order' => $index + 1]
                );
            }
        }
    }
}
```

```php
<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ผู้ใช้สำหรับออก Sanctum Token ให้ build process (ไม่ใช่ผู้ใช้จริง)
        User::updateOrCreate(
            ['email' => 'astro-build@geniuscorp.example'],
            ['name' => 'Astro Build Bot', 'password' => bcrypt(str()->random(32))]
        );

        $this->call([
            TeamMemberSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            ArticleSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
```

```bash
php artisan db:seed
# หรือถ้าต้องการล้างและสร้างใหม่ทั้งหมด
php artisan migrate:fresh --seed
```

> ✅ **ผลลัพธ์ที่คาดหวัง:** เปิด HeidiSQL/phpMyAdmin เห็นข้อมูล 3 ทีม, 4 บริการ (1 draft), 2 ผลงาน, 3 บทความ, 7 FAQ · ถ้ารันซ้ำได้โดยไม่ error แปลว่า `updateOrCreate` ทำงานถูกต้อง

### 3.6 API Resources - ส่งข้อมูลเท่าที่จำเป็นในรูปแบบที่ Astro ใช้ง่าย

API Resource คือชั้น "แปลง Model → JSON" ที่ให้เราควบคุมได้ว่าฟิลด์ไหนออกไปบ้าง ชื่ออะไร และรูปแบบวันที่เป็นอย่างไร กติกาของเรา:

- วันที่ทั้งหมดส่งเป็น **ISO 8601** (`2026-09-05T13:30:00+07:00`) เพราะเป็นรูปแบบที่ Schema.org และ sitemap ต้องการ ไม่ต้องแปลงอีกฝั่ง Astro
- ไม่ส่ง `id` ภายในออกไปถ้าไม่จำเป็น ใช้ `slug` เป็น key แทน
- ส่ง `url` path ของหน้าเว็บมาด้วย เพื่อให้ Astro ประกอบ Canonical และ Breadcrumb ได้โดยไม่ต้องรู้กฎ URL ซ้ำสองที่

```bash
php artisan make:resource TeamMemberResource
php artisan make:resource ServiceResource
php artisan make:resource PortfolioResource
php artisan make:resource ArticleResource
php artisan make:resource FaqResource
```

```php
<?php
// app/Http/Resources/TeamMemberResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'         => $this->slug,
            'name'         => $this->name,
            'job_title'    => $this->job_title,
            'bio'          => $this->bio,
            'photo'        => $this->photo,
            'email'        => $this->email,
            'social_links' => $this->social_links ?? [],
            'url'          => '/team/#' . $this->slug,   // หน้า Team เป็นหน้าเดียว ใช้ anchor
        ];
    }
}
```

```php
<?php
// app/Http/Resources/FaqResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'question' => $this->question,
            'answer'   => $this->answer,
        ];
    }
}
```

```php
<?php
// app/Http/Resources/ServiceResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'              => $this->slug,
            'name'              => $this->name,
            'short_description' => $this->short_description,
            'description'       => $this->description,
            'price_from'        => $this->price_from !== null ? (float) $this->price_from : null,
            'price_currency'    => $this->price_currency,
            'duration_days'     => $this->duration_days,
            'icon'              => $this->icon,
            'url'               => '/services/' . $this->slug . '/',
            'published_at'      => $this->published_at?->toIso8601String(),
            'updated_at'        => $this->updated_at?->toIso8601String(),
            // ส่ง FAQ มาด้วยเฉพาะเมื่อ Controller eager-load มา (ใช้ใน Day 2)
            'faqs'              => FaqResource::collection($this->whenLoaded('faqs')),
        ];
    }
}
```

```php
<?php
// app/Http/Resources/PortfolioResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'         => $this->slug,
            'title'        => $this->title,
            'client_name'  => $this->client_name,
            'summary'      => $this->summary,
            'description'  => $this->description,
            'cover_image'  => $this->cover_image,
            'completed_at' => $this->completed_at?->toDateString(),
            'service'      => $this->whenLoaded('service', fn () => [
                'slug' => $this->service->slug,
                'name' => $this->service->name,
                'url'  => '/services/' . $this->service->slug . '/',
            ]),
            'url'          => '/portfolio/' . $this->slug . '/',
            'updated_at'   => $this->updated_at?->toIso8601String(),
        ];
    }
}
```

```php
<?php
// app/Http/Resources/ArticleResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'         => $this->slug,
            'title'        => $this->title,
            'excerpt'      => $this->excerpt,
            // body ส่งเฉพาะหน้า detail (list ไม่ต้องแบก HTML ทั้งบทความ)
            'body'         => $this->when($request->routeIs('articles.show'), $this->body),
            'cover_image'  => $this->cover_image,
            'author'       => new TeamMemberResource($this->whenLoaded('author')),
            'url'          => '/blog/' . $this->slug . '/',
            'published_at' => $this->published_at?->toIso8601String(),
            'updated_at'   => $this->updated_at?->toIso8601String(),
        ];
    }
}
```

### 3.7 Controllers และ Routes (API v1)

```php
<?php
// app/Http/Controllers/Api/V1/ServiceController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServiceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $services = Service::published()
            ->with('faqs')
            ->orderBy('sort_order')
            ->get();

        return ServiceResource::collection($services);
    }

    public function show(Service $service): ServiceResource
    {
        // Route model binding ด้วย slug (จาก getRouteKeyName) แต่ต้องกันไม่ให้ดึง draft ด้วย slug ตรง ๆ
        abort_unless($service->is_published, 404);

        return new ServiceResource($service->load('faqs'));
    }
}
```

```php
<?php
// app/Http/Controllers/Api/V1/PortfolioController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PortfolioController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $items = Portfolio::published()
            ->with('service')
            ->orderByDesc('completed_at')
            ->get();

        return PortfolioResource::collection($items);
    }

    public function show(Portfolio $portfolio): PortfolioResource
    {
        abort_unless($portfolio->is_published, 404);

        return new PortfolioResource($portfolio->load('service'));
    }
}
```

```php
<?php
// app/Http/Controllers/Api/V1/ArticleController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $articles = Article::published()
            ->with('author')
            ->orderByDesc('published_at')
            ->get();

        return ArticleResource::collection($articles);
    }

    public function show(Article $article): ArticleResource
    {
        abort_unless($article->is_published, 404);

        return new ArticleResource($article->load('author'));
    }
}
```

```php
<?php
// app/Http/Controllers/Api/V1/TeamMemberController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamMemberResource;
use App\Models\TeamMember;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeamMemberController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TeamMemberResource::collection(
            TeamMember::orderBy('sort_order')->get()
        );
    }
}
```

> 📁 ย้าย Controller ที่ `make:model --api` สร้างไว้ใน `app/Http/Controllers/` เข้าโฟลเดอร์ `Api/V1/` และแก้ `namespace` ให้ตรง (หรือลบทิ้งแล้วสร้างใหม่ด้วย `php artisan make:controller Api/V1/ServiceController --api --model=Service`)

```php
<?php
// routes/api.php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\PortfolioController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\TeamMemberController;
use Illuminate\Support\Facades\Route;

// ทุก endpoint ของเนื้อหาอยู่หลัง Sanctum: Astro ต้องส่ง Bearer Token ตอน build
Route::prefix('v1')
    ->middleware(['auth:sanctum', 'ability:content:read'])
    ->group(function () {
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

        Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
        Route::get('/portfolios/{portfolio}', [PortfolioController::class, 'show'])->name('portfolios.show');

        Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

        Route::get('/team', [TeamMemberController::class, 'index'])->name('team.index');
    });

// Health check ไม่ต้องใช้ token (ใช้ตรวจว่า API ขึ้นแล้วตอน deploy)
Route::get('/health', fn () => response()->json(['ok' => true, 'time' => now()->toIso8601String()]));
```

Middleware `ability:` ต้องลงทะเบียน alias ใน `bootstrap/app.php` (Laravel 11+ ไม่มี Kernel.php):

```php
<?php
// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            'ability'   => CheckForAnyAbility::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
```

### 3.8 ป้องกัน API ด้วย Laravel Sanctum และออก Token ให้ build process

Sanctum ถูกติดตั้งแล้วจาก `php artisan install:api` เหลือเพียงสามขั้น: (1) ใส่ trait `HasApiTokens` ใน User (2) สร้างคำสั่ง Artisan ออก Token (3) นำ Token ไปใส่ `.env` ของ Astro

```php
<?php
// app/Models/User.php (เฉพาะส่วนที่ต้องเพิ่ม)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // ... ส่วนที่เหลือคงเดิม
}
```

สร้างคำสั่ง Artisan สำหรับออก Token (ดีกว่าการเขียน route `/tokens/create` เพราะไม่ต้องเปิดช่องทางล็อกอินผ่าน API และรันได้จาก CI/เซิร์ฟเวอร์):

```bash
php artisan make:command IssueBuildToken
```

```php
<?php
// app/Console/Commands/IssueBuildToken.php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class IssueBuildToken extends Command
{
    protected $signature = 'geo:issue-build-token
                            {--email=astro-build@geniuscorp.example : อีเมลของผู้ใช้ที่จะออก token ให้}
                            {--name=astro-build : ชื่อ token}';

    protected $description = 'ออก Sanctum token แบบอ่านอย่างเดียว (content:read) สำหรับ Astro build process';

    public function handle(): int
    {
        $user = User::where('email', $this->option('email'))->first();

        if (! $user) {
            $this->error('ไม่พบผู้ใช้ ' . $this->option('email') . ' - รัน php artisan db:seed ก่อน');
            return self::FAILURE;
        }

        // ลบ token ชื่อเดิมทิ้ง เพื่อให้มี token ชื่อนี้เพียงตัวเดียว (หมุนเวียน token ได้ง่าย)
        $user->tokens()->where('name', $this->option('name'))->delete();

        // abilities จำกัดให้อ่านเนื้อหาได้อย่างเดียว ถึง token หลุดก็เขียนอะไรไม่ได้
        $token = $user->createToken($this->option('name'), ['content:read']);

        $this->info('สร้าง token สำเร็จ นำค่าด้านล่างไปใส่ใน .env ของโปรเจกต์ Astro (API_TOKEN=...)');
        $this->newLine();
        $this->line($token->plainTextToken);

        return self::SUCCESS;
    }
}
```

```bash
php artisan geo:issue-build-token
# ตัวอย่างผลลัพธ์: 1|AbCdEf...  (แสดงครั้งเดียว เก็บให้ดี)
```

> 🔐 **ข้อควรระวัง:** Token แสดงเป็น plain text เพียงครั้งเดียว Laravel เก็บเฉพาะ hash ในตาราง `personal_access_tokens` ห้าม commit Token ลง Git (ใส่ใน `.env` ซึ่งอยู่ใน `.gitignore` อยู่แล้ว) และห้ามใส่ในไฟล์ที่จะถูก build ออกไปฝั่ง client

---

### 🧪 Lab 3.1 - ทดสอบ API ด้วย Thunder Client / Postman

> **เป้าหมาย:** ยืนยันว่า API ส่งข้อมูลถูกต้อง, ไม่หลุด draft, และ Token ทำงาน

**ขั้นที่ 1 - รัน Laravel** (ถ้าใช้ Laragon ให้ตั้งชื่อโฟลเดอร์ `geniuscorp-api` ไว้ใน `C:\laragon\www` จะได้ `http://geniuscorp-api.test` อัตโนมัติ หรือใช้ `php artisan serve` ที่ `http://127.0.0.1:8000`)

**ขั้นที่ 2 - เรียกโดยไม่ใส่ Token** → ต้องได้ `401 Unauthenticated`

```http
GET http://geniuscorp-api.test/api/v1/services
Accept: application/json
```

**ขั้นที่ 3 - เรียกพร้อม Token** → ต้องได้ `200` และ JSON ที่มี 3 บริการ (ไม่มี `internal-draft-service`)

```http
GET http://geniuscorp-api.test/api/v1/services
Accept: application/json
Authorization: Bearer 1|AbCdEf...
```

```json
{
  "data": [
    {
      "slug": "web-development",
      "name": "รับพัฒนาเว็บไซต์องค์กร",
      "short_description": "พัฒนาเว็บไซต์องค์กรด้วย Astro และ Laravel ... เริ่มต้น 45,000 บาท ใช้เวลา 30 วัน",
      "price_from": 45000,
      "price_currency": "THB",
      "duration_days": 30,
      "url": "/services/web-development/",
      "published_at": "2026-03-05T20:30:00+07:00",
      "updated_at": "2026-09-05T20:30:00+07:00",
      "faqs": [
        { "question": "บริการพัฒนาเว็บไซต์องค์กรเหมาะกับใคร", "answer": "..." }
      ]
    }
  ]
}
```

**ขั้นที่ 4 - ทดสอบ 404 ของ draft:** `GET /api/v1/services/internal-draft-service` ต้องได้ `404` แม้มี Token

**ขั้นที่ 5 - ทดสอบ endpoint อื่น:** `/api/v1/articles` (มี `author` ซ้อนอยู่), `/api/v1/articles/geo-vs-seo-2026` (มี `body`), `/api/v1/portfolios`, `/api/v1/team`

> ⛔ **ถ้าได้ 401 ทั้งที่ใส่ Token:** ตรวจว่า header เป็น `Authorization: Bearer <token>` (มีช่องว่างหลัง Bearer), มี `Accept: application/json` (ถ้าไม่มี Laravel อาจ redirect ไปหน้า login แทน), และ Token ยังไม่ถูกลบจากการรันคำสั่ง issue ซ้ำ
> ⛔ **ถ้าได้ 403:** Token ไม่มี ability `content:read` ให้ออกใหม่ด้วยคำสั่ง `geo:issue-build-token`

---

## 📚 Module 4: Astro Fundamentals for SSG

### เวลา 22:35-23:05 น.

> 💡 **หัวใจของ Module นี้:** Astro คือ framework ที่ "ส่ง HTML ไม่ส่ง JavaScript" โดยค่าเริ่มต้น โค้ดใน `.astro` ทำงาน **ตอน build เท่านั้น** ไม่มีอะไรรันในเบราว์เซอร์ ยกเว้นเราสั่งเอง (Islands) ผลคือ HTML ที่เบาที่สุดและ AI อ่านได้ครบที่สุด และเป็นเหตุผลที่เราเลือก Astro แทน Next.js หรือ Nuxt สำหรับเว็บองค์กร

---

### 4.1 สร้างโปรเจกต์ Astro 6

```bash
# สร้างโปรเจกต์ใหม่ (template minimal = ไม่มีอะไรมาให้เกิน เราจะเขียนเอง)
npm create astro@latest geniuscorp-web -- --template minimal --typescript strict --install --no-git

cd geniuscorp-web
npm run dev
# เปิด http://localhost:4321 เห็นหน้า "Astro"
```

โครงสร้างโปรเจกต์ที่ได้และที่เราจะเพิ่มในวันนี้:

```
geniuscorp-web/
├── astro.config.mjs            ← ตั้งค่า site, env schema (สำคัญกับ Canonical/Sitemap)
├── package.json
├── tsconfig.json
├── .env                        ← API_URL + API_TOKEN (ห้าม commit)
├── public/                     ← ไฟล์ที่คัดลอกไปตรง ๆ: favicon, robots.txt (Day 4), รูปภาพ
│   └── images/
├── src/
│   ├── lib/
│   │   ├── api.ts              ← ฟังก์ชันดึงข้อมูลจาก Laravel API (ใช้ตอน build)
│   │   └── types.ts            ← TypeScript types ของข้อมูลจาก API
│   ├── layouts/
│   │   └── BaseLayout.astro    ← โครง HTML หลัก <head> + Header + Footer
│   ├── components/
│   │   ├── Header.astro
│   │   ├── Footer.astro
│   │   ├── ServiceCard.astro
│   │   ├── ArticleCard.astro
│   │   └── PortfolioCard.astro
│   ├── styles/
│   │   └── global.css          ← CSS พื้นฐาน (มีใน Starter Code)
│   └── pages/                  ← ทุกไฟล์ในนี้ = 1 หน้าเว็บ (file-based routing)
│       ├── index.astro         ← /
│       ├── about.astro         ← /about/
│       ├── contact.astro       ← /contact/
│       ├── team.astro          ← /team/
│       ├── services/
│       │   ├── index.astro     ← /services/
│       │   └── [slug].astro    ← /services/web-development/ (Dynamic Route)
│       ├── portfolio/
│       │   ├── index.astro     ← /portfolio/
│       │   └── [slug].astro
│       └── blog/
│           ├── index.astro     ← /blog/
│           └── [slug].astro    ← /blog/geo-vs-seo-2026/
└── dist/                       ← ผลลัพธ์ของ astro build (นำขึ้นเซิร์ฟเวอร์)
```

### 4.2 ตั้งค่า astro.config.mjs และ Environment Variables แบบ type-safe

```js
// astro.config.mjs
import { defineConfig, envField } from 'astro/config'

export default defineConfig({
  // site จำเป็นสำหรับ Canonical, Open Graph และ Sitemap (Day 2, Day 4)
  site: 'https://www.geniuscorp.example',

  // ให้ทุก URL ลงท้ายด้วย / เสมอ (ตรงกับ url ที่ API ส่งมา และกัน duplicate /about กับ /about/)
  trailingSlash: 'always',

  // ค่าเริ่มต้นของ Astro คือ static อยู่แล้ว ระบุไว้ให้ชัดว่านี่คือ SSG
  output: 'static',

  build: {
    // สร้างเป็น /about/index.html (Apache/Nginx เสิร์ฟได้โดยไม่ต้องตั้ง rewrite)
    format: 'directory',
  },

  env: {
    schema: {
      // URL ของ Laravel API: อ่านได้ตอน build เท่านั้น (context: server) ไม่ถูกฝังไป client
      API_URL: envField.string({ context: 'server', access: 'public' }),
      // Token: เป็น secret ไม่ถูก bundle และไม่โผล่ใน dist/ แน่นอน
      API_TOKEN: envField.string({ context: 'server', access: 'secret' }),
    },
    // ตรวจว่า secret ครบตั้งแต่เริ่ม build ไม่ใช่พังกลางทาง
    validateSecrets: true,
  },
})
```

```dotenv
# .env  (อยู่ใน .gitignore แล้วโดยค่าเริ่มต้นของ template)
API_URL=http://geniuscorp-api.test/api/v1
API_TOKEN=1|AbCdEf...   # ค่าจาก php artisan geo:issue-build-token
```

> 📌 **ทำไมใช้ `astro:env` แทน `import.meta.env.XXX` ตรง ๆ:** `astro:env` ตรวจชนิดข้อมูลและความครบถ้วนตอน build, แยกชัดว่าอะไรเป็น secret และป้องกันการเผลอใช้ secret ในโค้ดฝั่ง client (จะ error ทันที) ซึ่งสำคัญมากเมื่อสิ่งที่เราเก็บคือ API Token

### 4.3 ไฟล์ .astro, Layouts และ Components - แนวคิด Zero-JS by Default

ไฟล์ `.astro` มีสองส่วน: **frontmatter** (ระหว่าง `---`) เป็น TypeScript ที่รันตอน build และ **template** เป็น HTML ที่ใช้ตัวแปรจาก frontmatter ได้แบบ JSX

```astro
---
// src/layouts/BaseLayout.astro
// Layout หลักของทุกหน้า: วันนี้ใส่ <head> แบบพื้นฐานก่อน พรุ่งนี้จะแทนที่ด้วย <SeoHead /> + <JsonLd />
import Header from '../components/Header.astro'
import Footer from '../components/Footer.astro'
import '../styles/global.css'

interface Props {
  title: string
  description: string
}

const { title, description } = Astro.props
const siteName = 'GeniusCorp'
---

<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{title} | {siteName}</title>
    <meta name="description" content={description} />
    <link rel="icon" href="/favicon.svg" type="image/svg+xml" />
  </head>
  <body>
    <Header />
    <main>
      <slot />
    </main>
    <Footer />
  </body>
</html>
```

```astro
---
// src/components/Header.astro
const nav = [
  { href: '/', label: 'หน้าแรก' },
  { href: '/about/', label: 'เกี่ยวกับเรา' },
  { href: '/services/', label: 'บริการ' },
  { href: '/portfolio/', label: 'ผลงาน' },
  { href: '/blog/', label: 'บทความ' },
  { href: '/team/', label: 'ทีมงาน' },
  { href: '/contact/', label: 'ติดต่อเรา' },
]

// ไฮไลต์เมนูปัจจุบันตอน build (ไม่ต้องใช้ JS ฝั่ง client)
const currentPath = Astro.url.pathname
---

<header class="site-header">
  <a href="/" class="brand" aria-label="GeniusCorp หน้าแรก">GeniusCorp</a>
  <nav aria-label="เมนูหลัก">
    <ul>
      {nav.map((item) => (
        <li>
          <a
            href={item.href}
            aria-current={currentPath === item.href ? 'page' : undefined}
          >
            {item.label}
          </a>
        </li>
      ))}
    </ul>
  </nav>
</header>
```

```astro
---
// src/components/Footer.astro
const year = new Date().getFullYear()
---

<footer class="site-footer">
  <p>© {year} GeniusCorp Co., Ltd. · โทร 02-000-0000 · hello@geniuscorp.example</p>
</footer>
```

> ✅ **สังเกตว่าไม่มี `<script>` เลย** ทั้งการวน loop เมนู การคำนวณปี และการไฮไลต์เมนูปัจจุบัน ล้วนเกิดตอน build แล้วกลายเป็น HTML ธรรมดา นี่คือ **Zero-JS by Default** เมื่อไหร่ที่ต้องการ interactivity จริง ๆ (เช่น ฟอร์มติดต่อ, carousel) จึงค่อยใช้ **Islands** โดยเพิ่ม `client:load` / `client:visible` ให้ component นั้นเพียงตัวเดียว หน้าที่เหลือยังเป็น HTML ล้วน

### 4.4 ดึงข้อมูลจาก Laravel API ตอน build time

```ts
// src/lib/types.ts
// ชนิดข้อมูลตรงกับ API Resource ฝั่ง Laravel ทุกฟิลด์

export interface TeamMember {
  slug: string
  name: string
  job_title: string
  bio: string | null
  photo: string | null
  email: string | null
  social_links: string[]
  url: string
}

export interface Faq {
  question: string
  answer: string
}

export interface Service {
  slug: string
  name: string
  short_description: string
  description: string
  price_from: number | null
  price_currency: string
  duration_days: number | null
  icon: string | null
  url: string
  published_at: string | null
  updated_at: string | null
  faqs?: Faq[]
}

export interface Portfolio {
  slug: string
  title: string
  client_name: string | null
  summary: string
  description: string | null
  cover_image: string | null
  completed_at: string | null
  service?: { slug: string, name: string, url: string }
  url: string
  updated_at: string | null
}

export interface Article {
  slug: string
  title: string
  excerpt: string
  body?: string
  cover_image: string | null
  author: TeamMember
  url: string
  published_at: string | null
  updated_at: string | null
}
```

```ts
// src/lib/api.ts
// ฟังก์ชันดึงข้อมูลทั้งหมด: รันเฉพาะตอน build (server context) เพราะ import จาก astro:env/server
import { API_URL, API_TOKEN } from 'astro:env/server'
import type { Article, Portfolio, Service, TeamMember } from './types'

interface ApiEnvelope<T> {
  data: T
}

async function apiGet<T>(path: string): Promise<T> {
  const url = `${API_URL}${path}`
  const res = await fetch(url, {
    headers: {
      Accept: 'application/json',
      Authorization: `Bearer ${API_TOKEN}`,
    },
  })

  if (!res.ok) {
    // ทำให้ build ล้มเหลวทันทีพร้อมบอกว่า endpoint ไหนพัง ดีกว่าได้เว็บที่หน้าว่าง
    throw new Error(`API ${res.status} ${res.statusText} at ${url}`)
  }

  const json = (await res.json()) as ApiEnvelope<T>
  return json.data
}

export const getServices = () => apiGet<Service[]>('/services')
export const getService = (slug: string) => apiGet<Service>(`/services/${slug}`)

export const getPortfolios = () => apiGet<Portfolio[]>('/portfolios')
export const getPortfolio = (slug: string) => apiGet<Portfolio>(`/portfolios/${slug}`)

export const getArticles = () => apiGet<Article[]>('/articles')
export const getArticle = (slug: string) => apiGet<Article>(`/articles/${slug}`)

export const getTeam = () => apiGet<TeamMember[]>('/team')
```

หน้ารวมบริการ - เรียก API ใน frontmatter แล้ว map เป็น HTML:

```astro
---
// src/pages/services/index.astro
import BaseLayout from '../../layouts/BaseLayout.astro'
import ServiceCard from '../../components/ServiceCard.astro'
import { getServices } from '../../lib/api'

const services = await getServices()
---

<BaseLayout
  title="บริการของเรา"
  description="บริการพัฒนาเว็บไซต์องค์กร โมบายแอป และที่ปรึกษา GEO/AEO/AIO จาก GeniusCorp พร้อมราคาเริ่มต้นและระยะเวลาดำเนินการ"
>
  <section class="container">
    <h1>บริการของเรา</h1>
    <p class="lead">
      เราให้บริการ {services.length} ด้านหลัก ครอบคลุมตั้งแต่การพัฒนาเว็บไซต์องค์กร
      โมบายแอปพลิเคชัน จนถึงการทำให้เว็บถูกอ้างอิงโดย AI Search
    </p>

    <div class="grid">
      {services.map((service) => <ServiceCard service={service} />)}
    </div>
  </section>
</BaseLayout>
```

```astro
---
// src/components/ServiceCard.astro
import type { Service } from '../lib/types'

interface Props {
  service: Service
}

const { service } = Astro.props
const price = service.price_from
  ? new Intl.NumberFormat('th-TH').format(service.price_from)
  : null
---

<article class="card">
  {/* การ์ดใช้ h3 (ไม่ใช่ h2) เพราะ h2 สงวนไว้ให้หัวข้อหลักของหน้า - บทเรียนจาก Audit */}
  <h3><a href={service.url}>{service.name}</a></h3>
  <p>{service.short_description}</p>
  <dl class="meta">
    {price && (
      <>
        <dt>เริ่มต้น</dt>
        <dd>{price} บาท</dd>
      </>
    )}
    {service.duration_days && (
      <>
        <dt>ระยะเวลา</dt>
        <dd>{service.duration_days} วัน</dd>
      </>
    )}
  </dl>
  <a href={service.url} class="btn">ดูรายละเอียด</a>
</article>
```

> 🧪 **ทดสอบ:** `npm run dev` แล้วเปิด http://localhost:4321/services/ ต้องเห็นบริการ 3 รายการจากฐานข้อมูลจริง · ลองแก้ `short_description` ใน DB แล้วรีเฟรช (dev mode เรียก API ใหม่ทุกครั้ง) · ถ้า error `API 401` ให้ตรวจ `.env` และรีสตาร์ท dev server (Astro อ่าน `.env` ตอนเริ่มเท่านั้น)

### 4.5 Dynamic Routes ด้วย getStaticPaths

หน้า `/services/web-development/`, `/services/mobile-app-development/` มาจากไฟล์เดียวคือ `src/pages/services/[slug].astro` โดย Astro จะถามเราตอน build ว่า "มี slug อะไรบ้าง" ผ่านฟังก์ชัน `getStaticPaths()` แล้วสร้าง HTML ให้ทุกค่า

```astro
---
// src/pages/services/[slug].astro
import BaseLayout from '../../layouts/BaseLayout.astro'
import { getServices } from '../../lib/api'
import type { Service } from '../../lib/types'

// รันครั้งเดียวตอน build: คืนรายการทุกหน้าที่ต้องสร้าง พร้อม props ของแต่ละหน้า
export async function getStaticPaths() {
  const services = await getServices()

  return services.map((service) => ({
    params: { slug: service.slug },   // → กลายเป็น URL /services/<slug>/
    props: { service },               // → ส่งข้อมูลทั้งก้อนไปให้หน้าเลย ไม่ต้องเรียก API ซ้ำ
  }))
}

interface Props {
  service: Service
}

const { service } = Astro.props
const price = service.price_from
  ? new Intl.NumberFormat('th-TH').format(service.price_from)
  : null
---

<BaseLayout title={service.name} description={service.short_description}>
  <article class="container">
    <nav aria-label="breadcrumb" class="breadcrumb">
      <a href="/">หน้าแรก</a> › <a href="/services/">บริการ</a> › <span>{service.name}</span>
    </nav>

    <h1>{service.name}</h1>
    <p class="lead">{service.short_description}</p>

    <dl class="facts">
      {price && (
        <>
          <dt>ราคาเริ่มต้น</dt>
          <dd>{price} {service.price_currency}</dd>
        </>
      )}
      {service.duration_days && (
        <>
          <dt>ระยะเวลาดำเนินการ</dt>
          <dd>{service.duration_days} วัน</dd>
        </>
      )}
    </dl>

    {/* description เป็น HTML จากฐานข้อมูล: ใช้ set:html (เชื่อถือได้เพราะมาจาก Admin ของเราเอง) */}
    <div class="prose" set:html={service.description} />

    {/* วันพรุ่งนี้: <FaqSection faqs={service.faqs} /> + FAQPage Schema */}
  </article>
</BaseLayout>
```

> ⚠️ **Astro 6 กับ `getStaticPaths()`:** ภายในฟังก์ชันนี้ **ใช้ `Astro.site` ไม่ได้อีกต่อไป** ให้ใช้ `import.meta.env.SITE` แทน (ค่าเดียวกับ `site` ใน config) และ `Astro.generator` ถูกถอดออกจาก scope นี้ด้วย ส่วนใน template ปกติยังใช้ `Astro.site`, `Astro.url` ได้ตามเดิม

> 📌 **`set:html` กับความปลอดภัย:** ใช้กับ HTML ที่เราควบคุมแหล่งที่มาเท่านั้น (จาก Admin ของเรา) ถ้าเนื้อหามาจากผู้ใช้ทั่วไปต้อง sanitize ฝั่ง Laravel ก่อนเก็บลง DB

### 4.6 ผลลัพธ์ของ astro build

```bash
npm run build
```

```
dist/
├── index.html
├── about/index.html
├── contact/index.html
├── team/index.html
├── services/
│   ├── index.html
│   ├── web-development/index.html
│   ├── mobile-app-development/index.html
│   └── geo-aeo-consulting/index.html
├── portfolio/...
├── blog/...
├── _astro/            ← CSS ที่ถูก bundle (ไม่มี JS ถ้าเราไม่ได้ใช้ Islands)
└── favicon.svg
```

เปิด `dist/services/web-development/index.html` ด้วย text editor จะเห็น **HTML สมบูรณ์พร้อมเนื้อหาจากฐานข้อมูล** - นี่คือสิ่งที่ AI crawlers จะเห็นเป๊ะ ๆ และคือไฟล์ที่เราจะ rsync ขึ้น Apache ใน Day 4 โดยไม่ต้องมี Node.js บนเซิร์ฟเวอร์

```bash
# ดูตัวอย่างผลลัพธ์แบบ production ในเครื่อง
npm run preview
```

> ⛔ **ถ้า build ล้มเหลวด้วย `API_TOKEN is missing`:** `validateSecrets: true` ทำงานถูกต้องแล้ว ให้ตรวจ `.env` · **ถ้า `API 401`:** Token ไม่ถูกต้องหรือถูกลบไปแล้ว · **ถ้า `fetch failed / ECONNREFUSED`:** Laravel ไม่ได้รันอยู่ หรือ `API_URL` ผิด (บน Laragon ตรวจว่า `geniuscorp-api.test` resolve ได้ ถ้าไม่ได้ให้ใช้ `http://127.0.0.1:8000/api/v1` กับ `php artisan serve`)

---

## 🛠️ Workshop Day 1 - GeniusCorp Modern: ประกอบเว็บครบเมนูหลักจากข้อมูลจริง

### เวลา 23:05-23:30 น. (ส่วนที่ทำไม่ทันในคลาส ให้ทำต่อเป็นการบ้านก่อน Day 2)

> **โจทย์:** ทำให้เว็บ GeniusCorp Modern มีครบทุกเมนูมาตรฐานเว็บองค์กร ได้แก่ หน้าแรก, เกี่ยวกับเรา, บริการ (รวม + รายละเอียด), ผลงาน (รวม + รายละเอียด), บทความ (รวม + รายละเอียด), ทีมงาน และติดต่อเรา โดยทุกหน้าที่มีข้อมูลต้องดึงจาก Laravel API ตอน build และ `npm run build` ต้องผ่านโดยไม่มี error

### ขั้นที่ 1 - หน้าแรก (index.astro): รวมข้อมูลจากหลาย endpoint

```astro
---
// src/pages/index.astro
import BaseLayout from '../layouts/BaseLayout.astro'
import ServiceCard from '../components/ServiceCard.astro'
import ArticleCard from '../components/ArticleCard.astro'
import { getServices, getArticles, getPortfolios } from '../lib/api'

// ดึงพร้อมกันเพื่อให้ build เร็ว (ไม่ต้องรอทีละตัว)
const [services, articles, portfolios] = await Promise.all([
  getServices(),
  getArticles(),
  getPortfolios(),
])

const latestArticles = articles.slice(0, 3)
---

<BaseLayout
  title="บริษัทพัฒนาซอฟต์แวร์และเว็บไซต์องค์กรที่ AI ค้นเจอ"
  description="GeniusCorp รับพัฒนาเว็บไซต์องค์กร โมบายแอป และให้คำปรึกษา GEO/AEO/AIO ส่งมอบแล้วมากกว่า 40 โปรเจกต์ ทีมประสบการณ์ 15 ปี"
>
  <section class="hero container">
    {/* หน้าแรกต้องมี H1 เดียว - บทเรียนจาก Audit ที่หน้าแรกไม่มี H1 เลย */}
    <h1>พัฒนาเว็บไซต์และซอฟต์แวร์องค์กรที่ทั้งคนและ AI ค้นเจอ</h1>
    <p class="lead">
      ส่งมอบแล้วมากกว่า 40 โปรเจกต์ ด้วยสถาปัตยกรรมสมัยใหม่ที่โหลดเร็วกว่า 0.8 วินาที
      และพร้อมสำหรับ AI Search ตั้งแต่วันแรก
    </p>
    <a href="/contact/" class="btn btn-primary">ปรึกษาฟรี</a>
  </section>

  <section class="container">
    <h2>บริการของเรา</h2>
    <div class="grid">
      {services.map((service) => <ServiceCard service={service} />)}
    </div>
  </section>

  <section class="container">
    <h2>ผลงานล่าสุด</h2>
    <ul class="list">
      {portfolios.map((item) => (
        <li>
          <a href={item.url}>{item.title}</a>
          {item.client_name && <span> · {item.client_name}</span>}
        </li>
      ))}
    </ul>
  </section>

  <section class="container">
    <h2>บทความล่าสุด</h2>
    <div class="grid">
      {latestArticles.map((article) => <ArticleCard article={article} />)}
    </div>
  </section>
</BaseLayout>
```

### ขั้นที่ 2 - ArticleCard และหน้ารวมบทความ

```astro
---
// src/components/ArticleCard.astro
import type { Article } from '../lib/types'

interface Props {
  article: Article
}

const { article } = Astro.props

// แสดงวันที่แบบไทย และเก็บ ISO ไว้ใน datetime (machine-readable → E-E-A-T, Day 4)
const published = article.published_at ? new Date(article.published_at) : null
const publishedText = published
  ? published.toLocaleDateString('th-TH', { year: 'numeric', month: 'long', day: 'numeric' })
  : ''
---

<article class="card">
  <h3><a href={article.url}>{article.title}</a></h3>
  <p>{article.excerpt}</p>
  <p class="meta">
    โดย {article.author.name}
    {published && (
      <>
        {' · '}
        <time datetime={article.published_at ?? undefined}>{publishedText}</time>
      </>
    )}
  </p>
</article>
```

```astro
---
// src/pages/blog/index.astro
import BaseLayout from '../../layouts/BaseLayout.astro'
import ArticleCard from '../../components/ArticleCard.astro'
import { getArticles } from '../../lib/api'

const articles = await getArticles()
---

<BaseLayout
  title="บทความและข่าวสาร"
  description="บทความเทคนิคด้านการพัฒนาเว็บ โมบายแอป และ GEO/AEO/AIO จากทีม GeniusCorp อัปเดตทุกสัปดาห์"
>
  <section class="container">
    <h1>บทความและข่าวสาร</h1>
    <div class="grid">
      {articles.map((article) => <ArticleCard article={article} />)}
    </div>
  </section>
</BaseLayout>
```

### ขั้นที่ 3 - หน้ารายละเอียดบทความ (blog/[slug].astro)

หน้านี้ต่างจากบริการตรงที่ list endpoint **ไม่ส่ง `body`** มา (เพื่อไม่ให้ payload ใหญ่) เราจึงเรียก `getArticle(slug)` รายตัวใน `getStaticPaths` แทน

```astro
---
// src/pages/blog/[slug].astro
import BaseLayout from '../../layouts/BaseLayout.astro'
import { getArticles, getArticle } from '../../lib/api'
import type { Article } from '../../lib/types'

export async function getStaticPaths() {
  const list = await getArticles()

  // ดึงฉบับเต็ม (มี body) ของทุกบทความพร้อมกัน
  const articles = await Promise.all(list.map((a) => getArticle(a.slug)))

  return articles.map((article) => ({
    params: { slug: article.slug },
    props: { article },
  }))
}

interface Props {
  article: Article
}

const { article } = Astro.props
const published = article.published_at ? new Date(article.published_at) : null
const updated = article.updated_at ? new Date(article.updated_at) : null
const fmt = (d: Date) =>
  d.toLocaleDateString('th-TH', { year: 'numeric', month: 'long', day: 'numeric' })
---

<BaseLayout title={article.title} description={article.excerpt}>
  <article class="container prose">
    <nav aria-label="breadcrumb" class="breadcrumb">
      <a href="/">หน้าแรก</a> › <a href="/blog/">บทความ</a> › <span>{article.title}</span>
    </nav>

    <h1>{article.title}</h1>

    <p class="meta">
      โดย <a href={article.author.url}>{article.author.name}</a>, {article.author.job_title}
      {published && (
        <>
          {' · เผยแพร่ '}
          <time datetime={article.published_at ?? undefined}>{fmt(published)}</time>
        </>
      )}
      {updated && published && updated > published && (
        <>
          {' · แก้ไขล่าสุด '}
          <time datetime={article.updated_at ?? undefined}>{fmt(updated)}</time>
        </>
      )}
    </p>

    {article.cover_image && (
      <img src={article.cover_image} alt={article.title} loading="lazy" width="1200" height="630" />
    )}

    {/* ย่อหน้าแรกคือ excerpt: ตอบคำถามหลักก่อน (Inverted Pyramid) */}
    <p class="lead">{article.excerpt}</p>

    <div set:html={article.body} />
  </article>
</BaseLayout>
```

### ขั้นที่ 4 - หน้าผลงาน (portfolio/index.astro และ [slug].astro)

```astro
---
// src/pages/portfolio/index.astro
import BaseLayout from '../../layouts/BaseLayout.astro'
import { getPortfolios } from '../../lib/api'

const portfolios = await getPortfolios()
---

<BaseLayout
  title="ผลงานและลูกค้าของเรา"
  description="ตัวอย่างโปรเจกต์ที่ GeniusCorp ส่งมอบให้ลูกค้าองค์กร พร้อมผลลัพธ์ที่วัดได้จริง"
>
  <section class="container">
    <h1>ผลงานและลูกค้าของเรา</h1>
    <div class="grid">
      {portfolios.map((item) => (
        <article class="card">
          {item.cover_image && (
            <img src={item.cover_image} alt={item.title} loading="lazy" width="800" height="450" />
          )}
          <h3><a href={item.url}>{item.title}</a></h3>
          {item.client_name && <p class="meta">ลูกค้า: {item.client_name}</p>}
          <p>{item.summary}</p>
          {item.service && (
            <p class="meta">บริการ: <a href={item.service.url}>{item.service.name}</a></p>
          )}
        </article>
      ))}
    </div>
  </section>
</BaseLayout>
```

```astro
---
// src/pages/portfolio/[slug].astro
import BaseLayout from '../../layouts/BaseLayout.astro'
import { getPortfolios } from '../../lib/api'
import type { Portfolio } from '../../lib/types'

export async function getStaticPaths() {
  const portfolios = await getPortfolios()
  return portfolios.map((item) => ({
    params: { slug: item.slug },
    props: { item },
  }))
}

interface Props {
  item: Portfolio
}

const { item } = Astro.props
---

<BaseLayout title={item.title} description={item.summary}>
  <article class="container prose">
    <nav aria-label="breadcrumb" class="breadcrumb">
      <a href="/">หน้าแรก</a> › <a href="/portfolio/">ผลงาน</a> › <span>{item.title}</span>
    </nav>
    <h1>{item.title}</h1>
    {item.client_name && <p class="meta">ลูกค้า: {item.client_name}</p>}
    {item.completed_at && <p class="meta">ส่งมอบเมื่อ <time datetime={item.completed_at}>{item.completed_at}</time></p>}
    <p class="lead">{item.summary}</p>
    {item.description && <div set:html={item.description} />}
  </article>
</BaseLayout>
```

### ขั้นที่ 5 - หน้าทีมงาน, เกี่ยวกับเรา และติดต่อเรา

```astro
---
// src/pages/team.astro
import BaseLayout from '../layouts/BaseLayout.astro'
import { getTeam } from '../lib/api'

const team = await getTeam()
---

<BaseLayout
  title="ทีมงานของเรา"
  description="ทำความรู้จักทีมผู้บริหารและนักพัฒนาของ GeniusCorp ประสบการณ์รวมกว่า 40 ปีในการพัฒนาซอฟต์แวร์องค์กร"
>
  <section class="container">
    <h1>ทีมงานของเรา</h1>
    <div class="grid">
      {team.map((member) => (
        // id = slug เพื่อให้ลิงก์ /team/#somchai-techlead จาก Author Box กระโดดมาถูกคน
        <article class="card" id={member.slug}>
          {member.photo && (
            <img src={member.photo} alt={member.name} loading="lazy" width="320" height="320" />
          )}
          <h3>{member.name}</h3>
          <p class="meta">{member.job_title}</p>
          {member.bio && <p>{member.bio}</p>}
          {member.social_links.length > 0 && (
            <ul class="social">
              {member.social_links.map((link) => (
                <li><a href={link} rel="me noopener" target="_blank">{new URL(link).hostname}</a></li>
              ))}
            </ul>
          )}
        </article>
      ))}
    </div>
  </section>
</BaseLayout>
```

```astro
---
// src/pages/about.astro
import BaseLayout from '../layouts/BaseLayout.astro'
---

<BaseLayout
  title="เกี่ยวกับเรา"
  description="GeniusCorp ก่อตั้งปี 2554 พัฒนาซอฟต์แวร์ให้ลูกค้าองค์กรมากกว่า 40 โปรเจกต์ ด้วยทีม 25 คน สำนักงานอยู่ที่กรุงเทพมหานคร"
>
  <section class="container prose">
    <h1>เกี่ยวกับ GeniusCorp</h1>
    {/* ย่อหน้าแรกตอบคำถาม "บริษัทนี้คือใคร ทำอะไร ใหญ่แค่ไหน" ให้จบใน 2-3 ประโยค */}
    <p class="lead">
      GeniusCorp คือบริษัทพัฒนาซอฟต์แวร์ในกรุงเทพมหานคร ก่อตั้งเมื่อปี 2554
      ให้บริการพัฒนาเว็บไซต์องค์กร โมบายแอปพลิเคชัน และที่ปรึกษา GEO/AEO/AIO
      ด้วยทีมงาน 25 คน และส่งมอบโปรเจกต์ให้ลูกค้าองค์กรแล้วมากกว่า 40 โปรเจกต์
    </p>
    <h2>เราทำอะไร</h2>
    <p>...</p>
    <h2>ทำไมลูกค้าเลือกเรา</h2>
    <ul>
      <li>เว็บที่เราส่งมอบโหลดเร็วเฉลี่ย 0.8 วินาที (วัดด้วย PageSpeed Insights)</li>
      <li>ทุกโปรเจกต์ติดตั้ง Structured Data และ llms.txt ตั้งแต่วันแรก</li>
      <li>รับประกัน 90 วันหลังส่งมอบ</li>
    </ul>
  </section>
</BaseLayout>
```

```astro
---
// src/pages/contact.astro
import BaseLayout from '../layouts/BaseLayout.astro'
---

<BaseLayout
  title="ติดต่อเรา"
  description="ติดต่อ GeniusCorp โทร 02-000-0000 อีเมล hello@geniuscorp.example หรือแวะสำนักงานที่กรุงเทพมหานคร เปิดจันทร์-ศุกร์ 9:00-18:00 น."
>
  <section class="container prose">
    <h1>ติดต่อเรา</h1>
    <address>
      <p><strong>GeniusCorp Co., Ltd.</strong></p>
      <p>123 ถนนสุขุมวิท แขวงคลองเตย เขตคลองเตย กรุงเทพมหานคร 10110</p>
      <p>โทร <a href="tel:+6620000000">02-000-0000</a> · อีเมล <a href="mailto:hello@geniuscorp.example">hello@geniuscorp.example</a></p>
      <p>เปิดทำการ จันทร์-ศุกร์ 9:00-18:00 น.</p>
    </address>
    {/* ฟอร์มติดต่อจริงจะเป็น Island (client:load) หรือส่งไป Laravel API - นอกขอบเขตคอร์ส */}
  </section>
</BaseLayout>
```

### ขั้นที่ 6 - Build และตรวจผลลัพธ์

```bash
npm run build
npm run preview
```

ตรวจให้ครบตาม Checklist นี้ (พร้อมนำไปใช้ต่อใน Day 2):

- [ ] `dist/` มีโฟลเดอร์ครบ: `services/<slug>/`, `blog/<slug>/`, `portfolio/<slug>/`, `team/`, `about/`, `contact/`
- [ ] เปิด `dist/blog/geo-vs-seo-2026/index.html` ด้วย editor เห็นเนื้อหาบทความและชื่อผู้เขียนใน HTML (ไม่ใช่ `<div id="app">` ว่าง ๆ)
- [ ] ทุกหน้ามี `<h1>` เพียงตัวเดียว (ค้นหา `<h1` ในไฟล์)
- [ ] ไม่มี `<script` ใน HTML ที่ build ออกมา (Zero-JS)
- [ ] draft (`internal-draft-service`) ไม่ปรากฏในเว็บ
- [ ] `npm run build` ใช้เวลากี่วินาที? จดไว้เปรียบเทียบเมื่อเพิ่ม Schema ใน Day 2

---

## 📁 โครงสร้างไฟล์สรุปวันที่ 1

```
geniuscorp-api/  (Laravel 13)
├── .env                                    ← DB_* + COMPANY_*
├── bootstrap/app.php                       ← alias middleware ability/abilities
├── routes/api.php                          ← /api/v1/* หลัง auth:sanctum + ability:content:read
├── app/
│   ├── Console/Commands/IssueBuildToken.php ← php artisan geo:issue-build-token
│   ├── Models/
│   │   ├── User.php                        ← + HasApiTokens
│   │   ├── TeamMember.php                  ← social_links (json) + articles()
│   │   ├── Service.php                     ← scopePublished + faqs() + slug binding
│   │   ├── Portfolio.php
│   │   ├── Article.php                     ← author() → TeamMember
│   │   └── Faq.php
│   ├── Http/Controllers/Api/V1/
│   │   ├── ServiceController.php
│   │   ├── PortfolioController.php
│   │   ├── ArticleController.php
│   │   └── TeamMemberController.php
│   └── Http/Resources/
│       ├── TeamMemberResource.php
│       ├── ServiceResource.php             ← faqs (whenLoaded), ISO dates, url
│       ├── PortfolioResource.php
│       ├── ArticleResource.php             ← body เฉพาะ show, author ซ้อน
│       └── FaqResource.php
└── database/
    ├── migrations/                         ← team_members, services, portfolios, articles, faqs
    └── seeders/                            ← ข้อมูลจำลอง GeniusCorp + Astro Build Bot user

geniuscorp-web/  (Astro 6)
├── astro.config.mjs                        ← site, trailingSlash, env schema (API_URL, API_TOKEN secret)
├── .env                                    ← API_URL + API_TOKEN
├── src/
│   ├── lib/api.ts                          ← apiGet + getServices/getArticles/... (astro:env/server)
│   ├── lib/types.ts
│   ├── layouts/BaseLayout.astro            ← <head> พื้นฐาน (พรุ่งนี้เปลี่ยนเป็น SeoHead + JsonLd)
│   ├── components/{Header,Footer,ServiceCard,ArticleCard}.astro
│   └── pages/
│       ├── index.astro, about.astro, contact.astro, team.astro
│       ├── services/{index,[slug]}.astro   ← getStaticPaths
│       ├── portfolio/{index,[slug]}.astro
│       └── blog/{index,[slug]}.astro       ← getArticle รายตัวเพื่อเอา body
└── dist/                                   ← Static HTML พร้อมขึ้น Apache/Nginx
```

---

## 📝 สรุปประจำวันที่ 1

| หัวข้อ                                | สิ่งที่ทำได้แล้ว                                                                                             |
| ------------------------------------- | ------------------------------------------------------------------------------------------------------------ |
| ★ Module 1 - GEO/AEO/AIO Mindset          | แยก SEO/AEO/GEO/AIO ได้, รู้จัก AI Crawlers ทุกตัวและผลของ robots.txt, จำตัวเลขจากงานวิจัย Princeton และเห็น Priority Roadmap จาก Audit จริง |
| Module 2 - Architecture               | อธิบายได้ว่าทำไม SSG ชนะในยุค AI Search, เข้าใจสถาปัตยกรรม Astro ↔ Laravel ↔ MySQL และตัดสินใจ WordPress vs Astro ได้ |
| ★ Module 3 - Laravel API              | ออกแบบตารางที่มี slug/published_at/updated_at/author_id, สร้าง Migration/Model/Seeder/Resource/Controller และ Sanctum Token แบบ read-only |
| Module 4 - Astro SSG                  | สร้างโปรเจกต์ Astro 6 พร้อม env แบบ type-safe, ดึง API ตอน build, Dynamic Routes ด้วย getStaticPaths และเข้าใจ Zero-JS |
| ★ Workshop Day 1                      | เว็บ GeniusCorp Modern ครบ 7 เมนูจากข้อมูลจริง และ `astro build` ได้ Static HTML ที่ AI อ่านได้ 100%          |

### ✅ ตรวจสอบความพร้อมก่อนวันพรุ่งนี้ (Day 2: GEO Core Engineering)

> ให้แน่ใจว่า:
>
> - `php artisan serve` (หรือ Laragon) รัน Laravel ได้ และ `GET /api/v1/services` พร้อม Token ได้ข้อมูลครบ 3 บริการพร้อม `faqs`
> - `npm run build` ผ่านโดยไม่มี error และ `dist/` มีทุกหน้า
> - เข้าใจว่า `published_at`, `updated_at`, `author` ที่ API ส่งมา จะกลายเป็น `datePublished`, `dateModified`, `author` ใน JSON-LD พรุ่งนี้
> - ทบทวน Priority Roadmap ในหัวข้อ 1.5 อีกครั้ง เพราะ Day 2 คือการทำข้อ 1, 2, 3, 5 บน Astro
> - (ถ้ามีเวลา) อ่านหน้า "Structured data general guidelines" ของ Google Search Central ล่วงหน้า

---

## 📖 แหล่งอ้างอิงประจำวันที่ 1

- Aggarwal et al. (2024). *GEO: Generative Engine Optimization*. KDD '24. https://arxiv.org/abs/2311.09735
- OpenAI - Overview of OpenAI crawlers (GPTBot, OAI-SearchBot, ChatGPT-User): https://platform.openai.com/docs/bots
- Anthropic - Does Anthropic crawl data from the web (ClaudeBot, Claude-SearchBot, Claude-User): https://support.anthropic.com
- Perplexity - PerplexityBot and Perplexity-User: https://docs.perplexity.ai/guides/bots
- Google Search Central - Google crawlers and Google-Extended: https://developers.google.com/search/docs/crawling-indexing/overview-google-crawlers
- Google Search Central - JavaScript SEO basics (Googlebot กับการเรนเดอร์ JS): https://developers.google.com/search/docs/crawling-indexing/javascript/javascript-seo-basics
- Astro Docs - Install and setup, Routing (getStaticPaths), Environment variables (astro:env), Upgrade to v6: https://docs.astro.build
- Laravel 13 Docs - Installation, Migrations, Eloquent, API Resources, Sanctum: https://laravel.com/docs/13.x
- Schema.org - Organization, Service, Article, Person, FAQPage: https://schema.org

---

**💡 คำคมประจำวัน:**

> "ในยุค AI Search อันดับไม่ใช่รางวัลอีกต่อไป การถูกอ้างอิงต่างหากที่ใช่ และ AI จะอ้างอิงได้ก็ต่อเมื่อ HTML ของเราพูดภาษาที่เครื่องเข้าใจ ตั้งแต่ตารางในฐานข้อมูลจนถึงแท็กสุดท้ายใน head"

---

_เอกสารจัดทำโดย: อาจารย์สามิตร โกยม | IT Genius Engineering Co., Ltd._
_หลักสูตร ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO/AIO) - วันที่ 1 จาก 4_
