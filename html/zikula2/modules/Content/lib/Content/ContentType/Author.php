<?php
/**
 * Content author plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_ContentType_Author extends Content_AbstractContentType
{
    protected $uid;

    public function getUid()
    {
        return $this->uid;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    function getTitle()
    {
        return $this->__('Author Infobox');
    }
    function getDescription()
    {
        return $this->__('Various information about the author of the page.');
    }
    function isTranslatable()
    {
        return false;
    }
    function loadData(&$data)
    {
        $this->uid = $data['uid'];
    }
    function display()
    {
        $this->view->assign('authoruid', DataUtil::formatForDisplayHTML($this->uid));
        $this->view->assign('contentId', $this->contentId);
        return $this->view->fetch($this->getTemplate());
    }
    function displayEditing()
    {
        return "<h3>" . UserUtil::getVar('uname', $this->uid) . "</h3>";
    }
    function getDefaultData()
    {
        return array('uid' => '1');
    }
    function getSearchableText()
    {
        return html_entity_decode(strip_tags(UserUtil::getVar($this->uid, 'uname')));
    }
}