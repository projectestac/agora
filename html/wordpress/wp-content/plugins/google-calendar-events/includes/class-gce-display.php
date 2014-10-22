<?php

/**
 * Class GCE_Display
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

class GCE_Display {
	
	private $feeds, $merged_feeds;
	
	public function __construct( $ids, $title_text = null, $sort_order = 'asc' ) {
		
		$this->id         = $ids;
		$this->title      = $title_text;
		$this->sort       = $sort_order;
		
		foreach( $ids as $id ) {
			$this->feeds[$id] = new GCE_Feed( $id );
		}
		
		$this->merged_feeds = array();

		//Merge the feeds together into one array of events
		foreach ( $this->feeds as $feed_id => $feed ) {
			$this->merged_feeds = array_merge( $this->merged_feeds, $feed->events );
		}
		
		// Sort the items into date order
		if ( ! empty( $this->merged_feeds ) ) {
			usort( $this->merged_feeds, array( $this, 'compare' ) );
		}
	}

	/**
	 * Comparison function for use when sorting merged feed data (with usort)
	 * 
	 * @since 2.0.0
	 */
	function compare( $event1, $event2 ) {
		//Sort ascending or descending
		if ( 'asc' == $this->sort )
			return $event1->start_time - $event2->start_time;

		return $event2->start_time - $event1->start_time;
	}

	/**
	 * Returns array of days with events, with sub-arrays of events for that day
	 * 
	 * @since 2.0.0
	 */
	private function get_event_days() {
		$event_days = array();

		//Total number of events retrieved
		$count = count( $this->merged_feeds );
		
		//Loop through entire array of events, or until maximum number of events to be displayed has been reached
		for ( $i = 0; $i < $count; $i++ ) {
			$event = $this->merged_feeds[$i];
			
			//Check that event ends, or starts (or both) within the required date range. This prevents all-day events from before / after date range from showing up.
			//if ( $event->end_time > $event->start_time && $event->start_time < $event->end_time ) {
				foreach ( $event->get_days() as $day ) {
					$event_days[$day][] = $event;
				}
			}
			
		return $event_days;
	}
	
	/**
	 * Return the markup for the 'Grid' display
	 * 
	 * @since 2.0.0
	 */
	public function get_grid ( $year = null, $month = null, $widget = false, $paging = null ) {
		require_once 'php-calendar.php';

		$time_now = current_time( 'timestamp' );

		//If year and month have not been passed as paramaters, use current month and year
		if( ! isset( $year ) ) {
			$year = date( 'Y', $time_now );
		}

		if( ! isset( $month ) ) {
			$month = date( 'm', $time_now );
		}

		//Get timestamps for the start and end of current month
		$current_month_start = mktime( 0, 0, 0, date( 'm', $time_now ), 1, date( 'Y', $time_now ) );
		$current_month_end = mktime( 0, 0, 0, date( 'm', $time_now ) + 1, 1, date( 'Y', $time_now ) );

		//Get timestamps for the start and end of the month to be displayed in the grid
		$display_month_start = mktime( 0, 0, 0, $month, 1, $year );
		$display_month_end = mktime( 0, 0, 0, $month + 1, 1, $year );

		//It should always be possible to navigate to the current month, even if it doesn't have any events
		//So, if the display month is before the current month, set $nav_next to true, otherwise false
		//If the display month is after the current month, set $nav_prev to true, otherwise false
		$nav_next = ( $display_month_start < $current_month_start );
		$nav_prev = ( $display_month_start >= $current_month_end );

		//Get events data
		$event_days = $this->get_event_days();
		
		//Array of previous and next link stuff for use in gce_generate_calendar (below)
		foreach( $event_days as $key => $event_day ) {
			
			if( $paging == null && $paging != 0 ) {
				$paging = get_post_meta( $event_day[0]->feed->id, 'gce_paging', true );
			}
		}

		$start = mktime( 0, 0, 0, date( 'm', $time_now ), date( 'd', $time_now ), date( 'Y', $time_now ) );

		$i = 1;

		foreach ( $event_days as $key => $event_day ) {
			//If event day is in the month and year specified (by $month and $year)
			if ( $key >= $display_month_start && $key < $display_month_end ) {
				//Create array of CSS classes. Add gce-has-events
				$css_classes = array( 'gce-has-events' );

				//Create markup for display
				$markup = '<div class="gce-event-info">';

				//If title option has been set for display, add it
				if ( isset( $this->title ) ) {
					$markup .= '<div class="gce-tooltip-title">' . esc_html( $this->title ) . ' ' . date_i18n( $event_day[0]->feed->date_format, $key ) . '</div>';
				}

				$markup .= '<ul>';

				foreach ( $event_day as $num_in_day => $event ) {
					$feed_id = absint( $event->feed->id );
					$markup .= '<li class="gce-tooltip-feed-' . $feed_id . '">' . $event->get_event_markup( 'tooltip', $num_in_day, $i ) . '</li>';

					//Add CSS class for the feed from which this event comes. If there are multiple events from the same feed on the same day, the CSS class will only be added once.
					$css_classes['feed-' . $feed_id] = 'gce-feed-' . $feed_id;

					$i++;
				}

				$markup .= '</ul></div>';

				//If number of CSS classes is greater than 2 ('gce-has-events' plus one specific feed class) then there must be events from multiple feeds on this day, so add gce-multiple CSS class
				if ( count( $css_classes ) > 2 )
					$css_classes[] = 'gce-multiple';

				//If event day is today, add gce-today CSS class, otherwise add past or future class
				if ( $key == $start ) {
					$css_classes[] = 'gce-today gce-today-has-events';
				} elseif ( $key < $start ) {
					$css_classes[] = 'gce-day-past';
				} else {
					$css_classes[] = 'gce-day-future';
				}

				//Change array entry to array of link href, CSS classes, and markup for use in gce_generate_calendar (below)
				$event_days[$key] = array( null, implode( ' ', $css_classes ), $markup );
			} elseif ( $key < $display_month_start ) {
				//This day is before the display month, so set $nav_prev to true. Remove the day from $event_days, as it's no use for displaying this month
				$nav_prev = true;
				unset( $event_days[$key] );
			} else {
				//This day is after the display month, so set $nav_next to true. Remove the day from $event_days, as it's no use for displaying this month
				$nav_next = true;
				unset( $event_days[$key] );
			}
		}

		//Ensures that gce-today CSS class is added even if there are no events for 'today'. A bit messy :(
		if ( ! isset( $event_days[$start] ) )
			$event_days[$start] = array( null, 'gce-today gce-today-no-events', null );
		
		$pn = array();
		
		if( $paging ) {
			// Add previous / next functionality
			//If there are events to display in a previous month, add previous month link
			$prev_key = __( 'Back', 'gce' );
			$prev = date( 'm-Y', mktime( 0, 0, 0, $month - 1, 1, $year ) );

			//If there are events to display in a future month, add next month link
			$next_key = __( 'Next', 'gce' );
			$next = date( 'm-Y', mktime( 0, 0, 0, $month + 1, 1, $year ) );
			
			//Array of previous and next link stuff for use in gce_generate_calendar (below)
			$pn = array( $prev_key => $prev, $next_key => $next );
		}
		
		$start_day = get_option( 'start_of_week' );
		
		//Generate the calendar markup and return it
		return gce_generate_calendar( $year, $month, $event_days, 1, null, $start_day, $pn, $widget );
	}
	
	/**
	 * Return the markup for the 'List' display
	 * 
	 * @since 2.0.0
	 */
	public function get_list( $grouped = false, $start = null, $paging = null, $paging_interval = null, $start_offset = null, $max_events = null, $paging_type = null ) {
		$paging_type = $paging_type;
		
		$max_length = null;
		
		if( $paging_type == 'events' ) {
			$max_length = 'events';
		}
		
		if( $start == null ) {
			$start = mktime( 0, 0, 0, date( 'm', current_time( 'timestamp' ) ), 1, date( 'Y', current_time( 'timestamp' ) ) );
		} 
		
		// Get all the event days
		$event_days = $this->get_event_days();
		
		foreach( $event_days as $key => $event_day ) {
			if( $paging_interval == null ) {
				$max_num    = get_post_meta( $event_day[0]->feed->id, 'gce_list_max_num', true );
				
				if( $paging_type == null ) {
					$max_length = get_post_meta( $event_day[0]->feed->id, 'gce_list_max_length', true );
					$paging_type = $max_length;
				}
			}

			if( $paging == null && $paging != 0 ) {
				$paging = get_post_meta(  $event_day[0]->feed->id, 'gce_paging', true );
			}
			
			if( $start_offset == null && $start_offset != 0 ) {
				$start_offset_num       = get_post_meta( $event_day[0]->feed->id, 'gce_list_start_offset_num', true );
				$start_offset_direction = get_post_meta( $event_day[0]->feed->id, 'gce_list_start_offset_direction', true );
			}
		}
		
		if( empty( $max_num ) || $max_num == 0 ) {
			$max_num = 7;
		}
		
		if( $max_length == 'days' ) {
			$paging_interval = $max_num * 86400;
		}
		
		if( $start_offset == null && $start_offset != 0 ) {
			if( $start_offset_direction == 'back' ) {
				$start_offset_direction = -1;
			} else {
				$start_offset_direction = 1;
			}

			$start_offset = $start_offset_num * 86400 * $start_offset_direction;
			
			$start = $start + $start_offset;
		}

		$start = mktime( 0, 0, 0, date( 'm', $start ), date( 'd', $start ), date( 'Y', $start ) );
		
		$end_time = $start + $paging_interval;
		
		$i = 1;
		
		$feeds = implode( $this->id, '-' );
		
		$markup = '<div class="gce-list" data-gce-start-offset="' . $start_offset . '" data-gce-start="' . ( $start + $paging_interval ) . '" data-gce-paging-interval="' . $paging_interval . '" data-gce-paging="' . $paging . '" data-gce-feeds="' . $feeds . '" data-gce-title="' . stripslashes( $this->title ) . '" data-gce-grouped="' . $grouped . '" data-gce-sort="' . $this->sort . '">' . "\n";

		if( ( $paging != 0 ) && $max_length != 'events' ) {
			$p = '<div class="gce-prev"><a href="#" class="gce-change-month-list" title="' . esc_attr__( 'Previous month', 'gce' ) . '" data-gce-paging-direction="back" data-gce-paging-type="' . $paging_type . '">'. __( 'Back', 'gce' ) . '</a></div>';
			$n = '<div class="gce-next"><a href="#" class="gce-change-month-list" title="' . esc_attr__( 'Next month', 'gce' ) . '" data-gce-paging-direction="forward" data-gce-paging-type="' . $paging_type . '">' . __( 'Next', 'gce' ) . '</a></div>';
			
			$markup .= '<caption class="gce-caption">' .
						'<div class="gce-navbar">' .
						$p .
						$n .
						'<div class="gce-month-title"></div>' .
						'</div>' .
						'</caption>' . "\n";
		}
		$max_count = 1;
		$has_events = false;
		
		if( $max_length == 'events' ) {
			if( $start_offset === null ) {
				$time_now = current_time( 'timestamp' );
			} else {
				
				$time_now = current_time( 'timestamp' );
				
				$time_now = mktime( 0, 0, 0, date( 'm', $time_now ), date( 'j', $time_now ), date( 'Y', $time_now ) ) + $start_offset;
				
			}
			
			$event_counter = 0;
			
			if( $max_events == null ) {
				$max_events = $max_num;
			}
		}
		
		if ( $grouped ) {
			$markup .=
				'<div class="gce-list-grouped">' ;
		}
		
		foreach ( $event_days as $key => $event_day ) {
			
			if( $max_length != 'events' ) {
					
				if( $grouped && $key >= $start && $key < $end_time ) {
					$markup .= '<div class="gce-list-title">' . stripslashes( $this->title ) . ' ' . date_i18n( $event_day[0]->feed->date_format, $key ) . '</div>';
				}

				foreach ( $event_day as $num_in_day => $event ) {
						//Create the markup for this event
						if( ( $event->start_time >= $start && $event->end_time <= $end_time ) || ( $event->day_type == 'MWD' && $event->start_time > $start && $event->start_time < $end_time ) ) {

							$markup .=
								'<div class="gce-feed gce-feed-' . $event->feed->id . '">' .
								//If this isn't a grouped list and a date title should be displayed, add the date title
								( ( ! $grouped && isset( $event->title ) ) ? '<div class="gce-list-title">' . stripslashes( $this->title ) . '</div>' : '' ) .
								//Add the event markup
								$event->get_event_markup( 'list', $num_in_day, $i ) .
								'</div>';

							$has_events = true;

							$i++;
						}
				}
			} else {
					
				if( $grouped && $key >= $start && $event_counter < $max_events ) {
					$markup .= '<div class="gce-list-title">' . stripslashes( $this->title ) . ' ' . date_i18n( $event_day[0]->feed->date_format, $key ) . '</div>';
				}

				foreach ( $event_day as $num_in_day => $event ) {
					//Create the markup for this event		
					if( ( $event->start_time >= $time_now ) && ( $event_counter < $max_events ) ) {
						$markup .=
							'<div class="gce-feed gce-feed-' . $event->feed->id . '">' .
							'<div class="gce-list-title">' . stripslashes( $this->title ) . '</div>' .			
							//Add the event markup
							$event->get_event_markup( 'list', $num_in_day, $i ) .
							'</div>';

						$has_events = true;

						$i++;

						$event_counter++;
					}
				}
			}
				
			$max_count++;
		}
		
		if ( $grouped ) {
			$markup .= '</div>';
		}
		
		if( ! $has_events ) {
			$markup .= __( 'No events to display.', 'gce' );
		}

		$markup .= '</div>';

		return $markup;
	}
}
