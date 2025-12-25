<?php
/**
* Global Color Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_jewelry_store_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'omega-jewelry-store' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_jewelry_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_jewelry_store_global_color',
    array(
    'default'           => '#f5aa9d',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_jewelry_store_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'omega-jewelry-store' ),
        'section'    => 'omega_jewelry_store_global_color_setting',
        'settings'   => 'omega_jewelry_store_global_color',
    ) ) 
);
