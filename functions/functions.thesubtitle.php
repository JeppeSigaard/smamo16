<?php 

function get_the_subtitle($id = false){
    if(!$id){
        global $post;
        if(!$post){return;}
        $id = $post->ID;
    }    
    return get_post_meta($id,'subtitle',true);
    
}

function the_subtitle($before = '',$after = ''){
    $id = (get_the_ID() !== '')  ? get_the_ID() : false;
    if(get_the_subtitle() !== ''){
         echo $before . apply_filters('the_subitle',get_the_subtitle($id)) . $after;
    }
}

function has_subtitle($id = false){
    if(!$id){
        global $post;
        $id = $post->ID;
        if(!$id){return;}
    }
    
    if(get_post_meta($id,'subtitle',true) !== ''){
        return true;
    }
    else{
        return false;
    }
    
}