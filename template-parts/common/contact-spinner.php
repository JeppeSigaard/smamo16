<?php 
$team = new WP_Query(array(
    'post_type' => 'team',
    'posts_per_page' => -1,
));

$spinner_items = array();
while ( $team->have_posts() ) : $team->the_post();

$images = get_post_meta(get_the_ID(),'spinner_img',false);
    if (!empty($images)) : foreach ( $images as $img ) :

        $img_url = wp_get_attachment_image_src( $img, 'full' );

        $spinner_items[] = array(
            'id' => $img,
            'post_id' => get_the_ID(),
            'img' => $img_url[0],
            'href' => get_permalink(get_the_ID()),
        );

    endforeach; endif;
endwhile; 

wp_reset_postdata();

if (!empty($spinner_items)) :

shuffle($spinner_items);
?>
<section class="contact-spinner">
    
    <article class="contact-info visible">
        <div class="inner">
            <h3 class="info-title">Vores team</h3>
            <div class="info-description"></div>
            <div class="info-links">
            </div>
        </div>
    </article>
    <?php while ($team->have_posts() ) : $team->the_post(); ?>
    <article <?php post_class('contact-info hidden') ?>>
        <div class="inner">
            <h3 class="info-title"><?php echo esc_attr(get_post_meta(get_the_ID(), 'name', true)) ?></h3>
            <div class="info-description"><?php the_excerpt(); ?></div>
            <div class="info-links">
            </div>
        </div>
    </article>
    <?php endwhile; wp_reset_postdata(); ?>
    
    <div class="contact-face-spinner">
        <div class="face-spinner-top">
            <?php foreach ( $spinner_items as $item ) : ?>
            <div class="slice loading" data-post-id="<?php echo $item['post_id'] ?>" data-slice-id="<?php echo $item['id']; ?>" data-slice-url="<?php echo $item['href'] ?>" data-bg="<?php echo $item['img']; ?>"></div>
            <?php endforeach; ?>
        </div>
        <div class="face-spinner-middle">
            <?php shuffle($spinner_items); foreach ( $spinner_items as $item ) : ?>
            <div class="slice loading" data-post-id="<?php echo $item['post_id'] ?>" data-slice-id="<?php echo $item['id']; ?>" data-slice-url="<?php echo $item['href'] ?>" data-bg="<?php echo $item['img']; ?>"></div>
            <?php endforeach; ?>
        </div>
        <div class="face-spinner-bottom">
            <?php shuffle($spinner_items); foreach ( $spinner_items as $item ) : ?>
            <div class="slice loading" data-post-id="<?php echo $item['post_id'] ?>" data-slice-id="<?php echo $item['id']; ?>" data-slice-url="<?php echo $item['href'] ?>" data-bg="<?php echo $item['img']; ?>"></div>
            <?php endforeach; ?>
        </div>
        <div class="face-spinner-controls">
            <a href="#" class="spinner-btn spin-top"><?php get_svg('bevel'); ?></a>
            <a href="#" class="spinner-btn spin-middle"><?php get_svg('bevel'); ?></a>
            <a href="#" class="spinner-btn spin-bottom"><?php get_svg('bevel'); ?></a>
        </div>   
    </div>
</section>
<?php endif; ?>