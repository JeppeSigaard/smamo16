<?php 
$team = new WP_Query(array(
    'post_type' => 'team',
    'posts_per_page' => -1,
));

$spinner_items = array();
$team_icons = array();
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


    $team_icons[get_the_ID()] = array(
        'tel' => ( get_post_meta(get_the_ID(),'telefon',true) !== '') ? smamo_tel(get_post_meta(get_the_ID(),'telefon',true)) : false,
        'email' => ( get_post_meta(get_the_ID(),'email',true) ) ? get_post_meta(get_the_ID(),'email',true) : false,
        'web' => ( get_post_meta(get_the_ID(),'website',true) ) ? get_post_meta(get_the_ID(),'website',true) : false,
        'facebook' => ( get_post_meta(get_the_ID(),'facebook',true) ) ? get_post_meta(get_the_ID(),'facebook',true) : false,
        'twitter' => ( get_post_meta(get_the_ID(),'twitter',true) ) ? get_post_meta(get_the_ID(),'twitter',true) : false,
        'github' => ( get_post_meta(get_the_ID(),'github',true) ) ? get_post_meta(get_the_ID(),'github',true) : false,
    );

    
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
            <div class="info-description"><?php echo apply_filters('the_content', get_the_excerpt()); ?></div>
            <div class="info-links">
                <?php $icons = $team_icons[get_the_ID()]; if ($icons['tel']) : ?>
                    <a href="<?php echo $icons['tel'] ?>">
                        <svg viewbox="0 0 16 16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-telefon"></use>
                        </svg>
                    </a>
                <?php endif; if ( $icons['email'] ) : ?>
                    <a href="mailto:<?php echo $icons['email'] ?>">
                        <svg viewbox="0 0 16 16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-email"></use>
                        </svg>
                    </a>
                <?php endif; if ( $icons['web'] ) : ?>
                    <a href="<?php echo esc_url($icons['web']) ?>" target="_blank">
                        <svg viewbox="0 0 16 16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-web"></use>
                        </svg>
                    </a>
                <?php endif; if ( $icons['facebook'] ) : ?>
                    <a href="<?php echo esc_url($icons['facebook']) ?>" target="_blank">
                        <svg viewbox="0 0 16 16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-facebook"></use>
                        </svg>
                    </a>
                <?php endif; if ( $icons['twitter'] ) : ?>
                    <a href="<?php echo esc_url($icons['twitter']) ?>" target="_blank">
                        <svg viewbox="0 0 16 16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-twitter"></use>
                        </svg>
                    </a>
                <?php endif; if ( $icons['github'] ) : ?>
                    <a href="<?php echo esc_url($icons['github']) ?>" target="_blank">
                        <svg viewbox="0 0 16 16">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-github"></use>
                        </svg>
                    </a>
                <?php endif; ?>
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
            <a href="#" class="spinner-btn spin-top">
                <svg viewBox="0 0 400 300">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bevel"></use>
                </svg>
            </a>
            <a href="#" class="spinner-btn spin-middle">
                <svg viewBox="0 0 400 300">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bevel"></use>
                </svg>
            </a>
            <a href="#" class="spinner-btn spin-bottom">
                <svg viewBox="0 0 400 300">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bevel"></use>
                </svg>
            </a>
        </div>   
    </div>
</section>
<?php endif; ?>