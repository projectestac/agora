<?php

/**
 * The Google Analytics Stats Widget
 *
 * Now using widget API available in WordPress 2.8
 * @author Spiral Web Consulting
 **/
class GoogleStatsWidget extends WP_Widget
{
	function GoogleStatsWidget() {
		$widget_ops = array('classname' => 'widget_google_stats', 'description' => __("Displays Stat Info From Google Analytics", 'google-analyticator') );
		$control_ops = array('width' => 400, 'height' => 400);
		$this->WP_Widget('googlestats', __('Google Analytics Stats', 'google-analyticator'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$acnt = false;
		$timeFrame = empty($instance['timeFrame']) ? '1' : $instance['timeFrame'];
		$pageBg = empty($instance['pageBg']) ? 'fff' : $instance['pageBg'];
		$widgetBg = empty($instance['widgetBg']) ? '999' : $instance['widgetBg'];
		$innerBg = empty($instance['innerBg']) ? 'fff' : $instance['innerBg'];
		$font = empty($instance['font']) ? '333' : $instance['font'];
		$line1 = empty($instance['line1']) ? 'Unique' : $instance['line1'];
		$line2 = empty($instance['line2']) ? 'Visitors' : $instance['line2'];
		
		# Before the widget
		echo $before_widget;
		
		# The title
		if ( $title )
			echo $before_title . $title . $after_title;
		
		# Make the stats chicklet
		echo '<!-- Data gathered from last ' . number_format($timeFrame) . ' days using Google Analyticator -->';
		$this->initiateBackground($pageBg, $font);
		$this->beginWidget($font, $widgetBg);
		$this->widgetInfo($this->getUniqueVisitors($acnt, $timeFrame), $line1, $line2, $innerBg, $font);
		$this->endWidget();
		
		# After the widget
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['account'] = strip_tags(stripslashes($new_instance['account']));
		$instance['timeFrame'] = strip_tags(stripslashes($new_instance['timeFrame']));
		$instance['pageBg'] = strip_tags(stripslashes($new_instance['pageBg']));
		$instance['widgetBg'] = strip_tags(stripslashes($new_instance['widgetBg']));
		$instance['innerBg'] = strip_tags(stripslashes($new_instance['innerBg']));
		$instance['font'] = strip_tags(stripslashes($new_instance['font']));
		$instance['line1'] = strip_tags(stripslashes($new_instance['line1']));
		$instance['line2'] = strip_tags(stripslashes($new_instance['line2']));
		
		return $instance;
	}
	
	function form($instance) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'account'=>'', 'timeFrame'=>'1', 'pageBg'=>'fff', 'widgetBg'=>'999', 'innerBg'=>'fff', 'font'=>'333', 'line1'=>'Unique', 'line2'=>'Visitors') );
		
		$title = htmlspecialchars($instance['title']);
		$acnt = htmlspecialchars($instance['account']);
		$timeFrame = htmlspecialchars($instance['timeFrame']);
		$pageBg = htmlspecialchars($instance['pageBg']);
		$widgetBg = htmlspecialchars($instance['widgetBg']);
		$innerBg = htmlspecialchars($instance['innerBg']);
		$font = htmlspecialchars($instance['font']);
		$line1 = htmlspecialchars($instance['line1']);
		$line2 = htmlspecialchars($instance['line2']);
		
		$accounts = array();
		
		# Get the current memory limit
		$current_mem_limit = substr(ini_get('memory_limit'), 0, -1);

		# Check if this limit is less than 96M, if so, increase it
		if ( $current_mem_limit < 96 || $current_mem_limit == '' ) {
			if ( function_exists('memory_get_usage') )
				@ini_set('memory_limit', '96M');
		}
		
		# Get the class for interacting with the Google Analytics
		require_once('class.analytics.stats.php');

		# Create a new Gdata call
		$stats = new GoogleAnalyticsStats();
		
		# Check if Google sucessfully logged in
		$login = $stats->checkLogin();
	
                if( !$login )
                    return false; 

