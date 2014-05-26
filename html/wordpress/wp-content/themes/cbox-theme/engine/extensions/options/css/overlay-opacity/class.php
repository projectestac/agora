<?php
/**
 * Infinity Theme: option extensions, CSS overlay opacity class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/ui/slider' );

/**
 * CSS overlay opacity
 *
 * @package Infinity-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Overlay_Opacity
	extends ICE_Ext_Option_Ui_Slider
{
	/**
	 * The name of an option which must not be empty in order for
	 * this option to render the dynamic styles
	 *
	 * @var string
	 */
	protected $linked_image;
	
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// init directives
		$this->title = __( 'Overlay Opacity', infinity_text_domain );
		$this->description = __( 'Select the overlay opacity by moving the slider', infinity_text_domain );
		$this->default_value = 0.2;
		$this->min = 0;
		$this->max = 1;
		$this->step = 0.01;
		$this->suffix = ' level';
		$this->style_property = 'opacity';
	}

	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// is a linked image set?
		if ( false === $this->check_linked_image() ) {
			// nope, clear all rules
			$this->style()->clear_rules();
		}
	}

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'linked_image':
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

		// init properties
		$this->import_property( 'linked_image', 'string' );
	}

	/**
	 * @return boolean
	 */
	public function check_linked_image()
	{
		// linked image set?
		if ( $this->linked_image ) {
			// get it
			$ne_option = $this->policy()->registry()->get( $this->linked_image )->get();
			// return true if NOT empty
			return ( !empty( $ne_option ) );
		}

		// no linked image
		return true;
	}

}
