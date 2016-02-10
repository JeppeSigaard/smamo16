<?php 

add_filter( 'rwmb_meta_boxes', 'smamo_add_subtitle' );

function smamo_add_subtitle(){

// Your boxes or requires here
    $mb[] = array(
      'id' => 'subtitle',
      'title' => __( 'Undertitel', 'rwmb' ),
      'post_types' => array('post','page','tema','team','case'),
      'context' => 'normal',
      'priority' => 'default',
      'autosave' => true,
      'fields' => array(

          array(
              'name'  => __( 'Undertitel', 'rwmb' ),
              'id'    => "subtitle",
              'type' => 'text',
              ),
      ),
    );
  
    return $mb;

}




?>