<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.selector_user.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

function smarty_function_selector_user ($params, &$smarty)
{
    $field            = isset($params['field'])            ? $params['field']            : 'uid';
    $selectedValue    = isset($params['selectedValue'])    ? $params['selectedValue']    : 0;
    $defaultValue     = isset($params['defaultValue'])     ? $params['defaultValue']     : 0;
    $defaultText      = isset($params['defaultText'])      ? $params['defaultText']      : '';
    $allValue         = isset($params['allValue'])         ? $params['allValue']         : 0;
    $allText          = isset($params['allText'])          ? $params['allText']          : '';
    $gid              = isset($params['gid'])              ? $params['gid']              : '';
    $name             = isset($params['name'])             ? $params['name']             : 'defautlselectorname';
    $assign           = isset($params['assign'])           ? $params['assign']           : null;
    $submit           = isset($params['submit'])           ? $params['submit']           : false;
    $multipleSize     = isset($params['multipleSize'])     ? $params['multipleSize']     : 1;
    $disabled         = isset($params['disabled'])         ? $params['disabled']         : 0;

    Loader::loadClass('HtmlUtil');
    $html = HtmlUtil::getSelector_PNUser ($name, $gid, $selectedValue, $defaultValue, $defaultText, $allValue, $allText, '', $submit, $disabled, $multipleSize);

    if ($assign) {
        $smarty->assign($assign, $html);
    } else {
        return $html;
    }
}
