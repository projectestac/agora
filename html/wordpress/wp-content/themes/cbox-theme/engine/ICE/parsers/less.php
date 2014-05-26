<?php
/**
 * ICE API: less parser class file
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
 * Which LESS parsing engine to use
 */
if ( !defined( 'ICE_LESS_PARSER' ) ) {
	define( 'ICE_LESS_PARSER', 'lessphp' );
}

/**
 * Make LESS parsing easy
 *
 * @package ICE
 * @subpackage parsers
 */
final class ICE_Less extends ICE_Base
{
	/**
	 * Parse LESS markup and return stylesheet
	 *
	 * @param string $text
	 * @param string|array $import_dir
	 * @return string
	 */
	public static function parse( $text, $import_dir = null )
	{
		switch ( ICE_LESS_PARSER ) {
			// lessphp
			case 'lessphp':
				return self::lessphp( $text, $import_dir );
			default:
				throw new Exception( sprintf( 'The "%s" parser is not supported' ) );
		}
	}

	/**
	 * Parse LESS markup using the lessphp library
	 *
	 * @param string $text
	 * @param string|array $import_dir
	 * @return string
	 */
	public static function lessphp( $text, $import_dir = null )
	{
		// load library
		require_once ICE_LIB_DIR . '/lessphp/less.inc.php';

		// new parser instance
		$less = new lessc();

		// set import dir if applicable
		if ( $import_dir ) {
			$less->importDir = $import_dir;
		}

		// parse and return it
		return $less->parse( $text );
	}
}
