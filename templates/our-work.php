<?php /* Template Name: Our Work */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="ourWork">
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
				<?php $img = $two['hero_image']; ?>
				<img class = "full-width-image" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class = "h2 section-title"><?php echo $two['header']; ?></h1>
							<p class = "mb-0"><?php echo $two['content']; ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionThree-->

			<section id="sectionThree">
				<?php $images = get_field('section_three'); ?>
		        <?php $count = 1; foreach( $images as $image ): ?>
		            <div <?php if ($count == 1 || $count == 4) {echo 'id = "featuredImage"';} ?>class = "image-wrapper">
		                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		            </div><!-- .image-wrapper -->
		        <?php $count++; endforeach; ?>
			</section><!-- #sectionTwo -->
			
			<section id="sectionFour">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="h2 mb-3"><?php the_field('section_four'); ?></h1>
							<div class="social-icons">
								<a class = 'social-link instagram' title = '<?php echo get_bloginfo('title'); ?> on Instagram' rel='noreferrer' target = '_blank' href='<?php the_field('instagram_url', 'options') ?>'><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/instagram_red.png'; ?>"><span class = 'sr-only sr-only-focusable'>Instagram</span></a>
								<a class = 'social-link facebook' title = '<?php echo get_bloginfo('title'); ?> on Facebook' rel='noreferrer' target = '_blank' href='<?php the_field('facebook_url', 'options') ?>'><img src = "<?php echo get_stylesheet_directory_uri() . '/img/facebook_red.png'; ?>"><span class = 'sr-only sr-only-focusable'>Facebook</span></a>
							</div><!-- .icons -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionFour -->

			<?php $five = get_field('section_five'); ?>
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
		</div><!-- #ourWork -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>