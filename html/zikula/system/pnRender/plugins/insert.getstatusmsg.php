<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: insert.getstatusmsg.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty insert function to dynamically get current status/error message
 *
 * This function obtains the last status message posted for this session.
 * The status message exists in one of two session variables: '_PNStatusMsg' for a
 * status message, or '_PNErrorMsg' for an error message. If both a status and an
 * error message exists then the error message is returned.
 *
 * This is is a destructive function - it deletes the two session variables
 * '_PNStatusMsg' and 'erorrmsg' during its operation.
 *
 * Available parameters:
 *   - assign:   If set, the status message is assigned to the corresponding variable instead of printed out
 *   - style, class: If set, the status message is being put in a div tag with the respective attributes
 *   - tag:      You can specify if you would like a span or a div tag
 *
 * Example
 *   <!--[insert name="getstatusmsg"]-->
 *   <!--[insert name="getstatusmsg" style="color:red;"]-->
 *   <!--[insert name="getstatusmsg" class="statusmessage" tag="span"]-->
 *
 * @param $params
 * @param $smarty
 * @return string
 */
function smarty_insert_getstatusmsg($params, &$smarty)
{
    $assign = isset($params['assign'])  ? $params['assign']  : null;
    $class  = isset($params['class'])   ? $params['class']   : null;
    $style  = isset($params['style'])   ? $params['style']   : null;
    $tag    = isset($params['tag'])     ? $params['tag']     : null;

    //prepare output var
    $output = '';

    // $msgStatus = pnGetStatusMsg();
    // we do not use pnGetStatusMsg() because we need to know if we have to
    // show a status or an error
    $msgStatus = SessionUtil::getVar('_PNStatusMsg');
    $msgtype   = ($class ? $class : 'z-statusmsg');
    SessionUtil::delVar('_PNStatusMsg');

    $msgError = SessionUtil::getVar('_PNErrorMsg');
    SessionUtil::delVar('_PNErrorMsg');
    // Error message overrides status message
    if (!empty($msgError)) {
        $msgStatus = $msgError;
        $msgtype   = ($class ? $class : 'z-errormsg');
    }

    if ($assign) {
        $smarty->assign($assign, $msgStatus);
        return;
    }

    if (empty($msgStatus) || count($msgStatus)==0) {
        return $output;
    }

    // some parameters have been set, so we build the complete tag
    if (!$tag || $tag != 'span') {
        $tag = 'div';
    }

    // need to build a proper error message from message array
    $output = '<' . $tag . ' class="' . $msgtype . '"';
    if ($style) {
        $output .= ' style="' . $style . '"';
    }

    $output .= '>';
    $output .= implode ('<hr />', $msgStatus);
    $output .= '</' . $tag . '>';

    return $output;
}

