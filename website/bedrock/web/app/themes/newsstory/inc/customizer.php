<?php
/**
 * Newsstory Theme Customizer
 *
 * @package Newsstory
 */

//Sanitize Blog Post
function newsstory_sanitize_radio_post($value){ 
    if(!in_array($value, array('true','false'))){
        $value = 'true';
    }
    return $value;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsstory_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newsstory_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newsstory_customize_partial_blogdescription',
			)
		);
	}

	// Add newsstory blogpage options section
    $wp_customize->add_section('newsstory_blog_options', array(
        'title'          => esc_html__('Blogpage Settings', 'newsstory'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select blog settings from here.', 'newsstory'),
        'priority'       => 20,
    ));

    // Blog Style Settings
    $wp_customize->add_setting('newsstory_style_settings', array(
        'default'           => 'false',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'newsstory_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('newsstory_style_control', array(
        'label'          => esc_html__('Select blog style', 'newsstory'),
        'description'    => esc_html__('Select blog style from here.', 'newsstory'),
        'section'        => 'newsstory_blog_options',
        'settings'       => 'newsstory_style_settings',
        'type'           => 'select',
        'choices'        => array(
            'false'      => esc_html__('List Blog', 'newsstory'),
            'true'       => esc_html__('Grid Blog', 'newsstory'),
        ),
    ));

    // Add newsstory options section
	$wp_customize->add_section('newsstory_options', array(
		'title'          => __('Social Options', 'newsstory'),
		'capability'     => 'edit_theme_options',
		'description'    => __('Add social section options', 'newsstory'),
		'priority'       => 21,

	));

	// Facebook Url
    $wp_customize->add_setting('fb_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('fa_url_control', array(
        'label'      => __('Facebook Url', 'newsstory'),
        'description'=> __('Type your facebook profile link.', 'newsstory'),
        'section'    => 'newsstory_options',
        'settings'   => 'fb_url',
        'type'       => 'url',
    ));

	// Twitter Url
    $wp_customize->add_setting('tw_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('tw_url_control', array(
        'label'      => __('Twitter Url', 'newsstory'),
        'description'=> __('Type your twitter profile link.', 'newsstory'),
        'section'    => 'newsstory_options',
        'settings'   => 'tw_url',
        'type'       => 'url',
    ));

	// Linkedin Url
    $wp_customize->add_setting('link_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('link_url_control', array(
        'label'      => __('Linkedin Url', 'newsstory'),
        'description'=> __('Type your linkedin profile link.', 'newsstory'),
        'section'    => 'newsstory_options',
        'settings'   => 'link_url',
        'type'       => 'url',
    ));

	// instagram Url
    $wp_customize->add_setting('instagram_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('instagram_url_control', array(
        'label'      => __('Instagram Url', 'newsstory'),
        'description'=> __('Type your instagram profile link.', 'newsstory'),
        'section'    => 'newsstory_options',
        'settings'   => 'instagram_url',
        'type'       => 'url',
    ));
}
add_action( 'customize_register', 'newsstory_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newsstory_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newsstory_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsstory_customize_preview_js() {
	wp_enqueue_script( 'newsstory-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'newsstory_customize_preview_js' );
require get_template_directory() . '/inc/newsstory-button/newsstory-customize.php';