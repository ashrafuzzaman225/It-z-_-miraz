<?php

/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Set the content width based on the theme's design and stylesheet.

if ( !isset( $content_width ) ) {
    $content_width = 1280;
    /* pixels */
}

// Constants
define( 'AMELA_VERSION', '1.0.1' );
define( 'AMELA_DIR', get_template_directory() );
define( 'AMELA_URI', get_template_directory_uri() );

if ( !function_exists( 'amela_fs' ) ) {
    // Create a helper function for easy SDK access.
    function amela_fs()
    {
        global  $amela_fs ;
        
        if ( !isset( $amela_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $amela_fs = fs_dynamic_init( array(
                'id'             => '8921',
                'slug'           => 'amela',
                'premium_slug'   => 'amela-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_bd9f1fd2f36328cbfd3d31abd95d5',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'amela-theme',
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $amela_fs;
    }
    
    // Init Freemius.
    amela_fs();
    // Signal that SDK was initiated.
    do_action( 'amela_fs_loaded' );
}

/**
 * Includes
 */
require_once AMELA_DIR . '/includes/admin/theme-admin.php';
require_once AMELA_DIR . '/includes/theme-setup.php';
require_once AMELA_DIR . '/includes/theme-functions.php';
require_once AMELA_DIR . '/includes/theme-hooks.php';
require_once AMELA_DIR . '/includes/template-tags.php';
require_once AMELA_DIR . '/includes/template-parts.php';
require_once AMELA_DIR . '/includes/class-amela-breadcrumb-trail.php';
require_once AMELA_DIR . '/includes/class-amela-query.php';
require_once AMELA_DIR . '/includes/class-amela-walker-nav-menu.php';
require_once AMELA_DIR . '/includes/class-amela-walker-comment.php';
require_once AMELA_DIR . '/includes/customizer/customizer.php';
/**
 * Theme update functions.
 */
require_once AMELA_DIR . '/includes/theme-update/class-amela-theme-update.php';
/**
* TGM plugins activation.
*/
require_once AMELA_DIR . '/includes/tgmpa/tgm-plugin-activation.php';
/**
* Demo Import.
*/
require_once AMELA_DIR . '/includes/theme-demo-import.php';
/**
 * Compatibility
 */

if ( amela_is_woocommerce_activated() ) {
    require_once AMELA_DIR . '/includes/compatibility/woocommerce/class-amela-woocommerce.php';
    require_once AMELA_DIR . '/includes/compatibility/woocommerce/woocommerce-theme-functions.php';
    require_once AMELA_DIR . '/includes/compatibility/woocommerce/woocommerce-theme-hooks.php';
}

if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
    require_once AMELA_DIR . '/includes/compatibility/class-amela-elementor.php';
}
/**
 * Theme styles.
 */
function amela_theme_styles()
{
    wp_enqueue_style(
        'amela-styles',
        AMELA_URI . '/style.min.css',
        array(),
        AMELA_VERSION,
        'all'
    );
    wp_style_add_data( 'amela-styles', 'rtl', 'replace' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // WooCommerce styles
    
    if ( amela_is_woocommerce_activated() ) {
        wp_register_style(
            'amela-woocommerce',
            AMELA_URI . '/assets/css/compatibility/woocommerce/woocommerce.min.css',
            array(),
            AMELA_VERSION
        );
        wp_enqueue_style( 'amela-woocommerce' );
        wp_style_add_data( 'amela-woocommerce', 'rtl', 'replace' );
    }
    
    // Cookies bar styles
    if ( get_theme_mod( 'amela_settings_cookies_bar_show', false ) ) {
        wp_enqueue_style( 'cookieconsent', AMELA_URI . '/assets/css/cookieconsent.min.css' );
    }
    // Fonts
    if ( !class_exists( 'Kirki' ) ) {
        wp_enqueue_style( 'amela-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&family=Prata:wght@400&display=swap' );
    }
}

add_action( 'wp_enqueue_scripts', 'amela_theme_styles' );
// Remove Woo styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
// Dequeue YITH Wishlist styles

if ( defined( 'YITH_WCWL' ) && amela_is_woocommerce_activated() ) {
    function amela_dequeue_yith_wcwl_font_awesome_styles( $deps )
    {
        $deps = array( 'jquery-selectBox' );
        return $deps;
    }
    
    add_filter( 'yith_wcwl_main_style_deps', 'amela_dequeue_yith_wcwl_font_awesome_styles' );
    // Remove social icon color style
    add_filter( 'yith_wcwl_custom_css_rules', function ( $custom_css ) {
        unset(
            $custom_css['color_fb_button'],
            $custom_css['color_tw_button'],
            $custom_css['color_pr_button'],
            $custom_css['color_em_button'],
            $custom_css['color_wa_button'],
            $custom_css['color_wa_button']
        );
        return $custom_css;
    } );
}

/**
 * Block editor styles.
 */
function amela_block_assets()
{
    wp_enqueue_style( 'amela-block-editor-styles', get_theme_file_uri( '/assets/css/editor.min.css' ), false );
    if ( function_exists( 'amela_get_typekit_fonts' ) ) {
        $typekit_fonts = amela_get_typekit_fonts();
    }
    
    if ( !empty($typekit_fonts) ) {
        $typekit_info = get_option( 'amela-typekit-fonts' );
        $typekit_id = $typekit_info['custom-typekit-font-id'];
        if ( !empty($typekit_id) ) {
            wp_enqueue_style( 'amela-typekit-fonts', '//use.typekit.net/' . $typekit_id . '.css' );
        }
    }
    
    if ( !class_exists( 'Kirki' ) || empty($typekit_fonts) ) {
        wp_enqueue_style( 'amela-block-editor-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&family=Prata:wght@400&display=swap' );
    }
}

add_action( 'enqueue_block_editor_assets', 'amela_block_assets' );
/**
 * Theme scripts.
 */
function amela_theme_scripts()
{
    
    if ( is_archive() || is_search() || is_home() ) {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'imagesloaded' );
    }
    
    wp_enqueue_script(
        'bootstrap',
        AMELA_URI . '/assets/js/vendor/min/bootstrap.min.js',
        array(),
        AMELA_VERSION,
        true
    );
    wp_enqueue_script(
        'body-scroll-lock',
        AMELA_URI . '/assets/js/vendor/min/bodyScrollLock.min.js',
        array(),
        AMELA_VERSION,
        true
    );
    wp_enqueue_script(
        'modernizr',
        AMELA_URI . '/assets/js/vendor/min/modernizr.min.js',
        array(),
        AMELA_VERSION,
        true
    );
    if ( amela_is_woocommerce_activated() ) {
        wp_enqueue_script(
            'amela-woo-scripts',
            AMELA_URI . '/assets/js/woo-scripts.min.js',
            array(),
            AMELA_VERSION,
            true
        );
    }
    wp_register_script(
        'amela-scripts',
        AMELA_URI . '/assets/js/scripts.min.js',
        array(),
        AMELA_VERSION,
        true
    );
    wp_enqueue_script( 'amela-scripts' );
    $Amela_Data = array(
        'home_url'   => esc_url( home_url( '/' ) ),
        'theme_path' => AMELA_URI,
    );
    wp_localize_script( 'amela-scripts', 'Amela_Data', $Amela_Data );
}

add_action( 'wp_enqueue_scripts', 'amela_theme_scripts' );
/**
 * Theme admin scripts and styles.
 */
function amela_admin_scripts()
{
    $screen = get_current_screen();
    wp_enqueue_style( 'amela-admin-styles', AMELA_URI . '/assets/admin/css/amela-admin-styles.css' );
    
    if ( $screen->id === 'appearance_page_one-click-demo-import' ) {
        wp_register_script(
            'amela-admin-scripts',
            AMELA_URI . '/assets/admin/js/amela-admin-scripts.js',
            array( 'jquery-core' ),
            false,
            true
        );
        wp_enqueue_script( 'amela-admin-scripts' );
    }

}

add_action( 'admin_enqueue_scripts', 'amela_admin_scripts' );
/**
 * Theme WP Customizer scripts and styles.
 */
function amela_customizer_scripts()
{
    wp_enqueue_style( 'amela-customizer-styles', AMELA_URI . '/assets/css/customizer/customizer.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'amela_customizer_scripts' );