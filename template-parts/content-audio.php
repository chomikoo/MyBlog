<?php 
/**
*
*	@package MyBlog
*
*	The content blog template file
*   AUDIO TYPE
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('chomikoo-audio') ?>>
	
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-title"> 

			<?php echo chomikoo_posted_meta(); ?>

		</div><!-- .entry-title -->

	</header><!-- .entry-header -->

	<div class="entry-content"> 

		<?php echo chomikoo_get_embedded_media( array( 'audio', 'iframe' ) ); ?>

	</div>

	<footer class="entry-footer"> 

			<?php echo chomikoo_posted_footer(); ?>

	</footer>


</article>