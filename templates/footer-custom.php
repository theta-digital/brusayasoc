<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.10
 */

$justitia_footer_id = justitia_get_custom_footer_id();
$justitia_footer_meta = get_post_meta( $justitia_footer_id, 'trx_addons_options', true );
if ( ! empty( $justitia_footer_meta['margin'] ) ) {
	justitia_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( justitia_prepare_css_value( $justitia_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $justitia_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $justitia_footer_id ) ) ); ?>
						<?php
						if ( ! justitia_is_inherit( justitia_get_theme_option( 'footer_scheme' ) ) ) {
							echo ' scheme_' . esc_attr( justitia_get_theme_option( 'footer_scheme' ) );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'justitia_action_show_layout', $justitia_footer_id );
	?>
</footer><!-- /.footer_wrap -->
