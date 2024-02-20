<?php
function entry_form_register_scripts() {
    // to incldue the external script files
    wp_enqueue_script( 'entry-script',  plugin_dir_url( __DIR__ ) . 'js/entry.js', array( 'jquery' ), false, true );
     
    wp_localize_script( 
         'entry-script', 
         'OBJ', 
         array( 
            'ajaxurl' => admin_url( 'admin-ajax.php'),
            'nonce' => wp_create_nonce('entry_validation')
     )
    ) ;
 }
 
 add_action( 'wp_enqueue_scripts', 'entry_form_register_scripts' );
 
 //access the data send with the Ajax call, and send the response
 function entry_submission_into_competition() {
    check_ajax_referer( 'entry_validation', 'entry_nonce' );
     if( isset( $_REQUEST )){        
         $first_name = $_REQUEST['first_name'];        
         $last_name = $_REQUEST['last_name'];             
         $email = $_REQUEST['email'];        
         $phone = $_REQUEST['phone'];        
         $description = $_REQUEST['description'];        
         $competition_id = $_REQUEST['competition_id'];        
         echo $first_name.' '.$last_name;
         add_entry_post($first_name, $last_name, $email, $phone, $description, $competition_id);

     }
     wp_die();// required to terminate immediately and return a proper response
  }

  function add_entry_post( $first_name, $last_name, $email, $phone, $description, $competition_id) {
    $competition_name = get_the_title($competition_id);
    $entry_count = wp_count_posts( 'entry' )->publish;
    $entry_index = $entry_count + 1;
    $my_post = array(
        'post_title'    => 'Entry '.$entry_index.' - '.$competition_name,
        'post_content'  => $description,
        'post_status'   => 'publish',
        'post_type' => 'entry',
        'post_name' => 'entry-'.$entry_index
        
    );
    
    // Insert the post into the database.
    $entry_id = wp_insert_post( $my_post );
    update_post_meta( $entry_id, 'e_first_name', $first_name );
    update_post_meta( $entry_id, 'e_last_name', $last_name );
    update_post_meta( $entry_id, 'e_email', $email );
    update_post_meta( $entry_id, 'e_phone', $phone );
    update_post_meta( $entry_id, 'e_description', $description );
    update_post_meta( $entry_id, 'e_competition_id', $competition_id );

  }
  function entry_count() {
    
  }
 
 //for execution in the admin area
 add_action( 'wp_ajax_entry_submission_into_competition', 'entry_submission_into_competition' );
 
 //executes for front-end users who are not logged in to the system. 
 add_action( 'wp_ajax_nopriv_entry_submission_into_competition', 'entry_submission_into_competition' ); 