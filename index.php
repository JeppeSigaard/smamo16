<?php

get_header();

get_template_part('template-parts/common/content','before');


if(is_home() || is_front_page()){get_template_part('templates/home');}

elseif(is_archive() || is_tax()){
    get_template_part('templates/archive');
}

elseif(is_single() || is_page()){
    get_template_part('templates/single');
}

get_template_part('template-parts/common/content','after');

get_footer();