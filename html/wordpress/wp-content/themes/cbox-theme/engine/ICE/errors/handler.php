<?php
/**
 * ICE API: error handler class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage errors
 * @since 1.0
 */

// partial page report relies on output buffering
ob_start();

// devs can override this to generate a custom friendly error page
if ( !defined( 'ICE_ERROR_PAGE_PATH' ) && ICE_ERROR_REPORTING == false ) {
	define( 'ICE_ERROR_PAGE_PATH', dirname( __FILE__ ) . '/error.php' );
}

// devs can override this to generate a custom friendly AJAX error message
if ( !defined( 'ICE_ERROR_AJAX_MESSAGE' ) && ICE_ERROR_REPORTING == false ) {
	define( 'ICE_ERROR_AJAX_MESSAGE', 'Oops! An error has occurred. You can customize this message!' );
}

// set up error handling
set_error_handler(
	array( 'ICE_Error_Handler', 'handle_error' ),
	error_reporting()
);

// set up exception handling
set_exception_handler(
	array( 'ICE_Error_Handler', 'handle_exception' )
);

/**
 * Make handling errors easy.
 *
 * If we are in this class, we must assume that the application
 * is in an unstable state. We cannot depend on any other classes or
 * objects to help with the error processing.
 *
 * Most of this class has been adapted from the QErrorHandler class which
 * is part of the Qcodo framework.
 *
 * The variable dumping methods of this class were adapted from
 * the CVarDumper class from the Yii Framework.
 * 
 * @link http://www.qcodo.com/
 * @copyright Copyright (c) 2001 - 2011, Quasidea Development, LLC
 * @license http://www.opensource.org/licenses/mit-license.php
 *
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 *
 * @package ICE
 * @subpackage errors
 */
class ICE_Error_Handler
{
	// Static Properties that should always be set on any error
	public static $type;
	public static $message;
	public static $object_type;
	public static $filename;
	public static $line_number;
	public static $stack_trace;

	// Properties that are calculated based on the error information above
	public static $file_lines_array;
	public static $message_body;

	// Static Properties that can be optionally set
	public static $rendered_page;
	public static $error_attribute_array = array();
	public static $additional_message;

	// date/time Properties
	public static $date_time_of_error;
	public static $iso_date_time_of_error;

	// dump properties
	private static $dump_objects;
	private static $dump_output;
	private static $dump_depth;

	/**
	 * Run!
	 *
	 * @return void
	 */
	protected static function run()
	{
		// Get the RenderedPage (if applicable)
		if ( ob_get_length() ) {
			self::$rendered_page = ob_get_contents();
			ob_clean();
		}

		// Setup the FileLinesArray
		if ( is_file( self::$filename ) ) {
			self::$file_lines_array = file( self::$filename );
		} elseif ( strpos( self::$filename, 'eval()' ) !== false ) {
			self::$file_lines_array = array( 'File listing unavailable; eval()\'d code' );
		} else {
			self::$file_lines_array = array( 'File Not Found: ' . self::$filename );
		}

		// set up the message body
		if ( self::$additional_message ) {
			self::$message_body =
				htmlentities( self::$additional_message ) . '<br>' .
				htmlentities( self::$message );
		} else {
			self::$message_body =
				htmlentities( self::$message );
		}

		// replace spaces with non-breaking spaces
		self::$message_body =
			str_replace( " ", "&nbsp;", str_replace( "\n", "<br>\n", self::$message_body ) );

		// this makes a bit cleaner format
		self::$message_body =
			str_replace( ":&nbsp;", ": ", self::$message_body );

		// determine datetime
		$microtime = microtime();
		$microtime_parts = explode( ' ', $microtime );
		$microtime = substr( $microtime_parts[0], 2 );
		$timestamp = $microtime_parts[1];

		// assign time info to local props
		self::$date_time_of_error = date( 'l, F j Y, g:i:s.' . $microtime . ' A T', $timestamp );
		self::$iso_date_time_of_error = date( 'Y-m-d H:i:s T', $timestamp );

		// cleanup
		unset($microtime);
		unset($microtime_parts);
		unset($microtime);
		unset($timestamp);

		// generate the error dump
		if ( !ob_get_level() ) {
			ob_start();
		}

		// special ajax handling
		if ( ICE_AJAX_REQUEST ) {

			// reset the buffer
			while( ob_get_level() ) {
				ob_end_clean();
			}

			// setup the friendly response
			header('Content-Type: text/html');

			// spit out the error
			print '0[[[s]]]';

			// spit out message?
			if ( defined( 'ICE_ERROR_AJAX_MESSAGE' ) ) {
				// spit out customizable error
				print ICE_ERROR_AJAX_MESSAGE;
			} else {
				// spit out default error
				print 'An error has occured. Spitting out debug info is on our TODO list!';
			}

		} else {

			// wicked bad error there, kid
			header( 'HTTP/1.1 500 Internal Server Error' );

			// load error page if defined
			if ( defined('ICE_ERROR_PAGE_PATH') && ICE_ERROR_PAGE_PATH ) {

				// reset the buffer
				while( ob_get_level() ) {
					ob_end_clean();
				}

				// load the error page
				require ICE_ERROR_PAGE_PATH;

			} else {

				// load dump template
				require dirname( __FILE__ ) . '/dump.php';
				
			}
		}

		exit();
	}

