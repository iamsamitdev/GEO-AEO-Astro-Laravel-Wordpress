<?php
/**
 * Metadata: บังคับ excerpt, canonical filter, Open Graph เสริม (Rank Math)
 */

defined('ABSPATH') || exit;

// ── บังคับให้ post/service ที่จะ publish ต้องมี excerpt 70-170 ตัวอักษร ──────
add_action('admin_notices', function () {
    if (! isset($_GET['gc_excerpt_warning'])) {
        return;
    }
    echo '<div class="notice notice-error"><p><strong>GEO:</strong> ยังไม่ได้เขียนคำอธิบายย่อ (Excerpt) 70-170 ตัวอักษร โพสต์ถูกบันทึกเป็นฉบับร่างแทน</p></div>';
});

add_filter('wp_insert_post_data', function (array $data, array $postarr) {
    if (! in_array($data['post_type'], ['post', 'service'], true) || $data['post_status'] !== 'publish') {
        return $data;
    }

    $length = mb_strlen(trim(wp_strip_all_tags((string) $data['post_excerpt'])));

    if ($length < 70 || $length > 170) {
        $data['post_status'] = 'draft';
        add_filter('redirect_post_location', fn ($location) => add_query_arg('gc_excerpt_warning', 1, $location));
    }

    return $data;
}, 10, 2);

// ── Canonical: paginated → ตัวเอง, ตัด query, trailing slash ────────────────
function gc_normalize_canonical(string $canonical): string
{
    if (is_paged()) {
        $canonical = get_pagenum_link((int) get_query_var('paged'));
    }

    $canonical = (string) strtok($canonical, '?');
    $canonical = (string) strtok($canonical, '#');

    if (! preg_match('/\.[a-z0-9]{2,5}$/i', $canonical)) {
        $canonical = trailingslashit($canonical);
    }

    return $canonical;
}

add_filter('rank_math/frontend/canonical', 'gc_normalize_canonical');
add_filter('wpseo_canonical', 'gc_normalize_canonical');   // Yoast

// ── Open Graph เสริม ────────────────────────────────────────────────────────
// service = website ไม่ใช่ article
add_filter('rank_math/opengraph/facebook/og_type', function (string $type): string {
    return is_singular('service') ? 'website' : $type;
});

// บทความ: article:author เป็น URL หน้าผู้เขียน (ตรงกับ Person @id ใน Schema)
add_action('rank_math/opengraph/facebook', function ($og) {
    if (! is_singular('post')) {
        return;
    }
    $author_url = get_author_posts_url((int) get_post_field('post_author', get_the_ID()));
    $og->tag('article:author', esc_url($author_url));
    $og->tag('article:section', 'บทความ');
});
