<?php
/**
 * ICE API: loader class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @since 1.0
 */

/**
 * Check if ICE has been included already
 * @ignore
 */
if ( defined( 'ICE_VERSION' ) ) {
	return;
}

/**
 * ICE API: version
 */
define( 'ICE_VERSION', '1.0' );
/**
 * ICE API: root directory
 */
define( 'ICE_PATH', dirname( __FILE__ ) );
/**
 * ICE API: library directory (3rd party)
 */
define( 'ICE_LIB_PATH', ICE_PATH . '/lib' );
/**
 * ICE API: extensions library directory
 */
define( 'ICE_EXT_PATH', ICE_PATH . '/ext' );
/**
 * ICE API: exports caching toggle
 */
if ( !defined( 'ICE_CACHE_EXPORTS' ) ) {
	define( 'ICE_CACHE_EXPORTS', true );
}
/**
 * ICE API: error handling support toggle
 */
if ( !defined( 'ICE_ERROR_HANDLING' ) ) {
	define( 'ICE_ERROR_HANDLING', false );
}
/**
 * ICE API: error reproting support toggle
 */
if ( !defined( 'ICE_ERROR_REPORTING' ) ) {
	define( 'ICE_ERROR_REPORTING', false );
}
/**
 * ICE API: exported files sub directory name
 */
if ( !defined( 'ICE_EXPORTS_SUBDIR' ) ) {
	define( 'ICE_EXPORTS_SUBDIR', 'exports' );
}
/**
 * ICE API: compiled themes hint
 */
if ( !defined( 'ICE_THEMES_COMPILED' ) ) {
	define( 'ICE_THEMES_COMPILED', null );
}
/**
 * ICE API: cache get_stylesheet() call for performance 
 */
define( 'ICE_ACTIVE_THEME', get_stylesheet() );

/**
 *  load error handler if applicable
 */
if ( ICE_ERROR_HANDLING ) {
	require_once ICE_PATH . '/errors/handler.php';
}

/**
 * include the base class
 */
require_once ICE_PATH . '/base/base.php';

/**
 * Make loading ICE libraries easy
 *
 * @package ICE
 */
final class ICE_Loader extends ICE_Base
{
	/**
	 * Delimeter at which to split library paths
	 */
	const PATH_DELIM = '/';

	/**
	 * Singleton instance
	 *
	 * @var ICE_Loader
	 */
	private static $instance;

	/**
	 * Available libs
	 *
	 * @var array
	 */
	private static $pkgs = array(
		'base' => array(
			'component' => true,
			'componentable' => true,
			'configurable' => true,
			'exportable' => true,
			'factory' => true,
			'policy' => true,
			'policeable' => true,
			'recursable' => true,
			'registry' => true,
			'renderer' => true,
			'visitable' => true
		),
		'collections' => array(
			'map' => true,
			'map_iterator' => true,
			'stack' => true,
			'stack_iterator' => true
		),
		'components' => array(
			'features' => array(
				'component' => true,
				'factory' => true,
				'renderer' => true,
				'policy' => true,
				'registry' => true
			),
			'options' => array(
				'component' => true,
				'factory' => true,
				'renderer' => true,
				'policy' => true,
				'registry' => true,
				'walkers' => true
			),
			'screens' => array(
				'component' => true,
				'factory' => true,
				'renderer' => true,
				'policy' => true,
				'registry' => true
			),
			'sections' => array(
				'component' => true,
				'factory' => true,
				'renderer' => true,
				'policy' => true,
				'registry' => true
			),
			'shortcodes' => array(
				'component' => true,
				'factory' => true,
				'renderer' => true,
				'policy' => true,
				'registry' => true
			),
			'widgets' => array(
				'component' => true,
				'factory' => true,
				'renderer' => true,
				'policy' => true,
				'registry' => true
			)
		),
		'dom' => array(
			'asset' => true,
			'element' => true,
			'script' => true,
			'scriptable' => true,
			'style' => true,
			'styleable' => true
		),
		'init' => array(
			'data' => true,
			'directive' => true,
			'configuration' => true,
			'registry' => true
		),
		'parsers' => array(
			'ini' => true,
			'less' => true,
			'markdown' => true,
			'packages' => true,
			'textile' => true
		),
		'schemes' => array(
			'scheme' => true,
			'scheme_enqueue' => true
		),
		'ui' => array(
			'cpanel' => true,
			'icon' => true,
			'iconable' => true,
			'position' => true,
			'positionable' => true
		),
		'utils' => array(
			'ajax' => true,
			'docs' => true,
			'enqueue' => true,
			'export' => true,
			'file' => true,
			'file_cache' => true,
			'files' => true,
			'webfont' => true
		)
	);

