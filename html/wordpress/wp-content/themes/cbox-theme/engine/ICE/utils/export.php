<?php
/**
 * ICE API: export files helper class file
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
 * Make exporting dynamic files easy
 *
 * @todo this should extend ICE_File
 * @package ICE
 * @subpackage utils
 * @uses ICE_Export_Exception
 * @property-read string $name
 * @property-read string $ext
 * @property-read string $path
 * @property-read string $url
 */
class ICE_Export extends ICE_Base
{
	/**
	 * File name delimiter
	 */
	const FILE_NAME_DELIM = '-';

	/**
	 * File extension delimiter
	 */
	const FILE_EXT_DELIM = '.';

	/**
	 * Set to true once dir props have been populated
	 *
	 * @var boolean
	 */
	static private $populated = false;

	/**
	 * Upload directory path for current request
	 *
	 * @var string
	 */
	static private $upload_dir;

	/**
	 * Upload directory URL for current request
	 *
	 * @var string
	 */
	static private $upload_url;

	/**
	 * Export directory path for current request
	 *
	 * @var string
	 */
	static private $export_dir;

	/**
	 * Export URL for current request
	 *
	 * @var string
	 */
	static private $export_url;

	/**
	 * Name of the file (without extension)
	 * 
	 * @var string 
	 */
	private $name;

	/**
	 * The file extension
	 *
	 * @var string
	 */
	private $ext;

	/**
	 * Export file path
	 *
	 * @var string
	 */
	private $path;

	/**
	 * Export file URL
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Stack of objects to retrieve export data from
	 *
	 * @var array
	 */
	private $stack = array();

	/**
	 * Callback from which to retrieve data
	 *
	 * @var string|array
	 */
	private $callback;

	/**
	 * Map of child instances of self
	 *
	 * @var array
	 */
	private $children = array();

	/**
	 * Constructor
	 *
	 * @param string $name Name of file to manage RELATIVE to export dir
	 * @param string $ext File extension of the export file
	 * @param string|array Provide a valid callback which generates the export instead of using the exportable objects stack
	 */
	public function __construct( $name, $ext, $callback = null )
	{
		// make sure dir info is populated
		$this->populate_dir_props();

		// set primitives
		$this->name = $name;
		$this->ext = $ext;
		$this->callback = $callback;

		// format the complete file name
		$filename = $this->name . self::FILE_EXT_DELIM . $this->ext;

		// determine file path and url
		$this->path = self::$export_dir . '/' . $filename;
		$this->url = self::$export_url . '/' . $filename;
	}

