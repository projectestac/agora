/*
 *  $Id: pages.js 411 2010-04-23 16:02:49Z yokav $ 
 */
 
/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              pages_init_check,
              false);

function pages_init_check()
{
    if($('pages_multicategory_filter')) {
        pages_filter_init(); 
    }
    if ($('pages_settings_collapse')) {
        pages_settings_init();
    }
}

/**
 * Admin panel functions
 */


function pages_filter_init()
{
    Event.observe('pages_property', 'change', pages_property_onchange, false);
    pages_property_onchange();
    $('pages_multicategory_filter').show();
}

function pages_property_onchange()
{
    $$('div#pages_category_selectors select').each(function(select){
        select.hide();
    });
    var id = "pages_"+$('pages_property').value+"_category";
    $(id).show();
}

function pages_settings_init()
{
    Event.observe('pages_settings_collapse', 'click', pages_settings_click);
    $('pages_settings_collapse').addClassName('pn-toggle-link');
    pages_settings_click();
}

function pages_settings_click()
{
    if ($('pages_settings_details').style.display != 'none') {
        Element.addClassName.delay(0.9, $('pages_settings_details').parentNode, 'pn-collapsed');
        Element.removeClassName.delay(0.9, $('pages_settings_collapse'), 'pn-toggle-link-open');
    } else {
        Element.removeClassName($('pages_settings_details').parentNode, 'pn-collapsed');
        $('pages_settings_collapse').addClassName('pn-toggle-link-open');
    }
    switchdisplaystate('pages_settings_details');
}
