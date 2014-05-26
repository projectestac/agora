<?php
/**
 * ICE API: base renderer class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage base
 * @since 1.0
 */

ICE_Loader::load( 'base/componentable' );

/**
 * Make rendering concrete components easy
 *
 * @package ICE
 * @subpackage base
 */
abstract class ICE_Renderer extends ICE_Componentable
{
	/**
	 * The current component being rendered
	 *
	 * @var ICE_Component
	 */
	private $component;

	/**
	 * All components that have been rendered
	 *
	 * @var array
	 */
	private $rendered = array();

	/**
	 * Return component which is currently being rendered
	 *
	 * @return ICE_Component
	 */
	final protected function component()
	{
		return $this->component;
	}

	/**
	 * Return components which have been rendered
	 *
	 * @return array
	 */
	final protected function get_rendered()
	{
		return $this->rendered;
	}

	/**
	 * Return true if the component being rendered has documentation to render
	 *
	 * @return boolean
	 */
	final public function has_documentation()
	{
		return ( $this->component->property( 'documentation' ) );
	}

	/**
	 * Render a component
	 *
	 * @param ICE_Component $component The component to render
	 * @param boolean $output Set to false to return results instead of printing
	 * @return string|void
	 */
	final public function render( ICE_Component $component, $output = true )
	{
		// check feature support
		if ( $component->supported() ) {

			// set as currently rendering component
			$this->component = $component;

			// handle output buffering if applicable
			if ( $output === false ) {
				ob_start();
			}

			// render the output
			$this->render_output();
			$this->rendered[] = $component;

			// return results if output buffering is on
			if ( $output === false ) {
				return ob_get_clean();
			}
		}
	}

	/**
	 * Render a component in bypass mode
	 *
	 * @param ICE_Component $component The component to render
	 * @return ICE_Renderer
	 */
	final public function render_bypass( ICE_Component $component )
	{
		// check feature support
		if ( $component->supported() ) {

			// set as currently rendering component
			$this->component = $component;

			// mark as rendered
			$this->rendered[] = $component;

			// return myself
			return $this;
		}
	}

	/**
	 * Render the name
	 */
	public function render_name()
	{
		print esc_attr( $this->component->property( 'name' ) );
	}

	/**
	 * Render the title
	 */
	public function render_title()
	{
		print esc_html( $this->component->property( 'title' ) );
	}

	/**
	 * Render form input description
	 */
	public function render_description()
	{
		print esc_html( $this->component->property( 'description' ) );
	}

	/**
	 * Render id, and class attributes
	 *
	 * @param string $addtl,... zero or more additional classes to append to class attribute
	 */
	public function render_attrs()
	{
		// attributes to print
		$attrs = array();

		// get id from component
		$id = $this->component->element()->id();

		// if we got an id, add it to attr list
		if ( $id ) {
			$attrs[] = sprintf( 'id="%s"', esc_attr( $id ) );
		}

		// get classes from component
		$classes = $this->component->element()->class_list( $addtl = func_get_args() );

		// if we got classes, add them to attr list
		if ( $classes ) {
			$attrs[] = sprintf( 'class="%s"', esc_attr( $classes ) );
		}

		// print attributes separated with a space
		print implode( ' ', $attrs );
	}

	/**
	 * Render element id
	 *
	 * @param string $suffix,... zero or more suffixes to append
	 */
	public function render_id()
	{
		print esc_attr(
			$this->component->element()->id( $suffixes = func_get_args() )
		);
	}

	/**
	 * Render element special id attribute
	 *
	 * @param string $sid
	 */
	public function render_sid_attr( $sid )
	{
		print $this->component->element()->sid_attribute( $sid );
	}

	/**
	 * Render element special id selector
	 *
	 * @param string $sid
	 */
	public function render_sid_selector( $sid )
	{
		print $this->component->element()->sid_selector( $sid );
	}

	/**
	 * Render element class list
	 *
	 * @param string $suffix,... zero or more suffixes to append
	 */
	public function render_class()
	{
		print esc_attr(
			$this->component->element()->class_names( $suffixes = func_get_args() )
		);
	}

	/**
	 * Render element class selector
	 *
	 * @param string $suffix,... zero or more suffixes to append
	 */
	public function render_class_selector()
	{
		print $this->component->element()->class_selector( $suffixes = func_get_args() );
	}

	/**
	 * Render main element container classes
	 *
	 * @param string $addtl,...
	 */
	public function render_classes()
	{
		// escape and print
		print esc_attr( $this->component->element()->class_list( $addtl = func_get_args() ) );
	}

	/**
	 * Render documentation for this component
	 *
	 * @param array $doc_dirs Directory paths under which to search for doc page file
	 */
	final public function render_documentation( $doc_dirs )
	{
		// get doc setting
		$documentation = $this->component->property( 'documentation' );

		// is documentation set?
		if ( $documentation ) {
			// boolean value?
			if ( is_numeric( $documentation ) ) {
				// use auto naming?
				if ( (boolean) $documentation == true ) {
					// yes, page is component name
					$page = $this->policy()->get_handle() . '/' . $this->component->property( 'name' );
				} else {
					// no, documentation disabled
					return;
				}
			} else {
				// page name was set manually
				$page = $documentation;
			}

			// new easy doc object
			$doc = new ICE_Docs( $doc_dirs, $page );

			// publish it!
			$doc->publish();
		}
	}

	/**
	 * Merge and print any number of css classes
	 *
	 * @param string $class,...
	 */
	protected function merge_classes()
	{
		// get unlimited number of class args
		$classes = func_get_args();

		// check for empties
		foreach( $classes as $key => $class ) {
			if ( empty( $class ) ) {
				unset( $classes[$key] );
			}
		}

		// render them all delimited with a space
		print esc_attr( join( ' ', $classes ) );
	}

	/**
	 * Render component output
	 *
	 * @return void
	 */
	protected function render_output()
	{
		$this->load_template();
	}

	/**
	 * Render sample code for this component
	 * 
	 * @todo this should be defined by an interface
	 */
	public function render_sample_code() {}

	/**
	 * Load the component template
	 */
	final public function load_template()
	{
		// get template vars
		$__tpl_vars__ = $this->component()->get_template_vars();

		// extract?
		if ( is_array( $__tpl_vars__ ) && !empty( $__tpl_vars__ ) ) {
			extract( $__tpl_vars__ );
		}

		// load template
		include $this->component()->get_template_path();
	}

	/**
	 * Load a component template part
	 */
	final public function load_template_part( $name )
	{
		// load template
		include $this->component()->get_template_part( $name );
	}

}
