<?php
function admin_bar(){

    if(is_user_logged_in()){
        add_filter( 'show_admin_bar', '__return_true' , 1000 );
    }
}
add_action('init', 'admin_bar' );
function add_theme_scripts()
{
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.2.0/css/bootstrap-slider.css', false);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', false);
    wp_enqueue_style('slider', get_template_directory_uri() . '/js/slick/slick.css', false);
    wp_enqueue_style('slider-theme', get_template_directory_uri() . '/js/slick/slick-theme.css', false);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery','slick'), 1.1, true);
    wp_enqueue_script('boot-slider', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.2.0/bootstrap-slider.js' , array('jquery'), 1.1, true);
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

function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs( $sep, $l10n, $args );
}



////////////////////////////////////////////////*
 function gallery_slider( $atts ){
    $pathArray = scandir(__dir__.'/img/gallery');
    $outPut = '<div class="gallery-slider">';
   foreach ($pathArray as $path){
       if(strlen($path) > 2) {
            $outPut .= '<div><img src="'.get_template_directory_uri() . '/img/gallery/' . $path.'"></div>';
       }
    }
    $outPut .= '</div>';
    return $outPut;
}
add_shortcode('offices_gallery', 'gallery_slider');









class Kama_Breadcrumbs {

    public $arg;

    // Локализация
    static $l10n = array(
        'home'       => '<div class="home_image"></div>',
        'paged'      => 'Страница %d',
        '_404'       => 'Ошибка 404',
        'search'     => 'Результаты поиска по запросу - <b>%s</b>',
        'author'     => 'Архив автора: <b>%s</b>',
        'year'       => 'Архив за <b>%d</b> год',
        'month'      => 'Архив за: <b>%s</b>',
        'day'        => '',
        'attachment' => 'Медиа: %s',
        'tag'        => 'Записи по метке: <b>%s</b>',
        'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',

    );

    // Параметры по умолчанию
    static $args = array(
        'on_front_page'   => false,
        'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
        'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
        'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
        'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
        'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
        // или можно указать свой массив разметки:
        // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
        'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
        'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
        // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
        // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
        // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
        'nofollow' => false, // добавлять rel=nofollow к ссылкам?

        // служебные
        'sep'             => '',
        'linkpatt'        => '',
        'pg_end'          => '',
    );

    function get_crumbs( $sep, $l10n, $args ){
        global $post, $wp_query, $wp_post_types;

        self::$args['sep'] = $sep;

        // Фильтрует дефолты и сливает
        $loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
        $arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

        $arg->sep = '<span class="kb_sep">'. $arg->sep .'</span>'; // дополним

        // упростим
        $sep = & $arg->sep;
        $this->arg = & $arg;

        // микроразметка ---
        if(1){
            $mark = & $arg->markup;

            // Разметка по умолчанию
            if( ! $mark ) $mark = array(
                'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
                'linkpatt'  => '<a href="%s">%s</a>',
                'sep_after' => '',
            );
            // rdf
            elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
                'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
                'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
                'sep_after'  => '</span>', // закрываем span после разделителя!
            );
            // schema.org
            elseif( $mark === 'schema.org' ) $mark = array(
                'wrappatt'   => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
                'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
                'sep_after'  => '',
            );

            elseif( ! is_array($mark) )
                die( __CLASS__ .': "markup" parameter must be array...');

            $wrappatt  = $mark['wrappatt'];
            $arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
            $arg->sep      .= $mark['sep_after']."\n";
        }

        $linkpatt = $arg->linkpatt; // упростим

        $q_obj = get_queried_object();

        // может это архив пустой таксы?
        $ptype = null;
        if( empty($post) ){
            if( isset($q_obj->taxonomy) )
                $ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
        }
        else $ptype = & $wp_post_types[ $post->post_type ];

        // paged
        $arg->pg_end = '';
        if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
            $arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

        $pg_end = $arg->pg_end; // упростим

        // ну, с богом...
        $out = '';

