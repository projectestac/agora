<?php

function invite_anyone_admin_add() {

	$parent = bp_core_do_network_admin() ? 'settings.php' : 'options-general.php';
	$plugin_page = add_submenu_page( $parent, __( 'Invite Anyone', 'bp-invite-anyone' ), __( 'Invite Anyone', 'bp-invite-anyone' ), 'manage_options', 'invite-anyone', 'invite_anyone_admin_panel' );

	add_action( "admin_print_scripts-$plugin_page", 'invite_anyone_admin_scripts' );
	add_action( "admin_print_styles-$plugin_page", 'invite_anyone_admin_styles' );
}
add_action( bp_core_admin_hook(), 'invite_anyone_admin_add', 80 );

/* Stolen from Welcome Pack - thanks, Paul! */
function invite_anyone_admin_add_action_link( $links, $file ) {
	if ( 'invite-anyone/invite-anyone.php' != $file )
		return $links;

	if ( function_exists( 'bp_core_do_network_admin' ) ) {
		$settings_url = add_query_arg( 'page', 'invite-anyone', bp_core_do_network_admin() ? network_admin_url( 'admin.php' ) : admin_url( 'admin.php' ) );
	} else {
		$settings_url = add_query_arg( 'page', 'invite-anyone', is_multisite() ? network_admin_url( 'admin.php' ) : admin_url( 'admin.php' ) );
	}

	$settings_link = '<a href="' . $settings_url . '">' . __( 'Settings', 'bp-invite-anyone' ) . '</a>';
	array_unshift( $links, $settings_link );

	return $links;
}
add_filter( 'plugin_action_links', 'invite_anyone_admin_add_action_link', 10, 2 );


function invite_anyone_admin_scripts() {
	wp_enqueue_script( 'invite-anyone-admin-js', WP_PLUGIN_URL . '/invite-anyone/admin/admin-js.js' );
}

function invite_anyone_admin_styles() {
	wp_enqueue_style( 'invite-anyone-admin-css', WP_PLUGIN_URL . '/invite-anyone/admin/admin-css.css' );
}

