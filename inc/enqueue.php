<?php
/**
 * Understrap enqueue scripts
 *
 * @package clean-blog-plus
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// cbp Styles
		wp_enqueue_style( 'font-awsome-css', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' );
		wp_enqueue_style( 'clean-blog-plus', get_template_directory_uri() . '/css/clean-blog.min.css' );

		// cbp Scripts
		wp_enqueue_script( 'clean-blog-plus', get_template_directory_uri() . '/js/clean-blog.min.js', array(), true);
		
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
