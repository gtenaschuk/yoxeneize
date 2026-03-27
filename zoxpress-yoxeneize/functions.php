<?php
/**
 * Child theme functions.
 *
 * @package ZoxpressYoxeneize
 */

/**
 * Enqueue parent and child theme styles.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$theme   = wp_get_theme();
		$version = $theme->get( 'Version' );

		wp_enqueue_style(
			'zoxpress-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version
		);

		wp_enqueue_style(
			'zoxpress-yoxeneize-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'zoxpress-style' ),
			$version
		);
	}
);

/**
 * Replace the parent Font Awesome bundle with a minimal subset.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$theme          = wp_get_theme();
		$theme_version  = $theme->get( 'Version' );
		$subset_css     = get_stylesheet_directory() . '/font-awesome/css/used-icons.css';
		$subset_version = file_exists( $subset_css ) ? (string) filemtime( $subset_css ) : $theme_version;

		wp_dequeue_style( 'fontawesome' );
		wp_deregister_style( 'fontawesome' );

		wp_enqueue_style(
			'fontawesome',
			get_stylesheet_directory_uri() . '/font-awesome/css/used-icons.css',
			array(),
			$subset_version
		);
	},
	20
);

/**
 * Load ZoxPress textdomain from the child theme languages directory.
 */
add_action(
	'after_setup_theme',
	function () {
		load_child_theme_textdomain( 'zoxpress', get_stylesheet_directory() . '/languages' );
	},
	11
);
