# ทำเว็บให้ติดอันดับ AI Search 2026 - วันที่ 2: GEO Core Engineering - Structured Data & Technical SEO

**หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ: ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO Full Stack Modern Web)**
**วันที่ 2: ติดตั้ง "GEO Layer" ให้เว็บ Astro ครบทุกชั้น - Metadata, Canonical, JSON-LD, FAQ และ Validation**
วันที่: อาทิตย์ที่ 6 กันยายน 2569 | เวลา 20:30-23:30 น. | ออนไลน์ผ่าน Zoom (บันทึกวิดีโอย้อนหลัง)
ผู้สอน: อ.สามิตร โกยม

---

## 🎯 วัตถุประสงค์การเรียนรู้ประจำวัน

เมื่อจบการอบรมวันที่ 2 ผู้เรียนจะสามารถ:

1. เขียน Title (~50-60 ตัวอักษร) และ Meta Description (~150-160 ตัวอักษร) รายหน้าที่สรุปเนื้อหาจริง และรู้ว่าอะไรที่ **ต้องเลิกทำ** จากบทเรียน Audit
2. สร้าง **SeoHead Component** ใน Astro ที่จัดการ Title, Description, Canonical, Open Graph, Twitter Card และ hreflang ในที่เดียว โดยรับ props จากข้อมูลจริง
3. ใช้ Canonical Tag ป้องกัน Duplicate Content จาก query string และตัดสินใจเรื่อง hreflang ได้ถูกต้อง
4. จัด Heading Hierarchy ให้ AI อ่านรู้เรื่อง: H1 เดียวต่อหน้า, H2 เป็นหัวข้อหลักหรือรูปแบบคำถาม, การ์ดไม่ใช้ H2
5. สร้าง **JsonLd Component** และไลบรารี schema builders ครอบคลุม `Organization`/`LocalBusiness`, `WebSite` + `SearchAction`, `Service` + `Offer`, `Article`, `Person`, `BreadcrumbList` และ `FAQPage` จากข้อมูลในฐานข้อมูล
6. จัดการ escape อักขระภาษาไทยและอักขระอันตรายใน JSON-LD อย่างปลอดภัย
7. สร้างระบบ FAQ จาก MySQL → Laravel API → FaqSection บนหน้าบริการ พร้อม FAQPage Schema อัตโนมัติ และเขียน FAQ แบบ answer-ready
8. ตรวจ Structured Data ด้วย validator.schema.org และ Google Rich Results Test และทำให้ Validation เป็นส่วนหนึ่งของ workflow ก่อน Deploy (Workshop Day 2)

> **หมายเหตุ:** วันนี้ต่อยอดจากโปรเจกต์ `geniuscorp-api` และ `geniuscorp-web` ของ Day 1 โดยตรง ผู้ที่ทำ Workshop Day 1 ไม่ทัน ให้ใช้ Starter Code `geniuscorp-day2-start.zip` ที่ส่งในกลุ่มไลน์ ซึ่งคือผลลัพธ์สมบูรณ์ของ Day 1
>
> กติกาการเขียนโค้ด: **TypeScript / JavaScript ไม่ใส่ semicolon** ส่วน **PHP ใส่ semicolon ตามปกติ**

---

## 🧭 กำหนดการวันที่ 2 (โดยสังเขป)

| เวลา        | หัวข้อ                                                                                          |
| ----------- | ----------------------------------------------------------------------------------------------- |
| 20:30-20:40 | ทบทวน Day 1 + ตรวจว่า `npm run build` ผ่านทุกคน                                                  |
| 20:40-21:10 | **Module 1** Metadata ที่ถูกต้องในยุค AI Search + สร้าง `SeoHead` Component                       |
| 21:10-21:30 | **Module 2** Canonical, hreflang & Heading Hierarchy                                            |
| 21:30-22:30 | **Module 3** JSON-LD Structured Data - หัวใจของ GEO (JsonLd Component + Schema ทีละตัว)          |
| 22:30-23:00 | **Module 4** FAQ System + FAQPage Schema (MySQL → API → FaqSection)                             |
| 23:00-23:15 | **Module 5** Validation Workflow (validator.schema.org, Rich Results Test, สคริปต์ตรวจอัตโนมัติ) |
| 23:15-23:30 | **Workshop Day 2** ประกอบ GEO Layer เข้าทุกหน้า + Validate ผ่านทุกหน้า                            |

---

## ✅ ทบทวน Day 1 และตรวจความพร้อม

### เวลา 20:30-20:40 น.

รันสองคำสั่งนี้ก่อนเริ่ม:

```bash
# Terminal 1: Laravel API ต้องรันอยู่ตลอดคลาส
cd geniuscorp-api && php artisan serve

# Terminal 2: Astro
cd geniuscorp-web && npm run build
```

`npm run build` ต้องผ่านและ `dist/` มีครบทุกหน้า ถ้าไม่ผ่านให้แตกไฟล์ `geniuscorp-day2-start.zip` แล้วใส่ `.env` ของตัวเอง (API_URL, API_TOKEN) ก่อน

**สิ่งที่ต้องจำจาก Day 1 เพื่อใช้วันนี้:**

| แนวคิด                          | ใช้ทำอะไรวันนี้                                                                   |
| ------------------------------- | --------------------------------------------------------------------------------- |
| `published_at`, `updated_at` จาก API | กลายเป็น `datePublished` / `dateModified` ใน Article Schema และ `article:published_time` ใน OG |
| `author` (TeamMember) ใน Article | กลายเป็น `Article.author` → `Person` Schema พร้อม `jobTitle`, `sameAs`             |
| `price_from`, `duration_days`   | กลายเป็น `Offer.price` และตัวเลขใน FAQ ที่ AI ชอบดึง                                |
| `url` ที่ API ส่งมา (`/services/x/`) | ใช้ประกอบ Canonical URL และ `BreadcrumbList`                                       |
| `site` + `trailingSlash` ใน config | ใช้สร้าง absolute URL ให้ Canonical, OG และ Schema `@id`                            |

---

## 📚 Module 1: Metadata ที่ถูกต้องในยุค AI Search

### เวลา 20:40-21:10 น.

> 💡 **หัวใจของ Module นี้:** Title และ Meta Description คือ "บทคัดย่อ" ที่ทั้ง Google และ AI ใช้ตัดสินว่าหน้านี้เกี่ยวกับอะไร ก่อนจะอ่านเนื้อหาเต็ม Metadata ที่เป็น boilerplate หรือยัด keyword คือการโยนโอกาสแรกทิ้งไป และการมี Component เดียวจัดการทุกหน้าคือวิธีเดียวที่ทำให้มัน "ถูกต้องเสมอ" ไม่ใช่ถูกเฉพาะหน้าที่จำได้

---

### 1.1 กายวิภาคของ Title และ Meta Description ที่ดี

| องค์ประกอบ         | ความยาวแนะนำ                  | หลักการ                                                                                                         | ตัวอย่างที่ดี (GeniusCorp)                                                                                                  |
| ------------------ | ----------------------------- | --------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------- |
| `<title>`          | ~50-60 ตัวอักษร (Google ตัดที่ ~600px) | เนื้อหาหลักของหน้าขึ้นก่อน ตามด้วยชื่อแบรนด์ ไม่ซ้ำกันทั้งเว็บ ไม่ยัด keyword                                   | `รับพัฒนาเว็บไซต์องค์กร เริ่มต้น 45,000 บาท \| GeniusCorp`                                                                   |
| `meta description` | ~150-160 ตัวอักษร             | สรุปเนื้อหา **ของหน้านี้** เป็นประโยคที่มีตัวเลข/ข้อเท็จจริง อ่านแล้วรู้ว่าจะได้อะไร ไม่ใช่สโลแกนบริษัทซ้ำทุกหน้า | `พัฒนาเว็บไซต์องค์กรด้วย Astro และ Laravel โหลดเร็วกว่า 0.8 วินาที รองรับ AI Search ตั้งแต่วันแรก เริ่มต้น 45,000 บาท ใช้เวลา 30 วัน` |
| `og:title`         | สั้นกว่า title ได้ (ไม่ต้องมีแบรนด์) | ใช้ตอนแชร์ในโซเชียลและ AI บางตัวใช้เป็น headline                                                                 | `รับพัฒนาเว็บไซต์องค์กร เริ่มต้น 45,000 บาท`                                                                                  |
| `og:description`   | เท่า meta description         | ปกติใช้ค่าเดียวกัน                                                                                              |                                                                                                                             |
| `og:image`         | 1200×630 px, < 1MB, absolute URL | รูปที่แทนหน้านี้ (บทความใช้ cover, บริการใช้รูปบริการ, ที่เหลือใช้รูป default ของเว็บ)                              | `https://www.geniuscorp.example/images/og/web-development.jpg`                                                              |

> 📏 **ตัวอักษรไทยกว้างกว่าอังกฤษเล็กน้อย** และมีสระบน-ล่างที่ไม่นับความกว้าง ให้ยึด "พิกเซล" มากกว่าจำนวนตัวอักษร โดยทดสอบดูใน Google Search Console → Performance → คลิกดู snippet จริง หรือใช้ SERP preview tools

### 1.2 สิ่งที่ควรเลิกทำ - บทเรียนจาก Audit จริง

จากเว็บที่ Audit ใน Day 1 พบปัญหา Metadata ที่ "เคยเป็นเทคนิค SEO" เมื่อ 10 ปีก่อน แต่วันนี้เป็นผลลบ:

| สิ่งที่พบ                                              | ทำไมเป็นปัญหาในปี 2026                                                                                                    | แก้เป็น                                                              |
| ------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------- |
| Title หน้าแรกยาว ~440 ตัวอักษร ยัดชื่อคอร์ส 30 ชื่อ     | Google ตัดที่ ~60 ตัวอักษรอยู่ดี, AI อ่านแล้วสรุปไม่ได้ว่าหน้านี้คืออะไร, ดูเป็น spam                                    | Title เดียว ชัดเจน ~55 ตัวอักษร                                       |
| `<meta name="keywords">` ยัด 50 คำทุกหน้า              | Google ไม่ใช้มาตั้งแต่ปี 2009, Bing ถือเป็นสัญญาณ spam ได้, เพิ่มขนาด HTML เปล่า ๆ                                        | ลบทิ้งทั้งหมด                                                        |
| meta description เหมือนกันทุกบทความ (boilerplate สถาบัน) | AI/Google เห็นว่าทุกหน้า "เกี่ยวกับสิ่งเดียวกัน" ไม่มีเหตุผลจะอ้างอิงหน้าไหนเป็นพิเศษ                                       | สรุปจากเนื้อหาจริงของแต่ละหน้า (เราใช้ `excerpt`/`short_description` จาก DB) |
| ไม่มี `og:type=article` และ `article:published_time`    | AI ไม่รู้ว่านี่คือบทความ ไม่รู้ว่าสดหรือเก่า - "ความสด" เป็นปัจจัยที่ Perplexity ให้น้ำหนักสูง                             | ใส่ครบจาก `published_at`/`updated_at`                                |
| Title ไม่มีชื่อแบรนด์ หรือมีแบรนด์นำหน้าทุกหน้า          | แบรนด์นำหน้าทำให้ 60 ตัวอักษรแรกซ้ำกันทุกหน้า                                                                             | `<เนื้อหาหน้า> \| <แบรนด์>` ยกเว้นหน้าแรกที่ `<แบรนด์> - <สิ่งที่ทำ>`  |

### 1.3 Open Graph ครบชุดสำหรับบทความ

```html
<!-- สิ่งที่ SeoHead จะสร้างให้หน้าบทความ -->
<meta property="og:type" content="article" />
<meta property="og:title" content="GEO ต่างจาก SEO อย่างไร และเว็บองค์กรต้องปรับอะไรบ้างในปี 2026" />
<meta property="og:description" content="GEO คือการทำให้เว็บถูก AI อ้างอิง..." />
<meta property="og:url" content="https://www.geniuscorp.example/blog/geo-vs-seo-2026/" />
<meta property="og:image" content="https://www.geniuscorp.example/images/blog/geo-vs-seo.jpg" />
<meta property="og:site_name" content="GeniusCorp" />
<meta property="og:locale" content="th_TH" />
<meta property="article:published_time" content="2026-08-16T20:30:00+07:00" />
<meta property="article:modified_time" content="2026-09-01T10:15:00+07:00" />
<meta property="article:author" content="https://www.geniuscorp.example/team/#somchai-techlead" />
<meta property="article:section" content="บทความ" />
<meta name="twitter:card" content="summary_large_image" />
```

