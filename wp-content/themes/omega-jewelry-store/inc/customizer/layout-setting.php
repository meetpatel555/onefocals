<?php
/**
* Layouts Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_jewelry_store_layout_setting',
	array(
	'title'      => esc_html__( 'Sidebar Settings', 'omega-jewelry-store' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_jewelry_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_jewelry_store_global_sidebar_layout',
    array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'omega-jewelry-store' ),
    'section'     => 'omega_jewelry_store_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'omega-jewelry-store' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'omega-jewelry-store' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'omega-jewelry-store' ),
        ),
    )
);

$wp_customize->add_setting('omega_jewelry_store_page_sidebar_layout', array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_sidebar_option',
));

$wp_customize->add_control('omega_jewelry_store_page_sidebar_layout', array(
    'label'       => esc_html__('Single Page Sidebar Layout', 'omega-jewelry-store'),
    'section'     => 'omega_jewelry_store_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'omega-jewelry-store'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'omega-jewelry-store'),
        'no-sidebar'    => esc_html__('No Sidebar', 'omega-jewelry-store'),
    ),
));

$wp_customize->add_setting('omega_jewelry_store_post_sidebar_layout', array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_sidebar_option',
));

$wp_customize->add_control('omega_jewelry_store_post_sidebar_layout', array(
    'label'       => esc_html__('Single Post Sidebar Layout', 'omega-jewelry-store'),
    'section'     => 'omega_jewelry_store_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__('Right Sidebar', 'omega-jewelry-store'),
        'left-sidebar'  => esc_html__('Left Sidebar', 'omega-jewelry-store'),
        'no-sidebar'    => esc_html__('No Sidebar', 'omega-jewelry-store'),
    ),
));

$wp_customize->add_setting('omega_jewelry_store_sticky_sidebar',
    array(
        'default'           => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_sticky_sidebar',
    array(
        'label' => esc_html__('Enable/Disable Sticky Sidebar', 'omega-jewelry-store'),
        'section' => 'omega_jewelry_store_layout_setting',
        'type' => 'checkbox',
    )
);