<h1>Contact Form Options</h1>

<?php settings_errors(); ?>

<p>Użyj tego <strong>shortcodu</strong> żeby aktywować formularz kntaktowy na wybranej stronie</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="chomikoo-general-form">
	
	<?php settings_fields( 'chomikoo-contact-option' ); ?>
 	<?php do_settings_sections( 'chomikoo_theme_contact' ); ?>
	<?php submit_button(); ?> 
 
</form>
