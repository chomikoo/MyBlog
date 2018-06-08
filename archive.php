<?php 
/**
*
*	@package MyBlog
*
*	Archive
*/

get_header(); ?>


	<div id="primary" class="content-area">

		<main id="main" class="side-main" role="main">

			<header class="archive-header text-center">
				<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
			</header>

			<?php if( is_paged() ):?>

				<div class="container text-center">
					<a class="btn btn-lg btn-default btn-load js-btn-load" data-prev="1" data-archive="<?php echo chomikoo_grab_current_uri(); ?>" data-page="<?php echo chomikoo_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
						<span class="fas fa-spinner"></span> 
						<span class="text"><?php _e('Load Prev') ?></span>
					</a>
				</div><!-- .container -->

			<?php endif; ?>
		
			<div class="container post-container">
				
				<?php 

					if( have_posts() ):

						echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] . '">';

						while( have_posts() ):  the_post();

							// echo get_post_format();
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						echo '</div>';

					endif;

				?>

			</div><!-- .container -->


			<div class="container text-center">
				<a class="btn btn-lg btn-default btn-load js-btn-load" data-page="<?php echo chomikoo_check_paged(1); ?>" data-archive="<?php echo chomikoo_grab_current_uri(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<span class="fas fa-spinner"></span> 
					<span class="text"><?php _e('Load More') ?></span>
				</a>
			</div><!-- .container -->

		</main>

	</div>


<?php get_footer(); ?>
