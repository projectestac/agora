<?php
/**
 * ICE API: widgets policy class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage widgets
 * @since 1.0
 */

ICE_Loader::load( 'base/policy' );

/**
 * Make customizing widget implementations easy
 *
 * This object is passed to each widget allowing the implementing API to
 * customize the implementation without confusing hooks and such.
 *
 * @package ICE-components
 * @subpackage widgets
 */
abstract class ICE_Widget_Policy extends ICE_Policy
{
	/**
	 * @return string
	 */
	public function get_handle( $plural = true )
	{
		return ( $plural ) ? 'widgets' : 'widget';
	}
}
