<?php
/**
 * ICE API: option extensions, pages class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage options
 * @since 1.0
 */

/**
 * Pages option
 *
 * @package ICE-extensions
 * @subpackage options
 */
class ICE_Ext_Option_Pages
	extends ICE_Option
{
	/**
	 * Render page checkboxes
	 */
	public function render_field()
	{
		$args = array(
			'depth'        => 0,
			'show_date'    => '',
			'date_format'  => get_option('date_format'),
			'child_of'     => 0,
			'exclude'      => '',
			'include'      => '',
			'title_li'     => '',
			'echo'         => true,
			'authors'      => '',
			'sort_column'  => 'menu_order, post_title',
			'link_before'  => '',
			'link_after'   => '',
			'walker'			=> new ICE_Option_Walker_Page(),
			'ice_option'	=> $this );

		// call the WordPress function
		wp_list_pages( $args );
	}
}
