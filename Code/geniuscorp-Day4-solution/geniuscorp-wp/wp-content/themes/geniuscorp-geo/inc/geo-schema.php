<?php
/**
 * JSON-LD builders (เทียบเท่า schema.ts ฝั่ง Astro) + ฉีดผ่าน wp_head
 */

defined('ABSPATH') || exit;

/**
 * ค่ากลางขององค์กร: ใช้ทั้งใน Schema, Footer และ llms.txt
 * โปรเจกต์จริงควรย้ายไป ACF Options Page ให้ทีมแก้เองได้
 */
function gc_site(): array
{
    static $site = null;
    if ($site !== null) {
        return $site;
    }

    $site = [
        'name'       => get_bloginfo('name'),
        'legal_name' => 'GeniusCorp Co., Ltd.',
        'url'        => trailingslashit(home_url()),
        'language'   => 'th',
        'logo'       => GC_GEO_URI . '/assets/logo.png',
        'og_image'   => GC_GEO_URI . '/assets/og-default.png',
        'telephone'  => '+66-2-000-0000',
        'email'      => 'hello@geniuscorp.example',
        'founding'   => '2011',
        'address'    => [
            'streetAddress'   => '123 ถนนสุขุมวิท แขวงคลองเตย',
            'addressLocality' => 'เขตคลองเตย',
            'addressRegion'   => 'กรุงเทพมหานคร',
            'postalCode'      => '10110',
            'addressCountry'  => 'TH',
        ],
        'geo'        => ['latitude' => 13.7222, 'longitude' => 100.5850],
        'hours'      => 'Mo-Fr 09:00-18:00',
        'same_as'    => [
            'https://www.facebook.com/geniuscorp.example',
            'https://www.linkedin.com/company/geniuscorp-example',
        ],
    ];

    return $site;
}

function gc_org_id(): string     { return gc_site()['url'] . '#organization'; }
function gc_website_id(): string { return gc_site()['url'] . '#website'; }
function gc_person_id(int $user_id): string { return get_author_posts_url($user_id) . '#person'; }

/** ตัด key ที่ค่าว่าง/null ออกแบบ recursive */
function gc_schema_clean(array $data): array
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $value = gc_schema_clean($value);
            if ($value === []) {
                unset($data[$key]);
                continue;
            }
            $data[$key] = $value;
        } elseif ($value === null || $value === '') {
            unset($data[$key]);
        }
    }
    return $data;
}

/** วันที่ของโพสต์เป็น ISO 8601 พร้อม timezone ของเว็บ */
function gc_iso_date(string $mysql_datetime): string
{
    return wp_date(DATE_ATOM, strtotime($mysql_datetime));
}

/** URL ปัจจุบันแบบ canonical (ใช้ค่าจาก Rank Math ถ้ามี) */
function gc_current_url(): string
{
    if (class_exists('RankMath\Paper\Paper')) {
        $canonical = RankMath\Paper\Paper::get()->get_canonical();
        if ($canonical) {
            return $canonical;
        }
    }
    if (is_singular()) {
        return get_permalink();
    }
    global $wp;
    return trailingslashit(home_url($wp->request ?? ''));
}

/** description ปัจจุบัน */
function gc_current_description(): string
{
    if (is_singular() && has_excerpt()) {
        return wp_strip_all_tags(get_the_excerpt());
    }
    return get_bloginfo('description');
}

// ── Organization / LocalBusiness ─────────────────────────────────────────────
function gc_schema_organization(): array
{
    $s = gc_site();
    return [
        '@type'        => ['Organization', 'LocalBusiness'],
        '@id'          => gc_org_id(),
        'name'         => $s['name'],
        'legalName'    => $s['legal_name'],
        'url'          => $s['url'],
        'logo'         => ['@type' => 'ImageObject', 'url' => $s['logo']],
        'image'        => $s['og_image'],
        'telephone'    => $s['telephone'],
        'email'        => $s['email'],
        'foundingDate' => $s['founding'],
        'address'      => ['@type' => 'PostalAddress'] + $s['address'],
        'geo'          => ['@type' => 'GeoCoordinates'] + $s['geo'],
        'openingHours' => $s['hours'],
        'sameAs'       => $s['same_as'],
    ];
}

