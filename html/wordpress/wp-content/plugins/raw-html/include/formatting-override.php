<?php

/*****************************************************
	Disable default formatting on a per-post level
******************************************************/

require 'screen-options/screen-options.php';

//Apply function $func to $content unless it's been disabled for the current post 
function maybe_use_filter($func, $content){
	global $post;
	if ( !isset($post) ) {
		return $func($content);
	}

	$settings = rawhtml_get_post_settings($post->ID);
	if ( $settings['disable_' . $func] ) {
		return $content;
	} else {
		return $func($content);
	}
}

//Stub filters that replace the WP defaults
function maybe_wptexturize($content){
	return maybe_use_filter('wptexturize', $content);
}

function maybe_wpautop($content){
	return maybe_use_filter('wpautop', $content);
}

function maybe_convert_chars($content){
	return maybe_use_filter('convert_chars', $content);
}

function maybe_convert_smilies($content){
	return maybe_use_filter('convert_smilies', $content);
}

// Disable default filters and add our conditional filters
function rawhtml_add_conditional_filters(){
	$filters = array(
		'the_content' => array(
			'wpautop',
			'wptexturize',
			'convert_chars',
			'convert_smilies',
		),
		'the_excerpt' => array(
			'wpautop',
			'wptexturize',
			'convert_chars',
			'convert_smilies',
		),
	);
	
	foreach ( $filters as $tag => $functions ){
		foreach ( $functions as $func ){
			if ( remove_filter($tag, $func) ){
				add_filter( $tag, 'maybe_'.$func, 9 );
			};
		}
	}
}
add_action('init', 'rawhtml_add_conditional_filters');

// Add a custom meta box for per-post settings 
add_action('admin_menu', 'rawhtml_add_custom_box');
add_action('save_post', 'rawhtml_save_postdata');

/* Adds a custom section to the "advanced" Post and Page edit screens */
function rawhtml_add_custom_box() {
  //WP 2.5+
  if( function_exists( 'add_meta_box' )) { 
  	foreach( array('post', 'page') as $type ) {
	    add_meta_box( 'rawhtml_meta_box', 'Raw HTML', 'rawhtml_meta_box', $type, 'side' );
    }
  }
}

/* Displays the custom box */
function rawhtml_meta_box(){
	global $post;

//XTEC ************ AFEGIT - Localization support
//2013.07.11 @jmiro227
load_plugin_textdomain( 'rawhtml', null, dirname( plugin_basename(RAWHTML_PLUGIN_FILE) ) . '/languages' );
//************ FI

	// Use nonce for verification
	echo '<input type="hidden" name="rawhtml_nonce" id="rawhtml_nonce" value="' . 
	wp_create_nonce( plugin_basename(RAWHTML_PLUGIN_FILE) ) . '" />';
	
	//Output checkboxes 

//XTEC ************ MODIFICAT - Localization support
//2013.07.11 @jmiro227
	$fields = array(
		'disable_wptexturize' => array(__("Disable wptexturize", 'rawhtml'), __("wptexturize is responsible for smart quotes and other typographic characters", 'rawhtml')),
		'disable_wpautop' => array(__("Disable automatic paragraphs", 'rawhtml'), null),
		'disable_convert_chars' => array(__("Disable convert_chars", 'rawhtml'), __("convert_chars converts ampersand to HTML entities and \"fixes\" some Unicode character", 'rawhtml')),
		'disable_convert_smilies' => array(__("Disable smilies", 'rawhtml'), null),
	);
//************ ORIGINAL
/*
	$fields = array(
		'disable_wptexturize' => array('Disable wptexturize', 'wptexturize is responsible for smart quotes and other typographic characters'),
		'disable_wpautop' => array('Disable automatic paragraphs', null),
		'disable_convert_chars' => array('Disable convert_chars', 'convert_chars converts ampersand to HTML entities and "fixes" some Unicode character'),
		'disable_convert_smilies' => array('Disable smilies', null),
	);
*/
//************ FI 

	$settings = rawhtml_get_post_settings($post->ID);

	echo '<ul>';
	foreach($fields as $field => $info){
		list($legend, $title) = $info;
		$current_setting = $settings[$field];

?>
<li><label for="rawhtml_<?php echo $field; ?>" title="<?php if (!empty($title)) echo esc_attr($title); ?>">
	<input type="checkbox" name="rawhtml_<?php echo $field; ?>" id="rawhtml_<?php echo $field; ?>" <?php
		if ($current_setting) echo ' checked="checked"';
	?>/>
	<?php echo $legend; ?>
</label>
</li> 
<?php
	}
	echo '</ul>';
}

