<?php 
/**
*
*	@package MyBlog
*
*	The main blog template file
*/

get_header(); ?>


	<div id="primary" class="content-area">

		<main id="main" class="side-main" role="main">
		
			<div class="container">
				<?php 

					if( have_posts() ):

						while( have_posts() ):  the_post();
							
							// echo get_post_format();
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

					endif;

				?>

			</div><!-- .container -->

		</main>

	</div>


<?php get_footer(); ?>
