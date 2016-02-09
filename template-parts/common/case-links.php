<?php $terms = get_terms('cases',array('hide_empty' => false)); ?>
<section class="case-links">
    <div class="inner">
        <?php $i = 0; foreach($terms as $term) : $i++; if ($i < 3) : ?>
        <?php $term_img = get_tax_meta($term->term_id,'case_type_img',true); ?>
        <a href="<?php echo get_term_link($term->term_id,'cases') ?>" class="case-link" data-bg="<?php echo $term_img['url'] ?>">
            <h3 class="case-link-title"><?php echo $term->name; ?></h3>
        </a>
        <?php endif; endforeach; ?>
    </div>
</section>