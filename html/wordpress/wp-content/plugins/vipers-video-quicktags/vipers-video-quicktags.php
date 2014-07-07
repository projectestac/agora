<?php /*

**************************************************************************

Plugin Name:  Viper's Video Quicktags
Plugin URI:   http://www.viper007bond.com/wordpress-plugins/vipers-video-quicktags/
Description:  Easily embed videos from various video websites such as YouTube, DailyMotion, and Vimeo into your posts.
Version:      6.5.2
Author:       Viper007Bond
Author URI:   http://www.viper007bond.com/

**************************************************************************

Copyright (C) 2006-2012 Viper007Bond

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/

class VipersVideoQuicktags {
	var $version = '6.5.2';
	var $settings = array();
	var $defaultsettings = array();
	var $swfobjects = array();
	var $usedids = array();
	var $standardcss;
	var $cssalignments;
	var $flvskins = array();
	var $wpheadrun = FALSE;
	var $adminwarned = FALSE;
	var $customfeedtext;
	var $buttons = array();

	// Class initialization
	function VipersVideoQuicktags() {
		global $wp_version, $wpmu_version, $shortcode_tags, $wp_scripts;

		// This version of VVQ requires WordPress 2.8+
		if ( !function_exists('esc_attr') ) {
			load_plugin_textdomain( 'vipers-video-quicktags', '/wp-content/plugins/vipers-video-quicktags/localization' ); // Old format
			if ( isset( $_GET['activate'] ) ) {
				wp_redirect( 'plugins.php?deactivate=true' );
				exit();
			} else {
				// Replicate deactivate_plugins()
				$current = get_option('active_plugins');
				$plugins = array( 'vipers-video-quicktags/vipers-video-quicktags.php', 'vipers-video-quicktags.php' );
				foreach ( $plugins as $plugin ) {
					if( !in_array( $plugin, $current ) ) continue;
					array_splice( $current, array_search( $plugin, $current ), 1 ); // Fixed Array-fu!
				}
				update_option('active_plugins', $current);

				add_action( 'admin_notices', array(&$this, 'WPVersionTooOld') );

				return;
			}
		}

		// Redirect the old settings page to the new one for any old links
		if ( is_admin() && isset($_GET['page']) && 'vipers-video-quicktags.php' == $_GET['page'] ) {
			wp_redirect( admin_url( 'options-general.php?page=vipers-video-quicktags' ) );
			exit();
		}

		// For debugging (this is limited to localhost installs since it's not nonced)
		if ( !empty($_GET['resetalloptions']) && 'localhost' == $_SERVER['HTTP_HOST'] && is_admin() && 'vipers-video-quicktags' == $_GET['page'] ) {
			update_option( 'vvq_options', array() );
			wp_redirect( admin_url( 'options-general.php?page=vipers-video-quicktags&defaults=true' ) );
			exit();
		}

		// Load up the localization file if we're using WordPress in a different language
		// Place it in this plugin's "localization" folder and name it "vipers-video-quicktags-[value in wp-config].mo"
		load_plugin_textdomain( 'vipers-video-quicktags', FALSE, '/vipers-video-quicktags/localization' );

		// Create default settings array
		$this->defaultsettings = apply_filters( 'vvq_defaultsettings', array(
			'youtube' => array(
				'button'          => 1,
				'width'           => 425,
				'height'          => 344,
				'color1'          => '#666666',
				'color2'          => '#EFEFEF',
				'border'          => 0,
				'rel'             => 0,
				'fs'              => 1,
				'autoplay'        => 0,
				'loop'            => 0,
				'showsearch'      => 0,
				'showinfo'        => 0,
				'hd'              => 0,
				'previewurl'      => 'http://www.youtube.com/watch?v=zlfKdbWwruY',
				'aspectratio'     => 1,
			),
			'googlevideo' => array(
				'button'          => 0,
				'width'           => 400,
				'height'          => 326,
				'autoplay'        => 0,
				'fs'              => 1,
				'previewurl'      => 'http://video.google.com/videoplay?docid=-6006084025483872237',
				'aspectratio'     => 1,
			),
			'vimeo' => array(
				'button'          => 1,
				'width'           => 400,
				'height'          => 300,
				'color'           => '#00ADEF',
				'portrait'        => 0,
				'title'           => 1,
				'byline'          => 1,
				'fullscreen'      => 1,
				'previewurl'      => 'http://www.vimeo.com/240975',
				'aspectratio'     => 1,
			),
			'dailymotion' => array(
				'button'          => 1,
				'width'           => 480,
				'height'          => 221,
				'backgroundcolor' => '#DEDEDE',
				'glowcolor'       => '#FFFFFF',
				'foregroundcolor' => '#333333',
				'seekbarcolor'    => '#FFC300',
				'autoplay'        => 0,
				'related'         => 0,
				'previewurl'      => 'http://www.dailymotion.com/video/x4cqyl_ferrari-p45-owner-exclusive-intervi_auto',
				'aspectratio'     => 1,
			),
			'veoh' => array(
				'button'          => 1,
				'width'           => 540,
				'height'          => 438,
				'aspectratio'     => 1,
			),
			'viddler' => array(
				'button'          => 0,
			),
			'metacafe' => array(
				'button'          => 0,
				'width'           => 400,
				'height'          => 345,
				'aspectratio'     => 1,
			),
			'bliptv' => array(
				'button'          => 1,
				'width'           => 400,
				'height'          => 330,
				'aspectratio'     => 1,
			),
			'wpvideo' => array(
				'button'          => 0,
				'width'           => 605,
				'height'          => 452,
				'aspectratio'     => 1,
			),
			'flickrvideo' => array(
				'button'          => 0,
				'width'           => 400,
				'height'          => 300,
				'aspectratio'     => 1,
			),
			'spike' => array(
				'button'          => 0,
				'width'           => 448,
				'height'          => 365,
				'aspectratio'     => 1,
			),
			'myspace' => array(
				'button'          => 0,
				'width'           => 425,
				'height'          => 360,
				'aspectratio'     => 1,
			),
			'flv' => array(
				'button'          => 0, // Agree to license
				'width'           => 400,
				'height'          => 320,
				'skin'            => '',
				'customcolors'    => 0,
				'backcolor'       => '#FFFFFF',
				'frontcolor'      => '#000000',
				'lightcolor'      => '#000000',
				'screencolor'     => '#000000',
				'flashvars'       => '',
				'previewurl'      => 'http://gdata.youtube.com/feeds/api/standardfeeds/recently_featured',
			),
			'quicktime' => array(
				'button'          => 0, // Marginal support, plugin focus is Flash
				'width'           => 400,
				'height'          => 300,
				'dynamicload'     => 1,
			),
			'videofile' => array(
				'button'          => 0, // Shit support
				'width'           => 400,
				'height'          => 300,
				'usewmp'          => 1,
			),
			'flash' => array(
				'width'           => 400,
				'height'          => 300,
			),
			'alignment'           => 'center',
			'tinymceline'         => 1,
			'customcss'           => '',
			'customfeedtext'      => '',
		) );
		// Default customfeedtext. Change it via the settings page.
		$this->customfeedtext = '<em>' . __( 'Click here to view the embedded video.', 'vipers-video-quicktags' ) . '</em>';

		$usersettings = (array) get_option('vvq_options');

		// Upgrade settings
		$upgrade = false;
		if ( empty($usersettings['version']) )
			$usersettings['version'] = '1.0.0';
		if ( -1 == version_compare( $usersettings['version'], '6.0.0' ) ) {
			// Reset buttons
			foreach ( $this->defaultsettings as $type => $setting ) {
				if ( !is_array($this->defaultsettings[$type]) ) continue;
				if ( isset($usersettings[$type]['button']) )
					unset($usersettings[$type]['button']);
			}
			$upgrade = true;
		}
		if ( -1 == version_compare( $usersettings['version'], '6.1.0' ) ) {
			// Custom FLV colors
			$colors = array( 'backcolor', 'frontcolor', 'lightcolor', 'screencolor' );
			foreach ( $colors as $color ) {
				if ( !empty($usersettings['flv'][$color]) && $usersettings['flv'][$color] != $this->defaultsettings['flv'][$color] )
					$usersettings['flv']['customcolors'] = 1;
			}
			$upgrade = true;
		}
		if ( -1 == version_compare( $usersettings['version'], '6.1.23' ) ) {
			// Change default YouTube preview video to one supporting HD (rather than only HQ)
			if ( !empty($usersettings['youtube']) && !empty($usersettings['youtube']['previewurl']) && 'http://www.youtube.com/watch?v=stdJd598Dtg' === $usersettings['youtube']['previewurl'] )
				$usersettings['youtube']['previewurl'] = $this->defaultsettings['youtube']['previewurl'];
			$upgrade = true;
		}
		if ( -1 == version_compare( $usersettings['version'], '6.2.10' ) ) {
			if ( ! empty( $usersettings['customfeedtext'] ) && ( false !== strpos( $usersettings['customfeedtext'], '<p>' ) || false !== strpos( $usersettings['customfeedtext'], '</p>' ) ) )
				$usersettings['customfeedtext'] = str_replace( array( '<p>', '</p>' ), '', $usersettings['customfeedtext'] );
			$upgrade = true;
		}
		if ( $upgrade ) {
			$usersettings['version'] = $this->version;
			update_option( 'vvq_options', $usersettings );
		}

		// Use the defaults as a base, merge in any user defined changes
		$this->settings = $this->defaultsettings;
		if ( $usersettings !== $this->defaultsettings ) {
			foreach ( (array) $usersettings as $key1 => $value1 ) {
				if ( is_array($value1) ) {
					foreach ( $value1 as $key2 => $value2 ) {
						$this->settings[$key1][$key2] = $value2;
					}
				} else {
					$this->settings[$key1] = $value1;
				}
			}
		}

		// Register general hooks
		add_action( 'admin_menu', array(&$this, 'RegisterSettingsPage') );
		add_filter( 'plugin_action_links', array(&$this, 'AddPluginActionLink'), 10, 2 );
		add_action( 'admin_post_vvqsettings', array(&$this, 'POSTHandler') );
		add_action( 'wp_head', array(&$this, 'Head') );
		add_action( 'admin_head', array(&$this, 'Head') );
		add_action( 'wp_print_footer_scripts', array(&$this, 'maybe_enqueue_swfobject'), 5 );
		add_action( 'wp_footer', array(&$this, 'SWFObjectCalls'), 50 );
		add_filter( 'widget_text', 'do_shortcode', 11 ); // Videos in the text widget

		// Hide the donate button on WPMU installs as admins probably don't want it there
		if ( !empty($wpmu_version) ) add_filter( 'vvq_donatebutton', array(&$this, 'ReturnFalse'), 5 );

		// Register shortcodes
		add_shortcode( 'youtube', array(&$this, 'shortcode_youtube') );
		add_shortcode( 'googlevideo', array(&$this, 'shortcode_googlevideo') );
		add_shortcode( 'gvideo', array(&$this, 'shortcode_googlevideo') ); // Not the preferred format
		add_shortcode( 'dailymotion', array(&$this, 'shortcode_dailymotion') );
		add_shortcode( 'vimeo', array(&$this, 'shortcode_vimeo') );
		add_shortcode( 'veoh', array(&$this, 'shortcode_veoh') );
		add_shortcode( 'viddler', array(&$this, 'shortcode_viddler') );
		add_shortcode( 'metacafe', array(&$this, 'shortcode_metacafe') );
		add_shortcode( 'blip.tv', array(&$this, 'shortcode_bliptv') );
		add_shortcode( 'bliptv', array(&$this, 'shortcode_bliptv') ); // Not the preferred format
		add_shortcode( 'flickr video', array(&$this, 'shortcode_flickrvideo') ); // WordPress.com
		add_shortcode( 'flickrvideo', array(&$this, 'shortcode_flickrvideo') ); // Normal format
		add_shortcode( 'ifilm', array(&$this, 'shortcode_ifilm') );
		add_shortcode( 'spike', array(&$this, 'shortcode_ifilm') );
		add_shortcode( 'myspace', array(&$this, 'shortcode_myspace') );
		add_shortcode( 'stage6', array(&$this, 'shortcode_stage6') ); // Stage6 = dead, but we still need to handle it
		add_shortcode( 'flv', array(&$this, 'shortcode_flv') );
		add_shortcode( 'quicktime', array(&$this, 'shortcode_quicktime') );
		add_shortcode( 'flash', array(&$this, 'shortcode_flash') );
		add_shortcode( 'videofile', array(&$this, 'shortcode_videofile') );
		add_shortcode( 'video', array(&$this, 'shortcode_videofile') ); // Legacy
		add_shortcode( 'avi', array(&$this, 'shortcode_videofile') ); // Legacy
		add_shortcode( 'mpeg', array(&$this, 'shortcode_videofile') ); // Legacy
		add_shortcode( 'wmv', array(&$this, 'shortcode_videofile') ); // Legacy

		// Anarchy Media Plugin / Kimili Flash Embed support but only if those plugins aren't enabled
		if ( !class_exists('KimiliFlashEmbed') && !function_exists('kml_flashembed') && !isset($shortcode_tags['kml_flashembed']) )
			add_shortcode( 'kml_flashembed', array(&$this, 'shortcode_flash') );

		// VideoPress support but only if the official plugin isn't installed
		if ( !function_exists('videopress_shortcode') && !isset($shortcode_tags['wpvideo']) )
			add_shortcode( 'wpvideo', array(&$this, 'shortcode_videopress') );

		// Register other scripts and styles
		wp_register_script( 'qtobject', plugins_url( 'resources/qtobject.js', __FILE__ ), array(), '1.0.2' );
		if ( is_admin() ) {
			// Settings page only
			if ( isset($_GET['page']) && 'vipers-video-quicktags' == $_GET['page'] ) {
				add_action( 'admin_head', array(&$this, 'StyleTweaks' ) );

				wp_enqueue_script( 'swfobject' );

				wp_enqueue_script( 'farbtastic' );
				wp_enqueue_style( 'farbtastic' );
			}

			// Editor pages only
			if ( in_array( basename($_SERVER['PHP_SELF']), apply_filters( 'vvq_editor_pages', array('post-new.php', 'page-new.php', 'post.php', 'page.php') ) ) ) {
				add_action( 'admin_footer', array(&$this, 'OutputjQueryDialogDiv') );

				wp_enqueue_script( 'jquery-ui-dialog' );
				wp_enqueue_style( 'wp-jquery-ui-dialog' );

				// Register editor button hooks
				add_filter( 'tiny_mce_version', array(&$this, 'tiny_mce_version') );
				add_filter( 'mce_external_plugins', array(&$this, 'mce_external_plugins') );
				add_action( 'edit_form_advanced', array(&$this, 'AddQuicktagsAndFunctions') );
				add_action( 'edit_page_form', array(&$this, 'AddQuicktagsAndFunctions') );
				if ( 1 == $this->settings['tinymceline'] ) {
					add_filter( 'mce_buttons', array(&$this, 'mce_buttons') );
				} else {
					add_filter( 'mce_buttons_' . $this->settings['tinymceline'], array(&$this, 'mce_buttons') );
				}

				// Adding buttons to the HTML editor in WordPress 3.3+
				if ( version_compare( $wp_version, '3.3', '>=' ) ) {
					add_action( 'admin_footer-post.php', array( &$this, 'quicktag_buttons' ) );
					add_action( 'admin_footer-post-new.php', array( &$this, 'quicktag_buttons' ) );
				}
			}

			// Display a warning if FLV button is showing but player isn't installed
			if ( 1 == $this->settings['flv']['button'] && current_user_can( 'manage_options' ) && ! $this->is_jw_flv_player_installed() ) {
				add_action( 'admin_notices', array( &$this, 'admin_notices_install_jw_player_warning' ) );
			}
		}
		if ( 1 == $this->settings['quicktime']['dynamicload'] )
			add_action( 'wp_head', array(&$this, 'MaybeEnqueueQuicktimeJavascript'), 1 );
		else
			wp_enqueue_script( 'qtobject' );

		// Set up the CSS
		$this->cssalignments = array(
			'left' => 'margin: 10px auto 10px 0;',
			'center' => 'margin: 10px auto;',
			'right' => 'margin: 10px 0 10px auto;',
			'floatleft' => 'float: left;\n	margin: 10px 10px 10px 0;',
			'floatright' => 'float: right;\n	margin: 10px 0 10px 10px;',
		);
		$this->standardcss = '.vvqbox {
	display: block;
	max-width: 100%;
	visibility: visible !important;
	/* alignment CSS placeholder */
}
.vvqbox img {
	max-width: 100%;
	height: 100%;
}
.vvqbox object {
	max-width: 100%;
}';

		$this->flvskins = apply_filters( 'vvq_flvskins', array(
			''               => __('Default', 'vipers-video-quicktags'),
			'3dpixelstyle'   => __('3D Pixel Style', 'vipers-video-quicktags'),
			'atomicred'      => __('Atomic Red', 'vipers-video-quicktags'),
			'bekle'          => __('Bekle (Overlay)', 'vipers-video-quicktags'),
			'bluemetal'      => __('Blue Metal', 'vipers-video-quicktags'),
			'comet'          => __('Comet', 'vipers-video-quicktags'),
			'controlpanel'   => __('Control Panel', 'vipers-video-quicktags'),
			'dangdang'       => __('Dang Dang', 'vipers-video-quicktags'),
			'fashion'        => __('Fashion', 'vipers-video-quicktags'),
			'festival'       => __('Festival', 'vipers-video-quicktags'),
			'grungetape'     => __('Grunge Tape', 'vipers-video-quicktags'),
			'icecreamsneaka' => __('Ice Cream Sneaka', 'vipers-video-quicktags'),
			'kleur'          => __('Kleur', 'vipers-video-quicktags'),
			'magma'          => __('Magma', 'vipers-video-quicktags'),
			'metarby10'      => __('Metarby 10', 'vipers-video-quicktags'),
			'modieus'        => __('Modieus (Stylish)', 'vipers-video-quicktags'),
			'modieus_slim'   => __('Modieus (Stylish) Slim', 'vipers-video-quicktags'),
			'nacht'          => __('Nacht', 'vipers-video-quicktags'),
			'neon'           => __('Neon', 'vipers-video-quicktags'),
			'pearlized'      => __('Pearlized', 'vipers-video-quicktags'),
			'pixelize'       => __('Pixelize', 'vipers-video-quicktags'),
			'playcasso'      => __('Play Casso', 'vipers-video-quicktags'),
			'schoon'         => __('Schoon', 'vipers-video-quicktags'),
			'silverywhite'   => __('Silvery White', 'vipers-video-quicktags'),
			'simple'         => __('Simple', 'vipers-video-quicktags'),
			'snel'           => __('Snel', 'vipers-video-quicktags'),
			'stijl'          => __('Stijl', 'vipers-video-quicktags'),
			'traganja'       => __('Traganja', 'vipers-video-quicktags'),
		) );
	}


	// This function gets called when the minimum WordPress version isn't met
	function WPVersionTooOld() {
		echo '<div class="error"><p>' . sprintf( __( '<strong>Viper\'s Video Quicktags</strong> requires WordPress 2.8 or newer. Please <a href="%1$s">upgrade</a>! By not upgrading, your blog is <a href="%2$s">likely to be hacked</a>.', 'vipers-video-quicktags' ), 'http://codex.wordpress.org/Upgrading_WordPress', 'http://wordpress.org/development/2009/09/keep-wordpress-secure/' ) . "</p></div>\n";
	}


	// Register the settings page that allows plugin configuration
	function RegisterSettingsPage() {
		add_options_page( __("Viper's Video Quicktags Configuration", 'vipers-video-quicktags'), __('Video Quicktags', 'vipers-video-quicktags'), 'manage_options', 'vipers-video-quicktags', array(&$this, 'SettingsPage') );
	}


	// Add a link to the settings page to the plugins list
	function AddPluginActionLink( $links, $file ) {
		static $this_plugin;
		
		if( empty($this_plugin) ) $this_plugin = plugin_basename(__FILE__);

		if ( $file == $this_plugin ) {
			$settings_link = '<a href="' . admin_url( 'options-general.php?page=vipers-video-quicktags' ) . '">' . __('Settings', 'vipers-video-quicktags') . '</a>';
			array_unshift( $links, $settings_link );
		}

		return $links;
	}


	function is_jw_flv_player_installed() {
		return file_exists( WP_CONTENT_DIR . '/jw-flv-player/player.swf' );
	}


	function admin_notices_install_jw_player_warning() {
		global $parent_file;

		add_settings_error( 'vvq_options', 'vvq_jw_flv_player_not_installed', sprintf( __( 'IMPORTANT MESSAGE FROM THE VIPER\'S VIDEO QUICKTAGS PLUGIN: In order for your <code>[flv]</code> video embeds to continue to work, you must manually reinstall the JW FLV Player! Please download <a href="%1$s">this ZIP file</a> and then upload the <code>jw-flv-player</code> folder inside of the ZIP to your <code>wp-content</code> folder (%2$s). For details about this change, please see <a href="%3$s">this blog post</a> on the plugin author\'s website. Or if you just had the button enabled but never actually embeded anything using it, you can uncheck the button checkbox on the <a href="%4$s">settings page</a> to hide this message.', 'a8c-developer' ), 'http://v007.me/jwflvplayer', '<code>' . WP_CONTENT_DIR . '/</code>', 'http://v007.me/9a4', admin_url( 'options-general.php?page=vipers-video-quicktags' ) ) );

		// Avoid a double message
		if ( 'options-general.php' != $parent_file )
			settings_errors( 'vvq_options' );
	}


	// Check the posts to be displayed looking for the QuickTime tag. If found, load the JS script.
	function MaybeEnqueueQuicktimeJavascript() {
		global $wp_query;

		// Abort if no posts (obviously)
		if ( !is_array($wp_query->posts) || empty($wp_query->posts) ) return;

		// Loop through each post looking for the shortcode
		foreach ( $wp_query->posts as $post ) {
			if ( FALSE !== stristr( $post->post_content, '[quicktime') ) {
				wp_enqueue_script( 'qtobject' );
				return;
			}
		}
	}


	// Break the browser cache of TinyMCE
	function tiny_mce_version( $version ) {
		return $version . '-vvq' . $this->version . 'line' . $this->settings['tinymceline'];
	}


	// Load the custom TinyMCE plugin
	function mce_external_plugins( $plugins ) {
		$plugins['vipersvideoquicktags'] = add_query_arg( 'ver', $this->version, plugins_url( 'resources/tinymce3/editor_plugin.js', __FILE__ ) );
		return $plugins;
	}


	// Add the custom TinyMCE buttons
	function mce_buttons( $buttons ) {
		array_push( $buttons, 'vvqYouTube', 'vvqGoogleVideo', 'vvqDailyMotion', 'vvqVimeo', 'vvqVeoh', 'vvqViddler', 'vvqMetacafe', 'vvqBlipTV', 'vvqFlickrVideo', 'vvqSpike', 'vvqMySpace', 'vvqFLV', 'vvqQuicktime', 'vvqVideoFile' );
		return $buttons;
	}


	// Add the old style buttons to the non-TinyMCE editor views and output all of the JS for the button function + dialog box
	function AddQuicktagsAndFunctions() {
		$this->buttons = array(
			'youtube'     => array(
				__('YouTube', 'vipers-video-quicktags'),
				__('Embed a video from YouTube', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.youtube.com/watch?v=stdJd598Dtg',
			),
			'googlevideo' => array(
				__('Google Video', 'vipers-video-quicktags'),
				__('Embed a video from Google Video', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://video.google.com/videoplay?docid=-6006084025483872237',
			),
			'dailymotion' => array(
				__('DailyMotion', 'vipers-video-quicktags'),
				__('Embed a video from DailyMotion', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.dailymotion.com/video/x347lz_bugatti-veyron-407-kmh-la-plus-rapi_shortfilms',
			),
			'vimeo'       => array(
				__('Vimeo', 'vipers-video-quicktags'),
				__('Embed a video from Vimeo', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.vimeo.com/240975',
			),
			'veoh'        => array(
				__('Veoh', 'vipers-video-quicktags'),
				__('Embed a video from Veoh', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.veoh.com/videos/v14185855NK3BNfQa',
			),
			'viddler'     => array(
				__('Viddler', 'vipers-video-quicktags'),
				__('Embed a video from Viddler', 'vipers-video-quicktags'),
				sprintf( __("Please enter the WordPress.com-style embed tag for the Viddler video. See <a href='%s'>Help</a> for details. In the future, you don't need to actually open this window &#8212; you can just paste directly into the editor.", 'vipers-video-quicktags'), admin_url('options-general.php?page=vipers-video-quicktags&amp;tab=help#vvq-viddlerhelp') ),
				'[viddler id=fad7437b&w=437&h=370]',
			),
			'metacafe'    => array(
				__('Metacafe', 'vipers-video-quicktags'),
				__('Embed a video from Metacafe', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.metacafe.com/watch/1609225/truck_tries_to_outrun_train/',
			),
			'bliptv'      => array(
				__('Blip.tv', 'vipers-video-quicktags'),
				__('Embed a video from Blip.tv', 'vipers-video-quicktags'),
				sprintf( __("Please enter the WordPress.com-style embed tag for the Blip.tv video. See <a href='%s'>Help</a> for details. In the future, you don't need to actually open this window &#8212; you can just paste directly into the editor.", 'vipers-video-quicktags'), admin_url('options-general.php?page=vipers-video-quicktags&amp;tab=help#vvq-bliptvhelp') ),
				'[blip.tv ?posts_id=1213119&dest=-1]',
			),
			'flickrvideo' => array(
				__('Flickr Video', 'vipers-video-quicktags'),
				__('Embed a video from Flickr Video', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.flickr.com/photos/michales/2418623193',
			),
			'spike'       => array(
				__('IFILM/Spike', 'vipers-video-quicktags'),
				__('Embed a video from IFILM/Spike.com', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://www.spike.com/video/psychic-cop-shows/2710582',
			),
			'myspace'     => array(
				__('MySpace', 'vipers-video-quicktags'),
				__('Embed a video from MySpace', 'vipers-video-quicktags'),
				__('Please enter the URL at which the video can be viewed.', 'vipers-video-quicktags'),
				'http://vids.myspace.com/index.cfm?fuseaction=vids.individual&videoid=1387215221',
			),
			'flv'         => array(
				__('FLV', 'vipers-video-quicktags'),
				__('Embed a Flash Video (FLV) file', 'vipers-video-quicktags'),
				sprintf( __('Please enter the URL to the %1$s file.', 'vipers-video-quicktags'), __('Flash Video (FLV)', 'vipers-video-quicktags') ),
				'http://yoursite.com/videos/cool-video.flv',
			),
			'quicktime'   => array(
				__('Quicktime', 'vipers-video-quicktags'),
				__('Embed a Quicktime video file', 'vipers-video-quicktags'),
				sprintf( __('Please enter the URL to the %1$s file.', 'vipers-video-quicktags'), __('Quicktime', 'vipers-video-quicktags') ),
				'http://yoursite.com/videos/cool-video.mov',
			),
			'videofile'   => array(
				__('Video File', 'vipers-video-quicktags'),
				__('Embed a generic video file', 'vipers-video-quicktags'),
				sprintf( __('Please enter the URL to the %1$s file.', 'vipers-video-quicktags'), __('generic video', 'vipers-video-quicktags') ),
				'http://yoursite.com/videos/cool-video.avi',
			),
		);

		$buttonshtml = $datajs = '';
		foreach ( $this->buttons as $type => $strings ) {
			// Create the data array
			$datajs .= "	VVQData['$type'] = {\n";
			$datajs .= '		title: "' . $this->esc_js( ucwords( $strings[1] ) ) . '",' . "\n";
			$datajs .= '		instructions: "' . $this->esc_js( $strings[2] ) . '",' . "\n";
			$datajs .= '		example: "' . esc_js( $strings[3] ) . '"';
			if ( !empty($this->settings[$type]['width']) && !empty($this->settings[$type]['height']) ) {
				$datajs .= ",\n		width: " . $this->settings[$type]['width'] . ",\n";
				$datajs .= '		height: ' . $this->settings[$type]['height'];
			}
			$datajs .= "\n	};\n";

			if ( 'flv' == $type && ! $this->is_jw_flv_player_installed() )
				continue;

			// HTML for quicktag button
			if ( 1 == $this->settings[$type]['button'] )
				$buttonshtml .= '<input type="button" class="ed_button" onclick="VVQButtonClick(\'' . $type . '\')" title="' . $strings[1] . '" value="' . $strings[0] . '" />';
		}

		?>
<script type="text/javascript">
// <![CDATA[
	// Video data
	var VVQData = {};
<?php echo $datajs; ?>

<?php
	 	$buttons = array();
		if ( 1 == $this->settings['youtube']['button'] )     $buttons['youtube'] = true;
		if ( 1 == $this->settings['googlevideo']['button'] ) $buttons['googlevideo'] = true;
		if ( 1 == $this->settings['dailymotion']['button'] ) $buttons['dailymotion'] = true;
		if ( 1 == $this->settings['vimeo']['button'] )       $buttons['vimeo'] = true;
		if ( 1 == $this->settings['veoh']['button'] )        $buttons['veoh'] = true;
		if ( 1 == $this->settings['viddler']['button'] )     $buttons['viddler'] = true;
		if ( 1 == $this->settings['metacafe']['button'] )    $buttons['metacafe'] = true;
		if ( 1 == $this->settings['bliptv']['button'] )      $buttons['bliptv'] = true;
		if ( 1 == $this->settings['flickrvideo']['button'] ) $buttons['flickrvideo'] = true;
		if ( 1 == $this->settings['spike']['button'] )       $buttons['spike'] = true;
		if ( 1 == $this->settings['myspace']['button'] )     $buttons['myspace'] = true;
		if ( 1 == $this->settings['quicktime']['button'] )   $buttons['quicktime'] = true;
		if ( 1 == $this->settings['videofile']['button'] )   $buttons['videofile'] = true;

		if ( 1 == $this->settings['flv']['button'] && $this->is_jw_flv_player_installed() )
			$buttons['flv'] = true;

?>
	var VVQButtons = <?php echo json_encode( (object) $buttons ); ?>;


	// This function is run when a button is clicked. It creates a dialog box for the user to input the data.
	function VVQButtonClick( tag ) {

		// Close any existing copies of the dialog
		VVQDialogClose();

		// Open the dialog while setting the width, height, title, buttons, etc. of it
		var buttons = { "<?php echo esc_js('Okay', 'vipers-video-quicktags'); ?>": VVQButtonOkay, "<?php echo esc_js('Cancel', 'vipers-video-quicktags'); ?>": VVQDialogClose };
		var title = VVQData[tag]["title"];
		jQuery("#vvq-dialog").dialog({ autoOpen: false, width: 750, minWidth: 750, title: title, buttons: buttons });

		// Reset the dialog box incase it's been used before
		jQuery("#vvq-dialog-slide-header").removeClass("selected");
		jQuery("#vvq-dialog-input").val("");
		jQuery("#vvq-dialog-tag").val(tag);

		// Set the instructions
		jQuery("#vvq-dialog-message").html("<p>" + VVQData[tag]["instructions"] + "</p><p><strong><?php echo esc_js( __('Example:', 'vipers-video-quicktags') ); ?></strong></p><p><code>" + VVQData[tag]["example"] + "</code></p>");

		// Style the jQuery-generated buttons by adding CSS classes and add second CSS class to the "Okay" button
		jQuery(".ui-dialog button").addClass("button").each(function(){
			if ( "<?php echo esc_js('Okay', 'vipers-video-quicktags'); ?>" == jQuery(this).html() ) jQuery(this).addClass("button-highlighted");
		});

		// Hide the Dimensions box if we can't add dimensions
		if ( VVQData[tag]["width"] ) {
			jQuery(".vvq-dialog-slide").removeClass("hidden");
			jQuery("#vvq-dialog-width").val(VVQData[tag]["width"]);
			jQuery("#vvq-dialog-height").val(VVQData[tag]["height"]);
		} else {
			jQuery(".vvq-dialog-slide").addClass("hidden");
			jQuery(".vvq-dialog-dim").val("");
		}

		// Do some hackery on any links in the message -- jQuery(this).click() works weird with the dialogs, so we can't use it
		jQuery("#vvq-dialog-message a").each(function(){
			jQuery(this).attr("onclick", 'window.open( "' + jQuery(this).attr("href") + '", "_blank" );return false;' );
		});

		// Show the dialog now that it's done being manipulated
		jQuery("#vvq-dialog").dialog("open");

		// Focus the input field
		jQuery("#vvq-dialog-input").focus();
	}

	// Close
	function VVQDialogClose() {
		if (jQuery('#vvq-dialog').dialog('isOpen')) {
			jQuery("#vvq-dialog").dialog("close");
		}
	}


	// Callback function for the "Okay" button
	function VVQButtonOkay() {

		var tag = jQuery("#vvq-dialog-tag").val();
		var text = jQuery("#vvq-dialog-input").val();
		var width = jQuery("#vvq-dialog-width").val();
		var height = jQuery("#vvq-dialog-height").val();

		if ( !tag || !text ) return VVQDialogClose();

		if ( 'bliptv' == tag && width && height && ( width != VVQData[tag]["width"] || height != VVQData[tag]["height"] ) ) {
			var text = text.replace(/]/, ' width="' + width + '" height="' + height + '"]');
		} else if ( 'viddler' != tag && 'bliptv' != tag ) {
			if ( width && height && ( width != VVQData[tag]["width"] || height != VVQData[tag]["height"] ) )
				var text = "[" + tag + ' width="' + width + '" height="' + height + '"]' + text + "[/" + tag + "]";
			else
				var text = "[" + tag + "]" + text + "[/" + tag + "]";
		}

		if ( typeof tinyMCE != 'undefined' && ( ed = tinyMCE.activeEditor ) && !ed.isHidden() ) {
			ed.focus();
			if (tinymce.isIE)
				ed.selection.moveToBookmark(tinymce.EditorManager.activeEditor.windowManager.bookmark);

			ed.execCommand('mceInsertContent', false, text);
		} else {
			edInsertContent(edCanvas, text);
		}

		VVQDialogClose();
	}

	// On page load...
	jQuery(document).ready(function(){
		// Add the buttons to the HTML view
		jQuery("#ed_toolbar").append('<?php echo $this->esc_js( $buttonshtml ); ?>');

		// If the Enter key is pressed inside an input in the dialog, do the "Okay" button event
		jQuery("#vvq-dialog :input").keyup(function(event){
			if ( 13 == event.keyCode ) // 13 == Enter
				VVQButtonOkay();
		});

		// Make help links open in a new window to avoid loosing the post contents
		jQuery("#vvq-dialog-slide a").each(function(){
			jQuery(this).click(function(){
				window.open( jQuery(this).attr("href"), "_blank" );
				return false;
			});
		});

		jQuery('#vvq-dialog').dialog({ autoOpen: false });
	});
// ]]>
</script>
<?php
	}


	// Output Javascript to create the WordPress 3.3+ HTML editor buttons
	function quicktag_buttons() { ?>
<script type="text/javascript">
// <![CDATA[
<?php
	// No way to figure out what button is pressed from the callback, so gotta make wrappers
	foreach ( $this->buttons as $id => $details ) {
		if ( 'flv' == $id && ! $this->is_jw_flv_player_installed() )
			continue;

		if ( 1 != $this->settings[$id]['button'] )
			continue;

		echo "\tQTags.addButton( 'vvq_$id', '" . esc_attr( $details[0] ) . "', function(){VVQButtonClick( '$id' );}, false, false, '" . esc_attr( $details[1] ) . "' );\n";
	}
?>
// ]]>
</script>
<?php
	}


	// Output the <div> used to display the dialog box
	function OutputjQueryDialogDiv() { ?>
<div class="hidden">
	<div id="vvq-dialog">
		<div class="vvq-dialog-content">
			<div id="vvq-dialog-message"></div>
			<p><input type="text" id="vvq-dialog-input" style="width:98%" /></p>
			<input type="hidden" id="vvq-dialog-tag" />
		</div>
		<h3 id="vvq-dialog-slide-header" class="vvq-dialog-slide"><?php _e('Dimensions', 'vipers-video-quicktags'); ?></h3>
		<div id="vvq-dialog-slide" class="vvq-dialog-slide vvq-dialog-content">
			<p><?php printf( __("The default dimensions for this video type can be set on this plugin's <a href='%s'>settings page</a>. However, you can set custom dimensions for this one particular video here:", 'vipers-video-quicktags'), admin_url('options-general.php?page=vipers-video-quicktags') ); ?></p>
			<p><input type="text" id="vvq-dialog-width" class="vvq-dialog-dim" style="width:50px" /> &#215; <input type="text" id="vvq-dialog-height" class="vvq-dialog-dim" style="width:50px" /> pixels</p>
		</div>
		</div>
	</div>
</div>
<?php
	}


	// Handle the submits from the settings page
	function POSTHandler() {
		global $wpmu_version;

		// Capability check
		if ( !current_user_can('manage_options') )
			wp_die( __('Cheatin&#8217; uh?') );

		// Form nonce check
		check_admin_referer('vipers-video-quicktags');

		$usersettings = (array) get_option('vvq_options');
		$defaults = false;

		switch ( $_POST['vvq-tab'] ) {
			case 'general':
				$fields = array( 'button', 'width', 'height', 'aspectratio' );

				// Check for the defaults button, clear out all values on the page if pressed (which makes the defaults be used)
				if ( !empty($_POST['vvq-defaults']) ) {
					foreach ( $this->defaultsettings as $type => $settings ) {
						if ( !is_array($this->defaultsettings[$type]) ) continue;
						foreach ( $fields as $setting ) {
							if ( isset($usersettings[$type][$setting]) )
								unset( $usersettings[$type][$setting] );
						}
					}

					$defaults = TRUE;
					break;
				}

				// Copy in the results of the form
				foreach ( $this->defaultsettings as $type => $settings ) {
					if ( !is_array($this->defaultsettings[$type]) ) continue;
					foreach ( $fields as $setting ) {
						if ( isset($_POST['vvq'][$type][$setting]) )
							$usersettings[$type][$setting] = (int) $_POST['vvq'][$type][$setting];
						else
							$usersettings[$type][$setting] = 0;

						// Width and height are required, clear if 0
						if ( 0 === $usersettings[$type][$setting] && in_array( $setting, array( 'width', 'height' ) ) )
							unset( $usersettings[$type][$setting] );
					}
				}

				break;

			case 'additional':
				// Check for the defaults button
				if ( !empty($_POST['vvq-defaults']) ) {
					unset( $usersettings['alignment'], $usersettings['tinymceline'], $usersettings['customfeedtext'], $usersettings['videofile']['usewmp'], $usersettings['quicktime']['dynamicload'] ); // Custom CSS is skipped
					$defaults = TRUE;
					break;
				}

				$usersettings['alignment']                = $_POST['vvq-alignment'];
				$usersettings['tinymceline']              = (int) $_POST['vvq-tinymceline'];
				$usersettings['customfeedtext']           = trim( $_POST['vvq-customfeedtext'] );
				$usersettings['videofile']['usewmp']      = (int) $_POST['vvq-videofile-usewmp'];
				$usersettings['quicktime']['dynamicload'] = (int) $_POST['vvq-quicktime-dynamicload'];

				if ( empty($wpmu_version) )
					$usersettings['customcss']            = trim( strip_tags( $_POST['vvq-customcss'] ) );

				// Check data validity
				if ( 0 == $usersettings['tinymceline'] )  $usersettings['tinymceline'] = $this->defaultsettings['tinymceline'];

				break;

			case 'youtube':
				// Check for the defaults button
				if ( !empty($_POST['vvq-defaults']) ) {
					$usersettings['youtube'] = array();
					$defaults = TRUE;
					break;
				}

				// Copy in the results of the form
				$usersettings['youtube']['previewurl']  = trim( $_POST['vvq-youtube-previewurl'] );
				$usersettings['youtube']['width']       = (int) $_POST['vvq-youtube-width'];
				$usersettings['youtube']['height']      = (int) $_POST['vvq-youtube-height'];
				$usersettings['youtube']['color1']      = strtoupper( trim( $_POST['vvq-youtube-color1'] ) );
				$usersettings['youtube']['color2']      = strtoupper( trim( $_POST['vvq-youtube-color2'] ) );
				$usersettings['youtube']['border']      = (int) $_POST['vvq-youtube-border'];
				$usersettings['youtube']['rel']         = (int) $_POST['vvq-youtube-rel'];
				$usersettings['youtube']['fs']          = (int) $_POST['vvq-youtube-fs'];
				$usersettings['youtube']['hd']          = (int) $_POST['vvq-youtube-hd'];
				$usersettings['youtube']['autoplay']    = (int) $_POST['vvq-youtube-autoplay'];
				$usersettings['youtube']['loop']        = (int) $_POST['vvq-youtube-loop'];
				$usersettings['youtube']['showsearch']  = (int) $_POST['vvq-youtube-showsearch'];
				$usersettings['youtube']['showinfo']    = (int) $_POST['vvq-youtube-showinfo'];
				$usersettings['youtube']['aspectratio'] = (int) $_POST['vvq-youtube-aspectratio'];

				// Fill in an missing items with the defaults
				if ( empty($usersettings['youtube']['previewurl']) ) $usersettings['youtube']['previewurl'] = $this->defaultsettings['youtube']['previewurl'];
				if ( empty($usersettings['youtube']['width']) )      $usersettings['youtube']['width']      = $this->defaultsettings['youtube']['width'];
				if ( empty($usersettings['youtube']['height']) )     $usersettings['youtube']['height']     = $this->defaultsettings['youtube']['height'];
				if ( empty($usersettings['youtube']['color1']) )     $usersettings['youtube']['color1']     = $this->defaultsettings['youtube']['color1'];
				if ( empty($usersettings['youtube']['color2']) )     $usersettings['youtube']['color2']     = $this->defaultsettings['youtube']['color2'];

				// Check data validity
				if ( '#' != substr( $usersettings['youtube']['color1'], 0, 1 ) ) $usersettings['youtube']['color1'] = '#' . $usersettings['youtube']['color1'];
				if ( '#' != substr( $usersettings['youtube']['color2'], 0, 1 ) ) $usersettings['youtube']['color2'] = '#' . $usersettings['youtube']['color2'];

				break;

			case 'googlevideo':
				// Check for the defaults button
				if ( !empty($_POST['vvq-defaults']) ) {
					$usersettings['googlevideo'] = array();
					$defaults = TRUE;
					break;
				}

				// Copy in the results of the form
				$usersettings['googlevideo']['previewurl']  = (int) $_POST['vvq-googlevideo-previewurl'];
				$usersettings['googlevideo']['width']       = (int) $_POST['vvq-googlevideo-width'];
				$usersettings['googlevideo']['height']      = (int) $_POST['vvq-googlevideo-height'];
				$usersettings['googlevideo']['autoplay']    = (int) $_POST['vvq-googlevideo-autoplay'];
				$usersettings['googlevideo']['fs']          = (int) $_POST['vvq-googlevideo-fs'];
				$usersettings['googlevideo']['aspectratio'] = (int) $_POST['vvq-googlevideo-aspectratio'];

				// Fill in an missing items with the defaults
				if ( empty($usersettings['googlevideo']['previewurl']) ) $usersettings['googlevideo']['previewurl'] = $this->defaultsettings['googlevideo']['previewurl'];
				if ( empty($usersettings['googlevideo']['width']) )      $usersettings['googlevideo']['width']      = $this->defaultsettings['googlevideo']['width'];
				if ( empty($usersettings['googlevideo']['height']) )     $usersettings['googlevideo']['height']     = $this->defaultsettings['googlevideo']['height'];

				break;

			case 'dailymotion':
				// Check for the defaults button
				if ( !empty($_POST['vvq-defaults']) ) {
					$usersettings['dailymotion'] = array();
					$defaults = TRUE;
					break;
				}

				// Copy in the results of the form
				$usersettings['dailymotion']['previewurl']      = trim( $_POST['vvq-dailymotion-previewurl'] );
				$usersettings['dailymotion']['width']           = (int) $_POST['vvq-dailymotion-width'];
				$usersettings['dailymotion']['height']          = (int) $_POST['vvq-dailymotion-height'];
				$usersettings['dailymotion']['backgroundcolor'] = strtoupper( trim( $_POST['vvq-dailymotion-backgroundcolor'] ) );
				$usersettings['dailymotion']['glowcolor']       = strtoupper( trim( $_POST['vvq-dailymotion-glowcolor'] ) );
				$usersettings['dailymotion']['foregroundcolor'] = strtoupper( trim( $_POST['vvq-dailymotion-foregroundcolor'] ) );
				$usersettings['dailymotion']['seekbarcolor']    = strtoupper( trim( $_POST['vvq-dailymotion-seekbarcolor'] ) );
				$usersettings['dailymotion']['autoplay']        = (int) $_POST['vvq-dailymotion-autoplay'];
				$usersettings['dailymotion']['related']         = (int) $_POST['vvq-dailymotion-related'];

				// Fill in an missing items with the defaults
				if ( empty($usersettings['dailymotion']['previewurl']) )      $usersettings['dailymotion']['previewurl']      = $this->defaultsettings['dailymotion']['previewurl'];
				if ( empty($usersettings['dailymotion']['width']) )           $usersettings['dailymotion']['width']           = $this->defaultsettings['dailymotion']['width'];
				if ( empty($usersettings['dailymotion']['height']) )          $usersettings['dailymotion']['height']          = $this->defaultsettings['dailymotion']['height'];
				if ( empty($usersettings['dailymotion']['backgroundcolor']) ) $usersettings['dailymotion']['backgroundcolor'] = $this->defaultsettings['dailymotion']['backgroundcolor'];
				if ( empty($usersettings['dailymotion']['glowcolor']) )       $usersettings['dailymotion']['glowcolor']       = $this->defaultsettings['dailymotion']['glowcolor'];
				if ( empty($usersettings['dailymotion']['foregroundcolor']) ) $usersettings['dailymotion']['foregroundcolor'] = $this->defaultsettings['dailymotion']['foregroundcolor'];
				if ( empty($usersettings['dailymotion']['seekbarcolor']) )    $usersettings['dailymotion']['seekbarcolor']    = $this->defaultsettings['dailymotion']['seekbarcolor'];

				// Check data validity
				if ( '#' != substr( $usersettings['dailymotion']['backgroundcolor'], 0, 1 ) ) $usersettings['dailymotion']['backgroundcolor'] = '#' . $usersettings['dailymotion']['backgroundcolor'];
				if ( '#' != substr( $usersettings['dailymotion']['glowcolor'], 0, 1 ) )       $usersettings['dailymotion']['glowcolor']       = '#' . $usersettings['dailymotion']['glowcolor'];
				if ( '#' != substr( $usersettings['dailymotion']['foregroundcolor'], 0, 1 ) ) $usersettings['dailymotion']['foregroundcolor'] = '#' . $usersettings['dailymotion']['foregroundcolor'];
				if ( '#' != substr( $usersettings['dailymotion']['seekbarcolor'], 0, 1 ) )    $usersettings['dailymotion']['seekbarcolor']    = '#' . $usersettings['dailymotion']['seekbarcolor'];

				break;

			case 'vimeo':
				// Check for the defaults button
				if ( !empty($_POST['vvq-defaults']) ) {
					$usersettings['vimeo'] = array();
					$defaults = TRUE;
					break;
				}

				// Copy in the results of the form
				$usersettings['vimeo']['previewurl']  = (int) $_POST['vvq-vimeo-previewurl'];
				$usersettings['vimeo']['width']       = (int) $_POST['vvq-vimeo-width'];
				$usersettings['vimeo']['height']      = (int) $_POST['vvq-vimeo-height'];
				$usersettings['vimeo']['color']       = strtoupper( trim( $_POST['vvq-vimeo-color'] ) );
				$usersettings['vimeo']['portrait']    = (int) $_POST['vvq-vimeo-portrait'];
				$usersettings['vimeo']['title']       = (int) $_POST['vvq-vimeo-title'];
				$usersettings['vimeo']['byline']      = (int) $_POST['vvq-vimeo-byline'];
				$usersettings['vimeo']['fullscreen']  = (int) $_POST['vvq-vimeo-fullscreen'];
				$usersettings['vimeo']['aspectratio'] = (int) $_POST['vvq-vimeo-aspectratio'];

				// Fill in an missing items with the defaults
				if ( empty($usersettings['vimeo']['previewurl']) ) $usersettings['vimeo']['previewurl'] = $this->defaultsettings['vimeo']['previewurl'];
				if ( empty($usersettings['vimeo']['width']) )      $usersettings['vimeo']['width']      = $this->defaultsettings['vimeo']['width'];
				if ( empty($usersettings['vimeo']['height']) )     $usersettings['vimeo']['height']     = $this->defaultsettings['vimeo']['height'];
				if ( empty($usersettings['vimeo']['color']) )      $usersettings['vimeo']['color']      = $this->defaultsettings['vimeo']['color'];

				// Check data validity
				if ( '#' != substr( $usersettings['vimeo']['color'], 0, 1 ) ) $usersettings['vimeo']['color'] = '#' . $usersettings['vimeo']['color'];

				break;

			case 'flv':
				// Check for the defaults button
				if ( !empty($_POST['vvq-defaults']) ) {
					$usersettings['flv'] = array();
					$defaults = TRUE;
					break;
				}

				// Copy in the results of the form
				$usersettings['flv']['previewurl']   = trim( $_POST['vvq-flv-previewurl'] );
				$usersettings['flv']['width']        = (int) $_POST['vvq-flv-width'];
				$usersettings['flv']['height']       = (int) $_POST['vvq-flv-height'];
				$usersettings['flv']['skin']         = $_POST['vvq-flv-skin'];
				$usersettings['flv']['customcolors'] = (int) $_POST['vvq-flv-customcolors'];
				$usersettings['flv']['backcolor']    = strtoupper( trim( $_POST['vvq-flv-backcolor'] ) );
				$usersettings['flv']['frontcolor']   = strtoupper( trim( $_POST['vvq-flv-frontcolor'] ) );
				$usersettings['flv']['lightcolor']   = strtoupper( trim( $_POST['vvq-flv-lightcolor'] ) );
				$usersettings['flv']['screencolor']  = strtoupper( trim( $_POST['vvq-flv-screencolor'] ) );
				$usersettings['flv']['flashvars']    = trim( $_POST['vvq-flv-flashvars'] );

				// Fill in an missing items with the defaults
				if ( empty($usersettings['flv']['previewurl']) )  $usersettings['flv']['previewurl']  = $this->defaultsettings['flv']['previewurl'];
				if ( empty($usersettings['flv']['width']) )       $usersettings['flv']['width']       = $this->defaultsettings['flv']['width'];
				if ( empty($usersettings['flv']['height']) )      $usersettings['flv']['height']      = $this->defaultsettings['flv']['height'];
				if ( empty($usersettings['flv']['skin']) )        $usersettings['flv']['skin']        = $this->defaultsettings['flv']['skin'];
				if ( empty($usersettings['flv']['backcolor']) )   $usersettings['flv']['backcolor']   = $this->defaultsettings['flv']['backcolor'];
				if ( empty($usersettings['flv']['frontcolor']) )  $usersettings['flv']['frontcolor']  = $this->defaultsettings['flv']['frontcolor'];
				if ( empty($usersettings['flv']['lightcolor']) )  $usersettings['flv']['lightcolor']  = $this->defaultsettings['flv']['lightcolor'];
				if ( empty($usersettings['flv']['screencolor']) ) $usersettings['flv']['screencolor'] = $this->defaultsettings['flv']['screencolor'];

				// Check data validity
				if ( empty($this->flvskins[$usersettings['flv']['skin']]) )       $usersettings['flv']['skin']        = '';
				if ( '#' != substr( $usersettings['flv']['backcolor'], 0, 1 ) )   $usersettings['flv']['backcolor']   = '#' . $usersettings['flv']['backcolor'];
				if ( '#' != substr( $usersettings['flv']['frontcolor'], 0, 1 ) )  $usersettings['flv']['frontcolor']  = '#' . $usersettings['flv']['frontcolor'];
				if ( '#' != substr( $usersettings['flv']['lightcolor'], 0, 1 ) )  $usersettings['flv']['lightcolor']  = '#' . $usersettings['flv']['lightcolor'];
				if ( '#' != substr( $usersettings['flv']['screencolor'], 0, 1 ) ) $usersettings['flv']['screencolor'] = '#' . $usersettings['flv']['screencolor'];

				break;
		}

		$usersettings['version'] = $this->version;
		update_option( 'vvq_options', $usersettings );

		// Redirect back to where we came from
		$redirectto = remove_query_arg( 'defaults', remove_query_arg( 'updated', wp_get_referer() ) );
		$redirectto = ( TRUE == $defaults ) ? add_query_arg( 'defaults', 'true', $redirectto ) : add_query_arg( 'updated', 'true', $redirectto );
		wp_safe_redirect( $redirectto );
	}


	// Some style tweaks for the settings page
	function StyleTweaks() { ?>
<style type="text/css">
	.widefat td { vertical-align: middle; }
	#vvqsettingsform ul li {
		margin-left: 20px;
		list-style: disc;
	}
	.vvqwide { width: 98%; }
	.vvqnarrow { width: 75px; }
	.vvq-picker-wrap {
		position: absolute;
		display: none;
		background: #fff;
		border: 3px solid #ccc;
		padding: 3px;
		z-index: 1000;
	}
	.vvq-swatch {
		padding: 2px 10px;
		cursor: pointer;
		background: transparent url('<?php echo esc_url( plugins_url( 'resources/images/color_wheel.png', __FILE__ ) ); ?>') top left no-repeat;
	}
	.vvq-preset {
		float: left;
		margin: 2px 4px;
		-moz-border-radius: 3px;
		padding: 0px;
		width: 0;
		height: 0;
		line-height: 0;
		cursor: pointer;
	}
	#vvq-help .vvq-help-title {
		font-weight: bold;
		color: #2583ad;
	}
</style>
<?php
	}


	// Output the settings page
	function SettingsPage() {
		global $wpmu_version;

		$tab = ( !empty($_GET['tab']) ) ? $_GET['tab'] : 'general';

		if ( !empty($_GET['defaults']) ) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Settings for this tab reset to defaults.', 'vipers-video-quicktags'); ?></strong></p></div>
<?php endif; ?>

<div class="wrap">

	<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
	<h2><?php _e( "Viper's Video Quicktags", 'vipers-video-quicktags' ); ?></h2>

	<ul class="subsubsub">
<?php
		$tabs = array(
			'additional'  => __('Additional Settings', 'vipers-video-quicktags'),
			'youtube'     => __('YouTube', 'vipers-video-quicktags'),
			'googlevideo' => __('Google Video', 'vipers-video-quicktags'),
			'dailymotion' => __('DailyMotion', 'vipers-video-quicktags'),
			'vimeo'       => __('Vimeo', 'vipers-video-quicktags'),
		);

		if ( $this->is_jw_flv_player_installed() )
			$tabs['flv'] = __('Flash Video (FLV)', 'vipers-video-quicktags');

		$tabs = array_merge( $tabs, array(
			'help'        => __('Help', 'vipers-video-quicktags'),
			'credits'     => __('Credits', 'vipers-video-quicktags'),
		) );

		$tabhtml = array();

		// If someone wants to remove a tab (for example on a WPMU intall)
		$tabs = apply_filters( 'vvq_tabs', $tabs );

		$class = ( 'general' == $tab ) ? ' class="current"' : '';
		$tabhtml[] = '		<li><a href="' . admin_url( 'options-general.php?page=vipers-video-quicktags' ) . '"' . $class . '>' . __('General', 'vipers-video-quicktags') . '</a>';

		foreach ( $tabs as $stub => $title ) {
			$class = ( $stub == $tab ) ? ' class="current"' : '';
			$tabhtml[] = '		<li><a href="' . admin_url( 'options-general.php?page=vipers-video-quicktags&amp;tab=' . $stub ) . '"' . $class . ">$title</a>";
		}

		echo implode( " |</li>\n", $tabhtml ) . '</li>';
?>

	</ul>

	<form id="vvqsettingsform" method="post" action="admin-post.php" style="clear:both">

	<?php wp_nonce_field('vipers-video-quicktags'); ?>

	<input type="hidden" name="action" value="vvqsettings" />

	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function() {
			// Show items that need to be hidden if Javascript is disabled
			// This is needed for pre-WordPress 2.7
			jQuery(".hide-if-no-js").removeClass("hide-if-no-js");

			// Confirm pressing of the "reset tab to defaults" button
			jQuery("#vvq-defaults").click(function(){
				var areyousure = confirm("<?php echo esc_js( __("Are you sure you want to reset this tab's settings to the defaults?", 'vipers-video-quicktags') ); ?>");
				if ( true != areyousure ) return false;
			});
		});
	// ]]>
	</script>

<?php
	// For the video configuration tabs, output the common Javascript
	if ( !in_array( $tab, array( 'general', 'additional', 'help', 'credits' ) ) ) :
?>
	<p><?php printf(
		__('Set the defaults for this video type here. All of these settings can be overridden on individual embeds. See the <a href="%s">Help section</a> for details.', 'vipers-video-quicktags'),
		admin_url( 'options-general.php?page=vipers-video-quicktags&amp;tab=help#vvq-parameters' )
	); ?></p>

<?php if ( FALSE !== strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ) : ?>
	<p><?php printf( __('Please consider using a browser other than Internet Explorer though. Due to limitations with your browser, these configuration pages won\'t be as full featured as if you were using a brower such as <a href="%1$s">Firefox</a> or <a href="%2$s">Opera</a>. If you switch, you\'ll be able to see the video preview update live as you change <strong>any</strong> option (rather than just a very limited number options) and more.', 'vipers-video-quicktags'), 'http://www.mozilla.com/firefox/', 'http://www.opera.com/' ); ?></p>

<?php endif; ?>
	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function() {
			var vvqflashvars = {};
			var vvqparams = { wmode: "transparent", allowfullscreen: "true", allowscriptaccess: "always" };
			var vvqattributes = {};
			var vvqexpressinstall = "<?php echo plugins_url( 'resources/expressinstall.swf', __FILE__ ); ?>";


			/* Color picker code based on code stolen with permission from Ozh's "Liz Comment Counter" */

			// Add a color picker to every .vvq-picker
			jQuery(".vvq-picker").each(function(){
				var id = jQuery(this).attr("id");
				var target = id.replace(/-picker/, "");
				jQuery(this).farbtastic("#"+target);
			});

			// Add the toggling behavior to .vvq-swatch
			jQuery(".vvq-swatch").click(function(){
				var id = jQuery(this).attr("id");
				var target = id.replace(/swatch/, "picker-wrap");
				VVQHideOtherColorPickers(target);
				var display = jQuery("#"+target).css("display");
				(display == "block") ? jQuery("#"+target).fadeOut(100) : jQuery("#"+target).fadeIn(100);
				var bg = (display == "block") ? "0px 0px" : "0px -24px";
				jQuery(this).css("background-position", bg);
			});

			// Use pretty tooltips if available
			if ( typeof jQuery.tTips != "undefined" ) {
				jQuery(".vvq-swatch").tTips();
			}

			// Close color pickers when click on the document. This function is hijacked by Farbtastic's event when a color picker is open.
			// If the color swatch was the thing that was clicked, don't do anything and let it close.
			var colorswatch = false;
			jQuery(".vvq-swatch").mousedown(function(){
				// Oh, the swatch was clicked. Tell the document clicker to abort.
				colorswatch = true;
				// If we used the swatch to close the color picker, update the preview
				var id = jQuery(this).attr("id");
				var picker = id.replace(/swatch/, "picker-wrap");
				var display = jQuery("#"+picker).css("display");
				if (display == "block") {
					VVQUpdatePreview();
				}
			});
			jQuery(document).mousedown(function(){
				// Was the swatch clicked? If so, abort.
				if ( true == colorswatch ) return;
				VVQHideOtherColorPickers();
			});
			jQuery(document).mouseup(function(){
				// Reset everything
				colorswatch = false;
			});

			// Close color pickers except "what"
			function VVQHideOtherColorPickers(what) {
				jQuery(".vvq-picker-wrap").each(function(){
					var id = jQuery(this).attr("id");
					var display = jQuery(this).css("display");
					if (id == what) {
						return;
					}
					if ("block" == display) {
						VVQUpdatePreview();
						jQuery(this).fadeOut(100);
						var swatch = id.replace(/picker-wrap/, "swatch");
						jQuery("#"+swatch).css("background-position", "0px 0px");
					}
				});
			}

			// rgb(1, 2, 3) -> #010203
			// Stolen from Ozh's "Liz Comment Counter"
			function VVQRGBtoHex(color) {
				var color = color.replace(/rgb\(|\)| /g,"").split(","); // ["1","2","3"]
				return "#" + VVQ_array_RGBtoHex(color[0],color[1],color[2]);
			}

			// From: http://www.linuxtopia.org/online_books/javascript_guides/javascript_faq/RGBtoHex.htm
			function VVQ_array_RGBtoHex(R,G,B) {return VVQ_toHex(R)+VVQ_toHex(G)+VVQ_toHex(B)}
			function VVQ_toHex(N) {
				if (N==null) return "00";
				N=parseInt(N);
				if (N==0 || isNaN(N)) return "00";
				N=Math.max(0,N);
				N=Math.min(N,255);
				N=Math.round(N);
				return "0123456789ABCDEF".charAt((N-N%16)/16) + "0123456789ABCDEF".charAt(N%16);
			}


			/* Set up the video preview */

			// Setup the preview on page load
			VVQUpdatePreview();

			// Call update preview function when form is changed
			jQuery("#vvqsettingsform input, #vvqsettingsform select").change(function(){
				if (jQuery.browser.msie) return; // IE sucks and doesn't work right
				VVQUpdatePreview();
			});

			// Handle keeping the dimensions in the correct ratio
			jQuery("#vvq-width").change(function(){
				if ( true != jQuery("#vvq-aspectratio").attr("checked") ) return;
				var width = jQuery("#vvq-width").val();
				var widthdefault = jQuery("#vvq-width-default").val();
				if ( '' == width || 0 == width ) {
					width = widthdefault;
					jQuery("#vvq-width").val(widthdefault);
				}
				jQuery("#vvq-height").val( Math.round( width * ( jQuery("#vvq-height-default").val() / widthdefault ) ) );
				VVQUpdatePreview();
			});
			jQuery("#vvq-height").change(function(){
				if ( true != jQuery("#vvq-aspectratio").attr("checked") ) return;
				var height = jQuery("#vvq-height").val();
				var heightdefault = jQuery("#vvq-height-default").val();
				if ( '' == height || 0 == height ) {
					height = heightdefault;
					jQuery("#vvq-height").val(heightdefault);
				}
				jQuery("#vvq-width").val( Math.round( height * ( jQuery("#vvq-width-default").val() / heightdefault ) ) );
				VVQUpdatePreview();
			});

			// When called, updates the preview
			function VVQUpdatePreview() {
<?php
	endif; // Endif video tab for JS


	// Figure out which tab to output
	switch ( $tab ) {

		case 'youtube':
?>
				jQuery("#vvqvideopreview-container").css( "min-height", jQuery("#vvq-height").val() + "px" );

				// Get the colors, transform to uppercase, and then set the inputs with the uppercase value
				var Color1Val = jQuery("#vvq-youtube-color1").val().toUpperCase();
				var Color2Val = jQuery("#vvq-youtube-color2").val().toUpperCase();
				jQuery("#vvq-youtube-color1").val(Color1Val);
				jQuery("#vvq-youtube-color2").val(Color2Val);

				// Parse the URL
				var PreviewID = jQuery("#vvq-previewurl").val().match(/http:\/\/www\.(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com\/(watch\?v=|w\/\?v=)([\w-]+)(.*?)/);
				if ( !PreviewID ) {
					jQuery("#vvqvideopreview-container").html('<div id="vvqvideopreview"><?php echo $this->esc_js( __("Unable to parse preview URL. Please make sure it's the <strong>full</strong> URL and a valid one at that.", 'vipers-video-quicktags') ); ?></div>');
					return;
				}
				var PreviewID = PreviewID[3];

				// Generate the URL and do the preview
				var Color1 = "";
				var Color2 = "";
				var FS = "";
				var Border = "";
				var Autoplay = "";
				var Loop = "";
				var ShowSearch = "";
				var ShowInfo = "";
				var HD = "";
				if ( "" != Color1Val && "<?php echo $this->defaultsettings['youtube']['color1']; ?>" != Color1Val ) var Color1 = "&color1=0x" + Color1Val.replace(/#/, "");
				if ( "" != Color2Val && "<?php echo $this->defaultsettings['youtube']['color2']; ?>" != Color2Val ) var Color2 = "&color2=0x" + Color2Val.replace(/#/, "");
				if ( true == jQuery("#vvq-youtube-border").attr("checked") ) { var Border = "&border=1"; }
				if ( true == jQuery("#vvq-youtube-rel").attr("checked") ) { var Rel = "1"; } else { var Rel = "0"; }
				if ( true == jQuery("#vvq-youtube-fs").attr("checked") ) { var FS = "&fs=1"; }
				if ( true == jQuery("#vvq-youtube-hd").attr("checked") ) { var HD = "&hd=1"; }
				if ( true == jQuery("#vvq-youtube-autoplay").attr("checked") ) { var Autoplay = "&autoplay=1"; }
				if ( true == jQuery("#vvq-youtube-loop").attr("checked") ) { var Loop = "&loop=1"; }
				if ( true == jQuery("#vvq-youtube-showsearch").attr("checked") ) { var ShowSearch = "1"; } else { var ShowSearch = "0"; }
				if ( true == jQuery("#vvq-youtube-showinfo").attr("checked") ) { var ShowInfo = "1"; } else { var ShowInfo = "0"; }
				swfobject.embedSWF(
					"http://www.youtube.com/v/" + PreviewID + Color1 + Color2 + Autoplay + Loop + Border + "&rel=" + Rel + "&showsearch=" + ShowSearch + "&showinfo=" + ShowInfo + FS + HD,
					"vvqvideopreview",
					jQuery("#vvq-width").val(),
					jQuery("#vvq-height").val(),
					"9",
					vvqexpressinstall,
					vvqflashvars,
					vvqparams,
					vvqattributes
				);
			}


			/* Color presets which is also based on code stolen from Ozh's "Liz Comment Counter" */

			// Make the presets
			VVQMakeYouTubePresets();
			function VVQMakeYouTubePresets() {
				var presets = {
					"<?php echo esc_js( __('Default', 'vipers-video-quicktags') ); ?>": ["<?php echo $this->defaultsettings['youtube']['color1']; ?>", "<?php echo $this->defaultsettings['youtube']['color2']; ?>"],
					"<?php echo esc_js( __('Dark Grey', 'vipers-video-quicktags') ); ?>": ["#3A3A3A", "#999999"],
					"<?php echo esc_js( __('Dark Blue', 'vipers-video-quicktags') ); ?>": ["#2B405B", "#6B8AB6"],
					"<?php echo esc_js( __('Light Blue', 'vipers-video-quicktags') ); ?>": ["#006699", "#54ABD6"],
					"<?php echo esc_js( __('Green', 'vipers-video-quicktags') ); ?>": ["#234900", "#4E9E00"],
					"<?php echo esc_js( __('Orange', 'vipers-video-quicktags') ); ?>": ["#E1600F", "#FEBD01"],
					"<?php echo esc_js( __('Pink', 'vipers-video-quicktags') ); ?>": ["#CC2550", "#E87A9F"],
					"<?php echo esc_js( __('Purple', 'vipers-video-quicktags') ); ?>": ["#402061", "#9461CA"],
					"<?php echo esc_js( __('Ruby Red', 'vipers-video-quicktags') ); ?>": ["#5D1719", "#CD311B"]
				};
				jQuery("#vvq-youtube-presets").html("");
				for (var i in presets) {
					var fg = presets[i][0];
					var bg = presets[i][1];
					jQuery("#vvq-youtube-presets").append('<div class="vvq-preset" style="color:'+fg+';background:'+bg+';border-top:10px solid '+fg+';border-right:10px solid '+bg+';border-bottom:10px solid '+bg+';border-left:10px solid '+fg+';" title="'+i+'"></div> ');
				}
			}

			// Update the color inputs when a preset is clicked
			jQuery(".vvq-preset").click(function(){
				var color1 = jQuery(this).css('color');
				var color2 = jQuery(this).css('backgroundColor');

				// Opera and IE return hex already, but we need to convert RGB to hex for Firefox, Safari, etc.
				if ( -1 == color1.search(/#/) ) {
					var color1 = VVQRGBtoHex( color1 );
					var color2 = VVQRGBtoHex( color2 );
				}

				if (color1 != undefined) { jQuery('#vvq-youtube-color1').val(color1).keyup(); }
				if (color2 != undefined) { jQuery('#vvq-youtube-color2').val(color2).keyup(); }

				VVQUpdatePreview();
			});
		});
	// ]]>
	</script>

	<input type="hidden" name="vvq-tab" value="youtube" />

	<table class="form-table">
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Preview', 'vipers-video-quicktags'); ?></th>
			<td>
				<div id="vvqvideopreview-container" style="min-height:<?php echo $this->settings['youtube']['height']; ?>px">
					<div id="vvqvideopreview"><?php _e('Loading...', 'vipers-video-quicktags'); ?></div>
				</div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><label for="vvq-previewurl"><?php _e('Preview URL', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-youtube-previewurl" id="vvq-previewurl" value="<?php echo esc_attr($this->settings['youtube']['previewurl']); ?>" class="vvqwide" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Dimensions', 'vipers-video-quicktags'); ?></th>
			<td>
				<input type="text" name="vvq-youtube-width" id="vvq-width" size="3" value="<?php echo esc_attr($this->settings['youtube']['width']); ?>" /> &#215;
				<input type="text" name="vvq-youtube-height" id="vvq-height" size="3" value="<?php echo esc_attr($this->settings['youtube']['height']); ?>" /> <?php _e('pixels', 'vipers-video-quicktags'); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="vvq-youtube-aspectratio" id="vvq-aspectratio" value="1"<?php checked($this->settings['youtube']['aspectratio'], 1); ?> /> <?php _e('Maintain aspect ratio', 'vipers-video-quicktags'); ?></label>
				<input type="hidden" id="vvq-width-default" value="<?php echo esc_attr($this->defaultsettings['youtube']['width']); ?>" />
				<input type="hidden" id="vvq-height-default" value="<?php echo esc_attr($this->defaultsettings['youtube']['height']); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-youtube-color1"><?php _e('Border Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-youtube-color1" id="vvq-youtube-color1" value="<?php echo esc_attr($this->settings['youtube']['color1']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-youtube-color1-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-youtube-color1-picker-wrap"><div class="vvq-picker" id="vvq-youtube-color1-picker"></div></div>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-youtube-color2"><?php _e('Fill Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-youtube-color2" id="vvq-youtube-color2" value="<?php echo esc_attr($this->settings['youtube']['color2']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-youtube-color2-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-youtube-color2-picker-wrap"><div class="vvq-picker" id="vvq-youtube-color2-picker"></div></div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Color Presets', 'vipers-video-quicktags'); ?></th>
			<td id="vvq-youtube-presets">&nbsp;</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Miscellaneous', 'vipers-video-quicktags'); ?></th>
			<td>
				<label><input type="checkbox" name="vvq-youtube-hd" id="vvq-youtube-hd" value="1"<?php checked($this->settings['youtube']['hd'], 1); ?> /> <?php _e("Enable HD video by default (not to be confused with &quot;HQ&quot; which can't be enabled by default and not all videos are avilable in HD)", 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-rel" id="vvq-youtube-rel" value="1"<?php checked($this->settings['youtube']['rel'], 1); ?> /> <?php _e('Show video details at the end of playback (related videos, embed code, etc.)', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-fs" id="vvq-youtube-fs" value="1"<?php checked($this->settings['youtube']['fs'], 1); ?> /> <?php _e('Show fullscreen button', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-border" id="vvq-youtube-border" value="1"<?php checked($this->settings['youtube']['border'], 1); ?> /> <?php _e('Show border', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-showsearch" id="vvq-youtube-showsearch" value="1"<?php checked($this->settings['youtube']['showsearch'], 1); ?> /> <?php _e('Show the search box', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-showinfo" id="vvq-youtube-showinfo" value="1"<?php checked($this->settings['youtube']['showinfo'], 1); ?> /> <?php _e('Show the video title and rating', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-autoplay" id="vvq-youtube-autoplay" value="1"<?php checked($this->settings['youtube']['autoplay'], 1); ?> /> <?php _e('Autoplay video (not recommended)', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-youtube-loop" id="vvq-youtube-loop" value="1"<?php checked($this->settings['youtube']['loop'], 1); ?> /> <?php _e('Loop video playback', 'vipers-video-quicktags'); ?></label>
			</td>
		</tr>
	</table>
<?php
			break; // End YouTube

		case 'googlevideo': ?>
				jQuery("#vvqvideopreview-container").css( "min-height", jQuery("#vvq-height").val() + "px" );

				// Parse the URL
				var PreviewID = jQuery("#vvq-previewurl").val().match(/http:\/\/video\.google\.([A-Za-z.]{2,5})\/videoplay\?docid=([\d-]+)(.*?)/);
				if ( !PreviewID ) {
					jQuery("#vvqvideopreview-container").html('<div id="vvqvideopreview"><?php echo $this->esc_js( __("Unable to parse preview URL. Please make sure it's the <strong>full</strong> URL and a valid one at that.", 'vipers-video-quicktags') ); ?></div>');
					return;
				}
				var PreviewID = PreviewID[2];

				// Generate the URL and do the preview
				var Autoplay = "";
				var FS = "";
				if ( true == jQuery("#vvq-googlevideo-autoplay").attr("checked") ) { var Autoplay = "&autoplay=1"; }
				if ( true == jQuery("#vvq-googlevideo-fs").attr("checked") ) { var FS = "&fs=true"; }
				swfobject.embedSWF(
					"http://video.google.com/googleplayer.swf?docid=" + PreviewID + Autoplay + FS,
					"vvqvideopreview",
					jQuery("#vvq-width").val(),
					jQuery("#vvq-height").val(),
					"9",
					vvqexpressinstall,
					vvqflashvars,
					vvqparams,
					vvqattributes
				);
			}
		});
	// ]]>
	</script>

	<input type="hidden" name="vvq-tab" value="googlevideo" />

	<table class="form-table">
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Preview', 'vipers-video-quicktags'); ?></th>
			<td>
				<div id="vvqvideopreview-container" style="min-height:<?php echo $this->settings['googlevideo']['height']; ?>px">
					<div id="vvqvideopreview"><?php _e('Loading...', 'vipers-video-quicktags'); ?></div>
				</div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><label for="vvq-previewurl"><?php _e('Preview URL', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-googlevideo-previewurl" id="vvq-previewurl" value="<?php echo esc_attr($this->settings['googlevideo']['previewurl']); ?>" class="vvqwide" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Dimensions', 'vipers-video-quicktags'); ?></th>
			<td>
				<input type="text" name="vvq-googlevideo-width" id="vvq-width" size="3" value="<?php echo esc_attr($this->settings['googlevideo']['width']); ?>" /> &#215;
				<input type="text" name="vvq-googlevideo-height" id="vvq-height" size="3" value="<?php echo esc_attr($this->settings['googlevideo']['height']); ?>" /> <?php _e('pixels', 'vipers-video-quicktags'); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="vvq-googlevideo-aspectratio" id="vvq-aspectratio" value="1"<?php checked($this->settings['googlevideo']['aspectratio'], 1); ?> /> <?php _e('Maintain aspect ratio', 'vipers-video-quicktags'); ?></label>
				<input type="hidden" id="vvq-width-default" value="<?php echo esc_attr($this->defaultsettings['googlevideo']['width']); ?>" />
				<input type="hidden" id="vvq-height-default" value="<?php echo esc_attr($this->defaultsettings['googlevideo']['height']); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Other', 'vipers-video-quicktags'); ?></th>
			<td>
				<label><input type="checkbox" name="vvq-googlevideo-fs" id="vvq-googlevideo-fs" value="1"<?php checked($this->settings['googlevideo']['fs'], 1); ?> /> <?php _e('Show fullscreen button', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-googlevideo-autoplay" id="vvq-googlevideo-autoplay" value="1"<?php checked($this->settings['googlevideo']['autoplay'], 1); ?> /> <?php _e('Autoplay video (not recommended)', 'vipers-video-quicktags'); ?></label>
			</td>
		</tr>
	</table>
<?php
			break; // End Google Video

		case 'dailymotion': ?>
				jQuery("#vvqvideopreview-container").css( "min-height", jQuery("#vvq-height").val() + "px" );

				// Get the colors, transform to uppercase, and then set the inputs with the uppercase value
				var BackgroundColorVal   = jQuery("#vvq-dailymotion-backgroundcolor").val().toUpperCase();
				var GlowColorVal         = jQuery("#vvq-dailymotion-glowcolor").val().toUpperCase();
				var ForegroundColorVal   = jQuery("#vvq-dailymotion-foregroundcolor").val().toUpperCase();
				var SeekbarColorVal      = jQuery("#vvq-dailymotion-seekbarcolor").val().toUpperCase();
				jQuery("#vvq-dailymotion-backgroundcolor").val(BackgroundColorVal);
				jQuery("#vvq-dailymotion-glowcolor").val(GlowColorVal);
				jQuery("#vvq-dailymotion-foregroundcolor").val(ForegroundColorVal);
				jQuery("#vvq-dailymotion-seekbarcolor").val(SeekbarColorVal);

				// Parse the URL
				var PreviewID = jQuery("#vvq-previewurl").val().match(/http:\/\/(www.dailymotion|dailymotion)\.com\/(.+)\/([0-9a-zA-Z]+)\_(.*?)/);
				if ( !PreviewID ) {
					jQuery("#vvqvideopreview-container").html('<div id="vvqvideopreview"><?php echo $this->esc_js( __("Unable to parse preview URL. Please make sure it's the <strong>full</strong> URL and a valid one at that.", 'vipers-video-quicktags') ); ?></div>');
					return;
				}
				var PreviewID = PreviewID[3];

				// Generate the URL and do the preview
				var BackgroundColor = "";
				var GlowColor = "";
				var ForegroundColor = "";
				var SeekbarColor = "";
				if ( "" != BackgroundColorVal && "<?php echo $this->defaultsettings['dailymotion']['backgroundcolor']; ?>" != BackgroundColorVal ) var BackgroundColor = "background:" + BackgroundColorVal.replace(/#/, "") + ";";
				if ( "" != GlowColorVal && "<?php echo $this->defaultsettings['dailymotion']['glowcolor']; ?>" != GlowColorVal ) var GlowColor = "glow:" + GlowColorVal.replace(/#/, "") + ";";
				if ( "" != ForegroundColorVal && "<?php echo $this->defaultsettings['dailymotion']['foregroundcolor']; ?>" != ForegroundColorVal ) var ForegroundColor = "foreground:" + ForegroundColorVal.replace(/#/, "") + ";";
				if ( "" != SeekbarColorVal && "<?php echo $this->defaultsettings['dailymotion']['seekbarcolor']; ?>" != SeekbarColorVal ) var SeekbarColor = "special:" + SeekbarColorVal.replace(/#/, "") + ";";
				if ( true == jQuery("#vvq-dailymotion-autoplay").attr("checked") ) { var Autoplay = "1"; } else { var Autoplay = "0"; }
				if ( true == jQuery("#vvq-dailymotion-related").attr("checked") ) { var Related = "1"; } else { var Related = "0"; }
				swfobject.embedSWF(
					"http://www.dailymotion.com/swf/" + PreviewID + "&colors=" + BackgroundColor + GlowColor + ForegroundColor + SeekbarColor + "&autoPlay=" + Autoplay + "&related=" + Related,
					"vvqvideopreview",
					jQuery("#vvq-width").val(),
					jQuery("#vvq-height").val(),
					"9",
					vvqexpressinstall,
					vvqflashvars,
					vvqparams,
					vvqattributes
				);
			}
		});
	// ]]>
	</script>

	<input type="hidden" name="vvq-tab" value="dailymotion" />

	<table class="form-table">
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Preview', 'vipers-video-quicktags'); ?></th>
			<td>
				<div id="vvqvideopreview-container" style="min-height:<?php echo $this->settings['dailymotion']['height']; ?>px">
					<div id="vvqvideopreview"><?php _e('Loading...', 'vipers-video-quicktags'); ?></div>
				</div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><label for="vvq-previewurl"><?php _e('Preview URL', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-dailymotion-previewurl" id="vvq-previewurl" value="<?php echo esc_attr($this->settings['dailymotion']['previewurl']); ?>" class="vvqwide" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Dimensions', 'vipers-video-quicktags'); ?></th>
			<td>
				<input type="text" name="vvq-dailymotion-width" id="vvq-width" size="3" value="<?php echo esc_attr($this->settings['dailymotion']['width']); ?>" /> &#215;
				<input type="text" name="vvq-dailymotion-height" id="vvq-height" size="3" value="<?php echo esc_attr($this->settings['dailymotion']['height']); ?>" /> <?php _e('pixels', 'vipers-video-quicktags'); ?>
				<input type="hidden" id="vvq-aspectratio" value="0" />
				<input type="hidden" id="vvq-width-default" value="<?php echo esc_attr($this->defaultsettings['dailymotion']['width']); ?>" />
				<input type="hidden" id="vvq-height-default" value="<?php echo esc_attr($this->defaultsettings['dailymotion']['height']); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-dailymotion-backgroundcolor"><?php _e('Toolbar Background Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-dailymotion-backgroundcolor" id="vvq-dailymotion-backgroundcolor" value="<?php echo esc_attr($this->settings['dailymotion']['backgroundcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-dailymotion-backgroundcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-dailymotion-backgroundcolor-picker-wrap"><div class="vvq-picker" id="vvq-dailymotion-backgroundcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-dailymotion-glowcolor"><?php _e('Toolbar Glow Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-dailymotion-glowcolor" id="vvq-dailymotion-glowcolor" value="<?php echo esc_attr($this->settings['dailymotion']['glowcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-dailymotion-glowcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-dailymotion-glowcolor-picker-wrap"><div class="vvq-picker" id="vvq-dailymotion-glowcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-dailymotion-foregroundcolor"><?php _e('Button/Text Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-dailymotion-foregroundcolor" id="vvq-dailymotion-foregroundcolor" value="<?php echo esc_attr($this->settings['dailymotion']['foregroundcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-dailymotion-foregroundcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-dailymotion-foregroundcolor-picker-wrap"><div class="vvq-picker" id="vvq-dailymotion-foregroundcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-dailymotion-seekbarcolor"><?php _e('Seekbar Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-dailymotion-seekbarcolor" id="vvq-dailymotion-seekbarcolor" value="<?php echo esc_attr($this->settings['dailymotion']['seekbarcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-dailymotion-seekbarcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-dailymotion-seekbarcolor-picker-wrap"><div class="vvq-picker" id="vvq-dailymotion-seekbarcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Other', 'vipers-video-quicktags'); ?></th>
			<td>
				<label><input type="checkbox" name="vvq-dailymotion-autoplay" id="vvq-dailymotion-autoplay" value="1"<?php checked($this->settings['dailymotion']['autoplay'], 1); ?> /> <?php _e('Autoplay video (not recommended)', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-dailymotion-related" id="vvq-dailymotion-related" value="1"<?php checked($this->settings['dailymotion']['related'], 1); ?> /> <?php _e('Show related videos', 'vipers-video-quicktags'); ?></label>
			</td>
		</tr>
	</table>
<?php
			break; // End DailyMotion

		case 'vimeo': ?>
				jQuery("#vvqvideopreview-container").css( "min-height", jQuery("#vvq-height").val() + "px" );

				// Get the color, transform to uppercase, and then set the input with the uppercase value
				var ColorVal = jQuery("#vvq-vimeo-color").val().toUpperCase();
				jQuery("#vvq-vimeo-color").val(ColorVal);

				// Parse the URL
				var PreviewID = jQuery("#vvq-previewurl").val().match(/http:\/\/(www.vimeo|vimeo)\.com(\/|\/clip:)(\d+)(.*?)/);
				if ( !PreviewID ) {
					jQuery("#vvqvideopreview-container").html('<div id="vvqvideopreview"><?php echo $this->esc_js( __("Unable to parse preview URL. Please make sure it's the <strong>full</strong> URL and a valid one at that.", 'vipers-video-quicktags') ); ?></div>');
					return;
				}
				var PreviewID = PreviewID[3];

				// Generate the URL and do the preview
				var Color = "";
				if ( "" != ColorVal && "<?php echo $this->defaultsettings['vimeo']['color']; ?>" != ColorVal ) var Color = "&color=" + ColorVal.replace(/#/, "");
				if ( true == jQuery("#vvq-vimeo-portrait").attr("checked") ) { var Portrait = "1"; } else { var Portrait = "0"; }
				if ( true == jQuery("#vvq-vimeo-title").attr("checked") ) { var Title = "1"; } else { var Title = "0"; }
				if ( true == jQuery("#vvq-vimeo-byline").attr("checked") ) { var Byline = "1"; } else { var Byline = "0"; }
				if ( true == jQuery("#vvq-vimeo-fullscreen").attr("checked") ) { var Fullscreen = "1"; } else { var Fullscreen = "0"; }
				swfobject.embedSWF(
					"http://www.vimeo.com/moogaloop.swf?server=www.vimeo.com&clip_id=" + PreviewID + Color + "&show_portrait=" + Portrait + "&show_title=" + Title + "&show_byline=" + Byline + "&fullscreen=" + Fullscreen,
					"vvqvideopreview",
					jQuery("#vvq-width").val(),
					jQuery("#vvq-height").val(),
					"9",
					vvqexpressinstall,
					vvqflashvars,
					vvqparams,
					vvqattributes
				);
			}


			/* Color presets which is also based on code stolen from Ozh's "Liz Comment Counter" */

			// Make the presets
			VVQMakeVimeoPresets();
			function VVQMakeVimeoPresets() {
				var presets = {
					"<?php echo esc_js( __('Default (Blue)', 'vipers-video-quicktags') ); ?>": "<?php echo $this->defaultsettings['vimeo']['color']; ?>",
					"<?php echo esc_js( __('Orange', 'vipers-video-quicktags') ); ?>": "#FF9933",
					"<?php echo esc_js( __('Lime', 'vipers-video-quicktags') ); ?>": "#C9FF23",
					"<?php echo esc_js( __('Fuschia', 'vipers-video-quicktags') ); ?>": "#FF0179",
					"<?php echo esc_js( __('White', 'vipers-video-quicktags') ); ?>": "#FFFFFF"
				};
				jQuery("#vvq-vimeo-presets").html("");
				for (var i in presets) {
					var color = presets[i];
					jQuery("#vvq-vimeo-presets").append('<div class="vvq-preset" style="background:'+color+';border:10px solid '+color+';" title="'+i+'"></div> ');
				}
			}

			// Update the color inputs when a preset is clicked
			jQuery(".vvq-preset").click(function(){
				var color = jQuery(this).css('backgroundColor');

				// Opera and IE return hex already, but we need to convert RGB to hex for Firefox, Safari, etc.
				if ( -1 == color.search(/#/) ) {
					var color = VVQRGBtoHex( color );
				}

				if (color != undefined) { jQuery('#vvq-vimeo-color').val(color).keyup(); }

				VVQUpdatePreview();
			}).tTips();
		});
	// ]]>
	</script>

	<input type="hidden" name="vvq-tab" value="vimeo" />

	<table class="form-table">
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Preview', 'vipers-video-quicktags'); ?></th>
			<td>
				<div id="vvqvideopreview-container" style="min-height:<?php echo $this->settings['vimeo']['height']; ?>px">
					<div id="vvqvideopreview"><?php _e('Loading...', 'vipers-video-quicktags'); ?></div>
				</div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><label for="vvq-previewurl"><?php _e('Preview URL', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-vimeo-previewurl" id="vvq-previewurl" value="<?php echo esc_attr($this->settings['vimeo']['previewurl']); ?>" class="vvqwide" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Dimensions', 'vipers-video-quicktags'); ?></th>
			<td>
				<input type="text" name="vvq-vimeo-width" id="vvq-width" size="3" value="<?php echo esc_attr($this->settings['vimeo']['width']); ?>" /> &#215;
				<input type="text" name="vvq-vimeo-height" id="vvq-height" size="3" value="<?php echo esc_attr($this->settings['vimeo']['height']); ?>" /> <?php _e('pixels', 'vipers-video-quicktags'); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="vvq-vimeo-aspectratio" id="vvq-aspectratio" value="1"<?php checked($this->settings['vimeo']['aspectratio'], 1); ?> /> <?php _e('Maintain aspect ratio', 'vipers-video-quicktags'); ?></label>
				<input type="hidden" id="vvq-width-default" value="<?php echo esc_attr($this->defaultsettings['vimeo']['width']); ?>" />
				<input type="hidden" id="vvq-height-default" value="<?php echo esc_attr($this->defaultsettings['vimeo']['height']); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-vimeo-color"><?php _e('Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-vimeo-color" id="vvq-vimeo-color" value="<?php echo esc_attr($this->settings['vimeo']['color']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-vimeo-color-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-vimeo-color-picker-wrap"><div class="vvq-picker" id="vvq-vimeo-color-picker"></div></div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Color Presets', 'vipers-video-quicktags'); ?></th>
			<td id="vvq-vimeo-presets">&nbsp;</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('On-Screen Info', 'vipers-video-quicktags'); ?></th>
			<td>
				<label><input type="checkbox" name="vvq-vimeo-portrait" id="vvq-vimeo-portrait" value="1"<?php checked($this->settings['vimeo']['portrait'], 1); ?> /> <?php _e('Portrait', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-vimeo-title" id="vvq-vimeo-title" value="1"<?php checked($this->settings['vimeo']['title'], 1); ?> /> <?php _e('Title', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-vimeo-byline" id="vvq-vimeo-byline" value="1"<?php checked($this->settings['vimeo']['byline'], 1); ?> /> <?php _e('Byline', 'vipers-video-quicktags'); ?></label><br />
				<label><input type="checkbox" name="vvq-vimeo-fullscreen" id="vvq-vimeo-fullscreen" value="1"<?php checked($this->settings['vimeo']['fullscreen'], 1); ?> /> <?php _e('Allow fullscreen', 'vipers-video-quicktags'); ?></label><br />
			</td>
		</tr>
	</table>
<?php
			break; // End Vimeo

		case 'flv': ?>
				jQuery("#vvqvideopreview-container").css( "min-height", jQuery("#vvq-height").val() + "px" );

				// Get the colors, transform to uppercase, and then set the inputs with the uppercase value
				var BackColorVal   = jQuery("#vvq-flv-backcolor").val().toUpperCase();
				var FrontColorVal  = jQuery("#vvq-flv-frontcolor").val().toUpperCase();
				var LightColorVal  = jQuery("#vvq-flv-lightcolor").val().toUpperCase();
				var ScreenColorVal = jQuery("#vvq-flv-screencolor").val().toUpperCase();
				jQuery("#vvq-flv-backcolor").val(BackColorVal);
				jQuery("#vvq-flv-frontcolor").val(FrontColorVal);
				jQuery("#vvq-flv-lightcolor").val(LightColorVal);
				jQuery("#vvq-flv-screencolor").val(ScreenColorVal);

				// Generate the URL and do the preview
				var vvqflvparams = new Array();
				vvqflvparams["file"] = jQuery("#vvq-previewurl").val();
				vvqflvparams["image"] = jQuery("#vvq-previewurl").val().replace(/\.flv/, ".jpg");
				if ( true == jQuery("#vvq-flv-customcolors").attr("checked") ) {
					vvqflvparams["backcolor"] = BackColorVal.replace(/#/, "");
					vvqflvparams["frontcolor"] = FrontColorVal.replace(/#/, "");
					vvqflvparams["lightcolor"] = LightColorVal.replace(/#/, "");
					vvqflvparams["screencolor"] = ScreenColorVal.replace(/#/, "");
				}
				vvqflvparams["volume"] = "100";
				vvqflvparams["bufferlength"] = "15";
				vvqflvparams["skin"] = "<?php echo content_url('/jw-flv-player/skins/'); ?>" + jQuery("#vvq-flv-skin").val() + ".swf";
				vvqflvparams["wmode"] = "transparent";
				vvqflvparams["allowfullscreen"] = "true";
<?php
					// Handle the advanced parameters (these require a page reload to be updated)
					if ( !empty($this->settings['flv']['flashvars']) ) {
						$flashvars = $this->parse_str_periods( $this->settings['flv']['flashvars'] );
						foreach ( (array) $flashvars as $key => $value )
							echo '				vvqflvparams["' . $key . '"] = "' . $value . '";' . "\n";
					}
?>

				swfobject.embedSWF(
					"<?php echo content_url('/jw-flv-player/player.swf'); ?>",
					"vvqvideopreview",
					jQuery("#vvq-width").val(),
					jQuery("#vvq-height").val(),
					"9",
					vvqexpressinstall,
					vvqflvparams,
					vvqparams,
					vvqattributes
				);
			}

			jQuery("#vvq-flv-customcolors").change(function(){
				if ( true != jQuery(this).attr("checked") ) {
					jQuery(".vvq-flv-customcolor").hide();
				} else {
					jQuery(".vvq-flv-customcolor").show();
				}
			});

			if ( true != jQuery("#vvq-flv-customcolors").attr("checked") ) {
				jQuery(".vvq-flv-customcolor").hide();
			}
		});
	// ]]>
	</script>

	<input type="hidden" name="vvq-tab" value="flv" />

	<table class="form-table">
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><?php _e('Preview', 'vipers-video-quicktags'); ?></th>
			<td>
				<div id="vvqvideopreview-container" style="min-height:<?php echo $this->settings['flv']['height']; ?>px">
					<div id="vvqvideopreview"><?php _e('Loading...', 'vipers-video-quicktags'); ?></div>
				</div>
			</td>
		</tr>
		<tr valign="top" class="hide-if-no-js">
			<th scope="row"><label for="vvq-previewurl"><?php _e('Preview URL', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-flv-previewurl" id="vvq-previewurl" value="<?php echo esc_attr($this->settings['flv']['previewurl']); ?>" size="50" class="vvqwide" /><br />
				<?php _e('The default preview video is the most recent featured video on YouTube. You can paste in the URL to a FLV file of your own if you wish.', 'vipers-video-quicktags'); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('Dimensions', 'vipers-video-quicktags'); ?></th>
			<td>
				<input type="text" name="vvq-flv-width" id="vvq-width" size="3" value="<?php echo esc_attr($this->settings['flv']['width']); ?>" /> &#215;
				<input type="text" name="vvq-flv-height" id="vvq-height" size="3" value="<?php echo esc_attr($this->settings['flv']['height']); ?>" />
				<?php _e("pixels (if you're using the default skin, add 20 to the height for the control bar)", 'vipers-video-quicktags'); ?> 
				<input type="hidden" id="vvq-aspectratio" value="0" />
				<input type="hidden" id="vvq-width-default" value="<?php echo esc_attr($this->defaultsettings['flv']['width']); ?>" />
				<input type="hidden" id="vvq-height-default" value="<?php echo esc_attr($this->defaultsettings['flv']['height']); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-flv-skin"><?php _e('Skin', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<select name="vvq-flv-skin" id="vvq-flv-skin">
<?php
					foreach ( $this->flvskins as $skin => $name ) {
						echo '					<option value="' . $skin . '"';
						selected( $this->settings['flv']['skin'], $skin );
						echo '>' . htmlspecialchars( $name ) . "</option>\n";
					}
?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-flv-customcolors"><?php _e('Use Custom Colors', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<label><input type="checkbox" name="vvq-flv-customcolors" id="vvq-flv-customcolors" value="1"<?php checked($this->settings['flv']['customcolors'], 1); ?> /></label>
			</td>
		</tr>
		<tr valign="top" class="vvq-flv-customcolor">
			<th scope="row"><label for="vvq-flv-backcolor"><?php _e('Control Bar Background Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-flv-backcolor" id="vvq-flv-backcolor" value="<?php echo esc_attr($this->settings['flv']['backcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-flv-backcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-flv-backcolor-picker-wrap"><div class="vvq-picker" id="vvq-flv-backcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top" class="vvq-flv-customcolor">
			<th scope="row"><label for="vvq-flv-frontcolor"><?php _e('Icon/Text Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-flv-frontcolor" id="vvq-flv-frontcolor" value="<?php echo esc_attr($this->settings['flv']['frontcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-flv-frontcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-flv-frontcolor-picker-wrap"><div class="vvq-picker" id="vvq-flv-frontcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top" class="vvq-flv-customcolor">
			<th scope="row"><label for="vvq-flv-lightcolor"><?php _e('Icon/Text Hover Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-flv-lightcolor" id="vvq-flv-lightcolor" value="<?php echo esc_attr($this->settings['flv']['lightcolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-flv-lightcolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-flv-lightcolor-picker-wrap"><div class="vvq-picker" id="vvq-flv-lightcolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top" class="vvq-flv-customcolor">
			<th scope="row"><label for="vvq-flv-screencolor"><?php _e('Video Background Color', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-flv-screencolor" id="vvq-flv-screencolor" value="<?php echo esc_attr($this->settings['flv']['screencolor']); ?>" maxlength="7" size="7" class="vvqnarrow" />
				&nbsp;<span class="vvq-swatch hide-if-no-js" id="vvq-flv-screencolor-swatch" title="<?php _e('Pick a color', 'vipers-video-quicktags'); ?>">&nbsp;</span>
				<div class="vvq-picker-wrap hide-if-no-js" id="vvq-flv-screencolor-picker-wrap"><div class="vvq-picker" id="vvq-flv-screencolor-picker"></div></div>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-flv-flashvars"><?php _e('Advanced Parameters', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-flv-flashvars" id="vvq-flv-flashvars" value="<?php echo esc_attr($this->settings['flv']['flashvars']); ?>" size="50" class="vvqwide" /><br />
				<?php printf( __('A <a href="%1$s">query-string style</a> list of <a href="%2$s">additional parameters</a> to pass to the player. Example: %3$s', 'vipers-video-quicktags'), 'http://codex.wordpress.org/Template_Tags/How_to_Pass_Tag_Parameters#Tags_with_query-string-style_parameters', 'http://code.jeroenwijering.com/trac/wiki/FlashVars', '<code>autostart=true&amp;playlist=bottom&amp;bufferlength=15</code>' ); ?><br />
				<?php _e('You will need to press &quot;Save Changes&quot; for these parameters to take effect due to my moderate Javascript skills.', 'vipers-video-quicktags'); ?>
			</td>
		</tr>
	</table>
<?php
			break; // End FLV

		case 'additional': ?>
	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function(){
			jQuery("#vvq-alignment").change(function(){
				var alignments = {
					<?php
					$alignments = array();
					foreach ( $this->cssalignments as $value => $css )
						$alignments[] = '"' . $value . '": "' . $css . '"';
					echo implode( ",\n\t\t\t\t\t", $alignments );
?>

				};
				jQuery("#vvq-css-align").html(alignments[jQuery(this).val()]);
			});
			jQuery("#vvq-customcss-wrap").hide();
			jQuery("#vvq-customcss-toggle").css({ display:"block", cursor:"pointer" }).click(function(){
				jQuery(this).slideUp();
				jQuery("#vvq-customcss-wrap").slideDown();
			});
		});
	// ]]>
	</script>

	<input type="hidden" name="vvq-tab" value="additional" />

	<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="vvq-alignment"><?php _e('Video Alignment', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<select name="vvq-alignment" id="vvq-alignment">
<?php
					$alignments = array(
						'left'       => __('Left', 'vipers-video-quicktags'),
						'center'     => __('Center', 'vipers-video-quicktags'),
						'right'      => __('Right', 'vipers-video-quicktags'),
						'floatleft'  => __('Float Left', 'vipers-video-quicktags'),
						'floatright' => __('Float Right', 'vipers-video-quicktags'),
					);
					foreach ( $alignments as $alignment => $name ) {
						echo '					<option value="' . $alignment . '"';
						selected( $this->settings['alignment'], $alignment );
						echo '>' . $name . "</option>\n";
					}
?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-tinymceline"><?php _e('Show Buttons In Editor On Line Number', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<select name="vvq-tinymceline" id="vvq-tinymceline">
<?php
					$alignments = array(
						1 => __('1 (Default)', 'vipers-video-quicktags'),
						2 => __('2 (Kitchen Sink Toolbar)', 'vipers-video-quicktags'),
						3 => __('3 (New Line)', 'vipers-video-quicktags'),
					);
					foreach ( $alignments as $alignment => $name ) {
						echo '					<option value="' . $alignment . '"';
						selected( $this->settings['tinymceline'], $alignment );
						echo '>' . $name . "</option>\n";
					}
?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-customfeedtext"><?php _e('Feed Text', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<input type="text" name="vvq-customfeedtext" id="vvq-customfeedtext" value="<?php echo esc_attr($this->settings['customfeedtext']); ?>" size="50" class="vvqwide" /><br />
				<?php printf( __("Optionally enter some custom text to show in your feed in place of videos (as you can't embed videos in feeds). If left blank, it will default to:<br />%s", 'vipers-video-quicktags'), '<code>' . htmlspecialchars($this->customfeedtext) . '</code>' ); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="vvq-videofile-usewmp"><?php _e('Windows Media Player', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<label><input type="checkbox" name="vvq-videofile-usewmp" id="vvq-videofile-usewmp" value="1"<?php checked($this->settings['videofile']['usewmp'], 1); ?> /> <?php _e('Attempt to use Windows Media Player for regular video file playback for Windows users', 'vipers-video-quicktags'); ?></label>
			</td>
		</tr>
	</table>

	<h3><?php _e('Advanced Settings', 'vipers-video-quicktags'); ?></h3>

	<p><?php _e("If you don't know what you're doing, you can safely ignore this section.", 'vipers-video-quicktags'); ?></p>

	<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="vvq-quicktime-dynamicload"><?php _e('Dynamic QTObject Loading', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<label><input type="checkbox" name="vvq-quicktime-dynamicload" id="vvq-quicktime-dynamicload" value="1"<?php checked($this->settings['quicktime']['dynamicload'], 1); ?> /> <?php _e("Only load the Javascript file if it's needed. Disable this to post Quicktime videos in the sidebar text widget.", 'vipers-video-quicktags'); ?></label>
			</td>
		</tr>
<?php if ( empty($wpmu_version) ) : ?>
		<tr valign="top">
			<th scope="row"><label for="vvq-customcss"><?php _e('Custom CSS', 'vipers-video-quicktags'); ?></label></th>
			<td>
				<span id="vvq-customcss-toggle" class="hide-if-no-js"><?php _e('Want to easily set some custom CSS to control the display of the videos? Then just click this text to expand this option.', 'vipers-video-quicktags'); ?></span>
				<div id="vvq-customcss-wrap">
					<?php printf( __('You can enter custom CSS in the box below. It will be outputted after the default CSS you see listed which can be overridden by using %1$s. For help and examples, see the <a href="%2$s">Help</a> tab.', 'vipers-video-quicktags'), '<code>!important</code>', admin_url('options-general.php?page=vipers-video-quicktags&amp;tab=help#vvq-customcss') ); ?>
					<pre><?php
						$aligncss = str_replace( '\n', "\n", $this->cssalignments[$this->settings['alignment']] );
						echo str_replace( '/* alignment CSS placeholder */', "<span id='vvq-css-align'>$aligncss</span>", $this->standardcss );
					?></pre>
					<textarea name="vvq-customcss" id="vvq-customcss" cols="60" rows="10" style="font-size: 12px;" class="vvqwide code"><?php echo esc_attr( $this->settings['customcss'] ); ?></textarea>
				</div>
			</td>
		</tr>
<?php endif; ?>
	</table>

<?php
			break; // End additional

		case 'help': ?>
	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function(){
			jQuery("#vvq-help").find("div").hide();
			jQuery(".vvq-help-title").css('cursor', 's-resize').click(function(){
				jQuery(this).parent("li").children("div").slideToggle();
			});
			jQuery("#vvq-showall").css('cursor', 'pointer').click(function(){
				jQuery("#vvq-help").children("li").children("div").slideDown();
			});

			// Look for HTML anchor in URL and expand if found
			var anchor = self.document.location.hash.substring(1);
			if ( anchor ) {
				jQuery("#"+anchor).children("div").show();
				location.href = "#"+anchor; // Rescroll
			}

			jQuery(".expandolink").click(function(){
				var id = jQuery(this).attr("href").replace(/#/, "");
				jQuery("#"+id).children("div").show();
				location.href = "#"+anchor; // Rescroll
			});
		});
	// ]]>
	</script>

	<p id="vvq-showall" class="hide-if-no-js"><?php _e('Click on a question to see the answer or click this text to expand all answers.', 'vipers-video-quicktags'); ?></p>

	<ul id="vvq-help">
		<li>
			<p class="vvq-help-title"><?php _e("Videos aren't showing up on my blog, only links to the videos are instead. What gives?", 'vipers-video-quicktags'); ?></p>
			<div>
<?php if ( empty($wpmu_version) ) : ?>
				<p><?php _e('Here are five common causes:', 'vipers-video-quicktags'); ?></p>
				<ol>
					<li><?php printf( __('Are you running Firefox and AdBlock? AdBlock and certain block rules can prevent some videos, namely YouTube-hosted ones, from loading. Disable AdBlock or switch to <a href="%s">AdBlock Plus</a>.', 'vipers-video-quicktags'), 'https://addons.mozilla.org/en-US/firefox/addon/1865' ); ?></li>
					<li><?php _e("Your theme could be missing <code>&lt;?php wp_head();?&gt;</code> inside of it's <code>&lt;head&gt;</code> which means the required Javascript file can't automatically be added. If this is the case, you may be get an alert window popping when you attempt to view a post with a video in it (assuming your problem is not also #3). Edit your theme's <code>header.php</code> file and add it right before <code>&lt;/head&gt;</code>", 'vipers-video-quicktags'); ?></li>
					<li><?php printf( __('You may have Javascript disabled. This plugin embeds videos via Javascript to ensure the best experience. Please <a href="%s">enable it</a>.', 'vipers-video-quicktags'), 'http://www.google.com/support/bin/answer.py?answer=23852' ); ?></li>
					<li><?php printf( __('You may not have the latest version of Flash installed. Please <a href="%s">install it</a>.', 'vipers-video-quicktags'), 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash' ); ?></li>
				</ol>
<?php else : ?>
				<ul>
					<li><?php printf( __('Are you running Firefox and AdBlock? AdBlock and certain block rules can result in the videos, namely YouTube-hosted ones, not loading. Disable AdBlock or switch to <a href="%s">AdBlock Plus</a>.', 'vipers-video-quicktags'), 'https://addons.mozilla.org/en-US/firefox/addon/1865' ); ?></li>
					<li><?php printf( __('You may have Javascript disabled. This plugin embeds videos via Javascript to ensure the best experience. Please <a href="%s">enable it</a>.', 'vipers-video-quicktags'), 'http://www.google.com/support/bin/answer.py?answer=23852' ); ?></li>
					<li><?php printf( __('You may not have the latest version of Flash installed. Please <a href="%s">install it</a>.', 'vipers-video-quicktags'), 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash' ); ?></li>
				</ul>
<?php endif; ?>
			</div>
		</li>
		<li id="vvq-viddlerhelp">
			<p class="vvq-help-title"><?php _e('Where do I get the code from to embed a Viddler video?', 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php _e('Since the URL to a video on Viddler has nothing in common with the embed URL, you must use WordPress.com-style format. Go to the video on Viddler, click the &quot;Embed This&quot; button below the video, and then select the WordPress.com format. You can paste that code directly into a post or Page and it will embed the video.', 'vipers-video-quicktags'); ?></p>
				<p><img src="<?php echo esc_url( plugins_url( 'resources/images/help_viddler.png', __FILE__ ) ); ?>" alt="<?php esc_attr_e('Viddler', 'vipers-video-quicktags'); ?>" width="572" height="543" /></p>
			</div>
		</li>
		<li id="vvq-bliptvhelp">
			<p class="vvq-help-title"><?php _e('Where do I get the code from to embed a Blip.tv video?', 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php _e('Since the URL to a video on Blip.tv has nothing in common with the embed URL, you must use WordPress.com-style format. Go to the video on Blip.tv, click on the yellow &quot;Share&quot; dropdown to the right of the video and select &quot;Embed&quot;. Next select &quot;WordPress.com&quot; from the &quot;Show Player&quot; dropdown. Finally press &quot;Go&quot;. You can paste that code directly into a post or Page and it will embed the video.', 'vipers-video-quicktags'); ?></p>
				<p><img src="<?php echo esc_url( plugins_url( 'resources/images/help_bliptv.png', __FILE__ ) ); ?>" alt="<?php esc_attr_e('Blip.tv', 'vipers-video-quicktags'); ?>" width="317" height="240" /></p>
				<p><?php _e('<strong>NOTE:</strong> Ignore the warning message. This plugin adds support for the WordPress.com so it <strong>will</strong> work on your blog.', 'vipers-video-quicktags'); ?></p>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php _e("Why doesn't this plugin support a site I want to embed videos from?", 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php _e("There's a couple likely reasons:", 'vipers-video-quicktags'); ?></p>
				<ul>
					<li><?php _e("The website may use an embed URL that has nothing in common with the URL in your address bar. This means that even if you give this plugin the URL to the video, it has no easy way of figuring out the embed URL.", 'vipers-video-quicktags'); ?></li>
					<li><?php _e("The website may be too small, fringe case, etc. to be worth supporting. There's no real point in this plugin adding support for a video site that only one or two people will use.", 'vipers-video-quicktags'); ?></li>
					<li><?php printf( __("I may have just never heard of the site. Please make a thread on <a href='%s'>my forums</a> with an example link to a video on the site and I'll take a look at it.", 'vipers-video-quicktags'), 'http://www.viper007bond.com/wordpress-plugins/forums/viewforum.php?id=23' ); ?></li>
				</ul>
				<p><?php printf( __('This plugin does have the ability to embed any Flash file though. See the <a href="%s" class="expandolink">Flash shortcode question</a> for details on that.', 'vipers-video-quicktags'), '#vvq-flashcodehelp'); ?></p>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php _e("There are still red bits (hovering over buttons) in my YouTube embed. What gives?", 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php _e('YouTube does not provide a method to change that color.', 'vipers-video-quicktags'); ?></p>
			</div>
		</li>
		<li id="vvq-parameters">
			<p class="vvq-help-title"><?php _e('How can I change the size, colors, etc. for a specific video?', 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php printf( __('You can control many thing via the WordPress shortcode system that you use to embed videos in your posts. Shortcodes are similiar to <a href="%s">BBCode</a>. Here are some example shortcodes:', 'vipers-video-quicktags'), 'http://en.wikipedia.org/wiki/BBCode' ); ?></p>
				<ul>
					<li><code>[youtube color1=&quot;FF0000&quot; color2=&quot;00FF00&quot; autoplay=&quot;1&quot;]http://www.youtube.com/watch?v=stdJd598Dtg[/youtube]</code></li>
					<li><code>[googlevideo width=&quot;400&quot; height=&quot;300&quot;]http://video.google.com/videoplay?docid=-6006084025483872237[/youtube]</code></li>
					<li><code>[vimeo color=&quot;FFFF00&quot;]http://www.vimeo.com/240975[/youtube]</code></li>
				</ul>
				<p><?php _e('Any value that is not entered will fall back to the default.', 'vipers-video-quicktags'); ?></p>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('YouTube', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player border color in hex', 'vipers-video-quicktags'), '<code>color1</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player fill color in hex', 'vipers-video-quicktags'), '<code>color2</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show a border or not (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>border</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show related videos, URL, embed details, etc. at the end of playback (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>rel</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show fullscreen button (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>fs</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; automatically start playing (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>autoplay</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; loop playback (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>loop</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Google Video', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; automatically start playing (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>autoplay</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('DailyMotion', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; toolbar background color in hex', 'vipers-video-quicktags'), '<code>backgroundcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; toolbar glow color in hex', 'vipers-video-quicktags'), '<code>glowcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; button/text color in hex', 'vipers-video-quicktags'), '<code>foregroundcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; seekbar color in hex', 'vipers-video-quicktags'), '<code>seekbarcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; automatically start playing (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>autoplay</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show related video (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>related</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Vimeo', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player color in hex', 'vipers-video-quicktags'), '<code>color</code>' ); ?></li>
					<li><?php printf( __("%s &#8212; show uploader's picture (<code>0</code> or <code>1</code>)", 'vipers-video-quicktags'), '<code>portrait</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show video title (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>title</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show video author (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>byline</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show fullscreen button (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>fullscreen</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Veoh', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; automatically start playing (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>autoplay</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Viddler', 'vipers-video-quicktags') ); ?></p>
			<div>
				<p><?php _e("Since the WordPress.com shortcode format is used for embedding Viddler videos, there are no customizable parameters for the Viddler shortcode. The WordPress.com shortcode must be used as the URL of the video and the video's embed URL share nothing in common.", 'vipers-video-quicktags'); ?></p>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Flickr Video', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; show video details (<code>0</code> or <code>1</code>), defaults to 1', 'vipers-video-quicktags'), '<code>showinfobox</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php _e('What are the available parameters for the Metacafe, Blip.tv, IFILM/Spike, and MySpace shortcodes?', 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php _e('All of these video formats only support the following:', 'vipers-video-quicktags'); ?></p>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Flash Video (FLV)', 'vipers-video-quicktags') ); ?></p>
			<div>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; the URL to the preview image, defaults to the same URL as the video file but <code>.jpg</code> instead of <code>.flv</code>', 'vipers-video-quicktags'), '<code>image</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player control bar background color in hex', 'vipers-video-quicktags'), '<code>backcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player icon/text color in hex', 'vipers-video-quicktags'), '<code>frontcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player icon/text hover color in hex', 'vipers-video-quicktags'), '<code>lightcolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; player video background color in hex', 'vipers-video-quicktags'), '<code>screencolor</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; volume percentage, defaults to <code>100</code>', 'vipers-video-quicktags'), '<code>volume</code>' ); ?></li>
					<li><?php printf( __('%1$s &#8212; %2$s', 'vipers-video-quicktags'), '<code>flashvars</code>', sprintf( __('A <a href="%1$s">query-string style</a> list of <a href="%2$s">additional parameters</a> to pass to the player. Example: %3$s', 'vipers-video-quicktags'), 'http://codex.wordpress.org/Template_Tags/How_to_Pass_Tag_Parameters#Tags_with_query-string-style_parameters', 'http://code.jeroenwijering.com/trac/wiki/FlashVars', '<code>autostart=true&amp;playlist=bottom&amp;bufferlength=15</code>' ) ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('Quicktime', 'vipers-video-quicktags') ); ?></p>
			<div>
				<p><?php _e("The results of embedding a Quicktime video can very widely depending on the user's computer and what software they have installed, but if you must embed a Quicktime video here are the parameters:", 'vipers-video-quicktags'); ?></p>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; automatically start playing (<code>0</code> or <code>1</code>), defaults to 0', 'vipers-video-quicktags'), '<code>autostart</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; use click-to-play placeholder image (<code>0</code> or <code>1</code>), defaults to 0', 'vipers-video-quicktags'), '<code>useplaceholder</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; the URL to the placeholder image, defaults to the same URL as the video file but <code>.jpg</code> instead of <code>.mov</code>', 'vipers-video-quicktags'), '<code>placeholder</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; automatically start playing (<code>0</code> or <code>1</code>), defaults to 0', 'vipers-video-quicktags'), '<code>controller</code>' ); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<p class="vvq-help-title"><?php printf( __('What are the available parameters for the %s shortcode?', 'vipers-video-quicktags'), __('video file', 'vipers-video-quicktags') ); ?></p>
			<div>
				<p><?php _e("The results of embedding a generic video can very widely depending on the user's computer and what software they have installed, but if you must embed a generic video here are the parameters:", 'vipers-video-quicktags'); ?></p>
				<ul>
					<li><?php printf( __('%s &#8212; width in pixels', 'vipers-video-quicktags'), '<code>width</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; height in pixels', 'vipers-video-quicktags'), '<code>height</code>' ); ?></li>
					<li><?php printf( __('%s &#8212; attempt to use Windows Media Player for users of Windows (<code>0</code> or <code>1</code>)', 'vipers-video-quicktags'), '<code>usewmp</code>' ); ?></li>
				</ul>
			</div>
		</li>
<?php if ( empty($wpmu_version) ) : ?>
		<li id="vvq-customcss">
			<p class="vvq-help-title"><?php _e("What's this &quot;Custom CSS&quot; thing on the &quot;Additional Settings&quot; tab for?", 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php _e("It's a quick and easy way to control the look of videos posted on your site without having to go in and edit the <code>style.css</code> file. Just enter some CSS of your own into the box and it will be outputted in the header of your theme.", 'vipers-video-quicktags'); ?></p>
				<p><?php _e('Some examples:', 'vipers-video-quicktags'); ?></p>
				<ul>
					<li><?php printf( __('Give a red border to all videos: %s', 'vipers-video-quicktags'), '<code>.vvqbox { border: 5px solid red; padding: 5px; }</code>' ); ?></li>
					<li><?php printf( __('Float only YouTube videos to the left: %s', 'vipers-video-quicktags'), '<code>.vvqyoutube { float: left; margin: 10px 10px 10px 0; }</code>' ); ?></li>
				</ul>
			</div>
		</li>
<?php endif; ?>
		<li id="vvq-flashcodehelp">
			<p class="vvq-help-title"><?php _e("How can I embed a generic Flash file or a video from a website this plugin doesn't support?", 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php printf( __('This plugin has a %s shortcode that can be used to embed <strong>any</strong> Flash file. Here is the format:', 'vipers-video-quicktags'), '<code>[flash]</code>' ); ?></p>
				<p><code>[flash width=&quot;123&quot; height=&quot;456&quot; flashvars=&quot;name1=value1&name2=value2&quot;]http://site.com/path/to/file.swf[/flash]</code></p>
			</div>
		</li>
		<li id="vvq-videofilepoor">
			<p class="vvq-help-title"><?php _e("Why does your plugin embed Quicktime and other regular video files so poorly? Can't you do a better job?", 'vipers-video-quicktags'); ?></p>
			<div>
				<p><?php printf( __('Embedding Quiktime and other regular video files is a major pain in the ass and it\'s incredibly hard to get it to work in all browsers and operating systems. I <strong>strongly</strong> suggest converting the video to <a href="%1$s">Flash Video</a> format or even <a href="%2$s">H.264</a> format and then using the Flash Video (FLV) embed type. There are free converters out there for both formats and doing so will create a much better experience for your visitors.', 'vipers-video-quicktags'), 'http://en.wikipedia.org/wiki/Flash_Video', 'http://en.wikipedia.org/wiki/H.264/MPEG-4_AVC' ); ?></p>
			</div>
		</li>
	</ul>

<?php
			break; // End help

		case 'credits': ?>
	<p><?php _e('This plugin uses many scripts and packages written by others. They deserve credit too, so here they are in no particular order:', 'vipers-video-quicktags'); ?></p>

	<ul>
		<li><?php printf( __('The authors of and contributors to <a href="%s">SWFObject</a> which is used to embed the Flash-based videos.', 'vipers-video-quicktags'), 'http://code.google.com/p/swfobject/' ); ?></li>
		<li><?php printf( __('<strong><a href="%1$s">Jeroen Wijering</a></strong> for writing the <a href="%2$s">JW FLV Media Player</a> which is used for FLV playback.', 'vipers-video-quicktags'), 'http://www.jeroenwijering.com/', 'http://www.jeroenwijering.com/?item=JW_FLV_Media_Player' ); ?></li>
		<li><?php printf( __('<strong><a href="%1$s">Steven Wittens</a></strong> for writing <a href="%2$s">Farbtastic</a>, the fantastic Javascript color picker used in this plugin.', 'vipers-video-quicktags'), 'http://acko.net/', 'http://acko.net/dev/farbtastic' ); ?></li>
		<li><?php printf( __('<strong><a href="%1$s">Ozh</a></strong> for writing his <a href="%2$s">Liz Comment Counter</a> plugin which introduced me to Farbtastic and provided me with some Javascript to base my color picker and color preset code on.', 'vipers-video-quicktags'), 'http://planetozh.com/', 'http://planetozh.com/blog/my-projects/liz-strauss-comment-count-badge-widget-wordpress/' ); ?></li>
		<li><?php printf( __('<strong><a href="%s">Andrew Ozz</a></strong> for helping me out with some TinyMCE-related Javascript and in turn saving me a ton of time.', 'vipers-video-quicktags'), 'http://www.laptoptips.ca/' ); ?></li>
		<li><?php printf( __('<strong><a href="%1$s">Geoff Stearns</a></strong> for writing <a href="%2$s">QTObject</a> which is used to embed Quicktime videos.', 'vipers-video-quicktags'), 'http://www.deconcept.com/', 'http://blog.deconcept.com/2005/01/26/web-standards-compliant-javascript-quicktime-detect-and-embed/' ); ?></li>
		<li><?php printf( __('<strong><a href="%1$s">Mark James</a></strong> for creating the <a href="%2$s">Silk icon pack</a>. This plugin uses at least one of the icons from that pack.', 'vipers-video-quicktags'), 'http://www.famfamfam.com/', 'http://www.famfamfam.com/lab/icons/silk/' ); ?></li>
		<li><?php printf( __('The authors of and contributors to <a href="%s">jQuery</a>, the awesome Javascript package used by WordPress.', 'vipers-video-quicktags'), 'http://jquery.com/' ); ?></li>
		<li><?php printf( __("Everyone who's helped create <a href='%s'>WordPress</a> as without it and it's excellent API, this plugin obviously wouldn't exist.", 'vipers-video-quicktags'), 'http://jquery.com/' ); ?></li>
		<li><?php _e('Everyone who has provided bug reports and feature suggestions for this plugin.', 'vipers-video-quicktags'); ?></li>
	</ul>

	<p><?php _e('The following people have been nice enough to translate this plugin into other languages:', 'vipers-video-quicktags'); ?></p>

	<ul>
		<li><?php printf( __('<strong>Belorussian:</strong> %s', 'vipers-video-quicktags'), 'Fat Cow' ); ?></li>
		<li><?php printf( __('<strong>Brazilian Portuguese:</strong> %s', 'vipers-video-quicktags'), 'Ricardo Martins' ); ?></li>
		<li><?php printf( __('<strong>Chinese:</strong> %s', 'vipers-video-quicktags'), '<a href="http://dreamcolor.net/">Dreamcolor</a>' ); ?></li>
		<li><?php printf( __('<strong>Danish:</strong> %s', 'vipers-video-quicktags'), '<a href="http://wordpress.blogos.dk/">Dr. Georg S. Adamsen</a>' ); ?></li>
		<li><?php printf( __('<strong>Dutch:</strong> %s', 'vipers-video-quicktags'), 'Sypie' ); ?></li>
		<li><?php printf( __('<strong>French:</strong> %s', 'vipers-video-quicktags'), '<a href="http://www.duretz.net/">Laurent Duretz</a>' ); ?></li>
		<li><?php printf( __('<strong>Hungarian:</strong> %s', 'vipers-video-quicktags'), '<a href="http://filmhirek.com/">jamesb</a>' ); ?></li>
		<li><?php printf( __('<strong>Italian:</strong> %s', 'vipers-video-quicktags'), '<a href="http://gidibao.net/">Gianni Diurno</a>' ); ?></li>
		<!--<li><?php //printf( __('<strong>Polish:</strong> %s', 'vipers-video-quicktags'), '<a href="http://www.brt12.eu/">Bartosz Sobczyk</a>' ); ?></li>-->
		<li><?php printf( __('<strong>Romanian:</strong> %s', 'vipers-video-quicktags'), '<a href="http://webhostinggeeks.com/">Web Hosting Geeks</a>' ); ?></li>
		<li><?php printf( __('<strong>Russian:</strong> %s', 'vipers-video-quicktags'), '<a href="http://handynotes.ru/">Dennis Bri</a>' ); ?></li>
		<li><?php printf( __('<strong>Spanish:</strong> %s', 'vipers-video-quicktags'), '<a href="http://equipajedemano.info/">Omi</a>' ); ?></li>
	</ul>

	<p><?php printf( __('If you\'d like to use this plugin in another language and have your name listed here, just translate the strings in the provided <a href="%1$s">template file</a> located in this plugin\'s &quot;<code>localization</code>&quot; folder and then <a href="%2$s">send it to me</a>. For help, see the <a href="%3$s">WordPress Codex</a>.', 'vipers-video-quicktags'), plugins_url( 'localization/_vipers-video-quicktags-template.po', __FILE__ ), 'http://www.viper007bond.com/contact/', 'http://codex.wordpress.org/Translating_WordPress' ); ?></p>

<?php
			break; // End credits

		default;
?>
	<p><?php _e('Click the above links to switch between tabs.', 'vipers-video-quicktags'); ?></p>

	<input type="hidden" name="vvq-tab" value="general" />

	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function() {
			// Handle keeping the dimensions in the correct ratio
			jQuery(".vvq-width").change(function(){
				if ( true != jQuery(this).parents("tr").find(".vvq-aspectratio").attr("checked") ) return;
				var width = jQuery(this).val();
				var widthdefault = jQuery(this).parents("tr").find(".vvq-width-default").val();
				if ( '' == width || 0 == width ) {
					width = widthdefault;
					jQuery(this).val(widthdefault);
				}
				jQuery(this).parents("tr").find(".vvq-height").val( Math.round( width * ( jQuery(this).parents("tr").find(".vvq-height-default").val() / widthdefault ) ) );
			});
			jQuery(".vvq-height").change(function(){
				if ( true != jQuery(this).parents("tr").find(".vvq-aspectratio").attr("checked") ) return;
				var height = jQuery(this).val();
				var heightdefault = jQuery(this).parents("tr").find(".vvq-height-default").val();
				if ( '' == height || 0 == height ) {
					height = heightdefault;
					jQuery(this).val(heightdefault);
				}
				jQuery(this).parents("tr").find(".vvq-width").val( Math.round( height * ( jQuery(this).parents("tr").find(".vvq-width-default").val() / heightdefault ) ) );
			});
<?php if ( empty($wpmu_version) ) : ?>

			// Agree to the CC non-commercial license before showing FLV button
			jQuery("#vvq-flvbutton").click(function(){
				if ( true != jQuery(this).attr("checked") ) return;
				var agree = confirm("<?php echo esc_js( __("Do you agree to the Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported license? A link to it can be found to the left.\n\nIn short though, you cannot use JW's FLV Media Player on a commercial site without purchasing a commercial license.", 'vipers-video-quicktags') ); ?>");
				// '
				if ( true != agree ) return false;
			});
<?php endif; ?>
		});
	// ]]>
	</script>

	<table class="widefat" style="text-align:center">
		<thead>
			<tr>
				<th scope="col" style="text-align:left"><?php _e('Media Type', 'vipers-video-quicktags'); ?></th>
				<th scope="col" style="text-align:center"><?php _e('Show Editor Button?', 'vipers-video-quicktags'); ?></th>
				<th scope="col" style="text-align:center"><?php _e('Default Width', 'vipers-video-quicktags'); ?></th>
				<th scope="col" style="text-align:center"><?php _e('Default Height', 'vipers-video-quicktags'); ?></th>
				<th scope="col" style="text-align:center"><?php _e('Keep Aspect Ratio?', 'vipers-video-quicktags'); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="text-align:left"><a href="http://www.youtube.com/"><?php _e('YouTube', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[youtube][button]" type="checkbox" value="1"<?php checked($this->settings['youtube']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[youtube][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['youtube']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['youtube']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[youtube][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['youtube']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['youtube']['height']; ?>" />
				</td>
				<td><input name="vvq[youtube][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['youtube']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://video.google.com/"><?php _e('Google Video', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[googlevideo][button]" type="checkbox" value="1"<?php checked($this->settings['googlevideo']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[googlevideo][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['googlevideo']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['googlevideo']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[googlevideo][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['googlevideo']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['googlevideo']['height']; ?>" />
				</td>
				<td><input name="vvq[googlevideo][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['googlevideo']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.dailymotion.com/"><?php _e('DailyMotion', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[dailymotion][button]" type="checkbox" value="1"<?php checked($this->settings['dailymotion']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[dailymotion][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['dailymotion']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['dailymotion']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[dailymotion][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['dailymotion']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['dailymotion']['height']; ?>" />
				</td>
				<td><input name="vvq[dailymotion][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['dailymotion']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.vimeo.com/"><?php _e('Vimeo', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[vimeo][button]" type="checkbox" value="1"<?php checked($this->settings['vimeo']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[vimeo][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['vimeo']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['vimeo']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[vimeo][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['vimeo']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['vimeo']['height']; ?>" />
				</td>
				<td><input name="vvq[vimeo][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['vimeo']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.veoh.com/"><?php _e('Veoh', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[veoh][button]" type="checkbox" value="1"<?php checked($this->settings['veoh']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[veoh][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['veoh']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['veoh']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[veoh][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['veoh']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['veoh']['height']; ?>" />
				</td>
				<td><input name="vvq[veoh][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['veoh']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.viddler.com/"><?php _e('Viddler', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[viddler][button]" type="checkbox" value="1"<?php checked($this->settings['viddler']['button'], 1); ?> /></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.metacafe.com/"><?php _e('Metacafe', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[metacafe][button]" type="checkbox" value="1"<?php checked($this->settings['metacafe']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[metacafe][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['metacafe']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['metacafe']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[metacafe][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['metacafe']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['metacafe']['height']; ?>" />
				</td>
				<td><input name="vvq[metacafe][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['metacafe']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.blip.tv/"><?php _e('Blip.tv', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[bliptv][button]" type="checkbox" value="1"<?php checked($this->settings['bliptv']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[bliptv][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['bliptv']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['bliptv']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[bliptv][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['bliptv']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['bliptv']['height']; ?>" />
				</td>
				<td><input name="vvq[bliptv][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['bliptv']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.flickr.com/"><?php _e('Flickr Video', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[flickrvideo][button]" type="checkbox" value="1"<?php checked($this->settings['flickrvideo']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[flickrvideo][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['flickrvideo']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['flickrvideo']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[flickrvideo][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['flickrvideo']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['flickrvideo']['height']; ?>" />
				</td>
				<td><input name="vvq[flickrvideo][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['flickrvideo']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://www.spike.com/"><?php _e('IFILM/Spike', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[spike][button]" type="checkbox" value="1"<?php checked($this->settings['spike']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[spike][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['spike']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['spike']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[spike][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['spike']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['spike']['height']; ?>" />
				</td>
				<td><input name="vvq[spike][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['spike']['aspectratio'], 1); ?> /></td>
			</tr>
			<tr>
				<td style="text-align:left"><a href="http://vids.myspace.com/"><?php _e('MySpaceTV', 'vipers-video-quicktags'); ?></a></td>
				<td><input name="vvq[myspace][button]" type="checkbox" value="1"<?php checked($this->settings['myspace']['button'], 1); ?> /></td>
				<td>
					<input name="vvq[myspace][width]" class="vvq-width" type="text" size="5" value="<?php echo $this->settings['myspace']['width']; ?>" />
					<input type="hidden" class="vvq-width-default" value="<?php echo $this->defaultsettings['myspace']['width']; ?>" />
				</td>
				<td>
					<input name="vvq[myspace][height]" class="vvq-height" type="text" size="5" value="<?php echo $this->settings['myspace']['height']; ?>" />
					<input type="hidden" class="vvq-height-default" value="<?php echo $this->defaultsettings['myspace']['height']; ?>" />
				</td>
				<td><input name="vvq[myspace][aspectratio]" class="vvq-aspectratio" type="checkbox" value="1"<?php checked($this->settings['myspace']['aspectratio'], 1); ?> /></td>
			</tr>
<?php
	// Only show the FLV row if the player is installed or the button was already checked
	// This effectively disables it for new users
	if ( $this->is_jw_flv_player_installed() || 1 == $this->settings['flv']['button'] ) :
?>
			<tr>
				<td style="text-align:left"><?php
					_e('Flash Video (FLV)', 'vipers-video-quicktags');

					if ( empty($wpmu_version) )
						echo '<br /><small>' . sprintf( __('<a href="%1$s">JW\'s FLV Media Player</a> is covered by the <a href="%2$s">Creative Commons Noncommercial<br />license</a> which means you cannot use it on a <a href="%3$s">commercial website</a>.', 'vipers-video-quicktags'), 'http://www.jeroenwijering.com/?item=JW_FLV_Media_Player', 'http://creativecommons.org/licenses/by-nc-sa/3.0/', 'http://www.jeroenwijering.com/?page=order' );
				?></small></td>
				<td><input name="vvq[flv][button]" id="vvq-flvbutton" type="checkbox" value="1" <?php checked($this->settings['flv']['button'], 1); ?> /></td>
				<td><input name="vvq[flv][width]" type="text" size="5" value="<?php echo $this->settings['flv']['width']; ?>" /></td>
				<td><input name="vvq[flv][height]" type="text" size="5" value="<?php echo $this->settings['flv']['height']; ?>" /></td>
				<td>&nbsp;</td>
			</tr>
<?php endif; ?>
			<tr>
				<td style="text-align:left"><?php _e('Quicktime', 'vipers-video-quicktags'); ?></td>
				<td><input name="vvq[quicktime][button]" type="checkbox" value="1"<?php checked($this->settings['quicktime']['button'], 1); ?> /></td>
				<td><input name="vvq[quicktime][width]" type="text" size="5" value="<?php echo $this->settings['quicktime']['width']; ?>" /></td>
				<td><input name="vvq[quicktime][height]" type="text" size="5" value="<?php echo $this->settings['quicktime']['height']; ?>" /></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left"><?php echo __('Generic Video File', 'vipers-video-quicktags') . '<br /><small>' . sprintf( __("This part of the plugin is fairly buggy as embedding video files is complex.<br />Consider trying TinyMCE's native video embedder instead. <a href='%s'>Why?</a>", 'vipers-video-quicktags'), admin_url('options-general.php?page=vipers-video-quicktags&amp;tab=help#vvq-videofilepoor') ) . '</small>'; ?></td>
				<td><input name="vvq[videofile][button]" type="checkbox" value="1"<?php checked($this->settings['videofile']['button'], 1); ?> /></td>
				<td><input name="vvq[videofile][width]" type="text" size="5" value="<?php echo $this->settings['videofile']['width']; ?>" /></td>
				<td><input name="vvq[videofile][height]" type="text" size="5" value="<?php echo $this->settings['videofile']['height']; ?>" /></td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
<?php
			// End General tab
	}
?>

<?php if ( 'help' != $tab && 'credits' != $tab ) : ?>
	<p class="submit">
		<input type="submit" name="vvq-submit" value="<?php _e('Save Changes', 'vipers-video-quicktags'); ?>" />
		<input type="submit" name="vvq-defaults" id="vvq-defaults" value="<?php _e('Reset Tab To Defaults', 'vipers-video-quicktags'); ?>" />
	</p>
<?php endif; ?>

	</form>
</div>

<?php
		/*
		echo '<pre>';
		print_r( get_option('vvq_options') );
		echo '</pre>';
		*/
	}


	// Output the head stuff
	function Head() {
		$this->wpheadrun = TRUE;

		echo "<!-- Vipers Video Quicktags v" . $this->version . " | http://www.viper007bond.com/wordpress-plugins/vipers-video-quicktags/ -->\n<style type=\"text/css\">\n";

		$aligncss = str_replace( '\n', ' ', $this->cssalignments[$this->settings['alignment']] );
		$standardcss = $this->StringShrink( $this->standardcss );
		echo strip_tags( str_replace( '/* alignment CSS placeholder */', $aligncss, $standardcss ) );

		// WPMU can't use this to avoid them messing with the theme
		if ( empty($wpmu_version) )
			echo ' ' . strip_tags( $this->StringShrink( $this->settings['customcss'] ) );

		echo "\n</style>\n";

		?>
<script type="text/javascript">
// <![CDATA[
	var vvqflashvars = {};
	var vvqparams = { wmode: "opaque", allowfullscreen: "true", allowscriptaccess: "always" };
	var vvqattributes = {};
	var vvqexpressinstall = "<?php echo plugins_url( 'resources/expressinstall.swf', __FILE__ ); ?>";
// ]]>
</script>
<?php
	}


	// Replaces tabs, new lines, etc. to decrease the characters
	function StringShrink( $string ) {
		if ( empty($string) ) return $string;
		return preg_replace( "/\r?\n/", ' ', str_replace( "\t", '', $string ) );
	}


	// Conditionally output debug error text
	function error( $error ) {
		global $post;

		// If the user can't edit this post, then just silently fail
		if ( empty($post->ID) || ( 'post' == $post->post_type && !current_user_can( 'edit_post', $post->ID ) ) || ( 'page' == $post->post_type && !current_user_can( 'edit_page', $post->ID ) ) )
			return '';

		// But if this user is an admin, then display some helpful text
		return '<em>[' . sprintf( __('<strong>ERROR:</strong> %s', 'vipers-video-quicktags'), $error ) . ']</em>';
	}


	// Return a link to the post for use in the feed
	function postlink() {
		global $post;

		if ( empty($post->ID) )
			return ''; // This should never happen (I hope)

		$text = ( !empty($this->settings['customfeedtext']) ) ? $this->settings['customfeedtext'] : $this->customfeedtext;

		return apply_filters( 'vvq_feedoutput', '<p><a href="' . get_permalink( $post->ID ) . '">' . $text . '</a></p>' );
	}


	// No-name attribute fixing
	function attributefix( $atts = array() ) {
		// Quoted value
		if ( 0 !== preg_match( '#=("|\')(.*?)\1#', $atts[0], $match ) )
			$atts[0] = $match[2];

		// Unquoted value
		elseif ( '=' == substr( $atts[0], 0, 1 ) )
			$atts[0] = substr( $atts[0], 1 );

		return $atts;
	}


	// Generate a placeholder ID
	function videoid( $type ) {
		global $post;

		if ( empty($post) || empty($post->ID) ) {
			$objectid = uniqid("vvq-$type-");
		} else {
			$count = 1;
			$objectid = 'vvq-' . $post->ID . '-' . $type . '-' . $count;

			while ( !empty($this->usedids[$objectid]) ) {
				$count++;
				$objectid = 'vvq-' . $post->ID . '-' . $type . '-' . $count;
			}

			$this->usedids[$objectid] = true;
		}

		return $objectid;
	}


	// Is a string a URL? Not as perfect as esc_url() validation but it'll do
	function is_url( $string ) {
		return preg_match( '#^https?://#i', $string );
	}


	// Reverse the parts we care about (and probably some we don't) of wptexturize() which gets applied before shortcodes
	function wpuntexturize( $text ) {
		$find = array( '&#8211;', '&#8212;', '&#215;', '&#8230;', '&#8220;', '&#8217;s', '&#8221;', '&#038;' );
		$replace = array( '--', '---', 'x', '...', '``', '\'s', '\'\'', '&' );
		return str_replace( $find, $replace, $text );
	}


	// parse_str() but allow periods in the keys
	// Also returns instead of setting a variable
	function parse_str_periods( $string ) {
		$string = str_replace( '.', '{{vvqperiod}}', $string );
		parse_str( $string, $result_raw );

		// Reset placeholders
		$result = array();
		foreach ( $result_raw as $key => $value ) {
			$key = str_replace( '{{vvqperiod}}', '.', $key );
			$result[$key] = str_replace( '{{vvqperiod}}', '.', $value );
		}

		return $result;
	}


	// Show an error for Stage6
	function shortcode_stage6() {
		return '<em>[' . __('Stage6 is no more, so this Stage6-hosted video cannot be displayed.', 'vipers-video-quicktags') . ']</em>';
	}


	// Handle YouTube shortcodes
	function shortcode_youtube( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		// Handle WordPress.com shortcode format
		if ( isset($atts[0]) ) {
			$atts = $this->attributefix( $atts );
			$content = $atts[0];
			unset($atts[0]);
		}

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('YouTube') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'      => $this->settings['youtube']['width'],
			'height'     => $this->settings['youtube']['height'],
			'color1'     => $this->settings['youtube']['color1'],
			'color2'     => $this->settings['youtube']['color2'],
			'border'     => $this->settings['youtube']['border'],
			'rel'        => $this->settings['youtube']['rel'],
			'fs'         => $this->settings['youtube']['fs'],
			'autoplay'   => $this->settings['youtube']['autoplay'],
			'loop'       => $this->settings['youtube']['loop'],
			'showsearch' => $this->settings['youtube']['showsearch'],
			'showinfo'   => $this->settings['youtube']['showinfo'],
			'hd'         => $this->settings['youtube']['hd'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'youtube', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {

			// Playlist URL ( http://www.youtube.com/playlist?list=PLXXXXX )
			if ( false !== stristr( $content, 'playlist' ) ) {
				preg_match( '#https?://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/playlist\?list=([\w-]+)(.*?)#i', $content, $matches );
				if ( empty( $matches ) || empty( $matches[2] ) )
					return $this->error( sprintf( __( 'Unable to parse URL, check for correct %s format', 'vipers-video-quicktags' ), __( 'YouTube' ) ) );

				// Hack until this plugin properly supports iframe-based embeds
				$iframe = 'http://www.youtube.com/embed/videoseries?list=' . $matches[2];
			}
			// Legacy playlists ( http://www.youtube.com/view_play_list?p=XXX )
			elseif ( FALSE !== stristr( $content, 'view_play_list' ) ) {
				preg_match( '#https?://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/view_play_list\?p=([\w-]+)(.*?)#i', $content, $matches );
				if ( empty($matches) || empty($matches[2]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('YouTube') ) );

				$embedpath = 'p/' . $matches[2];
				$fallbacklink = $fallbackcontent = 'http://www.youtube.com/view_play_list?p=' . $matches[2];
			}
			// Short youtu.be URL
			elseif ( FALSE !== stristr( $content, 'youtu.be' ) ) {
				preg_match( '#https?://youtu\.be/([\w-]+)#i', $content, $matches );
				if ( empty($matches) || empty($matches[1]) )
					return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('YouTube') ) );

				$embedpath = 'v/' . $matches[1];
				$fallbacklink = 'http://www.youtube.com/watch?v=' . $matches[1];
				$fallbackcontent = '<img src="' . esc_url( 'http://img.youtube.com/vi/' . $matches[1] . '/0.jpg' ) . '" alt="' . esc_attr__('YouTube Preview Image', 'vipers-video-quicktags') . '" />';
			}
			// Normal video URL
			else {
				preg_match( '#https?://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(watch\?v=|w/\?v=|\?v=)([\w-]+)(.*?)#i', $content, $matches );
				if ( empty($matches) || empty($matches[3]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('YouTube') ) );

				$embedpath = 'v/' . $matches[3];
				$fallbacklink = 'http://www.youtube.com/watch?v=' . $matches[3];
				$fallbackcontent = '<img src="' . esc_url( 'http://img.youtube.com/vi/' . $matches[3] . '/0.jpg' ) . '" alt="' . esc_attr__('YouTube Preview Image', 'vipers-video-quicktags') . '" />';
			}
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$embedpath = 'v/' . $content;
			$fallbacklink = 'http://www.youtube.com/watch?v=' . $content;
			$fallbackcontent = '<img src="' . esc_url( 'http://img.youtube.com/vi/' . $content . '/0.jpg' ) . '" alt="' . esc_attr__('YouTube Preview Image', 'vipers-video-quicktags') . '" />';
		}

		// Setup the parameters
		$color1 = $color2 = $border = $autoplay = $loop = $showsearch = $showinfo = $hd = '';

		if ( '' != $atts['color1'] && $this->defaultsettings['youtube']['color1'] != $atts['color1'] )
			$color1 = '&color1=0x' . str_replace( '#', '', $atts['color1'] );

		if ( '' != $atts['color2'] && $this->defaultsettings['youtube']['color2'] != $atts['color2'] )
			$color2 = '&color2=0x' . str_replace( '#', '', $atts['color2'] );

		if ( $atts['border'] )
			$border = '&border=1';

		if ( $atts['autoplay'] )
			$autoplay = '&autoplay=1';

		if ( $atts['loop'] )
			$loop = '&loop=1';

		if ( $atts['hd'] )
			$hd = '&hd=1';

		$rel        = ( 1 == $atts['rel'] ) ? '1' : '0';
		$fs         = ( 1 == $atts['fs'] ) ? '1' : '0';
		$showsearch = ( 1 == $atts['showsearch'] ) ? '1' : '0';
		$showinfo   = ( 1 == $atts['showinfo'] ) ? '1' : '0';

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('youtube');

		// Hack until this plugin properly supports iframe-based embeds
		if ( ! empty( $iframe ) ) {
			return '<iframe class="vvqbox vvqyoutube" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" src="'. esc_url( $iframe . '&rel=' . $rel . '&fs=' . $fs . '&showsearch=' . $showsearch . '&showinfo=' . $showinfo . $autoplay . $loop . $hd ) . '" frameborder="0" allowfullscreen></iframe>';
		}

		$this->swfobjects[$objectid] = array(
			'width' => $atts['width'],
			'height' => $atts['height'],
			'url' => 'http://www.youtube.com/' . $embedpath . $color1 . $color2 . $border . '&rel=' . $rel . '&fs=' . $fs . '&showsearch=' . $showsearch . '&showinfo=' . $showinfo . $autoplay . $loop . $hd,
		);

		return '<span class="vvqbox vvqyoutube" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( $fallbacklink ) . '">' . $fallbackcontent . '</a></span></span>';
	}


	// Handle Google Video shortcodes
	function shortcode_googlevideo( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		// Handle WordPress.com shortcode format
		if ( isset($atts[0]) ) {
			$atts = $this->attributefix( $atts );
			$content = $atts[0];
			unset($atts[0]);
		}

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('Google Video', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'    => $this->settings['googlevideo']['width'],
			'height'   => $this->settings['googlevideo']['height'],
			'autoplay' => $this->settings['googlevideo']['autoplay'],
			'fs'       => $this->settings['googlevideo']['fs'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'googlevideo', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			preg_match( '#https?://video\.google\.([A-Za-z.]{2,5})/videoplay\?docid=([\d-]+)(.*?)#i', $content, $matches );
			if ( empty($matches) || empty($matches[2]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('Google Video', 'vipers-video-quicktags') ) );

			$videoid = $matches[2];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		// Setup the parameters
		$flashvars = array();
		if ( 1 == $atts['autoplay'] ) $flashvars['autoplay'] = '1';
		if ( 1 == $atts['fs'] )       $flashvars['fs']       = 'true';

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );

		$objectid = $this->videoid('googlevideo');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://video.google.com/googleplayer.swf?docid=' . $videoid, 'flashvars' => $flashvars );

		return '<span class="vvqbox vvqgooglevideo" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://video.google.com/videoplay?docid=' . $videoid ) . '">' . esc_url( 'http://video.google.com/videoplay?docid=' . $videoid ) . '</a></span></span>';
	}


	// Handle DailyMotion shortcodes
	function shortcode_dailymotion( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('YouTube', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'           => $this->settings['dailymotion']['width'],
			'height'          => $this->settings['dailymotion']['height'],
			'backgroundcolor' => $this->settings['dailymotion']['backgroundcolor'],
			'glowcolor'       => $this->settings['dailymotion']['glowcolor'],
			'foregroundcolor' => $this->settings['dailymotion']['foregroundcolor'],
			'seekbarcolor'    => $this->settings['dailymotion']['seekbarcolor'],
			'autoplay'        => $this->settings['dailymotion']['autoplay'],
			'related'         => $this->settings['dailymotion']['related'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'dailymotion', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			//http://www.dailymotion.com/visited/search/top%2Bgear/video/x347lz_bugatti-veyron-407-kmh-la-plus-rapi_shortfilms
			preg_match( '#https?://(www.dailymotion|dailymotion)\.com/(.+)/([0-9a-zA-Z]+)\_(.*?)#i', $content, $matches );
			if ( empty($matches) || empty($matches[3]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('DailyMotion', 'vipers-video-quicktags') ) );

			$videoid = $matches[3];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		// Setup the parameters
		$backgroundcolor = $glowcolor = $foregroundcolor = $seekbarcolor = '';
		if ( '' != $atts['backgroundcolor'] && $this->defaultsettings['dailymotion']['backgroundcolor'] != $atts['backgroundcolor'] ) $backgroundcolor = 'background:' . str_replace( '#', '', $atts['backgroundcolor'] ) . ';';
		if ( '' != $atts['glowcolor'] && $this->defaultsettings['dailymotion']['glowcolor'] != $atts['glowcolor'] )                   $glowcolor = 'glow:' . str_replace( '#', '', $atts['glowcolor'] ) . ';';
		if ( '' != $atts['foregroundcolor'] && $this->defaultsettings['dailymotion']['foregroundcolor'] != $atts['foregroundcolor'] ) $foregroundcolor = 'foreground:' . str_replace( '#', '', $atts['foregroundcolor'] ) . ';';
		if ( '' != $atts['seekbarcolor'] && $this->defaultsettings['dailymotion']['seekbarcolor'] != $atts['seekbarcolor'] )          $seekbarcolor = 'special:' . str_replace( '#', '', $atts['seekbarcolor'] ) . ';';
		$autoplay = ( 1 == $atts['autoplay'] ) ? '1' : '0';
		$related = ( 1 == $atts['related'] ) ? '1' : '0';

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('dailymotion');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://www.dailymotion.com/swf/' . $videoid . '&colors=' . $backgroundcolor . $glowcolor . $foregroundcolor . $seekbarcolor . '&autoPlay=' . $autoplay . '&related=' . $related );

		return '<span class="vvqbox vvqdailymotion" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://www.dailymotion.com/video/' . $videoid ) . '">' . esc_url( 'http://www.dailymotion.com/video/' . $videoid ) . '</a></span></span>';
	}


	// Handle Vimeo shortcodes
	function shortcode_vimeo( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		// Handle malformed WordPress.com shortcode format
		if ( isset($atts[0]) ) {
			$atts = $this->attributefix( $atts );
			$content = $atts[0];
			unset($atts[0]);
		}

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('Vimeo', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'      => $this->settings['vimeo']['width'],
			'height'     => $this->settings['vimeo']['height'],
			'color'      => $this->settings['vimeo']['color'],
			'portrait'   => $this->settings['vimeo']['portrait'],
			'title'      => $this->settings['vimeo']['title'],
			'byline'     => $this->settings['vimeo']['byline'],
			'fullscreen' => $this->settings['vimeo']['fullscreen'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'vimeo', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			preg_match( '#https?://(www.vimeo|vimeo)\.com(/|/clip:)(\d+)(.*?)#i', $content, $matches );
			if ( empty($matches) || empty($matches[3]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('Vimeo', 'vipers-video-quicktags') ) );

			$videoid = $matches[3];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		// Setup the parameters
		$portrait   = ( 1 == $atts['portrait'] )   ? '1' : '0';
		$title      = ( 1 == $atts['title'] )      ? '1' : '0';
		$byline     = ( 1 == $atts['byline'] )     ? '1' : '0';
		$fullscreen = ( 1 == $atts['fullscreen'] ) ? '1' : '0';

		$iframeurl = '//player.vimeo.com/video/' . $videoid;
		foreach ( array( 'title', 'byline', 'portrait', 'fullscreen' ) as $attribute ) {
			$iframeurl = add_query_arg( $attribute, $$attribute, $iframeurl );
		}

		if ( '' != $atts['color'] && $this->defaultsettings['vimeo']['color'] != $atts['color'] )
			$iframeurl = add_query_arg( 'color', str_replace( '#', '', $atts['color'] ), $iframeurl );

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('vimeo');

		return '<span class="vvqbox vvqvimeo" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><iframe id="' . esc_attr( $objectid ) . '" src="' . esc_url( $iframeurl ) . '" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" frameborder="0"><a href="' . esc_url( 'http://www.vimeo.com/' . $videoid ) . '">' . esc_url( 'http://www.vimeo.com/' . $videoid ) . '</a></iframe></span>';
	}


	// Handle Veoh shortcodes
	function shortcode_veoh( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('Veoh', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'    => $this->settings['veoh']['width'],
			'height'   => $this->settings['veoh']['height'],
			'autoplay' => 0,
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'veoh', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			$videoid = null;

			// Old format
			preg_match( '#https?://(www.veoh|veoh)\.com/videos/([0-9a-zA-Z]+)(.*?)#i', $content, $matches );
			if ( !empty($matches) && !empty($matches[2]) )
				$videoid = $matches[2];

			// Must be the new format then
			if ( empty($videoid) ) {
				preg_match( '#https?://(www.veoh|veoh)\.com/(.*?)/watch/([0-9a-zA-Z]+)(.*?)#i', $content, $matches );
				if ( !empty($matches) && !empty($matches[3]) )
					$videoid = $matches[3];
			}

			if ( empty($videoid) )
				return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('Veoh', 'vipers-video-quicktags') ) );
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('veoh');

		// Gotta pass these via flashvars rather than the URL to keep for valid XHTML (Veoh doesn't like &amp;'s)
		$flashvars = array(
			'permalinkId'   => $videoid,
			'id'            => 'anonymous',
			'player'        => 'videodetailsembedded',
			'affiliateId'   => '',
			'videoAutoPlay' => $atts['autoplay'],
		);

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://www.veoh.com/veohplayer.swf', 'flashvars' => $flashvars );

		return '<span class="vvqbox vvqveoh" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://www.veoh.com/videos/' . $videoid ) . '">' . esc_url( 'http://www.veoh.com/videos/' . $videoid ) . '</a></span></span>';
	}


	// Handle Viddler shortcodes
	function shortcode_viddler( $atts, $content = '' ) {
		$origatts = $atts;

		if ( empty($atts['id']) )
			return $this->error( __('Sorry, but the only format that is supported for Viddler is the WordPress.com-style format rather than the URL. You can find it in the &quot;Embed This&quot; window.', 'vipers-video-quicktags') );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'id'            => '',
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'viddler', $origatts );

		// Parse WordPress.com shortcode format
		preg_match( '#(.*?)(&|&\#038;|&amp;)w=(\d+)(&|&\#038;|&amp;)h=(\d+)#i', $atts['id'], $matches );
		$videoid = $matches[1];
		$width = $matches[3];
		$height = $matches[5];

		if ( empty($videoid) || empty($width) || empty($height) ) return $this->error( sprintf( __('An invalid %s shortcode format was used. Please check your code.', 'vipers-video-quicktags'), __('Viddler', 'vipers-video-quicktags') ) );

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('viddler');

		$this->swfobjects[$objectid] = array( 'width' => $width, 'height' => $height, 'url' => 'http://www.viddler.com/player/' . $videoid . '/' );

		return '<span class="vvqbox vvqviddler" style="' . esc_attr( 'width:' . $width . 'px;height:' . $height . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><em>' . sprintf( __('Please <a href="%1$s">enable Javascript</a> and <a href="%2$s">Flash</a> to view this %3$s video.', 'vipers-video-quicktags'), 'http://www.google.com/support/bin/answer.py?answer=23852', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', __('Viddler', 'vipers-video-quicktags') ) . '</em></span></span>';
	}


	// Handle Metacafe shortcodes
	function shortcode_metacafe( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('Metacafe', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'    => $this->settings['metacafe']['width'],
			'height'   => $this->settings['metacafe']['height'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'metacafe', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			preg_match( '#https?://(www.metacafe|metacafe)\.com/watch/(.*?)/(.*?)#i', $content, $matches );
			if ( empty($matches) || empty($matches[2]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('Metacafe', 'vipers-video-quicktags') ) );

			$videoid = $matches[2];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('metacafe');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://www.metacafe.com/fplayer/' . $videoid . '/vipers_video_quicktags.swf' );

		return '<span class="vvqbox vvqmetacafe" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://www.metacafe.com/watch/' . $videoid . '/' ) . '">' . esc_url( 'http://www.metacafe.com/watch/' . $videoid . '/' ) . '</a></span></span>';
	}


	// Handle Blip.tv shortcodes
	function shortcode_bliptv( $atts ) {
		$origatts = $atts;

		if ( empty($atts[0]) )
			return $this->error( __('Sorry, but the only format that is supported for Blip.tv is the WordPress.com-style format. You can find it at Share -&gt; Embed -&gt; WordPress.com.', 'vipers-video-quicktags') );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			0               => '',
			'width'         => $this->settings['bliptv']['width'],
			'height'        => $this->settings['bliptv']['height'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'bliptv', $origatts );

		// Parse WordPress.com shortcode format
		$params = $this->parse_str_periods( $atts[0] );
		if ( empty($params['?posts_id']) ) return $this->error( sprintf( __('An invalid %s shortcode format was used. Please check your code.', 'vipers-video-quicktags'), __('Blip.tv', 'vipers-video-quicktags') ) );
		$videoid = $params['?posts_id'];

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('bliptv');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://blip.tv/scripts/flash/showplayer.swf?file=http://blip.tv/rss/flash/' . $videoid );

		return '<span class="vvqbox vvqbliptv" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><em>' . sprintf( __('Please <a href="%1$s">enable Javascript</a> and <a href="%2$s">Flash</a> to view this %3$s video.', 'vipers-video-quicktags'), 'http://www.google.com/support/bin/answer.py?answer=23852', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', __('Blip.tv', 'vipers-video-quicktags') ) . '</em></span></span>';
	}


	// Handle VideoPress (WordPress.com) shortcodes
	function shortcode_videopress( $atts ) {
		$origatts = $atts;

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			0               => '',
			'w'             => false,
			'width'         => false,
			'h'             => false,
			'height'        => false,
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'videopress', $origatts );

		if ( empty($atts[0]) )
			return $this->error( sprintf( __('An invalid %s shortcode format was used. Please check your code.', 'vipers-video-quicktags'), __('VideoPress', 'vipers-video-quicktags') ) );

		$atts['w']      = (int) $atts['w'];
		$atts['width']  = (int) $atts['width'];
		$atts['h']      = (int) $atts['h'];
		$atts['height'] = (int) $atts['height'];

		if ( $atts['w'] )
			$atts['width'] = $atts['w'];

		if ( !$atts['width'] )
			$atts['width'] = $this->settings['wpvideo']['width'];

		if ( $atts['h'] )
			$atts['height'] = $atts['h'];

		if ( !$atts['height'] )
			$atts['height'] = round( ( $atts['width'] / $this->settings['wpvideo']['width'] ) * $this->settings['wpvideo']['height'] );

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('wpvideo');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://s0.videopress.com/player.swf?v=1.01', 'flashvars' => array( 'guid' => $atts[0], 'seamlesstabbing' => 'true', 'overstretch' => 'true' ) );

		return '<span class="vvqbox vvqvideopress" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><em>' . sprintf( __('Please <a href="%1$s">enable Javascript</a> and <a href="%2$s">Flash</a> to view this %3$s video.', 'vipers-video-quicktags'), 'http://www.google.com/support/bin/answer.py?answer=23852', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', __('VideoPress', 'vipers-video-quicktags') ) . '</em></span></span>';
	}


	// Handle Flickr videos
	function shortcode_flickrvideo( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		// Handle WordPress.com shortcode format
		if ( isset($atts[0]) ) {
			$atts = $this->attributefix( $atts );
			$content = $atts[0];
			unset($atts[0]);
		}

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('Flickr Video', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'       => $this->settings['flickrvideo']['width'],
			'height'      => $this->settings['flickrvideo']['height'],
			'showinfobox' => 1,
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'flickrvideo', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			preg_match( '#https?://(www.flickr|flickr)\.com/photos/(.+)/(\d+)(.*?)#i', $content, $matches );
			if ( empty($matches) || empty($matches[3]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('Flickr Video', 'vipers-video-quicktags') ) );

			$videoid = $matches[3];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		// Setup the parameters
		$showinfobox = ( 1 == $atts['showinfobox'] ) ? 'true' : 'false';


		$objectid = $this->videoid('flickrvideo');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://www.flickr.com/apps/video/stewart.swf?v=1.161', 'flashvars' => array( 'photo_id' => $videoid, 'flickr_show_info_box' => $showinfobox ) );

		return '<span class="vvqbox vvqflickrvideo" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://www.google.com/search?q=site%3Aflickr.com+' . $videoid ) . '">' . __('Flickr Video', 'vipers-video-quicktags') . '</a></span></span>';
	}


	// Handle IFILM aka Spike shortcodes for backwards compatibility
	function shortcode_ifilm( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('IFILM/Spike', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'    => $this->settings['spike']['width'],
			'height'   => $this->settings['spike']['height'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'spike', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			preg_match( '#https?://(www.ifilm|ifilm|www.spike|spike)\.com/(.+)/(\d+)#i', $content, $matches );
			if ( empty($matches) || empty($matches[3]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('IFILM/Spike', 'vipers-video-quicktags') ) );

			$videoid = $matches[3];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('ifilm');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://www.spike.com/efp', 'flashvars' => array( 'flvbaseclip' => $videoid ) );

		return '<span class="vvqbox vvqifilm" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://www.spike.com/video/' . $videoid ) . '">' . esc_url( 'http://www.spike.com/video/' . $videoid ) . '</a></span></span>';
	}


	// Handle MySpace videos
	function shortcode_myspace( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL or video ID was passed to the %s BBCode', 'vipers-video-quicktags'), __('MySpace', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'    => $this->settings['myspace']['width'],
			'height'   => $this->settings['myspace']['height'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'myspace', $origatts );

		// If a URL was passed
		if ( $this->is_url( $content ) ) {
			preg_match( '#https?://(vids.myspace|myspacetv)\.com/index\.cfm\?fuseaction=vids\.individual(.+)videoid=(\d+)#i', $content, $matches ); // Had issues with the "&"
			if ( empty($matches) || empty($matches[3]) ) return $this->error( sprintf( __('Unable to parse URL, check for correct %s format', 'vipers-video-quicktags'), __('MySpace', 'vipers-video-quicktags') ) );

			$videoid = $matches[3];
		}
		// If a URL wasn't passed, assume a video ID was passed instead
		else {
			$videoid = $content;
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('myspace');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => 'http://mediaservices.myspace.com/services/media/embed.aspx/m=' . $videoid );

		return '<span class="vvqbox vvqmyspace" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( 'http://myspacetv.com/index.cfm?fuseaction=vids.individual&amp;videoid=' . $videoid ) . '">' . esc_url( 'http://myspacetv.com/index.cfm?fuseaction=vids.individual&amp;videoid=' . $videoid ) . '</a></span></span>';
	}


	// Handle FLV videos
	function shortcode_flv( $atts, $content = '' ) {
		if ( ! $this->is_jw_flv_player_installed() )
			return $this->error( __( 'FLV shortcode is disabled until you install JW FLV Player! See the admin area for details.', 'vipers-video-quicktags' ) );

		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL was passed to the %s BBCode', 'vipers-video-quicktags'), __('FLV', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts( array(
			'width'        => $this->settings['flv']['width'],
			'height'       => $this->settings['flv']['height'],
			'image'        => false,
			'customcolors' => $this->settings['flv']['customcolors'],
			'backcolor'    => $this->settings['flv']['backcolor'],
			'frontcolor'   => $this->settings['flv']['frontcolor'],
			'lightcolor'   => $this->settings['flv']['lightcolor'],
			'screencolor'  => $this->settings['flv']['screencolor'],
			'volume'       => false,
			'bufferlength' => false,
			'flashvars'    => '',
		), $atts );

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'flv', $origatts );

		// Start setting up the flashvars
		$flashvars = array(
			'wmode'        => 'transparent', // Allow skins with transparency to have the background color shine through (props rich)
			'file'         => $content,
			'volume'       => 100,
			'bufferlength' => 15,
		);

		// Skin
		if ( !empty($this->settings['flv']['skin']) && !empty($this->flvskins[$this->settings['flv']['skin']]) )
			$flashvars['skin'] = content_url('/jw-flv-player/skins/' . $this->settings['flv']['skin'] . '.swf');

		// Custom colors
		if ( 1 == $atts['customcolors'] || !empty($origatts['backcolor']) )
			$flashvars['backcolor'] = str_replace( '#', '', $atts['backcolor'] );
		if ( 1 == $atts['customcolors'] || !empty($origatts['frontcolor']) )
			$flashvars['frontcolor'] = str_replace( '#', '', $atts['frontcolor'] );
		if ( 1 == $atts['customcolors'] || !empty($origatts['lightcolor']) )
			$flashvars['lightcolor'] = str_replace( '#', '', $atts['lightcolor'] );
		if ( 1 == $atts['customcolors'] || !empty($origatts['screencolor']) )
			$flashvars['screencolor'] = str_replace( '#', '', $atts['screencolor'] );

		// Copy in the defaults from the settings page
		if ( !empty($this->settings['flv']['flashvars']) ) {
			$params = $this->parse_str_periods( $this->settings['flv']['flashvars'] );
			$flashvars = array_merge( $flashvars, $params );
		}

		// Copy in any one-off passed flashvars added via the "flashvars" parameter
		if ( !empty($atts['flashvars']) ) {
			$atts['flashvars'] = $this->wpuntexturize( str_replace( '&amp;', '&', $atts['flashvars'] ) );
			$params = $this->parse_str_periods( $atts['flashvars'] );
			$flashvars = array_merge( $flashvars, $params );
		}

		// Add in additional one-off parameters
		if ( false !== $atts['image'] )
			$flashvars['image'] = $atts['image'];
		if ( false !== $atts['volume'] )
			$flashvars['volume'] = (int) $atts['volume'];
		if ( false !== $atts['bufferlength'] )
			$flashvars['bufferlength'] = (int) $atts['bufferlength'];

		// No image yet? Okay, default to the URL to the video but .jpg instead of the existing extension
		if ( !isset($flashvars['image']) && '.' == substr( $content, -4, 1 ) )
			$flashvars['image'] = substr( $content, 0, -4 ) . '.jpg';

		// Check if link is a RTMP stream and adjust accordingly if so
		if ( 'rtmp' == substr( $content, 0 ,4 ) ) {
			$flv_pos = strrpos( $content, '/' );
			$flashvars['file'] = substr( $content, $flv_pos + 1 );
			$flashvars['streamer'] = substr( $content, 0, $flv_pos );
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('flv');

		$swfurl = content_url('/jw-flv-player/player.swf');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => $swfurl, 'flashvars' => $flashvars );

		return '<span class="vvqbox vvqflv" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><a href="' . esc_url( $swfurl . '?file=' . rawurlencode($content) ) . '">' . esc_html( $content ) . '</a></span></span>';
	}


	// Handle major pain in the ass Quicktime video files
	function shortcode_quicktime( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL was passed to the %s BBCode', 'vipers-video-quicktags'), __('Quicktime', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'          => $this->settings['quicktime']['width'],
			'height'         => $this->settings['quicktime']['height'],
			'autostart'      => 0, // Deprecated (wrong name)
			'autoplay'       => 0,
			'useplaceholder' => 0,
			'placeholder'    => str_replace( '.mov', '.jpg', $content ),
			'controller'     => 1,
			'bgcolor'        => '',
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'quicktime', $origatts );

		$qt_args = array(
			'scale' => 'aspect',
		);

		if ( 1 == $atts['useplaceholder'] && !empty($atts['placeholder']) ) {
			$mov = $atts['placeholder'];
			$qt_args['href'] = $content;
			$qt_args['target'] = 'myself';
		} else {
			$mov = $content;
		}

		if ( 1 == $atts['autostart'] )
			$qt_args['autoplay'] = 'true';
		else
			$qt_args['autoplay'] = ( 1 == $atts['autoplay'] ) ? 'true' : 'false';

		$qt_args['controller'] = ( 1 == $atts['controller'] ) ? 'true' : 'false';

		if ( ! empty( $atts['bgcolor'] ) )
			$qt_args['bgcolor'] = $atts['bgcolor'];

		// Use this to inject extra myQTObject.addParam() entries
		$qt_args = apply_filters( 'vvq_quicktime_args', $qt_args );

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$html = '<span class="vvqbox vvqquicktime" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><script type="text/javascript">' . "var myQTObject = new QTObject( '" . esc_js( $mov ) . "', '" . esc_js( $this->videoid('quicktime') ) . "', '" . esc_js( $atts['width'] ) . "', '" . esc_js( $atts['height'] ) . "');";

		foreach ( $qt_args as $name => $value )
			$html .= " myQTObject.addParam( '" . esc_js( $name ) . "', '" . esc_js( $value ) . "' );";

		$html .= ' myQTObject.write();</script></span>';

		return $html;
	}


	// Handle super-duper pain in the ass regular video files
	function shortcode_videofile( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( empty($content) )
			return $this->error( sprintf( __('No URL was passed to the %s BBCode', 'vipers-video-quicktags'), __('generic video', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'          => $this->settings['videofile']['width'],
			'height'         => $this->settings['videofile']['height'],
			'usewmp'         => $this->settings['videofile']['usewmp'],
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'videofile', $origatts );

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		// This is semi-temporary. Embedding generic video files is a major pain in the ass, so this part of the plugin is kinda half-heartedly coded.
		if ( 1 == $atts['usewmp'] && FALSE !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows') ) {
			$atts['height'] = $atts['height'] + 64; // Compensate for the player controls

			return '<span class="vvqbox vvqvideo" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><object classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '"><param name="url" value="' . esc_url( $content ) . '" /><param name="allowchangedisplaysize" value="true" /><param name="autosize" value="true" /><param name="displaysize" value="1" /><param name="showcontrols" value="true" /><param name="showstatusbar" value="true" /><param name="autorewind" value="true" /><param name="autostart" value="false" /><param name="volume" value="100" /></object></span>';
		} else {
			// Determine the MIME type
			$mimetypes = apply_filters( 'vvqvideomimes', array(
				'asf'  => 'video/x-ms-asf',
				'asx'  => 'video/x-ms-asf',
				'avi'  => 'video/avi',
				'm1v'  => 'video/mpeg',
				'mp3'  => 'video/mpeg',
				'mpeg' => 'video/mpeg',
				'mpg'  => 'video/mpeg',
				'wmv'  => 'video/x-ms-wmv',
			) );
			$mimetype = $mimetypes[array_pop(explode('.', $content))];
			if ( empty($mimetype) ) $mimetype = 'video/mpeg'; // If we don't know the MIME type, just pick something (MPEG)

			return '<span class="vvqbox vvqvideo" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><object type="' . esc_attr( $mimetype ) . '" data="' . esc_url( $content ) . '" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" class="vvqbox vvqvideo"><param name="src" value="' . esc_url( $content ) . '" /><param name="allowchangedisplaysize" value="true" /><param name="autosize" value="true" /><param name="displaysize" value="1" /><param name="showcontrols" value="true" /><param name="showstatusbar" value="true" /><param name="autorewind" value="true" /><param name="autostart" value="false" /><param name="autoplay" value="false" /><param name="volume" value="100" /></object></span>';
		}
	}


	// Generic Flash embed allowing you to embed any type of Flash-based video
	function shortcode_flash( $atts, $content = '' ) {
		$origatts = $atts;
		$content = $this->wpuntexturize( $content );

		if ( !empty($atts['movie']) )
			$content = $atts['movie'];

		if ( empty($content) )
			return $this->error( sprintf( __('No URL was passed to the %s BBCode', 'vipers-video-quicktags'), __('generic Flash embed', 'vipers-video-quicktags') ) );

		if ( is_feed() )
			return $this->postlink();

		// Set any missing $atts items to the defaults
		$atts = shortcode_atts(array(
			'width'     => $this->settings['flash']['width'],
			'height'    => $this->settings['flash']['height'],
			'flashvars' => '',
		), $atts);

		// Allow other plugins to modify these values (for example based on conditionals)
		$atts = apply_filters( 'vvq_shortcodeatts', $atts, 'flash', $origatts );


		// Create Flashvars
		$flashvars = array();
		if ( !empty($atts['flashvars']) ) {
			$atts['flashvars'] = str_replace( array('#038;', '&amp;'), '&', $atts['flashvars'] ); // Fix formatting applied by WordPress
			$params = $this->parse_str_periods( $atts['flashvars'] );
			foreach ( $params as $key => $value )
				$flashvars[$key] = $value;
		}

		$atts['width']  = absint( $atts['width'] );
		$atts['height'] = absint( $atts['height'] );


		$objectid = $this->videoid('flash');

		$this->swfobjects[$objectid] = array( 'width' => $atts['width'], 'height' => $atts['height'], 'url' => $content, 'flashvars' => $flashvars );

		return '<span class="vvqbox vvqflash" style="' . esc_attr( 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;' ) . '"><span id="' . esc_attr( $objectid ) . '"><em>' . sprintf( __('Please <a href="%1$s">enable Javascript</a> and <a href="%2$s">Flash</a> to view this %3$s video.', 'vipers-video-quicktags'), 'http://www.google.com/support/bin/answer.py?answer=23852', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', __('Flash', 'vipers-video-quicktags') ) . '</em></span></span>';
	}


	// This function tells WordPress to load the SWFObject JS file if SWFObjectCalls() is going to run
	function maybe_enqueue_swfobject() {
		if ( is_feed() || empty( $this->swfobjects ) )
			return;

		wp_enqueue_script( 'swfobject' );
	}


	// Output the SWFObject calls that replace all of the placeholders created by the shortcode handlers with the Flash videos
	function SWFObjectCalls() {
		if ( is_feed() || empty( $this->swfobjects ) )
			return;

		// Abort if wp_head() is missing from the theme
		//if ( FALSE == $this->wpheadrun ) return $content;

		$content = "\n<script type=\"text/javascript\">\n";
		//$content .= "// <![CDATA[\n";

		foreach ( $this->swfobjects as $objectid => $embed ) {
			$content .= '	swfobject.embedSWF("' . esc_url( $embed['url'] ) . '", "' . esc_js( $objectid ) . '", "' . esc_attr( absint( $embed['width'] ) ) . '", "' . esc_attr( absint( $embed['height'] ) ) . '", "10", vvqexpressinstall, ';

			if ( empty($embed['flashvars']) || !is_array($embed['flashvars']) ) {
				$content .= 'vvqflashvars';
			} else {
				$content .= '{ ';

				$embed['flashvars'] = array_merge( array( 'wmode' => 'opaque', 'allowfullscreen' => 'true', 'allowscriptaccess' => 'always' ), $embed['flashvars'] );
				$flashvars = array();

				foreach ( $embed['flashvars'] as $property => $value ) {
					if ( false === $value )
						continue;

					$flashvars[] = '"' . esc_js( $property ). '": "' . esc_js( $value ) . '"';
				}

				$content .= implode( ', ', $flashvars );
				$content .= ' }';
			}

			$content .= ", vvqparams, vvqattributes);\n";
		}

		//$content .= "// ]]>\n"; // This gets broken by the_content(), so we can't use it
		$content .= "</script>\n";

		// Clear outputted calls
		$this->swfobjects = array();

		echo $content;
	}


	// WordPress' esc_js() won't allow <, >, or " -- instead it converts it to an HTML entity. This is a "fixed" function that's used when needed.
	function esc_js($text) {
		$safe_text = addslashes($text);
		$safe_text = preg_replace('/&#(x)?0*(?(1)27|39);?/i', "'", stripslashes($safe_text));
		$safe_text = preg_replace("/\r?\n/", "\\n", addslashes($safe_text));
		$safe_text = str_replace('\\\n', '\n', $safe_text);
		return apply_filters('js_escape', $safe_text, $text);
	}


	// This function always return FALSE (who woulda guessed?)
	function ReturnFalse() { return FALSE; }
}

// Start this plugin once all other plugins are fully loaded
add_action( 'init', 'VipersVideoQuicktags' ); function VipersVideoQuicktags() { global $VipersVideoQuicktags; $VipersVideoQuicktags = new VipersVideoQuicktags(); }

?>
