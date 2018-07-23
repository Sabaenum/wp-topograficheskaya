<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );
?>
<script>
	jQuery(document).ready(function ($) {
		$('#<?php echo esc_attr($id) ?>').carouFredSel({
			swipe: {
				onTouch: true
			},
			next : "#<?php echo esc_attr($id) ?>-next",
			prev : "#<?php echo esc_attr($id) ?>-prev",
			pagination : "#<?php echo esc_attr($id) ?>-controls",
			responsive: true,
			infinite: false,
			items: 1,
			auto: false,
			scroll: {
				items : 1,
				fx: "crossfade",
				easing: "linear",
				duration: 300
			}
		});
	});
</script>
<div class="testimonials-slide">
<?php foreach ( fw_akg( 'testimonials', $atts, array() ) as $testimonial ): ?>
<div>
<div class="testimonials_block col-12 col-sm-12 col-lg-12">
    <?php
    $author_image = !empty($testimonial['author_image']['url'])
        ? $testimonial['author_image']['url']
        : fw_get_framework_directory_uri('/static/img/no-image.png');
    ?>
    <img class="screen" src="<?php echo esc_attr($author_image); ?>"/>
    <?php
    $author_image_url = !empty($testimonial['author_avatar']['url'])
        ? $testimonial['author_avatar']['url']
        : fw_get_framework_directory_uri('/static/img/no-image.png');
    ?>
    <img class="client_item" src="<?php echo esc_attr($author_image_url); ?>"  alt="<?php echo esc_attr($testimonial['author_name']); ?>"/>
    <p class="testimonials_text">
        <span class="client_name clearfix"><?php echo esc_attr($testimonial['author_name']); ?></span>
        <?php echo $testimonial['content']; ?>
        <span id="testimonials_data"><?php echo $testimonial['author_job']; ?></span></p>
</div>
</div>
<?php endforeach; ?>
</div>
