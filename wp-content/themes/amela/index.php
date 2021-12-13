<?php
/**
 * The main template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<div class="blog-section pb-56">

	<?php amela_primary_content_markup_top(); ?>

		<?php amela_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="content blog__content col-lg mb-32">
			<main class="site-main" role="main">

				<?php amela_primary_content_before(); ?>

				<?php amela_primary_content_query(); ?>

				<?php amela_post_pagination(); ?>

				<?php amela_primary_content_after(); ?>

			</main>
		</div> <!-- .blog__content -->

		<?php
			// Sidebar
			if ( amela_is_active_sidebar( 'blog', 'blog', 'right-sidebar' ) ) {
				amela_sidebar( 'amela-blog-sidebar' );
			}
		?>

		<?php amela_primary_content_bottom(); ?>

	<?php amela_primary_content_markup_bottom(); ?>

</div> <!-- .blog-section -->

<?php get_footer(); ?>