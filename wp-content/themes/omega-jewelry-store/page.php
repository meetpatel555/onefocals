<?php
/**
 * The template for displaying all pages.
 *
 * @package Omega Jewelry Store
 */

get_header(); ?>

<div class="wrapper" style="padding: 40px 0; min-height: 500px;">
    <main id="main" class="site-main" role="main">

        <?php
        while ( have_posts() ) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title" style="margin-bottom: 30px;">', '</h1>' ); ?>
                </header>

                <div class="entry-content">
                    <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'omega-jewelry-store' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>
            </article>
            <?php
        endwhile; // End of the loop.
        ?>

    </main>
</div>

<?php get_footer(); ?>
