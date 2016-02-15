<footer class="site-footer" id="site-footer">
    <div class="inner">
        <div class="big-button">
            <a class="booking-show-form" href="#">Book møde</a>
        </div>
        <div class="colophon">
            <ul>
                <li><?php echo get_theme_mod('info_name') ?></li>
                <li><?php echo get_theme_mod('info_address') ?></li>
                <li><?php echo get_theme_mod('info_post') ?> <?php echo get_theme_mod('info_by') ?></li>
                <li><?php echo get_theme_mod('info_telefon') ?></li>
                <li><?php echo get_theme_mod('info_email') ?></li>
            </ul>
        </div>
    </div>
</footer>
<?php get_template_part('template-parts/footer/booking-form'); ?>
<?php wp_footer(); ?>
</body>
</html>