<?php
/**
 * Infinity Theme: widgets classes file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-api
 * @subpackage widgets
 * @since 1.0
 */

ICE_Loader::load( 'components/widgets' );

/**
 * Infinity Theme: widgets policy
 *
 * @package Infinity-api
 * @subpackage widgets
 */
class Infinity_Widgets_Policy extends ICE_Widget_Policy
{
	/**
	 * @return ICE_Widget_Policy
	 */
	static public function instance()
	{
		self::$calling_class = __CLASS__;
		return parent::instance();
	}
	
	/**
	 * @return Infinity_Widgets_Registry
	 */
	final public function new_registry()
	{
		return new Infinity_Widgets_Registry();
	}

	/**
	 * @return Infinity_Widget_Factory
	 */
	final public function new_factory()
	{
		return new Infinity_Widget_Factory();
	}

	/**
	 * @return Infinity_Widgets_Renderer
	 */
	final public function new_renderer()
	{
		return new Infinity_Widgets_Renderer();
	}

}

/**
 * Infinity Theme: widgets registry
 *
 * @package Infinity-api
 * @subpackage widgets
 */
class Infinity_Widgets_Registry extends ICE_Widget_Registry
{
	// nothing custom yet
}

/**
 * Infinity Theme: section factory
 *
 * @package Infinity-api
 * @subpackage widgets
 */
class Infinity_Widget_Factory extends ICE_Widget_Factory
{
	// nothing custom yet
}

/**
 * Infinity Theme: widgets renderer
 *
 * @package Infinity-api
 * @subpackage widgets
 */
class Infinity_Widgets_Renderer extends ICE_Widget_Renderer
{
	// nothing custom yet
}

//
// Helpers
//

/**
 * Display a widget
 *
 * @package Infinity-api
 * @subpackage widgets
 * @param string $widget_name
 * @param boolean $output
 * @return string|false
 */
function infinity_widget( $widget_name, $output = true )
{
	return Infinity_Widgets_Policy::instance()->registry()->get($widget_name)->render( $output );
}

/**
 * Initialize widgets environment
 *
 * @package Infinity-api
 * @subpackage widgets
 */
function infinity_widgets_init()
{
	// component policy
	$widgets_policy = Infinity_Widgets_Policy::instance();

	// enable component
	ICE_Scheme::instance()->enable_component( $widgets_policy );

	do_action( 'infinity_widgets_init' );
}

/**
 * Initialize widgets screen requirements
 *
 * @package Infinity-api
 * @subpackage widgets
 */
function infinity_widgets_init_screen()
{
	// init ajax OR widget reqs (not both)
	if ( defined( 'DOING_AJAX') ) {
		Infinity_Widgets_Policy::instance()->registry()->init_ajax();
		do_action( 'infinity_widgets_init_ajax' );
	} else {
		Infinity_Widgets_Policy::instance()->registry()->init_screen();
		do_action( 'infinity_widgets_init_widget' );
	}
}
