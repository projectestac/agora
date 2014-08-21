<?php

/**
 * Content html plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_ContentType_Html extends Content_AbstractContentType
{
    protected $text;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    function getTitle()
    {
        return $this->__('HTML markup text');
    }

    function getDescription()
    {
        return $this->__('HTML editor for adding markup text to your page.');
    }

    function isTranslatable()
    {
        return true;
    }

    function loadData(&$data)
    {
        $this->text = $data['text'];
    }

    function display()
    {
        $this->view->assign('text', DataUtil::formatForDisplayHTML($this->text));
        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        return $this->display();
    }

    function getDefaultData()
    {
        return array('text' => $this->__('Add text here...'));
    }

    function startEditing()
    {
        PageUtil::addVar('javascript', array('javascript/ajax/prototype.js', 'javascript/helpers/Zikula.js'));
        $this->view->assign('cid', $this->contentId);
    }

    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }

    public function getTemplate()
    {
        $this->view->setCacheId($this->contentId);
        return 'contenttype/html_view.tpl';
    }

	/* Override method for simple template inclusion */
    public function getEditTemplate()
    {
        return 'contenttype/html_edit.tpl';
    }
	

}