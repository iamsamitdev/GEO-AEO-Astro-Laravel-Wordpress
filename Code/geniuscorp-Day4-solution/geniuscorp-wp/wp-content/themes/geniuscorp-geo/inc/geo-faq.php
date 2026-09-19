<?php
/**
 * FAQ: อ่านจาก ACF PRO Repeater (หรือ CPT faq สำหรับ ACF ฟรี) + guideline ในหน้า Admin
 */

defined('ABSPATH') || exit;

/**
 * คืน FAQ ของบริการเป็น [['question' => ..., 'answer' => ...], ...]
 */
function gc_get_faqs(int $service_id): array
{
    $faqs = [];

    // แหล่งที่ 1: ACF PRO Repeater 'faqs'
    if (function_exists('have_rows') && have_rows('faqs', $service_id)) {
        while (have_rows('faqs', $service_id)) {
            the_row();
            $q = trim(wp_strip_all_tags((string) get_sub_field('question')));
            $a = trim(wp_strip_all_tags((string) get_sub_field('answer')));
            if ($q !== '' && $a !== '') {
                $faqs[] = ['question' => $q, 'answer' => $a];
            }
        }
        return $faqs;
    }

    // แหล่งที่ 2: CPT faq (ACF ฟรี) ที่มี meta faq_service = service id
    if (! post_type_exists('faq')) {
        return $faqs;
    }

    $query = new WP_Query([
        'post_type'      => 'faq',
        'posts_per_page' => 20,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'meta_query'     => [['key' => 'faq_service', 'value' => $service_id]],
        'no_found_rows'  => true,
    ]);

    foreach ($query->posts as $post) {
        $faqs[] = [
            'question' => trim(wp_strip_all_tags($post->post_title)),
            'answer'   => trim(wp_strip_all_tags($post->post_content)),
        ];
    }

    return $faqs;
}

// CPT faq สำหรับผู้ที่ใช้ ACF ฟรี (ไม่มี Repeater)
add_action('init', function () {
    if (function_exists('acf_get_setting') && acf_get_setting('pro')) {
        return;
    }

    register_post_type('faq', [
        'labels'       => ['name' => 'FAQ', 'singular_name' => 'FAQ', 'add_new_item' => 'เพิ่มคำถาม'],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'editor', 'page-attributes'],
        'menu_icon'    => 'dashicons-editor-help',
        'show_in_rest' => true,
    ]);
});

// ฟิลด์ faq_service (Post Object) สำหรับ CPT faq
add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group') || (function_exists('acf_get_setting') && acf_get_setting('pro'))) {
        return;
    }

    acf_add_local_field_group([
        'key'    => 'group_gc_faq',
        'title'  => 'บริการที่เกี่ยวข้อง',
        'fields' => [[
            'key'           => 'field_gc_faq_service',
            'label'         => 'บริการ',
            'name'          => 'faq_service',
            'type'          => 'post_object',
            'post_type'     => ['service'],
            'return_format' => 'id',
            'required'      => 1,
        ]],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'faq']]],
    ]);
});

// Guideline ในหน้าแก้ไข service
add_action('edit_form_after_title', function (WP_Post $post) {
    if ($post->post_type !== 'service') {
        return;
    }
    ?>
    <div class="notice notice-info inline" style="margin:12px 0">
        <p><strong>แนวทางเขียนหน้าบริการให้ AI อ้างอิงได้:</strong></p>
        <ol style="margin-left:1.2em">
            <li><strong>คำอธิบายย่อ (Excerpt)</strong> 70-170 ตัวอักษร ระบุราคาเริ่มต้นและระยะเวลา (ใช้เป็น meta description และ Schema)</li>
            <li><strong>ย่อหน้าแรกของเนื้อหา</strong> ตอบว่า "บริการนี้คืออะไร เหมาะกับใคร" ให้จบใน 2-3 ประโยค</li>
            <li><strong>หัวข้อ (H2)</strong> เขียนเป็นคำถาม เช่น "เหมาะกับใคร", "ขั้นตอนการทำงานเป็นอย่างไร"</li>
            <li><strong>FAQ 4-6 ข้อ</strong> คำถามอย่างที่ลูกค้าถามจริง คำตอบ 2-4 ประโยค ประโยคแรกตอบตรง มีตัวเลขอย่างน้อย 1 ตัว</li>
            <li>ใส่ <strong>ตัวเลข/สถิติ/แหล่งอ้างอิง</strong> ในเนื้อหา (เพิ่มโอกาสถูกอ้างอิง 30-40% ตามงานวิจัย GEO)</li>
        </ol>
    </div>
    <?php
});
