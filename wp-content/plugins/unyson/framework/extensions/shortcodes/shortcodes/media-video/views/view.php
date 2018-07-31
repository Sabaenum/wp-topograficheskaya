<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

global $wp_embed;

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '800';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '230';
$iframe = $wp_embed->run_shortcode( '[embed]' . trim( $atts['url'] ) . '[/embed]' );
?>
<div class="video-wrapper shortcode-container">
	<?php echo do_shortcode( $iframe ); ?>
</div>
