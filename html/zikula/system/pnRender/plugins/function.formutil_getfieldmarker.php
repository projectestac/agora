<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.formutil_getfieldmarker.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - field:    The field for which we wish to get the field marker
 *   - validationErrors: the validation errors
 *
 * @author	   Robert Gasch
 * @version    $Id: function.formutil_getfieldmarker.php 27274 2009-10-30 13:49:20Z mateo $
 */ 
function smarty_function_formutil_getfieldmarker($params, &$smarty)
{
    // allow empty validation info -> return nothing
    if (!isset($params['validation'])) {
        return '';
    }

    $marker = FormUtil::getFieldMarker($params['objectType'], $params['validation'], $params['field']);

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $marker);
    } else {
        return $marker;
    }
}
