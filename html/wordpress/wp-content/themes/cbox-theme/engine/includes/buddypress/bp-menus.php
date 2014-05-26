<?php

/**
 * Sets up a default sub menu in the CBOX theme.
 *
 * This function is fired on 'get_header' on the frontend to give CBOX
 * components a chance to configure from the admin area (like BP Docs).
 */
function cbox_theme_add_default_sub_menu()
{
	// setup pages
	$pages = array(
		array(
			'title'        => _x( 'Home', 'the link in the header navigation bar', 'cbox-theme' ),
			'position'     => 0,
			'url'          => home_url( '/' )
		),
		array(
			'title'        => _x( 'People', 'the link in the header navigation bar', 'cbox-theme' ),
			'position'     => 10,
			'bp_directory' => 'members'
		),
		array(
			'title'        => _x( 'Groups', 'the link in the header navigation bar', 'cbox-theme' ),
			'position'     => 20,
			'bp_directory' => 'groups'
		),
		array(
			'title'        => _x( 'Blogs', 'the link in the header navigation bar', 'cbox-theme' ),
			'position'     => 30,
			'bp_directory' => 'blogs'
		),
		array(
			'title'        => _x( 'Activity', 'the link in the header navigation bar', 'cbox-theme' ),
			'position'     => 50,
			'bp_directory' => 'activity'
		),
	);

	// BuddyPress Docs Wiki
	if ( defined( 'BP_DOCS_WIKI_SLUG' ) ) {
		$pages[5]['title']    = _x( 'Wiki', 'the link in the header navigation bar', 'cbox-theme' );
		$pages[5]['position'] = 40;
		$pages[5]['url']      = home_url( 'wiki' );
	}

	// register our default sub-menu
	cbox_theme_register_default_menu( array(
		'menu_name'  => 'cbox-sub-menu',
		'location'   => 'sub-menu',
		'pages'      => $pages
	) );
}

/**
 * Register and create a default menu in CBOX.
 *
 * @param array $args Arguments to register the default menu:
 *  'menu_name' - The internal menu name we should give our new menu.
 *  'location' - The nav menu location we want our new menu to reside.
 *  'pages' - Associative array of pages. Sample looks like this:
 *       array(
 *            array(
 *                 'title'    => 'Home',
 *                 'position' => 0,
 *                 'url'      => home_url( '/' ) // custom url
 *            ),
 *            array(
 *                 'title'        => 'Members',
 *                 'position'     => 10,
 *                 'bp_directory' => 'members'   // match bp component
 *            ),
 *       )
 */
function cbox_theme_register_default_menu( $args = array() )
{
	global $blog_id;

	if ( empty( $args['menu_name'] ) || empty( $args['location'] ) || empty( $args['pages'] ) )
		return false;

	if ( ! is_array( $args['pages'] ) )
		return false;

	// check BP reqs and if our custom default menu already exists
	if (
		function_exists( 'bp_core_get_directory_pages' ) &&
		BP_ROOT_BLOG == $blog_id &&
		! is_nav_menu( $args['menu_name'] )
	) {

		// menu doesn't exist, so create it
		$menu_id = wp_create_nav_menu( $args['menu_name'] );

		// get bp pages
		$bp_pages = bp_core_get_directory_pages();

		// now, add the pages to our menu
		foreach( $args['pages'] as $page ) {
			// default args
			$params = array(
				'menu-item-status'     => 'publish',
				'menu-item-title'      => $page['title'],
				//'menu-item-attr-title' => ! empty( $page['attr-title'] ) ? $page['attr-title'] : $page['title'],
				'menu-item-classes'    => 'icon-' . ! empty( $page['bp_directory'] ) ? $page['bp_directory'] : sanitize_title( $page['title'] ),
				'menu-item-position'   => $page['position']
			);

			// support custom menu type
			if ( ! empty( $page['type'] ) )
				$params['menu-item-type'] = $page['type'];

			// support custom url
			if ( ! empty( $page['url'] ) )
				$params['menu-item-url']  = $page['url'];

			// add additional args for bp directories
			if ( ! empty( $page['bp_directory'] ) ) {
				// bp directory page doesn't exist, so stop!
				if ( ! array_key_exists( $page['bp_directory'], get_object_vars( $bp_pages ) ) )
					continue;

				// yep, add page as a nav item
				$params['menu-item-type']      = 'post_type';
				$params['menu-item-object']    = 'page';
				$params['menu-item-object-id'] = $bp_pages->{$page['bp_directory']}->id;
			}

			wp_update_nav_menu_item( $menu_id, 0, $params );

			$params = array();
		}

		// get location settings
		$locations = get_theme_mod( 'nav_menu_locations' );

		// is our menu location set yet?
		if ( empty( $locations[ $args['location'] ] ) ) {
			// nope, set it
			$locations[ $args['location'] ] = $menu_id;

			// update theme mode
			set_theme_mod( 'nav_menu_locations', $locations );
		}

		return true;
	}
}
