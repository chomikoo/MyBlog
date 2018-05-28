(function($){
	'use strict'
	console.log('admin css');


	function updateCSS(){
		$('#chomikoo_css').val( editor.getSession().getValue() );
		console.log($('#chomikoo_css').val( editor.getSession().getValue() ))
	}
	// console.log('uCSS ' + updateCSS);

	$('#custom-css-form').submit( updateCSS );

	var editor = ace.edit('customCss');
		editor.setTheme('ace/theme/monokai');
		editor.getSession().setMode('ace/mode/css');




})(jQuery)