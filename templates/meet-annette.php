<?php /* Template Name: Meet Annette */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="meetAnnette">
			<?php get_template_part('snippets/hero'); ?>
			
			<?php $one = get_field('section_one'); ?>
			<section id="sectionOne">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h2"><?php echo $one['quote']; ?></h1>
							<span class = "h5 subheader"><?php echo $one['author']; ?></span>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionOne -->
	
			<?php $two = get_field('section_two');
			$img = $two['image']; ?>
			<section id="sectionTwo" style = "background: url('<?php echo $img['url'] ?>');">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 offset-lg-7 d-flex flex-column justify-content-center pl-lg-4">
							<h1 class="h5 subheader"><?php echo $two['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $two['header']; ?></h2>
							<div class="wysiwyg"><?php echo $two['content']; ?></div><!-- .wysiwyg -->
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<?php $img = $three['left_image']; ?>
						<div class="col-lg-3 pl-lg-0">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
						<div class="col-lg-6 mb-5 mb-lg-0">
							<div class="inner-container py-3 px-lg-3">
							<h1 class="h5 subheader"><?php echo $three['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $three['header']; ?></h2>
							<p><?php echo $three['content']; ?></p>
							<a href = "<?php echo $three['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $three["button_text"]; ?></button></a>	
							</div><!-- .inner-container -->
						</div><!-- .col-lg-6 -->
						<?php $img = $three['right_image']; ?>
						<div class="col-lg-3 pr-lg-0">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionThree -->

			<?php $four = get_field('section_four'); ?>
			<section id="sectionFour">
				<?php $img = $four['hero_image']; ?>
				<div class="parallax full-width-image d-none d-lg-block" style = "background-image: url('<?php echo $img['url']; ?>');"></div>
				<?php $img = $four['mobile_hero_image']; ?>
				<div class="parallax full-width-image d-lg-none" style = "background-image: url('<?php echo $img['url']; ?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="h5 subheader"><?php echo $four['subheader']; ?></h1>
							<h2 class = "section-title mt-4"><?php echo $four['header']; ?></h2>
						</div><!-- .col-sm-12 -->
						<div class="col-sm-12 text-center">
							<a href = "<?php echo $four['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $four["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionFour -->
		</div><!-- #meetAnnette -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>