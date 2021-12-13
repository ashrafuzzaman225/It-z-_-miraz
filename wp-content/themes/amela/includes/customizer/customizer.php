<?php

/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
function amela_customize_register( $wp_customize )
{
    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background Styles', 'amela' );
    $wp_customize->get_control( 'background_color' )->section = 'background_image';
    // Remove Custom Header Section
    $wp_customize->remove_section( 'colors' );
}

add_action( 'customize_register', 'amela_customize_register' );
// Check if Kirki is installed

if ( class_exists( 'Kirki' ) ) {
    function amela_customizer_options()
    {
        // Selector Vars
        $selectors = array(
            'primary_color'               => 'a,
				.breadcrumbs a:hover,
				.breadcrumbs a:focus,
				.loader,
				.comment-edit-link,
				.entry__title a:focus,
				.entry__title a:hover,
				.entry__meta a:focus,
				.entry__meta a:hover,
				.entry-navigation__title a:focus,
				.entry-navigation__title a:hover,
				.footer .widget.widget_calendar a,
				.widget a:focus,
				.widget a:hover,
				.widget_rss .rsswidget:hover,
				.widget-popular-posts .widget-popular-posts__entry-title a:hover,
				.widget_recent_entries a:hover,
				.footer__nav-menu li a:hover,
				.footer__widgets .widget a:hover,
				.copyright a:hover,
				.copyright a:focus,
				.link-underline:hover,
				.link-underline:focus,
				.related-posts__entry-title:hover a,
				.wp-block-pullquote:before,
				.nav__right-item .amela-menu-search__trigger:hover,
				.amela-header .nav__menu > li > a:hover,
				.amela-header .nav__menu > li > a:focus,
				.amela-header .nav__menu > li.active > a,
				.amela-header .nav__menu > .current_page_parent > a,
				.amela-header .nav__menu .current-menu-item > a,
				.amela-header .nav__dropdown-menu > li > a:hover,
				.amela-header .nav__dropdown-menu > li > a:focus,
				.nav__right-item a:hover,
				.nav__right-item button:hover',
            'primary_background_color'    => '.nav__icon-toggle:focus .nav__icon-toggle-bar,
				.nav__icon-toggle:hover .nav__icon-toggle-bar,
				#back-to-top:hover,
				.post-page-numbers.current,
				.post-page-numbers:not(span):hover,
				.link-underline:after,
				.comment-author__post-author-label,
				a.cc-btn.cc-dismiss,
				.social:focus,
				.social:hover,
				.entry__tags a:hover,
				.widget_product_tag_cloud a:hover,
				.widget_tag_cloud .tagcloud a:hover,
				.widget_tag_cloud .wp-block-tag-cloud a:hover,
				.eversor-field-type-input::after,
				.trail-items li::after,
				.entry__meta-item .entry__category-item:focus,
				.entry__meta-item .entry__category-item:hover,
				
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button:focus,
				input[type="button"]:focus,
				input[type="reset"]:focus,
				input[type="submit"]:focus,
				.elementor-widget-button .elementor-button,
				.mc4wp-form-fields input[type=submit]:focus,
				.btn:hover,
				.btn:focus,
				.btn--color,
				.button,
				.button:hover,
				.button:focus',
            'primary_border_color'        => 'input:focus,
				textarea:focus',
            'primary_border_top_color'    => '.elementor-widget-tabs .elementor-tab-title.elementor-active',
            'primary_border_left_color'   => 'blockquote, .edit-post-visual-editor .wp-block-quote',
            'primary_border_bottom_color' => '.newsletter .form-group input[type=email]:focus, .newsletter .form-group input[type=text]:focus',
            'border_color'                => 'input,
				select,
				textarea,
				.pagination a,
				.pagination span,
				.elementor-widget-sidebar .widget,
				.sidebar .widget,
				.entry,
				table td,
				table th',
            'headings_color'              => 'h1,h2,h3,h4,h5,h6,
				label,
				a:hover,
				a:focus,
				.comment-author__name,
				.entry__category-item:hover,
				.entry__category-item:focus,
				.amela-header .nav__menu > li > a,
				.amela-header .amela-menu-cart__url,
				.amela-header .amela-menu-search__trigger,
				.widget-title,
				table tbody tr th,
				table thead tr th,
				.widget-popular-posts .widget-popular-posts__entry-title a',
            'text_color'                  => 'body,
				input,
				figcaption,
				.comment-form-cookies-consent label,
				.pagination span,
				.pagination a,
				.search-button,
				.search-form__button,
				.widget-search-button,
				.amela-header .nav__dropdown-menu > li > a',
            'text_light_color'            => '.widget a,
				.elementor-widget-wp-widget-pages-archives a,
				.elementor-widget-categories a,
				.elementor-widget-wp-widget-pages a,
				.elementor-widget-wp-widget-nav_menu a,
				.elementor-widget-wp-widget-meta a',
            'post_links_color'            => '.single-post__entry-article p a, .single-post__entry-article li:not(.wp-social-link) a',
            'post_meta_color'             => '.entry__meta-item, .entry__meta li, .entry__meta a, .comment-date',
            'headings'                    => 'h1,h2,h3,h4,h5,h6',
            'h1'                          => 'h1, .h1',
            'h2'                          => 'h2, .h2',
            'h3'                          => 'h3, .h3',
            'h4'                          => 'h4, .h4',
            'h5'                          => 'h5, .h5',
            'h6'                          => 'h6, .h6',
            'base_font'                   => 'body',
            'buttons'                     => 'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button,
				.btn,
				.button,
				.elementor-button,
				.elementor-button.elementor-size-md,
				.elementor-button.elementor-size-lg,
				.elementor-button.elementor-size-xl,
				.wp-block-button .wp-block-button__link,
				.added_to_cart',
            'buttons_color'               => 'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button:focus,
				input[type="button"]:focus,
				input[type="reset"]:focus,
				input[type="submit"]:focus,
				.elementor-widget-button .elementor-button,
				.mc4wp-form-fields input[type=submit]:focus,
				.btn:hover,
				.btn:focus,
				.btn--color,
				.button,
				.button:hover,
				.button:focus',
            'buttons_color_editor'        => '.wp-block-button__link:not(.has-background),
				.wp-block-button__link:not(.has-background):active,
				.wp-block-button__link:not(.has-background):focus,
				.wp-block-button__link:not(.has-background):hover,
				.wp-block-button__link:not(.has-background):visited
				',
        );
        
        if ( amela_is_woocommerce_activated() ) {
            $selectors['shop_primary_color'] = '.woocommerce ul.products li.product a.woocommerce-loop-product__link:hover,
				.woocommerce ul.products li.product a.woocommerce-loop-product__link:focus,
				.widget_product_categories li a:hover,
				.widget_rating_filter li a:hover,
				.woocommerce-widget-layered-nav-list li a:hover,
				.woocommerce-product-rating a:hover,
				.woocommerce .woocommerce-breadcrumb a:hover,
				.woocommerce .woocommerce-breadcrumb a:focus,
				.woocommerce-page .woocommerce-breadcrumb a:hover,
				.woocommerce-page .woocommerce-breadcrumb a:focus,
				.woocommerce table.shop_table .product-name a:hover,
				.woocommerce-MyAccount-navigation-link.is-active a,
				.woocommerce-MyAccount-navigation li a:hover,
				.woocommerce .products .add_to_wishlist:focus i,
				.woocommerce .products .add_to_wishlist:hover i,
				.woocommerce .products .wishlist-url:focus i,
				.woocommerce .products .wishlist-url:hover i,
				.amela-product__actions div>a.button:focus,
				.amela-product__actions div>a.button:hover,
				.woocommerce .product_meta a:focus,
				.woocommerce .product_meta a:hover,
				.product_list_widget a:hover,
				.woocommerce div.product form.cart .group_table .woocommerce-grouped-product-list-item__label a:focus,
				.woocommerce div.product form.cart .group_table .woocommerce-grouped-product-list-item__label a:hover,
				.woocommerce div.product form.cart .reset_variations:hover,
				.woocommerce .star-rating,
				.woocommerce p.stars a,
				.woocommerce .products .amela-product__add-to-cart a:focus,
				.woocommerce .products .amela-product__add-to-cart a:hover';
            $selectors['shop_primary_background_color'] = '.amela-item-counter,
				.eversor-products-slider .elementor-swiper-button:focus,
				.eversor-products-slider .elementor-swiper-button:hover,
				.select2-container--default .select2-results__option--highlighted[aria-selected],
				.select2-container--default .select2-results__option--highlighted[data-selected],
				.woocommerce-breadcrumb__separator,
				.widget_product_tag_cloud a:hover';
            $selectors['shop_buttons_color'] = '.woocommerce #respond input#submit,
				.woocommerce #respond input#submit.alt,
				.woocommerce a.button,
				.woocommerce a.button.alt,
				.woocommerce button.button,
				.woocommerce button.button.alt,
				.woocommerce input.button,
				.woocommerce input.button.alt,
				.woocommerce button.button.alt.disabled,
				.woocommerce #respond input#submit.alt:hover,
				.woocommerce #respond input#submit:hover,
				.woocommerce .coupon button.button:hover,
				.woocommerce .woocommerce-mini-cart__buttons>a:first-child:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce a.button:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce button.button:hover,
				.woocommerce input.button.alt:hover,
				.woocommerce input.button:hover,
				.woocommerce table.shop_table .actions>button.button:disabled:hover';
            $selectors['shop_primary_border_color'] = '#add_payment_method table.cart td.actions .coupon .input-text:focus,
				.woocommerce-cart #content table.cart td.actions .coupon .input-text:focus,
				.woocommerce-checkout table.cart td.actions .coupon .input-text:focus';
            $selectors['shop_buttons_color_hover'] = '.woocommerce #respond input#submit:hover,
				.woocommerce #respond input#submit.alt:hover,
				.woocommerce a.button:hover,
				.woocommerce a.button.alt:hover,
				.woocommerce button.button:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce input.button:hover,
				.woocommerce input.button.alt:hover,
				.woocommerce button.button.alt.disabled:hover';
            $selectors['shop_border_color'] = '.woocommerce div.product .woocommerce-tabs ul.tabs li,
				.woocommerce div.product .woocommerce-tabs .panel,
				.woocommerce div.product .woocommerce-tabs ul.tabs::before,
				.woocommerce .product-share,
				.woocommerce .quantity,
				.select2-container--default .select2-selection--single,
				.select2-dropdown,
				.select2-container--default .select2-search--dropdown .select2-search__field,
				.woocommerce #reviews #comments ol.commentlist li .comment-text,
				.woocommerce table.shop_table,
				.woocommerce table.shop_attributes,
				.woocommerce table.shop_attributes th,
				.woocommerce table.shop_attributes td,
				.woocommerce table.shop_table td,
				.woocommerce table.shop_table th,
				.woocommerce table.shop_table tbody th,
				.woocommerce table.shop_table tfoot td,
				.woocommerce table.shop_table tfoot th,
				#add_payment_method #payment,
				.woocommerce-cart #payment,
				.woocommerce-checkout #payment,
				#add_payment_method table.cart td.actions .coupon .input-text,
				.woocommerce-cart #content table.cart td.actions .coupon .input-text,
				.woocommerce-checkout table.cart td.actions .coupon .input-text,
				.wc_payment_methods li
				';
            $selectors['shop_headings_color'] = '.woocommerce div.product p.price,
				.woocommerce div.product span.price,
				.woocommerce #reviews #comments ol.commentlist li .meta .woocommerce-review__author,
				#add_payment_method #payment div.payment_box,
				.woocommerce-cart #payment div.payment_box,
				.woocommerce-checkout #payment div.payment_box,
				.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
				.comment-reply-title
			';
            $selectors['shop_text_color'] = '.woocommerce-product-search button[type=submit],
				.woocommerce div.product .woocommerce-tabs ul.tabs li a';
            $selectors['shop_secondary_font'] = '';
            $selectors['shop_sale_badge_background_color'] = '.woocommerce span.onsale';
            $selectors['shop_sale_badge_text_color'] = '.woocommerce span.onsale';
        }
        
        if ( function_exists( 'amela_get_typekit_fonts' ) ) {
            $typekit_fonts = amela_get_typekit_fonts();
        }
        $heading_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[1] )) ? $typekit_fonts[1] : 'Prata' );
        $body_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[0] )) ? $typekit_fonts[0] : 'Open Sans' );
        $heading_color = '#000000';
        $text_color = '#313131';
        $text_light_color = '#686868';
        $meta_color = '#818181';
        $primary_color = '#EE8D87';
        $secondary_color = '#d6763c';
        $border_color = '#E7E7E7';
        $mobile_menu_dividers_color = '#eaeaea';
        $bg_light = '#FBFBFB';
        $bg_dark = '#242424';
        $bp_xl_up = '@media (min-width: 1401px)';
        $bp_xl_down = '@media (max-width: 1400px)';
        $bp_lg_up = '@media (min-width: 1025px)';
        $bp_lg_down = '@media (max-width: 1024px)';
        // Kirki
        Kirki::add_config( 'amela_settings_config', array(
            'capability'  => 'edit_theme_options',
            'option_type' => 'theme_mod',
            'option_name' => 'amela_settings_config',
        ) );
        /**
         * SECTIONS / PANELS
         **/
        $priority = 20;
        $uniqid = 1;
        // 1. GENERAL PANEL
        Kirki::add_panel( 'amela_settings_general', array(
            'title'    => esc_attr__( 'General', 'amela' ),
            'priority' => $priority++,
        ) );
        // Form Elements
        Kirki::add_section( 'amela_settings_general_form_elements', array(
            'title' => esc_html__( 'Form Elements', 'amela' ),
            'panel' => 'amela_settings_general',
        ) );
        // Preloader
        Kirki::add_section( 'amela_settings_preloader', array(
            'title' => esc_html__( 'Preloader', 'amela' ),
            'panel' => 'amela_settings_general',
        ) );
        // Back to Top
        Kirki::add_section( 'amela_settings_back_to_top', array(
            'title' => esc_html__( 'Back to Top', 'amela' ),
            'panel' => 'amela_settings_general',
        ) );
        // 2. HEADER PANEL
        Kirki::add_panel( 'amela_settings_header', array(
            'title'    => esc_html__( 'Header & Logo', 'amela' ),
            'priority' => $priority++,
        ) );
        // Default Header
        Kirki::add_section( 'amela_settings_default_header', array(
            'title' => esc_html__( 'Header', 'amela' ),
            'panel' => 'amela_settings_header',
        ) );
        // Mobile Header
        Kirki::add_section( 'amela_settings_mobile_header', array(
            'title' => esc_html__( 'Mobile Header', 'amela' ),
            'panel' => 'amela_settings_header',
        ) );
        // Logo
        Kirki::add_section( 'amela_settings_logo', array(
            'title' => esc_html__( 'Logo', 'amela' ),
            'panel' => 'amela_settings_header',
        ) );
        // Primary Menu
        Kirki::add_section( 'amela_settings_primary_menu', array(
            'title' => esc_html__( 'Primary Menu', 'amela' ),
            'panel' => 'amela_settings_header',
        ) );
        // Top Bar
        Kirki::add_section( 'amela_settings_top_bar', array(
            'title' => esc_html__( 'Top Bar', 'amela' ),
            'panel' => 'amela_settings_header',
        ) );
        // 3. FOOTER
        Kirki::add_section( 'amela_settings_footer', array(
            'title'    => esc_html__( 'Footer', 'amela' ),
            'priority' => $priority++,
        ) );
        // 4. LAYOUT PANEL
        Kirki::add_panel( 'amela_settings_layout', array(
            'title'    => esc_html__( 'Layout', 'amela' ),
            'priority' => $priority++,
        ) );
        // Content
        Kirki::add_section( 'amela_settings_content_layout', array(
            'title' => esc_html__( 'Content', 'amela' ),
            'panel' => 'amela_settings_layout',
        ) );
        // Blog Layout
        Kirki::add_section( 'amela_settings_blog_layout', array(
            'title'       => esc_html__( 'Blog', 'amela' ),
            'description' => esc_html__( 'Layout options for the blog pages', 'amela' ),
            'panel'       => 'amela_settings_layout',
        ) );
        // Page Layout
        Kirki::add_section( 'amela_settings_page_layout', array(
            'title'       => esc_html__( 'Page', 'amela' ),
            'description' => esc_html__( 'Layout options for the regular pages', 'amela' ),
            'panel'       => 'amela_settings_layout',
        ) );
        // Archive Layout
        Kirki::add_section( 'amela_settings_archive_layout', array(
            'title'       => esc_html__( 'Archive', 'amela' ),
            'description' => esc_html__( 'Layout options for archive and categories pages', 'amela' ),
            'panel'       => 'amela_settings_layout',
        ) );
        if ( amela_is_woocommerce_activated() ) {
            // Shop Layout
            Kirki::add_section( 'amela_settings_shop_layout', array(
                'title'       => esc_html__( 'Shop', 'amela' ),
                'description' => esc_html__( 'Layout options for shop catalog pages', 'amela' ),
                'panel'       => 'amela_settings_layout',
            ) );
        }
        // Search Results Layout
        Kirki::add_section( 'amela_settings_search_results_layout', array(
            'title'       => esc_html__( 'Search Results', 'amela' ),
            'description' => esc_html__( 'Layout options for search result page', 'amela' ),
            'panel'       => 'amela_settings_layout',
        ) );
        // 5. COLORS
        Kirki::add_section( 'amela_settings_colors', array(
            'title'    => esc_html__( 'Colors', 'amela' ),
            'priority' => $priority++,
        ) );
        // 6. TYPOGRAPHY
        Kirki::add_section( 'amela_settings_typography', array(
            'title'    => esc_html__( 'Typography', 'amela' ),
            'priority' => $priority++,
        ) );
        // 7. BLOG PANEL
        Kirki::add_panel( 'amela_settings_blog', array(
            'title'    => esc_html__( 'Blog', 'amela' ),
            'priority' => $priority++,
        ) );
        // Post Meta
        Kirki::add_section( 'amela_settings_post_meta', array(
            'title'       => esc_html__( 'Post Meta', 'amela' ),
            'description' => esc_html__( 'These options will apply to the default WordPress posts. Customize Elementor widgets post meta via Elementor.', 'amela' ),
            'panel'       => 'amela_settings_blog',
        ) );
        // Single Post
        Kirki::add_section( 'amela_settings_single_post', array(
            'title' => esc_html__( 'Single Post', 'amela' ),
            'panel' => 'amela_settings_blog',
        ) );
        // Social Share
        Kirki::add_section( 'amela_settings_social_share', array(
            'title' => esc_html__( 'Social Share Buttons', 'amela' ),
            'panel' => 'amela_settings_blog',
        ) );
        // Newsletter
        Kirki::add_section( 'amela_settings_newsletter', array(
            'title' => esc_html__( 'Newsletter', 'amela' ),
            'panel' => 'amela_settings_blog',
        ) );
        // Post Excerpt
        Kirki::add_section( 'amela_settings_post_excerpt', array(
            'title' => esc_html__( 'Excerpt', 'amela' ),
            'panel' => 'amela_settings_blog',
        ) );
        // Read More
        Kirki::add_section( 'amela_settings_read_more', array(
            'title' => esc_html__( 'Read More', 'amela' ),
            'panel' => 'amela_settings_blog',
        ) );
        // 8. PAGE TITLE
        Kirki::add_section( 'amela_settings_page_title', array(
            'title'    => esc_html__( 'Page Title / Breadcrumbs', 'amela' ),
            'priority' => $priority++,
        ) );
        // 11. PAGE 404
        Kirki::add_section( 'amela_settings_page_404', array(
            'title'       => esc_html__( 'Page 404', 'amela' ),
            'description' => esc_html__( 'Settings for page 404', 'amela' ),
            'priority'    => $priority++,
        ) );
        // Load modules
        require_once AMELA_DIR . '/includes/customizer/modules/general.php';
        require_once AMELA_DIR . '/includes/customizer/modules/header.php';
        require_once AMELA_DIR . '/includes/customizer/modules/footer.php';
        require_once AMELA_DIR . '/includes/customizer/modules/layout.php';
        require_once AMELA_DIR . '/includes/customizer/modules/page-title.php';
        require_once AMELA_DIR . '/includes/customizer/modules/blog.php';
        require_once AMELA_DIR . '/includes/customizer/modules/colors.php';
        require_once AMELA_DIR . '/includes/customizer/modules/typography.php';
        require_once AMELA_DIR . '/includes/customizer/modules/page-404.php';
        if ( amela_is_woocommerce_activated() ) {
            require_once AMELA_DIR . '/includes/customizer/modules/woocommerce.php';
        }
    }
    
    amela_customizer_options();
}

// endif Kirki check