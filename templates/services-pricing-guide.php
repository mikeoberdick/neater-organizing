<?php /* Template Name: Services & Pricing Guide */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<div id="servicesPricingGuide">
			<?php get_template_part('snippets/hero'); ?>

			<?php $one = get_field('section_one'); ?>
			<section id="sectionOne">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 pl-lg-0 d-flex align-items-center justify-content-center mb-3 mb-lg-0 mt-3 mt-lg-0">
							<?php $img = $one['image']; ?>
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-4 -->
						<div class="right col-lg-6 d-flex flex-column align-items-start justify-content-center">
							<?php $img = $one['icon']; ?>
							<div class="text-center text-lg-left mx-auto mx-lg-0">
							<img class = "pl-0 pl-lg-3 mb-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<h1 class="text-center text-lg-left h2 section-title"><?php echo $one['header']; ?></h1>
							</div>
							<div class="inner-container pl-lg-3">
								<div class = " wysiwyg text-center text-lg-left"><?php echo $one['copy']; ?></div>
								<table class="table">
								  <thead>
								    <tr>
								    	<?php while(have_rows('section_one')) : the_row(); ?>
								    		<?php while(have_rows('table')) : the_row(); ?>
								    			<th scope="col"><?php the_sub_field('column_one'); ?></th>
								    			<th scope="col"><?php the_sub_field('column_two'); ?></th>
								    			<th scope="col"><?php the_sub_field('column_three'); ?></th>
								    		<?php endwhile; ?>
								    	<?php endwhile; ?>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php while(have_rows('section_one')) : the_row(); ?>
							    		<?php while(have_rows('table_data')) : the_row(); ?>
							    			<tr>
										      <td><?php the_sub_field('column_one'); ?></td>
										      <td><?php the_sub_field('column_two'); ?></td>
										      <td><?php the_sub_field('column_three'); ?></td>
										    </tr>
							    		<?php endwhile; ?>
							    	<?php endwhile; ?>
								  </tbody>
								</table>
							</div><!-- .inner-container -->
						</div><!-- .col-lg-6 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionOne -->
			
			<?php $two = get_field('section_two'); ?>
			<section id="sectionTwo">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6 offset-lg-2 d-flex align-items-center order-2 order-lg-0 mkb-3 mb-lg-0">
							<div class="inner-wrapper">
								<?php $img = $two['icon']; ?>
								<div class="text-center text-lg-left mx-auto mx-lg-0">
								<img class = "pl-3 mb-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<h1 class="h2 section-title"><?php echo $two['header']; ?></h1>
								</div>
								<div class="inner-container pl-3">
									<div class = "wysiwyg text-center text-lg-left"><?php echo $two['copy']; ?></div>
									<table class="table">
									  <thead>
									    <tr>
									    	<?php while(have_rows('section_two')) : the_row(); ?>
									    		<?php while(have_rows('table')) : the_row(); ?>
									    			<th scope="col"><?php the_sub_field('column_one'); ?></th>
									    			<th scope="col"><?php the_sub_field('column_two'); ?></th>
									    			<th scope="col"><?php the_sub_field('column_three'); ?></th>
									    		<?php endwhile; ?>
									    	<?php endwhile; ?>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php while(have_rows('section_two')) : the_row(); ?>
								    		<?php while(have_rows('table_data')) : the_row(); ?>
								    			<tr>
											      <td><?php the_sub_field('column_one'); ?></td>
											      <td><?php the_sub_field('column_two'); ?></td>
											      <td><?php the_sub_field('column_three'); ?></td>
											    </tr>
								    		<?php endwhile; ?>
								    	<?php endwhile; ?>
									  </tbody>
									</table>
								</div><!-- .inner-container -->	
							</div><!-- .inner-wrapper -->
						</div><!-- .col-lg-6 -->
						<div class="col-lg-4 pr-lg-0 d-flex align-items-center justify-content-center mb-3 mb-lg-0">
							<?php $img = $two['image']; ?>
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- $sectionTwo -->

			<?php $three = get_field('section_three'); ?>
			<section id="sectionThree">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 pl-lg-0 d-flex align-items-center justify-content-center mb-3 mb-lg-0">
							<?php $img = $three['image']; ?>
							<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-lg-4 -->
						<div class="col-lg-6 d-flex flex-column justify-content-center align-items-start">
							<?php $img = $three['icon']; ?>
							<div class="text-center text-lg-left mx-auto mx-lg-0">
							<img class = "pl-3 mb-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<h1 class="h2 section-title"><?php echo $three['header']; ?></h1>
							</div>
							<div class="inner-container pl-3">
								<div class = "wysiwyg text-center text-lg-left"><?php echo $three['copy']; ?></div>
								<?php while(have_rows('section_three')) : the_row(); ?>
								  <?php if(have_rows('table')) : ?>
										<table class="table">
										  <thead>
										    <tr>
										    		<?php while(have_rows('table')) : the_row(); ?>
										    			<th scope="col"><?php the_sub_field('column_one'); ?></th>
										    			<th scope="col"><?php the_sub_field('column_two'); ?></th>
										    			<th scope="col"><?php the_sub_field('column_three'); ?></th>
										    	<?php endwhile; ?>
										    </tr>
										  </thead>
										  <tbody>
									    		<?php while(have_rows('table_data')) : the_row(); ?>
									    			<tr>
												      <td><?php the_sub_field('column_one'); ?></td>
												      <td><?php the_sub_field('column_two'); ?></td>
												      <td><?php the_sub_field('column_three'); ?></td>
									    	<?php endwhile; ?>
										  </tbody>
										</table>
									<?php endif; endwhile; ?>
							</div><!-- .inner-container -->
						</div><!-- .col-lg-6 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #sectionThree -->

			<?php $four = get_field('section_four'); ?>
			<section id="sectionFour">
				<div class="container">
					<div class="row">
						<div id = "giftCertificates" class="col-sm-12 text-center">
							<h1 class = "h2 section-title"><?php echo $four['header']; ?></h2>
							<p><?php echo $four['content']; ?></p>
							<button role = "button" class = "btn outline-button" data-toggle="modal" data-target="#giftCardModal"><?php echo $four["button_text"]; ?></button>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #sectionFour -->

		</div><!-- #servicesPricingGuide -->
	</main><!-- #main -->
</div><!-- #content -->

<!-- GIFT CARD MODAL -->
<div class="modal fade" id="giftCardModal" tabindex="-1" role="dialog" aria-labelledby="Gift Card Contact Form" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div id = "modalTop" class = "d-flex align-items-center">	
			<a class="modal-close" data-dismiss="modal"><i class="fa fa-times-thin" aria-hidden="true"></i></a>		
      	</div>
      	<h1 class="h2 section-title"><?php the_field('gift_card_header', 'options'); ?></h1>
      	<p><?php the_field('gift_card_content', 'options'); ?></p>
      	<?php echo do_shortcode ('[ninja_form id=2]'); ?>
      </div><!-- .modal-body -->
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->

<?php get_footer(); ?>