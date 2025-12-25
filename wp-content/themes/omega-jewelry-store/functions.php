<?php
/**
 * Omega Jewelry Store functions and definitions
 * @package Omega Jewelry Store
 */

if ( ! function_exists( 'omega_jewelry_store_after_theme_support' ) ) :

	function omega_jewelry_store_after_theme_support() {
		
		load_theme_textdomain( 'omega-jewelry-store', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'omega_jewelry_store_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
			'video',  
			'audio',  
			'gallery',
			'quote',  
			'image',  
			'link',   
			'status', 
			'aside',  
			'chat',   
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

		add_editor_style('/lib/custom/css/editor-style.css');

		require get_template_directory() . '/inc/metabox.php';
		require get_template_directory() . '/inc/homepage-setup/homepage-setup-settings.php';


		if (! defined( 'OMEGA_JEWELRY_STORE_DOCS_PRO' ) ){
		define('OMEGA_JEWELRY_STORE_DOCS_PRO',__('https://layout.omegathemes.com/steps/pro-omega-jewelry-store/','omega-jewelry-store'));
		}
		if (! defined( 'OMEGA_JEWELRY_STORE_BUY_NOW' ) ){
		define('OMEGA_JEWELRY_STORE_BUY_NOW',__('https://www.omegathemes.com/products/jewelry-store-wordpress-theme','omega-jewelry-store'));
		}
		if (! defined( 'OMEGA_JEWELRY_STORE_SUPPORT_FREE' ) ){
		define('OMEGA_JEWELRY_STORE_SUPPORT_FREE',__('https://wordpress.org/support/theme/omega-jewelry-store','omega-jewelry-store'));
		}
		if (! defined( 'OMEGA_JEWELRY_STORE_REVIEW_FREE' ) ){
		define('OMEGA_JEWELRY_STORE_REVIEW_FREE',__('https://wordpress.org/support/theme/omega-jewelry-store/reviews/#new-post','omega-jewelry-store'));
		}
		if (! defined( 'OMEGA_JEWELRY_STORE_DEMO_PRO' ) ){
		define('OMEGA_JEWELRY_STORE_DEMO_PRO',__('https://layout.omegathemes.com/jewelry-store/','omega-jewelry-store'));
		}
		if (! defined( 'OMEGA_JEWELRY_STORE_LITE_DOCS_PRO' ) ){
		define('OMEGA_JEWELRY_STORE_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-omega-jewelry-store/','omega-jewelry-store'));
		}
		if (! defined( 'OMEGA_JEWELRY_STORE_BUNDLE_BUTTON' ) ){
			define('OMEGA_JEWELRY_STORE_BUNDLE_BUTTON',__('https://www.omegathemes.com/products/wp-theme-bundle','omega-jewelry-store'));
		}
		
	}

endif;

