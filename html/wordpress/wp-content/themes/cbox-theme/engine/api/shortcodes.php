<?php
/**
 * Infinity Theme: shortcodes classes file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-api
 * @subpackage shortcodes
 * @since 1.0
 */

ICE_Loader::load( 'components/shortcodes' );

/**
 * Infinity Theme: shortcodes policy
 *
 * @package Infinity-api
 * @subpackage shortcodes
 */
class Infinity_Shortcodes_Policy extends ICE_Shortcode_Policy
{
	/**
	 * @return ICE_Shortcode_Policy
	 */
	static public function instance()
	{
		self::$calling_class = __CLASS__;
		return parent::instance();
	}
	
	/**
	 * @return Infinity_Shortcodes_Registry
	 */
	final public function new_registry()
	{
		return new Infinity_Shortcodes_Registry();
	}

	/**
	 * @return Infinity_Shortcode_Factory
	 */
	final public function new_factory()
	{
		return new Infinity_Shortcode_Factory();
	}

	/**
	 * @return Infinity_Shortcodes_Renderer
	 */
	final public function new_renderer()
	{
		return new Infinity_Shortcodes_Renderer();
	}
}

/**
 * Infinity Theme: shortcodes registry
 *
 * @package Infinity-api
 * @subpackage shortcodes
 */
class Infinity_Shortcodes_Registry extends ICE_Shortcode_Registry
{
	// nothing custom yet
}

/**
 * Infinity Theme: shortcode factory
 *
 * @package Infinity-api
 * @subpackage shortcodes
 */
class Infinity_Shortcode_Factory extends ICE_Shortcode_Factory
{
	// nothing custom yet
}

/**
 * Infinity Theme: shortcodes renderer
 *
 * @package Infinity-api
 * @subpackage shortcodes
 */
class Infinity_Shortcodes_Renderer extends ICE_Shortcode_Renderer
{
	// nothing custom yet
}

//
// Helpers
//

/**
 * Initialize shortcodes environment
 *
 * @package Infinity-api
 * @subpackage shortcodes
 */
function infinity_shortcodes_init()
{
	// component policy
	$shortcodes_policy = Infinity_Shortcodes_Policy::instance();

	// enable component
	ICE_Scheme::instance()->enable_component( $shortcodes_policy );

	do_action( 'infinity_shortcodes_init' );
}

/**
 * Initialize shortcodes screen requirements
 *
 * @package Infinity-api
 * @subpackage shortcodes
 */
function infinity_shortcodes_init_screen()
{
	// init ajax OR screen reqs (not both)
	if ( defined( 'DOING_AJAX') ) {
		Infinity_Shortcodes_Policy::instance()->registry()->init_ajax();
		do_action( 'infinity_shortcodes_init_ajax' );
	} else {
		Infinity_Shortcodes_Policy::instance()->registry()->init_screen();
		do_action( 'infinity_shortcodes_init_screen' );
	}
}
