<?php
/**
 * Template หน้าบริการ: breadcrumb + H1 + facts + content + FAQ
 */

get_header();

while (have_posts()) : the_post();
    $price = function_exists('get_field') ? get_field('price_from') : null;
    $days  = function_exists('get_field') ? get_field('duration_days') : null;
    $faqs  = gc_get_faqs(get_the_ID());
?>
<main id="main" class="site-main container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php get_template_part('template-parts/breadcrumb'); ?>

        <h1><?php the_title(); ?></h1>

        <?php if (has_excerpt()) : ?>
            <p class="lead"><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>

        <?php if ($price || $days) : ?>
            <dl class="facts">
                <?php if ($price) : ?><dt>ราคาเริ่มต้น</dt><dd><?php echo number_format((float) $price); ?> บาท</dd><?php endif; ?>
                <?php if ($days) : ?><dt>ระยะเวลาดำเนินการ</dt><dd><?php echo (int) $days; ?> วัน</dd><?php endif; ?>
            </dl>
        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'cover']); ?>
        <?php endif; ?>

        <div class="prose">
            <?php the_content(); ?>
        </div>

        <?php get_template_part('template-parts/faq', null, ['faqs' => $faqs]); ?>

    </article>
</main>
<?php
endwhile;

get_footer();
