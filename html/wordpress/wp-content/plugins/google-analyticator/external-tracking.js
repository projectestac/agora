jQuery(document).ready(function() {

	jQuery('a').each(function() {
		var a = jQuery(this);
		var href = a.attr('href');
		
		// Check if the a tag has a href, if not, stop for the current link
		if ( href == undefined || href =="")
			return;
		
		var url = href.replace('http://','').replace('https://','');
		var hrefArray = href.split('.').reverse();
		var extension = hrefArray[0].toLowerCase();
		var hrefArray = href.split('/').reverse();
		var domain = hrefArray[2];
		var downloadTracked = false;
	
		if (typeof analyticsFileTypes != "undefined") {
			// If the link is a download
			if (jQuery.inArray(extension,analyticsFileTypes) != -1) {
				// Mark the link as already tracked
				downloadTracked = true;
				
				// Add the tracking code
				a.click(function() {
					if ( analyticsEventTracking == 'enabled' ) {
						if(analyticsSnippet == 'enabled'){
							_gaq.push(['_trackEvent', 'Downloads', extension.toUpperCase(), href]);
						}else{
							ga('send', 'event', 'Downloads', extension.toUpperCase(), href);							
						}
					} else{
						if(analyticsSnippet == 'enabled'){
							_gaq.push(['_trackPageview', analyticsDownloadsPrefix + url]);
						}else{
							ga('send', 'pageview',  analyticsDownloadsPrefix + url);
						}
					}
				});
			}
		}
		// If the link is external
	 	if ( ( href.match(/^http/) ) && ( !href.match(document.domain) ) && ( downloadTracked == false ) ) {
	    	// Add the tracking code
			a.click(function() {
				if ( analyticsEventTracking == 'enabled' ) {
					if(analyticsSnippet == 'enabled'){
						_gaq.push(['_trackEvent', 'Outbound Traffic', href.match(/:\/\/(.[^/]+)/)[1], href]);
					}else{
							ga('send', 'event', 'Outbound Traffic', href.match(/:\/\/(.[^/]+)/)[1], href);

						}
				} else
					if(analyticsSnippet == 'enabled'){
						_gaq.push(['_trackPageview', analyticsOutboundPrefix + url]);
					}else{
						ga('send', 'pageview',  analyticsOutboundPrefix + url);
							
					}
			});
		}
	});

});