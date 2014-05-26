<?php
/**
 * ICE API: base registry
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage base
 * @since 1.0
 */

ICE_Loader::load(
	'base/componentable',
	'base/visitable',
	'init/configuration',
	'utils/export'
);

/**
 * Make keeping track of concrete components
 *
 * @package ICE
 * @subpackage base
 */
abstract class ICE_Registry extends ICE_Componentable implements ICE_Visitable
{
	/**
	 * Sub option delimeter
	 */
	const SUB_OPTION_DELIM = '.';

	/**
	 * Sub option glue
	 */
	const SUB_OPTION_GLUE = '_';

	/**
	 * Name of the theme currently being loaded
	 *
	 * @var string
	 */
	static private $theme_scope;

	/**
	 * Registered components array
	 *
	 * @var array
	 */
	private $components = array();

	/**
	 */
	public function accept( ICE_Visitor $visitor )
	{
		foreach ( $this->components as $component ) {
			$component->accept( $visitor );
		}
	}

	/**
	 * Init ajax requirements
	 */
	public function init_ajax()
	{
		// init ajax for each registered component
		foreach ( $this->get_all() as $component ) {
			if ( $component->supported() ) {
				$component->init_ajax();
			}
		}
	}

	/**
	 * Init screen dependencies for all applicable components to be rendered
	 */
	public function init_screen()
	{
		add_action( 'ice_init_styles', array($this, 'init_styles') );
		add_action( 'ice_init_scripts', array($this, 'init_scripts') );
		
		// init screen for each registered component
		foreach ( $this->get_all() as $component ) {
			if ( $component->supported() ) {
				$component->init_screen();
			}
		}
	}

	/**
	 * Enqueue required styles
	 */
	public function init_styles()
	{
		foreach ( $this->get_all() as $component ) {
			if ( $component->supported() ) {
				$component->init_styles();
			}
		}
	}

	/**
	 * Enqueue required scripts
	 */
	public function init_scripts()
	{
		// init scripts for each registered component
		foreach ( $this->get_all() as $component ) {
			if ( $component->supported() ) {
				$component->init_scripts();
			}
		}
	}

	/**
	 * Template method to allow localization of scripts
	 */
	protected function localize_script() {}

	/**
	 * Register a component
	 *
	 * @param ICE_Component $component
	 * @return boolean
	 */
	final protected function register( ICE_Component $component )
	{
		// has the component already been registered?
		if ( !isset( $this->components[ $component->property( 'name' ) ] ) ) {
			// register it
			$this->components[ $component->property( 'name' ) ] = $component;
		}

		return true;
	}

	/**
	 * Normalize a component name which may have "dots" in it
	 *
	 * @param string $name
	 * @return string
	 */
	final protected function normalize_name( $name )
	{
		if ( strpos( $name, self::SUB_OPTION_DELIM ) !== false ) {
			return str_replace( self::SUB_OPTION_DELIM, self::SUB_OPTION_GLUE, $name );
		}

		return $name;
	}

	/**
	 * Returns true if a component has been registered
	 *
	 * @param string $name
	 * @return boolean
	 */
	final public function has( $name )
	{
		// normalize name
		$name = $this->normalize_name( $name );

		// call contains method of map class
		return isset( $this->components[ $name ] );
	}

	/**
	 * Return a registered component object by name
	 *
	 * @param string $name
	 * @return ICE_Component
	 */
	final public function get( $name )
	{
		// normalize name
		$name = $this->normalize_name( $name );

		// check registry
		if ( isset( $this->components[ $name ] ) ) {
			// from top of stack
			return $this->components[ $name ];
		}

		// didn't find it
		throw new Exception( sprintf( 'Unable to get component "%s": not registered', $name ) );
	}

	/**
	 * Return all registered components as an array
	 *
	 * @param boolean $include_ignored Set to true to also return components which have ignore set to true
	 * @return array
	 */
	final public function get_all( $include_ignored = false )
	{
		// components to return
		$components = array();

		// loop through and compare names
		foreach ( $this->components as $component ) {
			// include ignored?
			if ( !$include_ignored ) {
				// check ignore toggle
				if ( $component->property( 'ignore' ) ) {
					// component is explicitly ignored
					continue;
				} elseif ( $component->property( 'parent' ) && $component->parent()->property( 'ignore' ) ) {
					// component parent is ignored, applies to this child
					continue;
				}
			}
			// add to array
			$components[] = $component;
		}

		// return them
		return $components;
	}

