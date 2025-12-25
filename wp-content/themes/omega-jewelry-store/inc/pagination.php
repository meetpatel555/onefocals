<?php
/**
 *
 * Pagination Functions
 *
 * @package Omega Jewelry Store
 */

/**
 * Pagination for archive.
 */
function omega_jewelry_store_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $omega_jewelry_store_is_pagination_enabled = get_theme_mod( 'omega_jewelry_store_enable_pagination', true );

    // Check if pagination is enabled
    if ( $omega_jewelry_store_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $omega_jewelry_store_pagination_type = get_theme_mod( 'omega_jewelry_store_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $omega_jewelry_store_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'omega-jewelry-store' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'omega-jewelry-store' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'omega-jewelry-store' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'omega-jewelry-store' ),
                    'next_text' => __( 'Next &raquo;', 'omega-jewelry-store' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'omega-jewelry-store' ),
                )
            );
        endif;
    }
}
add_action( 'omega_jewelry_store_posts_pagination', 'omega_jewelry_store_render_posts_pagination', 10 );