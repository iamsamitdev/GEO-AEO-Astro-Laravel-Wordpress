#!/usr/bin/env bash
# สรุป AI crawlers จาก access log 7 วันล่าสุด (รันบนเซิร์ฟเวอร์: sudo bash geo-crawler-report.sh)
set -euo pipefail
LOG="${1:-/var/log/apache2/geniuscorp-web-access.log}"   # nginx: /var/log/nginx/geniuscorp-web-access.log
BOTS='GPTBot|OAI-SearchBot|ChatGPT-User|ClaudeBot|Claude-SearchBot|Claude-User|PerplexityBot|Perplexity-User|Google-Extended|Googlebot|Bingbot|Applebot|CCBot|Bytespider|Amazonbot|meta-externalagent'

echo "AI crawler report - $(date '+%Y-%m-%d') - $LOG"
printf '%-20s %8s %8s %8s\n' BOT REQUESTS PAGES ERRORS
for bot in ${BOTS//|/ }; do
  lines=$(zgrep -h "$bot" "$LOG"* 2>/dev/null || true)
  [ -z "$lines" ] && continue
  req=$(echo "$lines" | wc -l)
  pages=$(echo "$lines" | awk '{print $7}' | sort -u | wc -l)
  err=$(echo "$lines" | awk '$9 >= 400' | wc -l)
  printf '%-20s %8s %8s %8s\n' "$bot" "$req" "$pages" "$err"
done

echo
echo "หน้าที่ AI Search bots อ่านมากที่สุด:"
zgrep -hE 'OAI-SearchBot|PerplexityBot|Claude-SearchBot' "$LOG"* 2>/dev/null | awk '{print $7}' | sort | uniq -c | sort -rn | head -15 || true

echo
echo "crawler เข้าถึง sitemap/llms/robots:"
zgrep -hE 'sitemap\.xml|llms\.txt|robots\.txt' "$LOG"* 2>/dev/null | awk '{print $7}' | sort | uniq -c | sort -rn | head || true
