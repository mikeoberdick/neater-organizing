<?php /* Template Name: Homepage */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="homepage">
			<?php get_template_part('snippets/hero'); ?>

			<?php $one = get_field('section_one'); ?>
			<section id="sectionOne">
				<div class="container-fluid">
					<div class="row">
						<?php $img = $one['left_image']; ?>
						<div class="col-lg-3 pl-lg-0 mb-2 mb-lg-0">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
						<div class="col-lg-6 text-center justify-content-center d-flex flex-column">
							<div class="inner-container p-3">
								<h1 class="h6 subheader"><?php echo $one['subheader']; ?></h1>
								<h2 class = "section-title"><?php echo $one['header']; ?></h2>
								<p><?php echo $one['content']; ?></p>
								<a href = "<?php echo $one['button_url']; ?>"><button role = "button" class = "btn outline-button"><?php echo $one["button_text"]; ?></button></a>	
							</div><!-- .inner-container -->
						</div><!-- .col-lg-6 -->
						<?php $img = $one['right_image']; ?>
						<div class="col-lg-3 text-right pr-lg-0">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionOne -->
	
			<?php $two = get_field('section_two'); ?>
			<section id="sectionTwo">
				<?php $img = $two['hero_image']; ?>
				<div class="parallax full-width-image" style = "background-image: url('<?php echo $img['url']; ?>');">
				</div><!-- .parrallax -->
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h5 subheader text-center"><?php echo $two['subheader']; ?></h1>
						</div><!-- .col-sm-12 -->
						<?php while(have_rows('section_two')) : the_row(); ?>
							<?php while(have_rows('buckets')) : the_row(); ?>
								<div class="col-md-6 text-center text-md-left">
									<div class="icon-and-title d-flex align-items-center mb-3">
										<?php $img = get_sub_field('icon'); ?>
										<img class = "mr-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
										<h2 class="h6 subheader mb-0"><?php the_sub_field('header'); ?></h2>
									</div><!-- .icon-and-title -->
									<div class="wysiwyg">
										<?php the_sub_field('content'); ?>
									</div><!-- .wysiwyg -->
								</div><!-- .col-md-6 -->
							<?php endwhile; ?>
						<?php endwhile; ?>
						<div class="col-sm-12 text-center mt-3">
							<a href = "<?php echo $two['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $two["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<?php $img = $three['left_image']; ?>
						<div id = "testimonialImage" class="col-lg-6 pl-lg-0" style = "background-image: url('<?php echo $img['url']; ?>'); ">	
						</div><!-- .col-lg-6 -->
						<div id = "testimonials" class="col-lg-6 d-flex flex-column justify-content-center py-lg-5">
							<div class="content-container">
								<h1 class="h6 subheader"><?php echo $three['subheader']; ?></h1>
								<h2 class = "section-title"><?php echo $three['header']; ?></h2>
								<div class="testimonialSliderOuterWrapper">
									<div id="testimonialSlider">
										<?php $testimonials = $three['testimonials']; ?>
										<?php foreach( $testimonials as $post ): setup_postdata($post); ?>
								            <div class="testimonial-slide">
								            	<div class="wysiwyg"><?php the_field('testimonial'); ?></div><!-- .wysiwyg -->
								            	<span class = "mb-3 d-inline-block">- <?php the_field('author'); ?></span>
								            </div><!-- .testimonial-slide -->
								    	<?php endforeach; wp_reset_postdata(); ?>
									</div><!-- #testimonialSlider -->
									<div id="counter" class = "d-inline">
										<a class="prev-arrow"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
										<span class = "font-weight-bold"></span>
										<a class="next-arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
									</div>
								</div><!-- .testimonialSliderOuterWrapper -->
							</div><!-- .content-container -->
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionThree -->

			<?php $four = get_field('section_four'); ?>
			<section id="sectionFour">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="h6 subheader"><?php echo $four['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $four['header']; ?></h2>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				<div id="cards" class = "d-flex justify-content-around">
					<?php while(have_rows('section_four')) : the_row(); ?>
						<?php while(have_rows('buckets')) : the_row(); ?>
							<div class="horizontal-card d-flex align-items-center justify-content-center">
								<?php $img = get_sub_field('icon'); ?>
								<img class = "mr-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<p class = "mb-0"><?php the_sub_field('text'); ?></p>
							</div><!-- .card -->
						<?php endwhile; ?>	
					<?php endwhile; ?>
				</div><!-- #cards -->
			</section><!-- #sectionFour -->
		</div><!-- #homepage -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>