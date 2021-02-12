<?php
/**
 * Skins support: Main skin file for the skin 'Lawyer'
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

        justitia_storage_set(
            'schemes', array(

                // Color scheme: 'default'
                'default' => array(
                    'title'    => esc_html__( 'Default', 'justitia' ),
                    'internal' => true,
                    'colors'   => array(

                        // Whole block border and background
                        'bg_color'         => '#ffffff',// +
                        'bd_color'         => '#f4f4f5',// +

                        // Text and links colors
                        'text'             => '#303030',// +
                        'text_light'       => '#b2b2b2',// +
                        'text_dark'        => '#282626',// +
                        'text_link'        => '#dfbd76',// +
                        'text_hover'       => '#1b273d',// +
                        'text_link2'       => '#dfbd76',
                        'text_hover2'      => '#1b273d',// +
                        'text_link3'       => '#dfbd76',// +
                        'text_hover3'      => '#eec432',

                        // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                        'alter_bg_color'   => '#eeeeee',// + f0f0f0
                        'alter_bg_hover'   => '#f0efee',// +
                        'alter_bd_color'   => '#dbdbe1',// +
                        'alter_bd_hover'   => '#dadada',
                        'alter_text'       => '#303030',// +
                        'alter_light'      => '#b2b2b2',// +
                        'alter_dark'       => '#282626',// +
                        'alter_link'       => '#dfbd76',// +
                        'alter_hover'      => '#1b273d',// +
                        'alter_link2'      => '#2c2c39',// +
                        'alter_hover2'     => '#80d572',
                        'alter_link3'      => '#dfbd76',
                        'alter_hover3'     => '#ddb837',// +

                        // Extra blocks (submenu, tabs, color blocks, etc.)
                        'extra_bg_color'   => '#dfbd76',// +
                        'extra_bg_hover'   => '#eeeeee',
                        'extra_bd_color'   => '#dfdfdf',// +
                        'extra_bd_hover'   => '#3d3d3d',
                        'extra_text'       => '#ffffff',// +
                        'extra_light'      => '#b2b2b2',// +
                        'extra_dark'       => '#ffffff',// +
                        'extra_link'       => '#221e1f',// +
                        'extra_hover'      => '#dfbd76',
                        'extra_link2'      => '#221e1f',
                        'extra_hover2'     => '#8be77c',
                        'extra_link3'      => '#ffffff',// +
                        'extra_hover3'     => '#eec432',

                        // Input fields (form's fields and textarea)
                        'input_bg_color'   => '#eeeeee',// +
                        'input_bg_hover'   => '#ffffff',// +
                        'input_bd_color'   => '#eeeeee',
                        'input_bd_hover'   => '#dfbd76',// +
                        'input_text'       => '#303030',// +
                        'input_light'      => '#a7a7a7',
                        'input_dark'       => '#282626',// +

                        // Inverse blocks (text and links on the 'text_link' background)
                        'inverse_bd_color' => '#1b273d',// +
                        'inverse_bd_hover' => '#ffffff',
                        'inverse_text'     => '#ffffff',// +
                        'inverse_light'    => '#8e8e8e',// +
                        'inverse_dark'     => '#ffffff',// +
                        'inverse_link'     => '#ffffff',// +
                        'inverse_hover'    => '#1b273d',// +
                    ),
                ),

                // Color scheme: 'dark'
                'dark'    => array(
                    'title'    => esc_html__( 'Dark', 'justitia' ),
                    'internal' => true,
                    'colors'   => array(

                        // Whole block border and background
                        'bg_color'         => '#1b273d',// +
                        'bd_color'         => '#2b384b',// +

                        // Text and links colors
                        'text'             => '#8a8a94',// +
                        'text_light'       => '#787883',// +
                        'text_dark'        => '#ffffff',// +
                        'text_link'        => '#dfbd76',// +
                        'text_hover'       => '#ffffff',// +
                        'text_link2'       => '#dfbd76',
                        'text_hover2'      => '#30303b',// +
                        'text_link3'       => '#ffffff',// +
                        'text_hover3'      => '#eec432',

                        // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                        'alter_bg_color'   => '#20314f',// +
                        'alter_bg_hover'   => '#182337',// +
                        'alter_bd_color'   => '#2b384b',// +
                        'alter_bd_hover'   => '#4a4a4a',
                        'alter_text'       => '#8a8a94',// +
                        'alter_light'      => '#787883',// +
                        'alter_dark'       => '#ffffff',// +
                        'alter_link'       => '#dfbd76',// +
                        'alter_hover'      => '#ffffff',// +
                        'alter_link2'      => '#2c2c39',// +
                        'alter_hover2'     => '#80d572',
                        'alter_link3'      => '#ffffff',// +
                        'alter_hover3'     => '#ddb837',

                        // Extra blocks (submenu, tabs, color blocks, etc.)
                        'extra_bg_color'   => '#dfbd76',// +
                        'extra_bg_hover'   => '#30303b',// +
                        'extra_bd_color'   => '#e5e5e5',// +
                        'extra_bd_hover'   => '#4a4a4a',
                        'extra_text'       => '#ffffff',// +
                        'extra_light'      => '#787883',// +
                        'extra_dark'       => '#ffffff',// +
                        'extra_link'       => '#1b273d',// +
                        'extra_hover'      => '#dfbd76',
                        'extra_link2'      => '#dfbd76',
                        'extra_hover2'     => '#8be77c',
                        'extra_link3'      => '#dfbd76',// +
                        'extra_hover3'     => '#eec432',

                        // Input fields (form's fields and textarea)
                        'input_bg_color'   => '#20314f',// +
                        'input_bg_hover'   => '#292c34',// +
                        'input_bd_color'   => '#2e2d32',
                        'input_bd_hover'   => '#dfbd76',// +
                        'input_text'       => '#ffffff',// +
                        'input_light'      => '#6f6f6f',
                        'input_dark'       => '#ffffff',// +

                        // Inverse blocks (text and links on the 'text_link' background)
                        'inverse_bd_color' => '#30303b',// +
                        'inverse_bd_hover' => '#1b273d',
                        'inverse_text'     => '#ffffff',// +
                        'inverse_light'    => '#ffffff',
                        'inverse_dark'     => '#ffffff',// +
                        'inverse_link'     => '#ffffff',// +
                        'inverse_hover'    => '#1b273d',// +
                    ),
                ),

            )
        );
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


// Add slin-specific colors and fonts to the custom CSS
require_once JUSTITIA_THEME_DIR . JUSTITIA_SKIN_DIR . 'skin-styles.php';

// Set theme specific importer options
if ( ! function_exists( 'justitia_skin_importer_set_options' ) ) {
    add_filter('trx_addons_filter_importer_options', 'justitia_skin_importer_set_options', 9);
    function justitia_skin_importer_set_options($options = array()) {
        if (is_array($options)) {
            // Corporate demo
            $options['demo_type'] = 'lawyer';
            $options['files']['lawyer'] = $options['files']['default'];
            $options['files']['lawyer']['title'] = esc_html__('Lawyer Demo', 'justitia');
            $options['files']['lawyer']['domain_demo'] = esc_url( justitia_get_protocol() . '://lawyer.justitia.themerex.net' );   // Demo-site domain
            unset($options['files']['default']);

        }
        return $options;
    }
}