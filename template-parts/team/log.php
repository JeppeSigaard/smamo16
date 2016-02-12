<?php 

$author_title = get_the_title();
$log = new WP_Query(array(
    'post_type' => 'logbog',
    'author' => get_the_author_meta('ID'),
));

if ($log->have_posts()):
?>


<div class="team-log">
    <div class="inner">
        <header class="log-header">
            <h3><?php echo $author_title ?>'s log</h3>
        </header>
        <?php while ($log->have_posts()) : $log->the_post(); $date = get_the_date('Y-m-d'); $current_date = date('Y-m-d', time()); ?>
        <?php if($date !== $current_date) the_date('d. F Y  ','<div class="log-entry-date">','</div>'); ?>
        <div class="log-entry">
            <span class="log-entry-time">
            <?php 
                
                if ( $date === $current_date ){printf( _x( '%s siden', '%s = human-readable time difference', 'smamo' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); }
                else{the_time('H.i');}
            ?>
            </span>
            <?php the_content(); ?>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>
<?php endif; ?>