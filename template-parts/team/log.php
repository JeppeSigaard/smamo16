<?php 

$log = new WP_Query(array(
    'post_type' => 'log',
    'author' => get_the_author_meta('ID'),
));


if ($log->have_posts()):

?>


<div class="team-log">
    <div class="inner">
        <?php while ($log->have_posts()) : $log->the_post(); ?>
        <div class="log-entry">
            <div class="log-entry-meta">
                <span><?php the_date(); ?></span>
            </div>
            <div class="log-entry-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>
<?php endif; ?>