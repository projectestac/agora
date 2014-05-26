<?php
/**
 * ICE API: option extensions, colorpicker class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/text' );

/**
 * Colorpicker option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Colorpicker
	extends ICE_Ext_Option_Text
{
	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// slurp admin styles
		$this->style()
			->section( 'admin' )
			->cache( 'admin', 'admin.css' )
			->add_dep( 'ice-colorpicker' );
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		// slurp admin script
		$this->script()
			->section( 'admin' )
			->cache( 'wrapper', 'wrapper.js' )
			->add_dep( 'ice-colorpicker' );
	}

}
