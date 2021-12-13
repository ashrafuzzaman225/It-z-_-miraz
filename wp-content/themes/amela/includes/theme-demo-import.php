<?php

/**
 * Theme Demo Import.
 *
 * @package Amela
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*
* Demo Import
*/
function amela_ocdi_import_files()
{
    $url = 'https://amela.deothemes.com';
    return array( array(
        'import_file_name'           => 'Demo Import Free',
        'import_file_url'            => 'https://amela-free.deothemes.com/import/demo-content.xml',
        'import_widget_file_url'     => 'https://amela-free.deothemes.com/import/widgets.wie',
        'import_customizer_file_url' => 'https://amela-free.deothemes.com/import/customizer.dat',
    ) );
}

add_filter( 'pt-ocdi/import_files', 'amela_ocdi_import_files' );
/*
* OCDI plugins
*/
function amela_ocdi_register_plugins( $plugins )
{
    $plugins = [
        [
        'name'     => esc_html__( 'Kirki', 'amela' ),
        'slug'     => 'kirki',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'Elementor', 'amela' ),
        'slug'     => 'elementor',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'WooCommerce', 'amela' ),
        'slug'     => 'woocommerce',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'Contact Form 7', 'amela' ),
        'slug'     => 'contact-form-7',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'MailChimp for WordPress', 'amela' ),
        'slug'     => 'mailchimp-for-wp',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'Smash Balloon Social Photo Feed', 'amela' ),
        'slug'     => 'instagram-feed',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'YITH WooCommerce Quick View', 'amela' ),
        'slug'     => 'yith-woocommerce-quick-view',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'amela' ),
        'slug'     => 'yith-woocommerce-wishlist',
        'required' => false,
    ],
        [
        'name'     => esc_html__( 'WooCommerce Variation Swatches', 'amela' ),
        'slug'     => 'woo-variation-swatches',
        'required' => false,
    ]
    ];
    return $plugins;
}

add_filter( 'ocdi/register_plugins', 'amela_ocdi_register_plugins' );
/**
* Assign menus and front page after demo import
*
* @param array $selected_import array with demo import data
*/
function amela_ocdi_after_import( $selected_import )
{
    // Assign menus to their locations.
    $primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
        'primary-menu' => $primary_menu->term_id,
    ) );
    // Assign WooCommerce pages
    $shop = get_page_by_title( 'Shop' );
    $cart = get_page_by_title( 'Cart' );
    $checkout = get_page_by_title( 'Checkout' );
    $wishlist = get_page_by_title( 'Wishlist' );
    $myaccount = get_page_by_title( 'My Account' );
    update_option( 'woocommerce_shop_page_id', $shop->ID );
    update_option( 'woocommerce_cart_page_id', $cart->ID );
    update_option( 'woocommerce_checkout_page_id', $checkout->ID );
    update_option( 'woocommerce_myaccount_page_id', $myaccount->ID );
    // Assign front page based on demo import
    switch ( $selected_import['import_file_name'] ) {
        case 'Demo Import Free':
            $front_page_id = get_page_by_title( 'Home' );
            $blog_page_id = get_page_by_title( 'Blog' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 'Main Home':
            $front_page_id = get_page_by_title( 'Home' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 'Skincare Products':
            $front_page_id = get_page_by_title( 'Home 2' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 'Beauty Care Services':
            $front_page_id = get_page_by_title( 'Home 3' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 'Full Screen Slider':
            $front_page_id = get_page_by_title( 'Home 4' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        default:
            break;
    }
    $blog_page_id = get_page_by_title( 'Blog' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'elementor_active_kit', 1096 );
    // Omit installing WooCommerce pages
    delete_option( '_wc_needs_pages' );
    delete_transient( '_wc_activation_redirect' );
    flush_rewrite_rules();
    global  $wpdb ;
    // Change attribute types
    $table_name = $wpdb->prefix . 'woocommerce_attribute_taxonomies';
    $wpdb->query( "UPDATE `{$table_name}` SET `attribute_type` = 'image' WHERE `attribute_name` = 'scent'" );
    $wpdb->query( "UPDATE `{$table_name}` SET `attribute_type` = 'button' WHERE `attribute_name` = 'volume'" );
    $woo_atts_transient = get_transient( 'wc_attribute_taxonomies' );
    $woo_atts_transient[0]->attribute_type = 'image';
    $woo_atts_transient[1]->attribute_type = 'button';
    set_transient( 'wc_attribute_taxonomies', $woo_atts_transient );
}

add_action( 'pt-ocdi/after_import', 'amela_ocdi_after_import' );
/* Disable Branding */
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );