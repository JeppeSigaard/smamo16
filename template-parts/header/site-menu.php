<nav class="site-menu" id="site-menu">
    <div class="inner">
       <span class="menu-of-the-year">Menu of the year</span>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu', 
            'container' => false, 
            'fallback_cb' => '',
            'menu_id' => false,
            'menu_class' => 'main-menu',
        )); ?>
    </div>
</nav>
