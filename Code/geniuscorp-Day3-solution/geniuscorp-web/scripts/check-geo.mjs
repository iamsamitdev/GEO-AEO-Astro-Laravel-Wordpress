// ตรวจ GEO essentials ของทุกหน้าใน dist/ หลัง build - ล้มเหลว (exit 1) ถ้าพบปัญหา
import { readFileSync, readdirSync, statSync } from 'node:fs'
import { join, relative } from 'node:path'

const DIST = 'dist'
const ISO_DATE = /^\d{4}-\d{2}-\d{2}(T\d{2}:\d{2}(:\d{2}(\.\d+)?)?([+-]\d{2}:\d{2}|Z))?$/

// กฎว่าแต่ละกลุ่ม URL ต้องมี @type อะไรบ้าง
const RULES = [
  { match: (p) => p === '/', requires: ['Organization', 'WebSite', 'WebPage'] },
  { match: (p) => /^\/services\/[^/]+\/$/.test(p), requires: ['Service', 'BreadcrumbList', 'FAQPage'] },
  { match: (p) => /^\/blog\/[^/]+\/$/.test(p), requires: ['Article', 'Person', 'BreadcrumbList'] },
  { match: (p) => /^\/portfolio\/[^/]+\/$/.test(p), requires: ['CreativeWork', 'BreadcrumbList'] },
  { match: (p) => p === '/team/', requires: ['Person'] },
  { match: () => true, requires: ['WebPage'] },
]

const SKIP = new Set(['/404/'])

// type ย่อยของ WebPage ตาม Schema.org ถือว่าผ่านกฎ "ต้องมี WebPage"
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
let pages = 0
const report = (file, msg) => { console.log(`✗ ${toPath(file)}  ${msg}`); errors++ }

for (const file of walk(DIST)) {
  const path = toPath(file)
  if (SKIP.has(path)) continue
  pages++
  const html = readFileSync(file, 'utf8')

  const canonical = html.match(/<link rel="canonical" href="([^"]+)"/)?.[1]
  if (!canonical) report(file, 'ไม่มี canonical')
  else if (!canonical.startsWith('https://')) report(file, `canonical ไม่ใช่ absolute: ${canonical}`)

  const h1 = (html.match(/<h1[\s>]/g) ?? []).length
  if (h1 !== 1) report(file, `พบ <h1> ${h1} ตัว`)

  if (!/<meta name="description" content="[^"]{50,}"/.test(html)) report(file, 'meta description สั้นเกินหรือไม่มี')

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

  const rule = RULES.find((r) => r.match(path))
  for (const t of rule.requires) {
    const ok = t === 'WebPage' ? [...types].some((x) => WEBPAGE_TYPES.has(x)) : types.has(t)
    if (!ok) report(file, `ขาด @type ${t} (มี: ${[...types].join(', ')})`)
  }
}

if (errors === 0) console.log(`✓ GEO check ผ่านทุกหน้า (${pages} หน้า)`)
else console.log(`\nพบปัญหา ${errors} รายการ`)
process.exit(errors ? 1 : 0)
