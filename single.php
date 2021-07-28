<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="singlePost">
			<?php $img = get_field('featured_image'); ?>
			<img class = "full-width-image w-100" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
			<div class="container">
				<div class="row">
					<section id = "thePost" class="col-sm-12">
						<div class="inner-container">
							<h1 class="h2 section-title post-title"><?php the_title(); ?></h1>
							<div class = "h6 subheader"><?php $cats = '';
								foreach((get_the_category()) as $category) {
								    $cats .= $category->cat_name . ', ';
								}
								echo rtrim($cats, ', '); ?>
							</div>
							<div class="wysiwyg">
								<?php the_field('the_content'); ?>
							</div><!-- .wysiwyg -->
							<?php if (get_field('author')) : ?>
								<span class="author h6">Written By: <?php the_field('author'); ?></span>
							<?php endif; ?>
						</div><!-- .inner-container -->
						<div class="post-footer">
							<div class="back">
								<a href = "/organization-blog/"><button role = "button" class = "btn outline-button mb-3 mb-lg-0"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/chevron_left.png'; ?>">Back To Blog</button></a>
							</div><!-- .back -->
							<div class="social-sharing">
								<h6 class="subheader">Share With A Friend</h6>
								<?php echo do_shortcode('[addtoany]'); ?>
							</div><!-- .social-sharing -->
						</div><!-- .post-footer -->	
					</section><!-- #thePost -->
				</div><!-- .row -->
			</div><!-- .container -->
			<section id="commentContainer" class="container">
				<div class="row">
					<div class="col-sm-12">
						<?php comments_template(); ?>
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</section><!-- #commentContainer.container -->
		</div><!-- #singlePost -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>