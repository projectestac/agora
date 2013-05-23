<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */
class FAQ_Api_Admin extends Zikula_AbstractApi
{

    /**
     * create a new FAQ
     *
     * @param    $args['question']      name of the item
     * @param    $args['answer']        number of the item
     * @param    $args['submittedby']   name of the submitter (if anonymous) (optional)
     * @param    $args['submittedbyid'] id of the submitter (if logged in) (optional)
     * @param    $args['answeredbyid']  id of the answerer (optional)
     * @return   mixed                  FAQ ID on success, false on failure
     */
    public function create($faq)
    {
        // Security check
        if (!SecurityUtil::checkPermission('FAQ::', '::', ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError();
        }

        // Argument check
        if (!isset($faq['question']) ||
                !isset($faq['answer'])) {
            return LogUtil::registerArgsError();
        }

        // optional arguments
        if (!isset($faq['submittedby'])) {
            $faq['submittedby'] = '';
        }
        if (!isset($faq['submittedbyid'])) {
            $faq['submittedbyid'] = UserUtil::getVar('uid');
        }
        if (!isset($faq['answeredbyid'])) {
            if (strlen($faq['answer']) > 0) {
                $faq['answeredbyid'] = $faq['submittedbyid'];
            } else {
                $faq['answeredbyid'] = '';
            }
        }

        // define the permalink title if not present
        if (!isset($faq['urltitle']) || empty($faq['urltitle'])) {
            $faq['urltitle'] = DataUtil::formatPermalink($faq['question']);
        }

        if (!DBUtil::insertObject($faq, 'faqanswer', 'faqid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $faq['faqid'];
    }

    /**
     * delete an faq
     *
     * @param    $args['faqid']   ID of the item
     * @return   bool           true on success, false on failure
     */
    public function delete($args)
    {
        // Argument check
        if (!isset($args['faqid']) || !is_numeric($args['faqid'])) {
            return LogUtil::registerArgsError();
        }

        // Get the current faq
        $item = ModUtil::apiFunc('FAQ', 'user', 'get', array('faqid' => $args['faqid']));

        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Security check
        if (!SecurityUtil::checkPermission('FAQ::', "$args[faqid]::", ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::deleteObjectByID('faqanswer', $args['faqid'], 'faqid')) {
            return LogUtil::registerError($this->__('Error! Deletion attempt failed.'));
        }

        $this->notifyHooks(new Zikula_ProcessHook('faq.ui_hooks.questions.process_delete', $args['faqid']));

        return true;
    }

    /**
     * update an item
     *
     * @param    $args['faqid']         the ID of the item
     * @param    $args['question']      the new name of the item
     * @param    $args['answer']        the new number of the item
     * @param    $args['submittedby']   name of the submitter (if anonymous)
     * @param    $args['submittedbyid'] id of the submitter (if logged in)
     * @param    $args['answeredbyid']  id of the answerer (optional)
     * @return   bool             true on success, false on failure
     */
    public function update($faq)
    {
        // Argument check
        if (!isset($faq['question']) ||
                !isset($faq['answer']) ||
                !isset($faq['faqid']) || !is_numeric($faq['faqid'])) {
            return LogUtil::registerArgsError();
        }

        // optional arguments
        if (!isset($faq['answeredbyid'])) {
            if (strlen($faq['answer']) > 0) {
                $faq['answeredbyid'] = UserUtil::getVar('uid');
            } else {
                $faq['answeredbyid'] = '';
            }
        }

        // define the permalink title if not present
        if (!isset($faq['urltitle']) || empty($faq['urltitle'])) {
            $faq['urltitle'] = DataUtil::formatPermalink($faq['question']);
        }

        // Get the current faq
        $item = ModUtil::apiFunc('FAQ', 'user', 'get', array('faqid' => $faq['faqid']));

        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Security check.
        if (!SecurityUtil::checkPermission('FAQ::', "$faq[faqid]::", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::updateObject($faq, 'faqanswer', '', 'faqid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

    /**
     * Purge the permalink fields in the FAQ table
     * @return bool true on success, false on failure
     */
    public function purgepermalinks($args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('FAQ::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // disable categorization to do this (if enabled)
        $catenabled = ModUtil::getVar('FAQ', 'enablecategorization');
        if ($catenabled) {
            ModUtil::setVar('FAQ', 'enablecategorization', false);
            ModUtil::dbInfoLoad('FAQ', 'FAQ', true);
        }

        // get all the ID and permalink of the table
        $data = DBUtil::selectObjectArray('faqanswer', '', '', -1, -1, 'faqid', null, null, array('faqid', 'urltitle'));

        // loop the data searching for non equal permalinks
        $perma = '';
        foreach (array_keys($data) as $faqid) {
            $perma = strtolower(DataUtil::formatPermalink($data[$faqid]['urltitle']));
            if ($data[$faqid]['urltitle'] != $perma) {
                $data[$faqid]['urltitle'] = $perma;
            } else {
                unset($data[$faqid]);
            }
        }

        // restore the categorization if was enabled
        if ($catenabled) {
            ModUtil::setVar('FAQ', 'enablecategorization', true);
        }

        if (empty($data)) {
            return true;
            // store the modified permalinks
        } elseif (DBUtil::updateObjectArray($data, 'faqanswer', 'faqid')) {
            // Let the calling process know that we have finished successfully
            return true;
        } else {
            return false;
        }
    }

    /**
     * get available admin panel links
     *
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission('FAQ::', '::', ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('FAQ', 'admin', 'view'),
                'text' => $this->__('View FAQ list'),
                'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('FAQ::', '::', ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('FAQ', 'admin', 'newfaq'),
                'text' => $this->__('Create a FAQ'),
                'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('FAQ::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('FAQ', 'admin', 'view', array('purge' => 1)),
                'text' => $this->__('Purge PermaLinks'),
                'class' => 'z-icon-es-regenerate');

            $links[] = array('url' => ModUtil::url('FAQ', 'admin', 'modifyconfig'),
                'text' => $this->__('Settings'),
                'class' => 'z-icon-es-config');
        }

        return $links;
    }

}