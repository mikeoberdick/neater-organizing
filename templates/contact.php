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
						<div class="col-lg-4 offset-lg-2">
							<h1 class="h2">Send Neater a Note</h1>
							<?php echo do_shortcode ('[ninja_form id=1]'); ?>
						</div><!-- .col-lg-4 offset-lg-2 -->
						<div class="col-lg-4 offset-lg-1">
							<?php $img = get_field('sidebar_image'); ?>
							 <img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							 <div class="contact-section">
							 	<h3>Call Us</h3>
							 	<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?><a href="tel:<?php echo $phone ?>"><?php the_field('phone_number', 'option'); ?></a>
							 </div><!-- .contact-section -->
							 <div class="contact-section">
							 	<h3>Find Us Online</h3>
							 	<a class = "social-link instagram mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('instagram_url', 'options') ?>"><i class="fa fa-instagram" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Instagram</span></a>
								<a class = "social-link facebook mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('facebook_url', 'options') ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Facebook</span></a>
								<a class = "social-link facebook mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('facebook_url', 'options') ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Facebook</span></a>
								<a class = "social-link pinterest" rel="noreferrer" target = "_blank" href="<?php the_field('pinterest_url', 'options') ?>"><i class="fa fa-pinterest" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Pinterest</span></a>
							 </div><!-- .contact-section -->	
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionOne -->
		</div><!-- #contact -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>