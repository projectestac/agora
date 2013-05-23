/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              feeds_init_check,
              false);

function feeds_init_check()
{
    if($('feeds_multicategory_filter')) {
        feeds_filter_init(); 
    }
}

/**
 * Admin panel functions
 */


function feeds_filter_init()
{
    Event.observe('feeds_property', 'change', feeds_property_onchange, false);
    feeds_property_onchange();
    $('feeds_multicategory_filter').style.display = 'inline';
}

function feeds_property_onchange()
{
    $$('div#feeds_category_selectors select').each(function(select){
        select.hide();
    });
    var id = "feeds_"+$('feeds_property').value+"_category";
    $(id).show();
}
