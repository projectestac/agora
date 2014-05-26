<?php
/**
 * ICE API: option extensions, WP blog description class file
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
 * WP blog description option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Wp_Blogdescription
	extends ICE_Ext_Option_Text
{
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// init directives
		$this->title = __( 'Tagline' );
		$this->description = __( 'In a few words, explain what this site is about.' );
	}
	
	/**
	 */
	protected function get_option()
	{
		return get_option( 'blogdescription' );
	}

	/**
	 */
	protected function update_option( $value )
	{
		return update_option( 'blogdescription', $value );
	}

	/**
	 */
	protected function delete_option()
	{
		return delete_option( 'blogdescription' );
	}
}
