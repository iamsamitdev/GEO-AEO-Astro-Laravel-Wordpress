# ทำเว็บให้ติดอันดับ AI Search 2026 - วันที่ 4: E-E-A-T, llms.txt, Deployment & Measurement

**หลักสูตรอบรมออนไลน์เชิงปฏิบัติการ: ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO Full Stack Modern Web)**
**วันที่ 4: สร้างสัญญาณความน่าเชื่อถือ, Sitemap/robots.txt/llms.txt, Deploy ทั้งสองเว็บขึ้น Apache/Nginx พร้อม Rebuild อัตโนมัติ และวัดผล AI Crawlers**
วันที่: อาทิตย์ที่ 13 กันยายน 2569 | เวลา 20:30-23:30 น. | ออนไลน์ผ่าน Zoom (บันทึกวิดีโอย้อนหลัง)
ผู้สอน: อ.สามิตร โกยม

---

## 🎯 วัตถุประสงค์การเรียนรู้ประจำวัน

เมื่อจบการอบรมวันที่ 4 ผู้เรียนจะสามารถ:

1. อธิบาย **E-E-A-T** (Experience, Expertise, Authoritativeness, Trustworthiness) และสร้างสัญญาณที่ AI ตรวจสอบได้: Author Box ที่เชื่อมกับ Person Schema และวันที่แบบ machine-readable ทั้งบน Astro และ WordPress
2. เขียนและส่งต่อ **Answer-Ready Content Guidelines** ให้ทีมคอนเทนต์ พร้อม Block Pattern ใน WordPress และโครง Template ในฐานข้อมูล
3. Generate **sitemap.xml** ที่มี `lastmod` จริงจาก MySQL ผ่าน Laravel API ตอน build บน Astro, ตรวจและปรับ Sitemap ของ Rank Math บน WordPress และรู้แนวทาง Sitemap Index เมื่อเกิน 50,000 URL
4. เขียน **robots.txt** ที่เปิดรับ AI Crawlers อย่างถูกต้อง และสร้าง **llms.txt** ตามสเปก llmstxt.org ทั้งแบบ generate ตอน build (Astro) และแบบ generate ด้วย PHP (WordPress)
5. ปรับ Performance ขั้นสุดท้าย: `astro:assets` (WebP, ขนาดตามจริง, lazy) และเปิด gzip/brotli บน Apache/Nginx ให้ผ่านเป้า TTFB < 0.4s, HTML < 150KB
6. **Deploy Production จริง**: Astro static + Laravel API + WordPress บน Apache/Nginx พร้อม Virtual Host, HTTPS (Let's Encrypt), Redirect (http→https, non-www→www) และสิทธิ์ไฟล์ที่ปลอดภัย
7. ตั้ง **ระบบ Rebuild อัตโนมัติ**: Laravel Observer ยิง Webhook → build Astro ใหม่และ deploy เมื่อเนื้อหาในฐานข้อมูลเปลี่ยน
8. ตั้งค่า **Google Search Console** และ **Bing Webmaster Tools**, ตรวจ **Server Log** หา AI Crawlers, วางแผนทดสอบรายเดือนกับ ChatGPT/Perplexity/Claude/Gemini และใช้ **GEO-Ready Checklist** ฉบับสมบูรณ์กับโปรเจกต์จริง (Master Workshop)

> **หมายเหตุ:** วันนี้เป็น **Master Workshop** ที่ประกอบร่างทั้ง GeniusCorp Modern และ GeniusCorp WP ให้สมบูรณ์แล้วขึ้น Production ผู้สอนจะสาธิตบนเซิร์ฟเวอร์ของสถาบัน (`Ubuntu 24.04 + Apache/Nginx + PHP 8.3 + MariaDB`) ผู้เรียนที่มีเซิร์ฟเวอร์ของตัวเองทำตามได้ทันที ผู้ที่ไม่มีให้ทำส่วน Sitemap/llms.txt/Author Box/Webhook ในเครื่องให้ครบ แล้วนำขั้นตอน Deploy ไปใช้เมื่อมีเซิร์ฟเวอร์
>
> กติกาการเขียนโค้ด: **TypeScript / JavaScript ไม่ใส่ semicolon** ส่วน **PHP ใส่ semicolon ตามปกติ** Shell/Config ตามรูปแบบของเครื่องมือนั้น

---

## 🧭 กำหนดการวันที่ 4 (โดยสังเขป)

| เวลา        | หัวข้อ                                                                                                   |
| ----------- | -------------------------------------------------------------------------------------------------------- |
| 20:30-20:40 | ทบทวน Day 1-3 + ตรวจความพร้อมทั้งสองเว็บ                                                                    |
| 20:40-21:05 | **Module 1** E-E-A-T - Author Box + Person Schema + `<time datetime>` (Astro และ WordPress)                 |
| 21:05-21:20 | **Module 2** Answer-Ready Content Guidelines สำหรับทีมคอนเทนต์                                              |
| 21:20-22:00 | **Module 3** Sitemap (lastmod จริง), robots.txt และ llms.txt ทั้งสองสถาปัตยกรรม                              |
| 22:00-22:15 | **Module 4** Performance for GEO - astro:assets + gzip/brotli + เปรียบเทียบตัวเลขจริง                        |
| 22:15-22:55 | **Module 5** Production Deployment บน Apache/Nginx + HTTPS + Redirect + Rebuild อัตโนมัติผ่าน Webhook        |
| 22:55-23:20 | **Module 6** Measurement & Monitoring - Search Console, Bing, Server Log, แผนทดสอบรายเดือน, GEO-Ready Checklist |
| 23:20-23:30 | **Master Workshop** ตรวจ Checklist ครบทุกข้อ + เปรียบเทียบผล Astro vs WordPress + สรุปคอร์ส                     |

---

## ✅ ทบทวนและตรวจความพร้อม

### เวลา 20:30-20:40 น.

| สิ่งที่ต้องมี                                           | Astro (GeniusCorp Modern)                     | WordPress (GeniusCorp WP)                          |
| ------------------------------------------------------- | --------------------------------------------- | -------------------------------------------------- |
| Build/เว็บทำงาน                                          | `npm run build` ผ่าน GEO check                | เข้าเว็บได้ Checklist 17/20                        |
| Schema ครบ                                               | Organization/WebSite/WebPage/Service/Article/Person/Breadcrumb/FAQ | เหมือนกัน ผ่าน geo-schema.php           |
| ข้อมูลผู้เขียน                                            | `team_members` มี job_title, bio, photo, social_links | Users → Profile + ACF job_title/social_links ครบ |
| ค่ากลางองค์กร                                             | `src/lib/site.ts`                             | `gc_site()` ใน geo-schema.php                       |
| Laravel API                                              | รันอยู่ + Token ใช้ได้                          | -                                                  |

สิ่งที่วันนี้จะเพิ่มเข้าไป และไฟล์ที่เกี่ยวข้อง:

```
Astro                                   Laravel                                 WordPress
├─ components/AuthorBox.astro           ├─ routes/api.php  + /sitemap-entries   ├─ template-parts/author-box.php
├─ pages/sitemap.xml.ts                 ├─ SitemapController.php               ├─ inc/geo-llms.php  (/llms.txt)
├─ pages/llms.txt.ts                    ├─ Observers/ContentObserver.php        ├─ inc/geo-eeat.php  (author box hook)
├─ public/robots.txt                    ├─ Jobs/TriggerRebuild.php             └─ Rank Math sitemap settings
├─ astro.config.mjs (image)             └─ .env  REBUILD_WEBHOOK_URL/SECRET
└─ deploy/ (deploy.sh, apache/nginx conf, GitHub Actions)
```

---

## 📚 Module 1: E-E-A-T - สร้างความน่าเชื่อถือที่ AI ตรวจสอบได้

### เวลา 20:40-21:05 น.

> 💡 **หัวใจของ Module นี้:** AI ไม่ได้ตัดสินความน่าเชื่อถือจาก "คำโฆษณา" แต่จาก "หลักฐานที่ตรวจสอบได้": ใครเขียน คนนั้นมีตัวตนที่ไหน ตำแหน่งอะไร เขียนเมื่อไหร่ แก้ล่าสุดเมื่อไหร่ องค์กรนี้ติดต่อได้จริงไหม เว็บที่ Audit มีหน้าโปรไฟล์วิทยากรอยู่แล้วแต่บทความไม่ระบุผู้เขียน นั่นคือการ "เสีย E-E-A-T ฟรี" ที่แก้ได้ในไม่กี่บรรทัด

---

### 1.1 E-E-A-T สำคัญกับ GEO อย่างไร

E-E-A-T มาจาก Search Quality Rater Guidelines ของ Google (เพิ่มตัว E แรก = Experience ในปี 2022) ไม่ใช่ "ปัจจัยจัดอันดับ" โดยตรง แต่เป็นกรอบที่ระบบของ Google และ AI Engines ใช้ประเมินว่าเนื้อหาน่าเชื่อถือพอที่จะนำไปตอบผู้ใช้หรือไม่ โดยเฉพาะหัวข้อ YMYL (Your Money or Your Life: การเงิน สุขภาพ กฎหมาย) ซึ่งเว็บบริการ B2B ส่วนใหญ่อยู่ในกลุ่มนี้ (ลูกค้าจ่ายเงินหลักแสน)

| ตัวอักษร             | ความหมาย                              | สัญญาณที่เครื่องอ่านได้ (สิ่งที่เราจะทำ)                                                              |
| -------------------- | ------------------------------------- | ----------------------------------------------------------------------------------------------------- |
| **Experience**       | ผู้เขียนมีประสบการณ์ตรงกับเรื่องที่เขียน | Author Box ระบุประสบการณ์ ("ส่งมอบ 40 โปรเจกต์"), ผลงาน (Portfolio) ที่เชื่อมกับบริการ, ตัวเลขจริงในเนื้อหา |
| **Expertise**        | ผู้เขียนมีความเชี่ยวชาญ                 | `Person.jobTitle`, `Person.description` (bio), บทความหลายชิ้นของผู้เขียนคนเดียวกัน (author archive)        |
| **Authoritativeness** | เป็นที่ยอมรับจากภายนอก                | `Person.sameAs` (LinkedIn, GitHub), `Organization.sameAs`, การถูกอ้างอิงจากเว็บอื่น (นอกเหนือการควบคุมโค้ด) |
| **Trustworthiness**  | ตรวจสอบและติดต่อได้                    | `LocalBusiness` มีที่อยู่/เบอร์/อีเมลตรงกับหน้า Contact, HTTPS, นโยบายความเป็นส่วนตัว, วันที่เผยแพร่/แก้ไขชัดเจน |

สิ่งที่ Perplexity และ ChatGPT Search ทำเมื่อเลือกแหล่งอ้างอิงคือให้น้ำหนักกับ **ความสด (recency)** และ **ความชัดเจนของแหล่งที่มา** ดังนั้น `dateModified` ที่จริงและ author ที่มีตัวตน คือสองสิ่งที่ให้ผลเร็วที่สุด

### 1.2 Author Box บน Astro (AuthorBox.astro)

```astro
---
// src/components/AuthorBox.astro
// กล่องผู้เขียนท้ายบทความ: รูป ชื่อ ตำแหน่ง bio ลิงก์โปรไฟล์ + social
// id ของ element ตรงกับ Person @id (…/team/#slug) และข้อมูลมาจาก TeamMember เดียวกับ personSchema()
import type { TeamMember } from '../lib/types'

interface Props {
  author: TeamMember
  publishedAt?: string | null
  updatedAt?: string | null
}

const { author, publishedAt, updatedAt } = Astro.props

const fmt = (iso: string) =>
  new Date(iso).toLocaleDateString('th-TH', { year: 'numeric', month: 'long', day: 'numeric' })
const isUpdated = updatedAt && publishedAt && new Date(updatedAt) > new Date(publishedAt)

const hostname = (url: string) => new URL(url).hostname.replace(/^www\./, '')
---

<aside class="author-box" aria-label="เกี่ยวกับผู้เขียน">
  {author.photo && (
    <img src={author.photo} alt={author.name} width="96" height="96" loading="lazy" class="author-photo" />
  )}
  <div class="author-body">
    <p class="author-label">เขียนโดย</p>
    <p class="author-name">
      <a href={author.url} rel="author">{author.name}</a>
      <span class="author-title"> · {author.job_title}</span>
    </p>
    {author.bio && <p class="author-bio">{author.bio}</p>}

    {author.social_links.length > 0 && (
      <ul class="author-social">
        {author.social_links.map((link) => (
          <li><a href={link} rel="me noopener" target="_blank">{hostname(link)}</a></li>
        ))}
      </ul>
    )}

    {(publishedAt || updatedAt) && (
      <p class="author-dates">
        {publishedAt && (<>เผยแพร่ <time datetime={publishedAt}>{fmt(publishedAt)}</time></>)}
        {isUpdated && updatedAt && (<> · แก้ไขล่าสุด <time datetime={updatedAt}>{fmt(updatedAt)}</time></>)}
      </p>
    )}
  </div>
</aside>

<style>
  .author-box { display: flex; gap: 1.25rem; margin: 3rem 0 0; padding: 1.5rem; border: 1px solid #dde4ec; border-radius: 12px; background: #f6f8fb; }
  .author-photo { width: 96px; height: 96px; border-radius: 50%; object-fit: cover; flex-shrink: 0; }
  .author-label { margin: 0; font-size: .8rem; text-transform: uppercase; letter-spacing: .08em; color: #8a97a6; }
  .author-name { margin: .2rem 0; font-weight: 700; font-size: 1.05rem; }
  .author-title { font-weight: 400; color: #5a6a7d; }
  .author-bio { margin: .4rem 0; color: #4a5a78; line-height: 1.6; }
  .author-social { display: flex; gap: .75rem; list-style: none; padding: 0; margin: .5rem 0; font-size: .9rem; }
  .author-dates { margin: .5rem 0 0; font-size: .85rem; color: #8a97a6; }
</style>
```

ใส่ในหน้าบทความ (แทน comment `{/* Day 4 */}` ของ Day 2):

```astro
---
// src/pages/blog/[slug].astro (เพิ่ม)
import AuthorBox from '../../components/AuthorBox.astro'
---
    <div set:html={article.body} />

    <AuthorBox author={article.author} publishedAt={article.published_at} updatedAt={article.updated_at} />
```

### 1.3 วันที่แบบ machine-readable ด้วย `<time datetime>`

หลักการ: **ข้อความที่คนอ่าน** เป็นภาษาไทย/พ.ศ. ได้ แต่ **attribute `datetime`** ต้องเป็น ISO 8601 (ค.ศ.) เสมอ และต้องตรงกับ `datePublished`/`dateModified` ใน JSON-LD และ `article:published_time` ใน OG - สามที่นี้ต้องมาจากค่าเดียวกัน

```html
<!-- ✅ ถูก: คนอ่านเห็น พ.ศ. เครื่องอ่าน ISO -->
<time datetime="2026-08-16T20:30:00+07:00">16 สิงหาคม 2569</time>

<!-- ❌ ผิด: ไม่มี datetime → เครื่องต้องเดาว่า 2569 คือปีอะไร -->
<span class="date">16 สิงหาคม 2569</span>

<!-- ❌ ผิด: datetime เป็น พ.ศ. → เครื่องเข้าใจว่าปี 2569 ค.ศ. (อีก 543 ปีข้างหน้า) -->
<time datetime="2569-08-16">16 สิงหาคม 2569</time>
```

> ⚠️ **ปัญหา พ.ศ. ใน JSON-LD/sitemap พบบ่อยมากในเว็บไทย** เพราะ WordPress ที่ตั้ง locale เป็นไทยจะแสดงปี พ.ศ. และ plugin บางตัวนำค่านั้นไปใส่ใน Schema ตรง ๆ ให้ตรวจ `datePublished` ใน validator เสมอว่าเป็นปี 20xx

**กฎ "แก้ไขล่าสุด":** แสดง `dateModified` เฉพาะเมื่อแก้เนื้อหาจริง (ไม่ใช่แก้ typo หรือ re-save) เพราะ AI ให้น้ำหนักความสด ถ้าทุกบทความ "แก้ไขล่าสุดวันนี้" ทั้งเว็บ จะกลายเป็นสัญญาณปลอมที่ทำลายความน่าเชื่อถือ ใน Laravel `updated_at` เปลี่ยนทุกครั้งที่ save จึงควรเพิ่มฟิลด์ `content_updated_at` ที่อัปเดตเฉพาะเมื่อ `body`/`title` เปลี่ยน:

```php
<?php
// app/Models/Article.php (เพิ่ม) - อัปเดต content_updated_at เฉพาะเมื่อเนื้อหาเปลี่ยนจริง

protected static function booted(): void
{
    static::saving(function (Article $article) {
        if ($article->isDirty(['title', 'body', 'excerpt'])) {
            $article->content_updated_at = now();
        }
    });
}
```

```php
// migration เพิ่มคอลัมน์
$table->timestamp('content_updated_at')->nullable()->after('published_at');
```

แล้วใน `ArticleResource` ส่ง `'updated_at' => ($this->content_updated_at ?? $this->published_at)?->toIso8601String()` แทน `updated_at` ดิบ ฝั่ง Astro ไม่ต้องแก้อะไร

### 1.4 Author Box บน WordPress (Template Part + Hook)

```php
<?php
// inc/geo-eeat.php

defined('ABSPATH') || exit;

// ACF fields เพิ่มให้ User: job_title, social_links (repeater url) - หรือใช้ user meta ธรรมดา
add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }
    acf_add_local_field_group([
        'key'    => 'group_gc_user',
        'title'  => 'ข้อมูลผู้เขียน (E-E-A-T)',
        'fields' => [
            ['key' => 'field_gc_job_title', 'label' => 'ตำแหน่ง', 'name' => 'job_title', 'type' => 'text', 'required' => 1],
            [
                'key' => 'field_gc_social_links', 'label' => 'โปรไฟล์ภายนอก (LinkedIn, GitHub, ...)', 'name' => 'social_links',
                'type' => 'repeater', 'button_label' => 'เพิ่มลิงก์',
                'sub_fields' => [['key' => 'field_gc_social_url', 'label' => 'URL', 'name' => 'url', 'type' => 'url', 'required' => 1]],
            ],
        ],
        'location' => [[['param' => 'user_form', 'operator' => '==', 'value' => 'all']]],
    ]);
});

// แทรก Author Box ท้ายเนื้อหาบทความอัตโนมัติ (ไม่ต้องแก้ template ของ theme)
add_filter('the_content', function (string $content): string {
    if (! is_singular('post') || ! in_the_loop() || ! is_main_query()) {
        return $content;
    }

    ob_start();
    get_template_part('template-parts/author-box', null, ['post' => get_post()]);
    return $content . ob_get_clean();
}, 20);
```

```php
<?php
// template-parts/author-box.php

defined('ABSPATH') || exit;

$post      = $args['post'] ?? get_post();
$author_id = (int) $post->post_author;
$job_title = function_exists('get_field') ? (string) get_field('job_title', 'user_' . $author_id) : '';
$bio       = get_the_author_meta('description', $author_id);
$social    = function_exists('get_field') ? (array) get_field('social_links', 'user_' . $author_id) : [];

$published = get_the_date('c', $post);            // ISO 8601 (+07:00 ตาม timezone ของเว็บ)
$modified  = get_the_modified_date('c', $post);
$is_updated = strtotime($modified) - strtotime($published) > DAY_IN_SECONDS;   // แสดง "แก้ไข" เมื่อห่างกันเกิน 1 วัน
?>
<aside class="author-box" aria-label="เกี่ยวกับผู้เขียน">
    <?php echo get_avatar($author_id, 96, '', get_the_author_meta('display_name', $author_id), ['class' => 'author-photo', 'loading' => 'lazy']); ?>
    <div class="author-body">
        <p class="author-label">เขียนโดย</p>
        <p class="author-name">
            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" rel="author"><?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?></a>
            <?php if ($job_title) : ?><span class="author-title"> · <?php echo esc_html($job_title); ?></span><?php endif; ?>
        </p>
        <?php if ($bio) : ?><p class="author-bio"><?php echo esc_html($bio); ?></p><?php endif; ?>
        <?php if ($social) : ?>
            <ul class="author-social">
                <?php foreach ($social as $row) : $url = $row['url'] ?? ''; if (! $url) continue; ?>
                    <li><a href="<?php echo esc_url($url); ?>" rel="me noopener" target="_blank"><?php echo esc_html(preg_replace('/^www\./', '', wp_parse_url($url, PHP_URL_HOST))); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <p class="author-dates">
            เผยแพร่ <time datetime="<?php echo esc_attr($published); ?>"><?php echo esc_html(get_the_date('j F Y', $post)); ?></time>
            <?php if ($is_updated) : ?> · แก้ไขล่าสุด <time datetime="<?php echo esc_attr($modified); ?>"><?php echo esc_html(get_the_modified_date('j F Y', $post)); ?></time><?php endif; ?>
        </p>
    </div>
</aside>
```

> 📌 `get_the_date('c')` ให้ ISO 8601 พร้อม timezone ของเว็บ ส่วน `get_the_date('j F Y')` ให้ข้อความตาม locale (ถ้าเว็บตั้ง locale ไทยจะเป็น "16 สิงหาคม 2569" อัตโนมัติ) ตรงกับหลักการ "คนอ่าน พ.ศ. เครื่องอ่าน ISO" · CSS ของ `.author-box` ใช้ชุดเดียวกับฝั่ง Astro ใส่ใน `style.css` ของ Child Theme

### 1.5 หน้าโปรไฟล์ผู้เขียน (Author Archive) ที่ AI ตามลิงก์ไปเจอ

`Person.@id` ทั้งสองฝั่งชี้ไปหน้าโปรไฟล์ (Astro: `/team/#slug`, WP: `/author/username/`) หน้านั้นต้อง **มีข้อมูลจริง** ไม่ใช่รายการโพสต์เปล่า ๆ:

- Astro: หน้า `/team/` มี `id={member.slug}` ที่การ์ดแล้ว (Day 1) และมี `personSchema` ทุกคน (Day 2) ✅
- WordPress: `gc_build_graph()` ใส่ `ProfilePage + Person` ในหน้า author แล้ว (Day 3) แต่ต้องให้ theme แสดง bio/ตำแหน่ง/รูปในหน้า `author.php` ด้วย - override ใน Child Theme โดยใส่ `get_template_part('template-parts/author-box', null, ['post' => null])` ไว้บนสุด (ปรับ template part ให้รับ `author_id` ตรง ๆ ได้)

> 🧪 **ทดสอบ Module 1:** หน้าบทความทั้งสองฝั่ง → เห็น Author Box ท้ายบทความ · View Source → `<time datetime="2026-...+07:00">` และ `Person` ใน JSON-LD มี `jobTitle`, `sameAs` · คลิกชื่อผู้เขียน → ไปหน้าโปรไฟล์ที่มีข้อมูลจริง · Rich Results Test → Article มี author ที่ resolve ได้ (ไม่มี warning "author.url missing")

---

## 📚 Module 2: Answer-Ready Content Guidelines

### เวลา 21:05-21:20 น.

> 💡 **หัวใจของ Module นี้:** โค้ดทั้งหมดที่เราเขียนมา 3 วันจะไร้ค่าถ้าเนื้อหาที่ทีมใส่เข้ามาไม่ "ตอบคำถาม" Guidelines นี้คือเอกสารที่นักพัฒนาส่งมอบให้ทีมคอนเทนต์พร้อมเครื่องมือ (Pattern/Template) เพื่อให้ทำตามได้โดยไม่ต้องเข้าใจ GEO

---

### 2.1 หลัก Inverted Pyramid สำหรับ AI

```
┌─────────────────────────────────────────────────┐
│  ย่อหน้าแรก (2-3 ประโยค)                          │  ← AI ดึงไปตอบได้ทันที (และเป็น excerpt/description)
│  ตอบคำถามหลัก: อะไร / เท่าไร / เมื่อไหร่ / ใคร      │
├─────────────────────────────────────────────────┤
│  H2 คำถามที่ 1 → ย่อหน้าตอบ + ตัวเลข/ตาราง         │  ← แต่ละ H2 คือ chunk ที่ AI หยิบไปตอบคำถามเฉพาะ
│  H2 คำถามที่ 2 → ...                              │
│  H2 คำถามที่ 3 → ...                              │
├─────────────────────────────────────────────────┤
│  รายละเอียดเชิงลึก / ขั้นตอน / ข้อยกเว้น             │  ← สำหรับคนที่อ่านต่อ
├─────────────────────────────────────────────────┤
│  FAQ 4-6 ข้อ                                     │  ← FAQPage Schema
│  Author Box + วันที่                               │  ← E-E-A-T
└─────────────────────────────────────────────────┘
```

### 2.2 Guidelines 10 ข้อสำหรับทีมคอนเทนต์ (เอกสารส่งมอบ)

| #  | กฎ                                                            | ทำไม (อ้างอิง)                                                              | ตัวอย่าง                                                                                 |
| -- | ------------------------------------------------------------- | --------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| 1  | ย่อหน้าแรกตอบคำถามหลักจบใน 2-3 ประโยค                          | Inverted Pyramid; AI ดึงย่อหน้าแรกบ่อยที่สุด                                   | "การทำ GEO ใช้เวลา 4-8 สัปดาห์จึงเห็นผล โดยเริ่มจาก Structured Data ซึ่งมีผลมากที่สุด..."      |
| 2  | ใช้ H2 เป็นรูปแบบคำถาม เมื่อเนื้อหาส่วนนั้นตอบคำถาม               | ตรงกับ query ที่ผู้ใช้ถาม AI; chunking ตาม heading                             | `## GEO ต่างจาก SEO อย่างไร` แทน `## ความแตกต่าง`                                           |
| 3  | ใส่ตัวเลข สถิติ หน่วย ทุกครั้งที่ทำได้                            | Princeton GEO: Statistics Addition +30-40%                                    | "ลดเวลาโหลดจาก 4.2 เหลือ 0.8 วินาที" แทน "เร็วขึ้นมาก"                                     |
| 4  | อ้างอิงแหล่งที่มาพร้อมลิงก์                                      | Princeton GEO: Cite Sources +30-40%                                            | "(อ้างอิง: Google Search Central, 2026)" + ลิงก์                                            |
| 5  | ใส่คำพูดจากผู้เชี่ยวชาญ/ลูกค้า ที่ระบุชื่อและตำแหน่ง               | Princeton GEO: Quotation Addition                                              | "คุณสมชาย CTO ของ Siam Logistics กล่าวว่า ..."                                              |
| 6  | ใช้ตารางกับข้อมูลเปรียบเทียบ และ bullet กับรายการ 3+ รายการ         | AI แปลงตาราง HTML เป็นข้อมูลมีโครงสร้างได้ดี                                    | ตาราง WordPress vs Astro                                                                  |
| 7  | เขียนชื่อสิ่งที่พูดถึงเต็ม ไม่ใช้ "เรา/มัน/สิ่งนี้" ลอย ๆ           | AI ตัดย่อหน้าไปใช้นอกบริบท ต้องเข้าใจได้ในตัวเอง                                | "GeniusCorp ให้บริการ..." แทน "เราให้บริการ..."                                            |
| 8  | Excerpt 70-170 ตัวอักษร ที่สรุปเนื้อหาจริงและมีตัวเลข             | = meta description = Schema description                                       | (ระบบบังคับแล้วทั้งสองฝั่ง)                                                                |
| 9  | FAQ 4-6 ข้อ ตามกฎ 6 ข้อของ Day 2                              | FAQPage Schema; คำถามจริง                                                     |                                                                                          |
| 10 | อัปเดตเนื้อหาเก่าที่ยังมีคนอ่าน ทุก 6-12 เดือน และแก้ "จริง"        | Recency; อย่า re-save เพื่อให้ดูใหม่                                           | เพิ่มตัวเลขปีล่าสุด, แก้ข้อมูลที่เปลี่ยน                                                    |

**สิ่งที่ห้ามทำ:** keyword stuffing, เนื้อหาที่ AI เขียนแล้วไม่ตรวจข้อเท็จจริง, "แก้ไขล่าสุด" ปลอม, FAQ ที่ตอบว่า "กรุณาติดต่อเรา", ซ่อนเนื้อหาสำคัญใน tab/accordion ที่โหลดด้วย JS, ใส่ Schema ที่ไม่ตรงกับเนื้อหาที่แสดง

### 2.3 เครื่องมือช่วยทีม: Block Pattern ใน WordPress และ Template ในฐานข้อมูล

**WordPress - Block Pattern "หน้าบริการมาตรฐาน"** ให้ทีมกดใส่แล้วเติมข้อความ:

```php
<?php
// inc/geo-eeat.php (ต่อ) - Block Pattern

add_action('init', function () {
    register_block_pattern_category('geniuscorp', ['label' => 'GeniusCorp GEO']);

    register_block_pattern('geniuscorp/service-page', [
        'title'       => 'หน้าบริการมาตรฐาน (Answer-Ready)',
        'categories'  => ['geniuscorp'],
        'postTypes'   => ['service'],
        'description' => 'โครงหน้าบริการ: สรุป → เหมาะกับใคร → ราคาและระยะเวลา → ขั้นตอน → ผลลัพธ์',
        'content'     => <<<'HTML'
<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">[ชื่อบริการ] คือ [อธิบาย 1 ประโยค] เหมาะกับ [กลุ่มเป้าหมาย] ราคาเริ่มต้น [ตัวเลข] บาท ใช้เวลา [ตัวเลข] วัน</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>บริการนี้เหมาะกับใคร</h2>
<!-- /wp:heading -->
<!-- wp:paragraph --><p>...</p><!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง</h2>
<!-- /wp:heading -->
<!-- wp:table --><figure class="wp-block-table"><table><thead><tr><th>แพ็กเกจ</th><th>ราคา</th><th>รวม</th></tr></thead><tbody><tr><td>...</td><td>...</td><td>...</td></tr></tbody></table></figure><!-- /wp:table -->

<!-- wp:heading -->
<h2>ขั้นตอนการทำงานเป็นอย่างไร ใช้เวลากี่วัน</h2>
<!-- /wp:heading -->
<!-- wp:list {"ordered":true} --><ol><li>...</li></ol><!-- /wp:list -->

<!-- wp:heading -->
<h2>ผลลัพธ์ที่ลูกค้าได้รับ</h2>
<!-- /wp:heading -->
<!-- wp:paragraph --><p>ตัวอย่าง: [ชื่อลูกค้า] [ตัวเลขผลลัพธ์] (ดูผลงาน)</p><!-- /wp:paragraph -->
HTML,
    ]);
});
```

**Laravel/Astro - Template ในฐานข้อมูล:** เพิ่มคอลัมน์ `body_template` หรือใช้ Seeder เป็นตัวอย่าง และเมื่อสร้าง Admin (เช่น Filament) ให้ปุ่ม "ใส่โครงมาตรฐาน" เติม HTML แบบเดียวกับ Pattern ข้างบนลงใน `body` ส่วน FAQ มีตารางแยกอยู่แล้ว

### 2.4 การทำงานร่วมกันระหว่างนักพัฒนากับทีมคอนเทนต์

| บทบาท        | รับผิดชอบ                                                                                            | เครื่องมือ                                       |
| ------------ | ---------------------------------------------------------------------------------------------------- | ------------------------------------------------ |
| นักพัฒนา     | โครงสร้าง HTML, Schema, Sitemap, llms.txt, Performance, บังคับกฎด้วยโค้ด (excerpt, heading), Rebuild     | Child Theme / Astro + Laravel, check-geo.mjs      |
| ทีมคอนเทนต์  | เนื้อหาตาม Guidelines 10 ข้อ, FAQ, Excerpt, รูป 1200×630, อัปเดตเนื้อหาเก่า                             | Block Pattern / Admin, guideline ในหน้าแก้ไข      |
| ทั้งคู่       | Review รายเดือน: ดูผล Search Console/Bing/Server Log + ผลทดสอบถาม AI (Module 6) แล้วปรับเนื้อหาที่ยังไม่ถูกอ้างอิง | ตาราง Monthly GEO Review                        |

---

## 📚 Module 3: Sitemap, robots.txt & llms.txt

### เวลา 21:20-22:00 น.

> 💡 **หัวใจของ Module นี้:** Sitemap คือ "รายการหน้าพร้อมวันที่แก้ล่าสุด" ที่ crawler ใช้ตัดสินใจว่าจะมาอ่านหน้าไหนก่อน เว็บที่ Audit มี 30,000 URL ที่ lastmod เป็นปี 2019 ทั้งหมด ทั้งที่อัปเดตทุกวัน ผลคือ crawler เลิกเชื่อ sitemap และ AI ไม่รู้ว่ามีของใหม่ robots.txt คือประตู และ llms.txt คือ "แผนที่ฉบับ AI" ที่บอกว่าเว็บนี้คืออะไร มีอะไรสำคัญ ทั้งสามต้องสร้างจากข้อมูลจริง ไม่ใช่เขียนมือแล้วลืม

---

### 3.1 Laravel: endpoint ส่งรายการ URL พร้อม lastmod จริง

แทนที่ Astro จะเรียกทุก endpoint มาประกอบ sitemap เอง เราให้ Laravel ส่ง "รายการหน้าทั้งหมดที่ควรอยู่ใน sitemap" มาที่เดียว เพราะ Laravel รู้ดีที่สุดว่าอะไรเผยแพร่แล้วและแก้เมื่อไหร่ (และ endpoint นี้ใช้ซ้ำสำหรับ llms.txt)

```php
<?php
// app/Http/Controllers/Api/V1/SitemapController.php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;

class SitemapController extends Controller
{
    /**
     * GET /api/v1/sitemap-entries
     * คืน [{ url, lastmod, changefreq, priority, type, title, summary }]
     * - lastmod = วันที่แก้เนื้อหาจริง (content_updated_at ถ้ามี) ไม่ใช่ updated_at ดิบ
     * - หน้า static (about/contact/team) ใช้ lastmod = วันที่ข้อมูลที่เกี่ยวข้องเปลี่ยนล่าสุด
     */
    public function index(): JsonResponse
    {
        $entries = collect();

        $services = Service::published()->orderBy('sort_order')->get();
        $articles = Article::published()->with('author')->orderByDesc('published_at')->get();
        $portfolios = Portfolio::published()->orderByDesc('completed_at')->get();
        $teamUpdated = TeamMember::max('updated_at');

        // หน้าแรก: lastmod = อะไรก็ตามที่เปลี่ยนล่าสุด (เพราะหน้าแรกรวมทุกอย่าง)
        $latest = collect([
            $services->max('updated_at'),
            $articles->max('updated_at'),
            $portfolios->max('updated_at'),
            $teamUpdated,
        ])->filter()->max();

        $entries->push($this->entry('/', $latest, 'weekly', 1.0, 'home', config('app.name'), null));
        $entries->push($this->entry('/about/', $teamUpdated, 'monthly', 0.6, 'page', 'เกี่ยวกับเรา', null));
        $entries->push($this->entry('/contact/', $teamUpdated, 'yearly', 0.5, 'page', 'ติดต่อเรา', null));
        $entries->push($this->entry('/team/', $teamUpdated, 'monthly', 0.6, 'page', 'ทีมงาน', null));
        $entries->push($this->entry('/services/', $services->max('updated_at'), 'weekly', 0.9, 'collection', 'บริการ', null));
        $entries->push($this->entry('/portfolio/', $portfolios->max('updated_at'), 'monthly', 0.7, 'collection', 'ผลงาน', null));
        $entries->push($this->entry('/blog/', $articles->max('updated_at'), 'daily', 0.8, 'collection', 'บทความ', null));

        foreach ($services as $s) {
            $entries->push($this->entry('/services/' . $s->slug . '/', $s->updated_at, 'monthly', 0.9, 'service', $s->name, $s->short_description));
        }
        foreach ($portfolios as $p) {
            $entries->push($this->entry('/portfolio/' . $p->slug . '/', $p->updated_at, 'yearly', 0.6, 'portfolio', $p->title, $p->summary));
        }
        foreach ($articles as $a) {
            $entries->push($this->entry('/blog/' . $a->slug . '/', $a->content_updated_at ?? $a->published_at, 'monthly', 0.7, 'article', $a->title, $a->excerpt));
        }

        return response()->json(['data' => $entries->values()]);
    }

    private function entry(string $url, $lastmod, string $changefreq, float $priority, string $type, ?string $title, ?string $summary): array
    {
        return [
            'url'        => $url,
            'lastmod'    => $lastmod ? \Illuminate\Support\Carbon::parse($lastmod)->toIso8601String() : null,
            'changefreq' => $changefreq,
            'priority'   => $priority,
            'type'       => $type,
            'title'      => $title,
            'summary'    => $summary,
        ];
    }
}
```

```php
// routes/api.php (เพิ่มใน group v1)
Route::get('/sitemap-entries', [SitemapController::class, 'index'])->name('sitemap.entries');
```

### 3.2 Astro: Generate sitemap.xml ตอน build ด้วย Endpoint

Astro มี `@astrojs/sitemap` integration ที่สร้าง sitemap จากรายการหน้าอัตโนมัติ แต่มัน **ไม่รู้ lastmod** ของแต่ละหน้า (ต้องใช้ `serialize()` เติมเอง) เราจึงเขียน **static endpoint** ของเราเองที่ใช้ข้อมูลจาก Laravel ตรง ๆ ควบคุมได้ 100%

```ts
// src/lib/api.ts (เพิ่ม)
export interface SitemapEntry {
  url: string
  lastmod: string | null
  changefreq: 'always' | 'hourly' | 'daily' | 'weekly' | 'monthly' | 'yearly' | 'never'
  priority: number
  type: string
  title: string | null
  summary: string | null
}

export const getSitemapEntries = () => apiGet<SitemapEntry[]>('/sitemap-entries')
```

```ts
// src/pages/sitemap.xml.ts
// Static endpoint: ไฟล์นี้กลายเป็น dist/sitemap.xml ตอน build (ไม่ใช่ .astro เพราะ output ไม่ใช่ HTML)
import type { APIRoute } from 'astro'
import { getSitemapEntries } from '../lib/api'
import { absoluteUrl } from '../lib/site'

const escapeXml = (s: string) =>
  s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;')

export const GET: APIRoute = async () => {
  const entries = await getSitemapEntries()

  // กัน URL ซ้ำ (เช่น API ส่ง / มาสองครั้ง) และเรียงตาม priority
  const seen = new Set<string>()
  const unique = entries.filter((e) => {
    if (seen.has(e.url)) return false
    seen.add(e.url)
    return true
  })

  const urls = unique
    .map((e) => {
      const loc = escapeXml(absoluteUrl(e.url))
      const lastmod = e.lastmod ? `<lastmod>${e.lastmod}</lastmod>` : ''
      return `  <url>
    <loc>${loc}</loc>
    ${lastmod}
    <changefreq>${e.changefreq}</changefreq>
    <priority>${e.priority.toFixed(1)}</priority>
  </url>`
    })
    .join('\n')

  const xml = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${urls}
</urlset>
`

  return new Response(xml, {
    headers: { 'Content-Type': 'application/xml; charset=utf-8' },
  })
}
```

> 📌 **ทำไมไม่มี `export const prerender = true`:** โปรเจกต์เราเป็น `output: 'static'` ทุก endpoint ถูก prerender เป็นไฟล์ตอน build อยู่แล้ว ถ้าโปรเจกต์เป็น hybrid/server ต้องเพิ่มบรรทัดนี้ · **`changefreq` และ `priority`** Google ระบุว่าไม่ใช้สองค่านี้แล้ว (ใช้ `lastmod` เป็นหลัก) แต่ Bing ยังอ่าน จึงใส่ไว้ไม่เสียหาย

**เมื่อ URL เกิน 50,000 หรือไฟล์เกิน 50MB → Sitemap Index:** แบ่งเป็นหลายไฟล์ตามประเภท แล้วมีไฟล์ index ชี้:

```ts
// src/pages/sitemap-index.xml.ts (ใช้เมื่อเว็บใหญ่) - แนวคิด
// - สร้าง sitemap-services.xml, sitemap-articles-1.xml, sitemap-articles-2.xml ... (ไฟล์ละ ≤ 50,000 URL)
//   ด้วย getStaticPaths ใน src/pages/sitemap-articles-[page].xml.ts
// - sitemap-index.xml:
//   <sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
//     <sitemap><loc>https://www.geniuscorp.example/sitemap-services.xml</loc><lastmod>...</lastmod></sitemap>
//     <sitemap><loc>https://www.geniuscorp.example/sitemap-articles-1.xml</loc><lastmod>...</lastmod></sitemap>
//   </sitemapindex>
// - robots.txt ชี้ที่ sitemap-index.xml แทน
```

### 3.3 WordPress: ตรวจและปรับ Sitemap ของ Rank Math

Rank Math สร้าง `/sitemap_index.xml` ให้แล้ว (WordPress core ก็มี `/wp-sitemap.xml` แต่ Rank Math ปิดให้และของ Rank Math ดีกว่า) สิ่งที่ต้องตรวจตาม Checklist ข้อ 16:

| ตรวจ                                           | ที่ตั้งค่า / วิธีแก้                                                                                                  |
| ---------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| มี post type `service` ใน sitemap              | Rank Math → Sitemap Settings → Services → Include in Sitemap = On (หรือ filter `rank_math/sitemap/post_types` ที่ทำใน Day 3) |
| ไม่มี URL ขยะ                                   | ปิด Attachments, Tags ที่ว่าง, Author (ถ้าไม่ใช้ author archive - แต่เราใช้! เปิดไว้), Format archives                     |
| `lastmod` เป็นวันแก้จริง                        | Rank Math ใช้ `post_modified` → ปัญหาของ Demo Site คือ import ทำให้ทุกโพสต์ modified วันเดียวกัน แก้ด้วย SQL ครั้งเดียว (ด้านล่าง) และหลังจากนี้จะถูกต้องเอง |
| ไม่มี noindex URL ใน sitemap                     | Rank Math ตัดให้อัตโนมัติ                                                                                             |
| หน้า static ที่สร้างด้วย Page Builder มี lastmod ถูก | ถ้าแก้ผ่าน builder แต่ `post_modified` ไม่เปลี่ยน (บาง builder บันทึกเป็น meta) ให้ใช้ filter `rank_math/sitemap/entry`      |

```sql
-- แก้ lastmod ที่เพี้ยนจาก import ครั้งเดียว: ให้ post_modified = post_date สำหรับโพสต์ที่ถูก import พร้อมกัน
-- (รันใน phpMyAdmin/HeidiSQL หลัง backup) - เฉพาะโพสต์ที่ modified ตรงกับวันที่ import
UPDATE wp_posts
SET post_modified = post_date, post_modified_gmt = post_date_gmt
WHERE post_type IN ('post', 'page', 'service')
  AND post_status = 'publish'
  AND DATE(post_modified) = '2026-09-12';
