<?php

require( BP_INVITE_ANYONE_DIR . 'by-email/by-email-db.php' );
require( BP_INVITE_ANYONE_DIR . 'widgets/widgets.php' );
require( BP_INVITE_ANYONE_DIR . 'by-email/cloudsponge-integration.php' );

// Temporary function until bp_is_active is fully integrated
function invite_anyone_are_groups_running() {
	if ( function_exists( 'groups_install' ) )
		return true;

	if ( function_exists( 'bp_is_active' ) ) {
		if ( bp_is_active( 'groups' ) )
			return true;
	}

	return false;
}

function invite_anyone_add_by_email_css() {
	global $bp;

	if ( $bp->current_component == BP_INVITE_ANYONE_SLUG ) {
   		$style_url = WP_PLUGIN_URL . '/invite-anyone/by-email/by-email-css.css';
        $style_file = WP_PLUGIN_DIR . '/invite-anyone/by-email/by-email-css.css';
        if (file_exists($style_file)) {
            wp_register_style('invite-anyone-by-email-style', $style_url);
            wp_enqueue_style('invite-anyone-by-email-style');
        }
    }
}
add_action( 'wp_print_styles', 'invite_anyone_add_by_email_css' );

function invite_anyone_add_by_email_js() {
	global $bp;

	if ( $bp->current_component == BP_INVITE_ANYONE_SLUG ) {
   		$style_url = WP_PLUGIN_URL . '/invite-anyone/by-email/by-email-js.js';
        $style_file = WP_PLUGIN_DIR . '/invite-anyone/by-email/by-email-js.js';
        if (file_exists($style_file)) {
            wp_register_script('invite-anyone-by-email-scripts', $style_url);
            wp_enqueue_script('invite-anyone-by-email-scripts');
        }
    }
}
add_action( 'wp_print_scripts', 'invite_anyone_add_by_email_js' );

function invite_anyone_setup_globals() {
	global $bp, $wpdb;

	if ( !isset( $bp->invite_anyone ) ) {
		$bp->invite_anyone = new stdClass;
	}

	$bp->invite_anyone->id = 'invite_anyone';

	$bp->invite_anyone->table_name = $wpdb->base_prefix . 'bp_invite_anyone';
	$bp->invite_anyone->slug = 'invite-anyone';

	/* Register this in the active components array */
	$bp->active_components[$bp->invite_anyone->slug] = $bp->invite_anyone->id;
}
add_action( 'bp_setup_globals', 'invite_anyone_setup_globals', 2 );


function invite_anyone_opt_out_screen() {
	global $bp;

	if ( isset( $_POST['oops_submit'] ) ) {
		bp_core_redirect( site_url( BP_REGISTER_SLUG ) . '/accept-invitation/' . urlencode( $_POST['opt_out_email'] ) );
	}

	$opt_out_button_text 	= __( 'Opt Out', 'bp-invite-anyone' );
	$oops_button_text 	= __( 'Accept Invitation', 'bp-invite-anyone' );

	$sitename 		= get_bloginfo( 'name' );

	$opt_out_message 	= sprintf( __( 'To opt out of future invitations to %s, make sure that your email is entered in the field below and click "Opt Out".', 'bp-invite-anyone' ), $sitename );

	$oops_message 		= sprintf( __( 'If you are here by mistake and would like to accept your invitation to %s, click "Accept Invitation" instead.', 'bp-invite-anyone' ), $sitename );

	if ( $bp->current_component == BP_REGISTER_SLUG && $bp->current_action == 'opt-out' ) {
		get_header();
?>
		<div id="content">
		<div class="padder">
		<?php if ( $bp->action_variables[1] == 'submit' ) : ?>
			<?php if ( $_POST['opt_out_submit'] == $opt_out_button_text && $email = urldecode( $_POST['opt_out_email'] ) ) : ?>

				<?php check_admin_referer( 'invite_anyone_opt_out' ) ?>

				<?php if ( invite_anyone_mark_as_opt_out( $email ) ) : ?>
					<?php $opted_out_message = __( 'You have successfully opted out. No more invitation emails will be sent to you by this site.', 'bp-invite-anyone' ) ?>
					<p><?php echo $opted_out_message ?></p>
				<?php else : ?>
					<p><?php _e( 'Sorry, there was an error in processing your request', 'bp-invite-anyone' ) ?></p>
				<?php endif; ?>
			<?php else : ?>
				<?php /* I guess this should be some sort of error message? */ ?>
			<?php endif; ?>

		<?php else : ?>
			<?php if ( $email = $bp->action_variables[0] ) : ?>
				<script type="text/javascript">
				jQuery(document).ready( function() {
					jQuery("input#opt_out_email").val("<?php echo urldecode($email) ?>");
				});
				</script>
			<?php endif; ?>

			<form action="<?php echo $email ?>/submit" method="post">

				<?php do_action( 'invite_anyone_before_optout_messages' ) ?>

				<p><?php echo $opt_out_message ?></p>

				<p><?php echo $oops_message ?></p>

				<?php do_action( 'invite_anyone_after_optout_messages' ) ?>

				<?php wp_nonce_field( 'invite_anyone_opt_out' ) ?>
				<p><?php _e( 'Email:', 'bp-invite-anyone' ) ?> <input type="text" id="opt_out_email" name="opt_out_email" size="50" /></p>

				<p><input type="submit" name="opt_out_submit" value="<?php echo $opt_out_button_text ?>" /> <input type="submit" name="oops_submit" value="<?php echo $oops_button_text ?>" />
				</p>

			</form>
		<?php endif; ?>
		</div>
		</div>
<?php
		get_footer();
		die();

	}
}
add_action( 'wp', 'invite_anyone_opt_out_screen', 1 );


function invite_anyone_register_screen_message() {
	global $bp;
?>
	<?php if ( isset( $bp->current_action ) && $bp->current_action == 'accept-invitation' && empty( $bp->action_variables[0] ) ) : ?>
		<div id="message" class="error"><p><?php _e( "It looks like you're trying to accept an invitation to join the site, but some information is missing. Please try again by clicking on the link in the invitation email.", 'bp-invite-anyone' ) ?></p></div>
	<?php endif; ?>

	<?php if ( $bp->signup->step == 'request-details' && $bp->current_action == 'accept-invitation' && $email = urldecode( $bp->action_variables[0] ) ) : ?>

		<?php do_action( 'accept_email_invite_before' ) ?>

		<script type="text/javascript">
		jQuery(document).ready( function() {
			jQuery("input#signup_email").val("<?php echo $email ?>");
		});

		</script>


		<?php
			$ia_obj = invite_anyone_get_invitations_by_invited_email( $email );

			$inviters = array();
			if ( $ia_obj->have_posts() ) {
				while ( $ia_obj->have_posts() ) {
					$ia_obj->the_post();
					$inviters[] = get_the_author_meta( 'ID' );
				}
			}
			$inviters = array_unique( $inviters );

			$inviters_names = array();
			foreach ( $inviters as $inviter ) {
				$inviters_names[] = bp_core_get_user_displayname( $inviters[0] );
			}

			if ( ! empty( $inviters_names ) ) {
				$message = sprintf( _n( 'Welcome! You&#8217;ve been invited to join the site by the following user: %s. Please fill out the information below to create your account.', 'Welcome! You&#8217;ve been invited to join the site by the following users: %s. Please fill out the information below to create your account.', count( $inviters_names ), 'bp-invite-anyone' ), implode( ', ', $inviters_names ) );
			} else {
				$message = __( 'Welcome! You&#8217;ve been invited to join the site. Please fill out the information below to create your account.', 'bp-invite-anyone' );
			}

			echo '<div id="message" class="success"><p>' . esc_html( $message ) . '</p></div>';

		?>

	<?php endif; ?>
<?php
}
add_action( 'bp_before_register_page', 'invite_anyone_register_screen_message' );


