<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image' => array(
		'label' => __( 'Icon image', 'fw' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
		'type'  => 'upload'
	),
	'desc'  => array(
		'label' => __( 'Text', 'fw' ),
		'desc'  => __( 'Enter text', 'fw' ),
		'type'  => 'textarea',
		'value' => ''
	)
);