<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.html_select_languages.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a drop down list of languages
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - name:     Name for the control
 *   - id:       ID for the control
 *   - selected: Selected value
 *   - installed: if set only show languages existing in languages folder
 *   - all:      show dummy entry '_ALL' on top of the list with empty value
 *
 * Example
 *   <!--[html_select_languages name=language selected=eng]-->
 *
 *
 * @author       Mark West
 * @since        25 April 2004
 * @deprecated smarty_function_html_select_locales()
 * @see
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_html_select_languages($params, &$smarty)
{
    if (!isset($params['name']) || empty($params['name'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('html_select_languages', 'name')));
        return false;
    }

    require_once $smarty->_get_plugin_filepath('function','html_options');

    if (isset($params['all']) && $params['all']) {
        $values[] = '';
        $output[]= DataUtil::formatForDisplay(__('All'));
    }

    if (isset($params['installed']) && $params['installed']) {
        $languagelist = ZLanguage::getInstalledLanguageNames();
    } else {
        $languagelist = ZLanguage::languageMap();
    }

    $output = array_merge($output, DataUtil::formatForDisplay(array_values($languagelist)));
    $values = array_merge($values, DataUtil::formatForDisplay(array_keys($languagelist)));

    $html_result = smarty_function_html_options(array('output'       => $output,
                                                      'values'       => $values,
                                                      'selected'     => isset($params['selected']) ? $params['selected'] : null,
                                                      'id'           => isset($params['id']) ? $params['id'] : null,
                                                      'name'         => $params['name']),
                                                $smarty);

    if (isset($params['assign']) && !empty($params['assign'])) {
        $smarty->assign($params['assign'], $html_result);
    } else {
        return $html_result;
    }
}
