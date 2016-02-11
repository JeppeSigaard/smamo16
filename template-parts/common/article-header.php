<header class="article-header">
<?php if( 'tema' === get_post_type( get_the_ID()) ) : ?>
    <?php $terms = wp_get_post_terms( get_the_ID(), 'tema_cat'); ?>
    <span class="article-subtitle"><a href="<?php echo get_term_link($terms[0]->term_id,'tema_cat'); ?>"><?php echo $terms[0]->name; ?></a></span>
    <?php the_title('<h1 class="article-title">','</h1>') ?>
<?php elseif('team' === get_post_type( get_the_ID() ) ) : ?>
    <span class="article-subtitle">SmartMonkey Team</span>
    <h1 class="article-title"><?php echo get_post_meta( get_the_ID(),'name',true ) ?></h1>
    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );?>
    <div class="header-team-img" data-bg="<?php echo $image_url[0] ?>"></div>
<?php else : ?>
    <?php if (has_subtitle()) {the_subtitle('<span class="article-subtitle">','</span>');} ?>
    <?php the_title('<h1 class="article-title">','</h1>') ?>
<?php endif; ?>
</header>