<?php if (is_home() || is_search() ){
	$hero = get_field('hero', 55);
} else {
	$hero = get_field('hero');
}
$img = $hero['background_image']; 
if ( $hero['header'] ) {
	$title = $hero['header'];
} else {
	$title = get_the_title();
} ?>

<section class = "hero" style = "background: url(<?php echo $img['url']; ?>)">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="inner-container">
					<h1 class = "header"><?php echo $title; ?></h1>
					<?php if ( $hero['copy'] ) : ?>
					<p class = "copy"><?php echo $hero['copy']; ?></p>
					<?php endif; ?>
					<?php if ( $hero['button_text'] ) : ?>
					<a href = "<?php echo $hero['button_link']; ?>"><button role = "button" class = "btn blue-button"><?php echo $hero["button_text"]; ?></button></a>
					<?php endif; ?>
				</div><!-- .inner-container -->
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->	
</section><!-- .hero -->