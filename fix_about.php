<?php
// Load WordPress environment
require( dirname( __FILE__ ) . '/wp-load.php' );

// 1. Check if 'About Us' page exists
$page_title = 'About Us';
$page_obj = get_page_by_title( $page_title );

if( !$page_obj ) {
    // Create page object
    $my_post = array(
      'post_title'    => $page_title,
      'post_content'  => '', // Using template
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
      'post_name'     => 'about-us'
    );

    // Insert the post into the database
    $page_id = wp_insert_post( $my_post );
    
    if( !is_wp_error($page_id) ){
        echo "Successfully created page 'About Us' (ID: $page_id).<br>";
        // Set template
        update_post_meta( $page_id, '_wp_page_template', 'page-about-us.php' );
    } else {
        echo "Error creating page: " . $page_id->get_error_message() . "<br>";
    }
} else {
    echo "Page 'About Us' already exists (ID: " . $page_obj->ID . ").<br>";
    // Ensure template is set
    update_post_meta( $page_obj->ID, '_wp_page_template', 'page-about-us.php' );
    echo "Ensured template is referenced.<br>";
}

// 2. Flush Rewrite Rules
flush_rewrite_rules();
echo "Rewrite rules flushed.<br>";

echo "Done. Please go to /wordpress/about-us/ now.";
?>
