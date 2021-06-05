<?php /* Template Name: Testimonials */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="testimonials">
			<?php get_template_part('snippets/hero'); ?>
			<?php $one = get_field('section_one'); ?>
			<section id="sectionOne">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
						<h1 class="h5 subheader"><?php echo $one['subheader']; ?></h1>
						<h2 class = "section-title"><?php echo $one['header']; ?></h2>	
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionOne -->

			<?php $two = get_field('section_two'); ?>
			<section id="sectionTwo">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6 pl-lg-0 d-flex align-items-center">
							<?php $img = $two['image']; ?>
							<img class = "h-100 mb-3 mb-lg-0" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-6 -->
						<div class="col-lg-6 pr-lg-0 d-flex flex-column justify-content-center"> 
							<?php $testimonials = $two['testimonials']; ?>
							<?php foreach( $testimonials as $post ) : setup_postdata($post); ?>
            					<div class="testimonial text-center text-lg-left p-4 p-lg-5">
            						<?php if (get_field('featured_line')) : ?>
            						<h1 class="h3 pull-quote"><?php the_field('featured_line'); ?></h1>
            						<?php endif; ?>
            						<?php if (get_field('testimonial')) : ?><div class="wysiwyg"><?php the_field('testimonial'); ?></div><!-- .wysiwyg --><?php endif; ?>
            						<span class="author">- <?php the_field('author'); ?></span>
            					</div><!-- .testimonial -->
    						<?php endforeach; wp_reset_postdata(); ?>
						</div><!-- .col-lg-6 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<?php $testimonials = $three['testimonials']; ?>
						<?php foreach( $testimonials as $post ) : setup_postdata($post); ?>
        					<div class="testimonial col-lg-4">
        						<div class="inner-container p-4 text-center">
        						<?php if (get_field('featured_line')) : ?>
        						<h1 class="h3 pull-quote"><?php the_field('featured_line'); ?></h1>
        						<?php endif; ?>
        						<span class="author">- <?php the_field('author'); ?></span>	
        						</div><!-- .inner-container p-4 -->
        					</div><!-- .testimonial -->
						<?php endforeach; wp_reset_postdata(); ?>
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionThree -->

			<?php $four = get_field('section_four'); ?>
			<section id="sectionFour">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6 offset-lg-1 d-flex flex-column justify-content-center">
							<?php $testimonial = $four['testimonial']; ?>
							<?php foreach( $testimonial as $post ) : setup_postdata($post); ?>
	        					<div class="testimonial">
	        						<?php if (get_field('featured_line')) : ?>
	        						<h1 class="h3 pull-quote"><?php the_field('featured_line'); ?></h1>
	        						<?php endif; ?>
	        						<?php if (get_field('testimonial')) : ?><div class="wysiwyg"><?php the_field('testimonial'); ?></div><!-- .wysiwyg --><?php endif; ?>
	        						<span class="author">- <?php the_field('author'); ?></span>
	        					</div><!-- .testimonial -->
							<?php endforeach; wp_reset_postdata(); ?>
						</div><!-- .col-lg-8 -->
						<div class="image col-lg-4 offset-lg-1 pr-lg-0 d-flex justify-content-center">
							<?php $img = $four['right_image']; ?>
							<img class = "mt-3 mt-lg-0" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionFour -->

			<?php $five = get_field('section_five'); ?>
			<section id="sectionFive">
				<div class="container-fluid">
					<div class="row">
						<?php $testimonials = $five['testimonials']; ?>
						<?php foreach( $testimonials as $post ) : setup_postdata($post); ?>
        					<div class="testimonial col-lg-4">
        						<div class="inner-container p-5 text-center">
        						<?php if (get_field('featured_line')) : ?>
        						<h1 class="h3 pull-quote"><?php the_field('featured_line'); ?></h1>
        						<?php endif; ?>
        						<span class="author">- <?php the_field('author'); ?></span>
        					</div><!-- .inner-container -->
        					</div><!-- .testimonial -->
						<?php endforeach; wp_reset_postdata(); ?>
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionFive -->

			<?php $six = get_field('section_six'); ?>
			<section id="sectionSix">
				<div class="container-fluid">
					<div class="row">
						<div class="image col-lg-4 pl-lg-0 d-flex justify-content-center">
							<?php $img = $six['image']; ?>
							<img class = "mb-3 mb-lg-0" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-4 -->
						<div class="col-lg-6 offset-lg-1 d-flex flex-column justify-content-center">
							<?php $testimonial = $six['testimonial']; ?>
							<?php foreach( $testimonial as $post ) : setup_postdata($post); ?>
	        					<div class="testimonial">
	        						<?php if (get_field('featured_line')) : ?>
	        						<h1 class="h3 pull-quote"><?php the_field('featured_line'); ?></h1>
	        						<?php endif; ?>
	        						<?php if (get_field('testimonial')) : ?><div class="wysiwyg"><?php the_field('testimonial'); ?></div><!-- .wysiwyg --><?php endif; ?>
	        						<span class="author">- <?php the_field('author'); ?></span>
	        					</div><!-- .testimonial -->
							<?php endforeach; wp_reset_postdata(); ?>
						</div><!-- .col-lg-8 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionSix -->

			<section id="sectionSeven">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<?php $testimonial = get_field('section_seven'); ?>
							<?php foreach( $testimonial as $post ) : setup_postdata($post); ?>
	        					<div class="testimonial">
	        						<?php if (get_field('featured_line')) : ?>
	        						<h1 class="h3 pull-quote"><?php the_field('featured_line'); ?></h1>
	        						<?php endif; ?>
	        						<?php if (get_field('testimonial')) : ?><div class="wysiwyg"><?php the_field('testimonial'); ?></div><!-- .wysiwyg --><?php endif; ?>
	        						<span class="author">- <?php the_field('author'); ?></span>
	        					</div><!-- .testimonial -->
							<?php endforeach; wp_reset_postdata(); ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionSeven -->
		</div><!-- #testimonials -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>