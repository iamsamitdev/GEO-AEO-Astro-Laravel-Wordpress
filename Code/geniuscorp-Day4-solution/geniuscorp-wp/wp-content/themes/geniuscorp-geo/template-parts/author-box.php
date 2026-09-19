<?php
/**
 * Author Box: รูป ชื่อ ตำแหน่ง bio social + วันที่แบบ machine-readable
 * ใช้: get_template_part('template-parts/author-box', null, ['post' => get_post()]);
 * หรือในหน้า author.php: get_template_part('template-parts/author-box', null, ['author_id' => get_queried_object_id()]);
 */

defined('ABSPATH') || exit;

$post      = $args['post'] ?? null;
$author_id = (int) ($args['author_id'] ?? ($post ? $post->post_author : 0));
if (! $author_id) {
    return;
}

$job_title = function_exists('get_field') ? (string) get_field('job_title', 'user_' . $author_id) : '';
$bio       = get_the_author_meta('description', $author_id);
$social    = function_exists('gc_user_social_links') ? gc_user_social_links($author_id) : [];

$published  = $post ? get_the_date('c', $post) : '';
$modified   = $post ? get_the_modified_date('c', $post) : '';
$is_updated = $post && (strtotime($modified) - strtotime($published) > DAY_IN_SECONDS);
?>
<aside class="author-box" aria-label="เกี่ยวกับผู้เขียน">
    <?php echo get_avatar($author_id, 96, '', get_the_author_meta('display_name', $author_id), ['class' => 'author-photo', 'loading' => 'lazy']); ?>
    <div class="author-body">
        <p class="author-label">เขียนโดย</p>
        <p class="author-name">
            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" rel="author"><?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?></a>
            <?php if ($job_title) : ?><span class="author-title"> · <?php echo esc_html($job_title); ?></span><?php endif; ?>
        </p>
        <?php if ($bio) : ?><p class="author-bio"><?php echo esc_html($bio); ?></p><?php endif; ?>
        <?php if ($social) : ?>
            <ul class="author-social">
                <?php foreach ($social as $url) : ?>
                    <li><a href="<?php echo esc_url($url); ?>" rel="me noopener" target="_blank"><?php echo esc_html(preg_replace('/^www\./', '', (string) wp_parse_url($url, PHP_URL_HOST))); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if ($post) : ?>
            <p class="author-dates">
                เผยแพร่ <time datetime="<?php echo esc_attr($published); ?>"><?php echo esc_html(get_the_date('j F Y', $post)); ?></time>
                <?php if ($is_updated) : ?> · แก้ไขล่าสุด <time datetime="<?php echo esc_attr($modified); ?>"><?php echo esc_html(get_the_modified_date('j F Y', $post)); ?></time><?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
</aside>
