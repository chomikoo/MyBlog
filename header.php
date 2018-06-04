<?php 
/**
*
*	@package MyBlog
*
*	Template - Heder
*/

get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110577987-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-110577987-1');
	</script>
	<meta charset="<?php bloginfo('charset'); ?>">

	<?php if( is_search() ) { ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php } ?>


<!-- wp head -->
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width">
		
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URL ?>icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URL ?>icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URL ?>icons/favicon-16x16.png">
	<link rel="mask-icon" href="<?php echo THEME_URL ?>icons/safari-pinned-tab.svg" color="#5bbad5">

	<title><?php the_title(); ?></title>

	<link rel="pingback"  href="<?php bloginfo('pingback_url'); ?>">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>

<body <?php body_class(); ?>>
	
	<header id="header" class="header" style="background: url(<?php header_image(); ?>);">	
			 
	</header>


		<nav class="navbar navbar-expand-md sticky-top navbar-light bg-light justyfy-content-between" role="navigation">
			<div class="container">
			  	<a class="navbar-brand" href="#">Navbar</a>

			  	<?php the_custom_logo(  ); ?>

				<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'top-menu',
						    'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
								'container'			=> 'div',
								'container_class'	=> 'collapse navbar-collapse justify-content-end',
								'container_id'		=> 'navbarNavDropdown',
								'menu_class'		=> 'navbar-nav',
						    'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
						    'walker'			=> new WP_Bootstrap_Navwalker()
						 ) ); 
					?>

					
				    <form class="form-inline my-2 my-lg-0">
				      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				    </form>
			    
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				</div>

		</nav>
