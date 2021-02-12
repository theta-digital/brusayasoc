<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_columns     = max( 1, min( 3, count( get_option( 'sticky_posts' ) ) ) );
$justitia_post_format = get_post_format();
$justitia_post_format = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );
$justitia_animation   = justitia_get_theme_option( 'blog_animation' );

?><div class="column-1_<?php echo esc_attr( $justitia_columns ); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_' . esc_attr( $justitia_post_format ) ); ?>
	<?php echo ( ! justitia_is_off( $justitia_animation ) ? ' data-animation="' . esc_attr( justitia_get_animation_classes( $justitia_animation ) ) . '"' : '' ); ?>
	>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	justitia_show_post_featured(
		array(
			'thumb_size' => justitia_get_thumb_size( 1 == $justitia_columns ? 'big' : ( 2 == $justitia_columns ? 'med' : 'avatar' ) ),
		)
	);

	if ( ! in_array( $justitia_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			justitia_show_post_meta( apply_filters( 'justitia_filter_post_meta_args', array(), 'sticky', $justitia_columns ) );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div><?php

// div.column-1_X is a inline-block and new lines and spaces after it are forbidden
