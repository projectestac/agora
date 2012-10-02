<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.assignedcategorieslist.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to return the html code for opentable() located in theme.php.
 *
 * @author Mark West
 * @since 24/06/08
 * @param array $params All attributes passed to this function from the template
 * @param  object &$smarty Reference to the Smarty object
 * @return string  the html code for opentable() located in theme.php
 */
function smarty_function_assignedcategorieslist($params, &$smarty)
{
    if (!isset($params['item'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('assignedcategorieslist', 'item')));
        return false;
    }

    $lang = ZLanguage::getLanguageCode();

    $result = "<ul>\n";
    if (!empty($params['item']['__CATEGORIES__'])) {
        foreach ($params['item']['__CATEGORIES__'] as $category) {
            $result .= "<li>\n";
            if (isset($category['display_name'][$lang])) {
                $result .= $category['display_name'][$lang];
            } else {
                $result .= $category['name'];
            }
            $result .= "</li>\n";
        }
    } else {
        $result .= '<li>' . DataUtil::formatForDisplay(__('No assigned categories.')) . '</li>';
    }
    $result .= "</ul>\n";

    return $result;
}
