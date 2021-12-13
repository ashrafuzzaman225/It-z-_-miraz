<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Amela
 */

get_header();

$image = get_theme_mod( 'amela_settings_page_404_image', AMELA_URI . '/assets/img/404/amela_404_background-min.jpg' );
$title = get_theme_mod( 'amela_settings_page_404_title', __( 'Sorry this page isn’t available', 'amela' ) );
$description = get_theme_mod( 'amela_settings_page_404_description', __( 'The page you were looking for couldn’t be found.', 'amela' ) );
$button_text = get_theme_mod( 'amela_settings_page_404_button_text', __( 'Back to Homepage', 'amela' ) );

?>

<div class="page-404">
	<section class="page-404-section bg-light">
		<main class="site-main" role="main">
			<div class="container container--wider relative">
				<div class="row page-404__container g-0">

					<div class="col-md-6 page-404__info d-flex flex-column align-items-center justify-content-center">
						<h1 class="page-404__title mt-48 mb-16"><?php echo esc_html( $title ); ?></h1>
						<p class="page-404__text mb-32"><?php echo esc_html( $description ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--lg btn--color">
							<span><?php echo esc_html( $button_text ); ?></span>
						</a>					
					</div>

					<div class="col-md-6">
						<?php if ( $image ) : ?>
							<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( '404 Page Not Found', 'amela' ) ?>" class="page-404__img" />
						<?php endif; ?>
					</div>

				</div>
				<h2 class="page-404__number"><?php echo esc_html__( '404', 'amela' ); ?></h2>			
			</div>
		</main>
	</section>
</div>
<?php get_footer(); ?>