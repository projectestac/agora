<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnsearchapi.php 652 2009-12-20 18:25:42Z mateo $
 * @license See license.txt
 */

/**
 * Search plugin info
 **/
function EZComments_searchapi_info()
{
    return array('title'     => 'EZComments',
                 'functions' => array('EZComments' => 'search'));
}

/**
 * search_ezcomments_options()
 *
 * This function will be called to display the search box.
 *
 * @return output the search field
 **/
function EZComments_searchapi_options($args)
{
    if (SecurityUtil::checkPermission('EZComments::', '::', ACCESS_READ)) {
        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $render = & pnRender::getInstance('EZComments');
        $render->assign('active', !isset($args['active']) || isset($args['active']['EZComments']));
        return $render->fetch('ezcomments_search_form.htm');
    }

    return '';
}

/**
 * search_ezcomments()
 *
 * do the actual search and display the results
 *
 * @return output the search results
 **/
function EZComments_searchapi_search($args)
{
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_READ)) {
        return true;
    }

    $dom = ZLanguage::getModuleDomain('EZComments');

    if (strlen($args['q']) < 3 || strlen($args['q']) > 30) {
        return LogUtil::registerStatus(__f('The comments can only be searched for words that are longer than %1$s and less than %2$s characters!', array($minlen, $maxlen), $dom));
    }

    pnModDBInfoLoad('Search');

    $pntable = pnDBGetTables();
    // ezcomments tables
    $ezcommentstable  = $pntable['EZComments'];
    $ezcommentscolumn = $pntable['EZComments_column'];
    // our own tables
    $searchTable  = $pntable['search_result'];
    $searchColumn = $pntable['search_result_column'];
    // where
    $where  = search_construct_where($args, array($ezcommentscolumn['subject'], $ezcommentscolumn['comment']));
    $where .= " AND " . $ezcommentscolumn['url'] . " != ''";
    $sessionId = session_id();

    $insertSql = "INSERT INTO $searchTable
          ($searchColumn[title],
           $searchColumn[text],
           $searchColumn[extra],
           $searchColumn[module],
           $searchColumn[created],
           $searchColumn[session])
        VALUES
        ";

    $comments = DBUtil::selectObjectArray('EZComments', $where);

    foreach ($comments as $comment) {
        $sql = $insertSql . '(' . '\'' . DataUtil::formatForStore($comment['subject']) . '\', ' . '\'' . DataUtil::formatForStore($comment['comment']) . '\', ' . '\'' . DataUtil::formatForStore($comment['url']) . '\', ' . '\'' . 'EZComments' . '\', ' . '\'' . DataUtil::formatForStore($comment['date']) . '\', ' . '\'' . DataUtil::formatForStore($sessionId) . '\')';
        $insertResult = DBUtil::executeSQL($sql);
        if (!$insertResult) {
            return LogUtil::registerError(__('Error! Could not load items.', $dom));
        }
    }

    return true;
}

/**
 * Do last minute access checking and assign URL to items
 *
 * Access checking is ignored since access check has
 * already been done. But we do add a URL to the found comment
 */
function EZComments_searchapi_search_check(&$args)
{
    $datarow = &$args['datarow'];
    $url     = $datarow['extra'];
    $datarow['url'] = $url;
    return true;
}
