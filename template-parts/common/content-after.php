<?php 

if(is_home() || is_front_page()){
       
}

elseif ('team' === get_post_type(get_the_ID())) {
    get_template_part('template-parts/home/newsletter-puzzle'); 
    get_template_part('template-parts/common/case-links'); 
}


else{    
    get_template_part('template-parts/common/contact-spinner');
}

?>
</div>