<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => __( 'PDF Name', 'fw' ),
		'desc'  => __( 'This is the text that PDF Name', 'fw' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
    'file_pdf' => array(
        'label' => __( 'File', 'fw' ),
        'desc'  => __( 'Загрузить PDF', 'fw' ),
        'type'  => 'upload',
    ),

);