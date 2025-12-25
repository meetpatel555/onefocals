<?php
/**
 * Default Values.
 *
 * @package Omega Jewelry Store
 */

if ( ! function_exists( 'omega_jewelry_store_get_default_theme_options' ) ) :
	function omega_jewelry_store_get_default_theme_options() {

		$omega_jewelry_store_defaults = array();
		
		// Options.
        $omega_jewelry_store_defaults['omega_jewelry_store_logo_width_range']                                  = 200;
		$omega_jewelry_store_defaults['omega_jewelry_store_global_sidebar_layout']					            = 'right-sidebar';
        $omega_jewelry_store_defaults['omega_jewelry_store_global_color']                 = '#f5aa9d';
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_email_address']      = esc_html__( 'mail@example.com', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_20_per_discount_text']      = esc_html__( 'Free International Shipping On Order Over $60', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_facebook_link']      = esc_html__( '#', 'omega-jewelry-store' );

        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_twitter_link']      = esc_html__( '#', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_pintrest_link']      = esc_html__( '#', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_instagram_link']      = esc_html__( '#', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_youtube_link']      = esc_html__( '#', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_enable_translator']          = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_pagination_layout']         = 'numeric';
        $omega_jewelry_store_defaults['omega_jewelry_store_theme_pagination_options_alignment']         = 'Center';
        $omega_jewelry_store_defaults['omega_jewelry_store_theme_breadcrumb_options_alignment']         = 'Left';
        $omega_jewelry_store_defaults['omega_jewelry_store_theme_breadcrumb_enable']                 = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_single_post_content_alignment']                 = 'left';
		$omega_jewelry_store_defaults['omega_jewelry_store_footer_column_layout'] 						 = 3;
        $omega_jewelry_store_defaults['omega_jewelry_store_menu_font_size']                 = 15;
        $omega_jewelry_store_defaults['omega_jewelry_store_copyright_font_size']                 = 16;
        $omega_jewelry_store_defaults['omega_jewelry_store_breadcrumb_font_size']                 = 16;
        $omega_jewelry_store_defaults['omega_jewelry_store_excerpt_limit']                 = 20;
        $omega_jewelry_store_defaults['omega_jewelry_store_copyright_font_size']                 = 16;
        $omega_jewelry_store_defaults['omega_jewelry_store_menu_text_transform']                 = 'capitalize';
        $omega_jewelry_store_defaults['omega_jewelry_store_single_page_content_alignment']                 = 'left';  
        $omega_jewelry_store_defaults['omega_jewelry_store_per_columns']                 = 3;  
        $omega_jewelry_store_defaults['omega_jewelry_store_product_per_page']                 = 9;
        $omega_jewelry_store_defaults['omega_jewelry_store_custom_related_products_number'] = 6;
        $omega_jewelry_store_defaults['omega_jewelry_store_custom_related_products_number_per_row'] = 3;
		$omega_jewelry_store_defaults['omega_jewelry_store_footer_copyright_text'] 				         = esc_html__( 'All rights reserved.', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['twp_navigation_type']              			 = 'theme-normal-navigation';
        $omega_jewelry_store_defaults['omega_jewelry_store_post_author']                    = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_category']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_title']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_content']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_button']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_sticky']                 = 0;
        $omega_jewelry_store_defaults['omega_jewelry_store_post_date']                		= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_post_category']                	= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_post_tags']                		= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_floating_next_previous_nav']     = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_header_banner']                  = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_header_title']           = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_category_section']               = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_courses_category_section']       = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_background_color']               = '#fff';
        $omega_jewelry_store_defaults['omega_jewelry_store_product_section_title']          = esc_html__( 'Grab Your Favorite Earrings', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_theme_loader']                 = 0;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_footer']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_footer_widget_title_alignment']                 = 'left'; 
        $omega_jewelry_store_defaults['omega_jewelry_store_show_hide_related_product']          = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_image']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_single_post_image']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_format_icon']       = 1;
        
        $omega_jewelry_store_defaults['omega_jewelry_store_display_single_post_image']            = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_display_archive_post_format_icon']       = 1;

        $omega_jewelry_store_defaults['omega_jewelry_store_enable_to_the_top']                      = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_to_the_top_text']                      = esc_html__( 'To The Top', 'omega-jewelry-store' );

        // 404 Page Defaults
        $omega_jewelry_store_defaults['omega_jewelry_store_404_main_title'] = esc_html__( 'Oops! That page can’t be found.', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_404_subtitle_one'] = esc_html__( 'Maybe it’s out there, somewhere...', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_404_para_one'] = esc_html__( 'You can always find insightful stories on our', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_404_subtitle_two'] = esc_html__( 'Still feeling lost? You’re not alone.', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_404_para_two'] = esc_html__( 'Enjoy these stories about getting lost, losing things, and finding what you never knew you were looking for.', 'omega-jewelry-store' );

		// Pass through filter.
		$omega_jewelry_store_defaults = apply_filters( 'omega_jewelry_store_filter_default_theme_options', $omega_jewelry_store_defaults );

		return $omega_jewelry_store_defaults;
	}
endif;