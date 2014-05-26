<?php
/**
 * ICE API: option extensions, UI slider class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load( 'components/options/component' );

/**
 * UI Slider option
 *
 * This option is a wrapper for the jQuery UI slider widget
 *
 * @link http://jqueryui.com/demos/slider/
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Ui_Slider
	extends ICE_Option
{
	/**
	 * @var boolean|string|integer
	 */
	protected $animate;

	/**
	 * @var string
	 */
	protected $delimiter;

	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @var integer
	 */
	protected $max;

	/**
	 * @var integer
	 */
	protected $min;

	/**
	 * @var string
	 */
	protected $orientation;

	/**
	 * @var string
	 */
	protected $prefix;

	/**
	 * @var boolean
	 */
	protected $range;

	/**
	 * @var integer
	 */
	protected $step;

	/**
	 * @var string
	 */
	protected $suffix;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'animate':
			case 'delimiter':
			case 'label':
			case 'max':
			case 'min':
			case 'orientation':
			case 'prefix':
			case 'range':
			case 'step':
			case 'suffix':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// slurp admin styles
		$this->style()
			->section( 'admin' )
			->cache( 'admin', 'admin.css' );
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		if ( is_admin() ) {
			// need slider helper
			wp_enqueue_script( 'ice-slider' );
		}
	}
	
	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// animate
		if ( $this->config()->contains( 'animate' ) ) {
			$this->animate = $this->config( 'animate' );
		}

		// max
		if ( $this->config()->contains( 'max' ) && is_numeric( $this->config( 'max' ) ) ) {
			$this->max = $this->config( 'max' );
		}

		// min
		if ( $this->config()->contains( 'min' ) && is_numeric( $this->config( 'min' ) ) ) {
			$this->min = $this->config( 'min' );
		}

		// orientation
		if ( $this->config()->contains( 'orientation' ) ) {
			$this->orientation = (string) $this->config( 'orientation' );
		}

		// step
		if ( $this->config()->contains( 'step' ) && is_numeric( $this->config( 'step' ) ) ) {
			$this->step = $this->config( 'step' );
		}

		// range
		if ( $this->config()->contains( 'range' ) && is_numeric( $this->config( 'range' ) )  ) {
			$this->range = $this->config( 'range' );
		}
		
		// value label
		if ( $this->config()->contains( 'label' ) ) {
			$this->label = (string) $this->config( 'label' );
		}

		// prefix
		if ( $this->config()->contains( 'prefix' ) ) {
			$this->prefix = (string) $this->config( 'prefix' );
		}

		// suffix
		if ( $this->config()->contains( 'suffix' ) ) {
			$this->suffix = (string) $this->config( 'suffix' );
		}

		// delimiter (more than one handle)
		if ( $this->config()->contains( 'delimiter' ) ) {
			$this->delimiter = (string) $this->config( 'delimiter' );
		}
	}

	/**
	 */
	public function get_template_vars()
	{
		// new script helper
		$script = new ICE_Script();
		$logic = $script->logic();

		// set value(s)
		$value = $this->get();

		if ( $value instanceof ICE_Map ) {
			$logic->av( 'values', $value->to_array() );
		} elseif ( is_array( $value ) ) {
			$logic->av( 'values', $value );
		} elseif ( is_numeric( $value ) ) {
			$logic->av( 'value', $value );
		} else {
			$logic->av( 'value', 0 );
		}

		// range needs special handling
		if ( $this->range ) {
			$logic->av( 'range', true );
		}
		
		// add variables
		$logic->av( 'animate', (boolean) $this->animate );
		$logic->av( 'max', $this->max );
		$logic->av( 'min', $this->min );
		$logic->av( 'orientation', $this->orientation );
		$logic->av( 'step', $this->step );
		$logic->av( 'prefix', $this->prefix );
		$logic->av( 'suffix', $this->suffix );
		$logic->av( 'delimiter', $this->delimiter );

		// return vars
		return array(
			'options' => $logic->export_variables(true),
			'label' => ( $this->label ) ? $this->label : __( 'Current selection:', infinity_text_domain )
		);
	}
}