> 📌 `article:author` ตามสเปก Open Graph รับได้ทั้ง URL ของโปรไฟล์และชื่อ เราใช้ URL ไปยังหน้าทีมงาน เพื่อให้สอดคล้องกับ `Person.@id` ใน JSON-LD (Module 3) - ทุกสัญญาณชี้ไปที่ตัวตนเดียวกัน

### 1.4 สร้างไฟล์ค่ากลางของเว็บ (site.ts)

ก่อนสร้าง Component ให้รวม "ข้อมูลองค์กร" ไว้ที่เดียว เพราะจะถูกใช้ทั้งใน SeoHead, Organization Schema, Footer และ llms.txt (Day 4)

```ts
// src/lib/site.ts
// ค่ากลางของเว็บ: แก้ที่นี่ที่เดียว มีผลกับ Metadata, JSON-LD, Footer และ llms.txt

export const SITE = {
  name: 'GeniusCorp',
  legalName: 'GeniusCorp Co., Ltd.',
  url: 'https://www.geniuscorp.example',
  locale: 'th_TH',
  language: 'th',
  defaultTitle: 'GeniusCorp - บริษัทพัฒนาซอฟต์แวร์และเว็บไซต์องค์กรที่ AI ค้นเจอ',
  defaultDescription:
    'GeniusCorp รับพัฒนาเว็บไซต์องค์กร โมบายแอป และให้คำปรึกษา GEO/AEO ส่งมอบแล้วมากกว่า 40 โปรเจกต์ ทีมประสบการณ์ 15 ปี',
  defaultOgImage: '/images/og/default.jpg',
  logo: '/images/logo.png',
  foundingDate: '2011',
  telephone: '+66-2-000-0000',
  email: 'hello@geniuscorp.example',
  address: {
    streetAddress: '123 ถนนสุขุมวิท แขวงคลองเตย',
    addressLocality: 'เขตคลองเตย',
    addressRegion: 'กรุงเทพมหานคร',
    postalCode: '10110',
    addressCountry: 'TH',
  },
  geo: { latitude: 13.7222, longitude: 100.5850 },
  openingHours: 'Mo-Fr 09:00-18:00',
  sameAs: [
    'https://www.facebook.com/geniuscorp.example',
    'https://www.linkedin.com/company/geniuscorp-example',
    'https://github.com/geniuscorp-example',
  ],
} as const

// แปลง path จาก API (/services/x/) ให้เป็น absolute URL
export function absoluteUrl(path: string): string {
  return new URL(path, SITE.url).toString()
}
```

### 1.5 สร้าง SeoHead Component

```astro
---
// src/components/SeoHead.astro
// จุดเดียวจัดการ Metadata ของทุกหน้า รับ props จากข้อมูลจริง แล้วสร้าง title/description/canonical/OG/Twitter/hreflang
import { SITE, absoluteUrl } from '../lib/site'

export interface SeoProps {
  title: string                 // เนื้อหาหลักของหน้า (ไม่ต้องใส่ชื่อแบรนด์ component ต่อให้)
  description: string
  canonical?: string            // path หรือ absolute URL (ถ้าไม่ส่ง ใช้ Astro.url)
  ogImage?: string              // path หรือ absolute URL
  type?: 'website' | 'article'  // ค่าเริ่มต้น website
  publishedTime?: string | null // ISO 8601 (เฉพาะ article)
  modifiedTime?: string | null
  authorUrl?: string | null     // URL โปรไฟล์ผู้เขียน (เฉพาะ article)
  section?: string
  noindex?: boolean             // หน้าที่ไม่ต้องการให้ index เช่น thank-you
  isHome?: boolean              // หน้าแรกใช้ title รูปแบบต่างจากหน้าอื่น
  alternates?: { lang: string, href: string }[]  // hreflang (ถ้ามีหลายภาษา)
}

type Props = SeoProps

const {
  title,
  description,
  canonical,
  ogImage,
  type = 'website',
  publishedTime,
  modifiedTime,
  authorUrl,
  section,
  noindex = false,
  isHome = false,
  alternates = [],
} = Astro.props

// Title: หน้าแรกใช้ defaultTitle, หน้าอื่น "<เนื้อหา> | <แบรนด์>"
const fullTitle = isHome ? SITE.defaultTitle : `${title} | ${SITE.name}`

// Canonical: ตัด query string และ hash ทิ้งเสมอ (ป้องกัน duplicate จาก ?utm_source=...)
// Astro.url ตอน build คือ URL ของหน้าที่กำลังสร้าง (อิงจาก site + pathname)
const canonicalUrl = canonical
  ? absoluteUrl(canonical)
  : new URL(Astro.url.pathname, SITE.url).toString()

const ogImageUrl = absoluteUrl(ogImage ?? SITE.defaultOgImage)

// เตือนตอน build ถ้าความยาวเกินเกณฑ์ (ไม่ทำให้ build พัง แต่เห็นใน log)
if (fullTitle.length > 65) {
  console.warn(`[SeoHead] title ยาว ${fullTitle.length} ตัวอักษร: ${Astro.url.pathname}`)
}
if (description.length > 170 || description.length < 70) {
  console.warn(`[SeoHead] description ยาว ${description.length} ตัวอักษร: ${Astro.url.pathname}`)
}
---

<title>{fullTitle}</title>
<meta name="description" content={description} />
<link rel="canonical" href={canonicalUrl} />
{noindex && <meta name="robots" content="noindex, nofollow" />}

{/* hreflang: ใส่เฉพาะเมื่อมีหลายภาษาจริง (ดู Module 2.2) */}
{alternates.map((alt) => (
  <link rel="alternate" hreflang={alt.lang} href={absoluteUrl(alt.href)} />
))}

{/* Open Graph */}
<meta property="og:type" content={type} />
<meta property="og:title" content={title} />
<meta property="og:description" content={description} />
<meta property="og:url" content={canonicalUrl} />
<meta property="og:image" content={ogImageUrl} />
<meta property="og:site_name" content={SITE.name} />
<meta property="og:locale" content={SITE.locale} />

{type === 'article' && publishedTime && (
  <meta property="article:published_time" content={publishedTime} />
)}
{type === 'article' && modifiedTime && (
  <meta property="article:modified_time" content={modifiedTime} />
)}
{type === 'article' && authorUrl && (
  <meta property="article:author" content={absoluteUrl(authorUrl)} />
)}
{type === 'article' && section && <meta property="article:section" content={section} />}

{/* Twitter / X */}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content={title} />
<meta name="twitter:description" content={description} />
<meta name="twitter:image" content={ogImageUrl} />
```

### 1.6 ปรับ BaseLayout ให้รับ SEO props และมี slot สำหรับ JSON-LD

```astro
---
// src/layouts/BaseLayout.astro  (ฉบับ Day 2)
import Header from '../components/Header.astro'
import Footer from '../components/Footer.astro'
import SeoHead from '../components/SeoHead.astro'
import type { SeoProps } from '../components/SeoHead.astro'
import { SITE } from '../lib/site'
import '../styles/global.css'

interface Props {
  seo: SeoProps
}

const { seo } = Astro.props
---

<!doctype html>
<html lang={SITE.language}>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="generator" content={Astro.generator} />
    <link rel="icon" href="/favicon.svg" type="image/svg+xml" />

    <SeoHead {...seo} />

    {/* หน้าไหนมี JSON-LD ให้ส่งเข้ามาทาง slot นี้ (Module 3) */}
    <slot name="head" />
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

ตัวอย่างการใช้กับหน้าบริการ (แทนที่ `title`/`description` เดิมของ Day 1):

```astro
---
// src/pages/services/[slug].astro  (เฉพาะส่วน frontmatter + เปิด Layout)
// ... getStaticPaths เหมือนเดิม ...
const { service } = Astro.props
---

<BaseLayout
  seo={{
    title: service.name,
    description: service.short_description,
    canonical: service.url,
    ogImage: `/images/og/${service.slug}.jpg`,
  }}
>
  ...
</BaseLayout>
```

และหน้าบทความ:

```astro
<BaseLayout
  seo={{
    title: article.title,
    description: article.excerpt,
    canonical: article.url,
    ogImage: article.cover_image ?? undefined,
    type: 'article',
    publishedTime: article.published_at,
    modifiedTime: article.updated_at,
    authorUrl: article.author.url,
    section: 'บทความ',
  }}
>
```

> 🧪 **ทดสอบ:** `npm run build` แล้วเปิด `dist/blog/geo-vs-seo-2026/index.html` ต้องเห็น `<link rel="canonical">`, `og:type=article`, `article:published_time` ครบ · ดู log ตอน build ว่ามี `[SeoHead]` เตือนหน้าไหนบ้าง แล้วกลับไปแก้ `excerpt`/`short_description` ใน DB ให้ยาวพอดี (นี่คือประโยชน์ของการเก็บ metadata ใน DB: แก้ที่เดียว มีผลทั้ง meta, OG และ Schema)

---

## 📚 Module 2: Canonical, hreflang & Heading Hierarchy

### เวลา 21:10-21:30 น.

> 💡 **หัวใจของ Module นี้:** Canonical บอกเครื่องว่า "หน้านี้คือฉบับจริง" hreflang บอกว่า "หน้านี้ภาษาอะไร มีฉบับภาษาอื่นที่ไหน" และ Heading บอกว่า "โครงเรื่องของหน้านี้เป็นอย่างไร" ทั้งสามคือสิ่งที่ AI ใช้ตัดสินใจว่าจะอ่านหน้าไหน และจะสรุปว่าอย่างไร

---

### 2.1 Canonical Tag ป้องกัน Duplicate Content

ปัญหาที่ Audit พบ: หน้าเดียวกันเข้าถึงได้หลาย URL เช่น `/courses/x`, `/courses/x?schid=12`, `/courses/x?lang=th`, `/courses/x?utm_source=facebook` ถ้าไม่มี Canonical เครื่องมือค้นหาและ AI จะเห็นเป็น 4 หน้าที่เนื้อหาซ้ำกัน แล้วแบ่งความน่าเชื่อถือกระจายกันไป หรือแย่กว่านั้นคือเลือกอ้างอิง URL ที่มี `?utm_source=` ติดไปด้วย

สิ่งที่ SeoHead ทำให้แล้วใน Module 1:

```ts
// ใช้เฉพาะ pathname → ตัด ?query และ #hash ทิ้ง แล้วประกอบกับ site จาก config
const canonicalUrl = new URL(Astro.url.pathname, SITE.url).toString()
// /services/web-development/?utm_source=fb  →  https://www.geniuscorp.example/services/web-development/
```

กฎของ Canonical ที่ต้องได้ครบ:

| กฎ                                                   | ทำอย่างไรใน Astro                                                                        |
| ---------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| ต้องเป็น **absolute URL** (มี https:// และโดเมน)      | `new URL(path, SITE.url)`                                                                |
| ต้องตรงกับ **host เดียว** (www หรือ non-www เลือกอย่างเดียว) | `site` ใน `astro.config.mjs` + redirect ที่เว็บเซิร์ฟเวอร์ (Day 4)                        |
| trailing slash **สม่ำเสมอ**                          | `trailingSlash: 'always'` ใน config และ `url` จาก API ลงท้ายด้วย `/` เสมอ                 |
| หน้า pagination canonical ไปที่ตัวเอง ไม่ใช่หน้าแรก    | ถ้าทำ `/blog/2/` ให้ canonical เป็น `/blog/2/` (Astro มี `paginate()` ช่วย)                |
| หน้าที่ซ้ำโดยตั้งใจ (เช่น print version) ชี้ไปฉบับหลัก | ส่ง `canonical` prop ชี้ไปหน้าหลักด้วยมือ                                                 |

> ⚠️ **Canonical ไม่ใช่ redirect** เครื่องมือค้นหาถือเป็น "คำแนะนำ" ไม่ใช่คำสั่ง ถ้า URL ซ้ำเกิดจาก http/https หรือ www/non-www ต้องทำ 301 redirect ที่เว็บเซิร์ฟเวอร์ด้วย (Day 4) Canonical ใช้กับ query string และหน้าที่จำเป็นต้องมีหลาย URL เท่านั้น

### 2.2 hreflang - เมื่อไหร่ต้องใส่ และใส่อย่างไร

จาก Audit: เว็บมี `?lang=en` แต่ไม่มี hreflang และเนื้อหาอังกฤษไม่ครบ ผลคือ Google เห็น URL ซ้ำ และ AI ไม่รู้ว่ามีเวอร์ชันอังกฤษ

**แนวทางตัดสินใจ:**

```
เว็บนี้มีเนื้อหาภาษาอังกฤษ "จริง" (แปลครบ ดูแลต่อเนื่อง) หรือไม่?
│
├─ ไม่มี / มีแค่บางหน้า / แปลด้วย plugin อัตโนมัติ
│     → ไม่ต้องทำหลายภาษา ถอด ?lang=en ออก ใส่ lang="th" อย่างเดียว
│       (หน้าอังกฤษครึ่ง ๆ กลาง ๆ ทำให้ทั้ง Google และ AI สับสนมากกว่าไม่มี)
│
└─ มีจริง
      → แยกเป็น path: /th/... และ /en/... (หรือ th ไม่มี prefix, en มี /en/)
      → ทุกหน้าใส่ hreflang ครบชุด: th, en, x-default และต้องชี้กลับหากันทั้งสองทาง
      → JSON-LD ใส่ inLanguage ให้ตรง
