<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnversion.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the site's charset
 *
 * This function will return the Zikula version number
 *
 * available parameters:
 *  - assign      if set, the language will be assigned to this variable
 *
 * @author   J�rg Napp
 * @since    03. Feb. 04
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the version string
 */
function smarty_function_pnversion($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign'] : null;

    $return = PN_VERSION_NUM;

    if ($assign) {
        $smarty->assign($assign, $return);
    } else {
        return $return;
    }
}
