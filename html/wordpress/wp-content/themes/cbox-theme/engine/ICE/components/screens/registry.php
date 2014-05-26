<?php
/**
 * ICE API: screens registry
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage screens
 * @since 1.0
 */

ICE_Loader::load( 'base/registry', 'components/screens/factory' );

/**
 * Make keeping track of screens easy
 *
 * @package ICE-components
 * @subpackage screens
 */
abstract class ICE_Screen_Registry extends ICE_Registry
{
	// nothing custom yet
}
