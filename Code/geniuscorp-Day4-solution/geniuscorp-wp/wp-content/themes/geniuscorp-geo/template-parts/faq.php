<?php
/**
 * FAQ Section (HTML ล้วน ไม่ต้องใช้ JS)
 * ใช้: get_template_part('template-parts/faq', null, ['faqs' => gc_get_faqs(get_the_ID())]);
 */

defined('ABSPATH') || exit;

$faqs = $args['faqs'] ?? [];
if (! $faqs) {
    return;
}
?>
<section class="faq" aria-labelledby="faq-heading">
    <h2 id="faq-heading">คำถามที่พบบ่อย</h2>
    <?php foreach ($faqs as $index => $faq) : ?>
        <details class="faq-item"<?php echo $index === 0 ? ' open' : ''; ?>>
            <summary><h3><?php echo esc_html($faq['question']); ?></h3></summary>
            <div class="faq-answer">
                <p><?php echo esc_html($faq['answer']); ?></p>
            </div>
        </details>
    <?php endforeach; ?>
</section>
