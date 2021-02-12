<?php
/**
 * Skins support: Main skin file for the skin 'Default'
 *
 * Setup skin-dependent fonts and colors, load scripts and styles,
 * and other operations that affect the appearance and behavior of the theme
 * when the skin is activated
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.46
 */


// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'justitia_skin_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'justitia_skin_theme_setup3', 3 );
	function justitia_skin_theme_setup3() {
		// ToDo: Add / Modify theme options, required plugins, etc.
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'justitia_skin_tgmpa_required_plugins' ) ) {
	add_filter( 'justitia_filter_tgmpa_required_plugins', 'justitia_skin_tgmpa_required_plugins' );
	function justitia_skin_tgmpa_required_plugins( $list = array() ) {
		// ToDo: Check if plugin is in the 'required_plugins' and add his parameters to the TGMPA-list
		//       Replace 'skin-specific-plugin-slug' to the real slug of the plugin
		if ( justitia_storage_isset( 'required_plugins', 'skin-specific-plugin-slug' ) ) {
			$list[] = array(
				'name'     => justitia_storage_get_array( 'required_plugins', 'skin-specific-plugin-slug' ),
				'slug'     => 'skin-specific-plugin-slug',
				'required' => false,
			);
		}
		return $list;
	}
}

// Enqueue skin-specific styles and scripts
// Priority 1150 - after plugins-specific (1100), but before child theme (1200)
if ( ! function_exists( 'justitia_skin_frontend_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'justitia_skin_frontend_scripts', 1150 );
	function justitia_skin_frontend_scripts() {
		$justitia_url = justitia_get_file_url( JUSTITIA_SKIN_DIR . 'skin.css' );
		if ( '' != $justitia_url ) {
			wp_enqueue_style( 'justitia-skin-' . esc_attr( JUSTITIA_SKIN_NAME ), $justitia_url, array(), null );
		}
		if ( justitia_is_on( justitia_get_theme_option( 'debug_mode' ) ) ) {
			$justitia_url = justitia_get_file_url( JUSTITIA_SKIN_DIR . 'skin.js' );
			if ( '' != $justitia_url ) {
				wp_enqueue_script( 'justitia-skin-' . esc_attr( JUSTITIA_SKIN_NAME ), $justitia_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Enqueue skin-specific responsive styles
// Priority 2050 - after theme responsive 2000
if ( ! function_exists( 'justitia_skin_styles_responsive' ) ) {
	add_action( 'wp_enqueue_scripts', 'justitia_skin_styles_responsive', 2050 );
	function justitia_skin_styles_responsive() {
		$justitia_url = justitia_get_file_url( JUSTITIA_SKIN_DIR . 'skin-responsive.css' );
		if ( '' != $justitia_url ) {
			wp_enqueue_style( 'justitia-skin-' . esc_attr( JUSTITIA_SKIN_NAME ) . '-responsive', $justitia_url, array(), null );
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'justitia_skin_merge_scripts' ) ) {
	add_filter( 'justitia_filter_merge_scripts', 'justitia_skin_merge_scripts' );
	function justitia_skin_merge_scripts( $list ) {
		if ( justitia_get_file_dir( JUSTITIA_SKIN_DIR . 'skin.js' ) != '' ) {
			$list[] = JUSTITIA_SKIN_DIR . 'skin.js';
		}
		return $list;
	}
}


// Add slin-specific colors and fonts to the custom CSS
require_once JUSTITIA_THEME_DIR . JUSTITIA_SKIN_DIR . 'skin-styles.php';
