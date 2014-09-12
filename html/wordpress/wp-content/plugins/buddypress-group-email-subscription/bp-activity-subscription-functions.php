<?php

//
// !SEND EMAIL UPDATES FOR FORUM TOPICS AND POSTS
//

/**
 * Returns an unsubscribe link to disable email notifications for a given group and/or all groups.
 */
function ass_group_unsubscribe_links( $user_id ) {
	global $bp;

	//$settings_link = "{$bp->root_domain}/{$bp->groups->slug}/{$bp->groups->current_group->slug}/notifications/";
	//$links = sprintf( __( 'To disable these notifications please log in and go to: %s', 'bp-ass' ), $settings_link );

	$userdomain = bp_core_get_user_domain( $user_id );

	$group_id = bp_get_current_group_id();
	$group_link = "$userdomain?bpass-action=unsubscribe&group={$group_id}&access_key=" . md5( "{$group_id}{$user_id}unsubscribe" . wp_salt() );
	$links = sprintf( __( 'To disable all notifications for this group, click: %s', 'bp-ass' ), $group_link );

	if ( get_option( 'ass-global-unsubscribe-link' ) == 'yes' ) {
		$global_link = "$userdomain?bpass-action=unsubscribe&access_key=" . md5( "{$user_id}unsubscribe" . wp_salt() );
		$links .= "\n\n" . sprintf( __( 'Or to disable notifications for *all* your groups, click: %s', 'bp-ass' ), $global_link );
	}

	$links .= "\n";

	return $links;
}

/**
 * When a new forum topic or post is posted in bbPress, either:
 * 	1) Send emails to all group subscribers
 *	2) Prepares to record it for digest purposes - see {@link ass_group_forum_record_digest()}.
 *
 * Hooks into the bbPress action - 'bb_new_post' - to easily identify new forum posts vs edits.
 */
