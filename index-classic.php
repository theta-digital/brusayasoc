<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

justitia_storage_set( 'blog_archive', true );

get_header();
// Disable lazy load for masonry
if ( have_posts() ) {

	$justitia_classes    = 'posts_container '
						. ( substr( justitia_get_theme_option( 'blog_style' ), 0, 7 ) == 'classic'
							? 'columns_wrap columns_padding_bottom'
							: 'masonry_wrap'
							);
	$justitia_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$justitia_sticky_out = justitia_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $justitia_stickies ) && count( $justitia_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $justitia_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $justitia_sticky_out ) {
		if ( justitia_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( justitia_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}

		?>
		<div class="<?php echo esc_attr( $justitia_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $justitia_sticky_out && ! is_sticky() ) {
			$justitia_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $justitia_classes ); ?>">
			<?php
		}
		$justitia_part = $justitia_sticky_out && is_sticky() ? 'sticky' : 'classic';
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', $justitia_part ), $justitia_part );
	}

	?>
	</div>
	<?php

	justitia_show_pagination();

	justitia_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
