<?php 
/**
*
*	@package MyBlog
*
*	The Image Post
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('chomikoo-image-format') ?> >
	
	<header class="entry-header background-image" style="background-image: url(<?php echo chomikoo_get_attachment(); ?>)">

		<?php the_title( '<h1 class="entry-title text-center"><a href="'. esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<div class="entry-meta text-center"> 

			<?php echo chomikoo_posted_meta(); ?>

		</div><!-- .entry-title -->

		<div class="entry-excerpt image-description text-center">
			
			<?php the_excerpt(); ?>

		</div><!-- .entry-excerpt -->

	</header><!-- .entry-header -->

	<footer class="entry-footer"> 

			<?php echo chomikoo_posted_footer(); ?>

	</footer>


</article>