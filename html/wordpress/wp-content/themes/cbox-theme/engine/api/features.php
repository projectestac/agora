<?php
/**
 * Infinity Theme: features classes file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-api
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'components/features' );

/**
 * Infinity Theme: features policy
 *
 * @package Infinity-api
 * @subpackage features
 */
class Infinity_Features_Policy extends ICE_Feature_Policy
{
	/**
	 * @return ICE_Feature_Policy
	 */
	static public function instance()
	{
		self::$calling_class = __CLASS__;
		return parent::instance();
	}
	
	/**
	 * @return Infinity_Features_Registry
	 */
	final public function new_registry()
	{
		return new Infinity_Features_Registry();
	}

	/**
	 * @return Infinity_Feature_Factory
	 */
	final public function new_factory()
	{
		return new Infinity_Feature_Factory();
	}

	/**
	 * @return Infinity_Features_Renderer
	 */
	final public function new_renderer()
	{
		return new Infinity_Features_Renderer();
	}
}

/**
 * Infinity Theme: features registry
 *
 * @package Infinity-api
 * @subpackage features
 */
class Infinity_Features_Registry extends ICE_Feature_Registry
{
	// nothing custom yet
}

/**
 * Infinity Theme: feature factory
 *
 * @package Infinity-extensions
 * @subpackage features
 */
class Infinity_Feature_Factory extends ICE_Feature_Factory
{
	// nothing custom yet
}

/**
 * Infinity Theme: features renderer
 *
 * @package Infinity-api
 * @subpackage features
 */
class Infinity_Features_Renderer extends ICE_Feature_Renderer
{
	// nothing custom yet
}

//
// Helpers
//

/**
 * Display a feature
 *
 * @package Infinity-api
 * @subpackage features
 * @param string $feature_name
 * @param boolean $output
 * @return string|false
 */
function infinity_feature( $feature_name, $output = true )
{
	// is feature supported?
	if ( current_theme_supports( $feature_name ) ) {
		// yes, render it
		return Infinity_Features_Policy::instance()->registry()->get($feature_name)->render( $output );
	} else {
		// not supported
		return false;
	}
}

/**
 * Fetch a feature
 *
 * @package Infinity-api
 * @subpackage features
 * @param string $feature_name
 * @return ICE_Feature|false
 */
function infinity_feature_fetch( $feature_name )
{
	// is feature supported?
	if ( current_theme_supports( $feature_name ) ) {
		// yes, return it
		return Infinity_Features_Policy::instance()->registry()->get($feature_name);
	} else {
		// not supported
		return false;
	}
}

/**
 * Initialize features environment
 *
 * @package Infinity-api
 * @subpackage features
 */
function infinity_features_init()
{
	// component policies
	$features_policy = Infinity_Features_Policy::instance();

	// enable components
	ICE_Scheme::instance()->enable_component( $features_policy );

	do_action( 'infinity_features_init' );
}

/**
 * Initialize features screen requirements
 *
 * @package Infinity-api
 * @subpackage features
 */
function infinity_features_init_screen()
{
	// init ajax OR screen reqs (not both)
	if ( defined( 'DOING_AJAX') ) {
		Infinity_Features_Policy::instance()->registry()->init_ajax();
		do_action( 'infinity_features_init_ajax' );
	} else {
		Infinity_Features_Policy::instance()->registry()->init_screen();
		do_action( 'infinity_features_init_screen' );
	}
}
