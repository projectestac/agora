<?php

/**
 * Tag - a content-tagging module for the Zikukla Application Framework
 * 
 * @license MIT
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
class Pages_TaggedObjectMeta_Pages extends Tag_AbstractTaggedObjectMeta
{

    function __construct($objectId, $areaId, $module, $objectUrl)
    {
        parent::__construct($objectId, $areaId, $module, $objectUrl);

        $page = ModUtil::apiFunc('Pages', 'user', 'get', array('pageid' => $this->getObjectId()));
        // the Api checks for perms and there is nothing else to check
        if ($page) {
            $this->setObjectAuthor(UserUtil::getVar('uname', $page['cr_uid']));
            $this->setObjectDate($page['cr_date']);
            $this->setObjectTitle($page['title']);
            // do not use default objectURL to compensate for shortUrl handling
            $this->setObjectUrl(ModUtil::url('Pages', 'user', 'display', array('pageid' => $this->getObjectId())));
        }
    }

    public function setObjectTitle($title)
    {
        $this->title = $title;
    }

    public function setObjectDate($date)
    {
        $this->date = DateUtil::formatDatetime($date, 'datetimebrief');
    }

    public function setObjectAuthor($author)
    {
        $this->author = $author;
    }

}