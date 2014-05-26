<?php
/**
 * ICE API: option extensions, text class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/input' );

/**
 * Text option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Text
	extends ICE_Ext_Option_Input
{
	/**
	 */
	protected function init()
	{
		parent::init();
		$this->input_type( 'text' );
	}
}