```

```php
// inc/geo-llms.php (หรือ geo-metadata.php) - lastmod สำหรับหน้าที่ Page Builder บันทึกเป็น meta
add_filter('rank_math/sitemap/entry', function (array $url, string $type, $object) {
    if ($type === 'post' && $object instanceof WP_Post) {
        $builder_modified = get_post_meta($object->ID, '_elementor_edit_time', true);   // ตัวอย่าง Elementor
        if ($builder_modified && (int) $builder_modified > strtotime($object->post_modified_gmt)) {
            $url['mod'] = gmdate('c', (int) $builder_modified);
        }
    }
    return $url;
}, 10, 3);
```

### 3.4 robots.txt ที่เปิดรับ AI Crawlers และชี้ Sitemap ของตนเอง

**Astro** - ไฟล์ static ใน `public/robots.txt` (ถูกคัดลอกไป `dist/` ตรง ๆ):

```
# robots.txt - GeniusCorp Modern
# นโยบาย: เปิดให้ทุก crawler รวม AI Search และ AI training
# ถ้าต้องการไม่ให้ใช้ฝึกโมเดล (แต่ยังค้นเจอ) ให้เปิด comment บล็อกด้านล่างเฉพาะตัวฝึก

User-agent: *
Allow: /
Disallow: /api/
Disallow: /_astro/

