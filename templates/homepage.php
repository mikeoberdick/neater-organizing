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
						<div class="col-lg-3">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
						<div class="col-lg-6">
							<h1 class="h5 subheader"><?php echo $one['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $one['header']; ?></h2>
							<p><?php echo $one['content']; ?></p>
							<a href = "<?php echo $one['button_url']; ?>"><button role = "button" class = "btn"><?php echo $one["button_text"]; ?></button></a>
						</div><!-- .col-lg-6 -->
						<?php $img = $one['right_image']; ?>
						<div class="col-lg-3">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionOne -->
	
			<?php $two = get_field('section_two'); ?>
			<section id="sectionTwo">
				<?php $img = $two['hero_image']; ?>
				<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h5 subheader"><?php echo $two['subheader']; ?></h1>
						</div><!-- .col-sm-12 -->
						<?php while(have_rows('section_two')) : the_row(); ?>
							<?php while(have_rows('buckets')) : the_row(); ?>
								<div class="col-md-6">
									<div class="icon-and-title">
										<?php $img = get_sub_field('icon'); ?>
										<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
										<h2 class="h5 subheader"><?php the_sub_field('header'); ?></h2>
									</div><!-- .icon-and-title -->
									<div class="wysiwyg">
										<?php the_sub_field('cotnent'); ?>
									</div><!-- .wysiwyg -->
								</div><!-- .col-md-6 -->
							<?php endwhile; ?>
						<?php endwhile; ?>
						<div class="col-sm-12">
							<a href = "<?php echo $two['button_link']; ?>"><button role = "button" class = "btn"><?php echo $two["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<?php $img = $three['left_image']; ?>
							<div class="image-container">
								<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							</div><!-- .image-container -->	
						</div><!-- .col-md-6 -->
						<div class="col-md-4">
							<div class="content-container">
								<h1 class="h5 subheader"><?php echo $three['subheader']; ?></h1>
								<h2 class = "section-title"><?php echo $three['header']; ?></h2>
								<div class="testimonialSliderOuterWrapper">
									<div id="testimonialSlider">
										<?php $testimonials = $three['testimonials']; ?>
										<?php foreach( $testimonials as $post ): setup_postdata($post); ?>
								            <div class="testimonial-slide">
								            	<div class="wysiwyg"><?php the_field('testionial'); ?></div><!-- .wysiwyg -->
								            	<span><?php the_field('author'); ?></span>
								            </div><!-- .testimonial-slide -->
								    	<?php endforeach; wp_reset_postdata(); ?>
									</div><!-- #testimonialSlider -->
									<div class="slider-arrows">
										<p id = "counter"><span></span> of <span></span></p>
									</div><!-- .slider-arrows -->
								</div><!-- .testimonialSliderOuterWrapper -->
							</div><!-- .content-container -->
						</div><!-- .col-md-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionThree -->

			<?php $sectionFour = get_field('section_four'); ?>
			<section id="sectionFour">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h5 subheader"><?php echo $four['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $four['header']; ?></h2>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				<div id="cards">
					<?php while(have_rows('section_four')) : the_row(); ?>
						<?php while(have_rows('buckets')) : the_row(); ?>
							<div class="card">
								<?php $img = get_sub_field('icon'); ?>
								<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<p><?php the_sub_field('text'); ?></p>
							</div><!-- .card -->
						<?php endwhile; ?>	
					<?php endwhile; ?>
				</div><!-- #cards -->
			</section><!-- #sectionFour -->
		</div><!-- #homepage -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>