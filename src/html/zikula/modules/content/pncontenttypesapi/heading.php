<?php
/**
 * Content heading plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: heading.php 370 2010-01-05 12:47:12Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_headingPlugin extends contentTypeBase
{
    var $text;
    var $headerSize;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'heading';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Heading', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Section heading for structuring larger amounts of text.', $dom);
    }
    function isTranslatable()
    {
        return true;
    }

    function loadData($data)
    {
        if (!isset($data['headerSize']))
            $data['headerSize'] = 'h3';
        $this->text = $data['text'];
        $this->headerSize = $data['headerSize'];
    }

    function display()
    {
        $render = & pnRender::getInstance('content', false);
        $render->assign('text', DataUtil::formatForDisplayHTML($this->text));
        $render->assign('headerSize', DataUtil::formatForDisplayHTML($this->headerSize));
        $render->assign('contentId', $this->contentId);
        return $render->fetch('contenttype/heading_view.html');
    }

    function displayEditing()
    {
        $render = & pnRender::getInstance('content', false);
        $render->assign('text', DataUtil::formatForDisplayHTML($this->text));
        $render->assign('headerSize', DataUtil::formatForDisplayHTML($this->headerSize));
        $render->assign('contentId', $this->contentId);
        return $render->fetch('contenttype/heading_view.html');
    }

    function getDefaultData()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return array('text' => __('Heading', $dom), 'headerSize' => 'h3');
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

function content_contenttypesapi_heading($args)
{
    return new content_contenttypesapi_headingPlugin();
}

