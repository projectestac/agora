<?php

/**
 * Custom Post Type functions
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */


/**
 * Register Google Calendar Events custom post type
 * 
 * @since 2.0.0
 */
function gce_setup_cpt() {

	$labels = array(
		'name'               => __( 'Google Calendar Feeds', 'gce' ),
		'singular_name'      => __( 'Feed', 'gce' ),
		'menu_name'          => __( 'GCal Events', 'gce' ),
		'name_admin_bar'     => __( 'Feed', 'gce' ),
		'add_new'            => __( 'Add New', 'gce' ),
		'add_new_item'       => __( 'Add New Feed', 'gce' ),
		'new_item'           => __( 'New Feed', 'gce' ),
		'edit_item'          => __( 'Edit Feed', 'gce' ),
		'view_item'          => __( 'View Feed', 'gce' ),
		'all_items'          => __( 'All GCal Feeds', 'gce' ),
		'search_items'       => __( 'Search GCal Feeds', 'gce' ),
		'not_found'          => __( 'No feeds found.', 'gce' ),
		'not_found_in_trash' => __( 'No feeds found in Trash.', 'gce' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true, // This removes the 'view' and 'preview' links from what I can tell
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => plugins_url( '/assets/gcal-icon-16x16.png', GCE_MAIN_FILE ),
		'supports'           => array( 'title', 'editor' )
	);
	
	register_post_type( 'gce_feed', $args );
	
	// MUST ONLY RUN ONCE!
	if( false === get_option( 'gce_cpt_setup' ) ) {
		flush_rewrite_rules();
		update_option( 'gce_cpt_setup', 1 );
	}
	
}
add_action( 'init', 'gce_setup_cpt' );

/**
 * Messages for Feed actions
 *
 * @since 2.0.0
 */
function gce_feed_messages( $messages ) {
	global $post, $post_ID;

	$url1 = '<a href="' . get_permalink( $post_ID ) . '">';
	$url2 = 'feed';
	$url3 = '</a>';
	$s1   = 'Feed';

	$messages['gce_feed'] = array(
		1  => sprintf( __( '%4$s updated. %1$sView %2$s%3$s', 'gce' ), $url1, $url2, $url3, $s1 ),
		4  => sprintf( __( '%4$s updated. %1$sView %2$s%3$s', 'gce' ), $url1, $url2, $url3, $s1 ),
		6  => sprintf( __( '%4$s published. %1$sView %2$s%3$s', 'gce' ), $url1, $url2, $url3, $s1 ),
		7  => sprintf( __( '%4$s saved. %1$sView %2$s%3$s', 'gce' ), $url1, $url2, $url3, $s1 ),
		8  => sprintf( __( '%4$s submitted. %1$sView %2$s%3$s', 'gce' ), $url1, $url2, $url3, $s1 ),
		10 => sprintf( __( '%4$s draft updated. %1$sView %2$s%3$s', 'gce' ), $url1, $url2, $url3, $s1 )
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'gce_feed_messages' );


/**
 * Add post meta to tie in with the Google Calendar Events custom post type
 * 
 * @since 2.0.0
 */
function gce_cpt_meta() {
	add_meta_box( 'gce_feed_meta', 'Feed Settings', 'gce_display_meta', 'gce_feed', 'advanced', 'core' );

	// Sidebar meta box below publish section.
	add_meta_box( 'gce_feed_sidebar_help', 'Helpful Links', 'gce_feed_sidebar_help', 'gce_feed', 'side', 'core' );

	add_meta_box( 'gce_display_options_meta', 'Display Options', 'gce_display_options_meta', 'gce_feed', 'side', 'core' );
}
add_action( 'add_meta_boxes', 'gce_cpt_meta' );

/**
 * Function called to display post meta
 * 
 * @since 2.0.0
 */
function gce_display_meta() {
	include_once( GCE_DIR . '/views/admin/gce-feed-meta-display.php' );
}

/**
 * Function called to display help in sidebar.
 *
 * @since 2.0.0
 */
function gce_feed_sidebar_help() {
	include_once( GCE_DIR . '/views/admin/gce-feed-sidebar-help.php' );
}

/**
 * Function called to display post meta
 * 
 * @since 2.0.0
 */
function gce_display_options_meta() {
	include_once( GCE_DIR . '/views/admin/display-options-meta.php' );
}

/**
 * Function to save post meta for the feed CPT
 * 
 * @since 2.0.0
 */
function gce_save_meta( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
	}

	// An array to hold all of our post meta ids so we can run them through a loop
	$post_meta_fields = array(
		'gce_feed_url',
		'gce_retrieve_from',
		'gce_retrieve_until',
		'gce_retrieve_max',
		'gce_date_format',
		'gce_time_format',
		'gce_cache',
		'gce_multi_day_events',
		'gce_display_mode',
		'gce_custom_from',
		'gce_custom_until',
		'gce_search_query',
		'gce_expand_recurring',
		// Display options
		'gce_display_start',
		'gce_display_start_text',
		'gce_display_end',
		'gce_display_end_text',
		'gce_display_separator',
		'gce_display_location',
		'gce_display_location_text',
		'gce_display_description',
		'gce_display_description_text',
		'gce_display_description_max',
		'gce_display_link',
		'gce_display_link_tab',
		'gce_display_link_text',
		'gce_display_simple'
	);

	$post_meta_fields = apply_filters( 'gce_feed_meta', $post_meta_fields );

	if ( current_user_can( 'edit_post', $post_id ) ) {
		// Loop through our array and make sure it is posted and not empty in order to update it, otherwise we delete it
		foreach ( $post_meta_fields as $pmf ) {
			if ( isset( $_POST[$pmf] ) && ! empty( $_POST[$pmf] ) ) {
				if( $pmf == 'gce_feed_url' ) {
					update_post_meta( $post_id, $pmf, esc_url( $_POST[$pmf] ) );
				} else {
					update_post_meta( $post_id, $pmf, stripslashes( $_POST[$pmf] ) );
				}
			} else {
				// We want max to be set to 25 by default if nothing is entered
				if( $pmf == 'gce_retrieve_max' ) {
					update_post_meta( $post_id, $pmf, 25 );
				} else {
					delete_post_meta( $post_id, $pmf );
				}
			}
		}
	}
	
	return $post_id;
}
add_action( 'save_post', 'gce_save_meta' );


/**
 * Add column headers to our "All Feeds" CPT page
 * 
 * @since 2.0.0
 */
function gce_add_column_headers( $defaults ) {
		
	$new_columns = array( 
		'cb'           => $defaults['cb'],
		'feed-id'      => __( 'Feed ID', 'gce' ),
		'feed-sc'      => __( 'Feed Shortcode', 'gce' ),
		'max-events'   => __( 'Max Events', 'gce' ),
		'display-type' => __( 'Display Type', 'gce' )
	);

	return array_merge( $defaults, $new_columns );
}
add_filter( 'manage_gce_feed_posts_columns', 'gce_add_column_headers' );  


/**
 * Fill out the columns
 * 
 * @since 2.0.0
 */
function gce_column_content( $column_name, $post_ID ) {
	
	switch ( $column_name ) {

		case 'feed-id': 
			echo $post_ID;
			break;
		case 'feed-sc':
			echo '<code>[gcal id="' . $post_ID . '"]</code>';
			break;
		case 'max-events':
			$max = get_post_meta( $post_ID, 'gce_retrieve_max', true );
			echo $max;
			break;
		case 'display-type':
			$display = get_post_meta( $post_ID, 'gce_display_mode', true );
			
			if( $display == 'grid' ) {
				echo __( 'Grid', 'gce' );
			} else if( $display == 'list' ) {
				echo __( 'List', 'gce' );
			} else { 
				echo __( 'Grouped List', 'gce' );
			}
			break;
	}
}
add_action( 'manage_gce_feed_posts_custom_column', 'gce_column_content', 10, 2 );

/**
 * Add the "Clear Cache" action to the CPT action links
 * 
 * @since 2.0.0
 */
function gce_cpt_actions( $actions, $post ) {
	if( $post->post_type == 'gce_feed' ) {
		$actions['clear_cache'] = '<a href="' . add_query_arg( array( 'clear_cache' => $post->ID ) ). '">Clear Cache</a>';
	}
	
	return $actions;
}
add_filter( 'post_row_actions', 'gce_cpt_actions', 10, 2 );


/**
 * Function to clear cache if on the post listing page
 * 
 * @since 2.0.0
 */
function gce_clear_cache_link() {
	if( isset( $_REQUEST['clear_cache'] ) ) {
		$post_id = absint( $_REQUEST['clear_cache'] );

		gce_clear_cache( $post_id );
		
		settings_errors( 'gce-notices' );
	}
}
add_action( 'admin_init', 'gce_clear_cache_link' );


function gce_clear_cache_on_save( $post_id ) {
	delete_transient( 'gce_feed_' . $post_id );
}
add_action( 'save_post_gce_feed', 'gce_clear_cache_on_save' );
