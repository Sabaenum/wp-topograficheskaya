<head>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <title><?php is_front_page() == '1' ? "Главная" : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body id="content">
<div id="header" class="row">
<div class="main-header ">
    <a id="home-icon" href="/"><img src="<?php echo get_stylesheet_directory_uri().'/img/home.png'; ?>" /></a>
<?php wp_nav_menu(); ?>
<div class="search ">
    <?php get_search_form(); ?>
</div>
</div>
</div>
<div class="header-contacts">
    <div class="row" id="home-contents">
        <div class="col-6 col-sm-3 col-lg-3 logo">
            <img src="<?php echo get_stylesheet_directory_uri().'/img/logo.png';?>" />
        </div>
        <div class="col-6 col-sm-4 col-lg-4 date-work">
            <p class="bold time">Пн-Пт: 9<span class=sup>00</span>-21<span class=sup>00</span><br>
                    Сб-Вс: 10<span class=sup>00</span>-18<span class=sup>00</span><br></p>
                <p>Прием заявок онлайн – круглосуточно<br>
                Консультации и прием заказов<br>
                    по телефону 9<span class=sup>00</span>-21<span class=sup>00</span><br>
            </p>
        </div>
        <div class="col-6 col-sm-3 col-lg-3 location">
            <p class="bold work">Офисы:<br></p>
            <p>
               г. Москва, ул. Барклая, д.6, 39<br>
               Виртуальные офисы</p>
        </div>
        <div class="col-6 col-sm-2 col-lg-2 contacts">
           <div class="contacts_desktop">
               <p class="bold phone">
                <a href="tel:+84995215746">8 (499) 521-57-46</a><br>
                <a href="tel:+78002228063">+7 (800) 222-80-63</a><br>
                <a href="tel:+79267062618">+7 (926) 706-26-18</a><br>
            </p>
            <span id="mail">
            <a href="mailto::zakaz@kadgeoburo.ru">zakaz@kadgeoburo.ru</a>
            </span>
            <a href="#" class="btn btn-danger" id="call-back">Заказать звонок</a>
           </div>
            <div class="contacts_mobile">
                <p><span>Контакты:</span></p>
                <a href="#"> <img src="wp-content/themes/topograficheskaya/img/icon/phone_icon.png"></a>
            </div>
        </div>

    </div>
    <?php if(is_front_page()){ ?>
    <div class="main-banner">
        <div class="row" id="home-contents">
        <div class="col-12 col-sm-12 col-lg-12 banner-title">
            <h2>Топографическая съемка</h2>
            <h3>в Москве и Московской области</h3>
            <h4>Готовая топосъемка через 3-8 дней, в зависимости от объема работ</h4>
        </div>
        </div>
        <div class="banner-buttons">
            <a class="banner-button-1" href="#">Бесплатная консультация</a>
            <a class="banner-button-2" href="#">Посмотреть прайс-лист</a>
        </div>
    </div>
    <?php } else { ?>
        <div class="breadcrumbs">
            <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' » '); ?>
        </div>
   <?php } ?>
</div>