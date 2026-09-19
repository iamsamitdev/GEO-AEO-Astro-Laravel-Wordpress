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
