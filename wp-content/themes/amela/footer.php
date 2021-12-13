<?php
/**
 * The template for displaying the footer.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Amela
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

	<?php amela_footer_before(); ?>

	<?php amela_footer(); ?>		
	
	<?php amela_footer_after(); ?>

	<?php amela_back_to_top(); ?>

	<?php amela_content_bottom(); ?>

	</div> <!-- #content -->

	<?php amela_content_after(); ?>

</div> <!-- .main-wrapper -->

<?php amela_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>