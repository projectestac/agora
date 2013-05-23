<?php

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
        if ($this->enablecategorization)
        {
            ObjectUtil::expandObjectWithCategories($item, 'pages', 'pageid');
            $ok = $ok && CategoryUtil::hasCategoryAccess($item['__CATEGORIES__'], 'Pages');
        }
        return $ok;
    }

}

class Pages_Api_Search extends Zikula_AbstractApi
{

    /**
     * Search plugin info
     */
    public function info()
    {
        return array('title' => 'Pages',
            'functions' => array('pages' => 'search'));
    }

    /**
     * Search form component
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
     * Search plugin main function
     */
    public function search($args)
    {
        ModUtil::dbInfoLoad('Search');
        $table = DBUtil::getTables();
        $pagestable = $table['pages'];
        $pagescolumn = $table['pages_column'];
        $searchTable = $table['search_result'];
        $searchColumn = $table['search_result_column'];

        $where = Search_Api_User::construct_where($args,
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
            return LogUtil::registerError($this->__('Error! Could not load any page.'));
        }

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
                $extra = serialize(array(
                    'pageid' => $obj['pageid'],
                    'cat' => isset($obj['__CATEGORIES__']['Main']['name']) ? $obj['__CATEGORIES__']['Main']['name'] : null));
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
                return LogUtil::registerError($this->__('Error! Could not load any page.'));
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
        $extra = unserialize($datarow['extra']);

        $datarow['url'] = ModUtil::url('pages', 'user', 'display',
                        array('pageid' => $extra['pageid'],
                            'cat' => $extra['cat']));

        return true;
    }

}