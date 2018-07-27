<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<div class="pdf-container">
    <div class="pdf-icon">
        <img src="<?php echo get_stylesheet_directory_uri().'/img/doc.png'; ?>">
    </div>
    <div class="pdf-name">
        <p><?php echo $atts['label']; ?></p>
    <a href="<?php echo $atts['file_pdf']['url']; ?>" download >Скачать</a>
    </div>
</div>
<?php ?>