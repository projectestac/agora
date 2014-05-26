<?php
/**
 * ICE API: option extensions, CSS border width slider class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/css/length-px' );

/**
 * CSS Border Width Slider
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Border_Width
	extends ICE_Ext_Option_Css_Length_Px
{
	protected function init()
	{
		parent::init();

		// initialize directives
		$this->title = 'Border Width';
		$this->description = 'Select the width of the border by moving the slider';
		$this->style_property = 'border-width';
	}
}
