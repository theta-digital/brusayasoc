<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.1
 */

$justitia_theme_obj = wp_get_theme();
?>
<div class="justitia_admin_notice justitia_welcome_notice update-nag">
	<?php
	// Theme image
	$justitia_theme_img = justitia_get_file_url( 'screenshot.jpg' );
	if ( '' != $justitia_theme_img ) {
		?>
		<div class="justitia_notice_image"><img src="<?php echo esc_url( $justitia_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'justitia' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="justitia_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'justitia' ),
				$justitia_theme_obj->name . ( JUSTITIA_THEME_FREE ? ' ' . esc_html__( 'Free', 'justitia' ) : '' ),
				$justitia_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="justitia_notice_text">
		<p class="justitia_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $justitia_theme_obj->description ) );
			?>
		</p>
		<p class="justitia_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'justitia' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="justitia_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=justitia_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'justitia' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="justitia_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="justitia_hide_notice_text"><?php esc_html_e( 'Dismiss', 'justitia' ); ?></span></a>
	</div>
</div>
