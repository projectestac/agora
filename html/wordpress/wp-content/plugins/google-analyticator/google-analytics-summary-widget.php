<?php

/**
 * Creates a summary widget for Google Analytics stats
 *
 * @author Ronald Heft
 **/
class GoogleAnalyticsSummary
{
    var $api = false;
    var $id = false;
    var $qa_selecteddate, $date_before, $date_yesterday;
    /**
     * Start the process of including the widget
     **/
    function GoogleAnalyticsSummary()
    {
        add_action('wp_dashboard_setup', array(
            $this,
            'addDashboardWidget'
        ));
        add_action('admin_footer', array(
            $this,
            'addJavascript'
        ));
        add_action('admin_footer-index.php', array(
            $this,
            'addTopJs'
        ));
        
        $this->qa_selecteddate = isset( $_REQUEST['qa_selecteddate'] ) ? wp_filter_kses( $_REQUEST['qa_selecteddate'] ) : '31';
        $this->date_before    = date('Y-m-d', strtotime( '-'.$this->qa_selecteddate.' days', strtotime( current_time( 'mysql' ) ) ) );
        $this->date_yesterday = date('Y-m-d', strtotime( '-1 days', strtotime( current_time( 'mysql' ) ) ) );
		
        add_action( 'wp_ajax_ga_stats_widget', array( $this, 'ajaxWidget' ) );
    }
    
    /**
     * Add the widget to the dashboard
     **/
    function addDashboardWidget()
    {
        # Check if the user is an admin
        if (ga_current_user_is(get_option(key_ga_dashboard_role))) {
            wp_add_dashboard_widget('google-analytics-summary', __('Google Analytics Summary', 'google-analyticator'), array(
                $this,
                'widget'
            ));
        }
    }
    
    /**
     * Add the scripts to the admin
     **/
    function addJavascript()
    {
        # Include the Sparklines graphing library
        wp_enqueue_script('flot', plugins_url('/google-analyticator/jquery.flot.min.js'), array(
            'jquery'
        ), '1.5.1');
    }
    
