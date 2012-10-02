<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.charset.php 26252 2009-08-19 15:12:07Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the site's charset
 *
 * available parameters:
 *  - assign      if set, the language will be assigned to this variable
 *
 * Example
 * <meta http-equiv="Content-Type" content="text/html; charset=<!--[charset]-->">
 *
 * @author   J�rg Napp
 * @since    03. Feb. 04
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the charset
 */
function smarty_function_charset($params, &$smarty)
{
    $return = ZLanguage::getEncoding();

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $return);
    } else {
        return $return;
    }
}