# --- ตัวอย่าง: ปิดเฉพาะการเก็บข้อมูลฝึกโมเดล (ไม่กระทบ AI Search) ---
# User-agent: GPTBot
# Disallow: /
# User-agent: ClaudeBot
# Disallow: /
# User-agent: Google-Extended
# Disallow: /
# User-agent: CCBot
# Disallow: /

Sitemap: https://www.geniuscorp.example/sitemap.xml
```

**WordPress** - Rank Math → General Settings → Edit robots.txt (เขียนทับไฟล์เสมือน) หรือวางไฟล์จริงที่ root:

```
User-agent: *
Allow: /
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php
Disallow: /wp-login.php
Disallow: /?s=
Disallow: /search/

Sitemap: https://www.geniuscorp-wp.example/sitemap_index.xml
```

> ⚠️ **สิ่งที่ห้ามทำใน robots.txt:** `Disallow: /wp-content/` (จะบล็อกรูปและ CSS ทำให้ Googlebot เรนเดอร์หน้าไม่ได้และ og:image เข้าไม่ถึง), `Disallow: /wp-includes/` (บล็อก JS ที่ theme ใช้), และบล็อก `OAI-SearchBot`/`PerplexityBot`/`Claude-SearchBot` ถ้าต้องการอยู่ใน AI Search (ทบทวนตาราง Day 1 หัวข้อ 1.3)

ทดสอบ robots.txt: Google Search Console → Settings → robots.txt report (หลัง Deploy) และ `curl https://www.geniuscorp.example/robots.txt`

