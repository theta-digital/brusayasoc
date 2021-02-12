<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

						// Widgets area inside page content
						justitia_create_widgets_area( 'widgets_below_content' );
						?>
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					$justitia_body_style = justitia_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $justitia_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}

					// Widgets area below page content and related posts below page content
					$justitia_widgets_name = justitia_get_theme_option( 'widgets_below_page' );
					$justitia_show_widgets = ! justitia_is_off( $justitia_widgets_name ) && is_active_sidebar( $justitia_widgets_name );
					$justitia_show_related = is_single() && justitia_get_theme_option( 'related_position' ) == 'below_page';
					if ( $justitia_show_widgets || $justitia_show_related ) {
						if ( 'fullscreen' != $justitia_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $justitia_show_related ) {
							do_action( 'justitia_action_related_posts' );
						}

						// Widgets area below page content
						if ( $justitia_show_widgets ) {
							justitia_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $justitia_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				justitia_show_post_banner('footer');
			}
			// Footer
			$justitia_footer_type = justitia_get_theme_option( 'footer_type' );
			if ( 'custom' == $justitia_footer_type && ! justitia_is_layouts_available() ) {
				$justitia_footer_type = 'default';
			}
			get_template_part( apply_filters( 'justitia_filter_get_template_part', "templates/footer-{$justitia_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->
<?php
if ( justitia_get_theme_option( 'show_side' ) && ( ! empty( $justitia_output_url = justitia_get_theme_option( 'url_link_in_side' ) ) && ! empty( $justitia_output_image = justitia_get_theme_option( 'link_in_side' ) ) ) ) {
    ?>
    <div class="link_section">
        <div class="link_section_in">
            <a href="<?php echo esc_url( $justitia_output_url ); ?>" class="link_side">
                <img src="<?php echo esc_attr( $justitia_output_image ); ?>" alt="<?php echo esc_html__('Side link', 'justitia'); ?>">
            </a>
        </div>
    </div>
    <?php
}
?>

<?php
if ( justitia_is_on( justitia_get_theme_option( 'socials_in_side' ) ) && ( $justitia_output_socials = justitia_get_socials_links( '', 'names icons' ) ) != '' ) {
    ?>
    <div class="soc_section">
        <div class="soc_section_in">
            <?php justitia_show_layout( $justitia_output_socials ); ?>
        </div>
    </div>
    <?php
}
?>

	<?php wp_footer(); ?>

</body>
</html>