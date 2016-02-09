<?php 

add_action( 'init', 'register_page_cat', 0 );

function register_page_cat() {
	$labels = array(
		'name'              => _x( 'Tema', 'taxonomy general name' ),
		'singular_name'     => _x( 'Kategori', 'taxonomy singular name' ),
		'search_items'      => __( 'Søg i temakategorier' ),
		'all_items'         => __( 'Alle temaer' ),
		'parent_item'       => __( 'Forælder' ),
		'parent_item_colon' => __( 'Forælder:' ),
		'edit_item'         => __( 'Rediger temakategori' ),
		'update_item'       => __( 'Opdater temakategori' ),
		'add_new_item'      => __( 'Tilføj nyt temakategori' ),
		'new_item_name'     => __( 'Ny tema' ),
		'menu_name'         => __( 'Kategorier' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tema' ),
	);

	register_taxonomy( 'page_cat', array( 'tema' ), $args );

    if(class_exists('Tax_Meta_Class')){

        $page_cat_img =  new Tax_Meta_Class(
            array(
                'id' => 'page_cat_img_upload',          
                'title' => 'Billede',         
                'pages' => array('page_cat'),       
                'context' => 'normal',           
                'fields' => array(),
                'local_images' => false,
                'use_with_theme' => false
            )
        );
        
        $page_cat_img->addImage('page_cat_img',array('name'=> __('Kategoribillede','smamo')));
        $page_cat_img->finish();
    }
}

