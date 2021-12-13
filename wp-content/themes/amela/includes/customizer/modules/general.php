<?php
/**
 * Customizer General
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Preloader
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_preloader_show',
	'label'       => esc_html__( 'Enable/Disable theme preloader', 'amela' ),
	'section'     => 'amela_settings_preloader',
	'default'     => false,
) );

// Back to top
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_back_to_top_show',
	'label'       => esc_html__( 'Back to top arrow', 'amela' ),
	'section'     => 'amela_settings_back_to_top',
	'default'     => true,
) );

// Newsletter Popup
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_newsletter_popup_show',
	'label'       => esc_html__( 'Show newsletter pop-up', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => false,
) );

// Action after pop-up close
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'radio',
	'settings'    => 'amela_settings_newsletter_popup_storage',
	'label'       => esc_html__( 'Action after pop-up close', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => 'session',
	'choices'     => array(
		'session'   => esc_html__( 'Show on every visit (session)', 'amela' ),
		'cookies' => esc_html__( 'Do not show on every visit (cookies)', 'amela' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_newsletter_popup_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Cookies age
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'number',
	'settings'    => 'amela_settings_newsletter_popup_cookies_age',
	'label'       => esc_html__( 'Expiration (days)', 'amela' ),
	'description' => esc_html__( 'How many days to store cookies', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => 7,
	'choices'     => array(
		'min'  => 0,
		'max'  => 365,
		'step' => 1,
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_newsletter_popup_storage',
			'operator' => '==',
			'value'    => 'cookies',
		)
	),
) );


// Newsletter Popup Image
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'image',
	'settings'    => 'amela_settings_newsletter_popup_image',
	'label'       => esc_html__( 'Image', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => [
		'url' => AMELA_URI . '/assets/img/newsletter/amela_newsletter_popup-min.jpg',
		'id' => 0,
		'width' => 400,
		'height' => 486
	],
	'choices'     => [
		'save_as' => 'array',
	],
) );

// Title
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_newsletter_popup_title',
	'label'       => esc_html__( 'Title', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => esc_html__( 'Join our newsletter and	get 20% discount', 'amela' ),
) );

// Text
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_newsletter_popup_text',
	'label'       => esc_html__( 'Text', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => esc_html__( 'We promise we won\'t write to you often, only for the fun stuff.', 'amela' ),
) );

// Form
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'text',
	'settings'    => 'amela_settings_newsletter_popup_form',
	'label'       => esc_html__( 'Form shortcode', 'amela' ),
	'section'     => 'amela_settings_newsletter_popup',
	'default'     => '[mc4wp_form id="296"]',
) );