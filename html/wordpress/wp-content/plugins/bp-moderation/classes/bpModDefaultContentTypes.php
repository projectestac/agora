<?php

/**
 * wrap the functions for all WP/BP core types
 *
 * these content types are hardcoded for speeding up load, but they are not a good example
 * on writing custom content types, please see 'intergration guide' in the plugin folder.
 *
 */
class bpModDefaultContentTypes
{

	/**
	 * hardcode default modules in bpModeration istance
	 *
	 * @param bpModeration $bpmod main plugin instance
	 */
	function init(&$bpmod)
	{

		//init only if in frontend and only for choosen type
		if (is_a($bpmod, 'bpModFrontend')) {
			$init_types =& $bpmod->options['active_types'];
		}

		// TODO: check if corrisponding bp components are active before adding useless data

		//  status updates
		$bpmod->content_types['status_update'] = new stdClass();
		$bpmod->content_types['status_update']->label = __('Status update', 'bp-moderation');
		$bpmod->content_types['status_update']->callbacks = array(
			'info' => array(__CLASS__, 'activity_info'),
			'delete' => array(__CLASS__, 'activity_delete')
		);

		if (isset ($init_types['status_update'])) {
			$bpmod->types_map['activity_update'] = 'status_update';
			add_filter('bp_moderation_activity_loop_link_args_activity_update', array(__CLASS__, 'activity_correct_ids'));
		}

		//  status comments
		$bpmod->content_types['activity_comment'] = new stdClass();
		$bpmod->content_types['activity_comment']->label = __('Activity comment', 'bp-moderation');
		//callbacks are the same of status updates because both content types stay in the activity table
		$bpmod->content_types['activity_comment']->callbacks = array(
			'info' => array(__CLASS__, 'activity_info'),
			'delete' => array(__CLASS__, 'activity_delete')
		);

		if (isset ($init_types['activity_comment'])) {
			$bpmod->types_map['activity_comment'] = 'activity_comment';
			add_filter('bp_moderation_activity_loop_link_args_activity_comment', array(__CLASS__, 'activity_correct_ids'));
			add_action('bp_activity_comment_options', array(__CLASS__, 'activity_comments_print_link'));
		}

		//  blog posts
		$bpmod->content_types['blog_post'] = new stdClass();
		$bpmod->content_types['blog_post']->label = __('Blog post', 'bp-moderation');
		$bpmod->content_types['blog_post']->callbacks = array(
			'info' => array(__CLASS__, 'blog_post_info'),
			'edit' => array(__CLASS__, 'blog_post_edit'),
			'delete' => array(__CLASS__, 'blog_post_delete')
		);

		if (isset ($init_types['blog_post'])) {
			$bpmod->types_map['new_blog_post'] = 'blog_post';
			add_filter('the_content', array(__CLASS__, 'blog_post_append_link'));
			add_filter('the_excerpt', array(__CLASS__, 'blog_post_append_link'));
		}

		//  blog page
		$bpmod->content_types['blog_page'] = new stdClass();
		$bpmod->content_types['blog_page']->label = __('Blog page', 'bp-moderation');
		$bpmod->content_types['blog_page']->callbacks = array(
			'info' => array(__CLASS__, 'blog_post_info'),
			'edit' => array(__CLASS__, 'blog_post_edit'),
			'delete' => array(__CLASS__, 'blog_post_delete')
		);

		if (isset ($init_types['blog_page'])) {
			add_filter('the_content', array(__CLASS__, 'blog_page_append_link'));
			add_filter('the_excerpt', array(__CLASS__, 'blog_page_append_link'));
		}

		//  blog comments
		$bpmod->content_types['blog_comment'] = new stdClass();
		$bpmod->content_types['blog_comment']->label = __('Blog comment', 'bp-moderation');
		$bpmod->content_types['blog_comment']->callbacks = array(
			'info' => array(__CLASS__, 'blog_comment_info'),
			'edit' => array(__CLASS__, 'blog_comment_edit'),
			'delete' => array(__CLASS__, 'blog_comment_delete')
		);
		add_filter('bp_moderation_author_details_for_blog_comment', array(__CLASS__, 'blog_comment_author_details'), 10, 2);

		if (isset ($init_types['blog_comment'])) {
			$bpmod->types_map['new_blog_comment'] = 'blog_comment';
			add_filter('get_comment_text', array(__CLASS__, 'blog_comment_append_link'));
		}

		//  profiles
		$bpmod->content_types['member'] = new stdClass();
		$bpmod->content_types['member']->label = __('Member', 'bp-moderation');
		$bpmod->content_types['member']->callbacks = array(
			'info' => array(__CLASS__, 'member_info'),
			'edit' => array(__CLASS__, 'member_edit'),
			'delete' => array(__CLASS__, 'member_delete')
		);

		if (isset ($init_types['member'])) {
			add_action('bp_after_member_home_content', array(__CLASS__, 'member_print_link'));
		}

		//  groups
		$bpmod->content_types['group'] = new stdClass();
		$bpmod->content_types['group']->label = __('Group', 'bp-moderation');
		$bpmod->content_types['group']->callbacks = array(
			'info' => array(__CLASS__, 'group_info'),
			'edit' => array(__CLASS__, 'group_edit'),
			'delete' => array(__CLASS__, 'group_delete')
		);

		if (isset ($init_types['group'])) {
			add_action('bp_after_group_home_content', array(__CLASS__, 'group_print_link'));
		}

		//  forum topic
		$bpmod->content_types['forum_topic'] = new stdClass();
		$bpmod->content_types['forum_topic']->label = __('Legacy Forum topic', 'bp-moderation');
		$bpmod->content_types['forum_topic']->callbacks = array(
			'info' => array(__CLASS__, 'forum_topic_info'),
			'edit' => array(__CLASS__, 'forum_topic_edit'),
			'delete' => array(__CLASS__, 'forum_topic_delete')
		);

		if (isset ($init_types['forum_topic'])) {
			add_action('bp_group_forum_topic_meta', array(__CLASS__, 'forum_topic_print_link'));
		}

		//  forum post
		$bpmod->content_types['forum_post'] = new stdClass();
		$bpmod->content_types['forum_post']->label = __('Legacy Forum post', 'bp-moderation');
		$bpmod->content_types['forum_post']->callbacks = array(
			'info' => array(__CLASS__, 'forum_post_info'),
			'edit' => array(__CLASS__, 'forum_post_edit'),
			'delete' => array(__CLASS__, 'forum_post_delete')
		);

		if (isset ($init_types['forum_post'])) {
			$bpmod->types_map['new_forum_post'] = 'forum_post';
			$bpmod->types_map['new_forum_topic'] = 'forum_post';
			add_filter('bp_moderation_activity_loop_link_args_new_forum_topic', array(__CLASS__, 'forum_post_convert_activity_args'));
			add_action('bp_group_forum_post_meta', array(__CLASS__, 'forum_post_print_link'));
		}
	
                
		//  private message sender
		$bpmod->content_types['private_message_sender'] = new stdClass();
		$bpmod->content_types['private_message_sender']->label = __('Private message sender', 'bp-moderation');
		$bpmod->content_types['private_message_sender']->callbacks = array(
			'info' => array(__CLASS__, 'member_info'),
			'edit' => array(__CLASS__, 'member_edit'),
			'delete' => array(__CLASS__, 'member_delete')
		);
		if (isset ($init_types['private_message_sender'])) {
			add_action('bp_after_message_thread_list', array(__CLASS__, 'private_message_sender_print_links'));
		}
		
		//  private message
		$bpmod->content_types['private_message'] = new stdClass();
		$bpmod->content_types['private_message']->label = __('Private message', 'bp-moderation');
		$bpmod->content_types['private_message']->callbacks = array(
			'info' => array(__CLASS__, 'private_message_info'),
			'delete' => array(__CLASS__, 'private_message_delete')
		);
		if (isset ($init_types['private_message'])) {
			add_action('bp_after_message_thread_list', array(__CLASS__, 'private_message_print_links'));
		}
		add_filter('bp_moderation_filter_content_backend_for_private_message', array(__CLASS__, 'private_message_view_link_override'));
		add_action('messages_action_view_message', array(__CLASS__, 'private_message_super_admin_override'));


		//  load custom content types
		if (defined('BPMOD_LOAD_CUSTOM_CONTENT_TYPES') && BPMOD_LOAD_CUSTOM_CONTENT_TYPES) {
			$custom_content_types = glob(WP_PLUGIN_DIR . '/bp-moderation-content-types/*.php');

			foreach ($custom_content_types as $ct)
			{
				include_once ($ct);
			}
		}
	}

