<?php 
	/*
	=========================
	ADMIN PAGE 
	=========================
	*/


	function chomikoo_add_admin_page() {

		// Generate Admin Page
		add_menu_page( 'Theme Options', 'MyBlog', 'manage_options', 'chomikoo_theme', 'chomikoo_theme_create_page', THEME_URL . '/icons/option_ico.png', 110);
		/////////////////////////////
		//Generate Admin Sub Pages //
		////////////////////////////
		// Sidebar
		add_submenu_page('chomikoo_theme', 'Theme Settings', 'Sidebar', 'manage_options', 'chomikoo_theme', 'chomikoo_theme_create_page' );
		// Theme Options
		add_submenu_page( 'chomikoo_theme', 'Theme Options', 'Theme Options', 'manage_options' , 'chomikoo_theme_theme', 'chomikoo_theme_support_page' );
		// Custom CSS
		add_submenu_page( 'chomikoo_theme', 'Theme CSS Options', 'Custom CSS', 'manage_options' , 'chomikoo_theme_css', 'chomikoo_theme_settings_page' );
	

		add_action( 'admin_init', 'chomikoo_custom_settings');
	}

	add_action('admin_menu', 'chomikoo_add_admin_page');

	//Activate custom settings
	function chomikoo_custom_settings() {

		register_setting( 'chomikoo-settings-group', 'profile_picture' );

		register_setting( 'chomikoo-settings-group', 'first_name' );
		register_setting( 'chomikoo-settings-group', 'last_name' );

		register_setting( 'chomikoo-settings-group', 'user_description' );

		register_setting( 'chomikoo-settings-group', 'twitter_handler', 'chomikoo_sanitize_twitter_handler' );
		register_setting( 'chomikoo-settings-group', 'facebook_handler' );
		register_setting( 'chomikoo-settings-group', 'instagram_handler' );
		register_setting( 'chomikoo-settings-group', 'linked_handler' );



		add_settings_section( 'chomikoo-sidebar-options', 'Sidebar Options', 'chomikoo_sidebar_options', 'chomikoo_theme' );
		
		add_settings_field( 'sidebar-picture', 'Profile Picture', 'chomikoo_sidebar_picture', 'chomikoo_theme', 'chomikoo-sidebar-options' );
		add_settings_field( 'sidebar-name', 'Full Name', 'chomikoo_sidebar_name', 'chomikoo_theme', 'chomikoo-sidebar-options' );
		add_settings_field( 'sidebar-description', 'Description', 'chomikoo_sidebar_description', 'chomikoo_theme', 'chomikoo-sidebar-options' );

		add_settings_field( 'sidebar-twitter', 'Twitter', 'chomikoo_sidebar_twitter', 'chomikoo_theme', 'chomikoo-sidebar-options' );
		add_settings_field( 'sidebar-facebook', 'Facebook', 'chomikoo_sidebar_facebook', 'chomikoo_theme', 'chomikoo-sidebar-options' );
		add_settings_field( 'sidebar-instagram', 'Instagram', 'chomikoo_sidebar_instagram', 'chomikoo_theme', 'chomikoo-sidebar-options' );
		add_settings_field( 'sidebar-linked', 'LinkedIn', 'chomikoo_sidebar_linked', 'chomikoo_theme', 'chomikoo-sidebar-options' );



		// Theme support Options
		register_setting( 'chomikoo-theme-support', 'post_formats' , 'chomikoo_post_formats_callback' );
		register_setting( 'chomikoo-theme-support', 'custom_header' );
		register_setting( 'chomikoo-theme-support', 'custom_background' );



		add_settings_section( 'chomikoo-theme-options', 'Theme Options', 'chomikoo_theme_options', 'chomikoo_theme_theme' );

		add_settings_field( 'post-formats', 'Post Formats', 'chomikoo_post_formats', 'chomikoo_theme_theme', 'chomikoo-theme-options');
		add_settings_field( 'custom-header', 'Custom Header', 'chomikoo_custom_header', 'chomikoo_theme_theme', 'chomikoo-theme-options' );
		add_settings_field( 'custom-background', 'Custom Background', 'chomikoo_custom_background', 'chomikoo_theme_theme', 'chomikoo-theme-options' );

		// Custom CSS 
		register_setting( 'chomikoo-custom-css-options', 'chomikoo_css', 'chomikoo_sanitize_custom_css' );
		add_settings_section( 'chomikoo-custom-css-section', 'Custom CSS', 'chomikoo_custom_css_section_callback', 'chomikoo_theme_css' );
		add_settings_field( 'custom-css', 'Insert your Custom CSS', 'chomikoo_custom_css_callback', 'chomikoo_theme_css', 'chomikoo-custom-css-section' );
	}

	// Css Section
	function chomikoo_custom_css_section_callback() {
		echo 'Cssy';
	}

	function chomikoo_custom_css_callback() {
		$css = get_option( 'chomikoo_css' );
		$css = ( empty($css) ? '/* Custom CSS */' : $css );
		// echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa		aaaaaaa ' . $css;
		echo '<div id="customCss">' . $css . '</div><textarea id="chomikoo_css" name="chomikoo_css" style=display:none;visible:hidden">' . $css . '</textarea>';
	}


	function chomikoo_theme_options() {
		echo 'Activate and Deactivate specyfic Theme Support Options <--';
	}
	//Post formats callback function
	function chomikoo_post_formats_callback( $input ) {
		return $input;
	}

	function chomikoo_post_formats() {
		$options = get_option( 'post_formats' );

		$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
		$output = '';
		foreach( $formats as $format ) {
			$checked = ( @$options[$format] == 1 ? 'checked' : '');
			// echo $checked . '|';
			$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . '>' . $format . ' </label><br>';
		}
		echo $output;
	}

	function chomikoo_custom_header() {

		$options = get_option( 'custom_header' );
		$checked = ( @$options[$format] == 1 ? 'checked' : '');

		echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . '>Activate the custom header</label>';
		
	}

	function chomikoo_custom_background() {

		$options = get_option( 'custom_background' );
		$checked = ( @$options[$format] == 1 ? 'checked' : '');

		echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . '>Activate the custom background</label>';
		
	}


	//Sidebar options
	function chomikoo_sidebar_options() {
		echo 'Customize your Sidebar Informations';
	}

	function chomikoo_sidebar_picture() {
		$picture = esc_attr( get_option( 'profile_picture' ) );
		if( empty($picture) ) {
			echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
		} else {
			echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="' . $picture . '" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
		}
	}

	function chomikoo_sidebar_name() {
		$firstName = esc_attr( get_option( 'first_name' ) );
		$lastName = esc_attr( get_option( 'last_name' ) );

		echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name"/> <input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name"/>';
	}

	function chomikoo_sidebar_description() {
		$description = esc_attr( get_option('user_description') );
		echo '<input type="text" name="user_description" value="' . $description . '" placeholder="Short description"/>';
	}

	// SOCIALS
	function chomikoo_sidebar_twitter() {
		$twitter = esc_attr( get_option('twitter_handler') );
		echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter Login"/><p class="description">Input your Twitter username without @ character</p>';
	}

	function chomikoo_sidebar_facebook() {
		$facebook = esc_attr( get_option('facebook_handler') );
		echo '<input type="text" name="facebook_handler" value="' . $facebook . '" placeholder="Facebook Login"/>';
	}

	function chomikoo_sidebar_instagram() {
		$instagram = esc_attr( get_option('instagram_handler') );
		echo '<input type="text" name="instagram_handler" value="' . $instagram . '" placeholder="Instagram Login"/>';
	}

	function chomikoo_sidebar_linked() {
		$linked = esc_attr( get_option('linked_handler') );
		echo '<input type="text" name="linked_handler" value="' . $linked . '" placeholder="LinkedIn Login"/>';
	}

	// Sanitization settings
	function chomikoo_sanitize_custom_css( $input ){
		$output = esc_textarea( $input );
		echo 'output css '. $output; 
		return $output;
	}

	function chomikoo_sanitize_twitter_handler( $input ){
		$output = sanitize_text_field( $input );
		$output = str_replace('@', '', $output);
		return $output;
	}


	// TEMPLATE SUBMENU FUNCTIONS 
	function chomikoo_theme_create_page() {
		require_once( THEME_PATH . 'template-parts/admin/theme-admin.php' );
	}

	function chomikoo_theme_support_page() {
		require_once( THEME_PATH . 'template-parts/admin/theme-support.php' );
	}

	function chomikoo_theme_contact_form_page() {
		require_once( THEME_PATH . 'template-parts/admin/theme-contact-form.php' );
	}

	function chomikoo_theme_settings_page() {
		require_once( THEME_PATH . 'template-parts/admin/theme-custom-css.php' );
	}

	function theme_options_settings_page() {
		echo 'Hello from theme_options_settings_page';
	}





	//Change Logo in login page
	function my_login_logo() { ?>
	    <style type="text/css">
	        #login h1 a, .login h1 a {
	            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon.png);
			height:65px;
			width:320px;
			background-repeat: no-repeat;
	        	padding-bottom: 30px;
	        }
	    </style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );


	//Change Admin footer 
	function remove_footer_admin () {
	 
		echo 'Coded by <a href="http://www.szymontrzpla.pl/" target="_blank" class="smultron_green" style="color: #afcb08">Chomikoo@</a></p>'; 
	}
	 
	add_filter('admin_footer_text', 'remove_footer_admin');

	/* Disable WordPress Admin Bar for all users but admins. */
  	show_admin_bar(false);

	//Hide update notification
	function hide_update_notice_to_all_but_admin_users() {

	    if (!current_user_can('update_core')) {
	        remove_action( 'admin_notices', 'update_nag', 3 );
	    }
	}

	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1);



