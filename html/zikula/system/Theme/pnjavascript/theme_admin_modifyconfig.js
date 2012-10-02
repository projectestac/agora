Event.observe(window, 'load', theme_modifyconfig_init, false);

function theme_modifyconfig_init()
{
    Event.observe('enablecache', 'change', theme_enablecache_onchange, false);
    Event.observe('cssjscombine', 'change', combinecssjs_onchange, false);
    Event.observe('cssjsminify', 'change', minifycssjs_onchange, false);
    if (!$('enablecache').checked) {
        $('theme_caching').hide();
    }
    if (!$('cssjscombine').checked) {
        $('theme_cssjscombine').hide();
    }
    if (!$('cssjsminify').checked) {
        $('theme_cssjsminify').hide();
    }
}

function theme_enablecache_onchange()
{
    checkboxswitchdisplaystate('enablecache', 'theme_caching', true);
}

function combinecssjs_onchange()
{
    checkboxswitchdisplaystate('cssjscombine', 'theme_cssjscombine', true);
}

function minifycssjs_onchange()
{
    checkboxswitchdisplaystate('cssjsminify', 'theme_cssjsminify', true);
}

