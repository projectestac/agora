<?php
/**
 * ICE API: base visitor interface file
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
 * Make performing operations on lists or trees of objects easy
 *
 * @package ICE
 * @subpackage base
 */
interface ICE_Visitor
{
	/**
	 * Visit a visitable class instance
	 *
	 * @param ICE_Visitable $visitable
	 */
	public function visit( ICE_Visitable $visitable );
}

/**
 * Implement this interface to accept visits from visitors
 *
 * @package ICE
 * @subpackage base
 */
interface ICE_Visitable
{
	/**
	 * Accept a visitor class instance
	 * 
	 * @param ICE_Visitor $visitor
	 */
	public function accept( ICE_Visitor $visitor );
}
