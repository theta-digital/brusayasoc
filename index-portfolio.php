<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

justitia_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	justitia_blog_archive_start();

	$justitia_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$justitia_sticky_out = justitia_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $justitia_stickies ) && count( $justitia_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	// Show filters
	$justitia_cat          = justitia_get_theme_option( 'parent_cat' );
	$justitia_post_type    = justitia_get_theme_option( 'post_type' );
	$justitia_taxonomy     = justitia_get_post_type_taxonomy( $justitia_post_type );
	$justitia_show_filters = justitia_get_theme_option( 'show_filters' );
	$justitia_tabs         = array();
	if ( ! justitia_is_off( $justitia_show_filters ) ) {
		$justitia_args           = array(
			'type'         => $justitia_post_type,
			'child_of'     => $justitia_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $justitia_taxonomy,
			'pad_counts'   => false,
		);
		$justitia_portfolio_list = get_terms( $justitia_args );
		if ( is_array( $justitia_portfolio_list ) && count( $justitia_portfolio_list ) > 0 ) {
			$justitia_tabs[ $justitia_cat ] = esc_html__( 'All', 'justitia' );
			foreach ( $justitia_portfolio_list as $justitia_term ) {
				if ( isset( $justitia_term->term_id ) ) {
					$justitia_tabs[ $justitia_term->term_id ] = $justitia_term->name;
				}
			}
		}
	}
	if ( count( $justitia_tabs ) > 0 ) {
		$justitia_portfolio_filters_ajax   = true;
		$justitia_portfolio_filters_active = $justitia_cat;
		$justitia_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters justitia_tabs justitia_tabs_ajax">
			<ul class="portfolio_titles justitia_tabs_titles">
				<?php
				foreach ( $justitia_tabs as $justitia_id => $justitia_title ) {
					?>
					<li><a href="<?php echo esc_url( justitia_get_hash_link( sprintf( '#%s_%s_content', $justitia_portfolio_filters_id, $justitia_id ) ) ); ?>" data-tab="<?php echo esc_attr( $justitia_id ); ?>"><?php echo esc_html( $justitia_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$justitia_ppp = justitia_get_theme_option( 'posts_per_page' );
			if ( justitia_is_inherit( $justitia_ppp ) ) {
				$justitia_ppp = '';
			}
			foreach ( $justitia_tabs as $justitia_id => $justitia_title ) {
				$justitia_portfolio_need_content = $justitia_id == $justitia_portfolio_filters_active || ! $justitia_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $justitia_portfolio_filters_id, $justitia_id ) ); ?>"
					class="portfolio_content justitia_tabs_content"
					data-blog-template="<?php echo esc_attr( justitia_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( justitia_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $justitia_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $justitia_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $justitia_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $justitia_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $justitia_cat ); ?>"
					data-need-content="<?php echo ( false === $justitia_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $justitia_portfolio_need_content ) {
						justitia_show_portfolio_posts(
							array(
								'cat'        => $justitia_id,
								'parent_cat' => $justitia_cat,
								'taxonomy'   => $justitia_taxonomy,
								'post_type'  => $justitia_post_type,
								'page'       => 1,
								'sticky'     => $justitia_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		justitia_show_portfolio_posts(
			array(
				'cat'        => $justitia_cat,
				'parent_cat' => $justitia_cat,
				'taxonomy'   => $justitia_taxonomy,
				'post_type'  => $justitia_post_type,
				'page'       => 1,
				'sticky'     => $justitia_sticky_out,
			)
		);
	}

	justitia_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
