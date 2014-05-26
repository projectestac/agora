/* docs initializer */
function initDocuments(panel)
{
	var $ = jQuery,
		anchor = 0;

	// recursive menu builder
	function buildDocMenu(menu, els_head)
	{
		var filter, did_one;

		els_head.each(function(){
			// name of anchor
			var a_name = 'menu_item_' + anchor++;
			// inject before self
			$(this).before($('<a></a>').attr('name', a_name));
			// create list item
			var item = $('<li></li>').appendTo(menu);
			var item_a = $('<a></a>').appendTo(item);
			var item_s = $('<ul></ul>');
			// build up link
			item_a.attr('target', '_self').attr('href', '#' + a_name).html($(this).html());
			// determine next level
			switch (this.tagName) {
				case 'H3':filter = 'h4';break;
				case 'H4':filter = 'h5';break;
				case 'H5':filter = 'h6';break;
				case 'H6':return false;
			}
			// next level headers
			var next = $(this).nextUntil(this.tagName).filter(filter);
			// build sub
			if ( buildDocMenu(item_s, next) ) {
				item.append(item_s);
			}
			// yay
			return did_one = true;
		});

		return did_one;
	}

	$('div.infinity-docs', panel).each(function(){
		var menu = $('ul.infinity-docs-menu', this);
		var headers = $('h3', this);
		buildDocMenu(menu, headers, 1);
	});
}