function invite_anyone_admin_panel() {
	global $iaoptions;

	$subpage = isset( $_GET['subpage' ] ) ? $_GET['subpage'] : 'general-settings';

	if ( !empty( $_GET['migrate'] ) && $_GET['migrate'] == '1' ) {
		$iaoptions 	= invite_anyone_options();
		$maybe_version	= !empty( $iaoptions['db_version'] ) ? $iaoptions['db_version'] : '0.7';

		// Don't run this migrator if coming from IA 0.8 or greater
		if ( !version_compare( $maybe_version, '0.8', '>=' ) ) {
			invite_anyone_migration_step();
			return;
		}
	}


	// Get the proper URL for submitting the settings form. (Settings API workaround)
	$url_base = function_exists( 'is_network_admin' ) && is_network_admin() ? network_admin_url( 'admin.php?page=invite-anyone' ) : admin_url( 'admin.php?page=invite-anyone' );

	$form_action = isset( $_GET['subpage'] ) ? add_query_arg( 'subpage', $_GET['subpage'], $url_base ) : $url_base;

	// Catch and save settings being saved (Settings API workaround)
	if ( !empty( $_POST['invite-anyone-settings-submit'] ) ) {
		$options = invite_anyone_options();

		// Here are the fields currently allowed in each section
		$settings_fields = array(
			'access-control' => array(
				'email_visibility_toggle',
				'email_since_toggle',
				'email_role_toggle',
				'minimum_role',
				'email_blacklist_toggle',
				'email_blacklist',
				'group_invites_can_admin',
				'group_invites_can_group_admin',
				'group_invites_can_group_mod',
				'group_invites_can_group_member',
				'days_since',
				'email_limit_invites_toggle',
				'limit_invites_per_user'
			),
			'cloudsponge' => array(
				'cloudsponge_enabled',
				'cloudsponge_key'
			),
			'general-settings' => array(
				'can_send_group_invites_email',
				'bypass_registration_lock',
				'default_invitation_subject',
				'default_invitation_message',
				'group_invites_enable_create_step',
				'addl_invitation_message',
				'subject_is_customizable',
				'message_is_customizable',
				'max_invites'
			)
		);

		$current_fields = $settings_fields[$subpage];

		foreach( $current_fields as $cfield ) {
			$options[$cfield] = isset( $_POST['invite_anyone'][$cfield] ) ? $_POST['invite_anyone'][$cfield] : false;
		}

		update_option( 'invite_anyone', $options );

		// A hack to make sure that the most recent options are available later on the page
		$iaoptions = $options;
	}
?>
	<div class="wrap">
    	<h2><?php _e( 'Invite Anyone', 'bp-invite-anyone' ) ?></h2>

    	<ul class="ia-tabs">
    		<li<?php if ( 'general-settings' == $subpage ) : ?> class="current"<?php endif ?>>
    			<a href="<?php echo add_query_arg( 'subpage', 'general-settings', $url_base ) ?>"><?php _e( 'General Settings', 'bp-invite-anyone' ) ?></a>
    		</li>

    		<li<?php if ( 'access-control' == $subpage ) : ?> class="current"<?php endif ?>>
    			<a href="<?php echo add_query_arg( 'subpage', 'access-control', $url_base ) ?>"><?php _e( 'Access Control', 'bp-invite-anyone' ) ?></a>
    		</li>

    		<li<?php if ( 'cloudsponge' == $subpage ) : ?> class="current"<?php endif ?>>
    			<a href="<?php echo add_query_arg( 'subpage', 'cloudsponge', $url_base ) ?>"><?php _e( 'CloudSponge', 'bp-invite-anyone' ) ?></a>
    		</li>

    		<li<?php if ( 'manage-invitations' == $subpage ) : ?> class="current"<?php endif ?>>
    			<a href="<?php echo add_query_arg( 'subpage', 'manage-invitations', $url_base ) ?>"><?php _e( 'Manage Invitations', 'bp-invite-anyone' ) ?></a>
    		</li>

    		<li<?php if ( 'stats' == $subpage ) : ?> class="current"<?php endif ?>>
    			<a href="<?php echo add_query_arg( 'subpage', 'stats', $url_base ) ?>"><?php _e( 'Stats', 'bp-invite-anyone' ) ?></a>
    		</li>


    	</ul>

    	<form action="<?php echo $form_action ?>" method="post">

	<?php /* The Settings API does not work with WP 3.1 Network Admin, but these functions still work to create the markup */ ?>
	<?php settings_fields( 'invite_anyone' ); ?>
	<?php do_settings_sections( 'invite_anyone' ); ?>

	<input type="hidden" name="settings-section" value="<?php echo $subpage ?>" />

	<input id="invite-anyone-settings-submit" name="invite-anyone-settings-submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>


    </div>
<?php
}



