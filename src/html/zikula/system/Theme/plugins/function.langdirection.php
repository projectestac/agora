<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.lang.php 26252 2009-08-19 15:12:07Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the language direction
 *
 * Example
 * <html dir="<!--[langdirection]-->">
 *
 * @author   Drak
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the language direction
 */
function smarty_function_langdirection($params, &$smarty)
{
    return ZLanguage::getDirection();
}
