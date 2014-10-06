/**
 * Admin JavaScript functions
 *
 * @package   GCE
 * @author    Phil Derksen <pderksen@gmail.com>, Nick Young <mycorpweb@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2014 Phil Derksen
 */

(function ($) {
	"use strict";
	$(function () {
		
		// Show the hidden text box if custom date is selected (Retrieve From)
		$('#gce_retrieve_from').on('change', function() {
			
			if( $(this).val() == 'custom_date' ) {
				$('#gce_custom_from').show();
			} else {
				$('#gce_custom_from').hide();
			}
		});
		
		// Show the hidden text box if custom date is selected (Retrieve Until)
		$('#gce_retrieve_until').on('change', function() {
			
			if( $(this).val() == 'custom_date' ) {
				$('#gce_custom_until').show();
			} else {
				$('#gce_custom_until').hide();
			}
		});
		
		// Add jQuery date picker to our 2 custom date fields
		$('#gce_custom_from').datepicker();
		$('#gce_custom_until').datepicker();
	
	});
}(jQuery));


