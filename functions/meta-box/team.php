<?php 

add_filter( 'rwmb_meta_boxes', 'smamo_add_team_fields' );

function smamo_add_team_fields($mb){

$mb[] = array(
    'id' => 'oplysninger',
    'title' => __( 'Oplysninger', 'rwmb' ),
    'post_types' => array('team'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Navn', 'rwmb' ),
            'id'    => "name",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Titler', 'rwmb' ),
            'id'    => "titles",
            'type' => 'text',
            'clone' => true,
        ),
        
        array(
            'name'  => __( 'Email', 'rwmb' ),
            'id'    => "email",
            'type' => 'email',
        ),
        
        array(
            'name'  => __( 'Telefon', 'rwmb' ),
            'id'    => "telefon",
            'type' => 'text',
        ),
        
        array(
            'name'  => __( 'Blog/web', 'rwmb' ),
            'id'    => "website",
            'type' => 'url',
        ),
        
        array(
            'name'  => __( 'Facebook', 'rwmb' ),
            'id'    => "facebook",
            'type' => 'url',
        ),
        
        array(
            'name'  => __( 'Twitter', 'rwmb' ),
            'id'    => "twitter",
            'type' => 'url',
        ),
        
        array(
            'name'  => __( 'Github', 'rwmb' ),
            'id'    => "github",
            'type' => 'url',
        ),
    ),
);

    
return $mb;

}




?>