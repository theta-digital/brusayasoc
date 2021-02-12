<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'justitia_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'justitia_revslider_theme_setup9', 9 );
	function justitia_revslider_theme_setup9() {

		add_filter( 'justitia_filter_merge_styles', 'justitia_revslider_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_revslider_tgmpa_required_plugins' ) ) {
		function justitia_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( justitia_storage_isset( 'required_plugins', 'revslider' ) && justitia_is_theme_activated() ) {
			$path = justitia_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || justitia_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => justitia_storage_get_array( 'required_plugins', 'revslider' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'version'  => '6.1.4',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'justitia_exists_revslider' ) ) {
	function justitia_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

// Merge custom styles
if ( ! function_exists( 'justitia_revslider_merge_styles' ) ) {
		function justitia_revslider_merge_styles( $list ) {
		if ( justitia_exists_revslider() ) {
			$list[] = 'plugins/revslider/_revslider.scss';
		}
		return $list;
	}
}

