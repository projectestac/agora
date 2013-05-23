/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 'load', content_layoutpreview_init);

function content_layoutpreview_init()
{
    if ($('layout') && $('layout_preview_img') && $('layout_preview_desc')) {
        Event.observe('layout', 'change', content_layoutpreview_onchange);
    }
}
function content_layoutpreview_onchange()
{
    if (images && descs) {
        // change the image preview and description now.
        $('layout_preview_img').src = images[$('layout').selectedIndex];
        $('layout_preview_desc').update(descs[$('layout').selectedIndex]);
    }
}
