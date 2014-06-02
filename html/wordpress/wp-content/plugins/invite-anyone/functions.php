<?php

function invite_anyone_options() {
	global $iaoptions;

	// We set our own options cache because of some stupid limitations in the way that page
	// loads work
	if ( !empty( $iaoptions ) ) {
		$options = $iaoptions;
	} else {
		if ( function_exists( 'bp_update_option' ) ) {
			$options = bp_get_option( 'invite_anyone' );
		} else {
			$options = get_option( 'invite_anyone' );
		}
	}

	if ( !$options )
		$options = array();

	$defaults_array = array(
		'max_invites'                    => 5,
		'allow_email_invitations'        => 'all',
		'message_is_customizable'        => 'yes',
		'subject_is_customizable'        => 'no',
		'can_send_group_invites_email'   => 'yes',
		'bypass_registration_lock'       => 'yes',
		'email_visibility_toggle'        => 'nolimit',
		'email_since_toggle'             => 'no',
		'days_since'                     => 0,
		'email_role_toggle'              => 'no',
		'minimum_role'                   => 'subscriber',
		'email_blacklist_toggle'         => 'no',
		'email_blacklist'                => '',
		'group_invites_can_admin'        => 'anyone',
		'group_invites_can_group_admin'  => 'anyone',
		'group_invites_can_group_mod'    => 'anyone',
		'group_invites_can_group_member' => 'anyone',
		'group_invites_enable_create_step' => 'yes',
		'cloudsponge_enabled'            => 'off',
		'email_limit_invites_toggle'     => 'no',
		'limit_invites_per_user'         => 10
	);

	foreach ( $defaults_array as $key => $value ) {
		if ( !isset( $options[$key] ) )
			$options[$key] = $value;
	}

	$iaoptions = $options;

	return apply_filters( 'invite_anyone_options', $options );
}
