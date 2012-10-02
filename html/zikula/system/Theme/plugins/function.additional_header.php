<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.additional_header.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to add the additional header global into the page template
 *
 * NOTE: This plugin is now deprecated and doesn't produce any output. The
 * functionality offered by this plugin is automatically handled by the theme
 * engine.
 *
 * available parameters:
 *  - assign      if set, the language will be assigned to this variable
 *
 * @author   Jörg Napp
 * @since    03. Feb. 04
 * @deprecated
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   string   the charset
 */
function smarty_function_additional_header($params, &$smarty)
{
    return;
}
