<?php

/**
 * Abstraction function for BP < 1.5
 *
 * These 1.5-specific functions are loaded when the current version of BP is less than 1.5. This
 * file enables us to use BP 1.5 functions on earlier versions.
 */

if ( !function_exists( 'bp_is_group' ) ) :
	function bp_is_group() {
		global $bp;

		return !empty( $bp->groups->current_group->id );
	}
endif;

if ( !function_exists( 'bp_is_groups_component' ) ) :
	function bp_is_groups_component() {
		global $bp;

		$slug = isset( $bp->groups->root_slug ) ? $bp->groups->root_slug : $bp->groups->slug;

		$is_groups_component = isset( $bp->current_component ) && $slug == $bp->current_component;

		return $is_groups_component;
	}
endif;

if ( !function_exists( 'bp_is_action_variable' ) ) :
	function bp_is_action_variable( $value, $position = false ) {
		global $bp;

		if ( false === $position ) {
			$is_action_variable = !empty( $bp->action_variables ) && in_array( $value, $bp->action_variables );
		} else {
			$is_action_variable = !empty( $bp->action_variables ) && isset( $bp->action_variables[$position] ) && $value == $bp->action_variables[$position];
		}

		return apply_filters( 'bp_is_action_variable', $is_action_variable );
	}
endif;

if ( !function_exists( 'bp_is_current_action' ) ) :
	function bp_is_current_action( $action ) {
		global $bp;

		return apply_filters( 'bp_is_current_action', $action == $bp->current_action );
	}
endif;

if ( !function_exists( 'bp_action_variable' ) ) :
	function bp_action_variable( $position = 0 ) {
		global $bp;

		$action_variables = isset( $bp->action_variables ) ? $bp->action_variables : array();
		$action_variable  = isset( $action_variables[$position] ) ? $action_variables[$position] : false;

		return apply_filters( 'bp_action_variable', $action_variable, $position );
	}
endif;

if ( !function_exists( 'bp_get_groups_root_slug' ) ) :
	function bp_get_groups_root_slug() {
		global $bp;
		return apply_filters( 'bp_get_groups_root_slug', $bp->groups->slug );
	}
endif;

if ( !function_exists( 'bp_get_groups_action_link' ) ) :
	function bp_get_groups_action_link( $action = '', $query_args = '', $nonce = false ) {
		global $bp;

		// Must be displayed user
		if ( empty( $bp->groups->current_group->id ) )
			return;

		// Append $action to $url if there is no $type
		if ( !empty( $action ) )
			$url = bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/' . $bp->groups->current_group->slug . '/' . $action;
		else
			$url = bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/' . $bp->groups->current_group->slug;

		// Add a slash at the end of our user url
		$url = trailingslashit( $url );

		// Add possible query arg
		if ( !empty( $query_args ) && is_array( $query_args ) )
			$url = add_query_arg( $query_args, $url );

		// To nonce, or not to nonce...
		if ( true === $nonce )
			$url = wp_nonce_url( $url );
		elseif ( is_string( $nonce ) )
			$url = wp_nonce_url( $url, $nonce );

		// Return the url, if there is one
		if ( !empty( $url ) )
			return $url;
	}
endif;

if ( !function_exists( 'groups_get_current_group' ) ) :
	function groups_get_current_group() {
		global $bp;

		$current_group = isset( $bp->groups->current_group ) ? $bp->groups->current_group : false;

		return apply_filters( 'groups_get_current_group', $current_group );
	}
endif;

if ( !function_exists( 'bp_get_current_group_name' ) ) :
	function bp_get_current_group_name() {
		global $bp;

		$name = apply_filters( 'bp_get_group_name', $bp->groups->current_group->name );
		return apply_filters( 'bp_get_current_group_name', $name );
	}
endif;

if ( !function_exists( 'bp_get_current_group_id' ) ) :
	function bp_get_current_group_id() {
		$current_group = groups_get_current_group();

		$current_group_id = isset( $current_group->id ) ? (int)$current_group->id : 0;

		return apply_filters( 'bp_get_current_group_id', $current_group_id, $current_group );
	}
endif;

if ( !function_exists( 'bp_get_settings_slug' ) ) :
	function bp_get_settings_slug() {
		global $bp;
		return apply_filters( 'bp_get_settings_slug', $bp->settings->slug );
	}
endif;

if ( !function_exists( 'bp_actions' ) ) :
	function bp_actions() {
		do_action( 'bp_actions' );
	}
	add_action( 'wp', 'bp_actions', 2 );
endif;


if ( !function_exists( 'bp_screens' ) ) :
	function bp_screens() {
		do_action( 'bp_screens' );
	}
	add_action( 'wp', 'bp_screens', 3 );
endif;

if ( ! function_exists( 'bp_core_admin_hook' ) ) :
	// This is a bit imprecise. Won't work properly when BP activated on
	// a single site in a network
	function bp_core_admin_hook() {
		if ( is_multisite() ) {
			$retval = defined( 'BP_ENABLE_MULTIBLOG' ) && BP_ENABLE_MULTIBLOG ? 'admin_menu' : 'network_admin_menu';
		} else {
			$retval = 'network_admin_menu';
		}

		return $retval;
	}
endif;

if ( ! function_exists( 'bp_is_username_compatibility_mode' ) ) :
	function bp_is_username_compatibility_mode() {
		return apply_filters( 'bp_is_username_compatibility_mode', defined( 'BP_ENABLE_USERNAME_COMPATIBILITY_MODE' ) && BP_ENABLE_USERNAME_COMPATIBILITY_MODE );
	}
endif;


if ( ! function_exists( 'bp_get_members_root_slug' ) ) :
	function bp_get_members_root_slug() {
		return constant( 'BP_MEMBERS_SLUG' );
	}
endif;

if ( ! function_exists( 'bp_get_user_meta_key' ) ) :
	function bp_get_user_meta_key( $key = false ) {
		return apply_filters( 'bp_get_user_meta_key', $key );
	}
endif;

if ( ! function_exists( 'bp_get_user_meta' ) ) :
	function bp_get_user_meta( $user_id, $key, $single = false ) {
		return get_user_meta( $user_id, bp_get_user_meta_key( $key ), $single );
	}
endif;

if ( ! function_exists( 'bp_update_user_meta' ) ) :
	function bp_update_user_meta( $user_id, $key, $value, $prev_value = '' ) {
		return update_user_meta( $user_id, bp_get_user_meta_key( $key ), $value, $prev_value );
	}
endif;