function invite_anyone_settings_setup() {
	$subpage = isset( $_GET['subpage' ] ) ? $_GET['subpage'] : 'general-settings';

	register_setting( 'invite_anyone', 'invite_anyone', 'invite_anyone_settings_check' );

	switch ( $subpage ) {
		case 'access-control' :
			/* Access Settings */
			add_settings_section('invite_anyone_access_settings', __('Access Settings', 'bp-invite-anyone'), 'invite_anyone_settings_access_content', 'invite_anyone');

			add_settings_field('invite_anyone_settings_email_visibility', __('Allow email invitations to be sent by', 'bp-invite-anyone'), 'invite_anyone_settings_email_visibility', 'invite_anyone', 'invite_anyone_access_settings');

			add_settings_field( 'invite_anyone_settings_group_invite_visibility', __( 'Limit group invitations', 'bp-invite-anyone' ), 'invite_anyone_settings_group_invite_visibility', 'invite_anyone', 'invite_anyone_access_settings' );

			add_settings_field( 'invite_anyone_settings_limit_invites', __( 'Limit per-user invitations', 'bp-invite-anyone' ), 'invite_anyone_settings_limit_invites', 'invite_anyone', 'invite_anyone_access_settings' );

			break;

		case 'cloudsponge' :
			/* Cloudsponge Settings */
			add_settings_section( 'invite_anyone_cs', __( 'CloudSponge', 'bp-invite-anyone' ), 'invite_anyone_settings_cs_content', 'invite_anyone' );

			break;

		case 'manage-invitations' :
			/* Manage Invitations */
			add_settings_section( 'invite_anyone_manage_invitations', __( 'Manage Invitations', 'bp-invite-anyone' ), 'invite_anyone_settings_mi_content', 'invite_anyone' );

			break;

		case 'stats' :
			/* Stats */
			add_settings_section( 'invite_anyone_stats', __( 'Stats', 'bp-invite-anyone' ), 'invite_anyone_settings_stats_content', 'invite_anyone' );

			break;

		case 'general-settings' :
		default :
			/* General Settings */
			add_settings_section('invite_anyone_general_settings', __('General Settings', 'bp-invite-anyone'), 'invite_anyone_settings_main_content', 'invite_anyone');

			add_settings_field('invite_anyone_settings_replacement_patterns', __('Replacement patterns for email text fields', 'bp-invite-anyone'), 'invite_anyone_settings_replacement_patterns', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_default_invitation_subject', __('Text of email invitation subject line', 'bp-invite-anyone'), 'invite_anyone_settings_default_invitation_subject', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_default_invitation_message', __('Main text of email invitation message', 'bp-invite-anyone'), 'invite_anyone_settings_default_invitation_message', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_addl_invitation_message', __('Footer text of email invitation message (not editable by users)', 'bp-invite-anyone'), 'invite_anyone_settings_addl_invitation_message', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_is_customizable', __('Allow users to customize invitation', 'bp-invite-anyone'), 'invite_anyone_settings_is_customizable', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_number_of_invitations', __('Number of email invitations users are permitted to send at a time', 'bp-invite-anyone'), 'invite_anyone_settings_number_of_invitations', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_can_send_group_invites_email', __('Allow users to send group invitations along with email invitations', 'bp-invite-anyone'), 'invite_anyone_settings_can_send_group_invites_email', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field('invite_anyone_settings_bypass_registration_lock', __('Allow email invitations to be accepted even when site registration is disabled', 'bp-invite-anyone'), 'invite_anyone_settings_bypass_registration_lock', 'invite_anyone', 'invite_anyone_general_settings');

			add_settings_field( 'invite_anyone_settings_group_invites_enable_create_step', __( 'Enable the Send Invites step during group creation', 'bp-invite-anyone' ), 'invite_anyone_settings_group_invites_enable_create_step', 'invite_anyone', 'invite_anyone_general_settings' );

			break;
	}
}
add_action( 'admin_init', 'invite_anyone_settings_setup' );



function invite_anyone_settings_main_content() {

?>
	<p><?php _e( 'Control the default behavior of Invite Anyone.', 'bp-invite-anyone' ) ?></p>

<?php
}

function invite_anyone_settings_replacement_patterns() {
?>
	<ul>
		<li><strong>%%SITENAME%%</strong> - <?php _e( 'name of your website', 'bp-invite-anyone' ) ?></li>
		<li><strong>%%INVITERNAME%%</strong> - <?php _e( 'display name of the inviter', 'bp-invite-anyone' ) ?></li>
		<li><strong>%%INVITERURL%%</strong> - <?php _e( 'URL to the profile of the inviter', 'bp-invite-anyone' ) ?></li>
		<li><strong>%%ACCEPTURL%%</strong> - <?php _e( 'Link that invited users can click to accept the invitation', 'bp-invite-anyone' ) ?></li>
		<li><strong>%%OPTOUTURL%%</strong> - <?php _e( 'Link that invited users can click to opt out of future invitations', 'bp-invite-anyone' ) ?></li>
	</ul>
<?php
}


/* Max number of email invitations at a time */

function invite_anyone_settings_number_of_invitations() {
	$options = invite_anyone_options();

	echo "<input id='invite_anyone_settings_number_of_invitations' name='invite_anyone[max_invites]' size='10' type='text' value='{$options['max_invites']}' />";
}

function invite_anyone_settings_can_send_group_invites_email() {
	$options = invite_anyone_options();
?>
	<input type="checkbox" name="invite_anyone[can_send_group_invites_email]" value="yes" <?php checked( $options['can_send_group_invites_email'], 'yes' ) ?> />
<?php
}

function invite_anyone_settings_bypass_registration_lock() {
	$options = invite_anyone_options();
?>
	<input type="checkbox" name="invite_anyone[bypass_registration_lock]" value="yes" <?php checked( $options['bypass_registration_lock'], 'yes' ) ?> />
<?php
}

/**
 * Markup callback for "Enable group creation step" setting
 *
 * @since 1.2
 */
function invite_anyone_settings_group_invites_enable_create_step() {
	$options = invite_anyone_options();
	$enabled = ! empty( $options['group_invites_enable_create_step'] ) && 'yes' === $options['group_invites_enable_create_step'];
	?>
	<input type="checkbox" name="invite_anyone[group_invites_enable_create_step]" value="yes" <?php checked( $enabled ) ?> />
	<?php
}

function invite_anyone_settings_default_invitation_subject() {
	echo apply_filters( 'invite_anyone_settings_default_invitation_subject', "<textarea name='invite_anyone[default_invitation_subject]' cols=60 rows=2 >" . esc_html( invite_anyone_invitation_subject() ) . "</textarea>" );
}

function invite_anyone_settings_default_invitation_message() {
	echo apply_filters( 'invite_anyone_settings_default_invitation_message', "<textarea name='invite_anyone[default_invitation_message]' cols=60 rows=5 >" . esc_html( invite_anyone_invitation_message() ) . "</textarea>" );
}

function invite_anyone_settings_addl_invitation_message() {
	echo apply_filters( 'invite_anyone_settings_addl_invitation_message', "<textarea name='invite_anyone[addl_invitation_message]' cols=60 rows=5 >" . esc_html( invite_anyone_process_footer( '[email]' ) ) . "</textarea>" );
}

function invite_anyone_settings_is_customizable() {
	$options = invite_anyone_options();
?>
	<ul>
		<li>
			<input type="checkbox" name="invite_anyone[subject_is_customizable]" value="yes" <?php checked( $options['subject_is_customizable'], 'yes' ) ?> /> <?php _e( 'Subject line', 'bp-invite-anyone' ) ?>
		</li>

		<li>
			<input type="checkbox" name="invite_anyone[message_is_customizable]" value="yes" <?php checked( $options['message_is_customizable'], 'yes' ) ?> /> <?php _e( 'Message body', 'bp-invite-anyone' ) ?>
		</li>
	</ul>
<?php
}

function invite_anyone_settings_access_content() {
?>
	<p><?php _e( 'Control which members are able to send various kinds of invitations.', 'bp-invite-anyone' ) ?></p>
<?php
}

function invite_anyone_settings_email_visibility() {
	$options = invite_anyone_options();
?>

	<ul>
		<li><input type='radio' name='invite_anyone[email_visibility_toggle]' id='invite_anyone_toggle_email_no_limit' value='no_limit' <?php if ( $options['email_visibility_toggle'] != 'limit' ) : ?>checked="checked"<?php endif ?> /> <?php _e( 'All users', 'bp-invite-anyone' ) ?></li>

		<li><input type='radio' name='invite_anyone[email_visibility_toggle]' id='invite_anyone_toggle_email_limit' value='limit' <?php checked( $options['email_visibility_toggle'], 'limit' ) ?> /> <?php _e( 'A limited set of users', 'bp-invite-anyone' ) ?>
			<div class="invite-anyone-admin-limited">
			<ul>
				<li>
					<input type="checkbox" name="invite_anyone[email_since_toggle]" value="yes" <?php checked( $options['email_since_toggle'], 'yes' ) ?> /> <?php _e( 'Only users who have been members of the site for a minimum number of days:', 'bp-invite-anyone' ) ?>
					<input name='invite_anyone[days_since]' size='10' type='text' value='<?php echo $options['days_since'] ?>' />
				</li>

				<li>
					<input type="checkbox" name="invite_anyone[email_role_toggle]" value="yes"  <?php checked( $options['email_role_toggle'], 'yes' ) ?> /> <?php _e( 'Only users who have at least the following role on this blog:', 'bp-invite-anyone' ) ?>
					<select name="invite_anyone[minimum_role]">
						<option value="Subscriber" <?php selected( $options['minimum_role'], 'Subscriber' ) ?>><?php _e( 'Subscriber' ) ?></option>
						<option value="Contributor" <?php selected( $options['minimum_role'], 'Contributor' ) ?>><?php _e( 'Contributor' ) ?></option>
						<option value="Author" <?php selected( $options['minimum_role'], 'Author' ) ?>><?php _e( 'Author' ) ?></option>
						<option value="Editor" <?php selected( $options['minimum_role'], 'Editor' ) ?>><?php _e( 'Editor' ) ?></option>
						<option value="Administrator" <?php selected( $options['minimum_role'], 'Administrator' ) ?>><?php _e( 'Administrator' ) ?></option>
					</select>
				</li>

				<li>
					<input type="checkbox" name="invite_anyone[email_blacklist_toggle]" value="yes"  <?php checked( $options['email_blacklist_toggle'], 'yes' ) ?> /> <?php _e( 'Provide a comma-separated list of users (identified by their numerical user ids) who <strong>cannot</strong> send invitations by email:', 'bp-invite-anyone' ) ?>
					<input name='invite_anyone[email_blacklist]' size='40' type='text' value='<?php echo $options['email_blacklist'] ?>' />
				</li>
			</ul>
			</div>
		</li>
	</ul>

<?php
}

function invite_anyone_settings_limit_invites() {
	$options = invite_anyone_options();
	?>

	<ul>
		<li>
			<input type="checkbox" name="invite_anyone[email_limit_invites_toggle]" value="yes" <?php checked( $options['email_limit_invites_toggle'], 'yes' ) ?> /> <?php _e( 'Limit number of invites per user :', 'bp-invite-anyone' ) ?>
			<input name='invite_anyone[limit_invites_per_user]' size='10' type='text' value='<?php echo esc_attr( (int) $options['limit_invites_per_user'] ) ?>' />
		</li>
	</ul>

	<?php
}

function invite_anyone_settings_group_invite_visibility() {
	$options = invite_anyone_options();
?>
	<ul>
	<p><?php _e( 'Invite Anyone extends BuddyPress\'s default group invitation settings. Instead of allowing you to invite only friends to a group, this plugin allows you to invite any member of the site. Use these settings to limit possible invitees for different group roles.', 'bp-invite-anyone' ) ?></p>
	<br />
		<li><?php _e( "<strong>Site admins</strong> can send group invitations to: ", 'bp-invite-anyone' ) ?>
			<select name="invite_anyone[group_invites_can_admin]">
				<option value="anyone" <?php selected( $options['group_invites_can_admin'], 'anyone' ) ?>><?php _e( 'Anyone', 'bp-invite-anyone' ) ?></option>
				<option value="friends" <?php selected( $options['group_invites_can_admin'], 'friends' ) ?>><?php _e( 'Friends', 'bp-invite-anyone' ) ?></option>
				<option value="noone" <?php selected( $options['group_invites_can_admin'], 'noone' ) ?>><?php _e( 'No one', 'bp-invite-anyone' ) ?></option>
			</select>
		</li>

		<li><?php _e( "<strong>Group admins</strong> can send group invitations to: ", 'bp-invite-anyone' ) ?>
			<select name="invite_anyone[group_invites_can_group_admin]">
				<option value="anyone" <?php selected( $options['group_invites_can_group_admin'], 'anyone' ) ?>><?php _e( 'Anyone', 'bp-invite-anyone' ) ?></option>
				<option value="friends" <?php selected( $options['group_invites_can_group_admin'], 'friends' ) ?>><?php _e( 'Friends', 'bp-invite-anyone' ) ?></option>
				<option value="noone" <?php selected( $options['group_invites_can_group_admin'], 'noone' ) ?>><?php _e( 'No one', 'bp-invite-anyone' ) ?></option>
			</select>
		</li>

		<li><?php _e( "<strong>Group mods</strong> can send group invitations to: ", 'bp-invite-anyone' ) ?>
			<select name="invite_anyone[group_invites_can_group_mod]">
				<option value="anyone" <?php selected( $options['group_invites_can_group_mod'], 'anyone' ) ?>><?php _e( 'Anyone', 'bp-invite-anyone' ) ?></option>
				<option value="friends" <?php selected( $options['group_invites_can_group_mod'], 'friends' ) ?>><?php _e( 'Friends', 'bp-invite-anyone' ) ?></option>
				<option value="noone" <?php selected( $options['group_invites_can_group_mod'], 'noone' ) ?>><?php _e( 'No one', 'bp-invite-anyone' ) ?></option>
			</select>
		</li>

		<li><?php _e( "<strong>Group members</strong> can send group invitations to: ", 'bp-invite-anyone' ) ?>
			<select name="invite_anyone[group_invites_can_group_member]">
				<option value="anyone" <?php selected( $options['group_invites_can_group_member'], 'anyone' ) ?>><?php _e( 'Anyone', 'bp-invite-anyone' ) ?></option>
				<option value="friends" <?php selected( $options['group_invites_can_group_member'], 'friends' ) ?>><?php _e( 'Friends', 'bp-invite-anyone' ) ?></option>
				<option value="noone" <?php selected( $options['group_invites_can_group_member'], 'noone' ) ?>><?php _e( 'No one', 'bp-invite-anyone' ) ?></option>
			</select>
		</li>
	</ul>
<?php
}

function invite_anyone_settings_cs_content() {

	$options 	= invite_anyone_options();
	$domain_key 	= !empty( $options['cloudsponge_key'] ) ? $options['cloudsponge_key'] : '';

?>
	<div class="cs">
		<a href="http://www.cloudsponge.com/?utm_source=invite-anyone&utm_medium=partner&utm_campaign=integrator"><img class="cs-logo" src="<?php echo plugins_url( 'invite-anyone/images/cloudsponge_logo.png' ) ?>" /></a>

		<div class="cs-explain">
			<p><?php _e( '<a href="http://www.cloudsponge.com/?utm_source=invite-anyone&utm_medium=partner&utm_campaign=integrator">CloudSponge</a> is a cool service that gives your users easy and secure access to their address books (Facebook, LinkedIn, Gmail, Yahoo, and a number of other online and desktop email clients), so that they can more easily invite friends to your site. It#8217;s a great way to increase engagement on your site, by making it easier for them to invite new members. In order to enable CloudSponge support in Invite Anyone and BuddyPress, you\'ll need to <a href="http://www.cloudsponge.com/signup?utm_source=invite-anyone&utm_medium=partner&utm_campaign=integrator">register for a CloudSponge account</a>.', 'bp-invite-anyone' ) ?></p>

			<label for="invite_anyone[cloudsponge_enabled]"><input type="checkbox" name="invite_anyone[cloudsponge_enabled]" id="cloudsponge-enabled" <?php checked( $options['cloudsponge_enabled'], 'on' ) ?>/> <strong><?php _e( 'Enable CloudSponge?', 'bp-invite-anyone' ) ?></strong></label>
		</div>

		<div class="cs-settings">
			<label for="invite_anyone[cloudsponge_key]"><?php _e( 'CloudSponge Domain Key', 'bp-invite-anyone' ) ?></label> <input type="text" id="cloudsponge-key" name="invite_anyone[cloudsponge_key]" value="<?php echo esc_html( $domain_key ) ?>" /> <span class="description"><?php _e( 'CloudSponge integration will not work without a valid domain key.', 'bp-invite-anyone' ) ?></span>

			<p class="description"><?php _e( 'When you use CloudSponge with Invite Anyone, part of your CloudSponge monthly payment goes to the author of Invite Anyone. This is a great way to support future development of the plugin. Thanks for your support!', 'bp-invite-anyone' ) ?></p>
		</div>
	</div>
<?php
}

function invite_anyone_settings_mi_content() {
	// Load the pagination helper
	if ( !class_exists( 'BBG_CPT_Pag' ) )
		require_once( dirname( __FILE__ ) . '/../lib/bbg-cpt-pag.php' );
	$pagination = new BBG_CPT_Pag;

	// Load the sortable helper
	if ( !class_exists( 'BBG_CPT_Sort' ) )
		require_once( dirname( __FILE__ ) . '/../lib/bbg-cpt-sort.php' );

	$cols = array(
		array(
			'name'		=> 'author',
			'title'		=> __( 'Inviter', 'bp-invite-anyone' ),
			'css_class'	=> 'ia-inviter'
		),
		array(
			'name'		=> 'ia_invitees',
			'title'		=> __( 'Invited Email', 'bp-invite-anyone' ),
			'css_class'	=> 'ia-invited-email'
		),
		array(
			'name'		=> 'sent',
			'title'		=> __( 'Sent', 'bp-invite-anyone' ),
			'css_class'	=> 'ia-sent',
			'default_order'	=> 'desc',
			'posts_column'	=> 'post_date',
			'is_default'	=> true
		),
		array(
			'name'		=> 'accepted',
			'title'		=> __( 'Accepted', 'bp-invite-anyone' ),
			'css_class'	=> 'ia-accepted',
			'default_order'	=> 'desc'
		),
		array(
			'name'		=> 'cloudsponge',
			'title'		=> __( 'CloudSponge', 'bp-invite-anyone' ),
			'css_class'	=> 'ia-cloudsponge'
		),
	);

	$sortable = new BBG_CPT_Sort( $cols );

	$args = array(
		'orderby'		=> $sortable->get_orderby,
		'order'			=> $sortable->get_order,
		'posts_per_page'	=> $pagination->get_per_page,
		'paged'			=> $pagination->get_paged,
		'status' 		=> 'trash,publish,pending,draft,future'
	);

	// Get the invites
	$invite = new Invite_Anyone_Invitation;
	$invites = $invite->get( $args );

	// Complete the pagination setup
	$pagination->setup_query( $invites );
	?>

	<?php if ( $invites->have_posts() ) : ?>
		<div class="ia-admin-pagination">
			<div class="currently-viewing">
				<?php $pagination->currently_viewing_text() ?>
			</div>

			<div class="pag-links">
				<?php $pagination->paginate_links() ?>
			</div>
		</div>

		<table class="wp-list-table widefat ia-invite-list">

		<thead>
			<tr>
				<th scope="col" id="cb" class="check-column">
					<input type="checkbox" />
				</th>

				<?php if ( $sortable->have_columns() ) : while ( $sortable->have_columns() ) : $sortable->the_column() ?>
					<?php $sortable->the_column_th() ?>
				<?php endwhile; endif ?>

			</tr>
		</thead>

		<tbody>
			<?php while ( $invites->have_posts() ) : $invites->the_post() ?>
			<tr>
				<th scope="row" class="check-column">
					<input type="checkbox" />
				</th>

				<td class="ia-inviter">
					<?php echo bp_core_get_userlink( get_the_author_ID() ) ?>

					<div class="row-actions">
						<span class="edit"><a href="<?php echo add_query_arg( array( 'post' => get_the_ID(), 'action' => 'edit' ), admin_url( 'post.php' ) ) ?>"><?php _e( 'View Invitation', 'bp-invite-anyone' ) ?></a></span>
					</div>
				</td>

				<td class="ia-invited-email">
					<?php
					$emails = wp_get_post_terms( get_the_ID(), invite_anyone_get_invitee_tax_name() );

					foreach( $emails as $email ) {
						// Before storing taxonomy terms in the db, we replace "+" with ".PLUSSIGN.", so we need to reverse that before displaying the email address.
						$email_address	= str_replace( '.PLUSSIGN.', '+', $email->name );
						echo esc_html( $email_address );
					}
					?>
				</td>

				<td class="ia-sent">
					<?php
					global $post;
					$date_invited = invite_anyone_format_date( $post->post_date );
					?>
					<?php echo esc_html( $date_invited ) ?>
				</td>

				<td class="ia-accepted">
					<?php
					if ( $accepted = get_post_meta( get_the_ID(), 'bp_ia_accepted', true ) ):
						$date_joined = invite_anyone_format_date( $accepted );
						$accepted = true;
					else:
						$date_joined = '-';
						$accepted = false;
					endif;
					?>
					<?php echo esc_html( $date_joined ) ?>
				</td>

				<td class="ia-cloudsponge">
					<?php
					$is_cloudsponge = get_post_meta( get_the_ID(), 'bp_ia_is_cloudsponge', true );

					if ( !$is_cloudsponge )
						$is_cloudsponge = __( '(no data)', 'bp-invite-anyone' );
					?>
					<?php echo esc_html( $is_cloudsponge ) ?>
				</td>
			</tr>
			<?php endwhile ?>
		</tbody>
		</table>

		<?php if ( defined( 'INVITE_ANYONE_CS_ENABLED' ) && INVITE_ANYONE_CS_ENABLED ) : ?>
			<p class="description"><strong>Note:</strong> CloudSponge data has only been recorded since Invite Anyone v0.9.</p>
		<?php endif ?>

		<div class="ia-admin-pagination">
			<div class="currently-viewing">
				<?php $pagination->currently_viewing_text() ?>
			</div>

			<div class="pag-links">
				<?php $pagination->paginate_links() ?>
			</div>
		</div>

	<?php else : ?>
		<p><?php _e( 'No invitations have been sent yet.', 'bp-invite-anyone' ) ?></p>

	<?php endif ?>

	<?php

}

function invite_anyone_settings_stats_content() {
	require( dirname( __FILE__ ) . '/admin-stats.php' );
	$stats = new Invite_Anyone_Stats;
	$stats->display();
}

function invite_anyone_settings_check($input) {
	return $input;
}

?>
