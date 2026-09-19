<?php
/**
 * GeniusCorp GEO - Child Theme
 * โหลด CSS ของ parent/child และแยกโค้ด GEO เป็นไฟล์ตามหน้าที่ใน inc/
 */

defined('ABSPATH') || exit;

define('GC_GEO_VERSION', '1.0.0');
define('GC_GEO_DIR', get_stylesheet_directory());
define('GC_GEO_URI', get_stylesheet_directory_uri());

// โหลด CSS ของ parent แล้วตามด้วยของ child
add_action('wp_enqueue_scripts', function () {
    $parent = wp_get_theme(get_template());
    wp_enqueue_style('gc-parent-style', get_template_directory_uri() . '/style.css', [], $parent->get('Version'));
    wp_enqueue_style('geniuscorp-geo', GC_GEO_URI . '/style.css', ['gc-parent-style'], GC_GEO_VERSION);
});

// แยกโค้ดเป็นไฟล์ตามหน้าที่ (ลำดับสำคัญ: post-types ต้องมาก่อน schema/faq)
foreach ([
    'geo-cleanup',
    'geo-post-types',
    'geo-metadata',
    'geo-headings',
    'geo-schema',
    'geo-faq',
    'geo-performance',
    'geo-eeat',        // Day 4: author box, ACF user fields, block pattern
    'geo-llms',        // Day 4: /llms.txt + sitemap lastmod
] as $file) {
    $path = GC_GEO_DIR . '/inc/' . $file . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
}
