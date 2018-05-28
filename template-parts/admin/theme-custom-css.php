<h1>My Theme custom CSS</h1>

<?php settings_errors(); ?>


<form id="custom-css-form" method="post" action="options.php" class="chomikoo-general-form">
	
	<?php settings_fields( 'chomikoo-custom-css-options' ); ?>
 	<?php do_settings_sections( 'chomikoo_theme_css' ); ?>
	<?php submit_button(); ?> 
 
</form>