```

ถ้าเลือกทำสองภาษาใน Astro ใช้ `i18n` ใน config:

```js
// astro.config.mjs (เพิ่มเฉพาะเมื่อมีสองภาษาจริง)
export default defineConfig({
  site: 'https://www.geniuscorp.example',
  i18n: {
    defaultLocale: 'th',
    locales: ['th', 'en'],
    routing: {
      prefixDefaultLocale: false,   // th อยู่ที่ / , en อยู่ที่ /en/
    },
  },
})
```

```astro
---
// ตัวอย่างการส่ง alternates ให้ SeoHead ในหน้า /services/[slug].astro
const alternates = [
  { lang: 'th', href: service.url },
  { lang: 'en', href: `/en${service.url}` },
  { lang: 'x-default', href: service.url },
]
---
<BaseLayout seo={{ title: service.name, description: service.short_description, alternates }}>
```

ผลลัพธ์ใน HTML:

```html
<link rel="alternate" hreflang="th" href="https://www.geniuscorp.example/services/web-development/" />
<link rel="alternate" hreflang="en" href="https://www.geniuscorp.example/en/services/web-development/" />
<link rel="alternate" hreflang="x-default" href="https://www.geniuscorp.example/services/web-development/" />
```

> 📌 **สำหรับ GeniusCorp ในคอร์สนี้เราเลือก "ภาษาไทยอย่างเดียว"** จึงไม่ส่ง `alternates` และ SeoHead จะไม่สร้าง hreflang เลย นี่คือการตัดสินใจที่ถูกต้องสำหรับเว็บส่วนใหญ่ในไทยที่ไม่มีทีมดูแลเนื้อหาอังกฤษจริงจัง

> ⚠️ **Astro 6:** ค่าเริ่มต้นของ `i18n.routing.redirectToDefaultLocale` เปลี่ยนเป็น `false` และใช้ได้เฉพาะเมื่อ `prefixDefaultLocale: true` ถ้าอัปเกรดจาก Astro 5 ที่ใช้ i18n ให้ตรวจข้อนี้

### 2.3 Heading Hierarchy ที่ AI อ่านรู้เรื่อง

AI ใช้ heading เป็น "สารบัญ" ของหน้า เมื่อ LLM ต้องตอบคำถาม ระบบ retrieval มักตัดเนื้อหาเป็นก้อน (chunk) ตาม heading แล้วเลือกก้อนที่ตรงกับคำถาม Heading ที่ดีจึงทำให้ก้อนเนื้อหาของเรา "ถูกหยิบ" ได้ง่าย

```
❌ สิ่งที่ Audit พบ (หน้ารวมคอร์ส):          ✅ สิ่งที่ควรเป็น:
<h1> (ไม่มี)                                <h1>คอร์สอบรมทั้งหมด</h1>
<h2>คอร์ส A</h2>  ← การ์ด                     <h2>คอร์สด้าน AI</h2>          ← หมวด
<h2>คอร์ส B</h2>  ← การ์ด                       <h3>คอร์ส A</h3>             ← การ์ด
<h2>คอร์ส C</h2>  ← การ์ด                       <h3>คอร์ส B</h3>
... อีก 20 ตัว                              <h2>คอร์สด้าน DevOps</h2>
<h2>สมัครเรียน</h2>                             <h3>คอร์ส C</h3>
                                            <h2>วิธีสมัครเรียน</h2>
AI เห็น: "หน้านี้มี 23 หัวข้อหลักที่ไม่เกี่ยวกัน"   AI เห็น: "หน้านี้มี 3 หัวข้อหลัก แต่ละหัวข้อมีรายการย่อย"
```

กฎที่ใช้ทั้งคอร์ส (และใส่ใน GEO-Ready Checklist):

1. **H1 เดียวต่อหน้า** และต้องมีในทุกหน้า รวมหน้าแรก (Audit พบหน้าแรกไม่มี H1)
2. **H2 คือหัวข้อหลักของหน้า** จำนวนไม่ควรเกิน 5-8 ต่อหน้า และควรเป็น **รูปแบบคำถาม** เมื่อเหมาะสม เช่น `<h2>บริการนี้เหมาะกับใคร</h2>`, `<h2>ราคาเริ่มต้นเท่าไร</h2>` เพราะตรงกับสิ่งที่ผู้ใช้ถาม AI
3. **การ์ด/รายการ ใช้ H3** (หรือ `<p class="title">` ถ้าไม่ใช่หัวข้อจริง) ไม่ใช่ H2
4. **ไม่ข้ามระดับ** (H1 → H3 โดยไม่มี H2)
5. **ไม่ใช้ heading เพื่อจัดขนาดตัวอักษร** ใช้ CSS class แทน
6. **Logo/ชื่อเว็บใน Header ไม่ใช่ H1** (Theme WordPress หลายตัวทำผิดข้อนี้ - Day 3)

ใน Astro เราควบคุมได้ 100% เพราะเขียน HTML เอง ให้ตรวจสอบด้วยสคริปต์เล็ก ๆ หลัง build (จะรวมในสคริปต์ตรวจของ Module 5):

```js
// scripts/check-headings.mjs - ตรวจ H1 ทุกหน้าใน dist/
import { readFileSync, readdirSync, statSync } from 'node:fs'
import { join } from 'node:path'

function walk(dir, files = []) {
  for (const name of readdirSync(dir)) {
    const full = join(dir, name)
    if (statSync(full).isDirectory()) walk(full, files)
    else if (name.endsWith('.html')) files.push(full)
  }
  return files
}

let problems = 0
for (const file of walk('dist')) {
  const html = readFileSync(file, 'utf8')
  const h1Count = (html.match(/<h1[\s>]/gi) ?? []).length
  if (h1Count !== 1) {
    console.log(`✗ ${file}: พบ <h1> ${h1Count} ตัว (ต้องมี 1)`)
    problems++
  }
}

console.log(problems === 0 ? '✓ ทุกหน้ามี H1 เดียว' : `พบปัญหา ${problems} หน้า`)
process.exit(problems === 0 ? 0 : 1)
```

---

## 📚 Module 3: JSON-LD Structured Data - หัวใจของ GEO

### เวลา 21:30-22:30 น.

> 💡 **หัวใจของ Module นี้:** Structured Data คือการบอกเครื่องอย่างชัดเจนว่า "สิ่งนี้คือองค์กรชื่อนี้ เบอร์นี้", "สิ่งนี้คือบริการราคานี้", "บทความนี้เขียนโดยคนนี้ เมื่อวันนี้" แทนที่จะให้ AI เดาจากข้อความ เว็บที่ Audit ไม่มี JSON-LD เลยแม้แต่บรรทัดเดียว และนั่นคืองานที่มี Impact สูงที่สุดใน Roadmap วันนี้เราสร้างมันแบบ "ประกอบจากข้อมูลจริง" ไม่ใช่พิมพ์มือทีละหน้า

---

### 3.1 Schema.org และ JSON-LD: ทำไมเป็นรูปแบบที่ Google และ AI แนะนำ

**Schema.org** คือคลังคำศัพท์ (vocabulary) มาตรฐานที่ Google, Microsoft, Yahoo และ Yandex ร่วมกันสร้างตั้งแต่ปี 2011 มี type มากกว่า 800 ชนิด เช่น `Organization`, `Article`, `Product`, `FAQPage` และ property ของแต่ละ type

**JSON-LD** (JSON for Linking Data) คือ "รูปแบบการเขียน" Schema.org ลงในหน้าเว็บ มีสามรูปแบบคือ Microdata (แทรกใน HTML attribute), RDFa และ JSON-LD ซึ่ง Google แนะนำ JSON-LD อย่างเป็นทางการ เพราะ:

| ข้อดีของ JSON-LD                                | ผลกับเรา                                                                             |
| ----------------------------------------------- | ------------------------------------------------------------------------------------ |
| แยกจาก HTML อยู่ใน `<script type="application/ld+json">` | เปลี่ยน Theme/CSS ไม่กระทบ Schema และประกอบจากข้อมูลได้ด้วยโค้ดง่าย ๆ (`JSON.stringify`) |
| อ่านง่ายทั้งคนและเครื่อง                          | Debug ง่าย วางใน validator ได้ทันที                                                   |
| ซ้อน (nest) และอ้างอิงกันได้ด้วย `@id`            | Article → author → Person ตัวเดียวกับหน้าทีม ทุกอย่างเชื่อมกันเป็นกราฟ                 |
| LLM อ่าน JSON ได้ดีมาก                          | AI Engines ดึงข้อเท็จจริง (ราคา วันที่ ชื่อคน) จาก JSON-LD ได้แม่นกว่าจากข้อความ           |

โครงสร้างพื้นฐานที่ทุก Schema ใช้ร่วมกัน:

```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "@id": "https://www.geniuscorp.example/#organization",
  "name": "GeniusCorp"
}
```

- `@context` บอกว่าคำศัพท์มาจาก schema.org (ใส่ครั้งเดียวต่อ `<script>`)
- `@type` ชนิดของสิ่งนั้น
- `@id` "ตัวตน" ที่ไม่ซ้ำ ใช้อ้างอิงข้ามกันได้ (ใช้ URL + `#fragment` เป็นธรรมเนียม)

### 3.2 สร้าง JsonLd Component และจัดการ Escape อย่างปลอดภัย

ปัญหาที่ต้องระวังเมื่อฝัง JSON ลง `<script>`:

1. ถ้าข้อมูลมีสตริง `</script>` (เช่น ในบทความที่พูดถึง HTML) เบราว์เซอร์จะปิด script ก่อนเวลา → HTML พังและ Schema หาย
2. ภาษาไทยไม่ใช่ปัญหาของ `JSON.stringify` (JS เก็บ UTF-16 อยู่แล้ว) แต่ **ต้องแน่ใจว่าไฟล์ HTML ประกาศ `<meta charset="utf-8">`** และเซิร์ฟเวอร์ส่ง `Content-Type: text/html; charset=utf-8` ไม่เช่นนั้น validator บางตัวจะอ่านเป็นตัวอักษรเพี้ยน
3. อักขระ `&`, `<`, `>` ใน JSON ที่อยู่ใน script **ไม่ต้อง** HTML-escape (script content ไม่ถูก parse เป็น HTML) แต่การแปลงเป็น `\u003c` เป็นวิธีมาตรฐานที่ปลอดภัยที่สุดและ JSON ยังถูกต้อง 100%

```astro
---
// src/components/JsonLd.astro
// รับ object (หรือ array ของ object) แล้วฝังเป็น <script type="application/ld+json"> อย่างปลอดภัย

interface Props {
  data: Record<string, unknown> | Record<string, unknown>[]
}

const { data } = Astro.props

// ตัด key ที่ค่าเป็น undefined/null/'' ออก เพื่อไม่ให้ validator เตือน "missing value"
function clean(value: unknown): unknown {
  if (Array.isArray(value)) {
    return value.map(clean).filter((v) => v !== undefined)
  }
  if (value && typeof value === 'object') {
    const out: Record<string, unknown> = {}
    for (const [k, v] of Object.entries(value as Record<string, unknown>)) {
      const cleaned = clean(v)
      if (cleaned !== undefined && cleaned !== null && cleaned !== '') out[k] = cleaned
    }
    return out
  }
  return value
}

// แทนที่อักขระที่อาจปิด <script> ก่อนเวลา ด้วย unicode escape (JSON ยังถูกต้อง)
const json = JSON.stringify(clean(data))
  .replace(/</g, '\\u003c')
  .replace(/>/g, '\\u003e')
  .replace(/&/g, '\\u0026')
  // U+2028 / U+2029 เป็น line separator ที่ JSON ยอมรับ แต่ JavaScript รุ่นเก่าถือเป็นขึ้นบรรทัดใหม่
  .replace(/\u2028/g, '\\u2028')
  .replace(/\u2029/g, '\\u2029')
---

<script type="application/ld+json" set:html={json} />
```

