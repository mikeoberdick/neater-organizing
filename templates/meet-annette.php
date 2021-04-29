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
							<p class="h2"><?php echo $one['quote']; ?></h1>
							<span class = "h5 subheader"><?php echo $one['author']; ?></span>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionOne -->
	
			<?php $two = get_field('section_two'); ?>
			<section id="sectionTwo">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-5 offset-lg-1">
							<?php $img = $two['image']; ?>
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-5 -->
						<div class="col-lg-4">
							<h1 class="h5 subheader"><?php echo $two['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $two['header']; ?></h2>
							<div class="wysiwyg"><?php echo $two['content']; ?></div><!-- .wysiwyg -->
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionOne">
				<div class="container-fluid">
					<div class="row">
						<?php $img = $three['left_image']; ?>
						<div class="col-lg-3">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
						<div class="col-lg-6">
							<h1 class="h5 subheader"><?php echo $three['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $three['header']; ?></h2>
							<p><?php echo $three['content']; ?></p>
							<a href = "<?php echo $three['button_url']; ?>"><button role = "button" class = "btn"><?php echo $three["button_text"]; ?></button></a>
						</div><!-- .col-lg-6 -->
						<?php $img = $three['right_image']; ?>
						<div class="col-lg-3">
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-3 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionOne -->

			<?php $four = get_field('section_four'); ?>
			<section id="sectionFour">
				<?php $img = $four['hero_image']; ?>
				<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h5 subheader"><?php echo $four['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $four['header']; ?></h2>
						</div><!-- .col-sm-12 -->
						<div class="col-sm-12">
							<a href = "<?php echo $four['button_link']; ?>"><button role = "button" class = "btn"><?php echo $four["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionFour -->
		</div><!-- #meetAnnette -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>