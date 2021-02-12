<?php
// Add skin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'justitia_skin_get_css' ) ) {
	add_filter( 'justitia_filter_get_css', 'justitia_skin_get_css', 10, 2 );
	function justitia_skin_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
			
			.sc_googlemap_wrap ul.trx_addons_list_custom li .subtitle {
                {$fonts['p_font-family']}
            }

            .sc_services.sc_services_numbered .sc_services_item .sc_services_item_info .sc_services_item_content ul li {
                {$fonts['h5_font-family']}
            }

CSS;
		}

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars         = $args['vars'];
			$css['vars'] .= <<<CSS

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS
			
			/* Submenu */
            .sc_layouts_menu_popup .sc_layouts_menu_nav,
            .sc_layouts_menu_nav > li ul {
                background-color: {$colors['extra_bg_color']};
            }
            .widget_nav_menu li.menu-delimiter,
            .sc_layouts_menu_nav > li li.menu-delimiter {
                border-color: {$colors['extra_bd_color']};
            }
            .sc_layouts_menu_popup .sc_layouts_menu_nav > li > a,
            .sc_layouts_menu_nav > li li > a {
                color: {$colors['inverse_text']} !important;
            }
            .sc_layouts_menu_popup .sc_layouts_menu_nav > li > a:hover,
            .sc_layouts_menu_popup .sc_layouts_menu_nav > li.sfHover > a,
            .sc_layouts_menu_nav > li li > a:hover,
            .sc_layouts_menu_nav > li li.sfHover > a {
                color: {$colors['text_dark']} !important;
            }
            .sc_layouts_menu_nav > li li > a:hover:after {
                color: {$colors['text_dark']} !important;
            }
            .sc_layouts_menu_nav li[class*="columns-"] li.menu-item-has-children > a:hover,
            .sc_layouts_menu_nav li[class*="columns-"] li.menu-item-has-children.sfHover > a {
                color: {$colors['extra_hover']} !important;
                background-color: transparent;
            }
            .sc_layouts_menu_nav > li li[class*="icon-"]:before {
                color: {$colors['extra_hover']};
            }
            .sc_layouts_menu_nav > li li[class*="icon-"]:hover:before,
            .sc_layouts_menu_nav > li li[class*="icon-"].shHover:before {
                color: {$colors['extra_hover']};
            }
            .sc_layouts_menu_nav > li li.current-menu-item > a,
            .sc_layouts_menu_nav > li li.current-menu-parent > a,
            .sc_layouts_menu_nav > li li.current-menu-ancestor > a {
                color: {$colors['text_dark']} !important;
            }
            .sc_layouts_menu_nav > li li.current-menu-item:before,
            .sc_layouts_menu_nav > li li.current-menu-parent:before,
            .sc_layouts_menu_nav > li li.current-menu-ancestor:before {
                color: {$colors['text_dark']} !important;
            }
            nav .sc_layouts_menu_nav > li > ul:before {
                border-color: {$colors['extra_bg_color']};
            }

            .sc_services_light .sc_services_item .sc_services_item_info {
                color: {$colors['text_dark']};
                background-color: {$colors['alter_bg_color']};
            }
            .sc_services.sc_services_light .sc_services_item_info .sc_services_item_content ul li {
                border-color: {$colors['alter_bd_color']};
            }
            .sc_services_default .sc_services_item.with_icon .sc_services_item_icon {
                color: {$colors['text_link']};
                background-color: {$colors['alter_bg_color']};
                border-color: {$colors['alter_bg_color']};
            }
            .sc_services_default .sc_services_item.with_icon:hover .sc_services_item_icon {
                color: {$colors['inverse_text']};
                background-color: {$colors['extra_bg_color']};
                border-color: {$colors['extra_bg_color']};
            }
            .sc_services_default .sc_services_item.with_icon .sc_services_item_content {
                color: {$colors['text']};
            }

            .scheme_self .sc_skills_counter .sc_skills_icon {
                color: {$colors['text_link']};
                background-color: {$colors['bg_color']};
            }
            .scheme_self .sc_skills .sc_skills_total {
                color:{$colors['text_dark']};
            }

            .sc_item_descr {
                color: {$colors['text']};
            }
            /* Scroll to top */
            .trx_addons_scroll_to_top,
            .trx_addons_cv .trx_addons_scroll_to_top {
                color: {$colors['text_dark']};
                border-color: {$colors['alter_bg_color']};
                background-color: {$colors['alter_bg_color']};
            }
            .trx_addons_scroll_to_top:hover,
            .trx_addons_cv .trx_addons_scroll_to_top:hover {
                color: {$colors['inverse_link']};
                border-color: {$colors['extra_bg_color']};
                background-color: {$colors['extra_bg_color']};
            }


CSS;
		}

		return $css;
	}
}

