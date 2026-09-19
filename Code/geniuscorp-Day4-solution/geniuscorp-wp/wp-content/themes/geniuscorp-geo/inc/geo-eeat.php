<?php
/**
 * E-E-A-T: ACF user fields, Author Box ท้ายบทความ, Block Pattern หน้าบริการ
 */

defined('ABSPATH') || exit;

// ACF fields ของ User: job_title, social_links
add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    $is_pro = function_exists('acf_get_setting') && acf_get_setting('pro');

    $fields = [
        ['key' => 'field_gc_job_title', 'label' => 'ตำแหน่ง', 'name' => 'job_title', 'type' => 'text', 'required' => 1],
    ];

    if ($is_pro) {
        $fields[] = [
            'key' => 'field_gc_social_links', 'label' => 'โปรไฟล์ภายนอก (LinkedIn, GitHub, ...)', 'name' => 'social_links',
            'type' => 'repeater', 'button_label' => 'เพิ่มลิงก์',
            'sub_fields' => [['key' => 'field_gc_social_url', 'label' => 'URL', 'name' => 'url', 'type' => 'url', 'required' => 1]],
        ];
    } else {
        // ACF ฟรี: ใส่ URL คั่นด้วยขึ้นบรรทัดใหม่
        $fields[] = [
            'key' => 'field_gc_social_links_text', 'label' => 'โปรไฟล์ภายนอก (1 URL ต่อบรรทัด)', 'name' => 'social_links_text',
            'type' => 'textarea', 'rows' => 3,
        ];
    }

    acf_add_local_field_group([
        'key'      => 'group_gc_user',
        'title'    => 'ข้อมูลผู้เขียน (E-E-A-T)',
        'fields'   => $fields,
        'location' => [[['param' => 'user_form', 'operator' => '==', 'value' => 'all']]],
    ]);
});

/** คืน social links ของผู้ใช้เป็น array ของ URL (รองรับทั้ง repeater และ textarea) */
function gc_user_social_links(int $user_id): array
{
    if (! function_exists('get_field')) {
        return [];
    }

    $repeater = get_field('social_links', 'user_' . $user_id);
    if (is_array($repeater)) {
        return array_values(array_filter(array_map(fn ($row) => $row['url'] ?? '', $repeater)));
    }

    $text = (string) get_field('social_links_text', 'user_' . $user_id);
    return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $text))));
}

// แทรก Author Box ท้ายเนื้อหาบทความอัตโนมัติ
add_filter('the_content', function (string $content): string {
    if (! is_singular('post') || ! in_the_loop() || ! is_main_query()) {
        return $content;
    }

    ob_start();
    get_template_part('template-parts/author-box', null, ['post' => get_post()]);
    return $content . ob_get_clean();
}, 20);

// Block Pattern "หน้าบริการมาตรฐาน (Answer-Ready)"
add_action('init', function () {
    if (! function_exists('register_block_pattern')) {
        return;
    }

    register_block_pattern_category('geniuscorp', ['label' => 'GeniusCorp GEO']);

    register_block_pattern('geniuscorp/service-page', [
        'title'       => 'หน้าบริการมาตรฐาน (Answer-Ready)',
        'categories'  => ['geniuscorp'],
        'postTypes'   => ['service'],
        'description' => 'โครงหน้าบริการ: สรุป → เหมาะกับใคร → ราคาและระยะเวลา → ขั้นตอน → ผลลัพธ์',
        'content'     => <<<'HTML'
<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">[ชื่อบริการ] คือ [อธิบาย 1 ประโยค] เหมาะกับ [กลุ่มเป้าหมาย] ราคาเริ่มต้น [ตัวเลข] บาท ใช้เวลา [ตัวเลข] วัน</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">บริการนี้เหมาะกับใคร</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>...</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง</h2>
<!-- /wp:heading -->

<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>แพ็กเกจ</th><th>ราคา</th><th>รวม</th></tr></thead><tbody><tr><td>...</td><td>...</td><td>...</td></tr></tbody></table></figure>
<!-- /wp:table -->

<!-- wp:heading -->
<h2 class="wp-block-heading">ขั้นตอนการทำงานเป็นอย่างไร ใช้เวลากี่วัน</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true} -->
<ol class="wp-block-list"><!-- wp:list-item --><li>...</li><!-- /wp:list-item --></ol>
<!-- /wp:list -->

<!-- wp:heading -->
<h2 class="wp-block-heading">ผลลัพธ์ที่ลูกค้าได้รับ</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>ตัวอย่าง: [ชื่อลูกค้า] [ตัวเลขผลลัพธ์] (ดูผลงาน)</p>
<!-- /wp:paragraph -->
HTML,
    ]);
});
