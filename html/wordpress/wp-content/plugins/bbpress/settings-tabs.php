<?php

// XTEC ************ FITXER AFEGIT - Add tabbed menu for custom bbpress menus
// 2014.06.16 @aginard

/*
 * The main plugin class, holds everything our plugin does,
 * initialized right after declaration
 */
class Xtec_Bbpress_Settings_Tabs {
	
	/*
	 * For easier overriding we declared the keys
	 * here as well as our tabs array which is populated
	 * when registering settings
	 */
	private $general_settings_key = 'xtec_settings';
	private $advanced_settings_key = 'xtec_advanced_settings';
	private $plugin_options_key = 'xtec_bbpress_options';
	private $plugin_settings_tabs = array();
	
	/*
	 * Fired during plugins_loaded (very very early),
	 * so don't miss-use this, only actions and filters,
	 * current ones speak for themselves.
	 */
	function __construct() {
		add_action( 'init', array( &$this, 'load_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_general_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_advanced_settings' ) );
		add_action( 'admin_menu', array( &$this, 'add_admin_menus' ) );
	}
	
	/*
	 * Loads both the general and advanced settings from
	 * the database into their respective arrays. Uses
	 * array_merge to merge with default values if they're
	 * missing.
	 */
	function load_settings() {
		$this->general_settings = (array) get_option( $this->general_settings_key );
		$this->advanced_settings = (array) get_option( $this->advanced_settings_key );
		
		// Merge with defaults
		$this->general_settings = array_merge( array(
			'general_option' => 'General value'
		), $this->general_settings );
		
		$this->advanced_settings = array_merge( array(
			'advanced_option' => 'Advanced value'
		), $this->advanced_settings );
	}
	
	/*
	 * Registers the general settings via the Settings API,
	 * appends the setting to the tabs array of the object.
	 */
	function register_general_settings() {
		$this->plugin_settings_tabs[$this->general_settings_key] = 'General';
		
		register_setting( $this->general_settings_key, $this->general_settings_key );
		add_settings_section( 'section_general', 'General Plugin Settings', array( &$this, 'section_general_desc' ), $this->general_settings_key );
		add_settings_field( 'general_option', 'A General Option', array( &$this, 'field_general_option' ), $this->general_settings_key, 'section_general' );
	}
	
	/*
	 * Registers the advanced settings and appends the
	 * key to the plugin settings tabs array.
	 */
	function register_advanced_settings() {
		$this->plugin_settings_tabs[$this->advanced_settings_key] = 'Advanced';
		
		register_setting( $this->advanced_settings_key, $this->advanced_settings_key );
		add_settings_section( 'section_advanced', 'Advanced Plugin Settings', array( &$this, 'section_advanced_desc' ), $this->advanced_settings_key );
		add_settings_field( 'advanced_option', 'An Advanced Option', array( &$this, 'field_advanced_option' ), $this->advanced_settings_key, 'section_advanced' );
	}
	
	/*
	 * The following methods provide descriptions
	 * for their respective sections, used as callbacks
	 * with add_settings_section
	 */
	function section_general_desc() { echo 'General section description goes here.'; }
	function section_advanced_desc() { echo 'Advanced section description goes here.'; }
	
	/*
	 * General Option field callback, renders a
	 * text input, note the name and value.
	 */
	function field_general_option() {
		?>
		<input type="text" name="<?php echo $this->general_settings_key; ?>[general_option]" value="<?php echo esc_attr( $this->general_settings['general_option'] ); ?>" />
		<?php
	}
	
	/*
	 * Advanced Option field callback, same as above.
	 */
	function field_advanced_option() {
		?>
		<input type="text" name="<?php echo $this->advanced_settings_key; ?>[advanced_option]" value="<?php echo esc_attr( $this->advanced_settings['advanced_option'] ); ?>" />
		<?php
	}
	
	/*
	 * Called during admin_menu, adds an options
	 * page under Settings called My Settings, rendered
	 * using the plugin_options_page method.
	 */
	function add_admin_menus() {
		//add_options_page( 'My Plugin Settings', 'My Settings', 'manage_options', $this->plugin_options_key, array( &$this, 'plugin_options_page' ) );
        add_menu_page( 'Fòrum', 'Fòrum', 'manage_options', $this->plugin_options_key, array( &$this, 'plugin_options_page' ), null, '31.1' );
	}
	
	/*
	 * Plugin Options page rendering goes here, checks
	 * for active tab and replaces key with the related
	 * settings key. Uses the plugin_options_tabs method
	 * to render the tabs.
	 */
	function plugin_options_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_settings_key;
      
		?>
		<div class="wrap">
			<?php $this->plugin_options_tabs(); ?>
<!--			<form method="post" action="options.php">
				<?php wp_nonce_field( 'update-options' ); ?>
				<?php settings_fields( $tab ); ?>
				<?php do_settings_sections( $tab ); ?>
				<?php submit_button(); ?>
			</form>
		</div>-->
		<?php
	}
	
	/*
	 * Renders our tabs in the plugin options page,
	 * walks through the object's tabs array and prints
	 * them one by one. Provides the heading for the
	 * plugin_options_page method.
	 */
	function plugin_options_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_settings_key;

		screen_icon();
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->plugin_options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';	
		}
		echo '</h2>';

        //include 'templates/default/bbpress/form-forum.php';
        
	}
};

// Initialize the plugin
add_action( 'plugins_loaded', create_function( '', '$xtec_settings_tabs = new Xtec_Bbpress_Settings_Tabs;' ) );
