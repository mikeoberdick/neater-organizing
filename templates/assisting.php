<?php /* Template Name: Assisting */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="assisting">
			<?php get_template_part('snippets/hero'); ?>

			<section id="sectionOne">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="h2"><?php the_field('section_one'); ?></h1>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionOne -->
			
			<?php $two = get_field('section_two'); ?>
			<section id="sectionTwo">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="inner-container">
								<?php $img = $two['icon']; ?>
								<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<div class="wysiwyg">
									<?php echo $two['content']; ?>
								</div><!-- .wysiwyg -->
							</div><!-- .inner-container -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 offset-lg-2 text-center">
							<h1 class="h5 subheader"><?php echo $three['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $three['header']; ?></h2>
							<p><?php echo $three['content']; ?></p>
							<a href = "<?php echo $three['button_link']; ?>"><button role = "button" class = "btn outline-button mb-lg-5 mb-lg-0"><?php echo $three["button_text"]; ?></button></a>
						</div><!-- .col-lg-4 offset-lg-2 -->
						<div class="col-lg-5 offset-lg-1 pr-lg-0 d-flex justify-content-center">
							<?php $img = $three['image']; ?>
							 <img class = "mt-3 mt-lg-0" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">	
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionThree -->
			
			<?php $four = get_field('section_four'); ?>
			<section id="sectionFour">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class = "h2 section-title"><?php echo $four['header']; ?></h2>
							<p><?php echo $four['content']; ?></p>
							<a href = "<?php echo $four['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $four["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionFour -->
		</div><!-- #assisting -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?> 