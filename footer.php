<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<?php $mc = get_field('mailchimp_subscribe', 'options'); $bg = $mc['background']; ?>
<section id="mailchimp" style = "background: url('<?php echo $bg['url']; ?>');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="inner-container">
					<h1 class = "mb-3"><?php echo $mc['header']; ?></h1>
					<div class = "wysiwyg"><?php echo $mc['content']; ?></div><!-- .wysiwyg -->
					<!-- Begin Mailchimp Signup Form -->
						<div id="mc_embed_signup">
						<form action="https://neaterorganizing.us4.list-manage.com/subscribe/post?u=bf0569b5291a889e6e574d996&amp;id=7c07f8e24b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						    <div id="mc_embed_signup_scroll">
							
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" placeholder = "Email Address" class="required email" id="mce-EMAIL">
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
						<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
						<!--End mc_embed_signup-->
				</div><!-- .inner-container -->
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #mailchimp -->

<section id="instagram" class = "mb-0">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1 class="h6 small subheader mb-2">Follow Us On Instagram</h1>
				<a href="<?php the_field('instagram_url', 'options'); ?>"><h2 class = "h1 mb-3">@NeaterOrganizing</h2></a>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
	<div id="instagramFeed">
		<?php echo do_shortcode('[instagram-feed]'); ?>
	</div><!-- #instagramFeed -->
</section><!-- #instagram -->

<footer>
	<div class="inner-wrapper">
		<div id="footerLogo">
			<?php $img = get_field('logo', 'options'); ?>
			<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
		</div><!-- #footerLogo -->
		<div id="footerLinks">
			<div class="left">
				<ul class = "list-unstyled">
				<?php $leftUrls = get_field('footer_links_left', 'options'); ?>
				<?php foreach( $leftUrls as $post ): ?>
			        <li>
			            <a class = "h6 subheader" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			        </li>
	        	<?php endforeach; wp_reset_postdata(); ?>
	        	</ul>
			</div><!-- .left -->
			<div class="right">
				<ul class = "list-unstyled">
					<?php $rightUrls = get_field('footer_links_right', 'options'); ?>
					<?php foreach( $rightUrls as $post ): ?>
				        <li>
				            <a class = "h6 subheader" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				        </li>
		        	<?php endforeach; wp_reset_postdata(); ?>
		        	<li>
			            <a class = "h6 subheader" href="/services-pricing-guide#giftCertificate">Gift Certificates</a>
			        </li>
		        </ul>	
			</div><!-- .right -->
		</div><!-- #footerLinks -->
		<div id="contact">
			<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
			<h5 class = "h6 subheader">Call Us At <a href="tel:<?php echo $phone ?>"><?php the_field('phone_number', 'option'); ?></a></h5>
			<h5 class = "h6 subheader" >Or Find Us Online</h5>
			<div class="social-links">
				<a class = "social-link instagram mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('instagram_url', 'options') ?>"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/instagram.png'; ?>"><span class = "sr-only sr-only-focusable">Instagram</span></a>
				<a class = "social-link facebook mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('facebook_url', 'options') ?>"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/facebook.png'; ?>"><span class = "sr-only sr-only-focusable">Facebook</span></a>
				<a class = "social-link yelp mr-2" rel="noreferrer" target = "_blank" href="<?php the_field('yelp_url', 'options') ?>"><img class = "mr-2" src = "<?php echo get_stylesheet_directory_uri() . '/img/yelp.png'; ?>"><span class = "sr-only sr-only-focusable">Yelp</span></a>
				<a class = "social-link pinterest" rel="noreferrer" target = "_blank" href="<?php the_field('pinterest_url', 'options') ?>"><img src = "<?php echo get_stylesheet_directory_uri() . '/img/pinterest.png'; ?>"><span class = "sr-only sr-only-focusable">Pinterest</span></a>
			</div><!-- .social-links -->
		</div><!-- #contact -->	
	</div><!-- .inner-wrapper -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class = "mb-0 small"><?php echo '&copy ' . get_bloginfo('name') . ' ' . date('Y') . '. All Rights Reserved.'; ?>
					<a href="/privacy-policy">Privacy Policy.</a>
					<a href="/terms-and-conditions">Terms & Conditions.</a>
				</p>
				<p class = "mb-0 small">Website by <a rel="noreferrer" target = "_blank" href = "https://www.saraholiviamarketing.com/" alt = "Sarah Olivia Marketing">Sarah Olivia Marketing.</a></p>	
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->			
</footer>

<?php wp_footer(); ?>

<?php if (is_page_template('templates/homepage.php')) : ?>
<script>
	jQuery(document).ready(function($) {
		var $slider = $('#testimonialSlider');

		if ($slider.length) {
		  var currentSlide;
		  var slidesCount;
		  var sliderCounter = $('#counter span');
  
		  var updateSliderCounter = function(slick, currentIndex) {
		    currentSlide = slick.slickCurrentSlide() + 1;
		    slidesCount = slick.slideCount;
		    $(sliderCounter).text(currentSlide + ' OF ' +slidesCount)
		  };

		  $slider.on('init', function(event, slick) {
		    updateSliderCounter(slick);
		  });

		  $slider.on('afterChange', function(event, slick, currentSlide) {
		    updateSliderCounter(slick, currentSlide);
		  });

			$slider.slick({
			    slidesToShow: 1,
			    slidesToScroll: 1,
			    adaptiveHeight: true,
			    prevArrow: $('.testimonialSliderOuterWrapper').find('.prev-arrow'),
        		nextArrow: $('.testimonialSliderOuterWrapper').find('.next-arrow')
	  		});
		}
	});
</script>
<?php endif; ?>

<?php if ( is_page_template('templates/blog.php') ) : ?>
<script>
	var containerEl = document.querySelector('#sortContainer');
	var mixer = mixitup(containerEl, {
    	callbacks: {
    		onMixStart: function(state, futureState) {
        		console.log(futureState.activeFilter.selector);
    		}
		},
		pagination: {
	        limit: 3
	    }
	});
</script>
<?php endif; ?>

</body>

</html>