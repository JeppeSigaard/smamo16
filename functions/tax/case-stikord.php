<?php 

add_action( 'init', 'smamo_make_case_stikord', 0 );

function smamo_make_case_stikord() {
	$labels = array(
		'name'              => _x( 'Stikord', 'taxonomy general name' ),
		'singular_name'     => _x( 'Stikord', 'taxonomy singular name' ),
		'search_items'      => __( 'Søg i Stikord' ),
		'all_items'         => __( 'Alle Stikord' ),
		'parent_item'       => __( 'Forælder' ),
		'parent_item_colon' => __( 'Forælder:' ),
		'edit_item'         => __( 'Rediger stikord' ),
		'update_item'       => __( 'Opdater stikord' ),
		'add_new_item'      => __( 'Tilføj ny stikord' ),
		'new_item_name'     => __( 'Ny stikord' ),
		'menu_name'         => __( 'Stikord' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'has_archive'       => false,
		'public'         => false,
		'rewrite'           => array( 'slug' => 'stikord' ),
	);

	register_taxonomy( 'stikord', array( 'case' ), $args );

}