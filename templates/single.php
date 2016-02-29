<?php while (have_posts()) : the_post(); ?>
<section class="page-content">
    <div class="inner">
        <main class="content-main" id="content-main">
            <?php get_template_part('template-parts/common/article-pre-header'); ?>
            <article <?php post_class(); ?>>    
                <?php get_template_part('template-parts/common/article-header'); ?>
                <div class="article-content">
                    <?php the_content(); ?>
                </div>
                <?php if('team' === get_post_type(get_the_ID())) { get_template_part('template-parts/team/log');} ?>
            </article>
        </main>
        <aside class="content-aside fixed-aside">
           <div class="inner">
               <div class="aside-left">
                    <?php if('team' === get_post_type(get_the_ID())) { get_template_part('template-parts/aside/team-meta');} ?>
                    <?php if('page' === get_post_type(get_the_ID())) { get_template_part('template-parts/aside/sub-menu');} ?>
                    <?php if('case' === get_post_type(get_the_ID())) { get_template_part('template-parts/aside/case-sub-menu');} ?>
                </div>
                <div class="aside-right">
                    <?php get_template_part('template-parts/aside/menu'); ?>
                </div>
           </div>
        </aside>
    </div>
</section>
<?php endwhile; ?>