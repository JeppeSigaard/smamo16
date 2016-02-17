<?php 

if (class_exists('Kirki')){
    
    Kirki::add_section( 'mailchimp', array(
        'title'          => __( 'Mailchimp' ),
        'description'    => __( 'Tilføj API tilgang til mailchimp' ),
        'panel'          => '', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    
    Kirki::add_field( 'mailchimp_api', array(
        'settings' => 'mailchimp_api',
        'label'    => __( 'API nøgle', 'smamo' ),
        'section'  => 'mailchimp',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '40bbbefd42e7b7fd5e22c5e0e9ca61b3-us10',
    ) );
    
    Kirki::add_field( 'list_ID', array(
        'settings' => 'list_ID',
        'label'    => __( 'Liste ID', 'smamo' ),
        'section'  => 'mailchimp',
        'type'     => 'text',
        'priority' => 10,
        'default'  => '51f08ecfa7',
    ) );
    
}