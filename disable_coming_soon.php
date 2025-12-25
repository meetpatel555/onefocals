<?php
require_once('wp-load.php');

echo "<h1>WooCommerce Settings Check</h1>";

$option = get_option('woocommerce_coming_soon');
echo "<p>woocommerce_coming_soon: " . var_export($option, true) . "</p>";

if ($option === 'yes' || $option === 'store-coming-soon') {
    echo "<p><strong>Coming Soon mode is ENABLED. Disabling it...</strong></p>";
    update_option('woocommerce_coming_soon', 'no');
    echo "<p>Disabled.</p>";
} else {
    echo "<p>Coming Soon mode is NOT enabled via simple option.</p>";
}

// Also check for 'woocommerce_store_pages_only' which restricts access
$pages_only = get_option('woocommerce_store_pages_only');
echo "<p>woocommerce_store_pages_only: " . var_export($pages_only, true) . "</p>";

?>
