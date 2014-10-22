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
	$gce_feed_url                    = get_post_meta( $post->ID, 'gce_feed_url', true );
	$gce_date_format                 = get_post_meta( $post->ID, 'gce_date_format', true );
	$gce_time_format                 = get_post_meta( $post->ID, 'gce_time_format', true );
	$gce_cache                       = get_post_meta( $post->ID, 'gce_cache', true );
	$gce_multi_day_events            = get_post_meta( $post->ID, 'gce_multi_day_events', true );
	$gce_display_mode                = get_post_meta( $post->ID, 'gce_display_mode', true );
	$gce_search_query                = get_post_meta( $post->ID, 'gce_search_query', true );
	$gce_expand_recurring            = get_post_meta( $post->ID, 'gce_expand_recurring', true );
	$gce_paging                      = get_post_meta( $post->ID, 'gce_paging', true );
	$gce_list_max_num                = get_post_meta( $post->ID, 'gce_list_max_num', true );
	$gce_list_max_length             = get_post_meta( $post->ID, 'gce_list_max_length', true );
	$gce_list_start_offset_num       = get_post_meta( $post->ID, 'gce_list_start_offset_num', true );
	$gce_list_start_offset_direction = get_post_meta( $post->ID, 'gce_list_start_offset_direction', true );
	$gce_feed_start                  = get_post_meta( $post->ID, 'gce_feed_start', true );
	$gce_feed_start_interval         = get_post_meta( $post->ID, 'gce_feed_start_interval', true );
	$gce_feed_end                    = get_post_meta( $post->ID, 'gce_feed_end', true );
	$gce_feed_end_interval           = get_post_meta( $post->ID, 'gce_feed_end_interval', true );
	
	if( empty( $gce_list_start_offset_num ) ) {
		$gce_list_start_offset_num = 0;
	}
	
	if( empty( $gce_feed_start ) ) {
		$gce_feed_start = 0;
	}
	
	if( empty( $gce_feed_end ) ) {
		$gce_feed_end = 0;
	}
?>

<!--
// XTEC ************ ELIMINAT - Removed useless links to don't bother users
// 2014.10.08 @aginard

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

//************ FI
-->

<table class="form-table">

<!-- XTEC *** REMOVED - Moved code down -->
<!--
	<tr>
		<th scope="row"><?php _e( 'Feed Shortcode', 'gce' ); ?></th>
		<td>
			<code>[gcal id="<?php echo $post_id; ?>"]</code>
			<p class="description">
				<?php _e( 'Copy and paste this shortcode to display this Google Calendar feed on any post or page.', 'gce' ); ?>
				<?php _e( 'To avoid display issues, make sure to paste the shortcode in the Text tab of the post editor.', 'gce' ); ?>
			</p>
		</td>
	</tr>
