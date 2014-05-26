<?php
/**
 * ICE API: base javascript class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage dom
 * @since 1.0
 */

ICE_Loader::load( 'dom/asset' );

/**
 * Make scripts for components easy
 *
 * @package ICE
 * @subpackage dom
 */
class ICE_Script extends ICE_Asset
{
	/**
	 * Keep track of objects for debugging
	 *
	 * @var integer
	 */
	private static $next_token = 1;

	/**
	 * The token of this object
	 *
	 * @var integer
	 */
	private $token;
	
	/**
	 * The blocks of logic
	 *
	 * @var array
	 */
	private $logic_stack = array();

	/**
	 * Constructor
	 */
	public function __construct( ICE_Component $component = null )
	{
		parent::__construct( $component );

		// set token and bump it
		$this->token = self::$next_token++;
	}

	/**
	 */
	final public function enqueue( $handle )
	{
		wp_enqueue_script( $handle );
	}

	/**
	 * Create and return a new logic object
	 *
	 * @param string $code valid javascript code
	 * @return ICE_Script_Logic
	 */
	public function logic( $code = null )
	{
		// new logic object
		$logic = new ICE_Script_Logic( $code );
		
		// add it to logic stack
		$this->logic_stack[] = $logic;

		return $logic;
	}

	/**
	 * Begin new logic string
	 */
	public function begin_logic()
	{
		ob_start();
	}

	/**
	 * End logic string
	 *
	 * @return ICE_Script_Logic
	 */
	public function end_logic()
	{
		// add contents of output buffer to new logic object and return it
		return $this->logic( ob_get_clean() );
	}

	/**
	 * Generate javascript markup for this script's dynamic code
	 *
	 * @return string
	 */
	public function export()
	{
		// the markup that will be returned
		$code = parent::export();

		// render rules
		if ( count( $this->logic_stack ) ) {
			
			// begin script generation
			$code .= sprintf( '/*+++ begin script: %s */', $this->token ) . PHP_EOL;
			
			// loop all logic objects
			foreach ( $this->logic_stack as $logic ) {
				// append output of logic export
				$code .= $logic->export();
			}
			
			// end script generation
			$code .= sprintf( '/*+++ end script: %s */', $this->token ) . PHP_EOL . PHP_EOL;
		}

		// all done
		return $code;
	}
}

/**
 * Make dynamic logic for scripts easy
 *
 * @property boolean $alias
 * @property boolean $ready
 * @property boolean|string $function
 * @package ICE
 * @subpackage dom
 */
class ICE_Script_Logic extends ICE_Base
{
	/**
	 * Keep track of objects for debugging
	 *
	 * @var integer
	 */
	private static $next_token = 1;

	/**
	 * The token of this object
	 *
	 * @var integer
	 */
	private $token;
	
	/**
	 * Set to true to wrap this logic block with the dollar sign alias
	 *
	 * @var boolean
	 */
	private $alias = false;

	/**
	 * Set to true to wrap this logic block in on document ready method
	 * 
	 * @var boolean 
	 */
	private $ready = false;

	/**
	 * Set to a string which is a valid function name to
	 * wrap this logic block *as* a function.
	 *
	 * @var string
	 */
	private $function = null;

	/**
	 * The dynamic variables
	 *
	 * @var array
	 */
	private $variables = array();

	/**
	 * The logic to print
	 * 
	 * @var string 
	 */
	private $logic;

	/**
	 * Constructor
	 *
	 * @param string $logic Intial logic
	 */
	public function __construct( $logic = null )
	{
		// set token and bump it
		$this->token = self::$next_token++;

		// assign any initial logic
		$this->logic = $logic;
	}