	/**
	 * Return all registered child components of a component
	 *
	 * This adheres to parent settings in the component ini file
	 *
	 * @param ICE_Component $component The component object whose children you want to get
	 * @return array
	 */
	public function get_children( ICE_Component $component )
	{
		// the components that will be returned
		$components = array();

		// find all registered component where parent is the target component
		foreach ( $this->get_all() as $component_i ) {
			if ( $component->is_parent_of( $component_i ) ) {
				$components[] = $component_i;
			}
		}

		return $components;
	}

	/**
	 * Get components that should behave as a root component
	 *
	 * This method mostly exists as a helper to use when rendering menus
	 *
	 * @param array $component_names An array of component names to include, defaults to all
	 * @return array
	 */
	public function get_roots( $component_names = array() )
	{
		// components to be returned
		$components = array();

		// loop through all registered components
		foreach ( $this->get_all() as $component ) {
			// components must NOT have a parent set
			if ( null === $component->property( 'parent' ) ) {
				// filter on component names
				if ( empty( $component_names ) || in_array( $component->property( 'name' ), $component_names, true ) ) {
					// component must be supported
					if ( $component->supported() ) {
						// append to return array
						$components[] = $component;
					}
				}
			}
		}

		return $components;
	}

	/**
	 * Load directives from an ini file
	 *
	 * @uses parse_ini_file()
	 * @param string $filename Absolute path to the component ini file to parse
	 * @param string $theme The theme to assign the parsed directives to
	 * @return boolean
	 */
	final public function load_config_file( $filename, $theme )
	{
		// try to parse the file into INI sections
		$sections = parse_ini_file( $filename, true );

		// get a config?
		if ( $sections ) {
			// set the current theme being loaded
			self::$theme_scope = $theme;
			// load all parsed sections
			$result = $this->load_config_sections( $sections );
			// remove theme scope
			self::$theme_scope = null;
			// all done
			return $result;
		}

		return false;
	}

	/**
	 * Load components into registry from an array (of parsed ini sections)
	 *
	 * @param array $sections_array
	 * @return boolean
	 */
	final protected function load_config_sections( $sections_array )
	{
		// must have a non-empty array
		if ( is_array( $sections_array ) && count( $sections_array ) ) {
			// loop through each section
			foreach ( $sections_array as $section_name => $section_array ) {
				// load one section
				$this->load_config_section( $section_name, $section_array );
			}
			// all done
			return true;
		}

		return false;
	}

	/**
	 * Load one component into registry from a single parsed ini section (array)
	 *
	 * @param string $section_name
	 * @param array $section_array
	 * @return boolean
	 */
	protected function load_config_section( $section_name, $section_array )
	{
		return $this->load_config_map( $section_name, $section_array );
	}

	/**
	 * Load one component given its name and config array
	 *
	 * @param string $name
	 * @param array $config_array
	 * @return boolean
	 */
	final protected function load_config_map( $name, $config_array )
	{
		// normalize name
		$name = $this->normalize_name( $name );
		
		// push theme onto config
		$config_array['theme'] = self::theme_scope();

		// check if already registered
		if ( isset( $this->components[ $name ] ) ) {
			// use that one
			$component = $this->components[ $name ];
		} else {
			// use factory to create new component
			$component =
				$this->policy()->factory()->create(
					$name,
					$config_array
				);
			// make sure we got a valid component
			if ( $component instanceof ICE_Component ) {
				// register component
				$this->register( $component );
			} else {
				// did not get a component, nothing to do
				// TODO might want to throw an exception here, this is pretty bad juju
				return false;
			}
		}

		// push configuration
		$component->config_array( $config_array );

		// post registration
		if ( $component->supported() ) {
			$component->init_registered();
		}

		return true;
	}

	/**
	 * Perform final setup steps
	 */
	final public function finalize()
	{
		foreach ( $this->components as $component ) {
			$component->finalize();
		}
	}

	/**
	 * Return the current theme scope
	 *
	 * @return string
	 */
	final static public function theme_scope()
	{
		// if the theme scope is needed, then its assumed that some kind of
		// loading or component creation is happening. since theme scope
		// is required for these procedures, throw an error
		// if theme scope is null
		if ( empty( self::$theme_scope ) ) {
			throw new Exception( 'The theme scope is empty, something went horribly wrong!' );
		}

		// return the current theme scope
		return self::$theme_scope;
	}

	/**
	 * Format a suboption using the glue string
	 *
	 * @param string $comp_name
	 * @param string $option_name
	 * @return string
	 */
	final static public function format_suboption( $comp_name, $option_name )
	{
		// join the two strings with the glue character
		return $comp_name . self::SUB_OPTION_GLUE . $option_name;
	}
}
