<?php 
	/**
	* @package MyTheme
	=========================
	ADMIN ENQUEUE FUNCTIONS 
	=========================
	*/

function chomikoo_load_admin_scripts( $hook ) {	
	
	if( 'toplevel_page_chomikoo_theme' != $hook ) {
		return;
	}

	$ver = '1.0.0';

	wp_register_style( 'chomikoo_admin', THEME_URL . 'css/admin_styles.css', array(), $ver, 'all' );
	wp_enqueue_style( 'chomikoo_admin' );

	wp_enqueue_media();

	wp_register_script( 'chomikoo_admin_script', THEME_URL . 'scripts/admin_script.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'chomikoo_admin_script' );

}

add_action( 'admin_enqueue_scripts', 'chomikoo_load_admin_scripts' );