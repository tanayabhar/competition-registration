<?php

/**
 * Custom Post type Entries
 */

 /**
  * Methos to craete Entries post type with First Name, Last Name, Email, Phone, Description, Competition ID.
  */
  add_action( 'init', 'entry_post_type' );
  function entry_post_type() {
      register_post_type( 'entry',
          array(
              'labels' => array(
                  'name' => __( 'Entries' ),
                  'singular_name' => __( 'Entry' )
              ),
              'public' => true,
              'show_in_rest' => true,
          'supports' => array('title', 'editor', 'thumbnail'),
          'has_archive' => true,
          'rewrite'   => array( 'slug' => false, 'with_front' => false ),
              'menu_position' => 5,
          'menu_icon' => 'dashicons-plus',
          )
      );
  }

    /**
     * Add Meta box for Entries post type
     */

    /**
 * Register meta boxes.
 */
function entries_register_meta_boxes() {
    add_meta_box( 'entries-fields', 'Entries Custom Field', 'entires_field_display_callback', 'entry' );
}
add_action( 'add_meta_boxes', 'entries_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function entires_field_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . './entries-meta-form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function entries_save_meta_box( $post_id ) {
    /* Verify the nonce before proceeding. \*/
    if ( ! isset( $_POST['entry_meta_nonce'] ) 
    || ! wp_verify_nonce( $_POST['entry_meta_nonce'], 'entry_meta_nonce_action' ) 
    ){
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'e_first_name',
        'e_last_name',
        'e_email',
        'e_phone',
        'e_description',
        'e_competition_id'
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'entries_save_meta_box' );
