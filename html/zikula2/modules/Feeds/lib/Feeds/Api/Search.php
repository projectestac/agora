<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

class Feeds_Api_Search extends Zikula_AbstractApi
{
    /**
     * Search plugin info
     **/
    public function info()
    {
        return array('title' => 'Feeds',
                'functions' => array('feeds' => 'search'));
    }

    /**
     * Search form component
     **/
    public function options($args)
    {
        if (SecurityUtil::checkPermission('Feeds::', '::', ACCESS_READ)) {
            // Create output object - this object will store all of our output so that
            // we can return it easily when required
            $render = Zikula_View::getInstance('Feeds');
            $render->assign('active', (isset($args['active']) && isset($args['active']['Feeds'])) || (!isset($args['active'])));
            return $render->fetch('feeds_search_options.htm');
        }

        return '';
    }

    /**
     * Search plugin main function
     **/
    public function search($args)
    {
        ModUtil::dbInfoLoad('Search');
        $pntable = DBUtil::getTables();
        $feedstable = $pntable['feeds'];
        $feedscolumn = $pntable['feeds_column'];
        $searchTable = $pntable['search_result'];
        $searchColumn = $pntable['search_result_column'];

        $where = search_construct_where($args,
                array($feedscolumn['name']),
                null);

        $sessionId = session_id();

        $sql = "
SELECT
                $feedscolumn[name] as title,
   '' as text,
                $feedscolumn[fid] as id,
                $feedscolumn[cr_date] as date
FROM $feedstable
WHERE $where";

        $result = DBUtil::executeSQL($sql);
        if (!$result) {
            return LogUtil::registerError($this->__('Error! Could not load any Feed.'));
        }

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
        for (; !$result->EOF; $result->MoveNext()) {
            $item = $result->GetRowAssoc(2);
            if (SecurityUtil::checkPermission('Feeds::item', "$item[name]::$item[id]", ACCESS_READ)) {
                $sql = $insertSql . '('
                        . '\'' . _FEEDS_SEARCH . ': ' . DataUtil::formatForStore($item['title']) . '\', '
                        . '\'' . DataUtil::formatForStore($item['text']) . '\', '
                        . '\'' . DataUtil::formatForStore($item['id']) . '\', '
                        . '\'' . DataUtil::formatForStore($item['date']) . '\', '
                        . '\'' . 'Feeds' . '\', '
                        . '\'' . DataUtil::formatForStore($sessionId) . '\')';
                $insertResult = DBUtil::executeSQL($sql);
                if (!$insertResult) {
                    return LogUtil::registerError($this->__('Error! Could not load any Feed.'));
                }
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
    public function search_check(&$args)
    {
        $datarow = &$args['datarow'];
        $feedsId = $datarow['extra'];

        $datarow['url'] = ModUtil::url('Feeds', 'user', 'display', array('fid' => $feedsId));

        return true;
    }

}
