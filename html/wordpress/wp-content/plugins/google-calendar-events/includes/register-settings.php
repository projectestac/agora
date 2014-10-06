<?php

/**
 * Register all settings needed for the Settings API.
 *
 * @package    gce
 * @subpackage Includes
 * @author     Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *  Main function to register all of the plugin settings
 *
 * @since 2.0.0
 */
function gce_register_settings() {
	
	$gce_settings = array(

		/* General Settings */
		'general' => array(
			'save_settings' => array(
				'id'   => 'save_settings',
				'name' => __( 'Save Settings', 'gce' ),
				'desc' => __( 'Save your settings when uninstalling this plugin. Useful when upgrading or re-installing.', 'gce' ),
				'type' => 'checkbox'
			)
		)
	);

	/* If the options do not exist then create them for each section */
	if ( false == get_option( 'gce_settings_general' ) ) {
		add_option( 'gce_settings_general' );
	}

	/* Add the General Settings section */
	add_settings_section(
		'gce_settings_general',
		__( 'General Settings', 'gce' ),
		'__return_false',
		'gce_settings_general'
	);

	foreach ( $gce_settings['general'] as $option ) {
		add_settings_field(
			'gce_settings_general[' . $option['id'] . ']',
			$option['name'],
			function_exists( 'gce_' . $option['type'] . '_callback' ) ? 'gce_' . $option['type'] . '_callback' : 'gce_missing_callback',
			'gce_settings_general',
			'gce_settings_general',
			gce_get_settings_field_args( $option, 'general' )
		);
	}

	/* Register all settings or we will get an error when trying to save */
	register_setting( 'gce_settings_general',         'gce_settings_general',         'gce_settings_sanitize' );

}
add_action( 'admin_init', 'gce_register_settings' );

/*
 * Return generic add_settings_field $args parameter array.
 *
 * @since     2.0.0
 *
 * @param   string  $option   Single settings option key.
 * @param   string  $section  Section of settings apge.
 * @return  array             $args parameter to use with add_settings_field call.
 */
function gce_get_settings_field_args( $option, $section ) {
	$settings_args = array(
		'id'      => $option['id'],
		'desc'    => $option['desc'],
		'name'    => $option['name'],
		'section' => $section,
		'size'    => isset( $option['size'] ) ? $option['size'] : null,
		'options' => isset( $option['options'] ) ? $option['options'] : '',
		'std'     => isset( $option['std'] ) ? $option['std'] : ''
	);

	// Link label to input using 'label_for' argument if text, textarea, password, select, or variations of.
	// Just add to existing settings args array if needed.
	if ( in_array( $option['type'], array( 'text', 'select', 'textarea', 'password', 'number' ) ) ) {
		$settings_args = array_merge( $settings_args, array( 'label_for' => 'gce_settings_' . $section . '[' . $option['id'] . ']' ) );
	}

	return $settings_args;
}

/*
 * Single checkbox callback function
 * 
 * @since 2.0.0
 * 
 */
function gce_checkbox_callback( $args ) {
	global $gce_options;

	$checked = isset( $gce_options[$args['id']] ) ? checked( 1, $gce_options[$args['id']], false ) : '';
	$html = "\n" . '<input type="checkbox" id="gce_settings_' . $args['section'] . '[' . $args['id'] . ']" name="gce_settings_' . $args['section'] . '[' . $args['id'] . ']" value="1" ' . $checked . '/>' . "\n";

	// Render description text directly to the right in a label if it exists.
	if ( ! empty( $args['desc'] ) )
		$html .= '<label for="gce_settings_' . $args['section'] . '[' . $args['id'] . ']"> '  . $args['desc'] . '</label>' . "\n";

	echo $html;
}

/*
 * Function we can use to sanitize the input data and return it when saving options
 * 
 * @since 2.0.0
 * 
 */
function gce_settings_sanitize( $input ) {
	//add_settings_error( 'gce-notices', '', '', '' );
	return $input;
}

/*
 *  Default callback function if correct one does not exist
 * 
 * @since 2.0.0
 * 
 */
function gce_missing_callback( $args ) {
	printf( __( 'The callback function used for the <strong>%s</strong> setting is missing.', 'gce' ), $args['id'] );
}

/*
 * Function used to return an array of all of the plugin settings
 * 
 * @since 2.0.0
 * 
 */
function gce_get_settings() {

	// Set default settings
	// If this is the first time running we need to set the defaults
	if ( ! get_option( 'gce_upgrade_has_run' ) ) {
		
		$general = get_option( 'gce_settings_general' );
		
		$general['save_settings']      = 1;
		
		update_option( 'gce_settings_general', $general );
	}
	
	$general_settings = is_array( get_option( 'gce_settings_general' ) ) ? get_option( 'gce_settings_general' )  : array();

	return $general_settings;
}