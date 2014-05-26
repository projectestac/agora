<?php
/**
 * ICE API: feature extensions, BuddyPress protect components feature class file
 *
 * This extension is PREMIUM and purchase is required to get support!
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
 * BuddyPress protect components feature
 *
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Bp_Protect
	extends ICE_Feature
{
	/**
	 */
	protected $suboptions = true;

	/**
	 */
	public function check_reqs()
	{
		// is buddypress active?
		if ( true === parent::check_reqs() ) {
			return class_exists( 'BP_Component' );
		}

		return false;
	}
	
	/**
	 */
	protected function init()
	{
		// run parent init method
		parent::init();

		// init properties
		$this->title = __( 'BuddyPress Protect', infinity_text_domain );
		$this->description = __( 'Restrict access to your BuddyPress components to members only', infinity_text_domain );

		// add action to get_header
		add_action( 'wp', array($this,'maybe_redirect'), 1 );
	}

	/**
	 * Check user access and redirect if access denied
	 */
	public function maybe_redirect()
	{
		// always allow access to blog, registration and activation pages
		if ( bp_is_blog_page() || bp_is_register_page() || bp_is_activation_page() ) {
			return;
		}

		// grab toggle option from registry
		$opt_toggle = $this->get_suboption( 'toggle' );

		// is option toggled on?
		if ( $opt_toggle && true == $opt_toggle->get() ) {
			// protection is enabled, is user logged in?
			if ( !is_user_logged_in() ) {
				// not logged in, redirect to registration page
				bp_core_redirect( bp_get_root_domain() . '/' . bp_get_root_slug( 'register' ) );
				// exit to avoid any accidental output
				exit;
			}
		}
	}
}

?>
