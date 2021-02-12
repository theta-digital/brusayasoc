<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( justitia_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
<?php wp_body_open(); ?>

	<?php do_action( 'justitia_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$justitia_header_type = justitia_get_theme_option( 'header_type' );
			if ( 'custom' == $justitia_header_type && ! justitia_is_layouts_available() ) {
				$justitia_header_type = 'default';
			}
			get_template_part( apply_filters( 'justitia_filter_get_template_part', "templates/header-{$justitia_header_type}" ) );

			// Side menu
			if ( in_array( justitia_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'justitia_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			justitia_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) ) {

					justitia_show_post_banner( 'background' );

					$justitia_post_thumbnail_type  = justitia_get_theme_option( 'post_thumbnail_type' );
					$justitia_post_header_position = justitia_get_theme_option( 'post_header_position' );
					$justitia_post_header_align    = justitia_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $justitia_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $justitia_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $justitia_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $justitia_post_header_position ) {
								justitia_show_post_title_and_meta();
							}

							// Featured image
							justitia_show_post_featured_image();

							// Post title and meta
							if ( in_array( $justitia_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								justitia_show_post_title_and_meta();
							}

							if ( 'boxed' === $justitia_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
				}

				if ( 'fullscreen' != justitia_get_theme_option( 'body_style' ) ) {
					?>
					<div class="content_wrap">
						<?php
				}

				// Widgets area above page content
				justitia_create_widgets_area( 'widgets_above_page' );
				?>

				<div class="content">
					<?php
					// Widgets area inside page content
					justitia_create_widgets_area( 'widgets_above_content' );
