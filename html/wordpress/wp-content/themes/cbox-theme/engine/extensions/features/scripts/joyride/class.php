<?php
/**
 * ICE API: feature extensions, jQuery Joyride class file
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
 * jQuery Joyride feature
 *
 * This option is a wrapper for the jQuery Joyride plugin
 *
 * @link http://www.zurb.com/playground/jquery-joyride-feature-tour-plugin
 * @package ICE-extensions
 * @subpackage features
 */
class ICE_Ext_Feature_Scripts_Joyride
	extends ICE_Feature
{
	/**
	 */
	protected $suboptions = true;

	// local properties

	/**
	 * set to false or yoursite.com
	 *
	 * @var boolean|string
	 */
	protected $cookie_domain;

	/**
	 * true/false for whether cookies are used
	 *
	 * @var boolean
	 */
	protected $cookie_monster;

	/**
	 * choose your own cookie name
	 *
	 * @var string
	 */
	protected $cookie_name;

	/**
	 * true/false for inline positioning
	 *
	 * @var boolean
	 */
	protected $inline;

	/**
	 * true/false for next button visibility
	 *
	 * @var boolean
	 */
	protected $next_button;

	/**
	 * a JS callback method to call once the tour closes
	 *
	 * @var string
	 */
	protected $post_ride_callback;

	/**
	 * a JS callback method to call after each step
	 *
	 * @var string
	 */
	protected $post_step_callback;

	/**
	 * Page scrolling speed in ms
	 *
	 * @var integer
	 */
	protected $scroll_speed;

	/**
	 * true/false to start timer on first click
	 *
	 * @var boolean
	 */
	protected $start_timer_on_click;

	/**
	 * 0 = off, all other numbers = time(ms)
	 *
	 * @var integer
	 */
	protected $timer;

	/**
	 * 'pop' or 'fade' in each tip
	 *
	 * @var string
	 */
	protected $tip_animation;

	/**
	 * if 'fade'- speed in ms of transition
	 *
	 * @var integer
	 */
	protected $tip_animation_fade_speed;

	/**
	 * Where the tip be attached if not inline
	 *
	 * @var string
	 */
	protected $tip_container;

	/**
	 * the ID of the <ol> used for content
	 *
	 * @var string
	 */
	protected $tip_content;

	/**
	 * 'top' or 'bottom' in relation to parent
	 *
	 * @var string
	 */
	protected $tip_location;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'cookie_domain':
			case 'cookie_monster':
			case 'cookie_name':
			case 'inline':
			case 'next_button':
			case 'post_ride_callback':
			case 'post_step_callback':
			case 'scroll_speed':
			case 'start_timer_on_click':
			case 'timer':
			case 'tip_animation':
			case 'tip_animation_fade_speed':
			case 'tip_container':
			case 'tip_content':
			case 'tip_location':
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

		// set property defaults
		$this->title = __( 'Joyride Plugin' );
		$this->description = __( 'A wrapper for the jQuery Joyride plugin' );
		$this->id = 'joyRideTipContent';
	}
	
	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// need joyride styles
		wp_enqueue_style( 'joyride', $this->locate_file_url( 'assets/joyride.css' ) );
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		// need joyride script
		wp_enqueue_script( 'joyride', $this->locate_file_url( 'assets/jquery.joyride.js' ) );
	}
	
	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// init properties
		$this->import_property( 'tip_location', 'string' );
		$this->import_property( 'scroll_speed', 'integer' );
		$this->import_property( 'timer', 'integer' );
		$this->import_property( 'start_timer_on_click', 'boolean' );
		$this->import_property( 'next_button', 'boolean' );
		$this->import_property( 'tip_animation', 'string' );
		$this->import_property( 'tip_animation_fade_speed', 'integer' );
		$this->import_property( 'cookie_monster', 'boolean', true );
		$this->import_property( 'cookie_domain' );
		$this->import_property( 'cookie_name', 'string' );
		$this->import_property( 'tip_container', 'string' );
		$this->import_property( 'inline', 'boolean' );
		$this->import_property( 'tip_content', 'string', '#' . $this->id );
		$this->import_property( 'post_ride_callback', 'string' );
		$this->import_property( 'post_step_callback', 'string' );
	}

	/**
	 */
	public function get_template_vars()
	{
		// new script helper
		$script = new ICE_Script();
		$logic = $script->logic();

		// add variables
		$logic->av( 'tipLocation', $this->tip_location );
		$logic->av( 'scrollSpeed', $this->scroll_speed );
		$logic->av( 'timer', $this->timer );
		$logic->av( 'startTimerOnClick', $this->start_timer_on_click );
		$logic->av( 'nextButton', $this->next_button );
		$logic->av( 'tipAnimation', $this->tip_animation );
		$logic->av( 'tipAnimationFadeSpeed', $this->tip_animation_fade_speed );
		$logic->av( 'cookieMonster', $this->cookie_monster );
		$logic->av( 'cookieName', $this->cookie_name );
		$logic->av( 'cookieDomain', $this->cookie_domain );
		$logic->av( 'tipContainer', $this->tip_container );
		$logic->av( 'inline', $this->inline );
		$logic->av( 'tipContent', $this->tip_content );
		$logic->av( 'postRideCallback', $this->post_ride_callback );
		$logic->av( 'postStepCallback', $this->post_step_callback );

		// return vars
		return array(
			'options' => $logic->export_variables(true)
		);
	}

	/**
	 * Render the content for a suboption
	 *
	 * @param string $suboption Name of the suboption to render
	 */
	public function render_content( $suboption )
	{
		// try to get suboption
		$option = $this->get_suboption( $suboption );

		// get an option?
		if ( $option ) {
			// get the value
			print $option->get();
		}
	}

}

?>
