<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.dateformat.php 27946 2009-12-20 13:53:15Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * DateFormat
 *
 * @author	   Robert Gasch
 * @version    $Id: function.dateformat.php 27946 2009-12-20 13:53:15Z mateo $
 * @param	   format          The date format we wish to convert to (optional) (default='Y-m-d')
 * @param	   datetime        The datetime we wish to convert
 * @param	   assign          The smarty variable we wish to assign the result to (optional)
 */
function smarty_function_dateformat($params, &$smarty)
{
    if (!isset($params['datetime'])) {
        $params['datetime'] = null;
    }

    if (!isset($params['format']) || empty($params['format'])) {
        $params['format'] = null;
    }

    $res = DateUtil::getDatetime($params['datetime'], $params['format']);

    if (isset($params['assign']) && $params['assign']) {
        $smarty->assign($params['assign'], $res);
    } else {
        return $res;
    }
}
