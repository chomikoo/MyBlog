(function($){
	'use strict'

	console.log('Front End');


	// AJAX functions

	// Load More - Ajax paggination
	$(document).on('click', '.js-btn-load', function(){
		var that = $(this),
			page = that.data('page'),
			ajaxurl = $(this).data('url'),
			newPage = page+1;

		$.ajax({

			url: ajaxurl,
			type: 'POST',
			data: {
				page: page,
				action: 'chomikoo_load_more' // ajax.php function
			},

		})
		.done(function(responseText){
			that.data('page', newPage);
			$('.post-container').append(responseText);

		})
		.fail(function(msg, status, statusText){
			console.log('Error '  + msg, status, statusText);
		})
		
	});

})(jQuery)