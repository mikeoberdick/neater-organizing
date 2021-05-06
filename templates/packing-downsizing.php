<?php /* Template Name: Packing & Downsizing */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="packingDownsizing">
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
						<div class="col-lg-6 pl-lg-0 d-flex flex-column justify-content-center">
							<?php while(have_rows('section_three')) : the_row(); ?>
							 	<?php while(have_rows('content_boxes')) : the_row(); ?>
							 		<div class="content-box p-5">
								 		<h1 class="h2 section-title"><?php the_sub_field('header'); ?></h1>
								 		<p><?php the_sub_field('content'); ?></p>	
							 		</div><!-- .content-box -->
							 	<?php endwhile; ?>
							 <?php endwhile; ?>	
						</div><!-- .col-lg-6 -->
						<?php $img = $three['image']; ?>
						<div id = "bgImg" class="col-lg-6 pr-lg-0" style = "background-image: url('<?php echo $img['url']; ?>'); ">	
						</div><!-- .col-lg-6 -->
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
		</div><!-- #packingDownsizing -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>