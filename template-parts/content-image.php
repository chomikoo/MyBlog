<?php 
/**
*
*	@package MyBlog
*
*	The Image Post
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class() ?> >
	
	<header class="entry-header background-image" style="background-image: url(<?php echo chomikoo_get_attachment(); ?>)">

		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<div class="entry-title"> 

			<?php echo chomikoo_posted_meta(); ?>

		</div><!-- .entry-title -->

		<div class="entry-excerpt image-caption">
			
			<?php the_excerpt(); ?>

		</div><!-- .entry-excerpt -->

	</header><!-- .entry-header -->

	<footer class="entry-footer"> 

			<?php echo chomikoo_posted_footer(); ?>

	</footer>


</article>