/* Saves post metadata */
function rawhtml_save_postdata( $post_id ){
  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times
  
  if ( !isset($_POST['rawhtml_nonce']) ){
	return $post_id;
  }
  
  if ( !wp_verify_nonce( $_POST['rawhtml_nonce'], plugin_basename(RAWHTML_PLUGIN_FILE) )) {
    return $post_id;
  }

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ))
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ))
      return $post_id;
  }
  
  // OK, we're authenticated: we need to find and save the data
  $fields = rawhtml_get_settings_fields();
  $new_settings = array();
  foreach ( $fields as $field ){	
  	  if ( !empty($_POST['rawhtml_'.$field]) ){
		$new_settings[$field] = true;
	  } else {
		$new_settings[$field] = false;
	  };
  }
  rawhtml_save_post_settings($post_id, $new_settings);

  return true;
}

//Add our panel to the "Screen Options" box
add_screen_options_panel(
	'rawhtml-default-settings',       //Panel ID
	'Raw HTML defaults',              //Panel title. 
	'rawhtml_default_settings_panel', //The function that generates panel contents.
	array('post', 'page'),            //Pages/screens where the panel is displayed. 
	'rawhtml_save_new_defaults',      //The function that gets triggered when settings are submitted/saved.
	true                              //Auto-submit settings (via AJAX) when they change. 
);

/**
 * Retrieve the "disable_*" flags associated with a post.
 * If no flags have been set, this function will return the default settings.
 *
 * Note: Will transparently upgrade the old one-meta-key-per-flag storage system
 * to the new one-key-per-post one.
 *
 * @param int $post_id
 * @return array Flag values as an associative array.
 */
function rawhtml_get_post_settings($post_id) {
	$defaults = rawhtml_get_default_settings();
	$fields = rawhtml_get_settings_fields();

	//Per-post settings should be stored as a comma-separated list of 1/0 flags.
	$settings = get_post_meta($post_id, '_rawhtml_settings', true);
	if ( $settings != '' ) {
		$settings = explode(',', $settings, count($fields));
		$settings = array_combine($fields, $settings);
		foreach($settings as $field => $value) {
			$settings[$field] = (bool)intval($value);
		}
	} else {
		//Older versions of the plugin stored each flag in a separate meta key.
		$settings = array();
		$should_upgrade_settings = false;
		foreach($fields as $field) {
			$value = get_post_meta($post_id, '_'.$field, true);
			if ( $value == '' ){
				$value = get_post_meta($post_id, $field, true);
			}
			if ( $value == '' ){
				$value = $defaults[$field];
			} else {
				$value = (bool)intval($value);
				$should_upgrade_settings = true;
			}
			$settings[$field] = $value;
		}

		if ( $should_upgrade_settings ) {
			rawhtml_save_post_settings($post_id, $settings);
			rawhtml_delete_old_post_settings($post_id);
		}
	}

	return $settings;
}

/**
 * Save the "disable_*" flag values set for a post.
 *
 * @param int $post_id Post ID.
 * @param array $settings Flag values as an associative array.
 * @return void
 */
function rawhtml_save_post_settings($post_id, $settings) {
	$fields = rawhtml_get_settings_fields();
	$ordered_settings = array();
	foreach($fields as $field) {
		$ordered_settings[$field] = $settings[$field] ? '1' : '0';
	}
	update_post_meta($post_id, '_rawhtml_settings', implode(',', $ordered_settings));
}

/**
 * Delete the old one-key-per-flag metadata that older versions of the plugin
 * used to store per-post settings.
 *
 * @param int $post_id
 */
