<?php
/**
 * Page title for single post.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'amela_settings_single_post_page_title_show', true ) ) {
	return;
}

add_action( 'amela_entry_header', 'amela_entry_header_markup' );

if ( ! function_exists( 'amela_entry_header_markup' ) ) {
	/**
	* Single entry header markup
	*
	* @since 1.0.0
	*/
	function amela_entry_header_markup() {

		amela_entry_header_before(); ?>

		<header class="single-post__entry-header">
			<?php if ( get_theme_mod( 'amela_settings_single_category_show', true ) ) : ?>
				<div class="entry__meta-categories">
					<?php amela_meta_category(); ?>
				</div>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'amela_settings_single_post_title_show', true ) ) : ?>				
				<h1 class="single-post__entry-title"><?php the_title(); ?></h1>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'amela_settings_single_date_show', true ) || get_theme_mod( 'amela_settings_single_author_show', true ) || get_theme_mod( 'amela_settings_single_comments_show', true ) ) : ?>
				<div class="entry__meta">

					<?php if ( get_theme_mod( 'amela_settings_single_date_show', true ) ) : ?>
						<?php amela_meta_date(); ?>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'amela_settings_single_author_show', true ) ) : ?>
						<?php amela_meta_author(); ?>
					<?php endif; ?>						

					<?php if ( get_theme_mod( 'amela_settings_single_comments_show', true ) ) : ?>
						<?php amela_meta_comments(); ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</header>

		<?php amela_entry_header_after();	

		amela_entry_featured_image();

	}
}

