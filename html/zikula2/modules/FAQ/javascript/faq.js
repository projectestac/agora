/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              faq_init_check,
              false);

function faq_init_check()
{
    if($('faq_multicategory_filter')) {
        faq_filter_init(); 
    }
}

/**
 * Admin panel functions
 */


function faq_filter_init()
{
    Event.observe('faq_property', 'change', faq_property_onchange, false);
    faq_property_onchange();
    $('faq_multicategory_filter').show();
}

function faq_property_onchange()
{
    $$('div#faq_category_selectors select').each(function(select){
        select.hide();
    });
    var id = "faq_"+$('faq_property').value+"_category";
    $(id).show();
}
