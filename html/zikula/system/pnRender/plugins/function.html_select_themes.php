<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.html_select_themes.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display a drop down list of themes
 *
 * Available parameters:
 *   - name:     Name for the control (optional) if not present then only the option tags are output
 *   - id:       ID for the control
 *   - selected: Selected value
 *   - filter:   Filter themes use (possible values: PNTHEME_FILTER_ALL (default) PNTHEME_FILTER_USER, PNTHEME_FILTER_SYSTEM, PNTHEME_FILTER_ADMIN
 *   - state:    Filter themes by state (possible values: PNTHEME_STATE_ALL (default), PNTHEME_STATE_ACTIVE, PNTHEME_STATE_INACTIVE
 *   - type:     Filter themes by type (possible values: PNTHEME_TYPE_ALL (default), PNTHEME_TYPE_LEGACY, PNTHEME_TYPE_XANTHIA2, PNTHEME_TYPE_XANTHIA3, PNTHEME_TYPE_AUTOTHEME
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Examples
 *
 *     <!--[html_select_themes name=mytheme selected=mythemechoice]-->
 *
 *     <select name="mytheme">
 *         <option value=""><!--[pnml name=_DEFAULT]--></option>
 *         <!--[html_select_themes selected=$mythemechoice]-->
 *     </select>
 *
 * @author       Mark West
 * @since        26 October 2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_html_select_themes($params, &$smarty)
{
    if (!isset($params['filter']) || !defined($params['filter'])) {
        $filter = PNTHEME_FILTER_ALL;
    } else {
        $filter = constant($params['filter']);
    }
    if (!isset($params['state']) || !defined($params['state'])) {
        $state = PNTHEME_STATE_ALL;
    } else {
        $state = constant($params['state']);
    }
    if (!isset($params['type']) || !defined($params['type'])) {
        $type = PNTHEME_TYPE_ALL;
    } else {
        $type = constant($params['type']);
    }

    $themelist = array();
    $themes = ThemeUtil::getAllThemes($filter, $state, $type);
    if (!empty($themes)) {
        foreach ($themes as $theme) {
            $themelist[$theme['name']] = $theme['displayname'];
        }
    }
    natcasesort($themelist);

    require_once $smarty->_get_plugin_filepath('function','html_options');
    $output = smarty_function_html_options(array('options'  => $themelist,
                                                 'selected' => isset($params['selected']) ? $params['selected'] : null,
                                                 'name'     => isset($params['name'])     ? $params['name']     : null,
                                                 'id'       => isset($params['id'])       ? $params['id']       : null),
                                                 $smarty);

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $output);
    } else {
        return $output;
    }
}
