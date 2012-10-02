wrs_addEvent(window, 'load', function () {
    wrs_imageAlignFix();
});
/* Image align bug: "align" attribute is not standard, so there are browsers that does not support it. */
function wrs_imageAlignFix() {
    var images = document.getElementsByTagName('img');
	
    for (var i = images.length - 1; i >= 0; --i) {
        if (images[i].className == 'Wirisformula') {
            images[i].style.verticalAlign = (-images[i].height / 2) + 'px';
        }
    }
}
/* Tools */
/**
 * Cross-browser addEventListener/attachEvent function.
 * @param object element Element target
 * @param event event Event
 * @param function func Function to run
 */
function wrs_addEvent(element, event, func) {
    if (element.addEventListener) {
        element.addEventListener(event, func, false);
    }
    else if (element.attachEvent) {
        element.attachEvent('on' + event, func);
    }
}