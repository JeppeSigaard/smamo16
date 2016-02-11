<?php 

// Hent hjælpefunktioner
require_once get_template_directory() . '/functions/functions.part.php';
require_once get_template_directory() . '/functions/functions.getsvg.php';
require_once get_template_directory() . '/functions/functions.thesubtitle.php';

// Hent functions parts 
get_functions_part(array(
    'scripts',
    'no-emojis',
    'images',
    
));

// Kirki
get_functions_part(array(
    'site-info',
    
),'kirki');

// Ajax
get_functions_part(array(
    'json.post',
    'puzzle-form',
    
),'ajax');

// post types
get_functions_part(array(
    'tema',
    'cases',
    'team',
    'log',
    
),'post-types');

// meta-box
get_functions_part(array(
    'team',
    'subtitle',
    'slack-id',
    
),'meta-box');

// taxonomies
get_functions_part(array(
    'tema-cat',
    'case-type',
    
),'tax');