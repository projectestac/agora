<?php
/**
 * ICE API: base policeable class file
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
 * Make policy implementation easy
 *
 * Custom implementations are handled via policy objects. Any object which needs access to
 * the implementing policy must implement this interface.
 *
 * @package ICE
 * @subpackage base
 */
interface ICE_Policeable
{
	/**
	 * Return the policy
	 *
	 * @param ICE_Policy $policy
	 * @return ICE_Policy
	 */
	public function policy( ICE_Policy $policy = null );

}
