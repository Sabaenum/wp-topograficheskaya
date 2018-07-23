<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'Option Testimonials Title', 'fw' ),
		'type'  => 'text',
	),
	'testimonials' => array(
		'label'         => __( 'Portfolio', 'fw' ),
		'popup-title'   => __( 'Add/Edit Portfolio', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your Portfolio.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
            'author_avatar' => array(
                'label' => __( 'Image Author', 'fw' ),
                'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
                'type'  => 'upload',
            ),
            'author_name'   => array(
                'label' => __( 'Name', 'fw' ),
                'desc'  => __( 'Enter the Name of the Person to quote', 'fw' ),
                'type'  => 'text'
            ),
            'author_job'    => array(
                'label' => __( 'Job', 'fw' ),
                'desc'  => __( 'Can be used for a Job', 'fw' ),
                'type'  => 'text'
            ),
            'author_image' => array(
                'label' => __( 'Image', 'fw' ),
                'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
                'type'  => 'upload',
            ),
            'author_image2' => array(
                'label' => __( 'Image', 'fw' ),
                'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
                'type'  => 'upload',
            ),
            'author_image3' => array(
                'label' => __( 'Image', 'fw' ),
                'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
                'type'  => 'upload',
            ),
            'author_image4' => array(
                'label' => __( 'Image', 'fw' ),
                'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
                'type'  => 'upload',
            ),
            'author_image5' => array(
                'label' => __( 'Image', 'fw' ),
                'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
                'type'  => 'upload',
            ),
		)
	)
);