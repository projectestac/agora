<?php
/**
 * ICE API: widget extensions, menu widget class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage widgets
 * @since 1.0
 */

ICE_Loader::load( 'components/widgets/component', 'utils/ajax' );

/**
 * Menu widget
 *
 * @package ICE-extensions
 * @subpackage widgets
 */
class ICE_Ext_Widget_Menu
	 extends ICE_Widget
{
	/**
	 * @var callback
	 */
	protected $menu_items;

	/**
	 */
	protected function get_property( $name )
	{
		switch ( $name ) {
			case 'menu_items':
				return $this->$name;
			default:
				return parent::get_property( $name );
		}
	}
	
	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// slurp admin styles
		$this->style()
			->section( 'admin' )
			->cache( 'admin', 'admin.css' );
	}
	
	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		if ( is_admin() ) {
			// need jquery ui menu
			wp_enqueue_script( 'jquery-ui-menu' );
		}
	}


	/**
	 */
	public function configure()
	{
		// RUN PARENT FIRST!
		parent::configure();

		// menu items
		if ( $this->config()->contains( 'menu_items' ) ) {
			$this->menu_items = $this->config( 'menu_items' );
		}
	}

	/**
	 */
	public function get_template_vars()
	{
		return array(
			'button_script' => $this->get_button_script()
		);
	}

	/**
	 * Execute configured menu_items callback and return results
	 *
	 * @return array
	 */
	protected function get_items()
	{
		$callback = $this->menu_items;

		if ( function_exists( $callback ) ) {
			return call_user_func( $callback );
		} else {
			throw new Exception(
				sprintf( 'The menu items callback function "%" does not exist', $callback ) );
		}
	}

	/**
	 * Render the list element that will be menufied
	 */
	public function render_items()
	{
		// render list
		foreach( $this->get_items() as $item_slug => $item ) { ?>
			<li>
				<a id="<?php print $this->element()->id( $item_slug ) ?>" href="<?php print esc_attr( $item['href'] ) ?>"><?php print esc_attr( $item['text'] ) ?></a>
			</li><?php
		}
	}

	/**
	 * Generate all script for creating buttons and return script object
	 *
	 * @return ICE_Script
	 */
	protected function get_button_script()
	{
		// script object
		$script = new ICE_Script();

		// loop all items
		foreach( $this->get_items() as $item_slug => $item ) {

			// reset vars
			$conf = null;
			$icon_primary = null;
			$icon_secondary = null;

			// check for primary
			if ( isset( $item['icon_primary'] ) ) {
				$icon_primary = $item['icon_primary'];
			}

			// check for secondary
			if ( isset( $item['icon_secondary'] ) ) {
				$icon_secondary = $item['icon_secondary'];
			}

			// get any?
			if ( $icon_primary || $icon_secondary) {
				// new icon object
				$icon = new ICE_Icon( $icon_primary, $icon_secondary );
				// format conf
				$conf = sprintf( '{%s}', $icon->config() );
			}
			
			/*\*/ if(0)?><script><?php /*\*/

			// start capturing
			$script->begin_logic();
			
			// the button statement ?>
			jQuery('a#<?php print $this->element()->id( $item_slug ) ?>').button(<?php print $conf ?>); <?php

			// end capturing
			$script->end_logic();
			
			/*\*/ if(0)?></script><?php /*\*/
		}

		return $script;
	}
}
