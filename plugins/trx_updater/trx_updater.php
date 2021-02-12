<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'justitia_trx_updater_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'justitia_trx_updater_theme_setup9', 9 );
	function justitia_trx_updater_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_trx_updater_tgmpa_required_plugins', 8 );
		}
	}
}


// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_trx_updater_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('justitia_filter_tgmpa_required_plugins', 'justitia_trx_updater_tgmpa_required_plugins');
    function justitia_trx_updater_tgmpa_required_plugins( $list = array() ) {
        if ( justitia_storage_isset( 'required_plugins', 'trx_updater' ) ) {
            $path = justitia_get_plugin_source_path( 'plugins/trx_updater/trx_updater.zip' );
            if ( ! empty( $path ) || justitia_get_theme_setting( 'tgmpa_upload' ) ) {
                $list[] = array(
                    'name'     => justitia_storage_get_array( 'required_plugins', 'trx_updater' ),
                    'slug'     => 'trx_updater',
                    'version'  => '1.4.1',
                    'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
                    'required' => false,
                );
            }
        }
        return $list;
    }
}


// Check if plugin installed and activated
if ( ! function_exists( 'justitia_exists_trx_updater' ) ) {
	function justitia_exists_trx_updater() {
		return defined( 'TRX_UPDATER_VERSION' );
	}
}