### 3.5 llms.txt ตามสเปก llmstxt.org

**llms.txt** (เสนอโดย Jeremy Howard, Answer.AI ในปี 2024) คือไฟล์ Markdown ที่ root ของเว็บ ให้ LLM อ่าน "สรุปเว็บนี้คืออะไร มีหน้าสำคัญอะไรบ้าง" ในรูปแบบที่ LLM เข้าใจง่ายกว่า HTML ทั้งหน้า สเปกกำหนดโครงสร้าง:

```markdown
# ชื่อเว็บ/องค์กร                       ← H1 บังคับ (มีได้อันเดียว)

> สรุป 1-3 ประโยคว่าเว็บนี้คืออะไร       ← blockquote (แนะนำ)

ย่อหน้าอธิบายเพิ่มเติม ข้อควรรู้ (ไม่บังคับ)

## หมวดหน้า                              ← H2 แต่ละหมวด
- [ชื่อหน้า](URL เต็ม): คำอธิบายสั้น      ← list ของลิงก์ + คำอธิบายหลัง colon

## Optional                              ← หมวดพิเศษ: หน้าที่ข้ามได้ถ้า context จำกัด
- [...](...)
```

ณ ปี 2026 ยังไม่มีการยืนยันอย่างเป็นทางการจาก OpenAI/Anthropic/Google ว่า crawler ของตนอ่าน llms.txt เป็นสัญญาณจัดอันดับ แต่ (1) มีเว็บและเครื่องมือ AI จำนวนมากรองรับแล้ว (2) ต้นทุนการทำเกือบเป็นศูนย์เมื่อ generate จากข้อมูลจริง และ (3) มันคือ "หน้า about ฉบับเครื่องอ่าน" ที่ไม่มีอะไรเสีย จึงเป็นข้อแนะนำระดับ MEDIUM ใน Roadmap ของเรา

**Astro - generate ตอน build** (ใช้ endpoint เดียวกับ sitemap):

```ts
// src/pages/llms.txt.ts
// สร้าง /llms.txt ตามสเปก llmstxt.org จากข้อมูลจริง (ใช้ sitemap-entries เดียวกับ sitemap.xml)
import type { APIRoute } from 'astro'
import { getSitemapEntries } from '../lib/api'
import { SITE, absoluteUrl } from '../lib/site'

const line = (title: string | null, url: string, summary: string | null) =>
  `- [${title ?? url}](${absoluteUrl(url)})${summary ? `: ${summary}` : ''}`

export const GET: APIRoute = async () => {
  const entries = await getSitemapEntries()
  const byType = (type: string) => entries.filter((e) => e.type === type)

  const body = `# ${SITE.legalName}

> ${SITE.defaultDescription}

${SITE.name} เป็นบริษัทพัฒนาซอฟต์แวร์ในกรุงเทพมหานคร ก่อตั้งปี ${SITE.foundingDate} ให้บริการพัฒนาเว็บไซต์องค์กร โมบายแอปพลิเคชัน และที่ปรึกษา GEO/AEO
ติดต่อ: โทร ${SITE.telephone} อีเมล ${SITE.email} เว็บไซต์ ${SITE.url}/
ภาษาหลักของเนื้อหา: ไทย (th)

## บริการ
${byType('service').map((e) => line(e.title, e.url, e.summary)).join('\n')}

## บทความ
${byType('article').map((e) => line(e.title, e.url, e.summary)).join('\n')}

## ผลงาน
${byType('portfolio').map((e) => line(e.title, e.url, e.summary)).join('\n')}

## เกี่ยวกับองค์กร
- [เกี่ยวกับเรา](${absoluteUrl('/about/')}): ประวัติ ทีมงาน และเหตุผลที่ลูกค้าเลือกเรา
- [ทีมงาน](${absoluteUrl('/team/')}): โปรไฟล์ผู้บริหารและผู้เขียนบทความ
- [ติดต่อเรา](${absoluteUrl('/contact/')}): ที่อยู่ เบอร์โทร อีเมล เวลาทำการ

## Optional
- [Sitemap](${absoluteUrl('/sitemap.xml')}): รายการหน้าทั้งหมดพร้อมวันที่แก้ไขล่าสุด
`

  return new Response(body, {
    headers: { 'Content-Type': 'text/plain; charset=utf-8' },
  })
}
```

> 📌 สเปกยังกล่าวถึง `llms-full.txt` (เนื้อหาเต็มทุกหน้าในไฟล์เดียว) และการมี `.md` เวอร์ชันของแต่ละหน้า (เช่น `/services/web-development/index.html.md`) สำหรับเว็บเอกสาร/เว็บเนื้อหาเยอะ ทำเพิ่มได้ด้วย endpoint แบบเดียวกัน แต่สำหรับเว็บองค์กร 20-50 หน้า `llms.txt` ตัวเดียวเพียงพอ

**WordPress - generate ด้วย PHP** (rewrite rule + template_redirect):

```php
<?php
// inc/geo-llms.php

defined('ABSPATH') || exit;

// 1) ให้ /llms.txt เป็น route ของ WordPress (ไม่ต้องสร้างไฟล์จริง จะได้อัปเดตตามข้อมูล)
add_action('init', function () {
    add_rewrite_rule('^llms\.txt$', 'index.php?gc_llms=1', 'top');
});
add_filter('query_vars', fn (array $vars) => [...$vars, 'gc_llms']);

// 2) เมื่อ request มาที่ route นี้ ให้ส่ง text/plain แล้วจบ
add_action('template_redirect', function () {
    if (! get_query_var('gc_llms')) {
        return;
    }

    // cache ผลไว้ 1 ชั่วโมงใน transient (LiteSpeed Cache จะ cache ระดับหน้าอีกชั้น)
    $body = get_transient('gc_llms_txt');
    if ($body === false) {
        $body = gc_build_llms_txt();
        set_transient('gc_llms_txt', $body, HOUR_IN_SECONDS);
    }

    status_header(200);
    header('Content-Type: text/plain; charset=utf-8');
    header('X-Robots-Tag: noindex');   // ไม่ต้องให้ Google index ไฟล์นี้เป็นหน้าเว็บ
    echo $body;
    exit;
});

// 3) ล้าง cache เมื่อมีการบันทึกโพสต์
add_action('save_post', fn () => delete_transient('gc_llms_txt'));

function gc_llms_line(WP_Post $post): string
{
    $summary = has_excerpt($post) ? wp_strip_all_tags(get_the_excerpt($post)) : '';
    return sprintf('- [%s](%s)%s', get_the_title($post), get_permalink($post), $summary ? ': ' . $summary : '');
}

function gc_build_llms_txt(): string
{
    $s = gc_site();   // จาก geo-schema.php (Day 3)

    $services = get_posts(['post_type' => 'service', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);
    $articles = get_posts(['post_type' => 'post', 'posts_per_page' => 50, 'orderby' => 'date', 'order' => 'DESC']);

    $lines = [];
    $lines[] = '# ' . $s['legal_name'];
    $lines[] = '';
    $lines[] = '> ' . get_bloginfo('description');
    $lines[] = '';
    $lines[] = sprintf('%s เป็นบริษัทพัฒนาซอฟต์แวร์ใน%s ก่อตั้งปี %s', $s['name'], $s['address']['addressRegion'], $s['founding']);
    $lines[] = sprintf('ติดต่อ: โทร %s อีเมล %s เว็บไซต์ %s', $s['telephone'], $s['email'], $s['url']);
    $lines[] = 'ภาษาหลักของเนื้อหา: ไทย (th)';
    $lines[] = '';
    $lines[] = '## บริการ';
    foreach ($services as $post) {
        $lines[] = gc_llms_line($post);
    }
    $lines[] = '';
    $lines[] = '## บทความ';
    foreach ($articles as $post) {
        $lines[] = gc_llms_line($post);
    }
    $lines[] = '';
    $lines[] = '## เกี่ยวกับองค์กร';
    foreach (['about' => 'ประวัติ ทีมงาน และเหตุผลที่ลูกค้าเลือกเรา', 'contact' => 'ที่อยู่ เบอร์โทร อีเมล เวลาทำการ'] as $slug => $desc) {
        $page = get_page_by_path($slug);
        if ($page) {
            $lines[] = sprintf('- [%s](%s): %s', get_the_title($page), get_permalink($page), $desc);
        }
    }
    $lines[] = '';
    $lines[] = '## Optional';
    $lines[] = sprintf('- [Sitemap](%ssitemap_index.xml): รายการหน้าทั้งหมดพร้อมวันที่แก้ไขล่าสุด', $s['url']);
    $lines[] = '';

    return implode("\n", $lines);
}
```

หลังเพิ่มโค้ด: Settings → Permalinks → Save (flush rewrite) แล้วเปิด `http://geniuscorp.test/llms.txt` ต้องเห็น Markdown

> 🧪 **ทดสอบ Module 3:** Astro `npm run build` → เปิด `dist/sitemap.xml` (lastmod ต่างกันตามจริง, URL absolute, ไม่มี draft) และ `dist/llms.txt` · WordPress เปิด `/sitemap_index.xml` (มี services sitemap, lastmod ไม่เท่ากันหมด) และ `/llms.txt` · ตรวจ sitemap ด้วย XML validator (เช่น xml-sitemaps.com/validate-xml-sitemap.html) หรือรอ submit ใน Search Console หลัง Deploy

---

## 📚 Module 4: Performance for GEO

### เวลา 22:00-22:15 น.

> 💡 **หัวใจของ Module นี้:** Performance มีผลกับ GEO สองทาง: (1) crawl budget - crawler มีเวลาจำกัดต่อเว็บ หน้าที่เร็วและเบาถูกเก็บได้มากกว่า (2) Core Web Vitals เป็นสัญญาณคุณภาพของ Google ซึ่งป้อน AI Overviews Astro ได้เปรียบตั้งแต่ต้น เหลือแค่รูปกับการบีบอัดที่เว็บเซิร์ฟเวอร์

---

### 4.1 จุดแข็งของ Astro: Zero-JS by Default

เปิด `dist/services/web-development/index.html` แล้วนับ `<script`: ต้องเป็น **1** (JSON-LD) และ **ไม่มี** JavaScript ที่ทำงานเลย ขนาด HTML ~25-40KB (uncompressed) ต่อหน้า นี่คือสิ่งที่ WordPress ทำไม่ได้แม้ปรับแต่งเต็มที่ (jQuery + theme JS + plugin JS อย่างน้อย 100-300KB)

### 4.2 Image Optimization ด้วย astro:assets

ปัจจุบันเราใช้ `<img src="/images/...">` ตรง ๆ จาก `public/` ซึ่ง Astro ไม่ประมวลผล ให้เปลี่ยนเป็น `<Image>` จาก `astro:assets` สำหรับรูปที่อยู่ในโปรเจกต์ หรือรูป remote จาก API (ต้องอนุญาต domain)

```js
// astro.config.mjs (เพิ่ม)
export default defineConfig({
  // ...
  image: {
    // อนุญาตให้ประมวลผลรูปจากโดเมนของ API/CDN ตอน build (รูปที่ API ส่ง URL มา)
    domains: ['api.geniuscorp.example', 'cdn.geniuscorp.example'],
  },
})
```

```astro
---
// src/components/ArticleCard.astro (ปรับส่วนรูป)
import { Image } from 'astro:assets'
import type { Article } from '../lib/types'

interface Props { article: Article }
const { article } = Astro.props
---

<article class="card">
  {article.cover_image && (
    <a href={article.url}>
      {/*
        Image จาก astro:assets: ตอน build จะ resize/แปลงเป็น WebP (ค่าเริ่มต้น) สร้าง srcset ตาม widths
        และใส่ width/height ป้องกัน CLS + loading="lazy" ให้อัตโนมัติ (รูปนอก viewport)
        รูป remote ต้องระบุ width/height หรือ inferSize
      */}
      <Image
        src={article.cover_image}
        alt={article.title}
        width={800}
        height={450}
        widths={[400, 800]}
        sizes="(max-width: 640px) 100vw, 400px"
        format="webp"
        inferSize={false}
      />
    </a>
  )}
  ...
</article>
```

รูปแรกของหน้า (hero/cover ที่เป็น LCP) ต้อง **ไม่ lazy** และควร `fetchpriority="high"`:

```astro
<Image src={article.cover_image} alt={article.title} width={1200} height={630} loading="eager" fetchpriority="high" format="webp" />
```

> 📌 รูปที่มาจาก API เป็น path `/images/blog/x.jpg` (อยู่ใน `public/` ของ Astro ตามที่ seed ไว้) ถ้าต้องการให้ Astro ประมวลผล ให้ย้ายรูปไป `src/assets/` แล้ว `import` หรือให้ API ส่ง absolute URL ของ CDN แล้วใช้ `domains` ด้านบน ในโปรเจกต์จริงแนะนำให้ Laravel เก็บรูปบน storage/CDN และส่ง absolute URL

### 4.3 เปิด gzip/brotli บน Apache/Nginx

HTML/CSS/XML/JSON/llms.txt บีบอัดได้ 70-85% ทำให้ HTML 40KB เหลือ ~8KB ทาง network

**Apache** (`.htaccess` ใน `dist/` หรือใน VirtualHost - ต้อง `a2enmod deflate brotli headers expires`):

