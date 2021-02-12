<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

justitia_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	justitia_blog_archive_start();

	?><div class="posts_container">
		<?php

		$justitia_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
		$justitia_sticky_out = justitia_get_theme_option( 'sticky_style' ) == 'columns'
								&& is_array( $justitia_stickies ) && count( $justitia_stickies ) > 0 && get_query_var( 'paged' ) < 1;
		if ( $justitia_sticky_out ) {
			?>
			<div class="sticky_wrap columns_wrap">
			<?php
		}
		while ( have_posts() ) {
			the_post();
			if ( $justitia_sticky_out && ! is_sticky() ) {
				$justitia_sticky_out = false;
				?>
				</div>
				<?php
			}
			$justitia_part = $justitia_sticky_out && is_sticky() ? 'sticky' : 'excerpt';
			get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', $justitia_part ), $justitia_part );
		}
		if ( $justitia_sticky_out ) {
			$justitia_sticky_out = false;
			?>
			</div>
			<?php
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
