<?php
require_once('wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

// If sideloading fails (often due to localhost restrictions or `placehold.co` redirects),
// we will just set the gallery image URL directly in content or use a simpler placeholder via filter
// But since WooCommerce requires an attachment ID for the main image, we will create a text-based image locally.

echo "<h1>Fixing Product Images</h1>";

function create_and_attach_image($product_id, $text) {
    // 1. Create a blank image
    $width = 600;
    $height = 600;
    $im = imagecreatetruecolor($width, $height);
    
    // Colors
    $bg = imagecolorallocate($im, 245, 245, 245); // Light Gray
    $text_color = imagecolorallocate($im, 50, 50, 50); // Dark Gray
    
    imagefilledrectangle($im, 0, 0, $width, $height, $bg);
    
    // Add text (simple logic to center)
    // GD fonts are limited, using basic string
    $font = 5; // Built-in font size
    $text_width = imagefontwidth($font) * strlen($text);
    $text_height = imagefontheight($font);
    $x = ($width - $text_width) / 2;
    $y = ($height - $text_height) / 2;
    
    imagestring($im, $font, $x, $y, $text, $text_color);
    
    // Save to temp file
    $upload_dir = wp_upload_dir();
    $filename = sanitize_title($text) . '-' . time() . '.png';
    $file_path = $upload_dir['path'] . '/' . $filename;
    
    imagepng($im, $file_path);
    imagedestroy($im);
    
    // Create attachment
    $filetype = wp_check_filetype($filename, null);
    $attachment = array(
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );
    
    $attach_id = wp_insert_attachment($attachment, $file_path, $product_id);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $file_path);
    wp_update_attachment_metadata($attach_id, $attach_data);
    
    // Set as featured image
    set_post_thumbnail($product_id, $attach_id);
    
    echo "<p>Generated and attached image for: $text (ID: $attach_id)</p>";
}

$products = wc_get_products(['limit' => -1]);
foreach ($products as $product) {
    if (!has_post_thumbnail($product->get_id())) {
        create_and_attach_image($product->get_id(), $product->get_name());
    }
}
echo "<h2>Done.</h2>";
?>
