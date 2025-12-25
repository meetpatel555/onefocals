<?php
/**
 * Template Name: About Us
 *
 * @package Omega Jewelry Store
 */

get_header(); ?>

<div id="single-page" class="singular-main-block">
    <div class="wrapper">
        <div class="column-row no-sidebar-layout">
            
            <div id="primary" class="content-area full-width-content">
                <main id="site-content" role="main">
                    
                    <div class="article-wraper">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        endwhile; // End of the loop.
                        ?>
                    </div>

                </main>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
