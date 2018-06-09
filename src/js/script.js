(function($){
	'use strict'

	console.log('Front End');

	//INIT FUNCTINOS
	//==============
	revealPosts();



	// VAR DECLARATION
	//================

	var lastScroll = 0;

	// AJAX functions
	//================

	// Load More - Ajax paggination
	$(document).on('click', '.js-btn-load:not(.loading)', function(){
		
		var that = $(this),
			page = that.data('page'),
			ajaxurl = $(this).data('url'),
			newPage = page+1,
			prev = that.data('prev'),
			archive = that.data('archive');

		if( typeof prev === 'undefined'){
			prev = 0;
		}

		if( typeof archive === 'undefined'){
			archive = 0;
		}

		console.log('data-page ' + page);

		that.addClass('loading').find('.text').slideUp(400);
		that.find('.fas').addClass('fa-spin');

		$.ajax({

			url: ajaxurl,
			type: 'POST',
			data: {
				page: page,
				prev: prev,
				archive: archive,
				action: 'chomikoo_load_more' // ajax.php function
			},

		})
		.done(function(responseText){

			if(responseText == 0) {
				console.log(responseText);

					$('.post-container').append( '<div class="text-center"><h3>Konic!</h3><p>Nima wincej</p></div>' );
					that.slideUp(320);

			} else {

				setTimeout(function(){

					if( prev == 1 ) {
						$('.post-container').prepend(responseText);
						newPage = page-1;
					} else {
						$('.post-container').append(responseText);
						// console.log(responseText);
					}

					if( newPage == 1 ) {

						that.slideUp(400);

					} else {

						that.data('page', newPage);
						
						that.removeClass('loading').find('.text').slideDown(400);
						that.find('.fas').removeClass('fa-spin');

					}

					revealPosts();

				}, 1000)
			}

		})
		.fail(function(msg, status, statusText){
			console.log('Error '  + msg, status, statusText);
		})
		
	});

	// Scroll function
	$(window).on('scroll', function(){

		var scrollPosition = $(window).scrollTop();

		if( Math.abs(scrollPosition - lastScroll) > $(window).height() * 0.1 ) {

			lastScroll = scrollPosition;

			$('.page-limit').each(function(index){
				// console.log($(this))

				if( isVisible( $(this) ) ) {

					history.replaceState( null, null, $(this).attr('data-page') );
					console.log($(this).attr('data-page'));
					return(false);

				}

			});
		}


	});

	// Helper Functions

	function revealPosts(){
		console.log('reveal');

		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();

		var posts = $('article:not(.reveal)');
		var i = 0;

		setInterval(function(){

			if( i >= posts.length) return false;

			var el = posts[i];
			$(el).addClass('reveal');

			i++;

		}, 200);

	}

	function isVisible( elem ) {

		var scrollP = $(window).scrollTop(),
			windowH = $(window).height(),
			elemTop = $(elem).offset().top,
			elemH = $(elem).height(),
			elemBottom = elemTop + elemH;

		// console.log(scrollP + ' ' + $(window).scrollTop())

		// 	console.log(elemBottom - elemH );
		// 	console.log(elemBottom - elemH * 0.25 > scrollP);
			

			return ( ( elemBottom - elemH * 0.25 > scrollP ) && ( elemTop < ( scrollP + 0.5 * windowH ) ) );
			// console.log('ret ' + ret);

	}

})(jQuery)