<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Api_Search extends Zikula_AbstractApi
{
    /**
     * Plugin info
     */
    public function info()
    {
        return array('title'     => 'EZComments',
                     'functions' => array('EZComments' => 'search'));
    }

    /**
     * OPtions
     *
     * This function will be called to display the search box.
     *
     * @return output the search field
     */
    public function options($args)
    {
        if (SecurityUtil::checkPermission('EZComments::', '::', ACCESS_READ)) {
            // Create output object - this object will store all of our output so that
            // we can return it easily when required
            $render = Zikula_View::getInstance('EZComments');
            $render->assign('active', !isset($args['active']) || isset($args['active']['EZComments']));
            return $render->fetch('ezcomments_search_form.tpl');
        }

        return '';
    }

    /**
     * Search
     *
     * do the actual search and display the results
     *
     * @return output the search results
     */
    public function search($args)
    {
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_READ)) {
            return true;
        }

        if (strlen($args['q']) < 3 || strlen($args['q']) > 30) {
            return LogUtil::registerStatus($this->__f('The comments can only be searched for words that are longer than %1$s and less than %2$s characters!', array($minlen, $maxlen)));
        }

        ModUtil::dbInfoLoad('Search');

        $tables = DBUtil::getTables();
        // ezcomments tables
        $ezcommentstable  = $tables['EZComments'];
        $ezcommentscolumn = $tables['EZComments_column'];
        // our own tables
        $searchTable  = $tables['search_result'];
        $searchColumn = $tables['search_result_column'];
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
                return LogUtil::registerError($this->__('Error! Could not load items.'));
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
    public function search_check(&$args)
    {
        $datarow = $args['datarow'];
        $url     = $datarow['extra'];
        $datarow['url'] = $url;
        return true;
    }
}
