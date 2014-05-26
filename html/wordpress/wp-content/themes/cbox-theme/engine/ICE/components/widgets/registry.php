<?php
/**
 * ICE API: widgets registry
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage widgets
 * @since 1.0
 */

ICE_Loader::load( 'base/registry', 'components/widgets/factory' );

/**
 * Make keeping track of widgets easy
 *
 * @package ICE-components
 * @subpackage widgets
 */
abstract class ICE_Widget_Registry extends ICE_Registry
{
	// nothing custom yet
}
