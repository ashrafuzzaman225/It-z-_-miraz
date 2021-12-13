<?php
/**
 * Template parts.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

add_action( 'amela_header_before', 'amela_top_bar' );
add_action( 'amela_header', 'amela_header_markup' );
add_action( 'amela_masthead', 'amela_masthead_template' );
add_action( 'amela_menu_after', 'amela_last_menu_item' );
add_action( 'amela_footer', 'amela_footer_template' );
add_action( 'amela_comments', 'amela_comments_template' );
add_action( 'amela_page_title_after', 'amela_breadcrumbs' );
add_action( 'amela_entry_section_before', 'amela_breadcrumbs' );
add_action( 'amela_entry_featured_image', 'amela_featured_image_markup' );


/**
 * Get site Header
 */
if ( ! function_exists( 'amela_header_markup' ) ) {
	function amela_header_markup() {
		if ( ! get_theme_mod( 'amela_settings_header_show', true ) ) {
			return;
		}

		if ( amela_is_woocommerce_activated() ) {
			if ( is_checkout() && get_theme_mod( 'amela_settings_woocommerce_distraction_free_checkout', false ) ) {
				return;
			}
		}

		$header_classes = array( 'amela-header', 'nav' );
		$header_sticky = ( get_theme_mod( 'amela_settings_sticky_header_show', true ) ) ? 'nav--sticky ' : '';
		$header_layout = get_theme_mod( 'amela_settings_header_layout', 'header-layout-1' );

		switch ( $header_layout ) {
			case 'header-layout-1':
				$header_classes[] = 'amela-header-layout-1';
				break;

			case 'header-layout-2':
				$header_classes[] = 'amela-header-layout-2';
				break;

			case 'header-layout-3':
				$header_classes[] = 'amela-header-layout-3';
				break;
		}

		$header_classes = implode( ' ', $header_classes );
		?>	

		<header class="<?php echo esc_attr( $header_classes ); ?>" role="banner" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
			<div class="nav__holder <?php echo esc_attr( $header_sticky ); ?>">
				<div class="nav__container container">
					<div class="nav__flex-parent flex-parent">

						<?php amela_masthead(); ?>

					</div> <!-- .flex-parent -->
				</div> <!-- .nav__container -->
			</div> <!-- .nav__holder -->
		</header> <!-- .amela-header -->		
		
		<?php
	}
}


/**
 * Header main template
 */
if ( ! function_exists( 'amela_masthead_template' ) ) {
	function amela_masthead_template() {
		get_template_part( 'template-parts/header/header-main-template' );
	}
}


/**
 * Header last item in menu
 */
