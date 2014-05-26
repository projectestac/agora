<?php


/**
 * Populates sidebars throughout the theme on activation
 *
 * When activating cbox-theme, this function is triggered. It checks each of
 * cbox-theme's sidebars, and for each one that is empty, it sets up a number
 * of default widgets. Note that this will not override changes you've made
 * to any of these sidebars, unless you've cleared them out completely.
 *
 * @uses CBox_Widget_Setter
 * @since 1.0
 */
function cbox_theme_populate_sidebars() {

	// Homepage Top Right
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'homepage-top-right' ) ) {

		$welcome_text = sprintf( __( '<p><a class="button green" href="%s">Join us</a> or <a class="button white" href="%s">Login</a></p>', 'cbox-theme' ), bp_get_root_domain() . '/' . bp_get_signup_slug() . '/', wp_login_url() );

		if ( current_user_can( 'edit_theme_options' ) ) {
			$welcome_text = sprintf( __( '<p>To modify the text of this widget, and other widgets you see throughout the site, visit <a href="%s">Dashboard > Appearance > Widgets</a>.', 'cbox-theme' ), admin_url( 'widgets.php' ) ) . $welcome_text;
		}

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'text',
			'sidebar_id' => 'homepage-top-right',
			'settings'   => array(
				'title' => __( 'Welcome', 'cbox-theme' ),
				'text'  => $welcome_text,
				'filter' => false,
			),
		) );

		// Pull up a random member to populate
		global $wpdb;
		$username = $wpdb->get_var( "SELECT user_login FROM {$wpdb->users} ORDER BY RAND()" );

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'cac_featured_content_widget',
			'sidebar_id' => 'homepage-top-right',
			'settings'   => array(
				'title' => __( 'Featured Member', 'cbox-theme' ),
				'title_element' => 'h4',
				'featured_content_type' => 'member',
				'featured_member' => $username,
				'custom_description' => __( 'Use the Featured Content widget to show off outstanding content from your community.', 'cbox-theme' ),
				'display_images' => '1',
				'crop_length' => '250',
				'image_width' => '50',
				'image_height' => '50',
				'image_url' => '',
				'read_more' => '',
				'filter' => false,
			),
		) );
	} // End homepage-top-widget

	// Homepage Center Widget
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'homepage-center-widget' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'bp_core_recently_active_widget',
			'sidebar_id' => 'homepage-center-widget',
			'settings'   => array(
				'title' => __( 'Recently Active Members', 'cbox-theme' ),
				'max_members' => 15,
				'filter' => false,
			),
		) );

	} // End homepage-center-widget

	// Homepage Left
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'homepage-left' ) ) {

		if ( bp_is_active( 'groups' ) ) {
			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bp_groups_widget',
				'sidebar_id' => 'homepage-left',
				'settings'   => array(
					'title' => __( 'Groups', 'cbox-theme' ),
					'max_groups'  => 20,
					'link_title' => 1,
					'group_default' => 'newest',
					'filter' => false,
				),
			) );
		}

	} // End homepage-left

	// Homepage Middle
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'homepage-middle' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'bp_core_members_widget',
			'sidebar_id' => 'homepage-middle',
			'settings'   => array(
				'title' => __( 'Members', 'cbox-theme' ),
				'max_members' => 20,
				'link_title' => 1,
				'member_default' => 'newest',
				'filter' => false,
			),
		) );
	} // End homepage-middle

	// Homepage Right
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'homepage-right' ) ) {

		if ( bp_is_active( 'blogs' ) && is_multisite() && CBox_Widget_Setter::widget_exists( 'cbox_bp_blogs_recent_posts_widget' ) ) {
			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'cbox_bp_blogs_recent_posts_widget',
				'sidebar_id' => 'homepage-right',
				'settings'   => array(
					'title' => __( 'Recent Blog Posts', 'cbox-theme' ),
					'filter' => false,
				),
			) );
		} else {
			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'recent-posts',
				'sidebar_id' => 'homepage-right',
				'settings'   => array(
					'title' => __( 'Recent Blog Posts', 'cbox-theme' ),
					'filter' => false,
				),
			) );
		}
	} // End homepage-right

	// Blog Sidebar
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'blog-sidebar' ) ) {

		if ( bp_is_active( 'blogs' ) && is_multisite() && CBox_Widget_Setter::widget_exists( 'cbox_bp_blogs_recent_posts_widget' ) ) {
			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'cbox_bp_blogs_recent_posts_widget',
				'sidebar_id' => 'blog-sidebar',
				'settings'   => array(
					'title' => __( 'Recent Blog Posts', 'cbox-theme' ),
					'filter' => false,
				),
			) );
		} else {

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'search',
				'sidebar_id' => 'blog-sidebar',
				'settings'   => array(
					'title' => __( 'Search', 'cbox-theme' ),
					'filter' => false,
				),
			) );

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'archives',
				'sidebar_id' => 'blog-sidebar',
				'settings'   => array(
					'title' => __( 'Archives', 'cbox-theme' ),
					'filter' => false,
				),
			) );

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'recent-posts',
				'sidebar_id' => 'blog-sidebar',
				'settings'   => array(
					'title' => __( 'Recent Blog Posts', 'cbox-theme' ),
					'filter' => false,
				),
			) );
		}

	} // End blog-sidebar

	// Page Sidebar
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'page-sidebar' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'pages',
			'sidebar_id' => 'page-sidebar',
			'settings'   => array(
				'title' => __( 'Pages', 'cbox-theme' ),
				'filter' => false,
			),
		) );

	} // End page-sidebar

	// Footer Left
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'footer-left' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'text',
			'sidebar_id' => 'footer-left',
			'settings'   => array(
				'title' => __( 'Contact Us', 'cbox-theme' ),
				'text'  => __( 'Put your contact information in this widget.', 'cbox-theme' ),
				'filter' => false,
			),
		) );

	} // End footer-left

	// Footer Middle
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'footer-middle' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'text',
			'sidebar_id' => 'footer-middle',
			'settings'   => array(
				'title' => __( 'About', 'cbox-theme' ),
				'text'  => __( 'Some brief information about your site.', 'cbox-theme' ),
				'filter' => false,
			),
		) );

	} // End footer-middle

	// Footer Right
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'footer-right' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'pages',
			'sidebar_id' => 'footer-right',
			'settings'   => array(
				'title' => __( 'Sitemap', 'cbox-theme' ),
				'text'  => __( 'You might use this space to thank ', 'cbox-theme' ),
				'filter' => false,
			),
		) );

	} // End footer-right

	// Activity Sidebar
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'activity-sidebar' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'bp_core_whos_online_widget',
			'sidebar_id' => 'activity-sidebar',
			'settings'   => array(
				'title' => __( 'Who\'s Online', 'cbox-theme' ),
				'max_members'  => 20,
				'filter' => false,
			),
		) );

	} // End activity-sidebar

	// Activity Sidebar
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'member-sidebar' ) ) {

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'bp_core_whos_online_widget',
			'sidebar_id' => 'member-sidebar',
			'settings'   => array(
				'title' => __( 'Who\'s Online', 'cbox-theme' ),
				'max_members'  => 20,
				'filter' => false,
			),
		) );

		CBox_Widget_Setter::set_widget( array(
			'id_base'    => 'bp_core_recently_active_widget',
			'sidebar_id' => 'member-sidebar',
			'settings'   => array(
				'title' => __( 'Recently Active Members', 'cbox-theme' ),
				'max_members'  => 20,
				'filter' => false,
			),
		) );

	} // End member-sidebar

	// Group Sidebar
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'groups-sidebar' ) ) {

		if ( bp_is_active( 'groups' ) ) {
			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bp_groups_widget',
				'sidebar_id' => 'groups-sidebar',
				'settings'   => array(
					'title' => __( 'Groups', 'cbox-theme' ),
					'max_groups'  => 5,
					'link_title' => '1',
					'filter' => false,
				),
			) );
		}

	} // End groups-sidebar

	// Homepage Right
	if ( ! CBox_Widget_Setter::is_sidebar_populated( 'forums-sidebar' ) ) {

		if ( function_exists( 'bbpress' ) ) {
			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bbp_views_widget',
				'sidebar_id' => 'forums-sidebar',
				'settings'   => array(
					'title' => __( 'Topic View List', 'cbox-theme' ),
					'filter' => false,
				),
			) );

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bbp_topics_widget',
				'sidebar_id' => 'forums-sidebar',
				'settings'   => array(
					'title' => __( 'Recent Topics', 'cbox-theme' ),
					'max_shown' => 6,
					'filter' => false,
				),
			) );

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bbp_replies_widget',
				'sidebar_id' => 'forums-sidebar',
				'settings'   => array(
					'title' => __( 'Recent Replies', 'cbox-theme' ),
					'max_shown' => 6,
					'filter' => false,
				),
			) );
		}

	} // End forums-sidebar

	if ( function_exists( 'bpdw_slug' ) ) {
		$create_url = trailingslashit( home_url( bpdw_slug() ) ) . trailingslashit( BP_DOCS_CREATE_SLUG );

		// Wiki Sidebar
		if ( ! CBox_Widget_Setter::is_sidebar_populated( 'wiki-sidebar' ) ) {

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'text',
				'sidebar_id' => 'wiki-sidebar',
				'settings'   => array(
					'title'  => __( 'Welcome To The Wiki', 'cbox-theme' ),
					'text'   => '<p>' . sprintf( __( 'This sidebar appears on all Wiki pages. Use it to display content that you want your users to see whenever viewing the Wiki, such as a brief description of how wikis work, or a link to <a href="%s">create a new wiki page</a>.', 'cbox-theme' ), $create_url ) . '</p><p>' . sprintf( __( 'To edit this widget, or to add more widgets to the sidebar, visit <a href="%s">Dashboard > Appearance > Widgets</a> and look for the Wiki Sidebar.', 'cbox-theme' ), admin_url( 'widgets.php' ) ) . '</p>',
					'filter' => false,
				),
			) );

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'text',
				'sidebar_id' => 'wiki-sidebar',
				'settings'   => array(
					'title'  => '',
					'text'   => '<a href="' . $create_url . '" class="button">' . __( 'Create New Wiki Page', 'cbox-theme' ) . '</a>',
					'filter' => false,
				),
			) );

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bpdw_tag_cloud',
				'sidebar_id' => 'wiki-sidebar',
				'settings'   => array(
					'title'  => __( 'Wiki Tags', 'bp-docs-wiki' ),
					'filter' => false,
				),
			) );

		} // End wiki-sidebar

		// Wiki Top
		if ( ! CBox_Widget_Setter::is_sidebar_populated( 'wiki-top' ) ) {

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'text',
				'sidebar_id' => 'wiki-top',
				'settings'   => array(
					'title'  => __( 'Welcome To The Wiki', 'bp-docs-wiki' ),
					'text'   => '<p>' . __( 'This is a text widget that you can use to introduce your users to the wiki, and perhaps to feature some outstanding wiki content.', 'bp-docs-wiki' ) . '</p><p>' . sprintf( __( 'Edit this widget, or add others to the Wiki Top sidebar, at <a href="%s">Dashboard > Appearance > Widgets</a>.', 'cbox-theme' ), admin_url( 'widgets.php' ) ) . '</p>',
					'filter' => false,
				),
			) );

		} // End wiki-top

		// Wiki Bottom Left
		if ( ! CBox_Widget_Setter::is_sidebar_populated( 'wiki-bottom-left' ) ) {

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bpdw_recently_active',
				'sidebar_id' => 'wiki-bottom-left',
				'settings'   => array(
					'title'  => __( 'Recently Active', 'bp-docs-wiki' ),
					'filter' => false,
					'max_pages' => 5,
				),
			) );

		} // End wiki-bottom-left

		// Wiki Bottom Right
		if ( ! CBox_Widget_Setter::is_sidebar_populated( 'wiki-bottom-right' ) ) {

			CBox_Widget_Setter::set_widget( array(
				'id_base'    => 'bpdw_most_active',
				'sidebar_id' => 'wiki-bottom-right',
				'settings'   => array(
					'title'  => __( 'Most Active', 'bp-docs-wiki' ),
					'filter' => false,
					'max_pages' => 5,
				),
			) );

		} // End wiki-bottom-right

	} // End bpdw wiki sidebars

}
