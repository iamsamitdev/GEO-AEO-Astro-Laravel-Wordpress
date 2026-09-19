<?php
// ใส่เพิ่มใน wp-config.php บน production (ก่อนบรรทัด /* That's all, stop editing! */)

define('DISALLOW_FILE_EDIT', true);   // ปิดแก้ไฟล์ theme/plugin จากหน้า Admin
define('FORCE_SSL_ADMIN', true);
define('WP_DEBUG', false);
define('DISABLE_WP_CRON', true);      // ใช้ cron จริงแทน: */10 * * * * curl -s https://www.example.com/wp-cron.php
define('WP_MEMORY_LIMIT', '256M');
