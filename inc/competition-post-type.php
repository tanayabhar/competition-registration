<?php
/**
 * Register post type.
 */
add_action( 'init', 'competition_post_type' );
function competition_post_type() {
    register_post_type( 'competition',
        array(
            'labels' => array(
                'name' => __( 'Competitions' ),
                'singular_name' => __( 'Competition' )
            ),
            'public' => true,
            'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite'   => array( 'slug' => false, 'with_front' => false ),
            'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar',
        )
    );
}

/**
 * ALter the permalink structure of competition post type as per requirement 5a.
 */
add_filter( 'post_type_link', 'competition_remove_slug', 10, 3 );
function competition_remove_slug( $post_link, $post, $leavename ) {

    if ( 'competition' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}

add_action( 'pre_get_posts', 'competiton_parse_request' );
function competiton_parse_request( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( empty( $query->query['name'] ) ) {
		return;
	}

	$query->set(
		'post_type',array('post','page','competition')
	);
}

add_filter( 'template_include', 'override_single_template_competition' );
function override_single_template_competition( $template  ){
    $post_types = array('competition');

    if (is_singular($post_types)) {
        $template = dirname( __DIR__ ).'/templates/single-competition.php';
        //locate_template('single.php');
    }

    if (is_post_type_archive($post_types)) {
        $template = dirname( __DIR__ ).'/templates/archive-competition.php';
        //locate_template('archive.php');
    }

    return $template;
}
function wpd_download_endpoint(){
    add_rewrite_endpoint( 'submit-entry', EP_PERMALINK );
}
add_action( 'init', 'wpd_download_endpoint' );


function wpd_download_template( $template ) {
    global $wp_query;
    if( ! array_key_exists( 'submit-entry', $wp_query->query_vars ) ) return $template;

    $template = dirname( __DIR__ ).'/templates/submit-form.php';
    return $template;
}
add_filter( 'template_include', 'wpd_download_template', 1000 );
