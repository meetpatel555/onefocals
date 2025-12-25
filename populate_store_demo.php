<?php
require_once('wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

// Increase time limit for image downloads
set_time_limit(300);

echo "<h1>Populating Store with Demo Data</h1>";

// 1. Categories
$categories = [
    'Earrings' => [
        ['Diamond Studs', '299.00', 'Elegant diamond studs'],
        ['Gold Hoops', '149.50', 'Classic gold hoops'],
        ['Rose Gold Climbers', '120.00', 'Modern rose gold ear climbers'],
        ['Pearl Drop Earrings', '180.00', 'Timeless pearl drops'],
        ['Sapphire Studs', '450.00', 'Deep blue sapphire studs'],
    ],
    'Rings' => [
        ['Sapphire Halo Ring', '899.00', 'Stunning sapphire with diamond halo'],
        ['Stackable Gold Band', '120.00', 'Minimalist gold band'],
        ['Vintage Emerald Ring', '1200.00', 'Antique style emerald ring'],
        ['Ruby Cocktail Ring', '950.00', 'Bold ruby statement ring'],
    ],
    'Necklaces' => [
        ['Gold Chain Necklace', '350.00', 'Solid 14k gold chain'],
        ['Diamond Pendant', '550.00', 'Solitaire diamond pendant'],
        ['Pearl Strand', '400.00', 'Freshwater pearl necklace'],
        ['Silver Locket', '95.00', 'Sterling silver keepsake locket'],
    ],
    'Bracelets' => [
        ['Tennis Bracelet', '1500.00', 'Classic diamond tennis bracelet'],
        ['Gold Bangle', '450.00', 'Polished gold bangle'],
        ['Charm Bracelet', '120.00', 'Silver charm bracelet base'],
        ['Leather Cuff', '85.00', 'Modern leather and silver cuff'],
    ],
    'Engagement Rings' => [
        ['Solitaire Diamond Ring', '3500.00', '1 carat brilliant cut solitaire'],
        ['Princess Cut Ring', '4200.00', 'Stunning princess cut diamond'],
        ['Three Stone Ring', '3800.00', 'Past, present, and future diamonds'],
        ['Halo Cushion Ring', '4500.00', 'Vintage inspired halo cushion cut'],
    ],
];

// Helper to attach image
function attach_product_image($product_id, $keyword) {
    // Check if product already has image
    if (has_post_thumbnail($product_id)) {
        return;
    }

    $image_url = "https://placehold.co/600x600/png?text=" . urlencode($keyword);
    $desc = "Image for " . $keyword;
    
    // Download and attach
    $image_id = media_sideload_image($image_url, $product_id, $desc, 'id');
    
    if (is_wp_error($image_id)) {
        echo "<p style='color:orange;'>Failed to upload image for $keyword: " . $image_id->get_error_message() . "</p>";
    } else {
        set_post_thumbnail($product_id, $image_id);
        echo "<p style='color:green;'>Attached image to $keyword.</p>";
        
        // Add a gallery image
        $gallery_url = "https://placehold.co/600x600/eee/333/png?text=" . urlencode($keyword) . "+Side";
        $gallery_id = media_sideload_image($gallery_url, $product_id, $desc . " Side", 'id');
        if (!is_wp_error($gallery_id)) {
            $product = wc_get_product($product_id);
            $product->set_gallery_image_ids([$gallery_id]);
            $product->save();
        }
    }
}

// Ensure 'New Arrival' Category exists
if (!term_exists('New Arrival', 'product_cat')) {
    wp_insert_term('New Arrival', 'product_cat');
}

foreach ($categories as $cat_name => $items) {
    // Ensure category exists
    $term = term_exists($cat_name, 'product_cat');
    if (!$term) {
        $term = wp_insert_term($cat_name, 'product_cat');
        echo "<p>Created Category: <strong>$cat_name</strong></p>";
    }
    $cat_id = is_array($term) ? $term['term_id'] : $term;

    foreach ($items as $item) {
        $name = $item[0];
        $price = $item[1];
        $desc = $item[2];

        // Check if product exists
        $existing = get_page_by_title($name, OBJECT, 'product');
        
        if (!$existing) {
            $product = new WC_Product_Simple();
            $product->set_name($name);
            $product->set_slug(sanitize_title($name));
            $product->set_regular_price($price);
            $product->set_description($desc);
            $product->set_short_description($desc);
            $product->set_status("publish");
            $product->set_category_ids([$cat_id]);
            
            // Randomly assign to 'New Arrival'
            if (rand(0, 100) > 70) {
                 $new_term = term_exists('New Arrival', 'product_cat');
                 $product->set_category_ids([$cat_id, $new_term['term_id']]);
            }

            $product_id = $product->save();
            echo "<p>Created Product: $name</p>";
        } else {
            $product_id = $existing->ID;
            echo "<p>Updated Product: $name</p>";
        }
        
        // Attach Image
        attach_product_image($product_id, $name);
    }
}

echo "<h2>Demo Data Population Complete</h2>";
echo "<p><a href='" . home_url() . "' target='_blank'>Visit Homepage</a></p>";
?>
