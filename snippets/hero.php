<?php $hero = get_field('hero'); ?>

<?php $img = $hero['background_image']; ?>
<section class = "hero" style = "background: url(<?php echo $img['url']; ?>)">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-sm-12 h-100">
				<div class="inner-container">
					<h1 class = "header"><?php echo $title; ?></h1>
					<?php if ( $hero['text'] ) : ?>
					<p class = "text"><?php echo $hero['text']; ?></p>
					<?php endif; ?>
				</div><!-- .inner-container -->
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->	
</section><!-- .hero -->