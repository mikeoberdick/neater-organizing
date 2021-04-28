<?php /* Template Name: Homepage */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="homepage">
			<?php get_template_part('snippets/hero'); ?>
		</div><!-- #homepage -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>