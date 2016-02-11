<?php 


add_filter( 'rwmb_meta_boxes', 'smamo_add_slack_id' );

function smamo_add_slack_id($mb){

   $mb[] = array(
       'id' => 'slack_id',
       'title' => __( 'Slack ID', 'rwmb' ),
       'post_types' => array('team'),
       'context' => 'side',
       'priority' => 'default',
       'autosave' => true,
       'fields' => array(
           
           array(
               'name'  => __( 'Slack ID', 'rwmb' ),
               'id'    => "slack_id",
               'type' => 'text',
               ),
       ),
    );
    return $mb;
}




?>