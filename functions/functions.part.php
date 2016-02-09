<?php 

/* -------------------------------------------------------------------------
 * Extend get_template_part / get_template_directory med get_functions_part 
 '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
 ** $fetch : sting / array med filnavn(e)
 ** $in : evt undermappe, som bruges for alle filer i array
 */

function smamo_include_functions_part_if_exists($fetch, $in = false){
    if ($in){$fetch = $in . '/' . $fetch;}
    $fetch = get_template_directory() . '/functions/' . $fetch . '.php';
    if(file_exists($fetch)){include_once $fetch;} 
}

function get_functions_part($fetch, $in = false){
    if(is_array($fetch)){foreach($fetch as $p){smamo_include_functions_part_if_exists($p,$in);}}
    else{smamo_include_functions_part_if_exists($fetch,$in);} 
}