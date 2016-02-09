<?php 

// Hent hjælpefunktioner
require_once get_template_directory() . '/functions/functions.part.php';
require_once get_template_directory() . '/functions/functions.getsvg.php';

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
    
),'ajax');

// post types
get_functions_part(array(
    'tema',
    'cases',
    'team',
    
),'post-types');

// meta-box
get_functions_part(array(
    'team',
    
),'meta-box');

// taxonomies
get_functions_part(array(
    'tema-cat',
    'case-type',
    
),'tax');