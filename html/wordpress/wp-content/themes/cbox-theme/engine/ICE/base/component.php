<?php
/**
 * ICE API: base component class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage base
 * @since 1.0
 */

ICE_Loader::load(
	'base/componentable',
	'base/visitable',
	'dom/element',
	'dom/styleable',
	'dom/scriptable',
	'utils/export',
	'init/directive'
);

/**
 * Make content components easy
 *
 * @package ICE
 * @subpackage base
 */
abstract class ICE_Component
	extends ICE_Componentable
		implements ICE_Recursable, ICE_Visitable, ICE_Configurable, ICE_Styleable, ICE_Scriptable
{
	/**
	 * Persistence algorithms should use this as a prefix
	 */
	const API_PREFIX = 'icext';

	/**
	 * Persistence algorithms should use this as a delimeter where valid
	 */
	const API_DELIM = '.';

	/**
	 * Name of the default section
	 */
	const DEFAULT_SECTION = 'default';

	/**
	 * Name of the default templates subdir
	 */
	const DEFAULT_TEMPLATE_DIR = 'templates';

	/**
	 * Component configurations registry
	 *
	 * @var ICE_Init_Config
	 */
	private $__config__;
	
	/**
	 * Component's DOM element helper
	 *
	 * @var ICE_Component_Element
	 */
	private $__element__;

	/**
	 * Component's styling if applicable
	 *
	 * @var ICE_Style
	 */
	private $__style__;

	/**
	 * Component's scripting if applicable
	 *
	 * @var ICE_Script
	 */
	private $__script__;

	/**
	 * The component atypical name which can be used to identify this component instance across components and persistently across requests
	 *
	 * @var string
	 */
	private $aname;
	
	/**
	 * Required capabilities, can only be appended
	 *
	 * @var array
	 */
	private $capabilities;

	/**
	 * The CSS class(es) to apply to the component's container
	 *
	 * @var array
	 */
	protected $class;
	
	/**
	 * The component description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * Set to true/false to enable/disable, or to a string for manual page name
	 *
	 * @var boolean
	 */
	protected $documentation;

	/**
	 * The component hash name. A crc32 hash of the aname in hex format
	 *
	 * @var string
	 */
	private $hname;

	/**
	 * The CSS id to set for the component's container
	 *
	 * @var string
	 */
	protected $id;

	/**
	 * Whether or not this component should be ignored
	 *
	 * @var boolean
	 */
	protected $ignore;
	
	/**
	 * The parent component (slug)
	 *
	 * @var string
	 */
	protected $parent;

	/**
	 * The component name
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Feature required for this component to run/display
	 *
	 * @var string
	 */
	protected $required_feature;

	/**
	 * Relative path to custom javascript source file
	 *
	 * @var string
	 */
	protected $script;

	/**
	 * Comma separated list of script handles to enqueue
	 *
	 * @var string
	 */
	protected $script_depends;

	/**
	 * Relative path to custom stylesheet
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Comma separated list of style handles to enqueue
	 *
	 * @var string
	 */
	protected $style_depends;
	
	/**
	 * Relative path to component template file
	 *
	 * @var string
	 */
	protected $template;

	/**
	 * The component title
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * The theme (slug) which created this component
	 *
	 * @var string
	 */
	private $theme;

	/**
	 * The component type
	 *
	 * @var string
	 */
	private $type;

	/**
	 * @param string $name Option name may only contain alphanumeric characters as well as the underscore for use as a word separator.
	 * @param string $type The type (component extension) of this component
	 * @param string $theme The theme which originally created this component
	 * @param ICE_Policy $policy The policy to apply to this component
	 */
	final public function __construct( $name, $type, $theme, $policy )
	{
		// check requirements
		if ( false === $this->check_reqs() ) {
			// can't construct object, external requirements are missing or broken
			throw new ICE_Missing_Reqs_Exception(
				sprintf( 'Cannot construct the "%s" %s component: requirements check failed', $name, $type ) );
		}

		// apply policy
		$this->policy( $policy );

		// init config and directives registries
		$this->__config__ = new ICE_Init_Config();

		// init required directives
		$this->name = $this->validate_name( $name );
		$this->type = $type;
		$this->theme = $theme;

		// the "atypical name" is unique across all components
		$this->aname = $this->format_aname( $this->name );

		// the "hash name" is the crc32 hex hash of the aname
		$this->hname = $this->format_hname( $this->aname );

		// run init template method
		$this->init();
	}

	/**
	 * Return an atypical name for the given component name
	 *
	 * @param string $name
	 * @return string
	 */
	protected function format_aname( $name = null )
	{
		return $this->policy()->get_handle( false ) . '/' . $name;
	}

	/**
	 * Return a hash name for the given component atypical name
	 *
	 * @param type $aname
	 * @return type
	 */
	protected function format_hname( $aname )
	{
		return hash( 'crc32', $aname );
	}

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'aname':
			case 'capabilities':
			case 'class':
			case 'description':
			case 'documentation':
			case 'hname':
			case 'id':
			case 'ignore':
			case 'name':
			case 'parent':
			case 'required_feature':
			case 'script':
			case 'script_depends':
			case 'style':
			case 'style_depends':
			case 'template':
			case 'theme':
			case 'title':
			case 'type':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}

	/**
	 *
	protected function set_property( $name, $value )
	{
		switch ( $name ) {
			case 'foobar':
				// set it
				$this->$name = $value;
				// chain it
				return $this;
			default:
				return parent::set_property( $name, $value );
		}
	}
	 *
	 */

	/**
	 * Return array of ReflectionClass objects for the current component's ancestory
	 *
	 * @return array
	 */
	private function reflect_stack()
	{
		// the stack of reflection objects to return
		$stack = array();

		// what class am i?
		$reflection = new ReflectionClass( $this );

		// i am the first one for the stack
		$stack[] = $reflection;

		// loop class ancestry
		while( $parent_class = $reflection->getParentClass() ) {
			// load next ancestory
			$reflection = new ReflectionClass( $parent_class->name );
			// is next parent class the base component?
			if ( $reflection->getParentClass()->name == 'ICE_Component') {
				// yep, we are done
				break;
			} elseif ( $reflection->isAbstract() ) {
				// skip abstract classes
				continue;
			} else {
				// push on to stack
				$stack[] = $reflection;
			}
		}

		return $stack;
	}

	/**
	 */
	public function accept( ICE_Visitor $visitor )
	{
		return $visitor->visit( $this );
	}

	/**
	 * Return current version of this component
	 *
	 * You must define the VERSION class constant or it will return the version of
	 * the parent component class, or 0 if no version is found at all.
	 *
	 * @return int
	 */
	final public function version()
	{
		if ( defined('self::VERSION') ) {
			return self::VERSION;
		} else {
			return 0;
		}
	}

	/**
	 * Copy a configuration setting to a property
	 *
	 * This method only works for properties which are *locally accessible*, which means
	 * they must have been declared as protected or public (even though public would be silly!).
	 *
	 * @param string $name Name of the setting to copy from the configuration
	 * @param null|string $type null: no type casting, string|integer|float|boolean|array: cast to type
	 * @param mixed $default If set, this value will be used if setting is missing from configuration
	 * @return boolean
	 */
	final protected function import_property( $name, $type = null, $default = null )
	{
		// was a default passed?
		$has_default = ( func_num_args() >= 3 );

		// value is null by default
		$value = null;

		// get raw value of conf
		$raw_value = $this->config( $name );

		// is conf data set?
		if ( $raw_value ) {
			// type cast?
			if ( $type ) {
				try {
					// try to cast it
					$value = $this->cast( $raw_value, $type );
				} catch ( Exception $e ) {
					// type cast failed, value NOT set
				}
			} else {
				// no type passed, use value as is
				$value = $raw_value;
			}
		// handle default
		} elseif ( true == $has_default ) {
			// use default value
			$value = $default;
		}

		// set the property
		return $this->$name = $value;
	}
	
	/**
	 * Return element helper instance
	 *
	 * @return ICE_Component_Element
	 */
	public function element()
	{
		if ( !$this->__element__ instanceof ICE_Component_Element ) {
			// new element object
			$this->__element__ = new ICE_Component_Element();
			// initialize the element
			if ( $this->supported() ) {
				$this->init_element();
			}
		}

		// return it!
		return $this->__element__;
	}

	/**
	 * Return style object
	 *
	 * @return ICE_Style
	 */
	public function style()
	{
		if ( !$this->__style__ instanceof ICE_Style ) {

			// init style object
			$this->__style__ = new ICE_Style( $this );
			
			// init style sections
			$this->__style__->add_section( 'admin' );
		}

		// return it!
		return $this->__style__;
	}

	/**
	 * Return script object
	 *
	 * @return ICE_Script
	 */
	public function script()
	{
		if ( !$this->__script__ instanceof ICE_Script ) {

			// init script object
			$this->__script__ = new ICE_Script( $this );

			// init script sections
			$this->__script__->add_section( 'admin' );
		}

		// return it!
		return $this->__script__;
	}

	/**
	 * Return entire config, or return/set the value of one item
	 *
	 * @param string $name
	 * @param mixed $value
	 * @param boolean $ro_value
	 * @param boolean $ro_theme
	 * @return ICE_Init_Config|mixed
	 */
	final public function config( $name = null, $value = null, $ro_value = false, $ro_theme = false )
	{
		// this method is just silly flexible
		switch ( func_num_args() ) {

			// no args, return entire config
			case 0:
				return $this->__config__;

			// one arg, return value of one item
			case 1:
				// get directive data
				$data = $this->__config__->get( $name );
				// return data value or null
				return ( $data ) ? $data->get_value() : null;

			// more than one arg, we are setting
			default:
				// get current theme scope
				$theme = $this->policy()->registry()->theme_scope();
				// set it
				return $this->__config__->set( $theme, $name, $value, $ro_value, $ro_theme );
		}
	}

	/**
	 * Push component config values on to the configuration
	 *
	 * @param array $config_array
	 */
	final public function config_array( $config_array )
	{
		// grab theme from configuration array
		$theme = $config_array['theme'];

		// is a feature set?
		if ( isset( $config_array['feature'] ) ) {
			// yes, check it for namespace defaults
			$feature = $this->policy()->features()->registry()->get( $config_array['feature'] );
			// try to grab defaults
			$defaults_array = $feature->config()->get_ns_defaults( $this->policy()->get_handle() );
			// get any defaults?
			if ( !empty( $defaults_array ) ) {
				// merge config *ON TOP OF* defaults
				$config_array = array_merge( $defaults_array, $config_array );
			}
		}

		foreach ( $config_array as $name => $value ) {

			// skip these base directives
			switch ( $name ) {
				case 'theme':
				case 'name':
				case 'type':
				case 'aname':
				case 'hname':
					continue;
			}

			// set it
			$this->__config__->set( $theme, $name, $value );
		}
	}

	/**
	 */
	public function configure()
	{
		// parent
		if ( $this->config()->contains( 'parent' ) ) {
			//  get parent from config
			$parent = $this->config( 'parent' );
			// name can't equal parent
			if ( $this->name != $parent ) {
				$this->parent = $parent;
			} else {
				throw new Exception(
					sprintf( 'The component "%s" cannot be a parent of itself', $this->name ) );
			}
		}

		// title
		if ( $this->config()->contains( 'title' ) ) {
			$this->title = $this->config( 'title' );
		}

		// desc
		if ( $this->config()->contains( 'description' ) ) {
			$this->description = $this->config( 'description' );
		}

		// documentation
		if ( $this->config()->contains( 'documentation' ) ) {
			$this->documentation = $this->config( 'documentation' );
		}

		// set stylesheet
		if ( $this->config()->contains( 'style' ) ) {
			$this->style = $this->config( 'style' );
			$this->style()->cache(
				$this->element()->id(),
				ICE_Scheme::instance()->locate_file( $this->style )
			);
		}

		// set style dependancies
		if ( $this->config()->contains( 'style_depends' ) ) {
			// split deps at comma
			$deps = explode( ',', $this->config( 'style_depends' ) );
			// set directive
			$this->style_depends = $deps;
		}

		// set script
		if ( $this->config()->contains( 'script' ) ) {
			$this->script = $this->config( 'script' );
			$this->script()->cache(
				$this->element()->id(),
				ICE_Scheme::instance()->locate_file( $this->script )
			);
		}

		// set script dependancies
		if ( $this->config()->contains( 'script_depends' ) ) {
			// split deps at comma
			$deps = explode( ',', $this->config( 'script_depends' ) );
			// set directive
			$this->script_depends = $deps;
		}

		// set template
		if ( $this->config()->contains( 'template' ) ) {
			$this->template = $this->config( 'template' );
		}

		// css id
		if ( $this->config()->contains( 'id' ) ) {
			$this->id = $this->config( 'id' );
		}

		// css class
		if ( $this->config()->contains( 'class' ) ) {
			$this->class = $this->config( 'class' );
		}

		// capabilities
		if ( $this->config()->contains( 'capabilities' ) ) {
			$this->add_capabilities( $this->config( 'capabilities' ) );
		}

		// required feature
		if ( $this->config()->contains( 'required_feature' ) ) {
			$this->required_feature = $this->config( 'required_feature' );
		}

		// set ignore
		if ( $this->config()->contains( 'ignore' ) ) {
			$this->ignore = (boolean) $this->config( 'ignore' );
		}

	}

	/**
	 * Run final component set up steps
	 *
	 * @todo should probably lock the directives here
	 */
	final public function finalize()
	{
		// lock configuration
		$this->config()->lock();

		// call configure template method
		$this->configure();
	}

	/**
	 * Set additional capabilities which are required for this option to show
	 *
	 * @todo needs a lot of testing
	 * @param string $string A comma separated list of capabilities
	 */
	final public function add_capabilities( $string )
	{
		// caps only apply to administration of components for now
		if ( !is_admin() ) {
			return;
		}

		// split at comma
		$caps = explode( ',', $string );

		// capabilities are empty by default
		$capabilities = array();

		// trim and set each
		foreach ( $caps as $cap ) {
			$cap_trimmed = trim( $cap );
			$capabilities[$cap_trimmed] = $cap_trimmed;
		}

		if ( isset( $this->capabilities ) ) {
			// merge them
			$this->capabilities = array_merge( $this->capabilities, $capabilities );
		} else {
			$this->capabilities = $capabilities;
		}
	}

	/**
	 * Check that current user has all required capabilities to view/edit this option
	 *
	 * @return boolean
	 */
	final public function check_caps()
	{
		if ( !empty( $this->capabilities ) ) {
			foreach ( $this->capabilities as $cap ) {
				if ( !current_user_can( $cap ) ) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * Check that all external requirements of this component are met.
	 *
	 * This method is executed in the constructor before any other logic!
	 *
	 * @return boolean
	 */
	public function check_reqs()
	{
		return true;
	}

	/**
	 * This template method is called at the end of the constructor
	 */
	protected function init()
	{
		// override this method to initialize special PHP handling for a component
	}

	/**
	 * This template method is called immediately after component registration
	 * @internal
	 */
	public function init_registered()
	{
		// override this to perform post registration tasks
	}

	/**
	 * This template method is called if the current request is AJAX
	 */
	public function init_ajax()
	{
		// override this method to initialize special AJAX handling for an option
	}

	/**
	 * This template method is called on the option renderer init_screen method
	 */
	public function init_screen()
	{
		// override this method to initialize special screen handling for an option
	}

	/**
	 * Set up the element helper instance
	 */
	final protected function init_element()
	{
		// determine id
		if ( $this->id ) {
			$element_id = $this->id;
		} else {
			$element_id = self::API_PREFIX . '-' . $this->hname;
		}
		
		// set preferences
		$this->element()
			->set_id( $element_id )
			->set_slug( self::API_PREFIX )
			->set_class_suffix_offset( 1 );

		// get reflection stack
		$reflection_stack = array_reverse( $this->reflect_stack() );

		// component type
		$comp_type = $this->policy()->get_handle( false );

		// classes start with abstract component type
		$this->element()->add_class( array( self::API_PREFIX, $comp_type ) );

		// loop reflection stack
		/* @var $reflection ReflectionClass */
		foreach ( $reflection_stack as $reflection ) {
			// get class parts from extension loader
			$class_parts = ICE_Ext_Loader::instance()->loaded( $reflection->getName(), true );
			// css class
			$class = array_merge(
				array( self::API_PREFIX ),
				array_slice( $class_parts, 1 )
			);
			// add element class
			$this->element()->add_class( $class );
		}
		
		// add custom class if set
		if ( $this->class ) {
			$this->element()->add_class( $this->class );
		}

		// no more messing with element allowed
		$this->element()->lock();
	}

	/**
	 * This template method is called "just in time" to enqueue styles
	 *
	 * Override this method to initialize special style handling for a component
	 */
	public function init_styles()
	{
		// depend on any styles?
		if ( $this->style_depends instanceof ICE_Map ) {
			// enqueue all of them
			foreach( $this->style_depends as $dep ) {
				wp_enqueue_style( $dep );
			}
		}
	}

	/**
	 * This template method is called "just in time" to enqueue scripts
	 *
	 * Override this method to initialize special script handling for a component
	 */
	public function init_scripts()
	{
		// depend on any scripts?
		if ( $this->script_depends instanceof ICE_Map ) {
			// enqueue all of them
			foreach( $this->script_depends as $dep ) {
				wp_enqueue_script( $dep );
			}
		}
	}

	/**
	 * Check that component is supported, varies by component
	 *
	 * @return boolean
	 */
	public function supported()
	{
		// is a required feature set?
		if ( null !== $this->required_feature ) {
			// check for theme support
			if ( false == current_theme_supports( $this->required_feature ) ) {
				// no theme support
				return false;
			}
		}

		// always check capabilities!
		return $this->check_caps();
	}

	/**
	 * Set the name
	 *
	 * @param string $name
	 */
	final protected function validate_name( $name )
	{
		// name must adhere to a strict format
		if ( preg_match( '/^[a-z][a-z0-9]*((_|-)[a-z0-9]+)*$/', $name ) ) {
			return $name;
		} else {
			throw new Exception( sprintf(
				'The %s name "%s" does not match the allowed pattern',
				$this->policy()->get_handle(), $name
			));
		}
	}

	/**
	 * Returns true if component is parent of given component
	 *
	 * @param ICE_Component $component
	 * @return boolean
	 */
	public function is_parent_of( ICE_Component $component )
	{
		return $this->name == $component->property( 'parent' );
	}

	/**
	 * Return the parent component (if set)
	 *
	 * Always check if parent is set first to avoid an exception being thrown
	 *
	 * @return ICE_Component
	 */
	public function parent()
	{
		// is a parent set
		if ( $this->parent ) {
			// yes, look it up from the registry and return
			return $this->policy()->registry()->get( $this->parent );
		} else {
			throw new Exception(
				sprintf( 'The "%s" component does not have a parent set', $this->name ) );
		}
	}

	/**
	 * Return all child components of this component
	 *
	 * @return array
	 */
	public function get_children()
	{
		return $this->policy()->registry()->get_children( $this );
	}

	/**
	 * Format a suboption name using the glue character defined in the registry
	 *
	 * @param string $name
	 * @return string
	 */
	public function format_suboption( $name )
	{
		// call registry suboption format helper
		return ICE_Registry::format_suboption( $this->name, $name );
	}

	/**
	 * Return sub-option of this component by passing ONLY the sub-option
	 * portion of the component name.
	 *
	 * To retrieve the "color" option object, simply call $feature->get_suboption('color');
	 *
	 * @param string $name Name of the sub-option
	 * @return array
	 */
	public function get_suboption( $name )
	{
		// build up option name
		$option_name = $this->format_suboption( $name );

		// get and return it
		return $this->policy()->options()->registry()->get( $option_name );
	}

	/**
	 * Check if suboption is registered
	 *
	 * @param string $name
	 * @return boolean
	 */
	public function has_suboption( $name )
	{
		// build up option name
		$option_name = $this->format_suboption( $name );

		// get and return it
		return $this->policy()->options()->registry()->has( $option_name );
	}

	/**
	 * Return array of variables to extract() for use by the template
	 *
	 * @return array
	 */
	public function get_template_vars()
	{
		// empty array by default
		return array();
	}
	
	/**
	 * Return absolute path to default template
	 *
	 * @return string
	 */
	final public function get_template_path()
	{
		// template path to return
		$template = null;

		// try to locate the template
		if ( $this->template ) {
			// was absolute path given?
			if ( ICE_Files::path_is_absolute( $this->template ) ) {
				// yep, use as is
				$template = $this->template;
			} else {
				// its relative, try to locate it
				$template = ICE_Scheme::instance()->locate_template( $this->template );
			}
		}

		// was a template found?
		if ( $template ) {
			// yes! use that one
			return $template;
		} else {
			// try to locate the default template
			return $this->locate_file( 'template.php' );
		}
	}

	/**
	 * Return absolute path to a template part
	 *
	 * @param string $name
	 * @return string|false
	 */
	final public function get_template_part( $name )
	{
		// only allow sane characters
		if ( preg_match( '/[a-z0-9]+[\w-]*/', $name ) ) {
			// try to locate it!
			return $this->locate_file( sprintf( 'template-%s.php', $name ) );
		}

		// bad name
		throw new Exception( sprintf(
			'The template part named "%s" contains invalid characters', $name ) );
	}
	
	/**
	 * Return path to an ext file
	 *
	 * @param string $filename
	 * @return string
	 */
	final public function locate_file( $filename )
	{
		// loop class ancestry
		foreach ( $this->reflect_stack() as $reflection ) {
			// call ext loader file locator helper
			$located = ICE_Ext_Loader::instance()->locate_file( $reflection->getName(), $filename );
			// anything?
			if ( $located ) {
				return $located;
			}
		}

		// no file found :(
		return false;
	}

	/**
	 * Return URL to an ext file
	 *
	 * @param string $filename
	 * @return string|false
	 */
	final public function locate_file_url( $filename )
	{
		// locate the file path
		$path = $this->locate_file( $filename );

		// was a path found?
		if ( $path ) {
			// yes, use files util to get URL
			return ICE_Files::theme_file_to_url( $path );
		}

		// no file found
		return false;
	}

	/**
	 * Render this component
	 *
	 * @param boolean $output Whether to output or return result
	 * @return string|void
	 */
	public function render( $output = true )
	{
		if ( $this->ignore ) {
			throw new Exception( 'Cannot render a component that has been ignored' );
		} elseif ( $this->renderable() ) {
			if ( $output === true ) {
				$this->policy()->renderer()->render( $this, true );
				return true;
			} else {
				return $this->policy()->renderer()->render( $this, $output );
			}
		} else {
			// not renderable
			return false;
		}
	}

	/**
	 * Render this component in bypass mode
	 *
	 * @return ICE_Renderer
	 */
	public function render_bypass()
	{
		if ( $this->ignore ) {
			throw new Exception( 'Cannot render a component that has been ignored' );
		} else {
			return $this->policy()->renderer()->render_bypass( $this );
		}
	}

	/**
	 * Returns true if the component believes rendering will be successful
	 *
	 * Override this method to do a last second check to make sure all
	 * necessary data is available to execute a successful render.
	 *
	 * @return boolean
	 */
	public function renderable()
	{
		return true;
	}

}

/**
 * Component element
 *
 * @package ICE
 * @subpackage base
 */
class ICE_Component_Element extends ICE_Element
{
	// nothing special yet, but there will be!
}

/**
 * Abstract asset exporter
 *
 * @package ICE
 * @subpackage schemes
 */
abstract class ICE_Component_Asset_Export
	extends ICE_Export
		implements ICE_Visitor
{
	// nothing special yet
}

/**
 * Style exporter
 *
 * @package ICE
 * @subpackage schemes
 */
class ICE_Component_Style_Export
	extends ICE_Component_Asset_Export
{
	public function visit( ICE_Visitable $visited )
	{
		if ( $visited->supported() ) {
			$visited->init_styles();
			$this->push( $visited->style() );
		}
	}
}

/**
 * Script exporter
 *
 * @package ICE
 * @subpackage schemes
 */
class ICE_Component_Script_Export
	extends ICE_Component_Asset_Export
{
	public function visit( ICE_Visitable $visited )
	{
		if ( $visited->supported() ) {
			$visited->init_scripts();
			$this->push( $visited->script() );
		}
	}
}
