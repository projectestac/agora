<?php
/**
 * ICE API: option extensions, UI image picker class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load_ext( 'options/ui/scroll-picker' );

/**
 * UI Image Picker
 *
 * This option is an extension of the scroll picker for handling image selection
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Ui_Image_Picker
	extends ICE_Ext_Option_Ui_Scroll_Picker
		implements ICE_Option_Static_Image, ICE_Option_Auto_Field
{
	/**
	 * @var string
	 */
	protected $file_directory;

	/**
	 * @var string
	 */
	protected $file_extension;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'file_directory':
			case 'file_extension':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	public function configure()
	{
		// run parent
		parent::configure();
		
		// file directory
		if ( $this->config()->contains( 'file_directory' ) ) {
			$this->file_directory = $this->config( 'file_directory' );
		}

		// file directory
		if ( $this->config()->contains( 'file_extension' ) ) {
			$this->file_extension = $this->config( 'file_extension' );
		}
	}

	/**
	 */
	public function load_field_options()
	{
		// file extension is required
		if ( strlen( $this->file_extension ) ) {
			// check file directory
			if ( $this->file_directory ) {
				// locate it
				$path = ICE_Scheme::instance()->locate_file( $this->file_directory );
				// find it?
				if ( $path ) {
					// found the path, list files with extension
					$images = ICE_Files::list_filtered( $path, sprintf( '/\.%s$/', $this->file_extension ), true );
					// find any images?
					if ( count( $images ) ) {
						// options to return
						$field_options = array();
						// format the array
						foreach ( $images as $key => $value ) {
							// value is absolute URL
							$field_options[$key] = ICE_Files::theme_file_to_url($value);
						}
						// all done, return them
						return $field_options;
					} else {
						throw new Exception( sprintf( 'No images found with the ".%s" extension', $this->file_extension ) );
					}
				} else {
					throw new Exception( sprintf( 'Unable to locate the "%s" path', $this->file_directory ) );
				}
			} else {
				throw new Exception( 'No file directory has been set' );
			}
		} else {
			throw new Exception( 'No file extension has been set' );
		}
	}
	
	/**
	 */
	public function render_field_option( $value )
	{
		$fo = $this->property( 'field_options' );
		
		// render an img tag ?>
		<div style="background-repeat: repeat; background-image: url('<?php print esc_attr( $fo[$value] ) ?>'); width: <?php print esc_attr( $this->item_width ) ?>; height: <?php print esc_attr( $this->item_height ) ?>"></div><?php
	}

	/**
	 */
	public function get_image_url()
	{
		// get value
		$value = $this->get();

		// has a value?
		if ( $value ) {
			// yep, locate path
			$path = ICE_Scheme::instance()->locate_file( $this->file_directory );
			// find that dir path?
			if ( $path ) {
				// yep, return as url
				return ICE_Files::theme_file_to_url( $path . '/' . $value );
			}
		}

		// value not set
		return null;
	}
}
