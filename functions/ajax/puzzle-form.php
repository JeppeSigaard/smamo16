<?php 

add_action( 'wp_ajax_puzzle-form', 'smamo_puzzle_form' );
add_action( 'wp_ajax_nopriv_puzzle-form', 'smamo_puzzle_form' );

function smamo_puzzle_form(){
    $response = array();
    
    $post_vars = array(
        'solved' => (isset($_POST['solved']) && $_POST['solved'] === 'true') ? true: false,
        'solve-time' => (isset($_POST['solved'])) ? wp_strip_all_tags($_POST['solved']) : false,
        'name' => (isset($_POST['name'])) ? wp_strip_all_tags($_POST['name']) : false,
        'email' => (isset($_POST['email'])) ? wp_strip_all_tags($_POST['email']) : false,
    );
    
    // solved og solve-time skal være sat til true
    if(!$post_vars['solved'] || !$post_vars['solve-time']){
        $response['error'] = 'cheats!';
        wp_die(json_encode($response));
    }
    
    // Navn skal udfyldes
    if(!$post_vars['name']){
        $response['error'] = 'Indtast et navn';
        wp_die(json_encode($response));
    }
    
     // Email skal udfyldes
    if(!$post_vars['email']){
        $response['error'] = 'Indtast en email';
        wp_die(json_encode($response));
    }
    
    $best_time = get_option('');
    
    
    wp_die(json_encode($response));
}