function ass_group_notification_forum_posts( $post_id ) {
	global $bp, $wpdb;

	$post = bb_get_post( $post_id );

	// Check to see if user has been registered long enough
	if ( !ass_registered_long_enough( $post->poster_id ) )
		return;

	$topic = get_topic( $post->topic_id );

	$group = groups_get_current_group();

	// if the current group isn't available, grab it
	if ( empty( $group ) ) {
		// get the group ID by looking up the forum ID in the groupmeta table
		$group_id = $wpdb->get_var( $wpdb->prepare(
			"
				SELECT group_id
				FROM {$bp->groups->table_name_groupmeta}
				WHERE meta_key = %s
				AND meta_value = %d
			",
			'forum_id',
			$topic->forum_id
		) );

		// now get the group
		$group = groups_get_group( array(
			'group_id' => $group_id
		) );
	}

	$primary_link = trailingslashit( bp_get_group_permalink( $group ) . 'forum/topic/' . $topic->topic_slug );

	$blogname = '[' . get_blog_option( BP_ROOT_BLOG, 'blogname' ) . ']';

	$is_topic = false;

	// initialize faux activity object for backpat filter reasons
	//
	// due to r-a-y being an idiot here:
	// https://github.com/boonebgorges/buddypress-group-email-subscription/commit/526b80c617fe9058a859ac4eb4cfb1d42d333aa0
	//
	// because we moved the email recording process to 'bb_new_post' from the BP activity save hook,
	// we need to ensure that 3rd-party code will continue to work as-is
	//
	// we can't add the 'id' because we're firing the filters before the activity item is created :(
	$activity = new stdClass;
	$activity->user_id   = $post->poster_id;
	$activity->component = 'groups';
	$activity->item_id   = $group->id;
	$activity->content   = $post->post_text;

	// this is a new topic
	if ( $post->post_position == 1 ) {
		$is_topic = true;

		// more faux activity items!
		$activity->type              = 'new_forum_topic';
		$activity->secondary_item_id = $topic->topic_id;
		$activity->primary_link      = $primary_link;

		$action = $activity->action  = sprintf( __( '%s started the forum topic "%s" in the group "%s"', 'bp-ass' ), bp_core_get_user_displayname( $post->poster_id ), $topic->topic_title, $group->name );

		$subject     = apply_filters( 'bp_ass_new_topic_subject', $action . ' ' . $blogname, $action, $blogname );
		$the_content = apply_filters( 'bp_ass_new_topic_content', $post->post_text, $activity );
	}
	// this is a forum reply
	else {
		// more faux activity items!
		$activity->type              = 'new_forum_post';
		$activity->secondary_item_id = $post_id;

		$action = $activity->action  = sprintf( __( '%s replied to the forum topic "%s" in the group "%s"', 'bp-ass' ), bp_core_get_user_displayname( $post->poster_id ), $topic->topic_title, $group->name );

		// calculate the topic page for pagination purposes
		$pag_num = apply_filters( 'bp_ass_topic_pag_num', 15 );
		$page	 = ceil( $topic->topic_posts / $pag_num );

		if ( $page > 1 )
			$primary_link .= '?topic_page=' . $page;

		$primary_link .= "#post-" . $post_id;

		$activity->primary_link = $primary_link;

		$subject     = apply_filters( 'bp_ass_forum_reply_subject', $action . ' ' . $blogname, $action, $blogname );
		$the_content = apply_filters( 'bp_ass_forum_reply_content', $post->post_text, $activity );
	}

	// Convert entities and do other cleanup
	$the_content = ass_clean_content( $the_content );

	// if group is not public, change primary link to login URL to verify
	// authentication and for easier redirection after logging in
	if ( $group->status != 'public' ) {
		$primary_link = ass_get_login_redirect_url( $primary_link );

		$text_before_primary = __( 'To view or reply to this topic, go to:', 'bp-ass' );

	// if public, show standard text
	} else {
		$text_before_primary = __( 'To view or reply to this topic, log in and go to:', 'bp-ass' );
	}

	// setup the email meessage
	$message = sprintf(__('%s

"%s"

%s
%s

---------------------
', 'bp-ass'), $action . ':', $the_content, $text_before_primary, $primary_link);

	// get subscribed users
	$subscribed_users = groups_get_groupmeta( $group->id, 'ass_subscribed_users' );

	// do this for forum replies only
	if ( ! $is_topic ) {
		// pre-load these arrays to reduce db calls in the loop
		$ass_replies_to_my_topic    = ass_user_settings_array( 'ass_replies_to_my_topic' );
		$ass_replies_after_me_topic = ass_user_settings_array( 'ass_replies_after_me_topic' );
		$previous_posters           = ass_get_previous_posters( $post->topic_id );

		// make sure manually-subscribed topic users and regular group subscribed users are combined
		$user_topic_status = groups_get_groupmeta( $group->id, 'ass_user_topic_status_' . $topic->topic_id );

		if ( ! empty( $subscribed_users ) && ! empty( $user_topic_status ) )
			$subscribed_users = $subscribed_users + $user_topic_status;

		// consolidate the arrays to speed up processing
		foreach ( array_keys( $previous_posters ) as $previous_poster ) {
			if ( empty( $subscribed_users[$previous_poster] ) )
				$subscribed_users[$previous_poster] = 'prev-post';
		}
	}

	// setup our temporary GES object
	$bp->ges = new stdClass;
	$bp->ges->items = array();

	// digest key iterator
	$d = 0;

	// now let's either send the email or record it for digest purposes
	foreach ( (array) $subscribed_users as $user_id => $group_status ) {
		$self_notify = '';

		// Does the author want updates of their own forum posts?
		if ( $user_id == $post->poster_id ) {
			$self_notify = ass_self_post_notification( $user_id );

			// Author does not want notifications of their own posts
			if ( ! $self_notify ) {
				continue;
			}
		}

		$send_it = $notice = false;

		// default settings link
		$settings_link = ass_get_login_redirect_url( trailingslashit( bp_get_group_permalink( $group ) . 'notifications' ) );

		// Self-notification emails
		if ( $self_notify === true ) {
			$send_it = true;

			// notification settings link
			$settings_link = trailingslashit( bp_core_get_user_domain( $user_id ) . bp_get_settings_slug() ) . 'notifications/';

			// set notice
			$notice  = __( 'You are currently receiving notifications for your own posts.', 'bp-ass' );
			$notice .= "\n\n" . sprintf( __( 'To disable these notifications please log in and go to: %s', 'bp-ass' ), $settings_link );
			$notice .= "\n" . __( 'Once you are logged in, uncheck "Receive notifications of your own posts?".', 'bp-ass' );

		// do the following for new topics
		} elseif ( $is_topic ) {
			if ( $group_status == 'sub' || $group_status == 'supersub' ) {
				$send_it = true;

				$notice .= "\n" . __( 'Your email setting for this group is: ', 'bp-ass' ) . ass_subscribe_translate( $group_status );

				// until we get a real follow link, this will have to do
				if ( $group_status == 'sub' ) {
					$notice .= __( ", therefore you won't receive replies to this topic. To get them, click the link to view this topic on the web then click the 'Follow this topic' button.", 'bp-ass' );
				}
				// user's group setting is "All Mail"
				elseif ( $group_status == 'supersub' ) {
					$notice .= "\n" . sprintf( __( 'To change your email setting for this group, please log in and go to: %s', 'bp-ass' ), $settings_link );
				}

				$notice .= "\n\n" . ass_group_unsubscribe_links( $user_id );
			}

		// do the following for forum replies
		} else {
			$topic_status = isset( $user_topic_status[$user_id] ) ? $user_topic_status[$user_id] : '';

			// the topic mute button will override the subscription options below
			if ( $topic_status == 'mute' )
				continue;

			// skip if user set to weekly summary and they're not following this topic
			// maybe not neccesary, but good to be cautious
			if ( $group_status == 'sum' && $topic_status != 'sub' )
				continue;

			// User's group setting is "All Mail", so we should send this
			if ( $group_status == 'supersub' ) {
				$send_it = true;

				$notice  = __( 'Your email setting for this group is: ', 'bp-ass' ) . ass_subscribe_translate( $group_status );
				$notice .= "\n" . sprintf( __( 'To change your email setting for this group, please log in and go to: %s', 'bp-ass' ), $settings_link );
				$notice .= "\n\n" . ass_group_unsubscribe_links( $user_id );
			}

			// User is manually subscribed to this topic
			elseif ( $topic_status == 'sub' ) {
				$send_it = true;

				// change settings link to the forum thread
				// get rid of any query args and anchors from the thread permalink
				$settings_link = trailingslashit( strtok( $primary_link, '?' ) );

				// let's change the notice to accurately reflect that the user is following this topic
				$notice  = sprintf( __( 'To disable these notifications please log in and go to: %s', 'bp-ass' ), $settings_link );
				$notice .= "\n" . __( 'Once you are logged in, click on the "Mute this topic" button to unsubscribe from the forum thread.', 'bp-ass' );
			}

			// User started the topic and wants to receive email replies to his/her topic
			elseif ( $topic->topic_poster == $user_id && isset( $ass_replies_to_my_topic[$user_id] ) && $ass_replies_to_my_topic[$user_id] != 'no' ) {
				$send_it = true;

				// override settings link to user's notifications
				$settings_link = trailingslashit( bp_core_get_user_domain( $user_id ) . bp_get_settings_slug() ) . 'notifications/';

				// let's change the notice to accurately reflect that the user is receiving replies based on their settings
				$notice  = __( 'You are currently receiving notifications to topics that you have started.', 'bp-ass' );
				$notice .= "\n\n" . sprintf( __( 'To disable these notifications please log in and go to: %s', 'bp-ass' ), $settings_link );
				$notice .= "\n" . __( 'Once you are logged in, uncheck "A member replies in a forum topic you\'ve started".', 'bp-ass' );
			}

			// User posted in this topic and wants to receive all subsequent replies
			elseif ( isset( $previous_posters[$user_id] ) && isset( $ass_replies_after_me_topic[$user_id] ) && $ass_replies_after_me_topic[$user_id] != 'no' ) {
				$send_it = true;

				// override settings link to user's notifications
				$settings_link = trailingslashit( bp_core_get_user_domain( $user_id ) . bp_get_settings_slug() ) . 'notifications/';

				// let's change the notice to accurately reflect that the user is receiving replies based on their settings
				$notice  = __( 'You are currently receiving notifications to topics that you have replied in.', 'bp-ass' );
				$notice .= "\n\n" . sprintf( __( 'To disable these notifications please log in and go to: %s', 'bp-ass' ), $settings_link );
				$notice .= "\n" . __( 'Once you are logged in, uncheck "A member replies after you in a forum topic".', 'bp-ass' );
			}
		}

		// if we're good to send, send the email!
		if ( $send_it ) {
			// Get the details for the user
			$user = bp_core_get_core_userdata( $user_id );

			// Send the email
			if ( $user->user_email ) {
				wp_mail( $user->user_email, $subject, $message . $notice );
			}
		}

		// otherwise if digest or summary, record it!
		// temporarily save some variables to pass to groups_record_activity()
		// actual digest recording occurs in ass_group_forum_record_digest()
		if ( $group_status == 'dig' || ( $is_topic && $group_status == 'sum' ) ) {
			$bp->ges->items[$d] = new stdClass;
			$bp->ges->items[$d]->user_id      = $user_id;
			$bp->ges->items[$d]->group_id     = $group->id;
			$bp->ges->items[$d]->group_status = $group_status;

			// iterate our key value
			++$d;
		}

		unset( $notice );
	}

}
add_action( 'bb_new_post', 'ass_group_notification_forum_posts' );

/**
 * Records group forum digest items in GES after the activity item is posted.
 *
 * {@link ass_group_notification_forum_posts()} handles non-digest sendouts, but
 * for digest items, we have to wait for the corresponding activity item to be posted
 * before we can record it.
 */
function ass_group_forum_record_digest( $activity ) {
	global $bp;

	// see if our temporary GES variable is set via ass_group_notification_forum_posts()
	if ( ! empty( $bp->ges->items ) ) {

		// okay, we're good to go! let's record this digest item!
		foreach ( $bp->ges->items as $item ) {
			ass_digest_record_activity( $activity->id, $item->user_id, $item->group_id, $item->group_status );

		}

		// unset the temporary variable
		unset( $bp->ges );
	}
}
add_action( 'bp_activity_after_save', 'ass_group_forum_record_digest' );

/**
 * Records group activity items in GES for all activity except:
 *  - group forum posts (handled in ass_group_notification_forum_posts())
 *  - created and joined group entries (irrelevant)
 *
 * You can do more fine-grained activity filtering with the
 * 'ass_block_group_activity_types' filter.
 */
function ass_group_notification_activity( $content ) {
	global $bp;

	$type      = $content->type;
	$component = $content->component;
	$sender_id = $content->user_id;

	// get group activity update replies to work (there is no group id passed in $content, but we can get it from $bp)
	if ( $type == 'activity_comment' && bp_is_groups_component() && $component == 'activity' )
		$component = 'groups';

	// at this point we only want group activity, perhaps later we can make a function and interface for personal activity...
	if ( $component != 'groups' )
		return;

	// if you want to conditionally block certain activity types from appearing,
	// use the filter below
	if ( false === apply_filters( 'ass_block_group_activity_types', true, $type, $content ) )
		return;

	if ( !ass_registered_long_enough( $sender_id ) )
		return;

	$group_id = $content->item_id;
	$action   = ass_clean_subject( $content->action );

	if ( $type == 'activity_comment' ) { // if it's an group activity comment, reset to the proper group id and append the group name to the action
		// this will need to be filtered for plugins manually adding group activity comments
		$group_id = bp_get_current_group_id();

		$action   = ass_clean_subject( $content->action ) . ' ' . __( 'in the group', 'bp-ass' ) . ' ' . bp_get_current_group_name();
	}

	$action = apply_filters( 'bp_ass_activity_notification_action', $action, $content );

	// get the group object
	// if the group is already set in the $bp global use that, otherwise get the group
	$group  = groups_get_current_group() ? groups_get_current_group() : groups_get_group( 'group_id=' . $group_id );

	/* Subject & Content */
	$blogname    = '[' . get_blog_option( BP_ROOT_BLOG, 'blogname' ) . ']';
	$subject     = apply_filters( 'bp_ass_activity_notification_subject', $action . ' ' . $blogname, $action, $blogname );
	$the_content = apply_filters( 'bp_ass_activity_notification_content', $content->content, $content );
	$the_content = ass_clean_content( $the_content );

	/* If it's an activity item, switch the activity permalink to the group homepage rather than the user's homepage */
	$activity_permalink = ( isset( $content->primary_link ) && $content->primary_link != bp_core_get_user_domain( $content->user_id ) ) ? $content->primary_link : bp_get_group_permalink( $group );

	// If message has no content (as in the case of group joins, etc), we'll use a different
	// $message template
	if ( empty( $the_content ) ) {
		$message = sprintf( __(
'%s

To view or reply, log in and go to:
%s

---------------------
', 'bp-ass' ), $action, $activity_permalink );
	} else {
		$message = sprintf( __(
'%s

"%s"

To view or reply, log in and go to:
%s

---------------------
', 'bp-ass' ), $action, $the_content, $activity_permalink );
	}

	// get subscribed users for the group
	$subscribed_users = groups_get_groupmeta( $group_id , 'ass_subscribed_users' );

	// this is used if a user is subscribed to the "Weekly Summary" option.
	// the weekly summary shouldn't record everything, so we have a filter:
	//
	// 'ass_this_activity_is_important'
	//
	// this hook can be used by plugin authors to record important activity items
	// into the weekly summary
	// @see ass_default_weekly_summary_activity_types()
	$this_activity_is_important = apply_filters( 'ass_this_activity_is_important', false, $type );

	// cycle through subscribed users
	foreach ( (array)$subscribed_users as $user_id => $group_status ) {
		//echo '<p>uid: ' . $user_id .' | gstat: ' . $group_status ;

		$self_notify = '';

		// Does the author want updates of their own forum posts?
		if ( $type == 'bbp_topic_create' || $type == 'bbp_reply_create' ) {

			if ( $user_id == $sender_id ) {
				$self_notify = ass_self_post_notification( $user_id );

				// Author does not want notifications of their own posts
				if ( ! $self_notify ) {
					continue;
				}
			}

		// If this is an activity comment, and the $user_id is the user who is being replied
		// to, check to make sure that the user is not subscribed to BP's native activity
		// reply notifications
		} elseif ( 'activity_comment' == $type ) {
			// First, look at the immediate parent
			$immediate_parent = new BP_Activity_Activity( $content->secondary_item_id );

			// Don't send the bp-ass notification if the user is subscribed through BP
			if ( $user_id == $immediate_parent->user_id && 'no' != bp_get_user_meta( $user_id, 'notification_activity_new_reply', true ) ) {
				continue;
			}

			// We only need to check the root parent if it's different from the
			// immediate parent
			if ( $content->secondary_item_id != $content->item_id ) {
				$root_parent = new BP_Activity_Activity( $content->item_id );

				// Don't send the bp-ass notification if the user is subscribed through BP
				if ( $user_id == $root_parent->user_id && 'no' != bp_get_user_meta( $user_id, 'notification_activity_new_reply', true ) ) {
					continue;
				}
			}
		}

		$send_it = false;

		// Self-notification email for bbPress posts
		if ( $self_notify === true ) {
			$send_it = true;

			// notification settings link
			$settings_link = trailingslashit( bp_core_get_user_domain( $user_id ) . bp_get_settings_slug() ) . 'notifications/';

			// set notice
			$notice  = __( 'You are currently receiving notifications for your own posts.', 'bp-ass' );
			$notice .= "\n\n" . sprintf( __( 'To disable these notifications please log in and go to: %s', 'bp-ass' ), $settings_link );
			$notice .= "\n" . __( 'Once you are logged in, uncheck "Receive notifications of your own posts?".', 'bp-ass' );

		// User is subscribed to "All Mail"
		// OR user is subscribed to "New Topics" (bbPress 2)
		} elseif ( $group_status == 'supersub' || ( $group_status == 'sub' && $type == 'bbp_topic_create' ) ) {
			$send_it = true;

			$settings_link = ass_get_login_redirect_url( trailingslashit( bp_get_group_permalink( $group ) . 'notifications' ) );

			$notice  = __( 'Your email setting for this group is: ', 'bp-ass' ) . ass_subscribe_translate( $group_status );
			$notice .= "\n" . sprintf( __( 'To change your email setting for this group, please log in and go to: %s', 'bp-ass' ), $settings_link );
			$notice .= "\n\n" . ass_group_unsubscribe_links( $user_id );

		}

		// if we're good to send, send the email!
		if ( $send_it ) {
			// Get the details for the user
			$user = bp_core_get_core_userdata( $user_id );

			// Send the email
			if ( $user->user_email ) {
				wp_mail( $user->user_email, $subject, $message . $notice );
			}

		}

		// otherwise, user is subscribed to "Daily Digest" so record item in digest!
		// OR user is subscribed to "Weekly Summary" and activity item is important
		// enough to be recorded
		if ( $group_status == 'dig' || ( $group_status == 'sum' && $this_activity_is_important ) ) {
			ass_digest_record_activity( $content->id, $user_id, $group_id, $group_status );
		}

	}

	//echo '<p>Subject: ' . $subject;
	//echo '<pre>'; print_r( $message ); echo '</pre>';
}
add_action( 'bp_activity_after_save' , 'ass_group_notification_activity' , 50 );

/**
 * Activity edit checker.
 *
 * Catch attempts to save activity entries to see if they already exist.
 * If they do exist, stop GES from doing its thang.
 *
 * @since 3.2.2
 */
function ass_group_activity_edits( $activity ) {
	// hack to avoid duplicate action firing during activity saving
	// @see https://buddypress.trac.wordpress.org/ticket/3980
	static $run_once = false;

	if ( ! empty( $run_once ) )
		return;

	// if the activity doesn't match the groups component, stop now
	if ( $activity->component != 'groups' )
		return;

	// if the activity ID already exists, this means this is an edit
	// we don't want GES to send emails for edits!
	if ( ! empty( $activity->id ) ) {
		// Make sure GES doesn't fire
		remove_action( 'bp_activity_after_save', 'ass_group_notification_activity', 50 );
	}

	$run_once = true;
}
add_action( 'bp_activity_before_save', 'ass_group_activity_edits' );

/**
 * Block some activity types from being sent / recorded in groups.
 *
 * @since 3.2.2
 */
function ass_default_block_group_activity_types( $retval, $type, $activity ) {

	switch( $type ) {
		/** ACTIVITY TYPES TO BLOCK **************************************/

		// we handle these in ass_group_notification_forum_posts()
		case 'new_forum_topic' :
		case 'new_forum_post' :

		// @todo in the future, it might be nice for admins to optionally get this message
		case 'joined_group' :

		case 'created_group' :
			return false;

			break;

		/** bbPress 2 ****************************************************/

		// groan! bbPress 2 hacks!
		//
		// when bbPress first records an item into the group activity stream, it is
		// incomplete as it is first recorded on the 'wp_insert_post' action
		//
		// it is later updated on the 'bbp_new_reply' / 'bbp_new_topic' action
		//
		// we want to block the first instance, so GES doesn't record or send this
		// incomplete activity item

		// reply
		case 'bbp_reply_create' :

			// to determine if the reply activity item is incomplete, the primary link
			// will be missing the scheme (HTTP) and host (example.com), so our hack does
			// a search for '://' because the site could be using HTTPS.
			if ( strpos( $activity->primary_link, '://' ) === false ) {
				return false;

			// we're okay again!
			} else {
				return $retval;
			}

			break;

		// topic
		case 'bbp_topic_create' :

			// to determine if the topic activity item is incomplete, the primary link
			// will be missing the groups root slug
			if ( strpos( $activity->primary_link, '/' . bp_get_groups_root_slug() . '/' ) === false ) {
				return false;

			// we're okay again!
			} else {
				return $retval;
			}

			break;

		/** ALL OTHER TYPES **********************************************/

		default :
			return $retval;

			break;
	}
}
add_filter( 'ass_block_group_activity_types', 'ass_default_block_group_activity_types', 5, 3 );

/**
 * Allow certain activity types to be recorded for users subscribed to the
 * "Weekly Summary" option.
 *
 * The rationale behind this is the weekly summary shouldn't record every
 * single activity item because the summary could get rather long.
 *
 * @since 3.2.4
 */
function ass_default_weekly_summary_activity_types( $retval, $type ) {

	switch( $type ) {
		/** ACTIVITY TYPES TO RECORD FOR WEEKLY SUMMARY ******************/

		// backpat items
		case 'wiki_group_page_create' :
		case 'new_calendar_event' :

		// bbPress 2 forum topic
		case 'bbp_topic_create' :

		// activity update
		case 'activity_update' :

			return true;

			break;

		/** ALL OTHER TYPES **********************************************/

		default :
			return $retval;

			break;
	}

}
add_filter( 'ass_this_activity_is_important', 'ass_default_weekly_summary_activity_types', 1, 2 );

/**
 * Login redirector.
 *
 * If group is not public, the group link in the email will use {@link wp_login_url()}.
 *
 * If a user clicks on this link and is already logged in, we should attempt
 * to redirect the user to the authorized content instead of forcing the user
 * to re-authenticate.
 *
 * @since 3.2.4
 *
 * @uses bp_loggedin_user_id() To see if a user is logged in
 */
function ass_login_redirector() {
	// see if a redirect link was passed
	if ( empty( $_GET['redirect_to'] ) )
		return;

	// see if our special 'auth' variable was passed
	if( empty( $_GET['auth'] ) )
		return;

	// if user is *not* logged in, stop now!
	if ( ! bp_loggedin_user_id() )
		return;

	// user is logged in, so let's redirect them to the content
	wp_safe_redirect( esc_url_raw( $_GET['redirect_to'] ) );
	exit;
}
add_action( 'login_init', 'ass_login_redirector', 1 );

/**
 * Returns the login URL with a redirect link.
 *
 * Pass the link you want the user to redirect to when authenticated.
 *
 * Redirection occurs in {@link ass_login_redirector()}.
 *
 * @since 3.4
 *
 * @param string $url The URL you want to redirect to.
 * @return mixed String of the login URL with the passed redirect link. Boolean false on failure.
 */
function ass_get_login_redirect_url( $url = '' ) {
	$url = esc_url_raw( $url );

	if ( empty( $url ) ) {
		return false;
	}

	// setup query args
	$query_args = array(
		'action'      => 'bpnoaccess',
		'auth'        => 1,
		'redirect_to' => urlencode( $url )
	);

	return add_query_arg(
		$query_args,
		apply_filters( 'ass_login_url', wp_login_url() )
	);
}


//
//	!GROUP SUBSCRIPTION
//


// returns the subscription status of a user in a group
function ass_get_group_subscription_status( $user_id, $group_id ) {
	global $bp;

	if ( !$user_id )
		$user_id = bp_loggedin_user_id();

	if ( !$group_id )
		$group_id = bp_get_current_group_id();

	$group_user_subscriptions = groups_get_groupmeta( $group_id, 'ass_subscribed_users' );

	$user_subscription = isset( $group_user_subscriptions[$user_id] ) ? $group_user_subscriptions[$user_id] : false;

	return $user_subscription;
}


// updates the group's user subscription list.
function ass_group_subscription( $action, $user_id, $group_id ) {
	if ( !$action || !$user_id || !$group_id )
		return false;

	$group_user_subscriptions = groups_get_groupmeta( $group_id , 'ass_subscribed_users' );

	// we're being overly careful here
	if ( $action == 'no' ) {
		$group_user_subscriptions[ $user_id ] = 'no';
	} elseif ( $action == 'sum' ) {
		$group_user_subscriptions[ $user_id ] = 'sum';
	} elseif ( $action == 'dig' ) {
		$group_user_subscriptions[ $user_id ] = 'dig';
	} elseif ( $action == 'sub' ) {
		$group_user_subscriptions[ $user_id ] = 'sub';
	} elseif ( $action == 'supersub' ) {
		$group_user_subscriptions[ $user_id ] = 'supersub';
	} elseif ( $action == 'delete' ) {
		if ( isset( $group_user_subscriptions[ $user_id ] ) )
			unset( $group_user_subscriptions[ $user_id ] );
	}

	groups_update_groupmeta( $group_id , 'ass_subscribed_users', $group_user_subscriptions );

	// add a hook for 3rd-party plugin devs
	do_action( 'ass_group_subscription', $user_id, $group_id, $action );
}



// show group subscription settings on the notification page.
function ass_group_subscribe_settings () {
	global $bp;

	$group = groups_get_current_group();

	if ( !is_user_logged_in() || !empty( $group->is_banned ) || !$group->is_member )
		return false;

	$group_status = ass_get_group_subscription_status( bp_loggedin_user_id(), $group->id );

	$submit_link = bp_get_groups_action_link( 'notifications' );

	?>
	<div id="ass-email-subscriptions-options-page">
	<h3 class="activity-subscription-settings-title"><?php _e('Email Subscription Options', 'bp-ass') ?></h3>
	<form action="<?php echo $submit_link ?>" method="post">
	<input type="hidden" name="ass_group_id" value="<?php echo $group->id; ?>"/>
	<?php wp_nonce_field( 'ass_subscribe' ); ?>

	<b><?php _e('How do you want to read this group?', 'bp-ass'); ?></b>

	<div class="ass-email-type">
	<label><input type="radio" name="ass_group_subscribe" value="no" <?php if ( $group_status == "no" || $group_status == "un" || !$group_status ) echo 'checked="checked"'; ?>><?php _e('No Email', 'bp-ass'); ?></label>
	<div class="ass-email-explain"><?php _e('I will read this group on the web', 'bp-ass'); ?></div>
	</div>

	<div class="ass-email-type">
	<label><input type="radio" name="ass_group_subscribe" value="sum" <?php if ( $group_status == "sum" ) echo 'checked="checked"'; ?>><?php _e('Weekly Summary Email', 'bp-ass'); ?></label>
	<div class="ass-email-explain"><?php _e('Get a summary of new topics each week', 'bp-ass'); ?></div>
	</div>

	<div class="ass-email-type">
	<label><input type="radio" name="ass_group_subscribe" value="dig" <?php if ( $group_status == "dig" ) echo 'checked="checked"'; ?>><?php _e('Daily Digest Email', 'bp-ass'); ?></label>
	<div class="ass-email-explain"><?php _e('Get all the day\'s activity bundled into a single email', 'bp-ass'); ?></div>
	</div>

	<?php if ( ass_get_forum_type() ) : ?>
		<div class="ass-email-type">
		<label><input type="radio" name="ass_group_subscribe" value="sub" <?php if ( $group_status == "sub" ) echo 'checked="checked"'; ?>><?php _e('New Topics Email', 'bp-ass'); ?></label>
		<div class="ass-email-explain"><?php _e('Send new topics as they arrive (but don\'t send replies)', 'bp-ass'); ?></div>
		</div>
	<?php endif; ?>

	<div class="ass-email-type">
	<label><input type="radio" name="ass_group_subscribe" value="supersub" <?php if ( $group_status == "supersub" ) echo 'checked="checked"'; ?>><?php _e('All Email', 'bp-ass'); ?></label>
	<div class="ass-email-explain"><?php _e('Send all group activity as it arrives', 'bp-ass'); ?></div>
	</div>

	<input type="submit" value="<?php _e('Save Settings', 'bp-ass') ?>" id="ass-save" name="ass-save" class="button-primary">

	<?php if ( ass_get_forum_type() == 'buddypress' ) : ?>
		<p class="ass-sub-note"><?php _e('Note: Normally, you receive email notifications for topics you start or comment on. This can be changed at', 'bp-ass'); ?> <a href="<?php echo bp_loggedin_user_domain() . BP_SETTINGS_SLUG . '/notifications/' ?>"><?php _e('email notifications', 'bp-ass'); ?></a>.</p>
	<?php endif; ?>

	</form>
	</div><!-- end ass-email-subscriptions-options-page -->
	<?php
}

// update the users' notification settings
function ass_update_group_subscribe_settings() {
	global $bp;

	if ( bp_is_groups_component() && bp_is_current_action( 'notifications' ) ) {

		// If the edit form has been submitted, save the edited details
		if ( isset( $_POST['ass-save'] ) ) {

			//if ( !wp_verify_nonce( $nonce, 'ass_subscribe' ) ) die( 'A Security check failed' );

			$user_id = bp_loggedin_user_id();
			$group_id = $_POST[ 'ass_group_id' ];
			$action = $_POST[ 'ass_group_subscribe' ];

			if ( !groups_is_user_member( $user_id, $group_id ) )
				return;

			ass_group_subscription( $action, $user_id, $group_id ); // save the settings

			bp_core_add_message( sprintf( __( 'Your email notifications are set to %s for this group.', 'bp-ass' ), ass_subscribe_translate( $action ) ) );
			bp_core_redirect( trailingslashit( bp_get_group_permalink( groups_get_current_group() ) . 'notifications' ) );
		}
	}
}
add_action( 'bp_actions', 'ass_update_group_subscribe_settings' );



// translate the short code subscription status into a nicer version
function ass_subscribe_translate( $status ){
	if ( $status == 'no' || !$status )
		$output = __('No Email', 'bp-ass');
	elseif ( $status == 'sum' )
		$output = __('Weekly Summary', 'bp-ass');
	elseif ( $status == 'dig' )
		$output = __('Daily Digest', 'bp-ass');
	elseif ( $status == 'sub' )
		$output = __('New Topics', 'bp-ass');
	elseif ( $status == 'supersub' )
		$output = __('All Email', 'bp-ass');

	return $output;
}


// this adds the ajax-based subscription option in the group header, or group directory
function ass_group_subscribe_button() {
	global $bp, $groups_template;

	if( ! empty( $groups_template ) ) {
		$group =& $groups_template->group;
	}
	else {
		$group = groups_get_current_group();
	}

	if ( !is_user_logged_in() || !empty( $group->is_banned ) || !$group->is_member )
		return;

	// if we're looking at someone elses list of groups hide the subscription
	if ( bp_displayed_user_id() && ( bp_loggedin_user_id() != bp_displayed_user_id() ) )
		return;

	$group_status = ass_get_group_subscription_status( bp_loggedin_user_id(), $group->id );

	if ( $group_status == 'no' )
		$group_status = NULL;

	$status_desc = __('Your email status is ', 'bp-ass');
	$link_text = __('change', 'bp-ass');
	$gemail_icon_class = ' gemail_icon';
	$sep = '';

	if ( !$group_status ) {
		//$status_desc = '';
		$link_text = __('Get email updates', 'bp-ass');
		$gemail_icon_class = '';
		$sep = '';
	}

	$status = ass_subscribe_translate( $group_status );
	?>

	<div class="group-subscription-div">
		<span class="group-subscription-status-desc"><?php echo $status_desc; ?></span>
		<span class="group-subscription-status<?php echo $gemail_icon_class ?>" id="gsubstat-<?php echo $group->id; ?>"><?php echo $status; ?></span> <?php echo $sep; ?>
		(<a class="group-subscription-options-link" id="gsublink-<?php echo $group->id; ?>" href="javascript:void(0);" title="<?php _e('Change your email subscription options for this group','bp-ass');?>"><?php echo $link_text; ?></a>)
		<span class="ajax-loader" id="gsubajaxload-<?php echo $group->id; ?>"></span>
	</div>
	<div class="generic-button group-subscription-options" id="gsubopt-<?php echo $group->id; ?>">
		<a class="group-sub" id="no-<?php echo $group->id; ?>"><?php _e('No Email', 'bp-ass') ?></a> <?php _e('I will read this group on the web', 'bp-ass') ?><br>
		<a class="group-sub" id="sum-<?php echo $group->id; ?>"><?php _e('Weekly Summary', 'bp-ass') ?></a> <?php _e('Get a summary of topics each', 'bp-ass') ?> <?php echo ass_weekly_digest_week(); ?><br>
		<a class="group-sub" id="dig-<?php echo $group->id; ?>"><?php _e('Daily Digest', 'bp-ass') ?></a> <?php _e('Get the day\'s activity bundled into one email', 'bp-ass') ?><br>

		<?php if ( ass_get_forum_type() ) : ?>
			<a class="group-sub" id="sub-<?php echo $group->id; ?>"><?php _e('New Topics', 'bp-ass') ?></a> <?php _e('Send new topics as they arrive (but no replies)', 'bp-ass') ?><br>
		<?php endif; ?>

		<a class="group-sub" id="supersub-<?php echo $group->id; ?>"><?php _e('All Email', 'bp-ass') ?></a> <?php _e('Send all group activity as it arrives', 'bp-ass') ?><br>
		<a class="group-subscription-close" id="gsubclose-<?php echo $group->id; ?>"><?php _e('close', 'bp-ass') ?></a>
	</div>

	<?php
}
add_action ( 'bp_group_header_meta', 'ass_group_subscribe_button' );
add_action ( 'bp_directory_groups_actions', 'ass_group_subscribe_button' );
//add_action ( 'bp_directory_groups_item', 'ass_group_subscribe_button' );  //useful to put in different location with css abs pos



// Handles AJAX request to subscribe/unsubscribe from group
function ass_group_ajax_callback() {
	global $bp;
	//check_ajax_referer( "ass_group_subscribe" );

	$action = $_POST['a'];
	$user_id = bp_loggedin_user_id();
	$group_id = $_POST['group_id'];

	ass_group_subscription( $action, $user_id, $group_id );

	echo $action;
	exit();
}
add_action( 'wp_ajax_ass_group_ajax', 'ass_group_ajax_callback' );


// if the user leaves the group or if they are removed by an admin, delete their subscription status
function ass_unsubscribe_on_leave( $group_id, $user_id ){
	ass_group_subscription( 'delete', $user_id, $group_id );
}
add_action( 'groups_leave_group', 'ass_unsubscribe_on_leave', 100, 2 );
add_action( 'groups_remove_member', 'ass_unsubscribe_on_leave', 100, 2 );



//
//	!Default Group Subscription
//

// when a user joins a group, set their default subscription level
function ass_set_default_subscription( $groups_member ){
	global $bp;

	// only set the default if the user has no subscription history for this group
	if ( ass_get_group_subscription_status( $groups_member->user_id, $groups_member->group_id ) )
		return;

	//if the person has requested access to a private group but has not been approved, don't subscribe them
	if ( !$groups_member->is_confirmed )
		return;

	$default_gsub = apply_filters( 'ass_default_subscription_level', groups_get_groupmeta( $groups_member->group_id, 'ass_default_subscription' ), $groups_member->group_id );

	if ( $default_gsub ) {
		ass_group_subscription( $default_gsub, $groups_member->user_id, $groups_member->group_id );
	}
}
add_action( 'groups_member_after_save', 'ass_set_default_subscription', 20, 1 );


// give the user a notice if they are default subscribed to this group (does not work for invites or requests)
function ass_join_group_message( $group_id, $user_id ) {
	global $bp;

	if ( $user_id != bp_loggedin_user_id()  )
		return;

	$status = apply_filters( 'ass_default_subscription_level', groups_get_groupmeta( $group_id, 'ass_default_subscription' ), $group_id );

	if ( !$status )
		$status = 'no';

	bp_core_add_message( __( 'You successfully joined the group. Your group email status is: ', 'bp-ass' ) . ass_subscribe_translate( $status ) );

}
add_action( 'groups_join_group', 'ass_join_group_message', 1, 2 );




// create the default subscription settings during group creation and editing
function ass_default_subscription_settings_form() {
	?>
	<h4><?php _e('Email Subscription Defaults', 'bp-ass'); ?></h4>
	<p><?php _e('When new users join this group, their default email notification settings will be:', 'bp-ass'); ?></p>
	<div class="radio">
		<label><input type="radio" name="ass-default-subscription" value="no" <?php ass_default_subscription_settings( 'no' ) ?> />
			<?php _e( 'No Email (users will read this group on the web - good for any group - the default)', 'bp-ass' ) ?></label>
		<label><input type="radio" name="ass-default-subscription" value="sum" <?php ass_default_subscription_settings( 'sum' ) ?> />
			<?php _e( 'Weekly Summary Email (the week\'s topics - good for large groups)', 'bp-ass' ) ?></label>
		<label><input type="radio" name="ass-default-subscription" value="dig" <?php ass_default_subscription_settings( 'dig' ) ?> />
			<?php _e( 'Daily Digest Email (all daily activity bundles in one email - good for medium-size groups)', 'bp-ass' ) ?></label>

		<?php if ( ass_get_forum_type() ) : ?>
			<label><input type="radio" name="ass-default-subscription" value="sub" <?php ass_default_subscription_settings( 'sub' ) ?> />
			<?php _e( 'New Topics Email (new topics are sent as they arrive, but not replies - good for small groups)', 'bp-ass' ) ?></label>
		<?php endif; ?>

		<label><input type="radio" name="ass-default-subscription" value="supersub" <?php ass_default_subscription_settings( 'supersub' ) ?> />
			<?php _e( 'All Email (send emails about everything - recommended only for working groups)', 'bp-ass' ) ?></label>
	</div>
	<hr />
	<?php
}
add_action ( 'bp_after_group_settings_admin' ,'ass_default_subscription_settings_form' );
add_action ( 'bp_after_group_settings_creation_step' ,'ass_default_subscription_settings_form' );

// echo subscription default checked setting for the group admin settings - default to 'unsubscribed' in group creation
function ass_default_subscription_settings( $setting ) {
	$stored_setting = ass_get_default_subscription();

	if ( $setting == $stored_setting )
		echo ' checked="checked"';
	else if ( $setting == 'no' && !$stored_setting )
		echo ' checked="checked"';
}


// Save the default group subscription setting in the group meta, if no, delete it
function ass_save_default_subscription( $group ) {
	if ( isset( $_POST['ass-default-subscription'] ) && $postval = $_POST['ass-default-subscription'] ) {
		if ( $postval && $postval != 'no' ) {
			groups_update_groupmeta( $group->id, 'ass_default_subscription', $postval );

			// during group creation, also save the sub level for the group creator
			if ( 'group-settings' == bp_get_groups_current_create_step() ) {
				ass_group_subscription( $postval, $group->creator_id, $group->id );
			}

		} elseif ( $postval == 'no' ) {
			groups_delete_groupmeta( $group->id, 'ass_default_subscription' );
		}
	}
}
add_action( 'groups_group_after_save', 'ass_save_default_subscription' );


// Get the default subscription settings for the group
function ass_get_default_subscription( $group = false ) {
	global $bp, $groups_template;
	if ( !$group )
		$group =& $groups_template->group;

	if ( isset( $group->id ) )
		$group_id = $group->id;
	else if ( isset( $bp->groups->new_group_id ) )
		$group_id = $bp->groups->new_group_id;

	$default_subscription =  groups_get_groupmeta( $group_id, 'ass_default_subscription' );
	return apply_filters( 'ass_get_default_subscription', $default_subscription );
}








//
//	!TOPIC SUBSCRIPTION
//

/**
 * Disables bbPress 2's subscription block if the user's group setting is set
 * to "All Mail".
 *
 * All other group subscription settings (New Topics, Digests) should be able
 * to use bbP's topic subscription functionality.  This emulates GES' old
 * "Follow / Mute" functionality.  However, these emails are managed by bbP,
 * not GES.
 *
 * @since 3.2.2
 */
function ass_bbp_subscriptions( $retval ) {
	// make sure we're on a BP group page
	if ( bp_is_group() ) {
		// not logged in? stop now!
		if ( ! is_user_logged_in() ) {
			return $retval;
		}

		// only do this check if BP's theme compat has run on the group page
		if ( ! did_action( 'bp_template_content' ) ) {
			return $retval;
		}

		// get group sub status
		$group_status = ass_get_group_subscription_status( bp_loggedin_user_id(), bp_get_current_group_id() );

		// if group sub status is anything but "All Mail", let the member use bbP's
		// native subscriptions - this emulates GES' old "Follow / Mute" functionality
		if ( $group_status != 'supersub' ) {
			return true;

		// the member's setting is "All Mail" so we shouldn't allow them to subscribe
		// to prevent duplicates
		} else {
			return false;
		}
	}

	return $retval;
}
add_filter( 'bbp_is_subscriptions_active', 'ass_bbp_subscriptions' );

/**
 * Disable bbP's subscription email blast if group user is already subscribed
 * to "All Mail".
 *
 * This scenario might happen if a user subscribed to a bunch of bbP group
 * topics and later switched to the group's "All Mail" subscription.
 *
 * @since 3.4
 */
function ass_bbp_disable_email( $message, $reply_id, $topic_id, $user_id ) {

	// make sure we're on a BP group page
	if ( bp_is_group() ) {
		global $bp;

		// get group sub status
		// we're using the direct, global reference for sanity's sake
		$group_status = ass_get_group_subscription_status( $user_id, $bp->groups->current_group->id );

		// if user's group sub status is "All Mail", stop bbP's email from sending
		// by blanking out the message
		if ( $group_status == 'supersub' ) {
			return false;
		}
	}

	return $message;
}
add_filter( 'bbp_subscription_mail_message', 'ass_bbp_disable_email', 10, 4 );


function ass_get_topic_subscription_status( $user_id, $topic_id ) {
	global $bp;

	if ( !$user_id || !$topic_id )
		return false;

	$user_topic_status = groups_get_groupmeta( bp_get_current_group_id(), 'ass_user_topic_status_' . $topic_id );

	if ( is_array( $user_topic_status ) && isset( $user_topic_status[ $user_id ] ) )
		return ( $user_topic_status[ $user_id ] );
	else
		return false;
}


// Creates "subscribe/unsubscribe" link on forum directory page and each topic page
function ass_topic_follow_or_mute_link() {
	global $bp;

	//echo '<pre>'; print_r( $bp ); echo '</pre>';

	if ( empty( $bp->groups->current_group->is_member ) )
		return;

	$topic_id = bp_get_the_topic_id();
	$topic_status = ass_get_topic_subscription_status( bp_loggedin_user_id(), $topic_id );
	$group_status = ass_get_group_subscription_status( bp_loggedin_user_id(), bp_get_current_group_id() );

	if ( $topic_status == 'mute' || ( $group_status != 'supersub' && !$topic_status ) ) {
		$action = 'follow';
		$link_text = __('Follow','bp-ass');
		$title = __('You are not following this topic. Click to follow it and get email updates for new posts','bp-ass');
	} else if ( $topic_status == 'sub' || ( $group_status == 'supersub' && !$topic_status ) ) {
		$action = 'mute';
		$link_text = __('Mute','bp-ass');
		$title = __('You are following this topic. Click to stop getting email updates','bp-ass');
	} else {
		echo 'nothing'; // do nothing
	}

	if ( $topic_status == 'mute' )
		$title = __('This conversation is muted. Click to follow it','bp-ass');

	if ( $action && bp_is_action_variable( 'topic', 0 ) ) { // we're viewing one topic
		echo '<div class="generic-button ass-topic-subscribe"><a title="'.$title.'"
			id="'.$action.'-'.$topic_id.'-'.bp_get_current_group_id().'">'.$link_text.' '.__('this topic','bp-ass').'</a></div>';
	} else if ( $action )  { // we're viewing a list of topics
		echo '<td class="td-email-sub"><div class="generic-button ass-topic-subscribe"><a title="'.$title.'"
			id="'.$action.'-'.$topic_id.'-'.bp_get_current_group_id().'">'.$link_text.'</a></div></td>';
	}
}
add_action( 'bp_directory_forums_extra_cell', 'ass_topic_follow_or_mute_link', 50 );
add_action( 'bp_before_group_forum_topic_posts', 'ass_topic_follow_or_mute_link' );
add_action( 'bp_after_group_forum_topic_posts', 'ass_topic_follow_or_mute_link' );


// add a title to the mute/follow above (in the th tag)
function ass_after_topic_title_head() {
	global $bp;

	if ( empty( $bp->groups->current_group->is_member ) )
		return;

	echo '<th id="th-email-sub">'.__('Email','bp-ass').'</th>';
}
add_filter( 'bp_directory_forums_extra_cell_head', 'ass_after_topic_title_head', 3 );



// Handles AJAX request to follow/mute a topic
function ass_ajax_callback() {
	global $bp;
	//check_ajax_referer( "ass_subscribe" );

	$action = $_POST['a'];  // action is used by ajax, so we use a here
	$user_id = bp_loggedin_user_id();
	$topic_id = $_POST['topic_id'];
	$group_id = $_POST['group_id'];

	ass_topic_subscribe_or_mute( $action, $user_id, $topic_id, $group_id );

	echo $action;
	die();
}
add_action( 'wp_ajax_ass_ajax', 'ass_ajax_callback' );


// Adds/removes a $topic_id from the $user_id's mute list.
function ass_topic_subscribe_or_mute( $action, $user_id, $topic_id, $group_id ) {
	global $bp;

	if ( !$action || !$user_id || !$topic_id || !$group_id )
		return false;

	//$mute_list = get_usermeta( $user_id, 'ass_topic_mute' );
	$user_topic_status = groups_get_groupmeta( $group_id, 'ass_user_topic_status_' . $topic_id );

	if ( $action == 'unsubscribe' ||  $action == 'mute' ) {
		//$mute_list[ $topic_id ] = 'mute';
		$user_topic_status[ $user_id ] = 'mute';
	} elseif ( $action == 'subscribe' ||  $action == 'follow'  ) {
		//$mute_list[ $topic_id ] = 'subscribe';
		$user_topic_status[ $user_id ] = 'sub';
	}

	//update_usermeta( $user_id, 'ass_topic_mute', $mute_list );
	groups_update_groupmeta( $group_id , 'ass_user_topic_status_' . $topic_id, $user_topic_status );
	//bb_update_topicmeta( $topic_id, 'ass_mute_users', $user_id );

	// add a hook for 3rd-party plugin devs
	do_action( 'ass_topic_subscribe_or_mute', $user_id, $group_id, $topic_id, $action );
}





//
//	!SUPPORT FUNCTIONS
//


// return array of previous posters' ids
function ass_get_previous_posters( $topic_id ) {
	do_action( 'bbpress_init' );
	global $bbdb, $wpdb;

	$posters = $bbdb->get_results( "SELECT poster_id FROM $bbdb->posts WHERE topic_id = {$topic_id}" );

	foreach( $posters as $poster ) {
		$user_ids[ $poster->poster_id ] = true;
	}

	return $user_ids;
}

// return array of users who match a usermeta value
function ass_user_settings_array( $setting ) {
	global $wpdb;
	$results = $wpdb->get_results( "SELECT user_id, meta_value FROM $wpdb->usermeta WHERE meta_key LIKE '{$setting}'" );

	$settings = array();

	foreach ( $results as $result ) {
		$settings[ $result->user_id ] = $result->meta_value;
	}

	return $settings;
}

/*
// here lies a failed attempt ...
// return array of users who are admins or mods in a specific group
function ass_get_group_admins_mods( $group_id ) {
	global $bp;
	$results = $wpdb->get_results( "SELECT user_id, is_admin, is_mod FROM {$bp->groups->table_name_members} WHERE group_id = $group_id AND (is_admin = 1 OR is_mod = 1)", ARRAY_A );

	return $results;
}
*/

/**
 * Cleans up the email content
 *
 * By default we do the following to outgoing email content:
 *   - strip slashes
 *   - strip HTML tags
 *   - convert HTML entities
 *
 * @uses apply_filters() Filter 'ass_clean_content' to modify our cleaning routine
 * @param string $content The email content
 * @return string $clean_content The email content, cleaned up for plaintext email
 */
function ass_clean_content( $content ) {
	$clean_content = html_entity_decode( strip_tags( stripslashes( $content ) ), ENT_QUOTES );
	return apply_filters( 'ass_clean_content', $clean_content, $content );
}

/**
 * Cleans up the subject for email.
 *
 * This function does a few things:
 *  - Add quotes to topic name
 *  - Strips trailing colon
 *  - Strips slashes, HTML
 *  - Convert HTML entities
 *
 * @param string $subject The email subject line to clean
 * @param bool $add_quotes Should we try to add quotes to forum topics?
 * @return string
 */
function ass_clean_subject( $subject, $add_quotes = true ) {

	// this feature of adding quotes only happens in english installs
	// and is not that useful in the HTML digest
	if ( $add_quotes === true ) {
		$subject_quotes = preg_replace( '/posted on the forum topic /', 'posted on the forum topic "', $subject );
		$subject_quotes = preg_replace( '/started the forum topic /', 'started the forum topic "', $subject_quotes );
		if ( $subject != $subject_quotes )
			$subject = preg_replace( '/ in the group /', '" in the group ', $subject_quotes );

		$subject = preg_replace( '/:$/', '', $subject ); // remove trailing colon
	}

	$subject = html_entity_decode( strip_tags( stripslashes( $subject ) ), ENT_QUOTES );

	return apply_filters( 'ass_clean_subject', $subject );
}

function ass_clean_subject_html( $subject ) {
	$subject = preg_replace( '/:$/', '', $subject ); // remove trailing colon
	return apply_filters( 'ass_clean_subject_html', $subject );
}


// Check how long the user has been registered and return false if not long enough. Return true if setting not active off ( ie. 'n/a')
function ass_registered_long_enough( $activity_user_id ) {
	$ass_reg_age_setting = get_site_option( 'ass_activity_frequency_ass_registered_req' );

	if ( is_numeric( $ass_reg_age_setting ) ) {
		$current_user_info = get_userdata( $activity_user_id );

		if ( strtotime(current_time("mysql", 0)) - strtotime($current_user_info->user_registered) < ( $ass_reg_age_setting*24*60*60 ) )
			return false;

	}

	return true;
}


// show group email subscription status on group member pages (for admins and mods only)
function ass_show_subscription_status_in_member_list( $user_id='' ) {
	global $bp, $members_template;

	$group_id = bp_get_current_group_id();

	if ( groups_is_user_admin( bp_loggedin_user_id() , $group_id ) || groups_is_user_mod( bp_loggedin_user_id() , $group_id ) || is_super_admin() ) {
		if ( !$user_id )
			$user_id = $members_template->member->user_id;
		$sub_type = ass_get_group_subscription_status( $user_id, $group_id );
		echo '<div class="ass_members_status">'.__('Email status:','bp-ass'). ' ' . ass_subscribe_translate( $sub_type ) . '</div>';
	}
}
add_action( 'bp_group_members_list_item_action', 'ass_show_subscription_status_in_member_list', 100 );

/**
 * Allow group admins and mods to manage each group member's email
 * subscription settings.
 *
 * This is only enabled if this option is enabled under the main "Group Email
 * Options" settings page.
 *
 * This is hooked to:
 *  - The frontend group's "Admin > Members" page
 *  - The backend group's "Manage Members" metabox (only in BP 1.8+)
 *
 * @param int $user_id The user ID of the group member
 * @param obj $group The BP Group object
 */
function ass_manage_members_email_status(  $user_id = '', $group = '' ) {
	global $members_template, $groups_template;

	// if group admins / mods cannot manage email subscription settings, stop now!
	if ( get_option('ass-admin-can-edit-email') == 'no' ) {
		return;
	}

	// no user ID? fallback on members loop user ID if it exists
	if ( ! $user_id ) {
		$user_id = ! empty( $members_template->member->user_id ) ? $members_template->member->user_id : false;
	}

	// no user ID? fallback on group loop if it exists
	if( ! $group ) {
		$group = ! empty( $groups_template->group ) ? $groups_template->group : false;
	}

	// no user or group? stop now!
	if ( ! $user_id || ! is_object( $group ) ) {
		return;
	}

	$user_id = (int) $user_id;

	$group_url = bp_get_group_permalink( $group ) . 'admin/manage-members/email';
	$sub_type = ass_get_group_subscription_status( $user_id, $group->id );
	echo '<span class="ass_manage_members_links"> '.__('Email status:','bp-ass').' ' . ass_subscribe_translate( $sub_type ) . '.';
	echo ' &nbsp; '.__('Change to:','bp-ass').' ';
	echo '<a href="' . wp_nonce_url( $group_url.'/no/'.$user_id, 'ass_member_email_status' ) . '">'.__('No Email','bp-ass').'</a> | ';
	echo '<a href="' . wp_nonce_url( $group_url.'/sum/'.$user_id, 'ass_member_email_status' ) . '">'.__('Weekly','bp-ass').'</a> | ';
	echo '<a href="' . wp_nonce_url( $group_url.'/dig/'.$user_id, 'ass_member_email_status' ) . '">'.__('Daily','bp-ass').'</a> | ';

	if ( ass_get_forum_type() ) {
		echo '<a href="' . wp_nonce_url( $group_url.'/sub/'.$user_id, 'ass_member_email_status' ) . '">'.__('New Topics','bp-ass').'</a> | ';
	}

	echo '<a href="' . wp_nonce_url( $group_url.'/supersub/'.$user_id, 'ass_member_email_status' ) . '">'.__('All Email','bp-ass').'</a>';
	echo '</span>';
}
add_action( 'bp_group_manage_members_admin_item', 'ass_manage_members_email_status' );

/**
 * Manage each group member's email subscription settings from the "Groups"
 * dashboard page.
 *
 * Only works in BP 1.8+.
 *
 * @uses ass_manage_members_email_status()
 */
function ass_groups_admin_manage_member_row( $user_id, $group ) {
	ass_manage_members_email_status( $user_id, $group );
}
add_action( 'bp_groups_admin_manage_member_row', 'ass_groups_admin_manage_member_row', 10, 2 );

// make the change to the users' email status based on the function above
function ass_manage_members_email_update() {
	global $bp;

	if ( bp_is_groups_component() && bp_is_action_variable( 'manage-members', 0 ) ) {

		if ( !$bp->is_item_admin )
			return false;

		if ( bp_is_action_variable( 'email', 1 ) && ( bp_is_action_variable( 'no', 2 ) || bp_is_action_variable( 'sum', 2 ) || bp_is_action_variable( 'dig', 2 ) || bp_is_action_variable( 'sub', 2 ) || bp_is_action_variable( 'supersub', 2 ) ) && isset( $bp->action_variables[3] ) && is_numeric( $bp->action_variables[3] ) ) {

			$user_id = $bp->action_variables[3];
			$action = $bp->action_variables[2];

			/* Check the nonce first. */
			if ( !check_admin_referer( 'ass_member_email_status' ) )
				return false;

			ass_group_subscription( $action, $user_id, bp_get_current_group_id() );
			bp_core_add_message( __( 'User email status changed successfully', 'bp-ass' ) );
			bp_core_redirect( bp_get_group_permalink( $bp->groups->current_group ) . 'admin/manage-members/' );
		}
	}
}
add_action( 'bp_actions', 'ass_manage_members_email_update' );

/**
 * Output the group default status
 *
 * First tries to get it out of groupmeta. If not found, falls back on supersub. Filter the supersub
 * default with 'ass_default_subscription_level'
 *
 * @param int $group_id ID of the group. Defaults to current group, if present
 * @return str $status
 */
function ass_group_default_status( $group_id = false ) {
	global $bp;

	if ( !$group_id )
		$group_id = bp_is_group() ? bp_get_current_group_id() : false;

	if ( !$group_id )
		return '';

	$status = groups_get_groupmeta( $group_id, 'ass_default_subscription' );

	if ( !$status ) {
		$status = apply_filters( 'ass_default_subscription_level', 'supersub', $group_id );
	}

	return apply_filters( 'ass_group_default_status', $status, $group_id );
}

// Site admin can change the email settings for ALL users in a group
function ass_change_all_email_sub() {
	global $groups_template, $bp;

	if ( !is_super_admin() )
		return false;

	$group = &$groups_template->group;

	if (! $default_email_sub = ass_get_default_subscription( $group ) )
		$default_email_sub = 'no';

	echo '<p><br>'.__('Site Admin Only: update email subscription settings for ALL members to the default:', 'bp-ass').' <i>' . ass_subscribe_translate( $default_email_sub ) . '</i>.  '.__('Warning: this is not reversible so use with caution.', 'bp-ass').' <a href="' . wp_nonce_url( bp_get_group_permalink( $group ) . 'admin/manage-members/email-all/'. $default_email_sub, 'ass_change_all_email_sub' ) . '">'.__('Make it so!', 'bp-ass').'</a></p>';
}
add_action( 'bp_after_group_manage_members_admin', 'ass_change_all_email_sub' );

// change all users' email status based on the function above
function ass_manage_all_members_email_update() {
	global $bp;

	if ( bp_is_groups_component() && bp_is_action_variable( 'manage-members', 0 ) ) {

		if ( !is_super_admin() )
			return false;

		$action = bp_action_variable( 2 );

		if ( bp_is_action_variable( 'email-all', 1 ) && ( 'no' == $action || 'sum' == $action || 'dig' == $action || 'sub' == $action || 'supersub' == $action ) ) {

			if ( !check_admin_referer( 'ass_change_all_email_sub' ) )
				return false;

			$result = BP_Groups_Member::get_all_for_group( bp_get_current_group_id(), 0, 0, 0 ); // set the last value to 1 to exclude admins
			$members = $result['members'];

			foreach ( $members as $member ) {
				ass_group_subscription( $action, $member->user_id, bp_get_current_group_id() );
			}

			bp_core_add_message( __( 'All user email status\'s changed successfully', 'bp-ass' ) );
			bp_core_redirect( bp_get_group_permalink( groups_get_current_group() ) . 'admin/manage-members/' );
		}
	}
}
add_action( 'bp_actions', 'ass_manage_all_members_email_update' );


// Add a notice at end of email notification about how to change group email subscriptions
function ass_add_notice_to_notifications_page() {
?>
		<div id="group-email-settings">
			<table class="notification-settings zebra">
				<thead>
					<tr>
						<th class="icon">&nbsp;</th>
						<th class="title"><?php _e( 'Individual Group Email Settings', 'bp-ass' ); ?></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>&nbsp;</td>
						<td>
							<p><?php printf( __('To change the email notification settings for your groups, go to %s and click "Change" for each group.', 'bp-ass' ), '<a href="'. bp_loggedin_user_domain() . trailingslashit( BP_GROUPS_SLUG ) . '">' . __( 'My Groups' ,'bp-ass' ) . '</a>' ); ?></p>

							<?php if ( get_option( 'ass-global-unsubscribe-link' ) == 'yes' ) : ?>
								<p><a href="<?php echo wp_nonce_url( add_query_arg( 'ass_unsubscribe', 'all' ), 'ass_unsubscribe_all' ); ?>"><?php _e( "Or set all your group's email options to No Email", 'bp-ass' ); ?></a></p>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
<?php
}
add_action( 'bp_notification_settings', 'ass_add_notice_to_notifications_page', 9000 );

// Unsubscribe a user from all or a subset of their groups
function ass_unsubscribe_user( $user_id = 0, $groups = array() ) {
	if ( empty( $user_id ) )
		$user_id = bp_displayed_user_id();

	if ( empty( $groups ) ) {
		$groups = groups_get_user_groups( $user_id );
		$groups = $groups['groups'];
	}

	foreach ( $groups as $group_id ) {
		ass_group_subscription( 'no', $user_id, $group_id );
	}
}

// Process request for logged in user unsubscribing via link in notifications settings
function ass_user_unsubscribe_action() {
	if ( get_option( 'ass-global-unsubscribe-link' ) != 'yes' || ! bp_is_settings_component() || ! isset( $_GET['ass_unsubscribe'] ) )
		return;

	check_admin_referer( 'ass_unsubscribe_all' );

	ass_unsubscribe_user();

	if ( bp_is_my_profile() )
		bp_core_add_message( __( 'You have been unsubscribed from all groups notifications.', 'bp-ass' ), 'success' );
	else
		bp_core_add_message( __( "This user's has been unsubscribed from all groups notifications.", 'bp-ass' ), 'success' );

	bp_core_redirect( bp_displayed_user_domain() . bp_get_settings_slug() . '/notifications/' );
}
add_action( 'bp_actions', 'ass_user_unsubscribe_action' );

// Form to confirm unsubscription from all groups
function ass_user_unsubscribe_form() {
	$action = isset( $_GET['bpass-action'] ) ? $_GET['bpass-action'] : '';

	if ( 'unsubscribe' != $action )
		return;

	if ( empty( $_GET['group'] ) && get_option( 'ass-global-unsubscribe-link' ) != 'yes' )
		return;

	$user_id = bp_displayed_user_id();
	$access_key = $_GET['access_key'];

	// unsubscribing from one group only
	if ( isset( $_GET['group'] ) ) {
		$group = groups_get_group( array( 'group_id' => $_GET['group'] ) );

		if ( $access_key != md5( "{$group->id}{$user_id}unsubscribe" . wp_salt() ) )
			return;

		ass_unsubscribe_user( $user_id, (array) $group->id );

		$message = sprintf( __( 'Your unsubscription was successful. You will no longer receive email notifications from the group %s.', 'bp-ass' ), '<a href="' . bp_get_group_permalink( $group ) . '">' . $group->name . '</a>' );

		$continue_link = sprintf( __( '<a href="%1$s">Continue to %2$s</a>', 'bp-ass' ), bp_get_group_permalink( $group ), esc_html( $group->name ) );

		$unsubscribed = true;
	} else {
		// unsubscribe from all groups
		if ( $access_key != md5( $user_id . 'unsubscribe' . wp_salt() ) )
			return;

		if ( isset( $_GET['submit'] ) ) {
			ass_unsubscribe_user( $user_id );

			$message = __( 'Your unsubscription was successful. You will no longer receive email notifications from any of your groups.', 'bp-ass' );

			$continue_link = sprintf( __( '<a href="%1$s">Continue to %2$s</a>', 'bp-ass' ), bp_get_root_domain(), get_option( 'blogname' ) );

			$unsubscribed = true;
		}
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name = "viewport" content="width=640" />
	<title><?php echo bloginfo( 'name' ); ?> - <?php _e( 'Unsubscribe from all groups notifications' ); ?></title>
	<style type="text/css">
		.container {
			background-color:#fff;
			width:400px;
			border:1px solid #999;
			padding: 20px;
			margin: 0 auto;
		}
	</style>
	<?php wp_head(); ?>
</head>
<body>
	<div class="container">
		<h1><?php echo bloginfo( 'name' ); ?> - <?php _e( 'Unsubscribe' ); ?></h1>
		<?php if ( isset( $unsubscribed ) ) : ?>
			<p><?php echo $message ?></p>
			<p><?php echo $continue_link ?></p>
		<?php else : ?>
			<p><?php _e( 'Do you really want to unsubscribe from all groups notifications?' ); ?></p>

			<form id="ass-unsubscribe-form" action="" method="get">
				<input type="hidden" name="bpass-action" value="<?php echo $action; ?>" />
				<input type="hidden" name="access_key" value="<?php echo $access_key; ?>" />
				<input type="submit" name="submit" value="<?php _e( 'Yes, unsubscribe from all my groups' ); ?>" />
				<a href="<?php echo esc_attr( site_url() ); ?>"><?php _e( 'No, close' ); ?></a>
			</form>
		<?php endif; ?>
	</div>
</body>
</html>
<?php
	die;
}
add_action( 'bp_init', 'ass_user_unsubscribe_form' );








//
//	!FRONT END ADMIN AND SETTINGS FUNCTIONS
//


// create a form that allows admins to email everyone in the group
function ass_admin_notice_form() {
	global $bp;

	if ( groups_is_user_admin( bp_loggedin_user_id() , bp_get_current_group_id() ) || is_super_admin() ) {
		$submit_link = bp_get_groups_action_link( 'notifications' );
		?>
		<form action="<?php echo $submit_link ?>" method="post">
			<?php wp_nonce_field( 'ass_email_options' ); ?>

			<h3><?php _e('Send an email notice to everyone in the group', 'bp-ass'); ?></h3>
			<p><?php _e('You can use the form below to send an email notice to all group members.', 'bp-ass'); ?> <br>
			<b><?php _e('Everyone in the group will receive the email -- regardless of their email settings -- so use with caution', 'bp-ass'); ?></b>.</p>

			<p>
				<label for="ass-admin-notice-subject"><?php _e('Email Subject:', 'bp-ass') ?></label>
				<input type="text" name="ass_admin_notice_subject" id="ass-admin-notice-subject" value="" />
			</p>

			<p>
				<label for="ass-admin-notice-textarea"><?php _e('Email Content:', 'bp-ass') ?></label>
				<textarea value="" name="ass_admin_notice" id="ass-admin-notice-textarea"></textarea>
			</p>

			<p>
				<input type="submit" name="ass_admin_notice_send" value="<?php _e('Email this notice to everyone in the group', 'bp-ass') ?>" />
			</p>

			<br />

			<?php $welcome_email = groups_get_groupmeta( bp_get_current_group_id(), 'ass_welcome_email' ); ?>
			<?php $welcome_email_enabled = isset( $welcome_email['enabled'] ) ? $welcome_email['enabled'] : ''; ?>

			<h3><?php _e( 'Welcome Email', 'bp-ass' ); ?></h3>
			<p><?php _e( 'Send an email when a new member join the group.', 'bp-ass' ); ?></p>

			<p>
				<label>
					<input<?php checked( $welcome_email_enabled, 'yes' ); ?> type="checkbox" name="ass_welcome_email[enabled]" id="ass-welcome-email-enabled" value="yes" />
					<?php _e( 'Enable welcome email', 'bp-ass' ); ?>
				</label>
			</p>

			<p class="ass-welcome-email-field<?php if ( $welcome_email_enabled != 'yes' ) echo ' hide-if-js'; ?>">
				<label for="ass-welcome-email-subject"><?php _e( 'Email Subject:', 'bp-ass' ); ?></label>
				<input value="<?php echo isset( $welcome_email['subject'] ) ? $welcome_email['subject'] : ''; ?>" type="text" name="ass_welcome_email[subject]" id="ass-welcome-email-subject" />
			</p>

			<p class="ass-welcome-email-field<?php if ( $welcome_email_enabled != 'yes' ) echo ' hide-if-js'; ?>">
				<label for="ass-welcome-email-content"><?php _e( 'Email Content:', 'bp-ass'); ?></label>
				<textarea name="ass_welcome_email[content]" id="ass-welcome-email-content"><?php echo isset( $welcome_email['content'] ) ? $welcome_email['content'] : ''; ?></textarea>
			</p>

			<p>
				<input type="submit" name="ass_welcome_email_submit" value="<?php _e( 'Save', 'bp-ass' ); ?>" />
			</p>
		</form>
		<?php
	}
}


// This function sends an email out to all group members regardless of subscription status.
// TODO: change this function so the separate from is remove from the admin area and make it a checkbox under the 'add new topic' form. that way group admins can simply check off the box and it'll go to everyone. The benefit: notices are stored in the discussion form for later viewing. We should also alert the admin just how many people will get his post.
function ass_admin_notice() {
    if ( bp_is_groups_component() && bp_is_current_action( 'admin' ) && bp_is_action_variable( 'notifications', 0 ) ) {

	    	// Make sure the user is an admin
		if ( !groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id() ) && ! is_super_admin() )
			return;

		if ( get_option('ass-admin-can-send-email') == 'no' )
			return;

		// make sure the correct form variables are here
		if ( ! isset( $_POST[ 'ass_admin_notice_send' ] ) )
			return;

		if ( empty( $_POST[ 'ass_admin_notice' ] ) ) {
			bp_core_add_message( __( 'The email notice was sent not sent. Please enter email content.', 'bp-ass' ), 'error' );
		} else {
			$group      = groups_get_current_group();
			$group_id   = $group->id;
			$group_name = bp_get_current_group_name();
			$group_link = bp_get_group_permalink( $group );

			if ( $group->status != 'public' ) {
				$group_link = ass_get_login_redirect_url( $group_link );
			}

			$blogname   = '[' . get_blog_option( BP_ROOT_BLOG, 'blogname' ) . ']';
			$subject    = $_POST[ 'ass_admin_notice_subject' ];
			$subject   .= __(' - sent from the group ', 'bp-ass') . $group_name . ' ' . $blogname;
			$subject    = apply_filters( 'ass_admin_notice_subject', $subject, $_POST[ 'ass_admin_notice_subject' ], $group_name, $blogname );
			$subject    = ass_clean_subject( $subject, false );
			$notice     = apply_filters( 'ass_admin_notice_message', $_POST['ass_admin_notice'] );
			$notice     = ass_clean_content( $notice );

			$message    = sprintf( __(
'This is a notice from the group \'%s\':

"%s"


To view this group log in and follow the link below:
%s

---------------------
', 'bp-ass' ), $group_name,  $notice, $group_link );

			$message .= __( 'Please note: admin notices are sent to everyone in the group and cannot be disabled.
If you feel this service is being misused please speak to the website administrator.', 'bp-ass' );

			$user_ids = BP_Groups_Member::get_group_member_ids( $group_id );

			// allow others to perform an action when this type of email is sent, like adding to the activity feed
			do_action( 'ass_admin_notice', $group_id, $subject, $notice );

			// cycle through all group members
			foreach ( (array)$user_ids as $user_id ) {
				$user = bp_core_get_core_userdata( $user_id ); // Get the details for the user

				if ( $user->user_email )
					wp_mail( $user->user_email, $subject, $message );  // Send the email

				//echo '<br>Email: ' . $user->user_email;
			}

			bp_core_add_message( __( 'The email notice was sent successfully.', 'bp-ass' ) );
			//echo '<p>Subject: ' . $subject;
			//echo '<pre>'; print_r( $message ); echo '</pre>';
		}

		bp_core_redirect( bp_get_group_permalink( groups_get_current_group() ) . 'admin/notifications/' );
	}
}
add_action( 'bp_actions', 'ass_admin_notice', 1 );

// save welcome email option
function ass_save_welcome_email() {
	if ( bp_is_groups_component() && bp_is_current_action( 'admin' ) && bp_is_action_variable( 'notifications', 0 ) ) {

		if ( ! isset( $_POST['ass_welcome_email_submit'] ) )
			return;

		if ( ! groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id() ) && ! is_super_admin() )
			return;

		check_admin_referer( 'ass_email_options' );

		$values = stripslashes_deep( $_POST['ass_welcome_email'] );
		groups_update_groupmeta( bp_get_current_group_id(), 'ass_welcome_email', $values );

		bp_core_add_message( __( 'The welcome email option has been saved.', 'bp-ass' ) );
		bp_core_redirect( bp_get_group_permalink( groups_get_current_group() ) . 'admin/notifications/' );
	}
}
add_action( 'bp_actions', 'ass_save_welcome_email', 1 );

/**
 * Send welcome email to new group members
 *
 * @uses apply_filters() Filter 'ass_welcome_email' to change the content/subject of the email
 */
function ass_send_welcome_email( $group_id, $user_id ) {
	$user = bp_core_get_core_userdata( $user_id );

	$welcome_email = groups_get_groupmeta( $group_id, 'ass_welcome_email' );
	$welcome_email = apply_filters( 'ass_welcome_email', $welcome_email, $group_id ); // for multilingual filtering
	$welcome_email_enabled = isset( $welcome_email['enabled'] ) ? $welcome_email['enabled'] : 'no';

	if ( 'no' == $welcome_email_enabled ) {
		return;
	}

	$subject = ass_clean_subject( $welcome_email['subject'], false );
	$message = ass_clean_content( $welcome_email['content'] );

	if ( ! $user->user_email || 'yes' != $welcome_email_enabled || empty( $message ) )
		return;

	if ( get_option( 'ass-global-unsubscribe-link' ) == 'yes' ) {
		$global_link = bp_core_get_user_domain( $user_id ) . '?bpass-action=unsubscribe&access_key=' . md5( "{$user_id}unsubscribe" . wp_salt() );
		$message .= "\n\n---------------------\n";
		$message .= sprintf( __( 'To disable emails from all your groups at once click: %s', 'bp-ass' ), $global_link );
	}

	$group_admin_ids = groups_get_group_admins( $group_id );
	$group_admin = bp_core_get_core_userdata( $group_admin_ids[0]->user_id );
	$headers = array(
		"From: \"{$group_admin->display_name}\" <{$group_admin->user_email}>"
	);

	wp_mail( $user->user_email, $subject, $message, $headers );
}
add_action( 'groups_join_group', 'ass_send_welcome_email', 10, 2 );

/**
 * Determine what type of forums are running on this BP install.
 *
 * Returns either 'bbpress' or 'buddypress' on success.
 * Boolean false if neither forums are enabled.
 *
 * @since 3.4
 *
 * @return mixed String of forum type on success; boolean false if forums aren't installed.
 */
function ass_get_forum_type() {
	// sanity check
	if ( ! bp_is_active( 'groups' ) ) {
		return false;
	}

	$type = false;

	// check if bbP is installed
	if ( class_exists( 'bbpress' ) ) {
		// check if bbP group forum support is active
		if ( ! bbp_is_group_forums_active() ) {
			return false;
		}

		$type = 'bbpress';

	// check for BP's bundled forums
	} else {
		// BP's bundled forums aren't installed correctly, so stop!
		if ( ! bp_is_active( 'forums' ) || ! bp_forums_is_installed_correctly() ) {
			return false;
		}

		$type = 'buddypress';
	}

	return $type;
}

// adds forum notification options in the users settings->notifications page
function ass_group_subscription_notification_settings() {
	// get forum type
	$forums = ass_get_forum_type();

	// no forums installed? stop now!
	if ( ! $forums ) {
		return;
	}

?>
	<table class="notification-settings zebra" id="groups-subscription-notification-settings">
	<thead>
		<tr>
			<th class="icon"></th>
			<th class="title"><?php _e( 'Group Forum', 'bp-ass' ) ?></th>
			<th class="yes"><?php _e( 'Yes', 'bp-ass' ) ?></th>
			<th class="no"><?php _e( 'No', 'bp-ass' )?></th>
		</tr>
	</thead>
	<tbody>

	<?php
		// only add the following options if BP's bundled forums are installed...
		// @todo add back these options for bbPress if possible.
	?>

	<?php if ( $forums == 'buddypress' ) :
		if ( ! $replies_to_topic = bp_get_user_meta( bp_displayed_user_id(), 'ass_replies_to_my_topic', true ) ) {
			$replies_to_topic = 'yes';
		}

		if ( ! $replies_after_me = bp_get_user_meta( bp_displayed_user_id(), 'ass_replies_after_me_topic', true ) ) {
			$replies_after_me = 'yes';
		}
	?>

		<tr>
			<td></td>
			<td><?php _e( 'A member replies in a forum topic you\'ve started', 'bp-ass' ) ?></td>
			<td class="yes"><input type="radio" name="notifications[ass_replies_to_my_topic]" value="yes" <?php checked( $replies_to_topic, 'yes', true ); ?>/></td>
			<td class="no"><input type="radio" name="notifications[ass_replies_to_my_topic]" value="no" <?php checked( $replies_to_topic, 'no', true ); ?>/></td>
		</tr>

		<tr>
			<td></td>
			<td><?php _e( 'A member replies after you in a forum topic', 'bp-ass' ) ?></td>
			<td class="yes"><input type="radio" name="notifications[ass_replies_after_me_topic]" value="yes" <?php checked( $replies_after_me, 'yes', true ); ?>/></td>
			<td class="no"><input type="radio" name="notifications[ass_replies_after_me_topic]" value="no" <?php checked( $replies_after_me, 'no', true ); ?>/></td>
		</tr>

	<?php endif; ?>

		<tr>
			<td></td>
			<td><?php _e( 'Receive notifications of your own posts?', 'bp-ass' ) ?></td>
			<td class="yes"><input type="radio" name="notifications[ass_self_post_notification]" value="yes" <?php if ( ass_self_post_notification( bp_displayed_user_id() ) ) { ?>checked="checked" <?php } ?>/></td>
			<td class="no"><input type="radio" name="notifications[ass_self_post_notification]" value="no" <?php if ( !ass_self_post_notification( bp_displayed_user_id() ) ) { ?>checked="checked" <?php } ?>/></td>
		</tr>

		<?php do_action( 'ass_group_subscription_notification_settings' ); ?>
		</tbody>
	</table>


<?php
}
add_action( 'bp_notification_settings', 'ass_group_subscription_notification_settings' );

/**
 * Determine whether user should receive a notification of their own posts
 *
 * The main purpose of the filter is so that admins can override the setting, especially
 * in cases where the user has not specified a setting (ie you can set the default to true)
 *
 * @param int $user_id Optional
 * @return string|array Single metadata value, or array of values
 */
function ass_self_post_notification( $user_id = false ) {
	global $bp;

	if ( empty( $user_id ) )
		$user_id = bp_loggedin_user_id();

	$meta = bp_get_user_meta( $user_id, 'ass_self_post_notification', true );

	$self_notify = $meta == 'yes' ? true : false;

	//if ( $user_id == 4  ) { if ( $self_notify) print_r( $bp ); print_r( $meta ); die(); }
	return apply_filters( 'ass_self_post_notification', $self_notify, $meta, $user_id );
}





//
//	!WP BACKEND ADMIN SETTINGS
//


// Functions to add the backend admin menu to control changing default settings

/**
 * Adds "Group Email Options" panel under "BuddyPress" in the admin/network admin
 *
 * The add_action() hook is conditional to account for variations between WP 3.0.x/3.1.x and
 * BP < 1.2.7/>1.2.8.
 *
 * @package BuddyPress Group Email Subscription
 */
function ass_admin_menu() {
    
	add_submenu_page( 'bp-general-settings', __("Group Email Options", 'bp-ass'), __("Group Email Options", 'bp-ass'), 'manage_options', 'ass_admin_options', "ass_admin_options" );

}
add_action( bp_core_admin_hook(), 'ass_admin_menu' );


// function to create the back end admin form
function ass_admin_options() {
	//print_r($_POST); die();

	if ( !empty( $_POST ) ) {
		if ( ass_update_dashboard_settings() ) {
			?>

			<div id="message" class="updated">
				<p><?php _e( 'Settings saved.', 'bp-ass' ) ?></p>
			</div>

			<?php
		}
	}

	//set the first time defaults
	if ( !$ass_digest_time = get_option( 'ass_digest_time' ) )
		$ass_digest_time = array( 'hours' => '05', 'minutes' => '00' );

	if ( !$ass_weekly_digest = get_option( 'ass_weekly_digest' ) )
//		$ass_weekly_digest = 5; // friday
		$ass_weekly_digest = 0; // sunday

	$next = date( "r", wp_next_scheduled( 'ass_digest_event' ) );
	?>
	<div class="wrap">
		<h2><?php _e('Group Email Subscription Settings', 'bp-ass'); ?></h2>

		<form id="ass-admin-settings-form" method="post" action="admin.php?page=ass_admin_options">
		<?php wp_nonce_field( 'ass_admin_settings' ); ?>

		<h3><?php _e( 'Digests & Summaries', 'bp-ass' ) ?></h3>

		<p><b><a href="<?php bloginfo('url') ?>?sum=1" target="_blank"><?php _e('View queued digest items</a></b> (in new window)<br>As admin, you can see what is currently in the email queue by adding ?sum=1 to your url. This will not fire the digest, it will just show you what is waiting to be sent.', 'bp-ass') ?><br>
		</p>

		<p>
			<label for="ass_digest_time"><?php _e( '<strong>Daily Digests</strong> should be sent at this time:', 'bp-ass' ) ?> </label>
			<select name="ass_digest_time[hours]" id="ass_digest_time[hours]">
				<?php for( $i = 0; $i <= 23; $i++ ) : ?>
					<?php if ( $i < 10 ) $i = '0' . $i ?>
					<option value="<?php echo $i?>" <?php if ( $i == $ass_digest_time['hours'] ) : ?>selected="selected"<?php endif; ?>><?php echo $i ?></option>
				<?php endfor; ?>
			</select>

			<select name="ass_digest_time[minutes]" id="ass_digest_time[minutes]">
				<?php for( $i = 0; $i <= 55; $i += 5 ) : ?>
					<?php if ( $i < 10 ) $i = '0' . $i ?>
					<option value="<?php echo $i?>" <?php if ( $i == $ass_digest_time['minutes'] ) : ?>selected="selected"<?php endif; ?>><?php echo $i ?></option>
				<?php endfor; ?>
			</select>
		</p>

		<p>
			<label for="ass_weekly_digest"><?php _e( '<strong>Weekly Summaries</strong> should be sent on:', 'bp-ass' ) ?> </label>
			<select name="ass_weekly_digest" id="ass_weekly_digest">
				<?php /* disabling "no weekly digest" option for now because it will complicate the individual settings pages */ ?>
				<?php /* <option value="No weekly digest" <?php if ( 'No weekly digest' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'No weekly digest', 'bp-ass' ) ?></option> */ ?>
				<option value="1" <?php if ( '1' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Monday' ) ?></option>
				<option value="2" <?php if ( '2' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Tuesday' ) ?></option>
				<option value="3" <?php if ( '3' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Wednesday' ) ?></option>
				<option value="4" <?php if ( '4' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Thursday' ) ?></option>
				<option value="5" <?php if ( '5' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Friday' ) ?></option>
				<option value="6" <?php if ( '6' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Saturday' ) ?></option>
				<option value="0" <?php if ( '0' == $ass_weekly_digest ) : ?>selected="selected"<?php endif; ?>><?php _e( 'Sunday' ) ?></option>
			</select>
			<!-- (the summary will be sent one hour after the daily digests) -->
		</p>

		<p><i><?php $weekday = array( __("Sunday"), __("Monday"), __("Tuesday"), __("Wednesday"), __("Thursday"), __("Friday"), __("Saturday") ); echo sprintf( __( 'The server timezone is %s (%s); the current server time is %s (%s); and the day is %s.', 'bp-ass' ), date( 'T' ), date( 'e' ), date( 'g:ia' ), date( 'H:i' ), $weekday[date( 'w' )] ) ?></i>
		<br>
		<br>

		<h3><?php _e( 'Global Unsubscribe Link', 'bp-ass' ); ?></h3>
		<p><?php _e( 'Add a link in the emails and on the notifications settings page allowing users to unsubscribe from all their groups at once:', 'bp-ass' ); ?>
		<?php $global_unsubscribe_link = get_option( 'ass-global-unsubscribe-link' ); ?>
		<input<?php checked( $global_unsubscribe_link, 'yes' ); ?> type="radio" name="ass-global-unsubscribe-link" value="yes"> <?php _e( 'yes', 'bp-ass' ); ?> &nbsp;
		<input<?php checked( $global_unsubscribe_link, '' ); ?> type="radio" name="ass-global-unsubscribe-link" value=""> <?php _e( 'no', 'bp-ass' ); ?>
		<br />
		<br />


		<h3><?php _e('Group Admin Abilities', 'bp-ass'); ?></h3>
		<p><?php _e('Allow group admins and mods to change members\' email subscription settings: ', 'bp-ass'); ?>
		<?php $admins_can_edit_status = get_option('ass-admin-can-edit-email'); ?>
		<input type="radio" name="ass-admin-can-edit-email" value="yes" <?php if ( $admins_can_edit_status == 'yes' || !$admins_can_edit_status ) echo 'checked="checked"'; ?>> <?php _e('yes', 'bp-ass') ?> &nbsp;
		<input type="radio" name="ass-admin-can-edit-email" value="no" <?php if ( $admins_can_edit_status == 'no' ) echo 'checked="checked"'; ?>> <?php _e('no', 'bp-ass') ?>

		<p><?php _e('Allow group admins to override subscription settings and send an email to everyone in their group: ', 'bp-ass'); ?>
		<?php $admins_can_send_email = get_option('ass-admin-can-send-email'); ?>
		<input type="radio" name="ass-admin-can-send-email" value="yes" <?php if ( $admins_can_send_email == 'yes' || !$admins_can_send_email ) echo 'checked="checked"'; ?>> <?php _e('yes', 'bp-ass') ?> &nbsp;
		<input type="radio" name="ass-admin-can-send-email" value="no" <?php if ( $admins_can_send_email == 'no' ) echo 'checked="checked"'; ?>> <?php _e('no', 'bp-ass') ?>

		<br>
		<br>
		<h3><?php _e('Spam Prevention', 'bp-ass'); ?></h3>
			<p><?php _e('To help protect against spam, you may wish to require a user to have been a member of the site for a certain amount of days before any group updates are emailed to the other group members. This is disabled by default.', 'bp-ass'); ?> </p>
			<?php _e('Member must be registered for', 'bp-ass'); ?><input type="text" size="1" name="ass_registered_req" value="<?php echo get_option( 'ass_registered_req' ); ?>" style="text-align:center"/><?php _e('days', 'bp-ass'); ?></p>


			<p class="submit">
				<input type="submit" value="<?php _e('Save Settings', 'bp-ass') ?>" id="bp-admin-ass-submit" name="bp-admin-ass-submit" class="button-primary">
			</p>

		</form>

		<hr>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
		<?php echo sprintf( __('If you enjoy using this plugin %s please rate it %s.', 'bp-ass'), '<a href="http://wordpress.org/extend/plugins/buddypress-group-email-subscription/" target="_blank">', '</a>'); ?><br>
		<?php _e('Please make a donation to the team to support ongoing development.', 'bp-ass'); ?><br>
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="PXD76LU2VQ5AS">
		<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />

	</div>
	<?php
}


// save the back-end admin settings
function ass_update_dashboard_settings() {
	if ( !check_admin_referer( 'ass_admin_settings' ) )
		return;

	if ( !is_super_admin() )
		return;

	/* The daily digest time has been changed */
	if ( $_POST['ass_digest_time'] != get_option( 'ass_digest_time' ) )
		ass_set_daily_digest_time( $_POST['ass_digest_time']['hours'], $_POST['ass_digest_time']['minutes'] );

	/* The weekly digest day has been changed */
	if ( $_POST['ass_weekly_digest'] != get_option( 'ass_weekly_digest' ) )
		ass_set_weekly_digest_time( $_POST['ass_weekly_digest'] );

	if ( $_POST['ass-global-unsubscribe-link'] != get_option( 'ass-global-unsubscribe-link' ) )
		update_option( 'ass-global-unsubscribe-link', $_POST['ass-global-unsubscribe-link'] );

	if ( $_POST['ass-admin-can-edit-email'] != get_option( 'ass-admin-can-edit-email' ) )
		update_option( 'ass-admin-can-edit-email', $_POST['ass-admin-can-edit-email'] );

	if ( $_POST['ass-admin-can-send-email'] != get_option( 'ass-admin-can-send-email' ) )
		update_option( 'ass-admin-can-send-email', $_POST['ass-admin-can-send-email'] );

	if ( $_POST['ass_registered_req'] != get_option( 'ass_registered_req' ) )
		update_option( 'ass_registered_req', $_POST['ass_registered_req'] );

	return true;
	//echo '<pre>'; print_r( $_POST ); echo '</pre>';
}



function ass_weekly_digest_week() {
	$ass_weekly_digest = get_option( 'ass_weekly_digest' );
	if ( $ass_weekly_digest == 1 )
		return __('Monday' );
	elseif ( $ass_weekly_digest == 2 )
		return __('Tuesday' );
	elseif ( $ass_weekly_digest == 3 )
		return __('Wednesday' );
	elseif ( $ass_weekly_digest == 4 )
		return __('Thursday' );
	elseif ( $ass_weekly_digest == 5 )
		return __('Friday' );
	elseif ( $ass_weekly_digest == 6 )
		return __('Saturday' );
	elseif ( $ass_weekly_digest == 0 )
		return __('Sunday' );
}

function ass_testing_func() {
	//echo '<pre>'; print_r( wp_get_schedules() ); echo '</pre>';
}
//add_action('bp_before_container','ass_testing_func');
add_action('bp_after_container','ass_testing_func');

