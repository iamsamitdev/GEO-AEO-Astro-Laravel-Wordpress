// แจ้ง Bing (IndexNow) ว่า URL ไหนเปลี่ยน หลัง deploy
// ต้องมีไฟล์ public/<key>.txt ที่มีเนื้อหาเป็น key เดียวกัน (Bing ตรวจไฟล์นี้)
import { readFileSync } from 'node:fs'

const KEY = process.env.INDEXNOW_KEY
const HOST = process.env.INDEXNOW_HOST ?? 'www.geniuscorp.example'
if (!KEY) throw new Error('INDEXNOW_KEY is required')

const xml = readFileSync('dist/sitemap.xml', 'utf8')
const urls = [...xml.matchAll(/<loc>(.*?)<\/loc>/g)].map((m) => m[1])

const res = await fetch('https://api.indexnow.org/indexnow', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json; charset=utf-8' },
  body: JSON.stringify({ host: HOST, key: KEY, keyLocation: `https://${HOST}/${KEY}.txt`, urlList: urls.slice(0, 10000) }),
})
console.log('IndexNow', res.status, urls.length, 'urls')