-->
<!-- *** FI -->

	<tr>
		<th scope="row"><label for="gce_feed_url"><?php _e( 'GCal Feed URL', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="large-text" name="gce_feed_url" id="gce_feed_url" value="<?php echo $gce_feed_url; ?>" />
			<p class="description">
				<?php _e( 'The Google Calendar feed URL.', 'gce' ); ?> <?php _e( 'Example', 'gce' ); ?>:<br/>
				<code>https://www.google.com/calendar/feeds/em3luo1919fjcjum4j874j5ejg%40group.calendar.google.com/public/basic</code><br/>
				<a href="http://wpdocs.philderksen.com/google-calendar-events/getting-started/find-feed-url/" target="_blank"><?php _e( 'How to find your GCal feed URL', 'gce' ); ?></a>
			</p>
		</td>
	</tr>
    
<!-- XTEC *** AFEGIT - Code moved from above -->
	<tr>
		<th scope="row"><?php _e( 'Feed Shortcode', 'gce' ); ?></th>
		<td>
			<code>[gcal id="<?php echo $post_id; ?>"]</code>
			<p class="description">
				<?php _e( 'Copy and paste this shortcode to display this Google Calendar feed on any post or page.', 'gce' ); ?>
				<?php _e( 'To avoid display issues, make sure to paste the shortcode in the Text tab of the post editor.', 'gce' ); ?>
			</p>
		</td>
	</tr>
<!-- *** FI -->

<!-- XTEC *** AFEGIT - Removed in Agora to simplify user experience -->
<?php
    global $isAgora;
    
    if (!$isAgora || ($isAgora && is_xtecadmin())) {
?>
<!-- *** FI -->

	<tr>
		<th scope="row"><label for="gce_search_query"><?php _e( 'Search Query', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_search_query" id="gce_search_query" value="<?php echo $gce_search_query; ?>" />
			<p class="description"><?php _e( 'Find and show events based on a search query.', 'gce' ); ?></p>
		</td>
	</tr>

<!-- XTEC *** AFEGIT - Removed in Agora to simplify user experience -->
<?php
    }
?>
<!-- *** FI -->

	<tr>
		<th scope="row"><label for="gce_expand_recurring"><?php _e( 'Expand Recurring Events?', 'gce' ); ?></label></th>
		<td>
			<input type="checkbox" name="gce_expand_recurring" id="gce_expand_recurring" value="1" <?php checked( $gce_expand_recurring, '1' ); ?> /> <?php _e( 'Yes', 'gce' ); ?>
			<p class="description"><?php _e( 'This will show recurring events each time they occur, otherwise it will only show the event the first time it occurs.', 'gce' ); ?></p>
		</td>
	</tr>

<!-- XTEC *** AFEGIT - Removed in Agora to simplify user experience -->
<?php
    global $isAgora;
    
    if (!$isAgora || ($isAgora && is_xtecadmin())) {
?>
<!-- *** FI -->

	<tr>
		<th scope="row"><label for="gce_date_format"><?php _e( 'Date Format', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_date_format" id="gce_date_format" value="<?php echo $gce_date_format; ?>" />
			<p class="description">
				<?php printf( __( 'Use %sPHP date formatting%s.', 'gce' ), '<a href="http://php.net/manual/en/function.date.php" target="_blank">', '</a>' ); ?>
				<?php _e( 'Leave blank to use the default.', 'gce' ); ?>
			</p>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="gce_time_format"><?php _e( 'Time Format', 'gce' ); ?></label></th>
		<td>
			<input type="text" class="" name="gce_time_format" id="gce_time_format" value="<?php echo $gce_time_format; ?>" />
			<p class="description">
				<?php printf( __( 'Use %sPHP date formatting%s.', 'gce' ), '<a href="http://php.net/manual/en/function.date.php" target="_blank">', '</a>' ); ?>
				<?php _e( 'Leave blank to use the default.', 'gce' ); ?>
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

<!-- XTEC *** AFEGIT - Removed in Agora to simplify user experience -->
<?php
    } else {
        ?>
        <input type="hidden" name="gce_multi_day_events" id="gce_multi_day_events" value="1" checked />
        <?php
    }
?>
<!-- *** FI -->

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
	
<!-- XTEC *** AFEGIT - Removed in Agora to simplify user experience -->
<?php
    global $isAgora;
    
    if (!$isAgora || ($isAgora && is_xtecadmin())) {
?>
<!-- *** FI -->

	<tr>
		<th scope="row"><label for="gce_paging"><?php _e( 'Show Paging Links', 'gce' ); ?></label></th>
		<td>
			<input type="checkbox" name="gce_paging" id="gce_paging" value="1" <?php checked( $gce_paging, '1' ); ?> /> <?php _e( 'Check this option to display Next and Back navigation links.', 'gce' ); ?>
		</td>
	</tr>
	
	<tr>
		<th scope="row"><label for="gce_list_max_num"><?php _e( 'Number of Events per Page', 'gce' ); ?></label></th>
		<td>
			<input type="number" min="0" step="1" class="small-text" id="gce_list_max_num" name="gce_list_max_num" value="<?php echo $gce_list_max_num; ?>" />
			<select name="gce_list_max_length" id="gce_list_max_length">
				<option value="days" <?php selected( $gce_list_max_length, 'days', true ); ?>><?php _e( 'Days', 'gce' ); ?></option>
				<option value="events" <?php selected( $gce_list_max_length, 'events', true ); ?>><?php _e( 'Events', 'gce' ); ?></option>
			</select>
			<p class="description"><?php _e( 'How many events to display per page (List View only).', 'gce' ); ?></p>
		</td>
	</tr>
	
	<tr>
		<th scope="row"><label for="gce_list_start_offset_num"><?php _e( 'Display Start Date Offset', 'gce' ); ?></label></th>
		<td>
			<input type="number" min="0" step="1" class="small-text" id="gce_list_start_offset_num" name="gce_list_start_offset_num" value="<?php echo $gce_list_start_offset_num; ?>" />
			<?php _e( 'Days', 'gce' ); ?>
			<select name="gce_list_start_offset_direction" id="gce_list_start_offset_direction">
				<option value="back" <?php selected( $gce_list_start_offset_direction, 'back', true ); ?>><?php _e( 'Back', 'gce' ); ?></option>
				<option value="ahead" <?php selected( $gce_list_start_offset_direction, 'ahead', true ); ?>><?php _e( 'Ahead', 'gce' ); ?></option>
			</select>
			<p class="description"><?php _e( 'Change if you need to initially display events on a date other than today (List View only).', 'gce' ); ?></p>
		</td>	
	</tr>
	
	<tr>
		<th scope="row"><label for="gce_feed_start"><?php _e( 'Minimum Feed Start Date', 'gce' ); ?></label></th>
		<td>
			<input type="number" min="0" step="1" class="small-text" id="gce_feed_start" name="gce_feed_start" value="<?php echo $gce_feed_start; ?>" />
			<select name="gce_feed_start_interval" id="gce_feed_start_interval">
				<option value="days" <?php selected( $gce_feed_start_interval, 'days', true ); ?>><?php _e( 'Days', 'gce' ); ?></option>
				<option value="months" <?php selected( $gce_feed_start_interval, 'months', true ); ?>><?php _e( 'Months', 'gce' ); ?></option>
				<option value="years" <?php selected( $gce_feed_start_interval, 'years', true ); ?>><?php _e( 'Years', 'gce' ); ?></option>
			</select>
			<?php _e( 'back', 'gce' ); ?>
			<p class="description"><?php _e( 'Set how far back to retrieve events regardless of month or page being displayed.', 'gce' ); ?></p>
		</td>	
	</tr>
	
	<tr>
		<th scope="row"><label for="gce_feed_end"><?php _e( 'Maximum Feed End Date', 'gce' ); ?></label></th>
		<td>
			<input type="number" min="0" step="1" class="small-text" id="gce_feed_end" name="gce_feed_end" value="<?php echo $gce_feed_end; ?>" />
			<select name="gce_feed_end_interval" id="gce_feed_end_interval">
				<option value="days" <?php selected( $gce_feed_end_interval, 'days', true ); ?>><?php _e( 'Days', 'gce' ); ?></option>
				<option value="months" <?php selected( $gce_feed_end_interval, 'months', true ); ?>><?php _e( 'Months', 'gce' ); ?></option>
				<option value="years" <?php selected( $gce_feed_end_interval, 'years', true ); ?>><?php _e( 'Years', 'gce' ); ?></option>
			</select>
			<?php _e( 'forward', 'gce' ); ?>
			<p class="description"><?php _e( 'Set how far in the future to retrieve events regardless of month or page being displayed.', 'gce' ); ?></p>
		</td>	
	</tr>

<!-- XTEC *** AFEGIT - Removed in Agora to simplify user experience -->
<?php
    }
?>
<!-- *** FI -->

</table>
