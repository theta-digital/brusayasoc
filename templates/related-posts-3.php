<?php
/**
 * The template 'Style 3' to displaying related posts
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_link        = get_permalink();
$justitia_post_format = get_post_format();
$justitia_post_format = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );

?><div id="post-<?php the_ID(); ?>"
	<?php post_class( 'related_item related_item_style_3 post_format_' . esc_attr( $justitia_post_format ) ); ?>>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $justitia_link ); ?>"><?php the_title(); ?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<a href="<?php echo esc_url( $justitia_link ); ?>"><span class="post_date"><span class="icon-clock"></span></span><?php echo wp_kses_data( justitia_get_date() ); ?></a>
			<?php
		}
		?>
	</div>
</div>
