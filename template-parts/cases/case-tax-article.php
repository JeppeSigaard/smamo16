<?php $type = wp_get_post_terms(get_the_ID(), 'cases'); if ( isset($type[0]) ) : ?>
<section class="tax-article">
    <div class="inner">
        <article>
            <header class="article-header">
                <h1><?php echo $type[0]->name; ?></h1>    
            </header>
            <div class="article-content">
                <?php echo apply_filters('the_content',$type[0]->description); ?>
            </div>
            <?php if (have_posts()) : ?>
            <div class="article-boxes">
                <?php 
                while (have_posts()) : the_post(); 
                    $label_class = ( get_post_meta(get_the_ID(),'case-label',true) !== '' ) ? get_post_meta(get_the_ID(),'case-label',true) : '0';
                ?>
                <a href="<?php the_permalink(); ?>"  <?php post_class('article-box label-'.$label_class); ?>>
                    <div class="inner">
                        <div class="box-img">
                            <img data-src="<?php the_post_thumbnail_url(); ?>" />
                        </div>
                        <h3 class="box-title"><?php the_title(); ?></h3>
                        <div class="box-content">
                            <?php echo wp_trim_words(get_the_excerpt(),$num_words = 8); ?>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </article>
    </div>
</section>
<?php else : ?>
<section class="tax-article">
    <div class="inner">
        <article>
            <header class="article-header">
                <h1>Ingen cases</h1>
            </header>
            <div class="article-content">
                <p>Der er ingen cases at vise. Måske hjælper det at vende tilbage senere?</p>
            </div>
        </article>
    </div>
</section>
<?php endif; ?>