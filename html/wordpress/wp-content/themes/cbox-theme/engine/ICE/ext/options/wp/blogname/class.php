<?php
/**
 * ICE API: option extensions, WP blog name class file
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
 * WP blog name option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Wp_Blogname
	extends ICE_Ext_Option_Text
{
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// init directives
		$this->title = __( 'Site Title' );
	}

	/**
	 */
	protected function get_option()
	{
		return get_option( 'blogname' );
	}

	/**
	 */
	protected function update_option( $value )
	{
		return update_option( 'blogname', $value );
	}

	/**
	 */
	protected function delete_option()
	{
		return delete_option( 'blogname' );
	}
}
