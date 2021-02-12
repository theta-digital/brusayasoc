<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.10
 */

// Footer sidebar
$justitia_footer_name    = justitia_get_theme_option( 'footer_widgets' );
$justitia_footer_present = ! justitia_is_off( $justitia_footer_name ) && is_active_sidebar( $justitia_footer_name );
if ( $justitia_footer_present ) {
	justitia_storage_set( 'current_sidebar', 'footer' );
	$justitia_footer_wide = justitia_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $justitia_footer_name ) ) {
		dynamic_sidebar( $justitia_footer_name );
	}
	$justitia_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $justitia_out ) ) {
		$justitia_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $justitia_out );
		$justitia_need_columns = true;   //or check: strpos($justitia_out, 'columns_wrap')===false;
		if ( $justitia_need_columns ) {
			$justitia_columns = max( 0, (int) justitia_get_theme_option( 'footer_columns' ) );
			if ( 0 == $justitia_columns ) {
				$justitia_columns = min( 4, max( 1, substr_count( $justitia_out, '<aside ' ) ) );
			}
			if ( $justitia_columns > 1 ) {
				$justitia_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $justitia_columns ) . ' widget', $justitia_out );
			} else {
				$justitia_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $justitia_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $justitia_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $justitia_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'justitia_action_before_sidebar' );
				justitia_show_layout( $justitia_out );
				do_action( 'justitia_action_after_sidebar' );
				if ( $justitia_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $justitia_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
