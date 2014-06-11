<?php

/**
 * Handles plugin installation.
 */
class BpfbInstaller {

	/**
	 * Entry method.
	 *
	 * Handles Plugin installation.
	 *
	 * @access public
	 * @static
	 */
	static function install () {
		$me = new BpfbInstaller;
		if ($me->prepare_paths()) {
			$me->set_default_options();
		} else $me->kill_default_options();
	}

	/**
	 * Checks to see if the plugin is installed.
	 *
	 * If not, installs it.
	 *
	 * @access public
	 * @static
	 */
	static function check () {
		$is_installed = get_option('bpfb_plugin', false);
		if (!$is_installed) return BpfbInstaller::install();
		if (!BpfbInstaller::check_paths()) return BpfbInstaller::install();
		return true;
	}

	/**
	 * Checks to see if we have the proper paths and if they're writable.
	 *
	 * @access private
	 */
	function check_paths () {
		if (!file_exists(BPFB_TEMP_IMAGE_DIR)) return false;
		if (!file_exists(BPFB_BASE_IMAGE_DIR)) return false;
		if (!is_writable(BPFB_TEMP_IMAGE_DIR)) return false;
		if (!is_writable(BPFB_BASE_IMAGE_DIR)) return false;
		return true;
	}

	/**
	 * Prepares paths that will be used.
	 *
	 * @access private
	 */
	function prepare_paths () {
		$ret = true;

		if (!file_exists(BPFB_TEMP_IMAGE_DIR)) $ret = wp_mkdir_p(BPFB_TEMP_IMAGE_DIR);
		if (!$ret) return false;

		if (!file_exists(BPFB_BASE_IMAGE_DIR)) $ret = wp_mkdir_p(BPFB_BASE_IMAGE_DIR);
		if (!$ret) return false;

		return true;
	}

	/**
	 * (Re)sets Plugin options to defaults.
	 *
	 * @access private
	 */
	function set_default_options () {
		$options = array (
			'installed' => 1,
		);
		update_option('bpfb_plugin', $options);
	}

	/**
	 * Removes plugin default options.
	 */
	function kill_default_options () {
		delete_option('bpfb_plugin');
	}
}