> 📌 **`set:html` บน `<script>`** ทำให้ Astro ใส่เนื้อหาตรง ๆ โดยไม่ escape เป็น HTML entity (ถ้าใช้ `{json}` ปกติ Astro จะแปลง `"` เป็น `&quot;` แล้ว JSON พัง) และ Astro **ไม่ bundle/hoist** script ที่มี `type="application/ld+json"` จึงอยู่ใน `<head>` ตามที่วางไว้

### 3.3 ไลบรารี Schema Builders (src/lib/schema.ts)

แทนที่จะเขียน JSON-LD ในแต่ละหน้า เราสร้างฟังก์ชัน "ประกอบ Schema จากข้อมูล" ไว้ที่เดียว ทุกหน้าเรียกใช้ตัวที่ต้องการ แล้วส่งให้ `<JsonLd>` เป็น **array** (Google รองรับหลาย object ใน script เดียวผ่าน `@graph` หรือ array ระดับบนสุด)

```ts
// src/lib/schema.ts
// Schema builders: ทุกฟังก์ชันรับข้อมูลจาก API/site.ts แล้วคืน object ตาม Schema.org
import { SITE, absoluteUrl } from './site'
import type { Article, Faq, Portfolio, Service, TeamMember } from './types'

type Schema = Record<string, unknown>

// @id คงที่ของ "ตัวตน" หลัก ใช้อ้างอิงข้ามหน้า
export const ORG_ID = `${SITE.url}/#organization`
export const WEBSITE_ID = `${SITE.url}/#website`
export const personId = (member: Pick<TeamMember, 'slug'>) => `${SITE.url}/team/#${member.slug}`

// ── Organization / LocalBusiness ─────────────────────────────────────────────
// ใช้ @type เป็น array เพื่อบอกว่า "เป็นทั้ง Organization และ LocalBusiness (มีที่ตั้งจริง)"
// ถ้าเป็นธุรกิจเฉพาะทาง เปลี่ยนเป็น type ย่อย เช่น 'ProfessionalService', 'EducationalOrganization', 'Restaurant'
export function organizationSchema(): Schema {
  return {
    '@type': ['Organization', 'LocalBusiness'],
    '@id': ORG_ID,
    name: SITE.name,
    legalName: SITE.legalName,
    url: SITE.url + '/',
    logo: {
      '@type': 'ImageObject',
      url: absoluteUrl(SITE.logo),
    },
    image: absoluteUrl(SITE.defaultOgImage),
    telephone: SITE.telephone,
    email: SITE.email,
    foundingDate: SITE.foundingDate,
    address: {
      '@type': 'PostalAddress',
      ...SITE.address,
    },
    geo: {
      '@type': 'GeoCoordinates',
      latitude: SITE.geo.latitude,
      longitude: SITE.geo.longitude,
    },
    openingHours: SITE.openingHours,
    sameAs: SITE.sameAs,
  }
}

// ── WebSite + SearchAction ───────────────────────────────────────────────────
// SearchAction ใส่เฉพาะเมื่อเว็บมีหน้าค้นหาจริง (เช่น /search/?q=...) ถ้าไม่มีให้ตัด potentialAction ออก
export function websiteSchema(options: { hasSearch?: boolean } = {}): Schema {
  return {
    '@type': 'WebSite',
    '@id': WEBSITE_ID,
    url: SITE.url + '/',
    name: SITE.name,
    description: SITE.defaultDescription,
    inLanguage: SITE.language,
    publisher: { '@id': ORG_ID },
    ...(options.hasSearch && {
      potentialAction: {
        '@type': 'SearchAction',
        target: {
          '@type': 'EntryPoint',
          urlTemplate: `${SITE.url}/search/?q={search_term_string}`,
        },
        'query-input': 'required name=search_term_string',
      },
    }),
  }
}

// ── WebPage (ใส่ทุกหน้า เชื่อม isPartOf → WebSite และ about → Organization) ─────
export function webPageSchema(input: {
  url: string
  name: string
  description: string
  datePublished?: string | null
  dateModified?: string | null
  type?: 'WebPage' | 'AboutPage' | 'ContactPage' | 'CollectionPage'
}): Schema {
  const pageUrl = absoluteUrl(input.url)
  return {
    '@type': input.type ?? 'WebPage',
    '@id': `${pageUrl}#webpage`,
    url: pageUrl,
    name: input.name,
    description: input.description,
    inLanguage: SITE.language,
    isPartOf: { '@id': WEBSITE_ID },
    about: { '@id': ORG_ID },
    datePublished: input.datePublished ?? undefined,
    dateModified: input.dateModified ?? undefined,
  }
}

// ── Service + Offer ──────────────────────────────────────────────────────────
// Pattern เดียวกันนี้เปลี่ยน @type เป็น Product / Course / Event ได้ (ดูหัวข้อ 3.5)
export function serviceSchema(service: Service): Schema {
  const url = absoluteUrl(service.url)
  return {
    '@type': 'Service',
    '@id': `${url}#service`,
    name: service.name,
    description: service.short_description,
    url,
    serviceType: service.name,
    provider: { '@id': ORG_ID },
    areaServed: { '@type': 'Country', name: 'Thailand' },
    ...(service.price_from !== null && {
      offers: {
        '@type': 'Offer',
        price: service.price_from,
        priceCurrency: service.price_currency,
        // "เริ่มต้น" = ราคาต่ำสุด ใช้ PriceSpecification บอกว่าเป็น minimum
        priceSpecification: {
          '@type': 'PriceSpecification',
          minPrice: service.price_from,
          priceCurrency: service.price_currency,
        },
        availability: 'https://schema.org/InStock',
        url,
      },
    }),
  }
}

// ── Article ──────────────────────────────────────────────────────────────────
export function articleSchema(article: Article): Schema {
  const url = absoluteUrl(article.url)
  return {
    '@type': 'Article',
    '@id': `${url}#article`,
    headline: article.title.slice(0, 110),   // Google แนะนำไม่เกิน 110 ตัวอักษร
    description: article.excerpt,
    url,
    mainEntityOfPage: { '@id': `${url}#webpage` },
    image: article.cover_image ? [absoluteUrl(article.cover_image)] : undefined,
    datePublished: article.published_at ?? undefined,
    dateModified: article.updated_at ?? article.published_at ?? undefined,
    inLanguage: SITE.language,
    author: { '@id': personId(article.author) },   // อ้างอิง Person ที่ประกาศในหน้าเดียวกัน
    publisher: { '@id': ORG_ID },
    isPartOf: { '@id': WEBSITE_ID },
  }
}

// ── Person ───────────────────────────────────────────────────────────────────
export function personSchema(member: TeamMember): Schema {
  return {
    '@type': 'Person',
    '@id': personId(member),
    name: member.name,
    jobTitle: member.job_title,
    description: member.bio ?? undefined,
    image: member.photo ? absoluteUrl(member.photo) : undefined,
    url: absoluteUrl(member.url),
    email: member.email ?? undefined,
    worksFor: { '@id': ORG_ID },
    sameAs: member.social_links.length ? member.social_links : undefined,
  }
}

// ── BreadcrumbList ───────────────────────────────────────────────────────────
export interface Crumb {
  name: string
  url?: string   // รายการสุดท้าย (หน้าปัจจุบัน) ไม่ต้องมี url
}

export function breadcrumbSchema(crumbs: Crumb[]): Schema {
  return {
    '@type': 'BreadcrumbList',
    itemListElement: crumbs.map((crumb, index) => ({
      '@type': 'ListItem',
      position: index + 1,
      name: crumb.name,
      item: crumb.url ? absoluteUrl(crumb.url) : undefined,
    })),
  }
}

// ── FAQPage ──────────────────────────────────────────────────────────────────
export function faqSchema(faqs: Faq[]): Schema | null {
  if (!faqs.length) return null
  return {
    '@type': 'FAQPage',
    mainEntity: faqs.map((faq) => ({
      '@type': 'Question',
      name: faq.question,
      acceptedAnswer: {
        '@type': 'Answer',
        text: faq.answer,
      },
    })),
  }
}

// ── CreativeWork สำหรับผลงาน (Portfolio) ─────────────────────────────────────
export function portfolioSchema(item: Portfolio): Schema {
  const url = absoluteUrl(item.url)
  return {
    '@type': 'CreativeWork',
    '@id': `${url}#work`,
    name: item.title,
    description: item.summary,
    url,
    image: item.cover_image ? absoluteUrl(item.cover_image) : undefined,
    dateCreated: item.completed_at ?? undefined,
    creator: { '@id': ORG_ID },
    ...(item.client_name && {
      sourceOrganization: { '@type': 'Organization', name: item.client_name },
    }),
  }
}

// ── ประกอบเป็น @graph พร้อม @context เดียว ───────────────────────────────────
// รับหลาย schema (ข้าม null ให้) แล้วคืน object เดียวสำหรับ <JsonLd data={...} />
export function graph(...schemas: (Schema | null | undefined)[]): Schema {
  return {
    '@context': 'https://schema.org',
    '@graph': schemas.filter((s): s is Schema => Boolean(s)),
  }
}
```

> 📌 **ทำไมใช้ `@graph`:** ทำให้ทุก Schema ของหน้าอยู่ใน `<script>` เดียว มี `@context` เดียว และอ้างอิงกันด้วย `@id` ได้ (Article.author → Person, Service.provider → Organization) validator จะเห็นเป็นกราฟเดียวที่เชื่อมกัน แทนที่จะเป็น object แยก ๆ ที่ซ้ำข้อมูลองค์กรหลายรอบ

### 3.4 ประกอบ Schema เข้าแต่ละหน้า

**หน้าแรก** - Organization + WebSite + WebPage:

```astro
---
// src/pages/index.astro (ส่วน frontmatter เพิ่มเติม)
import JsonLd from '../components/JsonLd.astro'
import { SITE } from '../lib/site'
import { graph, organizationSchema, websiteSchema, webPageSchema } from '../lib/schema'

// ... ดึงข้อมูล services/articles/portfolios เหมือน Day 1 ...

const jsonLd = graph(
  organizationSchema(),
  websiteSchema({ hasSearch: false }),
  webPageSchema({
    url: '/',
    name: SITE.defaultTitle,
    description: SITE.defaultDescription,
  }),
)
---

<BaseLayout seo={{ title: '', description: SITE.defaultDescription, canonical: '/', isHome: true }}>
  <JsonLd slot="head" data={jsonLd} />
  ...
</BaseLayout>
```

**หน้ารายละเอียดบริการ** - Service + Offer, BreadcrumbList, FAQPage, WebPage และ Organization (เพื่อให้ `provider` อ้างอิงเจอในหน้าเดียวกัน):

```astro
---
// src/pages/services/[slug].astro (ฉบับ Day 2)
import BaseLayout from '../../layouts/BaseLayout.astro'
import JsonLd from '../../components/JsonLd.astro'
import FaqSection from '../../components/FaqSection.astro'
import { getServices } from '../../lib/api'
import {
  graph, organizationSchema, webPageSchema, serviceSchema, breadcrumbSchema, faqSchema,
} from '../../lib/schema'
import type { Service } from '../../lib/types'

export async function getStaticPaths() {
  const services = await getServices()
  return services.map((service) => ({ params: { slug: service.slug }, props: { service } }))
}

interface Props {
  service: Service
}

const { service } = Astro.props
const faqs = service.faqs ?? []
const price = service.price_from ? new Intl.NumberFormat('th-TH').format(service.price_from) : null

const crumbs = [
  { name: 'หน้าแรก', url: '/' },
  { name: 'บริการ', url: '/services/' },
  { name: service.name },
]

const jsonLd = graph(
  organizationSchema(),
  webPageSchema({
    url: service.url,
    name: service.name,
    description: service.short_description,
    datePublished: service.published_at,
    dateModified: service.updated_at,
  }),
  serviceSchema(service),
  breadcrumbSchema(crumbs),
  faqSchema(faqs),
)
---

<BaseLayout
  seo={{
    title: service.name,
    description: service.short_description,
    canonical: service.url,
    ogImage: `/images/og/${service.slug}.jpg`,
  }}
