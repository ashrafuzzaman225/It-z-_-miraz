<?php
/**
 * WooCommerce
 *
 * @package Amela
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* WooCommerce
/*-------------------------------------------------------*/

// Product Social Share Buttons
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_product_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Facebook Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_facebook',
	'label'       => esc_html__( 'Facebook', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Twitter Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_twitter',
	'label'       => esc_html__( 'Twitter', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Linkedin Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_pocket',
	'label'       => esc_html__( 'Pocket', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Facebook Messenger Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_viber',
	'label'       => esc_html__( 'Viber', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_telegram',
	'label'       => esc_html__( 'Telegram', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_reddit',
	'label'       => esc_html__( 'Reddit', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'amela_settings_product_share_email',
	'label'       => esc_html__( 'Email', 'amela' ),
	'section'     => 'amela_settings_product_social_share',
	'default'     => false,
) );


Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'woocommerce_product_catalog',
	'default'     => '<h3 class="customizer-title">' . esc_html__( 'Display Product Elements', 'amela' ) . '</h3>',
) );

// Show product Sale badge
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_sale_badge_show',
	'label'       => esc_html__( 'Show sale badge', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product title
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_title_show',
	'label'       => esc_html__( 'Show title', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product rating
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_rating_show',
	'label'       => esc_html__( 'Show rating', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product price
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_price_show',
	'label'       => esc_html__( 'Show price', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Wishlist button
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_catalog_wishlist_show',
	'label'       => esc_html__( 'Show add to wishlist button', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Add To Cart button
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_catalog_button_show',
	'label'       => esc_html__( 'Show add to cart button', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show product Quickview button
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_product_catalog_quickview_show',
	'label'       => esc_html__( 'Show quickview button', 'amela' ),
	'section'     => 'woocommerce_product_catalog',
	'default'     => true,
) );

// Show distraction free checkout
Kirki::add_field( 'amela_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'amela_settings_woocommerce_distraction_free_checkout',
	'label'       => esc_html__( 'Distraction free checkout', 'amela' ),
	'section'     => 'woocommerce_checkout',
	'default'     => false,
	'priority'		=> 1
) );