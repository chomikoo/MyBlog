<?php 
/**
*
*	@package MyBlog
*
*	The content blog template file
* 	ASIDE
*/
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'chomikoo-aside-format' ); ?>>
	
	<div class="aside__container">
	
		<div class="row">
			
			<div class="col-xs-12 col-sm-3 col-md-2 text-center">
				
				<?php if( chomikoo_get_attachment() ): ?>
				
					<div class="aside__avatar background-image" style="background-image: url(<?php echo chomikoo_get_attachment(); ?>);"></div>
					
				<?php endif; ?>
				
			</div><!-- .col-md-2 -->
			
			<div class="col-xs-12 col-sm-9 col-md-10">
				
				<header class="entry-header">	
			
					<div class="entry-meta">
						<?php echo chomikoo_posted_meta(); ?>
					</div>
					
				</header>
				
				<div class="entry-content">
					
					<div class="entry-excerpt">
						<?php the_content(); ?>
					</div>
					
				</div><!-- .entry-content -->
				
			</div><!-- .col-md-10 -->
			
		</div><!-- .row -->
		
		<footer class="entry-footer">

					<?php echo chomikoo_posted_footer(); ?>
			
		</footer>
		
	</div><!-- .aside-container -->
	
</article>