```apache
# deploy/apache/.htaccess  →  คัดลอกไป dist/.htaccess ตอน deploy (ใส่ใน public/.htaccess ของ Astro ก็ได้)

# ── Brotli (ถ้ามี mod_brotli) แล้วค่อย gzip ─────────────────────────────
<IfModule mod_brotli.c>
  AddOutputFilterByType BROTLI_COMPRESS text/html text/plain text/css text/xml application/xml application/json application/javascript image/svg+xml
</IfModule>
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/plain text/css text/xml application/xml application/json application/javascript image/svg+xml
</IfModule>

# ── Cache: asset ที่มี hash ในชื่อ (Astro ใส่ให้ใน _astro/) cache ได้ 1 ปี, HTML ไม่ cache นาน ──
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType text/html "access plus 10 minutes"
  ExpiresByType text/css "access plus 1 year"
  ExpiresByType application/javascript "access plus 1 year"
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType image/svg+xml "access plus 1 year"
</IfModule>
<IfModule mod_headers.c>
  <FilesMatch "\.(css|js|webp|avif|woff2)$">
    Header set Cache-Control "public, max-age=31536000, immutable"
  </FilesMatch>
  Header always set X-Content-Type-Options "nosniff"
  Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# ── charset ให้ text ทุกชนิด (สำคัญกับภาษาไทยใน llms.txt/sitemap) ──
AddDefaultCharset UTF-8
AddCharset UTF-8 .txt .xml .html

# ── Trailing slash: /about → /about/ (ให้ตรง canonical) ──
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^(.*[^/])$ /$1/ [R=301,L]
```

**Nginx** (ใน server block):

```nginx
# deploy/nginx/geniuscorp-web.conf (ส่วน compression + cache)
gzip on;
gzip_vary on;
gzip_min_length 1024;
gzip_types text/plain text/css text/xml application/xml application/json application/javascript image/svg+xml;
# brotli ต้องมี module ngx_brotli (Ubuntu: apt install libnginx-mod-http-brotli-filter)
brotli on;
brotli_types text/plain text/css text/xml application/xml application/json application/javascript image/svg+xml;

charset utf-8;
charset_types text/plain text/xml application/xml;

location /_astro/ {
    add_header Cache-Control "public, max-age=31536000, immutable";
}
location ~* \.(webp|avif|woff2|svg)$ {
    add_header Cache-Control "public, max-age=31536000, immutable";
}
location ~* \.html$ {
    add_header Cache-Control "public, max-age=600";
}
```

### 4.4 เป้าหมายที่วัดได้ และเปรียบเทียบ GeniusCorp Modern vs GeniusCorp WP

ตัวเลขจากการวัดบนเซิร์ฟเวอร์สาธิตของสถาบัน (Ubuntu 24.04, 2 vCPU, Apache + PHP-FPM 8.3, MariaDB 10.11, ทั้งสองเว็บบนเครื่องเดียวกัน วัดด้วย PageSpeed Insights mobile 3 ครั้งเอาค่ากลาง) - ผู้เรียนจะได้ตัวเลขของตัวเองต่างกันไปตามเซิร์ฟเวอร์ แต่ "สัดส่วน" จะใกล้เคียงกัน:

| ตัวชี้วัด (หน้าบริการ)          | เป้าหมาย       | GeniusCorp Modern (Astro) | GeniusCorp WP ก่อน Retrofit | GeniusCorp WP หลัง Retrofit + Cache |
| ------------------------------ | -------------- | ------------------------- | --------------------------- | ----------------------------------- |
| TTFB                           | < 0.4s (SSG) / < 0.6s (WP) | ~0.08s                | ~1.4s                        | ~0.18s (cache hit) / ~0.9s (miss)    |
| HTML uncompressed              | < 150KB        | ~32KB                     | ~480KB                      | ~110KB                              |
| HTML on wire (brotli)          | -              | ~7KB                      | ~62KB                       | ~18KB                               |
| จำนวน request                  | < 30           | 6                         | 94                          | 24                                  |
| JS ที่โหลด                      | ยิ่งน้อยยิ่งดี   | 0KB                       | 890KB                       | 210KB                               |
| LCP (mobile)                   | < 2.5s         | ~1.1s                     | ~5.1s                       | ~2.2s                               |
| CLS                            | < 0.1          | 0                         | 0.24                        | 0.05                                |
| PSI Performance score (mobile) | > 90           | 99                        | 38                          | 84                                  |
| `<script>` ใน HTML              | -              | 1 (JSON-LD)               | 31                          | 12                                  |

> 💡 **ข้อสรุปเชิงสถาปัตยกรรม:** WordPress หลัง Retrofit "ผ่านเกณฑ์" ได้ทุกข้อและ GEO-Ready เท่ากันในแง่ Schema/Metadata แต่ Astro ทำได้ดีกว่า 2-5 เท่าในทุกตัวชี้วัด Performance **โดยไม่ต้องดูแล cache** และไม่มีความเสี่ยงที่ plugin อัปเดตแล้วพัง นี่คือข้อมูลสำหรับตัดสินใจตาม Day 3 Module 7

---

## 📚 Module 5: Production Deployment บน Apache/Nginx

### เวลา 22:15-22:55 น.

> 💡 **หัวใจของ Module นี้:** เว็บ Astro ที่ build แล้วคือโฟลเดอร์ไฟล์ธรรมดา การ Deploy จึงคือ "คัดลอกไฟล์ไปวาง" ไม่ต้องมี Node.js บนเซิร์ฟเวอร์ ส่วน Laravel API และ WordPress ต้องการ PHP-FPM + MariaDB ตามปกติ สิ่งที่ทำให้ Production "GEO-Ready" คือ HTTPS, Redirect ที่ถูกต้อง, สิทธิ์ไฟล์ที่ปลอดภัย และระบบ Rebuild ที่ทำให้ SSG ไม่ล้าสมัย

---

### 5.1 โครงสร้าง Deploy

```
เซิร์ฟเวอร์ Ubuntu 24.04 (Apache 2.4 หรือ Nginx 1.24 + PHP-FPM 8.3 + MariaDB 10.11)
/var/www/
├── geniuscorp-web/            ← Static จาก astro build (rsync dist/ มาวาง)    www.geniuscorp.example
│   ├── index.html
│   ├── services/…/index.html
│   ├── sitemap.xml, llms.txt, robots.txt
│   └── .htaccess (Apache)
├── geniuscorp-api/            ← Laravel 13 (git clone + composer install)     api.geniuscorp.example
│   ├── public/                ← DocumentRoot ชี้ที่นี่เท่านั้น
│   ├── .env                   ← ไม่อยู่ใน git, สิทธิ์ 640
│   └── storage/, bootstrap/cache/  ← www-data เขียนได้
└── geniuscorp-wp/             ← WordPress                                     www.geniuscorp-wp.example
    ├── wp-config.php          ← สิทธิ์ 640
    └── wp-content/            ← uploads เขียนได้, themes/plugins อ่านอย่างเดียวบน production

เครื่อง build (เครื่องพัฒนา หรือ GitHub Actions runner หรือ VM เล็ก ๆ อีกตัว)
└── geniuscorp-web/  →  npm run build  →  rsync dist/ → /var/www/geniuscorp-web/
```

> 📌 ทั้งสามอยู่บนเซิร์ฟเวอร์เดียวกันได้ (เว็บองค์กรทั่วไป) หรือแยก API/DB ไปอีกเครื่องเมื่อโตขึ้น ข้อสำคัญคือ **เครื่องที่รัน `astro build` ต้องเข้าถึง API ได้** และ **ไม่จำเป็นต้องเป็นเครื่องเดียวกับที่เสิร์ฟเว็บ**

### 5.2 เตรียมเซิร์ฟเวอร์ (ครั้งเดียว)

```bash
# บนเซิร์ฟเวอร์ (Ubuntu 24.04) - ตัวอย่างสาย Apache
sudo apt update && sudo apt install -y apache2 php8.3-fpm php8.3-{mysql,mbstring,xml,curl,zip,gd,intl,bcmath} mariadb-server certbot python3-certbot-apache rsync unzip
sudo a2enmod rewrite headers expires deflate brotli proxy_fcgi setenvif ssl
sudo a2enconf php8.3-fpm
sudo systemctl restart apache2

# ผู้ใช้สำหรับ deploy (ไม่ใช้ root): เป็นเจ้าของไฟล์เว็บ, www-data อ่านได้
sudo adduser --disabled-password deploy
sudo usermod -aG www-data deploy
sudo mkdir -p /var/www/geniuscorp-web /var/www/geniuscorp-api /var/www/geniuscorp-wp
sudo chown -R deploy:www-data /var/www
```

### 5.3 Virtual Host สำหรับ Astro Static (Apache และ Nginx)

```apache
# /etc/apache2/sites-available/geniuscorp-web.conf
<VirtualHost *:80>
    ServerName www.geniuscorp.example
    ServerAlias geniuscorp.example
    # ทุกอย่างบน :80 → https (certbot จะเติมให้ แต่เขียนเองชัดกว่า)
    RewriteEngine On
    RewriteRule ^ https://www.geniuscorp.example%{REQUEST_URI} [R=301,L]
</VirtualHost>

<VirtualHost *:443>
    ServerName www.geniuscorp.example
    ServerAlias geniuscorp.example
    DocumentRoot /var/www/geniuscorp-web

    SSLEngine on
    SSLCertificateFile    /etc/letsencrypt/live/www.geniuscorp.example/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/www.geniuscorp.example/privkey.pem

    # non-www → www (canonical host เดียว ตรงกับ site ใน astro.config)
    RewriteEngine On
    RewriteCond %{HTTP_HOST} ^geniuscorp\.example$ [NC]
    RewriteRule ^ https://www.geniuscorp.example%{REQUEST_URI} [R=301,L]

    <Directory /var/www/geniuscorp-web>
        Options -Indexes +FollowSymLinks
        AllowOverride All          # ให้ .htaccess (compression/cache/trailing slash จาก Module 4) ทำงาน
        Require all granted
        DirectoryIndex index.html
    </Directory>

    # หน้า 404 ที่ Astro build ให้ (src/pages/404.astro → dist/404.html)
    ErrorDocument 404 /404.html

    ErrorLog  ${APACHE_LOG_DIR}/geniuscorp-web-error.log
    # combined = มี User-Agent → ใช้หา AI crawlers ใน Module 6
    CustomLog ${APACHE_LOG_DIR}/geniuscorp-web-access.log combined
</VirtualHost>
```

```nginx
# /etc/nginx/sites-available/geniuscorp-web.conf
server {
    listen 80;
    server_name geniuscorp.example www.geniuscorp.example;
    return 301 https://www.geniuscorp.example$request_uri;
}

server {
    listen 443 ssl http2;
    server_name geniuscorp.example;
    ssl_certificate     /etc/letsencrypt/live/www.geniuscorp.example/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/www.geniuscorp.example/privkey.pem;
    return 301 https://www.geniuscorp.example$request_uri;
}

server {
    listen 443 ssl http2;
    server_name www.geniuscorp.example;
    root /var/www/geniuscorp-web;
    index index.html;

    ssl_certificate     /etc/letsencrypt/live/www.geniuscorp.example/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/www.geniuscorp.example/privkey.pem;

    access_log /var/log/nginx/geniuscorp-web-access.log combined;
    error_log  /var/log/nginx/geniuscorp-web-error.log;

    # compression + cache จาก Module 4.3
    include snippets/geniuscorp-compression.conf;

    # /about → /about/ (301) และ /about/ → /about/index.html
    location / {
        try_files $uri $uri/index.html @add_slash;
    }
    location @add_slash {
        if (-d $document_root$uri) { return 301 $uri/; }
        return 404;
    }
    error_page 404 /404.html;

    add_header X-Content-Type-Options nosniff always;
    add_header Referrer-Policy strict-origin-when-cross-origin always;
}
```

```bash
sudo a2ensite geniuscorp-web && sudo systemctl reload apache2
# ออกใบรับรอง HTTPS (ต้องชี้ DNS A record มาที่เซิร์ฟเวอร์ก่อน)
sudo certbot --apache -d www.geniuscorp.example -d geniuscorp.example
# ตรวจว่า redirect ถูกต้อง: ต้อง 301 ครั้งเดียวถึงปลายทาง
curl -sI http://geniuscorp.example/about | grep -i location     # → https://www.geniuscorp.example/about
curl -sI https://www.geniuscorp.example/about | grep -i location # → https://www.geniuscorp.example/about/
```

