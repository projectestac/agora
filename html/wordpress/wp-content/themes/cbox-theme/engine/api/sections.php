<?php
/**
 * Infinity Theme: sections classes file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-api
 * @subpackage sections
 * @since 1.0
 */

ICE_Loader::load( 'components/sections' );

/**
 * Infinity Theme: sections policy
 *
 * @package Infinity-api
 * @subpackage sections
 */
class Infinity_Sections_Policy extends ICE_Section_Policy
{
	/**
	 * @return ICE_Section_Policy
	 */
	static public function instance()
	{
		self::$calling_class = __CLASS__;
		return parent::instance();
	}
	
	/**
	 * @return Infinity_Sections_Registry
	 */
	final public function new_registry()
	{
		return new Infinity_Sections_Registry();
	}

	/**
	 * @return Infinity_Section_Factory
	 */
	final public function new_factory()
	{
		return new Infinity_Section_Factory();
	}

	/**
	 * @return Infinity_Sections_Renderer
	 */
	final public function new_renderer()
	{
		return new Infinity_Sections_Renderer();
	}

}

/**
 * Infinity Theme: sections registry
 *
 * @package Infinity-api
 * @subpackage sections
 */
class Infinity_Sections_Registry extends ICE_Section_Registry
{
	// nothing custom yet
}

/**
 * Infinity Theme: section factory
 *
 * @package Infinity-api
 * @subpackage sections
 */
class Infinity_Section_Factory extends ICE_Section_Factory
{
	// nothing custom yet
}

/**
 * Infinity Theme: sections renderer
 *
 * @package Infinity-api
 * @subpackage sections
 */
class Infinity_Sections_Renderer extends ICE_Section_Renderer
{
	// nothing custom yet
}

//
// Helpers
//

/**
 * Initialize sections environment
 *
 * @package Infinity-api
 * @subpackage sections
 */
function infinity_sections_init()
{
	// component policies
	$sections_policy = Infinity_Sections_Policy::instance();

	// enable component
	ICE_Scheme::instance()->enable_component( $sections_policy );

	do_action( 'infinity_sections_init' );
}

/**
 * Initialize sections screen requirements
 *
 * @package Infinity-api
 * @subpackage sections
 */
function infinity_sections_init_screen()
{
	// init ajax OR screen reqs (not both)
	if ( defined( 'DOING_AJAX') ) {
		Infinity_Sections_Policy::instance()->registry()->init_ajax();
		do_action( 'infinity_sections_init_ajax' );
	} else {
		Infinity_Sections_Policy::instance()->registry()->init_screen();
		do_action( 'infinity_sections_init_screen' );
	}
}
