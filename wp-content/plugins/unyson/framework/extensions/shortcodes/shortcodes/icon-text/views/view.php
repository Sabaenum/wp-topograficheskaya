<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri('/static/img/no-image.png');
} else {
	$image = $atts['image']['url'];
}
?>
<div class="fw-team">
	<div class="fw-team-image"><img src="<?php echo esc_attr($image); ?>"/></div>
	<div class="fw-team-inner">
		<div class="fw-team-text">
			<?php echo $atts['desc']; ?>
		</div>
	</div>
</div>