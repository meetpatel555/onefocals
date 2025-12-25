<?php 
get_header(); 
?>

<style>
/* Crashas Home Styles */
:root {
    --crashas-red: #bfd7ed;
    --crashas-salmon: #bfd7ed;
    --crashas-bg-light: #e3f2fd; /* Light blue background for hero */
    --crashas-text: #061e47;
}

/* 1. Hero Slider */
.crashas-hero {
    background-color: var(--crashas-bg-light);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}
.crashas-hero .wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}
.crashas-hero-content {
    flex: 1;
    max-width: 50%;
}
.crashas-hero-title {
    font-size: 48px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}
.crashas-hero-desc {
    font-size: 16px;
    color: #666;
    margin-bottom: 30px;
    line-height: 1.6;
}
.crashas-btn {
    display: inline-block;
    padding: 12px 30px;
    border: 1px solid #333;
    color: #333;
    text-decoration: none;
    font-size: 14px;
    background: transparent;
    transition: all 0.3s ease;
    cursor: pointer;
}
.crashas-btn:hover {
    background: #333;
    color: #fff;
}
.crashas-hero-image {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    position: relative;
}
.crashas-hero-image img {
    max-width: 400px;
    height: auto;
}
.crashas-slider-nav {
    position: absolute;
    right: 50px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.crashas-nav-btn {
    width: 40px;
    height: 40px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: 1px solid #eee;
    font-size: 18px;
}

/* 2. Shop By Collections */
.crashas-collections {
    padding: 60px 0;
    text-align: center;
}
.crashas-section-title {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 40px;
    text-align: center;
}
.crashas-col-grid {
    display: flex;
    gap: 20px;
    justify-content: center;
    max-width: 1200px;
    margin: 0 auto 40px;
    flex-wrap: wrap;
}
.crashas-col-item {
    text-align: center;
    width: 150px;
}
.crashas-col-img {
    width: 150px;
    height: 150px;
    background: #eee;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.crashas-col-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.crashas-col-name {
    font-size: 14px;
    color: #333;
    font-weight: 500;
}

/* 3. About Section */
.crashas-about {
    background-color: var(--crashas-salmon); /* Should be lighter red from screenshot */
    padding: 80px 0;
    text-align: center;
    color: #333;
}
.crashas-about h2 {
    font-size: 32px;
    margin-bottom: 20px;
    color: var(--crashas-text);
}
.crashas-about p {
    max-width: 600px;
    margin: 0 auto 30px;
    line-height: 1.6;
}
.crashas-about .crashas-btn {
    background: #fff;
    border-color: #fff;
}
.crashas-about .crashas-btn:hover {
    background: #333;
    color: #fff;
    border-color: #333;
}

/* 4. Best Sellers */
.crashas-bestsellers {
    padding: 60px 0;
    max-width: 1200px;
    margin: 0 auto;
}
.crashas-bestsellers-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}
.crashas-bestsellers .products {
    display: flex !important;
    gap: 20px;
    justify-content: center;
}
.crashas-bestsellers .product {
    text-align: center;
    border: none !important;
}


/* 5. Newsletter Banner */
.crashas-newsletter {
    background-color: var(--crashas-salmon); /* Theme Blue */
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}
.crashas-newsletter .wrapper {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    align-items: center;
    position: relative;
    z-index: 2;
}
.crashas-newsletter-content {
    flex: 1;
    text-align: center;
    color: #333;
    padding-right: 50px;
}
.crashas-newsletter-content h3 {
    font-size: 36px;
    margin-bottom: 10px;
    font-weight: 700;
}
.crashas-newsletter-content p.sub-head {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
}
.crashas-newsletter-content p.desc {
    font-size: 14px;
    margin-bottom: 30px;
    color: #555;
}
.crashas-newsletter-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    max-width: 400px;
    margin: 0 auto;
}
.crashas-newsletter-form input[type="email"] {
    width: 100%;
    padding: 15px;
    border: 1px solid #fff;
    background: #fff;
    text-align: center;
    font-size: 14px;
}
.crashas-newsletter-form button {
    background: #fff;
    border: 1px solid #000;
    color: #000;
    padding: 12px 40px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}
.crashas-newsletter-form button:hover {
    background: #000;
    color: #fff;
}
.crashas-newsletter-small {
    font-size: 10px;
    margin-top: 15px;
    color: #666;
}
.crashas-newsletter-img {
    flex: 1;
    display: flex;
    justify-content: flex-end;
}
.crashas-newsletter-img img {
    max-height: 400px; /* Adjust based on image aspect ratio */
    width: auto;
}

