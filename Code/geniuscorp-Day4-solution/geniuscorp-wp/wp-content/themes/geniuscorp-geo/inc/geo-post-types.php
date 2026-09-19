<?php
/**
 * Custom Post Type "service" + ฟิลด์ ACF (price_from, duration_days, faqs repeater)
 */

defined('ABSPATH') || exit;

add_action('init', function () {
    register_post_type('service', [
        'labels' => [
            'name'          => 'บริการ',
            'singular_name' => 'บริการ',
            'add_new_item'  => 'เพิ่มบริการใหม่',
            'edit_item'     => 'แก้ไขบริการ',
            'all_items'     => 'บริการทั้งหมด',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'services', 'with_front' => false],
        'menu_icon'    => 'dashicons-hammer',
        'supports'     => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'],
        'show_in_rest' => true,
    ]);
});

// ให้ post type ใหม่เข้า sitemap ของ Rank Math
add_filter('rank_math/sitemap/post_types', fn (array $types) => array_values(array_unique([...$types, 'service'])));

// ACF fields แบบโค้ด (version control ได้)
add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'    => 'group_gc_service',
        'title'  => 'ข้อมูลบริการ (GEO)',
        'fields' => [
            [
                'key'          => 'field_gc_price_from',
                'label'        => 'ราคาเริ่มต้น (บาท)',
                'name'         => 'price_from',
                'type'         => 'number',
                'min'          => 0,
                'instructions' => 'ตัวเลขล้วน ไม่ใส่ comma - ใช้ใน Offer.price',
            ],
            [
                'key'   => 'field_gc_duration_days',
                'label' => 'ระยะเวลาดำเนินการ (วัน)',
                'name'  => 'duration_days',
                'type'  => 'number',
                'min'   => 0,
            ],
            [
                'key'          => 'field_gc_faqs',
                'label'        => 'คำถามที่พบบ่อย (FAQ)',
                'name'         => 'faqs',
                'type'         => 'repeater',
                'instructions' => 'เขียนคำถามอย่างที่ลูกค้าถามจริง คำตอบ 2-4 ประโยค ประโยคแรกตอบตรง มีตัวเลขถ้าทำได้',
                'min'          => 0,
                'max'          => 8,
                'layout'       => 'block',
                'button_label' => 'เพิ่มคำถาม',
                'sub_fields'   => [
                    [
                        'key'       => 'field_gc_faq_question',
                        'label'     => 'คำถาม',
                        'name'      => 'question',
                        'type'      => 'text',
                        'required'  => 1,
                        'maxlength' => 300,
                    ],
                    [
                        'key'       => 'field_gc_faq_answer',
                        'label'     => 'คำตอบ',
                        'name'      => 'answer',
                        'type'      => 'textarea',
                        'required'  => 1,
                        'rows'      => 4,
                        'new_lines' => '',
                    ],
                ],
            ],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'service']]],
        'position' => 'normal',
    ]);
});