	/**
	 * This is a singleton
	 */
	private function __construct() {}

	/**
	 * Initialize ICE
	 *
	 * You must tell ICE at what URL its root directory is located
	 *
	 * @param string $ice_url The absolute URL to ICE root
	 */
	final static public function init( $ice_url )
	{
		// new instance if necessary
		if ( !self::$instance instanceof self ) {

			// define api ext prefixes
			define( 'ICE_EXT_PREFIX', 'ICE_Ext' );

			// define ICE urls
			define( 'ICE_URL', $ice_url );
			define( 'ICE_ASSETS_URL', ICE_URL . '/assets' );
			define( 'ICE_CSS_URL', ICE_ASSETS_URL . '/css' );
			define( 'ICE_ERRORS_URL', ICE_ASSETS_URL . '/errors' );
			define( 'ICE_IMAGES_URL', ICE_ASSETS_URL . '/images' );
			define( 'ICE_JS_URL', ICE_ASSETS_URL . '/js' );

			// is this an AJAX request?
			define( 'ICE_AJAX_REQUEST', defined( 'DOING_AJAX' ) );

			// create singleton instance
			self::$instance = new self();

			// load really important classes
			self::$instance->load(
				'collections',
				'utils/files',
				'utils/enqueue'
			);
		}
	}

	/**
	 * Load lib(s) via static call
	 *
	 * @param string $lib,... An unlimited number of libs to load
	 */
	final static public function load()
	{
		// handle variable number of args
		$libs = func_get_args();

		// loop through all libs
		foreach ( $libs as $lib ) {
			self::$instance->load_one( $lib );
		}
	}

	/**
	 * Load library extension(s) via static call
	 *
	 * @param string $ext,... An unlimited number of lib exts to load
	 * @return string Name of class that was loaded
	 */
	final static public function load_ext()
	{
		// handle variable number of args
		$exts = func_get_args();

		// loop through all exts
		foreach ( $exts as $ext ) {
			ICE_Ext_Loader::load_one( $ext );
		}
	}

	/**
	 * Load a single lib
	 *
	 * @param string $lib
	 * @return true|void
	 */
	private function load_one( $lib )
	{
		// set files
		$files = is_array( $lib ) ? $lib : explode( self::PATH_DELIM, $lib );

		// files can't be empty
		if ( count( $files ) ) {
			// base pkgs
			$pkgs = self::$pkgs;
			// check all libs
			foreach ( $files as $file ) {
				// is file a pkg key?
				if ( isset( $pkgs[$file] ) ) {
					// is it an array?
					if ( is_array( $pkgs[$file] ) ) {
						// its a pkg, go to next level
						$pkgs = $pkgs[$file];
					} elseif ( true === $pkgs[$file] ) {
						// its a file, load it
						return $this->load_file( array_pop( $files ), $files );
					} else {
						throw new Exception(
							sprintf( 'The library path "%s" is not valid.', $lib ) );
					}
				}
			}
		} else {
			throw new Exception( 'The library path is empty.' );
		}

		// loading entire pkg
		foreach( array_keys( $pkgs ) as $pkg_file ) {
			$this->load_file( $pkg_file, $files );
		}
	}

	/**
	 * Load a library file
	 *
	 * @param string $file
	 * @param array|string $pkg
	 * @return true
	 */
	private function load_file( $file, $pkg )
	{
		// build up file path
		$path =
			ICE_PATH .
			'/' . implode( '/', $pkg ) .
			'/' . $file . '.php';

		// load it
		require_once $path;
		return true;
	}

	/**
	 * Load WordPress wp-include files via static call
	 *
	 * @param string $file,... An unlimited number of files to load
	 */
	public function load_wp_lib()
	{
		foreach( func_get_args() as $file ) {
			require_once ABSPATH . 'wp-includes/' . $file . '.php';
		}
	}

	/**
	 * Load WordPress wp-admin/include files via static call
	 *
	 * @param string $file,... An unlimited number of files to load
	 */
	public function load_wpadmin_lib()
	{
		foreach( func_get_args() as $file ) {
			require_once ABSPATH . 'wp-admin/includes/' . $file . '.php';
		}
	}

}

/**
 * Make loading ICE extensions easy
 *
 * @package ICE
 */
final class ICE_Ext_Loader extends ICE_Base
{
	/**
	 * Delimeter at which to split library paths
	 */
	const PATH_DELIM = '/';

	/**
	 * Singleton instance
	 *
	 * @var ICE_Loader
	 */
	private static $instance;

