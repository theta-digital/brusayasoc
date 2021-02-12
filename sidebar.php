<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

if ( justitia_sidebar_present() ) {
	ob_start();
	$justitia_sidebar_name = justitia_get_theme_option( 'sidebar_widgets' );
	justitia_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $justitia_sidebar_name ) ) {
		dynamic_sidebar( $justitia_sidebar_name );
	}
	$justitia_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $justitia_out ) ) {
		$justitia_sidebar_position = justitia_get_theme_option( 'sidebar_position' );
		?>
		<div class="sidebar widget_area
			<?php
			echo esc_attr( $justitia_sidebar_position );
			if ( ! justitia_is_inherit( justitia_get_theme_option( 'sidebar_scheme' ) ) ) {
				echo ' scheme_' . esc_attr( justitia_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
		<?php
			// Single posts banner before sidebar
			justitia_show_post_banner( 'sidebar' ); ?>
			<div class="sidebar_inner">
				<?php
				do_action( 'justitia_action_before_sidebar' );
				justitia_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $justitia_out ) );
				do_action( 'justitia_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
