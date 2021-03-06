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

// add_theme_support( 'html5', array( 'comment-list',  ) );


/* 
	=====================
	BLOG CUSTOM FUNCTIONS
	=====================
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

		$comments = '<a class="comments-link" href="' . get_comments_link() . '">' . $comments . ' <span class="far fa-comments"></span></a>';

	} else {
		$comments = __( 'Comments are closet' );
	}

	return '<div class="post-footer__container"><div class="row"><div class="col-12 col-sm-6">' . get_the_tag_list('<div class="tags-list"> <span class="fas fa-tags"></span>', ', ', '</div>') . '</div><div class="col-12 col-sm-6 text-right">' . $comments . '</div></div></div>';
}

function chomikoo_get_attachment( $num = 1 ){
		$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;
		
		wp_reset_postdata();
		
	endif;
	
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


function chomikoo_grab_current_uri() {
	$http = ( isset( $_SERVER["HTTPS"] ) ? 'https://' : 'http://' );
	$referer = $http . $_SERVER["HTTP_HOST"];
	$archive_url = $referer . $_SERVER["REQUEST_URI"];
	
	return $archive_url;
}


/*
	========================
	SINGLE POST CUSTOM FUNCTIONS
	========================
*/
function chomikoo_post_navigation(){
	
	$nav = '<div class="row">';
	
	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="chevron-left" aria-hidden="true"><</span> %link</div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';
	
	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="chevron-right" aria-hidden="true">></span></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';
	
	$nav .= '</div>';
	
	return $nav;
	
}


// Share options 

function chomikoo_share_this( $content ) {

	if( is_single() ){

		$content .= '<div class="chomikoo_shareThis"><h4>Udostępnij</h4>';

		$title = get_the_title();
		$permalink = get_permalink();

		$twitterHandler = ( get_option('twitter_handler') ? '&amp;via=' . esc_attr( get_option('twitter_handler') ) : '' );

		$twitter = 'https://twitter.com/intent/tweet?text=Hey! Zobacz: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
		$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
		$google = 'https://plus.google.com/share?url=' . $permalink;


		$content .= '<ul>';
		$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="fab fa-twitter-square"></span></a></li>';
		$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="fab fa-facebook-square"></span></a></li>';
		$content .= '<li><a href="' . $google . '" target="_blank" rel="nofollow"><span class="fab fa-google-plus-square"></span></a></li>';
		$content .= '</ul></div>';
		
		return $content;
	
	} else {
		return $content;
	}

}

add_filter( 'the_content' , 'chomikoo_share_this');


function chomikoo_get_post_navigation(){
	
	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):
	
		require( get_template_directory() . '/template-parts/chomikoo-comment-nav.php' );
	
	endif;
	
}


/*
	=================
	SIDEBAR FUNCTION
	=================
*/

function chomikoo_sidebar_init() {

	register_sidebar(
		array(
			'name' => esc_html( 'Chomikoo Sidebar', 'chomikootheme' ),
			'id' 	=> 'chomikoo-sidebar',
			'description' 	=> 'Dynamic Sidebar',
			'before_widget' => '<section id="%1s" class="chomikoo-widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title' => '<h2 class="chomikoo-widget-title">',
			'after_title' => '</h2>'
		)
	);
}

add_action( 'widgets_init', 'chomikoo_sidebar_init' );