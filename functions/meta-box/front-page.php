<?php

add_filter( 'rwmb_meta_boxes', 'smamo_add_front_page' );

function smamo_add_front_page($mb){

    $mb[] = array(
        'id' => 'front_page',
        'title' => __( 'Forside', 'rwmb' ),
        'post_types' => array('page'),
        'context' => 'side',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(

            array(
                'name'  => __( 'Angiv som forside', 'rwmb' ),
                'id'    => "front_page",
                'type' => 'checkbox',
                'std' => '0',
            ),
        ),
    );


    return $mb;

}




?>