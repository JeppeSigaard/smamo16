<div class="team-meta">
    <div class="meta-section meta-name-title">
        <p><strong><?php echo get_post_meta(get_the_ID(),'name',true) ?></strong></p>
        <?php $titles = get_post_meta(get_the_ID(),'titles',true); if (is_array($titles)) : foreach($titles as $title) : ?>
        <p><?php print_r($title) ?></p>
        <?php endforeach; endif; ?>
    </div>
    <div class="meta-section meta-contact-info">
        <?php $email = get_post_meta(get_the_ID(),'email',true); if ($email) : ?>
        <p><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
        <?php endif; $phone = get_post_meta(get_the_ID(),'telefon',true); if ($phone) :  ?>
        <p><a href="mailto:<?php echo $phone ?>"><?php echo $phone ?></a></p>
        <?php endif; ?>
    </div>
    <div class="meta-section meta-log-link">
        <a href="#log"><?php the_title() ?>'s log <span class="meta-log-count"></span></a>
    </div>
    <div class="meta-section meta-social-links">
        
    </div>
    <div class="meta-section meta-website">
        <?php $web = get_post_meta(get_the_ID(),'website',true); if ($web !== '') :?>
        <a target="_blank" href="<?php echo esc_url($web) ?>"><?php echo str_ireplace('http://','',esc_attr($web)) ?></a>
        <?php endif; ?>
    </div>
</div>