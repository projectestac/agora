<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnsearchapi.php 44 2009-12-20 07:38:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */

/**
 * Search plugin info
 **/
function faq_searchapi_info()
{
    return array('title' => 'FAQ',
                 'functions' => array('FAQ' => 'search'));
}

/**
 * Search form component
 **/
function faq_searchapi_options($args)
{
    if (SecurityUtil::checkPermission( 'FAQ::', '::', ACCESS_READ)) {
        $render = & pnRender::getInstance('FAQ');
        $render->assign('active',(isset($args['active'])&&isset($args['active']['FAQ']))||(!isset($args['active'])));
        return $render->fetch('faq_search_options.htm');
    }

    return '';
}

/**
 * Search plugin main function
 **/
function faq_searchapi_search($args)
{
    $dom = ZLanguage::getModuleDomain('FAQ');

    pnModDBInfoLoad('Search');

    $pntable      = &pnDBGetTables();
    $faqcolumn    = $pntable['faqanswer_column'];
    $searchTable  = $pntable['search_result'];
    $searchColumn = $pntable['search_result_column'];

    $where = search_construct_where($args,
                                    array($faqcolumn['question'],
                                          $faqcolumn['answer']),
                                    null);

    $sessionId = session_id();

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'FAQ',
                              'instance_left'  => 'faqid',
                              'instance_right' => '',
                              'level'          => ACCESS_READ));

    // get the result set
    $objArray = DBUtil::selectObjectArray('faqanswer', $where, 'faqid', 1, -1, '', $permFilter);
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }

    $addcategorytitletopermalink = pnModGetVar('FAQ', 'addcategorytitletopermalink');

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
            $extra = serialize(array('faqid' => $obj['faqid'], 'cat' => isset($obj['__CATEGORIES__']['Main']['name']) ? $obj['__CATEGORIES__']['Main']['name'] : null));
        } else {
            $extra = serialize(array('faqid' => $obj['faqid']));
        }
        $sql = $insertSql . '('
                   . '\'' . DataUtil::formatForStore($obj['question']) . '\', '
                   . '\'' . DataUtil::formatForStore($obj['answer']) . '\', '
                   . '\'' . DataUtil::formatForStore($extra) . '\', '
                   . '\'' . DataUtil::formatForStore($obj['cr_date']) . '\', '
                   . '\'' . 'FAQ' . '\', '
                   . '\'' . DataUtil::formatForStore($sessionId) . '\')';
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
 * already been done. But we do add a URL to the found item
 */
function faq_searchapi_search_check(&$args)
{
    $datarow = &$args['datarow'];
    $extra = unserialize($datarow['extra']);

    $datarow['url'] = pnModUrl('FAQ', 'user', 'display', array('faqid' => $extra['faqid'], 'cat' => $extra['cat']));

    return true;
}
