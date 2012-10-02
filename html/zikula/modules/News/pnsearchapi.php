<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnsearchapi.php 75 2009-02-24 04:51:52Z mateo $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

/**
 * Search plugin info
 **/
function news_searchapi_info()
{
    return array('title' => 'News', 
                 'functions' => array('News' => 'search'));
}

/**
 * Search form component
 **/
function news_searchapi_options($args)
{
    if (SecurityUtil::checkPermission('News::', '::', ACCESS_READ) ||
        SecurityUtil::checkPermission('Stories::Story', '::', ACCESS_READ)) {
        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $render = & pnRender::getInstance('News');
        $render->assign('active', (isset($args['active']) && isset($args['active']['News'])) || (!isset($args['active'])));
        return $render->fetch('news_search_options.htm');
    }

    return '';
}

/**
 * Search plugin main function
 **/
function news_searchapi_search($args)
{
    if (!(SecurityUtil::checkPermission('News::', '::', ACCESS_READ) ||
          SecurityUtil::checkPermission('Stories::Story', '::', ACCESS_READ))) {
        return true;
    }

    pnModDBInfoLoad('Search');
    $tables = pnDBGetTables();
    $newsTable  = $tables['news'];
    $newsColumn = $tables['news_column'];
    $searchTable   = $tables['search_result'];
    $searchColumn  = $tables['search_result_column'];

    $where = search_construct_where($args, 
                                    array($newsColumn['title'], 
                                          $newsColumn['hometext'], 
                                          $newsColumn['bodytext']), 
                                          $newsColumn['language']);
    // Only search in published articles that are currently visible
    $where .= " AND ($newsColumn[published_status] = '0')";
    $date = DateUtil::getDatetime();
    $where .= " AND ('$date' >= $newsColumn[from] AND ($newsColumn[to] IS NULL OR '$date' <= $newsColumn[to]))";

    $sessionId = session_id();

    $insertSql = 
"INSERT INTO $searchTable
  ($searchColumn[title],
   $searchColumn[text],
   $searchColumn[extra],
   $searchColumn[module],
   $searchColumn[created],
   $searchColumn[session])
VALUES ";

    pnModAPILoad('News', 'user');

    $permChecker = new news_result_checker();
    $articles = DBUtil::selectObjectArrayFilter('news', $where, null, null, null, '', $permChecker, null);

    foreach ($articles as $article)
    {
          $sql = $insertSql . '(' 
                 . '\'' . DataUtil::formatForStore($article['title']) . '\', '
                 . '\'' . DataUtil::formatForStore($article['hometext']) . '\', '
                 . '\'' . DataUtil::formatForStore($article['sid']) . '\', '
                 . '\'' . 'News' . '\', '
                 . '\'' . DataUtil::formatForStore($article['from']) . '\', '
                 . '\'' . DataUtil::formatForStore($sessionId) . '\')';
          $insertResult = DBUtil::executeSQL($sql);
          if (!$insertResult) {
              return LogUtil::registerError(__('Error! Could not load any articles.', $dom));
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
function news_searchapi_search_check(&$args)
{
    $datarow = &$args['datarow'];
    $storyId = $datarow['extra'];

    $datarow['url'] = pnModUrl('News', 'user', 'display', array('sid' => $storyId));

    return true;
}
