<?php 

add_action('wp_enqueue_scripts','theme_enqueue_scripts');
function theme_enqueue_scripts(){

    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,700,300,900', false, false, 'all' );
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style/main.css', false, false, 'all' );
    
    wp_enqueue_script('jq','//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js',array(),'1',true);
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/main.min.js' , array('jq'), false, true);
    
}