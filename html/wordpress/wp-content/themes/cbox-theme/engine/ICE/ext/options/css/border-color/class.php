<?php
/**
 * ICE API: option extensions, CSS border color picker class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/colorpicker' );

/**
 * CSS Border Color Picker
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Border_Color
	extends ICE_Ext_Option_Colorpicker
{
	protected function init()
	{
		parent::init();

		// initialize directives
		$this->title = 'Border Color';
		$this->description = 'Choose a color for the border';
		$this->style_property = 'border-color';
	}
}
