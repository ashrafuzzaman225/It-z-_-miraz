<?php
/**
 * Customizer Layout
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Content layout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'number',
	'settings'    => 'amela_settings_content_layout_container_width',
	'label'       => esc_html__( 'Container Width (px)', 'amela' ),
	'section'     => 'amela_settings_content_layout',
	'default'     => 1300,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.container',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_xl_up,
		),
	),
	'transport' => 'auto',
) );


// Blog layout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'amela_settings_blog_layout_type',
	'label'       => esc_html__( 'Blog layout type', 'amela' ),
	'section'     => 'amela_settings_blog_layout',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Single post layout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'amela_settings_single_post_layout_type',
	'label'       => esc_html__( 'Single post layout type', 'amela' ),
	'section'     => 'amela_settings_blog_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'select',
	'settings'    => 'amela_settings_blog_columns',
	'label'       => esc_html__( 'Columns', 'amela' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'amela' ),
	'section'     => 'amela_settings_blog_layout',
	'default'     => 'col-lg-6',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'amela' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'amela' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'amela' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'amela' ),
	),
) );

// Page Layout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'amela_settings_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'amela' ),
	'section'     => 'amela_settings_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'amela_settings_archive_layout_type',
	'label'       => esc_html__( 'Layout type', 'amela' ),
	'section'     => 'amela_settings_archive_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'select',
	'settings'    => 'amela_settings_archive_columns',
	'label'       => esc_html__( 'Columns', 'amela' ),
	'section'     => 'amela_settings_archive_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'amela' ),
		'col-lg-6'  => esc_attr__( '2 Columns', 'amela' ),
		'col-lg-4'  => esc_attr__( '3 Columns', 'amela' ),
		'col-lg-3'  => esc_attr__( '4 Columns', 'amela' ),
	),
) );


if ( amela_is_woocommerce_activated() ) {

	// Shop layout
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'amela_settings_shop_layout_type',
		'label'       => esc_html__( 'Shop layout type', 'amela' ),
		'description'	=> esc_html__( 'Make sure that your Shop sidebar has widgets.', 'amela' ),
		'section'     => 'amela_settings_shop_layout',
		'default'     => 'left-sidebar',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

	// Shop pages layout
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'radio-image',
		'settings'    => 'amela_settings_shop_pages_layout_type',
		'label'       => esc_html__( 'Shop pages layout type', 'amela' ),
		'description'	=> esc_html__( 'Applies on Cart, Checkout and My Account pages. This setting will not have any effect if you are using custom metaboxes in Pro version.', 'amela' ),
		'section'     => 'amela_settings_shop_layout',
		'default'     => 'fullwidth',
		'choices'     => array(
			'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
			'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
			'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
		),
	) );

}

// Search Layout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'amela_settings_search_results_layout_type',
	'label'       => esc_html__( 'Layout type', 'amela' ),
	'section'     => 'amela_settings_search_results_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Search columns
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'select',
	'settings'    => 'amela_settings_search_results_columns',
	'label'       => esc_html__( 'Columns', 'amela' ),
	'section'     => 'amela_settings_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'amela' ),
		'col-lg-6'  => esc_attr__( '2 Columns', 'amela' ),
		'col-lg-4'  => esc_attr__( '3 Columns', 'amela' ),
		'col-lg-3'  => esc_attr__( '4 Columns', 'amela' ),
	),
) );