<?php
/**
 * ICE API: web fonts helper class file
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
 * Web fonts helper class
 *
 * @package ICE
 * @subpackage utils
 * @property-read string $path
 * @property-read string $url
 */
class ICE_Webfont extends ICE_Base
{
	/**
	 * Singleton instance
	 * 
	 * @var ICE_Webfont
	 */
	private static $instance;

	/**
	 * Web Font JSON result
	 * 
	 * @var ICE_Export
	 */
	private $export;

	/**
	 * Map of initialized services
	 * 
	 * @var ICE_Map
	 */
	private $services;

	/**
	 * Constructor
	 *
	 * @param integer $max_age
	 */
	private function __construct( $max_age = 86400 )
	{
		// initialize services map
		$this->services = new ICE_Map();

		// add google always (for now)
		$this->add_google();

		// set up export
		$this->export = new ICE_Export( 'webfont', 'json', array($this,'update') );
		
		// try to refresh
		$this->export->refresh( time() - $max_age );
	}

	/**
	 */
	public function get_property( $name )
	{
		switch ( $name ) {
			case 'path':
				return $this->export->get_property( 'path' );
			case 'url':
				return $this->export->get_property( 'url' );
			default:
				return parent::get_property( $name );
		}
	}

	/**
	 * Return singleton instance
	 * 
	 * @param integer $max_age
	 * @return ICE_Webfont
	 */
	public function instance( $max_age = 86400 )
	{
		if ( !self::$instance instanceof ICE_Webfont ) {
			self::$instance = new ICE_Webfont( $max_age );
		}

		return self::$instance;
	}

	/**
	 * Add google service
	 *
	 * @return ICE_Webfont
	 */
	public function add_google()
	{
		// has service been initialized?
		if ( !$this->services->contains( 'google' ) ) {
			// create new instance
			$google = new ICE_Webfont_Service_Google();
			// add to services registry
			$this->services->add( 'google', $google );
		}

		// return self
		return $this;
	}

	/**
	 * Fetch meta data for web font service
	 *
	 * @return string
	 */
	public function update()
	{
		$data = array();

		// loop all services
		foreach ( $this->services as $service ) {
			// try to fetch data
			$raw = $service->fetch();
			// get any data?
			if ( $raw ) {
				// try to transform it
				$trans = $service->transform( $raw );
				// did transform work?
				if ( $trans ) {
					$data = array_merge( $data, $trans );
				}
			}
		}

		return json_encode( $data );
	}
}

/**
 * Web fonts service class
 *
 * @package ICE
 * @subpackage utils
 */
abstract class ICE_Webfont_Service extends ICE_Base
{
	// variants
	const VARIANT_N1 = 'n1';
	const VARIANT_N2 = 'n2';
	const VARIANT_N3 = 'n3';
	const VARIANT_N4 = 'n4';
	const VARIANT_N5 = 'n5';
	const VARIANT_N6 = 'n6';
	const VARIANT_N7 = 'n7';
	const VARIANT_N8 = 'n8';
	const VARIANT_N9 = 'n9';
	const VARIANT_I1 = 'i1';
	const VARIANT_I2 = 'i2';
	const VARIANT_I3 = 'i3';
	const VARIANT_I4 = 'i4';
	const VARIANT_I5 = 'i5';
	const VARIANT_I6 = 'i6';
	const VARIANT_I7 = 'i7';
	const VARIANT_I8 = 'i8';
	const VARIANT_I9 = 'i9';

	// subsets
	const SUBSET_LATIN = 'latin';
	const SUBSET_LATIN_EXT = 'latin-ext';
	const SUBSET_CYRILLIC = 'cyrillic';
	const SUBSET_CYRILLIC_EXT = 'cyrillic-ext';
	const SUBSET_GREEK = 'greek';
	const SUBSET_GREEK_EXT = 'greek-ext';
	const SUBSET_KHMER = 'khmer';
	const SUBSET_KHMER_EXT = 'khmer-ext';
	const SUBSET_VIETNAMESE = 'vietnamese';
	const SUBSET_VIETNAMESE_EXT = 'vietnamese-ext';

	/**
	 * Name of the web font service
	 *
	 * @return string
	 */
	abstract public function name();

	/**
	 * Fetch meta data for web font service
	 *
	 * @return string
	 */
	abstract public function fetch();

	/**
	 * Normalize meta data for web font service
	 *
	 * @param string $data
	 * @return array
	 */
	abstract public function transform( $data );

	/**
	 * Normalize font variant key for meta data
	 *
	 * @param string $variant
	 * @return string
	 */
	abstract protected function transform_variant_key( $variant );

	/**
	 * Normalize font subset key for meta data
	 *
	 * @param string $subset
	 * @return string
	 */
	abstract protected function transform_subset_key( $subset );

	/**
	 * Transform array of font variants
	 *
	 * @param array $variants
	 * @return array
	 */
	private function transform_variants( $variants )
	{
		// normalized data to return
		$data = array();

		// loop all variants
		foreach( $variants as $variant ) {
			// try to transform it
			$v_key = $this->transform_variant_key( $variant );
			// success?
			if ( $v_key ) {
				$data[$v_key] = $variant;
			}
		}

		return $data;
	}