function invite_anyone_activate_user( $user_id, $key, $user ) {
	global $bp;

	$email = bp_core_get_user_email( $user_id );

	$inviters 	= array();

	// Fire the query
	$invites = invite_anyone_get_invitations_by_invited_email( $email );

	if ( $invites->have_posts() ) {
		// From the posts returned by the query, get a list of unique inviters
		$groups		= array();
		while ( $invites->have_posts() ) {
			$invites->the_post();

			$inviter_id	= get_the_author_meta( 'ID' );
			$inviters[] 	= $inviter_id;

			$groups_data	= wp_get_post_terms( get_the_ID(), invite_anyone_get_invited_groups_tax_name() );
			foreach ( $groups_data as $group_data ) {
				if ( !isset( $groups[$group_data->name] ) ) {
					// Keyed by inviter, which means they'll only get one invite per group
					$groups[$group_data->name] = $inviter_id;
				}
			}

			// Mark as accepted
			update_post_meta( get_the_ID(), 'bp_ia_accepted', date( 'Y-m-d H:i:s' ) );
		}

		$inviters 	= array_unique( $inviters );

		// Friendship requests
		if ( bp_is_active( 'friends' ) && apply_filters( 'invite_anyone_send_friend_requests_on_acceptance', true ) ) {
			if ( function_exists( 'friends_add_friend' ) ) {
				foreach ( $inviters as $inviter ) {
					friends_add_friend( $inviter, $user_id );
				}
			}
		}

		// BuddyPress Followers support
		if ( function_exists( 'bp_follow_start_following' ) && apply_filters( 'invite_anyone_send_follow_requests_on_acceptance', true ) ) {
			foreach ( $inviters as $inviter ) {
				bp_follow_start_following( array( 'leader_id' => $user_id, 'follower_id' => $inviter ) );
				bp_follow_start_following( array( 'leader_id' => $inviter, 'follower_id' => $user_id ) );
			}
		}

		// Group invitations
		if ( bp_is_active( 'groups' ) ) {
			foreach ( $groups as $group_id => $inviter_id ) {
				$args = array(
					'user_id' => $user_id,
					'group_id' => $group_id,
					'inviter_id' => $inviter_id
				);

				groups_invite_user( $args );
				groups_send_invites( $inviter_id, $group_id );
			}
		}
	}

	do_action( 'accepted_email_invite', $user_id, $inviters );
}
add_action( 'bp_core_activated_user', 'invite_anyone_activate_user', 10, 3 );

function invite_anyone_setup_nav() {
	global $bp;

	if ( !invite_anyone_access_test() )
		return;

	/* Add 'Send Invites' to the main user profile navigation */
	bp_core_new_nav_item( array(
		'name' => __( 'Send Invites', 'buddypress' ),
		'slug' => $bp->invite_anyone->slug,
		'position' => 80,
		'screen_function' => 'invite_anyone_screen_one',
		'default_subnav_slug' => 'invite-new-members',
		'show_for_displayed_user' => invite_anyone_access_test()
	) );

	$invite_anyone_link = $bp->loggedin_user->domain . $bp->invite_anyone->slug . '/';

	/* Create two sub nav items for this component */
	bp_core_new_subnav_item( array(
		'name' => __( 'Invite New Members', 'bp-invite-anyone' ),
		'slug' => 'invite-new-members',
		'parent_slug' => $bp->invite_anyone->slug,
		'parent_url' => $invite_anyone_link,
		'screen_function' => 'invite_anyone_screen_one',
		'position' => 10,
		'user_has_access' => invite_anyone_access_test()
	) );

	bp_core_new_subnav_item( array(
		'name' => __( 'Sent Invites', 'bp-invite-anyone' ),
		'slug' => 'sent-invites',
		'parent_slug' => $bp->invite_anyone->slug,
		'parent_url' => $invite_anyone_link,
		'screen_function' => 'invite_anyone_screen_two',
		'position' => 20,
		'user_has_access' => invite_anyone_access_test()
	) );
}
add_action( 'bp_setup_nav', 'invite_anyone_setup_nav' );

function invite_anyone_access_test() {
	global $current_user, $bp;

	if ( !is_user_logged_in() )
		return false;

	// The site admin can see all
	if ( current_user_can( 'bp_moderate' ) ) {
		return true;
	}

	if ( bp_displayed_user_id() && !bp_is_my_profile() )
		return false;

	$iaoptions = invite_anyone_options();

	/* This is the last of the general checks: logged in, looking at own profile, and finally admin has set to "All Users".*/
	if ( isset( $iaoptions['email_visibility_toggle'] ) && $iaoptions['email_visibility_toggle'] == 'no_limit' )
		return true;

	/* Minimum number of days since joined the site */
	if ( isset( $iaoptions['email_since_toggle'] ) && $iaoptions['email_since_toggle'] == 'yes' ) {
		if ( isset( $iaoptions['days_since'] ) && $since = $iaoptions['days_since'] ) {
			$since = $since * 86400;

			$date_registered = strtotime($current_user->data->user_registered);
			$time = time();

			if ( $time - $date_registered < $since )
				return false;
		}
	}

	/* Minimum role on this blog. Users who are at the necessary role or higher should move right through this toward the 'return true' at the end of the function. */
	if ( isset( $iaoptions['email_role_toggle'] ) && $iaoptions['email_role_toggle'] == 'yes' ) {
		if ( isset( $iaoptions['minimum_role'] ) && $role = $iaoptions['minimum_role'] ) {
			switch ( $role ) {
				case 'Subscriber' :
					if ( !current_user_can( 'read' ) )
						return false;
					break;

				case 'Contributor' :
					if ( !current_user_can( 'edit_posts' ) )
						return false;
					break;

				case 'Author' :
					if ( !current_user_can( 'publish_posts' ) )
						return false;
					break;

				case 'Editor' :
					if ( !current_user_can( 'delete_others_pages' ) )
						return false;
					break;

				case 'Administrator' :
					if ( !current_user_can( 'switch_themes' ) )
						return false;
					break;
			}
		}
	}

	/* User blacklist */
	if ( isset( $iaoptions['email_blacklist_toggle'] ) && $iaoptions['email_blacklist_toggle'] == 'yes' ) {
		if ( isset( $iaoptions['email_blacklist'] ) ) {
			$blacklist = explode( ",", $iaoptions['email_blacklist'] );
			$user_id = $current_user->ID;
			if ( in_array( $user_id, $blacklist ) )
				return false;
		}
	}

	return true;

}
add_action( 'wp_head', 'invite_anyone_access_test' );

