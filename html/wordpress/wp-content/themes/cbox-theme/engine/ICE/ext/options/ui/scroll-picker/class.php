<?php
/**
 * ICE API: option extensions, UI scroll picker class file
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
 * UI Scroll Picker
 *
 * This option relies heavily on the jQuery UI slider widget
 *
 * @link http://jqueryui.com/demos/slider/
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Ui_Scroll_Picker
	extends ICE_Option
{
	/**
	 * @var string
	 */
	protected $item_height;

	/**
	 * @var string
	 */
	protected $item_margin;

	/**
	 * @var string
	 */
	protected $item_width;
	
	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'item_height':
			case 'item_margin':
			case 'item_width':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		if ( is_admin() ) {
			// need scrollpane helper
			wp_enqueue_script( 'ice-scrollpane' );
		}
	}

	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// item width
		if ( $this->config()->contains( 'item_width' ) ) {
			$this->item_width = (string) $this->config( 'item_width' );
		}

		// item height
		if ( $this->config()->contains( 'item_height' ) ) {
			$this->item_height = (string) $this->config( 'item_height' );
		}

		// item margin
		if ( $this->config()->contains( 'item_margin' ) ) {
			$this->item_margin = (string) $this->config( 'item_margin' );
		}
	}

	/**
	 */
	public function get_template_vars()
	{
		// new script helper
		$script = new ICE_Script();
		$options = $script->logic();

		// add variables
		$options->av( 'value', $this->get() );
		$options->av( 'itemWidth', $this->item_width );
		$options->av( 'itemHeight', $this->item_height );
		$options->av( 'itemMargin', $this->item_margin );

		// return vars
		return array(
			'value' => $this->get(),
			'scroll_options' => $options->export_variables(true),
			'field_options' => $this->property( 'field_options' )
		);
	}

	/**
	 * Render the template output for a field option
	 *
	 * @param mixed $value
	 */
	public function render_field_option( $value )
	{
		print esc_html( $this->property( 'field_options' )->item_at( $value ) );
	}
}