	/**
	 */
	public function get_property( $name )
	{
		switch( $name ) {
			case 'name':
			case 'ext':
			case 'path':
			case 'url':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}

	/**
	 * Set static upload directory properties
	 *
	 * @internal
	 * @return boolean
	 */
	private function populate_dir_props()
	{
		// only populate dir info once
		if ( !self::$populated ) {

			// get upload directory details
			$upload_dir = wp_upload_dir();

			// make sure we didn't get an error
			if ( $upload_dir['error'] == false ) {
				// set upload dir path and url
				self::$upload_dir = realpath( $upload_dir['basedir'] );
				self::$upload_url = $upload_dir['baseurl'];
				// determine export path and url
				self::$export_dir = sprintf( '%s/%s/%s', self::$upload_dir, ICE_EXPORTS_SUBDIR, ICE_ACTIVE_THEME );
				self::$export_url = sprintf( '%s/%s/%s', self::$upload_url, ICE_EXPORTS_SUBDIR, ICE_ACTIVE_THEME );
				// don't try to set these twice
				self::$populated = true;
				// yay
				return true;
			}

			throw new ICE_Export_Exception( $upload_dir['error'] );
		}

		return true;
	}

	/**
	 * Get child export instance for name, create if necessary
	 *
	 * @param string $name
	 * @return ICE_Export
	 */
	public function child( $name )
	{
		// already have this child?
		if ( !isset( $this->children[ $name ] ) ) {
			// nope, get class of instance
			$classname = get_class( $this );
			// create instance of same class
			$child = new $classname( $this->name . self::FILE_NAME_DELIM . $name, $this->ext );
			// push onto children stack
			$this->children[ $name ] = $child;
		}
		
		// return the child object
		return $this->children[ $name ];
	}

	/**
	 * Push an exportable object onto the stack
	 *
	 * @param ICE_Exportable $obj
	 * @return ICE_Stack
	 */
	public function push( ICE_Exportable $obj )
	{
		// not allowed if callback is set
		if ( $this->callback ) {
			throw new Exception( 'Adding exportable objects not allowed when a callback is set' );
		}

		// push object on to stack
		$this->stack[] = $obj;

		// handle recursive objects
		if ( $obj instanceof ICE_Recursable ) {
			// loop children
			foreach ( $obj->get_children() as $name => $child ) {
				// push to child
				$this->child( $name )->push( $child );
			}
		}

		return $this;
	}

	/**
	 * Write data to the file
	 *
	 * @param string $data
	 * @return boolean
	 */
	public function write( $data = null )
	{
		// make sure the export dir exists
		if ( wp_mkdir_p( self::$export_dir ) ) {
			// can we write to the export dir?
			if ( ICE_Files::cache(self::$export_dir)->refresh()->is_writable() ) {
				// get file instance
				$file = ICE_Files::cache($this->path)->refresh();
				// if file already exists, puke if not writeable
				if ( $file->exists() && !$file->is_writable() ) {
					throw new ICE_Export_Exception(
						'Unable to write to the file: ' . $this->path );
				}
				// try to write it
				$bytes = file_put_contents( $file->getPathname(), $data );
				// any bytes written
				if ( $bytes ) {
					// yep, refresh file
					$file->refresh();
					// return bytes written
					return $bytes;
				}
				return false;
			} else {
				throw new ICE_Export_Exception(
					'Unable to create the file: ' . $this->path );
			}
		} else {
			throw new ICE_Export_Exception(
				'Unable to create the directory: ' . self::$export_dir );
		}
	}

	/**
	 * Update the export file
	 *
	 * @return boolean
	 */
	public function update()
	{
		// result is null by default
		$data = null;

		// have a callback
		if ( $this->callback ) {
			// have a callback, make sure its callable
			if ( is_callable( $this->callback ) ) {
				// execute it
				$data .= call_user_func( $this->callback );
			}
		} else {
			// loop stack and append result of export method of each
			foreach ( $this->stack as $exportable ) {
				/* @var $exportable ICE_Exportable */
				$data .= $exportable->export();
			}
		}

		// any result?
		if ( empty( $data ) ) {
			// no content to write, empty it
			$this->write();
		} else {
			// write it!
			$this->write( $data );
		}

		// now try to update my children
		if ( count( $this->children ) ) {
			// loop all and call update
			foreach( $this->children as $child ) {
				$child->update();
			}
		}
	}

	/**
	 * Returns true if given timestamp is more recent than file last modified time
	 *
	 * @param integer $timestamp Unix timestamp
	 * @return boolean
	 */
	public function stale( $timestamp )
	{
		// must be a number
		if ( is_numeric( $timestamp ) ) {
			// does file exist?
			if ( ICE_Files::cache($this->path)->is_readable() ) {
				// when was file last modified?
				$mtime = filemtime( $this->path );
				// is timestamp more recent?
				if ( (integer) $timestamp > $mtime ) {
					// yes, its stale
					return true;
				}
			} else {
				// doesn't exist
				return true;
			}
		}

		// not stale
		return false;
	}

	/**
	 * If given timestamp is more recent than file last modified time, update the file
	 *
	 * @param integer $timestamp Unix timestamp
	 * @return boolean
	 */
	public function refresh( $timestamp )
	{
		// is file stale?
		if ( $this->stale( $timestamp ) ) {
			// yes, update it
			return $this->update();
		}
		
		// did NOT refresh
		return false;
	}

	/**
	 * Remove the export file
	 *
	 * @return boolean
	 */
	private function remove()
	{
		if ( ICE_Files::cache($this->path)->is_writable() ) {
			return unlink( $this->path );
		}
	}
}

/**
 * Make managing a set of related exports easy
 *
 * @package ICE
 * @subpackage utils
 */
class ICE_Export_Manager
{
	/**
	 * Array of export objects being managed
	 * 
	 * @var array
	 */
	private $exports = array();

	/**
	 * Add an export instance to be managed
	 *
	 * @param string $handle
	 * @param ICE_Export $export
	 * @return ICE_Export
	 */
	public function add( $handle, ICE_Export $export )
	{
		if ( isset( $this->exports[ $handle ] ) ) {
			throw new Exception( sprintf(
				'The "%s" handle has already been registered' ), $handle );
		} else {
			$this->exports[ $handle ] = $export;
		}

		return $this->exports[ $handle ];
	}

	/**
	 * Get an export instance for handle
	 *
	 * @param string $handle
	 * @return ICE_Export
	 */
	public function get( $handle )
	{
		if ( isset( $this->exports[ $handle ] ) ) {
			return $this->exports[ $handle ];
		} else {
			throw new Exception( sprintf(
				'The "%s" handle is not registered' ), $handle );
		}
	}

	/**
	 * Check all managed exports for staleness
	 *
	 * @param string $timestamp
	 * @return boolean
	 */
	public function stale( $timestamp )
	{
		foreach( $this->exports as $export ) {
			/* @var $export ICE_Export */
			if ( $export->stale( $timestamp ) === true ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Update all managed exports
	 */
	public function update()
	{
		foreach( $this->exports as $export ) {
			/* @var $export ICE_Export */
			$export->update();
		}
	}
}

/**
 * ICE Export Exception
 *
 * @package ICE
 * @subpackage utils
 */
final class ICE_Export_Exception extends Exception {}