	/**
	 * Transform array of font subsets
	 *
	 * @param array $subsets
	 * @return array
	 */
	private function transform_subsets( $subsets )
	{
		// normalized data to return
		$data = array();

		// loop all subsets
		foreach( $subsets as $subset ) {
			// try to transform it
			$s_key = $this->transform_subset_key( $subset );
			// success?
			if ( $s_key ) {
				$data[$s_key] = $subset;
			}
		}

		return $data;
	}

	/**
	 * Return a font meta "package" with normalized keys
	 *
	 * @param string $service
	 * @param string $family
	 * @param array $variants
	 * @param array $subsets
	 * @return array
	 */
	protected function font_metadata( $service, $family, $variants, $subsets )
	{
		// trans variants and subsets
		$variants_trans = $this->transform_variants( $variants );
		$subsets_trans = $this->transform_subsets( $subsets );

		// successful transformations?
		if ( $variants_trans && $subsets_trans ) {
			// return normalized meta data
			return array(
				'service' => $service,
				'family' => $family,
				'variants' => $variants_trans,
				'subsets' => $subsets_trans
			);
		} else {
			return null;
		}
	}
}

/**
 * Google web fonts service class
 *
 * @package ICE
 * @subpackage utils
 */
class ICE_Webfont_Service_Google extends ICE_Webfont_Service
{
	/**
	 * Google Web Fonts API URL
	 *
	 * Don't be a dick. Get your own API key from Google, they are free.
	 */
	const API_URL = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBrehr0y7NPVDFbYxbRIV_MYMWZhi9Sur0';

	/**
	 */
	public function name()
	{
		return 'google';
	}

	/**
	 */
	public function fetch()
	{
		// try to open url
		$result = wp_remote_fopen( self::API_URL );

		// success?
		if ( $result !== false ) {
			return $result;
		} else {
			return null;
		}
	}

	/**
	 */
	public function transform( $data )
	{
		// try to decode it
		$array = json_decode( $data, true );

		// is array and has items?
		if ( isset( $array['items'] ) && is_array( $array['items'] ) && count( $array['items'] ) ) {
			// data to return
			$data = array();
			// loop all items
			foreach( $array['items'] as $item ) {
				// try to transform each one
				$trans = $this->transform_item( $item );
				// success?
				if ( $trans ) {
					array_push( $data, $trans );
				}
			}
			// all done
			return $data;
		}

		return null;
	}

	/**
	 * @param array $item
	 * @return array|false
	 */
	private function transform_item( $item )
	{
		if (
			( isset( $item['family'] ) && strlen( $item['family'] ) ) &&
			( isset( $item['variants'] ) && is_array( $item['variants'] ) && count( $item['variants'] ) ) &&
			( isset( $item['subsets'] ) && is_array( $item['subsets'] ) && count( $item['subsets'] ) )
		) {
			return $this->font_metadata( $this->name(), $item['family'], $item['variants'], $item['subsets'] );
		}

		return null;
	}

	/**
	 */
	protected function transform_variant_key( $variant )
	{
		// normalize the variant
		switch ( $variant ) {
			case 'regular':
				return self::VARIANT_N4;
			case 'bold':
				return self::VARIANT_N7;
			case '100':
				return self::VARIANT_N1;
			case '200':
				return self::VARIANT_N2;
			case '300':
				return self::VARIANT_N3;
			case '400':
				return self::VARIANT_N4;
			case '500':
				return self::VARIANT_N5;
			case '600':
				return self::VARIANT_N6;
			case '700':
				return self::VARIANT_N7;
			case '800':
				return self::VARIANT_N8;
			case '900':
				return self::VARIANT_N9;
			case 'italic':
				return self::VARIANT_I4;
			case 'bolditalic':
				return self::VARIANT_I7;
			case '100italic':
				return self::VARIANT_I1;
			case '200italic':
				return self::VARIANT_I2;
			case '300italic':
				return self::VARIANT_I3;
			case '400italic':
				return self::VARIANT_I4;
			case '500italic':
				return self::VARIANT_I5;
			case '600italic':
				return self::VARIANT_I6;
			case '700italic':
				return self::VARIANT_I7;
			case '800italic':
				return self::VARIANT_I8;
			case '900italic':
				return self::VARIANT_I9;
			default:
				return null;
		}
	}

	/**
	 */
	protected function transform_subset_key( $subset )
	{
		// normalize the subset
		switch ( $subset ) {
			case 'latin':
				return self::SUBSET_LATIN;
			case 'latin-ext':
				return self::SUBSET_LATIN_EXT;
			case 'cyrillic':
				return self::SUBSET_CYRILLIC;
			case 'cyrillic-ext':
				return self::SUBSET_CYRILLIC_EXT;
			case 'greek':
				return self::SUBSET_GREEK;
			case 'greek-ext':
				return self::SUBSET_GREEK_EXT;
			case 'khmer':
				return self::SUBSET_KHMER;
			case 'khmer-ext':
				return self::SUBSET_KHMER_EXT;
			case 'vietnamese':
				return self::SUBSET_VIETNAMESE;
			case 'vietnamese-ext':
				return self::SUBSET_VIETNAMESE_EXT;
			default:
				return null;
		}
	}
}
