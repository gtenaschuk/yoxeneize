<?php

// Enqueue parent and child theme styles.
add_action( 'wp_enqueue_scripts', function () {
	// Parent theme stylesheet.
	wp_enqueue_style(
		'zoxpress-style',
		get_template_directory_uri() . '/style.css'
	);

	// Child theme stylesheet (this theme).
	wp_enqueue_style(
		'zoxpress-yoxeneize-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'zoxpress-style' )
	);
} );

// Load ZoxPress textdomain from the child theme languages directory.
add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'zoxpress', get_stylesheet_directory() . '/languages' );
}, 11 );

