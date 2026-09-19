<?php
/**
 * /llms.txt (llmstxt.org) generate จากเนื้อหาจริง + ปรับ lastmod ของ sitemap Rank Math
 */

defined('ABSPATH') || exit;

// 1) route /llms.txt
add_action('init', function () {
    add_rewrite_rule('^llms\.txt$', 'index.php?gc_llms=1', 'top');
});
add_filter('query_vars', fn (array $vars) => [...$vars, 'gc_llms']);

// 2) ส่ง text/plain
add_action('template_redirect', function () {
    if (! get_query_var('gc_llms')) {
        return;
    }

    $body = get_transient('gc_llms_txt');
    if ($body === false) {
        $body = gc_build_llms_txt();
        set_transient('gc_llms_txt', $body, HOUR_IN_SECONDS);
    }

    status_header(200);
    header('Content-Type: text/plain; charset=utf-8');
    header('X-Robots-Tag: noindex');
    echo $body;
    exit;
});

// 3) ล้าง cache เมื่อบันทึกโพสต์
add_action('save_post', fn () => delete_transient('gc_llms_txt'));

function gc_llms_line(WP_Post $post): string
{
    $summary = has_excerpt($post) ? wp_strip_all_tags(get_the_excerpt($post)) : '';
    return sprintf('- [%s](%s)%s', get_the_title($post), get_permalink($post), $summary ? ': ' . $summary : '');
}

function gc_build_llms_txt(): string
{
    $s = gc_site();

    $services = get_posts(['post_type' => 'service', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);
    $articles = get_posts(['post_type' => 'post', 'posts_per_page' => 50, 'orderby' => 'date', 'order' => 'DESC']);

    $lines   = [];
    $lines[] = '# ' . $s['legal_name'];
    $lines[] = '';
    $lines[] = '> ' . get_bloginfo('description');
    $lines[] = '';
    $lines[] = sprintf('%s เป็นบริษัทพัฒนาซอฟต์แวร์ใน%s ก่อตั้งปี %s', $s['name'], $s['address']['addressRegion'], $s['founding']);
    $lines[] = sprintf('ติดต่อ: โทร %s อีเมล %s เว็บไซต์ %s', $s['telephone'], $s['email'], $s['url']);
    $lines[] = 'ภาษาหลักของเนื้อหา: ไทย (th)';
    $lines[] = '';
    $lines[] = '## บริการ';
    foreach ($services as $post) {
        $lines[] = gc_llms_line($post);
    }
    $lines[] = '';
    $lines[] = '## บทความ';
    foreach ($articles as $post) {
        $lines[] = gc_llms_line($post);
    }
    $lines[] = '';
    $lines[] = '## เกี่ยวกับองค์กร';
    foreach (['about' => 'ประวัติ ทีมงาน และเหตุผลที่ลูกค้าเลือกเรา', 'contact' => 'ที่อยู่ เบอร์โทร อีเมล เวลาทำการ'] as $slug => $desc) {
        $page = get_page_by_path($slug);
        if ($page) {
            $lines[] = sprintf('- [%s](%s): %s', get_the_title($page), get_permalink($page), $desc);
        }
    }
    $lines[] = '';
    $lines[] = '## Optional';
    $lines[] = sprintf('- [Sitemap](%ssitemap_index.xml): รายการหน้าทั้งหมดพร้อมวันที่แก้ไขล่าสุด', $s['url']);
    $lines[] = '';

    return implode("\n", $lines);
}

// 4) sitemap lastmod สำหรับหน้าที่ Page Builder บันทึกเวลาแก้ไขเป็น meta (ตัวอย่าง Elementor)
add_filter('rank_math/sitemap/entry', function (array $url, string $type, $object) {
    if ($type === 'post' && $object instanceof WP_Post) {
        $builder_modified = get_post_meta($object->ID, '_elementor_edit_time', true);
        if ($builder_modified && (int) $builder_modified > strtotime($object->post_modified_gmt)) {
            $url['mod'] = gmdate('c', (int) $builder_modified);
        }
    }
    return $url;
}, 10, 3);
