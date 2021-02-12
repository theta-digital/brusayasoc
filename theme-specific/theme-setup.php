<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'JUSTITIA_THEME_FREE' ) ) {
	define( 'JUSTITIA_THEME_FREE', false );
}
if ( ! defined( 'JUSTITIA_THEME_FREE_WP' ) ) {
	define( 'JUSTITIA_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'JUSTITIA_ALLOW_SKINS' ) ) {
	define( 'JUSTITIA_ALLOW_SKINS', true );
}
if ( ! defined( 'JUSTITIA_DEFAULT_SKIN' ) ) {
	define( 'JUSTITIA_DEFAULT_SKIN', 'default' );
}

// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
$GLOBALS['JUSTITIA_STORAGE'] = array(

	// Theme required plugin's slugs
	'required_plugins'   => array_merge(

		// List of plugins for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			// Required plugins
			// DON'T COMMENT OR REMOVE NEXT LINES!
			'trx_addons'         => esc_html__( 'ThemeREX Addons', 'justitia' ),

			// If theme use OCDI instead (or both) ThemeREX Addons Installer
			
			// Recommended (supported) plugins for both (lite and full) versions
			// If plugin not need - comment (or remove) it
			'elementor'          => esc_html__( 'Elementor', 'justitia' ),
			'contact-form-7'     => esc_html__( 'Contact Form 7', 'justitia' ),
			'mailchimp-for-wp'   => esc_html__( 'MailChimp for WP', 'justitia' ),
			// GDPR Support: uncomment only one of two following plugins
			'wp-gdpr-compliance' => esc_html__( 'WP GDPR Compliance', 'justitia' ),
		),
		// List of plugins for the FREE version only
		//-----------------------------------------------------
		JUSTITIA_THEME_FREE
			? array(
				// Recommended (supported) plugins for the FREE (lite) version
				'siteorigin-panels' => esc_html__( 'SiteOrigin Panels', 'justitia' ),
			)

		// List of plugins for the PREMIUM version only
		//-----------------------------------------------------
			: array(
				// Recommended (supported) plugins for the PRO (full) version
				// If plugin not need - comment (or remove) it
				'booked'                     => esc_html__( 'Booked Appointments', 'justitia' ),
				'essential-grid'             => esc_html__( 'Essential Grid', 'justitia' ),
				'revslider'                  => esc_html__( 'Revolution Slider', 'justitia' ),
                'trx_updater'                  => esc_html__( 'ThemeREX Updater', 'justitia' ),
			)
	),

	// Theme-specific blog layouts
	'blog_styles'        => array_merge(
		// Layouts for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			'excerpt' => array(
				'title'   => esc_html__( 'Standard', 'justitia' ),
				'archive' => 'index-excerpt',
				'item'    => 'content-excerpt',
				'styles'  => 'excerpt',
			),
			'classic' => array(
				'title'   => esc_html__( 'Classic', 'justitia' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'classic',
			),
		),
		// Layouts for the FREE version only
		//-----------------------------------------------------
		JUSTITIA_THEME_FREE
		? array()

		// Layouts for the PREMIUM version only
		//-----------------------------------------------------
		: array(
			'masonry'   => array(
				'title'   => esc_html__( 'Masonry', 'justitia' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'masonry',
			),
			'portfolio' => array(
				'title'   => esc_html__( 'Portfolio', 'justitia' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio',
				'columns' => array( 2, 3, 4 ),
				'styles'  => 'portfolio',
			),
			'gallery'   => array(
				'title'   => esc_html__( 'Gallery', 'justitia' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio-gallery',
				'columns' => array( 2, 3, 4 ),
				'styles'  => array( 'portfolio', 'gallery' ),
			),
			'chess'     => array(
				'title'   => esc_html__( 'Chess', 'justitia' ),
				'archive' => 'index-chess',
				'item'    => 'content-chess',
				'columns' => array( 1, 2, 3 ),
				'styles'  => 'chess',
			),
		)
	),

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-themerex',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => 'http://justitia.themerex.net',
	'theme_doc_url'      => 'http://justitia.themerex.net/doc/',
    'theme_download_url'=> 'https://1.envato.market/c/1262870/275988/4415?subId1=themerex&u=themeforest.net/item/justitia-multiskin-lawyer-legal-adviser-wordpress-theme/23198818',

	'theme_support_url'  => 'https://themerex.net/support/',                             // ThemeREX

	'theme_video_url'    => 'https://www.youtube.com/channel/UCnFisBimrK2aIE-hnY70kCA',  // ThemeREX

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By device
		'wide'     => array(
			'min' => 2160
		),
		'desktop'  => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook' => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'   => array(
			'min' => 768,
			'max' => 1279,
		),
		'mobile'   => array( 'max' => 767 ),
		// By size
		'xxl'      => array( 'max' => 1679 ),
		'xl'       => array( 'max' => 1439 ),
		'lg'       => array( 'max' => 1279 ),
		'md'       => array( 'max' => 1023 ),
		'sm'       => array( 'max' => 767 ),
		'sm_wp'    => array( 'max' => 600 ),
		'xs'       => array( 'max' => 479 ),
	),
);

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'justitia_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'justitia_customizer_theme_setup1', 1 );
	function justitia_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		justitia_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',            // none  - use separate options for the main and the child-theme
																// child - duplicate theme options from the main theme to the child-theme only
																// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',             // Refresh method for preview area in the Appearance - Customize:
																// auto - refresh preview area on change each field with Theme Options
																// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                  // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,               // Place 'comment' field after the 'name' and 'email'

				'icons_selector'         => 'internal',         // Icons selector in the shortcodes:
																// standard VC (very slow) or Elementor's icons selector (not support images and svg)
																// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',            // Type of icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present icons
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',            // Type of socials icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present social networks
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,               // Check if exists a .min version of .css and .js and return path to it
																// instead the path to the original file
																// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,              // Show any menu if no menu selected in the location 'main_menu'
																// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,              // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,               // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,              // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,              // Allow use image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,               // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,              // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																// In the Page Options this styles are present always
																// (can be removed if filter 'justitia_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,              // Add arrows on the single attachment page to navigate to the prev/next attachment
				
				'gutenberg_safe_mode'    => array('elementor'), // vc,elementor - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'allow_gutenberg_blocks' => false,              // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,               // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx' => 'replace',                 // Add our breakpoints to the Responsive section of each element
																// 'add' - add our breakpoints after Elementor's
																// 'replace' - add our breakpoints instead Elementor's
																// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
				justitia_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Assistant',
					'family' => 'sans-serif',
					'styles' => '200,300,400,600,700,800',     // Parameter 'style' used only for the Google fonts
				),
				// Font-face packed with theme
				array(
					'name'   => 'LuxiSerif',
					'family' => 'sans-serif',
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		justitia_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
						
		justitia_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'justitia' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'justitia' ),
					'font-family'     => '"Assistant",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.4em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.6em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '5em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '0.915em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '1.28em',
					'margin-bottom'   => '0.8em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '4.21em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.0625em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '1.0952em',
					'margin-bottom'   => '0.7619em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '3.42em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.076em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '1.2em',
					'margin-bottom'   => '0.71em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '2.1em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.125em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '1.71em',
					'margin-bottom'   => '1.27em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '1.578em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.24em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '2em',
					'margin-bottom'   => '1.2em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '1.368em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.23em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '1.9706em',
					'margin-bottom'   => '1.0412em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'justitia' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '2.1em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.01em',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'justitia' ),
					'font-family'     => '"Assistant",sans-serif',
					'font-size'       => '15px',
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '1.3em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.05em',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'justitia' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'justitia' ),
					'font-family'     => 'inherit',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'justitia' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'justitia' ),
					'font-family'     => '"LuxiSerif",sans-serif',
					'font-size'       => '0.947rem',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'italic',
					'line-height'     => '2em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.01em',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'justitia' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'justitia' ),
					'font-family'     => '"Assistant",sans-serif',
					'font-size'       => '15px',
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.05em',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'justitia' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'justitia' ),
					'font-family'     => '"Assistant",sans-serif',
					'font-size'       => '15px',
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.05em',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		justitia_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'justitia' ),
					'description' => esc_html__( 'Colors of the main content area', 'justitia' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'justitia' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'justitia' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'justitia' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'justitia' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'justitia' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'justitia' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'justitia' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'justitia' ),
				),
			)
		);
		justitia_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'justitia' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'justitia' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'justitia' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'justitia' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'justitia' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'justitia' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'justitia' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'justitia' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'justitia' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'justitia' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'justitia' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'justitia' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'justitia' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'justitia' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'justitia' ),
					'description' => esc_html__( 'Color of the links inside this block', 'justitia' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'justitia' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'justitia' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'justitia' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'justitia' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'justitia' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'justitia' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'justitia' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'justitia' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'justitia' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'justitia' ),
				),
			)
		);
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
						'text_link'        => '#e85b59',// +
						'text_hover'       => '#23232f',// +
						'text_link2'       => '#e85b59',
						'text_hover2'      => '#23232f',// +
						'text_link3'       => '#e85b59',// +
						'text_hover3'      => '#eec432',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#eeeeee',// + f0f0f0
						'alter_bg_hover'   => '#f0efee',// +
						'alter_bd_color'   => '#dbdbe1',// +
						'alter_bd_hover'   => '#dadada',
						'alter_text'       => '#303030',// +
						'alter_light'      => '#b2b2b2',// +
						'alter_dark'       => '#282626',// +
						'alter_link'       => '#e85b59',// +
						'alter_hover'      => '#23232f',// +
						'alter_link2'      => '#2c2c39',// +
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#e85b59',
						'alter_hover3'     => '#ddb837',// +

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#e85b59',// +
						'extra_bg_hover'   => '#eeeeee',
						'extra_bd_color'   => '#dfdfdf',// +
						'extra_bd_hover'   => '#3d3d3d',
						'extra_text'       => '#ffffff',// +
						'extra_light'      => '#b2b2b2',// +
						'extra_dark'       => '#ffffff',// +
						'extra_link'       => '#221e1f',// +
						'extra_hover'      => '#fe7259',
						'extra_link2'      => '#221e1f',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ffffff',// +
						'extra_hover3'     => '#eec432',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#eeeeee',// +
						'input_bg_hover'   => '#ffffff',// +
						'input_bd_color'   => '#eeeeee',
						'input_bd_hover'   => '#e85b59',// +
						'input_text'       => '#303030',// +
						'input_light'      => '#a7a7a7',
						'input_dark'       => '#282626',// +

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#23232f',// +
						'inverse_bd_hover' => '#ffffff',
						'inverse_text'     => '#ffffff',// +
						'inverse_light'    => '#8e8e8e',// +
						'inverse_dark'     => '#ffffff',// +
						'inverse_link'     => '#ffffff',// +
						'inverse_hover'    => '#23232f',// +
					),
				),

				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'justitia' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#23232f',// +
						'bd_color'         => '#43474f',// +

						// Text and links colors
						'text'             => '#8a8a94',// +
						'text_light'       => '#787883',// +
						'text_dark'        => '#ffffff',// +
						'text_link'        => '#e85b59',// +
						'text_hover'       => '#ffffff',// +
						'text_link2'       => '#e85b59',
						'text_hover2'      => '#30303b',// +
						'text_link3'       => '#ffffff',// +
						'text_hover3'      => '#eec432',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#2c2c39',// +
						'alter_bg_hover'   => '#30303b',// +
						'alter_bd_color'   => '#43474f',// +
						'alter_bd_hover'   => '#4a4a4a',
						'alter_text'       => '#8a8a94',// +
						'alter_light'      => '#787883',// +
						'alter_dark'       => '#ffffff',// +
						'alter_link'       => '#e85b59',// +
						'alter_hover'      => '#ffffff',// +
						'alter_link2'      => '#2c2c39',// +
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#ffffff',// +
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#e85b59',// +
						'extra_bg_hover'   => '#30303b',// +
						'extra_bd_color'   => '#e5e5e5',// +
						'extra_bd_hover'   => '#4a4a4a',
						'extra_text'       => '#ffffff',// +
						'extra_light'      => '#787883',// +
						'extra_dark'       => '#ffffff',// +
						'extra_link'       => '#221e1f',// +
						'extra_hover'      => '#fe7259',
						'extra_link2'      => '#e85b59',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#e85b59',// +
						'extra_hover3'     => '#eec432',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#30303b',// +
						'input_bg_hover'   => '#292c34',// +
						'input_bd_color'   => '#2e2d32',
						'input_bd_hover'   => '#e85b59',// +
						'input_text'       => '#ffffff',// +
						'input_light'      => '#6f6f6f',
						'input_dark'       => '#ffffff',// +

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#30303b',// +
						'inverse_bd_hover' => '#cb5b47',
						'inverse_text'     => '#ffffff',// +
						'inverse_light'    => '#ffffff',
						'inverse_dark'     => '#ffffff',// +
						'inverse_link'     => '#ffffff',// +
						'inverse_hover'    => '#282626',// +
					),
				),

			)
		);

		// Simple schemes substitution
		// Lists the colors and brightness factors that are used to generate other colors in the color scheme
		// Leave this array empty if your scheme does not have a color dependency
		justitia_storage_set(
			'schemes_simple', array(
				// Main color => List the slave elements and it's brightness factors
				'text_link'   => array(
				),
				'text_hover'  => array(
				),
				'text_link2'  => array(
				),
				'text_hover2' => array(
				),
				'text_link3'  => array(
				),
				'text_hover3' => array(
				),
                'alter_link'       => array(),
                'alter_hover'      => array(),
                'alter_link2'      => array(),
                'alter_hover2'     => array(),
                'alter_link3'      => array(),
                'alter_hover3'     => array(),
                'extra_link'       => array(),
                'extra_hover'      => array(),
                'extra_link2'      => array(),
                'extra_hover2'     => array(),
                'extra_link3'      => array(),
                'extra_hover3'     => array(),
                'inverse_bd_color' => array(),
                'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		justitia_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_03'       => array(
					'color' => 'bg_color',
					'alpha' => 0.3,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_05'      => array(
					'color' => 'text_dark',
					'alpha' => 0.5,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
                'text_link_05'      => array(
                    'color' => 'text_link',
                    'alpha' => 0.8,
                ),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
                'inverse_hover_04'      => array(
					'color' => 'inverse_hover',
					'alpha' => 0.4,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		justitia_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		justitia_storage_set(
			'theme_thumbs', apply_filters(
				'justitia_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'justitia-thumb-huge'        => array(
						'size'  => array( 1280 , 641, true ),
						'title' => esc_html__( 'Huge image', 'justitia' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'justitia-thumb-big'         => array(
						'size'  => array( 803, 402, true ),
						'title' => esc_html__( 'Large image', 'justitia' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'justitia-thumb-med'         => array(
						'size'  => array( 406, 203, true ),
						'title' => esc_html__( 'Medium image', 'justitia' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'justitia-thumb-tiny'        => array(
						'size'  => array( 115, 115, true ),
						'title' => esc_html__( 'Small square avatar', 'justitia' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'justitia-thumb-masonry-big' => array(
						'size'  => array( 803, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'justitia' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'justitia-thumb-masonry'     => array(
						'size'  => array( 406, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'justitia' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
                    // Height is fixed
                    'justitia-thumb-big-vertical'         => array(
                        'size'  => array( 640, 733, true ),
                        'title' => esc_html__( 'Large vertical image', 'justitia' ),
                        'subst' => 'trx_addons-thumb-big-vertical',
                    ),
                    // Height is fixed
                    'justitia-thumb-med-vertical'         => array(
                        'size'  => array( 640, 605, true ),
                        'title' => esc_html__( 'Medium vertical image', 'justitia' ),
                        'subst' => 'trx_addons-thumb-med-vertical',
                    ),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'justitia_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'justitia_importer_set_options', 9 );
	function justitia_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = true;
			// Prepare demo data
			$options['demo_url'] = esc_url( justitia_get_protocol() . '://demofiles.themerex.net/justitia' );
			// Required plugins
			$options['required_plugins'] = array_keys( justitia_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 1;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Justitia Demo', 'justitia' );
			$options['files']['default']['domain_dev']  = esc_url( justitia_get_protocol() . '://justitia.themerex.dnw' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( justitia_get_protocol() . '://justitia.themerex.net' );       // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter
												// Banners
			$options['banners'] = array(
				array(
					'image'        => justitia_get_file_url( 'theme-specific/theme-about/images/frontpage.png' ),
					'title'        => esc_html__( 'Front Page Builder', 'justitia' ),
					'content'      => wp_kses( __( "Create your front page right in the WordPress Customizer. There's no need in any page builder. Simply enable/disable sections, fill them out with content, and customize to your liking.", 'justitia' ), 'justitia_kses_content' ),
					'link_url'     => esc_url( '//www.youtube.com/watch?v=VT0AUbMl_KA' ),
					'link_caption' => esc_html__( 'Watch Video Introduction', 'justitia' ),
					'duration'     => 20,
				),
				array(
					'image'        => justitia_get_file_url( 'theme-specific/theme-about/images/layouts.png' ),
					'title'        => esc_html__( 'Layouts Builder', 'justitia' ),
					'content'      => wp_kses( __( 'Use Layouts Builder to create and customize header and footer styles for your website. With a flexible page builder interface and custom shortcodes, you can create as many header and footer layouts as you want with ease.', 'justitia' ), 'justitia_kses_content' ),
					'link_url'     => esc_url( '//www.youtube.com/watch?v=pYhdFVLd7y4' ),
					'link_caption' => esc_html__( 'Learn More', 'justitia' ),
					'duration'     => 20,
				),
				array(
					'image'        => justitia_get_file_url( 'theme-specific/theme-about/images/documentation.png' ),
					'title'        => esc_html__( 'Read Full Documentation', 'justitia' ),
					'content'      => wp_kses( __( 'Need more details? Please check our full online documentation for detailed information on how to use Justitia.', 'justitia' ), 'justitia_kses_content' ),
					'link_url'     => esc_url( justitia_storage_get( 'theme_doc_url' ) ),
					'link_caption' => esc_html__( 'Online Documentation', 'justitia' ),
					'duration'     => 15,
				),
				array(
					'image'        => justitia_get_file_url( 'theme-specific/theme-about/images/video-tutorials.png' ),
					'title'        => esc_html__( 'Video Tutorials', 'justitia' ),
					'content'      => wp_kses( __( 'No time for reading documentation? Check out our video tutorials and learn how to customize Justitia in detail.', 'justitia' ), 'justitia_kses_content' ),
					'link_url'     => esc_url( justitia_storage_get( 'theme_video_url' ) ),
					'link_caption' => esc_html__( 'Video Tutorials', 'justitia' ),
					'duration'     => 15,
				),
				array(
					'image'        => justitia_get_file_url( 'theme-specific/theme-about/images/studio.png' ),
					'title'        => esc_html__( 'Website Customization', 'justitia' ),
					'content'      => wp_kses( __( "Need a website fast? Order our custom service, and we'll build a website based on this theme for a very fair price. We can also implement additional functionality such as website translation, setting up WPML, and much more.", 'justitia' ), 'justitia_kses_content' ),
					'link_url'     => esc_url( '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash' ),
					'link_caption' => esc_html__( 'Contact Us', 'justitia' ),
					'duration'     => 25,
				),
			);
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'justitia_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'justitia_ocdi_set_options', 9 );
	function justitia_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( justitia_get_protocol() . '://demofiles.themerex.net/justitia/' );
			// Required plugins
			$options['required_plugins'] = array_keys( justitia_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Justitia OCDI Demo', 'justitia' );
			$options['files']['ocdi']['domain_demo'] = esc_url( justitia_get_protocol() . '://trex3.dev.themerex.net' );
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'justitia_create_theme_options' ) ) {

	function justitia_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = __( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'justitia' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( justitia_storage_get( 'schemes' ) ) < 2;

		justitia_storage_set(
			'options', array(

				// 'Logo & Site Identity'
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'justitia' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'justitia' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'justitia' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'justitia' ) ),
					'class'    => 'justitia_column-1_2 justitia_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'justitia' ),
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'justitia' ) ),
					'class'    => 'justitia_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Zoom the logo. 1 - original size. Maximum size of logo depends on the actual size of the picture', 'justitia' ) ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'justitia' ) ),
					'class'      => 'justitia_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'justitia' ) ),
					'class' => 'justitia_column-1_2 justitia_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'justitia' ) ),
					'class'      => 'justitia_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'justitia' ) ),
					'class' => 'justitia_column-1_2 justitia_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'justitia' ) ),
					'class'      => 'justitia_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_side'                     => array(
					'title' => esc_html__( 'Logo for the side menu', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu', 'justitia' ) ),
					'class' => 'justitia_column-1_2 justitia_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_side_retina'              => array(
					'title'      => esc_html__( 'Logo for the side menu on Retina', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'justitia' ) ),
					'class'      => 'justitia_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'image',
				),

				// 'General settings'
				'general'                       => array(
					'title'    => esc_html__( 'General Settings', 'justitia' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'justitia' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'justitia' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'qsetup'   => esc_html__( 'General', 'justitia' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => justitia_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'justitia' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1280,
					'min'        => 1000,
					'max'        => 1520,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',         // SASS variable's name to preview changes 'on fly'
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'justitia' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'justitia' ),
										'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'justitia' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,post,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'justitia' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'justitia' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'justitia' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'justitia' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'justitia' ) ),
					'std'        => 406,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'justitia' ) ),
					'std'        => 70,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'justitia' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_widgets_info'          => array(
					'title' => esc_html__( 'Additional widgets', 'justitia' ),
					'desc'  => '',
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page'            => array(
					'title'    => esc_html__( 'Widgets at the top of the page', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'justitia' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page'            => array(
					'title'    => esc_html__( 'Widgets at the bottom of the page', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'justitia' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'justitia' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'justitia' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'justitia' ),
					'desc'  => '',
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'justitia' ) ),
					'std'   => 0,
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
                'privacy_text' => array(
                    "title" => esc_html__("Text with Privacy Policy link", 'justitia'),
                    "desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'justitia') ),
                    "std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'justitia'), 'justitia_kses_content' ),
                    "type"  => "text"
                ),
                'general_side_info'             => array(
                    'title' => esc_html__( 'Side Info', 'justitia' ),
                    'desc'  => '',
                    'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
                ),
                'add_padding'                     => array(
                    'title'    => esc_html__( 'Add paddings', 'justitia' ),
                    'desc'     => wp_kses_data( __( 'Add padding to the sides of the page', 'justitia' ) ),
                    'override' => array(
                        'mode'    => 'page',
                        'section' => esc_html__( 'Content', 'justitia' ),
                    ),
                    'refresh'  => false,
                    'std'      => 0,
                    'type'     => 'checkbox',
                ),
                'show_side'                     => array(
                    'title'    => esc_html__( 'Show side info', 'justitia' ),
                    'desc'     => wp_kses_data( __( 'Show side info on page', 'justitia' ) ),
                    'override' => array(
                        'mode'    => 'page',
                        'section' => esc_html__( 'Content', 'justitia' ),
                    ),
                    'refresh'  => false,
                    'std'      => 0,
                    'type'     => 'checkbox',
                ),
                'socials_in_side'               => array(
                    'title'      => esc_html__( 'Socials in left side section', 'justitia' ),
                    'desc'       => wp_kses_data( __( 'Show socials to the left of pages body ', 'justitia' ) ),
                    'std'        => 0,
                    'override'   => array(
                        'mode'    => 'page',
                        'section' => esc_html__( 'Content', 'justitia' ),
                    ),
                    'dependency' => array(
                        'show_side' => array( 1 ),
                    ),
                    'type'       => 'checkbox',
                ),
                'link_in_side'                  => array(
                    'title'      => esc_html__( 'Icon for link in right side section (if not empty)', 'justitia' ),
                    'desc'       => wp_kses_data( __( 'Show Link to the right of pages body ', 'justitia' ) ),
                    'std'        => '',
                    'override'   => array(
                        'mode'    => 'page',
                        'section' => esc_html__( 'Content', 'justitia' ),
                    ),
                    'dependency' => array(
                        'show_side' => array( 1 ),
                    ),
                    'type'       => 'image',
                ),
                'url_link_in_side'              => array(
                    'title'      => esc_html__( 'Url link in right side section (if not empty)', 'justitia' ),
                    'desc'       => wp_kses_data( __( 'Input url link to the right of page\'s body ', 'justitia' ) ),
                    'std'        => '',
                    'override'   => array(
                        'mode'    => 'page',
                        'section' => esc_html__( 'Content', 'justitia' ),
                    ),
                    'dependency' => array(
                        'show_side' => array( 1 ),
                    ),
                    'type'       => 'text',
                ),

				// 'Header'
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'justitia' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'justitia' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'std'      => 'default',
					'options'  => justitia_get_list_header_footer_types(),
					'type'     => JUSTITIA_THEME_FREE || ! justitia_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'justitia' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'justitia' ), 'justitia_kses_content' ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => JUSTITIA_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight'             => array(
					'title'    => esc_html__( 'Header fullheight', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'std'      => 0,
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header zoom', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'justitia' ) ),
					'std'     => 1,
					'min'     => 0.3,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'slider',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_widgets_info'           => array(
					'title' => esc_html__( 'Header widgets', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Here you can place a widget slider, advertising banners, etc.', 'justitia' ) ),
					'type'  => 'info',
				),
				'header_widgets'                => array(
					'title'    => esc_html__( 'Header widgets', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select set of widgets to show in the header on each page', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
						'desc'    => wp_kses_data( __( 'Select set of widgets to show in the header on this page', 'justitia' ) ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => 'select',
				),
				'header_columns'                => array(
					'title'      => esc_html__( 'Header columns', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'dependency' => array(
						'header_type'    => array( 'default' ),
						'header_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => justitia_get_list_range( 0, 6 ),
					'type'       => 'select',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'justitia' ) ),
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'justitia' ),
						'left'  => esc_html__( 'Left', 'justitia' ),
						'right' => esc_html__( 'Right', 'justitia' ),
					),
					'type'     => JUSTITIA_THEME_FREE || ! justitia_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'justitia' ) ),
					'std'   => 1,
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'justitia' ),
					'desc'  => '',
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'justitia' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'justitia' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'std'      => 0,
					'type'     => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'justitia' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'justitia' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'justitia' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'justitia' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'justitia' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'justitia' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'justitia' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'justitia' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),

				// 'Footer'
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'justitia' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'justitia' ),
					),
					'std'      => 'default',
					'options'  => justitia_get_list_header_footer_types(),
					'type'     => JUSTITIA_THEME_FREE || ! justitia_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'justitia' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'justitia' ), 'justitia_kses_content' ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'justitia' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => JUSTITIA_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'justitia' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'justitia' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => justitia_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'justitia' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'justitia' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'justitia' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'justitia' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'justitia' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! justitia_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'justitia' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by ThemeREX. All rights reserved.', 'justitia' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),

				// 'Blog'
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'justitia' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),

				// Blog - Posts page
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'justitia' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'justitia' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'justitia' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'justitia' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'justitia' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'justitia' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'justitia' ),
						'fullpost' => esc_html__( 'Full post', 'justitia' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'justitia' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 37,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'justitia' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'justitia' ) ),
					'std'     => 2,
					'options' => justitia_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'justitia' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'justitia' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'justitia' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'justitia' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'justitia' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'justitia' ),
					'type'    => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'justitia' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'justitia' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'justitia' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_widgets_info'             => array(
					'title' => esc_html__( 'Additional widgets', 'justitia' ),
					'desc'  => '',
					'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'justitia' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content_blog'    => array(
					'title'   => esc_html__( 'Widgets above the content', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'justitia' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content_blog'    => array(
					'title'   => esc_html__( 'Widgets below the content', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'justitia' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'justitia' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'justitia' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'justitia' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'justitia' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'justitia' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'justitia' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'justitia' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'justitia' ),
						'columns' => esc_html__( 'Mini-cards', 'justitia' ),
					),
					'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'justitia' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'justitia' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=0|date=1|counters=1|author=0|share=0|edit=0',
					'options'    => justitia_get_list_meta_parts(),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters'                      => array(
					'title'      => esc_html__( 'Post counters', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if ThemeREX Addons is active', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=0|likes=0|comments=1',
					'options'    => justitia_get_list_counters(),
					'type'       => JUSTITIA_THEME_FREE || ! justitia_exists_trx_addons() ? 'hidden' : 'checklist',
				),

				// Blog - Single posts
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'justitia' ) ),
					'type'  => 'section',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'justitia' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'justitia' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'justitia' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'fullwidth'   => esc_html__( 'Fullwidth', 'justitia' ),
						'boxed'       => esc_html__( 'Boxed', 'justitia' ),
						'default'     => esc_html__( 'Default', 'justitia' ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'justitia' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 0 ),
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'justitia' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'justitia' ),
						'on_thumb'   => esc_html__( 'On the post thumbnail', 'justitia' ),
						'default'    => esc_html__( 'Default', 'justitia' ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'justitia' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'justitia'),
						'tl' => esc_html__('Top Left', 'justitia'),
						'tc' => esc_html__('Top Center', 'justitia'),
						'tr' => esc_html__('Top Right', 'justitia'),
						'ml' => esc_html__('Middle Left', 'justitia'),
						'mc' => esc_html__('Middle Center', 'justitia'),
						'mr' => esc_html__('Middle Right', 'justitia'),
						'bl' => esc_html__('Bottom Left', 'justitia'),
						'bc' => esc_html__('Bottom Center', 'justitia'),
						'br' => esc_html__('Bottom Right', 'justitia'),
						'bs' => esc_html__('Bottom Stick Out', 'justitia'),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'hide_sidebar_on_single'        => array(
					'title' => esc_html__( 'Hide sidebar on the single post', 'justitia' ),
					'desc'  => wp_kses_data( __( "Hide sidebar on the single post's pages", 'justitia' ) ),
					'std'   => 0,
					'type'  => 'checkbox',
				),
				'show_post_excerpt'              => array(
					'title' => esc_html__( 'Show post excerpt', 'justitia' ),
					'desc'  => wp_kses_data( __( "Display post excerpt under post title.", 'justitia' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 0 ),
					),
					'std'   => 0,
					'type'  => 'checkbox',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'justitia' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'justitia' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_post'               => array(
					'title'      => esc_html__( 'Post meta', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'justitia' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'justitia' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=0|date=1|counters=1|author=0|share=0|edit=0',
					'options'    => justitia_get_list_meta_parts(),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters_post'                 => array(
					'title'      => esc_html__( 'Post counters', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if plugin ThemeREX Addons is active', 'justitia' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=0|likes=0|comments=1',
					'options'    => justitia_get_list_counters(),
					'type'       => JUSTITIA_THEME_FREE || ! justitia_exists_trx_addons() ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'justitia' ) ),
					'std'   => 1,
					'type'  => ! justitia_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'justitia' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'justitia' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'justitia' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'justitia' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'justitia' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'justitia' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'justitia' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => justitia_get_list_range( 1, 9 ),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'justitia' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page (from 2 to 4)?', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => justitia_get_list_range( 1, 4 ),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => justitia_get_list_styles( 1, 3 ),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'justitia'),
						'side'    => esc_html__('Side', 'justitia'),
						'outside' => esc_html__('Outside', 'justitia'),
						'top'     => esc_html__('Top', 'justitia'),
						'bottom'  => esc_html__('Bottom', 'justitia')
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'justitia'),
						'bottom'  => esc_html__('Bottom', 'justitia')
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'text',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'justitia' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'below_content' => esc_html__( 'After content', 'justitia' ),
						'below_page'    => esc_html__( 'After content & sidebar', 'justitia' ),
					),
					'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
				),
				'posts_banners_info'      => array(
					'title' => esc_html__( 'Posts banners', 'justitia' ),
					'desc'  => '',
					'type'  => 'hidden',
				),
				'header_banner_link'     => array(
					'title' => esc_html__( 'Header banner link', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'   => '',
					'type'  => 'hidden',
				),
				'header_banner_img'     => array(
					'title' => esc_html__( 'Header banner image', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'type'       => 'hidden',
				),
				'header_banner_code'     => array(
					'title'      => esc_html__( 'Header banner code', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'hidden',
				),
				'footer_banner_link'     => array(
					'title' => esc_html__( 'Footer banner link', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'   => '',
					'type'  => 'hidden',
				),
				'footer_banner_img'     => array(
					'title' => esc_html__( 'Footer banner image', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'type'       => 'hidden',
				),
				'footer_banner_code'     => array(
					'title'      => esc_html__( 'Footer banner code', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'hidden',
				),
				'sidebar_banner_link'     => array(
					'title' => esc_html__( 'Sidebar banner link', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'   => '',
					'type'  => 'hidden',
				),
				'sidebar_banner_img'     => array(
					'title' => esc_html__( 'Sidebar banner image', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'type'       => 'hidden',
				),
				'sidebar_banner_code'     => array(
					'title'      => esc_html__( 'Sidebar banner code', 'justitia' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'hidden',
				),
				'background_banner_link'     => array(
					'title' => esc_html__( "Post's background banner link", 'justitia' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'   => '',
					'type'  => 'hidden',
				),
				'background_banner_img'     => array(
					'title' => esc_html__( "Post's background banner image", 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'type'       => 'hidden',
				),
				'background_banner_code'     => array(
					'title'      => esc_html__( "Post's background banner code", 'justitia' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'justitia' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'justitia' ),
					),
					'std'        => '',
					'allow_html' => true,
					'type'       => 'hidden',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),

				// 'Colors'
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'justitia' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'justitia' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'justitia' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'justitia' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'justitia' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'justitia' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'justitia' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'justitia' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'justitia' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes || JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'justitia' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'justitia' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'justitia' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'justitia' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'justitia' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'justitia' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'justitia' ),
					'desc'        => '',
					'std'         => '$justitia_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);

		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'justitia' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'justitia' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'justitia' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'justitia' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'justitia' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'justitia' ) ),
				'class'   => 'justitia_column-1_3 justitia_new_row',
				'refresh' => false,
				'std'     => '$justitia_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= justitia_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( justitia_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'justitia' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'justitia' ),
				'desc'    => '',
				'class'   => 'justitia_column-1_3 justitia_new_row',
				'refresh' => false,
				'std'     => '$justitia_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'justitia' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'justitia' ) )
							: '',
				'class'   => 'justitia_column-1_3',
				'refresh' => false,
				'std'     => '$justitia_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'justitia' ),
					'serif'      => esc_html__( 'serif', 'justitia' ),
					'sans-serif' => esc_html__( 'sans-serif', 'justitia' ),
					'monospace'  => esc_html__( 'monospace', 'justitia' ),
					'cursive'    => esc_html__( 'cursive', 'justitia' ),
					'fantasy'    => esc_html__( 'fantasy', 'justitia' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'justitia' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'justitia' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'justitia' ) )
							: '',
				'class'   => 'justitia_column-1_3',
				'refresh' => false,
				'std'     => '$justitia_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = justitia_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'justitia' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses_post( sprintf( __( 'Font settings of the "%s" tag.', 'justitia' ), $tag ) ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'justitia' ),
						'100'     => esc_html__( '100 (Light)', 'justitia' ),
						'200'     => esc_html__( '200 (Light)', 'justitia' ),
						'300'     => esc_html__( '300 (Thin)', 'justitia' ),
						'400'     => esc_html__( '400 (Normal)', 'justitia' ),
						'500'     => esc_html__( '500 (Semibold)', 'justitia' ),
						'600'     => esc_html__( '600 (Semibold)', 'justitia' ),
						'700'     => esc_html__( '700 (Bold)', 'justitia' ),
						'800'     => esc_html__( '800 (Black)', 'justitia' ),
						'900'     => esc_html__( '900 (Black)', 'justitia' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'justitia' ),
						'normal'  => esc_html__( 'Normal', 'justitia' ),
						'italic'  => esc_html__( 'Italic', 'justitia' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'justitia' ),
						'none'         => esc_html__( 'None', 'justitia' ),
						'underline'    => esc_html__( 'Underline', 'justitia' ),
						'overline'     => esc_html__( 'Overline', 'justitia' ),
						'line-through' => esc_html__( 'Line-through', 'justitia' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'justitia' ),
						'none'       => esc_html__( 'None', 'justitia' ),
						'uppercase'  => esc_html__( 'Uppercase', 'justitia' ),
						'lowercase'  => esc_html__( 'Lowercase', 'justitia' ),
						'capitalize' => esc_html__( 'Capitalize', 'justitia' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'justitia_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$justitia_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		justitia_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			justitia_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'justitia' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'justitia' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is 'Theme Options'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ( isset( $_REQUEST['page'] ) && in_array( $_REQUEST['page'], array( 'theme_options', 'trx_addons_theme_panel' ) ) ) ) {
			justitia_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'justitia' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'justitia' ) ),
					'class'    => 'justitia_column-1_2 justitia_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'justitia' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'justitia_options_get_list_cpt_options' ) ) {
	function justitia_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'justitia' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'justitia' ) ),
				'std'     => 'inherit',
				'options' => justitia_get_list_header_footer_types( true ),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'justitia' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'justitia' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'justitia' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'justitia' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'justitia' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'justitia' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'justitia' ),
					1         => esc_html__( 'Yes', 'justitia' ),
					0         => esc_html__( 'No', 'justitia' ),
				),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'justitia' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select set of widgets to show in the header on the %s pages', 'justitia' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'justitia' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => esc_html__( 'Sidebar position', 'justitia' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s pages', 'justitia' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => esc_html__( 'Sidebar widgets', 'justitia' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s pages', 'justitia' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( 'left', 'right' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"hide_sidebar_on_single_{$cpt}" => array(
				'title'   => esc_html__( 'Hide sidebar on the single pages', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Hide sidebar on the single page', 'justitia' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'justitia' ),
					1         => esc_html__( 'Hide', 'justitia' ),
					0         => esc_html__( 'Show', 'justitia' ),
				),
				'type'    => 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'justitia' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'justitia' ) ),
				'std'     => 'inherit',
				'options' => justitia_get_list_header_footer_types( true ),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'justitia' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'justitia' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'justitia' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'justitia' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'justitia' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'justitia' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => justitia_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'justitia' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'justitia' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'justitia' ),
				'desc'  => '',
				'type'  => JUSTITIA_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'justitia' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_above_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets above the content', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'justitia' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets below the content', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'justitia' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'justitia' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'justitia' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => JUSTITIA_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'justitia_options_get_list_choises' ) ) {
	add_filter( 'justitia_filter_options_get_list_choises', 'justitia_options_get_list_choises', 10, 2 );
	function justitia_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = justitia_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = justitia_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = justitia_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'sidebar_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = justitia_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = justitia_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = justitia_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = justitia_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = justitia_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = justitia_array_merge( array( 0 => esc_html__( '- Select category -', 'justitia' ) ), justitia_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = justitia_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = justitia_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = justitia_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
