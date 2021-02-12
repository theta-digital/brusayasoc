<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

// Page (category, tag, archive, author) title

if ( justitia_need_page_title() ) {
	justitia_sc_layouts_showed( 'title', true );
	justitia_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								justitia_show_post_meta(
									apply_filters(
										'justitia_filter_post_meta_args', array(
											'components' => justitia_array_get_keys_by_value( justitia_get_theme_option( 'meta_parts' ) ),
											'counters'   => justitia_array_get_keys_by_value( justitia_get_theme_option( 'counters' ) ),
											'seo'        => justitia_is_on( justitia_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$justitia_blog_title           = justitia_get_blog_title();
							$justitia_blog_title_text      = '';
							$justitia_blog_title_class     = '';
							$justitia_blog_title_link      = '';
							$justitia_blog_title_link_text = '';
							if ( is_array( $justitia_blog_title ) ) {
								$justitia_blog_title_text      = $justitia_blog_title['text'];
								$justitia_blog_title_class     = ! empty( $justitia_blog_title['class'] ) ? ' ' . $justitia_blog_title['class'] : '';
								$justitia_blog_title_link      = ! empty( $justitia_blog_title['link'] ) ? $justitia_blog_title['link'] : '';
								$justitia_blog_title_link_text = ! empty( $justitia_blog_title['link_text'] ) ? $justitia_blog_title['link_text'] : '';
							} else {
								$justitia_blog_title_text = $justitia_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $justitia_blog_title_class ); ?>">
								<?php
								$justitia_top_icon = justitia_get_category_icon();
								if ( ! empty( $justitia_top_icon ) ) {
									$justitia_attr = justitia_getimagesize( $justitia_top_icon );
									?>
									<img src="<?php echo esc_url( $justitia_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'justitia' ); ?>"
										<?php
										if ( ! empty( $justitia_attr[3] ) ) {
											justitia_show_layout( $justitia_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_post( $justitia_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $justitia_blog_title_link ) && ! empty( $justitia_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $justitia_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $justitia_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'justitia_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
