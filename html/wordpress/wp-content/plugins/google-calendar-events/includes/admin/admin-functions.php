<?php
/**
 * Admin helper functions
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

/**
 * Function to clear the cache out
 * 
 * @since 2.0.0
 */
function gce_clear_cache( $id ) {
	
	delete_transient( 'gce_feed_' . $id );
	
	add_settings_error( 'gce-notices', 'gce-cache-updated', __( 'Cache has been cleared for this feed.', 'gce' ), 'updated' );
}

/**
 * Function that runs when a new Feed CPT is made
 * Adds the default editor content for the event builder
 * Adds default post meta options
 * 
 * @since 2.0.0
 */

function gce_default_editor_content( $content, $post ) {
	
	if( $post->post_type == 'gce_feed' ) {

// XTEC ************ MODIFICAT - Default template customized and hardcode translated
// 2014.10.08 @aginard

        $content  = '<div class="gce-list-event gce-tooltip-event">[event-title]</div>' . "\n";
        $content .= '[if-not-all-day]' . "\n";
        $content .= '[if-single-day]<div><span>Quan:</span> [start-time]-[end-time]</div>[/if-single-day]' . "\n";
        $content .= '[/if-not-all-day]' . "\n";
        $content .= '[if-multi-day]<div>Del [start-date] fins al [end-date]</div>[/if-multi-day]' . "\n";
        $content .= '[if-location]<div><span>On:</span> [location]</div>[/if-location]' . "\n";
        $content .= '[if-description]<div>[description]</div>[/if-description]' . "\n";
        $content .= '<div>[link newwindow="true"]Més detalls...[/link]</div>' . "\n";

//************ ORIGINAL
/*
		$content  = '<div class="gce-list-event gce-tooltip-event">[event-title]</div>' . "\n";
		$content .= '<div><span>' . __( 'Starts:', 'gce' ) . '</span> [start-time]</div>' . "\n";
		$content .= '<div><span>' . __( 'Ends:', 'gce' ) . '</span> [end-date] - [end-time]</div>' . "\n";
		$content .= '[if-location]<div><span>' . __( 'Location:', 'gce' ) . '</span> [location]</div>[/if-location]' . "\n";
		$content .= '[if-description]<div><span>' . __( 'Description:', 'gce' ) . '</span> [description]</div>[/if-description]' . "\n";
		$content .= '<div>[link newwindow="true"]' . __( 'More details...', 'gce' ) . '[/link]</div>' . "\n";
*/
//************ FI
		
		// Default Post Meta Options
		add_post_meta( $post->ID, 'gce_expand_recurring', 1 );
		add_post_meta( $post->ID, 'gce_retrieve_from', 'today' );
		add_post_meta( $post->ID, 'gce_retrieve_until', 'end_time' );
		add_post_meta( $post->ID, 'gce_cache', 43200 );
		add_post_meta( $post->ID, 'gce_paging', 1 );
		add_post_meta( $post->ID, 'gce_list_max_num', 7 );
		add_post_meta( $post->ID, 'gce_list_max_length', 'days' );
		add_post_meta( $post->ID, 'gce_list_start_offset_num', '0' );
		add_post_meta( $post->ID, 'gce_feed_start', '1' );
		add_post_meta( $post->ID, 'gce_feed_start_interval', 'months' );
		add_post_meta( $post->ID, 'gce_feed_end', '2' );
		add_post_meta( $post->ID, 'gce_feed_end_interval', 'years' );
		
		// Default Simple Display Options
		add_post_meta( $post->ID, 'gce_display_start', 'time' );
		add_post_meta( $post->ID, 'gce_display_start_text', __( 'Starts:', 'gce' ) );
		add_post_meta( $post->ID, 'gce_display_end', 'time-date' );
		add_post_meta( $post->ID, 'gce_display_end_text', __( 'Ends:', 'gce' ) );
		add_post_meta( $post->ID, 'gce_display_separator', ', ' );
		add_post_meta( $post->ID, 'gce_display_location_text', __( 'Location:', 'gce' ) );
		add_post_meta( $post->ID, 'gce_display_description_text', __( 'Description:', 'gce' ) );
		add_post_meta( $post->ID, 'gce_display_link', 1 );
		add_post_meta( $post->ID, 'gce_display_link_text', __( 'More Details', 'gce' ) );
		
	}
	
	return $content;
}
add_filter( 'default_content', 'gce_default_editor_content', 10, 2 );


function gce_add_cache_button() {
		global $post;
		
		if( $post->post_type == 'gce_feed' ) {
			$html = '<div id="gce-clear-cache">' .
					'<a href="' . add_query_arg( array( 'clear_cache' => true ) ) . '">' . __( 'Clear Cache', 'gce' ) . '</a>' .
					'</div>';

			echo $html;
		}
}
add_action( 'post_submitbox_start', 'gce_add_cache_button' );


