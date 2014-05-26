<?php
/**
 * Infinity Theme: Custom Walkers
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage base
 * @since 1.0
 */

/**
 * Custom navigation menus walker
 *
 * @package Infinity
 * @subpackage base
 */
class Infinity_Base_Walker_Nav_Menu extends Walker_Nav_Menu
{
	/**
	 * Start rendering an item element
	 *
	 * This overrides the parent method.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth, $args)
	{
		// get item classes
		$item_classes = empty( $item->classes ) ? array() : (array) $item->classes;

		// pass through nav menu css classes filter
		$nav_classes = apply_filters( 'nav_menu_css_class', array_filter( $item_classes ), $item );

		// our custom output
		$item_output =
			infinity_base_superfish_list_item(
				array(
					'id' => $item->ID,
					'title' => apply_filters( 'the_title', $item->title, $item->ID ),
					'close_item' => false,
					'li_classes' => $nav_classes,
					'a_title' => $item->attr_title,
					'a_target' => $item->target,
					'a_rel' => $item->xfn,
					'a_href' => $item->url,
					'a_before' => $args->before,
					'a_after' => $args->after,
					'a_open' => $args->link_before,
					'a_close' => $args->link_after
				),
				false
			);

		// append it to the output
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth )
	{
		// close link item
		$output .= '</li>' . PHP_EOL;
		
	}
}

/**
 * Custom page menu walker
 *
 * @package Infinity
 * @subpackage base
 */
class Infinity_Base_Walker_Page_Menu extends Walker_Page
{
	/**
	 * Start rendering an item element
	 *
	 * This overrides the parent method.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $page Page data object.
	 * @param int $depth Depth of page. Used for padding.
	 * @param array $args
	 * @param int $current_page Page ID.
	 */
	function start_el(&$output, $page, $depth, $args, $current_page)
	{
		// need the menu item classes
		$classes[] = 'menu-item';
		$classes[] = 'menu-item-type-post_type';
		$classes[] = 'menu-item-object-page';

		// our custom output
		$output .=
			infinity_base_superfish_list_item(
				array(
					'id' => $page->ID,
					'title' => apply_filters( 'the_title', $page->post_title, $page->ID ),
					'close_item' => false,
					'li_classes' => $classes,
					'a_title' => $page->post_title,
					'a_href' => get_post_permalink( $page->ID ),
					'a_target' => ( isset( $args['target'] ) ) ? $args['target'] : null,
					'a_rel' => ( isset( $args['rel'] ) ) ? $args['rel'] : null,
					'a_open' => ( isset( $args['link_before'] ) ) ? $args['link_before'] : null,
					'a_close' => ( isset( $args['link_after'] ) ) ? $args['link_after'] : null
				),
				false
			);
	}

	/**
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $page Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $page, $depth )
	{
		// close link item
		$output .= '</li>' . PHP_EOL;
		
		// add menu divider to first level
		if ( $depth < 1 ) {
			$output .= '<li class="menu-divider"></li>' . PHP_EOL;
		}
	}
}
