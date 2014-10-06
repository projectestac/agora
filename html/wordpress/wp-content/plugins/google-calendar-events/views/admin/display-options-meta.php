<?php

/**
 * Display Options Post Meta Output
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

	global $post;
	
	$post_id = $post->ID;
	
	// Load up all post meta data
	$gce_display_start            = get_post_meta( $post->ID, 'gce_display_start', true );
	$gce_display_start_text       = get_post_meta( $post->ID, 'gce_display_start_text', true );
	$gce_display_end              = get_post_meta( $post->ID, 'gce_display_end', true );
	$gce_display_end_text         = get_post_meta( $post->ID, 'gce_display_end_text', true );
	$gce_display_separator        = get_post_meta( $post->ID, 'gce_display_separator', true );
	$gce_display_location         = get_post_meta( $post->ID, 'gce_display_location', true );
	$gce_display_location_text    = get_post_meta( $post->ID, 'gce_display_location_text', true );
	$gce_display_description      = get_post_meta( $post->ID, 'gce_display_description', true );
	$gce_display_description_text = get_post_meta( $post->ID, 'gce_display_description_text', true );
	$gce_display_description_max  = get_post_meta( $post->ID, 'gce_display_description_max', true );
	$gce_display_link             = get_post_meta( $post->ID, 'gce_display_link', true );
	$gce_display_link_tab         = get_post_meta( $post->ID, 'gce_display_link_tab', true );
	$gce_display_link_text        = get_post_meta( $post->ID, 'gce_display_link_text', true );
	$gce_display_simple           = get_post_meta( $post->ID, 'gce_display_simple', true );
	
?>


<div id="gce-display-options-wrap">
	<div class="gce-meta-control">
		<p>
			<input type="checkbox" name="gce_display_simple" id="gce_display_simple" value="1" <?php checked( $gce_display_simple, '1' ); ?> />
			<label for="gce_display_simple" id="gce-simple-display-label"><?php _e( 'Check this box to use the simple display options below instead of the Event Builder code on the left.', 'gce' ); ?></label>
		</p>
	</div>
	
	<div class="gce-meta-control">
		<strong><?php _e( 'Start date / time display', 'gce' ); ?></strong>
		<label class="description" for="gce_display_start"><?php _e( 'Select how to display the start date / time.', 'gce' ); ?></label>
		<select name="gce_display_start" id="gce_display_start">
			<option value="none" <?php selected( $gce_display_start, 'none', true ); ?>><?php _e( 'None', 'gce' ); ?></option>
			<option value="time" <?php selected( $gce_display_start, 'time', true ); ?>><?php _e( 'Start time', 'gce' ); ?></option>
			<option value="date" <?php selected( $gce_display_start, 'date', true ); ?>><?php _e( 'Start date', 'gce' ); ?></option>
			<option value="time-date" <?php selected( $gce_display_start, 'time-date', true ); ?>><?php _e( 'Start time and date', 'gce' ); ?></option>
			<option value="date-time" <?php selected( $gce_display_start, 'date-time', true ); ?>><?php _e( 'Start date and time', 'gce' ); ?></option>
		</select>
		<label class="description" for="gce_display_start_text"><?php _e( 'Text to display before the start time.', 'gce' ); ?></label>
		<input type="text" name="gce_display_start_text" id="gce_display_start_text" value="<?php echo $gce_display_start_text; ?>" />
	</div>

	<div class="gce-meta-control">
		<strong><?php _e( 'End time/date display', 'gce' ); ?></strong>
		<label class="description" for="gce_display_end"><?php _e( 'Select how to display the end date / time.', 'gce' ); ?></label>
		<select name="gce_display_end" id="gce_display_end">
			<option value="none" <?php selected( $gce_display_end, 'none', true ); ?>><?php _e( 'None', 'gce' ); ?></option>
			<option value="time" <?php selected( $gce_display_end, 'time', true ); ?>><?php _e( 'End time', 'gce' ); ?></option>
			<option value="date" <?php selected( $gce_display_end, 'date', true ); ?>><?php _e( 'End date', 'gce' ); ?></option>
			<option value="time-date" <?php selected( $gce_display_end, 'time-date', true ); ?>><?php _e( 'End time and date', 'gce' ); ?></option>
			<option value="date-time" <?php selected( $gce_display_end, 'date-time', true ); ?>><?php _e( 'End date and time', 'gce' ); ?></option>
		</select>
		<label class="description" for="gce_display_end_text"><?php _e( 'Text to display before the end time.', 'gce' ); ?></label>
		<input type="text" name="gce_display_end_text" id="gce_display_end_text" value="<?php echo $gce_display_end_text; ?>" />
	</div>

	<div class="gce-meta-control">
		<strong><?php _e( 'Separator', 'gce' ); ?></strong>
		<label class="description" for="gce_display_separator">
			<?php _e( 'If you have chosen to display both the time and date above, enter the text / characters to display between the time and date here (including any spaces).' , 'gce' ); ?>
		</label>
		<input type="text" name="gce_display_separator" id="gce_display_separator" value="<?php echo $gce_display_separator; ?>" />
	</div>

	<div class="gce-meta-control">
		<strong>Location</strong>
		<p><input type="checkbox" name="gce_display_location" id="gce_display_location" value="1" <?php checked( $gce_display_location, '1' ); ?> />
			<label for="gce_display_location">Show the location of events?</label></p>
		<label class="description" for="gce_display_location_text">Text to display before the location.</label>
		<input type="text" name="gce_display_location_text" id="gce_display_location_text" value="<?php echo $gce_display_location_text; ?>" />
	</div>

	<div class="gce-meta-control">
		<strong><?php _e( 'Description', 'gce' ); ?></strong>
		<p>
			<input type="checkbox" name="gce_display_description" id="gce_display_description" value="1" <?php checked( $gce_display_description, '1' ); ?> />
			<label for="gce_display_description"><?php _e( 'Show the description of events? (URLs in the description will be made into links).', 'gce' ); ?></label>
		</p>
		<label class="description" for="gce_display_description_text"><?php _e( 'Text to display before the description.', 'gce' ); ?></label>
		<input type="text" name="gce_display_description_text" id="gce_display_description_text" value="<?php echo $gce_display_description_text; ?>" />
		<label class="description" for="gce_display_description_max"><?php _e( 'Maximum number of words to show from description. Leave blank for no limit.', 'gce' ); ?></label>
		<input type="text" name="gce_display_description_max" id="gce_display_description_max" value="<?php echo $gce_display_description_max; ?>" />
	</div>

	<div class="gce-meta-control">
		<strong><?php _e( 'Event Link', 'gce' ); ?></strong>
		<p>
			<input type="checkbox" name="gce_display_link" id="gce_display_link" value="1" <?php checked( $gce_display_link, '1' ); ?> />
			<label for="gce_display_link"><?php _e( 'Show a link to the Google Calendar page for an event?', 'gce' ); ?></label>
		</p>
		<p>
			<input type="checkbox" name="gce_display_link_tab" id="gce_display_link_tab" value="1" <?php checked( $gce_display_link_tab, '1' ); ?> />
			<label for="gce_display_link_tab"><?php _e( 'Links open in a new window / tab?', 'gce' ); ?></label>
		</p>
		<label class="description" for="gce_display_link_text"><?php _e( 'The link text to be displayed.', 'gce' ); ?></label>
		<input type="text" name="gce_display_link_text" id="gce_display_link_text" value="<?php echo $gce_display_link_text; ?>" />
	</div>
</div>
