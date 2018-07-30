<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'works' => array(
		'label'         => __( 'Works Example', 'fw' ),
		'popup-title'   => __( 'Add/Edit Works', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your Works.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => 'Works',
		'popup-options' => array(
			'work_name'   => array(
                'label' => __( 'Work Name', 'fw' ),
                'desc'  => __( 'Work Name', 'fw' ),
                'type'  => 'text'
            ),
            'work_line_1'   => array(
                'label' => __( 'Work List', 'fw' ),
                'desc'  => __( 'Enter the Work List', 'fw' ),
                'type'  => 'text'
            ),
            'work_line_2'   => array(
                'label' => __( 'Work List 2', 'fw' ),
                'desc'  => __( 'Work List 2', 'fw' ),
                'type'  => 'text'
            ),
            'work_price'   => array(
                'label' => __( 'Work Price', 'fw' ),
                'desc'  => __( 'Enter the Work Price', 'fw' ),
                'type'  => 'text'
            ),
            'work_link'   => array(
                'label' => __( 'Work Link Button', 'fw' ),
                'desc'  => __( 'Enter the Work Link Button', 'fw' ),
                'type'  => 'text'
            ),
		)
	)
);