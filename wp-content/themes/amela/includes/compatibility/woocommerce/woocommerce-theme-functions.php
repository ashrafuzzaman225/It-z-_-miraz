<?php

/**
 * WooCommerce Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
if ( !function_exists( 'amela_hover_shop_loop_image' ) ) {
    /**
     * Product image back on hover
     */
    function amela_hover_shop_loop_image()
    {
        $image_id = ( isset( wc_get_product()->get_gallery_image_ids()[0] ) ? wc_get_product()->get_gallery_image_ids()[0] : null );
        if ( $image_id ) {
            echo  wp_get_attachment_image(
                $image_id,
                'woocommerce_thumbnail',
                '',
                [
                'class' => 'amela-product-image-back',
            ]
            ) ;
        }
    }

}

if ( class_exists( 'YITH_WCQV' ) ) {
    /**
     * Remove Quickview button
     */
    function amela_remove_quickview()
    {
        remove_action( 'woocommerce_after_shop_loop_item', 'yith_add_quick_view_button', 9999 );
    }
    
    add_action( 'yith_wcqv_init', 'amela_remove_quickview' );
}

if ( defined( 'YITH_WCWL' ) && !function_exists( 'amela_wishlist_count' ) ) {
    /**
     * Wislist count
     */
    function amela_wishlist_count()
    {
        ob_start();
        ?>
		<span class="yith-wcwl-items-count">
			<?php 
        echo  esc_html( yith_wcwl_count_all_products() ) ;
        ?>
		</span>
		<?php 
        return ob_get_clean();
    }

}

if ( defined( 'YITH_WCWL' ) && !function_exists( 'amela_wishlist_ajax_update_count' ) ) {
    /**
     * Wislist Ajax update
     */
    function amela_wishlist_ajax_update_count()
    {
        wp_send_json( array(
            'count' => yith_wcwl_count_all_products(),
        ) );
    }
    
    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'amela_wishlist_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'amela_wishlist_ajax_update_count' );
}

