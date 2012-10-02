<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.getlanguagename.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to retrieve a language name from its l2 code
 *
 * Example
 *
 *   <!--[$language|getlanguagename]-->
 *
 * @param        string   $langcode   the language to process
 * @return       string   the language name
 */
function smarty_modifier_getlanguagename($langcode)
{
    return ZLanguage::getLanguageName($langcode);
}