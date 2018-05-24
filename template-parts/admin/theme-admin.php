<h1>My Theme Custom Options</h1>

<?php settings_errors(); ?>

<?php 

	$picture = esc_attr( get_option( 'profile_picture' ) );
	// echo $picture;
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $firstName . ' ' . $lastName;
	$description = esc_attr( get_option( 'user_description' ) );
?>

<div class="chomikoo-sidebar-preview">
	
	<div class="sidebar">
		<div class="sidebar__img-container">
			<div id="sidebar_img_preview" class="sidebar__img" style="background-image: url(<?php print $picture; ?>);"></div>
		</div>
		<h1 class="sidebar__username"><?php print $fullName; ?></h1>
		<h2 class="sidebar__description"><?php print $description; ?></h2>
		<div class="sidebar__icons">

		</div>
	</div>

</div>

<form method="post" action="options.php" class="chomikoo-general-form">
	
	<?php settings_fields( 'chomikoo-settings-group' ); ?>
 	<?php do_settings_sections( 'chomikoo_theme' ); ?>
	<?php submit_button(); ?> 
 
</form>
