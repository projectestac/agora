<?php
/**
 * ICE API: textile class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage parsers
 * @since 1.0
 */

/**
 * Load the markdown lib
 */
require_once ICE_LIB_PATH . '/textile/classTextile.php';

/**
 * Make Textile parsing easy
 *
 * @package ICE
 * @subpackage parsers
 */
final class ICE_Textile extends ICE_Base
{
	/**
	 * Parse textile markup and return HTML
	 *
	 * @param string $text
	 * @return string
	 */
	public static function parse( $text )
	{
		$parser = new Textile();
		return $parser->TextileThis( $text );
	}
}
