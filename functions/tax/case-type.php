<?php 

add_action( 'init', 'smamo_register_case_type', 0 );

function smamo_register_case_type() {
	$labels = array(
		'name'              => _x( 'Cases', 'taxonomy general name' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Søg i Typer' ),
		'all_items'         => __( 'Alle Typer' ),
		'parent_item'       => __( 'Forælder' ),
		'parent_item_colon' => __( 'Forælder:' ),
		'edit_item'         => __( 'Rediger type' ),
		'update_item'       => __( 'Opdater type' ),
		'add_new_item'      => __( 'Tilføj nytype' ),
		'new_item_name'     => __( 'Nytype' ),
		'menu_name'         => __( 'Typer' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'cases' ),
	);

	register_taxonomy( 'cases', array( 'case' ), $args );

    if(class_exists('Tax_Meta_Class')){

        $case_type_img =  new Tax_Meta_Class(
            array(
                'id' => 'case_type_img_upload',          
                'title' => 'Billede',         
                'pages' => array('cases'),       
                'context' => 'normal',           
                'fields' => array(),
                'local_images' => false,
                'use_with_theme' => false
            )
        );
        
        $case_type_img->addImage('case_type_img',array('name'=> __('Billede','smamo')));
        $case_type_img->finish();
    }
}