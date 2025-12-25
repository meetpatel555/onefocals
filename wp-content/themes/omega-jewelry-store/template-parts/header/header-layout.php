<?php
/**
 * Header Layout - Crashas Style (4-Tier)
 * @package Omega Jewelry Store
 */

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
$omega_jewelry_store_sticky = get_theme_mod('omega_jewelry_store_sticky');
$omega_jewelry_store_data_sticky = "false";
if ($omega_jewelry_store_sticky) {
    $omega_jewelry_store_data_sticky = "true";
}
?>

<style>
/* Crashas Style Header CSS */
:root {
    --crashas-red: #ea988e; /* Top banner */
    --crashas-salmon: #f9b6ae; /* Info bar */
    --crashas-text: #333;
    --crashas-white: #ffffff;
}
.crash-header-container {
    font-family: "Futura", "Trebuchet MS", sans-serif;
    background: var(--crashas-white);
}

/* Tier 1: Red Banner (Existing) */
#top-header {
    background-color: var(--crashas-red);
    color: var(--crashas-white);
    padding: 8px 0;
    text-align: center;
    font-size: 13px;
    font-weight: 500;
}
#top-header .button {
    background: rgba(255,255,255,0.2); 
    color: #fff;
    padding: 4px 12px;
    border-radius: 2px;
    font-size: 11px;
    text-transform: uppercase;
    margin-left: 10px;
}
#top-header .button:hover { background: rgba(255,255,255,0.4); }

/* Tier 2: Info Bar (Salmon) */
.crash-info-bar {
    background-color: var(--crashas-salmon);
    color: var(--crashas-white);
    padding: 10px 0;
    font-size: 13px;
    font-weight: 500;
}
.crash-info-bar .wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.crash-social-icons a {
    color: #fff;
    margin-right: 15px;
    text-decoration: none;
    font-size: 14px;
}
.crash-shipping-info {
    display: flex;
    align-items: center;
    gap: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.crash-email-link {
    color: #fff;
    text-decoration: none;
}

/* Tier 3: Main Header (White) */
.crash-main-header {
    background: #fff;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}
.crash-main-header .wrapper {
    display: flex;
    justify-content: flex-end; /* Icons to right */
    align-items: center;
    position: relative; /* Center logo absolute */
    min-height: 50px;
}
.crash-selectors {
    display: none;
}
.crash-selector-item {
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
}
.crash-logo {
    position: absolute;
    left: 15%;
    top: 67%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 10;
}
.crash-logo img {
    max-height: 60px !important;
    max-width: 200px !important;
    width: auto;
    height: auto;
}
.crash-logo h1 {
    margin: 0;
    /* font-family: 'Brush Script MT', cursive; */
    font-size: 32px;
    color: #333;
}
.crash-user-icons {
    display: flex;
    gap: 20px;
    align-items: center;
}
.crash-user-icons a {
    color: #333;
    font-size: 18px;
    text-decoration: none;
}

/* Tier 4: Navigation (White) */
.crash-nav-bar {
    background: #fff;
    padding: 0;
}
.crash-nav-bar .wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    padding: 15px 0;
}
.crash-nav-menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 40px;
}
.crash-nav-menu ul li {
    position: relative;
}
.crash-nav-menu ul li a {
    text-decoration: none;
    color: #333;
    text-transform: capitalize;
    font-weight: 500;
    font-size: 15px;
    display: block;
    padding: 5px 0;
}
.crash-nav-menu ul li a:hover {
    color: var(--crashas-red);
}

/* Dropdown Styles */
.crash-nav-menu ul li ul.sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: -20px;
    background: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    flex-direction: column;
    width: 220px;
    gap: 0;
    z-index: 100;
    padding: 10px 0;
    border-top: 2px solid var(--crashas-red);
}
.crash-nav-menu ul li:hover > ul.sub-menu {
    display: flex;
}
.crash-nav-menu ul li ul.sub-menu li {
    width: 100%;
    margin: 0;
}
.crash-nav-menu ul li ul.sub-menu li a {
    padding: 10px 20px;
    font-size: 14px;
    text-transform: capitalize;
    border-bottom: 1px solid #f5f5f5;
    color: #555;
}
.crash-nav-menu ul li ul.sub-menu li a:hover {
    background-color: #fafafa;
    color: var(--crashas-red);
    padding-left: 25px; /* Slide effect */
    transition: all 0.3s;
}

.crash-buy-btn {
    position: absolute;
    right: 0;
    background: var(--crashas-red);
    color: #fff !important;
    padding: 8px 25px !important;
    border-radius: 2px;
    text-transform: none;
}
</style>

