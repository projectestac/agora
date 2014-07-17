<?php
/**
 * Scripts
 * WordPress will add these scripts to the theme
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/wp_register_script
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @see wp_register_script
 * @see wp_enqueue_script
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Reactor Scripts
 *
 * @since 1.0.0
 */
add_action('wp_enqueue_scripts', 'reactor_register_scripts', 1);
add_action('wp_enqueue_scripts', 'reactor_enqueue_scripts');
 
function reactor_register_scripts() {
	// register scripts
	//wp_register_script('zepto-js', get_template_directory_uri() . '/library/js/vendor/zepto.js', array(), false, false);
	wp_register_script('modernizr-js', get_template_directory_uri() . '/library/js/vendor/custom.modernizr.js', array(), false, false);
	wp_register_script('foundation-js', get_template_directory_uri() . '/library/js/foundation.min.js', array(), false, true);
	wp_register_script('reactor-js', get_template_directory_uri() . '/library/js/reactor.js', array(), false, true);
	wp_register_script('mixitup-js', get_template_directory_uri() . '/library/js/mixitup.min.js', array(), false, true);
}

function reactor_enqueue_scripts() {
	if ( !is_admin() ) { 
		// enqueue scripts
		wp_enqueue_script('jquery');
		//wp_enqueue_script('zepto-js');
		wp_enqueue_script('modernizr-js');
		wp_enqueue_script('foundation-js');
		wp_enqueue_script('mixitup-js');
		wp_enqueue_script('reactor-js');

		// comment reply script for threaded comments
		if ( is_singular() && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script('comment-reply'); 
		}
	}
}
