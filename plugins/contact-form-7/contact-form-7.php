<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'justitia_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'justitia_cf7_theme_setup9', 9 );
	function justitia_cf7_theme_setup9() {

		add_filter( 'justitia_filter_merge_scripts', 'justitia_cf7_merge_scripts' );
		add_filter( 'justitia_filter_merge_styles', 'justitia_cf7_merge_styles' );

		if ( justitia_exists_cf7() ) {
			//add_action( 'wp_enqueue_scripts', 'justitia_cf7_frontend_scripts', 1100 );
		}

		if ( is_admin() ) {
			add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_cf7_tgmpa_required_plugins' ) ) {
		function justitia_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( justitia_storage_isset( 'required_plugins', 'contact-form-7' ) ) {
			// CF7 plugin
			$list[] = array(
				'name'     => justitia_storage_get_array( 'required_plugins', 'contact-form-7' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'justitia_exists_cf7' ) ) {
	function justitia_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'justitia_cf7_frontend_scripts' ) ) {
		function justitia_cf7_frontend_scripts() {
		if ( justitia_exists_cf7() ) {
			if ( justitia_is_on( justitia_get_theme_option( 'debug_mode' ) ) ) {
				$justitia_url = justitia_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
				if ( '' != $justitia_url ) {
					wp_enqueue_script( 'justitia-cf7', $justitia_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'justitia_cf7_merge_scripts' ) ) {
		function justitia_cf7_merge_scripts( $list ) {
		if ( justitia_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/contact-form-7.js';
		}
		return $list;
	}
}

// Merge custom styles
if ( ! function_exists( 'justitia_cf7_merge_styles' ) ) {
		function justitia_cf7_merge_styles( $list ) {
		if ( justitia_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/_contact-form-7.scss';
		}
		return $list;
	}
}

