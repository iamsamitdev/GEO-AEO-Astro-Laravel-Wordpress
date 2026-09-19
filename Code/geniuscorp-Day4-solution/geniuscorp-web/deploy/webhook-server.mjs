// ตัวเลือก B: webhook receiver บนเครื่อง build - รับ POST จาก Laravel (HMAC) แล้วรัน deploy.sh
// รัน: PROJECT_DIR=/home/deploy/geniuscorp-web REBUILD_WEBHOOK_SECRET=... node deploy/webhook-server.mjs
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
    if (queued) { queued = false; runDeploy() }
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
