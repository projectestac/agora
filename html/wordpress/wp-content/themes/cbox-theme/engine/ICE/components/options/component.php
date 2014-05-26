<?php
/**
 * ICE API: options option class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage options
 * @since 1.0
 */

ICE_Loader::load( 'base/component', 'utils/docs', 'schemes' );

/**
 * Make an option easy
 *
 * @package ICE-components
 * @subpackage options
 */
abstract class ICE_Option extends ICE_Component
{
	/**
	 * The string on which to split field option key => values
	 */
	const FIELD_OPTION_DELIM = '=';

	/**
	 * If true, a POST value will override the real option value
	 *
	 * @var boolean
	 */
	private $__post_override__ = false;

	/**
	 * Local style property object
	 *
	 * @var ICE_Style_Property
	 */
	private $__style_property__ = false;

	/**
	 * Default value of the option
	 *
	 * @var mixed
	 */
	protected $default_value;

	/**
	 * An optional deprecated component name to check in situations
	 * where the name has changed after it has been used to store data.
	 *
	 * @var string
	 */
	private $name_deprecated;
	
	/**
	 * The feature for which this option was created (slug)
	 *
	 * @var string
	 */
	protected $feature;

	/**
	 * The feature option name (not prefixed)
	 *
	 * @var string
	 */
	protected $feature_option;

	/**
	 * The CSS class to apply to the option's input field
	 *
	 * @var string
	 */
	protected $field_class;

	/**
	 * The CSS id to apply to the option's input field
	 *
	 * @var string
	 */
	protected $field_id;

	/**
	 * An array of field options
	 *
	 * @var array
	 */
	private $field_options;

	/**
	 * The section to which this options is assigned (slug)
	 *
	 * @var string
	 */
	protected $section;

	/**
	 * Used by options whose value is the value of an element style property
	 *
	 * @var string
	 */
	protected $style_property;

	/**
	 * Which section to export any dynamic styles to
	 *
	 * @var string
	 */
	protected $style_section;

	/**
	 * Used by options which target css selectors
	 *
	 * @var string
	 */
	protected $style_selector;

	/**
	 * Used by options whose value is a unit of measure for an element style property
	 *
	 * @var string
	 */
	protected $style_unit;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'default_value':
			case 'feature':
			case 'feature_option':
			case 'field_class':
			case 'field_id':
			case 'field_options':
			case 'name_deprecated':
			case 'section':
			case 'style_property':
			case 'style_section':
			case 'style_selector':
			case 'style_unit':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	protected function init()
	{
		parent::init();

		// user must be allowed to manage options
		$this->add_capabilities( 'manage_options' );
	}

	/**
	 */
	public function init_styles()
	{
		parent::init_styles();
		$this->refresh_style_property();
		$this->generate_style_property();
	}

	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// section
		if ( $this->config()->contains( 'section' ) ) {
			$this->set_section( $this->config( 'section' ) );
		} else {
			$this->set_section( 'default' );
		}

		// feature
		if ( $this->config()->contains( 'feature' ) ) {
			$this->feature = $this->config( 'feature' );
		}

		// feature option
		if ( $this->config()->contains( 'feature_option' ) ) {
			$this->feature_option = $this->validate_name( $this->config( 'feature_option' ) );
		}

		// default value
		if ( $this->config()->contains( 'default_value' ) ) {
			$this->default_value = $this->config( 'default_value' );
		}
		
		// deprecated name
		if ( $this->config()->contains( 'name_deprecated' ) ) {
			$this->name_deprecated = $this->validate_name( $this->config( 'name_deprecated' ) );
		}

		// css id
		if ( $this->config()->contains( 'field_id' ) ) {
			$this->field_id = $this->config( 'field_id' );
		}

		// css class
		if ( $this->config()->contains( 'field_class' ) ) {
			$this->field_class = $this->config( 'field_class' );
		}

		// style selector
		if ( $this->config()->contains( 'style_selector' ) ) {
			$this->style_selector = $this->config( 'style_selector' );
		}

		// style property
		if ( $this->config()->contains( 'style_property' ) ) {
			$this->style_property = $this->config( 'style_property' );
		}
		
		// style unit
		if ( $this->config()->contains( 'style_unit' ) ) {
			$this->style_unit = $this->config( 'style_unit' );
		}

		// style section
		if ( $this->config()->contains( 'style_section' ) ) {
			$this->style_section = $this->config( 'style_section' );
		}