>
  <JsonLd slot="head" data={jsonLd} />

  <article class="container">
    {/* Breadcrumb ที่มองเห็น ต้องตรงกับ BreadcrumbList ใน JSON-LD */}
    <nav aria-label="breadcrumb" class="breadcrumb">
      <ol>
        {crumbs.map((c) => (
          <li>{c.url ? <a href={c.url}>{c.name}</a> : <span aria-current="page">{c.name}</span>}</li>
        ))}
      </ol>
    </nav>

    <h1>{service.name}</h1>
    <p class="lead">{service.short_description}</p>

    <dl class="facts">
      {price && (<><dt>ราคาเริ่มต้น</dt><dd>{price} {service.price_currency}</dd></>)}
      {service.duration_days && (<><dt>ระยะเวลาดำเนินการ</dt><dd>{service.duration_days} วัน</dd></>)}
    </dl>

    <div class="prose" set:html={service.description} />

    {/* FAQ ที่มองเห็น ต้องมีเนื้อหาตรงกับ FAQPage Schema (กฎของ Google) */}
    <FaqSection faqs={faqs} />
  </article>
</BaseLayout>
```

**หน้าบทความ** - Article + Person (ผู้เขียน) + BreadcrumbList + WebPage + Organization:

```astro
---
// src/pages/blog/[slug].astro (ส่วน frontmatter เพิ่มเติม)
import JsonLd from '../../components/JsonLd.astro'
import {
  graph, organizationSchema, webPageSchema, articleSchema, personSchema, breadcrumbSchema,
} from '../../lib/schema'

// ... getStaticPaths เหมือน Day 1 ...
const { article } = Astro.props

const crumbs = [
  { name: 'หน้าแรก', url: '/' },
  { name: 'บทความ', url: '/blog/' },
  { name: article.title },
]

const jsonLd = graph(
  organizationSchema(),
  webPageSchema({
    url: article.url,
    name: article.title,
    description: article.excerpt,
    datePublished: article.published_at,
    dateModified: article.updated_at,
  }),
  articleSchema(article),
  personSchema(article.author),    // ประกาศ Person ในหน้าเดียวกัน ให้ author @id อ้างอิงเจอ
  breadcrumbSchema(crumbs),
)
---

<BaseLayout seo={{ ...ตามหัวข้อ 1.6... }}>
  <JsonLd slot="head" data={jsonLd} />
  ...
</BaseLayout>
```

**หน้าทีมงาน** - Person ทุกคน + Organization:

```astro
---
// src/pages/team.astro (ส่วน frontmatter เพิ่มเติม)
import JsonLd from '../components/JsonLd.astro'
import { graph, organizationSchema, webPageSchema, personSchema, breadcrumbSchema } from '../lib/schema'

const team = await getTeam()

const jsonLd = graph(
  organizationSchema(),
  webPageSchema({ url: '/team/', name: 'ทีมงานของเรา', description: '...' }),
  breadcrumbSchema([{ name: 'หน้าแรก', url: '/' }, { name: 'ทีมงาน' }]),
  ...team.map(personSchema),
)
---
```

**หน้า About / Contact** - ใช้ `webPageSchema({ type: 'AboutPage' })` และ `webPageSchema({ type: 'ContactPage' })` ร่วมกับ `organizationSchema()` (หน้า Contact คือที่ที่ `LocalBusiness` มีประโยชน์ที่สุด เพราะที่อยู่ เบอร์โทร เวลาทำการ ที่มองเห็นในหน้า ตรงกับ Schema)

**หน้ารวม (services/index, blog/index, portfolio/index)** - ใช้ `webPageSchema({ type: 'CollectionPage' })` + `breadcrumbSchema` และอาจเพิ่ม `ItemList` ของรายการในหน้า:

```ts
// เพิ่มใน schema.ts
export function itemListSchema(items: { name: string, url: string }[]): Schema {
  return {
    '@type': 'ItemList',
    itemListElement: items.map((item, index) => ({
      '@type': 'ListItem',
      position: index + 1,
      name: item.name,
      url: absoluteUrl(item.url),
    })),
  }
}
```

ผลลัพธ์ที่ได้ในหน้าบริการ (ตัดให้สั้น):

```json
{
  "@context": "https://schema.org",
  "@graph": [
    { "@type": ["Organization", "LocalBusiness"], "@id": "https://www.geniuscorp.example/#organization", "name": "GeniusCorp", "telephone": "+66-2-000-0000", "address": { "@type": "PostalAddress", "addressLocality": "เขตคลองเตย", "addressCountry": "TH" }, "sameAs": ["https://www.facebook.com/geniuscorp.example"] },
    { "@type": "WebPage", "@id": "https://www.geniuscorp.example/services/web-development/#webpage", "name": "รับพัฒนาเว็บไซต์องค์กร", "dateModified": "2026-09-05T20:30:00+07:00", "isPartOf": { "@id": "https://www.geniuscorp.example/#website" } },
    { "@type": "Service", "name": "รับพัฒนาเว็บไซต์องค์กร", "provider": { "@id": "https://www.geniuscorp.example/#organization" }, "offers": { "@type": "Offer", "price": 45000, "priceCurrency": "THB", "availability": "https://schema.org/InStock" } },
    { "@type": "BreadcrumbList", "itemListElement": [ { "@type": "ListItem", "position": 1, "name": "หน้าแรก", "item": "https://www.geniuscorp.example/" }, { "@type": "ListItem", "position": 2, "name": "บริการ", "item": "https://www.geniuscorp.example/services/" }, { "@type": "ListItem", "position": 3, "name": "รับพัฒนาเว็บไซต์องค์กร" } ] },
    { "@type": "FAQPage", "mainEntity": [ { "@type": "Question", "name": "ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง", "acceptedAnswer": { "@type": "Answer", "text": "เริ่มต้น 45,000 บาท สำหรับเว็บ 7 หน้ามาตรฐาน ..." } } ] }
  ]
}
```

### 3.5 แนวทางปรับ Schema เดียวกันไปใช้กับธุรกิจแบบอื่น

Pattern ของ `serviceSchema` เปลี่ยนแค่ `@type` และฟิลด์เฉพาะทาง ก็ใช้กับธุรกิจอื่นได้ทันที เพราะฐานข้อมูลของเรามี `name`, `description`, `price_from`, `slug`, `published_at` เป็นแกนอยู่แล้ว

| ธุรกิจ                 | `@type` หลัก           | ฟิลด์ที่ต้องเพิ่มในตาราง                                                  | Schema ประกอบ                                       |
| ---------------------- | ---------------------- | ------------------------------------------------------------------------- | --------------------------------------------------- |
| ร้านค้าออนไลน์          | `Product`              | `sku`, `brand`, `image` (หลายรูป), `stock_status`, `rating`, `review_count` | `Offer` (price, availability), `AggregateRating`, `Brand` |
| สถาบันฝึกอบรม           | `Course`               | `hours`, รอบอบรม (`start_date`, `end_date`, `mode`)                        | `CourseInstance`, `Offer`, `provider: EducationalOrganization` |
| งานอีเวนต์/สัมมนา       | `Event`                | `start_date`, `end_date`, `venue`, `is_online`, `status`                   | `Place` / `VirtualLocation`, `Offer`, `performer`     |
| คลินิก/โรงพยาบาล        | `MedicalClinic` / `Physician` | `specialty`, `opening_hours`, `accepts_reservation`                  | `MedicalSpecialty`, `PostalAddress`                  |
| ร้านอาหาร               | `Restaurant`           | `cuisine`, `price_range`, `menu_url`, `accepts_reservations`               | `Menu`, `OpeningHoursSpecification`                  |
| อสังหาริมทรัพย์          | `RealEstateListing` / `Apartment` | `floor_size`, `rooms`, `address`, `price`                        | `Offer`, `Place`                                     |
| บทความ/ข่าว             | `NewsArticle` / `BlogPosting` | เหมือน Article + `dateline`, `articleSection`                         | `Person`, `Organization` (publisher)                  |

ตัวอย่างการต่อยอดเป็น `Course` (สำหรับผู้เรียนที่ทำเว็บสถาบัน):

```ts
export function courseSchema(course: {
  url: string
  name: string
  description: string
  price: number
  hours: number
  instances: { start: string, end: string, mode: 'Onsite' | 'Online' }[]
}): Schema {
  const url = absoluteUrl(course.url)
  return {
    '@type': 'Course',
    '@id': `${url}#course`,
    name: course.name,
    description: course.description,
    url,
    provider: { '@id': ORG_ID },
    timeRequired: `PT${course.hours}H`,
    inLanguage: SITE.language,
    offers: {
      '@type': 'Offer',
      price: course.price,
      priceCurrency: 'THB',
      availability: 'https://schema.org/InStock',
      category: 'Paid',
    },
    hasCourseInstance: course.instances.map((i) => ({
      '@type': 'CourseInstance',
      courseMode: i.mode,
      startDate: i.start,
      endDate: i.end,
      ...(i.mode === 'Onsite' && {
        location: { '@type': 'Place', name: SITE.name, address: { '@type': 'PostalAddress', ...SITE.address } },
      }),
    })),
  }
}
```

> 📖 **ตรวจฟิลด์ที่ Google "ต้องการ" (required) กับ "แนะนำ" (recommended) ของแต่ละ type** ที่ Google Search Central → Structured data → เลือก feature (Product, Course, Event, FAQ, Article, Breadcrumb, Organization) เพราะ Schema.org อนุญาตทุกฟิลด์ แต่ Rich Result ของ Google ต้องการฟิลด์เฉพาะ

### 3.6 ข้อควรระวังกับเนื้อหาภาษาไทยใน JSON-LD

| ประเด็น                                       | แนวทาง                                                                                                              |
| --------------------------------------------- | ------------------------------------------------------------------------------------------------------------------- |
| อักขระไทยกลายเป็น `กา...` (unicode escape) | เป็น JSON ที่ถูกต้อง 100% และ validator/AI อ่านได้ปกติ แต่ HTML ใหญ่ขึ้น ~6 เท่าในส่วนนั้น `JSON.stringify` ของ JS **ไม่** escape ไทย จึงไม่มีปัญหา ส่วน PHP ต้องใช้ `JSON_UNESCAPED_UNICODE` (Day 3) |
| `headline` ยาวเกิน 110 ตัวอักษร               | `slice(0, 110)` ใน builder แต่ให้ระวังตัดกลางคำ ควรเขียน title ให้สั้นตั้งแต่ใน DB                                     |
| `answer` ใน FAQ มี HTML                        | Google อนุญาต HTML บางแท็ก (`<h1>`-`<h6>`, `<br>`, `<ol>`, `<ul>`, `<li>`, `<a>`, `<p>`, `<div>`, `<b>`, `<strong>`, `<i>`, `<em>`) ใน `Answer.text` แต่ปลอดภัยสุดคือ plain text |
| วันที่ต้องเป็น ISO 8601 พร้อม timezone          | Laravel `toIso8601String()` ให้ `+07:00` มาแล้ว อย่าใช้ `d/m/Y` หรือปี พ.ศ. ใน Schema                                  |
| ตัวเลขราคาห้ามมี comma หรือคำว่า "บาท"          | เก็บเป็น `decimal` ใน DB, ส่งเป็น number ใน API, แสดง "45,000 บาท" เฉพาะใน HTML ที่คนอ่าน                              |
| `sameAs` ต้องเป็น URL เต็ม                     | ตรวจตอน seed ว่าขึ้นต้นด้วย `https://`                                                                                |
| เนื้อหาใน Schema ต้องตรงกับที่แสดงบนหน้า        | นโยบายของ Google: Structured Data ที่ไม่ตรงกับเนื้อหาที่มองเห็น = spam และอาจถูก manual action นี่คือเหตุผลที่เราประกอบจากข้อมูลชุดเดียวกัน |

---

## 📚 Module 4: FAQ System + FAQPage Schema

### เวลา 22:30-23:00 น.

> 💡 **หัวใจของ Module นี้:** FAQ คือเนื้อหาที่ "ตรงกับสิ่งที่ผู้ใช้ถาม AI" มากที่สุด เพราะมันคือคำถามจริงและคำตอบตรง ๆ การเก็บ FAQ ในฐานข้อมูลผูกกับบริการ ทำให้ทีมคอนเทนต์เพิ่ม/แก้ได้เอง และ Schema ถูกสร้างอัตโนมัติจากข้อมูลเดียวกัน ไม่มีทางที่ Schema กับหน้าเว็บจะไม่ตรงกัน

---

### 4.1 ทบทวนตาราง faqs และเพิ่ม Endpoint เฉพาะ

