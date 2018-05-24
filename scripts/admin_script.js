(function($){
	'use strict'
	console.log('admin jQuery');

	var mediaUploader;

	$( '#upload-button' ).on('click', function(event){
		event.preventDefault();

		if(mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select', function() {
			var attachment = mediaUploader.state().get('selection').first().toJSON();
			console.log(attachment);
			$('#profile-picture').val(attachment.url);
			$('#sidebar_img_preview').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();


	});


})(jQuery)