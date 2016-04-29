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
            'id' => get_the_ID(),
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
    
    <div class="contact-info">
        <div class="inner">
            <h3 class="info-title">Byg en medarbejder</h3>
            <div class="info-description"> <?php echo html_entity_decode(get_theme_mod('info_long_description')); ?> </div>
            <div class="info-links">
                <a class="info-email" href="mailto:<?php echo get_theme_mod('info_email'); ?>"><?php echo get_theme_mod('info_email'); ?></a>
                <a class="info-phone" href="tel:<?php echo get_theme_mod('info_telefon'); ?>"><?php echo get_theme_mod('info_telefon'); ?></a>
                <div class="info-links-social">
                    <a href="">Facebook</a>
                    <a href="">Linkedin</a>
                    <a href="">Twitter</a>
                    <a href="">Instagram</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contact-face-spinner">
        <div class="face-spinner-top">
            <?php foreach ( $spinner_items as $item ) : ?>
            <div class="slice loading" data-slice-id="<?php echo $item['id']; ?>" data-slice-url="<?php echo $item['href'] ?>" data-bg="<?php echo $item['img']; ?>"></div>
            <?php endforeach; ?>
        </div>
        <div class="face-spinner-middle">
        </div>
        <div class="face-spinner-bottom">
        </div>
        <div class="face-spinner-controls">
            <a href="#" class="spinner-btn spin-top"><?php get_svg('bevel'); ?></a>
            <a href="#" class="spinner-btn spin-middle"><?php get_svg('bevel'); ?></a>
            <a href="#" class="spinner-btn spin-bottom"><?php get_svg('bevel'); ?></a>
        </div>   
    </div>
</section>
<?php endif; ?>