<?php
/**
 * Google Calendar Events Admin
 *
 * @package   GCE Admin
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @link      http://philderksen.com
 * @copyright 2014 Phil Derksen
 */


class Google_Calendar_Events_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    2.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;
	
	protected $version = '';

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    2.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     2.0.0
	 */
	private function __construct() {

		$plugin = Google_Calendar_Events::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();
		
		$this->version = $plugin->get_plugin_version();
		
		add_filter( 'plugin_action_links_' . plugin_basename( plugin_dir_path( __FILE__ ) . $this->plugin_slug . '.php' ), array( $this, 'add_action_links' ) );
		
		// Setup admin side constants
		add_action( 'init', array( $this, 'define_admin_constants' ) );
		
		// Add admin styles
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		
		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ), 2 );

		// Add admin notice for users upgrading from before 2.1.0.
		if( version_compare( $this->version, '2.1.0', '<' ) ) {
			add_action( 'admin_notices', array( $this, 'show_admin_notice' ) );
		}
		
		// Add admin notice after plugin activation. Also check if should be hidden.
		add_action( 'admin_notices', array( $this, 'admin_api_settings_notice' ) );
	}
	
	/**
	 * Show notice after plugin install/activate
	 * Also check if user chooses to hide it.
	 *
	 * @since   2.1.0
	 */
	public function admin_api_settings_notice() {
		// Exit all of this is stored value is false/0 or not set.
		if ( false == get_option( 'gce_show_admin_install_notice' ) ) {
			return;
		}
		
		$screen = get_current_screen();

		// Delete stored value if "hide" button click detected (custom querystring value set to 1).
		if ( ! empty( $_REQUEST['gce-dismiss-install-nag'] ) ||  in_array( $screen->id, $this->plugin_screen_hook_suffix ) ) {
			delete_option( 'gce_show_admin_install_notice' );
			return;
		}

		// At this point show install notice. Show it only on the plugin screen.
		if( get_current_screen()->id == 'plugins' || $this->viewing_this_plugin() ) {
			include_once( 'views/admin/api-settings-notice.php' );
		}
	}
	
	/**
	 * Check if viewing one of this plugin's admin pages.
	 *
	 * @since   2.1.0
	 *
	 * @return  bool
	 */
	private function viewing_this_plugin() {
		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return false;
		}
		
		$screen = get_current_screen();

		if ( $screen->id == 'edit-gce_feed' || $screen->id == 'gce_feed' ) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    2.1.0
	 */
	public static function activate() {
		update_option( 'gce_show_admin_install_notice', 1 );
	}
	
	public function add_plugin_admin_menu() {

// XTEC ************ AFEGIT - Block access to all users but xtecadmin
// 2014.10.22 @aginard

        global $isAgora;
        
        if (($isAgora && is_xtecadmin()) || !$isAgora) {

//************ FI
            
		// Add Help submenu page
		$this->plugin_screen_hook_suffix[] = add_submenu_page(
			'edit.php?post_type=gce_feed',
			__( 'General Settings', 'gce' ),
			__( 'General Settings', 'gce' ),
			'manage_options',
			$this->plugin_slug . '_general_settings',
			array( $this, 'display_admin_page' )
		);
        }

// XTEC ************ AFEGIT - Block access to all users but xtecadmin
// 2014.10.22 @aginard
	}
//************ FI
    
	public function display_admin_page() {
		include_once( 'views/admin/admin.php' );
	}
	
	/**
	 * Enqueue styles for the admin area
	 * 
	 * @since 2.0.0
	 */
	public function enqueue_admin_styles() {
		
		wp_enqueue_style( 'jquery-ui-datepicker-css', plugins_url( 'css/jquery-ui-1.10.4.custom.min.css', __FILE__ ), array(), $this->version );
		
		wp_enqueue_style( 'gce-admin', plugins_url( 'css/admin.css', __FILE__ ), array(), $this->version, 'all' );
	}
	
	/**
	 * Define constants that will be used throughout admin specific code
	 * 
	 * @since 2.0.0
	 */
	public function define_admin_constants() {
		if( ! defined( 'GCE_DIR' ) ) {
			define( 'GCE_DIR', dirname( __FILE__ ) );
		}
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     2.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	/**
	 * Return plugin name
	 * 
	 * @since 2.0.0
	 */
	public function get_plugin_title() {
		return __( 'Google Calendar Events', 'gce' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    2.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'edit.php?post_type=gce_feed&page=google-calendar-events_general_settings' ) . '">' . __( 'General Settings', 'gce' ) . '</a>',
				'feeds'    => '<a href="' . admin_url( 'edit.php?post_type=gce_feed' ) . '">' . __( 'Feeds', 'gce' ) . '</a>'
			),
			$links
		);
	}

	/**
	 * Use to show an important admin notice.
	 *
	 * @since    2.0.7.1
	 */

	/**
	 * Example use in constructor:

		if( version_compare( $this->version, '2.1.0', '<' ) ) {
			add_action( 'admin_notices', array( $this, 'show_admin_notice' ) );
		}
	 */
	function show_admin_notice() {
		include_once( 'includes/admin/admin-notice.php' );
	}
}
