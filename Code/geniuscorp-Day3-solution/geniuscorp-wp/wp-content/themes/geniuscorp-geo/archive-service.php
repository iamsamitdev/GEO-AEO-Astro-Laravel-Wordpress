<?php
/**
 * Template หน้ารวมบริการ: H1 เดียว + การ์ดเป็น H3 + ราคา/วัน
 */

get_header();

$count = wp_count_posts('service')->publish;
?>
<main id="main" class="site-main container">
    <?php get_template_part('template-parts/breadcrumb'); ?>

    <h1><?php post_type_archive_title(); ?></h1>
    <p class="lead">
        <?php echo esc_html("เราให้บริการ {$count} ด้านหลัก ครอบคลุมตั้งแต่การพัฒนาเว็บไซต์องค์กร โมบายแอปพลิเคชัน จนถึงการทำให้เว็บถูกอ้างอิงโดย AI Search"); ?>
    </p>

    <div class="grid">
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $price = function_exists('get_field') ? get_field('price_from') : null;
            $days  = function_exists('get_field') ? get_field('duration_days') : null;
            ?>
            <article class="card" id="post-<?php the_ID(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card', ['loading' => 'lazy']); ?></a>
                <?php endif; ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php if ($price || $days) : ?>
                    <dl class="meta">
                        <?php if ($price) : ?><dt>เริ่มต้น</dt><dd><?php echo number_format((float) $price); ?> บาท</dd><?php endif; ?>
                        <?php if ($days) : ?><dt>ระยะเวลา</dt><dd><?php echo (int) $days; ?> วัน</dd><?php endif; ?>
                    </dl>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>

    <?php the_posts_pagination(); ?>
</main>

<?php get_footer();
