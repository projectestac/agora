<?php

/**
 * Handle links generation and placing in the activity loop
 */
class bpModFrontend extends bpModeration
{

	var $already_flagged = array();

	function  __construct()
	{
		parent::__construct();

		wp_enqueue_style('bp-moderation', $this->plugin_url . '/css/bp-moderation.css', false, $this->plugin_ver, 'screen');
		wp_enqueue_script('bp-moderation', $this->plugin_url . '/js/bp-moderation.js', array('jquery'), $this->plugin_ver, !'in footer');

		add_action('bp_activity_entry_meta', array(&$this, 'activity_loop_link'), 20);

		$this->already_flagged = $this->already_flagged_by_current_user();
	}

	/**
	 * query which contents are already been flagged by the current user
	 * it doesn't return an array, it join everything in a comma separated string
	 * with each content represented by $type_$id_$id2, so when checking if a particular
	 * content is already flagged is not necessary to iterate them but only checking
	 * if a key is present
	 *
	 * @return <string> concatenated list of item_type,item_id,item_id2
	 */
	function already_flagged_by_current_user()
	{
		global $wpdb, $bp;

		if (!$bp->loggedin_user->id) {
			return array();
		}

		//TODO: cache this

		$uid = (int)$bp->loggedin_user->id;

		$sql = "SELECT CONCAT_WS( '-', c.item_type, CAST( c.item_id AS CHAR ) , CAST( c.item_id2 AS CHAR ) ) as cont_key
				FROM {$this->contents_table} c NATURAL JOIN {$this->flags_table} f WHERE f.reporter_id = {$uid}";

		return $wpdb->get_col($sql);

	}

	function activity_loop_link()
	{

		$act_type = bp_get_activity_type();

		if (empty ($this->types_map[$act_type])) {
			return;
		}

		$args = array(
			'type' => $this->types_map[$act_type],
			'id' => bp_get_activity_item_id(),
			'id2' => bp_get_activity_secondary_item_id(),
			'author_id' => bp_get_activity_user_id(),
			'is_main_content' => bp_is_single_activity(),
			'context' => 'activity-loop',
			'custom_class' => 'button',
		);

		$args = apply_filters("bp_moderation_activity_loop_link_args_$act_type", $args);

		if ($args) {
			echo $this->generate_link($args);
		}
	}

	/**
	 * generte an <a href ...> tag that point to an url that trigger the flag
	 * for the content identified by given parameters
	 *
	 * @param <array|strings> $args see defaults
	 * @return <string> the flag/unflag link
	 */
	function generate_link($args = '')
	{

		$defaults = array(
			'type' => '', // content type slug as defined in register_content_type() (mandatory)
			'id' => 0, // primary id of the content (mandatory)
			'id2' => 0, // secondary id of the content
			'author_id' => 0, // id of the author, used only to check identify current user as the author
			'is_author' => false, // alternative to author_id, if current user is an author of the content
			'unflagged_text' => null, // text to be displayed when is not flagged, null = default text, false = no text
			'flagged_text' => null, // to be displayed when is already flagged, null = default text, false = no text
			'can_moderate' => is_super_admin(), // if current user can moderate the content, used in future features
			'is_main_content' => false, // if this content is the main content of the current page, used in future features
			'custom_class' => '', // custom css class of the link, use the class bpm-no-images if you do not want flag icon
			'context' => 'called', // internal arg, place a css class depending where and how the link is called
		);

		$params = wp_parse_args($args, $defaults);
		extract($params, EXTR_SKIP);

		//check mandatory params
		if (!$type || !$id) {
			return false;
		}

		$id = (int)$id;
		$id2 = (int)$id2;

		//TODO: anonymous flagging?cookies?
		if (!bp_loggedin_user_id()) {
			return null;
		}
		
		$is_author = $is_author || $author_id == bp_loggedin_user_id();

		// role relative to the content: 'moderator', 'author' or 'normal'
		if ($can_moderate) {
			$role = 'moderator';
		}
		elseif ($is_author)
		{
			$role = 'author';
		}
		else
		{
			$role = 'normal';
		}

		switch ($role) {
			case 'author':
				return null;
			case 'moderator':
			case 'normal':
				//has current user already flagged this?
				$flagged = in_array("$type-$id-$id2", $this->already_flagged);

				$action = $flagged ? 'unflag' : 'flag';

				$nonce = $this->create_nonce($action, $type, $id, $id2);

				$get_data = array(
					'bpmod-action' => $action,
					'type' => $type,
					'id' => $id,
					'id2' => $id2,
					'_wpnonce' => $nonce
				);

				$url = bp_core_get_root_domain() . '/?' . http_build_query($get_data);

				$text = $flagged ? $flagged_text : $unflagged_text;
				if (null === $text) {
					$text = $flagged ? $this->options['flagged_text']
						: $this->options['unflagged_text'];
				}

				$text = apply_filters('bp_moderation_link_text', $text, $flagged, $type, $id, $id2);

				$title_text = $flagged ? __('Unflag this content', 'bp-moderation') : __('Flag as inappropriate', 'bp-moderation');

				$link = "<a href='$url' title='" . $title_text;
				$link .= "' class='bpm-report-link bpm-type-{$type} ";
				$link .= $flagged ? 'bpm-flagged ' : 'bpm-unflagged ';
				$link .= (empty($text) ? 'bpm-no-text ' : '');
				$link .= "bpm-context-$context $custom_class' >";
				$link .= "<span class='bpm-inner-text' >" . ($text ? $text : '&nbsp;') . "</span>";
				$link .= "</a>";

				return apply_filters('bp_moderation_get_link', $link, $type, $is_author, $id, $id2);
			default:
				return null;
		}

	}

	/**
	 * print flag/unflag link
	 *
	 * static method for printing a reporting link
	 *
	 * @see bpModFrontend::generate_link for args details
	 */
	function link($args = '')
	{
		echo bpModFrontend::get_link($args);
	}

	/**
	 * Get flag/unflag link
	 *
	 * static method for getting a reporting link
	 *
	 * @see bpModFrontend::generate_link for args details
	 */
	function get_link($args = '')
	{
		$_this =& bpModeration::get_istance();
		return $_this->generate_link($args);
	}

}

?>