add_action( 'after_setup_theme', 'omega_jewelry_store_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function omega_jewelry_store_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $omega_jewelry_store_theme_version = wp_get_theme()->get( 'Version' );
	$omega_jewelry_store_fonts_url = omega_jewelry_store_fonts_url();
    if( $omega_jewelry_store_fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'omega-jewelry-store-google-fonts',
			wptt_get_webfont_url( $omega_jewelry_store_fonts_url ),
			array(),
			$omega_jewelry_store_theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'omega-jewelry-store-style', get_stylesheet_uri(), array(), $omega_jewelry_store_theme_version );

    wp_enqueue_style( 'omega-jewelry-store-style', get_stylesheet_uri() );
    wp_enqueue_style( 'omega-my-account-custom', get_template_directory_uri() . '/css/my-account-custom.css', array(), '1.0' );
    wp_enqueue_style( 'omega-login-page-custom', get_template_directory_uri() . '/css/login-page.css', array(), '1.0' );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'omega-jewelry-store-style',$omega_jewelry_store_custom_css );

	$omega_jewelry_store_css = '';

	if ( get_header_image() ) :

		$omega_jewelry_store_css .=  '
			#center-header{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'omega-jewelry-store-style', $omega_jewelry_store_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'omega-jewelry-store-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);
    
    // AJAX Add to Cart for Single Product
    if ( class_exists('WooCommerce') && is_product() ) {
        wp_enqueue_script( 'omega-single-ajax', get_template_directory_uri() . '/js/single-product-ajax.js', array('jquery'), '1.0', true );
    }
    
    // Archive Cart Feedback
    wp_enqueue_script( 'omega-archive-feedback', get_template_directory_uri() . '/js/archive-cart-feedback.js', array('jquery'), '1.0', true );

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $omega_jewelry_store_c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $omega_jewelry_store_posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $omega_jewelry_store_c_paged,
        );
        $omega_jewelry_store_posts_qry = new WP_Query( $omega_jewelry_store_posts_args );
        $max = $omega_jewelry_store_posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $omega_jewelry_store_c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
    $omega_jewelry_store_pagination_layout = get_theme_mod( 'omega_jewelry_store_pagination_layout',$omega_jewelry_store_default['omega_jewelry_store_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'omega_jewelry_store_register_styles',200 );

function omega_jewelry_store_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('omega-jewelry-store-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'omega_jewelry_store_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function omega_jewelry_store_menus() {

	$omega_jewelry_store_locations = array(
		'omega-jewelry-store-primary-menu'  => esc_html__( 'Primary Menu', 'omega-jewelry-store' ),
	);

	register_nav_menus( $omega_jewelry_store_locations );
}

add_action( 'init', 'omega_jewelry_store_menus' );

add_filter('loop_shop_columns', 'omega_jewelry_store_loop_columns');
if (!function_exists('omega_jewelry_store_loop_columns')) {
	function omega_jewelry_store_loop_columns() {
		$omega_jewelry_store_columns = get_theme_mod( 'omega_jewelry_store_per_columns', 3 );
		return $omega_jewelry_store_columns;
	}
}

add_filter( 'loop_shop_per_page', 'omega_jewelry_store_per_page', 20 );
function omega_jewelry_store_per_page( $omega_jewelry_store_cols ) {
  	$omega_jewelry_store_cols = get_theme_mod( 'omega_jewelry_store_product_per_page', 9 );
	return $omega_jewelry_store_cols;
}

add_filter( 'woocommerce_output_related_products_args', 'omega_jewelry_store_products_args' );

function omega_jewelry_store_products_args( $omega_jewelry_store_args ) {

    $omega_jewelry_store_args['posts_per_page'] = get_theme_mod( 'omega_jewelry_store_custom_related_products_number', 6 );

    $omega_jewelry_store_args['columns'] = get_theme_mod( 'omega_jewelry_store_custom_related_products_number_per_row', 3 );

    return $omega_jewelry_store_args;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/cw-auth-approval.php';


function omega_jewelry_store_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'omega_jewelry_store_remove_customize_register', 11 );

// Apply styles based on customizer settings

function omega_jewelry_store_radio_sanitize(  $omega_jewelry_store_input, $omega_jewelry_store_setting  ) {
	$omega_jewelry_store_input = sanitize_key( $omega_jewelry_store_input );
	$omega_jewelry_store_choices = $omega_jewelry_store_setting->manager->get_control( $omega_jewelry_store_setting->id )->choices;
	return ( array_key_exists( $omega_jewelry_store_input, $omega_jewelry_store_choices ) ? $omega_jewelry_store_input : $omega_jewelry_store_setting->default );
}
require get_template_directory() . '/inc/general.php';

function omega_jewelry_store_sticky_sidebar_enabled() {
    $omega_jewelry_store_sticky_sidebar = get_theme_mod('omega_jewelry_store_sticky_sidebar', true);
    
    if ($omega_jewelry_store_sticky_sidebar == false) {
        $omega_jewelry_store_custom_css = ".widget-area-wrapper { position: relative !important; }";
        wp_add_inline_style('omega-jewelry-store-style', $omega_jewelry_store_custom_css);
    }
}
add_action('wp_enqueue_scripts', 'omega_jewelry_store_sticky_sidebar_enabled');

// NOTICE FUNCTION

function omega_jewelry_store_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'omega_jewelry_store_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_omegajewelrystore-wizard' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Welcome! Thank you for choosing Omega Jewelry Store. Let’s Set Up Your Website!', 'omega-jewelry-store') ?> </h2>
                <p><?php esc_html_e('Before you dive into customization, let’s go through a quick setup process to ensure everything runs smoothly. Click below to start setting up your website in minutes!', 'omega-jewelry-store') ?> </p>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=omegajewelrystore-wizard' ) ); ?>"><?php esc_html_e('Get Started with Omega Jewelry Store', 'omega-jewelry-store'); ?></a>
                </div>
                <p class="dismiss-link"><strong><a href="?omega_jewelry_store_admin_notice=1"><?php esc_html_e( 'Dismiss', 'omega-jewelry-store' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'omega_jewelry_store_admin_notice' );

if ( ! function_exists( 'omega_jewelry_store_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function omega_jewelry_store_update_admin_notice() {
    if ( isset( $_GET['omega_jewelry_store_admin_notice'] ) && $_GET['omega_jewelry_store_admin_notice'] == '1' ) {
        update_option( 'omega_jewelry_store_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'omega_jewelry_store_update_admin_notice' );

// After Switch theme function
add_action( 'after_switch_theme', 'omega_jewelry_store_getstart_setup_options' );
function omega_jewelry_store_getstart_setup_options() {
    update_option( 'omega_jewelry_store_admin_notice', false );
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
// Auto-create About Us Page and Flush Rules
add_action( 'init', 'cw_auto_create_about_page' );
function cw_auto_create_about_page() {
    if ( ! get_page_by_path( 'about-us' ) ) {
        $page_id = wp_insert_post( array(
            'post_title'    => 'About Us',
            'post_name'     => 'about-us',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '', // Content is in the template
        ) );
        
        if ( $page_id ) {
           // Optional: you could force template here if needed, but page-about-us.php works by slug
           // update_post_meta( $page_id, '_wp_page_template', 'page-about-us.php' );
        }
    }
    // Only flush if we think it's needed (simple check)
    if ( ! get_option( 'cw_flush_rewrite_rules_flag' ) ) {
        flush_rewrite_rules();
        update_option( 'cw_flush_rewrite_rules_flag', true );
    }
}

// Auto-create Login Page and Set as My Account
add_action( 'init', 'omega_setup_login_page' );
function omega_setup_login_page() {
    $page_slug = 'login';
    $page = get_page_by_path( $page_slug );
    if ( ! $page ) {
        $page_id = wp_insert_post( array(
            'post_title'    => 'Login',
            'post_name'     => $page_slug,
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '[woocommerce_my_account]',
        ) );
        if ( $page_id ) {
             update_option( 'woocommerce_myaccount_page_id', $page_id );
             flush_rewrite_rules();
        }
    } else {
        // Ensure it is set as the account page
        if ( get_option( 'woocommerce_myaccount_page_id' ) != $page->ID ) {
             update_option( 'woocommerce_myaccount_page_id', $page->ID );
        }
    }
}



/** AJAX LOGIN HANDLER */
function omega_jewelry_store_ajax_login() {
    check_ajax_referer( 'ajax-login-nonce', 'security' );
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;
    $user_signon = wp_signon( $info, false );
    if ( is_wp_error( $user_signon ) ) {
        echo json_encode( array('loggedin'=>false, 'message'=>__('Wrong username or password.', 'omega-jewelry-store')) );
    } else {
        echo json_encode( array('loggedin'=>true, 'message'=>__('Login successful...', 'omega-jewelry-store'), 'redirect_url'=>home_url()) );
    }
    die();
}
add_action( 'wp_ajax_nopriv_omega_ajax_login', 'omega_jewelry_store_ajax_login' );
add_action( 'wp_ajax_omega_ajax_login', 'omega_jewelry_store_ajax_login' );

function omega_jewelry_store_enqueue_ajax_login() {
    wp_enqueue_script( 'omega-ajax-login-script', get_template_directory_uri() . '/js/ajax-login.js', array('jquery'), '1.0', true );
    wp_localize_script( 'omega-ajax-login-script', 'omega_ajax_login_obj', array('ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'ajax-login-nonce' )) );
}
add_action( 'wp_enqueue_scripts', 'omega_jewelry_store_enqueue_ajax_login' );


/** Remove View Cart Link after Add to Cart */
// We do this by filtering it out or handling it via JS. Since simple products on archive use internal WC logic, we will hide it via CSS and custom JS modification.


/** Quick AJAX Qty Update */
function omega_update_cart_ajax() {
    $product_id = intval($_POST['product_id']);
    $qty = intval($_POST['qty']);
    if (!$product_id) die();

    $cart = WC()->cart->get_cart();
    $cart_item_key = WC()->cart->generate_cart_id($product_id);
    $found = false;

    // Find and Update
    foreach ($cart as $key => $item) {
        if ($item['product_id'] == $product_id || $item['variation_id'] == $product_id) {
            $found = true;
            $cart_item_key = $key;
            break;
        }
    }

    if ($qty > 0) {
        if ($found) {
            WC()->cart->set_quantity($cart_item_key, $qty);
        } else {
            WC()->cart->add_to_cart($product_id, $qty);
        }
    } else {
        if ($found) {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }
    WC()->cart->calculate_totals();
    WC()->on_cart_updated();
    die('done');
}
add_action('wp_ajax_omega_update_cart_qty', 'omega_update_cart_ajax');
add_action('wp_ajax_nopriv_omega_update_cart_ajax', 'omega_update_cart_ajax');


/** Ensure Cart Count Fragment Always Returns */
// We already added this filter previously, but let's double check it handles empty cart correctly.
// The previous filter returns empty string if count > 0 is false. Logic is: if count > 0 echo (N) else echo ''.
// So if empty, it echoes ''. HTML is <span ...></span>.
// This allows replacement. If it was returning nothing, replacement might fail.
function omega_cart_count_fragments( $fragments ) {
    ob_start();
    ?>
    <span class="omega-cart-count" style="font-size:11px; vertical-align:top;">
        <?php
        $count = WC()->cart->get_cart_contents_count();
        echo ($count > 0) ? '(' . $count . ')' : '';
        ?>
    </span>
    <?php
    $fragments['.omega-cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'omega_cart_count_fragments', 10, 1 );

/** Cart Trust Badges */
function omega_cart_trust_badges() {
    ?>
    <div class="cart-trust-badges">
        <div class="trust-item">
            <i class="fas fa-truck"></i>
            <span>Free shipping on orders over ₹5000</span>
        </div>
        <div class="trust-item">
            <i class="fas fa-sync-alt"></i>
            <span>Update quantities or remove items as needed</span>
        </div>
        <div class="trust-item">
            <i class="fas fa-lock"></i>
            <span>Secure checkout guaranteed</span>
        </div>
    </div>
    <?php
}
add_action( 'woocommerce_after_cart_table', 'omega_cart_trust_badges' );


/** Handle Custom Registration Fields */
/** Handle Custom Registration Fields & Logic */

/** 1. Global Redirect to Login/My Account */
/** 1. Global Redirect to Login/My Account */
function omega_redirect_home_to_login() {
    // If user is not logged in AND we are NOT on my account page
    // We allow access only to My Account page so they can login/register
    if ( ! is_user_logged_in() && ! is_account_page() ) {
        wp_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ) );
        exit;
    }
}
add_action( 'template_redirect', 'omega_redirect_home_to_login', 1 );


/** 2. Validate Custom Fields */
function omega_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['reg_business_name'] ) && empty( $_POST['reg_business_name'] ) ) {
        $validation_errors->add( 'business_name_error', __( '<strong>Error</strong>: Business Name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['reg_billing_phone'] ) && empty( $_POST['reg_billing_phone'] ) ) {
        $validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone Number is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['reg_billing_address'] ) && empty( $_POST['reg_billing_address'] ) ) {
        $validation_errors->add( 'billing_address_error', __( '<strong>Error</strong>: Address is required!', 'woocommerce' ) );
    }
    // Business Card File Validation
    if ( empty( $_FILES['reg_business_card']['name'] ) ) {
        $validation_errors->add( 'business_card_error', __( '<strong>Error</strong>: Business Card image is required!', 'woocommerce' ) );
    }
    return $validation_errors;
}
add_action( 'woocommerce_register_post', 'omega_validate_extra_register_fields', 10, 3 );


/** 3. Save Custom Fields */
function omega_save_extra_register_fields( $customer_id ) {
    
    // Name
    if ( isset( $_POST['reg_name'] ) ) {
        $name = sanitize_text_field( $_POST['reg_name'] );
        update_user_meta( $customer_id, 'first_name', $name );
        update_user_meta( $customer_id, 'billing_first_name', $name );
        wp_update_user( array( 'ID' => $customer_id, 'display_name' => $name ) );
    }

    // Business Name
    if ( isset( $_POST['reg_business_name'] ) ) {
        update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['reg_business_name'] ) );
    }

    // Phone
    if ( isset( $_POST['reg_billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['reg_billing_phone'] ) );
    }

    // Address
    if ( isset( $_POST['reg_billing_address'] ) ) {
        update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['reg_billing_address'] ) );
    }

    // GSTIN (Optional)
    if ( isset( $_POST['reg_gstin'] ) ) {
        update_user_meta( $customer_id, 'gstin_number', sanitize_text_field( $_POST['reg_gstin'] ) );
    }

    // Business Card Upload
    if ( isset( $_FILES['reg_business_card'] ) && ! empty( $_FILES['reg_business_card']['name'] ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        $attachment_id = media_handle_upload( 'reg_business_card', 0 ); // 0 = not attached to post, or attach to user? User logic is different. Just upload.

        if ( is_wp_error( $attachment_id ) ) {
            // Handle error? Registration already happened, so maybe add user notice?
            // For now, we accept it might fail silently vs validation above caught empty.
        } else {
            update_user_meta( $customer_id, 'business_card_id', $attachment_id );
        }
    }

}
add_action( 'woocommerce_created_customer', 'omega_save_extra_register_fields' );

// Force allow password field
update_option('woocommerce_registration_generate_password', 'no');

// Force enable registration on My Account page
update_option('woocommerce_enable_myaccount_registration', 'yes');

/** Redirect to Homepage after Login/Registration */
function omega_custom_login_redirect( $redirect, $user ) {
    return home_url();
}
add_filter( 'woocommerce_login_redirect', 'omega_custom_login_redirect', 10, 2 );

/**
 * Add Scripts for Login/Register Toggle
 */
add_action( 'wp_footer', 'omega_login_page_scripts' );
function omega_login_page_scripts() {
    if ( is_account_page() && ! is_user_logged_in() ) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            // Check if there are any error messages. If so, and they are related to registration, show register form.
            var hasError = $('.woocommerce-error').length > 0;
            var regError = false;
            // Rough check if error text contains phrases relevant to registration
            if(hasError) {
                var errorText = $('.woocommerce-error').text().toLowerCase();
                if(errorText.includes('email') || errorText.includes('password') || errorText.includes('register') || errorText.includes('business')) {
                     // Since login/register both use email/pass, this is tricky.
                     // But Standard Woo structure: Login is .col-1, Register is .col-2.
                     // Often errors are displayed at the top.
                     // If we want to be persistent, we can check URL params or cookies if needed.
                     // For now, default to Login unless we specifically trigger Register.
                }
            }

            // Inject "Sign Up" button into Login form
            $('.u-column1.col-1 form.woocommerce-form-login').append('<button type="button" class="omega-toggle-signup-btn">Sign Up</button>');
            
            // Inject "Back to Login" into Register form
            $('.u-column2.col-2 form.woocommerce-form-register').append('<a class="omega-toggle-login-btn">Back to Login</a>');

            // Handle Clicks
            $(document).on('click', '.omega-toggle-signup-btn', function(e) {
                e.preventDefault();
                $('.u-column1.col-1').hide();
                $('.u-column2.col-2').fadeIn();
                $('h2').text('Register'); // Update header title if single H2 exists
            });

            $(document).on('click', '.omega-toggle-login-btn', function(e) {
                e.preventDefault();
                $('.u-column2.col-2').hide();
                $('.u-column1.col-1').fadeIn();
                $('h2').text('Login');
            });
            
            // If the URL has ?action=register (optional enhancement), show register
            if (window.location.search.indexOf('action=register') > -1) {
                 $('.u-column1.col-1').hide();
                 $('.u-column2.col-2').show();
            }

        });
        </script>
        <?php
    }
}

/** 
 * Add Logo to Login Page 
 */
add_action( 'woocommerce_before_customer_login_form', 'omega_login_page_logo' );
function omega_login_page_logo() {
    ?>
    <div class="omega-login-logo">
        <?php 
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        } else {
            // Fallback to theme logo or text
             echo '<img src="' . get_template_directory_uri() . '/assets/images/onefocals-logo.png" alt="OneFocals">';
        }
        ?>
    </div>
    <?php
}

/** 
 * Edit Account: Add Custom Fields 
 */
add_action( 'woocommerce_edit_account_form', 'omega_add_fields_to_edit_account_form' );
function omega_add_fields_to_edit_account_form() {
    $user_id = get_current_user_id();
    ?>
    <fieldset>
        <legend><?php esc_html_e( 'Business Details', 'woocommerce' ); ?></legend>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_billing_company"><?php esc_html_e( 'Business Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_billing_company" id="account_billing_company" value="<?php echo esc_attr( get_user_meta( $user_id, 'billing_company', true ) ); ?>" />
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_billing_phone"><?php esc_html_e( 'Phone Number', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="tel" class="woocommerce-Input woocommerce-Input--text input-text" name="account_billing_phone" id="account_billing_phone" value="<?php echo esc_attr( get_user_meta( $user_id, 'billing_phone', true ) ); ?>" />
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_billing_address_1"><?php esc_html_e( 'Address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_billing_address_1" id="account_billing_address_1" value="<?php echo esc_attr( get_user_meta( $user_id, 'billing_address_1', true ) ); ?>" />
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_gstin_number"><?php esc_html_e( 'GSTIN Number (Optional)', 'woocommerce' ); ?></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_gstin_number" id="account_gstin_number" value="<?php echo esc_attr( get_user_meta( $user_id, 'gstin_number', true ) ); ?>" />
        </p>
    </fieldset>
    <?php
}

/** 
 * Edit Account: Save Custom Fields 
 */
add_action( 'woocommerce_save_account_details', 'omega_save_fields_to_edit_account_form' );
function omega_save_fields_to_edit_account_form( $user_id ) {
    
    if ( isset( $_POST['account_billing_company'] ) ) {
        update_user_meta( $user_id, 'billing_company', sanitize_text_field( $_POST['account_billing_company'] ) );
    }
    if ( isset( $_POST['account_billing_phone'] ) ) {
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $_POST['account_billing_phone'] ) );
    }
    if ( isset( $_POST['account_billing_address_1'] ) ) {
        update_user_meta( $user_id, 'billing_address_1', sanitize_text_field( $_POST['account_billing_address_1'] ) );
    }
    if ( isset( $_POST['account_gstin_number'] ) ) {
        update_user_meta( $user_id, 'gstin_number', sanitize_text_field( $_POST['account_gstin_number'] ) );
    }
    
}
