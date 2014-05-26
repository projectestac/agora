<?php
/**
 * ICE API: INI helpers class file
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
 * Make manipulating INI files easy
 *
 * @package ICE
 * @subpackage utils
 */
final class ICE_Ini extends ICE_Base
{
	/**
	 * Stack of parsed configs
	 *
	 * @var array
	 */
	private $configs = array();
	
	/**
	 * Load an ini file on to the configuration stack
	 * 
	 * @param string $filename
	 * @param string|null $handle
	 * @return boolean 
	 */
	public function load_file( $filename, $handle = null )
	{
		// make sure file is readable
		if ( is_readable( $filename ) ) {
			// parse it
			$result = parse_ini_file( $filename, true );
			// check results
			if ( is_array( $result ) && count( $result ) ) {
				// append to stack
				if ( $handle ) {
					$this->configs[$handle] = $result;
				} else {
					$this->configs[] = $result;
				}
				// success
				return true;
			}
		}

		// failed
		return false;
	}

	/**
	 * Return one config from the stack
	 *
	 * @param mixed $key_or_handle
	 * @return array|false
	 */
	public function get_config( $key_or_handle )
	{
		// in configs?
		if ( isset( $this->configs[$key_or_handle] ) ) {
			// yep, return it
			return $this->configs[$key_or_handle];
		}

		// doesn't exist
		return false;
	}

	/**
	 * Return entire stack merged into one config
	 *
	 * @return array
	 */
	public function get_merged()
	{
		// array to return
		$array = array();

		// loop stack and merge configs
		foreach ( $this->configs as $config ) {
			// merge config over array
			$array = $this->merge_configs( $array, $config );
		}

		// all done
		return $array;
	}

	/**
	 * Write merged config to a file
	 *
	 * @param string $filename
	 * @return boolean
	 */
	public function write_merged( $filename )
	{
		// if file exists, must be writable
		if ( is_file( $filename ) && is_writable( $filename ) ) {
			// the content to write
			$content = $this->format_config( $this->get_merged() );
			// only write if we have content
			if ( $content ) {
				// all done, write it
				return file_put_contents( $filename, $content );
			} else {
				// nothing to write, that isn't an error
				return true;
			}
		}
		
		// impossible to write
		return false;
	}

	/**
	 * Convert a config array to an INI string
	 *
	 * @param array $array
	 * @return string
	 */
	public function format_config( $array )
	{
		// the formatted content
		$content = null;

		// format the output
		foreach ( $array as $key => $value ) {
			// if element is an array, key is a section
			if ( is_array( $value ) ) {
				// format section
				$content .= $this->format_section( $key, $value );
			} else {
				// format setting
				$content .= $this->format_setting( $key, $value );
			}
		}

		// all done
		return $content;
	}

	/**
	 * Format one config section
	 *
	 * @param string $key
	 * @param array $elements
	 * @return string
	 */
	protected function format_section( $key, $elements )
	{
		// format section first
		$section = sprintf( "[%s]\n", $key );

		// loop all elements and format as settings
		foreach ( $elements as $subkey => $subelement ) {
			// append to section (indented)
			$section .= $this->format_setting( $subkey, $subelement );
		}

		// all done
		return $section;
	}

	/**
	 * Format one config setting to a string
	 *
	 * @param string $key
	 * @param string|array $value
	 * @return string
	 */
	protected function format_setting( $key, $value )
	{
		// init var
		$setting = null;

		// format setting key
		if ( is_array( $value ) ) {
			// its an array, loop it
			foreach( $value as $subkey => $subvalue ) {
				// write array format
				$setting .= sprintf( "\t%s[%s] = %s\n", $key, $subkey, $this->format_value( $subvalue ) );
			}
		} else {
			$setting = sprintf( "\t%s = %s\n", $key, $this->format_value( $value ) );
		}

		// all done
		return $setting;
	}

	/**
	 * Format one setting value
	 *
	 * @param mixed $value
	 * @return string
	 */
	protected function format_value( $value )
	{
		return sprintf( '"%s"', $value );
	}

	/**
	 * Recursively merge two config arrays, matching setting keys of any type are overwritten
	 *
	 * @param array $config1
	 * @param array $config2
	 * @return array
	 */
	protected function merge_configs( $config1, $config2 )
	{
		// loop second config
		foreach( $config2 as $key => $value ) {
			// if value is an array, its a section
			if ( is_array( $value ) ) {
				// its a section, loop
				foreach ( $value as $subkey => $subvalue ) {
					// overwrite
					$config1[$key][$subkey] = $subvalue;
				}
			} else {
				// nope, set it
				$config1[$key] = $value;
			}
		}
		
		// return merged array
		return $config1;
	}

}
