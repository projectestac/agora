/*
 * jQuery UI slider extension plugin
 */
(function($){

	var settings = {
		value: null,
		values: null,
		prefix: '',
		suffix: '',
		delimiter: '&nbsp;-&nbsp;'
	}
	
	var methods = {
		init: function(options)
		{
			// merge options
			$.extend(settings, options);

			// init slider(s)
			return this.each(function(){
				$(this).slider(options).addClass('ice-slider');
			});
		},
		updateInput: function(inputSelector)
		{
			// update inputs matching selector
			return this.each(function(){
				$(this).slider('option', 'change', function(event, ui) {
					var loop = 0;
					$(inputSelector)
						.each(function(){
							if ( typeof ui.values == 'object' ) {
								$(this).val( ui.values[loop++] );
							} else {
								$(this).val( ui.value );
							}
						});
				});
			});
		},
		updateDisplay: function(displaySelector)
		{
			// update display matching selector
			return this.each(function(){
				// do immediately
				$(displaySelector)
					.html(methods.formatDisplay(settings.value, settings.values));
				// and then on every slide
				$(this).slider('option', 'slide', function (event, ui) {
					$(displaySelector)
						.html(methods.formatDisplay(ui.value, ui.values));
				});
			});
		},
		formatDisplay: function(val, vals)
		{
			var items = new Array();

			if ( typeof vals == 'object' && (vals) ) {
				for (i in vals) {
					items.push( settings.prefix + vals[i] + settings.suffix );
				}
			} else {
				items.push( settings.prefix + val + settings.suffix );
			}

			return items.join(settings.delimiter);
		}
	}

	$.fn.iceEasySlider = function (method)
	{
		if ( methods[method] ) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			return $.error('Method ' +  method + ' does not exist on jQuery.iceEasySlider');
		}
	}

})(jQuery);