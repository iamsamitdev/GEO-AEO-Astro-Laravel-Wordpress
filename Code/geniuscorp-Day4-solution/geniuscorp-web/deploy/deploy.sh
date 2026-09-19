#!/usr/bin/env bash
# deploy/deploy.sh - รันจากเครื่อง build (เครื่องพัฒนา หรือ CI)
# ใช้: ./deploy/deploy.sh   (ตั้งค่า SERVER/REMOTE_DIR ด้านล่าง หรือผ่าน env)
set -euo pipefail

SERVER="${DEPLOY_SERVER:-deploy@www.geniuscorp.example}"
REMOTE_DIR="${DEPLOY_REMOTE_DIR:-/var/www/geniuscorp-web}"
SITE_URL="${DEPLOY_SITE_URL:-https://www.geniuscorp.example}"
LOCAL_DIST="dist/"

echo "▶ 1/4 build (ดึงข้อมูลล่าสุดจาก API + GEO check)"
npm ci --silent
npm run build              # ไม่ผ่าน GEO check = หยุดที่นี่ ไม่ deploy

echo "▶ 2/4 ตรวจไฟล์สำคัญ"
for f in index.html sitemap.xml llms.txt robots.txt 404.html; do
  [ -f "$LOCAL_DIST/$f" ] || { echo "✗ ไม่พบ $f ใน dist/"; exit 1; }
done
cp deploy/apache/.htaccess "$LOCAL_DIST/.htaccess"

echo "▶ 3/4 rsync ไปเซิร์ฟเวอร์ (atomic release + symlink)"
RELEASE="release-$(date +%Y%m%d-%H%M%S)"
rsync -az --delete "$LOCAL_DIST" "$SERVER:$REMOTE_DIR-releases/$RELEASE/"
ssh "$SERVER" "ln -sfn $REMOTE_DIR-releases/$RELEASE $REMOTE_DIR-current \
  && ls -dt $REMOTE_DIR-releases/release-* | tail -n +4 | xargs -r rm -rf"

echo "▶ 4/4 ตรวจหลัง deploy"
curl -sf -o /dev/null -w "home %{http_code} ttfb=%{time_starttransfer}s\n" "$SITE_URL/"
curl -sf -o /dev/null -w "sitemap %{http_code}\n" "$SITE_URL/sitemap.xml"
curl -sf -o /dev/null -w "llms %{http_code}\n" "$SITE_URL/llms.txt"
echo "✓ deploy $RELEASE เสร็จ"
