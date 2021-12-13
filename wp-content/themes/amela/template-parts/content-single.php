<?php
/**
 * Single post
 *
 * @package Amela
 */
?>

<?php 
	$tags_show = get_theme_mod( 'amela_settings_post_tags_show', true );
?>

<div class="single-post__content">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?>>	
		<div class="entry__article-wrap">
		
			<?php if ( function_exists( 'amela_social_sharing_buttons' ) && get_theme_mod( 'amela_settings_post_share_buttons_show', true ) ) : ?>
				<!-- Share -->
				<div class="entry__share">
					<div class="sticky-col">
						<?php echo amela_social_sharing_buttons( 'socials--colored entry__share-socials' ); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="entry__article-content">

				<?php amela_entry_content_top(); ?>

				<div class="entry__article single-post__entry-article clearfix">
					<?php the_content(); ?>
				</div>

				<?php amela_multi_page_pagination(); ?>

				<?php amela_entry_content_bottom(); ?>

			</div> <!-- .entry__article-content -->	
		</div>
	</article><!-- #post-## -->

	<?php if ( $tags_show && has_tag() ) : ?>
		<!-- Tags -->
		<div class="entry__tags">
			<?php the_tags( '', '', '' ); ?>
		</div>
	<?php endif; ?>
</div> <!-- .single-post__content -->

<?php if ( is_active_sidebar( 'amela-newsletter' ) && get_theme_mod( 'amela_settings_newsletter_show', true ) ) {
	amela_newsletter_box();
} ?>

<div class="single-post__content single-post__content--wider">

	<?php if ( get_theme_mod( 'amela_settings_post_navigation_show', true ) ) {	
		amela_post_nav();
	} ?>

	<?php if ( get_theme_mod( 'amela_settings_author_box_show', true ) ) {
		amela_author_box();
	} ?>

	<?php if ( get_theme_mod( 'amela_settings_related_posts_show', true ) ) {
		amela_related_posts();
	} ?>

	<?php
		// Comments
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

</div> <!-- .single-post__content -->
