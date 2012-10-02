<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.makepercentbar.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * Smarty function to display a percentage bar
 *
 * Example
 * <!--[makepercentbar percent=$browsers.msie.1 label="`$browsers.msie.1` %" width=200]-->
 *
 * @author       Mark West
 * @since        10/01/04
 * @see          function.makepercentbar.php::smarty_function_makepercentbar()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        real        $percent     percentage of var
 * @param        string      $label       text to display with bar
 * @param        int         $width       width to use as a scaling factor
 * @return       string      the results of the module function
 */
function smarty_function_makepercentbar($params, &$smarty)
{
    // load the pnimg plugin
    require_once $smarty->_get_plugin_filepath('function','pnimg');

    // round the percentage for a neater display
    $roundpercent = round(($params['width'] * ($params['percent'] /100)),0);

    // call the pnimg plugin to get the image tags
    $params = array('modname' => 'Stats', 'height' => 15, 'width' => 7, 'title' => $params['label'], 'alt' => $params['label'], 'src' => 'leftbar.gif');
    $imgtag = smarty_function_pnimg($params, $smarty);
    $params['src'] = 'mainbar.gif';
    $params['width'] = $roundpercent;
    $imgtag .= smarty_function_pnimg($params, $smarty);
    $params['src'] = 'rightbar.gif';
    $params['width'] = '7';
    $imgtag .= smarty_function_pnimg($params, $smarty);

    return $imgtag;
}
