<?php
/**
 * Content Module Display Function plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_ContentType_ContentItem extends Content_AbstractContentType
{
    protected $contentitemid;
    protected $contentitemtype;
    protected $contentitemmod;
    protected $contentitempage;
    
    public function getContentItemId()
    {
        return $this->contentitemid;
    }

    public function setContentItemId($contentitemid)
    {
        $this->contentitemid = $contentitemid;
    }

    public function getContentItemType()
    {
        return $this->contentitemtype;
    }

    public function setContentItemType($contentitemtype)
    {
        $this->contentitemtype = $contentitemtype;
    }

    public function getContentItemMod()
    {
        return $this->contentitemMod;
    }

    public function setContentItemMod($contentitemmod)
    {
        $this->contentitemmod = $contentitemmod;
    }

    public function getContentItemPage()
    {
        return $this->contentitemPage;
    }

    public function setContentItemPage($contentitempage)
    {
        $this->contentitempage = $contentitempage;
    }

    function getTitle()
    {
        return $this->__('Existing Content Item');
    }
    function getDescription()
    {
        return $this->__('Display an already existing Content Item.');
    }
    function isTranslatable()
    {
        return false;
    }
    function loadData(&$data)
    {
        $this->contentitemid = (int) $data['contentitemid'];

        // retieve some additional info on the content item
        if ($this->contentitemid > 0) {
            $contentitem = ModUtil::apiFunc('Content', 'Content', 'getContent', array('id' => $this->contentitemid));
            $this->contentitemtype = $contentitem['type'];
            $this->contentitemmod = $contentitem['module'];
            $this->contentitempage = $contentitem['pageId'];
        }
    }
    function display()
    {
        // retrieve the content item and return the output via the plugin display function
        $contentItem = ModUtil::apiFunc('Content', 'Content', 'getContent', array('id' => $this->contentitemid));
        
        if ($contentItem != false) {
            $output = $contentItem['plugin']->displayStart();
            $output .= $contentItem['plugin']->display();
            $output .= $contentItem['plugin']->displayEnd();
        } else {
            $output = '';
        }
        
        return $output;
    }
    function displayEditing()
    {
        $output = $this->__f('Displays existing Content Item [ID %1$s], Type: %2$s, Module %3$s, Source Page %4$s', array($this->contentitemid, $this->contentitemtype, $this->contentitemmod, $this->contentitempage));
        return $output;
    }
    function getDefaultData()
    {
        return array(
            'contentitemid' => '', 
            'contentitemtype' => '', 
            'contentitemmod' => '',
            'contentitempage' => '');
    }
}