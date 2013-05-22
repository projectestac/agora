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

class News_Api_Admin extends Zikula_AbstractApi
{
    /**
     * delete a News item
     *
     * @author Mark West
     * @param $args['sid'] ID of the item
     * @return bool true on success, false on failure
     */
    public function delete($args)
    {
        // Argument check
        if (!isset($args['sid']) || !is_numeric($args['sid'])) {
            return LogUtil::registerArgsError();
        }

        // Get the news story
        $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $args['sid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such article found.'));
        }

        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', $item['cr_uid'] . '::' . $item['sid'], ACCESS_DELETE), LogUtil::getErrorMsgPermission());

        if (!DBUtil::deleteObjectByID('news', $args['sid'], 'sid')) {
            return LogUtil::registerError($this->__('Error! Could not delete article.'));
        }

        // delete News images
        $modvars = $this->getVars();
        if ($modvars['picupload_enabled'] && $item['pictures'] > 0) {
            News_ImageUtil::deleteImagesBySID($modvars['picupload_uploaddir'], $item['sid'], $item['pictures']);
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * update a News item
     *
     * @author Mark West
     * @param int $args['sid'] the id of the item to be updated
     * @param int $args['objectid'] generic object id maps to sid if present
     * @param string $args['title'] the title of the news item
     * @param string $args['urltitle'] the title of the news item formatted for the url
     * @param string $args['language'] the language of the news item
     * @param string $args['hometext'] the summary text of the news item
     * @param int $args['hometextcontenttype'] the content type of the summary text
     * @param string $args['bodytext'] the body text of the news item
     * @param int $args['bodytextcontenttype'] the content type of the body text
     * @param string $args['notes'] any administrator notes
     * @param int $args['published_status'] the published status of the item
     * @param int $args['displayonindex'] display the article on the index page
     * @return bool true on update success, false on failiure
     */
    public function update($args)
    {
        // Argument check
        if (!isset($args['sid']) ||
                !isset($args['title']) ||
                !isset($args['hometext']) ||
                !isset($args['hometextcontenttype']) ||
                !isset($args['bodytext']) ||
                !isset($args['bodytextcontenttype']) ||
                !isset($args['notes']) ||
                !isset($args['from']) ||
                !isset($args['to'])) {
            return LogUtil::registerArgsError();
        }

        if (!isset($args['language'])) {
            $args['language'] = '';
        }

        // Get the news item
        $item = ModUtil::apiFunc('News', 'user', 'get', array('sid' => $args['sid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such article found.'));
        }

        $this->throwForbiddenUnless($this->_isSubmittor($item) || SecurityUtil::checkPermission('News::', $item['cr_uid'] . '::' . $args['sid'], ACCESS_EDIT), LogUtil::getErrorMsgPermission());

        // evaluates the input action
        $args['action'] = isset($args['action']) ? $args['action'] : null;
        switch ($args['action'])
        {
            case 1: // submitted => pending
                $args['published_status'] = 2;
                break;
            case 2: // published
            case 3: // rejected
            case 4: // pending
            case 5: // archived
            case 6: // draft
                $args['published_status'] = $args['action']-2;
                break;
        }

        // calculate the format type
        $args['format_type'] = ($args['bodytextcontenttype']%4)*4 + $args['hometextcontenttype']%4;

        // define the lowercase permalink, using the title as slug, if not present
        if (!isset($args['urltitle']) || empty($args['urltitle'])) {
            $args['urltitle'] = strtolower(DataUtil::formatPermalink($args['title']));
        }

        // check the publishing date options
        if (!empty($args['unlimited'])) {
            $args['from'] = $item['cr_date'];
            $args['to'] = null;
        } elseif (!empty($args['tonolimit'])) {
            $args['from'] = DateUtil::formatDatetime($args['from']);
            $args['to'] = null;
        } else {
            $args['from'] = DateUtil::formatDatetime($args['from']);
            $args['to'] = DateUtil::formatDatetime($args['to']);
        }

        if (!DBUtil::updateObject($args, 'news', '', 'sid')) {
            return LogUtil::registerError($this->__('Error! Could not save your changes.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Purge the permalink fields in the News table
     * @author Mateo Tibaquira
     * @return bool true on success, false on failure
     */
    public function purgepermalinks($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('News::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        // disable categorization to do this (if enabled)
        $catenabled = $this->getVar('enablecategorization');
        if ($catenabled) {
            ModUtil::setVar('News', 'enablecategorization', false);
            ModUtil::dbInfoLoad('News', 'News', true);
        }

        // get all the ID and permalink of the table
        $data = DBUtil::selectObjectArray('news', '', '', -1, -1, 'sid', null, null, array('sid', 'urltitle'));

        // loop the data searching for non equal permalinks
        $perma = '';
        foreach (array_keys($data) as $sid) {
            $perma = strtolower(DataUtil::formatPermalink($data[$sid]['urltitle']));
            if ($data[$sid]['urltitle'] != $perma) {
                $data[$sid]['urltitle'] = $perma;
            } else {
                unset($data[$sid]);
            }
        }

        // restore the categorization if was enabled
        if ($catenabled) {
            ModUtil::setVar('News', 'enablecategorization', true);
        }

        if (empty($data)) {
            return true;
            // store the modified permalinks
        } elseif (DBUtil::updateObjectArray($data, 'news', 'sid')) {
            // Let the calling process know that we have finished successfully
            return true;
        }

        return false;
    }

    /**
     * get available admin panel links
     *
     * @author Mark West
     * @return array array of admin links
     */
    public function getlinks()
    {
        // Counts with a tolerance of 3 seconds
        $now = DateUtil::getDatetime(time() + 3);
        // arraymap for statustypes
        $statustypes = array(
            'published' => array('status' => 0,
                'to' => $now),
            'scheduled' => array('status' => 0,
                'from' => $now),
            'pending' => array('status' => 2),
            'draft' => array('status' => 4),
            'archived' => array('status' => 3),
            'rejected' => array('status' => 1),
            'all' => array(),
        );
        $count = array();
        foreach ($statustypes as $k => $v) {
            $count[$k] = ModUtil::apiFunc('News', 'user', 'countitems', $v);
        }

        $links = array();

        if (SecurityUtil::checkPermission('News::', '::', ACCESS_READ)) {
            $links[] = array('url'  => ModUtil::url('News', 'admin', 'view'),
                    'text' => $this->__('News articles list'),
                    'class' => 'z-icon-es-view',
                    'links' => array(
                        array('url' => ModUtil::url('News', 'admin', 'view'),
                            'text' => $this->__f('All (%s)', $count['all'])),
                        array('url' => ModUtil::url('News', 'admin', 'view', array('news_status'=>0)),
                            'text' => $this->__f('Published (%s)', $count['published'])),
                        array('url' => ModUtil::url('News', 'admin', 'view', array('news_status'=>1)),
                            'text' => $this->__f('Rejected (%s)', $count['rejected'])),
                        array('url' => ModUtil::url('News', 'admin', 'view', array('news_status'=>2)),
                            'text' => $this->__f('Pending Review (%s)', $count['pending'])),
                        array('url' => ModUtil::url('News', 'admin', 'view', array('news_status'=>3)),
                            'text' => $this->__f('Archived (%s)', $count['archived'])),
                        array('url' => ModUtil::url('News', 'admin', 'view', array('news_status'=>4)),
                            'text' => $this->__f('Draft (%s)', $count['draft'])),
                        array('url' => ModUtil::url('News', 'admin', 'view', array('news_status'=>5)),
                            'text' => $this->__f('Scheduled (%s)', $count['scheduled']))
                    ));
        }
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_ADD)) {
            $links[] = array('url'  => ModUtil::url('News', 'user', 'newitem'),
                    'text' =>  $this->__('Create new article'),
                    'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('News::', '::', ACCESS_ADMIN)) {
            $links[] = array('url'  => ModUtil::url('News', 'admin', 'view', array('purge' => 1)),
                    'text' => $this->__('Purge permalinks'),
                    'class' => 'z-icon-es-regenerate');

            $links[] = array('url'  => ModUtil::url('News', 'admin', 'modifyconfig'),
                    'text' => $this->__('Settings'),
                    'class' => 'z-icon-es-config');
        }

        return $links;
    }

    private function _isSubmittor($item) {
        $submittor = $item['cr_uid'];
        $currentUser = UserUtil::getVar('uid');
        if (($submittor == $currentUser) && ($item['published_status'] <> 0)) {
            return true;
        }
        return false;
    }
}