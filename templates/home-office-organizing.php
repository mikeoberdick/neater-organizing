<?php /* Template Name: Home & Office Organizing */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="homeOfficeOrganizing">
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

			<section id="sectionTwo">
				<?php $images = get_field('section_two'); ?>
		        <?php foreach( $images as $image ): ?>
		            <div class = "image-wrapper">
		                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		            </div><!-- .image-wrapper -->
		        <?php endforeach; ?>
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_four'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="inner-container">
								<?php $img = $three['icon']; ?>
								<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<div class="wysiwyg"><?php echo $three['content']; ?></div><!-- .wysiwyg -->
							</div><!-- .inner-container -->
							<div class="text-center mt-3">
								<a href = "<?php echo $three['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $three["button_text"]; ?></button></a>
							</div>
						</div><!-- .col-md-8 -->
					</div>
				</div>
			</section><!-- #sectionThree -->
			
			<?php $four = get_field('section_five'); ?>
			<?php $bg = $four['background_image']; ?>
			<section id="sectionFour" style = "background-image: url('<?php echo $bg['url']; ?>');">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="inner-container">
								<h1 class="h5 subheader"><?php echo $four['subheader']; ?></h1>
								<h2 class = "section-title"><?php echo $four['header']; ?></h2>
								<div class = "wysiwyg"><?php echo $four['content']; ?></div><!-- .wysiwyg -->
							</div><!-- .inner-container -->
						</div><!-- .col-md-8 offset-md-2 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionFour -->

			<?php $five = get_field('section_six'); ?>
			<section id="sectionFive">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class = "h2 section-title"><?php echo $five['header']; ?></h2>
							<p><?php echo $five['content']; ?></p>
							<a href = "<?php echo $five['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $five["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionFive -->

		</div><!-- #homeOfficeOrganizing -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>