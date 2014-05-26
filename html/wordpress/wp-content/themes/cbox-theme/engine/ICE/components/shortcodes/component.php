<?php
/**
 * ICE API: shortcode class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage shortcodes
 * @since 1.0
 */

ICE_Loader::load( 'base/component' );

/**
 * Make a shortcode easy
 *
 * @package ICE-components
 * @subpackage shortcodes
 */
abstract class ICE_Shortcode extends ICE_Component
{
	/**
	 * Config attribute default override delimeter
	 */
	const DEFAULT_ATTR_DELIM = '=';

	/**
	 * Attributes passed to handler
	 *
	 * @var array
	 */
	private $__the_atts__;

	/**
	 * Content passed to handler
	 *
	 * @var string
	 */
	private $__the_content__;

	/**
	 * @var array
	 */
	protected $attributes;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'attributes':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// set up handler
		add_shortcode( $this->property( 'name' ), array( $this, 'render_handler' ) );
	}

	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// attribute defaults
		if ( $this->config()->contains( 'attributes' ) ) {
			$this->attributes = $this->config( 'attributes' );
		}
	}

	/**
	 * This method handles all shortcode calls
	 *
	 * @param array $atts The shortcode attributes
	 * @param string $content The shortcode content
	 */
	final public function render_handler( $atts, $content = null )
	{
		// any config att overrides set?
		if ( is_array( $this->attributes ) ) {

			// atts from config
			$config_atts = array();

			// need to split up the values
			foreach ( $this->attributes as $attribute ) {
				// split at delim
				$a_parts = explode( self::DEFAULT_ATTR_DELIM, $attribute );
				// should be exactly two parts
				if ( count( $a_parts ) == 2 ) {
					// first part is key, second part is value
					$config_atts[$a_parts[0]] = $a_parts[1];
				}
			}

			// merge the config defaults over top of the core defaults
			$def_atts = array_merge( $this->default_atts(), $config_atts );
			
		} else {
			// just use the core defaults
			$def_atts = $this->default_atts();
		}

		// set the attributes
		$this->__the_atts__ = shortcode_atts( $def_atts, $atts );

		// set the content
		$this->__the_content__ = $content;

		// render it
		return $this->render( false );
	}

	/**
	 * Default attributes defined by the shortcode itself (core defaults)
	 *
	 * These can be overridden by config settings
	 *
	 * @return array
	 */
	protected function default_atts()
	{
		return array();
	}

	/**
	 * Get the value for an attribute by name (key)
	 * 
	 * @param string $name
	 * @return mixed
	 */
	protected function get_att( $name )
	{
		if ( isset( $this->__the_atts__[$name] ) ) {
			return $this->__the_atts__[$name];
		}

		return null;
	}
	
	/**
	 * Default content defined by the shortcode itself
	 *
	 * Child classes will often want to override this to process the content and return
	 * it formatted a special way.
	 *
	 * @return array
	 */
	protected function get_content()
	{
		return $this->__the_content__;
	}

	/**
	 * Return array of variables to extract() for use by the template
	 *
	 * @return array
	 */
	public function get_template_vars()
	{
		// update content attribute
		$this->__the_atts__['content'] = $this->get_content();

		// the atts are out vars
		return $this->__the_atts__;
	}
	
}
