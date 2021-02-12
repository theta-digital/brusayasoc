<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'justitia_booked_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'justitia_booked_theme_setup9', 9 );
    function justitia_booked_theme_setup9() {
        add_filter( 'justitia_filter_merge_styles', 'justitia_booked_merge_styles' );
        if ( is_admin() ) {
            add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_booked_tgmpa_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_booked_tgmpa_required_plugins' ) ) {
        function justitia_booked_tgmpa_required_plugins( $list = array() ) {
        if ( justitia_storage_isset( 'required_plugins', 'booked' ) && justitia_is_theme_activated() ) {
            $path = justitia_get_plugin_source_path( 'plugins/booked/booked.zip' );
            if ( ! empty( $path ) || justitia_get_theme_setting( 'tgmpa_upload' ) ) {
                $list[] = array(
                    'name'     => justitia_storage_get_array( 'required_plugins', 'booked' ),
                    'slug'     => 'booked',
                    'source'   => ! empty( $path ) ? $path : 'upload://booked.zip',
                    'version'  => '2.2.5',
                    'required' => false,
                );
            }
        }
        return $list;
    }
}


// Check if plugin installed and activated
if ( ! function_exists( 'justitia_exists_booked' ) ) {
    function justitia_exists_booked() {
        return class_exists( 'booked_plugin' );
    }
}

// Merge custom styles
if ( ! function_exists( 'justitia_booked_merge_styles' ) ) {
        function justitia_booked_merge_styles( $list ) {
        if ( justitia_exists_booked() ) {
            $list[] = 'plugins/booked/_booked.scss';
        }
        return $list;
    }
}


// Add plugin-specific colors and fonts to the custom CSS
if ( justitia_exists_booked() ) {
    require_once JUSTITIA_THEME_DIR . 'plugins/booked/booked-styles.php'; }

