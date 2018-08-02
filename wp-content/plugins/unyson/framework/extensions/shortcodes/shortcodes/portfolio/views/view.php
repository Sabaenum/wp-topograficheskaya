<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );
?>
<div class="slide-portfolio">
<?php
$nav = array();
foreach ( fw_akg( 'testimonials', $atts, array() ) as $testimonial ): ?>
<div class="main-portfolio">
    <?php
    $tempArray = array();
    !empty($testimonial['author_image']['url']) ? array_push($tempArray,$testimonial['author_image']['url']) : '';
    !empty($testimonial['author_image2']['url']) ? array_push($tempArray,$testimonial['author_image2']['url']) : '';
    !empty($testimonial['author_image3']['url']) ? array_push($tempArray,$testimonial['author_image3']['url']) : '';
    !empty($testimonial['author_image4']['url']) ? array_push($tempArray,$testimonial['author_image4']['url']) : '';
    !empty($testimonial['author_image5']['url']) ? array_push($tempArray,$testimonial['author_image5']['url']) : '';
    $author_avatar = $testimonial['author_avatar']['url'];
    array_push($nav,$author_avatar);
    ?>
    <div class="row">
        <div class="col-12 col-sm-8 col-lg-8 mob-style">
            <h4><?php echo esc_attr($testimonial['author_name']); ?></h4>
            <p class="text-blue"><?php echo esc_attr($testimonial['author_job']); ?></p>
            <img class="screen for-modile" src="<?php echo esc_attr($author_avatar); ?>"/>
            <div class="portfolio-license">
    <?php foreach ($tempArray as $temp) { ?>
    <img src="<?php echo $temp; ?>">
    <?php } ?>
        </div>
        </div>
        <div class="col-12 col-sm-4 col-lg-4 main-foto">
    <img class="screen" src="<?php echo esc_attr($author_avatar); ?>"/>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
    <div class="nav-portfolio">
        <?php  foreach ($nav as $n){ ?>
            <div class="nav-img">
        <img src="<?php echo esc_attr($n); ?>">
                <h6><?php echo esc_attr($testimonial['author_name']); ?></h6>
                <p><?php echo esc_attr($testimonial['author_job']); ?></p>
            </div>
    <?php  } ?>
</div>
