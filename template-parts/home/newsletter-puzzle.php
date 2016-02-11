<section class="newsletter-puzzle">
    <div class="inner">
        <div class="puzzle-trigger"></div>
        <div class="puzzle-description">
            <h3>Do the puzzle</h3>
            <span class="subtitle">Unlock vores nyhedsbrev</span>
            <div class="puzzle-timer"></div>
            <div class="puzzle-lock">
                <?php get_svg('unlocked'); ?>
            </div>
            <div class="puzzle-times">
                <div class="puzzle-best-time"><span>Bedste tid:</span><?php echo get_option('puzzle-best-time'); ?></div>
            </div> 
        </div>
        <div class="puzzle-stage" id="puzzle-stage"></div>
        <div class="puzzle-counter"></div>
        <div class="puzzle-form">
            <form action="<?php echo admin_url('admin-ajax.php') ?>">
                <input type="hidden" name="action" value="puzzle-form"/>
                <input type="hidden" name="solved" value="false"/>
                <input type="hidden" name="solve-time" value="null">
                <div>
                    <p>Sæt din tid på vores High Score liste og modtag vores nyhedsbrev.</p>
                </div>
                <div class="field">
                    <input type="text" name="name" class="name required" data-restrict="true">
                    <label for="name">Navn</label>
                </div>
                <div class="field">
                    <input type="email" name="email" class="email required">
                    <label for="email">Email</label>
                </div>
                <div class="center">
                    <a href="#" class="form-button submit">Send</a>
                </div>
            </form>    
        </div>
    </div>
</section>