        if( is_front_page() ){
            return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
        }
        // страница записей, когда для главной установлена отдельная страница.
        elseif( is_home() ) {
            $out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
        }
        elseif( is_404() ){
            $out = $loc->_404;
        }
        elseif( is_search() ){
            $out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
        }
        elseif( is_author() ){
            $tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
            $out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
        }
        elseif( is_year() || is_month() || is_day() ){
            $y_url  = get_year_link( $year = get_the_time('Y') );

            if( is_year() ){
                $tit = sprintf( $loc->year, $year );
                $out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
            }
            // month day
            else {
                $y_link = sprintf( $linkpatt, $y_url, $year);
                $m_url  = get_month_link( $year, get_the_time('m') );

                if( is_month() ){
                    $tit = sprintf( $loc->month, get_the_time('F') );
                    $out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
                }
                elseif( is_day() ){
                    $m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
                    $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
                }
            }
        }
        // Древовидные записи
        elseif( is_singular() && $ptype->hierarchical ){
            $out = $this->_add_title( $this->_page_crumbs($post), $post );
        }
        // Таксы, плоские записи и вложения
        else {
            $term = $q_obj; // таксономии

            // определяем термин для записей (включая вложения attachments)
            if( is_singular() ){
                // изменим $post, чтобы определить термин родителя вложения
                if( is_attachment() && $post->post_parent ){
                    $save_post = $post; // сохраним
                    $post = get_post($post->post_parent);
                }

                // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
                $taxonomies = get_object_taxonomies( $post->post_type );
                // оставим только древовидные и публичные, мало ли...
                $taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

                if( $taxonomies ){
                    // сортируем по приоритету
                    if( ! empty($arg->priority_tax) ){
                        usort( $taxonomies, function($a,$b)use($arg){
                            $a_index = array_search($a, $arg->priority_tax);
                            if( $a_index === false ) $a_index = 9999999;

                            $b_index = array_search($b, $arg->priority_tax);
                            if( $b_index === false ) $b_index = 9999999;

                            return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
                        } );
                    }

                    // пробуем получить термины, в порядке приоритета такс
                    foreach( $taxonomies as $taxname ){
                        if( $terms = get_the_terms( $post->ID, $taxname ) ){
                            // проверим приоритетные термины для таксы
                            $prior_terms = & $arg->priority_terms[ $taxname ];
                            if( $prior_terms && count($terms) > 2 ){
                                foreach( (array) $prior_terms as $term_id ){
                                    $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                                    $_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

                                    if( $_terms ){
                                        $term = array_shift( $_terms );
                                        break;
                                    }
                                }
                            }
                            else
                                $term = array_shift( $terms );

                            break;
                        }
                    }
                }

                if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
            }

            // вывод

            // все виды записей с терминами или термины
            if( $term && isset($term->term_id) ){
                $term = apply_filters('kama_breadcrumbs_term', $term );

                // attachment
                if( is_attachment() ){
                    if( ! $post->post_parent )
                        $out = sprintf( $loc->attachment, esc_html($post->post_title) );
                    else {
                        if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
                            $_crumbs    = $this->_tax_crumbs( $term, 'self' );
                            $parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
                            $_out = implode( $sep, array($_crumbs, $parent_tit) );
                            $out = $this->_add_title( $_out, $post );
                        }
                    }
                }
                // single
                elseif( is_single() ){
                    if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'self' );
                        $out = $this->_add_title( $_crumbs, $post );
                    }
                }
                // не древовидная такса (метки)
                elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
                    // метка
                    if( is_tag() )
                        $out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
                    // такса
                    elseif( is_tax() ){
                        $post_label = $ptype->labels->name;
                        $tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
                        $out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
                    }
                }
                // древовидная такса (рибрики)
                else {
                    if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'parent' );
                        $out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );
                    }
                }
            }
            // влоежния от записи без терминов
            elseif( is_attachment() ){
                $parent = get_post($post->post_parent);
                $parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
                $_out = $parent_link;

                // вложение от записи древовидного типа записи
                if( is_post_type_hierarchical($parent->post_type) ){
                    $parent_crumbs = $this->_page_crumbs($parent);
                    $_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
                }

                $out = $this->_add_title( $_out, $post );
            }
            // записи без терминов
            elseif( is_singular() ){
                $out = $this->_add_title( '', $post );
            }
        }

        // замена ссылки на архивную страницу для типа записи
        $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

        if( '' === $home_after ){
            // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
            if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
                && ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
            ){
                $pt_title = $ptype->labels->name;

                // первая страница архива типа записи
                if( is_post_type_archive() && ! $paged_num )
                    $home_after = sprintf( $this->arg->title_patt, $pt_title );
                // singular, paged post_type_archive, tax
                else{
                    $home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

                    $home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
                }
            }
        }

        $before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

        $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

        $out = sprintf( $wrappatt, $before_out . $out );

        return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
    }

    function _page_crumbs( $post ){
        $parent = $post->post_parent;

        $crumbs = array();
        while( $parent ){
            $page = get_post( $parent );
            $crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
            $parent = $page->post_parent;
        }

        return implode( $this->arg->sep, array_reverse($crumbs) );
    }

    function _tax_crumbs( $term, $start_from = 'self' ){
        $termlinks = array();
        $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
        while( $term_id ){
            $term       = get_term( $term_id, $term->taxonomy );
            $termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
            $term_id    = $term->parent;
        }

        if( $termlinks )
            return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
        return '';
    }

    // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
    function _add_title( $add_to, $obj, $term_title = '' ){
        $arg = & $this->arg; // упростим...
        $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
        $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

        // пагинация
        if( $arg->pg_end ){
            $link = $term_title ? get_term_link($obj) : get_permalink($obj);
            $add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
        }
        // дополняем - ставим sep
        elseif( $add_to ){
            if( $show_title )
                $add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
            elseif( $arg->last_sep )
                $add_to .= $arg->sep;
        }
        // sep будет потом...
        elseif( $show_title )
            $add_to = sprintf( $arg->title_patt, $title );

        return $add_to;
    }

}
function post_block( $atts )
{
    global $post;
    $categories = get_categories(array('hide_empty' => false, 'exclude' => 1));
    $output = '<div class="container"><ul class="nav nav-tabs works"><li><a data-toggle="tab" class="active show" href="#alls">Все</a></li>';
    foreach ($categories as $category) {
        $categoryTitle = '';
        $tempTitle = explode(' ',$category->cat_name);
        foreach ($tempTitle as $key => $title){
            if(strlen($title)>3) {
                $categoryTitle .= $title.'<br>';
                }else{
                $categoryTitle .= $title.' ';
            }
        }
        $output .= '<li><a data-toggle="tab" onclick="loadSlide('.$category->term_id.')" href="#category' . $category->term_id . '">' . $categoryTitle . '</a></li>';
    }
    $output .= '</ul><div class="tab-content">';
    $myposts = get_posts();
    $output .= '<div id="alls" class="tab-pane fade category-content active show"><div id="all">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $output .= '<div class="block-padding"><div class="image_title">';
        $output .= '<div class="post-slider">'.get_the_post_thumbnail( $post->ID, array(250,150));
        $output .= '<h3 class="post-title">'.$post->post_title.'</h3>';
        $output .= '</div>';
        $output .= '<div class="post-button">';
        $output .= '<a class="post-more" href="'.$post->guid.'">Подробнее</a>';
        $output .= '<a class="post-bye" href="'.$post->guid.'">Цена</a>';
        $output .= '</div></div></div>';
    }
    $output .= '</div></div>';
        foreach ($categories as $item) {
        $myposts = get_posts(array("category" => $item->term_id));
        $output .= '<div id="category'.$item->term_id.'" class="tab-pane fade category-content"><div id="categories'.$item->term_id.'">';
        foreach ($myposts as $post) {
            setup_postdata($post);
            $output .= '<div class="block-padding"><div class="image_title">';
            $output .= '<div class="post-slider">'.get_the_post_thumbnail( $post->ID, array(250,150));
            $output .= '<h3 class="post-title">'.$post->post_title.'</h3>';
            $output .= '</div>';
            $output .= '<div class="post-button">';
            $output .= '<a class="post-more" href="'.$post->guid.'">Подробнее</a>';
            $output .= '<a class="post-bye" href="'.$post->guid.'">Цена</a>';
            $output .= '</div></div></div>';
        }
        $output .= '</div></div>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('posts_block', 'post_block');
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
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

function wpbsearchform( $form ) {

    $form = '<form role="search" method="get" id="searchform-page" action="' . home_url( '/' ) . '" >
    <div class="page-search">
    <input placeholder="Введите город" type="text" value="' . get_search_query() . '" name="s" id="s" />
    </div>
    </form>';

    return $form;
}

add_shortcode('wpbsearch', 'wpbsearchform');
function modify_post_mime_types( $post_mime_types ) {

    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );

    return $post_mime_types;
}

