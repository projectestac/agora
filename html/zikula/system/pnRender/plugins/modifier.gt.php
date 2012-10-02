<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.gt.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to parse gettext string
 *
 *
 * Example
 *
 *   <!--[$var|gt:$renderObject]-->
 *
 * @param        string   $string   the contents to transform
 * @param        object   $smarty   this smarty object (available as $renderObject in templates)
 * @return       string   the modified output
 */
function smarty_modifier_gt($string, &$smarty)
{
    if (!is_object($smarty)) {
        return __('Error! With modifier_gt, you must use the following form for the gettext modifier (\'gt\'): $var|gt:$renderObject.');
    }

    // the check order here is important because:
    // if we are calling from a theme both $smarty->themeDomain and $smarty->renderDomain are set.
    // if the call was from a template only $smarty->renderDomain is set.
    if (isset($smarty->renderDomain) && !isset($smarty->themeDomain)) {
        $domain = $smarty->renderDomain;
    } elseif (isset($smarty->themeDomain)) {
        $domain = $smarty->themeDomain;
    } else {
        $domain = 'zikula'; // default domain
    }

    return __($string, $domain);
}
