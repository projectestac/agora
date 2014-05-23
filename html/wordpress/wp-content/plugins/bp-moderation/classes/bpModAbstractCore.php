<?php

/**
 * Contains vars and methods shared by installer/frontend/backend/actions
 *
 * never create instance of this class directly
 *
 * @author Francesco
 */
class bpModAbstractCore
{

	/**
	 * BuddyPress Moderation version
	 *
	 * @var string
	 */
	var $plugin_ver = '0.1.7';

	/**
	 * database tables & options version
	 *
	 * needed to check if install/upgrade is needed or not on activation
	 *
	 * @var int
	 */
	var $db_ver = -100;

	/**
	 * required version of wordpress
	 *
	 * @var string
	 */
	var $min_wp_ver = '3.2';

	/**
	 * required version of buddypress
	 *
	 * @var string
	 */
	var $min_bp_ver = '1.5';

	/**
	 * Name of the db table where reported contents are stored
	 *
	 * db prefix get added in __construct
	 *
	 * @var string
	 */
	var $contents_table = 'bp_mod_contents';

	/**
	 * Name of the db table where flags are stored
	 *
	 * db prefix get added in __construct
	 *
	 * @var string
	 */
	var $flags_table = 'bp_mod_flags';

	/**
	 * Array of the stati contents can be in
	 *
	 * map status slug to status label
	 *
	 * @var array
	 */
	var $content_stati;

	/**
	 * bpModAbstractCore constructor
	 */
	function __construct()
	{
		global $wpdb;

		$this->contents_table = $wpdb->base_prefix . $this->contents_table;
		$this->flags_table = $wpdb->base_prefix . $this->flags_table;

		$this->content_stati = array(
			'new' => __('new', 'bp-moderation'),
			'warned' => __('author warned', 'bp-moderation'),
			'ignored' => __('ignored', 'bp-moderation'),
			'moderated' => __('moderated (unknown)', 'bp-moderation'),
			'edited' => __('moderated (edited)', 'bp-moderation'),
			'deleted' => __('moderated (deleted)', 'bp-moderation')
		);
	}
}

?>
