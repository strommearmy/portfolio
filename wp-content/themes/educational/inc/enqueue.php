<?php
function educational_scripts() {
	// Google font
	wp_enqueue_style( 'educational-google-font', 'https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', array(), '' );

	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '4.1.0' );

	// fontawesome Css
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.7.0' );

	// Slick CSS
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css', array(), '1.9.0' );

	// Slick theme CSS
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/assets/css/slick-theme.css', array(), '1.9.0' );

	// Header Animate CSS
	wp_enqueue_style( 'header-animate', get_template_directory_uri() .'/assets/css/header-animate.css', array(), '1.0.0' );

	// lightbox CSS
	wp_enqueue_style( 'lightbox', get_template_directory_uri() .'/assets/css/lightbox.css', array(), '1.0.0' );

	// Educational Style
	wp_enqueue_style( 'educational-style', get_stylesheet_uri() );

	// Poper JS
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '3.3.1', true ); 

	// light box JS
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), '2.10.0', true );

	// Isotope Js
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), '3.0.6', true );

	// Iso Jquery JS
	wp_enqueue_script( 'iso-jquery', get_template_directory_uri() . '/assets/js/iso-jquery.js', array('jquery'), '1.0.0', true );

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.1.1', true );

	// Slick JS
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.9.0', true );

	// Headroom JS
	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/assets/js/headroom.min.js', array('jquery'), '0.9.4', true );

	// myJquery JS
	wp_enqueue_script( 'educational-myjquery', get_template_directory_uri() . '/assets/js/myjquery.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'educational-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'educational-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'educational_scripts' );