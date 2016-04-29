<?php 

add_filter('rwmb_meta_boxes','smamo_add_spinner_img');
function smamo_add_spinner_img($mb){
    
    $mb[] = array(
        'id' => 'spinner_img',
        'title' => __( 'Spinnerbilleder', 'rwmb' ),
        'post_types' => array('team'),
        'context' => 'side',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            
            array(
                'name'  => __( 'Billeder', 'rwmb' ),
                'id'    => "spinner_img",
                'type' => 'image_advanced',
            ),
        ),
    );
    
    return $mb;
}