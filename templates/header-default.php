<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_header_css   = '';
$justitia_header_image = get_header_image();
$justitia_header_video = justitia_get_header_video();
if ( ! empty( $justitia_header_image ) && justitia_trx_addons_featured_image_override( is_singular() || justitia_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$justitia_header_image = justitia_get_current_mode_image( $justitia_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $justitia_header_image ) || ! empty( $justitia_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $justitia_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $justitia_header_image ) {
		echo ' ' . esc_attr( justitia_add_inline_css_class( 'background-image: url(' . esc_url( $justitia_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( justitia_is_on( justitia_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight justitia-full-height';
	}
	if ( ! justitia_is_inherit( justitia_get_theme_option( 'header_scheme' ) ) ) {
		echo ' scheme_' . esc_attr( justitia_get_theme_option( 'header_scheme' ) );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $justitia_header_video ) ) {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( justitia_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( justitia_is_on( justitia_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-title' ) );

	// Header widgets area
	get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-widgets' ) );

	// Display featured image in the header on the single posts
	// Comment next line to prevent show featured image in the header area
	// and display it in the post's content
	get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-single' ) );

	?>
</header>
