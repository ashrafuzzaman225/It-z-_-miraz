<?php
/**
 * Page title.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( amela_is_woocommerce_activated() ) {
	if ( is_page('wishlist') ) {
		return;
	}

	if ( is_checkout() && get_theme_mod( 'amela_settings_woocommerce_distraction_free_checkout', false ) ) {
		get_template_part( 'template-parts/header/header-checkout-template' );
		return;
	}
}

if ( ! get_theme_mod( 'amela_settings_regular_pages_page_title_show', true ) ) {
	return;
}

if ( amela_is_woocommerce_activated() && is_account_page() && ! is_user_logged_in() ) {
	return;
}

$page_subtitle = get_post_meta( get_the_ID(), '_amela_page_subtitle', true );
?>

<!-- Page Title -->
<div <?php amela_page_title_atts( 'regular_pages' ); ?>>
	<div class="container">
		<div class="page-title__holder">
			<?php amela_page_title_before(); ?>
			<?php if ( ! is_front_page() ) : ?>
				<h1 class="page-title__title"><?php single_post_title(); ?></h1>
			<?php else : ?>
				<h1 class="page-title__title"><?php the_title(); ?></h1>
			<?php endif; ?>
			<?php amela_page_title_after(); ?>
			<?php if ( $page_subtitle ) : ?>
				<!-- Subtitle -->
				<p class="page-title__subtitle"><?php echo esc_html( $page_subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div> <!-- .page-title -->