> ⚠️ **Redirect chain** (http → https://non-www → https://www → /about/) มี 3 hop ทำให้ crawler เสียเวลาและบางตัวหยุดตาม ให้ rewrite แต่ละกรณีไปที่ปลายทางสุดท้ายโดยตรง วิธีตรวจ: `curl -sIL http://geniuscorp.example/about | grep -iE "^(HTTP|location)"` ควรเห็น 301 ไม่เกิน 2 ครั้ง (http→https+www เป็น hop เดียว แล้ว trailing slash อีก hop ถ้าจำเป็น)

### 5.4 Deploy Laravel API

```bash
# บนเซิร์ฟเวอร์ ในฐานะ deploy
cd /var/www/geniuscorp-api
git clone git@github.com:geniuscorp/geniuscorp-api.git .
composer install --no-dev --optimize-autoloader
cp .env.example .env && nano .env      # APP_ENV=production, APP_DEBUG=false, APP_URL=https://api.geniuscorp.example, DB_*, REBUILD_*
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force             # ครั้งแรกเท่านั้น
php artisan geo:issue-build-token       # เก็บ token ไว้ใส่ในเครื่อง build / GitHub Secrets
php artisan config:cache && php artisan route:cache && php artisan view:cache

# สิทธิ์: โค้ดอ่านอย่างเดียว, storage/cache เขียนได้โดย www-data, .env อ่านได้เฉพาะเจ้าของ+กลุ่ม
sudo chown -R deploy:www-data /var/www/geniuscorp-api
sudo find /var/www/geniuscorp-api -type d -exec chmod 750 {} \;
sudo find /var/www/geniuscorp-api -type f -exec chmod 640 {} \;
sudo chmod -R 770 storage bootstrap/cache
```

```apache
# /etc/apache2/sites-available/geniuscorp-api.conf (ส่วนสำคัญ)
<VirtualHost *:443>
    ServerName api.geniuscorp.example
    DocumentRoot /var/www/geniuscorp-api/public
    <Directory /var/www/geniuscorp-api/public>
        AllowOverride All
        Require all granted
    </Directory>
    <FilesMatch \.php$>
        SetHandler "proxy:unix:/run/php/php8.3-fpm.sock|fcgi://localhost"
    </FilesMatch>
    # API ไม่ต้องให้ search engine index
    Header always set X-Robots-Tag "noindex, nofollow"
    SSLEngine on
    SSLCertificateFile    /etc/letsencrypt/live/api.geniuscorp.example/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/api.geniuscorp.example/privkey.pem
</VirtualHost>
```

ตรวจ: `curl https://api.geniuscorp.example/api/health` → `{"ok":true,...}` และ `curl -H "Authorization: Bearer <token>" -H "Accept: application/json" https://api.geniuscorp.example/api/v1/services` ได้ข้อมูล

### 5.5 Deploy WordPress อย่างปลอดภัย

| ขั้นตอน                        | รายละเอียด                                                                                                               |
| ------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| 1. Backup ก่อนทุกอย่าง           | Export จาก Local (All-in-One WP Migration) + เก็บ SQL dump แยก                                                             |
| 2. ย้ายขึ้นเซิร์ฟเวอร์           | ติดตั้ง WordPress เปล่าบน production → ติดตั้ง All-in-One WP Migration → Import ไฟล์ .wpress → ล็อกอินใหม่ → Permalinks Save |
| 3. `wp-config.php`             | `DB_*` ของ production, `WP_DEBUG false`, `DISALLOW_FILE_EDIT true` (ปิดแก้ไฟล์ theme/plugin จากหน้า Admin), `FORCE_SSL_ADMIN true`, salt ใหม่จาก api.wordpress.org/secret-key/1.1/salt/ |
| 4. สิทธิ์ไฟล์                   | โฟลเดอร์ 755, ไฟล์ 644, `wp-config.php` 640, `wp-content/uploads` เขียนได้โดย www-data; ห้าม 777                              |
| 5. ปิดช่องทางที่ไม่ใช้           | XML-RPC (ทำแล้วใน Day 3), ปิด user enumeration `/?author=1` (Rank Math → Titles → Authors → noindex หรือ redirect), เปลี่ยน URL login ถ้าต้องการ, จำกัด login attempts |
| 6. HTTPS + Redirect            | certbot เหมือน Astro, Settings → General → WordPress Address/Site Address เป็น `https://www...`                             |
| 7. Cache                       | เปิด LiteSpeed/WP Rocket ตามที่ตั้งค่าใน Day 3 แล้ว Purge All                                                              |
| 8. ปิด Query Monitor            | Deactivate บน production (โหลด script ให้ admin ทุกหน้า)                                                                    |
| 9. Cron จริง                    | `define('DISABLE_WP_CRON', true)` + crontab `*/10 * * * * curl -s https://www.geniuscorp-wp.example/wp-cron.php` (WP-Cron ที่ผูกกับ request ทำให้ TTFB กระตุก) |
| 10. Backup อัตโนมัติ            | UpdraftPlus หรือ script mysqldump + rsync รายวัน ไปที่อื่น                                                                  |

```php
// wp-config.php (เพิ่มบน production)
define('DISALLOW_FILE_EDIT', true);
define('FORCE_SSL_ADMIN', true);
define('WP_DEBUG', false);
define('DISABLE_WP_CRON', true);
define('WP_MEMORY_LIMIT', '256M');
```

### 5.6 Deploy Script สำหรับ Astro (build → check → rsync)

```bash
#!/usr/bin/env bash
# deploy/deploy.sh - รันจากเครื่อง build (เครื่องพัฒนา หรือ CI)
# ใช้: ./deploy/deploy.sh
set -euo pipefail

SERVER="deploy@www.geniuscorp.example"
REMOTE_DIR="/var/www/geniuscorp-web"
LOCAL_DIST="dist/"

echo "▶ 1/4 build (ดึงข้อมูลล่าสุดจาก API)"
npm ci --silent
npm run build              # รวม node scripts/check-geo.mjs: ไม่ผ่าน = หยุดที่นี่ ไม่ deploy

echo "▶ 2/4 ตรวจไฟล์สำคัญ"
for f in index.html sitemap.xml llms.txt robots.txt 404.html; do
  [ -f "$LOCAL_DIST/$f" ] || { echo "✗ ไม่พบ $f ใน dist/"; exit 1; }
done
cp deploy/apache/.htaccess "$LOCAL_DIST/.htaccess"

echo "▶ 3/4 rsync ไปเซิร์ฟเวอร์ (atomic: อัปโหลดเข้าโฟลเดอร์ใหม่ แล้วสลับ symlink)"
RELEASE="release-$(date +%Y%m%d-%H%M%S)"
rsync -az --delete "$LOCAL_DIST" "$SERVER:$REMOTE_DIR-releases/$RELEASE/"
ssh "$SERVER" "ln -sfn $REMOTE_DIR-releases/$RELEASE $REMOTE_DIR-current \
  && ls -dt $REMOTE_DIR-releases/release-* | tail -n +4 | xargs -r rm -rf"

echo "▶ 4/4 ตรวจหลัง deploy"
curl -sf -o /dev/null -w "home %{http_code} %{time_starttransfer}s\n" https://www.geniuscorp.example/
curl -sf -o /dev/null -w "sitemap %{http_code}\n" https://www.geniuscorp.example/sitemap.xml
curl -sf -o /dev/null -w "llms %{http_code}\n" https://www.geniuscorp.example/llms.txt
echo "✓ deploy $RELEASE เสร็จ"
```

> 📌 **Atomic deploy:** ให้ `DocumentRoot` ชี้ที่ `/var/www/geniuscorp-web-current` (symlink) แทนโฟลเดอร์ตรง ๆ แล้ว script อัปโหลดเข้าโฟลเดอร์ release ใหม่ก่อนสลับ symlink ผู้ใช้จะไม่เจอหน้าครึ่ง ๆ กลาง ๆ ระหว่าง rsync และ rollback ได้ด้วยการสลับ symlink กลับ (เก็บ 3 release ล่าสุด) ถ้าใช้ Apache ต้องมี `Options +FollowSymLinks` (ใส่ไว้แล้วใน vhost)

### 5.7 ระบบ Rebuild อัตโนมัติ: Webhook เมื่อเนื้อหาในฐานข้อมูลเปลี่ยน

นี่คือการแก้จุดอ่อนสำคัญของ SSG: ทีมแก้บทความใน Admin แล้วเว็บต้องอัปเดตเองภายในไม่กี่นาทีโดยไม่ต้องมีใครกด build

```
Admin แก้ Article/Service/FAQ ใน Laravel (หรือ phpMyAdmin/Filament)
   │  Eloquent saved/deleted
   ▼
ContentObserver ──▶ dispatch TriggerRebuild job (debounce: รวมการแก้หลายครั้งใน 2 นาทีเป็น build เดียว)
   │
   ▼ HTTP POST + HMAC signature
ตัวเลือก A: GitHub Actions (repository_dispatch)  ──▶ runner: npm run build → rsync → เซิร์ฟเวอร์
ตัวเลือก B: Webhook receiver บนเครื่อง build (Node/PHP เล็ก ๆ) ──▶ รัน deploy.sh
```

**Laravel - Observer + Job (ฝั่งส่ง)**

```php
<?php
// app/Observers/ContentObserver.php

namespace App\Observers;

use App\Jobs\TriggerRebuild;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContentObserver
{
    public function saved(Model $model): void   { $this->schedule($model); }
    public function deleted(Model $model): void { $this->schedule($model); }

    /**
     * Debounce: ถ้ามี rebuild ค้างอยู่ใน 2 นาทีนี้แล้ว ไม่ต้อง dispatch ซ้ำ
     * (ทีมแก้ 5 บทความติดกัน = build ครั้งเดียว)
     */
    private function schedule(Model $model): void
    {
        if (! config('geo.rebuild_enabled')) {
            return;
        }

        $reason = class_basename($model) . '#' . $model->getKey();

        if (Cache::add('geo:rebuild-pending', $reason, now()->addMinutes(2))) {
            TriggerRebuild::dispatch($reason)->delay(now()->addMinutes(2));
        }
    }
}
```

```php
<?php
// app/Jobs/TriggerRebuild.php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TriggerRebuild implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(public string $reason) {}

    public function handle(): void
    {
        Cache::forget('geo:rebuild-pending');

        $payload = [
            'event'  => 'content-updated',
            'reason' => $this->reason,
            'at'     => now()->toIso8601String(),
        ];

        $response = match (config('geo.rebuild_driver')) {
            'github' => $this->viaGithub($payload),
            default  => $this->viaWebhook($payload),
        };

        if (! $response->successful()) {
            Log::error('Rebuild webhook failed', ['status' => $response->status(), 'body' => $response->body()]);
            $this->release($this->backoff);
            return;
        }

        Log::info('Rebuild triggered', $payload);
    }

    // ตัวเลือก A: GitHub Actions repository_dispatch
    private function viaGithub(array $payload)
    {
        return Http::withToken(config('geo.github_token'))
            ->withHeaders(['Accept' => 'application/vnd.github+json'])
            ->post('https://api.github.com/repos/' . config('geo.github_repo') . '/dispatches', [
                'event_type'     => 'content-updated',
                'client_payload' => $payload,
            ]);
    }

    // ตัวเลือก B: webhook receiver ของเราเอง พร้อม HMAC ป้องกันคนอื่นสั่ง build
    private function viaWebhook(array $payload)
    {
        $body      = json_encode($payload);
        $signature = hash_hmac('sha256', $body, config('geo.webhook_secret'));

        return Http::withBody($body, 'application/json')
            ->withHeaders(['X-Geo-Signature' => $signature])
            ->timeout(10)
            ->post(config('geo.webhook_url'));
    }
}
```

```php
<?php
// config/geo.php

return [
    'rebuild_enabled' => env('REBUILD_ENABLED', false),
    'rebuild_driver'  => env('REBUILD_DRIVER', 'webhook'),   // webhook | github
    'webhook_url'     => env('REBUILD_WEBHOOK_URL'),
    'webhook_secret'  => env('REBUILD_WEBHOOK_SECRET'),
    'github_repo'     => env('REBUILD_GITHUB_REPO'),          // geniuscorp/geniuscorp-web
    'github_token'    => env('REBUILD_GITHUB_TOKEN'),         // fine-grained PAT สิทธิ์ contents:write ของ repo นี้
];
```

```php
<?php
// app/Providers/AppServiceProvider.php (boot)

use App\Models\{Article, Faq, Portfolio, Service, TeamMember};
use App\Observers\ContentObserver;

public function boot(): void
{
    foreach ([Article::class, Faq::class, Portfolio::class, Service::class, TeamMember::class] as $model) {
        $model::observe(ContentObserver::class);
    }
}
```

```dotenv
# .env ของ Laravel บน production
QUEUE_CONNECTION=database        # php artisan queue:table && migrate; รัน worker ด้วย systemd/supervisor
REBUILD_ENABLED=true
REBUILD_DRIVER=github
REBUILD_GITHUB_REPO=geniuscorp/geniuscorp-web
REBUILD_GITHUB_TOKEN=github_pat_xxx
```

> 📌 Job มี `delay(2 นาที)` จึงต้องมี **queue worker** รันอยู่ (`php artisan queue:work --tries=3` ภายใต้ systemd หรือ Supervisor) ถ้าไม่อยากมี worker ให้ใช้ `QUEUE_CONNECTION=sync` และตัด delay ออก (จะ build ทุกครั้งที่ save ซึ่งยังรับได้สำหรับเว็บเล็ก)

**ตัวเลือก A - GitHub Actions (ฝั่งรับ)**

```yaml
# .github/workflows/deploy.yml (ใน repo geniuscorp-web)
name: Build & Deploy

on:
  push:
    branches: [main]
  repository_dispatch:
    types: [content-updated]        # มาจาก Laravel TriggerRebuild
  schedule:
    - cron: '0 20 * * *'            # กันเหนียว: build ทุกวัน 03:00 ไทย (20:00 UTC)
  workflow_dispatch:                # กดเองได้

concurrency:
  group: deploy-production
  cancel-in-progress: true          # ถ้ามี build ค้าง ให้ยกเลิกแล้วใช้รอบล่าสุด

jobs:
  build-deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - uses: actions/setup-node@v4
        with:
          node-version: 22
          cache: npm

      - run: npm ci

      - name: Build (รวม GEO check)
        run: npm run build
        env:
          API_URL: ${{ secrets.API_URL }}
          API_TOKEN: ${{ secrets.API_TOKEN }}

      - name: Copy .htaccess
        run: cp deploy/apache/.htaccess dist/.htaccess

      - name: Setup SSH
        run: |
          mkdir -p ~/.ssh
          echo "${{ secrets.DEPLOY_SSH_KEY }}" > ~/.ssh/id_ed25519
          chmod 600 ~/.ssh/id_ed25519
          ssh-keyscan -H www.geniuscorp.example >> ~/.ssh/known_hosts

      - name: Deploy (atomic release)
        run: |
          RELEASE="release-$(date +%Y%m%d-%H%M%S)"
          rsync -az --delete dist/ deploy@www.geniuscorp.example:/var/www/geniuscorp-web-releases/$RELEASE/
          ssh deploy@www.geniuscorp.example "ln -sfn /var/www/geniuscorp-web-releases/$RELEASE /var/www/geniuscorp-web-current && ls -dt /var/www/geniuscorp-web-releases/release-* | tail -n +4 | xargs -r rm -rf"

      - name: Smoke test
        run: |
          curl -sf https://www.geniuscorp.example/ > /dev/null
          curl -sf https://www.geniuscorp.example/sitemap.xml | grep -q "<urlset"
          curl -sf https://www.geniuscorp.example/llms.txt | grep -q "^# "
```

**ตัวเลือก B - Webhook receiver บนเครื่อง build ของเราเอง** (ไม่ใช้ GitHub; เหมาะกับองค์กรที่โค้ดอยู่ภายใน)

```js
// deploy/webhook-server.mjs - รันด้วย node บนเครื่อง build (systemd), รับ POST จาก Laravel แล้วรัน deploy.sh
import { createServer } from 'node:http'
import { createHmac, timingSafeEqual } from 'node:crypto'
import { spawn } from 'node:child_process'

const PORT = Number(process.env.PORT ?? 9000)
const SECRET = process.env.REBUILD_WEBHOOK_SECRET
if (!SECRET) throw new Error('REBUILD_WEBHOOK_SECRET is required')

let building = false
let queued = false

function runDeploy() {
  if (building) { queued = true; return }
  building = true
  console.log(new Date().toISOString(), 'deploy start')
  const child = spawn('bash', ['deploy/deploy.sh'], { stdio: 'inherit', cwd: process.env.PROJECT_DIR ?? process.cwd() })
  child.on('exit', (code) => {
    console.log(new Date().toISOString(), 'deploy exit', code)
    building = false
    if (queued) { queued = false; runDeploy() }   // มีคำขอระหว่าง build → build อีกรอบเดียว
  })
}

createServer((req, res) => {
  if (req.method !== 'POST' || req.url !== '/rebuild') { res.writeHead(404).end(); return }

  let body = ''
  req.on('data', (chunk) => { body += chunk })
  req.on('end', () => {
    const expected = createHmac('sha256', SECRET).update(body).digest('hex')
    const given = String(req.headers['x-geo-signature'] ?? '')
    const ok = given.length === expected.length && timingSafeEqual(Buffer.from(given), Buffer.from(expected))
    if (!ok) { res.writeHead(401).end('bad signature'); return }

    runDeploy()
    res.writeHead(202, { 'Content-Type': 'application/json' }).end(JSON.stringify({ accepted: true }))
  })
}).listen(PORT, () => console.log(`webhook listening on :${PORT}`))
```

```ini
# /etc/systemd/system/geo-webhook.service (บนเครื่อง build)
[Unit]
Description=GeniusCorp rebuild webhook
After=network.target

[Service]
User=deploy
WorkingDirectory=/home/deploy/geniuscorp-web
Environment=PROJECT_DIR=/home/deploy/geniuscorp-web
Environment=REBUILD_WEBHOOK_SECRET=change-me
Environment=PORT=9000
ExecStart=/usr/bin/node deploy/webhook-server.mjs
Restart=always

[Install]
WantedBy=multi-user.target
```

ตั้ง `REBUILD_WEBHOOK_URL=https://build.geniuscorp.example/rebuild` (ผ่าน reverse proxy + HTTPS) และ `REBUILD_WEBHOOK_SECRET` ค่าเดียวกันทั้งสองฝั่ง

> 🧪 **ทดสอบ Module 5:** แก้ `short_description` ของบริการหนึ่งใน DB (หรือผ่าน tinker: `Service::first()->update([...])`) → ดู log ของ Laravel `Rebuild triggered` → GitHub Actions/webhook รัน → ภายใน ~3 นาที เปิดหน้าบริการบน production เห็นข้อความใหม่ และ `sitemap.xml` มี lastmod ใหม่ของหน้านั้น · ทดสอบ rollback: สลับ symlink กลับไป release ก่อนหน้า

---

## 📚 Module 6: Measurement & Monitoring - รู้ได้อย่างไรว่า AI ค้นเจอเราแล้ว

### เวลา 22:55-23:20 น.

> 💡 **หัวใจของ Module นี้:** GEO ไม่มี "อันดับ" ให้ดู เราจึงต้องวัดจาก 3 ชั้น: (1) crawler เข้ามาเก็บข้อมูลจริงหรือไม่ (Server Log) (2) เครื่องมือค้นหาที่ป้อน AI รู้จักเราหรือไม่ (Search Console, Bing) (3) AI อ้างอิงเราจริงหรือไม่ (ทดสอบถามรายเดือน) และทำเป็นระบบที่ทำซ้ำได้ทุกเดือน

---

### 6.1 Google Search Console และ Bing Webmaster Tools

**Google Search Console** (search.google.com/search-console):

1. Add property แบบ **Domain** (`geniuscorp.example`) → ยืนยันด้วย DNS TXT record (ครอบคลุมทั้ง www/non-www/http/https) หรือแบบ URL prefix ยืนยันด้วยไฟล์ HTML ใน `public/` ของ Astro
2. **Sitemaps** → submit `https://www.geniuscorp.example/sitemap.xml` (WP: `sitemap_index.xml`) → รอสถานะ Success และดู "Discovered URLs" ตรงกับจำนวนหน้าจริง
3. **URL Inspection** → ใส่ URL หน้าบริการ → Test Live URL → ดู "View crawled page" ว่า Googlebot เห็น HTML และ Structured Data ครบ → Request Indexing สำหรับหน้าสำคัญ 5-10 หน้าแรก
4. **Enhancements / Structured Data report** (จะปรากฏหลัง Google เก็บข้อมูล 2-7 วัน): ดู Article, Breadcrumb, FAQ, Organization ว่า Valid ครบ
5. **Settings → Crawl stats**: ดูจำนวน request ต่อวัน, response time เฉลี่ย (ควร < 300ms), และ % ของ "Page resource load" (ควรต่ำ = HTML เบา)

**Bing Webmaster Tools** (bing.com/webmasters) - สำคัญกว่าที่คิดเพราะป้อน **ChatGPT Search** และ **Copilot**:

1. Add site → **Import from Google Search Console** (เร็วที่สุด ยืนยันอัตโนมัติ) หรือ DNS/ไฟล์
2. Sitemaps → submit เช่นเดียวกัน
3. **IndexNow**: Bing รองรับการ "แจ้ง URL ที่เปลี่ยน" ทันที เหมาะกับ SSG มาก เพิ่มใน deploy pipeline:

```ts
// scripts/indexnow.mjs - แจ้ง Bing (และ Yandex/Seznam ที่ใช้ IndexNow) ว่า URL ไหนเปลี่ยน หลัง deploy
// key: สร้างไฟล์ public/<key>.txt ที่มีเนื้อหาเป็น key เดียวกัน (Bing จะเช็คไฟล์นี้)
import { readFileSync } from 'node:fs'

const KEY = process.env.INDEXNOW_KEY
const HOST = 'www.geniuscorp.example'
if (!KEY) throw new Error('INDEXNOW_KEY is required')

const xml = readFileSync('dist/sitemap.xml', 'utf8')
const urls = [...xml.matchAll(/<loc>(.*?)<\/loc>/g)].map((m) => m[1])

const res = await fetch('https://api.indexnow.org/indexnow', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json; charset=utf-8' },
  body: JSON.stringify({ host: HOST, key: KEY, keyLocation: `https://${HOST}/${KEY}.txt`, urlList: urls.slice(0, 10000) }),
})
console.log('IndexNow', res.status, urls.length, 'urls')
```

เพิ่มใน workflow หลัง smoke test: `- run: node scripts/indexnow.mjs` พร้อม `INDEXNOW_KEY` ใน secrets · Google **ไม่** รองรับ IndexNow ใช้ sitemap lastmod แทน

### 6.2 ตรวจ Server Log หา AI Crawlers

Access log แบบ `combined` มี User-Agent ทุก request นี่คือหลักฐานตรงที่สุดว่า AI เข้ามาอ่านเว็บเราจริง

```bash
# บนเซิร์ฟเวอร์: นับ request จาก AI crawlers แต่ละตัวใน 7 วันล่าสุด
LOG=/var/log/apache2/geniuscorp-web-access.log      # nginx: /var/log/nginx/geniuscorp-web-access.log
BOTS='GPTBot|OAI-SearchBot|ChatGPT-User|ClaudeBot|Claude-SearchBot|Claude-User|PerplexityBot|Perplexity-User|Google-Extended|Googlebot|Bingbot|Applebot|CCBot|Bytespider|Amazonbot|meta-externalagent'

