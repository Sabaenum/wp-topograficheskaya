<?php get_header(); ?>
<body id="content">
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-blue">Название организации</th>
            <th class="text-blue">Адрес</th>
            <th class="text-blue">Телефон</th>
            <th class="text-blue">Время приема</th>
        </tr>
        </thead>
        <tbody>
        <tr >
           <td colspan="4">Согласование газопровода</td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        <tr >
            <td colspan="4">Согласование газопровода</td>
        </tr>
        <tr >
            <td>ГУП МО "Мособлгаз филиал" "Одинцовомежрайгаз"</td>
            <td>г. Одинцово, Транспортный пр-д., д.5</td>
            <td>+7 (498) 690-43-04</td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
<?php get_footer(); ?>

