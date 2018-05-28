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

</head>

<body <?php body_class(); ?>>
	
	<header id="header" class="header" style="background: url(<?php header_image(); ?>);">
		HEADER

	</header>

