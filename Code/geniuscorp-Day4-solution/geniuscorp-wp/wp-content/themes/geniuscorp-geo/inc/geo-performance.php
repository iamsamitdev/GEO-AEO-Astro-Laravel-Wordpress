<?php
/**
 * Performance: dequeue CSS/JS ที่ไม่ใช้, ปิด jquery-migrate, WebP, ขนาดรูป, LCP
 */

defined('ABSPATH') || exit;

/**
 * Dequeue CSS/JS ของ plugin ที่โหลดทุกหน้าแต่ใช้แค่บางหน้า
 * ชื่อ handle ดูจาก Query Monitor → Scripts / Styles แล้วปรับให้ตรงกับเว็บจริง
 */
add_action('wp_enqueue_scripts', function () {
    if (! is_page('contact')) {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_script('contact-form-7');
        wp_dequeue_script('wpcf7-recaptcha');
    }

    if (! is_front_page()) {
        wp_dequeue_style('slick-slider');
        wp_dequeue_script('slick-slider');
    }

    if (! is_user_logged_in()) {
        wp_dequeue_style('dashicons');
    }
}, 100);

// ปิด jQuery Migrate
add_action('wp_default_scripts', function ($scripts) {
    if (! is_admin() && isset($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

// WebP สำหรับรูปที่อัปโหลดใหม่
add_filter('image_editor_output_format', function (array $formats): array {
    $formats['image/jpeg'] = 'image/webp';
    $formats['image/png']  = 'image/webp';
    return $formats;
});

// ย่อรูปต้นฉบับใหญ่เกิน 1920px
add_filter('big_image_size_threshold', fn () => 1920);

// ขนาดรูปที่ theme ใช้จริง
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);
    add_image_size('card', 800, 450, true);
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
});

// รูปแรกของหน้าเดี่ยว (LCP) ไม่ lazy + fetchpriority high
add_filter('wp_get_attachment_image_attributes', function (array $attr, $attachment, $size): array {
    if ($size === 'post-thumbnail' && is_singular()) {
        $attr['loading']       = 'eager';
        $attr['fetchpriority'] = 'high';
    }
    return $attr;
}, 10, 3);
