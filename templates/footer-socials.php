<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.10
 */


// Socials
if ( justitia_is_on( justitia_get_theme_option( 'socials_in_footer' ) ) ) {
	$justitia_output = justitia_get_socials_links();
	if ( '' != $justitia_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php justitia_show_layout( $justitia_output ); ?>
			</div>
		</div>
		<?php
	}
}