if ( !function_exists( 'amela_woo_cart_icon' ) ) {
    /**
     * WooCommerce cart icon
     */
    function amela_woo_cart_icon( $minicart_show = 'false' )
    {
        if ( !amela_is_woocommerce_activated() || is_null( WC()->cart ) ) {
            return;
        }
        $count = WC()->cart->get_cart_contents_count();
        $minicart_show = ( $minicart_show === 'true' ? true : false );
        $classes = [ 'amela-menu-cart__url' ];
        if ( $minicart_show ) {
            $classes[] = 'amela-offcanvas-js-trigger';
        }
        ?>

		<div class="amela-menu-cart woocommerce">
			<a class="<?php 
        echo  esc_attr( implode( ' ', $classes ) ) ;
        ?>" href="<?php 
        echo  esc_url( wc_get_cart_url() ) ;
        ?>" title="<?php 
        echo  esc_attr__( 'View my shopping cart', 'amela' ) ;
        ?>">
				<span class="amela-menu-cart__icon-holder">
					<i class="amela-icon-cart amela-menu-cart__icon" aria-hidden="true"></i>
					<span class="amela-menu-cart__count amela-item-counter <?php 
        if ( 0 === $count ) {
            'd-none';
        }
        ?>"><?php 
        echo  esc_html( $count ) ;
        ?></span>
				</span>
			</a>

			<?php 
        ?>

		</div>
		<?php 
    }

}
if ( !function_exists( 'amela_woo_cart_ajax_count' ) ) {
    /**
     * WooCommerce Ajax cart contents update
     */
    function amela_woo_cart_ajax_count( $fragments )
    {
        if ( !amela_is_woocommerce_activated() || is_null( WC()->cart ) ) {
            return;
        }
        $count = WC()->cart->get_cart_contents_count();
        // count
        
        if ( 0 === $count ) {
            $fragments['.amela-menu-cart__count'] = '<span class="amela-menu-cart__count amela-item-counter d-none">' . esc_html( $count ) . '</span>';
        } else {
            $fragments['.amela-menu-cart__count'] = '<span class="amela-menu-cart__count amela-item-counter">' . esc_html( $count ) . '</span>';
        }
        
        // mini-cart
        ob_start();
        echo  '<div class="amela-offcanvas__mini-cart">' ;
        
        if ( 0 === $count ) {
            echo  '<div class="amela-offcanvas__mini-cart-empty">' ;
            echo  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>' ;
        }
        
        woocommerce_mini_cart();
        if ( 0 === $count ) {
            echo  '</div>' ;
        }
        echo  '</div>' ;
        $fragments['.amela-offcanvas__mini-cart'] = ob_get_clean();
        return $fragments;
    }

}
if ( !function_exists( 'amela_shop_before_content' ) ) {
    /**
     * Archives layout before
     */
    function amela_shop_before_content()
    {
        ?>
			<?php 
        amela_shop_page_title();
        ?>

			<div class="shop-section main-content-shop">
				<div class="container">

					<div class="row">
	
						<div class="shop-content content col-lg">
		<?php 
    }

}
if ( !function_exists( 'amela_shop_after_content' ) ) {
    /**
     * Archives layout after
     */
    function amela_shop_after_content()
    {
        ?>
						</div> <!-- .col -->
		
						<?php 
        if ( 'fullwidth' !== amela_layout_type( 'shop', 'left-sidebar' ) && !is_product() ) {
            do_action( 'amela_shop_sidebar' );
        }
        ?>

					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- .main-content -->
		<?php 
    }

}
if ( !function_exists( 'amela_product_markup_open' ) ) {
    /**
     * Product markup open
     */
    function amela_product_markup_open()
    {
        ?>
			<div class="amela-product">
				<div class="amela-product__image-holder">
		<?php 
    }

}
if ( !function_exists( 'amela_product_before_add_to_cart' ) ) {
    /**
     * Product before add to cart
     */
    function amela_product_before_add_to_cart()
    {
        ?>
			<div class="amela-product__overlay">
		<?php 
    }

}
if ( !function_exists( 'amela_product_action_icons_open' ) ) {
    /**
     * Product action icons open
     */
    function amela_product_action_icons_open()
    {
        echo  '<div class="amela-product__action-icons">' ;
    }

}
if ( !function_exists( 'amela_product_add_to_wishlist' ) ) {
    /**
     * Product add to wishlisht
     */
    function amela_product_add_to_wishlist()
    {
        if ( class_exists( 'YITH_WCWL' ) ) {
            echo  do_shortcode( '[yith_wcwl_add_to_wishlist icon="fa-heart-o"]' ) ;
        }
    }

}
if ( !function_exists( 'amela_product_add_to_cart' ) ) {
    /**
     * Product add to cart
     */
    function amela_product_add_to_cart()
    {
        echo  '<div class="amela-product__add-to-cart">' ;
        echo  '<span class="amela-product__action-icons-label">' . esc_html__( 'Add to cart', 'amela' ) . '</span>' ;
        echo  woocommerce_template_loop_add_to_cart() ;
        echo  '</div>' ;
    }

}
if ( !function_exists( 'amela_product_action_icons_close' ) ) {
    /**
     * Product action icons close
     */
    function amela_product_action_icons_close()
    {
        echo  '</div>' ;
    }

}
if ( !function_exists( 'amela_product_quickview' ) ) {
    /**
     * Product quickview
     */
    function amela_product_quickview()
    {
        
        if ( class_exists( 'YITH_WCQV' ) ) {
            echo  '<div class="amela-product__actions">' ;
            echo  '<div class="amela-product__quickview-button">' ;
            echo  do_shortcode( '[yith_quick_view]' ) ;
            echo  '</div> <!-- .amela-product__quickview-button -->' ;
            echo  '</div> <!-- .amela-product__actions -->' ;
        }
    
    }

}
if ( !function_exists( 'amela_product_after_add_to_cart' ) ) {
    /**
     * Product after add to cart
     */
    function amela_product_after_add_to_cart()
    {
        ?>
			</div> <!-- .amela-product__overlay -->
		<?php 
    }

}
if ( !function_exists( 'amela_product_image_holder_close' ) ) {
    /**
     * Product image holder close
     */
    function amela_product_image_holder_close()
    {
        ?>
			</div> <!-- .amela-product__image-holder -->
		<?php 
    }

}
if ( !function_exists( 'amela_product_outer_close' ) ) {
    /**
     * Product after link close
     */
    function amela_product_outer_close()
    {
        ?>
			</div> <!-- .amela-product -->
			<div class="amela-product__body">
		<?php 
    }

}
if ( !function_exists( 'amela_product_title' ) ) {
    /**
     * Product title
     */
    function amela_product_title()
    {
        echo  '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' ;
        woocommerce_template_loop_product_link_open();
        echo  get_the_title() ;
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        woocommerce_template_loop_product_link_close();
        echo  '</h2>' ;
    }

}
if ( !function_exists( 'amela_product_subtitle' ) ) {
    /**
     * Product subtitle
     */
    function amela_product_subtitle()
    {
        $subtitle = get_post_meta( get_the_ID(), '_amela_product_subtitle', true );
        if ( $subtitle ) {
            echo  '<span class="amela-product__subtitle">' . esc_html( $subtitle ) . '</span>' ;
        }
    }

}
if ( !function_exists( 'amela_after_product_price' ) ) {
    /**
     * Product after price
     */
    function amela_after_product_price()
    {
        echo  '</div> <!-- .amela-product__body -->' ;
    }

}
if ( !function_exists( 'amela_product_share' ) ) {
    /**
     * Product share
     */
    function amela_product_share()
    {
        if ( !get_theme_mod( 'amela_settings_product_share_buttons_show', true ) ) {
            return;
        }
        
        if ( function_exists( 'amela_social_sharing_buttons' ) ) {
            ?>
			<div class="product-share">
				<?php 
            echo  '<span class="product-share__label">' . esc_html__( 'Share', 'amela' ) . '</span>' ;
            echo  amela_social_sharing_buttons( 'socials--no-base', 'product' ) ;
            ?>
			</div>
		<?php 
        }
    
    }

}
if ( !function_exists( 'amela_loop_add_to_cart_link' ) ) {
    /**
     * Product add to cart link
     */
    function amela_loop_add_to_cart_link( $quantity, $product, $args )
    {
        return sprintf(
            '<a href="%s" data-quantity="%s" class="add_to_cart add_to_cart_button %s" %s>
				<span class="amela-product__action-icons-label">%s</span>
				<i class="amela-icon-cart" aria-hidden="true"></i>
			</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( ( isset( $args['quantity'] ) ? $args['quantity'] : 1 ) ),
            esc_attr( ( isset( $args['class'] ) ? $args['class'] : '' ) ),
            ( isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '' ),
            esc_html( $product->add_to_cart_text() )
        );
    }

}
add_filter(
    'woocommerce_loop_add_to_cart_link',
    'amela_loop_add_to_cart_link',
    10,
    3
);
if ( !function_exists( 'amela_shop_page_title' ) ) {
    /**
     * Shop page title
     */
    function amela_shop_page_title()
    {
        if ( is_woocommerce() && !is_product() ) {
            get_template_part( 'template-parts/page-title/page-title-shop' );
        }
    }

}
if ( !function_exists( 'amela_shop_get_sidebar' ) ) {
    /**
     * Display shop sidebar
     *
     * @uses amela_sidebar()
     * @since 1.0.0
     */
    function amela_shop_get_sidebar()
    {
        if ( is_active_sidebar( 'amela-shop-sidebar' ) ) {
            amela_sidebar( 'amela-shop-sidebar' );
        }
    }

}
if ( !function_exists( 'amela_shop_breadcrumbs' ) ) {
    /**
     * WooCommerce breadcrumbs
     */
    function amela_shop_breadcrumbs()
    {
        if ( !get_theme_mod( 'amela_settings_shop_breadcrumbs_show', true ) ) {
            return;
        }
        woocommerce_breadcrumb();
    }

}
if ( !function_exists( 'amela_shop_breadcrumb_delimiter' ) ) {
    /**
     * Change the breadcrumb separator
     */
    function amela_shop_breadcrumb_delimiter( $defaults )
    {
        $defaults['delimiter'] = '<span class="woocommerce-breadcrumb__separator"></span>';
        return $defaults;
    }

}
if ( !function_exists( 'amela_shop_tag_cloud_widget' ) ) {
    /**
     * Tag cloud font size
     */
    function amela_shop_tag_cloud_widget( $args )
    {
        $args = array(
            'smallest' => 10,
            'largest'  => 10,
            'taxonomy' => 'product_tag',
        );
        return $args;
    }

}
if ( !function_exists( 'amela_quantity_plus_sign' ) ) {
    /**
     * Quantity plus
     */
    function amela_quantity_plus_sign()
    {
        echo  '<span class="quantity__button quantity__plus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>' ;
    }

}
if ( !function_exists( 'amela_quantity_minus_sign' ) ) {
    /**
     * Quantity minus
     */
    function amela_quantity_minus_sign()
    {
        echo  '<span class="quantity__button quantity__minus"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>' ;
    }

}
if ( !function_exists( 'amela_woocommerce_before_customer_login_form' ) ) {
    /**
     * My account before login form
     */
    function amela_woocommerce_before_customer_login_form()
    {
        echo  '<div class="deo-login-form-container">' ;
    }

}
if ( !function_exists( 'amela_woocommerce_after_customer_login_form' ) ) {
    /**
     * My account after login form
     */
    function amela_woocommerce_after_customer_login_form()
    {
        echo  '</div>' ;
    }

}