/*
 *  $Id: reviews.js 334 2009-11-09 05:51:54Z drak $ 
 */
 
/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              reviews_init_check,
              false);

function reviews_init_check()
{
    if($('reviews_multicategory_filter')) {
        reviews_filter_init(); 
    }
}

/**
 * Admin panel functions
 */


function reviews_filter_init()
{
    Event.observe('reviews_property', 'change', reviews_property_onchange, false);
    reviews_property_onchange();
    $('reviews_multicategory_filter').show();
}

function reviews_property_onchange()
{
    $$('div#reviews_category_selectors select').each(function(select){
        select.hide();
    });
    var id = "reviews_"+$('reviews_property').value+"_category";
    $(id).show();
}
