jQuery(function($) {
	$(document).ready(function() {
		//Smooth scroll behavior for jump links
		$(".scroll-down").on('click', function(event) {
		  var hash = this.hash;
		  $('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 500);
		    return false;
		});

		//Push down the footer on short pages
		$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

		//Move the first blog post into the featured section
		if ($('#blog').length > 0) {
		  var firstPost = $('#sortContainer .the-post').first().find('.post-wrapper');
		  $( "#featuredPost" ).append( firstPost );
		  $('#sortContainer .the-post').first().remove();
		}

		//Handle the ajax category functionality
		$('#categoryButton').on('click', function() {
			if ( $(this).parent().find('#ajaxCategoryFilter:hidden').length != 0) {
				$(this).parent().find('#ajaxCategoryFilter').slideDown();	
			} else {
				$(this).parent().find('#ajaxCategoryFilter').slideUp();
			}
			
		});
		$('#ajaxCategoryFilter .close-icon, #ajaxCategoryFilter li').on('click', function() {
			$('#ajaxCategoryFilter').slideUp();
		});

		//Open gift card modal if the pricing page is hit with the hash #giftcerticate
		if( window.location.hash && window.location.hash == '#giftCertificate') {
		  $('#giftCardModal').modal('show');
		};

		//Swap out the href attribute for the About link in the footer to go to the Meet Annette page
		$('#footerLinks .left ul li:nth-of-type(2) a').attr("href", "/meet-annette")

		//Add a period to the end of the Wordpress default comment cookie content checkbox label
		var original = $('.comment-form-cookies-consent label').text();
		$('.comment-form-cookies-consent label').text(original + '.');


		//Large viewport and up
		///Switch to hover displaying dropdown versus default bootstrap behavior of click to show
		if ($(window).width() > 991) {
			$('.navbar .dropdown').hover(function() {
			$(this).find('.dropdown-menu').addClass('d-block').first().stop(true, true).delay(0).slideDown();
			}, function() {
			$(this).find('.dropdown-menu').removeClass('d-block').first().stop(true, true).delay(100).slideUp().removeClass('tst');
			});
		}
		
		if ($(window).width() < 572) {
		  //Change the homepage review slider header to include a <br> on mobile
		  $('#homepage .hero .header').html('We\'re here to create<br>space & simplicity');
		};

		//Setup a listener for scrolling event
		var didScroll;
		// on scroll, let the interval function know the user has scrolled
		$(window).scroll(function(event){
		  didScroll = true;
		});
		// run hasScrolled() and reset didScroll status
		setInterval(function() {
		  if (didScroll) {
		    hasScrolled();
		    didScroll = false;
		  }
		}, 250);

		//vars for scroll functionality
		var lastScrollTop = 0;
		var delta = 5;
		var navbarHeight = $('.header-outer-wrapper').outerHeight();

		//Set the padding-top for body to allow for fixed header
		$('body').css('padding-top', navbarHeight + 'px');

		function hasScrolled() {
		  var st = $(this).scrollTop();
		  if (Math.abs(lastScrollTop-st) <= delta)
  			return;
	  		// If current position > last position AND scrolled past navbar...
			if (st > lastScrollTop && st > navbarHeight){
			  // Scroll Down
			  $('.header-outer-wrapper').removeClass('nav-down').addClass('nav-up');
			} else {
			  // Scroll Up
			  // If did not scroll past the document (possible on mac)...
			  if(st + $(window).height() < $(document).height()) { 
			    $('.header-outer-wrapper').removeClass('nav-up').addClass('nav-down');
			  }
			}
			lastScrollTop = st;
		}

		//end of document ready call
	});
//end of file
});