<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! justitia_is_inherit( justitia_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( justitia_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$justitia_copyright = justitia_get_theme_option( 'copyright' );
			if ( ! empty( $justitia_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$justitia_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $justitia_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$justitia_copyright = justitia_prepare_macros( $justitia_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $justitia_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
