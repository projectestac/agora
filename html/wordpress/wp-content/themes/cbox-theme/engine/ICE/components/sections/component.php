<?php
/**
 * ICE API: section class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-components
 * @subpackage sections
 * @since 1.0
 */

ICE_Loader::load( 'base/component' );

/**
 * Make an option section easy
 *
 * @package ICE-components
 * @subpackage sections
 */
abstract class ICE_Section extends ICE_Component
{
	/**
	 * Components to render
	 *
	 * @var array
	 */
	private $__components__;

	/**
	 * The CSS class for the content of this section
	 * 
	 * @var string
	 */
	protected $class_content;

	/**
	 * The CSS class for the title of this section
	 * 
	 * @var string
	 */
	protected $class_title;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'class_content':
			case 'class_title':
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

		// css title class
		if ( $this->config()->contains( 'class_title' ) ) {
			$this->class_title = $this->config( 'class_title' );
		}

		// css content class
		if ( $this->config()->contains( 'class_content' ) ) {
			$this->class_content = $this->config( 'class_content' );
		}
	}

	/**
	 * Add component to this section's content
	 *
	 * @param ICE_Component $component
	 */
	public function add_component( ICE_Component $component )
	{
		// does component section match my name?
		if ( $component->property( 'section' ) == $this->property( 'name' ) ) {
			// yep, add to components array
			$this->__components__[] = $component;
		} else {
			// not good
			throw new Exception(
				sprintf( 'The component "%s" is not assigned to the section "%s"', $component->property( 'name' ), $this->property( 'name' ) ) );
		}
	}

	/**
	 * Render all components
	 */
	public function render_components()
	{
		foreach ( $this->__components__ as $component ) {
			$component->render();
		}
	}
}