		// setup style property object
		$this->refresh_style_property();

		// field options
		
		// skip loading field options outside of dashboard
		if ( !is_admin() ) {
			return;
		}

		// @todo this grew too big, move to private method
		if ( is_admin() && $this->config()->contains( 'field_options' ) ) {

			// grab field options
			$fo_config = $this->config( 'field_options' );

			// is configured field options a map?
			if ( $fo_config instanceof ICE_Map ) {

				// loop through all field options
				foreach ( $fo_config as $field_option ) {
					// split each one at the delimeter
					$field_option = explode( self::FIELD_OPTION_DELIM, $field_option, 2 );
					// add to array
					$field_options[trim($field_option[0])] = trim($field_option[1]);
				}

			} elseif ( strlen( $fo_config ) ) {

				// possibly a function
				$callback = $fo_config;

				// check if the function exists
				if ( function_exists( $callback ) ) {
					// call it
					$field_options = $callback();
					// make sure we got an array
					if ( !is_array( $field_options ) ) {
						throw new Exception( sprintf( 'The field options callback function "%s" did not return an array', $callback ) );
					}
				} else {
					throw new Exception( sprintf( 'The field options callback function "%s" does not exist', $callback ) );
				}

			} else {
				throw new Exception( sprintf( 'The field options for the "%s" option is not configured correctly', $name ) );
			}
		
		} elseif ( $this instanceof ICE_Option_Auto_Field ) {

			// skip if already populated
			if ( $this->field_options == null ) {
				// call template method to load options
				$field_options = $this->load_field_options();
			}

		} elseif ( $this->__style_property__ ) {

			// check type
			switch ( true ) {
				case ( $this instanceof ICE_Ext_Option_Select ):
				case ( $this instanceof ICE_Ext_Option_Radio ):
					$field_options = $this->__style_property__->get_list_values();
			}

		}

