<?php
/**
* Typography Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'omega_jewelry_store_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'omega-jewelry-store' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_jewelry_store_theme_option_panel',
	)
);

// -----------------  Font array
$omega_jewelry_store_fonts = array(
    'Select'           => __('Default Font', 'omega-jewelry-store'),
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
    'Figtree'     => 'Figtree',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'omega_jewelry_store_content_typography_font', array(
    'default'           => 'Figtree',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_radio_sanitize',
) );
$wp_customize->add_control( 'omega_jewelry_store_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content Font', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_typography_setting',
    'settings' => 'omega_jewelry_store_content_typography_font',
    'choices'  => $omega_jewelry_store_fonts,
) );

 // -----------------  General Heading Font
$wp_customize->add_setting( 'omega_jewelry_store_heading_typography_font', array(
    'default'           => 'Figtree',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_radio_sanitize',
) );
$wp_customize->add_control( 'omega_jewelry_store_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Heading Font', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_typography_setting',
    'settings' => 'omega_jewelry_store_heading_typography_font',
    'choices'  => $omega_jewelry_store_fonts,
) );