<?php

bpModLoader::load_class('bpModAbstractCore');

/**
 * Contains vars and methods shared by frontend/backend/actions but not installer
 *
 * never create instance of this class directly
 *
 * @author Francesco
 */
class bpModeration extends bpModAbstractCore
{

	/**
	 * Full URL to the plugin
	 *
	 * @var string
	 */
	var $plugin_url;

	/**
	 * Contains supported content types and info about them
	 *
	 * @var array
	 */
	var $content_types = array();

	/**
	 * Maps activities 'type' to corresponding 'item_type' used in this plugin
	 *
	 * @var array
	 */
	var $types_map = array();

	/**
	 * contains stored options for this plugin
	 *
	 * @var array
	 */
	var $options;

	function __construct()
	{
		parent::__construct();

		$this->plugin_url = plugins_url('', bpModLoader::file());

		$this->options = get_site_option('bp_moderation_options');
	}

	/**
	 * function to easily create nonces that depends on multiple parameters
	 *
	 * pass as many parameters needed to identify an action
	 *
	 * @return <string> the generated nonce or false on failure
	 */
	function create_nonce()
	{
		$args = func_get_args();
		if (!$key = call_user_func_array(array(__CLASS__, '_nonce_key'), $args)) {
			return $key;
		}

		return wp_create_nonce($key);
	}

	/**
	 * function to easily verify nonces created with create_nonce method of this class
	 *
	 * pass same parameters passed to create_nonce
	 * the nonce must be in _wpnonce in get or post request
	 *
	 * @return <boolean> true if parameters and nonce are valid
	 */
	function verify_nonce()
	{
		$args = func_get_args();
		if (!$key = call_user_func_array(array(__CLASS__, '_nonce_key'), $args)) {
			return $key;
		}

		$nonce = $_REQUEST['_wpnonce'];

		return wp_verify_nonce($nonce, $key);
	}

	/**
	 * internal method used by create_nonce and verify_nonce
	 *
	 * @return <string> the nonce 'action' that depends on given parameters
	 */
	function _nonce_key()
	{
		if (0 == func_num_args()) {
			return false;
		}

		$args = func_get_args();

		$key = join('_', $args);

		return 'bp_moderation_' . $key;
	}

	/**
	 * why $_istance is an array? Zend 1 engine (php4) can't store a reference in
	 * a static var, but can store it as a value of a static array
	 */
	function &get_istance($cname = false)
	{
		static $_instance = null;

		if (null === $_instance && $cname) {

			bpModLoader::load_class($cname);
			$ref = & new $cname;

			$_instance = array(&$ref);
		}

		return $_instance[0];
	}

	/**
	 * for getting proprierties from outside a bpModeration child
	 */
	function get_property($name)
	{
		$_this = & bpModeration::get_istance();

		if (isset($_this->$name)) {
			return $_this->$name;
		}
		else
		{
			return null;
		}
	}

	/**
	 * for getting options from outside a bpModeration child
	 */
	function get_option($name)
	{
		$_this = & bpModeration::get_istance();

		if (isset($_this->options[$name])) {
			return $_this->options[$name];
		}
		else
		{
			return null;
		}
	}

	/**
	 * Use this function to register a content type not supported by default
	 *
	 * You must provides some callbacks for the content type to be handled by the plugin:
	 * - init : takes no args and returns void, it is called on frontend when this content
	 *		 type is active use it to hook around your link generation functions
	 * - info : takes id and id2 as args, returns false if no content correspond to those ids,
	 *		 otherwise an array in this format:
	 *			 author => [the content author ID]
	 *			 url	=> [the content permalink]
	 *			 date   => [the content generation date, in mysql DATETIME format]
	 * - delete : (optional) takes id and id2 as args, takes care of
	 *		 deleting specified content; returns true if deleted or if it doesn't exist, false if the content exist but wasn't possible to delete it.
	 * - edit : (optional) takes id and id2 as args, returns the url of
	 *		 the page where the admin can edit the specified content
	 *
	 * If the registered content is also present in the activity stream then you should
	 * provide an array of activity types that this content can be posted with, the
	 * plugin will take care of displaying the flag/unflag link in the activity stream
	 * id and secondary id that you provide to the activity component must coincide with those
	 * you provide to this plugin
	 *
	 * @param string $slug internal slug, used to differentiate between content types (alfanumeric and underscore only)
	 * @param string $label how this content type is called in the backend
	 * @param array $callbacks associative array of callbacks, see function description for mandatory and supported callbacks
	 * @param array $activity_types activity types that correspond to this content type
	 * @return bool false if passed args are invalid
	 */
	function register_content_type($slug, $label, $callbacks, $activity_types = null)
	{
		$_this = & bpModeration::get_istance();

		if (!$slug || !$label || !is_array($callbacks) || !is_callable($callbacks['info'])) {
			return false;
		}

		$callbacks = array_merge(
			array('init' => false, 'info' => false, 'delete' => false, 'editurl' => false), $callbacks
		);

		$ct = new stdClass();
		$ct->label = $label;
		$ct->callbacks = $callbacks;

		$_this->content_types[$slug] = $ct;

		if (empty($_this->options['active_types'][$slug])) {
			return true;
		}

		if (is_callable($callbacks['init'])) {
			call_user_func($callbacks['init']);
		}

		foreach ((array)$activity_types as $act_type)
		{
			$_this->types_map[$act_type] = $slug;
		}

		return true;
	}

}