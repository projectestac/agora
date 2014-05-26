
function widgetPostsListSortable(selector)
{
	// init objects
	var cont = jQuery(selector),
		posts = jQuery('ul', cont).first(),
		message =
			jQuery('<div></div>')
				.insertBefore(posts),
		item =
			jQuery('div.ice-content', posts)
				.addClass('ui-state-default ui-corner-all'),
		status =
			jQuery('span.ice-status', posts)
				.buttonset(),
		trash =
			jQuery('a.ice-do-trash', posts)
				.button({icons: {primary: 'ui-icon-trash'}});

	// add icons to status buttons
	status.each(function()
	{
		var buttons = jQuery('input', this);
		buttons.eq(0).button('option', 'icons', {primary: 'ui-icon-pencil'});
		buttons.eq(1).button('option', 'icons', {primary: 'ui-icon-document'});
	});

	// handle status change
	jQuery('input', status).click(function()
	{
		var $this = jQuery(this),
			id_arr = iceEasyAjax.splitDash($this.attr('id')),
			p_id = id_arr[2],
			p_stat = id_arr[1];

		// show spinner
		message.iceEasyFlash('loading', 'Updating status to: ' + p_stat).fadeIn();

		// save hierarchy
		jQuery.post(
			iceEasyGlobalL10n.ajax_url,
			{
				'action': 'ice_widgets_posts_list_item_status',
				'post_id': p_id,
				'post_status': p_stat
			},
			function(r){
				var rs = iceEasyAjax.splitResponseStd(r);
				if (rs.code >= 1) {
					message.iceEasyFlash('alert', rs.message);
				} else {
					message.iceEasyFlash('error', rs.message);
				}
			}
		);

		return false;
	});

	// handle trash click
	trash.click(function()
	{
		if (!confirm('Are you sure you want to trash this post?')) {
			return false;
		}

		var $this = jQuery(this),
			p_id = $this.prop('hash').substr(1);

		// show spinner
		message.iceEasyFlash('loading', 'Moving item to trash').fadeIn();

		// trash the post
		jQuery.post(
			iceEasyGlobalL10n.ajax_url,
			{
				'action': 'ice_widgets_posts_list_item_trash',
				'post_id': p_id
			},
			function(r){
				var rs = iceEasyAjax.splitResponseStd(r);
				if (rs.code >= 1) {
					$this.closest('li').remove();
					message.iceEasyFlash('alert', rs.message);
				} else {
					message.iceEasyFlash('error', rs.message);
				}
			}
		);

		return false;
	});

	// make posts sortable
	posts.nestedSortable({
		handle: 'div',
		helper:	'clone',
		listType: 'ul',
		items: 'li',
		maxLevels: 0,
		opacity: .6,
		revert: 250,
		tabSize: 25,
		tolerance: 'pointer',
		toleranceElement: '> div',
		stop: function(event,ui){
			// show spinner
			message.iceEasyFlash('loading', 'Saving hiearchy').fadeIn();
			// save hierarchy
			jQuery.post(
				iceEasyGlobalL10n.ajax_url,
				{
					'action': 'ice_widgets_posts_list_save',
					'posts': posts.nestedSortable('toArray')
				},
				function(r){
					var rs = iceEasyAjax.splitResponseStd(r);
					if (rs.code >= 1) {
						message.iceEasyFlash('loading', rs.message).fadeOut(500);
					} else {
						message.iceEasyFlash('error', rs.message);
					}
				}
			);
		}
	});
}