<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_args = get_query_var( 'justitia_logo_args' );

// Site logo
$justitia_logo_type   = isset( $justitia_args['type'] ) ? $justitia_args['type'] : '';
$justitia_logo_image  = justitia_get_logo_image( $justitia_logo_type );
$justitia_logo_text   = justitia_is_on( justitia_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$justitia_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $justitia_logo_image ) || ! empty( $justitia_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $justitia_logo_image ) ) {
			if ( empty( $justitia_logo_type ) && function_exists( 'the_custom_logo' ) && (int) $justitia_logo_image > 0 ) {
				the_custom_logo();
			} else {
				$justitia_attr = justitia_getimagesize( $justitia_logo_image );
				echo '<img src="' . esc_url( $justitia_logo_image ) . '" alt="' . esc_attr( $justitia_logo_text ) . '"' . ( ! empty( $justitia_attr[3] ) ? ' ' . wp_kses_data( $justitia_attr[3] ) : '' ) . '>';
			}
		} else {
			justitia_show_layout( justitia_prepare_macros( $justitia_logo_text ), '<span class="logo_text">', '</span>' );
			justitia_show_layout( justitia_prepare_macros( $justitia_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