// ── WebSite ──────────────────────────────────────────────────────────────────
function gc_schema_website(): array
{
    $s = gc_site();
    return [
        '@type'       => 'WebSite',
        '@id'         => gc_website_id(),
        'url'         => $s['url'],
        'name'        => $s['name'],
        'description' => get_bloginfo('description'),
        'inLanguage'  => $s['language'],
        'publisher'   => ['@id' => gc_org_id()],
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => ['@type' => 'EntryPoint', 'urlTemplate' => $s['url'] . '?s={search_term_string}'],
            'query-input' => 'required name=search_term_string',
        ],
    ];
}

// ── WebPage ──────────────────────────────────────────────────────────────────
function gc_schema_webpage(string $type = 'WebPage'): array
{
    $url  = gc_current_url();
    $post = is_singular() ? get_post() : null;

    return [
        '@type'         => $type,
        '@id'           => $url . '#webpage',
        'url'           => $url,
        'name'          => wp_get_document_title(),
        'description'   => gc_current_description(),
        'inLanguage'    => gc_site()['language'],
        'isPartOf'      => ['@id' => gc_website_id()],
        'about'         => ['@id' => gc_org_id()],
        'datePublished' => $post ? gc_iso_date($post->post_date) : null,
        'dateModified'  => $post ? gc_iso_date($post->post_modified) : null,
    ];
}

// ── Service + Offer ──────────────────────────────────────────────────────────
function gc_schema_service(WP_Post $post): array
{
    $url   = get_permalink($post);
    $price = function_exists('get_field') ? get_field('price_from', $post->ID) : null;

    $schema = [
        '@type'       => 'Service',
        '@id'         => $url . '#service',
        'name'        => get_the_title($post),
        'description' => wp_strip_all_tags(get_the_excerpt($post)),
        'url'         => $url,
        'serviceType' => get_the_title($post),
        'provider'    => ['@id' => gc_org_id()],
        'areaServed'  => ['@type' => 'Country', 'name' => 'Thailand'],
        'image'       => get_the_post_thumbnail_url($post, 'large') ?: null,
    ];

    if ($price !== null && $price !== '') {
        $schema['offers'] = [
            '@type'              => 'Offer',
            'price'              => (float) $price,
            'priceCurrency'      => 'THB',
            'priceSpecification' => [
                '@type'         => 'PriceSpecification',
                'minPrice'      => (float) $price,
                'priceCurrency' => 'THB',
            ],
            'availability' => 'https://schema.org/InStock',
            'url'          => $url,
        ];
    }

    return $schema;
}

// ── Article + Person(author) ─────────────────────────────────────────────────
function gc_schema_article(WP_Post $post): array
{
    $url = get_permalink($post);
    $categories = wp_list_pluck(get_the_category($post->ID), 'name');

    return [
        '@type'            => 'Article',
        '@id'              => $url . '#article',
        'headline'         => mb_substr(get_the_title($post), 0, 110),
        'description'      => wp_strip_all_tags(get_the_excerpt($post)),
        'url'              => $url,
        'mainEntityOfPage' => ['@id' => $url . '#webpage'],
        'image'            => has_post_thumbnail($post) ? [get_the_post_thumbnail_url($post, 'full')] : null,
        'datePublished'    => gc_iso_date($post->post_date),
        'dateModified'     => gc_iso_date($post->post_modified),
        'inLanguage'       => gc_site()['language'],
        'author'           => ['@id' => gc_person_id((int) $post->post_author)],
        'publisher'        => ['@id' => gc_org_id()],
        'isPartOf'         => ['@id' => gc_website_id()],
        'articleSection'   => $categories ? implode(', ', $categories) : null,
    ];
}

