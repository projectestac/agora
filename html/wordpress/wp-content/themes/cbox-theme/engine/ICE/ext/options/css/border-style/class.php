<?php
/**
 * ICE API: option extensions, css border style class file
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
 * CSS border style option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Border_Style
	extends ICE_Ext_Option_Select
{
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// init directives
		$this->title = __( 'Border Style', infinity_text_domain );
		$this->description = __( 'Choose a style for the border', infinity_text_domain );
		$this->style_property = 'border-style';
	}
}
