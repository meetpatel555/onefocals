<?php
/**
 * The main template file
 * @package Omega Jewelry Store
 * @since 1.0.0
 */

get_header();

$omega_jewelry_store_layout = omega_jewelry_store_get_final_sidebar_layout();
$omega_jewelry_store_column_class = ($omega_jewelry_store_layout === 'right-sidebar') ? 'column-order-1' : 'column-order-2';

?>

<div class="archive-main-block">
    <div class="wrapper">
        <div class="column-row <?php echo esc_attr($omega_jewelry_store_layout === 'no-sidebar' ? 'no-sidebar-layout' : ''); ?>">

            <div id="primary" class="content-area <?php echo esc_attr($omega_jewelry_store_column_class); ?>">
                <main id="site-content" role="main">

                    <?php
                    if (!is_front_page()) {
                        omega_jewelry_store_breadcrumb();
                    }

                    if (have_posts()) : ?>

                        <div class="article-wraper article-wraper-archive">
                            <?php
                            while (have_posts()) :
                                the_post();
                                get_template_part('template-parts/content', get_post_format());
                            endwhile;
                            ?>
                        </div>

                        <?php
                        if (is_search()) {
                            the_posts_pagination();
                        } else {
                            do_action('omega_jewelry_store_posts_pagination');
                        }

                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                </main>
            </div>

            <?php if ($omega_jewelry_store_layout !== 'no-sidebar') get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
