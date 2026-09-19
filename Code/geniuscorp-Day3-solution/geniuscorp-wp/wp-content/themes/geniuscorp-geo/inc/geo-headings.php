<?php
/**
 * Heading Hierarchy: โลโก้/ชื่อเว็บใน header ไม่ใช่ <h1> ยกเว้นหน้าแรก
 *
 * แต่ละ theme มี filter ต่างกัน - เปิด comment ตัวที่ตรงกับ theme ที่ใช้
 * ถ้า theme ไม่มี filter ให้คัดลอก header.php มาไว้ใน child แล้วแก้ tag เอง (ดู header.php.example)
 */

defined('ABSPATH') || exit;

$gc_site_title_tag = fn () => is_front_page() ? 'h1' : 'p';

// Theme สมมติในคอร์ส
add_filter('geniuscorp_base_site_title_tag', $gc_site_title_tag);

// Astra
add_filter('astra_site_title_tag', $gc_site_title_tag);

// GeneratePress (ใช้ output filter)
add_filter('generate_site_title_output', function (string $output): string {
    if (is_front_page()) {
        return $output;
    }
    return str_replace(['<h1', '</h1>'], ['<p', '</p>'], $output);
});

// Kadence
add_filter('kadence_site_title_tag', $gc_site_title_tag);
