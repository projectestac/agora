<?php
/*
Plugin Name: BuddyPress Moderation
Plugin URI: http://buddypress.org/community/groups/bp-moderation/
Description: Plugin for moderation of buddypress communities, it adds a 'report this' link to every content so members can help admin finding inappropriate content.
Version: 0.1.7
Author: Francesco Laffi
Author URI: http://flweb.it
License: GPL2
Network: true
Text Domain: bp-moderation
Domain Path: /lang/
*/

/*  Copyright 2011  Francesco Laffi  (email : francesco.laffi@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

//load the plugin
new bpModLoader();

/**
 * Loader for bp-moderation
 */
class bpModLoader
{
	/**
	 * hook the plugin in buddypress and in activation/deactivation
	 */
	function __construct()
	{
		$this->basename = plugin_basename(dirname(__FILE__));

		add_action('bp_init', array($this, 'init'));

		register_activation_hook(__FILE__, array($this, 'call_activate'));

		register_deactivation_hook(__FILE__, array($this, 'call_deactivate'));
	}

	/**
	 * Load needed class
	 */
	function init()
	{
		if (is_admin() && !(defined('DOING_AJAX') && DOING_AJAX)) {
			// if this is an admin page and the current user is not a site admin then the plugin doesn't load at all
			if (!is_super_admin()) {
				return;
			}

			if (!empty($_REQUEST['bpmod-action'])) {
				$mainclass = 'bpModBackendActions';
			} else {
				$mainclass = 'bpModBackend';
			}
		} else {
			if (!empty($_REQUEST['bpmod-action']) || 'bpmodfrontend' === $_REQUEST['action']) {
				$mainclass = 'bpModActions';
			} else {
				$mainclass = 'bpModFrontend';
			}
		}

		$this->loadL10n();

		//create an istance of the main class for this situation
		bpModLoader::load_class('bpModeration');
		$bpMod =& bpModeration::get_istance($mainclass);

		//load the default content types
		bpModLoader::load_class('bpModDefaultContentTypes');
		bpModDefaultContentTypes::init($bpMod);

		do_action('bp_moderation_loaded', array(&$this));

		do_action('bp_moderation_init', array(&$bpMod));
	}

	/**
	 * Load string translations
	 *
	 * will load the first translation found from:
	 * - wp-content/plugins/bp-moderation-xx_XX.mo
	 * - wp-content/plugins/bp-moderation/lang/bp-moderation-xx_XX.mo
	 *
	 * @return bool if a translation was found and loaded
	 */
	function loadL10n(){
		return load_plugin_textdomain('bp-moderation')
			|| load_plugin_textdomain('bp-moderation', false, $this->basename.'/lang');
	}

	private function call_installer($method, $args = array())
	{
		$this->loadL10n();
		bpModLoader::load_class('bpModInstaller');
		$installer = new bpModInstaller();
		call_user_func_array(array($installer,$method), $args);
	}

	/**
	 * activation callback
	 */
	function call_activate()
	{
		$this->call_installer('activate', func_get_args());
	}

	/**
	 * deactivation callback
	 */
	function call_deactivate()
	{
		$this->call_installer('deactivate', func_get_args());
	}

	/**
	 * load a class
	 *
	 * @param string $cname classname
	 */
	function load_class($cname)
	{
		if (class_exists($cname)) {
			return;
		}

		require_once dirname(__FILE__) . '/classes/' . $cname . '.php';
	}

	/**
	 * bpModLoader file path
	 *
	 * @return string this file path
	 */
	static function file()
	{
		return __FILE__;
	}

	/**
	 * generated random data
	 */
	function test_data()
	{
		set_time_limit(0);

		global $wpdb;
		$users = $wpdb->get_col("SELECT ID FROM $wpdb->users WHERE ID != 1");

		if (is_multisite()) {
			$wpdb->query("DELETE FROM $wpdb->signups");
		}

		foreach ($users as $id)
		{
			bp_core_delete_account($id);
		}

		$ngu = 2; #how much only good users
		$ngbu = 2; #how much not only good or only bad users
		$nbu = 2; #how much only bad users
		$content_types = array('A', 'B', 'C', 'D');

		$bpmod =& bpModeration::get_istance();
		$statuses = array_keys($bpmod->content_stati);
		$n_contents = 20;
		$flags_per_cont = 20; # +/- 30%

		$goodusers = array();
		$badusers = array();

		for ($i = 1; $i <= $ngu + $ngbu + $nbu; $i++) {
			$uid = bp_core_signup_user('user' . $i, 'pass', $i . '@foo.bar', array());
			if (is_multisite()) {
				global $wpdb;
				$key_sql = "SELECT activation_key FROM $wpdb->signups WHERE user_email = '" . $i . "@foo.bar'";
				$key = $wpdb->get_var($key_sql);
			} else {
				$key = get_user_meta($uid, 'activation_key');
			}

			$uid = bp_core_activate_signup($key);

			is_multisite() and
			wp_set_password('pass', $uid);

			if ($i <= $ngu + $ngbu) {
				$goodusers[] = $uid;
			}
			if ($i > $ngu) {
				$badusers[] = $uid;
			}
		}

		bpModLoader::load_class('bpModObjContent');
		bpModLoader::load_class('bpModObjFlag');

		for ($i = 1; $i <= $n_contents; $i++) {
			$badu = $badusers[mt_rand(0, count($badusers) - 1)];
			$cont = new bpModObjContent();
			$cont->item_type = $content_types[mt_rand(0, count($content_types) - 1)];
			$cont->item_id = mt_rand(1, 1000000);
			$cont->item_author = $badu;
			$cont->item_date = gmdate("Y-m-d H:i:s", time() - mt_rand(1000000, 2000000));
			$cont->status = $statuses[mt_rand(0, count($statuses) - 1)];
			$cont->save();

			$flags = mt_rand($flags_per_cont * 0.7, $flags_per_cont * 1.3);

			for ($j = 1; $j <= $flags; $j++) {
				while ($badu == ($goodu = $goodusers[mt_rand(0, count($goodusers) - 1)])) {
					;
				}

				$f = new bpModObjFlag();
				$f->content_id = $cont->content_id;
				$f->reporter_id = $goodu;
				$f->date = gmdate("Y-m-d H:i:s", time() - mt_rand(0, 1000000));
				$f->save();
			}


		}

		update_site_option('bp_moderation_test_data_check', 'success');

	}
}

?>
