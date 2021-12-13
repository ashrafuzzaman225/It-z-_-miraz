<?php
/**
 * Customizer Page 404
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page 404 Image
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'image',
	'settings'    => 'amela_settings_page_404_image',
	'label'       => esc_html__( 'Page 404 image', 'amela' ),
	'section'     => 'amela_settings_page_404',
	'default'     => AMELA_URI . '/assets/img/404/amela_404_background-min.jpg'
) );

// Title
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_page_404_title',
	'label'       => esc_html__( 'Page 404 title', 'amela' ),
	'section'     => 'amela_settings_page_404',
	'default'     => esc_html__( 'Sorry this page isn’t available', 'amela' ),
) );

// Description text
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_page_404_description',
	'label'       => esc_html__( 'Page 404 description text', 'amela' ),
	'section'     => 'amela_settings_page_404',
	'default'     => esc_html__( 'The page you were looking for couldn’t be found.', 'amela' ),
) );

// Button text
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_page_404_button_text',
	'label'       => esc_html__( 'Page 404 button text', 'amela' ),
	'section'     => 'amela_settings_page_404',
	'default'     => esc_html__( 'Back to Homepage', 'amela' ),
) );