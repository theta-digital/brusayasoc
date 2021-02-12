<?php
/**
 * The Gallery template to display posts
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
$justitia_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item'
		. ' post_layout_portfolio'
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $justitia_columns )
		. ' post_format_' . esc_attr( $justitia_post_format )
		. ( ! empty( $justitia_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
	);
	echo ( ! justitia_is_off( $justitia_animation ) && empty( $justitia_template_args['slider'] ) ? ' data-animation="' . esc_attr( justitia_get_animation_classes( $justitia_animation ) ) . '"' : '' );
	?>
	data-size="
		<?php
		if ( ! empty( $justitia_image[1] ) && ! empty( $justitia_image[2] ) ) {
			echo intval( $justitia_image[1] ) . 'x' . intval( $justitia_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $justitia_image[0] ) ) {
			echo esc_url( $justitia_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$justitia_image_hover = 'icon';  if ( in_array( $justitia_image_hover, array( 'icons', 'zoom' ) ) ) {
	$justitia_image_hover = 'dots';
}
$justitia_components = justitia_array_get_keys_by_value( justitia_get_theme_option( 'meta_parts' ) );
$justitia_counters   = justitia_array_get_keys_by_value( justitia_get_theme_option( 'counters' ) );
justitia_show_post_featured(
	array(
		'hover'         => $justitia_image_hover,
		'singular'      => false,
		'no_links'      => ! empty( $justitia_template_args['no_links'] ),
		'thumb_size'    => justitia_get_thumb_size( strpos( justitia_get_theme_option( 'body_style' ), 'full' ) !== false || $justitia_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $justitia_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $justitia_components )
								? justitia_show_post_meta(
									apply_filters(
										'justitia_filter_post_meta_args', array(
											'components' => $justitia_components,
											'counters' => $justitia_counters,
											'seo'      => false,
											'echo'     => false,
										), $justitia_blog_style[0], $justitia_columns
									)
								)
								: ''
								)
							. ( empty( $justitia_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $justitia_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'justitia' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
