<?php /* Template Name: Contact */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="contact">
			<?php get_template_part('snippets/hero'); ?>

			<?php $one = get_field('section_one'); ?>
			<section id="sectionOne">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-5 offset-lg-2">
							<h1 class="h2 section-title">Send Neater a Note</h1>
							<?php echo do_shortcode ('[ninja_form id=1]'); ?>
						</div><!-- .col-lg-5 offset-lg-2 -->
						<div id = "sidebar" class="col-lg-4 offset-lg-1 pr-lg-0">
							<?php $img = get_field('sidebar_image'); ?>
							 <img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							 <div class="inner-container">
								 <div class="contact-section">
								 	<h3 class = "mb-2">Call Us</h3>
								 	<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?><a href="tel:<?php echo $phone ?>"><?php the_field('phone_number', 'option'); ?></a>
								 </div><!-- .contact-section -->
								 <div class="contact-section">
								 	<h3 class = "mb-2">Find Us Online</h3>
								 	<div class="social-links">
										<a class = "social-link instagram mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('instagram_url', 'options') ?>"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/instagram.png'; ?>"><span class = "sr-only sr-only-focusable">Instagram</span></a>
										<a class = "social-link facebook mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('facebook_url', 'options') ?>"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/facebook.png'; ?>"><span class = "sr-only sr-only-focusable">Facebook</span></a>
										<a class = "social-link yelp mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('yelp_url', 'options') ?>"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/yelp.png'; ?>"><span class = "sr-only sr-only-focusable">Yelp</span></a>
										<a class = "social-link pinterest" rel="noreferrer" target = "_blank" href="<?php the_field('pinterest_url', 'options') ?>"><img src = "<?php echo get_stylesheet_directory_uri() . '/img/pinterest.png'; ?>"><span class = "sr-only sr-only-focusable">Pinterest</span></a>
									</div><!-- .social-links -->
								 </div><!-- .contact-section -->		
							 </div><!-- .inner-container -->
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionOne -->
		</div><!-- #contact -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>