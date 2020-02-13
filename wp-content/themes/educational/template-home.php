<?php
/*
* Template Name: FrontPage
*/	
get_header();	
get_template_part( 'sections/section','banners' );
get_template_part( 'sections/section','services' );
get_template_part( 'sections/section','about' );
get_template_part( 'sections/section','courses' );
get_template_part( 'sections/section','counters' );
get_template_part( 'sections/section','events' );
get_template_part( 'sections/section','clients' );
get_template_part( 'sections/section','blogs' );
get_footer();