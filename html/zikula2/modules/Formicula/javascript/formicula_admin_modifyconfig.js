/**
 * create the onload function to enable the respective functions
 *
 */
Event.observe(window, 'load', formicula_modifyconfig_init_check);

function formicula_modifyconfig_init_check() 
{
    if ($('formicula_spamcheck_details')) {
        formicula_spamcheck_init();
    }
    if ($('formicula_storedata_details')) {
        formicula_storedata_init();
    }
}

function formicula_spamcheck_init()
{
    if ($('spamcheck').checked == false) {
        $('formicula_spamcheck_details').hide();
    }
    $('spamcheck').observe('click', formicula_spamcheck_onchange);
}
function formicula_spamcheck_onchange()
{
    switchdisplaystate('formicula_spamcheck_details');
}

function formicula_storedata_init()
{
    if ($('store_data').checked == false) {
        $('formicula_storedata_details').hide();
    }
    $('store_data').observe('click', formicula_storedata_onchange);
}
function formicula_storedata_onchange()
{
    switchdisplaystate('formicula_storedata_details');
}