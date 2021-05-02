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
					<div id = "ajaxCategoryFilter" data-paged="2" style = "display: none;">
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
							[MAILCHIMP]
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
												$modified_trimmed_text = substr( $trimmed_text, 0, $last_space ); echo '<p class="excerpt mb-0">' . $modified_trimmed_text; ?></a></p>
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
		</div><!-- #blog -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>