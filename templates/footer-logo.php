<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.10
 */

// Logo
if ( justitia_is_on( justitia_get_theme_option( 'logo_in_footer' ) ) ) {
	$justitia_logo_image = justitia_get_logo_image( 'footer' );
	$justitia_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $justitia_logo_image ) || ! empty( $justitia_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $justitia_logo_image ) ) {
					$justitia_attr = justitia_getimagesize( $justitia_logo_image );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $justitia_logo_image ) . '"'
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'justitia' ) . '"'
								. ( ! empty( $justitia_attr[3] ) ? ' ' . wp_kses_data( $justitia_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $justitia_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $justitia_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
