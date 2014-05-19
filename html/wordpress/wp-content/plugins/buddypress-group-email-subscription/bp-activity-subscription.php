<?php
/*
Plugin Name: BuddyPress Group Email Subscription
Plugin URI: http://wordpress.org/extend/plugins/buddypress-group-email-subscription/
Description: Allows group members to receive email notifications for group activity and forum posts instantly or as daily digest or weekly summary.
Author: Deryk Wenaus, boonebgorges, r-a-y
Revision Date: July 24, 2013
Version: 3.4
*/

/**
 * Main loader for the plugin.
 *
 * This function is hooked to bp_include, which is the recommended method for loading BP plugins
 * since BP 1.2.5 or so. When this function is loaded properly, it will unhook
 * activitysub_load_buddypress(). If bp_include is not fired (because you are running a legacy
 * version of BP), the legacy function will load the plugin normally.
 */
function ass_loader() {
	if ( bp_is_active( 'groups' ) && bp_is_active( 'activity' ) ) {
		require_once( dirname( __FILE__ ) . '/bp-activity-subscription-main.php' );
	}

	remove_action( 'plugins_loaded', 'activitysub_load_buddypress', 11 );
}
add_action( 'bp_include', 'ass_loader' );

/**
 * Legacy loader for BP < 1.2
 *
 * This function will be unhooked by ass_loader() when possible
 */
function activitysub_load_buddypress() {
	global $ass_activities;
	if ( function_exists( 'bp_core_setup_globals' ) ) {
		// Don't load the plugin if activity and groups are not both active
		if ( function_exists( 'bp_is_active' ) && ( !bp_is_active( 'groups' ) || !bp_is_active( 'activity' ) ) )
			return false;

		require_once ('bp-activity-subscription-main.php');
		return true;
	}
	/* Get the list of active sitewide plugins */
	$active_sitewide_plugins = maybe_unserialize( get_site_option( 'active_sitewide_plugins' ) );

	if ( !isset( $active_sidewide_plugins['buddypress/bp-loader.php'] ) )
		return false;

	if ( isset( $active_sidewide_plugins['buddypress/bp-loader.php'] ) && !function_exists( 'bp_core_setup_globals' ) ) {
		require_once( WP_PLUGIN_DIR . '/buddypress/bp-loader.php' );
		// Don't load the plugin if activity and groups are not both active
		if ( function_exists( 'bp_is_active' ) && ( !bp_is_active( 'groups' ) || !bp_is_active( 'activity' ) ) )
			return false;

		require_once ('bp-activity-subscription-main.php');
		return true;
	}

	return false;
}
add_action( 'plugins_loaded', 'activitysub_load_buddypress', 11 );


function activitysub_textdomain() {
	load_plugin_textdomain( 'bp-ass', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'activitysub_textdomain' );


function activitysub_setup_digest_defaults() {
	require_once( WP_PLUGIN_DIR.'/buddypress-group-email-subscription/bp-activity-subscription-digest.php' );
	ass_set_daily_digest_time( '05', '00' );
	ass_set_weekly_digest_time( '4' );
}
register_activation_hook( __FILE__, 'activitysub_setup_digest_defaults' );

function activitysub_unset_digests() {
	wp_clear_scheduled_hook( 'ass_digest_event' );
	wp_clear_scheduled_hook( 'ass_digest_event_weekly' );
}
register_deactivation_hook( __FILE__, 'activitysub_unset_digests' );


?>
