<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => __( 'DOC Name', 'fw' ),
		'desc'  => __( 'This is the text that DOC Name', 'fw' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
    'file_pdf' => array(
        'label' => __( 'File', 'fw' ),
        'desc'  => __( 'Загрузить DOC', 'fw' ),
        'type'  => 'upload',
    ),

);