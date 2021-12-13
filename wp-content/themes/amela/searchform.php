<?php
/**
 * Search form
 *
 * @package Amela
 */
?>

<?php $unique_id = uniqid( 'search-form-' ); ?>

<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'amela' ); ?></span>
		<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-input" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'amela' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-button" aria-label="<?php esc_attr_e( 'search button', 'amela' ) ?>"><i class="amela-icon-search search-icon" aria-hidden="true"></i></button>
</form>