	/*******************************************************************************
	 * status_update & activity_comment
	 */

	function activity_info($id, $id2)
	{
		$act = new BP_Activity_Activity($id);
		if (empty($act->user_id)) {
			return false;
		}

		$url = bp_core_get_root_domain() . '/' . BP_ACTIVITY_SLUG . '/p/' . $id . '/';

		return array('author' => $act->user_id, 'url' => $url, 'date' => $act->date_recorded);
	}

	function activity_delete($id, $id2)
	{
		$act = new BP_Activity_Activity($id);

		if (empty($act->user_id)) {
			return true;
		} //was already deleted

		return bp_activity_delete(array('id' => $id, 'user_id' => $act->user_id));
	}

	function activity_correct_ids($args)
	{
		$args['id'] = bp_get_activity_id();
		$args['id2'] = bp_get_activity_item_id();
		return $args;
	}

	function activity_comments_print_link()
	{
		$link = bpModFrontend::get_link(array(
											 'type' => 'activity_comment',
											 'author_id' => bp_get_activity_comment_user_id(),
											 'id' => bp_get_activity_comment_id(),
											 'id2' => bp_get_activity_id(),
											 'custom_class' => 'bpm-no-images bp-secondary-action'
										));
		echo $link;
	}

	/*******************************************************************************
	 * blog_post
	 */

