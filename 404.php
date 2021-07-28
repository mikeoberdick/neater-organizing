<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="four-oh-four">
			<section class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1>Oh no! The page you’re looking for doesn’t exist.</h1>
						<p class = "font-italic">Let’s get ourselves organized.</p>
						<div class="links d-flex justify-content-around">
							<a href="/"><button role = "button" class = "btn outline-button">Head Home</button></a>
							<a href="/services-pricing-organize-your-space/"><button role = "button" class = "btn outline-button">View Services</button></a>
							<a href="/contact"><button role = "button" class = "btn outline-button">Contact Neater</button></a>
						</div><!-- .links -->
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</section><!-- .container -->
			
		</div><!-- #404 -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>