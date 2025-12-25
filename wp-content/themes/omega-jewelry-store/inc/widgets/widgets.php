<?php
/**
* Widget Functions.
*
* @package Omega Jewelry Store
*/

function omega_jewelry_store_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'omega-jewelry-store'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'omega-jewelry-store'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
    $omega_jewelry_store_omega_jewelry_store_footer_column_layout = absint( get_theme_mod( 'omega_jewelry_store_footer_column_layout',$omega_jewelry_store_default['omega_jewelry_store_footer_column_layout'] ) );

    for( $omega_jewelry_store_i = 0; $omega_jewelry_store_i < $omega_jewelry_store_omega_jewelry_store_footer_column_layout; $omega_jewelry_store_i++ ){
    	
    	if( $omega_jewelry_store_i == 0 ){ $omega_jewelry_store_count = esc_html__('One','omega-jewelry-store'); }
    	if( $omega_jewelry_store_i == 1 ){ $omega_jewelry_store_count = esc_html__('Two','omega-jewelry-store'); }
    	if( $omega_jewelry_store_i == 2 ){ $omega_jewelry_store_count = esc_html__('Three','omega-jewelry-store'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'omega-jewelry-store').$omega_jewelry_store_count,
	        'id' => 'omega-jewelry-store-footer-widget-'.$omega_jewelry_store_i,
	        'description' => esc_html__('Add widgets here.', 'omega-jewelry-store'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'omega_jewelry_store_widgets_init');