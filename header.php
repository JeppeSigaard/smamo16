<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="ajax-url" content="<?php echo admin_url('admin-ajax.php'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrap">
<?php get_template_part('template-parts/header/site-header'); ?>