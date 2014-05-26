<?php
/**
 * ICE API: sections registry
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage sections
 * @since 1.0
 */

ICE_Loader::load( 'base/registry', 'components/sections/factory' );

/**
 * Make keeping track of sections easy
 *
 * @package ICE-components
 * @subpackage sections
 */
abstract class ICE_Section_Registry extends ICE_Registry
{
	// nothing custom yet
}
