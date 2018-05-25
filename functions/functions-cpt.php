<?php
/**
*	@package MyBlog
*   ////////////////////
*   // Custom Post Type
*   ////////////////////
* 
*/

$contact = get_option( 'activate_contact' );
if( @$contact ) {

    add_action( 'init', 'chomikoo_contact_cpt');

    add_filter( 'manage_chomikoo_contact_posts_columns', 'chomikoo_set_contact_columns' );
    add_action( 'manage_chomikoo_contact_posts_custom_column', 'chomikoo_contact_custom_column', 10, 2 );

    add_action( 'add_meta_boxes', 'chomikoo_contact_add_meta_box' );
    add_action( 'save_post', 'chomikoo_save_contact_email_data' );

}

// CONTACT CPT

function chomikoo_contact_cpt() {
    $labels = array(
        'name'              => 'Messages',
        'singular_name'     => 'Message',
        'menu_name'         => 'Messagaes',
        'name_admin_bar'    => 'Message'
    );

    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'menu_position'     => 26,
        'menu_icon'         => 'dashicons-email-alt',
        'supports'          => array( 'title', 'editor', 'author' )
    );

    register_post_type( 'chomikoo_contact', $args );

}


function chomikoo_set_contact_columns( $colums ){
    $newColumns = array();
    $newColumns['title']     = 'Full Name';
    $newColumns['message']   = 'Message';
    $newColumns['email']     = 'Email';
    $newColumns['date']      = 'Date';
    return $newColumns;
}

function chomikoo_contact_custom_column( $column, $post_id ){

    switch( $column ){

        case 'message' :
            echo get_the_excerpt();
            break;

        case 'email' :
            $email = get_post_meta( $post_id, '_contact_email_value_key', true);
            // echo '|' . $email . '|';
            echo '<a href="mailto:' . $email . '">' . $email . '</a>';
            break;


    }

}

// Contact Meta Boxes

function chomikoo_contact_add_meta_box(){
    add_meta_box( 'contact_email', 'User Email', 'chomikoo_contact_email_callback', 'chomikoo_contact', 'side' );
}

function chomikoo_contact_email_callback( $post ){
    wp_nonce_field( 'chomikoo_save_contact_email_data', 'chomikoo_contact_email_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );
    // echo 'val ' . $value;
    echo '<label for="chomikoo_contact_email_field">User Email Adress</label>';
    echo '<input type="email" id="chomikoo_contact_email_field" name="chomikoo_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function chomikoo_save_contact_email_data( $post_id ){

    // echo ' a aaaaaaaaaaaaaaaaaaaaaaaaaasadgsadgsdgsdgsdgsdgsdgsdgssdsdgsdgsdgd awp_verify ' ;
    if( ! isset( $_POST['chomikoo_contact_email_meta_box_nonce'] ) ){
        // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 1 ' . $post_id;
        return;
    }

    if( ! wp_verify_nonce( $_POST['chomikoo_contact_email_meta_box_nonce'], 'chomikoo_save_contact_email_data'  )){
        // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 2';

        return;
    }

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 3';

        return;
    }

    if( ! current_user_can( 'edit_post', $post_id ) ){
        // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 4';

        return;
    }

    if( ! isset( $_POST['chomikoo_contact_email_field'] ) ){
        // echo 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq 5';

        return;
    }

    $my_data = sanitize_text_field( $_POST['chomikoo_contact_email_field'] );
    echo 'my data ' . $my_data;
    update_post_meta( $post_id, '_contact_email_value_key', $my_data );

}