function rawhtml_delete_old_post_settings($post_id) {
	$fields = rawhtml_get_settings_fields();
	foreach($fields as $field) {
		delete_post_meta($post_id, $field);
	}
	foreach($fields as $field) {
		delete_post_meta($post_id, '_' . $field);
	}
}

function rawhtml_get_settings_fields() {
	return array('disable_wpautop', 'disable_wptexturize', 'disable_convert_chars', 'disable_convert_smilies');
}

/**
 * Retrieve the default settings for our post/page meta box.
 * Settings are saved in user meta.
 * 
 * @return array
 */
function rawhtml_get_default_settings(){
	//By default, all tweaks are disabled
	$defaults = array(
		'disable_wptexturize' => false,
		'disable_wpautop' => false,
		'disable_convert_chars' => false,
		'disable_convert_smilies' => false,
	);
	
	if ( !function_exists('wp_get_current_user') || !function_exists('get_user_meta') ){
		return $defaults;
	}
	
	//Get current defaults, if any
	$user = wp_get_current_user();
	$user_defaults = get_user_meta($user->ID, 'rawhtml_defaults', true);
	if ( is_array($user_defaults) ){
		$defaults = array_merge($defaults, $user_defaults);
	}
	
	return $defaults;
}

/**
 * Update default settings for our post/page meta box.
 * 
 * @param array $new_defaults
 * @return bool True on success, false on failure.
 */
function rawhtml_set_default_settings($new_defaults){
	if ( !function_exists('wp_get_current_user') || !function_exists('update_user_meta') ){
		return false;
	}
	
	//Get current defaults, if any
	$user = wp_get_current_user();
	if ( isset($user) && $user && isset($user->ID) ){
		return update_user_meta($user->ID, 'rawhtml_defaults', $new_defaults);
	} else {
		return false;
	}
}

/**
 * Generate the "Raw HTML defaults" panel for Screen Options.
 * 
 * @return string
 */
function rawhtml_default_settings_panel(){
	$defaults = rawhtml_get_default_settings();
	
//XTEC ************ AFEGIT - Localization support
//2013.07.11 @jmiro227
load_plugin_textdomain( 'rawhtml', null, dirname( plugin_basename(RAWHTML_PLUGIN_FILE) ) . '/languages' );
//************ FI

	//Output checkboxes
//XTEC ************ MODIFICAT - Localization support
//2013.07.11 @jmiro227
	$fields = array(
		'disable_wptexturize' => __("Disable wptexturize", 'rawhtml'),
		'disable_wpautop' => __("Disable automatic paragraphs", 'rawhtml'),
		'disable_convert_chars' => __("Disable convert_chars", 'rawhtml'),
		'disable_convert_smilies' => __("Disable smilies", 'rawhtml'),
	 );
//************ ORIGINAL
/* 
	$fields = array(
		'disable_wptexturize' => 'Disable wptexturize',
		'disable_wpautop' => 'Disable automatic paragraphs',
		'disable_convert_chars' => 'Disable convert_chars',
		'disable_convert_smilies' => 'Disable smilies',
	 );
	*/
//************ FI 
 
 	$output = '<div class="metabox-prefs">';
	foreach($fields as $field => $legend){
		$esc_field = esc_attr($field);
		$output .= sprintf(
			'<label for="rawhtml_default-%s" style="line-height: 20px;">
				<input type="checkbox" name="rawhtml_default-%s" id="rawhtml_default-%s"%s>
				%s
			</label><br>',
			$esc_field,
			$esc_field,
			$esc_field,
			($defaults[$field]?' checked="checked"':''),
			$legend
		);
	}
	$output .= "</div>";
	
	return $output;
}

/**
 * Process the "Raw HTML defaults" form fields and save new settings
 * 
 * @param array $params
 * @return void
 */
function rawhtml_save_new_defaults($params){
	//Get current defaults
	$defaults = rawhtml_get_default_settings();
	
	//Read new values from the submitted form
	foreach($defaults as $field => $old_value){
		if ( isset($params['rawhtml_default-'.$field]) && ($params['rawhtml_default-'.$field] == 'on') ){
			$defaults[$field] = true;
		} else {
			$defaults[$field] = false;
		}
	}
	
	//Store the new defaults
	rawhtml_set_default_settings($defaults);
}


?>