/**
 * Catch and process email sends.
 *
 * @since 1.1.0
 */
function invite_anyone_catch_send() {
	global $bp;

	if ( ! bp_is_current_component( $bp->invite_anyone->slug ) ) {
		return;
	}

	if ( ! bp_is_current_action( 'sent-invites' ) ) {
		return;
	}

	if ( ! bp_is_action_variable( 'send', 0 ) ) {
		return;
	}

	if ( ! invite_anyone_process_invitations( $_POST ) ) {
		bp_core_add_message( __( 'Sorry, there was a problem sending your invitations. Please try again.', 'bp-invite-anyone' ), 'error' );
	}

	bp_core_redirect( bp_displayed_user_domain() . $bp->invite_anyone->slug . '/sent-invites' );
}
add_action( 'wp', 'invite_anyone_catch_send' );

function invite_anyone_catch_clear() {
	global $bp;

	$returned_data = isset( $_COOKIE['invite-anyone'] ) ? unserialize( stripslashes( $_COOKIE['invite-anyone'] ) ) : '';
	if ( $returned_data ) {
		// We'll take a moment nice and early in the loading process to get returned_data
		$keys = array(
			'error_message',
			'error_emails',
			'subject',
			'message',
			'groups',
		);

		foreach ( $keys as $key ) {
			$bp->invite_anyone->returned_data[ $key ] = null;
			if ( isset( $returned_data[ $key ] ) ) {
				$value = stripslashes_deep( $returned_data[ $key ] );
				$bp->invite_anyone->returned_data[ $key ] = $value;
			}
		}
	}
	@setcookie( 'invite-anyone', '', time() - 3600, '/' );

	if ( isset( $_GET['clear'] ) ) {
		$clear_id = $_GET['clear'];

		$inviter_id = bp_loggedin_user_id();

		check_admin_referer( 'invite_anyone_clear' );

		if ( (int)$clear_id ) {
			if ( invite_anyone_clear_sent_invite( array( 'inviter_id' => $inviter_id, 'clear_id' => $clear_id ) ) )
				bp_core_add_message( __( 'Invitation cleared', 'bp-invite-anyone' ) );
			else
				bp_core_add_message( __( 'There was a problem clearing the invitation.', 'bp-invite-anyone' ), 'error' );
		} else {
			if ( invite_anyone_clear_sent_invite( array( 'inviter_id' => $inviter_id, 'type' => $clear_id ) ) )
				bp_core_add_message( __( 'Invitations cleared.', 'bp-invite-anyone' ) );
			else
				bp_core_add_message( __( 'There was a problem clearing the invitations.', 'bp-invite-anyone' ), 'error' );
		}

		bp_core_redirect( $bp->displayed_user->domain . $bp->invite_anyone->slug . '/sent-invites/' );
	}
}
add_action( 'bp_template_redirect', 'invite_anyone_catch_clear', 5 );