if ( ! function_exists( 'amela_last_menu_item' ) ) {
	function amela_last_menu_item( $is_mobile = false ) {
		$text_html = get_theme_mod( 'amela_settings_header_last_menu_item_text_html' );
		$hide_on_mobile = get_theme_mod( 'amela_settings_header_last_menu_item_hide', false );

		$search = get_theme_mod( 'amela_settings_header_last_menu_item_search', true );
		$cart = get_theme_mod( 'amela_settings_header_last_menu_item_shopping_cart', true );
		$account = get_theme_mod( 'amela_settings_header_last_menu_item_account', true );		
		$html = get_theme_mod( 'amela_settings_header_last_menu_item_html', false );

		if ( $hide_on_mobile ) {
			return;
		}

		if ( false === $search && false === $cart && false === $account && false === $html ) {
			return;
		}

		if ( ! $is_mobile ) {
			echo '<div class="nav__right d-lg-flex d-none">';
		}		

			if ( $search ) { ?>
				<div class="nav__right-item">
					<div class="amela-menu-search">
						<button type="button" class="amela-menu-search__trigger" title="<?php echo esc_attr__( 'Open Search', 'amela' ); ?>">
							<i class="amela-icon-search amela-menu-search__icon" aria-hidden="true"></i>
						</button>
						<div class="amela-menu-search-modal" tabindex="-1" aria-hidden="true" aria-label="<?php echo esc_attr( 'Search Modal', 'amela' ); ?>">
							<div class="amela-menu-search-modal__inner">
								<div class="container">
									<?php get_search_form(); ?>
								</div>				
							</div>
						</div>
					</div>
				</div>				
				<?php
			}
			
			if ( $account && amela_is_woocommerce_activated() ) { ?>
				<div class="nav__right-item amela-menu-account">		
					<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="amela-menu-account__url">
						<i class="amela-icon-user amela-menu-account__icon" aria-hidden="true"></i>
					</a>
				</div>
				<?php					
			}

			if ( $cart && amela_is_woocommerce_activated() ) {
				echo '<div class="nav__right-item">';
					amela_woo_cart_icon( 'true' );
				echo '</div>';
			}

			if ( $html ) {
				echo '<div class="nav__right-item">';
					// We don't escape output here, so user can enter any HTML
					echo do_shortcode( $text_html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '</div>';
			}

		if ( ! $is_mobile ) {
			echo '</div>';
		}

	}
}


/**
 * Top bar
 */
if ( ! function_exists( 'amela_top_bar' ) ) {
	function amela_top_bar() {
		if ( class_exists( 'woocommerce' ) ) {
			if ( is_checkout() && get_theme_mod( 'amela_settings_woocommerce_distraction_free_checkout', false ) ) {
				return;
			}
		}

		$message = get_theme_mod( 'amela_settings_top_bar_message', esc_html__( 'Free Shipping & Returns On All US Orders', 'amela' ) );
		$url = get_theme_mod( 'amela_settings_top_bar_url', '#' );
		
		$customizer = get_theme_mod( 'amela_settings_top_bar_show', false );
		$meta = get_post_meta( get_the_ID(), '_amela_top_bar_hide', true );

		if ( is_archive() || is_404() || is_search() || is_home() ) {
			$meta = '';
		}

		if ( $customizer && $meta != '1' ) {
			?>
			<div class="top-bar">
				<div class="container">
					<a href="<?php echo esc_url( $url ); ?>" class="top-bar__url">
						<p class="top-bar__message"><?php echo esc_html( $message ); ?></p>
					</a>				
				</div>
			</div>
			<?php
		}
	}
}


/**
 * Mobile menu
 */
if ( ! function_exists( 'amela_menu_mobile' ) ) {
	function amela_menu_mobile() { ?>
		<div class="nav__mobile d-lg-none">

			<?php amela_last_menu_item( true ); ?>

			<?php if ( has_nav_menu('primary-menu') ) : ?>
				<!-- Mobile toggle -->
				<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
					<span class="visually-hidden"><?php esc_html_e( 'Toggle navigation', 'amela' ); ?></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
				</button>
			<?php endif; ?>

		</div>
		<?php
	}
}


/**
 * Logo
 */
if ( ! function_exists( 'amela_logo' ) ) {
	function amela_logo() {
		$width = get_theme_mod( 'amela_settings_header_logo_width' );
		$logo_id = attachment_url_to_postid( get_theme_mod( 'amela_settings_logo_dark' ) );
		$size = ( is_customize_preview() ) ? 'full' : [ $width, 0 ];
		$logo = wp_get_attachment_image_src( $logo_id, $size );
		?>

		<!-- Logo -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-url logo-dark" itemtype="https://schema.org/Organization" itemscope="itemscope">
			<?php if ( get_theme_mod( 'amela_settings_logo_dark' ) ) : ?>
				<img src="<?php echo esc_attr( get_theme_mod( 'amela_settings_logo_dark' ) ) ?>"
				class="logo logo--dark"
				width="<?php echo esc_attr( $logo[1] ); ?>"
				height="<?php echo esc_attr( $logo[2] ); ?>"
				alt="<?php bloginfo( 'name' ) ?>" />
			<?php else : ?>
				<span class="site-title site-title--dark"><?php bloginfo( 'name' ) ?></span>
				<?php $tagline = get_bloginfo( 'description', 'display' ); ?>
				<p class="site-tagline"><?php echo esc_html( $tagline ); ?></p>
			<?php endif; ?>
		</a>

		<?php
	}
}


/**
 * Footer main template
 */
if ( ! function_exists( 'amela_footer_template' ) ) {
	function amela_footer_template() {
		if ( class_exists( 'woocommerce' ) ) {
			if ( is_checkout() && get_theme_mod( 'amela_settings_woocommerce_distraction_free_checkout', false ) ) {
				return;
			}
		}
		get_template_part( 'template-parts/footer/footer-main-template' );
	}
}


/**
 * Comments template
 */
if ( ! function_exists( 'amela_comments_template' ) ) {
	function amela_comments_template() {
	
		if ( comments_open() || get_comments_number() ) : ?>
			<!-- Comments -->
			<?php if ( amela_is_elementor_page() ) : ?>
				<div class="container">
			<?php else: ?>
				<div class="comments-wrap">
			<?php endif; ?>
				<?php comments_template(); ?>
			</div>
		<?php endif;
	}
}


/**
 * Preloader
 */
if ( ! function_exists( 'amela_preloader' ) ) {
	function amela_preloader() {
		if ( get_theme_mod( 'amela_settings_preloader_show', false ) ) : ?>
			<div class="loader-mask">
				<div class="loader">
					<div></div>
				</div>
			</div>
		<?php endif;
	}
}

/**
 * Back to top
 */
if ( ! function_exists( 'amela_back_to_top' ) ) {
	function amela_back_to_top() {
		if ( get_theme_mod( 'amela_settings_back_to_top_show', true ) ) : ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top" aria-label="<?php echo esc_attr__( 'Back to top', 'amela' )?>"><i class="amela-icon-chevron-up" aria-hidden="true"></i></a>
			</div>
		<?php endif; 
	}
}

/**
 * Content markup top
 */
if ( ! function_exists( 'amela_primary_content_markup_top' ) ) {
	function amela_primary_content_markup_top() {
		?>
			<div class="container">
				<div class="row">
		<?php
	}
}


/**
 * Content markup bottom
 */
if ( ! function_exists( 'amela_primary_content_markup_bottom' ) ) {
	function amela_primary_content_markup_bottom() {
		?>
				</div>
			</div>
		<?php
	}
}


if ( ! function_exists( 'amela_page_title_atts' ) ) {
	/**
	* Page title attributes
	*
	* @since 1.0.0
	*/
	function amela_page_title_atts( $template ) {
		$atts = '';
		$layout = get_theme_mod( 'amela_settings_' . $template . '_page_title_layout', 'page-title-layout-1' );
		$image = get_theme_mod( 'amela_settings_' . $template . '_page_title_image' );

		$classes = array(
			'page-title',
			$layout,
			'page-title-' . $template
		);

		if ( 'page-title-layout-2' === $layout ) {
			$classes[] = 'bg-overlay';
			$classes[] = 'bg-overlay--dark';

			if ( is_page() || is_single() && has_post_thumbnail() ) {
				$background_image = 'background-image: url(' . get_the_post_thumbnail_url() . ')';
			}

			if ( ! empty( $image ) ) {
				if ( is_home() || is_archive() || is_search() ) {
					$background_image = 'background-image: url(' . esc_url( $image ) . ')';
				}
			}
		}


		$classes = array_map( 'esc_attr', $classes );

		$classes = implode( ' ', $classes );

		$atts = 'class="' . esc_attr( $classes ) . '"';

		if ( isset( $background_image ) ) {
			$atts .= ' style="' . esc_attr( $background_image ) . '"'; 
		}		

		echo html_entity_decode( esc_attr( $atts ) );
	}
}

if ( ! function_exists( 'amela_breadcrumbs' ) ) {
	/**
	* Breadcrumbs
	*
	* @since 1.0.0
	*/
	function amela_breadcrumbs() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			return;
		}

		if ( is_archive() && ! is_search() && get_theme_mod( 'amela_settings_archives_breadcrumbs_show', true ) ) {
			
			if ( amela_is_woocommerce_activated() ) {
				if ( is_shop() ) {
					return;
				}				
			}

			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}

		if ( amela_is_woocommerce_activated() ) {
			if ( is_shop() && get_theme_mod( 'amela_settings_shop_breadcrumbs_show', true ) ) {
				breadcrumb_trail( array(
					'show_browse' => false,
				) );
			}
		}

		if ( is_search() && get_theme_mod( 'amela_settings_search_results_breadcrumbs_show', true ) ) {
			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}

		if ( is_page() || is_home() && get_theme_mod( 'amela_settings_regular_pages_breadcrumbs_show', true ) ) {

			if ( amela_is_woocommerce_activated() ) {
				if ( is_shop() ) {
					return;
				}				
			}

			breadcrumb_trail( array(
				'show_browse' => false,
			) );
		}
		
		if ( is_single() && get_theme_mod( 'amela_settings_single_post_breadcrumbs_show', false ) ) { ?>
			<div class="breadcrumbs-wrap">
				<div class="container">
					<?php breadcrumb_trail( array(
						'show_browse' => false,
					) ); ?>
				</div>
			</div>
			<?php
		}	
	}
}

