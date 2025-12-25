<?php
require_once('wp-load.php');

$slug = 'cart';
$page = get_page_by_path($slug);

if ($page) {
    echo "<h1>Page Found: {$page->post_title} (ID: {$page->ID})</h1>";
    echo "<h2>Content:</h2>";
    echo "<pre>" . esc_html($page->post_content) . "</pre>";
    
    // Check if it's the correct cart page ID
    $wc_cart_id = get_option('woocommerce_cart_page_id');
    echo "<h2>WooCommerce Cart Page ID setting: $wc_cart_id</h2>";
    
    if ($page->ID != $wc_cart_id) {
        echo "<p style='color:red;'>WARNING: The page with slug 'cart' (ID {$page->ID}) is NOT set as the WooCommerce Cart Page (ID $wc_cart_id).</p>";
    }
} else {
    echo "<h1>Page with slug '$slug' NOT FOUND.</h1>";
}

// Check for plugins
echo "<h2>Active Plugins:</h2>";
$plugins = get_option('active_plugins');
print_r($plugins);
?>
