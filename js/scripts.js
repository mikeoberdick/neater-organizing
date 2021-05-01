jQuery(function($){
	$(document).ready(function() {
		//Smooth scroll behavior for jump links
		$(".scroll-down").on('click', function(event) {
		  var hash = this.hash;
		  $('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 500);
		    return false;
		});

		//No follow on Captcha
		if ( window.location.href.indexOf("captchaintherye.com") > -1 ) {
			console.log('on captcha');
	    } else if ( window.location.href.indexOf(".d4tw") > -1) {
			console.log('on d4tw');
	    	}
		else {
	    	alert('NEED TO REMOVE NOINDEX FROM HEADER & THIS LINE FROM JS');
	    }

		//Push down the footer on short pages
		$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

		//Switch to hover displaying dropdown versus default bootstrap behavior of click to show
		$('.navbar .dropdown').hover(function() {
		$(this).find('.dropdown-menu').addClass('d-block').first().stop(true, true).delay(0).slideDown();
		}, function() {
		$(this).find('.dropdown-menu').removeClass('d-block').first().stop(true, true).delay(100).slideUp().removeClass('tst');
		});

		//if ($(window).width() < 992) {
		   //do some mobile stuff
		//}






		//end of document ready call
	});
//end of file
});