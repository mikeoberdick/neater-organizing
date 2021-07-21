/////////////////  AJAX BLOG FUNCTIONALTIY  \\\\\\\\\\\\\\\\\
jQuery(function($) {

	//Bind parameters to the category ul click
	$('#ajaxCategoryFilter li').on('click', function(event) {
		if(event.preventDefault) { event.preventDefault(); }
		
		//hide the default pagination
		$('#paginationWrapper').hide();
		$('#sortContainer').empty();
		$('#loader').show();

		$('html, body').animate({
		    scrollTop: $('#featuredPost').offset().top
		  }, 0);
		
		$this = $(this);
		$value = this.value;
		$page = $this.data('page');
		$term = $this.data('term');
		$qty = $this.closest('#ajaxCategoryFilter').data('paged');
		
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

	//Bind parameters to default pagination button click
	$(document).on('click', '#paginationWrapper a', function(event) {
	if(event.preventDefault) { event.preventDefault(); }
		$('html, body').animate({
		    scrollTop: $('#featuredPost').offset().top
		  }, 0);
		$('#paginationWrapper').hide();
		$('#sortContainer').empty();
		$('#loader').show();
		
		$this = $(this);
		$page = $this.text();
		$qty = $('#ajaxCategoryFilter').data('paged');
		
	    $params = {
	    	//Bind parameters
        	'page' : $page,
        	'qty'  : $qty,
	    };

	    //Run the query with those parameters
	    get_all_posts($params);
	});

	//Bind parameters to ajax pagination button click
	$(document).on('click', '#postsPagination a', function(event) {
	if(event.preventDefault) { event.preventDefault(); }
		$('html, body').animate({
		    scrollTop: $('#featuredPost').offset().top
		  }, 0);
		$('#sortContainer').empty();
		$('#loader').show();
		
		$this = $(this);

		$page = parseInt($this.attr('href').replace(/\D/g,''));
		$qty = $('#ajaxCategoryFilter').data('paged');
		
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

	//Bind parameters to search query
	$(document).on( 'submit', '#searchform', function() {
	if(event.preventDefault) { event.preventDefault(); }

	//hide the default pagination
		$('#sectionTwo').hide();
		$('#paginationWrapper').hide();
		$('#sortContainer').empty();
		$('#loader').show();

		//$('html, body').animate({
		    //scrollTop: $('#featuredPost').offset().top
		  //}, 0);
		
		$form = $(this);
	    $input = $form.find('input[name="s"]');
	    $query = $input.val();
	    $page = 1;
	    $qty = $('#ajaxCategoryFilter').data('paged');

	    $params = {
	    	//Bind parameters
	    	'query' : $query,
	    	'page' : $page,
        	'qty'  : $qty,
	    };

	    //Run the query with those parameters
	    get_search_posts($params);
	});

	//Bind parameters to search pagination button click
	$(document).on('click', '#searchPagination a', function(event) {
	if(event.preventDefault) { event.preventDefault(); }
		$('html, body').animate({
		    scrollTop: $('#featuredPost').offset().top
		  }, 0);
		$('#sortContainer').empty();
		$('#loader').show();
		
		$this = $(this);
		$form = $('#searchForm');
	    $input = $form.find('input[name="s"]');
	    $query = $input.val();
		$page = parseInt($this.attr('href').replace(/\D/g,''));
		$qty = $('#ajaxCategoryFilter').data('paged');
		
	    $params = {
	    	//Bind parameters
	    	'query' : $query,
	    	'page' : $page,
        	'qty'  : $qty,
	    };

	    //Run the query with those parameters
	    get_search_posts($params);
	});

	function get_all_posts($params) {
		$content = $('#sortContainer');
		$.ajax({
			url: psc.ajax_url,
			data: {
		    	action: 'load_more_posts',
				nonce: psc.nonce,
				params: $params
		    },
			type: 'post',
			dataType: 'json',
			success: function(data, textStatus, XMLHttpRequest) {
		    	if (data.status === 200) {
		    		//Move the first blog post into the featured section
		    		$('#loader').hide();
		    		$content.html(data.content);
					  var firstPost = $('#sortContainer .the-post').first().find('.post-wrapper');
					  $( "#featuredPost" ).empty().append( firstPost );
					  $('#sortContainer .the-post').first().remove();
		    		
		    		
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
		    		//Move the first blog post into the featured section
		    		$('#loader').hide();
		    		$content.html(data.content);
					  var firstPost = $('#sortContainer .the-post').first().find('.post-wrapper');
					  $( "#featuredPost" ).empty().append( firstPost );
					  $('#sortContainer .the-post').first().remove();
		    		
		    		
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

		function get_search_posts($params) {
		
		$content = $('#sortContainer');
		
		$.ajax({
			url: psc.ajax_url,
			data: {
		    	action: 'search_posts',
				nonce: psc.nonce,
				params: $params
		    },
			type: 'post',
			dataType: 'json',
			success: function(data, textStatus, XMLHttpRequest) {
		    	if (data.status === 200) {
		    		//Move the first blog post into the featured section
		    		$('#loader').hide();
		    		$content.html(data.content);
					  var firstPost = $('#sortContainer .the-post').first().find('.post-wrapper');
					  $( "#featuredPost" ).empty().append( firstPost );
					  $('#sortContainer .the-post').first().remove();
		    		
		    		
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