<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnsearchapi.php 411 2010-04-23 16:02:49Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */

/**
 * Internal callback class used to check permissions to each Page
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */
class pages_result_checker
{
    var $enablecategorization;

    function Pages_result_checker()
    {
        $this->enablecategorization = pnModGetVar('Pages', 'enablecategorization');
    }

    // This method is called by DBUtil::selectObjectArrayFilter() for each and every search result.
    // A return value of true means "keep result" - false means "discard".
    function checkResult(&$item)
    {
        $ok = SecurityUtil::checkPermission('Pages::', "$item[title]::$item[pageid]", ACCESS_OVERVIEW);
        if ($this->enablecategorization)
        {
            ObjectUtil::expandObjectWithCategories($item, 'pages', 'pageid');
            $ok = $ok && CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'Pages');
        }
        return $ok;
    }
}

/**
 * Search plugin info
 */
function Pages_searchapi_info()
{
    return array('title' => 'Pages', 
                 'functions' => array('pages' => 'search'));
}

/**
 * Search form component
 */
function Pages_searchapi_options($args)
{
    if (SecurityUtil::checkPermission('Pages::', '::', ACCESS_READ)) {
        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $render = & pnRender::getInstance('Pages');
        $render->assign('active', !isset($args['active']) || isset($args['active']['Pages']));
        return $render->fetch('pages_search_options.htm');
    }

    return '';
}

/**
 * Search plugin main function
 */
function Pages_searchapi_search($args)
{
    $dom = ZLanguage::getModuleDomain('Pages');

    pnModDBInfoLoad('Search');
    $pntable = pnDBGetTables();
    $pagestable = $pntable['pages'];
    $pagescolumn = $pntable['pages_column'];
    $searchTable = $pntable['search_result'];
    $searchColumn = $pntable['search_result_column'];

    $where = search_construct_where($args, 
                                    array($pagescolumn['title'], 
                                          $pagescolumn['content']), 
                                    null);

    $sessionId = session_id();

/*
    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Pages',
                              'component_right' => 'Page',
                              'instance_left'   => 'title',
                              'instance_right'  => 'pageid',
                              'level'           => ACCESS_READ));
*/

    // get the objects from the db
    $permChecker = new pages_result_checker();
    $objArray = DBUtil::selectObjectArrayFilter('pages', $where, 'pageid', 1, -1, '', $permChecker);
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load any page.', $dom));
    }

    $addcategorytitletopermalink = pnModGetVar('Pages', 'addcategorytitletopermalink');

    $insertSql = 
"INSERT INTO $searchTable
  ($searchColumn[title],
   $searchColumn[text],
   $searchColumn[extra],
   $searchColumn[created],
   $searchColumn[module],
   $searchColumn[session])
VALUES ";

    // Process the result set and insert into search result table
    foreach ($objArray as $obj) {
        if ($addcategorytitletopermalink) {
            $extra = serialize(array('pageid' => $obj['pageid'], 'cat' => isset($obj['__CATEGORIES__']['Main']['name']) ? $obj['__CATEGORIES__']['Main']['name'] : null));
        } else {
            $extra = serialize(array('pageid' => $obj['pageid']));
        }
        $sql = $insertSql . '(' 
                   . '\'' . DataUtil::formatForStore($obj['title']) . '\', '
                   . '\'' . DataUtil::formatForStore($obj['content']) . '\', '
                   . '\'' . DataUtil::formatForStore($extra) . '\', '
                   . '\'' . DataUtil::formatForStore($obj['cr_date']) . '\', '
                   . '\'' . 'Pages' . '\', '
                   . '\'' . DataUtil::formatForStore($sessionId) . '\')';
        $insertResult = DBUtil::executeSQL($sql);
        if (!$insertResult) {
                return LogUtil::registerError(__('Error! Could not load any page.', $dom));
        }
    }

    return true;
}

/**
 * Do last minute access checking and assign URL to items
 *
 * Access checking is ignored since access check has
 * already been done. But we do add a URL to the found item
 */
function Pages_searchapi_search_check(&$args)
{
    $datarow = &$args['datarow'];
    $extra   = unserialize($datarow['extra']);

    $datarow['url'] = pnModUrl('pages', 'user', 'display',
                               array('pageid' => $extra['pageid'],
                                     'cat'    => $extra['cat']));

    return true;
}
