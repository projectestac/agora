<?php
/**
 * ICE API: base factory class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage base
 * @since 1.0
 */

ICE_Loader::load( 'base/componentable' );

/**
 * Make creating concrete components easy
 *
 * @package ICE
 * @subpackage base
 */
abstract class ICE_Factory extends ICE_Componentable
{
	/**
	 * Component type to use when none configured
	 */
	const DEFAULT_COMPONENT_TYPE = 'default';

	/**
	 * Load a component extension
	 *
	 * Override this class to load component class files which exist outside of ICE's path
	 *
	 * @param string $ext Name of the extension
	 * @return string Name of the class which was loaded
	 */
	public function load_ext( $ext )
	{
		// expand extension name
		$ext_full = $this->policy()->get_handle() . '/' . $ext;

		// try to load it with extension loader
		return ICE_Ext_Loader::load_one( $ext_full );
	}

	/**
	 * Return an instance of a component
	 *
	 * @param string $name
	 * @param array $config
	 * @return ICE_Component
	 */
	public function create( $name, $config )
	{
		// puke on empty theme
		if ( empty( $config['theme'] ) ) {
			throw new Exception( 'Theme cannot be empty' );
		}

		// set default type if necessary
		if ( empty( $config['type'] ) ) {
			$config['type'] = self::DEFAULT_COMPONENT_TYPE;
		}

		// make sure the extension is loaded
		$class_name = $this->load_ext( $config['type'] );

		// try to create new component
		try {
			// construct it
			$component = new $class_name( $name, $config['type'], $config['theme'], $this->policy() );
			// return it
			return $component;
		// catch missing reqs exception
		} catch ( ICE_Missing_Reqs_Exception $e ) {
			// failed to create component due to missing reqs
			return false;
		}
	}

}
