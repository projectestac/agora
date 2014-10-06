<?php

/**
 * Display for Feed Custom Post Types
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

	global $post;
	
	$post_id = $post->ID;
	
	// Clear the cache if the button was clicked to do so
	if( isset( $_GET['clear_cache'] ) && $_GET['clear_cache'] == 1 ) {
		gce_clear_cache( $post_id );
	}
	
	// Load up all post meta data
	$gce_feed_url         = get_post_meta( $post->ID, 'gce_feed_url', true );
	$gce_retrieve_from    = get_post_meta( $post->ID, 'gce_retrieve_from', true );
	$gce_retrieve_until   = get_post_meta( $post->ID, 'gce_retrieve_until', true );
	$gce_retrieve_max     = get_post_meta( $post->ID, 'gce_retrieve_max', true );
	$gce_date_format      = get_post_meta( $post->ID, 'gce_date_format', true );
	$gce_time_format      = get_post_meta( $post->ID, 'gce_time_format', true );
	$gce_cache            = get_post_meta( $post->ID, 'gce_cache', true );
	$gce_multi_day_events = get_post_meta( $post->ID, 'gce_multi_day_events', true );
	$gce_display_mode     = get_post_meta( $post->ID, 'gce_display_mode', true );
	$gce_custom_from      = get_post_meta( $post->ID, 'gce_custom_from', true );
	$gce_custom_until     = get_post_meta( $post->ID, 'gce_custom_until', true );
	$gce_search_query     = get_post_meta( $post->ID, 'gce_search_query', true );
	$gce_expand_recurring = get_post_meta( $post->ID, 'gce_expand_recurring', true );
?>

<div id="gce-admin-promo">
	<?php echo __( 'We\'re <strong>smack dab</strong> in the middle of building additional features for this plugin. Have ideas?', 'gce' ); ?>
	<strong>
		<a href="https://trello.com/b/ZQSzsarY" target="_blank">
			<?php echo __( 'Visit our roadmap and tell us what you\'re looking for', 'gce' ); ?>
		</a>
	</strong>
	<br/>
	<br/>

	<?php echo __( 'Want to be in the know?', 'gce' ); ?>
	<strong>
		<a href="http://eepurl.com/0_VsT" target="_blank">
			<?php echo __( 'Get notified when new features are released', 'gce' ); ?>
		</a>
	</strong>
</div>

<table class="form-table">
	<tr>
		<th scope="row"><?php _e( 'Feed Shortcode', 'gce' ); ?></th>
		<td>
			<code>[gcal id="<?php echo $post_id; ?>"]</code>
			<p class="description"><?php _e( 'Copy and paste this shortcode to display this Google Calendar feed in any post or page.', 'gce' ); ?></p>
		</td>
	</tr>
	<tr>
		<th scope="row"><label for="gce_feed_url"><?php _e( 'GCal Feed URL', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="large-text" name="gce_feed_url" id="gce_feed_url" value="<?php echo $gce_feed_url; ?>" />
			<p class="description">
				<?php _e( 'The Google Calendar feed URL.', 'gce' ); ?><br/>
				<?php _e( 'Example', 'gce' ); ?>: <code>https://www.google.com/calendar/feeds/em3luo1919fjcjum4j874j5ejg%40group.calendar.google.com/public/basic</code><br/>
				<a href="http://wpdocs.philderksen.com/google-calendar-events/getting-started/find-feed-url/" target="_blank"><?php _e( 'How to find your GCal feed URL', 'gce' ); ?></a>
			</p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_search_query"><?php _e( 'Search Query', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_search_query" id="gce_search_query" value="<?php echo $gce_search_query; ?>" />
			<p class="description"><?php _e( 'Find and show events based on a search query.', 'gce' ); ?></p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_expand_recurring"><?php _e( 'Expand Recurring Events?', 'gce' ); ?></label></th>
		<td>
			<input type="checkbox" name="gce_expand_recurring" id="gce_expand_recurring" value="1" <?php checked( $gce_expand_recurring, '1' ); ?> /> <?php _e( 'Yes', 'gce' ); ?>
			<p class="description"><?php _e( 'This will show recurring events each time they occur, otherwise it will only show the event the first time it occurs.', 'gce' ); ?></p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_retrieve_from"><?php _e( 'Retrieve Events From', 'gce' ); ?></label></th>
		<td>
			<select name="gce_retrieve_from" id="gce_retrieve_from">
				<option value="today" <?php selected( $gce_retrieve_from, 'today', true ); ?>><?php _e( 'Today', 'gce' ); ?></option>
				<option value="start_week" <?php selected( $gce_retrieve_from, 'start_week', true ); ?>><?php _e( 'Start of current week', 'gce' ); ?></option>
				<option value="start_month" <?php selected( $gce_retrieve_from, 'start_month', true ); ?>><?php _e( 'Start of current month', 'gce' ); ?></option>
				<option value="end_month" <?php selected( $gce_retrieve_from, 'end_month', true ); ?>><?php _e( 'End of current month', 'gce' ); ?></option>
				<option value="start_time" <?php selected( $gce_retrieve_from, 'start_time', true ); ?>><?php _e( 'The beginning of time', 'gce' ); ?></option>
				<option value="custom_date" <?php selected( $gce_retrieve_from, 'custom_date', true ); ?>><?php _e( 'Specific date', 'gce' ); ?></option>
			</select>
			<input type="text" <?php echo ( $gce_retrieve_from != 'custom_date' ? 'class="gce-admin-hidden" ' : ' ' ); ?> name="gce_custom_from" id="gce_custom_from" value="<?php echo $gce_custom_from; ?>" />
			<p class="description"><?php _e( 'The point in time at which to start retrieving events.', 'gce' ); ?></p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_retrieve_until"><?php _e( 'Retrieve Events Until', 'gce' ); ?></label></th>
		<td>
			<select name="gce_retrieve_until" id="gce_retrieve_until">
				<option value="today" <?php selected( $gce_retrieve_until, 'today', true ); ?>><?php _e( 'Today', 'gce' ); ?></option>
				<option value="start_week" <?php selected( $gce_retrieve_until, 'start_week', true ); ?>><?php _e( 'Start of current week', 'gce' ); ?></option>
				<option value="start_month" <?php selected( $gce_retrieve_until, 'start_month', true ); ?>><?php _e( 'Start of current month', 'gce' ); ?></option>
				<option value="end_month" <?php selected( $gce_retrieve_until, 'end_month', true ); ?>><?php _e( 'End of current month', 'gce' ); ?></option>
				<option value="end_time" <?php selected( $gce_retrieve_until, 'end_time', true ); ?>><?php _e( 'The end of time', 'gce' ); ?></option>
				<option value="custom_date" <?php selected( $gce_retrieve_until, 'custom_date', true ); ?>><?php _e( 'Specific date', 'gce' ); ?></option>
			</select>
			<input type="text" <?php echo ( $gce_retrieve_until != 'custom_date' ? 'class="gce-admin-hidden" ' : ' ' ); ?> name="gce_custom_until" id="gce_custom_until" value="<?php echo $gce_custom_until; ?>" />
			<p class="description"><?php _e( 'The point in time at which to stop retrieving events.', 'gce' ); ?></p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_retrieve_max"><?php _e( 'Max Number of Events', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_retrieve_max" id="gce_retrieve_max" value="<?php echo $gce_retrieve_max; ?>" />
			<p class="description"><?php _e( 'Maximum number of events to show.', 'gce' ); ?></p>
		<td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_date_format"><?php _e( 'Date Format', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_date_format" id="gce_date_format" value="<?php echo $gce_date_format; ?>" />
			<p class="description">
				<?php printf( __( 'Use %sPHP date formatting%s.', 'gce' ), '<a href="http://php.net/manual/en/function.date.php" target="_blank">', '</a>' ); ?>
				<?php echo _x( 'Leave blank to use the default.', 'References the Date Format option', 'gce' ); ?>
			</p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_time_format"><?php _e( 'Time Format', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_time_format" id="gce_time_format" value="<?php echo $gce_time_format; ?>" />
			<p class="description">
				<?php printf( __( 'Use %sPHP date formatting%s.', 'gce' ), '<a href="http://php.net/manual/en/function.date.php" target="_blank">', '</a>' ); ?>
				<?php echo _x( 'Leave blank to use the default.', 'References the Time Format option', 'gce' ); ?>
			</p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_cache"><?php _e( 'Cache Duration', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_cache" id="gce_cache" value="<?php echo $gce_cache; ?>" />
			<p class="description"><?php _e( 'The length of time, in seconds, to cache the feed (43200 = 12 hours). If this feed changes regularly, you may want to reduce the cache duration.', 'gce' ); ?></p>
		<td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_multi_day_events"><?php _e( 'Multiple Day Events', 'gce' ); ?></label></th>
		<td>
			<input type="checkbox" name="gce_multi_day_events" id="gce_multi_day_events" value="1" <?php checked( $gce_multi_day_events, '1' ); ?> /> <?php _e( 'Show on each day', 'gce' ); ?>
			<p class="description"><?php _e( 'Show events that span multiple days on each day that they span, rather than just the first day.', 'gce' ); ?></p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_display_mode"><?php _e( 'Display Mode', 'gce' ); ?></label></th>
		<td>
			<select name="gce_display_mode" id="gce_display_mode">
				<option value="grid" <?php selected( $gce_display_mode, 'grid', true ); ?>><?php _e( 'Grid', 'gce' ); ?></option>
				<option value="list" <?php selected( $gce_display_mode, 'list', true ); ?>><?php _e( 'List', 'gce' ); ?></option>
				<option value="list-grouped" <?php selected( $gce_display_mode, 'list-grouped', true ); ?>><?php _e( 'Grouped List', 'gce' ); ?></option>
			</select>
			<p class="description"><?php _e( 'Choose how you want your calendar to be displayed.', 'gce' ); ?></p>
		</td>
	</tr>
	
	<tr>
		<th scope="row"><?php _e( 'Clear Cache', 'gce' ); ?></th>
		<td>
			<a href="<?php echo add_query_arg( array( 'clear_cache' => true ) ); ?>" class="button-secondary"><?php _e( 'Clear Cache', 'gce' ); ?></a>
			<p class="description">
				<?php 
				printf( __( 'This will clear your feed cache. This also automatically happens when you save your changes. %s' . 
						     'If you make changes you %sMUST%s save first or your changes will be lost.' ), '<br>', '<strong>', '</strong>' ); 
				?>
			</p>
		</td>
	</tr>
</table>