// Add Filter Hook
add_filter( 'post_mime_types', 'modify_post_mime_types' );

function calculation_price( $atts ){
    $output = '<div class="calculation"><div class="block-calculation">';
    $output .= '<h4>ВВЕДИТЕ КОЛИЧЕСТВО ТОЧЕК И ДОПОЛНИТЕЛЬНЫЕ ПАРАМЕТРЫ</h4>';
    $output .= '<div class="block-elements"><p>Количество точек</p><input type="text" class="block-number" />';
    $output .= '<span class="line-block"><input id="range" data-slider-id="block-range" type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/></span><div>';
    $output .= '<div class="checkbox-block"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="check-1" value="option1"><label class="form-check-label" for="inlineCheckbox1">Подготовка Акта выноса – бесплатно</label></div>';
    $output .= '<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="check-2" value="option1"><label class="form-check-label" for="inlineCheckbox1">C учетом скидки *</label></div></div>';
    $output .= '<div class="checkbox-block-1"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="check-3" value="option1"><label class="form-check-label" for="inlineCheckbox1">Подготовка официального Технического отчета с планом участка</label></div>';
    $output .= '<a href="#" id="calc">Очистить расчет</a></div></div></div>';
    $output .= '</div>';
    $output .= '<div class="calc-total"><h4>СМЕТА ВЫНОС ГРАНИЦ В НАТУРУ</h4>';
    $output .= '<p class="count">Количество точек <span class="count-value">12 шт.</span></p><p class="count-price">Цена <span class="count-price-value bold">7000 руб.</span></p>';
    $output .= '<a href="#" id="calc-request">Заказать</a>';
    $output .= '</div>';
    $output .= '<div class="calc-text"> <p>* Скидка предоставляется физическим лицам при заказе выноса границ участка заблаговременно и назначении исполнителем выезда на объект в течении 1-15 дней после получения заявки</p><p>** Калькулятор и расчет сметы не является публичной офертой. Для окончательного расчета, а также получения информации о текущих скидках и акциях звоните по телефону</p><p class="phone-text">+7 (495) 926-26-18</p></div>';


    return $output;
}
add_shortcode('calculation', 'calculation_price');