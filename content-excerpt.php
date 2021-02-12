<?php
/**
 * The default template to display the content
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
	if ( ! empty( $justitia_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $justitia_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $justitia_columns ); ?>">
		<?php
	}
}
$justitia_expanded    = ! justitia_sidebar_present() && justitia_is_on( justitia_get_theme_option( 'expand_content' ) );
$justitia_post_format = get_post_format();
$justitia_post_format = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );
$justitia_animation   = justitia_get_theme_option( 'blog_animation' );

?>
<article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $justitia_post_format ) ); ?>
	<?php echo ( ! justitia_is_off( $justitia_animation ) && empty( $justitia_template_args['slider'] ) ? ' data-animation="' . esc_attr( justitia_get_animation_classes( $justitia_animation ) ) . '"' : '' ); ?>
	>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"><?php esc_html_e( 'Sticky Post', 'justitia' ) ?></span>
		<?php
	}

	// Featured image
	$justitia_hover = ! empty( $justitia_template_args['hover'] ) && ! justitia_is_inherit( $justitia_template_args['hover'] )
						? $justitia_template_args['hover']
						: justitia_get_theme_option( 'image_hover' );
	justitia_show_post_featured(
		array(
			'singular'   => false,
			'no_links'   => ! empty( $justitia_template_args['no_links'] ),
			'hover'      => $justitia_hover,
			'thumb_size' => justitia_get_thumb_size( strpos( justitia_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $justitia_expanded ? 'huge' : 'big' ) ),
		)
	);

	// Title and post meta
		?>
		<div class="post_header entry-header">
			<?php

			// Post meta
			$justitia_components = justitia_array_get_keys_by_value( justitia_get_theme_option( 'meta_parts' ) );
			$justitia_counters   = justitia_array_get_keys_by_value( justitia_get_theme_option( 'counters' ) );

			if ( ! empty( $justitia_components ) && ! in_array( $justitia_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				justitia_show_post_meta(
					apply_filters(
						'justitia_filter_post_meta_args', array(
							'components' => $justitia_components,
							'counters'   => $justitia_counters,
							'seo'        => false,
						), 'excerpt', 1
					)
				);
			}

			do_action( 'justitia_action_before_post_title' );
			if ( get_the_title() != '' ) {
			// Post title
			if ( empty( $justitia_template_args['no_links'] ) ) {
				the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} else {
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			}
			}
			do_action( 'justitia_action_before_post_meta' );

			?>
		</div><!-- .post_header -->
		<?php


	// Post content
	if ( empty( $justitia_template_args['hide_excerpt'] ) ) {

		?>
		<div class="post_content entry-content">
		<?php
		if ( justitia_get_theme_option( 'blog_content' ) == 'fullpost' ) {
			// Post content area
			?>
				<div class="post_content_inner">
				<?php
				the_content( '' );
				?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'justitia' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'justitia' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
		} else {
			// Post content area
			?>
				<div class="post_content_inner">
				<?php
				if ( has_excerpt() ) {
						the_excerpt();
				} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
						the_content( '' );
				} elseif ( in_array( $justitia_post_format, array( 'link', 'aside', 'status' ) ) ) {
						the_content();
				} elseif ( 'quote' == $justitia_post_format ) {
					$quote = justitia_get_tag( get_the_content(), '<blockquote>', '</blockquote>' );
					if ( ! empty( $quote ) ) {
						justitia_show_layout( wpautop( $quote ) );
					} else {
						the_excerpt();
					}
				} elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
					the_excerpt();
				}
				?>
				</div>
				<?php
				// More button
				if ( empty( $justitia_template_args['no_links'] ) && ! in_array( $justitia_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					?>
					<p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'justitia' ); ?></a></p>
					<?php
				}
		}
		?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
	</article>
<?php

if ( is_array( $justitia_template_args ) ) {
	if ( ! empty( $justitia_template_args['slider'] ) || $justitia_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
