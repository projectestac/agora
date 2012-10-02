<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.formutil_getvalidationerror.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - field:    The name of the field for which we wish to get the erorr
 *   - indent:   Wether or not to indent the validation error
 *
 * @author	   Robert Gasch
 * @version    $Id: function.formutil_getvalidationerror.php 27274 2009-10-30 13:49:20Z mateo $
 */ 
function smarty_function_formutil_getvalidationerror($params, &$smarty)
{
    $error = FormUtil::getValidationError($params['objectType'], $params['field']);

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $error);
    } else {
        return $error;
    }
}
