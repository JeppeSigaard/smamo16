<?php 

function get_svg($path = false){
    if(!$path){return;}
    
    $path = get_template_directory() . '/statics/svg/' . $path . '.svg';
    
    if(file_exists($path)){
        require $path;
    }
}