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
    </body>
<?php get_footer(); ?>