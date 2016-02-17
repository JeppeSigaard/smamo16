<header class="article-header">

<?php if('team' === get_post_type( get_the_ID() ) ) : ?>
    <span class="article-subtitle">SmartMonkey Team</span>
    <h1 class="article-title"><?php echo get_post_meta( get_the_ID(),'name',true ) ?></h1>
    <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );?>
    <div class="header-team-img" data-bg="<?php echo $image_url[0] ?>"></div>
<?php elseif('case' === get_post_type( get_the_ID() ) ) : $terms = wp_get_post_terms(get_the_ID(),'cases'); ?>
    <span class="article-subtitle"><?php if (!empty($terms)) { echo $terms[0]->name;  } ?></span>
    <?php the_title('<h1 class="article-title">','</h1>') ?>
<?php else : ?>
    <?php if (has_subtitle()) {the_subtitle('<span class="article-subtitle">','</span>');} ?>
    <?php the_title('<h1 class="article-title">','</h1>') ?>
<?php endif; ?>
</header>