/* 6. Product Sections (New Arrivals & Earrings) */
.crashas-product-section {
    padding: 60px 0;
    max-width: 1200px;
    margin: 0 auto;
}
.crashas-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    margin-bottom: 20px;
}
.crashas-section-header h2 {
    font-size: 32px;
    font-weight: 700;
    margin: 0;
    color: #333;
    flex-grow: 1;
    text-align: center;
}
.crashas-view-all-btn {
    border: 1px solid #333;
    padding: 8px 15px;
    font-size: 12px;
    text-transform: uppercase;
    text-decoration: none;
    color: #333;
    font-weight: 600;
    white-space: nowrap;
}
.crashas-view-all-btn:hover {
    background: #333;
    color: #fff;
}
/* Center align products in grid */
.crashas-product-section .products {
    justify-content: center;
}
/* Ensure product grid items are centered if few */
/* Product Card Styling */
.crashas-product-section ul.products {
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Reduced gap */
    justify-content: center;
    margin: 0 !important;
    padding: 0 !important;
}

.crashas-product-section ul.products li.product {
    background: #fff;
    border: 1px solid #f0f0f0;
    padding: 10px; /* Reduced padding */
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
    /* Force 4 items per row: (100% - (3 * 15px gap)) / 4 = 25% - 11.25px */
    width: calc(25% - 15px); 
    box-sizing: border-box;
    margin: 0 !important;
}

.crashas-product-section ul.products li.product:hover {
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    border-color: #ddd;
    transform: translateY(-5px);
}

/* Image scaling */
.crashas-product-section ul.products li.product a img {
    margin-bottom: 15px;
    max-height: 250px;
    object-fit: contain;
    width: 100%;
}

/* Title Styling */
.crashas-product-section ul.products li.product .woocommerce-loop-product__title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin: 10px 0 5px;
    line-height: 1.4;
    min-height: 45px; /* Ensure 2 lines check alignment */
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Price Styling */
.crashas-product-section ul.products li.product .price {
    font-size: 15px;
    color: var(--crashas-red);
    font-weight: 700;
    margin-bottom: 15px;
    display: block;
}

