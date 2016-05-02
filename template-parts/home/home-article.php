<?php $front_page = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 1,
    'meta_key' => 'front_page',
    'meta_value' => '1',
)); ?>
<section class="home-article">
    <div class="inner">
        <?php while ( $front_page->have_posts() ) : $front_page->the_post(); ?>
        <article <?php post_class(); ?>>
            <header class="article-header">
                <?php the_subtitle('<span class="subtitle">','</span>'); ?>
                <?php the_title('<h1>','</h1>'); ?>    
            </header>
            <div class="article-content">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="home-read-more">Læs mere <?php get_svg('read-more'); ?></a>
            <div class="article-boxes">
                <?php $i = 0; $subpages = get_posts(array('post_parent' => get_the_ID(),'post_type' => 'page', 'posts_per_page' => 3 )); 
                foreach($subpages as $sub) : $i++; ?>
                <a href="<?php echo get_permalink($sub->ID); ?>" class="article-box">
                    <div class="inner">
                        <h3 class="box-title"><?php echo $sub->post_title; ?></h3>
                        <div class="box-content">
                            <?php echo apply_filters('the_content',($sub->post_excerpt !== '') ? $sub->post_excerpt : wp_trim_words($sub->post_content, $num_words = 55)); ?>
                        </div>
                        <span class="home-read-more">Læs mere <?php get_svg('read-more'); ?></span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>