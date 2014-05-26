<?php
/**
 * ICE API: file system file cache class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage utils
 * @since 1.0
 */

ICE_Loader::load( 'utils/file' );

/**
 * A basic file cache
 *
 * @package ICE
 * @subpackage utils
 */
final class ICE_File_Cache extends ICE_Map
{
	/**
	 * The last filename that was hashed
	 *
	 * @var string
	 */
	private $last_hash_file;

	/**
	 * MD5 hash of last file
	 *
	 * @see $last_file
	 * @var string
	 */
	private $last_hash_md5;

	/**
	 * Returns MD5 hash for filename
	 *
	 * This method caches the last hash to prevent concurrent hashes
	 * of the exact same string
	 *
	 * @param string $filename
	 * @return string
	 */
	private function hash( $filename )
	{
		if ( $filename != $this->last_hash_file ) {
			$this->last_hash_file = $filename;
			$this->last_hash_md5 = md5( $filename );
		}
		
		return $this->last_hash_md5;
	}

	/**
	 * Add a filename to the cache
	 *
	 * @param string $filename
	 * @param boolean $force If true, overwrite existing data
	 * @return ICE_File The fstat instance for the filename
	 */
	public function add( $filename, $force = false )
	{
		// get the hash
		$hash = $this->hash( $filename );

		// hash exists?
		if ( $force || !parent::contains( $hash ) ) {
			// add it
			parent::add(
				$hash,
				new ICE_File( $filename )
			);
		}

		return parent::item_at( $hash );
	}

	/**
	 * Get fstat object for a filename, automatically create if does not exist
	 *
	 * A synonym for add() that makes more sense in some contexts
	 *
	 * @param string $filename
	 * @return ICE_File
	 */
	public function get( $filename )
	{
		return $this->add( $filename );
	}

	/**
	 * Return true if filename exists in cache
	 *
	 * @param string $filename
	 * @return boolean
	 */
	public function contains( $filename )
	{
		return parent::contains(
			$this->hash( $filename )
		);
	}

	/**
	 * Return fstat object for filename
	 *
	 * @param string $filename
	 * @return ICE_File|null
	 */
	public function item_at( $filename )
	{
		return parent::item_at(
			$this->hash( $filename )
		);
	}

	/**
	 * Remove filename from the cache
	 *
	 * @param string $filename
	 * @return ICE_File|null The removed fstat object, null if no such filename exists.
	 */
	public function remove( $filename )
	{
		return parent::remove(
			$this->hash( $filename )
		);
	}
}
