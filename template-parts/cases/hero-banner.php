<?php 
$banner = new WP_Query(array(
    'post_type' => 'case',
    'posts_per_page' => -1,
    'meta_key' => 'show-in-banner',
    'meta_value' => '1',
));

?>
   
<?php if ($banner->have_posts()) : ?>
<section class="hero-banner">
    <div class="inner">
        <?php $i = 0; while ($banner->have_posts()) : $banner->the_post(); $i++; ?>
            <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'hero-banner' );?>
            <div class="hero-banner-item<?php if ($i === 1) { echo ' active'; } ?>" data-bg="<?php echo $image_url[0] ?>">
                <h3 class="hero-banner-item-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <ul class="hero-banner-pages">
                    <li><a href=""></a></li>
                </ul>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <div class="hero-banner-controls">
            <a href="#" class="icon nav-left"></a>
            <a href="#" class="icon nav-right"></a>
            <ul class="hero-banner-dots">
                <?php $p = 0; while ($p < $i) : $p ++; ?>
                    <li class="dot<?php if ($p === 1){ echo ' active';} ?>"><a href="#"></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>