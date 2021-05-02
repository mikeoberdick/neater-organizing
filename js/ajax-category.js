/////////////////  AJAX BLOG FUNCTIONALTIY  \\\\\\\\\\\\\\\\\
jQuery(function($) {

	//Bind parameters to the category ul click
	$('#ajaxCategoryFilter li').on('click', function(event) {
		if(event.preventDefault) { event.preventDefault(); }
		//hide the default pagination
		$('#paginationWrapper').hide();
		$('#sortContainer').empty();
		$('#loader').show();
		
		$this = $(this);
		$value = this.value;
		$page = $this.data('page');
		$term = $this.data('term');
		$qty = $this.closest('#ajaxCategoryFilter').data('paged');

		console.log('value is ' + $value + ' page is ' + $page + ' term is ' + $term + ' qty is ' + $qty);

		$('html, body').animate({
		    scrollTop: $('#sectionThree').offset().top
		  }, 500);
		
        $params = {
        	//Bind parameters
        	'value' : $value,
        	'page' : $page,
        	'term' : $term,
        	'qty'  : $qty,
        };
        //Run the query with those parameters
        get_posts($params);
	});

	//Bind parameters to pagination button click
	$(document).on('click', '.ajax-pagination a', function(event) {
	if(event.preventDefault) { event.preventDefault(); }

		$('#sortContainer').empty();
		$('#loader').show();
		
		$this = $(this);

		$page = parseInt($this.attr('href').replace(/\D/g,''));
		$qty = $('#ajaxCategoryFilter').data('paged');

		$('html, body').animate({
		    scrollTop: $('#sectionThree').offset().top
		  }, 500);
		
	    $params = {
	    	//Bind parameters
	    	'value' : $value,
        	'page' : $page,
        	'term' : 'general',
        	'qty'  : $qty,
	    };

	    //Run the query with those parameters
	    get_posts($params);
	});

	function get_posts($params) {
		$content = $('#sortContainer');
		$.ajax({
			url: psc.ajax_url,
			data: {
		    	action: 'filter_posts',
				nonce: psc.nonce,
				params: $params
		    },
			type: 'post',
			dataType: 'json',
			success: function(data, textStatus, XMLHttpRequest) {
		    	if (data.status === 200) {
		    		$('#loader').hide();
		    		$content.html(data.content);
		    	}
		    	else if (data.status === 201) {
		    		$('#loader').hide();
		    		$content.html(data.message);	
		    	}
		    	else {
		    		$('#loader').hide();
		    		$status.html(data.message);
		    	}
			},
	    	error: function(MLHttpRequest, textStatus, errorThrown) {
			$status.html(textStatus);
	         }
		});
	}


	
	//END OF FILE
});