<?php
/**
 * Masonry grid post layout.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$columns = get_theme_mod( 'amela_settings_blog_columns', 'col-lg-6' );
$image_size = ( 'col-lg-12' == $columns ) ? 'amela_featured_medium' : 'amela_featured_small';
?>

<article itemtype="https://schema.org/Article" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<!-- Post thumb -->
		<figure class="entry__img-holder">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( esc_html( $image_size ), array( 'class' => 'entry__img' ) ); ?>
			</a>
			<?php if ( get_theme_mod( 'amela_settings_meta_category_show', true ) ) : ?>
				<div class="entry__categories">
					<?php amela_meta_category(); ?>
				</div>
			<?php endif; ?>			
		</figure>
	<?php endif; ?>

	<div class="entry__body">

		<header class="entry__header">
			
			<?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">',
			esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>

			<?php if ( get_theme_mod( 'amela_settings_meta_date_show', true ) || get_theme_mod( 'amela_settings_meta_author_show', true ) || get_theme_mod( 'amela_settings_meta_comments_show', true ) ) : ?>

				<div class="entry__meta">

					<?php if ( get_theme_mod( 'amela_settings_meta_date_show', true ) ) : ?>
						<?php amela_meta_date(); ?>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'amela_settings_meta_author_show', true ) ) : ?>
						<?php amela_meta_author(); ?>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'amela_settings_meta_comments_show', true ) ) : ?>
						<?php amela_meta_comments(); ?>
					<?php endif; ?>

				</div>

			<?php endif; ?>

		</header>

		<?php if ( get_theme_mod( 'amela_settings_post_excerpt_show', true ) ) : ?>
			<?php if ( get_the_excerpt() ) : ?>
				<!-- Excerpt -->
				<div class="entry__excerpt">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php amela_read_more(); ?>

	</div> <!-- .entry__body -->

</article><!-- #post-## -->