    /**
     * Add the Javascript to the top
     **/
    function addTopJs()
    {
?>
		<script type="text/javascript">
		
			//Tooltip 
			jQuery.fn.UseTooltip = function () {
				var previousPoint = null;
				
				jQuery(this).bind("plothover", function (event, pos, item) {         
					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;
			
							jQuery("#vumtooltip").remove();
							
							var x = item.datapoint[0];
							var y = item.datapoint[1];      
							showTooltip(item.pageX, item.pageY, "<b>"+d2[ x-  1] + "</b><br/>" + item.series.label + ": <strong>" + y + "</strong>");
						}
					}
					else {
						jQuery("#vumtooltip").remove();
						previousPoint = null;
					}
				});
			};
			
			function showTooltip(x, y, contents) {
				jQuery('<div id="vumtooltip">' + contents + '</div>').css({
					position: 'absolute',
					display: 'none',
					top: y + 5,
					left: x + 20,
					border: '1px solid #D0D0D0',
					padding: '6px',     
					size: '9',   
					'background-color': '#fff',
					opacity: 0.80
				}).appendTo("body").fadeIn(200);
			}
			
			jQuery(document).ready(function($){
				// Add a link to see full stats on the Analytics website
				jQuery('#google-analytics-summary h3.hndle span').append('<span class="postbox-title-action"><a href="http://google.com/analytics/" class="edit-box open-box"><?php _e('View Full Stat Report', 'google-analyticator');?></a></span>');
				
					// Onload call analytics
					getAnalytics();
					
					//On date selection change
					jQuery("#qa_selecteddate").change(function(){
						getAnalytics();
					});
					
				});
						
				function getAnalytics(){
                                
//                                        console.log( 'Start getAnalytics();' );
					// Grab the widget data
					jQuery.ajax({
						type: 'post',
						url: 'admin-ajax.php',
						data: {
							action: 'ga_stats_widget',
							qa_selecteddate: jQuery("#qa_selecteddate :selected").val(),
							_ajax_nonce: '<?php echo wp_create_nonce("google-analyticator-statsWidget_get");?>'
						},
						beforeSend: function() {
							jQuery("#analyticsloading").html('<img src="<?php echo admin_url("images/wpspin_light.gif")?>" border="0" /> ').show();
						},
						success: function(html) {
							
							jQuery("#analyticsloading").hide();
							// Hide the loading message
							jQuery('#google-analytics-summary .inside small').remove();
							
//                                                        console.log(html);
                                                        
							// Place the widget data in the area
							jQuery('#google-analytics-summary .inside .target').html(html);
	
							// Display the widget data
							jQuery('#google-analytics-summary .inside .target').slideDown();
					 
							// Handle displaying the graph
							var divElement = jQuery('div'); //log all div elements
							var placeholder = jQuery(".flotcontainer");
							
							//disable graph if the selected is yesterday or today
							placeholder.show();
							if(jQuery("#qa_selecteddate :selected").val() == '0' || jQuery("#qa_selecteddate :selected").val() == '1') {
								placeholder.hide();
								return false;
							}
							
							//graph options
							var options = {
									grid: {
										show: true,
										aboveData: true,
										color: "#3f3f3f" ,
										labelMargin: 5,
										axisMargin: 0, 
										borderWidth: 0,
										borderColor:null,
										minBorderMargin: 5 ,
										clickable: true, 
										hoverable: true,
										autoHighlight: true,
										mouseActiveRadius: 10
									},
									series: {
										grow: {active:false},
										lines: {
											show: true,
											fill: true,
											lineWidth: 2,
											steps: false
											},
										points: {show:true}
									},
									legend: { position: "se" },
									yaxis: { min: 0 },
									xaxis: {ticks : datelabel, tickDecimals : 0},
									colors: ['#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'],
									shadowSize:1,
									tooltip: false, //activate tooltip
								};   
						
								jQuery.plot(placeholder, [ 
									{
										label: "<?php _e('Visits', 'google-analyticator')?>", 
										data: d1,
										lines: {fillColor: "#f2f7f9"},
										points: {fillColor: "#88bbc8"}
									}
					
								], options);
									jQuery(".flotcontainer").UseTooltip();
										
							}
						});
				}		
			jQuery(window).resize(function() {
				getAnalytics();
			});
		</script>
		<?php
    }
    
    /**
     * The widget display
     **/
    function widget()
    {
            # Attempt to login and get the current account
		echo '<p align="right"><span id="analyticsloading"></span> <select id="qa_selecteddate" name="qa_selecteddate">
					<option selected="selected" value="30">'. __("Past 30 days", 'google-analyticator'). '</option>
					<option value="60">'. __("Past 60 days", 'google-analyticator'). '</option>
					<option value="1">'. __("Yesterday", 'google-analyticator'). '</option>
				</select></p>';
        echo '<div class="flotcontainer" style="height: 230px;width:100%;"> </div>';
        echo '<div class="target" style="display: none;"></div>';
    }
    
    /**
     * AJAX data for the widget
     **/
    function ajaxWidget()
    {
        # Check the ajax widget
        check_ajax_referer('google-analyticator-statsWidget_get');

        # If WP_DEBUG is true,.
		
        $doing_transient = false; 
        
        if ( ( defined('WP_DEBUG') && WP_DEBUG ) || ( false === ( $ga_output = get_transient( 'ga_admin_dashboard_'. GOOGLE_ANALYTICATOR_VERSION  . $this->qa_selecteddate) ) ) ) {
            ob_start();
            # Attempt to login and get the current account
            $account = $this->getAnalyticsAccount();

            $this->id = $account;

            $this->api->setAccount($this->id);

            # Check that we can display the widget before continuing
            if ($account == false || $this->id == false) {
                # Output error message
                echo '<p style="margin: 0;">' . __('No Analytics account selected. Double check you are authenticated with Google on Google Analyticator\'s settings page and make sure an account is selected.', 'google-analyticator') . '</p>';
                # Add Javascript variable to prevent breaking the Javascript
                echo '<script type="text/javascript">var ga_visits = [];</script>';
                die;
            }
            
            # Add the header information for the visits graph
        //    echo '<p class="ga_visits_title" style="font-style: italic; font-family: Georgia, \'Times New Roman\', \'Bitstream Charter\', Times, serif; margin-top: 0px; color: #777; font-size: 13px;">' . __('Visits Over the Past 30 Days', 'google-analyticator') . '</p>';

            # Add the sparkline for the past 30 days
           $this->getVisitsGraph();

            # Add the summary header
            echo '<p style="font-style: italic; font-family: Georgia, \'Times New Roman\', \'Bitstream Charter\', Times, serif; color: #777; font-size: 13px;">' . __('Site Usage', 'google-analyticator') . '</p>';

            # Add the visitor summary
            $this->getSiteUsage();

            # Add the top 5 posts header
            echo '<p style="font-style: italic; font-family: Georgia, \'Times New Roman\', \'Bitstream Charter\', Times, serif; color: #777; font-size: 13px;">' . __('Top Pages', 'google-analyticator') . '</p>';

            # Add the top 5 posts
            $this->getTopPages();

            # Add the tab information
            echo '<table width="100%"><tr><td width="50%" valign="top">';

            # Add the top 5 referrers header
            echo '<p style="font-style: italic; font-family: Georgia, \'Times New Roman\', \'Bitstream Charter\', Times, serif; color: #777; font-size: 13px;">' . __('Top Referrers', 'google-analyticator') . '</p>';

            # Add the referrer information
            $this->getTopReferrers();

            # Add the second column
            echo '</td><td valign="top">';

            # Add the top 5 search header
            echo '<p style="font-style: italic; font-family: Georgia, \'Times New Roman\', \'Bitstream Charter\', Times, serif; color: #777; font-size: 13px;">' . __('Top Searches', 'google-analyticator') . '</p>';

            # Add the search information
            $this->getTopSearches();

            # Close the table
            echo '</td></tr></table>';

           
            # Grab the above outputs and cache it!
            $ga_output = ob_get_flush();

            // Cache the admin dashboard for 6 hours at a time. 
            set_transient( 'ga_admin_dashboard_'. GOOGLE_ANALYTICATOR_VERSION . $this->qa_selecteddate , $ga_output, 60*60*6 );
            $doing_transient = true;

        } else {
			$ga_output = get_transient( 'ga_admin_dashboard_'. GOOGLE_ANALYTICATOR_VERSION . $this->qa_selecteddate , $ga_output);	
		}
         
        if( ! $doing_transient )
            echo $ga_output;
      
        if(  get_option( key_ga_show_ad ) ) {
        echo '<p style="text-align:center">
                <a href="http://www.videousermanuals.com/rd/ga-dashboard/" target="_BLANK">
                    Learn how to use Google Analytics <br />
                    To remove the guess work from your business </a></p>';
        }
        
        die();
    }
    
    /**
     * Get the current analytics account
     *
     * @return the analytics account
     **/
    function getAnalyticsAccount()
    {
        $accounts = array();
        
        # Get the class for interacting with the Google Analytics
        require_once('class.analytics.stats.php');
        
        # Create a new Gdata call
        $this->api = new GoogleAnalyticsStats();
        
        # Check if Google sucessfully logged in
        if (!$this->api->checkLogin())
            return false;
        
        # Get a list of accounts
        //$accounts = $this->api->getAnalyticsAccounts();
        $accounts = $this->api->getSingleProfile();
        
        # Check if we actually have accounts
        if (!is_array($accounts))
            return false;
        
        # Check if we have a list of accounts
        if (count($accounts) <= 0)
            return false;
        
        # Loop throught the account and return the current account
        foreach ($accounts AS $account) {
            # Check if the UID matches the selected UID
            if ($account['ga:webPropertyId'] == get_option('ga_uid'))
                return $account['id'];
        }
        
        return false;
    }
    
    /**
     * Get the visitors graph
     **/
    function getVisitsGraph()
    {
        # Get the metrics needed to build the visits graph;

        try {
            $stats = $this->api->getMetrics('ga:visits', $this->date_before, $this->date_yesterday, 'ga:date', 'ga:date');
        }
        catch (Exception $e) {
            print 'GA Summary Widget - there was a service error ' . $e->getCode() . ':' . $e->getMessage();
        }

        # Create a list of the data points for graphing
        $data = '';
		$data2 = "";
		$data3 = "";
        $max  = 0;

        $rows = $stats->getRows();

        # Check the size of the stats array
        if (!isset($rows) || !is_array($rows) || count($rows) <= 0) {
            $data = '0,0';
        } else {
			$counter = 0;
            foreach ($rows AS $stat) {
			$counter++;
                # Verify the number is numeric
                if (is_numeric($stat[1])){
					$datestat = $stat[0];
					$date_str = substr($datestat, 0, 4) .'-'. substr($datestat, 4, -2).'-'. substr($datestat, 6, 8);
                    $data .= '['.$counter.', '.$stat[1] . '],';	
					$data3 .= '"'.  date("l, M. d, Y",strtotime($date_str, strtotime( current_time( 'mysql' ) )))  . '",'; // 20130120
					if($counter % 4 == 0){
						$data2 .= '['.$counter.', "'.  date("M. d",strtotime($date_str, strtotime( current_time( 'mysql' ) )))  . '"],'; // 20130120
					}
					
				}else
                    $data .= '0,';

                # Update the max value if greater
                if ($max < $stat[1])
                    $max = $stat[1];

            }
			
            $yesterday_count = $rows[count($rows) - 1][1];

            # Shorten the string to remove the last comma
            $data = substr($data, 0, -1);
			 $data2 = substr($data2, 0, -1);
			 $data3 = substr($data3, 0, -1);
        }

        # Add a fake stat if need be
        if (!isset($stat[1]))
            $stat[1] = 0;

        # Output the graph
        $output = '<script type="text/javascript">var datelabel = ['.$data2.'];var d1 = ['.$data.'];var d2 = ['.$data3.'];</script>';
        $output .= '<span class="ga_visits" title="' . sprintf(__('The most visits on a single day was %d. Yesterday there were %d visits.', 'google-analyticator'), $max, $yesterday_count) . '"></span>';
            
        echo $output;
    }
    
    /**
     * Get the site usage
     **/
    function getSiteUsage()
    {
        # Get the metrics needed to build the usage table
        $stats     = $this->api->getMetrics('ga:visits,ga:bounces,ga:entrances,ga:pageviews,ga:timeOnSite,ga:newVisits',  $this->date_before, $this->date_yesterday);

        # Create the site usage table
        if (isset($stats->totalsForAllResults)) { ?>
            <table width="100%">
                    <tr>
                        <td width=""><strong><?php echo number_format($stats->totalsForAllResults['ga:visits']); ?></strong></td>
                        <td width=""><?php _e('Visits', 'google-analyticator'); ?></td>
                        <?php if ($stats->totalsForAllResults['ga:entrances'] <= 0) { ?>
                            <td width="20%"><strong>0.00%</strong></td>
                        <?php } else { ?>
                            <td width="20%"><strong><?php echo number_format(round(($stats->totalsForAllResults['ga:bounces'] / $stats->totalsForAllResults['ga:entrances']) * 100, 2), 2); ?>%</strong></td>
                        <?php } ?>
                        <td width="30%"><?php _e('Bounce Rate', 'google-analyticator'); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo number_format($stats->totalsForAllResults['ga:pageviews']); ?></strong></td>
                        <td><?php _e('Pageviews', 'google-analyticator'); ?></td>
                        <?php if ($stats->totalsForAllResults['ga:visits'] <= 0) { ?>
                            <td><strong>00:00:00</strong></td>
                        <?php } else { ?>
                            <td><strong><?php echo $this->sec2Time($stats->totalsForAllResults['ga:timeOnSite'] / $stats->totalsForAllResults['ga:visits']); ?></strong></td>
                        <?php } ?>
                        <td><?php _e('Avg. Time on Site', 'google-analyticator'); ?></td>
                    </tr>
                    <tr>
                        <?php if ($stats->totalsForAllResults['ga:visits'] <= 0) { ?>
                            <td><strong>0.00</strong></td>
                        <?php } else { ?>
                            <td><strong><?php echo number_format(round($stats->totalsForAllResults['ga:pageviews'] / $stats->totalsForAllResults['ga:visits'], 2), 2); ?></strong></td>
                        <?php } ?>
                            <td><?php _e('Pages/Visit', 'google-analyticator'); ?></td>
                        <?php if ($stats->totalsForAllResults['ga:visits'] <= 0) { ?>
                            <td><strong>0.00%</strong></td>
                        <?php } else { ?>
                            <td><strong><?php echo number_format(round(($stats->totalsForAllResults['ga:newVisits'] / $stats->totalsForAllResults['ga:visits']) * 100, 2), 2); ?>%</strong></td>
                            <td><?php _e('% New Visits', 'google-analyticator'); ?></td>
                        <?php } ?>
                    </tr>
            </table>
    <?php }
            
    }
    
    /**
     * Get the top pages
     **/
    function getTopPages()
    {
        # Get the metrics needed to build the top pages
        $stats     = $this->api->getMetrics('ga:pageviews', $this->date_before, $this->date_yesterday, 'ga:pageTitle,ga:pagePath', '-ga:pageviews', 'ga:pagePath!=/', 10); //'ga:pagePath!%3D%2F'
        $rows = $stats->getRows();

        # Check the size of the stats array
        if (count($rows) <= 0 || !is_array($rows)) {
            $return = '<p>' . __('There is no data for view.', 'google-analyticator') . '</p>';
        } else {
            # Build the top pages list
            $return = '<ol>';

            # Set variables needed to correct (not set) bug
            $new_stats    = array();
            $notset_stats = array();

            # Loop through each stat and create a new array
            foreach ($rows AS $stat) {
                # If the stat is not set
                if ($stat[0] == '(not set)') {
                    # Add it to separate array
                    $notset_stats[] = $stat;
                } else {
                    # Add it to new array with index set
                    $new_stats[$stat[1]] = $stat;
                }
            }

            # Loop through all the (not set) stats and attempt to add them to their correct stat
            foreach ($notset_stats AS $stat) {
                # If the stat has a "partner"
                if ($new_stats[$stat[1]] != NULL) {
                    # Add the pageviews to the stat
                    $new_stats[$stat[1]][2] = $new_stats[$stat[1]][2] + $stat[2];
                } else {
                    # Stat goes to the ether since we couldn't find a partner (if anyone reads this and has a suggestion to improve, let me know)
                }
            }

            # Renew new_stats back to stats
            $stats = $new_stats;

            # Sort the stats array, since adding the (not set) items may have changed the order
            usort($stats, array(
                $this,
                'statSort'
            ));

            # Since we can no longer rely on the API as a limiter, we need to keep track of this ourselves
            $stat_count = 0;

            # Loop through each stat for display
            foreach ($stats AS $stat) {
                $return .= '<li><a href="' . esc_url($stat[1]) . '">' . esc_html($stat[0]) . '</a> - ' . number_format($stat[2]) . ' ' . __('Views', 'google-analyticator') . '</li>';

                # Increase the stat counter
                $stat_count++;

                # Stop at 5
                if ($stat_count >= 5)
                    break;
            }

            # Finish the list
            $return .= '</ol>';
        }
        echo $return; 
    }
    
    /**
     * Get the top referrers
     **/
    function getTopReferrers()
    {
        # Get the metrics needed to build the top referrers
        $stats     = $this->api->getMetrics('ga:visits', $this->date_before, $this->date_yesterday, 'ga:source,ga:medium', '-ga:visits', 'ga:medium==referral', '5');
        $rows = $stats->getRows();

        # Check the size of the stats array
        if (count($rows) <= 0 || !is_array($rows)) {
            echo '<p>' . __('There is no data for view.', 'google-analyticator') . '</p>';
        } else {
            # Build the top pages list
            echo '<ol>';

            # Loop through each stat
            foreach ($rows AS $stat) {
                echo '<li><strong>' . esc_html($stat[0]) . '</strong> - ' . number_format($stat[2]) . ' ' . __('Visits', 'google-analyticator') . '</li>';
            }

            # Finish the list
            echo '</ol>';
        }
    }
    
    /**
     * Get the top searches
     **/
    function getTopSearches()
    {
        # Get the metrics needed to build the top searches
        $stats     = $this->api->getMetrics('ga:visits', $this->date_before, $this->date_yesterday, 'ga:keyword', '-ga:visits', 'ga:keyword!=(not set)', '5'); //'ga:keyword!=(not_set)'
        $rows      = $stats->getRows();

        # Check the size of the stats array
        if (count($rows) <= 0 || !is_array($rows)) {
            echo '<p>' . __('There is no data for view.', 'google-analyticator') . '</p>';
        } else {
            # Build the top pages list
            echo '<ol>';
            # Loop through each stat
            foreach ($rows AS $stat) {
                echo '<li><strong>' . esc_html($stat[0]) . '</strong> - ' . number_format($stat[1]) . ' ' . __('Visits', 'google-analyticator') . '</li>';
            }
            # Finish the list
            echo '</ol>';
        }
    }
    
    /**
     * Sort a set of stats in descending order
     *
     * @return how the stat should be sorted
     **/
    function statSort($x, $y)
    {
        if ($x[2] == $y[2])
            return 0;
        elseif ($x[2] < $y[2])
            return 1;
        else
            return -1;
    }
    
    /**
     * Convert second to a time format
     **/
    function sec2Time($time)
    {
        # Check if numeric
        if (is_numeric($time)) {
            $value = array(
                "years" => '00',
                "days" => '00',
                "hours" => '00',
                "minutes" => '00',
                "seconds" => '00'
            );
            if ($time >= 31556926) {
                $value["years"] = floor($time / 31556926);
                $time           = ($time % 31556926);
            }
            if ($time >= 86400) {
                $value["days"] = floor($time / 86400);
                $time          = ($time % 86400);
            }
            if ($time >= 3600) {
                $value["hours"] = str_pad(floor($time / 3600), 2, 0, STR_PAD_LEFT);
                $time           = ($time % 3600);
            }
            if ($time >= 60) {
                $value["minutes"] = str_pad(floor($time / 60), 2, 0, STR_PAD_LEFT);
                $time             = ($time % 60);
            }
            $value["seconds"] = str_pad(floor($time), 2, 0, STR_PAD_LEFT);
            
            # Get the hour:minute:second version
            return $value['hours'] . ':' . $value['minutes'] . ':' . $value['seconds'];
        } else {
            return false;
        }
    }
} // END class 
