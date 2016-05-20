<form class="booking-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
   <input type="hidden" name="action" value="booking_form">
    <span class="form-control form-control-left disabled">
        <svg class="left" viewBox="-249.5 250.5 500 500">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-left"></use>
        </svg>
    </span>
    <span class="form-control form-control-right">
        <svg class="right" viewBox="-249.5 250.5 500 500">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-right"></use>
        </svg>
        <svg class="send" viewBox="0 0 500 500">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-send"></use>
        </svg>
    </span>
    <?php get_template_part('template-parts/form/form-slide-1'); ?>
    <?php get_template_part('template-parts/form/form-slide-2'); ?>
    <?php get_template_part('template-parts/form/form-slide-3'); ?>
    <?php get_template_part('template-parts/form/form-slide-sending'); ?>
</form>