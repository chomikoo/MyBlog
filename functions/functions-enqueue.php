<?php 
	/**
	* @package MyTheme
	=========================
	BACKEND/ADMIN ENQUEUE FUNCTIONS 
	=========================
	*/

function chomikoo_load_admin_scripts( $hook ) {	
	echo 'q q q q q q q q q q q q q q  q q q q q q q w w  w e e e e e e e e e e e             ' . $hook;
	$ver = '1.0.0';
	
	if( 'toplevel_page_chomikoo_theme' == $hook ) {

		wp_register_style( 'chomikoo_admin', THEME_URL . 'css/admin_styles.css', array(), $ver, 'all' );
		wp_enqueue_style( 'chomikoo_admin' );

		wp_enqueue_media();

		wp_register_script( 'chomikoo_admin_script', THEME_URL . 'scripts/admin_script.js', array( 'jquery' ), $ver, true );
		wp_enqueue_script( 'chomikoo_admin_script' );

	} else if ( 'myblog_page_chomikoo_theme_css' == $hook ) {
		
		wp_enqueue_style( 'ace', THEME_URL . 'css/admin_styles_ace.css', array(), $ver, 'all' );
		wp_enqueue_script( 'ace', THEME_URL . 'scripts/ace/ace.js', array( 'jquery' ), $ver, true );
		wp_enqueue_script( 'chomikoo_custom_css_script', THEME_URL . 'scripts/admin_script_css.js', array( 'jquery' ), $ver, true);

	} else {
		
		return;

	}

}

add_action( 'admin_enqueue_scripts', 'chomikoo_load_admin_scripts' );


	/**
	=========================
	FRONT END ENQUEUE FUNCTIONS 
	=========================
	*/

function chomikoo_load_scripts() {

	$ver = time();

	wp_enqueue_style( 'styles', THEME_URL . 'styles.css', array(), $ver, 'all' );

	// wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'scripts', THEME_URL . 'scripts/script.js', array(), $ver, 'all'  );

}

add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );