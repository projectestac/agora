<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: pnsearchapi.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Search plugin info
 **/
function Web_Links_searchapi_info()
{
    return array('title' => 'Web_Links',
                 'functions' => array('Web_Links' => 'search'));
}

/**
 * Search form component
 **/
function Web_Links_searchapi_options($args)
{
    if (SecurityUtil::checkPermission( 'Web_Links::Link', '::', ACCESS_READ)) {
        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $pnRender = pnRender::getInstance('Web_Links');
        $pnRender->assign('active',(isset($args['active'])&&isset($args['active']['Web_Links']))||(!isset($args['active'])));
        return $pnRender->fetch('weblinks_search_options.htm');
    }

    return '';
}

/**
 * Search plugin main function
 **/
function Web_Links_searchapi_search($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    if (!SecurityUtil::checkPermission( 'Web_Links::Link', '::', ACCESS_READ)) {
        return true;
    }

    pnModDBInfoLoad('Search');
    $pntable = pnDBGetTables();
    $linkstable = $pntable['links_links'];
    $linkscolumn = $pntable['links_links_column'];
    $searchTable = $pntable['search_result'];
    $searchColumn = $pntable['search_result_column'];

    $where = search_construct_where($args,
                                    array($linkscolumn['title'],
                                          $linkscolumn['description']),
                                          null);

    $sessionId = session_id();

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Link',
                              'instance_left'   => 'lid',
                              'instance_right'  => '',
                              'level'           => ACCESS_READ));

    // get the result set
    $links = DBUtil::selectObjectArray('links_links', $where, 'lid', 1, -1, '', $permFilter);
    if ($links === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    $insertSql = "INSERT INTO $searchTable ($searchColumn[title],
                                            $searchColumn[text],
                                            $searchColumn[extra],
                                            $searchColumn[module],
                                            $searchColumn[created],
                                            $searchColumn[session]) VALUES ";

    foreach ($links as $link)
    {
          $sql = $insertSql . '('
                 . '\'' . DataUtil::formatForStore($link['title']) . '\', '
                 . '\'' . DataUtil::formatForStore($link['description']) . '\', '
                 . '\'' . DataUtil::formatForStore($link['lid']) . '\', '
                 . '\'' . 'Web_Links' . '\', '
                 . '\'' . DataUtil::formatForStore($link['date']) . '\', '
                 . '\'' . DataUtil::formatForStore($sessionId) . '\')';
          $insertResult = DBUtil::executeSQL($sql);
          if (!$insertResult) {
              return LogUtil::registerError (__('Error! Could not load items.', $dom));
          }
    }

    return true;
}


/**
 * Do last minute access checking and assign URL to items
 *
 * Access checking is ignored since access check has
 * already been done. But we do add a URL to the found user
 */
function Web_Links_searchapi_search_check(&$args)
{
    $datarow = &$args['datarow'];
    $linkId = $datarow['extra'];

    $datarow['url'] = pnModUrl('Web_Links', 'user', 'visit', array('lid' => $linkId));

    return true;
}

