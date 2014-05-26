<?php
/**
 * ICE API: base asset abstract class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage dom
 * @since 1.0
 */

ICE_Loader::load( 'base/exportable', 'base/recursable' );

/**
 * Make assets for components easy
 *
 * @package ICE
 * @subpackage dom
 * @property-read string $name
 */
abstract class ICE_Asset extends ICE_Base
	implements ICE_Exportable, ICE_Recursable
{
	/**
	 * @var ICE_Component 
	 */
	private $component;

	/**
	 * Stack of sections
	 * 
	 * @var ICE_Map
	 */
	private $sections = array();

	/**
	 * Script dependancies
	 *
	 * @var array
	 */
	private $deps = array();

	/**
	 * The files to enqueue
	 *
	 * @var array
	 */
	private $files = array();

	/**
	 * The files to export
	 *
	 * @var array
	 */
	private $files_export = array();

	/**
	 * Export callbacks
	 *
	 * @var array
	 */
	private $callbacks = array();

	/**
	 * The strings
	 *
	 * @var array
	 */
	private $strings = array();

	/**
	 * Files that have already been imported
	 *
	 * @var ICE_Stack
	 */
	private static $files_imported;

	/**
	 * Constructor
	 */
	public function __construct( ICE_Component $component = null )
	{
		// get a component?
		if ( $component ) {
			$this->component = $component;
		}

		// init files imported stack
		if ( !self::$files_imported instanceof ICE_Stack ) {
			self::$files_imported = new ICE_Stack();
		}
	}

	/**
	 * Return the component which "owns" this asset instance
	 *
	 * @return ICE_Component
	 */
	final protected function component()
	{
		if ( $this->component instanceof ICE_Component ) {
			return $this->component;
		} else {
			throw new Exception( 'No component is set' );
		}
	}

	/**
	 * Return the section for the given name
	 *
	 * @param string $name
	 * @return ICE_Asset
	 */
	final public function section( $name )
	{
		return $this->get_section( $name );
	}

	/**
	 * Enqueue an asset which has already been registered (as a dependancy)
	 * 
	 * @return ICE_Asset
	 */
	abstract public function enqueue( $handle );

	/**
	 * Add a file or callback from which to populate the dynamic asset cache
	 *
	 * @param string $handle
	 * @param string|array $file_or_callback
	 * @return ICE_Asset
	 */
	final public function cache( $handle, $file_or_callback )
	{
		// does string have an extension?
		if ( is_string( $file_or_callback) && strpos( $file_or_callback, '.' ) ) {
			// string contains a dot, assume its a file
			$this->add_file( $handle, $file_or_callback, true );
		} else {
			// nope... determine if it could be a callback
			if ( method_exists( $this->component(), $file_or_callback ) ) {
				// its a method of the component
				$this->add_callback(
					$handle,
					array( $this->component(), $file_or_callback )
				);
			} elseif ( is_callable( $file_or_callback, true ) ) {
				// it *might* be a valid callback
				$this->add_callback( $handle, $file_or_callback );
			}
		}

		// maintain chain
		return $this;
	}

	/**
	 * Add a section to the asset
	 * 
	 * @param string $name
	 * @return ICE_Asset 
	 */
	final public function add_section( $name )
	{
		// get class of this object
		$class = get_class( $this );
		
		// new "sub asset"
		$asset = new $class( $this->component );

		// add new "sub asset" of same class
		$this->sections[ $name ] = $asset;

		return $this;
	}

	/**
	 * Returns true if this asset has any sections
	 *
	 * @return boolean
	 */
	final public function has_sections()
	{
		return ( count( $this->sections ) );
	}

	/**
	 * Returns one of this asset's sections if applicable
	 *
	 * @return ICE_Asset
	 */
	final public function get_section( $name )
	{
		if ( is_string( $name ) ) {
			return $this->sections[ $name ];
		} else {
			return $this;
		}
	}

	/**
	 * Returns all of this asset's sections as an array
	 *
	 * @return array
	 */
	final public function get_sections()
	{
		return $this->sections;
	}

	/**
	 */
	final public function get_children()
	{
		return $this->get_sections();
	}

	/**
	 * Add a dependancy
	 *
	 * @param string $dep_handle Handle of the dependancy to add
	 * @return ICE_Asset
	 */
	final public function add_dep( $dep_handle )
	{
		// just in case
		$dep_handle = trim( $dep_handle );

		if ( strlen( $dep_handle ) && !isset( $this->deps[ $dep_handle ] ) ) {
			$this->deps[] = $dep_handle;
		}

		return $this;
	}

	/**
	 * Return true if at least one dep has been added
	 *
	 * @return boolen
	 */
	final public function has_deps()
	{
		return ( count( $this->deps ) );
	}

	/**
	 * Return array of dep handles
	 *
	 * @return array
	 */
	final public function get_deps()
	{
		return $this->deps;
	}

	/**
	 * Push all of this asset's deps onto the given stack
	 *
	 * @return ICE_Asset
	 */
	final public function push_deps( ICE_Stack $stack )
	{
		foreach ( $this->deps as $dep ) {
			if ( !$stack->contains( $dep ) ) {
				$stack->push( $dep );
			}
		}

		return $this;
	}

	/**
	 * Add a file
	 *
	 * @param string $handle
	 * @param string $file
	 * @param boolean $cache
	 * @return ICE_Asset
	 */
	final public function add_file( $handle, $file, $cache = false )
	{
		// push file onto applicable stack
		if ( true === $cache ) {
			$this->files_export[ $handle ] = $file;
		} else {
			$this->files[ $handle ] = $file;
		}

		// maintain chain
		return $this;
	}

	/**
	 * Return true if at least one file has been added
	 *
	 * @return boolen
	 */
	final public function has_files()
	{
		return ( count( $this->files ) );
	}

	/**
	 * Return all files as an array
	 *
	 * @return array
	 */
	final public function get_files()
	{
		return $this->files;
	}

	/**
	 * Add a callback to execute just before exporting
	 *
	 * @param string $handle
	 * @param string|array $callback
	 * @return ICE_Asset
	 */
	final public function add_callback( $handle, $callback )
	{
		if ( is_callable( $callback ) ) {
			$this->callbacks[ $handle ] = $callback;
		} else {
			throw new Exception( sprintf( 'The callback for handle "%s" is not callable', $handle ) );
		}

		return $this;
	}

	/**
	 * Returns true if at least one callback has been added
	 * 
	 * @return boolean
	 */
	final public function has_callbacks()
	{
		return ( count( $this->callbacks ) );
	}

	/**
	 * Push an arbitrary string on the stack
	 *
	 * @param string $string
	 * @return ICE_Asset
	 */
	final public function add_string( $string )
	{
		$this->strings[] = $string;

		return $this;
	}

	/**
	 * Return true if this asset has strings
	 *
	 * @return boolean
	 */
	final public function has_strings()
	{
		return ( count( $this->strings ) );
	}

	/**
	 * Return all of this asset's strings as an array
	 *
	 * @return array
	 */
	final public function get_strings()
	{
		return $this->strings;
	}

	/**
	 * Inject static code/markup
	 *
	 * @return string
	 */
	public function export()
	{
		// the code that will be returned
		$code = null;

		// handle callbacks
		if ( $this->has_callbacks() ) {
			// loop em
			foreach ( $this->callbacks as $callback ) {
				// execute callback with myself as only argument
				call_user_func( $callback, $this );
			}
		}

		// have any files?
		if ( count( $this->files_export ) ) {

			// loop through all files
			foreach ( $this->files_export as $file ) {

				// resolve file path
				if ( ICE_Files::path_is_absolute( $file ) ) {
					// its absolute already, which is good
					$filename = $file;
				} else {
					// relative path, need to locate it
					$filename = $this->component()->locate_file( $file );
				}

				// only import each file once!
				if ( self::$files_imported->contains( $filename ) ) {
					// already imported that one
					continue;
				} else {
					// push it on to imported stack
					self::$files_imported->push( $filename );
				}
				
				// inject helpful comment ;)
				//$code .= '/*+++ import source: ' . $filename . ' */' . PHP_EOL;

				// make sure file actually exists
				if ( ICE_Files::cache($filename)->is_readable() ) {

					// get entire contents of file
					$code .= $this->get_file_contents( $filename ) . PHP_EOL;

					// success
					//$code .= '/*--- import complete! */' . PHP_EOL . PHP_EOL;

				} else {
					//$code .= '/*!!! import failed! */' . PHP_EOL . PHP_EOL;
				}
			}
		}

		// handle strings
		if ( $this->has_strings() ) {
			//$code .= '/*--- importing strings */' . PHP_EOL;
			$code .=
				implode( PHP_EOL, $this->strings ) .
				str_repeat( PHP_EOL, 2 );
			//$code .= '/*!!! importing strings complete */' . PHP_EOL;
		}

		// all done
		return $code;
	}

	/**
	 * Return contents of a file that is being imported
	 *
	 * @param string $filename
	 * @return string
	 */
	protected function get_file_contents( $filename )
	{
		return file_get_contents( $filename );
	}
}
