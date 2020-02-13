<?php

function responsive_businessr_enqueue_style() {
	wp_enqueue_style( 'di-blog-style-default', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'responsive-businessr-style',  get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', 'font-awesome', 'di-blog-style-default', 'di-blog-style-core' ), wp_get_theme()->get('Version'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'responsive_businessr_enqueue_style' );

function responsive_businessr_plugins() {

	$plugins = array(
		array(
			'name'      => __( 'Yoast SEO', 'responsive-businessr'),
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'responsive_businessr_plugins' );