		// make sure we ended up with some options
		if ( isset( $field_options ) && count( $field_options ) >= 1 ) {
			// finally set them for the option
			$this->field_options = $field_options;
		}
	}

	/**
	 * Render this option AND its required siblings
	 *
	 * @param boolean $output Whether to output or return result
	 * @return string|void
	 */
	public function render( $output = true )
	{
		// render myself first
		$html = parent::render( $output );

		// render options that require this one
		foreach ( $this->policy()->registry()->get_siblings($this) as $sibling_option ) {
			$html .= $sibling_option->render( $output );
		}

		// return result
		return ( $output ) ? true : $html;
	}

	/**
	 * Toggle post override ON
	 *
	 * If enabled, post override will force the option to return it's value as set in POST
	 *
	 * @see disable_post_override
	 */
	public function enable_post_override()
	{
		$this->__post_override__ = true;
	}

	/**
	 * Toggle post override OFF
	 *
	 * @see enable_post_override
	 */
	public function disable_post_override()
	{
		$this->__post_override__ = false;
	}

	/**
	 * Get (read) the value of this option
	 *
	 * @see enable_post_override
	 * @return mixed
	 */
	public function get()
	{
		if ( $this->__post_override__ === true && isset( $_POST[$this->property( 'name' )] ) ) {
			return $_POST[$this->property( 'name' )];
		} else {
			return $this->get_option();
		}
	}

	/**
	 * Get (read) the value of this option from the database
	 *
	 * @return mixed
	 */
	protected function get_option()
	{
		// get option value from database
		$result = get_option( $this->get_api_name(), $this->default_value );

		// is the result empty?
		if (
			null === $result ||
			is_string( $result ) && '' === $result ||
			is_bool( $result ) && false === $result ||
			is_array( $result ) && 0 === count( $result )
		) {
			// no result, maybe check deprecated name
			$name_deprecated = $this->property( 'name_deprecated' );

			// if a deprecated name is set, try to get its value
			if ( $name_deprecated ) {
				// get the atypical name
				$aname = $this->format_aname( $name_deprecated );
				// get the hash name
				$hname = $this->format_hname( $aname );
				// try to get value of deprectated option name from the database
				$result = get_option( $this->get_api_name( $hname ), $this->default_value );
			}
		}

		return $result;
	}

	/**
	 * Returns true if a row for the option exists in the database
	 *
	 * @param boolean $ignore_default Set to true to ignore any default value that might be set
	 * @return boolean
	 */
	public function is_set( $ignore_default = false )
	{
		global $wpdb;

		// any default value?
		if ( false === $ignore_default && null !== $this->default_value ) {
			// a default value is set, no need to look in the database
			return true;
		}

		// check if the option exists in the database
		$count = $wpdb->get_var(
			$wpdb->prepare(
				"SELECT COUNT(*) FROM {$wpdb->options} WHERE option_name = %s LIMIT 1",
				$this->get_api_name()
			)
		);

		// return result of count as boolean
		return (boolean) $count;
	}

	/**
	 * Update the value of this option
	 *
	 * @param mixed $value
	 * @return boolean
	 */
	public function update( $value )
	{
		if ( $this->check_caps() ) {
			// force numeric values to floats since it could be an int or a float
			if ( is_numeric( $value ) ) {
				$value = floatval( $value );
			}
			// is the value null, an empty string, or equal to the default value?
			if ( $value === null || $value === '' || $value === $this->default_value ) {
				// its pointless to store this option
				// try to delete it in case it already exists
				return $this->delete();
			} else {
				// create or update it
				if ( $this->update_option( $value ) ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Update the real option in the database
	 *
	 * @param mixed $value New option value
	 * @return boolean
	 */
	protected function update_option( $value )
	{
		return update_option( $this->get_api_name(), $value );
	}

	/**
	 * Delete this option completely from the database
	 *
	 * @return boolean
	 */
	public function delete()
	{
		if ( $this->check_caps() ) {
			if ( $this->delete_option() ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Delete the option from the database
	 *
	 * @return boolean
	 */
	protected function delete_option()
	{
		return delete_option( $this->get_api_name() );
	}

	/**
	 * Set the section
	 *
	 * @param string $section
	 */
	protected function set_section( $section )
	{
		// lookup the section registry
		$section_registry = ICE_Policy::instance('ICE_Section_Policy')->registry();

		// get section from section registry
		$section = $section_registry->get( $section );

		// adding options to parent sections is not allowed
		foreach ( $section_registry->get_all() as $section_i ) {
			if ( $section->is_parent_of( $section_i ) ) {
				throw new Exception(
					sprintf( 'Cannot add options to section "%s" because it is acting as a parent section', $section->property( 'name' ) ) );
			}
		}

		$this->section = $section->property( 'name' );
	}

	/**
	 * Get the full name for API option
	 *
	 * @return string
	 */
	private function get_api_name( $hname = null )
	{
		// handle empty hname
		if ( null === $hname ) {
			// use current property
			$hname = $this->get_property( 'hname' );
		}

		// return formatted api name
		return implode(
			self::API_DELIM,
			array(
				self::API_PREFIX,
				$hname,
				ICE_ACTIVE_THEME
			)
		);
	}

	/**
	 * Return style selector formatted with the body class
	 */
	final protected function format_style_selector()
	{
		// grab body class from policy
		$class = $this->policy()->get_body_class();
		
		// handle body selectors
		if ( preg_match( '/^(body[^:]*)(:[\w-]+)?/', $this->style_selector, $matches ) ) {
			// its a body selector, append it
			return sprintf( '%s.%s%s', $matches[1], $class, $matches[2] );
		} else {
			// not a body selector, prepend it
			return sprintf( 'body.%s %s', $class, $this->style_selector );
		}
	}

	/**
	 * @todo need to get rid of this mess once fields component is working
	 */
	private function refresh_style_property()
	{
		// set to null in case it should not exist anymore
		$this->__style_property__ = null;

		// must have selector and property
		if ( $this->style_selector && $this->style_property ) {
			// setup property object
			$this->__style_property__ =
				ICE_Style_Property_Factory::instance()->create( $this->style_property );
		}
	}

	/**
	 */
	private function generate_style_property()
	{
		if ( $this->__style_property__ ) {

			// determine value to set
			if ( $this instanceof ICE_Option_Attachment_Image ) {
				$value = $this->get_image_url( 'full' );
			} elseif ( $this instanceof ICE_Option_Static_Image ) {
				$value = $this->get_image_url();
			} else {
				$value = $this->get();
			}

			// try to set the value
			if ( null !== $value && $this->__style_property__->set_value( $value, $this->style_unit ) ) {

				// get the style value
				$style_value = $this->__style_property__->get_value();

				// add value to component styles if set
				if ( $style_value->has_value() ) {
					if ( $this->style_section ) {
						$rule =
							$this->style()
								->section($this->style_section)
								->rule( $this->format_style_selector() );
					} else {
						$rule =
							$this->style()
								->rule( $this->format_style_selector() );
					}
					$rule->add_declaration(
						$this->__style_property__->get_name(),
						$this->__style_property__->get_value()->format()
					);
				}
			}

		}
	}
}

/**
 * Interface to implement if the option defines its own field_options internally
 *
 * @package ICE-components
 * @subpackage options
 */
interface ICE_Option_Auto_Field
{
	/**
	 * Generate custom field options
	 *
	 * @return array of field options in [value] => [description] format
	 */
	public function load_field_options();
}

/**
 * Interface to implement if the option is referencing a static image
 *
 * @package ICE-components
 * @subpackage options
 */
interface ICE_Option_Static_Image
{
	/**
	 * Return the URL of a static image for this option
	 *
	 * @return string|false absolute URL to image file
	 */
	public function get_image_url();
}

/**
 * Interface to implement if the option is storing an image attachment id
 *
 * @package ICE-components
 * @subpackage options
 */
interface ICE_Option_Attachment_Image
{
	/**
	 * Get the attachment image source details
	 *
	 * Returns an array with attachment details
	 *
	 * <code>
	 * Array (
	 *   [0] => url
	 *   [1] => width
	 *   [2] => height
	 * )
	 * </code>
	 *
	 * @see wp_get_attachment_image_src()
	 * @link http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src
	 * @param string $size Either a string (`thumbnail`, `medium`, `large` or `full`), or a two item array representing width and height in pixels, e.g. array(32,32). The size of media icons are never affected.
	 * @param integer $attach_id The id of the attachment, defaults to option value.
	 * @return array|false Attachment meta data
	 */
	public function get_image_src( $size = 'thumbnail', $attach_id = null );

	/**
	 * Return the URL of an image attachment for this option
	 *
	 * This method is only useful if the option is storing the id of an attachment
	 *
	 * @param string $size Either a string (`thumbnail`, `medium`, `large` or `full`), or a two item array representing width and height in pixels, e.g. array(32,32). The size of media icons are never affected.
	 * @return string|false absolute URL to image file
	 */
	public function get_image_url( $size = 'thumbnail' );
}

/**
 * An option for storing an image (via WordPress attachment API)
 *
 * @package ICE-components
 * @subpackage options
 */
abstract class ICE_Option_Image
	extends ICE_Option
		implements ICE_Option_Attachment_Image
{
	/**
	 */
	public function get_image_src( $size = 'thumbnail', $attach_id = null )
	{
		// attach id was passed?
		if ( empty( $attach_id ) ) {
			$attach_id = $this->get();
		}

		// src is null by default
		$src = null;

		// did we get an attachment id?
		if ( is_numeric( $attach_id ) ) {
			// is attach id gte one?
			if ( $attach_id >= 1 ) {
				// try to get the attachment info
				$src = wp_get_attachment_image_src( $attach_id, $size );
			} else {
				// id of zero or less is impossible to lookup,
				// return false immediately to avoid costly query.
				return false;
			}
		} else {
			// try to get default url
			$default_url = $this->get_default_image_url();
			// get anything?
			if ( $default_url ) {
				// mimic the src array
				$src = array_fill( 0, 3, null );
				// zero index is the url
				$src[0] = $default_url;
			}
		}

		// did we find one?
		if ( is_array($src) ) {
			return $src;
		} else {
			return false;
		}
	}

	/**
	 */
	public function get_image_url( $size = 'thumbnail' )
	{
		// get the value
		$value = $this->get();

		// did we get a number?
		if ( is_numeric( $value ) && $value >= 1 ) {

			// get the details
			$src = $this->get_image_src( $size, $value );

			// try to return a url
			return ( $src ) ? $src[0] : false;

		} elseif ( is_string( $value ) && strlen( $value ) >= 1 ) {

			// try to get raw default value config
			$default_config = $this->config()->get('default_value');

			// has default config?
			if ( $default_config ) {
				// yep, determine path
				return ICE_Scheme::instance()->theme_file_url( $default_config->get_theme(), $this->default_value );
			}
		}

		return null;
	}

	/**
	 * Return absolute URL of the default image (if set)
	 *
	 * @return string|false
	 */
	public function get_default_image_url()
	{
		// was a default set?
		if ( strlen( $this->default_value ) ) {
			// use default
			return
				ICE_Scheme::instance()->theme_file_url(
					$this->config()->get('default_value')->get_theme(),
					$this->default_value
				);
		}

		// no default set
		return false;
	}
}
