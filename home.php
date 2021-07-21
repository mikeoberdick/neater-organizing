<?php
/**
 * The template for displaying the blog index
 *
 * @package understrap
 */

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="blog">
			<?php get_template_part('snippets/hero'); ?>
			
			<section id="sectionOne">
				<div id="categories" class = "d-flex">
					<div id = "categoryButton">
						<i class="fa fa-bars" aria-hidden="true"></i>
						<span>Categories</span>		
					</div><!-- #categoryButton -->
					<?php $ppp = get_option( 'posts_per_page' ); ?>
					<div id = "ajaxCategoryFilter" data-paged="<?php echo $ppp; ?>" style = "display: none;">
						<div class="top-wrapper">
							<h6 class="subheader mr-3 mb-0">Browse By Category</h6>
							<div class="close-icon"><img src = "<?php echo get_stylesheet_directory_uri() . '/img/close_icon.png'; ?>"></div>
						</div>

						<ul class = "list-unstyled nav-filter">
							<?php $terms  = get_terms('category'); ?>
							<?php foreach ( $terms as $term ) : ?>
								
							<li value = "<?php echo $term->term_id; ?>" data-filter = "category" data-term ="<?php echo $term->slug; ?>" data-page="1">
								<a href="<?php echo get_term_link( $term, $term->taxonomy ); ?>"><h6 class = "subheader red"><?php echo $term->name ?></h6></a>
							</li>
	        				<?php endforeach; ?>
						</ul>
					</div><!-- #ajaxCatgoryFilter -->							
				</div><!-- #categories -->
				<div id="searchWrapper">
					<?php get_search_form(); ?>
				</div><!-- #searchWrapper -->
			</section><!-- #sectionOne -->
			
			<section id="sectionTwo">
				<div class="container-fluid">
					<div class="row">
						<div id = "featuredPost" class="col-sm-12 px-lg-0">
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionTwo -->

			<section id="sectionThree">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
						<div id="mc_embed_signup">
						<form action="https://neaterorganizing.us4.list-manage.com/subscribe/post?u=bf0569b5291a889e6e574d996&amp;id=7c07f8e24b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						    <div id="mc_embed_signup_scroll">
						    	<p>Subscribe to our newsletter and stay up to date on new posts.</p>
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder = "Email Address">
						</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bf0569b5291a889e6e574d996_7c07f8e24b" tabindex="-1" value=""></div>
						    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn outline-button"></div>
						    </div>
						</form>
						</div>
						<!--End mc_embed_signup-->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionThree -->
			
			<section id = "sectionFour">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<div id="loader" style = "display: none;">
								<img src='<?php echo get_stylesheet_directory_uri() . '/img/loader.gif'; ?>' width='32px' height='32px'>
							</div><!-- #loader -->	
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div id="sortContainer" class = "row">
					<?php while (have_posts()) : the_post(); ?>
							<div class="col-md-6 the-post">
								<?php $img = get_field('featured_image'); ?>
								<div class="post-wrapper" data-bg = "<?php echo $img['url']; ?>">
									<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt'];
									 ?>">
									 <div class="content-wrapper">
										 <div class = "h6 subheader"><?php $cats = '';
											foreach((get_the_category()) as $category) {
											    $cats .= $category->cat_name . ', ';
											}
											echo rtrim($cats, ', '); ?></div>
										 <h1 class="h2 section-title"><?php the_title(); ?></h1>
										 <div class="excerpt">
										 	<?php $trimmed_text = wp_trim_excerpt_modified( get_field('the_content'), 40 );
												$last_space = strrpos( $trimmed_text, ' ' );
												$modified_trimmed_text = substr( $trimmed_text, 0, $last_space ); echo '<p class="excerpt mb-0">' . $modified_trimmed_text . '...'; ?></a></p>
										 </div><!-- .the-excerpt -->
										 <a href = "<?php the_permalink(); ?>"><button role = "button" class = "btn maroon-button">Read More</button></a>	
									 </div><!-- .content-wrapper -->
								</div><!-- .post-wrapper -->	
							</div><!-- .col-md-6 -->
						<?php endwhile; ?>	
					</div><!-- #sortContainer -->
					<div id  = "paginationWrapper">
						<?php understrap_pagination(); ?>
					</div><!-- .pagination -->

				</div><!-- .container-fluid -->
			</section><!-- #sectionFour -->
			<section id="sectionFive">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 text-center">
							<?php $recommendations = get_field('recommendations', 55); ?>
							<h1 class="h5 subheader"><?php echo $recommendations['subheader']; ?></h1>
							<h2 class = "section-title"><?php echo $recommendations['header']; ?></h2>
						</div><!-- .col-sm-12 -->
						<div id="productWrapper">
						<?php while(have_rows('recommendations', 55)) : the_row(); ?>
							<?php while(have_rows('products')) : the_row(); ?>
								<div class="recommended-product text-center">
									<?php $img = get_sub_field('image'); ?>
									<a href="<?php the_sub_field('link'); ?>">
									<img class = "mb-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
									<h5><?php the_sub_field('title'); ?></h5>
									</a>
								</div><!-- .recommended-product -->
							<?php endwhile; ?>
						<?php endwhile; ?>
					</div>
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionFive -->
		</div><!-- #blog -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>