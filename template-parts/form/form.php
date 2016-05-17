<form class="booking-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
    <div class="form-progress"></div>
    <span class="form-control form-control-left disabled">
        <?php //get_svg('menu-close'); ?>
        <?php get_svg('chevron-left'); ?>
        <?php //get_svg('doodle_green'); ?>
    </span>
    <span class="form-control form-control-right">
        <?php get_svg('chevron-right'); ?>
        <?php //get_svg('doodle_green'); ?>
        <?php get_svg('send'); ?>
    </span>
    <?php get_template_part('template-parts/form/form-slide-1'); ?>
    <?php get_template_part('template-parts/form/form-slide-2'); ?>
    <?php get_template_part('template-parts/form/form-slide-3'); ?>
    <?php get_template_part('template-parts/form/form-slide-sending'); ?>
</form>