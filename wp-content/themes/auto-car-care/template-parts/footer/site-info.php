<?php
/**
 * Displays footer site info
 *
 * @package Auto Car Care
 * @subpackage auto_car_care
 */

?>
<div class="site-info">
	<div class="container">
		<p><?php echo esc_html(get_theme_mod('automobile_hub_footer_text',__('Auto Car Care WordPress Theme By','auto-car-care'))); ?> <?php auto_car_care_credit(); ?></p>
	</div>
</div>