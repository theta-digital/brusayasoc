<?php
/**
 * The template to display the side menu
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */
?>
<div class="menu_side_wrap
<?php
				echo ' menu_side_' . esc_attr( justitia_get_theme_option( 'menu_side_icons' ) > 0 ? 'icons' : 'dots' );
if ( ! justitia_is_inherit( justitia_get_theme_option( 'menu_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( justitia_get_theme_option( 'menu_scheme' ) );
} elseif ( ! justitia_is_inherit( justitia_get_theme_option( 'header_scheme' ) ) ) {
					echo ' scheme_' . esc_attr( justitia_get_theme_option( 'header_scheme' ) );
}
?>
				">
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
	<span class="menu_side_button icon-menu-2"></span>

	<div class="menu_side_inner">
		<?php
		// Logo
		set_query_var( 'justitia_logo_args', array( 'type' => 'side' ) );
		get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'justitia_logo_args', array() );
		// Main menu button
		?>
		<div class="toc_menu_item">
			<a href="#" class="toc_menu_description menu_mobile_description"><span class="toc_menu_description_title"><?php esc_html_e( 'Main menu', 'justitia' ); ?></span></a>
			<a class="menu_mobile_button toc_menu_icon icon-menu-2" href="#"></a>
		</div>		
	</div>

</div><!-- /.menu_side_wrap -->
