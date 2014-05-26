<?php
/**
 * ICE API: screen class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage screens
 * @since 1.0
 */

ICE_Loader::load( 'base/component' );

/**
 * Make a display screen easy
 *
 * @package ICE-components
 * @subpackage screens
 */
abstract class ICE_Screen extends ICE_Component
{
	/**
	 * @var string
	 */
	protected $target;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'url':
			case 'target':
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

		// url where to find the screen
		// @todo add this to documentation when stable
		if ( $this->config()->contains( 'url' ) ) {
			$this->url = $this->config( 'url' );
		}

		// target of the screen menu link
		// @todo add this to documentation when stable
		if ( $this->config()->contains( 'target' ) ) {
			$this->target = $this->config( 'target' );
		}
	}
}
