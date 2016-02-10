<section class="home-article">
    <div class="inner">
        <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header class="article-header">
                <?php the_subtitle('<span class="subtitle">','</span>'); ?>
                <?php the_title('<h1>','</h1>'); ?>    
            </header>
            <div class="article-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</section>