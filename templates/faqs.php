<?php /* Template Name: FAQs */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="faqs">
			<?php get_template_part('snippets/hero'); ?>
			
			<section id="sectionOne">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h5 subheader"><?php the_field('subheader'); ?></h1>
							<h2 class = "section-title"><?php the_field('header'); ?></h2>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionOne -->

			<section id="sectionTwo">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="w-100 accordion md-accordion" id="faqAccordion" role="tablist" aria-multiselectable="true">
								<?php $i = 0; ?>
								<?php while ( have_rows('questions_and_answers') ) : the_row(); ?>
						        	<div class="question-container">
						        		<div class="card-wrapper" role="tab" id="<?php echo 'question-' . $i; ?>">
				  							<a data-toggle="collapse" data-target="<?php echo '#collapse-question-' . $i; ?>" aria-expanded="<?php if ( $i == 0 ) {echo 'true';} else {echo 'false';}; ?>" aria-controls="<?php echo 'collapse-question-' . $i; ?>">
				  								<div class = "question">
				    								<i class="d-inline fa fa-chevron-down mr-1" aria-hidden="true"></i>
				    								<h3 class="question-text d-inline mb-0 h5"><?php the_sub_field('question'); ?></h3>
				  								</div><!-- .question -->
				  							
					        					<div id="<?php echo 'collapse-question-' . $i; ?>"
					        					class = "<?php if ( $i == 0 ) {echo 'collapse show';} else {echo 'collapse';}; ?>" role="tabpanel" aria-labelledby="<?php echo 'question-' . $i; ?>" data-parent="#faqAccordion">
											      	<div class="card-body">
														<?php the_sub_field('answer'); ?>
											      	</div><!-- .card-body -->
					    						</div><!-- .collapse -->
				  							</a>
										</div><!-- card-wrapper -->
									</div><!-- .question-container -->
								<?php $i++ ?>
								<?php endwhile; ?>
							</div><!-- .accordion -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionTwo -->
			
			</section><!-- #sectionThree -->
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<p><?php the_field('disclaimer_text'); ?></p>
							<a href = "<?php echo $link['button_link']; ?>"><button role = "button" class = "btn outline-button"><?php echo $link["button_text"]; ?></button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionThree -->
		</div><!-- #faqs -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>