<?php
/**
 * Infinity Theme: screens classes file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-api
 * @subpackage screens
 * @since 1.0
 */

ICE_Loader::load( 'components/screens' );

/**
 * Name of the route param (GET|POST)
 */
define( 'INFINITY_ROUTE_PARAM', 'route' );

/**
 * String on which to split route
 */
define( 'INFINITY_ROUTE_DELIM', '/' );

/**
 * Infinity Theme: screens policy
 *
 * @package Infinity-api
 * @subpackage screens
 */
class Infinity_Screens_Policy extends ICE_Screen_Policy
{
	/**
	 * @return ICE_Screen_Policy
	 */
	static public function instance()
	{
		self::$calling_class = __CLASS__;
		return parent::instance();
	}
	
	/**
	 * @return Infinity_Screens_Registry
	 */
	final public function new_registry()
	{
		return new Infinity_Screens_Registry();
	}

	/**
	 * @return Infinity_Screen_Factory
	 */
	final public function new_factory()
	{
		return new Infinity_Screen_Factory();
	}

	/**
	 * @return Infinity_Screens_Renderer
	 */
	final public function new_renderer()
	{
		return new Infinity_Screens_Renderer();
	}

}

/**
 * Infinity Theme: screens registry
 *
 * @package Infinity-api
 * @subpackage screens
 */
class Infinity_Screens_Registry extends ICE_Screen_Registry
{
	// nothing custom yet
}

/**
 * Infinity Theme: section factory
 *
 * @package Infinity-api
 * @subpackage screens
 */
class Infinity_Screen_Factory extends ICE_Screen_Factory
{
	/**
	 */
	public function create( $name, $config )
	{
		// DO NOT TRY THIS YOURSELF
		// @todo this is a temporary solution until the configuration strategy is improved

		// call parent to create component
		$component = parent::create( $name, $config );

		// check if URL is set
		if ( !$component->config( 'url' ) ) {
			// set url
			$component->config( 'url', INFINITY_AJAX_URL . infinity_screens_route( 'cpanel', $component->property( 'name' ) ) );
		}

		return $component;
	}
}

/**
 * Infinity Theme: screens renderer
 *
 * @package Infinity-api
 * @subpackage screens
 */
class Infinity_Screens_Renderer extends ICE_Screen_Renderer
{
	// nothing custom yet
}

//
// Helpers
//

/**
 * Initialize screens environment
 *
 * @package Infinity-api
 * @subpackage screens
 */
function infinity_screens_init()
{
	// component policy
	$screens_policy = Infinity_Screens_Policy::instance();

	// enable component
	ICE_Scheme::instance()->enable_component( $screens_policy );

	do_action( 'infinity_screens_init' );
}

/**
 * Initialize screens screen requirements
 *
 * @package Infinity-api
 * @subpackage screens
 */
function infinity_screens_init_screen()
{
	// init ajax OR screen reqs (not both)
	if ( defined( 'DOING_AJAX') ) {
		Infinity_Screens_Policy::instance()->registry()->init_ajax();
		do_action( 'infinity_screens_init_ajax' );
	} else {
		Infinity_Screens_Policy::instance()->registry()->init_screen();
		do_action( 'infinity_screens_init_screen' );
	}
}

/**
 * Build a page/route URL
 *
 * @package Infinity-api
 * @subpackage screens
 * @param string|array $params,...
 * @return array
 */
function infinity_screens_route()
{
	// build the base URL
	$url = sprintf( '?page=%s', INFINITY_ADMIN_PAGE );

	// use variable args
	$params = func_get_args();

	// check if first is an array
	if ( is_array( current($params) ) ) {
		$params = $params[0];
	}

	// add route if necessary
	if ( count( $params ) ) {
		$url .= sprintf( '&%s=%s', INFINITY_ROUTE_PARAM, implode( INFINITY_ROUTE_DELIM, $params ) );
	}

	return $url;
}

/**
 * Parse the page/route into screen, action, and params
 *
 * @package Infinity-api
 * @subpackage screens
 * @return array
 */
function infinity_screens_route_parse()
{
	// the route string
	$route_string = '';

	// look for route string in request
	if ( ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == INFINITY_ADMIN_PAGE ) ) {
		// look for route in request, post has priority
		if ( isset( $_POST[INFINITY_ROUTE_PARAM] ) )  {
			$route_string = $_POST[INFINITY_ROUTE_PARAM];
		} elseif ( isset( $_GET[INFINITY_ROUTE_PARAM] ) )  {
			$route_string = $_GET[INFINITY_ROUTE_PARAM];
		}
	} else {
		return false;
	}

	// have a route string?
	if ( strlen($route_string) ) {
		// get route tokens
		$route_toks = explode( INFINITY_ROUTE_DELIM, $route_string );
		// get at least one token?
		if ( count( $route_toks ) ) {
			// first token is the screen
			$route['screen'] = array_shift($route_toks);
			// second token is the action
			$route['action'] = array_shift($route_toks);
			// remaining tokens are params
			$route['params'] = $route_toks;
			// done
			return $route;
		}
	} else {

		// use route defaults
		return array(
			'screen' => 'cpanel',
			'action' => null,
			'params' => null,
		);

	}
}

/**
 * Retrieve a specific route param by offset
 *
 * @package Infinity-api
 * @subpackage screens
 * @param integer $offset
 * @return mixed
 */
function infinity_screens_route_param( $offset )
{
	$route = infinity_screens_route_parse();

	if ( isset( $route['params'][--$offset] ) ) {
		return $route['params'][$offset];
	}

	return null;
}

//
// Helpers
//

/**
 * Fetch a screen object from the registry
 *
 * @package Infinity-api
 * @subpackage screens
 * @param string $screen_name
 * @return ICE_Screen
 */
function infinity_screen_fetch( $screen_name )
{
	return Infinity_Screens_Policy::instance()->registry()->get( $screen_name );
}
