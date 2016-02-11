<?php


add_action( 'init', 'smamo_add_log' );

function smamo_add_log() {
	register_post_type( 'logbog', array(
		
        'menu_icon' 		 => 'dashicons-format-status',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'edit.php?post_type=team',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'logbog' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'thumbnail','editor', 'author'),
        'labels'             => array(
            
            'name'               => _x( 'Log', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Log', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Log', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Log', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj ny ', 'log', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny', 'smamo' ),
            'new_item'           => __( 'Ny log', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se log', 'smamo' ),
            'all_items'          => __( 'Logbog', 'smamo' ),
            'search_items'       => __( 'Find log', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette en ny log.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}