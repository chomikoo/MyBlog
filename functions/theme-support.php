<?php
/*
	
@package MyBlog
	
	========================
	THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

$header = get_option( 'custom_header' );
if( @$header ){
	add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );

if( @$background ){
	add_theme_support( 'custom-background' );
}

add_theme_support( 'post-thumbnails' );

/* 

	BLOG CUSTOM FUNCTIONS

*/

function chomikoo_posted_meta() {
	$posted_on = human_time_diff(  get_the_time('U') , current_time( 'timestamp' ) );

	$categories = get_the_category();															
	$separator = ', ';
	$output = '';
	$i = 1;

	if( !empty( $categories ) ):

		foreach( $categories as $category ):

			if( $i > 1 ){ $output .= $separator; }

			$output .= '<a href="'. esc_url( get_category_link( $category->term_id ) ) .'" alt="'. esc_attr( 'View all posts in%s', $category->name ) .'">' . esc_html( $category->name ) . '</a>';
			$i++ ;
		endforeach;

	endif;

	return '<span class="posted-on">Posted <a href="' . esc_url( get_permalink() ) . '">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}

function chomikoo_posted_footer() {

	$comments_num = get_comments_number();
	if( comments_open() ) {
		if( $comments_num == 0 ){
			$comments = __('No comments');
		} elseif ( $comments_num > 1 ) {
			$comments = $comments_num . __('Comments');
		} else {
			$comments = __('1 Comment');
		}

		$comments = '<a href="' . get_comments_link() . '">' . $comments . ' <span class="far fa-comments"></span></a>';

	} else {
		$comments = __( 'Comments are closet' );
	}

	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">' . get_the_tag_list('<div class="tags-list"> <span class="fas fa-tags"></span>', '', '</div>') . '</div><div class="col-xs-12 col-sm-6">' . $comments . '</div></div></div>';
}

function chomikoo_get_attachment( $num = 1 ){
	// echo 'num 1' .$num .'<br>';
	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
	// echo 'num 2' .$num .'<br>';

		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
	// echo 'num 3' .$num .'<br>';
	// echo 'attachment ' .$attachments .'<br>';
	// var_dump($attachments);

		if( $attachments && $num == 1 ):
	// echo 'num 4' .$num .'<br>';

			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
	// echo 'num 5' .$num .'<br>';

			endforeach;
		elseif( $attachments && $num > 1 ):
	// echo 'num 6' .$num .'<br>';

			$output = $attachments;
		endif;
		
		wp_reset_postdata();
		
	endif;
	// echo '/output' . $output .'<br>';
	
	return $output;
}

function chomikoo_get_embedded_media( $type = array() ) {
	$content = do_shortcode( apply_filters( 'the_content' , get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	$output = str_replace( '?visual=true' , '?visual=false', $embed[0]);
	return $output;
}



// URLS

function chomikoo_grab_url() {
	if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
		return false;
	}
	return esc_url_raw( $links[1] );
}
