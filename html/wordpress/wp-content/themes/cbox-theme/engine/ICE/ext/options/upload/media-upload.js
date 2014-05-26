jQuery(document).ready(function($)
{
	// modify media items callback
	var modifyItems = function() {
		// select all media items and loop them
		$( 'div#media-items div.media-item', document )
			.each( function(){
				// tease out elements
				var describe = $( 'table.describe', this ),
					url = $( 'tr.url', describe ),
					buttonUrl = $( 'td.field button.urlfile', url ),
					submit = $( 'tr.submit', describe ),
					buttonSubmit = $( 'td.savesend input[type="submit"].button', submit );
				// hide useless rows
				$( 'tr.post_excerpt, tr.post_content, tr.url, tr.align, tr.image-size', describe ).hide();
				// kill post thumb link
				$( 'a.wp-post-thumbnail', submit ).remove();
				// tweak submit button text
				buttonSubmit.val( 'Select this File' );
				// remove all click handlers from "insert" button and add our handler
				buttonSubmit.unbind( 'click' ).click(function(e){
					var id = $(this).attr( 'id' ).replace( /[^\d]/g, '' ),
						url = buttonUrl.attr( 'data-link-url' );
					window.icextOptionUploadAttachmentId = id;
					window.icextOptionUploadAttachmentUrl = url;
					window.parent.jQuery('div.icextOptionUploadWin').dialog( 'close' );
					e.preventDefault();
				});
			});
	}

	// call on every completed ajax request
	$(document).ajaxComplete( modifyItems );

	// call on page load
	modifyItems();

});