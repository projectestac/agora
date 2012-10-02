/*
 *  $Id: news_admin_modifyconfig.js 34 2008-12-24 00:07:35Z Guite $ 
 */

/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 
              'load', 
              news_modifyconfig_init_check,
              false);

function news_modifyconfig_init_check() 
{
    if ($('news_permalink_datename')) {
        news_permalink_onclick();
    }
    if ($('news_morearticles_details')) {
        news_morearticles_init();
    }
    if ($('news_ajaxedit_details')) {
        news_ajaxedit_init();
    }
    if ($('news_notifyonpending_details')) {
        news_notifyonpending_init();
    }
    if ($('news_pdflink_details')) {
        news_pdflink_init();
    }
}

function news_ajaxedit_init()
{
    if ($('news_enableajaxedit').checked == false) {
        $('news_ajaxedit_details').hide();
    }
    Event.observe('news_enableajaxedit', 'change', news_ajaxedit_onchange);
}
function news_ajaxedit_onchange()
{
    switchdisplaystate('news_ajaxedit_details');
}

function news_morearticles_init()
{
    if ($('news_enablemorearticlesincat').checked == false) {
        $('news_morearticles_details').hide();
    }
    Event.observe('news_enablemorearticlesincat', 'change', news_morearticles_onchange);
}
function news_morearticles_onchange()
{
    switchdisplaystate('news_morearticles_details');
}

function news_notifyonpending_init()
{
    if ($('news_notifyonpending').checked == false) {
        $('news_notifyonpending_details').hide();
    }
    Event.observe('news_notifyonpending', 'change', news_notifyonpending_onchange);
}
function news_notifyonpending_onchange()
{
    switchdisplaystate('news_notifyonpending_details');
}

function news_pdflink_init()
{
    if ($('news_pdflink').checked == false) {
        $('news_pdflink_details').hide();
    }
    Event.observe('news_pdflink', 'change', news_pdflink_onchange);
}
function news_pdflink_onchange()
{
    switchdisplaystate('news_pdflink_details');
}

function news_permalink_onclick()
{
    var news_permalink_datename = $('news_permalink_datename')
    var news_permalink_numeric = $('news_permalink_numeric')
    var news_permalink_custom = $('news_permalink_custom')
    var news_permalink_format = $('news_permalink_format')
    var news_permalink_customformat = $('news_permalink_customformat')

    if ( news_permalink_datename.checked == true) {
        news_permalink_format.value = news_permalink_datename.value;
        news_permalink_format.disabled = true
    } else if ( news_permalink_numeric.checked == true) {
        news_permalink_format.value = news_permalink_numeric.value;
        news_permalink_format.disabled = true
    } else {
        news_permalink_format.value = news_permalink_customformat.value;
        news_permalink_format.disabled = false
    }
}