function invite_anyone_screen_one() {
	global $bp;

	/*
	print "<pre>";
	print_r($bp);
	*/

	/* Add a do action here, so your component can be extended by others. */
	do_action( 'invite_anyone_screen_one' );

	/* bp_template_title ought to be used - bp-default needs to markup the template tag
	and run a conditional check on template tag true to hide empty element markup or not
	add_action( 'bp_template_title', 'invite_anyone_screen_one_title' );
	*/
	add_action( 'bp_template_content', 'invite_anyone_screen_one_content' );

	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

/*
function invite_anyone_screen_one_title() {

	 _e( 'Invite New Members', 'bp-invite-anyone' );

	}
*/

function invite_anyone_screen_one_content() {
	global $bp;

	$iaoptions = invite_anyone_options();

	// Hack - catch already=accepted
	if ( ! empty( $_GET['already'] ) && 'accepted' === $_GET['already'] && bp_is_my_profile() ) {
		_e( 'It looks like you&#8217;ve already accepted your invitation to join the site.', 'invite-anyone' );
		return;
	}

	// If the user has maxed out his invites, no need to go on
	if ( !empty( $iaoptions['email_limit_invites_toggle'] ) && $iaoptions['email_limit_invites_toggle'] == 'yes' && !current_user_can( 'delete_others_pages' ) ) {
		$sent_invites       = invite_anyone_get_invitations_by_inviter_id( bp_displayed_user_id() );
		$sent_invites_count  = $sent_invites->post_count;
		if ( $sent_invites_count >= $iaoptions['limit_invites_per_user'] ) : ?>

			<h4><?php _e( 'Invite New Members', 'bp-invite-anyone' ); ?></h4>

			<p id="welcome-message"><?php _e( 'You have sent the maximum allowed number of invitations.', 'bp-invite-anyone' ); ?></em></p>

			<?php return;
		endif;
	}

	if ( !$max_invites = $iaoptions['max_invites'] )
		$max_invites = 5;

	$from_group = false;
	if ( !empty( $bp->action_variables ) ) {
		if ( 'group-invites' == $bp->action_variables[0] )
			$from_group = $bp->action_variables[1];
	}

	$returned_data = !empty( $bp->invite_anyone->returned_data ) ? $bp->invite_anyone->returned_data : false;

	/* If the user is coming from the widget, $returned_emails is populated with those email addresses */
	if ( isset( $_POST['invite_anyone_widget'] ) ) {
		check_admin_referer( 'invite-anyone-widget_' . $bp->loggedin_user->id );

		if ( !empty( $_POST['invite_anyone_email_addresses'] ) ) {
			$returned_data['error_emails'] = invite_anyone_parse_addresses( $_POST['invite_anyone_email_addresses'] );
		}

		/* If the widget appeared on a group page, the group ID should come along with it too */
		if ( isset( $_POST['invite_anyone_widget_group'] ) )
			$returned_data['groups'] = $_POST['invite_anyone_widget_group'];

	}

	// $returned_groups is padded so that array_search (below) returns true for first group */

	$counter = 0;
	$returned_groups = array( 0 );
	if ( ! empty( $returned_data['groups'] ) ) {
		foreach( $returned_data['groups'] as $group_id ) {
			$returned_groups[] = $group_id;
		}
	}

	// Get the returned email subject, if there is one
	$returned_subject = ! empty( $returned_data['subject'] ) ? stripslashes( $returned_data['subject'] ) : false;

	// Get the returned email message, if there is one
	$returned_message = ! empty( $returned_data['message'] ) ? stripslashes( $returned_data['message'] ) : false;

	if ( ! empty( $returned_data['error_message'] ) ) {
		?>
		<div class="invite-anyone-error error">
			<p><?php _e( "Some of your invitations were not sent. Please see the errors below and resubmit the failed invitations.", 'bp-invite-anyone' ) ?></p>
		</div>
		<?php
	}

	$blogname = get_bloginfo('name');
	$welcome_message = sprintf( __( 'Invite friends to join %s by following these steps:', 'bp-invite-anyone' ), $blogname );

  ?>
	<form id="invite-anyone-by-email" action="<?php echo $bp->displayed_user->domain . $bp->invite_anyone->slug . '/sent-invites/send/' ?>" method="post">

	<h4><?php _e( 'Invite New Members', 'bp-invite-anyone' ); ?></h4>

	<?php

	if ( isset( $iaoptions['email_limit_invites_toggle'] ) && $iaoptions['email_limit_invites_toggle'] == 'yes' && !current_user_can( 'delete_others_pages' ) ) {
		if ( !isset( $sent_invites ) ) {
			$sent_invites = invite_anyone_get_invitations_by_inviter_id( bp_loggedin_user_id() );
			$sent_invites_count = $sent_invites->post_count;
		}

		$limit_invite_count = (int) $iaoptions['limit_invites_per_user'] - (int) $sent_invites_count;

		if ( $limit_invite_count < 0 ) {
			$limit_invite_count = 0;
		}

		?>

		<p class="description"><?php printf( __( 'The site administrator has limited each user to %1$d invitations. You have %2$d invitations remaining.', 'bp-invite-anyone' ), (int) $iaoptions['limit_invites_per_user'], (int) $limit_invite_count ) ?></p>

		<?php
	}
	?>

	<p id="welcome-message"><?php echo $welcome_message ?></p>

	<ol id="invite-anyone-steps">

		<li>
			<?php if ( ! empty( $returned_data['error_message'] ) ) : ?>
				<div class="invite-anyone-error error">
					<p><?php echo $returned_data['error_message'] ?></p>
				</div>
			<?php endif ?>

			<div class="manual-email">
				<p>
					<?php _e( 'Enter email addresses below, one per line.', 'bp-invite-anyone' ) ?>
					<?php if( invite_anyone_allowed_domains() ) : ?> <?php _e( 'You can only invite people whose email addresses end in one of the following domains:', 'bp-invite-anyone' ) ?> <?php echo invite_anyone_allowed_domains(); ?><?php endif; ?>
				</p>

				<?php if ( false !== $max_no_invites = invite_anyone_max_invites() ) : ?>
					<p class="description"><?php printf( __( 'You can invite a maximum of %s people at a time.', 'bp-invite-anyone' ), $max_no_invites ) ?></p>
				<?php endif ?>
				<?php invite_anyone_email_fields( $returned_data['error_emails'] ) ?>
			</div>

			<?php /* invite_anyone_after_addresses gets $iaoptions so that Cloudsponge etc can tell whether certain components are activated, without an additional lookup */ ?>
			<?php do_action( 'invite_anyone_after_addresses', $iaoptions ) ?>

		</li>

		<li>
			<?php if ( $iaoptions['subject_is_customizable'] == 'yes' ) : ?>
				<label for="invite-anyone-custom-subject"><?php _e( '(optional) Customize the subject line of the invitation email.', 'bp-invite-anyone' ) ?></label>
					<textarea name="invite_anyone_custom_subject" id="invite-anyone-custom-subject" rows="15" cols="10" ><?php echo invite_anyone_invitation_subject( $returned_subject ) ?></textarea>
			<?php else : ?>
				<label for="invite-anyone-custom-subject"><?php _e( 'Subject: <span class="disabled-subject">Subject line is fixed</span>', 'bp-invite-anyone' ) ?></label>
					<textarea name="invite_anyone_custom_subject" id="invite-anyone-custom-subject" rows="15" cols="10" disabled="disabled"><?php echo invite_anyone_invitation_subject( $returned_subject ) ?> </textarea>

				<input type="hidden" id="invite-anyone-customised-subject" name="invite_anyone_custom_subject" value="<?php echo invite_anyone_invitation_subject() ?>" />
			<?php endif; ?>
		</li>

		<li>
			<?php if ( $iaoptions['message_is_customizable'] == 'yes' ) : ?>
				<label for="invite-anyone-custom-message"><?php _e( '(optional) Customize the text of the invitation.', 'bp-invite-anyone' ) ?></label>
				<p class="description"><?php _e( 'The message will also contain a custom footer containing links to accept the invitation or opt out of further email invitations from this site.', 'bp-invite-anyone' ) ?></p>
					<textarea name="invite_anyone_custom_message" id="invite-anyone-custom-message" cols="40" rows="10"><?php echo invite_anyone_invitation_message( $returned_message ) ?></textarea>
			<?php else : ?>
				<label for="invite-anyone-custom-message"><?php _e( 'Message:', 'bp-invite-anyone' ) ?></label>
					<textarea name="invite_anyone_custom_message" id="invite-anyone-custom-message" disabled="disabled"><?php echo invite_anyone_invitation_message( $returned_message ) ?></textarea>

				<input type="hidden" name="invite_anyone_custom_message" value="<?php echo invite_anyone_invitation_message() ?>" />
			<?php endif; ?>

		</li>

		<?php if ( invite_anyone_are_groups_running() ) : ?>
			<?php if ( $iaoptions['can_send_group_invites_email'] == 'yes' && bp_has_groups( "per_page=10000&type=alphabetical&user_id=" . bp_loggedin_user_id() ) ) : ?>
			<li>
				<p><?php _e( '(optional) Select some groups. Invitees will receive invitations to these groups when they join the site.', 'bp-invite-anyone' ) ?></p>
				<ul id="invite-anyone-group-list">
					<?php while ( bp_groups() ) : bp_the_group(); ?>
						<?php

						// Enforce per-group invitation settings
						if ( ! bp_groups_user_can_send_invites( bp_get_group_id() ) || 'anyone' !== invite_anyone_group_invite_access_test( bp_get_group_id() ) ) {
							continue;
						}

						?>
						<li>
						<input type="checkbox" name="invite_anyone_groups[]" id="invite_anyone_groups-<?php bp_group_id() ?>" value="<?php bp_group_id() ?>" <?php if ( $from_group == bp_get_group_id() || array_search( bp_get_group_id(), $returned_groups) ) : ?>checked<?php endif; ?> />

						<label for="invite_anyone_groups-<?php bp_group_id() ?>" class="invite-anyone-group-name"><?php bp_group_avatar_mini() ?> <span><?php bp_group_name() ?></span></label>

						</li>
					<?php endwhile; ?>

				</ul>
			</li>
			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'invite_anyone_addl_fields' ) ?>

	</ol>

	<div class="submit">
		<input type="submit" name="invite-anyone-submit" id="invite-anyone-submit" value="<?php _e( 'Send Invites', 'buddypress' ) ?> " />
	</div>


	</form>
	<?php
}

