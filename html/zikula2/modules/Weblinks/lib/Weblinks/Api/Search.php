<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Weblinks_Api_Search extends Zikula_AbstractApi
{

    /**
     * Search plugin info
     * */
    public function info()
    {
        return array('title' => 'Weblinks', 'functions' => array('Weblinks' => 'search'));
    }

    /**
     * Search form component
     * */
    public function options($args)
    {
        if (SecurityUtil::checkPermission('Weblinks::', '::', ACCESS_READ)) {
            // Create output object - this object will store all of our output so that
            // we can return it easily when required
            $render = Zikula_View::getInstance('Weblinks', false);
            $render->assign('active', (isset($args['active']) && isset($args['active']['Weblinks'])) || (!isset($args['active'])));
            return $render->fetch('search/options.tpl');
        }

        return '';
    }

    /**
     * Search plugin main function
     * */
    public function search($args)
    {
        ModUtil::dbInfoLoad('Search');

        $sessionId = session_id();

        // this is a bit of a hacky way to ustilize this API for Doctrine calls.
        $where = Search_Api_User::construct_where($args, array(
                    'a.title',
                    'a.description'), null);
        if (!empty($where)) {
            $where = trim(substr(trim($where), 1, -1));
        }

        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('a')
            ->from('Weblinks_Entity_Link', 'a')
            ->where($where);
        $query = $qb->getQuery();
        $results = Weblinks_Util::checkCategoryPermissions($query->getResult(), ACCESS_READ);

        foreach ($results as $result) {
            // TODO: check Link permissions here?
            $record = array(
                'title' => $result->getTitle(),
                'text' => '',
                'extra' => serialize(array('lid' => $result->getLid())),
                'created' => $result->getDate()->format('Y-m-d h:m:s'),
                'module' => 'Weblinks',
                'session' => $sessionId
            );

            if (!DBUtil::insertObject($record, 'search_result')) {
                return LogUtil::registerError($this->__('Error! Could not save the search results.'));
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
    public function search_check($args)
    {
        $datarow = &$args['datarow'];
        $extra = unserialize($datarow['extra']);
        
        $datarow['url'] = ModUtil::url('Weblinks', 'user', 'visit', array('lid' => $extra['lid']));

        return true;
    }

}