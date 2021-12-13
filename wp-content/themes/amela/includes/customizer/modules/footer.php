<?php
/**
 * Customizer Footer
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( class_exists( 'Amela_Core' ) ) {
	// Footer template notice
	Kirki::add_field( 'amela_settings_config', array(
		'type'        => 'custom',
		'settings'    => 'amela_settings_footer_template_notice',
		'section'     => 'amela_settings_footer',
		'default'     => '<div class="notice notice-info"><p>' .		
			sprintf(
				esc_html__( 'To edit custom Elementor footer template navigate to %1$s', 'amela' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'edit.php?post_type=theme_template' ) ),
					esc_html__( 'Theme Templates.', 'amela' )
				)
			) .
			'</p></div>',
	) );
}

// Show footer
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_footer_show',
	'label'       => esc_html__( 'Show default footer', 'amela' ),
	'section'     => 'amela_settings_footer',
	'default'     => true,
) );

// Show footer widgets
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_footer_widgets_show',
	'label'       => esc_html__( 'Show footer widgets', 'amela' ),
	'section'     => 'amela_settings_footer',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Footer columns
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'select',
	'settings'    => 'amela_settings_footer_columns',
	'label'       => esc_html__( 'Number of columns', 'amela' ),
	'section'     => 'amela_settings_footer',
	'default'     => 'footer-col-4',
	'choices'     => array(
		'footer-col-1' => esc_html__( '1 Column', 'amela' ),
		'footer-col-2' => esc_html__( '2 Columns', 'amela' ),
		'footer-col-3' => esc_html__( '3 Columns', 'amela' ),
		'footer-col-4' => esc_html__( '4 Columns', 'amela' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'amela_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Bottom footer text
Kirki::add_field( 'amela_settings_config', array(
	'type'        			=> 'textarea',
	'settings'    			=> 'amela_settings_footer_bottom_text',
	'section'     			=> 'amela_settings_footer',
	'label'       			=> esc_html__( 'Bottom footer text', 'amela' ),
	'description' 			=> esc_html__( 'Allowed HTML: a, span, i, em, strong', 'amela' ),
	'sanitize_callback' => 'wp_kses_post',
	'default'     			=> sprintf( esc_html__( 'Copyright &copy; [current-year] %1$s' , 'amela' ), get_bloginfo( 'name' ) ),
	'active_callback' 	=> array(
		array(
			'setting'  => 'amela_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );