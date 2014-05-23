<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * bp_like_get_settings()
 *
 * Returns settings from the database
 *
 */
function bp_like_get_settings( $option = false ) {

    $settings = get_site_option( 'bp_like_settings' );

    if ( !$option ) {
        return $settings;
    } else {
        return $settings[$option];
    }
}
