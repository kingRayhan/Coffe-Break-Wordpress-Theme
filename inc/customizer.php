<?php
/**
 * Coffe Break Theme Customizer
 *
 * @package Coffe_Break
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function coffeebreak_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/* Link Color */
	$wp_customize->add_setting(
		'coffee_website_logo',
		array(
			'default'     		 => get_template_directory_uri().'/images/logo-1.png',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'coffee_website_logo',
			array(
			    'label'      => 'Website Logo',
			    'section'    => 'title_tagline',
			    'settings'   => 'coffee_website_logo'
			)
		)
	);

	$wp_customize->add_section('footer',array(
		'title' => 'Footer'
	));
	$wp_customize->add_setting('footer_copyright',array(
		'default' => '© Coffee Break. All Rights Reserved | Theme by  <a href="http://rayhan.info/" target="_blank" class="customize-unpreviewable">@KingRayhan</a>',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('footer_copyright',array(
		'label' => 'Footer copyright text',
		'type' => 'textarea',
		'section' => 'footer'
	));




	/*-----------------------------------------------------------*
	 * Defining our own 'Social Links' section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section('social_links',array(
		'title' => 'Social Links',
		'priority' => 30
	));

	$wp_customize->add_setting('social_icons',array(
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icons',array(
		'section' => 'social_links',
		'type' => 'hidden',
		'label' => __('','cleanblog'),
		'description' => __("<h1>Social Icons</h1>Give your social profile url which icons you want to show in footer. <br/><b>NOTE:</b> you must have to put url with <code>http://</code> or <code>https://</code>",'cleanblog')
	));



	/* Twitter URL */
	$wp_customize->add_setting(
		'coffee_break_social_twitter',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_twitter',
		array(
			'section'  => 'social_links',
			'label'    => 'Twitter',
			'type'     => 'text'
		)
	);
	/* Facebook URL */
	$wp_customize->add_setting(
		'coffee_break_social_facebook',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_facebook',
		array(
			'section'  => 'social_links',
			'label'    => 'Facebook',
			'type'     => 'text'
		)
	);
	/* Google URL */
	$wp_customize->add_setting(
		'coffee_break_social_google',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_google',
		array(
			'section'  => 'social_links',
			'label'    => 'Google+',
			'type'     => 'text'
		)
	);
	/* Pinterest URL */
	$wp_customize->add_setting(
		'coffee_break_social_pinterest',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_pinterest',
		array(
			'section'  => 'social_links',
			'label'    => 'Pinterest',
			'type'     => 'text'
		)
	);
	/* Linkedin URL */
	$wp_customize->add_setting(
		'coffee_break_social_linkedin',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_linkedin',
		array(
			'section'  => 'social_links',
			'label'    => 'Linkedin',
			'type'     => 'text'
		)
	);
	/* Github URL */
	$wp_customize->add_setting(
		'coffee_break_social_github',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_github',
		array(
			'section'  => 'social_links',
			'label'    => 'Github',
			'type'     => 'text'
		)
	);
	/* Instagram URL */
	$wp_customize->add_setting(
		'coffee_break_social_instagram',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_instagram',
		array(
			'section'  => 'social_links',
			'label'    => 'Instagram',
			'type'     => 'text'
		)
	);
	/* Medium URL */
	$wp_customize->add_setting(
		'coffee_break_social_medium',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_medium',
		array(
			'section'  => 'social_links',
			'label'    => 'Medium',
			'type'     => 'text'
		)
	);
	/* Vine URL */
	$wp_customize->add_setting(
		'coffee_break_social_vine',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_vine',
		array(
			'section'  => 'social_links',
			'label'    => 'Vine',
			'type'     => 'text'
		)
	);
	/* Tumblr URL */
	$wp_customize->add_setting(
		'coffee_break_social_tumblr',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_tumblr',
		array(
			'section'  => 'social_links',
			'label'    => 'Tumblr',
			'type'     => 'text'
		)
	);
	/* YouTube URL */
	$wp_customize->add_setting(
		'coffee_break_social_youtube',
		array(
			'default'            => '',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'coffee_break_social_youtube',
		array(
			'section'  => 'social_links',
			'label'    => 'YouTube',
			'type'     => 'text'
		)
	);




}
add_action( 'customize_register', 'coffeebreak_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function coffeebreak_customize_preview_js() {
	wp_enqueue_script( 'coffeebreak_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'coffeebreak_customize_preview_js' );
