<?php
$omega_jewelry_store_layout = omega_jewelry_store_get_final_sidebar_layout();
$omega_jewelry_store_sidebar_class = 'column-order-1';

if ( $omega_jewelry_store_layout === 'left-sidebar' ) {
    $omega_jewelry_store_sidebar_class = 'column-order-1';
} elseif ( $omega_jewelry_store_layout === 'right-sidebar' ) {
    $omega_jewelry_store_sidebar_class = 'column-order-2';
}

if ( $omega_jewelry_store_layout !== 'no-sidebar' ) : ?>
    <aside id="secondary" class="widget-area <?php echo esc_attr( $omega_jewelry_store_sidebar_class ); ?>">
        <div class="widget-area-wrapper">
            <?php if ( is_active_sidebar('sidebar-1') ) : ?>
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php else : ?>
                <!-- Default Custom Widgets -->
                
                <!-- WooCommerce Product Search -->
                <div class="widget widget_search">
                    <h3 class="widget-title"><?php esc_html_e('Search Products', 'omega-jewelry-store'); ?></h3>
                    <?php if (function_exists('get_product_search_form')) get_product_search_form(); else get_search_form(); ?>
                </div>

                <!-- WooCommerce Categories (Instead of Blog Categories) -->
                <div class="widget widget_product_categories">
                    <h3 class="widget-title"><?php esc_html_e('Shop by Category', 'omega-jewelry-store'); ?></h3>
                    <ul class="product-categories">
                        <?php 
                        if (class_exists('WooCommerce')) {
                            // Explicitly fetch all terms to ensure they show
                            $args = array(
                                'taxonomy'     => 'product_cat',
                                'orderby'      => 'name',
                                'hide_empty'   => 0
                            );
                            
                            $cats = get_terms($args);
                            if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
                                foreach ( $cats as $cat ) {
                                    // Skip Uncategorized
                                    if ($cat->name === 'Uncategorized') continue;
                                    
                                    $link = get_term_link( $cat );
                                    echo '<li>';
                                    echo '<a href="' . esc_url($link) . '">' . esc_html($cat->name) . '</a>';
                                    echo ' <span class="count">(' . $cat->count . ')</span>';
                                    echo '</li>';
                                }
                            } else {
                                echo '<li>No categories found here.</li>';
                            }
                        } else {
                            // Fallback
                            wp_list_categories(['orderby' => 'name', 'title_li' => '', 'show_count' => true]); 
                        }
                        ?>
                    </ul>
                </div>

                <!-- Filter by Price (Simple Link Dump or Widget if Active) -->
                <div class="widget widget_price_filter">
                    <h3 class="widget-title"><?php esc_html_e('Filter', 'omega-jewelry-store'); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url(wc_get_page_permalink( 'shop' )); ?>?orderby=price">Sort by Price: Low to High</a></li>
                        <li><a href="<?php echo esc_url(wc_get_page_permalink( 'shop' )); ?>?orderby=price-desc">Sort by Price: High to Low</a></li>
                        <li><a href="<?php echo esc_url(wc_get_page_permalink( 'shop' )); ?>?orderby=popularity">Sort by Popularity</a></li>
                    </ul>
                </div>

                <!-- Recent Products -->
                <div class="widget widget_recent_products">
                     <h3 class="widget-title"><?php esc_html_e('New Arrivals', 'omega-jewelry-store'); ?></h3>
                     <?php
                     if (class_exists('WooCommerce')) {
                        echo do_shortcode('[products limit="3" columns="1" orderby="date" order="DESC"]');
                     }
                     ?>
                </div>

            <?php endif; ?>
        </div>
    </aside>
<?php endif; ?>
