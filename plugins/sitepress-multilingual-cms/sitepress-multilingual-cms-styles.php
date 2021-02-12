<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'justitia_wpml_get_css' ) ) {
	add_filter( 'justitia_filter_get_css', 'justitia_wpml_get_css', 10, 2 );
	function justitia_wpml_get_css( $css, $args ) {
		return $css;
	}
}

