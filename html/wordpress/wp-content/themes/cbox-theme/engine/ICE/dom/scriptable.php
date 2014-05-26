<?php
/**
 * ICE API: base scriptable class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage dom
 * @since 1.0
 */

ICE_Loader::load( 'dom/script' );

/**
 * Make script implementation easy
 *
 * @package ICE
 * @subpackage dom
 */
interface ICE_Scriptable
{
	/**
	 * Return script object
	 * 
	 * @return ICE_Script
	 */
	public function script();

}
