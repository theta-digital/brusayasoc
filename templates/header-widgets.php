<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

// Header sidebar
$justitia_header_name    = justitia_get_theme_option( 'header_widgets' );
$justitia_header_present = ! justitia_is_off( $justitia_header_name ) && is_active_sidebar( $justitia_header_name );
if ( $justitia_header_present ) {
	justitia_storage_set( 'current_sidebar', 'header' );
	$justitia_header_wide = justitia_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $justitia_header_name ) ) {
		dynamic_sidebar( $justitia_header_name );
	}
	$justitia_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $justitia_widgets_output ) ) {
		$justitia_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $justitia_widgets_output );
		$justitia_need_columns   = strpos( $justitia_widgets_output, 'columns_wrap' ) === false;
		if ( $justitia_need_columns ) {
			$justitia_columns = max( 0, (int) justitia_get_theme_option( 'header_columns' ) );
			if ( 0 == $justitia_columns ) {
				$justitia_columns = min( 6, max( 1, substr_count( $justitia_widgets_output, '<aside ' ) ) );
			}
			if ( $justitia_columns > 1 ) {
				$justitia_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $justitia_columns ) . ' widget', $justitia_widgets_output );
			} else {
				$justitia_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $justitia_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $justitia_header_wide ) {
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
				justitia_show_layout( $justitia_widgets_output );
				do_action( 'justitia_action_after_sidebar' );
				if ( $justitia_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $justitia_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
