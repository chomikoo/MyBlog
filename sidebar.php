<?php 
/*
*
*	@package MyBlog
*/

if( !is_active_sidebar( 'chomikoo-sidebar' ) ) {
	return;
}

?>

<aside id="secondary" class="widget-area sideabr" role="complementary"> 

	<?php dynamic_sidebar( 'chomikoo-sidebar' ); ?>

</aside>