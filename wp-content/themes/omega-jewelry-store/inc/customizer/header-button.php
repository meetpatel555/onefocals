<?php
/**
* Header Options.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'omega_jewelry_store_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'omega-jewelry-store' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_jewelry_store_theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_20_per_discount_text',
    array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_header_layout_20_per_discount_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_20_per_discount_text',
    array(
    'label'    => esc_html__( 'Header Shipping Text', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_email_address',
    array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_header_layout_email_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_email_address',
    array(
    'label'    => esc_html__( 'Header Email Address', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('omega_jewelry_store_header_layout_enable_translator',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_header_layout_enable_translator'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_header_layout_enable_translator',
    array(
        'label' => esc_html__('Enable Google Translator', 'omega-jewelry-store'),
        'section' => 'omega_jewelry_store_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_jewelry_store_menu_font_size',
    array(
        'default'           => $omega_jewelry_store_default['omega_jewelry_store_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_jewelry_store_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'omega-jewelry-store'),
        'section'     => 'omega_jewelry_store_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_menu_text_transform',
    array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'omega-jewelry-store' ),
    'section'     => 'omega_jewelry_store_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'omega-jewelry-store' ),
        'uppercase'  => esc_html__( 'Uppercase', 'omega-jewelry-store' ),
        'lowercase'    => esc_html__( 'Lowercase', 'omega-jewelry-store' ),
        ),
    )
);

$wp_customize->add_setting('omega_jewelry_store_header_menus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omega_jewelry_store_header_menus_color', array(
    'label'    => __('Main Menu Color', 'omega-jewelry-store'),
    'section'  => 'omega_jewelry_store_button_header_setting',
)));

$wp_customize->add_setting('omega_jewelry_store_header_menus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omega_jewelry_store_header_menus_hover_color', array(
    'label'    => __('Main Menu Hover Color', 'omega-jewelry-store'),
    'section'  => 'omega_jewelry_store_button_header_setting',
)));

$wp_customize->add_setting('omega_jewelry_store_header_submenus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omega_jewelry_store_header_submenus_color', array(
    'label'    => __('Submenu Color', 'omega-jewelry-store'),
    'section'  => 'omega_jewelry_store_button_header_setting',
)));

$wp_customize->add_setting('omega_jewelry_store_header_submenus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'omega_jewelry_store_header_submenus_hover_color', array(
    'label'    => __('Submenu Hover Color', 'omega-jewelry-store'),
    'section'  => 'omega_jewelry_store_button_header_setting',
)));

$wp_customize->add_setting('omega_jewelry_store_sticky',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'omega-jewelry-store'),
        'section' => 'omega_jewelry_store_button_header_setting',
        'type' => 'checkbox',
    )
);