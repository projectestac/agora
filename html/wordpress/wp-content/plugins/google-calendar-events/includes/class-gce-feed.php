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
		   $calendar_id,
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
	
	// Google API Key
	private $api_key = 'AIzaSyAssdKVved1mPVY0UJCrx96OUOF9u17AuY';
	
	/**
	 * Class constructor
	 * 
	 * @since 2.0.0
	 */
	public function __construct( $id ) {
		// Set the ID
		$this->id = $id;
		
		$this->calendar_id = get_post_meta( $this->id, 'gce_feed_url', true );
		
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
		
		global $gce_options;
		
		if( empty( $this->feed_url ) ) {
			if( current_user_can( 'manage_options' ) ) {
				echo '<p>' . __( 'The feed URL has not been set. Please make sure to set it correctly in the Feed settings.', 'gce' ) . '</p>';
			}
			
			return;
		}
		
		$args = array();
		
		if( ! empty( $gce_options['api_key'] ) ) {
			$api_key = $gce_options['api_key'];
		} else {
			$api_key = $this->api_key;
		}
		
		$query = 'https://www.googleapis.com/calendar/v3/calendars/' . $this->calendar_id . '/events';
		
		// Set API key
		$query .= '?key=' . $api_key;
		
		$args['orderBy'] = 'startTime';
		
		$args['timeMin'] = urlencode( $this->get_feed_start() );
		
		$args['timeMax'] = urlencode( $this->get_feed_end() );
		
		$args['maxResults'] = 10000;
		
		if ( ! empty( $this->search_query ) ) {
			$args['q'] = rawurlencode( $this->search_query );
		}
		
		$args['singleEvents'] = 'true';
		
		$query = add_query_arg( $args, $query );
		
		$this->get_feed_data( $query );
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
			$raw_data = wp_remote_get( $url, array(
					'sslverify' => false, //sslverify is set to false to ensure https URLs work reliably. Data source is Google's servers, so is trustworthy
					'timeout'   => 10     //Increase timeout from the default 5 seconds to ensure even large feeds are retrieved successfully
				) );
			//If $raw_data is a WP_Error, something went wrong
			if ( ! is_wp_error( $raw_data ) ) {
					//Attempt to convert the returned JSON into an array
					$raw_data = json_decode( $raw_data['body'], true );
					
					//If decoding was successful
					if ( ! empty( $raw_data ) ) {
						//If there are some entries (events) to process
						//if ( isset( $raw_data['feed']['entry'] ) ) {
							//Loop through each event, extracting the relevant information
							foreach ( $raw_data['items'] as $event ) {
								$id          = ( isset( $event['id'] ) ? esc_html( $event['id'] ) : '' );
								$title       = ( isset( $event['summary'] ) ? esc_html( $event['summary'] ) : '' );
								$description = ( isset( $event['description'] ) ? esc_html( $event['description'] ) : '' );
								$link        = ( isset( $event['htmlLink'] ) ? esc_url( $event['htmlLink'] ) : '' );
								$location    = ( isset( $event['location'] ) ? esc_html( $event['location'] ) : '' );
								$start_time  = ( isset( $event['start']['dateTime'] ) ? $this->iso_to_ts( $event['start']['dateTime'] ) : null );
								$end_time    = ( isset( $event['end']['dateTime'] ) ? $this->iso_to_ts( $event['end']['dateTime'] ) : null );
								//Create a GCE_Event using the above data. Add it to the array of events
								$this->events[] = new GCE_Event( $this, $id, $title, $description, $location, $start_time, $end_time, $link );
							}
					} else {
						//json_decode failed
						$this->error = __( 'Some data was retrieved, but could not be parsed successfully. Please ensure your feed settings are correct.', 'gce' );
					}
			} else{
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
				return date( 'c', time() - ( $start * 86400 ) );
			case 'months':
				return date( 'c', time() - ( $start * 2629743 ) );
			case 'years':
				return date( 'c', time() - ( $start * 31556926 ) );
		}
		
		// fall back just in case. Falls back to 1 year ago
		return date( 'c', time() - 31556926 );
	}
	
	private function get_feed_end() {
		
		$end    = get_post_meta( $this->id, 'gce_feed_end', true );
		$interval = get_post_meta( $this->id, 'gce_feed_end_interval', true );
		
		switch( $interval ) {
			case 'days':
				return date( 'c', time() + ( $end * 86400 ) );
			case 'months':
				return date( 'c', time() + ( $end * 2629743 ) );
			case 'years':
				return date( 'c', time() + ( $end * 31556926 ) );
		}
		
		// Falls back to 1 year ahead just in case
		return date( 'c', time() + 31556926 );
	}
	
	function get_builder() {
		
		$this->builder = get_post( $this->id )->post_content;
		
		return $this->builder;
	}
}
