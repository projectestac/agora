<?php

bpModLoader::load_class('bpModAbstractCore');

/**
 * bpModInstaller
 *
 * installer/upgrader/uninstaller of bp-moderation
 *
 * note: don't relay on bp wp-abstractions here
 *
 * @author Francesco
 */
class bpModInstaller extends bpModAbstractCore
{
	/**
	 * Run on activation
	 */
	function activate()
	{
		#$this->checkCompatibleOrFail();
	}

	/**
	 * Run on deactivation
	 */
	function deactivate()
	{
		$opts = get_site_option('bp_moderation_options');
		if (isset($opts['clean_up']) && 'on' == $opts['clean_up']) {
			$this->clean_up();
		}
	}

	/**
	 * Install/upgrade db tables, options...
	 */
	function install()
	{
		/***** CREATE/UPDATE DB *****/
		global $wpdb;

		$charset_collate = '';
		if (!empty($wpdb->charset)) {
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		}
		if (!empty($wpdb->collate)) {
			$charset_collate .= " COLLATE $wpdb->collate";
		}

		$sql = array();
		$stati_set = "'" . join("','", array_keys($this->content_stati)) . "'";
		$sql[] = "CREATE TABLE {$this->contents_table} (
			`content_id` BIGINT(20) unsigned NOT NULL auto_increment,
			`item_type` VARCHAR(42) NOT NULL default '',
			`item_id` BIGINT(20) unsigned NOT NULL default 0,
			`item_id2` BIGINT(20) unsigned NOT NULL default 0,
			`item_author` BIGINT(20) unsigned NOT NULL default 0,
			`item_date` DATETIME NOT NULL default '0000-00-00 00:00:00',
			`item_url` VARCHAR(250) NOT NULL default '',
			`status` ENUM($stati_set) NOT NULL default 'new',
			PRIMARY KEY  (content_id),
			KEY item_type (item_type),
			KEY item_id (item_id),
			KEY item_id2 (item_id2),
			KEY item_author (item_author),
			KEY item_date (item_date),
			KEY status (status)
			) {$charset_collate};";

		$sql[] = "CREATE TABLE {$this->flags_table} (
			`flag_id` BIGINT(20) unsigned NOT NULL auto_increment,
			`content_id` BIGINT(20) unsigned NOT NULL default 0,
			`reporter_id` BIGINT(20) unsigned NOT NULL default 0,
			`date` DATETIME NOT NULL default '0000-00-00 00:00:00',
			PRIMARY KEY  (flag_id),
			KEY content_id (content_id),
			KEY reporter_id (reporter_id),
			KEY date (date)
			) {$charset_collate};";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta($sql);
		/*** DB OK ***/

		/***** SET/UPDATE OPTIONS *****/
		$options = get_site_option('bp_moderation_options');

		// if options didn't exist set it as an empty array
		$options or $options = array();

		// activate types if first install, otherwise leave active_types as before
		if (!get_site_option('bp_moderation_db_version')) {
			$options['active_types'] = array_fill_keys(array('status_update', 'activity_comment', 'blog_post', 'blog_comment', 'member', 'group', 'forum_post'), 'on');
		}

// XTEC ************ MODIFICAT - Fixed translation of strings
// 2014.11.06 @aginard

		$def_options = array(
			'unflagged_text' => __('Flag', 'bp-moderation'),
			'flagged_text' => __('Unflag', 'bp-moderation'),
			'warning_threshold' => 5,
			'warning_forward' => get_option('admin_email'),
			'warning_message' => __(<<< TXT
Varis usuaris han indicat que un dels vostres continguts és inapropiat.
Podeu veure el contingut a la pàgina: %CONTENTURL%.
Heu publicat el contingut des del compte de "%AUTHORNAME%".

Els moderadors revisaran aquest contingut si ho consideren necessari.
--------------------
[%SITENAME%] %SITEURL%
TXT
				, 'bp-moderation'),
			'delete_threshold' => 0,
		);

//************ ORIGINAL
/*
        $def_options = array(
			'unflagged_text' => __('Flag', 'bp-moderation'),
			'flagged_text' => __('Unflag', 'bp-moderation'),
			'warning_threshold' => 5,
			'warning_forward' => get_option('admin_email'),
			'warning_message' => __(<<< TXT
Several user reported one of your content as inappropriate.
You can see the content in the page: %CONTENTURL%.
You posted this content with the account "%AUTHORNAME%".

A community moderator will soon review and moderate this content if necessary.
--------------------
[%SITENAME%] %SITEURL%
TXT
				, 'bp-moderation'),
			'delete_threshold' => 0,
		);
*/
//************ FI

		$options = array_merge($def_options, $options);

		update_site_option('bp_moderation_options', $options);
		/*** OPTIONS OK ***/

		update_site_option('bp_moderation_db_version', $this->db_ver);
	}

	/**
	 * Remove any trace of bp-moderation installation
	 */
	function clean_up()
	{
		delete_site_option('bp_moderation_db_version');

		global $wpdb;
		$wpdb->query("DROP TABLE {$this->contents_table}");
		$wpdb->query("DROP TABLE {$this->flags_table}");

		delete_site_option('bp_moderation_options');
	}

	/**
	 * Check compatibility and display an error message displayed when trying
	 * to activate on non compatible envoriment
	 */
	function checkCompatibleOrFail()
	{
		$wpv = $GLOBALS['wp_version'];
		$wpr = $this->min_wp_ver;
		$bpv = @constant('BP_VERSION');
		$bpr = $this->min_bp_ver;

		$failmessage = '';

		if (version_compare($wpv, $wpr, '<')) {
			$failmessage .= sprintf(__('You are using WordPress %s, please upgrade.', 'bp-moderation'), $wpv).'<br/>';
		}
		if (!$bpv) {
			$failmessage .= __(' Please install <a href="http://buddypress.org/" target="_blank" >Buddypress</a>.', 'bp-moderation').'<br/>';
		} elseif (version_compare($bpv, $bpr, '<')) {
			$failmessage .= sprintf(__('You are using BuddyPress %s, please upgrade.', 'bp-moderation'), $bpv).'<br/>';
		}

		if (!$failmessage) {
			return;
		}

		$failmessage = sprintf(__('BuddyPress Moderation require at least WordPress %1$s and BuddyPress %2$s to work.',
								  'bp-moderation'), $wpr, $bpr) .'<br/>'. $failmessage;

		include_once (ABSPATH . 'wp-admin/includes/plugin.php');
		deactivate_plugins(bpModLoader::file());
		die($failmessage);
	}
}

?>
