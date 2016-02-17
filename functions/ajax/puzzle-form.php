<?php 

add_action( 'wp_ajax_puzzle-form', 'smamo_puzzle_form' );
add_action( 'wp_ajax_nopriv_puzzle-form', 'smamo_puzzle_form' );

function smamo_puzzle_form(){
    $response = array();
    
    $post_vars = array(
        'state' => (isset($_POST['state']) && $_POST['state'] !== '') ? true: false,
        'solve-time' => (isset($_POST['solve-time'])) ? wp_strip_all_tags($_POST['solve-time']) : false,
        'name' => (isset($_POST['name'])) ? wp_strip_all_tags($_POST['name']) : false,
        'email' => (isset($_POST['email'])) ? wp_strip_all_tags($_POST['email']) : false,
    );
    
    // state og solve-time skal være sat til true
    if(!$post_vars['state'] || !$post_vars['solve-time']){
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
    
    if (!$post_vars['state'] === '3'){
        $response['error'] = 'you shouldnt be here, son';
        wp_die(json_encode($response));
    }
    
    
    // Opret slack notifikation
    if(function_exists('slack')) {
        $text = $post_vars['name'] . ' har lige tilmeld sig nyhedsbrevet!';
        $attachments = array(
            array(
                'pretext' => '',
                'color' => '#669999',
                'fields' => array(
                    
                    array(
                        'title' => 'Navn',
                        'value' => $post_vars['name'],
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Email',
                        'value' => '<mailto:'.$post_vars['email'].'|'.$post_vars['email'].'>',
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Tid på puslespil',
                        'value' => $post_vars['solve-time'],
                        'short' => false,
                    ),
                    
                ),
            ),
        );
        
        $response['slack_curl'] = slack($text,$attachments); 
    }
    
    // Opret subscriber
    if(class_exists('MailChimp')){
        
        $api_key = '40bbbefd42e7b7fd5e22c5e0e9ca61b3-us10';
        $list_ID = '51f08ecfa7';
        
        $response['mc-creds'] = array(
            'key' => $api_key,
            'list' => $list_ID,
        );
        
        $MailChimp = new MailChimp($api_key);
        $result = $MailChimp->call('lists/subscribe', array(
            'id'                => $list_ID,
            'email'             => array('email'=>$post_vars['email']),
            'merge_vars'        => array('NAME'=>$post_vars['name']),
            'double_optin'      => false,
            'update_existing'   => true,
            'replace_interests' => false,
            'send_welcome'      => false,
        ));

        $response['mailchimp'] = $result;   
    }
    
    wp_die(json_encode($response));
}