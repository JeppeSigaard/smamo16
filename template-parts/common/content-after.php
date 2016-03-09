<?php 



if(is_home() || is_front_page()){
       
}

elseif ('team' === get_post_type(get_the_ID())) {
    
}


else{    
    get_template_part('template-parts/common/contact-spinner');
    get_template_part('template-parts/common/case-links'); 
}



?>
</div>