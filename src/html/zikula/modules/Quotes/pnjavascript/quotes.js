/*
 *  $Id: quotes.js 358 2009-11-11 13:46:21Z herr.vorragend $ 
 */
 
/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              quotes_init_check,
              false);

function quotes_init_check()
{
    if($('quotes_multicategory_filter')) {
        quotes_filter_init(); 
    }
}

/**
 * Admin panel functions
 */
function quotes_filter_init()
{
    Event.observe('quotes_property', 'change', quotes_property_onchange, false);
    quotes_property_onchange();
    //$('quotes_multicategory_filter').style.display = 'inline';
}

function quotes_property_onchange()
{
    $$('div#quotes_category_selectors select').each(function(select){
        select.hide();
    });
    var id = "quotes_"+$('quotes_property').value+"_category";
    $(id).show();
}
