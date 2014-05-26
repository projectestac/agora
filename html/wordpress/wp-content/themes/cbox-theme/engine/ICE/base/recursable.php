<?php
/**
 * ICE API: base recursable class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage base
 * @since 1.0
 */

/**
 * Make identifying recursable objects easy
 *
 * @package ICE
 * @subpackage base
 */
interface ICE_Recursable
{
	/**
	 * Return an array of the object's children which are of the identical
	 * class as the object itself
	 *
	 * @return array
	 */
	public function get_children();
}
