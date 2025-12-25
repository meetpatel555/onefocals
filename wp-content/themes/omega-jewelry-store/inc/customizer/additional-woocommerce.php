<?php
/**
* Additional Woocommerce Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'omega_jewelry_store_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'omega-jewelry-store' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_jewelry_store_theme_option_panel',
	)
);

	$wp_customize->add_setting('omega_jewelry_store_per_columns',
		array(
		'default'           => $omega_jewelry_store_default['omega_jewelry_store_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_jewelry_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_jewelry_store_per_columns',
		array(
		'label'       => esc_html__('Products Per Column', 'omega-jewelry-store'),
		'section'     => 'omega_jewelry_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 6,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_jewelry_store_product_per_page',
		array(
		'default'           => $omega_jewelry_store_default['omega_jewelry_store_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_jewelry_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_jewelry_store_product_per_page',
		array(
		'label'       => esc_html__('Products Per Page', 'omega-jewelry-store'),
		'section'     => 'omega_jewelry_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 100,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_jewelry_store_show_hide_related_product',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('omega_jewelry_store_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'omega-jewelry-store'),
	        'section' => 'omega_jewelry_store_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);

	$wp_customize->add_setting('omega_jewelry_store_custom_related_products_number',
		array(
		'default'           => $omega_jewelry_store_default['omega_jewelry_store_custom_related_products_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_jewelry_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_jewelry_store_custom_related_products_number',
		array(
		'label'       => esc_html__('Related Products Per Page', 'omega-jewelry-store'),
		'section'     => 'omega_jewelry_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('omega_jewelry_store_custom_related_products_number_per_row',
		array(
		'default'           => $omega_jewelry_store_default['omega_jewelry_store_custom_related_products_number_per_row'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'omega_jewelry_store_sanitize_number_range',
		)
	);
	$wp_customize->add_control('omega_jewelry_store_custom_related_products_number_per_row',
		array(
		'label'       => esc_html__('Related Products Per Row', 'omega-jewelry-store'),
		'section'     => 'omega_jewelry_store_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 5,
		'step'   => 1,
		),
		)
	);