<?php
	
add_action( 'customize_register', 'exray_customize_register');

function exray_customize_register($wp_customize){

	/* Create Theme Customizer sections */
	
	//Logo section
	$wp_customize->add_section('exray_logo', array(
		'title' 		=> __('Logo', 'exray-framework'),
		'description' 	=> __('Upload your Website logo below', 'exray-framework'),
		'priority'		=> '35'
	));
	
	//Top Ad Section on Theme Customizer
	$wp_customize->add_section('exray_ad', array(
		'title' 		=> __('Top Ad', 'exray-framework'),
		'description' 	=> __('Allow you to upload ad Banner on the top of the page', 'exray-framework'),
		'priority' 		=> '36' 
	));
	
	
	/* Theme Customizer setting & control */	
	
	/* Display logo */
	$wp_customize->add_setting('exray_custom_settings[display_logo]', array(
			'default'=> true,
			'type'=>'option' 
		));
	
	$wp_customize->add_control('exray_custom_settings[display_logo]', array(
		'label'=> 'Display Website logo?',
		'section'=>'exray_logo',
		'settings'=>'exray_custom_settings[display_logo]',
		'type'=>'checkbox'	
	));

	
	 /*Logo upload control*/	
	$wp_customize->add_setting('exray_custom_settings[exray_theme_logo]', array(
			'default' => THEME_IMAGES.'/logo.png',
			'type' => 'option'
		));
		
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'exray_theme_logo', array(
		'label' => __('Upload Website logo', 'exray_framework'),
		'section' => 'exray_logo',
		'settings' => 'exray_custom_settings[exray_theme_logo]'
	)));

	
	/*Add setting for checkbox enable displaying Top Ad (setting saved to db).*/	
	$wp_customize->add_setting('exray_custom_settings[display_top_ad]', array(
				'default' => true,
				'type' => 'option'
		));
	
	// Add checkbox control to Theme Customizer
	$wp_customize->add_control('exray_custom_settings[display_top_ad]',array(
		'label' => __('Display Top Ad?', 'exray-framework'),
		'section' =>  'exray_ad',
		'settings' => 'exray_custom_settings[display_top_ad]',
		'type' => 'checkbox'

	));
	

	/*Setting for Banner Ad*/	
	$wp_customize->add_setting('exray_custom_settings[top_ad]', array(
				'default' => 'http://lorempixel.com/468/60',
				'type' => 'option'
		));
	
	// Add Image upload control to Theme Customizer
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'top_ad', array(
		'label' => __('Upload Top Banner Image', 'exray-framework'),
		'section' => 'exray_ad',
		'settings' => 'exray_custom_settings[top_ad]'

	
	)));


	/* Add setting for Ad link.*/

	$wp_customize->add_setting('exray_custom_settings[top_ad_link]', array(
			'default' => home_url() ,
			'type' => 'option'
	));

	// Add Ad link textbox control to Theme Customizer
	$wp_customize->add_control('exray_custom_settings[top_ad_link]',array(
		'label' => __('Link for Ad', 'exray-framework'),
		'section' =>  'exray_ad',
		'settings' => 'exray_custom_settings[top_ad_link]',
		'type' => 'text'

	));
	
	/* Colors Section */
	
	$exray_theme_customizer_colors = array();
	
	// Top Navigation color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[top_menu_color]',
		'default' => '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Top Menu Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Link color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[link_color]',
		'default' => '#0d72c7',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Link Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Header color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[header_color]',
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Header Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Main Navigation color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[main_menu_color]',
		'default' => '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Main Menu Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Background color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[bg_color]',
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Background Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Footer area color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[footer_color]',
		'default' => '#f7f7f7',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Footer Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Copyright area color
	$exray_theme_customizer_colors[] = array(
		'settings' => 'exray_custom_settings[copyright_container_color]',
		'default' => '#ededed',
		'sanitize_callback' => 'sanitize_hex_color',
		'type' => 'option',
		'label' =>__('Bottom container Color', 'exray-framework'),
		'section' => 'colors'
	);

	// Initialize setting and render all Theme Customizer control
	foreach($exray_theme_customizer_colors as $field)
  	{
 		 // SETTINGS
	    $wp_customize->add_setting( $field['settings'], array( 
	    	'default' => $field['default'],
	    	'sanitize_callback' => $field['sanitize_callback'],
	    	'type' =>  $field['type']
	    ));

	    // CONTROLS
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $field['settings'], array( 
	    	'label' => $field['label'], 
	    	'section' => $field['section'],
	     	'settings' => $field['settings'] 
	     )));
		 		 
	}
	
}

?>