		# Get a list of accounts
		//$accounts = $stats->getAnalyticsAccounts();
		$accounts = $stats->getSingleProfile();


		
		# Output the options
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title', 'google-analyticator') . ': <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
		# Time frame
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('timeFrame') . '">' . __('Days of data to get', 'google-analyticator') . ': <input style="width: 150px;" id="' . $this->get_field_id('timeFrame') . '" name="' . $this->get_field_name('timeFrame') . '" type="text" value="' . $timeFrame . '" /></label></p>';		
		# Page background
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('pageBg') . '">' . __('Page background', 'google-analyticator') . ': <input style="width: 150px;" id="' . $this->get_field_id('pageBg') . '" name="' . $this->get_field_name('pageBg') . '" type="text" value="' . $pageBg . '" /></label></p>';
		# Widget background
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('widgetBg') . '">' . __('Widget background', 'google-analyticator') . ': <input style="width: 150px;" id="' . $this->get_field_id('widgetBg') . '" name="' . $this->get_field_name('widgetBg') . '" type="text" value="' . $widgetBg . '" /></label></p>';
		# Inner background
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('innerBg') . '">' . __('Inner background', 'google-analyticator') . ': <input style="width: 150px;" id="' . $this->get_field_id('innerBg') . '" name="' . $this->get_field_name('innerBg') . '" type="text" value="' . $innerBg . '" /></label></p>';
		# Font color
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('font') . '">' . __('Font color', 'google-analyticator') . ': <input style="width: 150px;" id="' . $this->get_field_id('font') . '" name="' . $this->get_field_name('font') . '" type="text" value="' . $font . '" /></label></p>';
		# Text line 1
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('line1') . '">' . __('Line 1 text', 'google-analyticator') . ': <input style="width: 200px;" id="' . $this->get_field_id('line1') . '" name="' . $this->get_field_name('line1') . '" type="text" value="' . $line1 . '" /></label></p>';
		# Text line 2
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('line2') . '">' . __('Line 2 text', 'google-analyticator') . ': <input style="width: 200px;" id="' . $this->get_field_id('line2') . '" name="' . $this->get_field_name('line2') . '" type="text" value="' . $line2 . '" /></label></p>';
	}
	
	/**
	 * This function is used to display the background color behind the widget. This is necessary
	 * for the Google Analytics text to have the same background color as the page.
	 *
	 * @param $font_color - Hexadecimal value for the font color used within the Widget (does not effect "Powered By Google Analytics Text"). This effects border color as well.
	 * @param $page_background_color - Hexadecimal value for the page background color
	 * @return void
	 **/
	function initiateBackground($page_background_color = 'FFF', $font_color = '000')
	{
		echo '<br />';
		echo '<div style="background:#' . $page_background_color . ';font-size:12px;color:#' . $font_color . ';font-family:\'Lucida Grande\',Helvetica,Verdana,Sans-Serif;">';
	}

	/**
	 * This function starts the widget. The font color and widget background color are customizable.
	 *
	 * @param $font_color - Hexadecimal value for the font color used within the Widget (does not effect "Powered By Google Analytics Text"). This effects border color as well.
	 * @param $widget_background_color - Hexadecimal value for the widget background color.
	 * @return void
	 **/
	function beginWidget($font_color = '000', $widget_background_color = 'FFF')
	{
		echo '<table style="width:auto!important;border-width:2px;border-color:#' . $font_color . ';border-style:solid;background:#' . $widget_background_color . ';"><tr>';
	}

	/**
	 * This function encases the text that appears on the right hand side of the widget.
	 * Both lines of text are customizable by each individual user.
	 *
	 * It also displays the visitor count that was pulled from the user's Google Analytics account.
	 *
	 * @param $visitor_count - Number of unique visits to the site pulled from the user's Google Analytics account.
	 * @param $line_one - First line of text displayed on the right hand side of the widget.
	 * @param $line_two - Second line of text displayed on the right hand side of the widget.
	 * @param $inner_background_color - Hexadecimal value for the background color that surrounds the Visitor Count.
	 * @param $font_color - Hexadecimal value for the font color used within the Widget (does not effect "Powered By Google Analytics Text"). This effects border color as well
	 * @return void
	 **/
	function widgetInfo($visitor_count, $line_one = 'Unique', $line_two = 'Visitors', $inner_background_color = 'FFF', $font_color = '000')
	{

		echo '<td style="width:auto!important;border-width:1px;border-color:#' . $font_color . ';border-style:solid;padding:0px 5px 0px 5px;text-align:right;background:#' . $inner_background_color . ';min-width:80px;*width:80px!important;"><div style="min-width:80px;">'. $visitor_count . '</div></td>';

		echo '<td style="width:auto!important;padding:0px 5px 0px 5px;text-align:center;font-size:11px;">' . $line_one . '<br />' . $line_two . '</td>';

	}

	/**
	 * The function is used strictly for visual appearance. It also displays the Google Analytics text.
	 *
	 * @return void
	 **/
	function endWidget()
	{
		// This closes off the widget.
		echo '</tr></table>';

		// The following is used to displayed the "Powered By Google Anayltics" text.
		echo '<div style="font-size:9px;color:#666666;margin-top:0px;font-family:Verdana;">Powered By <a href="http://google.com/analytics/" title="Google Analytics" style="text-decoration:none;"><img src="' . plugins_url('/google-analyticator/ga_logo.png') . '" alt="Google Analytics" style="border:0px;position:relative;top:4px;" /></a></div></div>';
	}

	/**
	 * Grabs the cached value of the unique visits for the previous day
	 *
	 * @param account - the account to get the unique visitors from
	 * @param time - the amount of days to get
	 * @return void
	 **/
	function getUniqueVisitors($account, $time = 1)
	{
            // IF we have a cached version, return that, if not, continue on.
            if ( get_transient( 'google_stats_uniques' ) )
                return get_transient( 'google_stats_uniques' );

            # Get the class for interacting with the Google Analytics
            require_once('class.analytics.stats.php');

            # Create a new Gdata call
            $stats = new GoogleAnalyticsStats();

            # Check if Google sucessfully logged in
            if ( ! $stats->checkLogin() )
                    return false;

            $account = $stats->getSingleProfile();
            $account = $account[0]['id'];

            # Set the account to the one requested
            $stats->setAccount($account);

            # Get the latest stats
            $before = date('Y-m-d', strtotime('-' . $time . ' days'));
            $yesterday = date('Y-m-d', strtotime('-1 day'));

            try{
                $result = $stats->getMetrics('ga:visitors', $before, $yesterday);
            }
            catch(Exception $e){
                print 'GA Widget - there was a service error ' . $e->getCode() . ':' . $e->getMessage();
            }

            $uniques = number_format($result->totalsForAllResults['ga:visitors']);

            # Store the array
            set_transient( 'google_stats_uniques', $uniques, 60*60*12 );

            # Return the visits
            return $uniques;
	}

}// END class
	
/**
* Register Google Analytics Stat Widget.
*/
function GoogleStatsWidget_init() {
	register_widget('GoogleStatsWidget');
}	

add_action('widgets_init', 'GoogleStatsWidget_init');

//XTEC ************ AFEGIT - Carregant el textdomain del widget.
//2011.05.12 @fbassas

$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain('google-analyticator', 'wp-content/plugins/' . $plugin_dir . '/localizations', $plugin_dir . '/localizations');

//************ FI