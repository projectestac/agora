<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

class News_Api_Search extends Zikula_AbstractApi
{
    /**
     * Search plugin info
     **/
    public function info()
    {
        return array('title' => 'News',
                'functions' => array('News' => 'search'));
    }

    /**
     * Search form component
     **/
    public function options($args)
    {
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_READ)) {
            // Create output object - this object will store all of our output so that
            // we can return it easily when required
            $render = Zikula_View::getInstance('News');
            $render->assign('active', (isset($args['active']) && isset($args['active']['News'])) || (!isset($args['active'])));
            return $render->fetch('search/options.tpl');
        }

        return '';
    }

    /**
     * Search plugin main function
     **/
    public function search($args)
    {
        if (!SecurityUtil::checkPermission('News::', '::', ACCESS_READ)) {
            return true;
        }

        ModUtil::dbInfoLoad('Search');
        $tables = DBUtil::getTables();
        $newsColumn = $tables['news_column'];

        $where = Search_Api_User::construct_where($args,
                array($newsColumn['title'],
                $newsColumn['hometext'],
                $newsColumn['bodytext']),
                $newsColumn['language']);
        // Only search in published articles that are currently visible
        $where .= " AND ({$newsColumn['published_status']} = '0')";
        $date = DateUtil::getDatetime();
        $where .= " AND ('$date' >= {$newsColumn['from']} AND ({$newsColumn['to']} IS NULL OR '$date' <= {$newsColumn['to']}))";

        $sessionId = session_id();

        ModUtil::loadApi('News', 'user');

        $permChecker = new News_ResultChecker($this->getVar('enablecategorization'), $this->getVar('enablecategorybasedpermissions'));
        $articles = DBUtil::selectObjectArrayFilter('news', $where, null, null, null, '', $permChecker, null);

        foreach ($articles as $article)
        {
            $item = array(
                'title' => $article['title'],
                'text'  => $article['hometext'],
                'extra' => $article['sid'],
                'created' => $article['from'],
                'module'  => 'News',
                'session' => $sessionId
            );
            $insertResult = DBUtil::insertObject($item, 'search_result');
            if (!$insertResult) {
                return LogUtil::registerError($this->__('Error! Could not load any articles.'));
            }
        }

        return true;
    }

    /**
     * Do last minute access checking and assign URL to items
     */
    public function search_check($args)
    {
        $datarow = &$args['datarow'];
        $articleId = $datarow['extra'];
        $datarow['url'] = ModUtil::url('News', 'user', 'display', array('sid' => $articleId));

        return true;
    }
}