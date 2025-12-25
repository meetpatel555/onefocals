<?php

$omega_jewelry_store_custom_css = "";

	$omega_jewelry_store_theme_pagination_options_alignment = get_theme_mod('omega_jewelry_store_theme_pagination_options_alignment', 'Center');
	if ($omega_jewelry_store_theme_pagination_options_alignment == 'Center') {
		$omega_jewelry_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$omega_jewelry_store_custom_css .= 'justify-content: center;margin: 0 auto;';
		$omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_theme_pagination_options_alignment == 'Right') {
		$omega_jewelry_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$omega_jewelry_store_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_theme_pagination_options_alignment == 'Left') {
		$omega_jewelry_store_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$omega_jewelry_store_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$omega_jewelry_store_custom_css .= '}';
	}

	$omega_jewelry_store_theme_breadcrumb_enable = get_theme_mod('omega_jewelry_store_theme_breadcrumb_enable',true);
    if($omega_jewelry_store_theme_breadcrumb_enable != true){
        $omega_jewelry_store_custom_css .='nav.breadcrumb-trail.breadcrumbs,nav.woocommerce-breadcrumb{';
            $omega_jewelry_store_custom_css .='display: none;';
        $omega_jewelry_store_custom_css .='}';
    }

	$omega_jewelry_store_theme_breadcrumb_options_alignment = get_theme_mod('omega_jewelry_store_theme_breadcrumb_options_alignment', 'Left');
	if ($omega_jewelry_store_theme_breadcrumb_options_alignment == 'Center') {
	    $omega_jewelry_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $omega_jewelry_store_custom_css .= 'text-align: center !important;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_theme_breadcrumb_options_alignment == 'Right') {
	    $omega_jewelry_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $omega_jewelry_store_custom_css .= 'text-align: Right !important;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_theme_breadcrumb_options_alignment == 'Left') {
	    $omega_jewelry_store_custom_css .= '.breadcrumbs ul,nav.woocommerce-breadcrumb{';
	    $omega_jewelry_store_custom_css .= 'text-align: Left !important;';
	    $omega_jewelry_store_custom_css .= '}';
	}

	$omega_jewelry_store_single_page_content_alignment = get_theme_mod('omega_jewelry_store_single_page_content_alignment', 'left');
	if ($omega_jewelry_store_single_page_content_alignment == 'left') {
	    $omega_jewelry_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $omega_jewelry_store_custom_css .= 'text-align: left !important;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_single_page_content_alignment == 'center') {
	    $omega_jewelry_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $omega_jewelry_store_custom_css .= 'text-align: center !important;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_single_page_content_alignment == 'right') {
	    $omega_jewelry_store_custom_css .= '#single-page .type-page,section.theme-custom-block.theme-error-sectiontheme-error-section.error-block-middle,section.theme-custom-block.theme-error-section.error-block-heading .theme-area-header{';
	    $omega_jewelry_store_custom_css .= 'text-align: right !important;';
	    $omega_jewelry_store_custom_css .= '}';
	}

	$omega_jewelry_store_single_post_content_alignment = get_theme_mod('omega_jewelry_store_single_post_content_alignment', 'left');
	if ($omega_jewelry_store_single_post_content_alignment == 'left') {
	    $omega_jewelry_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $omega_jewelry_store_custom_css .= 'text-align: left !important;justify-content: left;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_single_post_content_alignment == 'center') {
	    $omega_jewelry_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $omega_jewelry_store_custom_css .= 'text-align: center !important;justify-content: center;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_single_post_content_alignment == 'right') {
	    $omega_jewelry_store_custom_css .= '#single-page .type-post,#single-page .type-post .entry-meta,#single-page .type-post .is-layout-flex{';
	    $omega_jewelry_store_custom_css .= 'text-align: right !important;justify-content: right;';
	    $omega_jewelry_store_custom_css .= '}';
	}

	$omega_jewelry_store_menu_text_transform = get_theme_mod('omega_jewelry_store_menu_text_transform', 'Capitalize');
	if ($omega_jewelry_store_menu_text_transform == 'Capitalize') {
		$omega_jewelry_store_custom_css .= '.site-navigation .primary-menu > li a{';
		$omega_jewelry_store_custom_css .= 'text-transform: Capitalize !important;';
		$omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_menu_text_transform == 'uppercase') {
		$omega_jewelry_store_custom_css .= '.site-navigation .primary-menu > li a{';
		$omega_jewelry_store_custom_css .= 'text-transform: uppercase !important;';
		$omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_menu_text_transform == 'lowercase') {
		$omega_jewelry_store_custom_css .= '.site-navigation .primary-menu > li a{';
		$omega_jewelry_store_custom_css .= 'text-transform: lowercase !important;';
		$omega_jewelry_store_custom_css .= '}';
	}

	$omega_jewelry_store_footer_widget_title_alignment = get_theme_mod('omega_jewelry_store_footer_widget_title_alignment', 'left');
	if ($omega_jewelry_store_footer_widget_title_alignment == 'left') {
	    $omega_jewelry_store_custom_css .= 'h2.widget-title{';
	    $omega_jewelry_store_custom_css .= 'text-align: left !important;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_footer_widget_title_alignment == 'center') {
	    $omega_jewelry_store_custom_css .= 'h2.widget-title{';
	    $omega_jewelry_store_custom_css .= 'text-align: center !important;';
	    $omega_jewelry_store_custom_css .= '}';
	} else if ($omega_jewelry_store_footer_widget_title_alignment == 'right') {
	    $omega_jewelry_store_custom_css .= 'h2.widget-title{';
	    $omega_jewelry_store_custom_css .= 'text-align: right !important;';
	    $omega_jewelry_store_custom_css .= '}';
	}

    	$omega_jewelry_store_show_hide_related_product = get_theme_mod('omega_jewelry_store_show_hide_related_product',true);
	if($omega_jewelry_store_show_hide_related_product != true){
	        $omega_jewelry_store_custom_css .='.related.products{';
	            $omega_jewelry_store_custom_css .='display: none;';
	        $omega_jewelry_store_custom_css .='}';
    	}
		
    /*-------------------- Global First Color -------------------*/

	$omega_jewelry_store_global_color = get_theme_mod('omega_jewelry_store_global_color', '#f5aa9d'); // Add a fallback if the color isn't set

	if ($omega_jewelry_store_global_color) {
		$omega_jewelry_store_custom_css .= ':root {';
		$omega_jewelry_store_custom_css .= '--global-color: ' . esc_attr($omega_jewelry_store_global_color) . ';';
		$omega_jewelry_store_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$omega_jewelry_store_content_typography_font = get_theme_mod('omega_jewelry_store_content_typography_font', 'Figtree'); // Add a fallback if the color isn't set

	if ($omega_jewelry_store_content_typography_font) {
		$omega_jewelry_store_custom_css .= ':root {';
		$omega_jewelry_store_custom_css .= '--font-main: ' . esc_attr($omega_jewelry_store_content_typography_font) . ';';
		$omega_jewelry_store_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$omega_jewelry_store_heading_typography_font = get_theme_mod('omega_jewelry_store_heading_typography_font', 'Figtree'); // Add a fallback if the color isn't set

	if ($omega_jewelry_store_heading_typography_font) {
		$omega_jewelry_store_custom_css .= ':root {';
		$omega_jewelry_store_custom_css .= '--font-head: ' . esc_attr($omega_jewelry_store_heading_typography_font) . ';';
		$omega_jewelry_store_custom_css .= '}';
	}

	$omega_jewelry_store_columns = get_theme_mod('omega_jewelry_store_posts_per_columns', 3);
	$omega_jewelry_store_columns = absint($omega_jewelry_store_columns);
	if ( $omega_jewelry_store_columns < 1 || $omega_jewelry_store_columns > 6 ) {
		$omega_jewelry_store_columns = 3;
	}
	$omega_jewelry_store_custom_css .= "
		.site-content .article-wraper-archive {
			grid-template-columns: repeat({$omega_jewelry_store_columns}, 1fr);
		}
	";

	$omega_jewelry_store_copyright_alignment = get_theme_mod( 'omega_jewelry_store_copyright_alignment', 'Default' );
	if ( $omega_jewelry_store_copyright_alignment === 'Reverse' ) {
		$omega_jewelry_store_custom_css .= '.site-info .column-row { flex-direction: row-reverse; }';
		$omega_jewelry_store_custom_css .= '.footer-credits { justify-content: flex-end; }';
		$omega_jewelry_store_custom_css .= '.footer-copyright { text-align: right; }';
		$omega_jewelry_store_custom_css .= '.site-info .column.column-3 { text-align: left; }';
	} elseif ( $omega_jewelry_store_copyright_alignment === 'Center' ) {
		$omega_jewelry_store_custom_css .= '.site-info .column-row { flex-direction: column; align-items: center; gap: 15px; }';
		$omega_jewelry_store_custom_css .= '.footer-credits { justify-content: center; }';
		$omega_jewelry_store_custom_css .= '.footer-copyright { text-align: center; }';
		$omega_jewelry_store_custom_css .= '.site-info .column.column-3 { text-align: center; }';
	}

	$omega_jewelry_store_footer_widget_background_color = get_theme_mod('omega_jewelry_store_footer_widget_background_color');
	if ($omega_jewelry_store_footer_widget_background_color) {

		$omega_jewelry_store_custom_css .= "
			.footer-widgetarea {
				background-color: ". esc_attr($omega_jewelry_store_footer_widget_background_color) .";
			}
		";
	}

	$omega_jewelry_store_footer_widget_background_image = get_theme_mod('omega_jewelry_store_footer_widget_background_image');
	if ($omega_jewelry_store_footer_widget_background_image) {
		$omega_jewelry_store_custom_css .= "
			.footer-widgetarea {
				background-image: url(" . esc_url($omega_jewelry_store_footer_widget_background_image) . ");
			}
		";
	}

	$omega_jewelry_store_copyright_font_size = get_theme_mod('omega_jewelry_store_copyright_font_size');
	if ($omega_jewelry_store_copyright_font_size) {

		$omega_jewelry_store_custom_css .= "
			.footer-copyright {
				font-size: ". esc_attr($omega_jewelry_store_copyright_font_size) ."px;
			}
		";
	}

	/*-------------------- Menu Color CSS -------------------*/

	$omega_jewelry_store_header_menus_color = get_theme_mod('omega_jewelry_store_header_menus_color');
	if($omega_jewelry_store_header_menus_color != false){
		$omega_jewelry_store_custom_css .='.site-navigation .primary-menu a{';
			$omega_jewelry_store_custom_css .='color: '.esc_attr($omega_jewelry_store_header_menus_color).'!important;';
		$omega_jewelry_store_custom_css .='}';
	}

	$omega_jewelry_store_header_menus_hover_color = get_theme_mod('omega_jewelry_store_header_menus_hover_color');
	if($omega_jewelry_store_header_menus_hover_color != false){
		$omega_jewelry_store_custom_css .='.site-navigation .primary-menu a:hover{';
			$omega_jewelry_store_custom_css .='color: '.esc_attr($omega_jewelry_store_header_menus_hover_color).'!important;';
		$omega_jewelry_store_custom_css .='}';
	}

	$omega_jewelry_store_header_submenus_color = get_theme_mod('omega_jewelry_store_header_submenus_color');
	if($omega_jewelry_store_header_submenus_color != false){
		$omega_jewelry_store_custom_css .='.site-navigation .primary-menu ul.sub-menu li a,.site-navigation .primary-menu li ul li a{';
			$omega_jewelry_store_custom_css .='color: '.esc_attr($omega_jewelry_store_header_submenus_color).'!important;';
		$omega_jewelry_store_custom_css .='}';
	}

	$omega_jewelry_store_header_submenus_hover_color = get_theme_mod('omega_jewelry_store_header_submenus_hover_color');
	if($omega_jewelry_store_header_submenus_hover_color != false){
		$omega_jewelry_store_custom_css .='.site-navigation .primary-menu > li ul.sub-menu a:hover,.site-navigation .primary-menu li ul li a:hover{';
			$omega_jewelry_store_custom_css .='color: '.esc_attr($omega_jewelry_store_header_submenus_hover_color).'!important;';
		$omega_jewelry_store_custom_css .='}';
	}