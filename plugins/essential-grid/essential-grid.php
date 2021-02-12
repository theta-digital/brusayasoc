<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'justitia_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'justitia_essential_grid_theme_setup9', 9 );
	function justitia_essential_grid_theme_setup9() {

		add_filter( 'justitia_filter_merge_styles', 'justitia_essential_grid_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_essential_grid_tgmpa_required_plugins' ) ) {
		function justitia_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( justitia_storage_isset( 'required_plugins', 'essential-grid' ) && justitia_is_theme_activated() ) {
			$path = justitia_get_plugin_source_path( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || justitia_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => justitia_storage_get_array( 'required_plugins', 'essential-grid' ),
					'slug'     => 'essential-grid',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'version'  => '2.2.4.2',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'justitia_exists_essential_grid' ) ) {
	function justitia_exists_essential_grid() {
		return defined( 'EG_PLUGIN_PATH' );
	}
}

// Merge custom styles
if ( ! function_exists( 'justitia_essential_grid_merge_styles' ) ) {
		function justitia_essential_grid_merge_styles( $list ) {
		if ( justitia_exists_essential_grid() ) {
			$list[] = 'plugins/essential-grid/_essential-grid.scss';
		}
		return $list;
	}
}