/**
 * invite_anyone_screen_two()
 *
 */
function invite_anyone_screen_two() {
	global $bp;

	do_action( 'invite_anyone_sent_invites_screen' );

	/* bp_template_title ought to be used - bp-default needs to markup the template tag
	and run a conditional check on template tag true to hide empty element markup or not
	add_action( 'bp_template_title', 'invite_anyone_screen_two_title' );
	*/

	add_action( 'bp_template_content', 'invite_anyone_screen_two_content' );

	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
/*
  function invite_anyone_screen_two_title() {
	 _e( 'Sent Invites', 'bp-invite-anyone' );
  }
*/

	function invite_anyone_screen_two_content() {
		global $bp;

		// Load the pagination helper
		if ( !class_exists( 'BBG_CPT_Pag' ) )
			require_once( BP_INVITE_ANYONE_DIR . 'lib/bbg-cpt-pag.php' );
		$pagination = new BBG_CPT_Pag;

		$inviter_id = bp_loggedin_user_id();

		if ( isset( $_GET['sort_by'] ) )
			$sort_by = $_GET['sort_by'];
		else
			$sort_by = 'date_invited';

		if ( isset( $_GET['order'] ) )
			$order = $_GET['order'];
		else
			$order = 'DESC';

		$base_url = $bp->displayed_user->domain . $bp->invite_anyone->slug . '/sent-invites/';

		?>

		<h4><?php _e( 'Sent Invites', 'bp-invite-anyone' ); ?></h4>

		<?php $invites = invite_anyone_get_invitations_by_inviter_id( bp_loggedin_user_id(), $sort_by, $order, $pagination->get_per_page, $pagination->get_paged ) ?>

		<?php $pagination->setup_query( $invites ) ?>

		<?php if ( $invites->have_posts() ) : ?>
			<p id="sent-invites-intro"><?php _e( 'You have sent invitations to the following people.', 'bp-invite-anyone' ) ?></p>

			<div class="ia-pagination">
				<div class="currently-viewing">
					<?php $pagination->currently_viewing_text() ?>
				</div>

				<div class="pag-links">
					<?php $pagination->paginate_links() ?>
				</div>
			</div>

			<table class="invite-anyone-sent-invites zebra"
			summary="<?php _e( 'This table displays a list of all your sent invites.
			Invites that have been accepted are highlighted in the listings.
			You may clear any individual invites, all accepted invites or all of the invites from the list.', 'bp-invite-anyone' ) ?>">
				<thead>
					<tr>
					  <th scope="col"></th>
					  <th scope="col" <?php if ( $sort_by == 'email' ) : ?>class="sort-by-me"<?php endif ?>><a class="<?php echo $order ?>" title="Sort column order <?php echo $order ?>" href="<?php echo $base_url ?>?sort_by=email&amp;order=<?php if ( $sort_by == 'email' && $order == 'ASC' ) : ?>DESC<?php else : ?>ASC<?php endif; ?>"><?php _e( 'Invited email address', 'bp-invite-anyone' ) ?></a></th>
					  <th scope="col"><?php _e( 'Group invitations', 'bp-invite-anyone' ) ?></th>
					  <th scope="col" <?php if ( $sort_by == 'date_invited' ) : ?>class="sort-by-me"<?php endif ?>><a class="<?php echo $order ?>" title="Sort column order <?php echo $order ?>" href="<?php echo $base_url ?>?sort_by=date_invited&amp;order=<?php if ( $sort_by == 'date_invited' && $order == 'DESC' ) : ?>ASC<?php else : ?>DESC<?php endif; ?>"><?php _e( 'Sent', 'bp-invite-anyone' ) ?></a></th>
					  <th scope="col" <?php if ( $sort_by == 'date_joined' ) : ?>class="sort-by-me"<?php endif ?>><a class="<?php echo $order ?>" title="Sort column order <?php echo $order ?>" href="<?php echo $base_url ?>?sort_by=date_joined&amp;order=<?php if ( $order == 'DESC' ) : ?>ASC<?php else : ?>DESC<?php endif; ?>"><?php _e( 'Accepted', 'bp-invite-anyone' ) ?></a></th>
					</tr>
				</thead>

				<tfoot>
				<tr id="batch-clear">
				  <td colspan="5" >
				   <ul id="invite-anyone-clear-links">
				      <li> <a title="<?php _e( 'Clear all accepted invites from the list', 'bp-invite-anyone' ) ?>" class="confirm" href="<?php echo wp_nonce_url( $base_url . '?clear=accepted', 'invite_anyone_clear' ) ?>"><?php _e( 'Clear all accepted invitations', 'bp-invite-anyone' ) ?></a></li>
				      <li class="last"><a title="<?php _e( 'Clear all your listed invites', 'bp-invite-anyone' ) ?>" class="confirm" href="<?php echo wp_nonce_url( $base_url . '?clear=all', 'invite_anyone_clear' ) ?>"><?php _e( 'Clear all invitations', 'bp-invite-anyone' ) ?></a></li>
				  </ul>
				 </td>
				</tr>
				</tfoot>

				<tbody>
				<?php while ( $invites->have_posts() ) : $invites->the_post() ?>

				<?php
					$emails = wp_get_post_terms( get_the_ID(), invite_anyone_get_invitee_tax_name() );

					// Should never happen, but was messing up my test env
					if ( empty( $emails ) ) {
						continue;
					}

					// Before storing taxonomy terms in the db, we replaced "+" with ".PLUSSIGN.", so we need to reverse that before displaying the email address.
					$email	= str_replace( '.PLUSSIGN.', '+', $emails[0]->name );

					$post_id = get_the_ID();

					$query_string = preg_replace( "|clear=[0-9]+|", '', $_SERVER['QUERY_STRING'] );

					$clear_url = ( $query_string ) ? $base_url . '?' . $query_string . '&clear=' . $post_id : $base_url . '?clear=' . $post_id;
					$clear_url = wp_nonce_url( $clear_url, 'invite_anyone_clear' );
					$clear_link = '<a class="clear-entry confirm" title="' . __( 'Clear this invitation', 'bp-invite-anyone' ) . '" href="' . $clear_url . '">x<span></span></a>';

					$groups = wp_get_post_terms( get_the_ID(), invite_anyone_get_invited_groups_tax_name() );
					if ( !empty( $groups ) ) {
						$group_names = '<ul>';
						foreach( $groups as $group_term ) {
							$group = new BP_Groups_Group( $group_term->name );
							$group_names .= '<li>' . bp_get_group_name( $group ) . '</li>';
						}
						$group_names .= '</ul>';
					} else {
						$group_names = '-';
					}

					global $post;

					$date_invited = invite_anyone_format_date( $post->post_date );

					$accepted = get_post_meta( get_the_ID(), 'bp_ia_accepted', true );

					if ( $accepted ):
						$date_joined = invite_anyone_format_date( $accepted );
						$accepted = true;
					else:
						$date_joined = '-';
						$accepted = false;
					endif;

					?>

					<tr <?php if($accepted){ ?> class="accepted" <?php } ?>>
						<td><?php echo $clear_link ?></td>
						<td><?php echo esc_html( $email ) ?></td>
						<td><?php echo $group_names ?></td>
						<td><?php echo $date_invited ?></td>
						<td class="date-joined"><span></span><?php echo $date_joined ?></td>
					</tr>
				<?php endwhile ?>
			 </tbody>
			</table>

			<div class="ia-pagination">
				<div class="currently-viewing">
					<?php $pagination->currently_viewing_text() ?>
				</div>

				<div class="pag-links">
					<?php $pagination->paginate_links() ?>
				</div>
			</div>


		<?php else : ?>

		<p id="sent-invites-intro"><?php _e( "You haven't sent any email invitations yet.", 'bp-invite-anyone' ) ?></p>

		<?php endif; ?>
	<?php
	}

/**
 * Displays the field where email addresses are entered on the Send Invites page
 *
 * In version 0.8, this field was changed to be a textarea rather than individual fields.
 *
 * @package Invite Anyone
 *
 * @param array $returned_emails Optional. Emails returned because of a processing error
 */
function invite_anyone_email_fields( $returned_emails = false ) {
	if ( is_array( $returned_emails ) )
		$returned_emails = implode( "\n", $returned_emails );
?>
	<textarea name="invite_anyone_email_addresses" class="invite-anyone-email-addresses" id="invite-anyone-email-addresses"><?php echo $returned_emails ?></textarea>
<?php
}


function invite_anyone_invitation_subject( $returned_message = false ) {
	global $bp;

	if ( !$returned_message ) {
		$site_name = get_bloginfo('name');

		$iaoptions = invite_anyone_options();

		if ( empty( $iaoptions['default_invitation_subject'] ) ) {
			$text = sprintf( __( 'An invitation to join the %s community.', 'bp-invite-anyone' ), $site_name );
		} else {
			$text = $iaoptions['default_invitation_subject'];
		}

		if ( !is_admin() ) {
			$text = invite_anyone_wildcard_replace( $text );
		}
	} else {
		$text = $returned_message;
	}

	return stripslashes( $text );
}

function invite_anyone_invitation_message( $returned_message = false ) {
	global $bp;

	if ( !$returned_message ) {
		$inviter_name = $bp->loggedin_user->userdata->display_name;
		$blogname = get_bloginfo('name');

		$iaoptions = invite_anyone_options();

		if ( empty( $iaoptions['default_invitation_message'] ) ) {
			$text = sprintf( __( 'You have been invited by %%INVITERNAME%% to join the %s community.

Visit %%INVITERNAME%%\'s profile at %%INVITERURL%%.', 'bp-invite-anyone' ), $blogname ); /* Do not translate the strings embedded in %% ... %% ! */
		} else {
			$text = $iaoptions['default_invitation_message'];
		}

		if ( !is_admin() ) {
			$text = invite_anyone_wildcard_replace( $text );
		}
	} else {
		$text = $returned_message;
	}

	return apply_filters( 'invite_anyone_get_invitation_message', stripslashes( $text ) );
}

function invite_anyone_process_footer( $email ) {

	$iaoptions = invite_anyone_options();

	if ( empty( $iaoptions['addl_invitation_message'] ) ) {

		$footer = apply_filters( 'invite_anyone_accept_invite_footer_message', __( 'To accept this invitation, please visit %%ACCEPTURL%%', 'bp-invite-anyone' ) );
		$footer .= '

';
		$footer .= apply_filters( 'invite_anyone_opt_out_footer_message', __( 'To opt out of future invitations to this site, please visit %%OPTOUTURL%%', 'bp-invite-anyone' ) );
	} else {
		$footer = $iaoptions['addl_invitation_message'];
	}

	return stripslashes( $footer );
}

function invite_anyone_wildcard_replace( $text, $email = false ) {
	global $bp;

	$inviter_name = $bp->loggedin_user->userdata->display_name;
	$site_name    = get_bloginfo( 'name' );
	$inviter_url  = bp_loggedin_user_domain();
	$accept_link  = apply_filters( 'invite_anyone_accept_url', bp_get_root_domain() . '/' . bp_get_signup_slug() . '/accept-invitation/' . urlencode( $email ) );
	$opt_out_link = site_url( BP_REGISTER_SLUG ) . '/opt-out/' . urlencode( $email );

	$text = str_replace( '%%INVITERNAME%%', $inviter_name, $text );
	$text = str_replace( '%%INVITERURL%%', $inviter_url, $text );
	$text = str_replace( '%%SITENAME%%', $site_name, $text );
	$text = str_replace( '%%OPTOUTURL%%', $opt_out_link, $text );
	$text = str_replace( '%%ACCEPTURL%%', $accept_link, $text );

	/* Adding single % replacements because lots of people are making the mistake */
	$text = str_replace( '%INVITERNAME%', $inviter_name, $text );
	$text = str_replace( '%INVITERURL%', $inviter_url, $text );
	$text = str_replace( '%SITENAME%', $site_name, $text );
	$text = str_replace( '%OPTOUTURL%', $opt_out_link, $text );
	$text = str_replace( '%ACCEPTURL%', $accept_link, $text );

	return $text;
}

/**
 * Get the max allowed invites
 */
function invite_anyone_max_invites() {
	$options = invite_anyone_options();
	return isset( $options['max_invites'] ) ? intval( $options['max_invites'] ) : false;
}

function invite_anyone_allowed_domains() {

	$domains = '';

	if ( function_exists( 'get_site_option' ) ) {
		$limited_email_domains = get_site_option( 'limited_email_domains' );

		if ( !$limited_email_domains || !is_array( $limited_email_domains ) )
			return $domains;

		foreach( $limited_email_domains as $domain )
			$domains .= "<strong>$domain</strong> ";
	}

	return $domains;
}

/**
 * Fetches the invitee taxonomy name out of the $bp global so it can be queried in the template
 *
 * @package Invite Anyone
 * @since 0.8
 *
 * @return str $tax_name
 */
function invite_anyone_get_invitee_tax_name() {
	global $bp;

	$tax_name = '';

	if ( !empty( $bp->invite_anyone->invitee_tax_name ) )
		$tax_name = $bp->invite_anyone->invitee_tax_name;

	return $tax_name;
}

/**
 * Fetches the groups taxonomy name out of the $bp global so it can be queried in the template
 *
 * @package Invite Anyone
 * @since 0.8
 *
 * @return str $tax_name
 */
function invite_anyone_get_invited_groups_tax_name() {
	global $bp;

	$tax_name = '';

	if ( !empty( $bp->invite_anyone->invited_groups_tax_name ) )
		$tax_name = $bp->invite_anyone->invited_groups_tax_name;

	return $tax_name;
}

function invite_anyone_format_date( $date ) {
	$thetime = strtotime( $date );
	$format = get_option('date_format');
	$thetime = date( "$format", $thetime );
	return $thetime;
}

/**
 * Parses email addresses, comma-separated or line-separated, into an array
 *
 * @package Invite Anyone
 * @since 0.8.8
 *
 * @param str $address_string The raw string from the input box
 * @return array $emails An array of addresses
 */
function invite_anyone_parse_addresses( $address_string ) {

	$emails = array();

	// First, split by line breaks
	$rows = explode( "\n", $address_string );

	// Then look through each row to split by comma
	foreach( $rows as $row ) {
		$row_addresses = explode( ',', $row );

		// Then walk through and add each address to the array
		foreach( $row_addresses as $row_address ) {
			$row_address_trimmed = trim( $row_address );

			// We also have to make sure that the email address isn't empty
			if ( ! empty( $row_address_trimmed ) && ! in_array( $row_address_trimmed, $emails ) )
				$emails[] = $row_address_trimmed;
		}
	}

	return apply_filters( 'invite_anyone_parse_addresses', $emails, $address_string );
}

function invite_anyone_process_invitations( $data ) {
	global $bp;

	$emails = false;
	// Parse out the individual email addresses
	if ( !empty( $data['invite_anyone_email_addresses'] ) ) {
		$emails = invite_anyone_parse_addresses( $data['invite_anyone_email_addresses'] );
	}

	// Filter the email addresses so that plugins can have a field day
	$emails = apply_filters( 'invite_anyone_submitted_email_addresses', $emails, $data );

	// Set up a wrapper for any data to return to the Send Invites screen in case of error
	$returned_data = array(
		'error_message' => false,
		'error_emails'  => array(),
		'subject' 	=> $data['invite_anyone_custom_subject'],
		'message' 	=> $data['invite_anyone_custom_message'],
		'groups' 	=> isset( $data['invite_anyone_groups'] ) ? $data['invite_anyone_groups'] : ''
	);

	// Check against the max number of invites. Send back right away if there are too many
	$options 	= invite_anyone_options();
	$max_invites 	= !empty( $options['max_invites'] ) ? $options['max_invites'] : 5;

	if ( count( $emails ) > $max_invites ) {

		$returned_data['error_message']	= sprintf( __( 'You are only allowed to invite up to %s people at a time. Please remove some addresses and try again', 'bp-invite-anyone' ), $max_invites );
		$returned_data['error_emails'] 	= $emails;

		setcookie( 'invite-anyone', serialize( $returned_data ), 0, '/' );
		$redirect = bp_loggedin_user_domain() . $bp->invite_anyone->slug . '/invite-new-members/';
		bp_core_redirect( $redirect );
		die();
	}

	if ( empty( $emails ) ) {
		bp_core_add_message( __( 'You didn\'t include any email addresses!', 'bp-invite-anyone' ), 'error' );
		bp_core_redirect( $bp->loggedin_user->domain . $bp->invite_anyone->slug . '/invite-new-members' );
		die();
	}

	// Max number of invites sent
	$limit_total_invites = !empty( $options['email_limit_invites_toggle'] ) && 'no' != $options['email_limit_invites_toggle'];
	if ( $limit_total_invites && !current_user_can( 'delete_others_pages' ) ) {
		$sent_invites = invite_anyone_get_invitations_by_inviter_id( bp_loggedin_user_id() );
		$sent_invites_count      = (int) $sent_invites->post_count;
		$remaining_invites_count = (int) $options['limit_invites_per_user'] - $sent_invites_count;

		if ( count( $emails ) > $remaining_invites_count ) {
			$returned_data['error_message'] = sprintf( __( 'You are only allowed to invite %s more people. Please remove some addresses and try again', 'bp-invite-anyone' ), $remaining_invites_count );
			$returned_data['error_emails'] = $emails;

			setcookie( 'invite-anyone', serialize( $returned_data ), 0, '/' );
			$redirect = bp_loggedin_user_domain() . $bp->invite_anyone->slug . '/invite-new-members/';
			bp_core_redirect( $redirect );
			die();
		}
	}

	// Turn the CS emails into an array so that they can be matched against the main list
	if ( isset( $_POST['cloudsponge-emails'] ) ) {
		$cs_emails = explode( ',', $_POST['cloudsponge-emails'] );
	}

	// validate email addresses
	foreach( $emails as $key => $email ) {
		$check = invite_anyone_validate_email( $email );
		switch ( $check ) {

			case 'opt_out' :
				$returned_data['error_message'] .= sprintf( __( '<strong>%s</strong> has opted out of email invitations from this site.', 'bp-invite-anyone' ), $email );
				break;

			case 'used' :
				$returned_data['error_message'] .= sprintf( __( "<strong>%s</strong> is already a registered user of the site.", 'bp-invite-anyone' ), $email );
				break;

			case 'unsafe' :
				$returned_data['error_message'] .= sprintf( __( '<strong>%s</strong> is not a permitted email address.', 'bp-invite-anyone' ), $email );
				break;

			case 'invalid' :
				$returned_data['error_message'] .= sprintf( __( '<strong>%s</strong> is not a valid email address. Please make sure that you have typed it correctly.', 'bp-invite-anyone' ), $email );
				break;

			case 'limited_domain' :
				$returned_data['error_message'] .= sprintf( __( '<strong>%s</strong> is not a permitted email address. Please make sure that you have typed the domain name correctly.', 'bp-invite-anyone' ), $email );
				break;
		}

		// If there was an error in validation, we won't process this email
		if ( $check != 'okay' ) {
			$returned_data['error_message'] .= '<br />';
			$returned_data['error_emails'][] = $email;
			unset( $emails[$key] );
		}
	}

	if ( ! empty( $emails ) ) {

		unset( $message, $to );

		/* send and record invitations */

		do_action( 'invite_anyone_process_addl_fields' );

		$groups = ! empty( $data['invite_anyone_groups'] ) ? $data['invite_anyone_groups'] : array();
		$is_error = 0;

		foreach( $emails as $email ) {
			$subject = stripslashes( strip_tags( $data['invite_anyone_custom_subject'] ) );

			$message = stripslashes( strip_tags( $data['invite_anyone_custom_message'] ) );

			$footer = invite_anyone_process_footer( $email );
			$footer = invite_anyone_wildcard_replace( $footer, $email );

			$message .= '

================
';
			$message .= $footer;

			$to = apply_filters( 'invite_anyone_invitee_email', $email );
			$subject = apply_filters( 'invite_anyone_invitation_subject', $subject );
			$message = apply_filters( 'invite_anyone_invitation_message', $message );

			wp_mail( $to, $subject, $message );

			/* todo: isolate which email(s) cause problems, and send back to user */
		/*	if ( !invite_anyone_send_invitation( $bp->loggedin_user->id, $email, $message, $groups ) )
				$is_error = 1; */

			// Determine whether this address came from CloudSponge
			$is_cloudsponge = isset( $cs_emails ) && in_array( $email, $cs_emails ) ? true : false;

			invite_anyone_record_invitation( $bp->loggedin_user->id, $email, $message, $groups, $subject, $is_cloudsponge );

			do_action( 'sent_email_invite', $bp->loggedin_user->id, $email, $groups );

			unset( $message, $to );
		}

		// Set a success message

		$success_message = sprintf( __( "Invitations were sent successfully to the following email addresses: %s", 'bp-invite-anyone' ), implode( ", ", $emails ) );
		bp_core_add_message( $success_message );

		do_action( 'sent_email_invites', $bp->loggedin_user->id, $emails, $groups );
	} else {
		$success_message = sprintf( __( "Please correct your errors and resubmit.", 'bp-invite-anyone' ) );
		bp_core_add_message( $success_message, 'error' );
	}

	// If there are errors, redirect to the Invite New Members page
	if ( ! empty( $returned_data['error_emails'] ) ) {
		setcookie( 'invite-anyone', serialize( $returned_data ), 0, '/' );
		$redirect = bp_loggedin_user_domain() . $bp->invite_anyone->slug . '/invite-new-members/';
		bp_core_redirect( $redirect );
		die();
	}

	return true;
}

function invite_anyone_send_invitation( $inviter_id, $email, $message, $groups ) {
	global $bp;

}

function invite_anyone_bypass_registration_lock() {
	global $bp;

	if ( $bp->current_component != BP_REGISTER_SLUG || $bp->current_action != 'accept-invitation' )
		return;

	if ( !isset( $bp->action_variables[0] ) || !$email = urldecode( $bp->action_variables[0] ) )
		return;

	$options = invite_anyone_options();

	if ( empty( $options['bypass_registration_lock'] ) || $options['bypass_registration_lock'] != 'yes' )
		return;

	// Check to make sure that it's actually a valid email
	$ia_obj = invite_anyone_get_invitations_by_invited_email( $email );

	if ( !$ia_obj->have_posts() ) {
		bp_core_add_message( __( "We couldn't find any invitations associated with this email address.", 'bp-invite-anyone' ), 'error' );
		return;
	}

	// To support old versions of BP, we have to force the overloaded
	// site_options property in some cases
	if ( is_multisite() ) {
		$site_options = $bp->site_options;
		if ( !empty( $bp->site_options['registration'] ) && $bp->site_options['registration'] == 'blog' ) {
			$site_options['registration'] = 'all';
		} else if ( !empty( $bp->site_options['registration'] ) && $bp->site_options['registration'] == 'none' ) {
			$site_options['registration'] = 'user';
		}
		$bp->site_options = $site_options;

		add_filter( 'bp_get_signup_allowed', '__return_true' );
	} else {
		add_filter( 'option_users_can_register', create_function( false, 'return true;' ) );
	}
}
add_action( 'wp', 'invite_anyone_bypass_registration_lock', 1 );

/**
 * Double check that passed email address matches an existing invitation when registration lock bypass is on.
 *
 * @since 1.2
 *
 * @param array $results Error results from user signup validation
 * @return array
 */
function invite_anyone_check_invitation($results) {
	if ( ! bp_is_current_component( BP_REGISTER_SLUG ) || ! bp_is_current_action( 'accept-invitation' ) ) {
		return $results;
	}

	// Check to make sure that it's actually a valid email
	$ia_obj = invite_anyone_get_invitations_by_invited_email( $results['user_email'] );

	if ( !$ia_obj->have_posts() ) {
		$errors = new WP_Error();
		$errors->add( 'user_email', __( "We couldn't find any invitations associated with this email address.", 'bp-invite-anyone' ) );
		$results['errors'] = $errors;
	}

	return $results;
}
add_filter( 'bp_core_validate_user_signup', 'invite_anyone_check_invitation' );

function invite_anyone_validate_email( $user_email ) {

	$status = 'okay';

	if ( invite_anyone_check_is_opt_out( $user_email ) ) {
		$status = 'opt_out';
	} else if ( $user = get_user_by( 'email', $user_email ) ) {
		$status = 'used';
	} else if ( function_exists( 'is_email_address_unsafe' ) && is_email_address_unsafe( $user_email ) ) {
		$status = 'unsafe';
	} else if ( function_exists( 'is_email' ) && !is_email( $user_email ) ) {
		$status = 'invalid';
	}

	if ( function_exists( 'get_site_option' ) ) {
		if ( $limited_email_domains = get_site_option( 'limited_email_domains' ) ) {
			if ( is_array( $limited_email_domains ) && empty( $limited_email_domains ) == false ) {
				$emaildomain = substr( $user_email, 1 + strpos( $user_email, '@' ) );
				if( in_array( $emaildomain, $limited_email_domains ) == false ) {
					$status = 'limited_domain';
				}
			}
		}
	}

	return apply_filters( 'invite_anyone_validate_email', $status, $user_email );
}

/**
 * Catches attempts to reaccept an invitation, and redirects appropriately
 *
 * If you attempt to access the register page when logged in, you get bounced
 * to the home page. This is a BP feature. Because accept-invitation is a
 * subpage of register, this happens for accept-invitation pages as well.
 * However, people are more likely to try to visit this page than the vanilla
 * register page, because they've gotten an email inviting them to the site.
 *
 * So this function catches logged-in visits to /register/accept-invitation,
 * and if the email address in the URL matches the logged-in user's email
 * address, redirects them to their invite-anyone page to see the a message.
 *
 * @since 1.0.20
 */
function invite_anyone_already_accepted_redirect( $redirect ) {
	global $bp;

	if ( bp_is_current_action( 'accept-invitation' ) && $reg_email = urldecode( bp_action_variable( 0 ) ) ) {
		if ( bp_core_get_user_email( bp_loggedin_user_id() ) !== $reg_email ) {
			return;
		}

		$redirect = add_query_arg( 'already', 'accepted', trailingslashit( bp_loggedin_user_domain() . $bp->invite_anyone->slug ) );
	}

	return $redirect;
}
add_filter( 'bp_loggedin_register_page_redirect_to', 'invite_anyone_already_accepted_redirect' );

