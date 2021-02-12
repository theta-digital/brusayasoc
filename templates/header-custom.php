<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.06
 */

$justitia_header_css   = '';
$justitia_header_image = get_header_image();
$justitia_header_video = justitia_get_header_video();
if ( ! empty( $justitia_header_image ) && justitia_trx_addons_featured_image_override( is_singular() || justitia_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$justitia_header_image = justitia_get_current_mode_image( $justitia_header_image );
}

$justitia_header_id = justitia_get_custom_header_id();
$justitia_header_meta = get_post_meta( $justitia_header_id, 'trx_addons_options', true );
if ( ! empty( $justitia_header_meta['margin'] ) ) {
	justitia_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( justitia_prepare_css_value( $justitia_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $justitia_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $justitia_header_id ) ) ); ?>
				<?php
				echo ! empty( $justitia_header_image ) || ! empty( $justitia_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'justitia_action_show_layout', $justitia_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
