<?php
/**
 * Partials for Selective Refresh
 *
 * @package Educational
 */

if( ! function_exists( 'educational_popular_courses_text' ) ) :
/**
 * Prints Popular Courses Heading
*/
function educational_popular_courses_text(){
    return get_theme_mod( 'educational_popular_courses', __( 'Popular Courses', 'educational' ) );
}
endif;


if( ! function_exists( 'educational_get_events_text' ) ) :
/**
 * Prints Events Heading
*/
function educational_get_events_text(){
    return get_theme_mod( 'educational_events_text', __( 'Latest Events', 'educational' ) );
}
endif;


if( ! function_exists( 'educational_get_testimonials_text' ) ) :
/**
 * Prints Testimonials Heading
*/
function educational_get_testimonials_text(){
    return get_theme_mod( 'educational_tetimonials_text', __( 'Our Happy Clients', 'educational' ) );
}
endif;


if( ! function_exists( 'educational_get_blog_text' ) ) :
/**
 * Prints Blog Heading
*/
function educational_get_blog_text(){
    return get_theme_mod( 'educational_blog_text', __( 'Latest Blog', 'educational' ) );
}
endif;

if( ! function_exists( 'educational_get_events_details_text' ) ) :
/**
 * Prints View Details Text
*/
function educational_get_events_details_text(){
    return get_theme_mod( 'educational_events_details_text', __( 'View Details', 'educational' ) );
}
endif;


if( ! function_exists( 'educational_social_get_links_text' ) ) :
/**
 * Prints View Details Text
*/
function educational_social_get_links_text(){
    return get_theme_mod( 'educational_social_links_text', __( 'Social Links', 'educational' ) );
}
endif;