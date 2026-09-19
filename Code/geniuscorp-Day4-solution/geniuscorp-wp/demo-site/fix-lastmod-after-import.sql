-- แก้ post_modified ที่เพี้ยนจาก import (ทุกโพสต์ modified วันเดียวกัน) ให้เท่ากับวันเผยแพร่
-- รันครั้งเดียวหลัง backup (เปลี่ยน prefix wp_ ถ้าต่าง)
UPDATE wp_posts
SET post_modified = post_date, post_modified_gmt = post_date_gmt
WHERE post_type IN ('post', 'page', 'service')
  AND post_status = 'publish'
  AND DATE(post_modified) = '2026-09-12';