function gc_schema_person(int $user_id): array
{
    $job_title = function_exists('get_field') ? get_field('job_title', 'user_' . $user_id) : '';
    $social    = function_exists('get_field') ? (array) get_field('social_links', 'user_' . $user_id) : [];
    $social    = array_values(array_filter(array_map(
        fn ($row) => is_array($row) ? ($row['url'] ?? '') : (string) $row,
        $social
    )));

    return [
        '@type'       => 'Person',
        '@id'         => gc_person_id($user_id),
        'name'        => get_the_author_meta('display_name', $user_id),
        'jobTitle'    => $job_title ?: null,
        'description' => get_the_author_meta('description', $user_id) ?: null,
        'image'       => get_avatar_url($user_id, ['size' => 320]),
        'url'         => get_author_posts_url($user_id),
        'worksFor'    => ['@id' => gc_org_id()],
        'sameAs'      => $social ?: null,
    ];
}

// ── BreadcrumbList ───────────────────────────────────────────────────────────
function gc_breadcrumb_items(): array
{
    $items = [['name' => 'หน้าแรก', 'url' => home_url('/')]];

    if (is_singular('service')) {
        $items[] = ['name' => 'บริการ', 'url' => get_post_type_archive_link('service')];
        $items[] = ['name' => get_the_title()];
    } elseif (is_singular('post')) {
        $blog = get_option('page_for_posts');
        $items[] = ['name' => 'บทความ', 'url' => $blog ? get_permalink($blog) : home_url('/blog/')];
        $items[] = ['name' => get_the_title()];
    } elseif (is_post_type_archive('service')) {
        $items[] = ['name' => 'บริการ'];
    } elseif (is_home()) {
        $items[] = ['name' => 'บทความ'];
    } elseif (is_page() && ! is_front_page()) {
        $items[] = ['name' => get_the_title()];
    }

    return $items;
}

function gc_schema_breadcrumb(array $items): array
{
    $list = [];
    foreach ($items as $i => $item) {
        $list[] = gc_schema_clean([
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $item['name'],
            'item'     => $item['url'] ?? null,
        ]);
    }
    return ['@type' => 'BreadcrumbList', 'itemListElement' => $list];
}

// ── FAQPage ──────────────────────────────────────────────────────────────────
function gc_schema_faq(array $faqs): ?array
{
    if (! $faqs) {
        return null;
    }
    return [
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn ($faq) => [
            '@type'          => 'Question',
            'name'           => $faq['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
        ], $faqs),
    ];
}

// ── ประกอบเป็น @graph ตามประเภทหน้า ─────────────────────────────────────────
function gc_build_graph(): array
{
    $graph = [gc_schema_organization()];

    if (is_front_page()) {
        $graph[] = gc_schema_website();
        $graph[] = gc_schema_webpage();
    } elseif (is_singular('service')) {
        $post = get_post();
        $graph[] = gc_schema_webpage();
        $graph[] = gc_schema_service($post);
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
        $graph[] = gc_schema_faq(function_exists('gc_get_faqs') ? gc_get_faqs($post->ID) : []);
    } elseif (is_singular('post')) {
        $post = get_post();
        $graph[] = gc_schema_webpage();
        $graph[] = gc_schema_article($post);
        $graph[] = gc_schema_person((int) $post->post_author);
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } elseif (is_author()) {
        $graph[] = gc_schema_webpage('ProfilePage');
        $graph[] = gc_schema_person((int) get_queried_object_id());
    } elseif (is_page('contact')) {
        $graph[] = gc_schema_webpage('ContactPage');
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } elseif (is_page('about')) {
        $graph[] = gc_schema_webpage('AboutPage');
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } elseif (is_post_type_archive('service') || is_home()) {
        $graph[] = gc_schema_webpage('CollectionPage');
        $graph[] = gc_schema_breadcrumb(gc_breadcrumb_items());
    } else {
        $graph[] = gc_schema_webpage();
    }

    $graph = array_map('gc_schema_clean', array_filter($graph));

    return ['@context' => 'https://schema.org', '@graph' => array_values($graph)];
}

/**
 * ฉีด JSON-LD: priority 20 เพื่ออยู่หลัง title/meta ของ Rank Math
 */
add_action('wp_head', function () {
    if (is_admin() || is_feed() || is_404() || is_search()) {
        return;
    }

    $json = wp_json_encode(
        gc_build_graph(),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP
    );

    if ($json === false) {
        return;
    }

    echo "\n<script type=\"application/ld+json\">" . $json . "</script>\n";
}, 20);
