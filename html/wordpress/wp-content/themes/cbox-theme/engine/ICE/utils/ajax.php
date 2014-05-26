<?php
/**
 * ICE API: AJAX helpers class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage utils
 * @since 1.0
 */

/**
 * Make AJAX Easy
 *
 * @package ICE
 * @subpackage utils
 */
final class ICE_Ajax extends ICE_Base
{
	/**
	 * Delimiter on which to split AJAX responses
	 */
	const RESPONSE_DELIMETER = '[[[s]]]';

	/**
	 * Print a response to an ajax request and die
	 *
	 * @param mixed $param,... Unlimited number of SCALAR values to join with the response delimeter
	 */
	public static function response()
	{
		$args = func_get_args();
		die( join( self::RESPONSE_DELIMETER, $args ) );
	}

	/**
	 * Generate a "standard" AJAX response and die
	 *
	 * A standard AJAX response for our purposes is a delimited string containing
	 * a response code, message, and content
	 *
	 * @see response
	 * @param integer $code A response code
	 * @param string $message Optional response message
	 * @param string $content Optional response content
	 * @return string
	 */
	public static function responseStd( $code, $message = null, $content = null )
	{
		return self::response( $code, $message, $content );
	}

	/**
	 * Start capturing an AJAX response
	 *
	 * @see responseEnd
	 * @return boolean
	 */
	public static function responseBegin()
	{
		return ob_start();
	}

	/**
	 * End capturing an AJAX response
	 *
	 * @see responseBegin()
	 * @param integer $code A response code
	 * @param string $message Optional response message
	 */
	public static function responseEnd( $code, $message = null )
	{
		self::response( $code, $message, ob_get_clean() );
	}
}