	/**
	 */
	public function get_property( $name )
	{
		switch ( $name ) {
			case 'alias':
			case 'ready':
			case 'function':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}

	/**
	 */
	protected function set_property( $name, $value )
	{
		switch ( $name ) {
			case 'alias':
			case 'ready':
				$this->$name = (boolean) $value;
				break;
			case 'function':
				$this->function = is_bool( $value ) ? $value : trim( $value );
				break;
			default:
				return parent::set_property( $name, $value );
		}

		// chain it
		return $this;
	}

	/**
	 * Add a variable
	 *
	 * @param string $name
	 * @param mixed $value
	 * @param boolean $nulls
	 */
	public function add_variable( $name, $value, $nulls = false )
	{
		if ( null !== $value || $nulls ) {
			$this->variables[ $name ] = $value;
		}
	}

	/**
	 * Add a variable (shorthand)
	 *
	 * @param string $name
	 * @param mixed $value
	 * @param boolean $nulls
	 */
	public function av( $name, $value, $nulls = false )
	{
		return $this->add_variable( $name, $value, $nulls );
	}

	/**
	 * Export all variables
	 *
	 * @param boolen $object Set to true to return as an object
	 */
	public function export_variables( $object = false )
	{
		// skip if no variables
		if ( count( $this->variables ) < 1 ) {
			return null;
		}
		
		// formatted variable statements
		$vars = array();
		
		// add each variable
		foreach ( $this->variables as $name => $value ) {
			// format the var
			switch ( true ) {
				case is_numeric( $value ):
					$vars[$name] = $value;
					break;
				case is_bool( $value ):
					$vars[$name] = ( $value ) ? 'true' : 'false';
					break;
				case ( null === $value ):
					$vars[$name] = 'null';
					break;
				case is_string( $value ):
					if ( $this->is_object_literal( $value ) ) {
						$vars[$name] = $value;
					} else {
						$vars[$name] = sprintf( "'%s'", $value );
					}
					break;
				case is_array( $value ):
					$vars[$name] = sprintf( "['%s']", implode( "','", $value ) );
					break;
			}
		}

		// assignment operator
		$operator = ($object) ? ':' : '=';

		// formatted var expressions
		$vars_f = array();

		// loop all vars and format them
		foreach( $vars as $var_name => $var_val ) {
			// object properties must be quoted
			if ( $object ) {
				$var_name = sprintf( "'%s'", $var_name );
			}
			// push onto array
			array_push( $vars_f, $var_name . $operator . $var_val );
		}

		// return complete expression
		if ( $object ) {
			return sprintf( '{%s}', implode( ',', $vars_f ) );
		} else {
			return sprintf( 'var %s;', implode( ',', $vars_f ) );
		}
	}

	/**
	 * Generate javascript code for this logic
	 *
	 * @return string
	 */
	public function export()
	{
		// begin logic generation
		$code = sprintf( '/*+++ begin logic: %s */', $this->token ) . PHP_EOL;

		// wrap with alias?
		if ( $this->alias ) {
			$code .= '(function($){' . PHP_EOL;
		}

		// on doc ready?
		if ( $this->ready ) {
			$alias = ( $this->alias ) ? '$' : 'jQuery';
			$code .= $alias . '(document).ready(function() {' . PHP_EOL;
		}

		// wrap with function?
		if ( $this->function ) {
			// anonymous function?
			if ( $this->function === true ) {
				$code .= sprintf( 'jQuery(function(){', $this->function ) . PHP_EOL;
			} else {
				$code .= sprintf( 'function %s(){', $this->function ) . PHP_EOL;
			}
		}

		// add variables
		$code .= $this->export_variables();

		// add logic
		if ( $this->logic ) {
			$code .= $this->logic . PHP_EOL;
		}

		// close function?
		if ( $this->function ) {
			// anonymous?
			if ( $this->function === true ) {
				$code .= '});' . PHP_EOL;
			} else {
				$code .= '}' . PHP_EOL;
			}
		}

		// close on doc ready?
		if ( $this->ready ) {
			$code .= '});' . PHP_EOL;
		}
		
		// close alias?
		if ( $this->alias ) {
			$code .= '})(jQuery);' . PHP_EOL;
		}
		
		// end logic generation
		$code .= sprintf( '/*+++ end logic: %s */', $this->token ) . PHP_EOL;

		// all done
		return $code;
	}

	/**
	 * Returns true if string is *probably* an object literal
	 *
	 * @param string $string
	 * @return boolean
	 */
	protected function is_object_literal( $string )
	{
		// make sure its a string
		if ( is_string( $string ) ) {
			// its a string, trim it
			$trimmed = trim( $string );
			// check first and last char for matching curly braces
			if ( substr( $trimmed, 0, 1 ) == '{' && substr( $trimmed, -1, 1 ) == '}' ) {
				// string starts and ends with matching braces
				return true;
			}
		}

		// nope
		return false;
	}
}
