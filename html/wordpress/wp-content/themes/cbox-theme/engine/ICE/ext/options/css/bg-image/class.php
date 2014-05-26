<?php
/**
 * ICE API: option extensions, css background image class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/upload' );

/**
 * CSS background image option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Css_Bg_Image
	extends ICE_Ext_Option_Upload
{
	/**
	 */
	protected function init()
	{
		// run parent
		parent::init();

		// init directives
		$this->title = __( 'Background Image', infinity_text_domain );
		$this->description = __( 'Upload an image to use as the background', infinity_text_domain );
		$this->documentation = 'options/uploader';
		$this->style_property = 'background-image';
	}

	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// add dynamic styles callback
		$this->style()
			->cache( 'remove-image', 'bg_image_override' );
	}
	
	/**
	 * Add a rule to kill any background image that might be set,
	 * if the background image was explicitly disabled (zero value).
	 */
	public function bg_image_override()
	{
		// get current value
		$value = $this->get();

		// is value a literal zero?
		if ( is_numeric( $value ) && 0 === (integer) $value ) {
			$rule = $this->style()->rule( $this->format_style_selector() );
			$rule->add_declaration( 'background-image', 'none' );
		}
	}
}
