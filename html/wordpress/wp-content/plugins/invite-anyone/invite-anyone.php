<?php
/*
Plugin Name: Invite Anyone
Plugin URI: http://teleogistic.net/code/buddypress/invite-anyone/
Description: Allows group admins to invite any member of their BuddyPress community to a group or to the site
Version: 1.2.1
Author: Boone Gorges
Author URI: http://boone.gorg.es
*/
define( 'BP_INVITE_ANYONE_VER', '1.2.1' );
define( 'BP_INVITE_ANYONE_DB_VER', '1.2.1' );

if ( !defined( 'BP_INVITE_ANYONE_SLUG' ) )
	define( 'BP_INVITE_ANYONE_SLUG', 'invite-anyone' );

register_activation_hook( __FILE__, 'invite_anyone_activation' );

/* Only load the BuddyPress plugin functions if BuddyPress is loaded and initialized. */
function invite_anyone_init() {

	require( dirname( __FILE__ ) . '/functions.php' );

	if ( function_exists( 'bp_is_active' ) ) {
		if ( bp_is_active( 'groups' ) )
			require( dirname( __FILE__ ) . '/group-invites/group-invites.php' );
	} else if ( function_exists( 'groups_install' ) ) {
		require( dirname( __FILE__ ) . '/group-invites/group-invites.php' );
	}

	require( dirname( __FILE__ ) . '/by-email/by-email.php' );

	if ( is_admin() )
		require( dirname( __FILE__ ) . '/admin/admin-panel.php' );
}
add_action( 'bp_include', 'invite_anyone_init' );

function invite_anyone_locale_init () {
	$plugin_dir = basename(dirname(__FILE__));
	$locale = get_locale();
	$mofile = WP_PLUGIN_DIR . "/invite-anyone/languages/invite-anyone-$locale.mo";

      if ( file_exists( $mofile ) )
      		load_textdomain( 'bp-invite-anyone', $mofile );
}
add_action ('plugins_loaded', 'invite_anyone_locale_init');

function invite_anyone_activation() {
	if ( !$iaoptions = get_option( 'invite_anyone' ) )
		$iaoptions = array();

	if ( !$iaoptions['max_invites'] )
		$iaoptions['max_invites'] = 5;

	if ( !$iaoptions['allow_email_invitations'] )
		$iaoptions['allow_email_invitations'] = 'all';

	if ( !$iaoptions['message_is_customizable'] )
		$iaoptions['message_is_customizable'] = 'yes';

	if ( !$iaoptions['subject_is_customizable'] )
		$iaoptions['subject_is_customizable'] = 'no';

	if ( !$iaoptions['can_send_group_invites_email'] )
		$iaoptions['can_send_group_invites_email'] = 'yes';

	if ( !$iaoptions['bypass_registration_lock'] )
		$iaoptions['bypass_registration_lock'] = 'yes';

	$iaoptions['version'] = BP_INVITE_ANYONE_VER;

	update_option( 'invite_anyone', $iaoptions );
}

?>
