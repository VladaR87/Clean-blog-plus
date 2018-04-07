<?php
/**
 * Understrap Theme Customizer
 *
 * @package clean-blog-plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	

		// cbp Header 
		$wp_customize->add_section('cbp-header-section', array(
			'title' => 'Theme Header',
			'priority'   => 20
		));

		$wp_customize->add_setting('cbp-header-image', array(
			'sanitize_callback' => 'sanitize_file_name'
		));
		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'cbp-header-image-control', array(
			'label' => 'Image',
			'section' => 'cbp-header-section',
			'settings' => 'cbp-header-image',
			'width' => 1900,
			'height' => 1080
	 	)) );

 		// cbp Theme options 
 		$wp_customize->add_section('cbp-theme-section', array(
 			'title' => 'Theme Options',
 			'priority'   => 25
 		));

 		//radio box sanitization function
        function cbp_sanitize_radio( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible radio box options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

 		$wp_customize->add_setting('cbp-post-image-position', array(
 			'default' => 'Left',
 			array(
                'sanitize_callback' => 'cbp_sanitize_radio'
            )
 		));
 		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cbp-post-image-position-control', array(
 			'label' => 'Post image position',
 			'description' => 'Choose how you want to display post featured image on your blog page',
 			'section' => 'cbp-theme-section',
 			'settings' => 'cbp-post-image-position',
 			'type' => 'radio',
 			'choices' => array('Left' => 'Left', 'Center' => 'Center', 'None' => 'None')
 	 	)) );

 		$wp_customize->add_setting('cbp-post-excerpt', array(
 			'default' => 'Yes',
 			array(
                'sanitize_callback' => 'cbp_sanitize_radio'
            )
 		));
 		$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cbp-post-excerpt-control', array(
 			'label' => 'Show Post Excerpts?',
 			'description' => 'Choose if you want to display post excerpts on your blog page',
 			'section' => 'cbp-theme-section',
 			'settings' => 'cbp-post-excerpt',
 			'type' => 'radio',
 			'choices' => array('Yes' => 'Yes', 'No' => 'No')
 	 	)) );


		// cbp Footer
		$wp_customize->add_section('cbp-footer-section', array(
			'title' => 'Theme Footer',
			'priority' => 35
		));

	 	$wp_customize->add_setting('cbp-footer-facebook', array(
 			'default' => '',
 			array(
                'sanitize_callback' => 'esc_url_raw' 
            )
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-facebook-control', array(
 			'label' => 'Facebook',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-facebook'
 		)) );

	 	$wp_customize->add_setting('cbp-footer-twitter', array(
 			'default' => '',
			array(
               'sanitize_callback' => 'esc_url_raw' 
           	)
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-twitter-control', array(
 			'label' => 'Twitter',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-twitter'
 		)) );

	 	$wp_customize->add_setting('cbp-footer-youtube', array(
 			'default' => '',
 			array(
               'sanitize_callback' => 'esc_url_raw' 
           	)
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-youtube-control', array(
 			'label' => 'Youtube',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-youtube'
 		)) );

	 	$wp_customize->add_setting('cbp-footer-instagram', array(
 			'default' => '',
 			array(
                'sanitize_callback' => 'esc_url_raw' 
            )
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-instagram-control', array(
 			'label' => 'Instagram',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-instagram'
 		)) );

	 	$wp_customize->add_setting('cbp-footer-reddit', array(
 			'default' => '',
 			array(
                'sanitize_callback' => 'esc_url_raw' 
            )
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-reddit-control', array(
 			'label' => 'Reddit',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-reddit'
 		)) );

 		$wp_customize->add_setting('cbp-footer-pinterest', array(
 			'default' => '',
 			array(
                'sanitize_callback' => 'esc_url_raw' 
            )
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-pinterest-control', array(
 			'label' => 'Pinterest',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-pinterest'
 		)) );

 		$wp_customize->add_setting('cbp-footer-googleplus', array(
 			'default' => '',
 			array(
                'sanitize_callback' => 'esc_url_raw' 
            )
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-googleplus-control', array(
 			'label' => 'Googleplus',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-googleplus'
 		)) );

 		$wp_customize->add_setting('cbp-footer-text', array(
 			'default' => '',
 			array(
                'sanitize_callback' => 'wp_filter_kses' 
            )
 		));
 		$wp_customize->add_control( new WP_Customize_control($wp_customize, 'cbp-footer-text-control', array(
 			'label' => 'Footer Text',
 			'description' => 'Change text in footer below social icons',
 			'section' => 'cbp-footer-section',
 			'settings' => 'cbp-footer-text'
 		)) );
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'clean-blog-plus' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'clean-blog-plus' ),
			'priority'    => 30,
		) );

		 //select sanitization function
        function understrap_cbp_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'understrap_cbp_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type', array(
					'label'       => __( 'Container Width', 'clean-blog-plus' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'clean-blog-plus' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'clean-blog-plus' ),
						'container-fluid' => __( 'Full width container', 'clean-blog-plus' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'clean-blog-plus' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'clean-blog-plus' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_sidebar_position',
					'type'        => 'select',
					'sanitize_callback' => 'understrap_cbp_sanitize_select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'clean-blog-plus' ),
						'left'  => __( 'Left sidebar', 'clean-blog-plus' ),
						'both'  => __( 'Left & Right sidebars', 'clean-blog-plus' ),
						'none'  => __( 'No sidebar', 'clean-blog-plus' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
