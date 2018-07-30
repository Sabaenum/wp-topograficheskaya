<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'works-' );
?>
<div class="works-slide">
<?php foreach ( fw_akg( 'works', $atts, array() ) as $works ): ?>
    <div>
        <div class="works-block">
            <h4><?php echo $works['work_name']; ?></h4>
            <ul class="work-list">
            <li><?php echo $works['work_line_1']; ?></li>
            <li><?php echo $works['work_line_2']; ?></li>
            </ul>
            <p class="works-price"><?php echo $works['work_price']; ?></p>
            <a href="<?php echo $works['work_link']; ?>">Заказать</a>
        </div>
    </div>
<?php endforeach; ?>
</div>
