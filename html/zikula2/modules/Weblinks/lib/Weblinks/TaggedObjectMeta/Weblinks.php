<?php

/**
 * Tag - a content-tagging module for the Zikukla Application Framework
 * 
 * @license MIT
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
class Tag_TaggedObjectMeta_Weblinks extends Tag_AbstractTaggedObjectMeta
{

    function __construct($objectId, $areaId, $module, $urlString = null, Zikula_ModUrl $urlObject = null)
    {
        parent::__construct($objectId, $areaId, $module, $urlString, $urlObject);

        $entityManager = ServiceUtil::getService('doctrine.entitymanager');
        $link = $entityManager->find('Weblinks_Entity_Link', $this->getObjectId());
        // check permissions here
        
        $this->setObjectAuthor($link->getSubmitter());
        $this->setObjectDate($link->getDate()->format('M d, Y'));
        $this->setObjectTitle($link->getTitle());
    }

    public function setObjectTitle($title)
    {
        $this->title = $title;
    }

    public function setObjectDate($date)
    {
        $this->date = $date;
    }

    public function setObjectAuthor($author)
    {
        $this->author = $author;
    }
    
    /**
     * Override the method to present specialized link
     * @return string 
     */
    public function getPresentationLink()
    {
        $author = $this->getAuthor();
        $date = $this->getDate();
        $title = $this->getTitle();
        $link = null;
        if (!empty($title)) {
            $dom = ZLanguage::getModuleDomain('Weblinks');
            $weblink = __('Weblink', $dom);
            $by = __('by', $dom);
            $on = __('on', $dom);
            $details = __('details', $dom);
            $visit = __('visit', $dom);
            $detailsUrl = $this->getUrlObject()->getUrl();
            $visitUrl = ModUtil::url('Weblinks', 'user', 'visit', array('lid' => $this->getObjectId()));
            $link = "$weblink: <strong>$title</strong> [<a href='$visitUrl'>$visit</a>] [<a href='$detailsUrl'>$details</a>]";
            $sub = '';
            if (!empty($author)) {
                $sub .= " $by $author";
            }
            if (!empty($date)) {
                $sub .= " $on $date";
            }
            $link .= (!empty($sub)) ? " (" . trim($sub) . ")" : '';
        }
        return $link;
    }
}