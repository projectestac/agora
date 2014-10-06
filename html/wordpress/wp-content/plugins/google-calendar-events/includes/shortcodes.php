<?php

/**
 * Shortcode functions
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */


/**
 * Adds support for the new [gcal] shortcode
 * 
 * Supports the old [google-calendar-events] shortcode
 * 
 * @since 2.0.0
 */
function gce_gcal_shortcode( $attr ) {

	extract( shortcode_atts( array(
					'id'      => null,
					'display' => '',
					'max'     => 0,
					'order'   => 'asc',
					'title'   => null,
					'type'    => null,
				), $attr, 'gce_feed' ) );
	
	// If no ID is specified then return
	if( empty( $id ) ) {
		return;
	}
	
	$feed_ids = explode( ',', $id );

	foreach( $feed_ids as $k => $v ) {
		// Check for an old ID attached to this feed ID first
		$q = new WP_Query( "post_type=gce_feed&meta_key=old_gce_id&meta_value=$v&order=ASC" );

		if( $q->have_posts() ) {
			$q->the_post();
			// Set our ID to the old ID if found
			$feed_ids[$k] = get_the_ID();
			$v = get_the_ID();
		}

		if( empty( $display ) ) {
			$display = get_post_meta( $v, 'gce_display_mode', true );
		}
	}

	// Port over old options
	if( $type != null ) {
		if( 'ajax' == $type ) {
			$display = 'grid';
		} else {
			$display = $type;
		}
	}

	$args = array(
		'title_text' => $title,
		'max_events' => $max,
		'sort'       => $order,
		'grouped'    => ( $display == 'list-grouped' ? 1 : 0 ),
		'month'      => null,
		'year'       => null,
		'widget'     => 0
	);
	
	$feed_ids = implode( '-', $feed_ids );

	return gce_print_calendar( $feed_ids, $display, $args );
	
}
add_shortcode( 'gcal', 'gce_gcal_shortcode' );
add_shortcode( 'google-calendar-events', 'gce_gcal_shortcode' );
