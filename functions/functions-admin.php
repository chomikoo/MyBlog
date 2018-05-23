<?php 

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

	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1)

	//cleaning up wp_head() 
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );

	// remove dashicons from wp_hear
	function wpdocs_dequeue_dashicon() {
	    if (current_user_can( 'update_core' )) {
	        return;
	    }
	    wp_deregister_style('dashicons');
	}
	
	add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );




?>

