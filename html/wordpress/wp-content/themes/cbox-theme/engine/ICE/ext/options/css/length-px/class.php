<?php
/**
 * ICE API: option extensions, CSS pixels slider class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/ui/slider' );

/**
 * CSS Pixels Slider
 *
 * This option is an extension of the slider for selecting pixels
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Length_Px
	extends ICE_Ext_Option_Ui_Slider
{
	protected function init()
	{
		parent::init();

		// initialize directives
		$this->description = 'Select the number of pixels by moving the slider';
		$this->max = 5;
		$this->min = 0;
		$this->step = 1;
		$this->style_unit = 'px';
		$this->suffix = ' pixels';
		$this->title = 'Pixels';
	}
}
