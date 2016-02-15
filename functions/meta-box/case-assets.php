<?php 

add_filter( 'rwmb_meta_boxes', 'smamo_add_banner_assets' );

function smamo_add_banner_assets($mb){
    
    $mb[] = array(
        'id' => 'case-assets',
        'title' => __( 'Caseindstillinger', 'rwmb' ),
        'post_types' => array('case'),
        'context' => 'normal',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            
            array(
                'name'  => __( 'Vis i hero banner', 'rwmb' ),
                'id'    => "show-in-banner",
                'type' => 'checkbox',
                'std' => '0',
            ),
            
            array(
                'name'  => __( 'Bannerbillede', 'rwmb' ),
                'id'    => "banner-img",
                'type' => 'image_advanced',
                'max_file_uploads' => 1,
            ),
            
            array(
                'name'  => __( 'Label', 'rwmb' ),
                'id'    => "case-label",
                'type' => 'select',
                'std' => '0',
                'options' => array(
                    '0' => '(ingen)',
                    'a' => 'A',
                    'b' => 'B',
                ),
            ),
            
        ),
    );
    
    
    
    return $mb;

}
