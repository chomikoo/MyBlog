<?php

	// Register Menu
	function chomikoo_custom_new_menu() {
	  register_nav_menu('Chomikoo_menu',__( 'Vegab_menu' ));
	}
	add_action( 'init', 'chomikoo_custom_new_menu' );


?>