	function blog_post_info($id, $id2)
	{
		switch_to_blog($id);

		if (!$post = get_post($id2)) {
			return restore_current_blog() && false;
		}

		$url = home_url("?p=$id2");

		restore_current_blog();

		return array('author' => $post->post_author, 'url' => $url, 'date' => $post->post_date_gmt);
	}

	function blog_post_edit($id, $id2)
	{
		switch_to_blog($id);

		$url = admin_url("post.php?post=$id2&action=edit");

		restore_current_blog();

		return $url;
	}

	function blog_post_delete($id, $id2)
	{
		switch_to_blog($id);

		$r = !get_post($id2) || wp_delete_post($id2);

		restore_current_blog();

		return $r;
	}

	function blog_post_append_link($content)
	{
		global $wpdb, $post;

		if ('post' != $post->post_type) {
			return $content;
		}

		$link = bpModFrontend::get_link(array(
											 'type' => 'blog_post',
											 'author_id' => $post->post_author,
											 'id' => $wpdb->blogid,
											 'id2' => $post->ID,
											 'unflagged_text' => __('Flag this post as inappropriate', 'bp-moderation')
										));

		return "$content\n\n$link";
	}

	function blog_page_append_link($content)
	{
		global $wpdb, $post;

		if ('page' != $post->post_type) {
			return $content;
		}

		$link = bpModFrontend::get_link(array(
											 'type' => 'blog_page',
											 'author_id' => $post->post_author,
											 'id' => $wpdb->blogid,
											 'id2' => $post->ID,
											 'unflagged_text' => __('Flag this page as inappropriate', 'bp-moderation')
										));

		return "$content\n\n$link";
	}

	/*******************************************************************************
	 * blog_comment
	 */

	function blog_comment_info($id, $id2)
	{
		switch_to_blog($id);

		if (!$comment = get_comment($id2)) {
			return restore_current_blog() && false;
		}

		$url = home_url("?p=$comment->comment_post_ID#comment-$id2");
		$user = get_user_by_email($comment->comment_author_email);
		$author = (int)$user->ID;

		restore_current_blog();

		return array('author' => $author, 'url' => $url, 'date' => $comment->comment_date_gmt);
	}

	function blog_comment_edit($id, $id2)
	{
		switch_to_blog($id);

		$url = admin_url("comment.php?action=editcomment&c=$id2");

		restore_current_blog();

		return $url;
	}

	function blog_comment_delete($id, $id2)
	{
		switch_to_blog($id);

		$r = !get_comment($id2) || wp_delete_comment($id2);

		restore_current_blog();

		return $r;
	}