<div class="crash-header-container">

    <!-- Tier 1: Red Banner -->
    <!-- <section id="top-header">
        <div class="wrapper header-wrapper" style="justify-content: center; display: flex; align-items: center;">
            <span>Get 15% OFF on Omega Jewelry Store WordPress Theme | Use Coupon Code <strong>SUMMER15</strong></span>
            <a href="#" class="button">Buy Now</a>
            <a href="#" class="button">Get Bundle</a>
        </div>
    </section> -->

    <!-- Tier 2: Info Bar (Salmon) -->
    <div class="crash-info-bar">
        <div class="wrapper">
            <div class="crash-social-icons">
                <a href="#"><i class="fab fa-facebook-f">f</i></a>
                <a href="#"><i class="fab fa-pinterest-p">p</i></a>
                <a href="#"><i class="fab fa-twitter">t</i></a>
                <a href="#"><i class="fab fa-youtube">y</i></a>
                <a href="#"><i class="fab fa-instagram">i</i></a>
            </div>
            <div class="crash-shipping-info">
                <span class="dashicons dashicons-truck" style="font-family: dashicons;"></span> 
                Free International Shipping on Orders Over $60
            </div>
            <div class="crash-email-link">
                <a href="mailto:<?php echo get_option('admin_email'); ?>" class="crash-email-link"><?php echo get_option('admin_email'); ?></a>
            </div>
        </div>
    </div>

    <!-- Tier 3: Main Header (White) -->
    <div class="crash-main-header">
        <div class="wrapper">
            <!-- Center: Logo -->
            <div class="crash-logo">
                <?php 
                echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . get_template_directory_uri() . '/assets/images/onefocals-logo.png" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"></a>';
                ?>
            </div>

            <!-- Right: Icons -->
            <div class="crash-user-icons">
                <a href="#" title="Search"><svg style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></a>
                <a href="#" title="Wishlist"><svg style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a>
                
                <?php if ( is_user_logged_in() ) { ?>
                    <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="My Account"><svg style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="Login"><svg style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
                <?php } ?>

                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="Cart" class="omega-cart-link">
                    <svg style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    <span class="omega-cart-count" style="font-size:11px; vertical-align:top;">
                        <?php 
                        if(class_exists('woocommerce')) {
                            $count = WC()->cart->get_cart_contents_count();
                            echo ($count > 0) ? '(' . $count . ')' : '';
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- Tier 4: Navigation -->
    <nav class="crash-nav-bar" data-sticky="<?php echo esc_attr($omega_jewelry_store_data_sticky); ?>">
        <div class="wrapper">
            <div class="crash-nav-menu">
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li>
                        <a href="#">Rings <span style="font-size:10px;">▼</span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Engagement Rings</a></li>
                            <li><a href="#">Wedding Bands</a></li>
                            <li><a href="#">Solitaire Rings</a></li>
                            <li><a href="#">Gemstone Rings</a></li>
                            <li><a href="#">Promise Rings</a></li>
                            <li><a href="#">Eternity Bands</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Earrings <span style="font-size:10px;">▼</span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Stud Earrings</a></li>
                            <li><a href="#">Hoop Earrings</a></li>
                            <li><a href="#">Drop Earrings</a></li>
                            <li><a href="#">Chandelier Earrings</a></li>
                            <li><a href="#">Diamond Studs</a></li>
                            <li><a href="#">Gold Hoops</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Necklaces <span style="font-size:10px;">▼</span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Pendants</a></li>
                            <li><a href="#">Chain Necklaces</a></li>
                            <li><a href="#">Chokers</a></li>
                            <li><a href="#">Pearl Necklaces</a></li>
                            <li><a href="#">Locket Necklaces</a></li>
                            <li><a href="#">Diamond Pendants</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Bracelets <span style="font-size:10px;">▼</span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Bangles</a></li>
                            <li><a href="#">Chain Bracelets</a></li>
                            <li><a href="#">Tennis Bracelets</a></li>
                            <li><a href="#">Cuff Bracelets</a></li>
                            <li><a href="#">Charm Bracelets</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Collections <span style="font-size:10px;">▼</span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Bridal Set</a></li>
                            <li><a href="#">Diamond Jewelry</a></li>
                            <li><a href="#">Gold Jewelry</a></li>
                            <li><a href="#">Platinum Jewelry</a></li>
                            <li><a href="#">Silver Jewelry</a></li>
                            <li><a href="#">Gifts for Her</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
        </div>
    </nav>

</div>