<?php

$submenu_args = array();
$current_id = get_the_ID();

// Page submenu
if('page' === get_post_type($current_id)){
    
    $parents = get_post_ancestors( $current_id );
    $parent_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
    
    $submenu_args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_parent' => $parent_id,
    );
    
}

$submenu = new WP_Query($submenu_args);
if($submenu->have_posts()) :
   
?>
<ul class="side-sub-menu">
    <?php while( $submenu->have_posts() ) : $submenu->the_post(); ?>
        <li class="menu-item<?php if (get_the_ID() === $current_id ) { echo ' current-menu-item';}  ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php endif; ?>