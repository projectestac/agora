<?php
/**
 * ICE API: option extensions, enable/disable radio class file
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
 * Enable/Disable radio option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Toggle_Enable_Disable
	extends ICE_Ext_Option_Radio
		implements ICE_Option_Auto_Field
{
	/**
	 */
	public function load_field_options()
	{
		return array(
			true => __( 'Enable', infinity_text_domain ),
			false => __( 'Disable', infinity_text_domain )
		);
	}
}
