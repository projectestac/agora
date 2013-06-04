<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
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
        $this->enablecategorization = ModUtil::getVar('Pages', 'enablecategorization');
    }

    // This method is called by DBUtil::selectObjectArrayFilter() for each and every search result.
    // A return value of true means "keep result" - false means "discard".
    function checkResult(&$item)
    {
        $ok = SecurityUtil::checkPermission('Pages::', "$item[title]::$item[pageid]", ACCESS_OVERVIEW);
        if ($this->enablecategorization) {
            ObjectUtil::expandObjectWithCategories($item, 'pages', 'pageid');
            $ok = $ok && CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'Pages');
        }
        return $ok;
    }

}

/**
 * The search for items.
 */
class Pages_Api_Search extends Zikula_AbstractApi
{

    /**
     * The search for items.
     *
     * @return array
     */
    public function info()
    {
        return array(
            'title' => 'Pages',
            'functions' => array('pages' => 'search')
        );
    }

    /**
     * Render the search form component for Users.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * boolean 'active' Indicates that the Users module is an active part of the search(?).
     *
     * @param array $args All parameters passed to this function.
     *
     * @return string The rendered template for the Users search component.
     */
    public function options($args)
    {
        if (SecurityUtil::checkPermission('Pages::', '::', ACCESS_READ)) {
            // Create output object - this object will store all of our output so that
            // we can return it easily when required
            $render = Zikula_View::getInstance('Pages');
            $render->assign('active', !isset($args['active']) || isset($args['active']['Pages']));
            return $render->fetch('search/options.tpl');
        }

        return '';
    }

    /**
     * Perform a search.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * ? $args['q'] ?.
     * ? $args[?]   ?.
     *
     * @param array $args All parameters passed to this function.
     *
     * @return bool True on success or null result, false on error.
     */
    public function search($args)
    {
        ModUtil::dbInfoLoad('Search');
        $table = DBUtil::getTables();
        $searchTable = $table['search_result'];
        $searchColumn = $table['search_result_column'];


        // this is a bit of a hacky way to ustilize this API for Doctrine calls.
        // the 'a' prefix is the table alias in CalendarEventRepository
        $where = Search_Api_User::construct_where($args, array('p.title', 'p.content'), null);
        if (!empty($where)) {
            $where = trim(substr(trim($where), 1, -1));
        }
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('p')
            ->from('Pages_Entity_Page', 'p')
            ->add('where', $where);
        $objArray = $qb->getQuery()->getArrayResult();



        $sessionId = session_id();


        $addcategorytitletopermalink = ModUtil::getVar('Pages', 'addcategorytitletopermalink');

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
                $cat = isset($obj['__CATEGORIES__']['Main']['name']) ? $obj['__CATEGORIES__']['Main']['name'] : null;
                $extra = serialize(
                    array(
                        'pageid' => $obj['pageid'],
                        'cat'    => $cat
                    )
                );
            } else {
                $extra = serialize(array('pageid' => $obj['pageid']));
            }
            $sql = $insertSql . '('
                    . '\'' . DataUtil::formatForStore($obj['title']) . '\', '
                    . '\'' . DataUtil::formatForStore($obj['content']) . '\', '
                    . '\'' . DataUtil::formatForStore($extra) . '\', '
                    . '\'' . DateUtil::formatDatetime($obj['cr_date']) . '\', '
                    . '\'' . 'Pages' . '\', '
                    . '\'' . DataUtil::formatForStore($sessionId) . '\')';
            $insertResult = DBUtil::executeSQL($sql);
            if (!$insertResult) {
                return LogUtil::registerError($this->__('Error! Could not load any page.'));
            }
        }

        return true;
    }

    /**
     * Do last minute access checking and assign URL to items.
     *
     * Access checking is ignored since access check has
     * already been done. But we do add a URL to the found user.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * array $args['datarow'] ?.
     *
     * @param array $args The search results.
     *
     * @return bool True.
     */
    public function search_check($args)
    {
        $datarow = &$args['datarow'];
        $extra = unserialize($datarow['extra']);

        $params = array('pageid' => $extra['pageid'], 'cat' => $extra['cat']);
        $datarow['url'] = ModUtil::url('Pages', 'user', 'display', $params);

        return true;
    }
}