	/**
	 * Prepare data for being passed as string via javascript
	 *
	 * @param string $data
	 * @return type 
	 */
	public static function prep_data_for_script( $data )
	{
		$data = str_replace( "\\", "\\\\", $data );
		$data = str_replace( "\n", "\\n", $data );
		$data = str_replace( "\r", "\\r", $data );
		$data = str_replace( "\"", "&quot;", $data );
		$data = str_ireplace( "</script>", "&lt/script&gt", $data );

		return $data;
	}

	/**
	 * Handle an exception
	 *
	 * @param Exception $exception
	 * @return void
	 */
	public static function handle_exception( Exception $exception )
	{
		// if we are currently dealing with reporting an error, don't continue
		if ( self::$type ) {
			return;
		}

		// get reflection of the exception
		$reflection = new ReflectionObject( $exception );

		// set local properties
		self::$type = 'Exception';
		self::$message = $exception->getMessage();
		self::$object_type = $reflection->getName();
		self::$filename = $exception->getFile();
		self::$line_number = $exception->getLine();
		self::$stack_trace = trim( $exception->getTraceAsString() );

		self::run();
	}

	/**
	 * Handle a standard PHP error
	 *
	 * @param integer $error_number
	 * @param string $error_string
	 * @param string $error_file
	 * @param integer $error_line
	 * @return void
	 */
	public static function handle_error( $error_number, $error_string, $error_file, $error_line )
	{
		// if a command is called with "@", then we should return
		if ( error_reporting() == 0 ) {
			return;
		}

		// if we are currently dealing with reporting an error, don't go on
		if ( self::$type ) {
			return;
		}

		// setup this error object
		self::$type = 'Error';
		self::$message = $error_string;
		self::$filename = $error_file;
		self::$line_number = $error_line;

		// set object type based on error code
		switch ( $error_number ) {
			case E_ERROR:
				self::$object_type = 'E_ERROR';
				break;
			case E_WARNING:
				self::$object_type = 'E_WARNING';
				break;
			case E_PARSE:
				self::$object_type = 'E_PARSE';
				break;
			case E_NOTICE:
				self::$object_type = 'E_NOTICE';
				break;
			case E_STRICT:
				self::$object_type = 'E_STRICT';
				break;
			case E_CORE_ERROR:
				self::$object_type = 'E_CORE_ERROR';
				break;
			case E_CORE_WARNING:
				self::$object_type = 'E_CORE_WARNING';
				break;
			case E_COMPILE_ERROR:
				self::$object_type = 'E_COMPILE_ERROR';
				break;
			case E_COMPILE_WARNING:
				self::$object_type = 'E_COMPILE_WARNING';
				break;
			case E_USER_ERROR:
				self::$object_type = 'E_USER_ERROR';
				break;
			case E_USER_WARNING:
				self::$object_type = 'E_USER_WARNING';
				break;
			case E_USER_NOTICE:
				self::$object_type = 'E_USER_NOTICE';
				break;
			case E_DEPRECATED:
				self::$object_type = 'E_DEPRECATED';
				break;
			case E_USER_DEPRECATED:
				self::$object_type = 'E_USER_DEPRECATED';
				break;
			case E_RECOVERABLE_ERROR:
				self::$object_type = 'E_RECOVERABLE_ERROR';
				break;
			default:
				self::$object_type = 'Unknown';
				break;
		}

		// setup the stack trace
		self::$stack_trace = "";

		// capture back trace
		$back_trace = debug_backtrace();

		// loop entire trace stack
		for ( $index = 0; $index < count( $back_trace ); $index++ ) {

			// current item
			$item = $back_trace[$index];

			// determine keys
			$key_file = ( array_key_exists( 'file', $item ) ) ? $item['file'] : '';
			$key_line = ( array_key_exists ('line', $item ) ) ? $item['line'] : '';
			$key_class = ( array_key_exists( 'class', $item ) ) ? $item['class'] : '';
			$key_type = ( array_key_exists( 'type', $item ) ) ? $item['type'] : '';
			$key_function = ( array_key_exists( 'function', $item ) ) ? $item['function'] : '';

			// append to stack trace report
			self::$stack_trace .=
				sprintf(
					"#%s %s(%s): %s%s%s()\n",
					$index,
					$key_file,
					$key_line,
					$key_class,
					$key_type,
					$key_function
				);
		}

		self::run();
	}

