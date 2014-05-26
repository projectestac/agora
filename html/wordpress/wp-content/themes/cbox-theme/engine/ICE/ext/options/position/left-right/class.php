<?php
/**
 * ICE API: option extensions, left/right radio class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/radio' );

/**
 * Left/Right radio option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Position_Left_Right
	extends ICE_Ext_Option_Radio
		implements ICE_Option_Auto_Field
{
	/**
	 */
	public function load_field_options()
	{
		return array(
			'l' => __( 'Left', infinity_text_domain ),
			'r' => __( 'Right', infinity_text_domain )
		);
	}
}
