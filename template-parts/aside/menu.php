<?php 
$menu_args = array();
$current_id = get_the_ID();

// Team query
if('team' === get_post_type($current_id)){
    $menu_args = array(
        'post_type' => 'team',
        'posts_per_page' => -1,
    );
}

// Page query
elseif('page' === get_post_type($current_id)){
    $menu_args = array(
        'post_type' => 'page',
        'post_parent' => 0,
    );
    
    $parents = get_post_ancestors( $current_id );
    $current_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
}

$menu = new WP_Query($menu_args);
if($menu->have_posts()) :
?>
<ul class="side-menu">
    <?php while( $menu->have_posts() ) : $menu->the_post(); ?>
        <li class="menu-item<?php if (get_the_ID() === $current_id ) { echo ' current-menu-item';}  ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php endif; ?>