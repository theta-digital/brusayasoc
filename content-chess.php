<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_template_args = get_query_var( 'justitia_template_args' );
if ( is_array( $justitia_template_args ) ) {
	$justitia_columns    = empty( $justitia_template_args['columns'] ) ? 1 : max( 1, min( 3, $justitia_template_args['columns'] ) );
	$justitia_blog_style = array( $justitia_template_args['type'], $justitia_columns );
} else {
	$justitia_blog_style = explode( '_', justitia_get_theme_option( 'blog_style' ) );
	$justitia_columns    = empty( $justitia_blog_style[1] ) ? 1 : max( 1, min( 3, $justitia_blog_style[1] ) );
}
$justitia_expanded    = ! justitia_sidebar_present() && justitia_is_on( justitia_get_theme_option( 'expand_content' ) );
$justitia_post_format = get_post_format();
$justitia_post_format = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );
$justitia_animation   = justitia_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $justitia_columns )
										. ' post_format_' . esc_attr( $justitia_post_format )
										. ( ! empty( $justitia_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! justitia_is_off( $justitia_animation ) && empty( $justitia_template_args['slider'] ) ? ' data-animation="' . esc_attr( justitia_get_animation_classes( $justitia_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $justitia_columns && ! is_array( $justitia_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . esc_attr( get_the_title() ) . '" icon="' . esc_attr( justitia_get_post_icon() ) . '"]' );
	}

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	$justitia_hover = ! empty( $justitia_template_args['hover'] ) && ! justitia_is_inherit( $justitia_template_args['hover'] )
						? $justitia_template_args['hover']
						: justitia_get_theme_option( 'image_hover' );
	justitia_show_post_featured(
		array(
			'class'         => 1 == $justitia_columns && ! is_array( $justitia_template_args ) ? 'justitia-full-height' : '',
			'singular'      => false,
			'hover'         => $justitia_hover,
			'no_links'      => ! empty( $justitia_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => justitia_get_thumb_size(
				strpos( justitia_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $justitia_columns ? 'huge' : 'original' )
										: ( 2 < $justitia_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php

        do_action( 'justitia_action_before_post_meta' );

        // Post meta
        $justitia_components = justitia_array_get_keys_by_value( justitia_get_theme_option( 'meta_parts' ) );
        $justitia_counters   = justitia_array_get_keys_by_value( justitia_get_theme_option( 'counters' ) );
        $justitia_post_meta  = empty( $justitia_components ) || in_array( $justitia_hover, array( 'border', 'pull', 'slide', 'fade' ) )
            ? ''
            : justitia_show_post_meta(
                apply_filters(
                    'justitia_filter_post_meta_args', array(
                    'components' => $justitia_components,
                    'counters' => $justitia_counters,
                    'seo'  => false,
                    'echo' => false,
                ), $justitia_blog_style[0], $justitia_columns
                )
            );
        justitia_show_layout( $justitia_post_meta );

			do_action( 'justitia_action_before_post_title' );

			// Post title
		if ( empty( $justitia_template_args['no_links'] ) ) {
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( '<h3 class="post_title entry-title">', '</h3>' );
		}
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
		<?php
		if ( empty( $justitia_template_args['hide_excerpt'] ) ) {
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
		}
			// Post meta
		if ( in_array( $justitia_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			justitia_show_layout( $justitia_post_meta );
		}
			// More button
		if ( empty( $justitia_template_args['no_links'] ) && ! in_array( $justitia_post_format, array( 'link', 'aside', 'status', 'quote' ) ) && $justitia_columns != 3 ) {
			?>
				<p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'justitia' ); ?></a></p>
				<?php
		}
		?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
