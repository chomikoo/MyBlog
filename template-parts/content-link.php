<?php 
/**
*
*	@package MyBlog
*
*	The content blog template file
*   LINK
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'chomikoo-link-format' ); ?>>
	
	<header class="entry-header text-center">
		
		<?php 
			$link = chomikoo_grab_url();
			the_title( '<h1 class="entry-title"><a href="' . $link . '" target="_blank" >', '<div class="link-icon"><span class="fas fa-link"></span></div></a></h1>'); 
		?>
		
	</header>

</article>