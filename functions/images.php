<?php 

add_action('init',function(){
    
    /* Tilføj support af thumbnails
    */
    add_theme_support('post-thumbnails');
    
    // Billedstørrelser
    add_image_size('hero-banner',1600,800,true);
    add_image_size('case-links',800,500,true);
    
});
