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
		
		// Add admin scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		
		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ), 2 );
	}
	
	public function add_plugin_admin_menu() {
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
	
	public function display_admin_page() {
		include_once( 'views/admin/admin.php' );
	}
	
	/**
	 * Enqueue scripts for the admin area
	 * 
	 * @since 2.0.0
	 */
	public function enqueue_admin_scripts() {
		
		wp_enqueue_script( 'jquery' );
		
		wp_enqueue_script( 'jquery-ui-datepicker' );
		
		wp_enqueue_script( 'gce-admin', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ), $this->version, true );
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
				'feeds'    => '<a href="' . admin_url( 'edit.php?post_type=gce_feed' ) . '">' . __( 'Feeds', 'gce' ) . '</a>'
				//'settings' => '<a href="' . admin_url( 'edit.php?post_type=gce_feed&page=google-calendar-events_general_settings' ) . '">' . __( 'Settings', 'gce' ) . '</a>',
			),
			$links
		);

	}
}