ตาราง `faqs` และ Seeder ถูกสร้างไว้ตั้งแต่ Day 1 (`service_id`, `question`, `answer`, `sort_order`) และ `ServiceResource` ส่ง `faqs` มากับบริการอยู่แล้ว วันนี้เพิ่ม endpoint แยกสำหรับกรณีที่ต้องการ FAQ รวมทั้งเว็บ (เช่น หน้า `/faq/` รวม หรือ llms.txt ใน Day 4)

```php
<?php
// app/Http/Controllers/Api/V1/FaqController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FaqController extends Controller
{
    // GET /api/v1/faqs            → FAQ ทั้งหมด (เฉพาะบริการที่เผยแพร่)
    // GET /api/v1/faqs?service=x  → FAQ ของบริการเดียว
    public function index(Request $request): AnonymousResourceCollection
    {
        $faqs = Faq::query()
            ->whereHas('service', fn ($q) => $q->published())
            ->when($request->query('service'), function ($query, string $slug) {
                $query->whereHas('service', fn ($q) => $q->where('slug', $slug));
            })
            ->with('service:id,slug,name')
            ->orderBy('service_id')
            ->orderBy('sort_order')
            ->get();

        return FaqResource::collection($faqs);
    }
}
```

```php
// routes/api.php (เพิ่มใน group v1)
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
```

ปรับ `FaqResource` ให้ส่งบริการที่สังกัดมาด้วยเมื่อโหลดมา:

```php
public function toArray(Request $request): array
{
    return [
        'question' => $this->question,
        'answer'   => $this->answer,
        'service'  => $this->whenLoaded('service', fn () => [
            'slug' => $this->service->slug,
            'name' => $this->service->name,
            'url'  => '/services/' . $this->service->slug . '/',
        ]),
    ];
}
```

### 4.2 เขียน FAQ อย่างไรให้เป็น "answer-ready"

หลักคิด: **คำถามคือสิ่งที่ผู้ใช้พิมพ์ถาม ChatGPT จริง ๆ** และ **คำตอบคือสิ่งที่ AI อยากคัดลอกไปตอบได้เลย**

| ❌ FAQ แบบเดิม (เขียนเพื่อตัวเอง)          | ✅ FAQ แบบ answer-ready (เขียนเพื่อคนถามและ AI)                                                                                                           |
| ------------------------------------------ | ---------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Q: บริการของเรา / A: เรามีบริการหลากหลาย... | Q: **บริการพัฒนาเว็บไซต์องค์กรเหมาะกับใคร** / A: เหมาะกับบริษัทที่ต้องการเว็บองค์กรใหม่ หรือต้องการย้ายจาก WordPress ที่ช้าและดูแลยาก โดยเฉพาะองค์กรที่ต้องการให้เว็บถูกค้นเจอทั้งใน Google และ AI Search |
| Q: ราคา / A: กรุณาติดต่อฝ่ายขาย              | Q: **ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง** / A: เริ่มต้น 45,000 บาท สำหรับเว็บ 7 หน้ามาตรฐาน รวมการติดตั้ง Structured Data, Sitemap, llms.txt และ Deploy         |
| Q: ระยะเวลา / A: ขึ้นอยู่กับโปรเจกต์          | Q: **ใช้เวลาดำเนินการกี่วัน** / A: ประมาณ 30 วันทำการ แบ่งเป็นออกแบบ 7 วัน พัฒนา 15 วัน และทดสอบพร้อม Deploy 8 วัน                                            |

กฎ 6 ข้อสำหรับทีมคอนเทนต์ (ใส่ไว้ในหน้า Admin หรือเอกสารส่งมอบ):

1. คำถามขึ้นต้นด้วยคำถามจริง: เหมาะกับใคร / เท่าไร / กี่วัน / อย่างไร / ต่างจาก X อย่างไร / มี Y หรือไม่
2. คำตอบ **ประโยคแรกต้องตอบตรง** (ตัวเลขหรือคำตอบ ใช่/ไม่) แล้วค่อยขยาย
3. ยาว 2-4 ประโยค (40-80 คำ) ไม่สั้นจนไม่มีเนื้อหา ไม่ยาวจน AI ต้องสรุปเอง
4. **มีตัวเลขอย่างน้อย 1 ตัว** ต่อคำตอบ ถ้าทำได้ (ราคา วัน จำนวน เปอร์เซ็นต์)
5. ไม่ใช้คำว่า "เรา/ของเรา" ลอย ๆ ให้ระบุชื่อบริการ/บริษัท เพราะ AI ตัดคำตอบไปใช้นอกบริบท
6. 4-6 ข้อต่อบริการ ถ้ามากกว่านั้นแยกเป็นหน้า FAQ รวม

### 4.3 FaqSection Component

```astro
---
// src/components/FaqSection.astro
// แสดง FAQ ที่มองเห็นได้ (ต้องมีเนื้อหาตรงกับ FAQPage Schema ที่หน้าประกอบไว้ใน head)
import type { Faq } from '../lib/types'

interface Props {
  faqs: Faq[]
  heading?: string
}

const { faqs, heading = 'คำถามที่พบบ่อย' } = Astro.props
---

{faqs.length > 0 && (
  <section class="faq" aria-labelledby="faq-heading">
    <h2 id="faq-heading">{heading}</h2>
    {/*
      <details>/<summary> คือ HTML ล้วน เปิด-ปิดได้โดยไม่ต้องมี JavaScript (Zero-JS)
      และเนื้อหาอยู่ใน HTML ตั้งแต่แรก crawler เห็นครบแม้พับอยู่
    */}
    {faqs.map((faq, index) => (
      <details class="faq-item" open={index === 0}>
        <summary>
          <h3>{faq.question}</h3>
        </summary>
        <div class="faq-answer">
          <p>{faq.answer}</p>
        </div>
      </details>
    ))}
  </section>
)}

<style>
  .faq { margin-top: 3rem; }
  .faq-item { border: 1px solid #dde4ec; border-radius: 10px; margin-bottom: .75rem; padding: 0 1rem; }
  .faq-item summary { cursor: pointer; padding: .9rem 0; list-style: none; }
  .faq-item summary::-webkit-details-marker { display: none; }
  .faq-item summary h3 { display: inline; font-size: 1.05rem; margin: 0; }
  .faq-item summary::before { content: '+'; display: inline-block; width: 1.5rem; font-weight: 700; color: #1855a3; }
  .faq-item[open] summary::before { content: '−'; }
  .faq-answer { padding: 0 0 1rem 1.5rem; color: #4a5a78; line-height: 1.7; }
</style>
```

> 📌 **ทำไม `<summary>` ใส่ `<h3>` ได้:** ตาม HTML spec `summary` รับ heading content ได้ ทำให้คำถาม FAQ อยู่ใน heading hierarchy (H2 "คำถามที่พบบ่อย" → H3 แต่ละคำถาม) และ AI มองเห็นเป็นโครงสร้างคำถาม-คำตอบชัดเจน · **`open` ข้อแรก** เพื่อให้ผู้ใช้เห็นว่ามีเนื้อหาอยู่ และ Google เห็นว่า "มองเห็นได้" โดยไม่ต้องคลิก

### 4.4 การผูก FAQPage Schema อัตโนมัติ

ทำไปแล้วในหัวข้อ 3.4: หน้า `services/[slug].astro` เรียก `faqSchema(service.faqs)` ใน `graph(...)` และเรนเดอร์ `<FaqSection faqs={service.faqs} />` จากข้อมูลชุดเดียวกัน ผลคือ:

```
MySQL (faqs)  →  Laravel API (ServiceResource.faqs)  →  Astro props (service.faqs)
                                                              ├──▶ <FaqSection>  (HTML ที่คนเห็น)
                                                              └──▶ faqSchema()   (JSON-LD ที่เครื่องเห็น)
```

ทีมคอนเทนต์เพิ่ม FAQ ใน DB (ผ่าน Admin ที่จะสร้างหรือผ่าน phpMyAdmin) → Rebuild (Day 4) → ทั้ง HTML และ Schema อัปเดตพร้อมกันเสมอ

> ⚠️ **นโยบาย FAQ Rich Result ของ Google เปลี่ยนตั้งแต่ปี 2023:** Google แสดง FAQ rich result เฉพาะเว็บภาครัฐและสุขภาพที่น่าเชื่อถือเท่านั้น แต่ **FAQPage Schema ยังมีค่าสำหรับ GEO** เพราะ AI Engines อ่าน Question/Answer ที่ชัดเจนนี้ไปใช้ตอบ และ Bing ยังใช้อยู่ เป้าหมายของเราคือถูก AI อ้างอิง ไม่ใช่ rich result ใน Google

---

## 📚 Module 5: Validation Workflow

### เวลา 23:00-23:15 น.

> 💡 **หัวใจของ Module นี้:** Structured Data ที่ผิดพลาดเพียง key เดียว (เช่น `datePublished` เป็น "5 กันยายน 2569") ทำให้ทั้ง block ถูกเมิน การ Validate จึงไม่ใช่ขั้นตอนสุดท้ายที่ทำครั้งเดียว แต่ต้องอยู่ใน workflow ทุกครั้งก่อน Deploy ทั้งแบบ manual (เครื่องมือของ Google และ Schema.org) และแบบอัตโนมัติ (สคริปต์ที่รันหลัง build)

---

### 5.1 เครื่องมือตรวจสอบสองตัวและความต่าง

| เครื่องมือ                                    | ตรวจอะไร                                                                           | ใช้เมื่อ                                          |
| --------------------------------------------- | ---------------------------------------------------------------------------------- | ------------------------------------------------- |
| **validator.schema.org**                      | ความถูกต้องตาม Schema.org ทุก type ทุก property (ไม่สนว่า Google ใช้หรือไม่)         | ตรวจ Schema ทุกชนิด รวม Service, LocalBusiness, WebPage ที่ Google ไม่มี rich result |
| **Google Rich Results Test** (search.google.com/test/rich-results) | เฉพาะ type ที่ Google มี rich result (Article, Breadcrumb, FAQ, Organization, Product...) และบอก required/recommended field ที่ขาด | ตรวจว่า Google จะ "ใช้" Schema นี้ได้หรือไม่ + ดูว่า Googlebot เรนเดอร์หน้าเราเห็นอะไร |

ทั้งสองรับได้ทั้ง **URL** (ต้องเข้าถึงได้จากอินเทอร์เน็ต) และ **Code snippet** (วาง HTML ทั้งหน้า) ตอนพัฒนาในเครื่องให้ใช้แบบ code snippet:

```bash
# คัดลอก HTML ที่ build แล้วทั้งหน้าเข้า clipboard (Windows PowerShell)
Get-Content dist/services/web-development/index.html -Raw | Set-Clipboard

# macOS
cat dist/services/web-development/index.html | pbcopy
```

แล้วไปที่ validator.schema.org → แท็บ **Code Snippet** → วาง → Run Test

**สิ่งที่ต้องได้ในหน้าบริการ:**

```
✓ Organization / LocalBusiness   (0 errors)
✓ WebPage                        (0 errors)
✓ Service                        (0 errors)
    └ offers: Offer              (0 errors)
✓ BreadcrumbList                 (0 errors)
✓ FAQPage                        (0 errors, มี Question 4 รายการ)
```

ใน Rich Results Test หน้าบทความต้องเห็น **Article**, **Breadcrumbs** และ (ถ้ามี) **Organization** เป็นสีเขียว ถ้ามี "Non-critical issues" เช่น "Missing field `image`" ให้พิจารณาเติม เพราะ recommended field เพิ่มโอกาสถูกใช้

### 5.2 ข้อผิดพลาดที่พบบ่อยและวิธีแก้

| ข้อความจาก validator                                     | สาเหตุ                                                        | แก้                                                                              |
| -------------------------------------------------------- | ------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `Unexpected token` / `Parsing error`                     | JSON พัง มักจาก `"` ที่ถูก escape เป็น `&quot;` หรือ `</script>` ในข้อมูล | ตรวจว่าใช้ `set:html` ใน JsonLd และ replace `<` แล้ว                              |
| `Missing field "image"` (Article)                        | บทความไม่มี cover_image                                       | ใส่รูปทุกบทความ หรือ fallback เป็น default OG image                                |
| `Invalid value in field "datePublished"`                 | วันที่ไม่ใช่ ISO 8601                                        | ใช้ `toIso8601String()` ฝั่ง Laravel เสมอ                                          |
| `The property price is not recognized by the schema (e.g. schema.org) for an object of type Service` | ใส่ `price` ตรงใน Service แทนที่จะอยู่ใน `offers`     | ย้ายเข้า `offers: { '@type': 'Offer', price }`                                     |
| `Unspecified type` / `@id not found`                     | อ้างอิง `{ '@id': ... }` ไปยัง object ที่ไม่ได้ประกาศในหน้าเดียวกัน | ใส่ `organizationSchema()` / `personSchema()` ใน `graph()` ของหน้านั้นด้วย         |
| FAQ: `Content mismatch`                                  | คำถาม/คำตอบใน Schema ไม่ตรงกับที่แสดงบนหน้า                    | เกิดไม่ได้ในระบบเรา เพราะประกอบจากข้อมูลเดียวกัน (ถ้าเกิด แสดงว่ามีคนแก้ HTML มือ)  |
| `Either "offers", "review", or "aggregateRating" should be specified` (Product) | Product ต้องมีอย่างน้อยหนึ่งใน 3 อย่างสำหรับ rich result | ใส่ `offers` เสมอ                                                                |

