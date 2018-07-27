<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$bg_id = '';
if ( ! empty( $atts['id'] )) {
    $bg_id = "id=".esc_attr($atts['id']);
?>
<div  <?php echo $bg_id; ?> >
<?php echo do_shortcode( $atts['text'] ); ?>
</div>
<?php } else { ?>
    <?php echo do_shortcode( $atts['text'] ); ?>
<?php } ?>
