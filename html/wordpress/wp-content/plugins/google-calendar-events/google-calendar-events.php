<?php
/**
 * Google Calendar Events
 *
 * @package         GCE
 * @author          Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license         GPL-2.0+
 * @link            http://philderksen.com
 * @copyright       2014 Phil Derksen
 *
 * @wordpress-plugin
 * Plugin Name:     Google Calendar Events
 * Plugin URI:      https://github.com/pderksen/WP-Google-Calendar-Events
 * Description:     Parses Google Calendar feeds and displays the events as a calendar grid or list on a page, post or widget.
 * Version:         2.0.3.1
 * Author:          Phil Derksen
 * Author URI:      http://philderksen.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     gce
 * Domain Path:     /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * Include the main plugin file
 *
 * @since 2.0.0
 */
require_once( 'class-google-calendar-events.php' );

/**
 * Define constant pointing to this file
 * 
 * @since 2.0.0
 */
if( ! defined( 'GCE_MAIN_FILE' ) ) {
	define( 'GCE_MAIN_FILE', __FILE__ );
}

/*
 * Get instance of our plugin
 * 
 * @since 2.0.0
 */
add_action( 'plugins_loaded', array( 'Google_Calendar_Events', 'get_instance' ) );

/*
 * If we are in admin then load the Admin class
 * 
 * @since 2.0.0
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once( 'class-google-calendar-events-admin.php' );
	add_action( 'plugins_loaded', array( 'Google_Calendar_Events_Admin', 'get_instance' ) );
}
