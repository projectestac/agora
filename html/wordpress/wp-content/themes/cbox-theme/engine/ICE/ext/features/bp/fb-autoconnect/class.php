<?php
/**
 * ICE API: feature extensions, BuddyPress FaceBook autoconnect feature class file
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
 * BuddyPress FaceBook autoconnect feature
 *
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Bp_Fb_Autoconnect
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
			// need BP and Auto Connect plugins
			if (
				class_exists( 'BP_Component' ) &&
				function_exists( 'jfb_output_facebook_btn' )
			) {
				return true;
			}
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
		$this->title = __( 'FaceBook Auto Connect', infinity_text_domain );
		$this->description = __( 'Enables FaceBook Auto Connect support', infinity_text_domain );
		
		// add actions on which to render
		add_action( 'bp_before_account_details_fields', array($this,'render') );
	}

	/**
	 */
	public function renderable()
	{
		// determine if template should be rendered
		if ( true === parent::renderable() ) {
			// grab toggle option from registry
			$opt_toggle = $this->get_suboption( 'toggle' );
			// check if toggle is on
			if ( $opt_toggle && true == $opt_toggle->get() ) {
				return true;
			}
		}

		// toggle is not set or set to false;
		return false;
	}
}
