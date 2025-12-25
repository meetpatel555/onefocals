<?php
/**
 * Body Classes.
 * @package Omega Jewelry Store
 */

if (!function_exists('omega_jewelry_store_body_classes')) :

    function omega_jewelry_store_body_classes($omega_jewelry_store_classes)
    {
        $omega_jewelry_store_defaults = omega_jewelry_store_get_default_theme_options();
        $omega_jewelry_store_layout = omega_jewelry_store_get_final_sidebar_layout();

        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $omega_jewelry_store_classes[] = 'hfeed';
        }

        // Sidebar layout logic
        $omega_jewelry_store_classes[] = $omega_jewelry_store_layout;

        // Copyright alignment
        $copyright_alignment = get_theme_mod('omega_jewelry_store_copyright_alignment', 'Default');
        $omega_jewelry_store_classes[] = 'copyright-' . strtolower($copyright_alignment);

        return $omega_jewelry_store_classes;
    }

endif;

add_filter('body_class', 'omega_jewelry_store_body_classes');