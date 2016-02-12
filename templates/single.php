<?php while (have_posts()) : the_post(); ?>
<section class="page-content">
    <div class="inner">
        <main class="content-main">
            <article <?php post_class(); ?>>
                <?php get_template_part('template-parts/common/article-header'); ?>
                <div class="article-content">
                    <?php the_content(); ?>
                </div>
                <?php if('team' === get_post_type(get_the_ID())) { get_template_part('template-parts/team/log');} ?>
            </article>
        </main>
        <aside class="content-aside aside-left">
            <div class="inner"></div>
        </aside>
        <aside class="content-aside aside-right">
            <div class="inner"></div>
        </aside>
    </div>
</section>
<?php endwhile; ?>