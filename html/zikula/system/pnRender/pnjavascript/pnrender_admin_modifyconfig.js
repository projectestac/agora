Event.observe(window, 'load', pnrender_modifyconfig_init, false);

function pnrender_modifyconfig_init()
{
    Event.observe('cache', 'change', pnrender_lifetime_onchange, false);
    if (!$('cache').checked) {
        $('lifetime_container').hide();
    }
}

function pnrender_lifetime_onchange()
{
    checkboxswitchdisplaystate('cache', 'lifetime_container', true);
}

