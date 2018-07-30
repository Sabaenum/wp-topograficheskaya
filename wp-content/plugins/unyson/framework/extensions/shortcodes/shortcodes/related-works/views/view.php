<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'related-' );
?>
<div class="related">
<?php foreach ( fw_akg( 'related', $atts, array() ) as $related ): ?>
<div>
    <div class="related-block">
        <a href="<?php echo $related['link_url']; ?>">
            <div class="related-inner">
                <img src="<?php echo $related['image']['url']; ?>" />
                <p class="image-title"><?php echo $related['title']; ?></p>
            </div>
        </a>
    </div>
</div>
<?php endforeach; ?>
</div>
