<?php if (has_post_thumbnail() ) : 
    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'widescreen' );
?>
<div class="article-preheader loading" data-bg="<?php echo $image_url[0] ?>">
</div>
<?php endif; ?>