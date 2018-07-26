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
add_shortcode('partners', 'partners_slide');add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
    // заменять автоматически нельзя: Запись = Статья, а в тексте получим "Просмотреть статья"

    $new = array(
        'name'                  => 'Работы',
        'singular_name'         => 'Работа',
        'add_new'               => 'Добавить Работу',
        'add_new_item'          => 'Добавить Работу',
        'edit_item'             => 'Редактировать Работу',
        'new_item'              => 'Новая Работа',
        'view_item'             => 'Просмотреть Работу',
        'search_items'          => 'Поиск Работ',
        'not_found'             => 'Работы не найдены.',
        'not_found_in_trash'    => 'Работы в корзине не найдены.',
        'parent_item_colon'     => '',
        'all_items'             => 'Все работы',
        'archives'              => 'Архивы Работ',
        'insert_into_item'      => 'Вставить в Работу',
        'uploaded_to_this_item' => 'Загруженные для этой Работы',
        'featured_image'        => 'Миниатюра Работы',
        'filter_items_list'     => 'Фильтровать список Работ',
        'items_list_navigation' => 'Навигация по списку Работ',
        'items_list'            => 'Список Работ',
        'menu_name'             => 'Работы',
        'name_admin_bar'        => 'Работа', // пункте "добавить"
    );

    return (object) array_merge( (array) $labels, $new );
}
add_theme_support( 'post-thumbnails', array( 'post' ) );


function post_block( $atts )
{
    global $post;
    $categories = get_categories(array('hide_empty' => false, 'exclude' => 1));
    $output = '<div class="container"><ul class="nav nav-tabs"><li class="active"><a data-toggle="tab" href="#all">Все</a></li>';
    foreach ($categories as $category) {
        $output .= '<li><a data-toggle="tab" href="#category' . $category->term_id . '">' . $category->cat_name . '</a></li>';
    }
    $output .= '</ul><div class="tab-content">';
    foreach ($categories as $item) {
            $myposts = get_posts(array("category" => $item->term_id));
            $output .= '<div id="category'.$item->term_id.'" class="tab-pane fade category-content"><div id="categories'.$item->term_id.'">';
            foreach ($myposts as $post) {
                setup_postdata($post);
                $output .= '<div class="image_title">';
                $output .= '<div class="post-slider">'.get_the_post_thumbnail( $post->ID, array(250,150));
                $output .= '<h3 class="post-title">'.$post->post_title.'</h3>';
                $output .= '</div>';
                $output .= '<div class="post-button">';
                $output .= '<a class="post-more" href="'.$post->guid.'">Подробнее</a>';
                $output .= '<a class="post-bye" href="'.$post->guid.'">Цена</a>';
                $output .= '</div></div>';
            }
        $output .= '</div></div>';
        $output .= get_slide($item->term_id);
        }
    $output .= '</div>';
    return $output;
}
add_shortcode('posts_block', 'post_block');

function get_slide($id){
    $slide = "<script type=\"text/javascript\">
    jQuery(document).ready(function () {
        jQuery('#categories".$id."').slick({
        nextArrow: '<i class=\"fa fa-arrow-right\"></i>',
        prevArrow: '<i class=\"fa fa-arrow-left\"></i>',
        arrows: true,     
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerPadding: '40px',
                    slidesToShow: 5,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });});</script>";
    return $slide;
}