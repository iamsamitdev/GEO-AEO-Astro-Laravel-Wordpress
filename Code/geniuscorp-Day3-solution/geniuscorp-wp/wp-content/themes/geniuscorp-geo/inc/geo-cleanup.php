<?php
/**
 * ปิดสิ่งที่ไม่ต้องการใน <head> และปิด Schema ของทุกแหล่ง (เราออกเองชุดเดียวใน geo-schema.php)
 */

defined('ABSPATH') || exit;

// ลด noise ใน <head> ที่ไม่มีประโยชน์กับผู้ใช้/AI และเพิ่ม request
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'rest_output_link_wp_head');

    // ตัวอย่าง: ลบ meta keywords / Organization schema ที่ parent theme ใส่ไว้
    // ชื่อ callback ดูจาก Query Monitor → Hooks & Actions → wp_head แล้วแก้ให้ตรง
    remove_action('wp_head', 'geniuscorp_base_meta_keywords');
    remove_action('wp_head', 'geniuscorp_base_organization_schema', 5);
});

// ปิด XML-RPC (ความปลอดภัย + ลด request ขยะ)
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Rank Math: ปิด JSON-LD ทั้งหมด (เราออกเองครบใน geo-schema.php)
 * ถ้าต้องการเก็บบางส่วนไว้ ให้ unset เฉพาะ key แทน return []
 */
add_filter('rank_math/json_ld', function (array $data, $jsonld): array {
    return [];
}, 99, 2);

/**
 * Yoast SEO (ใช้แทนถ้าใช้ Yoast):
 */
add_filter('wpseo_json_ld_output', '__return_false');