	function blog_comment_author_details($details, $cont)
	{
		switch_to_blog($cont->item_id);

		$email = get_comment_author_email($cont->item_id2);

		$details = array(
			'avatar_img' => get_avatar($email, 32),
			'user_link' => get_comment_author_link($cont->item_id2),
			'contact_link' => $email
				? "<a class='vim-c' href='mailto:$email' title='" . __('Send an email to the author of this content', 'bp-moderation') . "' >" . __('Send email', 'bp-moderation') . "</a>"
				: ''
		);

		restore_current_blog();

		return $details;
	}

	function blog_comment_append_link($comment_text)
	{
		global $wpdb, $comment;

		$link = bpModFrontend::get_link(array(
											 'type' => 'blog_comment',
											 'author_id' => $comment->user_id,
											 'id' => $wpdb->blogid,
											 'id2' => $comment->comment_ID,
											 'unflagged_text' => __('Flag this comment as inappropriate', 'bp-moderation')
										));

		return $comment_text . "\n\n$link";
	}

	/*******************************************************************************
	 * member
	 */
	function member_info($id, $id2)
	{
		if (!$user = get_userdata($id)) {
			return false;
		}

		return array('author' => $id, 'url' => bp_core_get_user_domain($id), 'date' => $user->user_registered);
	}

	function member_edit($id, $id2)
	{
		if (bp_is_active('x-profile')) {
			return bp_core_get_user_domain($id) . $GLOBALS['bp']->profile->slug . '/edit/';
		}
		else
		{
			return admin_url("user-edit.php?user_id=$id");
		}
	}

	function member_delete($id, $id2)
	{
		if (!$user = get_userdata($id)) {
			return true;
		}
		if (is_super_admin($id) || bp_loggedin_user_id() == $id) {
			return false;
		}

		//let admins delete members also if account deletion disabled
		$disable_deletion = get_site_option('bp-disable-account-deletion');
		if ($disable_deletion) {
			delete_site_option('bp-disable-account-deletion');
		}

		$r = bp_core_delete_account($id);

		if ($disable_deletion) {
			add_site_option('bp-disable-account-deletion', $disable_deletion);
		}

		return $r;
	}

	function member_print_link()
	{
		$link = bpModFrontend::get_link(array(
											 'type' => 'member',
											 'author_id' => bp_displayed_user_id(),
											 'id' => bp_displayed_user_id(),
											 'unflagged_text' => __('Flag this member as inappropriate', 'bp-moderation')
										));

		echo "<div class='bpm-right-link bpm-bottom-link'>$link</div>";
	}

	/*******************************************************************************
	 * group
	 */
	function group_info($id, $id2)
	{
		if (!$group = groups_get_group(array('group_id' => $id))) {
			return false;
		}
		return array('author' => $group->creator_id, 'url' => bp_get_group_permalink($group), 'date' => $group->date_created);
	}

	function group_edit($id, $id2)
	{
		return bp_get_group_permalink($id) . 'admin/edit-details/';
	}

	function group_delete($id, $id2)
	{
		return !groups_get_group(array('group_id' => $id)) || groups_delete_group($id);
	}

	function group_print_link()
	{
		$group = $GLOBALS['bp']->groups->current_group;

		$is_author = $group->creator_id == bp_loggedin_user_id();

		if (!$is_author && !empty($group->admins)) {
			foreach ($group->admins as $admin) {
				if ($admin->user_id == bp_loggedin_user_id()) {
					$is_author = true;
					break;
				}
			}
		}

		$link = bpModFrontend::get_link(array(
											 'type' => 'group',
											 'is_author' => $is_author,
											 'id' => $group->id,
											 'id2' => 0,
											 'unflagged_text' => __('Flag this group as inappropriate', 'bp-moderation')
										));

		echo "<div class='bpm-right-link bpm-bottom-link'>$link</div>";
	}

	/*******************************************************************************
	 * forum_topic
	 */

	function forum_topic_info($id, $id2)
	{
		if (!$topic = bp_forums_get_topic_details($id2)) {
			return false;
		}

		$url = bp_core_get_root_domain() . '/' . BP_GROUPS_SLUG . '/' . $topic->object_slug . '/forum/topic/' . $topic->topic_slug . '/';

		return array('author' => $topic->topic_poster, 'url' => $url, 'date' => $topic->topic_start_time);
	}

