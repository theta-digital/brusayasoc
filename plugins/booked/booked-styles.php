<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'justitia_booked_get_css' ) ) {
	add_filter( 'justitia_filter_get_css', 'justitia_booked_get_css', 10, 2 );
	function justitia_booked_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

CSS;
		}

		return $css;
	}
}

