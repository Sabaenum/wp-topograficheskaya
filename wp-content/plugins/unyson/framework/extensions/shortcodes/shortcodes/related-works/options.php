<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'related' => array(
		'label'         => __( 'Related', 'fw' ),
		'popup-title'   => __( 'Add/Edit Related', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your Related.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => 'Related',
		'popup-options' => array(
			'image' => array(
				'label' => __( 'Image', 'fw' ),
				'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
				'type'  => 'upload',
			),
			'title'    => array(
				'label' => __( 'title', 'fw' ),
				'desc'  => __( 'Can be used for a title', 'fw' ),
				'type'  => 'text'
			),
            'link_url'    => array(
                'label' => __( 'URL', 'fw' ),
                'desc'  => __( 'Can be used for a url', 'fw' ),
                'type'  => 'text'
            ),
		)
	)
);