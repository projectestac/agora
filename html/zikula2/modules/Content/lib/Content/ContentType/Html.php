<?php

/**
 * Content html plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_ContentType_Html extends Content_AbstractContentType
{
    protected $text;
    protected $inputType;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getInputType()
    {
        return $this->inputType;
    }

    public function setInputType($inputType)
    {
        $this->inputType = $inputType;
    }

    function getTitle()
    {
        return $this->__('HTML text');
    }

    function getDescription()
    {
        return $this->__('A rich HTML editor for adding text to your page.');
    }

    function isTranslatable()
    {
        return true;
    }

    function loadData(&$data)
    {
        if (!isset($data['inputType'])) {
            $data['inputType'] = 'html';
        }
        if (!ModUtil::available('Scribite') && $data['inputType'] == 'html') {
            $data['inputType'] = 'text';
        }
        $this->text = $data['text'];
        $this->inputType = $data['inputType'];
    }

    function display()
    {
        if ($this->inputType == 'raw') {
            $text = DataUtil::formatForDisplay($this->text);
        } else {
            $text = $this->activateinternallinks(DataUtil::formatForDisplayHTML($this->text));
        }

        $this->view->assign('inputType', $this->inputType);
        $this->view->assign('text', $text);

        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        return $this->display();
    }

    function getDefaultData()
    {
        return array(
            'text' => $this->__('Add text here ...'),
            'inputType' => (ModUtil::available('Scribite') ? 'html' : 'text'));
    }

    function startEditing()
    {
        $scripts = array('javascript/ajax/prototype.js', 'javascript/helpers/Zikula.js');
        PageUtil::addVar('javascript', $scripts);
        if (isset($this->inputType)) {
            $this->view->assign('pluginInputType', $this->inputType);
        }
    }

    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->activateinternallinks($this->text)));
    }

    function activateinternallinks($text)
    {
        $text = preg_replace_callback("/\[\[link-([0-9]+)(?:\|(.+?))?\]\]/", create_function(
                                '$hits',
                                'if ($hits[2]) { return "<a href=\"".ModUtil::url("Content", "user", "view", array("pid" => $hits[1]))."\">".$hits[2]."</a>"; } else {
          $page = ModUtil::apiFunc("Content", "Page", "getPage", array("pid" => $hits[1]));
          if ($page === false) { return "";}
          return "<a href=\"".ModUtil::url("Content", "user", "view", array("pid" => $hits[1]))."\">".$page["title"]."</a>";
          }'
                        ), $text);
        if (ModUtil::available('crptag')) {
            $text = preg_replace_callback("/\[\[tag-([0-9]+)(?:\|(.+?))?\]\]/", create_function(
                                    '$hits',
                                    '$title = $hits[1];
              if ($hits[2]) { $title = $hits[2]; }
              return "<a href=\"".ModUtil::url("crpTag", "user", "display", array("id" => $hits[1]))."\">".$title."</a>";
              '
                            ), $text);
        }
        return $text;
    }

    public function getTemplate()
    {
        $this->view->setCacheId($this->contentId);
        return 'contenttype/paragraph_view.tpl';
    }

}