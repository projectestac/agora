<?php
/**
 * ICE API: init data class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage init
 * @since 1.0
 */

/**
 * Make initialization data easy
 *
 * @package ICE
 * @subpackage init
 */
class ICE_Init_Data extends ICE_Base
{
	/**
	 * @var string The theme that set this data
	 */
	private $theme;

	/**
	 * @var string The name of this data
	 */
	private $name;

	/**
	 * @var mixed The value of this data
	 */
	private $value;

	/**
	 * @var boolean Set to true to make data read only
	 */
	private $read_only = false;

	/**
	 * The registry to use for substitution lookups
	 *
	 * @var ICE_Init_Registry
	 */
	private $registry;

	/**
	 * Initialize the data
	 *
	 * @param string $theme Slug of the theme which is setting this data
	 * @param string $name Name for this data (slug format)
	 * @param mixed $value Value for this data
	 * @param boolean $read_only Set to true to disallow modification of the value once set
	 */
	public function __construct( $theme, $name, $value = null, $read_only = false )
	{
		$this->theme = $theme;
		$this->name = $name;
		$this->value = $value;

		if ( $read_only ) {
			$this->read_only = true;
		}
	}

	/**
	 * Set the registry to use for substitution
	 *
	 * @param ICE_Init_Registry $registry
	 * @throws Exception
	 * @return boolean
	 */
	public function registry( ICE_Init_Registry $registry = null )
	{
		if ( null === $this->registry ) {
			$this->registry = $registry;
			return true;
		}

		throw new Exception( 'Cannot set registry, already set.' );
	}

	/**
	 * Return the name (key) of this data
	 *
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * Return the theme which created this data
	 * 
	 * @return string
	 */
	public function get_theme()
	{
		return $this->theme;
	}

	/**
	 * Set the value
	 *
	 * @param mixed $value New value for the data
	 * @param boolean $silent Set to true to silently ignore failure to set due to read only status
	 * @return boolean true on success, false on silent failure
	 */
	public function set_value( $value, $silent = false )
	{
		if ( $this->read_only ) {
			if ( $silent ) {
				return false;
			} else {
				throw new Exception(
					sprintf( 'The "%s" data has been set to read only', $this->name ) );
			}
		}

		$this->value = $value;
		return true;
	}

	/**
	 * Get the value
	 *
	 * @param boolean $substitution Perform substition
	 * @return mixed
	 */
	public function get_value( $substitution = true )
	{
		// do substitution
		if ( $substitution === true ) {
			return $this->substitute( $this->value );
		} else {
			return $this->value;
		}
	}

	/**
	 * Returns true if value is not null
	 *
	 * @return boolean
	 */
	public function has_value()
	{
		return ( null !== $this->value );
	}

	/**
	 * Substitute value from another init data key into this key's value
	 *
	 * @param string $value
	 * @return string
	 */
	protected function substitute( $value )
	{
		// make sure registry is set
		if ( !$this->registry instanceof ICE_Init_Registry ) {
			throw new Exception( 'Substition not available, registry has not been set' );
		}

		// does string have enough % chars?
		if ( is_string( $value ) && substr_count( $value, '%' ) >= 2 ) {
			// matches container
			$matches = null;
			// find tokens
			if ( preg_match_all( '/%(\w+)%/', $value, $matches, PREG_SET_ORDER ) ) {
				// loop all matches
				foreach ( $matches as $match ) {
					// break out strings into vars
					$str_search = $match[0];
					$str_name = $match[1];
					// is data already set?
					if ( $this->registry->has( $str_name ) ) {
						// return new string
						$value = str_replace(
							$str_search,
							$this->registry->get( $str_name )->get_value(),
							$value
						);
					} else {
						throw new Exception( sprintf(
							'Cannot perform substitution for data value "%s" using value of ' .
							'data name "%s" because it has not been set', $name, $str_name ) );
					}
				}
			}
		}

		return $value;
	}

	/**
	 * Lock data to prevent further modifictions
	 */
	public function lock()
	{
		$this->read_only = true;
	}
}
