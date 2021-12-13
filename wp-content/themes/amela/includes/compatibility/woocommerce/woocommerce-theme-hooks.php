<?php
/**
 * WooCommerce theme hooks
 *
 * @package Amela
 */

/**
 * Layout
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
add_action( 'woocommerce_before_main_content', 'amela_shop_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'amela_shop_after_content', 9 );
add_action( 'amela_shop_sidebar', 'amela_shop_get_sidebar', 10 );


/**
 * Products
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'amela_product_markup_open' );
add_action( 'woocommerce_before_shop_loop_item_title', 'amela_hover_shop_loop_image' ); 

// Add to cart / Quickview / Wishlist
add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_before_add_to_cart' );

add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_action_icons_open' );

if ( class_exists( 'YITH_WCWL' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_add_to_wishlist' );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_add_to_cart' );

add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_action_icons_close' );

if ( class_exists( 'YITH_WCQV' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_quickview' );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_after_add_to_cart' );

if ( function_exists( 'YITH_WCQV_Frontend' ) ) {
	remove_action( 'init', array( YITH_WCQV_Frontend(), 'add_button' ) );
}


// Image holder close
add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_image_holder_close' );

// Product link
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open' );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close' );

// Outer close
add_action( 'woocommerce_before_shop_loop_item_title', 'amela_product_outer_close' );

// Product title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'amela_product_title' );
add_action( 'woocommerce_after_shop_loop_item_title', 'amela_product_subtitle', 4 );
add_action( 'woocommerce_after_shop_loop_item_title', 'amela_after_product_price', 10 );


/**
 * Single Product
 */
add_action( 'woocommerce_share', 'amela_product_share' );


/**
 * Widgets
 */
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'amela_shop_tag_cloud_widget' );


/**
 * Breadcrumbs
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'amela_shop_breadcrumbs', 'woocommerce_breadcrumb', 10 );
add_action( 'woocommerce_single_product_summary', 'amela_shop_breadcrumbs', 4 );
add_filter( 'woocommerce_breadcrumb_defaults', 'amela_shop_breadcrumb_delimiter' );


/**
 * Page Title
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );


/**
 * AJAX Cart
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'amela_woo_cart_ajax_count' );


/**
 * My Account Page
 */
add_action( 'woocommerce_before_customer_login_form', 'amela_woocommerce_before_customer_login_form' );
add_action( 'woocommerce_after_customer_login_form', 'amela_woocommerce_after_customer_login_form' );


/**
 * Quantity buttons
 */
add_action( 'woocommerce_after_quantity_input_field', 'amela_quantity_plus_sign' ); 
add_action( 'woocommerce_before_quantity_input_field', 'amela_quantity_minus_sign' );