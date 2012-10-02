<?php
/**
 * Initial focus plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformsetinitialfocus.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to set the initial focus for a form
 *
 * Usage:
 * <code>
 * <!--[pnformsetinitialfocus inputId=PluginId]-->
 * </code>
 * The "PluginId" refers to the plugin that should have focus initially.
 */
function smarty_function_pnformsetinitialfocus($params, &$render)
{
    if (!isset($params['inputId']))
    {
        $render->trigger_error('initialFocus: inputId parameter required');
        return false;
    }

    $doSelect = (isset($params['doSelect']) ? $params['doSelect'] : false);
    $id = $params['inputId'];

    if ($doSelect) {
        $selectHtml = 'inp.select();';
    } else {
        $selectHtml = '';
    }

    // FIXME: part of PN???
    $html = "
<script type=\"text/javascript\">
var bodyElement = document.getElementsByTagName('body')[0];
var f = function() {
  var inp = document.getElementById('$id');
  if (inp != null)
  {
    inp.focus();
    $selectHtml
  }
};
var oldF = window.onload;
window.onload = function() { f(); if (oldF) oldF(); };
</script>";

    return $html;
}