### 5.3 ทำ Validation ให้เป็นส่วนหนึ่งของ workflow: สคริปต์ตรวจอัตโนมัติหลัง build

เครื่องมือออนไลน์ตรวจได้ทีละหน้า แต่เว็บจริงมีหลายร้อยหน้า เราจึงเขียนสคริปต์ตรวจ **ทุกหน้าใน dist/** ว่า (1) มี JSON-LD (2) parse ได้ (3) มี type ที่คาดหวังตามประเภทหน้า (4) วันที่เป็น ISO (5) มี canonical และ H1 เดียว แล้วผูกกับ `npm run build` ให้ล้มเหลวถ้าไม่ผ่าน

```js
// scripts/check-geo.mjs
// ตรวจ GEO essentials ของทุกหน้าใน dist/ หลัง build - ล้มเหลว (exit 1) ถ้าพบปัญหา
import { readFileSync, readdirSync, statSync } from 'node:fs'
import { join, relative } from 'node:path'

const DIST = 'dist'
const ISO_DATE = /^\d{4}-\d{2}-\d{2}(T\d{2}:\d{2}(:\d{2})?([+-]\d{2}:\d{2}|Z))?$/

// กฎว่าแต่ละกลุ่ม URL ต้องมี @type อะไรบ้าง
const RULES = [
  { match: (p) => p === '/', requires: ['Organization', 'WebSite', 'WebPage'] },
  { match: (p) => /^\/services\/[^/]+\/$/.test(p), requires: ['Service', 'BreadcrumbList', 'FAQPage'] },
  { match: (p) => /^\/blog\/[^/]+\/$/.test(p), requires: ['Article', 'Person', 'BreadcrumbList'] },
  { match: (p) => /^\/portfolio\/[^/]+\/$/.test(p), requires: ['CreativeWork', 'BreadcrumbList'] },
  { match: (p) => p === '/team/', requires: ['Person'] },
  { match: () => true, requires: ['WebPage'] },   // ทุกหน้าที่เหลืออย่างน้อยต้องมี WebPage
]

// type ย่อยของ WebPage ตาม Schema.org (AboutPage, ContactPage, CollectionPage...) ถือว่าผ่านกฎ WebPage
const WEBPAGE_TYPES = new Set(['WebPage', 'AboutPage', 'ContactPage', 'CollectionPage', 'ProfilePage', 'FAQPage', 'ItemPage', 'SearchResultsPage'])

function walk(dir, files = []) {
  for (const name of readdirSync(dir)) {
    const full = join(dir, name)
    if (statSync(full).isDirectory()) walk(full, files)
    else if (name === 'index.html') files.push(full)
  }
  return files
}

function toPath(file) {
  const rel = relative(DIST, file).replace(/\\/g, '/').replace(/index\.html$/, '')
  return '/' + rel
}

// ดึง @type ทั้งหมดจาก graph (รองรับ @type เป็น array และ object ซ้อน)
function collectTypes(node, out = new Set()) {
  if (Array.isArray(node)) node.forEach((n) => collectTypes(n, out))
  else if (node && typeof node === 'object') {
    const t = node['@type']
    if (typeof t === 'string') out.add(t)
    if (Array.isArray(t)) t.forEach((x) => out.add(x))
    Object.values(node).forEach((v) => collectTypes(v, out))
  }
  return out
}

function collectDates(node, out = []) {
  if (Array.isArray(node)) node.forEach((n) => collectDates(n, out))
  else if (node && typeof node === 'object') {
    for (const [k, v] of Object.entries(node)) {
      if (/^date(Published|Modified|Created)$/.test(k)) out.push([k, v])
      collectDates(v, out)
    }
  }
  return out
}

let errors = 0
const report = (file, msg) => { console.log(`✗ ${toPath(file)}  ${msg}`); errors++ }

for (const file of walk(DIST)) {
  const html = readFileSync(file, 'utf8')
  const path = toPath(file)

  // 1) canonical
  const canonical = html.match(/<link rel="canonical" href="([^"]+)"/)?.[1]
  if (!canonical) report(file, 'ไม่มี canonical')
  else if (!canonical.startsWith('https://')) report(file, `canonical ไม่ใช่ absolute: ${canonical}`)

  // 2) H1 เดียว
  const h1 = (html.match(/<h1[\s>]/g) ?? []).length
  if (h1 !== 1) report(file, `พบ <h1> ${h1} ตัว`)

  // 3) meta description
  if (!/<meta name="description" content="[^"]{50,}"/.test(html)) report(file, 'meta description สั้นเกินหรือไม่มี')

  // 4) JSON-LD
  const blocks = [...html.matchAll(/<script type="application\/ld\+json">([\s\S]*?)<\/script>/g)]
  if (blocks.length === 0) { report(file, 'ไม่มี JSON-LD'); continue }

  const types = new Set()
  for (const [, raw] of blocks) {
    let data
    try { data = JSON.parse(raw) } catch (e) { report(file, `JSON-LD parse ไม่ได้: ${e.message}`); continue }
    collectTypes(data, types)
    for (const [k, v] of collectDates(data)) {
      if (!ISO_DATE.test(String(v))) report(file, `${k} ไม่ใช่ ISO 8601: ${v}`)
    }
  }

  // 5) type ที่คาดหวัง
  const rule = RULES.find((r) => r.match(path))
  for (const t of rule.requires) {
    const ok = t === 'WebPage' ? [...types].some((x) => WEBPAGE_TYPES.has(x)) : types.has(t)
    if (!ok) report(file, `ขาด @type ${t} (มี: ${[...types].join(', ')})`)
  }
}

if (errors === 0) console.log('✓ GEO check ผ่านทุกหน้า')
else console.log(`\nพบปัญหา ${errors} รายการ`)
process.exit(errors ? 1 : 0)
```

ผูกเข้า `package.json` ให้รันอัตโนมัติหลัง build:

```json
{
  "scripts": {
    "dev": "astro dev",
    "build": "astro build && node scripts/check-geo.mjs",
    "preview": "astro preview",
    "check:geo": "node scripts/check-geo.mjs"
  }
}
```

> ✅ **ผลลัพธ์ที่คาดหวัง:** `npm run build` จบด้วย `✓ GEO check ผ่านทุกหน้า` · ลองทดสอบว่ามันจับได้จริง: ลบ `faqSchema(faqs)` ออกจากหน้าบริการชั่วคราวแล้ว build → ต้องเห็น `✗ /services/web-development/  ขาด @type FAQPage` และ build ล้มเหลว · ใน Day 4 สคริปต์นี้จะเป็นด่านแรกของ Deploy pipeline: ไม่ผ่าน = ไม่ขึ้น production

### 5.4 Checklist การ Validate ก่อน Deploy ทุกครั้ง

- [ ] `npm run build` ผ่านพร้อม `✓ GEO check ผ่านทุกหน้า`
- [ ] สุ่ม 1 หน้าต่อประเภท (home, service, article, team, portfolio) วางใน validator.schema.org → 0 errors
- [ ] หน้าบทความและหน้าบริการผ่าน Rich Results Test (Article/Breadcrumb/FAQ/Organization เป็นสีเขียว)
- [ ] `[SeoHead]` warning ใน build log = 0 (title/description ยาวพอดีทุกหน้า)
- [ ] เปิด View Source ของหน้าที่มีภาษาไทยเยอะ ๆ ยืนยันว่าอ่านได้ ไม่ใช่ `à¸...` (charset ถูกต้อง)
- [ ] หลัง Deploy: ตรวจ URL จริงอีกครั้งด้วย Rich Results Test (แบบ URL) เพราะเซิร์ฟเวอร์อาจส่ง header ต่างจากเครื่องเรา

---

## 🛠️ Workshop Day 2 - GeniusCorp Modern: ติดตั้ง GEO Layer เต็มระบบ

### เวลา 23:15-23:30 น. (ทำต่อเป็นการบ้านให้ครบก่อน Day 3)

> **โจทย์:** นำทุกอย่างในวันนี้ประกอบเข้าเว็บ GeniusCorp Modern ให้ครบทุกหน้า: SeoHead ทุกหน้า, Canonical ทุกหน้า, JSON-LD ครบทุก Schema ตามประเภทหน้า, FAQ Section บนหน้าบริการพร้อม FAQPage Schema และ `npm run build` ผ่าน GEO check โดยไม่มี error

### ขั้นที่ 1 - ตารางสรุปว่าแต่ละหน้าต้องมีอะไร (ใช้เป็น spec)

| หน้า                    | SeoHead type | og:image                     | Schema ใน @graph                                                              | Breadcrumb                          |
| ----------------------- | ------------ | ---------------------------- | ----------------------------------------------------------------------------- | ----------------------------------- |
| `/`                     | website (isHome) | default                   | Organization/LocalBusiness, WebSite, WebPage                                  | -                                   |
| `/about/`               | website      | default                      | Organization, WebPage(AboutPage), BreadcrumbList                              | หน้าแรก › เกี่ยวกับเรา              |
| `/contact/`             | website      | default                      | Organization/LocalBusiness (เต็ม), WebPage(ContactPage), BreadcrumbList        | หน้าแรก › ติดต่อเรา                 |
| `/services/`            | website      | default                      | Organization, WebPage(CollectionPage), ItemList, BreadcrumbList               | หน้าแรก › บริการ                    |
| `/services/[slug]/`     | website      | `/images/og/<slug>.jpg`      | Organization, WebPage, Service+Offer, BreadcrumbList, FAQPage                 | หน้าแรก › บริการ › ชื่อบริการ       |
| `/portfolio/`           | website      | default                      | Organization, WebPage(CollectionPage), ItemList, BreadcrumbList               | หน้าแรก › ผลงาน                     |
| `/portfolio/[slug]/`    | website      | cover_image                  | Organization, WebPage, CreativeWork, BreadcrumbList                           | หน้าแรก › ผลงาน › ชื่อผลงาน         |
| `/blog/`                | website      | default                      | Organization, WebPage(CollectionPage), ItemList, BreadcrumbList               | หน้าแรก › บทความ                    |
| `/blog/[slug]/`         | **article**  | cover_image                  | Organization, WebPage, Article, Person(author), BreadcrumbList                | หน้าแรก › บทความ › ชื่อบทความ       |
| `/team/`                | website      | default                      | Organization, WebPage, Person × N, BreadcrumbList                             | หน้าแรก › ทีมงาน                    |

### ขั้นที่ 2 - สร้าง Breadcrumb Component ที่ใช้ซ้ำ (ให้ HTML กับ Schema มาจาก array เดียวกัน)

```astro
---
// src/components/Breadcrumb.astro
import type { Crumb } from '../lib/schema'

interface Props {
  crumbs: Crumb[]
}

const { crumbs } = Astro.props
---

<nav aria-label="breadcrumb" class="breadcrumb">
  <ol>
    {crumbs.map((crumb, index) => (
      <li>
        {crumb.url && index < crumbs.length - 1
          ? <a href={crumb.url}>{crumb.name}</a>
          : <span aria-current="page">{crumb.name}</span>}
      </li>
    ))}
  </ol>
</nav>

<style>
  .breadcrumb ol { display: flex; flex-wrap: wrap; gap: .4rem; list-style: none; padding: 0; margin: 0 0 1.5rem; font-size: .9rem; color: #5a6a7d; }
  .breadcrumb li + li::before { content: '›'; margin-right: .4rem; }
</style>
```

### ขั้นที่ 3 - ตัวอย่างหน้าที่ประกอบครบ: blog/[slug].astro ฉบับสมบูรณ์

```astro
---
// src/pages/blog/[slug].astro (ฉบับสมบูรณ์ Day 2)
import BaseLayout from '../../layouts/BaseLayout.astro'
import JsonLd from '../../components/JsonLd.astro'
import Breadcrumb from '../../components/Breadcrumb.astro'
import { getArticles, getArticle } from '../../lib/api'
import {
  graph, organizationSchema, webPageSchema, articleSchema, personSchema, breadcrumbSchema,
} from '../../lib/schema'
import type { Article } from '../../lib/types'

export async function getStaticPaths() {
  const list = await getArticles()
  const articles = await Promise.all(list.map((a) => getArticle(a.slug)))
  return articles.map((article) => ({ params: { slug: article.slug }, props: { article } }))
}

interface Props {
  article: Article
}

const { article } = Astro.props

const crumbs = [
  { name: 'หน้าแรก', url: '/' },
  { name: 'บทความ', url: '/blog/' },
  { name: article.title },
]

const jsonLd = graph(
  organizationSchema(),
  webPageSchema({
    url: article.url,
    name: article.title,
    description: article.excerpt,
    datePublished: article.published_at,
    dateModified: article.updated_at,
  }),
  articleSchema(article),
  personSchema(article.author),
  breadcrumbSchema(crumbs),
)

const fmt = (iso: string) =>
  new Date(iso).toLocaleDateString('th-TH', { year: 'numeric', month: 'long', day: 'numeric' })
const isUpdated =
  article.updated_at && article.published_at && new Date(article.updated_at) > new Date(article.published_at)
---

<BaseLayout
  seo={{
    title: article.title,
    description: article.excerpt,
    canonical: article.url,
    ogImage: article.cover_image ?? undefined,
    type: 'article',
    publishedTime: article.published_at,
    modifiedTime: article.updated_at,
    authorUrl: article.author.url,
    section: 'บทความ',
  }}
>
  <JsonLd slot="head" data={jsonLd} />

  <article class="container prose">
    <Breadcrumb crumbs={crumbs} />

    <h1>{article.title}</h1>

    <p class="meta">
      โดย <a href={article.author.url}>{article.author.name}</a>, {article.author.job_title}
      {article.published_at && (
        <> · เผยแพร่ <time datetime={article.published_at}>{fmt(article.published_at)}</time></>
      )}
      {isUpdated && article.updated_at && (
        <> · แก้ไขล่าสุด <time datetime={article.updated_at}>{fmt(article.updated_at)}</time></>
      )}
    </p>

    {article.cover_image && (
      <img src={article.cover_image} alt={article.title} width="1200" height="630" />
    )}

    <p class="lead">{article.excerpt}</p>

    <div set:html={article.body} />

    {/* Day 4: <AuthorBox author={article.author} /> */}
  </article>
