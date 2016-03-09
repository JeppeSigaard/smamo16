<?php 
$type = wp_get_post_terms(get_the_ID(), 'cases',array('hide_empty' => false));
if ( isset($type[0]) ) :
$banner = new WP_Query(array(
    'post_type' => 'case',
    'posts_per_page' => -1,
    'meta_key' => 'show-in-banner',
    'meta_value' => '1',
    'tax_query' => array(
		array(
			'taxonomy' => 'cases',
			'field'    => 'ID',
			'terms'    => $type[0]->term_id,
		),
	),
));

?>
   
<?php if ($banner->have_posts()) : ?>
<section class="hero-banner">
    <div class="inner">
        <?php $i = 0; while ($banner->have_posts()) : $banner->the_post(); $i++; ?>
            <?php $image_url = wp_get_attachment_image_src( get_post_meta(get_the_ID(),'banner-img',true), 'hero-banner' );?>
            <div class="hero-banner-item loading<?php if ($i === 1) { echo ' active'; } ?>" data-bg="<?php echo $image_url[0] ?>">
                <h3 class="hero-banner-item-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <ul class="hero-banner-pages">
                    <?php $stikord = wp_get_post_terms( get_the_ID(), 'stikord'); foreach ($stikord as $stk) : ?>
                    <li><?php echo $stk->name ?></li>
                    <?php endforeach; ?>
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
<?php endif; else : ?>
<section class="hero-banner">
    <div class="inner">
        <div class="hero-banner-item loading" style="opacity: 1;"></div>
    </div>
</section>

<?php endif; ?>