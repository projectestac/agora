<?php

/**
 * Search plugin info
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Api_Search extends Zikula_AbstractApi
{
    /**
     * Search plugin info
     **/
    public function info()
    {
        return array('title' => 'Content', 
				'functions' => array('Content' => 'search'));
    }

    /**
     * Search form component
     * */
    public function options($args)
    {
        if (SecurityUtil::checkPermission('Content::', '::', ACCESS_READ)) {
            $render = Zikula_View::getInstance('Content');
            $render->assign('active', (isset($args['active']) && isset($args['active']['Content'])) || (!isset($args['active'])));
            return $render->fetch('search/options.tpl');
        }

        return '';
    }

    /**
     * Search plugin main function
     **/
    public function search($args)
    {
        ModUtil::dbInfoLoad('Search');
        $dbtables = DBUtil::getTables();

        $searchTable = $dbtables['search_result'];
        $searchColumn = $dbtables['search_result_column'];
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];
        $contentTable = $dbtables['content_content'];
        $contentColumn = $dbtables['content_content_column'];
        $contentSearchTable = $dbtables['content_searchable'];
        $contentSearchColumn = $dbtables['content_searchable_column'];

        $sessionId = session_id();

        $where = Search_Api_User::construct_where($args, 
				array($contentSearchColumn['text']), null);
        $wheretitle = Search_Api_User::construct_where($args, 
				array($pageColumn['title']), $pageColumn['language']);

		// Direct SQL way of searching in titles and searchable content items 
		// for Pages and Content items that are visible/active
		// Optimization and conversion into DBUtil calls should be done
        $sql = "INSERT INTO $searchTable
            ($searchColumn[title],
            $searchColumn[text],
            $searchColumn[module],
            $searchColumn[extra],
            $searchColumn[created],
            $searchColumn[session])
            SELECT DISTINCT $pageColumn[title],
            $contentSearchColumn[text],
            'Content',
            $pageColumn[id],
            $pageColumn[cr_date] AS createdDate,
            '" . DataUtil::formatForStore($sessionId) . "'
            FROM $pageTable
            JOIN $contentTable
            ON $contentColumn[pageId] = $pageColumn[id]
            JOIN $contentSearchTable
            ON $contentSearchColumn[contentId] = $contentColumn[id]
            WHERE ($where or $wheretitle) AND $pageColumn[active] = 1 AND ($pageColumn[activeFrom] IS NULL OR $pageColumn[activeFrom] <= NOW()) AND ($pageColumn[activeTo] IS NULL OR $pageColumn[activeTo] >= NOW()) AND $contentColumn[active] = 1 AND $contentColumn[visiblefor] " . (UserUtil::isLoggedIn() ? '<=1' : '>=1');

        $dbresult = DBUtil::executeSQL($sql);
        if (!$dbresult) {
            return LogUtil::registerError($this->__('Error! Could not load any Content pages or items.'));
        }
        return true;
    }

    /**
     * Do last minute access checking and assign URL to items
     *
     * Access checking is ignored since access check has
     * already been done. But we do add a URL to the found user
     */
    public function search_check($args)
    {
        $datarow = &$args['datarow'];
        $pageId = $datarow['extra'];
        $datarow['url'] = ModUtil::url('Content', 'user', 'view', array('pid' => $pageId));

        return true;
	}
}
