<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: resource.pagesvar.php 411 2010-04-23 16:02:49Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */

/**
* Smarty plugin
* -------------------------------------------------------------
* Type:     resource
* Purpose:  fetches template from a global variable
* Version:  1.0 [Sep 28, 2002 boots since Sep 28, 2002 boots]
* -------------------------------------------------------------
*/
function smarty_resource_pagesvar_source($tpl_name, &$tpl_source, &$smarty)
{
    if (isset($tpl_name)) {
         $tpl_source = $GLOBALS[$tpl_name];
          return true;
    }
       return false;
}

function smarty_resource_pagesvar_timestamp($tpl_name, $tpl_timestamp, &$smarty)
{
       if (isset($tpl_name)) {
          $tpl_timestamp = microtime();
          return true;
    }
       return false;
}

function smarty_resource_pagesvar_secure($tpl_name, &$smarty)
{
    // assume all templates are secure
    return true;
}

function smarty_resource_pagesvar_trusted($tpl_name, &$smarty)
{
    // not used for templates
}
