<?php
/**
 * ICE API: base policy class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage base
 * @since 1.0
 */

/**
 * Make customizing component implementations easy
 *
 * This object is passed to each component allowing the implementing API to
 * customize the implementation without confusing hooks and such.
 *
 * @package ICE
 * @subpackage base
 */
abstract class ICE_Policy extends ICE_Base
{
	/**
	 * @var array
	 */
	static private $instances = array();

	/**
	 * @var string
	 */
	static protected $calling_class;

	/**
	 * @var ICE_Registry
	 */
	private $registry;

	/**
	 * @var ICE_Factory
	 */
	private $factory;
	
	/**
	 * @var ICE_Renderer
	 */
	private $renderer;

	/**
	 * @internal
	 */
	final protected function __construct()
	{
		// singleton
	}

	/**
	 * Get policy instance
	 *
	 * @param string $class Return policy instance which is instance of this class
	 * @return ICE_Policy
	 */
	static public function instance( $class = null )
	{
		// is this a lookup?
		if ( $class ) {
			foreach ( self::$instances as $instance ) {
				if ( $instance instanceof $class ) {
					return $instance;
				}
			}
		} else {
			// create new instance?
			if ( !isset( self::$instances[ self::$calling_class ] ) ) {
				self::$instances[ self::$calling_class ] = new self::$calling_class();
			}
			// return it
			return self::$instances[ self::$calling_class ];
		}
	}

	/**
	 * Return array of all policy instances
	 * 
	 * @return array 
	 */
	final static public function all()
	{
		$all = array();
		$options_class = null;
		$options_policy = null;

		foreach( self::$instances as $class => $policy ) {
			if ( $policy instanceof ICE_Option_Policy ) {
				$options_class = $class;
				$options_policy = $policy;
			} else {
				$all[$class] = $policy;
			}
		}
		
		if ( $options_class ) {
			$all[ $options_class ] = $options_policy;
		}

		return $all;
	}

	/**
	 * @return ICE_Feature_Policy
	 */
	final static public function features()
	{
		return self::instance( 'ICE_Feature_Policy' );
	}

	/**
	 * @return ICE_Widget_Policy
	 */
	final static public function widgets()
	{
		return self::instance( 'ICE_Widget_Policy' );
	}

	/**
	 * @return ICE_Option_Policy
	 */
	final static public function options()
	{
		return self::instance( 'ICE_Option_Policy' );
	}

	/**
	 * @return ICE_Screen_Policy
	 */
	final static public function screens()
	{
		return self::instance( 'ICE_Screen_Policy' );
	}

	/**
	 * @return ICE_Section_Policy
	 */
	final static public function sections()
	{
		return self::instance( 'ICE_Section_Policy' );
	}

	/**
	 * @return ICE_Shortcode_Policy
	 */
	final static public function shortcodes()
	{
		return self::instance( 'ICE_Shortcode_Policy' );
	}

	/**
	 * Return the name of the policy handle
	 *
	 * @param boolean $plural set to false to return singular form of handle
	 * @return string
	 */
	abstract public function get_handle( $plural = true );

	/**
	 * Return a new instance of a component registry
	 *
	 * @return ICE_Registry
	 */
	abstract public function new_registry();
	
	/**
	 * Return a new instance of a component factory
	 *
	 * @return ICE_Factory
	 */
	abstract public function new_factory();

	/**
	 * Return a new instance of a component renderer
	 *
	 * @return ICE_Renderer
	 */
	abstract public function new_renderer();

	/**
	 * Return the registry instance
	 *
	 * @return ICE_Registry
	 */
	final public function registry()
	{
		// handle empty registry
		if ( !$this->registry instanceof ICE_Registry ) {
			$this->registry = $this->new_registry();
			$this->registry->policy( $this );
		}
		return $this->registry;
	}
	
	/**
	 * Return the factory instance
	 *
	 * @return ICE_Section_Factory
	 */
	final public function factory()
	{
		if ( !$this->factory instanceof ICE_Factory ) {
			$this->factory = $this->new_factory();
			$this->factory->policy( $this );
		}
		return $this->factory;
	}

	/**
	 * Return the renderer instance
	 *
	 * @return ICE_Renderer
	 */
	final public function renderer()
	{
		if ( !$this->renderer instanceof ICE_Renderer ) {
			$this->renderer = $this->new_renderer();
			$this->renderer->policy( $this );
		}
		return $this->renderer;
	}

	/**
	 * This template method is called when this policy is enabled
	 *
	 * @return boolean
	 */
	public function finalize()
	{
		return true;
	}
}
