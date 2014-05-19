<?php 
/*
Plugin Name: Private BP Pages
Plugin URI: http://bphelpblog.wordpress.com/
Description: This plugin will make all BuddyPress/bbPress pages private while leaving 
your WordPress pages public. 
Blocks BP RSS feeds to logged out visitors.
Version: 1.3
Requires at least: WordPress 3.2.1
Tested up to: 3.6.1
License: GNU/GPL 2
Author: bphelp
Author URI: http://bphelpblog.wordpress.com/
*/

/*** Make sure BuddyPress is loaded ********************************/
function bphelp_private_bp_pages_check() {
    if ( !class_exists( 'BuddyPress' ) ) {
	add_action( 'admin_notices', 'private_bp_pages_install_buddypress_notice' );
    }
}
add_action('plugins_loaded', 'bphelp_private_bp_pages_check', 999);

function private_bp_pages_install_buddypress_notice() {
	echo '<div id="message" class="error fade"><p style="line-height: 150%">';
	_e('<strong>Private BP Pages</strong></a> requires the BuddyPress plugin to work. Please <a href="http://buddypress.org/download">install BuddyPress</a> first, or <a href="plugins.php">deactivate Private BP Pages</a>.');
	echo '</p></div>';
}

function private_bp_pages_init() {
	require( dirname( __FILE__ ) . '/private-bp-pages.php' );
}
add_action( 'bp_include', 'private_bp_pages_init' );
?>