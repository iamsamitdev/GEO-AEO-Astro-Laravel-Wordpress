// Static endpoint: ไฟล์นี้กลายเป็น dist/sitemap.xml ตอน build
import type { APIRoute } from 'astro'
import { getSitemapEntries } from '../lib/api'
import { absoluteUrl } from '../lib/site'

const escapeXml = (s: string) =>
  s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;')

export const GET: APIRoute = async () => {
  const entries = await getSitemapEntries()

  // กัน URL ซ้ำ
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
