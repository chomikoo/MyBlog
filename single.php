<?php 
/**
*
*	@package MyBlog
*
*	Template - Single Post
*/

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
		
			<div class="container">

				<div class="row">
					
					<div class="col-12">
						
						<?php 

							if( have_posts() ){

								while( have_posts() ){

									the_post();

									get_template_part( 'template-parts/single', get_post_format() );

									echo chomikoo_post_navigation();

									if( comments_open() ) {
										comments_template();
									}

								} ;

							}



						?>

					</div>

				</div>

			</div>

		</main>

	</div>


<?php get_footer(); ?>
