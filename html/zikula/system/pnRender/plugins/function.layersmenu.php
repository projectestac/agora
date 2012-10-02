<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.layersmenu.php 28219 2010-02-06 23:51:33Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
  load the relevant library files
  */
require_once 'javascript/phplayersmenu/lib/PHPLIB.php';
require_once 'javascript/phplayersmenu/lib/layersmenu-common.inc.php';
require_once 'javascript/phplayersmenu/lib/layersmenu.inc.php';

/**
 * Smarty function to include the relevant files for the phpLayersMenu and pass a previously generated menu string to phpLayersMenu
 * 
 * @author       Robert gasch
 * @since        01/11/2004
 * @see          
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the results of the module function
 */
function smarty_function_layersmenu ($params, &$smarty) 
{
    $menuString = isset($params['menuString']) ? $params['menuString'] : '';
    $cssFile    = isset($params['cssFile'])    ? $params['cssFile']    : '';

    $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName(pnUserGetTheme()));
    $themedir  = DataUtil::formatForOS($themeinfo['directory']);

    PageUtil::addVar('stylesheet', 'javascript/phplayersmenu/layersmenu-demo.css');
    if ($cssFile) {
        PageUtil::addVar('stylesheet', $cssFile);
    } elseif (file_exists("$themedir/style/layersmenu.php")) {
        PageUtil::addVar('stylesheet', "$themedir/style/layersmenu.css");
    } else {
        PageUtil::addVar('stylesheet', 'javascript/phplayersmenu/layersmenu-v4b.css');
    }
    PageUtil::addVar('javascript', 'javascript/phplayersmenu/libjs/layersmenu-browser_detection.js');
    PageUtil::addVar('javascript', 'javascript/phplayersmenu/libjs/layersmenu-library.js');
    PageUtil::addVar('javascript', 'javascript/phplayersmenu/libjs/layersmenu.js');

    $mid = new LayersMenu ();
    $mid->setDirroot('javascript/phplayersmenu/');
    $mid->setImgdir('javascript/phplayersmenu/images/');
    $mid->setImgwww('javascript/phplayersmenu/images/');
    $mid->setIcondir('images/icons/extrasmall/');
    $mid->setIconwww('images/icons/extrasmall/');
    $mid->setIconsize(16, 16);
    $mid->setMenuStructureString ($menuString);
    $mid->parseStructureForMenu ('hormenu1');
    $mid->newHorizontalMenu ('hormenu1');
    $output  = $mid->makeHeader ();
    $output .= $mid->getMenu ('hormenu1');
    $output .= $mid->makeFooter('hormenu1');

    return $output;
}
