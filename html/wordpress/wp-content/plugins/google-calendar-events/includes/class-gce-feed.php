<?php

/**
 * Class GCE_Feed
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

class GCE_Feed {
	
	public $id,
		   $feed_url,
		   $date_format,
		   $time_format,
		   $cache,
		   $multiple_day_events,
		   $display_url,
		   $search_query,
		   $expand_recurring,
		   $title;
	
	public $events = array();
	
	/**
	 * Class constructor
	 * 
	 * @since 2.0.0
	 */
	public function __construct( $id ) {
		// Set the ID
		$this->id = $id;
		
		// Set up all other data based on the ID
		$this->setup_attributes();
		
		// Now create the Feed
		$this->create_feed();

	}
	
	/**
	 * Set the transient to cache the events
	 * 
	 * @since 2.0.0
	 */
	private function cache_events() {
		set_transient( 'gce_feed_' . $this->id, $this->events, $this->cache );
	}
	
	/**
	 * Set all of the feed attributes from the post meta options
	 * 
	 * @since 2.0.0
	 */
	private function setup_attributes() {	
		$date_format = get_post_meta( $this->id, 'gce_date_format', true );
		$time_format = get_post_meta( $this->id, 'gce_time_format', true );
		
		$this->feed_url            = get_post_meta( $this->id, 'gce_feed_url', true );
		$this->date_format         = ( ! empty( $date_format ) ? $date_format : get_option( 'date_format' ) );
		$this->time_format         = ( ! empty( $time_format ) ? $time_format : get_option( 'time_format' ) );
		$this->cache               = get_post_meta( $this->id, 'gce_cache', true );
		$this->multiple_day_events = get_post_meta( $this->id, 'gce_multi_day_events', true );
		$this->search_query        = get_post_meta( $this->id, 'gce_search_query', true );
		$this->expand_recurring    = get_post_meta( $this->id, 'gce_expand_recurring', true );
		$this->title               = get_the_title( $this->id );
	}
	
	/**
	 * Create the feed URL 
	 * 
	 * @since 2.0.0
	 */
	private function create_feed() {
		//Break the feed URL up into its parts (scheme, host, path, query)
		
		if( empty( $this->feed_url ) ) {
			if( current_user_can( 'manage_options' ) ) {
				echo '<p>' . __( 'The feed URL has not been set. Please make sure to set it correctly in the Feed settings.', 'gce' ) . '</p>';
			}
			
			return;
		}
		
		$url_parts = parse_url( $this->feed_url );
		
		$scheme = ( is_ssl() ? 'https://' : 'http://' );

		$scheme_and_host = $scheme . $url_parts['host'];

		//Remove the exisitng projection from the path, and replace it with '/full-noattendees'
		$path = substr( $url_parts['path'], 0, strrpos( $url_parts['path'], '/' ) ) . '/full-noattendees';

		//Add the default parameters to the querystring (retrieving JSON, not XML)
		$query = '?alt=json&sortorder=ascending&orderby=starttime';
		
		$start = $this->get_feed_start();
		
		$end   = $this->get_feed_end();
		
		$gmt_offset = abs( get_option( 'gmt_offset' ) * 3600 );
		
		$query .= '&start-min=' . date( 'Y-m-d\TH:i:s', $start - $gmt_offset );
		
		$query .= '&start-max=' . date( 'Y-m-d\TH:i:s', $end - $gmt_offset );
		

		// Max results limit for performance.
		$query .= '&max-results=10000';
		
		$ctz = get_option( 'timezone_string' );
		
		if( ! empty( $ctz ) ) {
			$query .= '&ctz=' . $ctz;
		}
		
		if ( ! empty( $this->search_query ) ) {
			$query .= '&q=' . rawurlencode( $this->search_query );
		}
		
		if ( $this->expand_recurring ) {
			$query .= '&singleevents=true';
		}

		//Put the URL back together
		$this->display_url = $scheme_and_host . $path . $query;
		
		// Get all the feed data
		$this->get_feed_data( $this->display_url );
	}
	
	/**
	 * Make remote call to get the feed data
	 * 
	 * @since 2.0.0
	 */
	private function get_feed_data( $url ) {	
		
		// First check for transient data to use
		if( false !== get_transient( 'gce_feed_' . $this->id ) ) {
			$this->events = get_transient( 'gce_feed_' . $this->id );
		} else {
			
			// Moved the remote get here to be more efficient
			// Pointed out to us by John McManigle ( github.com/mcmanigle )
			$raw_data = wp_remote_get( $url, array(
				'sslverify' => false, //sslverify is set to false to ensure https URLs work reliably. Data source is Google's servers, so is trustworthy
				'timeout'   => 10     //Increase timeout from the default 5 seconds to ensure even large feeds are retrieved successfully
			) );
			
			//If $raw_data is a WP_Error, something went wrong
			if ( ! is_wp_error( $raw_data ) ) {
				//If response code isn't 200, something went wrong
				if ( 200 == $raw_data['response']['code'] ) {
					//Attempt to convert the returned JSON into an array
					$raw_data = json_decode( $raw_data['body'], true );
					
					//If decoding was successful
					if ( ! empty( $raw_data ) ) {
						//If there are some entries (events) to process
						if ( isset( $raw_data['feed']['entry'] ) ) {
							//Loop through each event, extracting the relevant information
							foreach ( $raw_data['feed']['entry'] as $event ) {
								$id          = ( isset( $event['gCal$uid']['value'] ) ? esc_html( substr( $event['gCal$uid']['value'], 0, strpos( $event['gCal$uid']['value'], '@' ) ) ) : '' );
								$title       = ( isset( $event['title']['$t'] ) ? esc_html( $event['title']['$t'] ) : '' );
								$description = ( isset( $event['content']['$t'] ) ? esc_html( $event['content']['$t'] ) : '' );
								$link        = ( isset( $event['link'][0]['href'] ) ? esc_url( $event['link'][0]['href'] ) : '' );
								$location    = ( isset( $event['gd$where'][0]['valueString'] ) ? esc_html( $event['gd$where'][0]['valueString'] ) : '' );
								$start_time  = ( isset( $event['gd$when'][0]['startTime'] ) ? $this->iso_to_ts( $event['gd$when'][0]['startTime'] ) : '' );
								$end_time    = ( isset( $event['gd$when'][0]['endTime'] ) ? $this->iso_to_ts( $event['gd$when'][0]['endTime'] ) : '' );

								//Create a GCE_Event using the above data. Add it to the array of events
								$this->events[] = new GCE_Event( $this, $id, $title, $description, $location, $start_time, $end_time, $link );
							}
						}
					} else {
						//json_decode failed
						$this->error = __( 'Some data was retrieved, but could not be parsed successfully. Please ensure your feed URL is correct.', 'gce' );
					}
				} else {
					//The response code wasn't 200, so generate a helpful(ish) error message depending on error code 
					switch ( $raw_data['response']['code'] ) {
						case 404:
							$this->error = __( 'The feed could not be found (404). Please ensure your feed URL is correct.', 'gce' );
							break;
						case 403:
							$this->error = __( 'Access to this feed was denied (403). Please ensure you have public sharing enabled for your calendar.', 'gce' );
							break;
						default:
							$this->error = sprintf( __( 'The feed data could not be retrieved. Error code: %s. Please ensure your feed URL is correct.', 'gce' ), $raw_data['response']['code'] );
					}
				}
			}else{
				//Generate an error message from the returned WP_Error
				$this->error = $raw_data->get_error_message() . __( ' Please ensure your feed URL is correct.', 'gce' );
			}
		}
		
		if( ! empty( $this->error ) ) {
			if( current_user_can( 'manage_options' ) ) {
				echo $this->error;
				return;
			}
		} else {
			if( $this->cache > 0 && false === get_transient( 'gce_feed_' . $this->id ) ) {
				$this->cache_events();
			}
		}
	}
	
	/**
	 * Convert an ISO date/time to a UNIX timestamp
	 * 
	 * @since 2.0.0
	 */
	private function iso_to_ts( $iso ) {
		sscanf( $iso, "%u-%u-%uT%u:%u:%uZ", $year, $month, $day, $hour, $minute, $second );
		return mktime( $hour, $minute, $second, $month, $day, $year );
	}
	
	private function get_feed_start() {
		
		$start    = get_post_meta( $this->id, 'gce_feed_start', true );
		$interval = get_post_meta( $this->id, 'gce_feed_start_interval', true );
		
		switch( $interval ) {
			case 'days':
				return time() - ( $start * 86400 );
			case 'months':
				return time() - ( $start * 2629743 );
			case 'years':
				return time() - ( $start * 31556926 );
		}
		
		// fall back just in case. Falls back to 1 year ago
		return time() - 31556926;
	}
	
	private function get_feed_end() {
		
		$end    = get_post_meta( $this->id, 'gce_feed_end', true );
		$interval = get_post_meta( $this->id, 'gce_feed_end_interval', true );
		
		switch( $interval ) {
			case 'days':
				return time() + ( $end * 86400 );
			case 'months':
				return time() + ( $end * 2629743 );
			case 'years':
				return time() + ( $end * 31556926 );
		}
		
		// Falls back to 1 year ahead just in case
		return time() + 31556926;
	}
	
	function get_builder() {
		
		$this->builder = get_post( $this->id )->post_content;
		
		return $this->builder;
	}
}