# สรุปจำนวนต่อ bot
zgrep -hE "$BOTS" $LOG $LOG.1 $LOG.*.gz 2>/dev/null \
  | grep -oE "$BOTS" | sort | uniq -c | sort -rn

# หน้าไหนที่ OAI-SearchBot อ่านมากที่สุด (บอกว่า ChatGPT Search สนใจอะไร)
zgrep -h "OAI-SearchBot" $LOG* | awk '{print $7}' | sort | uniq -c | sort -rn | head -20

# AI crawler เจอ 404/5xx ไหม (ต้องเป็นศูนย์)
zgrep -hE "$BOTS" $LOG* | awk '$9 >= 400 {print $9, $7}' | sort | uniq -c | sort -rn | head

# crawler เข้ามาดู sitemap/llms.txt/robots.txt หรือยัง
zgrep -hE "sitemap\.xml|llms\.txt|robots\.txt" $LOG* | awk '{print $7, $14}' | sort | uniq -c | sort -rn | head
```

สคริปต์รายงานรายสัปดาห์ (ตั้ง cron ส่งอีเมล/LINE Notify):

```bash
#!/usr/bin/env bash
# /usr/local/bin/geo-crawler-report.sh - สรุป AI crawlers 7 วัน เป็นตาราง
set -euo pipefail
LOG=/var/log/apache2/geniuscorp-web-access.log
SINCE=$(date -d '7 days ago' '+%d/%b/%Y')
BOTS='GPTBot|OAI-SearchBot|ChatGPT-User|ClaudeBot|Claude-SearchBot|Claude-User|PerplexityBot|Perplexity-User|Google-Extended|Googlebot|Bingbot'

