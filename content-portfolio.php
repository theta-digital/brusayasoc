<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_template_args = get_query_var( 'justitia_template_args' );
if ( is_array( $justitia_template_args ) ) {
	$justitia_columns    = empty( $justitia_template_args['columns'] ) ? 2 : max( 1, $justitia_template_args['columns'] );
	$justitia_blog_style = array( $justitia_template_args['type'], $justitia_columns );
} else {
	$justitia_blog_style = explode( '_', justitia_get_theme_option( 'blog_style' ) );
	$justitia_columns    = empty( $justitia_blog_style[1] ) ? 2 : max( 1, $justitia_blog_style[1] );
}
$justitia_post_format = get_post_format();
$justitia_post_format = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );
$justitia_animation   = justitia_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item'
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $justitia_columns )
		. ' post_format_' . esc_attr( $justitia_post_format )
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
		. ( ! empty( $justitia_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
	);
	echo ( ! justitia_is_off( $justitia_animation ) && empty( $justitia_template_args['slider'] ) ? ' data-animation="' . esc_attr( justitia_get_animation_classes( $justitia_animation ) ) . '"' : '' );
	?>
>
<?php

// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	$justitia_image_hover = ! empty( $justitia_template_args['hover'] ) && ! justitia_is_inherit( $justitia_template_args['hover'] )
								? $justitia_template_args['hover']
								: justitia_get_theme_option( 'image_hover' );
	// Featured image
	justitia_show_post_featured(
		array(
			'singular'      => false,
			'hover'         => $justitia_image_hover,
			'no_links'      => ! empty( $justitia_template_args['no_links'] ),
			'thumb_size'    => justitia_get_thumb_size(
				strpos( justitia_get_theme_option( 'body_style' ), 'full' ) !== false || $justitia_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $justitia_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $justitia_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!