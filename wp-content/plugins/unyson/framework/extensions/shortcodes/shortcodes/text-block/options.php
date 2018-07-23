<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => __( 'Content', 'fw' ),
		'desc'   => __( 'Enter some content for this texblock', 'fw' )
	),
    'id' => array(
        'label' => __('Css ID', 'fw'),
        'desc'  => __('Insert ID', 'fw'),
        'type'  => 'text',
    )
);
