<?php 
/**
*
*	@package MyBlog
*
*	The Image Post
*/
?>
<?php echo get_post_format(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ?> >
	
	<header class="entry-header background-image">
		<!-- <?php echo chomikoo_get_attachment(3); ?> -->
		<?php if( chomikoo_get_attachment() ) :
			// echo '<h1>true</h1>';
			$attachments = chomikoo_get_attachment(3);
			// echo $attachments;
			var_dump($attachments);
		?>

			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
				
				<div class="carousel-inner" role="listbox">

					<?php 
						$i = 0;
						foreach( $attachments as $attachment ) :
							$active = ( $i == 0 ? ' active' : '' );
					?>
						<div class="item-<?php echo $active ?> background-image standard featured" style="background-image: url(<?php echo wp_get_attachment_url( $attachment->ID ); ?>)" >

							\<?php echo wp_get_attachment_url( $attachment->ID );?>\
								
						</div>

					<?php $i++; 
						endforeach; ?>

				</div>

				<a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div><!-- .carousel -->

		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo chomikoo_posted_meta(); ?>
		</div>


	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e( 'Read More' ); ?></a>
		</div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer"> 

			<?php echo chomikoo_posted_footer(); ?>

	</footer>


</article>