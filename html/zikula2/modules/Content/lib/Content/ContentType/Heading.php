<?php
/**
 * Content heading plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_ContentType_Heading extends Content_AbstractContentType
{
    protected $text;
    protected $headerSize;
    protected $anchorName;
    protected $displayPageTitle;

    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
    }

    public function getHeaderSize()
    {
        return $this->headerSize;
    }
    public function setHeaderSize($headerSize)
    {
        $this->headerSize = $headerSize;
    }

    public function getAnchorName()
    {
        return $this->anchorName;
    }
    public function setAnchorName($anchorName)
    {
        $this->anchorName = $anchorName;
    }

    public function getDisplayPageTitle()
    {
        return $this->displayPageTitle;
    }
    public function setDisplayPageTitle($displayPageTitle)
    {
        $this->displayPageTitle = $displayPageTitle;
    }

    public function getTitle()
    {
        return $this->__('Heading');
    }
    
    public function getDescription()
    {
        return $this->__('Section heading (or page title) for structuring large amounts of text.');
    }
    
    public function isTranslatable()
    {
        return true;
    }

    public function loadData(&$data)
    {
        $this->text = isset($data['text']) ? $data['text'] : '';
        $this->headerSize = isset($data['headerSize']) ? $data['headerSize'] : 'h3';
        $this->anchorName = isset($data['anchorName']) ? $data['anchorName'] : '';
        $this->displayPageTitle = isset($data['displayPageTitle']) ? $data['displayPageTitle'] : false;
    }

    public function display()
    {
        $this->view->assign('text', DataUtil::formatForDisplayHTML($this->text));
        $this->view->assign('headerSize', DataUtil::formatForDisplayHTML($this->headerSize));
        $this->view->assign('anchorName', DataUtil::formatForDisplayHTML($this->anchorName));
        $this->view->assign('displayPageTitle', $this->displayPageTitle);
        $this->view->assign('contentId', $this->contentId);
        $page = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
                    'id' => $this->getPageId(),
                    'includeContent' => false,
                    'includeLayout' => false));
        $title = $page['title'];            
        $this->view->assign('title', $title);
        return $this->view->fetch($this->getTemplate());
    }
    
    public function displayEditing()
    {
        // just show the header itself during page editing
        $this->view->assign('text', DataUtil::formatForDisplayHTML($this->text));
        $this->view->assign('headerSize', DataUtil::formatForDisplayHTML($this->headerSize));
        $this->view->assign('anchorName', DataUtil::formatForDisplayHTML($this->anchorName));
        $this->view->assign('displayPageTitle', $this->displayPageTitle);
        $this->view->assign('contentId', $this->contentId);
        return $this->view->fetch($this->getTemplate());
    }
    
    public function getDefaultData()
    {
        return array('text' => $this->__('Heading'), 
            'headerSize' => 'h3', 
            'anchorName' => '', 
            'displayPageTitle' => false);
    }
    
    public function startEditing()
    {
        $scripts = array('javascript/ajax/prototype.js', 'javascript/helpers/Zikula.js');
        PageUtil::addVar('javascript', $scripts);
    }
    
    public function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }
}