if ( ! function_exists( 'amela_featured_image_markup' ) ) {
	/**
	* Single Entry Featured Image
	*
	* @since 1.0.0
	*/
	function amela_featured_image_markup() {
		if ( has_post_thumbnail() && get_theme_mod( 'amela_settings_single_featured_image_show', true ) ) : ?>

			<!-- Featured Image -->
			<div class="single-post__featured-img">
				<figure class="single-post__featured-img-container">
					<?php the_post_thumbnail( 'amela_featured_large', array( 'class' => 'single-post__featured-img-image' )); ?>
				</figure>
			</div>

		<?php endif;
	}
}

if ( ! function_exists( 'amela_read_more' ) ) {
	/**
	* Read more
	*
	* @since 1.0.0
	*/
	function amela_read_more() {
		$text = get_theme_mod( 'amela_settings_read_more_text', __( 'Read More', 'amela' ) );

		if ( get_theme_mod( 'amela_settings_read_more_show', false ) ) : ?>
			<!-- Read More -->
			<div class="entry__read-more">			
				<a href="<?php the_permalink(); ?>" class="read-more">
					<?php if ( $text ) : ?>
						<span class="read-more__text">							
							<?php printf( '<span class="screen-reader-text">' . get_the_title() . '</span> ' . esc_html( $text ) ); ?>
						</span>						
					<?php endif; ?>
					<i class="read-more__icon amela-icon-chevron-right" aria-hidden="true"></i>
				</a>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'amela_footer_bottom_text' ) ) {

	/**
	 * Footer bottom text
	 *
	 * @since 1.0.0
	 */
	function amela_footer_bottom_text() {
		$output = get_theme_mod( 'amela_settings_footer_bottom_text', sprintf(
			esc_html__( 'Copyright &copy; [current-year] %1$s' , 'amela' ),
			get_bloginfo( 'name' )
		) );

		$output = str_replace( '[current-year]', date_i18n( 'Y' ), $output );

		echo do_shortcode( wp_kses_post( $output ) );
	}
}


