<?php
/**
 * Content quote plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

class Content_ContentType_Quote extends Content_AbstractContentType
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
        return $this->__('Quote');
    }
    function getDescription()
    {
        return $this->__('A highlighted quote with source.');
    }
    function isTranslatable()
    {
        return true;
    }
    function loadData(&$data)
    {
        $this->text = $data['text'];
        $this->source = $data['source'];
        $this->desc = $data['desc'];
    }
    function display()
    {
        $text = DataUtil::formatForDisplayHTML($this->text);
        $source = DataUtil::formatForDisplayHTML($this->source);
        $desc = DataUtil::formatForDisplayHTML($this->desc);

        $this->view->assign('source', $source);
        $this->view->assign('text', $text);
        $this->view->assign('desc', $desc);

        return $this->view->fetch($this->getTemplate());
    }
    function displayEditing()
    {
        $text = DataUtil::formatForDisplayHTML($this->text);
        $source = DataUtil::formatForDisplayHTML($this->source);
        $desc = DataUtil::formatForDisplayHTML($this->desc);

        // this event should be moved to the template
        $event = new Zikula_Event('content.hook.contentitem.ui.filter', $this->view, array('caller' => $this->getModule()), $text);
        $text = $this->view->getEventManager()->notify($event)->getData();

        $text = '<div class="content-quote"><blockquote>' . $text . '</blockquote><p>-- ' . $desc . '</p></div>';

        return $text;
    }
    function getDefaultData()
    {
        return array(
            'text' => $this->__('Add quote text here...'),
            'source' => 'http://',
            'desc' => $this->__('Name of the Source'));
    }
    function startEditing()
    {
        $scripts = array('javascript/ajax/prototype.js', 'javascript/helpers/Zikula.js');
        PageUtil::addVar('javascript', $scripts);
    }
    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }
}