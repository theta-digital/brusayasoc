<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.50
 */

$justitia_template_args = get_query_var( 'justitia_template_args' );
if ( is_array( $justitia_template_args ) ) {
	$justitia_columns    = empty( $justitia_template_args['columns'] ) ? 2 : max( 1, $justitia_template_args['columns'] );
	$justitia_blog_style = array( $justitia_template_args['type'], $justitia_columns );
} else {
	$justitia_blog_style = explode( '_', justitia_get_theme_option( 'blog_style' ) );
	$justitia_columns    = empty( $justitia_blog_style[1] ) ? 2 : max( 1, $justitia_blog_style[1] );
}
$justitia_blog_id       = justitia_get_custom_blog_id( join( '_', $justitia_blog_style ) );
$justitia_blog_style[0] = str_replace( 'blog-custom-', '', $justitia_blog_style[0] );
$justitia_expanded      = ! justitia_sidebar_present() && justitia_is_on( justitia_get_theme_option( 'expand_content' ) );
$justitia_animation     = justitia_get_theme_option( 'blog_animation' );
$justitia_components    = justitia_array_get_keys_by_value( justitia_get_theme_option( 'meta_parts' ) );
$justitia_counters      = justitia_array_get_keys_by_value( justitia_get_theme_option( 'counters' ) );

$justitia_post_format   = get_post_format();
$justitia_post_format   = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );

$justitia_blog_meta     = justitia_get_custom_layout_meta( $justitia_blog_id );
$justitia_custom_style  = ! empty( $justitia_blog_meta['scripts_required'] ) ? $justitia_blog_meta['scripts_required'] : 'none';

if ( ! empty( $justitia_template_args['slider'] ) || $justitia_columns > 1 || ! justitia_is_off( $justitia_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $justitia_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( justitia_is_off( $justitia_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $justitia_custom_style ) ) . '-1_' . esc_attr( $justitia_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" 
<?php
	post_class(
			'post_item post_format_' . esc_attr( $justitia_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $justitia_columns )
					. ' post_layout_' . esc_attr( $justitia_blog_style[0] )
					. ' post_layout_' . esc_attr( $justitia_blog_style[0] ) . '_' . esc_attr( $justitia_columns )
					. ( ! justitia_is_off( $justitia_custom_style )
						? ' post_layout_' . esc_attr( $justitia_custom_style )
							. ' post_layout_' . esc_attr( $justitia_custom_style ) . '_' . esc_attr( $justitia_columns )
						: ''
						)
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
	// Custom header's layout
	do_action( 'justitia_action_show_layout', $justitia_blog_id );
	?>
</article><?php
if ( ! empty( $justitia_template_args['slider'] ) || $justitia_columns > 1 || ! justitia_is_off( $justitia_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
