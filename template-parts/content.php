<?php 
/**
*
*	@package MyBlog
*
*	The content blog template file
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	
	<header class="entry-header text-center">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta"> 

			<?php echo chomikoo_posted_meta(); ?>

		</div><!-- .entry-title -->

	</header><!-- .entry-header -->

	<div class="entry-content"> 

		<?php if( has_post_thumbnail() ): ?>

			<div class="post-thumbnail">
				
				<?php the_post_thumbnail('large', array('class' => 'img-fluid' )); ?>

			</div>

		<?php endif; ?>

		<div class="entry-excerpt">
			
			<?php the_excerpt(); ?>


			<div class="button-container text-center">
				<a href="<?php the_permalink(); ?>" class="btn btn--more"><?php _e( 'Read More' ); ?></a>
			</div>
			
		</div><!-- .entry-excerpt -->

	</div>

	<footer class="entry-footer"> 

			<?php echo chomikoo_posted_footer(); ?>

	</footer>


</article>