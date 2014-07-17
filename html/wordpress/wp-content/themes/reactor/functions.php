<?php
/**
 * Reactor Theme Functions
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.1.0
 * @copyright Copyright (c) 2013, Anthony Wilhelm
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

require locate_template('library/reactor.php');
new Reactor();

add_action('after_setup_theme', 'reactor_theme_setup', 10);

function reactor_theme_setup() {

	/**
	 * Reactor features
	 */	
	add_theme_support(
		'reactor-menus',
		array('top-bar-l', 'top-bar-r', 'main-menu', 'side-menu', 'footer-links')
	);
	
	add_theme_support(
		'reactor-sidebars',
		array('primary', 'secondary', 'front-primary', 'front-secondary', 'footer')
	);
	
	add_theme_support(
		'reactor-layouts',
		array('1c', '2c-l', '2c-r', '3c-l', '3c-r', '3c-c')
	);
	
	add_theme_support(
		'reactor-post-types',
		array('slides', 'portfolio')
	);
	
	add_theme_support(
		'reactor-page-templates',
		array('front-page', 'news-page', 'portfolio', 'contact')
	);
	
	add_theme_support('reactor-backgrounds');
	
	add_theme_support('reactor-fonts');

	add_theme_support('reactor-breadcrumbs');
	
	add_theme_support('reactor-page-links');
	
	add_theme_support('reactor-post-meta');
	
	add_theme_support('reactor-shortcodes');
	
	add_theme_support('reactor-custom-login');
	
	add_theme_support('reactor-taxonomy-subnav');
	
	add_theme_support('reactor-tumblog-icons');
	
	add_theme_support('reactor-translation');
	
	/**
	 * WordPress features
	 */	
	add_theme_support('menus');
	
	// different post formats for tumblog style posting
	add_theme_support(
		'post-formats',
		array('aside', 'gallery','link', 'image', 'quote', 'status', 'video', 'audio', 'chat')
	);
	
   /**
    * 3rd Party Supprt
    */
	
	// WooCommerce
    // Necessary hooks are removed in the Reactor construct and added in
    // library/inc/content/content-pages.php
	add_theme_support( 'woocommerce' );
	
	add_theme_support('post-thumbnails');
	// thumbnail sizes - you can add more
	add_image_size('thumb-300', 300, 250, true);
	add_image_size('thumb-200', 200, 150, true);
	
	// these are not needed
	// add_theme_support('custom-background');
	// add_theme_support('custom-header');
	
	// RSS feed links to header.php for posts and comments.
	add_theme_support('automatic-feed-links');
	
	// editor stylesheet for TinyMCE
	add_editor_style('/library/css/editor.css');
	
	if ( !isset( $content_width ) ) $content_width = 1000;
	
}
