<?php
/**
 * ICE API: option extensions, page class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

/**
 * Page option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Page
	extends ICE_Option
{
	/**
	 * Render a page select box
	 */
	public function render_field()
	{
		$args = array(
			'depth'		=> 0,
			'child_of'	=> 0,
			'echo'		=> true,
			'selected'	=> $this->get(),
			'name'		=> $this->property( 'name' ) );

		// call the WP function
		wp_dropdown_pages( $args );
	}
}