	function forum_topic_edit($id, $id2)
	{
		if (!$topic = bp_forums_get_topic_details($id2)) {
			return false;
		}

		$url = bp_core_get_root_domain() . '/' . BP_GROUPS_SLUG . '/' . $topic->object_slug . '/forum/topic/' . $topic->topic_slug . '/edit/';

		return wp_nonce_url($url, 'bp_forums_edit_topic');
	}

	function forum_topic_delete($id, $id2)
	{
		return !bp_forums_get_topic_details($id2) || groups_delete_group_forum_topic($id2);
	}

	function forum_topic_print_link()
	{
		$link = bpModFrontend::get_link(array(
											 'type' => 'forum_topic',
											 'author_id' => 0,
											 'id' => $GLOBALS['bp']->groups->current_group->id,
											 'id2' => bp_get_the_topic_id(),
											 'unflagged_text' => __('Flag Whole Topic', 'bp-moderation'),
											 'custom_class' => 'bpm-no-images'
										));
		echo "<span class='links-separator'> | </span>$link";
	}

	/*******************************************************************************
	 * forum_post
	 */

	function forum_post_info($id, $id2)
	{
		if (!$post = bp_forums_get_post($id2)) {
			return false;
		}

		$topic = bp_forums_get_topic_details($post->topic_id);
		$url = bp_core_get_root_domain() . '/' . BP_GROUPS_SLUG . '/' . $topic->object_slug . '/forum/topic/' . $topic->topic_slug . '/#post-' . $post->post_id;

		return array('author' => $post->poster_id, 'url' => $url, 'date' => $post->post_time);
	}

	function forum_post_edit($id, $id2)
	{
		if (!$post = bp_forums_get_post($id2)) {
			return false;
		}

		$topic = bp_forums_get_topic_details($post->topic_id);
		$url = bp_core_get_root_domain() . '/' . BP_GROUPS_SLUG . '/' . $topic->object_slug . '/forum/topic/' . $topic->topic_slug . '/edit/post/' . $post->post_id . '/';

		return wp_nonce_url($url, 'bp_forums_edit_post');
	}

	function forum_post_delete($id, $id2)
	{
		if (!$post = bp_forums_get_post($id2)) {
			return true;
		}

		// deleting a post don't remove it from db, it just set its status to 1
		if (1 == (int)$post->post_status) {
			return true;
		}

		if (!groups_delete_group_forum_post($id2, $post->topic_id)) {
			return false;
		}

		//if it was the first post (topic), then the activity doesn't get delete by bp because is new_forum_topic, instead of new_forum_post
		//so we check if it is the first post and then delete the activity
		if (function_exists('bp_activity_delete')) {
			$first_post = bp_forums_get_topic_posts(array('topic_id' => $post->topic_id, 'post_status' => 'all', 'page' => 1, 'per_page' => 1));
			if ($first_post[0]->post_id == $post->post_id) {
				bp_activity_delete(array('item_id' => $id, 'secondary_item_id' => $post->topic_id, 'component' => $GLOBALS['bp']->groups->id, 'type' => 'new_forum_topic'));
			}
		}

		return true;
	}

	function forum_post_convert_activity_args($args)
	{
		//in the 'new topic' activity we want to flag only the first post, not the whole topic
		$first_post = bp_forums_get_topic_posts(array('topic_id' => $args['id2'], 'post_status' => 'all', 'page' => 1, 'per_page' => 1));

		$args['id2'] = $first_post[0]->post_id;
		return $args;
	}

