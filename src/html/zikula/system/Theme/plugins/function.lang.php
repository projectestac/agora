<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.lang.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the site's language
 *
 * available parameters:
 *  - assign      if set, the language will be assigned to this variable
 *
 * Example
 * <html lang="<!--[lang]-->">
 *
 * @author   J�rg Napp
 * @since    03. Feb. 04
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the language
 */
function smarty_function_lang($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign']  : null;
    $fs     = isset($params['fs']) ? $params['fs'] : false;

    $result = ($fs ? ZLanguage::transformFS(ZLanguage::getLanguageCode()) : ZLanguage::getLanguageCode());

    if ($assign) {
        $smarty->assign($assign, $result);
        return;
    }

    return $result;
}
