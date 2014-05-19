<?php
/* Prevent logged out users from accessing bp pages */
function bphelp_pbpp_redirect() {
global $bp;
//IMPORTANT: Do not alter the following line. 
$bphelp_my_redirect_slug = get_option( 'bphelp-my-redirect-slug', 'register' );

if ( bp_is_activity_component() || bp_is_groups_component() || bp_is_group_forum() || bbp_is_single_forum() || bbp_is_single_topic() || bp_is_forums_component() || bp_is_blogs_component() || bp_is_members_component() || bp_is_profile_component() ) {

	if(!is_user_logged_in()) { 
		bp_core_redirect( get_option('home') . '/' .  $bphelp_my_redirect_slug );
	} 
}
}
add_filter('template_redirect','bphelp_pbpp_redirect',1);
/* End Prevent logged out users from accessing bp pages */

/* Prevent RSS Feeds */
function pbpp_remove_visitor_rss_feed() {
	if ( !is_user_logged_in() ) {
		remove_action( 'bp_actions', 'bp_activity_action_sitewide_feed' ,3      );
		remove_action( 'bp_actions', 'bp_activity_action_personal_feed' ,3      );
		remove_action( 'bp_actions', 'bp_activity_action_friends_feed'  ,3      );
		remove_action( 'bp_actions', 'bp_activity_action_my_groups_feed',3      );
		remove_action( 'bp_actions', 'bp_activity_action_mentions_feed' ,3      );
		remove_action( 'bp_actions', 'bp_activity_action_favorites_feed',3      );
		remove_action( 'groups_action_group_feed', 'groups_action_group_feed',3 );
	}
}
add_action('init', 'pbpp_remove_visitor_rss_feed'); 
/* End Prevent RSS Feeds */

/////////////////////////////// Dashboard Settings //////////////////////////////////

function bphelp_pbp_add_admin_menu() {
	global $bp;

	if ( !is_super_admin() )
		return false;
		
	// Add translation
	load_plugin_textdomain( 'bphelp_pbp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	add_options_page( __( 'Private BP Pages', 'bphelp_pbp' ), __( 'Private BP Pages', 'bphelp_pbp' ), 'manage_options', 'bphelp-pbp-settings', 'bphelp_pbp_admin' );
}

add_action( 'admin_menu', 'bphelp_pbp_add_admin_menu' );

function bphelp_pbp_admin() {
	global $bp;

	if ( isset( $_POST['submit'] ) && check_admin_referer('pbp-bphelp-settings') ) {
		update_option( 'bphelp-my-redirect-slug', $_POST['bphelp-my-redirect-slug'] );

		$updated = true;
	}
	
	$bphelp_my_redirect_slug = get_option( 'bphelp-my-redirect-slug', 'register' );
?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php _e( 'Private BP Pages Settings', 'bphelp_pbp' ) ?></h2>
		<br />
		<p>
		<?php _e( 'Enter the slug of the page you would like logged out visitors to be redirected to in the below option.', 'bphelp_pbp' ) ?>
		</p>
		<br />
		
		<?php if ( isset($updated) ) : ?><?php echo "<div id='message' class='updated fade'><p>" . __( 'Settings Updated.', 'bphelp_pbp' ) . "</p></div>" ?><?php endif; ?>

		<form action="<?php echo site_url() . '/wp-admin/admin.php?page=bphelp-pbp-settings' ?>" name="pbp-bphelp-settings-form" id="pbp-bphelp-settings-form" method="post">

			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="target_uri"><?php _e( '<b>Define Your Redirect Slug<br /> Choices are:<br />register, sign-up, or wp-login.php.</b>', 'bphelp_pbp' ) ?></label></th>
					<td>
						<input name="bphelp-my-redirect-slug" type="text" id="bphelp-my-redirect-slug"          value="<?php echo esc_attr( $bphelp_my_redirect_slug ); ?>" size="60" />
					</td>
				</tr>
			</table>
			
			<p class="submit">
				&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" class="button-primary" value="<?php _e( 'Save Settings', 'bphelp_pbp' ) ?>"/>
			</p>

			<?php
			wp_nonce_field( 'pbp-bphelp-settings' );
			?>
		</form>
	</div>
<?php
}
///Love, Peace, and Geese!
?>