if ( ! function_exists( 'amela_newsletter_box' ) ) {

	/**
	 * Newsletter box
	 *
	 * @since 1.0.0
	 */
	function amela_newsletter_box() {
		$image = get_theme_mod( 'amela_settings_newsletter_image', [ 'url' => AMELA_URI . '/assets/img/newsletter/amela_newsletter-min.jpg', 'id' => 0, 'width' => '640', 'height' => '468' ] );
		$title = get_theme_mod( 'amela_settings_newsletter_title', __( 'Sign up now & get 10% off', 'amela' ) );
		$text = get_theme_mod( 'amela_settings_newsletter_text', __( 'Be the first to know about our new arrivals and exclusive offers.', 'amela' ) );

		?>
		<div class="newsletter single-post__newsletter">
			<div class="newsletter__body">

				<?php if ( isset( $image['url'] ) ) : ?>
					<figure class="newsletter__img-holder">
						<?php	$image_alt = get_post_meta( $image['id'], '_wp_attachment_image_alt', true ); ?>
						<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image_alt ) ?>" width="<?php echo esc_attr( $image['width'] ) ?>" height="<?php echo esc_attr( $image['height'] ) ?>" class="newsletter__img" />
					</figure>
				<?php endif; ?>

				<div class="newsletter__content">
					<div class="newsletter__content-inner">

						<?php if ( $title ) : ?>
							<h4 class="newsletter__title"><?php echo esc_html( $title ); ?></h4>
						<?php endif; ?>

						<?php if ( $text ) : ?>
							<p class="newsletter__text"><?php echo esc_html( $text ); ?></p>
						<?php endif; ?>

						<div class="newsletter__form">
							<?php dynamic_sidebar( 'amela-newsletter' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}