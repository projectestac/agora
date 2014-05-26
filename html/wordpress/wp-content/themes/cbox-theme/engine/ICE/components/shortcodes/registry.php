<?php
/**
 * ICE API: shortcodes registry
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage shortcodes
 * @since 1.0
 */

ICE_Loader::load( 'base/registry', 'components/shortcodes/factory' );

/**
 * Make keeping track of shortcodes easy
 *
 * @package ICE-components
 * @subpackage shortcodes
 */
abstract class ICE_Shortcode_Registry extends ICE_Registry
{
	// nothing custom yet
}
