<div class="front_page_section front_page_section_blog<?php
	$justitia_scheme = justitia_get_theme_option( 'front_page_blog_scheme' );
	if ( ! justitia_is_inherit( $justitia_scheme ) ) {
		echo ' scheme_' . esc_attr( $justitia_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( justitia_get_theme_option( 'front_page_blog_paddings' ) );
?>"
		<?php
		$justitia_css      = '';
		$justitia_bg_image = justitia_get_theme_option( 'front_page_blog_bg_image' );
		if ( ! empty( $justitia_bg_image ) ) {
			$justitia_css .= 'background-image: url(' . esc_url( justitia_get_attachment_url( $justitia_bg_image ) ) . ');';
		}
		if ( ! empty( $justitia_css ) ) {
			echo ' style="' . esc_attr( $justitia_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$justitia_anchor_icon = justitia_get_theme_option( 'front_page_blog_anchor_icon' );
	$justitia_anchor_text = justitia_get_theme_option( 'front_page_blog_anchor_text' );
if ( ( ! empty( $justitia_anchor_icon ) || ! empty( $justitia_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_blog"'
									. ( ! empty( $justitia_anchor_icon ) ? ' icon="' . esc_attr( $justitia_anchor_icon ) . '"' : '' )
									. ( ! empty( $justitia_anchor_text ) ? ' title="' . esc_attr( $justitia_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_blog_inner
	<?php
	if ( justitia_get_theme_option( 'front_page_blog_fullheight' ) ) {
		echo ' justitia-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$justitia_css      = '';
			$justitia_bg_mask  = justitia_get_theme_option( 'front_page_blog_bg_mask' );
			$justitia_bg_color_type = justitia_get_theme_option( 'front_page_blog_bg_color_type' );
			if ( 'custom' == $justitia_bg_color_type ) {
				$justitia_bg_color = justitia_get_theme_option( 'front_page_blog_bg_color' );
			} elseif ( 'scheme_bg_color' == $justitia_bg_color_type ) {
				$justitia_bg_color = justitia_get_scheme_color( 'bg_color', $justitia_scheme );
			} else {
				$justitia_bg_color = '';
			}
			if ( ! empty( $justitia_bg_color ) && $justitia_bg_mask > 0 ) {
				$justitia_css .= 'background-color: ' . esc_attr(
					1 == $justitia_bg_mask ? $justitia_bg_color : justitia_hex2rgba( $justitia_bg_color, $justitia_bg_mask )
				) . ';';
			}
			if ( ! empty( $justitia_css ) ) {
				echo ' style="' . esc_attr( $justitia_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_blog_content_wrap content_wrap">
			<?php
			// Caption
			$justitia_caption = justitia_get_theme_option( 'front_page_blog_caption' );
			if ( ! empty( $justitia_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_blog_caption front_page_block_<?php echo ! empty( $justitia_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( $justitia_caption ); ?></h2>
				<?php
			}

			// Description (text)
			$justitia_description = justitia_get_theme_option( 'front_page_blog_description' );
			if ( ! empty( $justitia_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_blog_description front_page_block_<?php echo ! empty( $justitia_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $justitia_description ), 'justitia_kses_content' ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_blog_output">
			<?php
			if ( is_active_sidebar( 'front_page_blog_widgets' ) ) {
				dynamic_sidebar( 'front_page_blog_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! justitia_exists_trx_addons() ) {
					justitia_customizer_need_trx_addons_message();
				} else {
					justitia_customizer_need_widgets_message( 'front_page_blog_caption', 'ThemeREX Addons - Blogger' );
				}
			}
			?>
			</div>
		</div>
	</div>
</div>