</BaseLayout>
```

### ขั้นที่ 4 - หน้า Contact กับ LocalBusiness ที่มองเห็นได้

```astro
---
// src/pages/contact.astro (ฉบับ Day 2)
import BaseLayout from '../layouts/BaseLayout.astro'
import JsonLd from '../components/JsonLd.astro'
import Breadcrumb from '../components/Breadcrumb.astro'
import { SITE } from '../lib/site'
import { graph, organizationSchema, webPageSchema, breadcrumbSchema } from '../lib/schema'

const crumbs = [{ name: 'หน้าแรก', url: '/' }, { name: 'ติดต่อเรา' }]
const description = `ติดต่อ ${SITE.name} โทร ${SITE.telephone} อีเมล ${SITE.email} สำนักงานที่${SITE.address.addressRegion} เปิดจันทร์-ศุกร์ 9:00-18:00 น.`

const jsonLd = graph(
  organizationSchema(),
  webPageSchema({ url: '/contact/', name: 'ติดต่อเรา', description, type: 'ContactPage' }),
  breadcrumbSchema(crumbs),
)
---

<BaseLayout seo={{ title: 'ติดต่อเรา', description, canonical: '/contact/' }}>
  <JsonLd slot="head" data={jsonLd} />
  <section class="container prose">
    <Breadcrumb crumbs={crumbs} />
    <h1>ติดต่อเรา</h1>
    {/* ข้อมูลที่แสดงมาจาก SITE เดียวกับ Organization Schema → ไม่มีทางไม่ตรงกัน */}
    <address>
      <p><strong>{SITE.legalName}</strong></p>
      <p>{SITE.address.streetAddress} {SITE.address.addressLocality} {SITE.address.addressRegion} {SITE.address.postalCode}</p>
      <p>โทร <a href={`tel:${SITE.telephone}`}>{SITE.telephone}</a> · อีเมล <a href={`mailto:${SITE.email}`}>{SITE.email}</a></p>
      <p>เปิดทำการ จันทร์-ศุกร์ 9:00-18:00 น.</p>
    </address>
    <h2>เดินทางมาอย่างไร</h2>
    <p>...</p>
  </section>
</BaseLayout>
```

### ขั้นที่ 5 - Build, ตรวจ และบันทึกผล

```bash
npm run build          # ต้องจบด้วย ✓ GEO check ผ่านทุกหน้า
npm run preview
```

- [ ] ทุกหน้าในตารางขั้นที่ 1 มี Schema ครบตามที่ระบุ (สคริปต์ตรวจให้)
- [ ] วาง `dist/services/web-development/index.html` ใน validator.schema.org → 0 errors
- [ ] วาง `dist/blog/geo-vs-seo-2026/index.html` ใน Rich Results Test → Article + Breadcrumbs สีเขียว
- [ ] เปิด `dist/index.html` ดูว่า `<title>` ไม่มี " | GeniusCorp" ซ้ำ (isHome ทำงาน)
- [ ] เปิดหน้าบริการใน preview คลิก FAQ เปิด-ปิดได้โดยไม่มี JavaScript (ลอง disable JS ใน DevTools)
- [ ] จดขนาดไฟล์ HTML ของหน้าบริการ (ควรยังต่ำกว่า 50KB แม้มี JSON-LD ครบ) ไว้เทียบกับ WordPress ใน Day 3

---

## 📁 โครงสร้างไฟล์สรุปวันที่ 2 (เฉพาะที่เพิ่ม/เปลี่ยนจาก Day 1)

```
geniuscorp-api/
├── routes/api.php                          ← + GET /api/v1/faqs
├── app/Http/Controllers/Api/V1/FaqController.php
└── app/Http/Resources/FaqResource.php      ← + service (whenLoaded)

geniuscorp-web/
├── package.json                            ← build = astro build && node scripts/check-geo.mjs
├── scripts/
│   ├── check-geo.mjs                       ← ตรวจ canonical, H1, description, JSON-LD, ISO date, @type ตามประเภทหน้า
│   └── check-headings.mjs                  ← (รวมอยู่ใน check-geo แล้ว เก็บไว้เป็นตัวอย่างเดี่ยว)
├── src/
│   ├── lib/
│   │   ├── site.ts                         ← SITE (ข้อมูลองค์กร) + absoluteUrl()
│   │   └── schema.ts                       ← organization/website/webPage/service/article/person/breadcrumb/faq/portfolio/itemList + graph()
│   ├── components/
│   │   ├── SeoHead.astro                   ← title/description/canonical/OG/Twitter/hreflang/noindex
│   │   ├── JsonLd.astro                    ← clean() + escape + set:html
│   │   ├── FaqSection.astro                ← <details>/<summary> Zero-JS
│   │   └── Breadcrumb.astro                ← HTML จาก crumbs array เดียวกับ Schema
│   ├── layouts/BaseLayout.astro            ← รับ seo props + <slot name="head" />
│   └── pages/**                            ← ทุกหน้าใส่ seo={...} + <JsonLd slot="head" />
```

---

## 📝 สรุปประจำวันที่ 2

| หัวข้อ                              | สิ่งที่ทำได้แล้ว                                                                                                    |
| ----------------------------------- | ------------------------------------------------------------------------------------------------------------------- |
| Module 1 - Metadata                 | เขียน Title/Description ที่ถูกเกณฑ์, รู้ว่าต้องเลิก keyword stuffing/boilerplate, มี SeoHead จัดการทุกหน้า + OG ครบสำหรับบทความ |
| Module 2 - Canonical/hreflang/Heading | Canonical absolute ตัด query ทุกหน้า, ตัดสินใจเรื่อง hreflang ได้, H1 เดียว/H2 หัวข้อหลัก/การ์ดใช้ H3               |
| ★ Module 3 - JSON-LD                | JsonLd Component ที่ escape ปลอดภัย, schema.ts ครบ 9 builders, @graph + @id เชื่อมกัน, รู้วิธีปรับเป็น Product/Course/Event |
| ★ Module 4 - FAQ                    | FAQ จาก MySQL → API → FaqSection + FAQPage Schema จากข้อมูลเดียวกัน, กฎเขียน FAQ แบบ answer-ready 6 ข้อ             |
| Module 5 - Validation               | ใช้ validator.schema.org และ Rich Results Test เป็น, แก้ error ที่พบบ่อยได้, มี check-geo.mjs รันทุกครั้งหลัง build     |
| ★ Workshop Day 2                    | GeniusCorp Modern มี GEO Layer ครบทุกหน้าตาม spec และ build ผ่าน GEO check                                           |

### ✅ ตรวจสอบความพร้อมก่อน Day 3 (WordPress GEO/AEO - วันเสาร์ที่ 12 กันยายน)

> ให้แน่ใจว่า:
>
> - `npm run build` ของ GeniusCorp Modern ผ่าน GEO check ครบ (นี่คือ "เป้าหมาย" ที่เราจะทำให้ WordPress ไปถึงใน Day 3)
> - เว็บ WordPress ในเครื่อง (`geniuscorp.test` หรือเทียบเท่า) เข้า `/wp-admin` ได้ ติดตั้ง **Rank Math** (หรือ Yoast) และ **ACF** แล้ว เปิดใช้งาน 2 ตัวนี้ ส่วน Query Monitor และ LiteSpeed Cache ติดตั้งไว้แต่**ยังไม่เปิด**
> - ดาวน์โหลด `geniuscorp-wp-demo.wpress` (เว็บตัวอย่างที่มีปัญหา GEO) และติดตั้ง plugin **All-in-One WP Migration** ไว้สำหรับ Import (จะ Import พร้อมกันในคลาส)
> - ทบทวน schema.ts วันนี้ให้เข้าใจ เพราะ Day 3 เราจะเขียน "สิ่งเดียวกัน" ด้วย PHP ใน functions.php
> - (แนะนำ) อ่าน "Structured data general guidelines" ของ Google โดยเฉพาะหัวข้อ Quality guidelines เรื่องเนื้อหาต้องตรงกับที่แสดง

---

## 📖 แหล่งอ้างอิงประจำวันที่ 2

- Google Search Central - Structured data general guidelines: https://developers.google.com/search/docs/appearance/structured-data/sd-policies
- Google Search Central - Article, Breadcrumb, FAQ, Organization, LocalBusiness, Product, Course, Event structured data: https://developers.google.com/search/docs/appearance/structured-data
- Google Search Central - Consolidate duplicate URLs (Canonical): https://developers.google.com/search/docs/crawling-indexing/consolidate-duplicate-urls
- Google Search Central - Localized versions (hreflang): https://developers.google.com/search/docs/specialty/international/localized-versions
- Google Search Central - Control your title links and snippets: https://developers.google.com/search/docs/appearance/title-link
- Schema.org - Organization, LocalBusiness, Service, Offer, Article, Person, BreadcrumbList, FAQPage, WebPage, ItemList: https://schema.org
- JSON-LD 1.1 Specification (W3C): https://www.w3.org/TR/json-ld11/
- The Open Graph protocol: https://ogp.me
- Schema Markup Validator: https://validator.schema.org
- Google Rich Results Test: https://search.google.com/test/rich-results
- Astro Docs - Astro syntax (`set:html`), Layouts, Named slots, i18n routing: https://docs.astro.build
- Laravel 13 Docs - Eloquent API Resources (conditional attributes, `whenLoaded`): https://laravel.com/docs/13.x/eloquent-resources

---

**💡 คำคมประจำวัน:**

> "Structured Data ไม่ใช่การบอก AI ว่าเราเก่งแค่ไหน แต่คือการบอกว่าเราคือใคร ทำอะไร ราคาเท่าไร ใครเขียน และเมื่อไหร่ อย่างที่เครื่องไม่ต้องเดา และเมื่อทุกอย่างประกอบจากข้อมูลเดียวกัน มันจะถูกต้องเสมอโดยไม่ต้องจำ"

---

_เอกสารจัดทำโดย: อาจารย์สามิตร โกยม | IT Genius Engineering Co., Ltd._
_หลักสูตร ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO) - วันที่ 2 จาก 4_
