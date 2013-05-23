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
    if ($('pages_meta_collapse')) {
        pages_meta_init();
    }
}

/**
 * Admin panel functions
 */

function pages_filter_init()
{
    $('pages_property').observe('change', pages_property_onchange);
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
    $('pages_settings_collapse').observe('click', pages_settings_click);
    $('pages_settings_collapse').addClassName('z-toggle-link');
    pages_settings_click();
}

function pages_settings_click()
{
    if ($('pages_settings_details').style.display != 'none') {
        Element.removeClassName.delay(0.9, $('pages_settings_collapse'), 'z-toggle-link-open');
    } else {
        $('pages_settings_collapse').addClassName('z-toggle-link-open');
    }
    switchdisplaystate('pages_settings_details');
}

function pages_meta_init()
{
    $('pages_meta_collapse').observe('click', pages_meta_click);
    $('pages_meta_collapse').addClassName('z-toggle-link');
    pages_meta_click();
}

function pages_meta_click()
{
    if ($('pages_meta_details').style.display != 'none') {
        Element.removeClassName.delay(0.9, $('pages_meta_collapse'), 'z-toggle-link-open');
    } else {
        $('pages_meta_collapse').addClassName('z-toggle-link-open');
    }
    switchdisplaystate('pages_meta_details');
}