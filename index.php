<?php

get_header();

get_template_part('template-parts/common/content','before');

if(is_home() || is_front_page()){get_template_part('templates/home');}

elseif('team' === get_post_type(get_the_ID())){get_template_part('templates/single-team');}

elseif(is_single()){get_template_part('templates/single');}

get_template_part('template-parts/common/content','after');

get_footer();