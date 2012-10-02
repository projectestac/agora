<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pngetstatusmsg.php 27261 2009-10-29 15:33:00Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to obtain status message
 *
 * This function obtains the last status message posted for this session.
 * The status message exists in one of two session variables: '_PNStatusMsg' for a
 * status message, or '_PNErrorMsg' for an error message. If both a status and an
 * error message exists then the error message is returned.
 *
 * This is is a destructive function - it deletes the two session variables
 * '_PNStatusMsg' and 'erorrmsg' during its operation.
 *
 * Note that you must not cache the outputs from this function, as its results
 * change aech time it is called. The Zikula developers are looking for ways to
 * automise this.
 *
 *
 * Available parameters:
 *   - assign:   If set, the status message is assigned to the corresponding variable instead of printed out
 *   - style, class: If set, the status message is being put in a div tag with the respective attributes
 *   - tag:      You can specify if you would like a span or a div tag
 *
 * Example
 *   <!--[pngetstatusmsg|pnvarprephtmldisplay]-->
 *   <!--[pngetstatusmsg style="color:red;" |pnvarprephtmldisplay]-->
 *   <!--[pngetstatusmsg class="statusmessage" tag="span"|pnvarprephtmldisplay]-->
 *
 *
 * @author       Jörg Napp
 * @since        16. Sept. 2003
 * @todo         prevent this function from being cached (Smarty 2.6.0)
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 * @deprecated
 */
function smarty_function_pngetstatusmsg($params, &$smarty)
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
