<?php
/**
 * ICE API: init directive class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage init
 * @since 1.0
 */

ICE_Loader::load( 'init/data', 'init/registry' );

/**
 * Make an init directive easy
 *
 * @package ICE
 * @subpackage init
 * @property-read string $name The name of the directive
 * @property mixed $value The value of the directive
 * @property-read boolean $read_only Whether the value is read only
 */
class ICE_Init_Directive extends ICE_Init_Data
{
	/**
	 */
	protected function substitute( $value )
	{
		// substitution not supported by directives
		return $value;
	}
}

/**
 * Make maps of init directives easy
 *
 * @package ICE
 * @subpackage init
 */
class ICE_Init_Directive_Registry extends ICE_Init_Registry
{
	/**
	 * @return ICE_Init_Directive 
	 */
	protected function create( $theme, $name, $value = null, $read_only = false )
	{
		return new ICE_Init_Directive( $theme, $name, $value, $read_only );
	}
}
