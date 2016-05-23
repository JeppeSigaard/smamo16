<?php 

// Hent hjælpefunktioner
require_once get_template_directory() . '/functions/functions.part.php';
require_once get_template_directory() . '/functions/functions.getsvg.php';
require_once get_template_directory() . '/functions/functions.thesubtitle.php';
require_once get_template_directory() . '/functions/functions.mailchimp.api.php';
require_once get_template_directory() . '/functions/functions.slack.send.php';

// Rendér telefonnummer
function smamo_tel($str){
    $str = str_replace('+','00',$str);
    return 'tel:' . esc_attr(preg_replace('/[^0-9]/', '', $str));    
}

// Hent functions parts 
get_functions_part(array(
    'scripts',
    'no-emojis',
    'images',
    'heartbeat',
    'menu',
));

// Kirki
get_functions_part(array(
    'site-info',
    
),'kirki');

// Ajax
get_functions_part(array(
    'json.post',
    'booking-form',
),'ajax');

// post types
get_functions_part(array(
    'cases',
    'team',
    'log',
    
),'post-types');

// meta-box
get_functions_part(array(
    'team',
    'subtitle',
    'slack-id',
    'front-page',
    'case-assets',
    'banner-img',
    'spinner-img',
    
),'meta-box');

// taxonomies
get_functions_part(array(
    'case-type',
    'case-stikord',
    
),'tax');