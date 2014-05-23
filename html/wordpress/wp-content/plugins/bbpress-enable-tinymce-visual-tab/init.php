<?php
/**
 * Plugin Name: bbPress Enable TinyMCE Visual Tab
 * Plugin URI:  http://wordpress.org/extend/plugins/bbpress-enable-tinymce-visual-tab/
 * Description: This plugin activates the visual tab for the bbPress TinyMCE editor and provides a few other options.
 * Version:     1.0.1
 * Author:      Jared Atchison
 * Author URI:  http://jaredatchison.com 
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author     Jared Atchison
 * @version    1.0.1
 * @package    bbpTinymceVisualTab
 * @copyright  Copyright (c) 2013, Jared Atchison
 * @link       http://jaredatchison.com
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

final class ja_bbp_tinymce_visual_tab {

	static $instance;

	/**
	 * Initialize all the things
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		
		self::$instance =& $this;
		
		// Actions
		add_action( 'admin_init',                           array( $this, 'admin_settings'       ), 15     );
		add_filter( 'plugin_action_links',                  array( $this, 'admin_settings_link'  ), 10, 2  );
		add_action( 'init',                                 array( $this, 'load_textdomain'      )         );

		// Filters
		add_filter( 'bbp_after_get_the_content_parse_args', array( $this, 'enable_visual_editor' )         );
		
	}

	/**
	 * Add Settings link to plugins page
	 *
	 * @since 1.0.0
	 * @param array $links
	 * @param string $file
	 * @return array Links
	 */
	public function admin_settings_link( $links, $file ) {

		if ( plugin_basename( __FILE__ ) == $file ) {
			$settings_link = '<a href="' . admin_url( 'options-general.php?page=bbpress' ) . '#bbp-tinymce-visual-tab">' . __( 'Settings', 'bbp-tinymce-visual-tab' ) . '</a>';
			array_unshift( $links, $settings_link );
		}

		return $links;
	}

	/**
	 * Admin settings
	 *
	 * @since 1.0.0
	 */
	public function admin_settings() {
		
		// Add option for full editor
		add_settings_field(   'ja_bbpress_tinymce_full', __( 'Fancy editor full', 'bbp-tinymce-visual-tab' ), array( $this, 'admin_tinymce_full_setting' ), 'bbpress', 'bbp_settings_features' );
		
		// Add option for media upload
		add_settings_field(   'ja_bbpress_tinymce_media', __( 'Fancy editor media upload', 'bbp-tinymce-visual-tab' ), array( $this, 'admin_tinymce_media_setting' ), 'bbpress', 'bbp_settings_features' );

		// Register our settings with the bbPress settings page
		register_setting( 'bbpress', 'ja_bbpress_tinymce_full', 'intval' );
		register_setting( 'bbpress', 'ja_bbpress_tinymce_media', 'intval' );
	}

	/**
	 * Add the checkbox field to enable the full TinyMCE editor (not teeny)
	 *
	 * @since 1.0.0
	 */
	public function admin_tinymce_full_setting() {

		$val = get_option( 'ja_bbpress_tinymce_full', 0 );

		echo '<input name="ja_bbpress_tinymce_full" type="checkbox" id="bbp-tinymce-visual-tab" value="1" ' . checked( $val, 1, false ) . '/> ';
		echo '<label for="bbp-tinymce-visual-tab">' . __( 'Enable all default fancy editor buttons, some may not be compatible with bbPress', 'bbp-tinymce-visual-tab' ) . '</label>';
	}

	/**
	 * Add the checkbox field to enable the TinyMCE editor media upload buttons
	 *
	 * @since 1.0.0
	 */
	public function admin_tinymce_media_setting() {

		$val = get_option( 'ja_bbpress_tinymce_media', 0 );

		echo '<input name="ja_bbpress_tinymce_media" type="checkbox" id="bbp-tinymce-media" value="1" ' . checked( $val, 1, false ) . '/> ';
		echo '<label for="bbp-tinymce-media">' . __( 'Enable media upload tab for the fancy editor, <em>only shows for users who can upload files</em>', 'bbp-tinymce-visual-tab' ) . '</label>';
	}

	/**
	 * Load the textdomain so we can support other languages
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'bbp-tinymce-visual-tab', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Filters the bbPress TinyMCE editor
	 *
	 * @since 1.0.0
	 * @param array $args
	 * @return array
	 */
	public function enable_visual_editor( $args = array() ) {

		$args['tinymce'] = true;

		if (  get_option( 'ja_bbpress_tinymce_media' ) == 1 )
			$args['media_buttons'] = true;

		if (  get_option( 'ja_bbpress_tinymce_full' ) == 1 )
			$args['teeny'] = false;	

    	return $args;
	}

}
new ja_bbp_tinymce_visual_tab();