<?php

/*
 * Plugin Name: Widget Visibility Without Jetpack
 * Plugin URI: http://boluda.com
 * Description: Control what pages your widgets appear on. Based on Widget Visibility module, from Jetpack plugin, http://wordpress.org/plugins/jetpack/. Created by Created by Eduardo Larequi, mantained by Joan Boluda
 * Author: Joan Boluda
 * Version: 0.4
 * Author URI: http://boluda.com
 * License: GPL2+
 * Text Domain: jetpack
 * Domain Path: /languages/
*/

load_plugin_textdomain('jetpack', false, basename( dirname( __FILE__ ) ) . '/languages' );

include dirname( __FILE__ ) . "/widget-visibility/widget-conditions.php";
