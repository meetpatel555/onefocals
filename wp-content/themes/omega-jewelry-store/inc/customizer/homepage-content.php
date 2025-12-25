<?php
/**
* Header Banner Options.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
$omega_jewelry_store_post_category_list = omega_jewelry_store_post_category_list();

$wp_customize->add_section( 'omega_jewelry_store_header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'omega-jewelry-store' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_jewelry_store_theme_home_pannel',
    )
);

$wp_customize->add_setting('omega_jewelry_store_display_header_title',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_display_header_title',
    array(
        'label' => esc_html__('Enable / Disable Title', 'omega-jewelry-store'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

// Show/Hide Site Logo
$wp_customize->add_setting('omega_jewelry_store_display_logo', array(
    'default'           => false,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
));
$wp_customize->add_control('omega_jewelry_store_display_logo', array(
    'label'    => esc_html__('Enable / Disable Site Logo', 'omega-jewelry-store'),
    'section'  => 'title_tagline',
    'type'     => 'checkbox',
));

// Show/Hide Site Title
$wp_customize->add_setting('omega_jewelry_store_display_title', array(
    'default'           => true,
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
));
$wp_customize->add_control('omega_jewelry_store_display_title', array(
    'label'    => esc_html__('Enable / Disable Site Title', 'omega-jewelry-store'),
    'section'  => 'title_tagline',
    'type'     => 'checkbox',
));

// Show/Hide Site Tagline
$wp_customize->add_setting('omega_jewelry_store_display_header_text',
    array(
        'default'           => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Site Tagline', 'omega-jewelry-store'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_jewelry_store_header_banner',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'omega-jewelry-store'),
        'section' => 'omega_jewelry_store_header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_select',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'omega-jewelry-store' ),
    'section'     => 'omega_jewelry_store_header_banner_setting',
    'type'        => 'select',
    'choices'     => $omega_jewelry_store_post_category_list,
    )
);

// Product Settings

$wp_customize->add_section( 'omega_jewelry_store_product_column_setting',
    array(
    'title'      => esc_html__( 'Product Settings', 'omega-jewelry-store' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'omega_jewelry_store_theme_home_pannel',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_product_section_title',
    array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_product_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_product_section_title',
    array(
    'label'    => esc_html__( 'Product Title', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_product_column_setting',
    'type'     => 'text',
    )
);

$omega_jewelry_store_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($omega_jewelry_store_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('omega_jewelry_store_featured_product_category',array(
    'default'   => '',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_select',
));
$wp_customize->add_control('omega_jewelry_store_featured_product_category',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Select category to display products ','omega-jewelry-store'),
    'section' => 'omega_jewelry_store_product_column_setting',
));