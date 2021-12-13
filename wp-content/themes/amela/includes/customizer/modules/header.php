<?php
/**
 * Customizer Header
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Logo
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'image',
	'settings'    => 'amela_settings_logo_dark',
	'label'       => esc_html__( 'Upload logo', 'amela' ),
	'section'     => 'amela_settings_logo',
) );

if ( class_exists( 'Amela_Core' ) ) {
	// Header template notice
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'custom',
		'settings'    => 'amela_settings_header_template_notice',
		'section'     => 'amela_settings_default_header',
		'default'     => '<div class="notice notice-info"><p>' .		
			sprintf(
				esc_html__( 'To edit custom Elementor header template navigate to %1$s', 'amela' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'edit.php?post_type=theme_template' ) ),
					esc_html__( 'Theme Templates.', 'amela' )
				)
			) .
			'</p></div>',
	) );
}

// Show default header
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_header_show',
	'label'       => esc_html__( 'Show default header', 'amela' ),
	'section'     => 'amela_settings_default_header',
	'default'     => true,
) );

// Sticky header
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_sticky_header_show',
	'label'       => esc_html__( 'Sticky header', 'amela' ),
	'description' => esc_html__( 'Will apply only on big screens', 'amela' ),
	'section'     => 'amela_settings_default_header',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Header container width
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_container_width',
	'label'       => esc_attr__( 'Header container width', 'amela' ),
	'section'     => 'amela_settings_default_header',
	'default'     => 1300,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__container.container',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_xl_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header height
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_height',
	'label'       => esc_attr__( 'Header height', 'amela' ),
	'section'     => 'amela_settings_default_header',
	'default'     => 88,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.amela-header-layout-1 .nav__flex-parent, .amela-header-layout-2 .nav__header, .amela-header-layout-3 .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.amela-header-layout-1, .amela-header-layout-3',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.amela-header-layout-1 .nav__menu > li > a, .amela-header-layout-3 .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header sticky height
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_sticky_height',
	'label'       => esc_attr__( 'Header sticky height', 'amela' ),
	'section'     => 'amela_settings_default_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.amela-header-layout-1 .nav--sticky.sticky .nav__flex-parent, .amela-header-layout-2 .nav--sticky.sticky .nav__header, .amela-header-layout-3 .nav--sticky.sticky .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.amela-header-layout-1 .nav--sticky.sticky .nav__menu > li > a, .amela-header-layout-3 .nav--sticky.sticky .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header mobile height
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_mobile_height',
	'label'       => esc_attr__( 'Header mobile height', 'amela' ),
	'section'     => 'amela_settings_mobile_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );		


// Logo width
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_logo_width',
	'label'       => esc_attr__( 'Header logo width', 'amela' ),
	'section'     => 'amela_settings_logo',
	'default'     => 118,
	'choices'     => array(
		'min'  => '0',
		'max'  => '600',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );

// Logo sticky width
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_logo_sticky_width',
	'label'       => esc_attr__( 'Header logo sticky width', 'amela' ),
	'section'     => 'amela_settings_logo',
	'default'     => 118,
	'choices'     => array(
		'min'  => '0',
		'max'  => '600',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );

// Menu items horizontal spacing
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'amela_settings_header_text_links_horizontal_spacing',
	'label'       => esc_attr__( 'Menu text links horizontal spacing', 'amela' ),
	'section'     => 'amela_settings_primary_menu',
	'default'     => 17,
	'choices'     => array(
		'min'  => '0',
		'max'  => '60',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-left',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-right',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );


// Last Menu Item Title
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'amela_settings_primary_menu',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Last menu item', 'amela' ) . '</h3>',
) );

// Last Item: Search
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_header_last_menu_item_search',
	'label'       => esc_html__( 'Search', 'amela' ),
	'section'     => 'amela_settings_primary_menu',
	'default'     => true,
) );

if ( amela_is_woocommerce_activated() ) {
	// Last Item: Shopping cart
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'checkbox',
		'settings'    => 'amela_settings_header_last_menu_item_shopping_cart',
		'label'       => esc_html__( 'Shopping Cart', 'amela' ),
		'section'     => 'amela_settings_primary_menu',
		'default'     => true,
	) );

	// Last Item: Account
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'checkbox',
		'settings'    => 'amela_settings_header_last_menu_item_account',
		'label'       => esc_html__( 'Account', 'amela' ),
		'section'     => 'amela_settings_primary_menu',
		'default'     => true,
	) );

}

// Last Item: HTML
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_header_last_menu_item_html',
	'label'       => esc_html__( 'HTML', 'amela' ),
	'section'     => 'amela_settings_primary_menu',
	'default'     => false,
) );

// Last Item: Text / HTML 
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'code',
	'settings'    => 'amela_settings_header_last_menu_item_text_html',
	'label'       => esc_html__( 'Text / HTML / Shortcode', 'amela' ),
	'section'     => 'amela_settings_primary_menu',
	'choices'     => array(
		'language' => 'html',
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_header_last_menu_item_html',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Hide last menu item on mobile
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_header_last_menu_item_hide',
	'label'       => esc_attr__( 'Hide last menu item on mobile', 'amela' ),
	'section'     => 'amela_settings_primary_menu',
	'default'     => false,
) );


// Show top bar
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_top_bar_show',
	'label'       => esc_html__( 'Show top bar', 'amela' ),
	'section'     => 'amela_settings_top_bar',
	'default'     => false,
) );

// Top bar message
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_top_bar_message',
	'section'     => 'amela_settings_top_bar',
	'label'       => esc_html__( 'Top bar meesage', 'amela' ),
	'description' => esc_html__( 'Allowed HTML: a, img, span, i, em, strong', 'amela' ),
	'default'     => esc_html__( 'Free Shipping & Returns On All US Orders' , 'amela' ),
	'sanitize_callback' => 'wp_kses_post',
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_top_bar_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Top bar URL
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'url',
	'settings'    => 'amela_settings_top_bar_url',
	'section'     => 'amela_settings_top_bar',
	'label'       => esc_html__( 'Top bar URL', 'amela' ),
	'default'     => '#',
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_top_bar_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Vertical Header
if ( class_exists( 'Amela_Core_Theme_Templates' ) ) {
	$custom_headers = \Amela_Core_Theme_Templates::get_theme_headers();
	$header_vertical = false;

	foreach( $custom_headers as $key => $value ) {
		$location = get_post_meta( $key, '_amela_template_location', true );

		if ( 'header-vertical' === $location ) {
			$header_vertical = true;
		}
	}

	if ( $header_vertical ) {

		// Header width
		Kirki::add_field( 'amela_settings_config', array(
			'type'        => 'slider',
			'settings'    => 'amela_settings_vertical_header_width',
			'label'       => esc_html__( 'Vertical header width', 'amela' ),
			'description' => esc_html__( 'Applies above 1200px breakpoint.', 'amela' ),
			'section'     => 'amela_settings_vertical_header',
			'default'     => 270,
			'choices'     => array(
				'min'  => '100',
				'max'  => '800',
				'step' => '1',
			),
			'output'       => array(
				array(
					'element'     => '.eversor-header-vertical--left',
					'property'    => 'margin-left',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
				array(
					'element'     => '.eversor-header-vertical--right',
					'property'    => 'margin-right',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
				array(
					'element'     => '.eversor-header--vertical',
					'property'    => 'width',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
			),
			'transport' => 'auto',
		) );
		
		// Header position
		Kirki::add_field( 'amela_settings_config', array(
			'type'        => 'select',
			'settings'    => 'amela_settings_vertical_header_position',
			'label'       => esc_html__( 'Vertical header position', 'amela' ),
			'section'     => 'amela_settings_vertical_header',
			'default'     => 'left',
			'choices'     => array(
				'left'  => esc_html__( 'Left', 'amela' ),
				'right' => esc_html__( 'Right', 'amela' ),
			),
		) );

	}	

}