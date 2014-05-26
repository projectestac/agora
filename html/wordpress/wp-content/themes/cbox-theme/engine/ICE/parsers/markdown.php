<?php
/**
 * ICE API: markdown class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage parsers
 * @since 1.0
 */

if ( false === defined( 'MARKDOWN_WP_POSTS' ) ) {
	/**
	 * Disable automatic WP post parsing.
	 * @internal
	 */
	define( 'MARKDOWN_WP_POSTS', false );
}

if ( false === defined( 'MARKDOWN_WP_COMMENTS' ) ) {
	/**
	 * Disable automatic WP comment parsing.
	 * @internal
	 */
	define( 'MARKDOWN_WP_COMMENTS', false );
}

/**
 * Make Markdown parsing easy
 *
 * @package ICE
 * @subpackage parsers
 */
final class ICE_Markdown extends ICE_Base
{
	/**
	 * Initialize, load requirements
	 */
	public static function init()
	{
		// check if markdown parser lib has not been loaded yet
		if ( false === class_exists( 'Markdown_Parser' ) ) {
			/**
			 * Load the markdown lib
			 */
			require_once ICE_LIB_PATH . '/markdown/markdown.php';
		}
	}

	/**
	 * Parse markdown markup and return HTML
	 *
	 * @param string $text
	 * @return string
	 */
	public static function parse( $text )
	{
		// run init
		self::init();

		// parse text
		return Markdown( $text );
	}
}