	function forum_post_print_link()
	{
		global $topic_template, $bp;

		$link = bpModFrontend::get_link(array(
											 'type' => 'forum_post',
											 'author_id' => $topic_template->post->poster_id,
											 'id' => $bp->groups->current_group->id,
											 'id2' => $topic_template->post->post_id,
											 'unflagged_text' => __('Flag', 'bp-moderation'),
											 'custom_class' => 'bpm-no-images'
										));

		echo "<span class='links-separator'> | </span>$link";
	}
	

/*******************************************************************************
 * Private message sender
 */
	function private_message_sender_print_links()
	{
		$report_links = array();
		foreach((array)$GLOBALS['thread_template']->thread->sender_ids as $sender_id) {
			if ($sender_id != bp_loggedin_user_id()) {
				$report_links[] = bpModFrontend::get_link(array(
										'type' => 'member',
										'id' => $sender_id,
										'unflagged_text' => bp_core_get_user_displayname($sender_id),
										'flagged_text' => bp_core_get_user_displayname($sender_id),
										'custom_class' => 'button'
									));
			}
		}
		
		if (!count($report_links)) {
			return;
		}
		
		echo '<p class="bp-mod-pm-thread-links">';
		printf(__('Flag sender as inappropriate: %s', 'bp-moderation'),join(' ', $report_links));
		echo '</p>';
	}

	
/*******************************************************************************
 * Private message
 */
	function private_message_info($thread_id, $sender_id)
	{
		$thread = new BP_Messages_Thread($thread_id, 'DESC');
		if (!in_array($sender_id, $thread->sender_ids)) {
			return false;
		}
		$url = bp_core_get_user_domain($sender_id) . bp_get_messages_slug() . '/view/' . $thread_id;
		
		foreach ((array) $thread->messages as $msg) {
			if ($sender_id == $msg->sender_id) {
				return array('author' => $sender_id, 'url' => $url, 'date' => $msg->date_sent);
			}
		}
		
		return false;
	}

	function private_message_delete($thread_id, $sender_id)
	{
		global $wpdb, $bp;

		$delete_for_user = $wpdb->query( $wpdb->prepare( "UPDATE {$bp->messages->table_name_recipients} SET is_deleted = 1 WHERE thread_id = %d AND user_id = %d", $thread_id, $sender_id) );

		// Check to see if any more recipients remain for this message
		// if not, then delete the message from the database.
		$recipients = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM {$bp->messages->table_name_recipients} WHERE thread_id = %d AND is_deleted = 0", $thread_id ) );

		if ( empty( $recipients ) ) {
			// Delete all the messages
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$bp->messages->table_name_messages} WHERE thread_id = %d", $thread_id ) );

			// Delete all the recipients
			$wpdb->query( $wpdb->prepare( "DELETE FROM {$bp->messages->table_name_recipients} WHERE thread_id = %d", $thread_id ) );
		}

		return true;
	}

	function private_message_print_links()
	{
		$report_links = array();
		foreach((array)$GLOBALS['thread_template']->thread->sender_ids as $sender_id) {
			if ($sender_id != bp_loggedin_user_id()) {
				$report_links[] = bpModFrontend::get_link(array(
										'type' => 'private_message',
										'id' => bp_get_the_thread_id(),
										'id2' => $sender_id,
										'unflagged_text' => bp_core_get_user_displayname($sender_id),
										'flagged_text' => bp_core_get_user_displayname($sender_id),
										'custom_class' => 'button'
									));
			}
		}
		
		if (!count($report_links)) {
			return;
		}
		
		echo '<p class="bp-mod-pm-thread-links">';
		printf(__('Flag as inappropriate messages by: %s', 'bp-moderation'),join(' ', $report_links));
		echo '</p>';
	}
	
	function private_message_view_link_override($content) {
		$content->item_url = wp_nonce_url($content->item_url.'?bpmSuperAdminOverridePrivateMessage', 'bpmSuperAdminOverridePrivateMessage');
		return $content;
	}
	
	function private_message_super_admin_override() {
		if(!isset($_GET['bpmSuperAdminOverridePrivateMessage']) || !is_super_admin()) {
			return;
		}
		check_admin_referer('bpmSuperAdminOverridePrivateMessage');

		$thread_id = (int)bp_action_variable( 0 );

		bp_core_new_subnav_item( array(
			'name'            => sprintf( __( 'Review message by %s', 'bp-moderation' ), bp_get_displayed_user_username() ),
			'slug'            => 'view',
			'parent_url'      => trailingslashit( bp_displayed_user_domain() . bp_get_messages_slug() ),
			'parent_slug'     => bp_get_messages_slug(),
			'screen_function' => true,
			'position'        => 40,
			'user_has_access' => is_super_admin(),
			'link'            => bp_displayed_user_domain() . bp_get_messages_slug() . '/view/' . (int) $thread_id
		) );

		bp_core_load_template( apply_filters( 'messages_template_view_message', 'members/single/home' ) );
		die();
	}
}

?>