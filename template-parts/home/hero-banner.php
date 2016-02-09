<?php 
$terms = get_terms('page_cat',array('hide_empty' => false));
?>
   

<section class="hero-banner">
    <div class="inner">
        <?php $i = 0; foreach($terms as $term) : $i++; ?>
            <?php $term_img = get_tax_meta($term->term_id,'page_cat_img',true); ?>
            <div class="hero-banner-item<?php if ($i === 1) { echo ' active'; } ?>" data-bg="<?php echo $term_img['url'] ?>">
                <h3 class="hero-banner-item-title"><a href="<?php echo get_term_link($term->term_id,'page_cat') ?>"><?php echo $term->name ?></a></h3>
                <ul class="hero-banner-pages">
                    <?php $term_ps = get_posts(array('post_type' => 'tema', 'page_cat' => $term->slug)); if( !empty($term_ps)) : foreach($term_ps as $page) : ?>
                    <li><a href="<?php echo get_permalink($page->ID) ?>"><?php echo $page->post_title ?></a></li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
        <?php endforeach; ?>
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