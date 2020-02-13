<?php

/**
 * Register stylesheets.
 * Loads parent theme from parent folder before child theme stylesheet.
 */

function exblue_frontscripts() {
	wp_enqueue_style( 'exblue-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'exblue-style', get_stylesheet_uri(), array( 'exblue-parent-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'exblue_frontscripts' );

