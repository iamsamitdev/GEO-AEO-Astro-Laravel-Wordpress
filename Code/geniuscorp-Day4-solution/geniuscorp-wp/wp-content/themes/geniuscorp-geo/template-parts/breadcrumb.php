<?php
/**
 * Breadcrumb ที่มองเห็น (array เดียวกับ BreadcrumbList Schema)
 * ใช้: get_template_part('template-parts/breadcrumb');
 */

defined('ABSPATH') || exit;

$crumbs = gc_breadcrumb_items();
if (count($crumbs) < 2) {
    return;
}
?>
<nav aria-label="breadcrumb" class="breadcrumb">
    <ol>
        <?php foreach ($crumbs as $i => $crumb) : ?>
            <li>
                <?php if (! empty($crumb['url']) && $i < count($crumbs) - 1) : ?>
                    <a href="<?php echo esc_url($crumb['url']); ?>"><?php echo esc_html($crumb['name']); ?></a>
                <?php else : ?>
                    <span aria-current="page"><?php echo esc_html($crumb['name']); ?></span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
