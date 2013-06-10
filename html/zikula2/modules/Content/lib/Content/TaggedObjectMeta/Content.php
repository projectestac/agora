<?php

/**
 * Tag - a content-tagging module for the Zikukla Application Framework
 * 
 * @license MIT
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
class Content_TaggedObjectMeta_Content extends Tag_AbstractTaggedObjectMeta
{

    function __construct($objectId, $areaId, $module, $objectUrl)
    {
        parent::__construct($objectId, $areaId, $module, $objectUrl);

        $perm = SecurityUtil::checkPermission('Content:page:', $objectId . '::', ACCESS_READ);
        if ($perm) {
            $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
                    'id' => $this->getObjectId(),
                    'preview' => false,
                    'includeContent' => false));
            // the Page Api resolves page active status and availabilty times
            if ($page) {
                $this->setObjectAuthor($page['uname']);
                $this->setObjectDate($page['cr_date']);
                $this->setObjectTitle(html_entity_decode($page['title']));
                // do not use default objectURL to compensate for shortUrl handling
                $this->setObjectUrl(ModUtil::url('Content', 'user', 'view', array('pid' => $this->getObjectId())));
            }
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