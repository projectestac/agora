<?php
/**
 * ICE API: base class file
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
 * Every ICE class extends this one
 *
 * @package ICE
 * @subpackage base
 */
abstract class ICE_Base
{
	/**
	 * Default magic getter
	 *
	 * @param string $name
	 * @throws Exception
	 */
	public function __get( $name )
	{
		throw new Exception(
			sprintf( 'The "%s" property does not exist (get).', $name ) );
	}

	/**
	 * Default magic setter
	 *
	 * @param string $name
	 * @param mixed $value
	 * @throws Exception
	 */
	public function __set( $name, $value )
	{
		throw new Exception(
			sprintf( 'The "%s" property does not exist (set).', $name ) );
	}

	/**
	 * Default magic issetter
	 *
	 * @param string $name
	 */
	public function __isset( $name )
	{
		throw new Exception(
			sprintf( 'The "%s" property does not exist (isset).', $name ) );
	}

	/**
	 * Default magic unsetter
	 *
	 * @param string $name
	 */
	public function __unset( $name )
	{
		throw new Exception(
			sprintf( 'The "%s" property does not exist (unset).', $name ) );
	}

	/**
	 * Default magic caller
	 *
	 * @param string $name
	 * @param array $arguments
	 */
	public function __call( $name, $arguments )
	{
		throw new Exception(
			sprintf( 'The "%s" method does not exist (obj context).', $name ) );
	}

	/**
	 * Default toStringer
	 *
	 * @return string
	 */
	public function __toString()
	{
		throw new Exception(
			sprintf( 'The "%s" class cannot be converted to a string.', get_class($this) ) );
	}
	
	/**
	 * Getter/Setter
	 * 
	 * @param string $name
	 * @param mixed $value
	 * @return mixed
	 */
	public function property( $name, $value = null )
	{
		if ( func_num_args() === 1 ) {
			return $this->get_property( $name );
		} else {
			return $this->set_property( $name, $value );
		}
	}
	
	/**
	 * Getter
	 *
	 * @param string $name Property name
	 * @return mixed
	 */
	protected function get_property( $name )
	{
		throw new Exception(
			sprintf( 'The "%s" property is not accessible for reading.', $name ) );
	}
	
	/**
	 * Setter
	 * 
	 * @param string $name Property name
	 * @param mixed $value Property value
	 * @return ICE_Base
	 */
	protected function set_property( $name, $value )
	{
		throw new Exception(
			sprintf( 'The "%s" property is not accessible for writing.', $name ) );
	}

	/**
	 * Cast a value from one type to another.
	 *
	 * This method simplifies type casting. It supports numeric tests and some sanity checks
	 * to prevent silly mistakes like casting an array to a string, etc.
	 *
	 * @param mixed $value The value to cast
	 * @param string $type One of string|integer|float|number|boolean|array|object|unset
	 * @return mixed
	 * @throws Exception
	 */
	final public function cast( $value, $type )
	{
		// get the type for the received value
		$valtype = gettype( $value );

		// if actual type matches requested type, nothing to do
		if ( $type == $valtype ) {
			// return value untouched
			return $value;
		}

		// value has different type, need to cast
		switch ( $type ) {

			// cast to string
			case 'string' :
				// must be scalar
				if ( is_scalar( $value ) ) {
					// ok to cast
					return (string) $value;
				} else {
					throw new Exception( 'Casting an non-scalar value to a string is silly!' );
				}

			// cast to integer
			case 'integer' :
				// must be scalar
				if ( is_scalar( $value ) ) {
					// make sure its numeric
					if ( is_numeric( $value ) ) {
						// its numeric!
						return (integer) $value;
					} else {
						// not numeric
						throw new Exception( 'Casting a non-numeric value to an integer is silly' );
					}
				} else {
					// not scalar
					throw new Exception( 'Casting a non-scalar value to an integer is silly' );
				}
			
			// cast to float
			case 'float' :
				// must be scalar
				if ( is_scalar( $value ) ) {
					// make sure its numeric
					if ( is_numeric( $value ) ) {
						// its numeric!
						return (float) $value;
					} else {
						// not numeric
						throw new Exception( 'Casting a non-numeric value to a float is silly' );
					}
				} else {
					// not scalar
					throw new Exception( 'Casting a non-scalar value to a float is silly' );
				}

			// cast to a number (float OR integer)
			case 'number' :
				// make sure its numeric
				if ( is_numeric( $value ) ) {
					// its numeric! if it has a dot, cast to float, otherwise cast to int
					if ( strpos( $value, '.' ) ) {
						// call again using float as type
						return $this->cast( $value, 'float' );
					} else {
						// call again using integer as type
						return $this->cast( $value, 'integer' );
					}
				} else {
					// not numeric
					throw new Exception( 'Casting a non-numeric value to a number is silly' );
				}

			// cast to boolean
			case 'boolean' :
				// sanity check
				if ( 'object' != $valtype && 'resource' != $valtype ) {
					// ok to cast
					return (boolean) $value;
				} else {
					throw new Exception( 'Casting an object or resource to a boolean is silly!' );
				}
				
			
			// cast to array
			case 'array' :
				return (array) $value;
			
			// cast to object
			case 'object' :
				// sanity check
				if ( !is_scalar( $value ) && 'resource' != $valtype ) {
					// ok to cast
					return (object) $value;
				} else {
					throw new Exception( 'Casting a scalar value or a resource to an object is silly!' );
				}
				
			// cast to unset
			case 'unset' :
				// this does NOT unset the value, but always returns NULL
				return (unset) $value;

			// cast to resource
			case 'resource' :
				throw new Exception( 'Casting any value to a resource is silly!' );
			
			// default
			default :
				// must have a valid type
				throw new Exception( sprintf( 'The type: "%s" is not a valid type', $type ) );
		}
	}
}

/**
 * This exception should be thrown when a fatal error occurs due
 * to missing or otherwise broken external requirements.
 */
class ICE_Missing_Reqs_Exception extends RuntimeException
{
	// nothing special yet
}
