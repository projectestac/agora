<?php
/**
 * Nice Package: update notification helper
 *
 * @author Marshall Sorenson <marshall.sorenson@gmail.com>
 * @link http://marshallsorenson.com/
 * @copyright Copyright (C) 2012 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 */
class Nice_Pkg
{
	/**
	 * The remote URL
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Number of seconds the remote data is valid for
	 *
	 * @var integer
	 */
	private $lifetime;

	/**
	 * The site transient key where data is cached
	 *
	 * @var string
	 */
	private $cache_key;

	/**
	 * Parsed XML string
	 *
	 * @var SimpleXMLElement
	 */
	private $packages;

	/**
	 * Cached theme data
	 *
	 * @var array
	 */
	private $theme_data;

	/**
	 * @param string $url
	 * @param integer $lifetime
	 */
	public function __construct( $url, $lifetime = 86400 )
	{
		$this->url = $url;
		$this->lifetime = $lifetime;
		$this->cache_key = $this->trans_key();
	}

	/**
	 * Generate a transient data key
	 *
	 * @return string
	 */
	private function trans_key()
	{
		return 'nice_pkg' . '_' . hash( 'crc32', $this->url );
	}

	/**
	 * Return theme data for active theme
	 *
	 * @param string $theme_slug
	 * @return array
	 */
	private function get_theme_data( $theme_slug )
	{
		if ( null === $this->theme_data ) {
			$stylesheet = get_theme_root( $theme_slug ) . '/' . $theme_slug . '/style.css';
			$this->theme_data = get_theme_data( $stylesheet );
		}

		return $this->theme_data;
	}

	/**
	 * Return parsed XML data
	 * 
	 * @return SimpleXMLElement|false
	 */
	private function get_xml()
	{
		// handle empty xml property
		if ( null === $this->packages ) {

			// try to get cached data
			$data = get_site_transient( $this->cache_key );

			// get any data?
			if ( empty( $data ) ) {
				// nope, need to fetch
				$data = $this->fetch_xml();
				// get anything?
				if ( empty( $data ) ) {
					// prevent further fetches
					$this->packages = false;
					// nothing, not good
					return false;
				} else {
					// got some data, cache it
					set_site_transient( $this->cache_key, $data, $this->lifetime );
				}
			}
			
			// parse the xml
			$xml = simplexml_load_string( $data );

			// update local cache
			if ( $xml instanceof SimpleXMLElement ) {
				$this->packages = $xml;
			} else {
				$this->packages = false;
			}
		
		}

		// return the data
		return $this->packages;
	}

	/**
	 * Fetch the xml from the remote server
	 *
	 * @return string|false
	 */
	private function fetch_xml()
	{
		$response = wp_remote_get( $this->url );

		if ( is_wp_error( $response ) ) {
			return false;
		} else {
			return wp_remote_retrieve_body( $response );
		}
	}

	/**
	 * Return package matching type and name
	 *
	 * @param string $type
	 * @param string $id
	 * @return SimpleXMLElement|false
	 */
	private function get_package( $type, $id )
	{
		// get xml object
		$xml = $this->get_xml();

		// have xml?
		if ( $xml ) {
			// do xpath query
			$result = $xml->xpath(
				sprintf( '/packages/package[@type="%s" and @id="%s"]', $type, $id )
			);
			// check result
			if ( is_array( $result ) && 1 === count( $result ) ) {
				// return first offset
				return $result[0];
			}
		}

		// no results
		return false;
	}

	/**
	 * Returns true if package is newer than current version given
	 *
	 * @param string $type
	 * @param string $id
	 * @param string $current_version
	 * @return SimpleXMLElement|false
	 */
	private function needs_update( $type, $id, $current_version )
	{
		// lookup package
		$package = $this->get_package( $type, $id );
		
		// get a package?
		if ( $package && $package->stable instanceof SimpleXMLElement ) {
			// cast element to string
			$stable = (string) $package->stable;
			// compare em
			if ( version_compare( $current_version, $stable, '<' ) ) {
				// updated needed, return package
				return $package;
			}
		}

		// no update by default
		return false;
	}

	/**
	 * Returns true if active theme is older than given package
	 *
	 * @param string $theme_slug
	 * @param string $package_id
	 * @return SimpleXMLElement|false
	 */
	public function theme_needs_update( $theme_slug, $package_id )
	{
		// lookup theme
		$theme = $this->get_theme_data( $theme_slug );

		// get a theme?
		if ( $theme_slug && isset( $theme['Version'] ) ) {
			return $this->needs_update( 'theme', $package_id, $theme['Version'] );
		} else {
			return false;
		}
	}
}
