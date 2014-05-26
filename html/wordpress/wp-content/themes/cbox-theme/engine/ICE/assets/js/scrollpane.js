/*
 * jQuery UI scrollpane extension plugin
 */
(function($){

	var settings = {
		value: null,
		itemWidth: '100px',
		itemHeight: '100px',
		itemMargin: '10px',
		// interface
		valueSelector: null,
		textSelector: null,
		viewSelector: null,
		itemSelector: null,
		itemActiveSelector: null,
		barSelector: null,
		barWrapSelector: null,
		barIcon: 'ui-icon-grip-dotted-vertical',
		// events
		itemEvents: {}
	}

	var methods = {
		init: function(options)
		{
			// merge options
			$.extend(settings, options);

			// init slider(s)
			return this.each(function()
			{
				// pane vars
				var scrollPane =
						$(this)
							.addClass('ice-scroll-pane ui-widget ui-widget-content')
							.css('overflow', 'hidden'),
					scrollValue =
						$(settings.valueSelector, scrollPane)
							.addClass('ice-scroll-pane-value ui-widget-content'),
					scrollView =
						$(settings.viewSelector, scrollPane)
							.addClass('ice-scroll-pane-view'),
					scrollItems =
						$(settings.itemSelector, scrollView)
							.addClass('ice-scroll-pane-item')
							.css('width', settings.itemWidth)
							.css('height', settings.itemHeight)
							.css('margin', settings.itemMargin)
							.bind(settings.itemEvents)
							.click(function(event){
								var target = $(event.target),
									anchor = target.is('a') ? target : target.parent('a');
								scrollValue
									.children('.ice-scroll-pane-selected')
									.remove();
								anchor
									.clone()
									.appendTo(scrollValue)
									.addClass('ice-scroll-pane-selected');
							}),
					scrollItemActive =
						$(settings.itemActiveSelector, scrollView)
							.addClass('ice-scroll-pane-selected'),
					scrollItemCount =
							scrollItems.size(),
					scrollItemWidth =
							scrollItems.outerWidth(true);
				
				// size scroll view large enough to contain all items
				scrollView.css('width', (scrollItemCount + 1) * scrollItemWidth);
				scrollView.css('padding-left', scrollItemWidth);

				// slider vars
				var scrollBarWrap =
						$(settings.barWrapSelector, scrollPane)
							.addClass('ice-scroll-pane-bar-wrap ui-widget-content'),
					scrollBar =
						$(settings.barSelector, scrollBarWrap)
							.addClass('ice-scroll-pane-bar')
							.slider({
								slide: function(event, ui) {
									if (scrollView.width() > scrollPane.width()) {
										scrollView.css(
											'margin-left',
											Math.round(
												ui.value / 100 * (scrollPane.width() - scrollView.width())
											) + 'px'
										);
									} else {
										scrollView.css('margin-left', 0);
									}
								}
							}),
					handleHelper =
						scrollBar
							.find('.ui-slider-handle')
							.mousedown(function() {
								scrollBar.width( handleHelper.width() );
							})
							.mouseup(function() {
								scrollBar.width('100%');
							})
							.append('<span class="ui-icon ' + settings.barIcon + '"></span>')
							.wrap('<div class="ui-handle-helper-parent"></div>')
							.parent();

				// size scroll value to hold one item
				scrollValue.css(
					'width',
					(scrollItemWidth - parseFloat(scrollBarWrap.css('padding-left'))) + 'px'
				);
				scrollValue.css(
					'height',
					(scrollPane.innerHeight()) + 'px'
				);

				// pad scrollbar out for value container
				scrollBarWrap.css(
					'padding-left',
					(scrollItemWidth + parseFloat(scrollBarWrap.css('padding-left'))) + 'px'
				);

				// clone active item to value box
				if ( scrollItemActive.size() ) {
					scrollItemActive.clone().appendTo(scrollValue);
				}
				
				// size scrollbar and handle proportionally to scroll distance
				function sizeScrollBar()
				{
					var remainder =
							scrollView.width() - scrollPane.width(),
						proportion =
							remainder / scrollView.width(),
						handleSize =
							scrollPane.width() - (proportion * scrollPane.width());

					scrollBar.find('.ui-slider-handle').css({
						'width': handleSize,
						'margin-left': -handleSize / 2
					});
					
					handleHelper.width('').width(scrollBar.width() - handleSize);
				}

				// reset slider value based on scroll content position
				function resetValue()
				{
					var remainder =
							scrollPane.width() - scrollView.width(),
						leftVal =
							scrollView.css('margin-left' ) === 'auto' ? 0 :
							parseInt(scrollView.css('margin-left')),
						percentage =
							Math.round(leftVal / remainder * 100);
					
					scrollBar.slider('value', percentage);
				}

				// if the slider is 100% and window gets larger, reveal content
				function reflowView()
				{
					var showing =
							scrollView.width() + parseInt(scrollView.css('margin-left'), 10),
						gap =
							scrollPane.width() - showing;

					if ( gap > 0 ) {
						scrollView.css('margin-left', parseInt(scrollView.css('margin-left'), 10) + gap);
					}
				}

				// change handle position on window resize
				$(window).resize(function()
				{
					resetValue();
					sizeScrollBar();
					reflowView();
				});

				// init scrollbar size (safari wants a timeout)
				setTimeout( sizeScrollBar, 10 );
			});
		}
	}

	$.fn.iceEasyScrollPane = function (method)
	{
		if ( methods[method] ) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			return $.error('Method ' +  method + ' does not exist on jQuery.iceEasyScrollPane');
		}
	}

})(jQuery);