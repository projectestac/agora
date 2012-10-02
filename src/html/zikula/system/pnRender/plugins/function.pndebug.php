<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pndebug.php 27300 2009-10-31 11:33:27Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a Zikula specific debug window
 *
 * This function shows a Zikula debug window if the user has sufficient access rights
 *
 * You need to have:
 * modulename::debug     .*     ACCESS_ADMIN
 * permission to see this.
 *
 *
 * Example
 *   <!--[ pndebug ]-->
 *
 *
 * @author       Frank Schummertz
 * @since        23/08/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $output      if html, show debug in rendered page, otherwise open popup window
 * @param        string      $template    specify different debug template, default pndebug.html,
 *                                        must be stored in pnRender/pntemplates
 * @return       string      debug output
 *
 * This plugin is basing on the original debug plugin written by Monte Ohrt <monte@ispi.net>
 */
function smarty_function_pndebug($params, &$smarty)
{
    $out = '';
    $thismodule = pnModGetName();
    if (SecurityUtil::checkPermission($thismodule.'::debug', '::', ACCESS_ADMIN))
    {
        if (isset($params['output']) && !empty($params['output'])) {
            $smarty->assign('_smarty_debug_output', $params['output']);
        }

        $modinfo = pnModGetInfo(pnModGetIDFromName('pnRender'));
        $modpath = ($modinfo['type'] == 3) ? 'system' : 'modules';
        $osmoddir = DataUtil::formatForOS($modinfo['directory']);

        $_template_dir_orig = $smarty->template_dir;
        $_default_resource_type_orig = $smarty->default_resource_type;

        $smarty->template_dir = "$modpath/$osmoddir/pntemplates";
        $smarty->default_resource_type = 'file';
        $smarty->_plugins['outputfilter'] = null;

        if (isset($params['template']) && !empty($params['template'])) {
            $debug_tpl = $smarty->template_dir . '/' . $params['template'];
            if (file_exists($debug_tpl) && is_readable($debug_tpl)) {
                $smarty->debug_tpl = $params['template'];
            }
        } else {
            $smarty->debug_tpl = 'pndebug.html';
        }

        if ($smarty->security && is_file($smarty->debug_tpl)) {
            $smarty->secure_dir[] = dirname(realpath($smarty->debug_tpl));
        }

        $_compile_id_orig = $smarty->_compile_id;
        $smarty->_compile_id = null;

        $_compile_path = $smarty->_get_compile_path($smarty->debug_tpl);
        if ($smarty->_compile_resource($smarty->debug_tpl, $_compile_path)) {
            ob_start();
            $smarty->_include($_compile_path);
            $out = ob_get_contents();
            ob_end_clean();
        }

        $smarty->_compile_id = $_compile_id_orig;
        $smarty->template_dir = $_template_dir_orig;
        $smarty->default_resource_type = $_default_resource_type_orig;
    }

    return $out;
}
