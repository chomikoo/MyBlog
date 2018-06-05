<?php 
/**
*
*	@package MyBlog
*
*	The content blog template file
*   VIDEO TYPE
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('chomikoo-video-format') ?>>
	
	<header class="entry-header">

		<div class="embed-responsive embed-responsive-16by9">
			<?php echo chomikoo_get_embedded_media( array('video', 'iframe') ) ?>
		</div>

		<?php the_title( '<h1 class="entry-title text-center"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta text-center ">
			<?php echo chomikoo_posted_meta(); ?>
		</div><!-- .entry-title -->

	</header><!-- .entry-header -->

	<div class="entry-content"> 

		<?php if( chomikoo_get_attachment() ) : ?>

			<a href="<?php the_permalink(); ?>">
				
				<div class="standard-featured background-image text-center" style="background-image: url(<?php echo chomikoo_get_attachment(); ?>)"></div>

			</a>

		<?php endif; ?>

		<div class="entry-excerpt text-center">
			<?php the_excerpt(); ?>
		</div>
		
		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn "><?php _e( 'Read More' ); ?></a>
		</div>

	</div>

	<footer class="entry-footer"> 

			<?php echo chomikoo_posted_footer(); ?>

	</footer>


</article>