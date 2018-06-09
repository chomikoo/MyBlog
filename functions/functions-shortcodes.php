<?php 

/* 

@package MyBlog

==========
SHORTCODES
==========


*/

function chomikoo_tooltiop( $atts, $content = null ) {

	// <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>

	$atts = shortcode_atts( 
		array(
			'placement' => 'top', 
			'title' 	=> '',
		),
		$atts, 'tooltip' );

	$title = ( $atts['title']== '' ? $content : $atts['title'] );

	return '<span class="chomikoo-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';

}


add_shortcode( 'tooltip', 'chomikoo_tooltiop' );
//[tooltip placement="top" title="asdasdas asdasd "]This is a content[/tooltip]

function chomikoo_popover( $atts, $content = null ) {

	$atts = shortcode_atts( 
		array(
			'placement'	=> 'top',
			'title'		=> '',
			'trigger' 	=> 'click',
			'content'	=> '',
		),
		$atts, 'popover'
	);

	return '<span class="chomikoo-popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' . $atts['content'] . '">' . $content . '</span>';

}

//[popover placement="top" title="asdasdas asdasd "]This is a content[/popover]

