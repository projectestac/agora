<?php
/**
* Smarty plugin
* -------------------------------------------------------------
* Type:     resource
* Purpose:  fetches template from a global variable
* Version:  1.0 [Sep 28, 2002 boots since Sep 28, 2002 boots]
* -------------------------------------------------------------
*/
function smarty_resource_pagesvar_source($tplName, &$tplSource, &$smarty)
{
    if (isset($tplName)) {
        $tplSource = $GLOBALS[$tplName];

        return true;
    }

    return false;
}

function smarty_resource_pagesvar_timestamp($tplName, $tplTimestamp, &$smarty)
{
    if (isset($tplName)) {
       $tplTimestamp = microtime();

       return true;
    }

    return false;
}

function smarty_resource_pagesvar_secure($tpl_name, &$smarty)
{
    // assume all templates are secure
    return true;
}

function smarty_resource_pagesvar_trusted($tplName, &$smarty)
{
    // not used for templates
}