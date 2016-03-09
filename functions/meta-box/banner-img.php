<?php 
add_filter( 'rwmb_meta_boxes', 'smamo_add_page_banner_img' );

function smamo_add_page_banner_img($mb){
	
    $mb[] = array(
        'id' => 'banner-img',
        'title' => __( 'Bannerbillede', 'rwmb' ),
        'post_types' => array('page'),
        'context' => 'side',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            
            array(
                'name'  => __( 'Bannerbillede', 'rwmb' ),
                'id'    => "banner-img",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
        ),
    );
    
    return $mb;
}
