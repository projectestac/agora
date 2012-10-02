<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnsearchapi.php 20234 2006-10-08 18:43:01Z  $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Users
*/

/**
 * Search plugin info
 **/
function Admin_Messages_searchapi_info()
{
    return array('title' =>'Admin_Messages',
                 'functions' => array('Admin_Messages' => 'search'));
}

/**
 * Search form component
 **/
function Admin_Messages_searchapi_options($args)
{
    if (SecurityUtil::checkPermission('Admin_Messages:search:', '::', ACCESS_READ)) {
        // Create output object
        $pnRender = & pnRender::getInstance('Admin_Messages');
        $pnRender->assign(pnModGetVar('Admin_Messages'));
        $pnRender->assign('active', (isset($args['active']) && isset($args['active']['Admin_Messages'])) || (!isset($args['active'])));
        $pnRender->assign('activeonly', (isset($args['modvar']) && isset($args['modvar']['Admin_Messages']) && isset($args['modvar']['Admin_Messages']['activeonly']))||!isset($args['modvar']));
        return $pnRender->fetch('admin_messages_search_options.htm');
    }

    return '';
}

/**
 * Get all admin messages items that match the criteria
 *
 * @author Mark West, Jorn Wildt
 * @param bool args['activeonly'] only show active items
 * @return bool true/false on success/failure
 */
function Admin_Messages_searchapi_search($args)
{
    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_READ)) {
        return true;
    }

    // get the db and table info
    pnModDBInfoLoad('Search');
    $pntable = pnDBGetTables();
    $messagestable = $pntable['message'];
    $messagescolumn = $pntable['message_column'];
    $searchTable = &$pntable['search_result'];
    $searchColumn = &$pntable['search_result_column'];

    // form the where clause
    $where = '';
    if (!pnModGetVar('Admin_Messages', 'allowsearchinactive') || (isset($args['activeonly']) && (bool)$args['activeonly'])){
        $where .= " $messagescolumn[active] = 1 AND ";
    }
    $where .= " ($messagescolumn[date]+$messagescolumn[expire] > '".time()."' OR $messagescolumn[expire] = 0) AND";
    $where .= search_construct_where($args, array($messagescolumn['title'], $messagescolumn['content']), $messagescolumn['language']);

    $sessionId = session_id();

    $sql = "
SELECT
   $messagescolumn[mid] as mid,
   $messagescolumn[title] as title,
   $messagescolumn[content] as text,
   $messagescolumn[date] as date
FROM $messagestable
WHERE $where";

    $result = DBUtil::executeSQL($sql);
    if (!$result) {
        return LogUtil::registerError(__('Error! Could not load data.'));
    }

    $insertSql =
"INSERT INTO $searchTable
  ($searchColumn[title],
   $searchColumn[text],
   $searchColumn[module],
   $searchColumn[created],
   $searchColumn[session])
VALUES ";


    // Process the result set and insert into search result table
    for (; !$result->EOF; $result->MoveNext()) {
        $message = $result->GetRowAssoc(2);
        if (SecurityUtil::checkPermission('Admin_Messages::', "$message[title]::$message[mid]", ACCESS_READ)) {
            $sql = $insertSql . '('
                   . '\'' . DataUtil::formatForStore($message['title']) . '\', '
                   . '\'' . DataUtil::formatForStore($message['text']) . '\', '
                   . '\'' . 'Admin_Messages' . '\', '
                   . '\'' . DataUtil::formatForStore(DateUtil::getDatetime($message['date'])) . '\', '
                   . '\'' . DataUtil::formatForStore($sessionId) . '\')';
            $insertResult = DBUtil::executeSQL($sql);
            if (!$insertResult) {
                return LogUtil::registerError(__('Error! Could not load data.'));
            }
        }
    }

    return true;
}


/**
 * Do last minute access checking and assign URL to items
 *
 * Both access checking and URL creation is ignored: access check has
 * already been done and there's no URL to the admin messages.
 */
function Admin_Messages_searchapi_search_check(&$args)
{
    // True = has access
    return true;
}

