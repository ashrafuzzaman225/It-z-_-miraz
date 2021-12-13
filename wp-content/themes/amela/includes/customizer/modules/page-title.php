<?php
/**
 * Customizer Page Title
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* Regular Pages
/*-------------------------------------------------------*/

// Show regular pages page title
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_regular_pages_page_title_show',
	'label'       => esc_html__( 'Show page title', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => true,
) );

// Show regular pages breadcrumbs
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_regular_pages_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs on regular pages', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => true,
) );

// Show archive breadcrumbs
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_archives_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs on archives', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => true,
) );

// Show search results breadcrumbs
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_search_results_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs on search results', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => true,
) );

// Show single post breadcrumbs
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_single_post_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs on single post', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => false,
) );

// Show shop breadcrumbs
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_shop_breadcrumbs_show',
	'label'       => esc_html__( 'Show breadcrumbs on shop pages', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => true,
) );


// Page title padding
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'amela_settings_page_title_padding',
	'label'       => esc_html__( 'Page title top/bottom padding', 'amela' ),
	'section'     => 'amela_settings_page_title',
	'default'     => [
		'padding-top'    => '34px',
		'padding-bottom' => '34px',
	],
	'output' => array(
		array(
			'element' => '.page-title',
		),
	),
	'transport' => 'auto',
) );