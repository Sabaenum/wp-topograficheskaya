<?php
function admin_bar(){

    if(is_user_logged_in()){
        add_filter( 'show_admin_bar', '__return_true' , 1000 );
    }
}
add_action('init', 'admin_bar' );
function add_theme_scripts()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false);
    wp_enqueue_style('slider', get_template_directory_uri() . '/js/slick/slick.css', false);
    wp_enqueue_style('slider-theme', get_template_directory_uri() . '/js/slick/slick-theme.css', false);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery','slick'), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function license_slide( $atts ){
    $pathArray = scandir(__dir__.'/license');
    $outPut = '<div class="nine columns"><div class="coverflow top10 bot10">';
    foreach ($pathArray as $path){
        if(strlen($path) > 4) {
            $outPut .= '<a class="lic"><img class="coverflow__image" src="'.get_template_directory_uri() . '/license/' . $path.'"></a>';
        }
    }
    $outPut .= '</div></div>';
    return $outPut;
}
add_shortcode('license', 'license_slide');

function partners_slide( $atts ){
    $pathArray = scandir(__dir__.'/partners-images');
    $outPut = '<div class="partners-slider">';
    foreach ($pathArray as $path){
        if(strlen($path) > 2) {
            $outPut .= '<div><img src="'.get_template_directory_uri() . '/partners-images/' . $path.'"></div>';
        }
    }
    $outPut .= '</div>';
    return $outPut;
}
add_shortcode('partners', 'partners_slide');

