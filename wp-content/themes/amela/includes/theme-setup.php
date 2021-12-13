<?php
/**
 * Theme setup.
 *
 * @package Amela
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( ! function_exists( 'amela_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function amela_setup() {

		global $pagenow;
		
		load_theme_textdomain( 'amela', AMELA_DIR . '/languages' );

		// Enable theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'navigation-widgets', 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background', apply_filters( 'amela_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		remove_theme_support( 'widgets-block-editor' );

		if ( amela_is_woocommerce_activated() ) {
			add_theme_support( 'woocommerce', array(
				'thumbnail_image_width' => 305,
				'gallery_thumbnail_image_width' => 148,
				'single_image_width' => 620,
				'product_grid'      => array(
					'default_columns' => 3,
					'default_rows'    => 3,
				),
			) );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

		// Gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_editor_style();

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'blue', 'amela' ),
				'slug' => 'blue',
				'color' => '#EE8D87',
			),
			array(
				'name' => esc_html__( 'orange', 'amela' ),
				'slug' => 'orange',
				'color' => '#D6763C',
			),
			array(
				'name' => esc_html__( 'dark', 'amela' ),
				'slug' => 'dark',
				'color' => '#0c0c0c',
			),
			array(
				'name' => esc_html__( 'silver', 'amela' ),
				'slug' => 'silver',
				'color' => '#FBFBFB',
			),
			array(
				'name' => esc_html__( 'white', 'amela' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'black', 'amela' ),
				'slug' => 'black',
				'color' => '#000000',
			),

		) );


		// Thumbnails
		add_image_size( 'amela_featured_small', 445, 0, false );
		add_image_size( 'amela_featured_medium', 914, 0, false );
		add_image_size( 'amela_featured_large', 1280, 608, true );

		// Nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'amela' ),
		) );
		
		// Disable WooCommerce wizard redirect
		add_filter('woocommerce_enable_setup_wizard', '__return_false');
		add_filter('woocommerce_show_admin_notice', '__return_false');
		add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_false');

		// Disable Kirki telemetry
		add_filter( 'kirki_telemetry', '__return_false' );

		// Remove admin notices for Instagram Feed
		update_option( 'sbi_ignore_new_user_sale_notice', 'always' );
		update_option( 'sbi_rating_notice', 'dismissed' );
		remove_action( 'admin_notices', 'sbi_usage_tracking' );
		remove_action( 'admin_notices', 'sbi_usage_opt_in' );
		remove_action( 'admin_notices', 'sbi_notices_html' );
	}
endif; // theme_setup
add_action( 'after_setup_theme', 'amela_setup' );

// Disable Woo Variation Swatches activation redirect
if ( class_exists( 'Woo_Variation_Swatches' ) ) {
	remove_action( 'admin_init', array( Woo_Variation_Swatches(), 'after_plugin_active' ) );
}

// Update Elementor Defaults
if ( 1 != get_option( 'amela_elementor_defaults', 0 ) ) {
	add_option( 'amela_elementor_defaults', 0 );
}

/**
* Update Elementor Defaults.
*/
function amela_update_elementor_defaults() {
	if ( 1 != get_option( 'amela_elementor_defaults' ) ) {
		update_option( 'elementor_cpt_support', array(
			'post',
			'page',
			'theme_template'
		) );
		
		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );
		update_option( 'amela_elementor_defaults', 1 );
	}
}
add_action( 'init', 'amela_update_elementor_defaults' );


/**
* Disable Elementor redirect.
*/
add_action( 'admin_init', function() {
	delete_transient( 'elementor_activation_redirect' );
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );


/**
* Register widget areas.
*/
function amela_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'amela' ),
		'id'            => 'amela-blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'amela' ),
		'id'            => 'amela-page-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( amela_is_woocommerce_activated() ) {

		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'amela' ),
			'id'            => 'amela-shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

	}

	register_sidebar( array(
		'name'          => esc_html__( 'Newsletter', 'amela' ),
		'id'            => 'amela-newsletter',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'amela' ),
		'id'            => 'amela-footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'amela' ),
		'id'            => 'amela-footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'amela' ),
		'id'            => 'amela-footer-col-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'amela' ),
		'id'            => 'amela-footer-col-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'amela_widgets_init' );