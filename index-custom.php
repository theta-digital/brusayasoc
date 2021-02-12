<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.50
 */

justitia_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$justitia_blog_style = justitia_get_theme_option( 'blog_style' );
	$justitia_parts      = explode( '_', $justitia_blog_style );
	$justitia_columns    = ! empty( $justitia_parts[1] ) ? max( 1, min( 6, (int) $justitia_parts[1] ) ) : 1;
	$justitia_blog_id    = justitia_get_custom_blog_id( $justitia_blog_style );
	$justitia_blog_meta  = justitia_get_custom_layout_meta( $justitia_blog_id );
	if ( ! empty( $justitia_blog_meta['margin'] ) ) {
		justitia_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( justitia_prepare_css_value( $justitia_blog_meta['margin'] ) ) ) );
	}
	$justitia_custom_style = ! empty( $justitia_blog_meta['scripts_required'] ) ? $justitia_blog_meta['scripts_required'] : 'none';

	justitia_blog_archive_start();

	$justitia_classes    = 'posts_container blog_custom_wrap' 
							. ( ! justitia_is_off( $justitia_custom_style )
								? sprintf( ' %s_wrap', $justitia_custom_style )
								: ( $justitia_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
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
		$justitia_part = $justitia_sticky_out && is_sticky() ? 'sticky' : 'custom';
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
