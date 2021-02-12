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
<div class="justitia_admin_notice justitia_rate_notice update-nag">
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
	<h3 class="justitia_notice_title"><a href="<?php echo esc_url( justitia_storage_get( 'theme_download_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'justitia' ),
				$justitia_theme_obj->name . ( JUSTITIA_THEME_FREE ? ' ' . esc_html__( 'Free', 'justitia' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="justitia_notice_text">
		<p><?php echo wp_kses_data( __( 'We are glad you chose our WP theme for your website. You’ve done well customizing your website and we hope that you’ve enjoyed working with our theme.', 'justitia' ) ); ?></p>
		<p><?php echo wp_kses_data( __( 'It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you’ve received from us.', 'justitia' ) ); ?></p>
		<p class="justitia_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'justitia' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="justitia_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( justitia_storage_get( 'theme_download_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'justitia' ), $justitia_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( justitia_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'justitia' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( justitia_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'justitia' );
			?>
		</a>
		<?php
		// Dismiss
		?>
		<a href="#" class="justitia_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="justitia_hide_notice_text"><?php esc_html_e( 'Dismiss', 'justitia' ); ?></span></a>
	</div>
</div>