echo "AI crawler report - 7 วันล่าสุด (ตั้งแต่ $SINCE)"
printf '%-20s %8s %8s %8s\n' BOT REQUESTS PAGES ERRORS
for bot in ${BOTS//|/ }; do
  lines=$(zgrep -h "$bot" $LOG* 2>/dev/null || true)
  [ -z "$lines" ] && continue
  req=$(echo "$lines" | wc -l)
  pages=$(echo "$lines" | awk '{print $7}' | sort -u | wc -l)
  err=$(echo "$lines" | awk '$9 >= 400' | wc -l)
  printf '%-20s %8s %8s %8s\n' "$bot" "$req" "$pages" "$err"
done
```

การอ่านผล: ถ้า `OAI-SearchBot`, `PerplexityBot`, `Claude-SearchBot` เข้ามาแล้วภายใน 2-4 สัปดาห์หลัง Deploy และ submit sitemap แปลว่าเว็บ "อยู่ในระบบ" แล้ว ถ้าไม่มาเลยหลัง 6 สัปดาห์ ให้ตรวจ robots.txt, ตรวจว่า Bing index แล้ว (ChatGPT ใช้ Bing) และเพิ่มลิงก์เข้าเว็บจากที่อื่น (โซเชียล, directory, partner)

> ⚠️ **ยืนยันตัวตนของ bot:** User-Agent ปลอมได้ ถ้าต้องการแน่ใจ (เช่น ก่อนตัดสินใจบล็อก) ให้ reverse DNS ของ IP: Googlebot ต้องลงท้าย `googlebot.com`/`google.com`, Bingbot `search.msn.com`, OpenAI เผยแพร่ช่วง IP ที่ openai.com/gptbot.json และ openai.com/searchbot.json

### 6.3 แผนทดสอบรายเดือน: ถาม AI แล้วบันทึกว่าเว็บถูกอ้างอิงหรือไม่

สร้างชุด **คำถามเป้าหมาย 15-20 ข้อ** ที่ลูกค้าจริงน่าจะถาม แล้วถามทุก Engine เดือนละครั้ง (วันเดียวกันของเดือน) บันทึกลง Sheet:

| #  | คำถามเป้าหมาย                                            | ChatGPT Search | Perplexity | Claude | Gemini / AI Overviews | หมายเหตุ (ใครถูกอ้างอิงแทน) |
| -- | -------------------------------------------------------- | -------------- | ---------- | ------ | --------------------- | ---------------------------- |
| 1  | บริษัทรับทำเว็บไซต์องค์กรที่รองรับ AI Search ในไทย         | ✅ อันดับ 2      | ✅          | ❌      | ❌                     | คู่แข่ง A, B                  |
| 2  | ทำเว็บองค์กรราคาเท่าไร ใช้เวลากี่วัน                       | ❌              | ✅ (FAQ)    | ❌      | ❌                     |                              |
| 3  | GEO คืออะไร ต่างจาก SEO อย่างไร                           | ❌              | ✅ (บทความ) | ✅      | ❌                     |                              |
| 4  | Astro กับ WordPress อันไหนดีกว่าสำหรับเว็บบริษัท             |                |            |        |                       |                              |
| 5  | GeniusCorp คือบริษัทอะไร ติดต่อได้ที่ไหน (brand query)      | ✅              | ✅          | ✅      | ✅                     | ต้องได้ 4/4 เสมอ               |
| …  | …                                                        |                |            |        |                       |                              |

กติกาการทดสอบให้เทียบกันได้:

1. ใช้ **โหมดค้นหาเว็บ** (ChatGPT: เปิด Search; Claude: เปิด web search; Gemini: ดู AI Overviews ใน Google ด้วย) ไม่ใช่คำตอบจาก training data อย่างเดียว
2. ถามเป็นภาษาไทยเหมือนลูกค้าจริง และถามอีกรอบเป็นอังกฤษถ้ามีเนื้อหาอังกฤษ
3. บันทึก "ถูกอ้างอิง" เมื่อมีลิงก์/ชื่อเว็บเราปรากฏใน citation ไม่ใช่แค่พูดถึงหัวข้อ
4. บันทึกว่าหน้าไหนถูกอ้างอิง (บทความ? FAQ? หน้าบริการ?) → บอกว่าเนื้อหาแบบไหนได้ผล
5. บันทึกคู่แข่งที่ถูกอ้างอิงแทน → ไปดูว่าเขามีอะไรที่เราไม่มี (มักเป็นตัวเลข/FAQ/บทความเฉพาะทาง)
6. ใช้ session ใหม่/incognito ทุกครั้ง ไม่ให้ประวัติแชทมีผล

ตัวชี้วัดรายเดือน: **Citation rate** = จำนวนช่องที่ ✅ ÷ (จำนวนคำถาม × จำนวน Engine) เป้าหมายเริ่มต้น 15-25% ใน 3 เดือน และ brand query ต้อง 100%

### 6.4 GEO-Ready Checklist ฉบับสมบูรณ์ (Astro และ WordPress)

ใช้กับโปรเจกต์จริงหลังจบคอร์ส (ไฟล์ `geo-ready-checklist.md` มีให้ทั้งสองฉบับ) - นี่คือฉบับรวม 30 ข้อ:

**A. Architecture & Crawlability**

- [ ] A1 HTML สมบูรณ์ตั้งแต่ response แรก (SSG/SSR) ไม่พึ่ง JS สำหรับเนื้อหาหลัก
- [ ] A2 robots.txt เปิด crawler ที่ต้องการ (รวม OAI-SearchBot, PerplexityBot, Claude-SearchBot) และชี้ sitemap
- [ ] A3 sitemap.xml มีทุกหน้าที่ต้องการ, lastmod จริง, ไม่มี URL ขยะ, submit ใน GSC + Bing
- [ ] A4 llms.txt ที่ root generate จากข้อมูลจริง
- [ ] A5 HTTPS ทุกหน้า, http→https และ www/non-www เป็น 301 hop เดียว, trailing slash สม่ำเสมอ
- [ ] A6 ไม่มี redirect chain, ไม่มี 404 ใน sitemap, หน้า 404 ตอบ status 404 จริง

**B. Metadata**

- [ ] B1 Title ไม่ซ้ำ ~50-60 ตัวอักษร รูปแบบ `<เนื้อหา> | <แบรนด์>`
- [ ] B2 Meta description รายหน้า ~150-160 ตัวอักษร จากข้อมูลจริง (excerpt/short_description)
- [ ] B3 ไม่มี meta keywords, ไม่มี keyword stuffing
- [ ] B4 Canonical absolute ทุกหน้า ตัด query, pagination ชี้ตัวเอง
- [ ] B5 OG + Twitter ครบ, บทความมี og:type=article + published_time/modified_time/author
- [ ] B6 hreflang ครบและชี้กลับกัน ถ้ามีหลายภาษา (หรือไม่มีเลยถ้าภาษาเดียว)

**C. Structured Data (JSON-LD)**

- [ ] C1 JSON-LD ชุดเดียวต่อหน้า (@graph) ไม่ซ้ำจากหลายแหล่ง
- [ ] C2 Organization/LocalBusiness + WebSite ในหน้าแรก ข้อมูลตรงกับหน้า Contact
- [ ] C3 WebPage + BreadcrumbList ทุกหน้า (breadcrumb ที่มองเห็นตรงกัน)
- [ ] C4 Service + Offer (ราคาเป็นตัวเลข, THB) / Product / Course ตามประเภทธุรกิจ
- [ ] C5 Article + Person(author) + datePublished/dateModified ISO 8601 ค.ศ. + image
- [ ] C6 FAQPage บนหน้าที่มี FAQ และเนื้อหาตรงกับที่แสดง
- [ ] C7 ทุกหน้าผ่าน validator.schema.org (0 error) และ Rich Results Test; มีสคริปต์ตรวจอัตโนมัติก่อน deploy

**D. Content Structure & E-E-A-T**

- [ ] D1 H1 เดียวทุกหน้า, H2 หัวข้อหลัก (คำถามเมื่อเหมาะ), การ์ดเป็น H3, ไม่ข้ามระดับ
- [ ] D2 ย่อหน้าแรกตอบคำถามหลักใน 2-3 ประโยค (Inverted Pyramid)
- [ ] D3 เนื้อหามีตัวเลข/สถิติ/แหล่งอ้างอิง/คำพูด (Princeton GEO)
- [ ] D4 FAQ 4-6 ข้อต่อหน้าบริการ ตามกฎ answer-ready
- [ ] D5 Author Box: ชื่อ ตำแหน่ง bio รูป ลิงก์โปรไฟล์ sameAs เชื่อม Person Schema
- [ ] D6 `<time datetime>` ISO สำหรับวันเผยแพร่/แก้ไข และ "แก้ไข" เฉพาะเมื่อแก้จริง
- [ ] D7 หน้าโปรไฟล์ผู้เขียน/ทีมมีข้อมูลจริง, หน้า Contact มีที่อยู่/เบอร์/อีเมล/เวลาทำการ

**E. Performance**

- [ ] E1 TTFB < 0.4s (SSG) / < 0.6s (WP + cache)
- [ ] E2 HTML < 150KB, gzip/brotli เปิด, charset utf-8
- [ ] E3 รูป WebP ขนาดตามจริง, lazy load ยกเว้น LCP, width/height ครบ
- [ ] E4 LCP < 2.5s, CLS < 0.1, PSI mobile > 85

**F. Operations & Measurement**

- [ ] F1 ระบบ rebuild/purge อัตโนมัติเมื่อเนื้อหาเปลี่ยน และ build ล้มเหลวเมื่อ GEO check ไม่ผ่าน
- [ ] F2 Google Search Console + Bing Webmaster Tools ตั้งค่าแล้ว, IndexNow (Bing)
- [ ] F3 รายงาน AI crawlers จาก server log รายสัปดาห์
- [ ] F4 ทดสอบถาม AI รายเดือนด้วยชุดคำถามเป้าหมาย + บันทึก citation rate
- [ ] F5 Backup อัตโนมัติ (WP/DB) และ rollback ได้ (Astro release)
- [ ] F6 Guidelines + Pattern/Template ส่งมอบให้ทีมคอนเทนต์แล้ว

---

## 🛠️ Master Workshop - GeniusCorp: ประกอบร่างสมบูรณ์ทั้งสองฝั่ง

### เวลา 23:20-23:30 น. (สรุปคอร์ส + สิ่งที่ทำต่อหลังคลาส)

> **โจทย์:** ทั้ง GeniusCorp Modern และ GeniusCorp WP ต้องผ่าน GEO-Ready Checklist 30 ข้อ (ข้อที่ต้องรอเวลา เช่น F3/F4 ให้ตั้งระบบไว้แล้ว) และมีตารางเปรียบเทียบผลลัพธ์ระหว่างสองสถาปัตยกรรม

### ขั้นที่ 1 - ตรวจ Checklist 30 ข้อ ทั้งสองเว็บ

| หมวด                       | GeniusCorp Modern (Astro) | GeniusCorp WP | หมายเหตุ                                            |
| -------------------------- | ------------------------- | ------------- | --------------------------------------------------- |
| A Architecture (6)         | /6                        | /6            | A4 llms.txt ทั้งสองฝั่ง, A5 ตรวจด้วย curl -sIL          |
| B Metadata (6)             | /6                        | /6            | B6 ไม่มี hreflang = ผ่าน (ภาษาเดียว)                    |
| C Structured Data (7)      | /7                        | /7            | C7: Astro มี check-geo.mjs, WP ตรวจมือ 5 หน้า           |
| D Content & E-E-A-T (7)    | /7                        | /7            | D5/D6 จาก Module 1 วันนี้                             |
| E Performance (4)          | /4                        | /4            | จากตาราง Module 4.4                                  |
| F Operations (6)           | /6                        | /6            | F1: Astro = Webhook, WP = auto purge cache             |
| **รวม**                    | **/30**                   | **/30**       |                                                     |

### ขั้นที่ 2 - เปรียบเทียบผลลัพธ์ Astro SSG vs WordPress (กรอกจากของจริง)

| มิติ                                    | GeniusCorp Modern | GeniusCorp WP | ผู้ชนะ | ความเห็นของผู้เรียน |
| --------------------------------------- | ----------------- | ------------- | ------ | ------------------- |
| GEO-Ready Checklist (ข้อที่ผ่าน)         |                   |               |        |                     |
| TTFB / HTML size / LCP / PSI            |                   |               |        |                     |
| เวลาที่ใช้ทำให้ GEO-Ready (ชั่วโมงเรียน)   | ~6 (Day 1-2)      | ~3 (Day 3)    |        | WP เร็วกว่าเพราะมีอยู่แล้ว |
| ความเสี่ยงที่จะ "พังกลับ" ในอนาคต          | ต่ำ               | ปานกลาง-สูง    |        |                     |
| ทีมคอนเทนต์ทำงานเองได้                    | ต้องมี Admin เพิ่ม  | ได้ทันที        |        |                     |
| ค่าดูแลรายเดือน (ประมาณ)                 |                   |               |        |                     |

### ขั้นที่ 3 - สิ่งที่ทำต่อหลังจบคอร์ส (Action Plan 30 วัน)

| สัปดาห์ | Astro / Laravel                                                       | WordPress                                                        | ทั้งคู่                                              |
| ------- | --------------------------------------------------------------------- | ---------------------------------------------------------------- | ---------------------------------------------------- |
| 1       | Deploy production จริงของโปรเจกต์ตัวเอง + Webhook                       | Child Theme GEO ลงเว็บจริง (ทีละไฟล์ ตรวจทุกครั้ง)                   | Submit sitemap GSC + Bing, ตั้ง crawler report          |
| 2       | Admin (Filament) สำหรับทีมคอนเทนต์ + `content_updated_at`                | ลด plugin, WebP ทั้งคลัง, Block Pattern                            | ส่ง Guidelines ให้ทีม, ทำชุดคำถามเป้าหมาย 20 ข้อ         |
| 3       | เพิ่ม Schema เฉพาะธุรกิจ (Product/Course/Event)                          | ย้ายเนื้อหาสำคัญเป็น CPT + ACF ให้ครบ                                | ทดสอบถาม AI ครั้งที่ 1 (baseline)                     |
| 4       | Review log: หน้าไหน crawler ไม่มา → ปรับ internal link/sitemap priority | Review Query Monitor บน staging หลังอัปเดต plugin                    | Monthly GEO Review ครั้งแรก + ตัดสินใจเรื่อง migration |

---

## 📁 โครงสร้างไฟล์สรุปวันที่ 4 (เฉพาะที่เพิ่ม)

```
geniuscorp-api/
├── app/Http/Controllers/Api/V1/SitemapController.php   ← /sitemap-entries (url, lastmod จริง, type, title, summary)
├── app/Observers/ContentObserver.php                   ← saved/deleted → debounce → TriggerRebuild
├── app/Jobs/TriggerRebuild.php                         ← GitHub repository_dispatch หรือ webhook + HMAC
├── app/Providers/AppServiceProvider.php                ← observe 5 models
├── app/Models/Article.php                              ← content_updated_at (แก้จริงเท่านั้น)
├── config/geo.php                                      ← REBUILD_* settings
└── routes/api.php                                      ← + /sitemap-entries

geniuscorp-web/
├── .github/workflows/deploy.yml                        ← build (GEO check) → rsync atomic → smoke test → IndexNow
├── deploy/
│   ├── deploy.sh                                       ← build → ตรวจไฟล์ → rsync release → symlink → curl
│   ├── webhook-server.mjs                              ← ตัวเลือก B: รับ POST + HMAC → รัน deploy.sh
│   ├── apache/.htaccess                                ← brotli/gzip, cache, charset, trailing slash
│   └── nginx/geniuscorp-web.conf
├── scripts/indexnow.mjs                                ← แจ้ง Bing หลัง deploy
├── public/robots.txt
└── src/
    ├── components/AuthorBox.astro                      ← E-E-A-T + <time datetime>
    ├── pages/sitemap.xml.ts                            ← static endpoint จาก /sitemap-entries
    ├── pages/llms.txt.ts                               ← llmstxt.org spec จากข้อมูลเดียวกัน
    ├── pages/404.astro
    └── lib/api.ts                                      ← + getSitemapEntries()

wp-content/themes/geniuscorp-geo/
├── inc/geo-eeat.php                                    ← ACF user fields, author box hook, Block Pattern
├── inc/geo-llms.php                                    ← /llms.txt route + transient, sitemap entry filter
├── template-parts/author-box.php
└── (wp-config.php บน production: DISALLOW_FILE_EDIT, FORCE_SSL_ADMIN, DISABLE_WP_CRON)
```

---

## 📝 สรุปประจำวันที่ 4

| หัวข้อ                              | สิ่งที่ทำได้แล้ว                                                                                                        |
| ----------------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| Module 1 - E-E-A-T                  | Author Box + Person Schema + `<time datetime>` ISO ทั้ง Astro และ WP, `content_updated_at` กัน "แก้ไขปลอม"                 |
| Module 2 - Content Guidelines       | Inverted Pyramid, Guidelines 10 ข้อ, Block Pattern ใน WP, การแบ่งงาน Dev/Content                                           |
| ★ Module 3 - Sitemap/robots/llms.txt | /sitemap-entries → sitemap.xml + llms.txt ตอน build, Rank Math sitemap lastmod, robots.txt เปิด AI, llms.txt ด้วย PHP       |
| Module 4 - Performance              | astro:assets Image, brotli/gzip/cache ที่ Apache/Nginx, ตัวเลขเปรียบเทียบ Astro vs WP                                       |
| ★ Module 5 - Deployment             | vhost + HTTPS + redirect hop เดียว, Laravel/WP deploy ปลอดภัย, deploy.sh atomic release, Webhook Rebuild (GitHub Actions / webhook server) |
| ★ Module 6 - Measurement            | GSC + Bing + IndexNow, server log crawler report, แผนทดสอบรายเดือน + citation rate, GEO-Ready Checklist 30 ข้อ              |
| ★ Master Workshop                   | ทั้งสองเว็บผ่าน Checklist, ตารางเปรียบเทียบ, Action Plan 30 วัน                                                             |

### ✅ สรุปทั้งหลักสูตร 4 วัน

> จบวันนี้ผู้เรียนมี:
>
> - **GeniusCorp Modern**: MySQL → Laravel 13 API (Sanctum) → Astro 6 SSG พร้อม SeoHead, JSON-LD ครบ 9 Schema, FAQ, Author Box, sitemap/llms.txt/robots.txt, Deploy บน Apache/Nginx พร้อม Webhook Rebuild และ GEO check อัตโนมัติ
> - **GeniusCorp WP**: Child Theme GEO ที่ทำ Audit → Metadata/Canonical/Heading → JSON-LD ด้วยโค้ดเอง → FAQ ด้วย ACF → Performance → llms.txt โดยไม่ Rebuild เว็บ
> - **เครื่องมือที่นำไปใช้ได้ทันที**: Audit Checklist 20 ข้อ (WP), GEO-Ready Checklist 30 ข้อ, check-geo.mjs, crawler report script, Guidelines สำหรับทีมคอนเทนต์, แผนทดสอบรายเดือน
> - **การตัดสินใจเชิงสถาปัตยกรรม**: รู้ว่าโปรเจกต์ไหนอยู่กับ WordPress ต่อ โปรเจกต์ไหนย้ายไป Astro และย้ายอย่างไรโดยไม่เสียอันดับ

---

## 📖 แหล่งอ้างอิงประจำวันที่ 4

- Google Search Central - Creating helpful, reliable, people-first content (E-E-A-T): https://developers.google.com/search/docs/fundamentals/creating-helpful-content
- Google Search Quality Rater Guidelines (PDF): https://static.googleusercontent.com/media/guidelines.raterhub.com/en//searchqualityevaluatorguidelines.pdf
- Google Search Central - Build and submit a sitemap, Sitemap index: https://developers.google.com/search/docs/crawling-indexing/sitemaps/build-sitemap
- Google Search Central - robots.txt introduction and guide: https://developers.google.com/search/docs/crawling-indexing/robots/intro
- sitemaps.org protocol: https://www.sitemaps.org/protocol.html
- llms.txt specification (Answer.AI): https://llmstxt.org
- IndexNow protocol (Bing): https://www.indexnow.org
- Bing Webmaster Tools: https://www.bing.com/webmasters
- Google Search Console: https://search.google.com/search-console
- OpenAI - GPTBot/OAI-SearchBot IP ranges and bot docs: https://platform.openai.com/docs/bots
- Astro Docs - Endpoints (static file endpoints), Images (astro:assets, remote images, domains), Deploy to Apache/Nginx (static): https://docs.astro.build
- Laravel 13 Docs - Observers, Queues, HTTP Client, Deployment (optimization, permissions): https://laravel.com/docs/13.x
- GitHub Docs - repository_dispatch event, Encrypted secrets: https://docs.github.com/actions
- Apache HTTP Server - mod_deflate, mod_brotli, mod_expires, mod_rewrite: https://httpd.apache.org/docs/2.4/
- Nginx - ngx_http_gzip_module, ngx_brotli: https://nginx.org/en/docs/
- Certbot (Let's Encrypt): https://certbot.eff.org
- WordPress - Hardening WordPress (Advanced Administration): https://developer.wordpress.org/advanced-administration/security/hardening/
- web.dev - Core Web Vitals: https://web.dev/articles/vitals
- Aggarwal et al. (2024). *GEO: Generative Engine Optimization*. https://arxiv.org/abs/2311.09735

---

**💡 คำคมประจำวัน (และประจำคอร์ส):**

> "เว็บที่ AI อ้างอิงไม่ใช่เว็บที่สวยที่สุดหรือใหม่ที่สุด แต่คือเว็บที่ตอบคำถามได้ตรง มีคนเขียนที่มีตัวตน บอกวันที่ไม่โกหก ให้เครื่องอ่านโครงสร้างออก และมีระบบที่ทำให้ทั้งหมดนี้ยังจริงอยู่ในเดือนหน้าโดยไม่ต้องมีใครจำ"

---

_เอกสารจัดทำโดย: อาจารย์สามิตร โกยม | IT Genius Engineering Co., Ltd._
_หลักสูตร ทำเว็บให้ติดอันดับ AI Search ด้วย Astro & Laravel & WordPress & MySQL (GEO/AEO) - วันที่ 4 จาก 4_
