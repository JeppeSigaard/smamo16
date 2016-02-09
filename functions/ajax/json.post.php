<?php 

add_action( 'wp_ajax_get_post', 'smamo_get_post_json' );
add_action( 'wp_ajax_nopriv_get_post', 'smamo_get_post_json' );

function smamo_get_post_json(){
    $response = array();
    
    if(!isset($_POST['id'])){
        $response['error'] = 'no ID set';
        wp_die(json_encode($response));
    }
    
    $response['success'] = array(
        'post' => get_post(wp_strip_all_tags($_POST['id'])),
        'meta' => get_post_custom(wp_strip_all_tags($_POST['id'])),
    );
    
    
    wp_die(json_encode($response));
}