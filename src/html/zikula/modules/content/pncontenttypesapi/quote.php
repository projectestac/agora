<?php
/**
 * Content quote plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: quote.php 371 2010-01-05 16:15:52Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_quotePlugin extends contentTypeBase
{
    var $text;
    var $inputType;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'quote';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Quote', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('A highlighted quote with source.', $dom);
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

        $text = pnModCallHooks('item', 'transform', '', array($text));
        $text = $text[0];

        $render = & pnRender::getInstance('content', false);
        $render->assign('source', $source);
        $render->assign('text', $text);
        $render->assign('desc', $desc);

        return $render->fetch('contenttype/quote_view.html');
    }

    function displayEditing()
    {
        $text = DataUtil::formatForDisplayHTML($this->text);
        $source = DataUtil::formatForDisplayHTML($this->source);
        $desc = DataUtil::formatForDisplayHTML($this->desc);

        $text = pnModCallHooks('item', 'transform', '', array($text));
        $text = trim($text[0]);

        $text = '<div class="content-quote"><blockquote>' . $text . '</blockquote><p>-- ' . $desc . '</p></div>';

        return $text;
    }

    function getDefaultData()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return array('text' => __('Add quote text here...', $dom), 'source' => __('http://', $dom), 'desc' => __('Name of the Source', $dom));
    }

    function startEditing(&$render)
    {
        $scripts = array('javascript/ajax/prototype.js', 'javascript/ajax/pnajax.js');
        PageUtil::addVar('javascript', $scripts);
    }

    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }
}

function content_contenttypesapi_quote($args)
{
    return new content_contenttypesapi_quotePlugin();
}