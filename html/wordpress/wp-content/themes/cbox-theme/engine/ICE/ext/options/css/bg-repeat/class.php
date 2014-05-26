<?php
/**
 * ICE API: option extensions, css background repeat class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/select' );

/**
 * CSS background repeat option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Bg_Repeat
	extends ICE_Ext_Option_Select
{
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// init directives
		$this->title = __( 'Background Image Tiling', infinity_text_domain );
		$this->description = __( 'Set the tiling mode of the background image', infinity_text_domain );
		$this->style_property = 'background-repeat';
		$this->default_value = 'repeat';
	}
}
