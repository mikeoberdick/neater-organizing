<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search Posts', 'understrap' ); ?></label>
	<div class="input-group">
		<input class="field form-control position-relative" id="s" name="s" placeholder = "Search Blogs"type="text"
			value="<?php the_search_query(); ?>">
		<button class="submit" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'understrap' ); ?>"><img src = "<?php echo get_stylesheet_directory_uri() . '/img/magnifying_glass.png'; ?>"></button>
	</div>
</form>