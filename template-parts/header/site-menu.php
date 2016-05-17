<?php 

$team = new WP_Query(array(
    'post_type' => 'team',
    'posts_per_page' => -1,
));
?>
<nav class="site-menu" id="site-menu">
    <ul>
        <li class="menu-list">
            <h2 class="menu-list-heading">Muligheder</h2>
            <ul>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
            </ul>
        </li>
        <li class="menu-list">
            <h2 class="menu-list-heading">Kundeopgaver</h2>
            <ul>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
            </ul>
            <h2 class="menu-list-heading">Inhouse Projekter</h2>
            <ul>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
                <li><a href="#">Overskrift</a></li>
            </ul>
        </li>
        <li class="menu-list">
            <h2 class="menu-list-heading">Nyhedsbrev</h2>
            <ul>
                <li><a href="#">Overskrift</a></li>
            </ul>
            <h2 class="menu-list-heading">Book et møde</h2>
            <ul>
                <li><a href="#">Overskrift</a></li>
            </ul>
        </li>
        <li class="menu-list">
            <h2 class="menu-list-heading">SmartMonkey</h2>
            <ul class="team-list">
                <?php while ( $team->have_posts() ) : $team->the_post(); ?>
                <li class="team-list-item">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <span><?php echo esc_attr(get_post_meta(get_the_ID(), 'name', true)); ?></span>
                    <a href="mailto:<?php echo get_post_meta(get_the_ID(),'email',true); ?>"><?php echo get_post_meta(get_the_ID(),'email',true); ?></a>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </li>
    </ul>
</nav>