/* Button & Actions Container */
.crashas-product-section ul.products li.product .button,
.crashas-product-section ul.products li.product .added_to_cart {
    display: block;
    width: 100%;
    padding: 12px 0;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1px;
    border: 1px solid #333 !important;
    background: #333 !important; /* Solid black by default */
    color: #fff !important;
    border-radius: 30px !important; /* Proper Border Radius */
    margin-top: auto; /* Push to bottom */
    text-decoration: none;
    line-height: normal;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.crashas-product-section ul.products li.product .button:hover,
.crashas-product-section ul.products li.product .added_to_cart:hover {
    background: #000 !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

/* Active State (View Cart) */
.crashas-product-section ul.products li.product .added_to_cart {
    background: #fff !important;
    color: #333 !important;
    margin-top: 10px;
}
.crashas-product-section ul.products li.product .added_to_cart:hover {
    background: #333 !important;
    color: #fff !important;
}

/* Hide Quantity Inputs & Other Noise */
/* Hide Quantity Inputs & Other Noise - Aggressive Mode */
.crashas-product-section ul.products li.product .quantity,
.crashas-product-section ul.products li.product .yith-wcqv-button,
.crashas-product-section ul.products li.product form.cart .quantity,
.crashas-product-section ul.products li.product .qty,
.crashas-product-section ul.products li.product input[type=number],
.crashas-product-section ul.products li.product .quantity-button,
.crashas-product-section ul.products li.product .minus,
.crashas-product-section ul.products li.product .plus,
.crashas-product-section ul.products li.product button.minus,
.crashas-product-section ul.products li.product button.plus,
.crashas-product-section ul.products li.product .qib-container,
.crashas-product-section ul.products li.product .quantity.buttons_added {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    height: 0 !important;
    width: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
}

</style>

<div class="crashas-home-container">

    <!-- 1. Hero Slider -->
    <section class="crashas-hero">
        <div class="wrapper">
            <div class="crashas-hero-content">
                <h2 class="crashas-hero-title">Timeless Elegance & Beauty</h2>
                <p class="crashas-hero-desc">Discover our exclusive collection of hand-crafted diamond rings and fine jewelry designed to make every moment unforgettable.</p>
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="crashas-btn">Shop Collection</a>
            </div>
            <div class="crashas-hero-image">
                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-hero-ring.png" alt="Exquisite Diamond Ring">
            </div>
        </div>
        <div class="crashas-slider-nav">
            <div class="crashas-nav-btn">^</div>
            <div class="crashas-nav-btn">v</div>
        </div>
    </section>

    <!-- 2. Shop By Collections -->
    <section class="crashas-collections">
        <h2 class="crashas-section-title">Shop By Collections</h2>
        <div class="crashas-col-grid">
        <div class="crashas-col-grid">
            <?php 
            // Dynamic Categories from WooCommerce
            if ( taxonomy_exists('product_cat') ) {
                $terms = get_terms( array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false, // Set to true if you only want cats with products
                    'number'     => 6,
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                ) );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        // Get category thumbnail
                        $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                        $image_url = wp_get_attachment_url( $thumbnail_id );
                        
                        // Fallback image if no thumbnail
                        if ( ! $image_url ) {
                             $image_url = 'https://placehold.co/150x150/png?text=' . $term->name;
                        }

                        echo '<div class="crashas-col-item">
                                <a href="' . esc_url( get_term_link( $term ) ) . '" style="text-decoration:none; color:inherit;">
                                    <div class="crashas-col-img"><img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $term->name ) . '"></div>
                                    <div class="crashas-col-name">' . esc_html( $term->name ) . '</div>
                                </a>
                              </div>';
                    }
                } else {
                    echo '<p>No categories found. Add some in Products > Categories.</p>';
                }
            } else {
                 echo '<p>WooCommerce not active.</p>';
            }
            ?>
        </div>
        </div>
        <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="crashas-btn">View All Collections</a>
    </section>

    <!-- 3. New Arrivals (New Section) -->
    <section class="crashas-product-section">
        <div class="crashas-section-header">
            <!-- Empty left to balance if needed, or absolute positioning for center title -->
            <div style="flex:1;"></div> 
            <h2>New Arrivals</h2>
            <div style="flex:1; text-align:right;">
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="crashas-view-all-btn">View All Products</a>
            </div>
        </div>
        
        <?php 
        if ( class_exists('WooCommerce') ) {
            // Newest products
            echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC"]');
        } else {
            echo '<p>WooCommerce is not active.</p>';
        }
        ?>
    </section>

    <!-- 3. About Crashas -->
    <section class="crashas-about">
        <h2>About Crashas</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
        <a href="<?php echo home_url('/about-us'); ?>" class="crashas-btn">Our Story</a>
    </section>

    <!-- 4. Best Sellers -->
    <section class="crashas-bestsellers">
        <div class="crashas-bestsellers-header">
            <h2 class="crashas-section-title" style="margin:0;">Best Sellers</h2>
            <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="crashas-btn" style="padding: 8px 15px;">View All Products</a>
        </div>
        
        <?php 
        if ( class_exists('WooCommerce') ) {
            echo do_shortcode('[products limit="4" columns="4" best_selling="true"]');
        } else {
            echo '<p>WooCommerce is not active.</p>';
        }
        ?>
    </section>

    <!-- 5. Newsletter Banner (Replaced Offer Banner) -->
    <section class="crashas-newsletter">
        <div class="wrapper">
            <div class="crashas-newsletter-content">
                <h3>20% OFF</h3>
                <p class="sub-head">Sign up for 20% off your first purchase</p>
                <p class="desc">Subscribe and get notified at first on the latest update and offers!</p>
                
                <form class="crashas-newsletter-form">
                    <input type="email" placeholder="Enter Your Email Address" required>
                    <button type="submit">Subscribe Now</button>
                    <span class="crashas-newsletter-small">*By completing this form you are signing up to receive our emails and can unsubscribe at any time.</span>
                </form>
            </div>
            <div class="crashas-newsletter-img">
                 <!-- Placeholder for Model Image -->
                 <img src="https://placehold.co/400x500/png?text=Model+Wearing+Jewelry" alt="Jewelry Model">
            </div>
        </div>
    </section>

    <!-- 6. Grab Your Favourite Earrings -->
    <section class="crashas-product-section">
        <div class="crashas-section-header">
            <div style="flex:1;"></div> 
            <h2>Grab Your Favourite Earrings</h2>
            <div style="flex:1; text-align:right;">
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="crashas-view-all-btn">View All Products</a>
            </div>
        </div>
        
        <?php 
        if ( class_exists('WooCommerce') ) {
            // Earrings Category
            echo do_shortcode('[products limit="4" columns="4" category="earrings"]');
        } else {
            echo '<p>WooCommerce is not active.</p>';
        }
        ?>
    </section>

</div>

<?php get_footer(); ?>