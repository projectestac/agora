<?php
/**
 * ICE API: base iconable class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage ui
 * @since 1.0
 */

ICE_Loader::load( 'ui/icon' );

/**
 * Make icon implementation easy
 *
 * @package ICE
 * @subpackage ui
 */
interface ICE_Iconable
{
	/**
	 * Set/Return the icon
	 *
	 * @param ICE_Icon $icon
	 * @return ICE_Icon
	 */
	public function icon( ICE_Icon $icon = null );

}
