<?php 

if (class_exists('Kirki')){
    
    Kirki::add_section( 'site_info', array(
        'title'          => __( 'Information' ),
        'description'    => __( 'Tilføj generel info, som bruges på hele hjemmesiden' ),
        'panel'          => '', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    
    Kirki::add_field( 'info_long_description', array(
        'settings' => 'info_long_description',
        'label'    => __( 'Lang beskrivelse', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'editor',
        'priority' => 10,
        'default'  => '',
    ) );
    
    Kirki::add_field( 'info_name', array(
        'settings' => 'info_name',
        'label'    => __( 'Navn', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
    Kirki::add_field( 'info_address', array(
        'settings' => 'info_address',
        'label'    => __( 'Adresse', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
    Kirki::add_field( 'info_post', array(
        'settings' => 'info_post',
        'label'    => __( 'Postnummer', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
    Kirki::add_field( 'info_by', array(
        'settings' => 'info_by',
        'label'    => __( 'By', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
    Kirki::add_field( 'info_email', array(
        'settings' => 'info_email',
        'label'    => __( 'Email', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
    Kirki::add_field( 'info_telefon', array(
        'settings' => 'info_telefon',
        'label'    => __( 'Telefon', 'smamo' ),
        'section'  => 'site_info',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '',
    ) );
    
}