	/**
	 * Displays a variable.
	 *
	 * This method achieves the similar functionality as var\_dump and print\_r
	 * but is more robust when handling complex objects.
	 * 
	 * @param mixed $var variable to be dumped
	 * @param integer $depth maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param boolean $highlight whether the result should be syntax-highlighted
	 */
	public static function dump( $var, $depth=10, $highlight=false )
	{
		echo self::dump_as_string( $var, $depth, $highlight );
	}

	/**
	 * Dumps a variable in terms of a string.
	 *
	 * This method achieves the similar functionality as var\_dump and print\_r
	 * but is more robust when handling complex objects.
	 * 
	 * @param mixed $var variable to be dumped
	 * @param integer $depth maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param boolean $highlight whether the result should be syntax-highlighted
	 * @return string the string representation of the variable
	 */
	public static function dump_as_string( $var, $depth=10, $highlight=false )
	{
		self::$dump_output = '';
		self::$dump_objects = array( );
		self::$dump_depth = $depth;
		self::dump_internal( $var, 0 );

		if ( $highlight ) {
			$result = highlight_string( "<?php\n" . self::$dump_output, true );
			self::$dump_output = preg_replace( '/&lt;\\?php<br \\/>/', '', $result, 1 );
		}

		return self::$dump_output;
	}

	/*
	 * @param mixed $var variable to be dumped
	 * @param integer $level depth level
	 */
	private static function dump_internal( $var, $level )
	{
		switch ( gettype( $var ) ) {
			case 'boolean':
				self::$dump_output .= $var ? 'true' : 'false';
				break;
			case 'integer':
				self::$dump_output .= "$var";
				break;
			case 'double':
				self::$dump_output .= "$var";
				break;
			case 'string':
				self::$dump_output .= "'" . addslashes( $var ) . "'";
				break;
			case 'resource':
				self::$dump_output .= '{resource}';
				break;
			case 'NULL':
				self::$dump_output .= "null";
				break;
			case 'unknown type':
				self::$dump_output .= '{unknown}';
				break;
			case 'array':
				if ( self::$dump_depth <= $level )
					self::$dump_output .= 'array(...)';
				else if ( empty( $var ) )
					self::$dump_output .= 'array()';
				else {
					$keys = array_keys( $var );
					$spaces = str_repeat( ' ', $level * 4 );
					self::$dump_output .= "array\n" . $spaces . '(';
					foreach ( $keys as $key ) {
						$key2 = str_replace( "'", "\\'", $key );
						self::$dump_output .= "\n" . $spaces . "    '$key2' => ";
						self::$dump_output .= self::dump_internal( $var[$key], $level + 1 );
					}
					self::$dump_output .= "\n" . $spaces . ')';
				}
				break;
			case 'object':
				if ( ($id = array_search( $var, self::$dump_objects, true )) !== false )
					self::$dump_output .= get_class( $var ) . '#' . ($id + 1) . '(...)';
				else if ( self::$dump_depth <= $level )
					self::$dump_output .= get_class( $var ) . '(...)';
				else {
					$id = array_push( self::$dump_objects, $var );
					$className = get_class( $var );
					$members = (array) $var;
					$spaces = str_repeat( ' ', $level * 4 );
					self::$dump_output .= "$className#$id\n" . $spaces . '(';
					foreach ( $members as $key => $value ) {
						$keyDisplay = strtr( trim( $key ), array( "\0" => ':' ) );
						self::$dump_output .= "\n" . $spaces . "    [$keyDisplay] => ";
						self::$dump_output .= self::dump_internal( $value, $level + 1 );
					}
					self::$dump_output .= "\n" . $spaces . ')';
				}
				break;
		}
	}
}

/**
 * Make error attributes easy
 *
 * This class has been adapted from the QErrorAttribute class which
 * is part of the Qcodo framework.
 *
 * @package ICE
 * @subpackage errors
 * @link http://www.qcodo.com/
 * @copyright Copyright (c) 2001 - 2011, Quasidea Development, LLC
 * @license http://www.opensource.org/licenses/mit-license.php
 */
class ICE_Error_Attribute
{
	/**
	 * Label
	 *
	 * @var string
	 */
	public $label;

	/**
	 * Contents
	 *
	 * @var string
	 */
	public $contents;

	/**
	 * Multi line
	 *
	 * @var boolean
	 */
	public $multiline;

	/**
	 * @param string $label
	 * @param string $contents
	 * @param boolean $multiline
	 */
	public function __construct( $label, $contents, $multiline )
	{
		$this->label = $label;
		$this->contents = $contents;
		$this->multiline = $multiline;
	}
}
