<?php
/**
 * ICE API: feature extensions, echo feature class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'components/features/component' );

/**
 * Echo content feature
 *
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Echo
	extends ICE_Feature
{
	/**
	 */
	protected $suboptions = true;
	
	/**
	 * Actions and their corresponding sub-option names
	 *
	 * @var array
	 */
	private $__actions__ = array();

	/**
	 * The content to render
	 *
	 * @var string
	 */
	private $__content__;

	/**
	 */
	protected function init()
	{
		// run parent init method
		parent::init();

		// register actions as late as possible (this may need to be tweaked later)
		add_action( 'init', array($this,'register_actions') );
	}

	/**
	 * Register all configured actions
	 */
	public function register_actions()
	{
		// call template class method to get action list
		$this->__actions__ = $this->get_action_list();

		// did we get an array with something in it
		if ( count( $this->__actions__ ) ) {
			// yep, add action for every hook
			foreach ( $this->__actions__ as $action_name => $option_name ) {
				add_action( $action_name, array($this,'render') );
			}
		}
	}

	/**
	 */
	public function renderable()
	{
		// current filter is sub option name
		$filter = current_filter();

		// is current filter in list of actions?
		if ( ( $filter ) && isset( $this->__actions__[ $filter ] ) ) {
			// grab option name
			$option_name = $this->__actions__[ $filter ];
			// get content from sub option
			$this->__content__ = $this->get_suboption( $option_name )->get();
		} else {
			// get content from template method
			$this->__content__ = $this->get_fallback_content();
		}

		// if we have content, we are good to go
		return ( strlen( $this->__content__ ) );
	}

	/**
	 */
	public function get_template_vars()
	{
		return array(
			'content' => $this->__content__
		);
	}

	/**
	 * Return array of action => option-name key values
	 *
	 * @return array
	 */
	protected function get_action_list()
	{
		return array();
	}

	/**
	 * Return fallback content to inject into template
	 *
	 * @return string
	 */
	protected function get_fallback_content()
	{
		return '';
	}

}
