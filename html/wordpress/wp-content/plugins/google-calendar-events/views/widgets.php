<?php

/**
 * Widget functions / views
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *  Class functions for the GCE widgets
 *
 * @since 2.0.0
 */
class GCE_Widget extends WP_Widget {
	
	function GCE_Widget() {
		parent::__construct(
			false, // Adding a name here doesn't seem to affect the upgrade. If widget stuff starts acting weird then check this first though.
			$name = __( 'Google Calendar Events', 'gce' ),
			array( 'description' => __( 'Display a list or calendar grid of events from one or more Google Calendar feeds you have added', 'gce' ) )
		);
	}

	/**
	 * Widget HTML output
	 * 
	 * @since 2.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		//Output before widget stuff
		echo $before_widget;
		
		// Check whether any feeds have been added yet
		if( wp_count_posts( 'gce_feed' )->publish > 0 ) {
			//Output title stuff
			$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );

			if ( ! empty( $title ) ) {
				echo $before_title . $title . $after_title;
			}

			$no_feeds_exist = true;
			$feed_ids = array();

			if ( ! empty( $instance['id'] ) ) {
				//Break comma delimited list of feed ids into array
				$feed_ids = explode( ',', str_replace( ' ', '', $instance['id'] ) );

				//Check each id is an integer, if not, remove it from the array
				foreach ( $feed_ids as $key => $feed_id ) {
					if ( 0 == absint( $feed_id ) )
						unset( $feed_ids[$key] );
				}

				//If at least one of the feed ids entered exists, set no_feeds_exist to false
				foreach ( $feed_ids as $feed_id ) {
					if ( false !== get_post_meta( $feed_id ) )
						$no_feeds_exist = false;
				}
			} else {
				if ( current_user_can( 'manage_options' ) ) {
					_e( 'No valid Feed IDs have been entered for this widget. Please check that you have entered the IDs correctly in the widget settings (Appearance > Widgets), and that the Feeds have not been deleted.', 'gce' );
				} 
			}

			//Check that at least one valid feed id has been entered
			if ( ! empty( $feed_ids ) ) {
				//Turns feed_ids back into string or feed ids delimited by '-' ('1-2-3-4' for example)
				$feed_ids = implode( '-', $feed_ids );

				$title_text = ( ! empty( $instance['display_title_text'] )  ? $instance['display_title_text'] : null );
				$max_events = ( isset( $instance['max_events'] ) ) ? $instance['max_events'] : 0;
				$sort_order = ( isset( $instance['order'] ) ) ? $instance['order'] : 'asc';
				
				$args = array(
					'title_text' => $title_text,
					'max_events' => $max_events,
					'sort'       => $sort_order,
					'month'      => null,
					'year'       => null,
					'widget'     => 1
				);
				
				if( 'list-grouped' == $instance['display_type'] ) {
					$args['grouped'] = 1;
				}
				
				$markup = gce_print_calendar( $feed_ids, $instance['display_type'], $args, true );
				
				echo $markup;
			}
		} else {
			if( current_user_can( 'manage_options' ) ) {
				_e( 'You have not added any feeds yet.', 'gce' );
			} else {
				return;
			}
		}

		//Output after widget stuff
		echo $after_widget;
	}
	
	/**
	 * Update settings when saved
	 * 
	 * @since 2.0.0
	 */
	function update( $new_instance, $old_instance ) {
		
		$instance                       = $old_instance;
		$instance['title']              = esc_html( $new_instance['title'] );
		$instance['id']                 = esc_html( $new_instance['id'] );
		$instance['display_type']       = esc_html( $new_instance['display_type'] );
		$instance['max_events']         = absint( $new_instance['max_events'] );
		$instance['order']              = ( 'asc' == $new_instance['order'] ) ? 'asc' : 'desc';
		$instance['display_title_text'] = wp_filter_kses( $new_instance['display_title_text'] );
		
		return $instance;
	}
	
	/**
	 * 
	 * @param type $instanceDisplay widget form in admin
	 * 
	 * @since 2.0.0
	 */
	function form( $instance ) {
		
		// Check for existing feeds and if there are none then display a message and return
		if( wp_count_posts( 'gce_feed' )->publish <= 0 ) {
			echo '<p>' . __( 'There are no feeds created yet.', 'gce' ) . 
					' <a href="' . admin_url( 'edit.php?post_type=gce_feed' ) . '">' . __( 'Add your first feed!', 'gce' ) . '</a>' . 
					'</p>';
			return;
		}
		
		$title         = ( isset( $instance['title'] ) ) ? $instance['title'] : '';
		$ids           = ( isset( $instance['id'] ) ) ? $instance['id'] : '';
		$display_type  = ( isset( $instance['display_type'] ) ) ? $instance['display_type'] : 'grid';
		$max_events    = ( isset( $instance['max_events'] ) ) ? $instance['max_events'] : 0;
		$order         = ( isset( $instance['order'] ) ) ? $instance['order'] : 'asc';
		$display_title = ( isset( $instance['display_title'] ) ) ? $instance['display_title'] : true;
		$title_text    = ( isset( $instance['display_title_text'] ) ) ? $instance['display_title_text'] : 'Events on';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>">
				<?php _e( 'Feeds to display, as a comma separated list (e.g. 101,102,103)', 'gce' ); ?>
			</label>
			<input type="text" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $ids; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'display_type' ); ?>"><?php _e( 'Display events as:', 'gce' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'display_type' ); ?>" name="<?php echo $this->get_field_name( 'display_type' ); ?>" class="widefat">
				<option value="grid"<?php selected( $display_type, 'grid' ); ?>><?php _e( 'Grid', 'gce' ); ?></option>
				<!-- <option value="ajax"<?php selected( $display_type, 'ajax' ); ?>><?php _e( 'Calendar Grid - with AJAX', 'gce' ); ?></option> -->
				<option value="list"<?php selected( $display_type, 'list' ); ?>><?php _e( 'List', 'gce' ); ?></option>
				<option value="list-grouped"<?php selected( $display_type, 'list-grouped' );?>><?php _e( 'Grouped List', 'gce' ); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'max_events' ); ?>"><?php _e( 'Maximum no. events to display. Enter 0 to show all retrieved.' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'max_events' ); ?>" name="<?php echo $this->get_field_name( 'max_events' ); ?>" value="<?php echo $max_events; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Sort order (only applies to lists):' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat">
				<option value="asc" <?php selected( $order, 'asc' ); ?>><?php _e( 'Ascending', 'gce' ); ?></option>
				<option value="desc" <?php selected( $order, 'desc' ); ?>><?php _e( 'Descending', 'gce' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'display_title' ); ?>"><?php _e( 'Display title on tooltip / list item (e.g. \'Events on 7th March\') Grouped lists always have a title displayed.', 'gce' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'display_title_text' ); ?>" name="<?php echo $this->get_field_name( 'display_title_text' ); ?>" value="<?php echo $title_text; ?>" />
		</p>
			
	<?php 
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget("GCE_Widget");' ) );

