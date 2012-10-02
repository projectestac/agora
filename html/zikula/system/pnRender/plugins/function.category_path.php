<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.category_path.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Available parameters:
 *   - assign:      If set, the results are assigned to the corresponding variable instead of printed out
 *   - id:          category ID
 *   - idcolumn:    other field to use as ID (default: id)
 *   - field:       category field to return (default: path)
 *   - html:        return HTML? (default: false)
 *
 * Example:
 * <!--[category_path cid='1' assign='category']-->
 * "get the path of category #1 and assign it to $category"
 * 
 * Example from a Content module template:
 * <!--[category_path id=$page.categoryId field='sort_value' assign='catsortvalue']-->
 * "get the sort value of the current page's category and assign it to $catsortvalue"
 *
 */
function smarty_function_category_path($params, &$smarty)
{
    $assign    = isset($params['assign'])   ? $params['assign']   : null;
    $id        = isset($params['id'])       ? $params['id']       : 0;
    $idcolumn  = isset($params['idcolumn']) ? $params['idcolumn'] : 'id';
    $field     = isset($params['field'])    ? $params['field']    : 'path';
    $html      = isset($params['html'])     ? $params['html']     : false;

    if (!$id) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('category_path', 'id')));
    }

    if (!$field) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('category_path', 'field')));
    }

    Loader::loadClass('CategoryUtil');

    $result = null;
    if (is_numeric($id)) {
        $cat = CategoryUtil::getCategoryByID($id);
    } else {
        $cat = CategoryUtil::getCategoryByPath($id, $field);
    }

    if ($cat) {
        if (isset($cat[$field])) {
            $result = $cat[$field];
        } else {
            $smarty->trigger_error(__f('Error! Category [%1$s] does not have the field [%2$s] set.', array($id, $field)));
            return;
        }
    } else {
        $smarty->trigger_error(__f('Error! Cannot retrieve category with ID %s.', DataUtil::formatForDisplay($id)));
        return;
    }

    if ($assign) {
        $smarty->assign($params['assign'], $result);
    } else {
        if (isset($html) && is_bool($html) && $html) {
            return DataUtil::formatForDisplayHTML($result);
        } else {
            return DataUtil::formatForDisplay($result);
        }
    }
}
