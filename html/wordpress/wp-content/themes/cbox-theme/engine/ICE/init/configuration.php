<?php
/**
 * ICE API: init configuration class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage init
 * @since 1.0
 */

ICE_Loader::load( 'init/registry' );

/**
 * Make an init configuration easy
 *
 * The main purpose for this type of map is to (eventually) prevent modification
 * of conf values to keep an accurate representation of the raw data.
 *
 * @package ICE
 * @subpackage init
 */
class ICE_Init_Config extends ICE_Init_Registry
{
	// nothing special yet
}
