<?php
/**
 * Page content.
 * 
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
		
	<?php
		// Check if the page built with Elementor
		if ( amela_is_elementor_page() ) : ?>

			<?php amela_primary_content_top(); ?>

			<div class="elementor-main-content">

				<?php amela_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php amela_primary_content_after(); ?>

			</div>

			<?php amela_comments(); ?>

			<?php amela_primary_content_bottom(); ?>

		<?php else : ?>			

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<section class="page-section">
				<div class="container">
					<div class="row">

						<?php amela_primary_content_top(); ?>

						<div id="primary" class="page-content mb-32 <?php if ( amela_is_active_sidebar( 'page', 'page' ) ) { echo esc_attr( 'col-lg-8' ); } else { echo esc_attr( 'col-lg-12' ); } ?>">

							<?php amela_primary_content_before(); ?>

							<div class="entry__article clearfix">
								<?php the_content(); ?>
							</div>

							<?php amela_multi_page_pagination(); ?>
							
							<?php amela_comments(); ?>

							<?php amela_primary_content_after(); ?>

						</div> <!-- .page-content -->

						<?php amela_primary_content_bottom(); ?>

						<?php
							// Sidebar
							if ( amela_is_active_sidebar( 'page', 'page' ) ) {
								amela_sidebar();
							}
						?>						

					</div> <!-- .row -->
				</div> <!-- .container -->			
			</section> <!-- .page-section -->

	<?php endif; ?> <!-- elementor check -->	
<?php endwhile; endif; ?>