<h1>My Theme Support</h1>

<?php settings_errors(); ?>

<?php 

	// $picture = esc_attr( get_option( 'profile_picture' ) );
	// echo "pic " . $picture;
?>


<form method="post" action="options.php" class="chomikoo-general-form">
	
	<?php settings_fields( 'chomikoo-theme-support' ); ?>
 	<?php do_settings_sections( 'chomikoo_theme_theme' ); ?>
	<?php submit_button(); ?> 
 
</form>
