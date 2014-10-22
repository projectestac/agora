<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$general = get_option( 'gce_settings_general' );

// If this is empty then it means it is unchecked and we should delete everything
if ( empty( $general['save_settings'] ) ) {
	
	/*** VERSION 2.0.0 GCE OPTIONS ***/
	
	// Remove CPTs and transients
	$feeds = get_posts( array( 
		'post_type' => 'gce_feed',
		'post_status' => array( 
			'any',
			'trash',
			'auto-draft'
		)
	));

	foreach( $feeds as $f ) {
		// delete the transient while we have the post ID available
		delete_transient( 'gce_feed_' . $f->ID );

		// Now delete the post
		wp_delete_post( $f->ID, true );
	}

	// Remove all post meta
	delete_post_meta_by_key( 'gce_feed_url' );
	delete_post_meta_by_key( 'gce_retrieve_from' );
	delete_post_meta_by_key( 'gce_retrieve_until' );
	delete_post_meta_by_key( 'gce_retrieve_max' );
	delete_post_meta_by_key( 'gce_date_format' );
	delete_post_meta_by_key( 'gce_time_format' );
	delete_post_meta_by_key( 'gce_cache' );
	delete_post_meta_by_key( 'gce_multi_day_events' );
	delete_post_meta_by_key( 'gce_display_mode' );
	delete_post_meta_by_key( 'gce_custom_from' );
	delete_post_meta_by_key( 'gce_custom_until' );
	delete_post_meta_by_key( 'gce_paging' );
	delete_post_meta_by_key( 'gce_list_max_num' );
	delete_post_meta_by_key( 'gce_list_max_length' );
	delete_post_meta_by_key( 'gce_list_start_offset_num' );
	delete_post_meta_by_key( 'gce_list_start_offset_direction' );

	// Remove options
	delete_option( 'gce_upgrade_has_run' );
	delete_option( 'gce_version' );
	delete_option( 'gce_settings_general' );
	delete_option( 'gce_cpt_setup' );

	// Remove widgets
	delete_option( 'widget_gce_widget' );
	
	
	/*** OLD GCE VERSION OPTIONS ***/
	
	delete_option( 'gce_options' );
	delete_option( 'gce_general' );
	delete_option( 'gce_clear_old_transients' );
	delete_option( 'gce_show_upgrade_notice' );
}
