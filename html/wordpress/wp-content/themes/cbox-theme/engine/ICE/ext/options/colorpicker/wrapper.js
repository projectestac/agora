
var iceEasyColorPicker = function ()
{
	var
		inputEl,
		pickerEl,
		pickerBg = function(pickerEl, color)
		{
			// get child div
			var el = pickerEl.children('div');
			// set color if needed
			if (color) {
				el.css('background-color', color);
				pickerEl.ColorPickerSetColor(color);
			}
			// return color
			return el.css('background-color', color);
		};

	return {
		// Initialize a colorpicker
		init: function (inputSelector, pickerSelector)
		{
			// set elements on init
			pickerEl = jQuery(pickerSelector);
			inputEl = jQuery(inputSelector).bind('click', function () {
				jQuery(this).bind('keyup', function () {
					pickerBg(jQuery(pickerSelector), this.value);
				});
			});

			// attach color picker event
			pickerEl.ColorPicker({
				onBeforeShow: function () {
					// set elements before show
					pickerEl = jQuery(pickerSelector);
					inputEl = jQuery(inputSelector);
				},
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					jQuery(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					color = '#' + hex;
					inputEl.val(color);
					pickerBg(pickerEl, color);
				}
			});

			// initialize color on init
			if (inputEl.val()) {
				pickerBg(pickerEl, inputEl.val());
			}
		}
	};
}();