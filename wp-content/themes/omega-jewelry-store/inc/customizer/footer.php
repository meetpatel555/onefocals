<?php
/**
* Footer Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

$wp_customize->add_section( 'omega_jewelry_store_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'omega-jewelry-store' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'omega_jewelry_store_theme_option_panel',
	)
);

$wp_customize->add_setting('omega_jewelry_store_display_footer',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_display_footer'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
    );
    $wp_customize->add_control('omega_jewelry_store_display_footer',
        array(
            'label' => esc_html__('Enable Footer', 'omega-jewelry-store'),
            'section' => 'omega_jewelry_store_footer_widget_area',
            'type' => 'checkbox',
        )
    );

$wp_customize->add_setting( 'omega_jewelry_store_footer_column_layout',
	array(
	'default'           => $omega_jewelry_store_default['omega_jewelry_store_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'omega_jewelry_store_sanitize_select',
	)
);
$wp_customize->add_control( 'omega_jewelry_store_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'omega-jewelry-store' ),
	'section'     => 'omega_jewelry_store_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'omega-jewelry-store' ),
		'2' => esc_html__( 'Two Column', 'omega-jewelry-store' ),
		'3' => esc_html__( 'Three Column', 'omega-jewelry-store' ),
	    ),
	)
);

$wp_customize->add_setting( 'omega_jewelry_store_footer_widget_title_alignment',
        array(
        'default'           => $omega_jewelry_store_default['omega_jewelry_store_footer_widget_title_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_footer_widget_title_alignment',
        )
    );
    $wp_customize->add_control( 'omega_jewelry_store_footer_widget_title_alignment',
        array(
        'label'       => esc_html__( 'Footer Widget Title Alignment', 'omega-jewelry-store' ),
        'section'     => 'omega_jewelry_store_footer_widget_area',
        'type'        => 'select',
        'choices'     => array(
            'left' => esc_html__( 'Left', 'omega-jewelry-store' ),
            'center'  => esc_html__( 'Center', 'omega-jewelry-store' ),
            'right'    => esc_html__( 'Right', 'omega-jewelry-store' ),
            ),
        )
    );

$wp_customize->add_setting( 'omega_jewelry_store_footer_copyright_text',
	array(
	'default'           => $omega_jewelry_store_default['omega_jewelry_store_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'omega_jewelry_store_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'omega-jewelry-store' ),
	'section'  => 'omega_jewelry_store_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('omega_jewelry_store_copyright_font_size',
    array(
        'default'           => $omega_jewelry_store_default['omega_jewelry_store_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_number_range',
    )
);
$wp_customize->add_control('omega_jewelry_store_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'omega-jewelry-store'),
        'section'     => 'omega_jewelry_store_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_copyright_alignment', array(
    'default'           => 'Default',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_copyright_alignment_meta',
) );

$wp_customize->add_control( 'omega_jewelry_store_copyright_alignment', array(
    'label'    => esc_html__( 'Copyright Section Alignment', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_footer_widget_area',
    'type'     => 'select',
    'choices'  => array(
        'Default' => esc_html__( 'Default View', 'omega-jewelry-store' ),
        'Reverse' => esc_html__( 'Reverse View', 'omega-jewelry-store' ),
        'Center'  => esc_html__( 'Centered Content', 'omega-jewelry-store' ),
    ),
) );

$wp_customize->add_setting( 'omega_jewelry_store_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'omega_jewelry_store_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'omega-jewelry-store'),
    'description' => __('It will change the complete footer widget background color.', 'omega-jewelry-store'),
    'section' => 'omega_jewelry_store_footer_widget_area',
    'settings' => 'omega_jewelry_store_footer_widget_background_color',
)));

$wp_customize->add_setting('omega_jewelry_store_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'omega_jewelry_store_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','omega-jewelry-store'),
    'section' => 'omega_jewelry_store_footer_widget_area'
)));

$wp_customize->add_setting('omega_jewelry_store_enable_to_the_top',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'omega-jewelry-store'),
        'section' => 'omega_jewelry_store_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_to_the_top_text',
    array(
    'default'           => $omega_jewelry_store_default['omega_jewelry_store_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_to_the_top_text',
    array(
    'label'    => esc_html__( 'Edit Text Here', 'omega-jewelry-store' ),
    'section'  => 'omega_jewelry_store_footer_widget_area',
    'type'     => 'text',
    )
);