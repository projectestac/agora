<?php
/**
 * ICE API: screen extensions, cpanel screen class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage screens
 * @since 1.0
 */

ICE_Loader::load( 'ui/iconable', 'ui/positionable' );

/**
 * Cpanel screen
 *
 * @package ICE-extensions
 * @subpackage screens
 * @property-read string $icon_primary
 * @property-read string $icon_secondary
 * @property-read integer $priority
 * @property-read boolean $toolbar
 */
class ICE_Ext_Screen_Cpanel
	extends ICE_Screen
		implements ICE_Iconable, ICE_Positionable
{
	/**
	 * The icon object
	 * 
	 * @var ICE_Icon
	 */
	private $__icon__;

	/**
	 * The position object
	 *
	 * @var ICE_Position
	 */
	private $__position__;

	/**
	 * @var string
	 */
	protected $icon_primary;

	/**
	 * @var string
	 */
	protected $icon_secondary;

	/**
	 * @var integer
	 */
	protected $priority;

	/**
	 * @var boolean
	 */
	protected $toolbar;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'icon_primary':
			case 'icon_secondary':
			case 'priority':
			case 'toolbar':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}

	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// set directives
		$this->icon_primary = (string) $this->config( 'icon_primary' );
		$this->icon_secondary = (string) $this->config( 'icon_secondary' );
		$this->priority = (integer) $this->config( 'priority' );
		$this->toolbar = (boolean) $this->config( 'toolbar' );

		// set up icons
		if ( $this->icon() ) {
			// override existing
			if ( $this->icon_primary ) {
				$this->icon()->set_property( 'primary', $this->icon_primary );
			}
			if ( $this->icon_secondary ) {
				$this->icon()->set_property( 'secondary', $this->icon_secondary );
			}
		} else {
			// new icon
			$this->icon( new ICE_Icon( $this->icon_primary, $this->icon_secondary ) );
		}

		// set up position
		$this->position( new ICE_Position( $this->priority ) );
	}

	/**
	 * Set/Return the icon object
	 *
	 * @param ICE_Icon $icon
	 * @return ICE_Icon
	 */
	final public function icon( ICE_Icon $icon = null )
	{
		if ( func_num_args() >= 1 ) {
			$this->__icon__ = $icon;
		}

		return $this->__icon__;
	}

	/**
	 * Set/Return the position object
	 *
	 * @param ICE_Position $position
	 * @return ICE_Position
	 */
	final public function position( ICE_Position $position = null )
	{
		if ( $position ) {
			$this->__position__ = $position;
		}

		return $this->__position__;
	}
}