	/**
	 * Map of already loaded extensions
	 *
	 * @var ICE_Map
	 */
	private $loaded;

	/**
	 * Array of extension paths to check
	 *
	 * @var ICE_Stack
	 */
	private $paths;

	/**
	 * This is a singleton
	 */
	private function __construct()
	{
		$this->loaded = new ICE_Map();
		$this->paths = new ICE_Stack();
		$this->add_path( ICE_EXT_PATH );
	}

	/**
	 * Return singleton instance
	 *
	 * @return ICE_Ext_Loader
	 */
	final static public function instance()
	{
		// new instance if necessary
		if ( !self::$instance instanceof self ) {
			// create singleton instance
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Load extension(s) via static call
	 *
	 * @param string $ext,... An unlimited number of lib exts to load
	 * @return string Name of class that was loaded
	 */
	final static public function load()
	{
		// handle variable number of args
		$exts = func_get_args();

		// loop through all exts
		foreach ( $exts as $ext ) {
			self::instance()->load_ext( $ext );
		}
	}

	/**
	 * Load ONE extension
	 *
	 * @param string $ext
	 * @return string Name of class that was loaded
	 */
	final static public function load_one( $ext )
	{
		return self::instance()->load_ext( $ext );
	}

	/**
	 * Load an extension file
	 *
	 * @param string $ext
	 * @return string Name of class that was loaded
	 */
	final public function load_ext( $ext )
	{
		// get class parts
		$class_parts = array_filter( explode( self::PATH_DELIM, $ext ) );

		// files must have at least two parts
		if ( count( $class_parts ) < 2 ) {
			throw new Exception( 'The extension path is empty or incomplete.' );
		}
		
		// determine class name
		$class_name = $class_parts;
		$class_name[0] = rtrim( $class_name[0], 's' );
		$class_name = ICE_Files::file_to_class( $class_name, ICE_EXT_PREFIX );

		// if class already exists, just return it
		if ( class_exists( $class_name ) ) {
			// already loaded, woot
			return $class_name;
		}

		// try to locate file
		$path = $this->locate_file( $ext, 'class.php' );

		// did we find a file?
		if ( $path ) {
			// load it
			require_once $path;
		} else {
			// not good
			throw new Exception( sprintf( 'The extension "%s" was not found.', $ext ) );
		}

		// did the file we just loaded define the class we were expecting?
		if ( class_exists( $class_name ) ) {
			// update loaded map
			$this->loaded->add( $class_name, $class_parts );
			// return class name
			return $class_name;
		} else {
			throw new Exception( sprintf( 'The class "%s" does not exist', $class_name ) );
		}
	}

	/**
	 * Find first matching extension file in the path stack
	 *
	 * @param string|array $ext
	 * @param string $file
	 * @return string|boolean
	 */
	final public function locate_file( $ext, $file )
	{
		// handle strings
		if ( is_string( $ext ) ) {
			// if ext has path delim, use as is
			if ( strpos( $ext, self::PATH_DELIM ) ) {
				$ext_path = $ext;
			} elseif ( class_exists( $ext ) ) {
				// get class parts array
				$ext = $this->loaded->item_at( $ext );
			}
		}

		// handle arrays
		if ( is_array( $ext ) ) {
			$ext_path = implode( self::PATH_DELIM, $ext );
		}

		// loop path stack top down
		foreach ( $this->paths->to_array( true ) as $basepath ) {

			// build up path
			$path = $basepath . '/' . $ext_path . '/' . $file;
			
			// does file exist at path?
			if ( ICE_Files::cache($path)->is_readable() ) {
				// found one!
				return $path;
			}
		}

		return false;
	}

	/**
	 * Return information of about loaded extensions
	 *
	 * @param string $class_name the extension's class name
	 * @param boolean $return_array set to true to return an array of the extension name parts
	 * @return boolean|array
	 */
	final public function loaded( $class_name, $return_array = false )
	{
		// is class in loaded map?
		if ( $this->loaded->contains( $class_name ) ) {
			// yep return array or true
			return ( $return_array ) ? $this->loaded->item_at( $class_name ) : true;
		}

		// class not loaded
		return false;
	}

	/**
	 * Add a path to check. Later items are check first.
	 *
	 * @param string $path
	 * @return boolean
	 */
	final public static function path( $path )
	{
		return self::instance()->add_path( $path );
	}

	/**
	 * Add a path to check. Later items are check first.
	 *
	 * @param string $path
	 * @return boolean
	 */
	final public function add_path( $path )
	{
		if ( !$this->paths->contains( $path ) ) {
			$this->paths->push( $path );
			return true;
		}

		// already exists
		return false;
	}

}
