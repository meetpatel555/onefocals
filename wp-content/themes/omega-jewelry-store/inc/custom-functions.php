<?php
/**
 * Custom Functions.
 *
 * @package Omega Jewelry Store
 */

if( !function_exists( 'omega_jewelry_store_fonts_url' ) ) :

    //Google Fonts URL
    function omega_jewelry_store_fonts_url(){

        $omega_jewelry_store_font_families = array(
            'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        );

        $omega_jewelry_store_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $omega_jewelry_store_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($omega_jewelry_store_fonts_url);

    }

endif;

if ( ! function_exists( 'omega_jewelry_store_sub_menu_toggle_button' ) ) :

    function omega_jewelry_store_sub_menu_toggle_button( $omega_jewelry_store_args, $omega_jewelry_store_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $omega_jewelry_store_args->theme_location == 'omega-jewelry-store-primary-menu' && isset( $omega_jewelry_store_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $omega_jewelry_store_args->before = '<div class="submenu-wrapper">';
            $omega_jewelry_store_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $omega_jewelry_store_item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $omega_jewelry_store_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $omega_jewelry_store_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'omega-jewelry-store' ) . '</span>' . omega_jewelry_store_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $omega_jewelry_store_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $omega_jewelry_store_args->theme_location == 'omega-jewelry-store-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $omega_jewelry_store_item->classes ) ) {

                $omega_jewelry_store_args->before = '<div class="link-icon-wrapper">';
                $omega_jewelry_store_args->after  = omega_jewelry_store_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $omega_jewelry_store_args->before = '';
                $omega_jewelry_store_args->after  = '';

            }

        }

        return $omega_jewelry_store_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'omega_jewelry_store_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'omega_jewelry_store_the_theme_svg' ) ):
    
    function omega_jewelry_store_the_theme_svg( $omega_jewelry_store_svg_name, $omega_jewelry_store_return = false ) {

        if( $omega_jewelry_store_return ){

            return omega_jewelry_store_get_theme_svg( $omega_jewelry_store_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in omega_jewelry_store_get_theme_svg();.

        }else{

            echo omega_jewelry_store_get_theme_svg( $omega_jewelry_store_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in omega_jewelry_store_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'omega_jewelry_store_get_theme_svg' ) ):

    function omega_jewelry_store_get_theme_svg( $omega_jewelry_store_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $omega_jewelry_store_svg = wp_kses(
            Omega_Jewelry_Store_SVG_Icons::get_svg( $omega_jewelry_store_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $omega_jewelry_store_svg ) {
            return false;
        }
        return $omega_jewelry_store_svg;

    }

endif;

if( !function_exists( 'omega_jewelry_store_post_category_list' ) ) :

    // Post Category List.
    function omega_jewelry_store_post_category_list( $omega_jewelry_store_select_cat = true ){

        $omega_jewelry_store_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $omega_jewelry_store_post_cat_cat_array = array();
        if( $omega_jewelry_store_select_cat ){

            $omega_jewelry_store_post_cat_cat_array[''] = esc_html__( '-- Select Category --','omega-jewelry-store' );

        }

        foreach ( $omega_jewelry_store_post_cat_lists as $omega_jewelry_store_post_cat_list ) {

            $omega_jewelry_store_post_cat_cat_array[$omega_jewelry_store_post_cat_list->slug] = $omega_jewelry_store_post_cat_list->name;

        }

        return $omega_jewelry_store_post_cat_cat_array;
    }

endif;

if( !function_exists('omega_jewelry_store_single_post_navigation') ):

    function omega_jewelry_store_single_post_navigation(){

        $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
        $omega_jewelry_store_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $omega_jewelry_store_current_id = '';
        $article_wrap_class = '';
        global $post;
        $omega_jewelry_store_current_id = $post->ID;
        if( $omega_jewelry_store_twp_navigation_type == '' || $omega_jewelry_store_twp_navigation_type == 'global-layout' ){
            $omega_jewelry_store_twp_navigation_type = get_theme_mod('twp_navigation_type', $omega_jewelry_store_default['twp_navigation_type']);
        }

        if( $omega_jewelry_store_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $omega_jewelry_store_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . omega_jewelry_store_the_theme_svg('arrow-left',$omega_jewelry_store_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'omega-jewelry-store') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . omega_jewelry_store_the_theme_svg('arrow-right',$omega_jewelry_store_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'omega-jewelry-store') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $omega_jewelry_store_next_post = get_next_post();
                if( isset( $omega_jewelry_store_next_post->ID ) ){

                    $omega_jewelry_store_next_post_id = $omega_jewelry_store_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $omega_jewelry_store_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'omega_jewelry_store_navigation_action','omega_jewelry_store_single_post_navigation',30 );

if( !function_exists('omega_jewelry_store_content_offcanvas') ):

    // Offcanvas Contents
    function omega_jewelry_store_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'omega-jewelry-store'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'omega-jewelry-store'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('omega-jewelry-store-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'omega-jewelry-store-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Omega_Jewelry_Store_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'omega_jewelry_store_before_footer_content_action','omega_jewelry_store_content_offcanvas',30 );

if( !function_exists('omega_jewelry_store_footer_content_widget') ):

    function omega_jewelry_store_footer_content_widget(){
        
        $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
        
        $omega_jewelry_store_footer_column_layout = absint(get_theme_mod('omega_jewelry_store_footer_column_layout', $omega_jewelry_store_default['omega_jewelry_store_footer_column_layout']));
        $omega_jewelry_store_footer_sidebar_class = 12;
        
        if($omega_jewelry_store_footer_column_layout == 2) {
            $omega_jewelry_store_footer_sidebar_class = 6;
        }
        
        if($omega_jewelry_store_footer_column_layout == 3) {
            $omega_jewelry_store_footer_sidebar_class = 4;
        }
        ?>
        
        <?php if ( get_theme_mod('omega_jewelry_store_display_footer', true) == true ) : ?>
            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">
                    
                        <?php for ($i = 0; $i < $omega_jewelry_store_footer_column_layout; $i++) : ?>
                            
                            <div class="column <?php echo 'column-' . absint($omega_jewelry_store_footer_sidebar_class); ?> column-sm-12">
                                
                                <?php 
                                // If no widgets are assigned, display default widgets
                                if ( ! is_active_sidebar( 'omega-jewelry-store-footer-widget-' . $i ) ) : 

                                    if ($i === 0) : ?>
                                        <div id="media_image-3" class="widget widget_media_image">
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/onefocals-logo.png'); ?>" alt="Footer Image" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div id="text-3" class="widget widget_text">
                                            <div class="textwidget">
                                                <p class="widget-title">
                                                    <?php esc_html_e('Omega Jewellery Store WordPress Theme is a premium template designed specifically for online jewellery retailers, gemstone dealers, and luxury accessory boutiques. This theme offers a visually captivating and user-friendly shopping experience tailored to the unique needs of the jewellery industry.', 'omega-jewelry-store'); ?>
                                                </p>
                                            </div>
                                        </div>

                                    <?php elseif ($i === 1) : ?>
                                        <div id="pages-2" class="widget widget_pages">
                                            <h2 class="widget-title"><?php esc_html_e('Calendar', 'omega-jewelry-store'); ?></h2>
                                            <?php get_calendar(); ?>
                                        </div>

                                    <?php elseif ($i === 2) : ?>
                                        <div id="search-2" class="widget widget_search">
                                            <h2 class="widget-title"><?php esc_html_e('Enter Keywords Here', 'omega-jewelry-store'); ?></h2>
                                            <?php get_search_form(); ?>
                                        </div>
                                    <?php endif; 
                                    
                                else :
                                    // Display dynamic sidebar widget if assigned
                                    dynamic_sidebar('omega-jewelry-store-footer-widget-' . $i);
                                endif;
                                ?>
                                
                            </div>
                            
                        <?php endfor; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?> 

    <?php
    }

endif;

add_action( 'omega_jewelry_store_footer_content_action', 'omega_jewelry_store_footer_content_widget', 10 );

if( !function_exists('omega_jewelry_store_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function omega_jewelry_store_footer_content_info(){

        $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">

                    <div class="column column-9">
                        <div class="footer-credits">

                            <div class="footer-copyright">

                                <?php
                                $omega_jewelry_store_footer_sidebar_class = wp_kses_post( get_theme_mod( 'omega_jewelry_store_footer_copyright_text', $omega_jewelry_store_default['omega_jewelry_store_footer_copyright_text'] ) );
                                    echo esc_html( $omega_jewelry_store_footer_sidebar_class );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'omega-jewelry-store') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-jewelry-wordpress-theme') . '" title="' . esc_attr__('Omega Jewelry Store', 'omega-jewelry-store') . '" target="_blank"><span>' . esc_html__('Omega Jewelry Store', 'omega-jewelry-store') . '</span></a>' . esc_html__(' By ', 'omega-jewelry-store') . '  <span>' . esc_html__('OMEGA ', 'omega-jewelry-store') . '</span>';
                                    echo esc_html__('Powered by ', 'omega-jewelry-store') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'omega-jewelry-store') . '" target="_blank"><span>' . esc_html__('WordPress.', 'omega-jewelry-store') . '</span></a>';
                                 ?>

                            </div>
                        </div>
                    </div>


                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('omega_jewelry_store_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $omega_jewelry_store_to_the_top_text = get_theme_mod( 'omega_jewelry_store_to_the_top_text', __( 'To the Top', 'omega-jewelry-store' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $omega_jewelry_store_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>


                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'omega_jewelry_store_footer_content_action','omega_jewelry_store_footer_content_info',20 );


if( !function_exists( 'omega_jewelry_store_main_slider' ) ) :

    function omega_jewelry_store_main_slider(){

        $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
        $omega_jewelry_store_header_banner = get_theme_mod( 'omega_jewelry_store_header_banner', $omega_jewelry_store_default['omega_jewelry_store_header_banner'] );
        $omega_jewelry_store_header_banner_cat = get_theme_mod( 'omega_jewelry_store_header_banner_cat' );

        if( $omega_jewelry_store_header_banner ){

            $omega_jewelry_store_rtl = '';
            if( is_rtl() ){
                $omega_jewelry_store_rtl = 'dir="rtl"';
            }

            $omega_jewelry_store_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $omega_jewelry_store_header_banner_cat ) ) );

            if( $omega_jewelry_store_banner_query->have_posts() ): ?>

            <div class="wrapper">
                <div class="theme-custom-block theme-banner-block">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $omega_jewelry_store_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $omega_jewelry_store_banner_query->have_posts() ):
                            $omega_jewelry_store_banner_query->the_post();
                            $omega_jewelry_store_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                            $omega_jewelry_store_default_image = get_template_directory_uri() . '/inc/homepage-setup/assets/homepage-setup-images/slider-img1.png'; // Replace with the actual path to your default image  
                            $omega_jewelry_store_featured_image = isset( $omega_jewelry_store_featured_image[0] ) ? $omega_jewelry_store_featured_image[0] : $omega_jewelry_store_default_image;?>
                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($omega_jewelry_store_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php omega_jewelry_store_post_format_icon(); ?>
                                        </div>
                                
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>


                                                <div class="entry-content">
                                                    <?php
                                                    if (has_excerpt()) {

                                                        the_excerpt();

                                                    } else {

                                                        echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                    } ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                    <?php echo esc_html__('Know More', 'omega-jewelry-store'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <?php
            wp_reset_postdata();
            endif;

        }

    }

endif;

if( !function_exists( 'omega_jewelry_store_product_section' ) ) :

    function omega_jewelry_store_product_section(){ 

        $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

        $omega_jewelry_store_product_section_title = esc_html( get_theme_mod( 'omega_jewelry_store_product_section_title',
        $omega_jewelry_store_default['omega_jewelry_store_product_section_title'] ) );

        $omega_jewelry_store_catData = get_theme_mod('omega_jewelry_store_featured_product_category','');
        if ( class_exists( 'WooCommerce' ) ) {
            $omega_jewelry_store_args = array(
                'post_type' => 'product',
                'posts_per_page' => 100,
                'product_cat' => $omega_jewelry_store_catData,
                'order' => 'ASC'
            ); ?>

            <div class="theme-product-block">
                <div class="wrapper">
                    <?php if( $omega_jewelry_store_product_section_title ){ ?>
                        <h3><?php echo esc_html( $omega_jewelry_store_product_section_title ); ?></h3>
                    <?php } ?>
                    <div class="product-image">
                        <?php $loop = new WP_Query( $omega_jewelry_store_args );
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="grid-items">
                                <figure>
                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                                </figure>
                                <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></div>
                                <div class="product-cart">
                                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query();
                        } ?>
                    </div>
                </div>
            </div>
    <?php }

endif;

if (!function_exists('omega_jewelry_store_post_format_icon')):

    // Post Format Icon.
    function omega_jewelry_store_post_format_icon() {

        $omega_jewelry_store_format = get_post_format(get_the_ID()) ?: 'standard';
        $omega_jewelry_store_icon = '';
        $omega_jewelry_store_title = '';
        if( $omega_jewelry_store_format == 'video' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'video' );
            $omega_jewelry_store_title = esc_html__('Video','omega-jewelry-store');
        }elseif( $omega_jewelry_store_format == 'audio' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'audio' );
            $omega_jewelry_store_title = esc_html__('Audio','omega-jewelry-store');
        }elseif( $omega_jewelry_store_format == 'gallery' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'gallery' );
            $omega_jewelry_store_title = esc_html__('Gallery','omega-jewelry-store');
        }elseif( $omega_jewelry_store_format == 'quote' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'quote' );
            $omega_jewelry_store_title = esc_html__('Quote','omega-jewelry-store');
        }elseif( $omega_jewelry_store_format == 'image' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'image' );
            $omega_jewelry_store_title = esc_html__('Image','omega-jewelry-store');
        } elseif( $omega_jewelry_store_format == 'link' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'link' );
            $omega_jewelry_store_title = esc_html__('Link','omega-jewelry-store');
        } elseif( $omega_jewelry_store_format == 'status' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'status' );
            $omega_jewelry_store_title = esc_html__('Status','omega-jewelry-store');
        } elseif( $omega_jewelry_store_format == 'aside' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'aside' );
            $omega_jewelry_store_title = esc_html__('Aside','omega-jewelry-store');
        } elseif( $omega_jewelry_store_format == 'chat' ){
            $omega_jewelry_store_icon = omega_jewelry_store_get_theme_svg( 'chat' );
            $omega_jewelry_store_title = esc_html__('Chat','omega-jewelry-store');
        }
        
        if (!empty($omega_jewelry_store_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo omega_jewelry_store_svg_escape($omega_jewelry_store_icon); ?></span>
                <?php if( $omega_jewelry_store_title ){ echo '<span class="post-format-label">'.esc_html( $omega_jewelry_store_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'omega_jewelry_store_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $omega_jewelry_store_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function omega_jewelry_store_svg_escape( $omega_jewelry_store_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $omega_jewelry_store_svg = wp_kses(
            $omega_jewelry_store_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $omega_jewelry_store_svg ) {
            return false;
        }

        return $omega_jewelry_store_svg;

    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_sidebar_option_meta( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_pagination_meta( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'Center','Right','Left');
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $omega_jewelry_store_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function omega_jewelry_store_sanitize_pagination_type( $omega_jewelry_store_input ) {
        // Define valid options for the pagination type.
        $omega_jewelry_store_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $omega_jewelry_store_input, $omega_jewelry_store_valid_options, true ) ) {
            return $omega_jewelry_store_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('omega_jewelry_store_sanitize_enable_pagination') ) :
    function omega_jewelry_store_sanitize_enable_pagination( $omega_jewelry_store_input ) {
        return (bool) $omega_jewelry_store_input;
    }
endif;

if( !function_exists( 'omega_jewelry_store_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_menu_transform( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_menu_transform( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_page_content_alignment( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'left','center','right');
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function omega_jewelry_store_sanitize_footer_widget_title_alignment( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'left','center','right');
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'omega_jewelry_store_sanitize_copyright_alignment_meta' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_copyright_alignment_meta( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'Default','Reverse','Center');
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }else{

            return '';

        }
    }

endif;

/**
 * Sidebar Layout Function
 */
function omega_jewelry_store_get_final_sidebar_layout() {
	$omega_jewelry_store_defaults       = omega_jewelry_store_get_default_theme_options();
	$omega_jewelry_store_global_layout  = get_theme_mod('omega_jewelry_store_global_sidebar_layout', $omega_jewelry_store_defaults['omega_jewelry_store_global_sidebar_layout']);
	$omega_jewelry_store_page_layout    = get_theme_mod('omega_jewelry_store_page_sidebar_layout', $omega_jewelry_store_global_layout);
	$omega_jewelry_store_post_layout    = get_theme_mod('omega_jewelry_store_post_sidebar_layout', $omega_jewelry_store_global_layout);
	$omega_jewelry_store_meta_layout    = get_post_meta(get_the_ID(), 'omega_jewelry_store_post_sidebar_option', true);

	if (!empty($omega_jewelry_store_meta_layout) && $omega_jewelry_store_meta_layout !== 'default') {
		return $omega_jewelry_store_meta_layout;
	}
	if (is_page() || (function_exists('is_shop') && is_shop())) {
		return $omega_jewelry_store_page_layout;
	}
	if (is_single()) {
		return $omega_jewelry_store_post_layout;
	}
	return $omega_jewelry_store_global_layout;
}