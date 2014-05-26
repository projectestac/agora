<?php
/**
 * ICE API: file system file stat class file
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
 * File stat info
 *
 * @package ICE
 * @subpackage utils
 */
final class ICE_File extends SplFileInfo
{
	/**
	 * File is a directory
	 *
	 * @var boolean
	 */
	private $d;

	/**
	 * File is a file
	 *
	 * @var boolean
	 */
	private $f;

	/**
	 * File is a link
	 *
	 * @var boolean
	 */
	private $l;

	/**
	 * File path exists
	 *
	 * @var boolean
	 */
	private $e;

	/**
	 * File path is readable
	 *
	 * @var boolean
	 */
	private $r;

	/**
	 * File path is writable
	 *
	 * @var boolean
	 */
	private $w;

	/**
	 * File path is executable
	 *
	 * @var boolean
	 */
	private $x;

	/**
	 * Constructor
	 *
	 * @param string $file_name Absolute path to file
	 */
	public function __construct( $file_name )
	{
		parent::__construct( $file_name );

		$this->refresh();
	}

	/**
	 */
	public function isDir()
	{
		if ( null === $this->d ) {
			$this->d = parent::isDir();
		}

		return $this->d;
	}

	/**
	 */
	public function isFile()
	{
		if ( null === $this->f ) {
			$this->f = parent::isFile();
		}

		return $this->f;
	}

	/**
	 */
	public function isLink()
	{
		if ( null === $this->l ) {
			$this->l = parent::isLink();
		}

		return $this->l;
	}

	/**
	 */
	public function isReadable()
	{
		if ( null === $this->r ) {
			$this->r = parent::isReadable();
		}

		return $this->r;
	}

	/**
	 */
	public function isWritable()
	{
		if ( null === $this->w ) {
			$this->w = parent::isWritable();
		}

		return $this->w;
	}

	/**
	 */
	public function isExecutable()
	{
		if ( null === $this->x ) {
			$this->x = parent::isExecutable();
		}

		return $this->x;
	}

	/**
	 * Set/refresh file information
	 *
	 * @return ICE_File
	 */
	public function refresh()
	{
		// clear stat cache
		if ( defined( 'PHP_VERSION_ID' ) && PHP_VERSION_ID >= 50300 ) {
			clearstatcache( true, $this->getFilename() );
		} else {
			clearstatcache();
		}

		// reset vars
		$this->d =
		$this->e =
		$this->f =
		$this->l =
		$this->r =
		$this->w =
		$this->x = null;
		
		// update base stat info
		$this->exists();

		return $this;
	}

	/**
	 * Returns true if file exists
	 *
	 * @return boolean
	 */
	public function exists()
	{
		if ( null === $this->e ) {
			try {
				// set boolean toggles
				$this->e = true;
				$this->f = false;
				$this->d = false;
				$this->l = false;
				// determine type
				switch ( $this->getType() ) {
					case 'file':
						$this->f = true;
						break;
					case 'dir':
						$this->d = true;
						break;
					case 'link':
						$this->l = true;
						break;
				}
			} catch ( RuntimeException $e ) {
				// get type failed
				$this->e = false;
			}
		}

		return $this->e;
	}

	/**
	 * Returns true if file is readable
	 *
	 * @internal backwards compat
	 * @return boolean
	 */
	public function is_readable()
	{
		return $this->isReadable();
	}

	/**
	 * Returns true if file is writable
	 *
	 * @internal backwards compat
	 * @return boolean
	 */
	public function is_writable()
	{
		return $this->isWritable();
	}

	/**
	 * Retrieves the file extension.
	 *
	 * This method is for backwards compat with SplFileInfo shipped with PHP < 5.3.6
	 *
	 * @return string
	 */
	public function getExtension()
	{
		// does SPL version support this method already?
		if ( true === version_compare( PHP_VERSION, '5.3.6', '>=' ) ) {
			// yep, call parent method
			return parent::getExtension();
		} else {
			// split filename at dot
			$file_parts = explode( '.', $this->getFilename() );
			// two or more parts means there is an extension
			if ( count( $file_parts ) >= 2 ) {
				// extension is the last item
				return trim( array_pop( $file_parts ) );
			}
		}
		
		// no extension
		return '';
	}
}
