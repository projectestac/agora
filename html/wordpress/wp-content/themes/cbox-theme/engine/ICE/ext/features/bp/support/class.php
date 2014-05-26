<?php
/**
 * ICE API: feature extensions, BuddyPress support feature class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'components/features/component' );

/**
 * BuddyPress support feature
 *
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Bp_Support
	extends ICE_Feature
{
	/**
	 */
	public function check_reqs()
	{
		// is buddypress active?
		if ( true === parent::check_reqs() ) {
			return $this->is_active();
		}

		return false;
	}

	/**
	 */
	public function supported()
	{
		if ( true === parent::supported() ) {
			return $this->is_active();
		}

		return false;
	}

	/**
	 */
	protected function init()
	{
		// make sure component is supported
		if ( $this->supported() ) {

			parent::init();

			if (
				is_admin() &&
				!is_dir( get_template_directory() . '/members' ) &&
				!is_dir( get_stylesheet_directory() . '/members' )
			) {
				bp_core_add_admin_notice(
					__( "You have BuddyPress activated, but the templates are missing from your theme!", infinity_text_domain )
				);
				return false;
			}

			$this->setup_theme();

			// addtl filters
			add_filter( 'bp_no_access_mode', array( $this, 'use_wplogin' ) );
			add_filter( 'bp_get_activity_action_pre_meta', array( $this, 'secondary_avatars' ), 10, 2 );

			// addtl actions
			add_action( 'open_sidebar', array( $this, 'message_notices' ) );
		}
	}

	/**
	 * @internal copied from bp-default/functions.php
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		// Bump this when changes are made to bust cache
		$version = '20120110';

		// the global BuddyPress JS - Ajax will not work without it
		wp_enqueue_script( 'dtheme-ajax-js', BP_PLUGIN_URL . '/bp-themes/bp-default/_inc/global.js', array( 'jquery' ), bp_get_version() );

		// Add words that we need to use in JS to the end of the page so they can be translated and still used.
		$params = array(
			'my_favs'           => __( 'My Favorites', 'buddypress' ),
			'accepted'          => __( 'Accepted', 'buddypress' ),
			'rejected'          => __( 'Rejected', 'buddypress' ),
			'show_all_comments' => __( 'Show all comments for this thread', 'buddypress' ),
			'show_x_comments'   => __( 'Show all %d comments', 'buddypress' ),
			'show_all'          => __( 'Show all', 'buddypress' ),
			'comments'          => __( 'comments', 'buddypress' ),
			'close'             => __( 'Close', 'buddypress' ),
			'view'              => __( 'View', 'buddypress' ),
			'mark_as_fav'	    => __( 'Favorite', 'buddypress' ),
			'remove_fav'	    => __( 'Remove Favorite', 'buddypress' ),
			'unsaved_changes'   => __( 'Your profile has unsaved changes. If you leave the page, the changes will be lost.', 'buddypress' ),
		);

		wp_localize_script( 'dtheme-ajax-js', 'BP_DTheme', $params );
	}

	/**
	 * @internal copied from bp-default/functions.php
	 */
	protected function setup_theme()
	{
		require_once BP_PLUGIN_DIR . '/bp-themes/bp-default/_inc/ajax.php';

		// tell BuddyPress that Infinity supports it
		add_theme_support( 'buddypress' );

		// setup buttons for active components
		if ( !is_admin() ) {

			// friends button
			if ( bp_is_active( 'friends' ) ) {
				add_action( 'bp_member_header_actions', 'bp_add_friend_button' );
			}

			// activity button
			if ( bp_is_active( 'activity' ) ) {
				add_action( 'bp_member_header_actions', 'bp_send_public_message_button' );
			}

			// messages button
			if ( bp_is_active( 'messages' ) ) {
				add_action( 'bp_member_header_actions', 'bp_send_private_message_button' );
			}

			// group buttons
			if ( bp_is_active( 'groups' ) ) {
				add_action( 'bp_group_header_actions', 'bp_group_join_button' );
				add_action( 'bp_group_header_actions', 'bp_group_new_topic_button' );
				add_action( 'bp_directory_groups_actions', 'bp_group_join_button' );
			}

			// blog button
			if ( bp_is_active( 'blogs' ) ) {
				add_action( 'bp_directory_blogs_actions',  'bp_blogs_visit_blog_button' );
			}
		}
	}

	/**
	 * Add secondary avatar support
	 *
	 * @internal copied from bp-default/functions.php
	 * @param string $action
	 * @param string $activity
	 * @return string
	 */
	public function secondary_avatars( $action, $activity )
	{
		switch ( $activity->component ) {
			case 'groups' :
			case 'friends' :
				// Only insert avatar if one exists
				$secondary_avatar = bp_get_activity_secondary_avatar();
				if ( $secondary_avatar ) {
					$reverse_content = strrev( $action );
					$position        = strpos( $reverse_content, 'a<' );
					$action          = substr_replace( $action, $secondary_avatar, -$position - 2, 0 );
				}
				break;
		}

		return $action;
	}

	/**
	 * Add wrapper around message notices
	 */
	public function message_notices()
	{
		// render notification box ?>
		<div class="top-notification-box">
			<?php
				if ( is_user_logged_in() && bp_is_active( 'messages' ) ) {
					bp_message_get_notices();
				}
			?>
		</div><?php
	}

	/**
	 * We want to use wp_login
	 *
	 * @return integer
	 */
	public function use_wplogin()
	{
		return 2;
	}

	//
	// Helpers
	//

	/**
	 * Determine if BuddyPress is active and should load up
	 *
	 * @return boolean
	 */
	private function is_active()
	{
		if ( function_exists( 'bp_is_root_blog' ) ) {
			return bp_is_root_blog();
		} else {
			return false;
		}
	}

	/**
	 * Render a special activity entry anchor
	 *
	 * @param string $class
	 * @param string $title
	 */
	protected function render_activity_entry_link( $class, $title )
	{
		// render the link ?>
		<a class="<?php print esc_attr( $class ) ?> button" href="<?php bp_activity_thread_permalink() ?>"><?php print $title ?></a><?php
	}

	/**
	 * Copy a BuddyPress theme from the plugin dir to another location
	 *
	 * @internal this method is unused but may come in useful some day
	 * @param string $dst_dir
	 * @param string $theme
	 * @return boolean
	 */
	private function copy_theme( $dst_dir, $theme = 'bp-default' )
	{
		$src_dir = BP_PLUGIN_DIR . '/bp-themes/' . $theme;

		// theme subdir names
		$dirs = array(
			'activity',
			'blogs',
			'forums',
			'groups',
			'members',
			'registration'
		);

		// loop all dirs and copy
		foreach ( $dirs as $dir ) {
			// format paths
			$src_path = sprintf( '%s/%s', $src_dir, $dir );
			$dst_path = sprintf( '%s/%s', $dst_dir, $dir );
			// try to copy
			if ( !ICE_files::path_copy( $src_path, $dst_path ) ) {
				return false;
			}
		}

		return true;
	}

}
