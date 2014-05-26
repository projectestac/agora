<?php
/**
 * ICE API: feature extensions, responsive menu feature class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2012 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

ICE_Loader::load( 'components/features/component' );

/**
 * Responsive menu feature
 *
 * @link https://github.com/mattkersley/Responsive-Menu
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Responsive_Menu
	extends ICE_Feature
{
	/**
	 * Combine multiple menus into a single select
	 *
	 * @var boolean
	 */
	protected $combine;
	
	/**
	 * optgroup's aren't selectable, make an option for it
	 * 
	 * @var string
	 */
	protected $group_page_text;

	/**
	 * Create optgroups?
	 * 
	 * @var boolean
	 */
	protected $nested;

	/**
	 * Selector to prepend elements to
	 *
	 * @var string
	 */
	protected $prepend_to;

	/**
	 * Width at which to switch to select, and back again
	 *
	 * @var integer
	 */
	protected $switch_width;

	/**
	 * The selector to target
	 * 
	 * @var string
	 */
	protected $target_selector;

	/**
	 * Text which shows in unselected state
	 *
	 * @var string
	 */
	protected $top_option_text;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'combine':
			case 'group_page_text':
			case 'nested':
			case 'prepend_to':
			case 'switch_width':
			case 'target_selector':
			case 'top_option_text':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	protected function init()
	{
		// run parent init method
		parent::init();

		// add actions
		add_action( 'open_body', array( $this, 'render' ) );
		add_action( 'open_wrapper', array( $this, 'menu_container' ) );

		// add filter
		add_filter( 'loginout', array( $this, 'loginout_filter' ) );
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		if ( !is_admin() ) {
			wp_enqueue_script( 'jquery-mobilemenu' );
		}
	}

	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// init properties
		$this->import_property( 'combine', 'boolean' );
		$this->import_property( 'group_page_text', 'string' );
		$this->import_property( 'nested', 'boolean' );
		$this->import_property( 'prepend_to', 'string' );
		$this->import_property( 'switch_width', 'integer' );
		$this->import_property( 'target_selector', 'string' );
		$this->import_property( 'top_option_text', 'string' );
	}
	
	/**
	 */
	public function get_template_vars()
	{
		// new script helper
		$script = new ICE_Script();
		$logic = $script->logic();

		// add variables
		$logic->av( 'combine', $this->combine );
		$logic->av( 'groupPageText', $this->group_page_text );
		$logic->av( 'nested', $this->nested );
		$logic->av( 'prependTo', $this->prepend_to );
		$logic->av( 'switchWidth', $this->switch_width );
		$logic->av( 'topOptionText', $this->top_option_text );

		// return vars
		return array(
			'selector' => $this->target_selector,
			'options' => $logic->export_variables(true)
		);
	}

	/**
	 * Render Mobile Menu Container
	 */
	public function menu_container()
	{
		// add the Mobile Menu holder ?>
		<div class="mobile-menu-container">
			<a class="button black" href="#sidebar">Show Sidebar</a>
			<?php wp_loginout(); ?>
		</div><?php
	}

	/**
	 * Filter the Login/Logout link and add a button class
	 */
	public function loginout_filter( $text )
	{
		// add an id and button class to the login/logout link
		return str_replace('<a ', '<a id="loginlogout" class="button black" ', $text );
	}
}
