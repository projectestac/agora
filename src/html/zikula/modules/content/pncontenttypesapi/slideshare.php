<?php
/**
 * Content Slideshare plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: slideshare.php 376 2010-01-06 13:58:00Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_SlidesharePlugin extends contentTypeBase
{
    var $url;
    var $text;
    var $slideId;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'slideshare';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Slideshare', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Display slides from slideshare.com', $dom);
    }
    function isTranslatable()
    {
        return true;
    }

    function loadData($data)
    {
        $this->url = $data['url'];
        $this->text = $data['text'];
        $this->slideId = $data['slideId'];
    }

    function display()
    {
        $render = & pnRender::getInstance('content', false);
        $render->assign('url', $this->url);
        $render->assign('text', $this->text);
        $render->assign('slideId', $this->slideId);

        return $render->fetch('contenttype/slideshare_view.html');
    }

    function displayEditing()
    {
        $output = '<div style="background-color:grey; width:320px; height:200px; margin:0 auto;"></div>';
        $output .= '<p style="width:320px; margin:0 auto;">' . DataUtil::formatForDisplay($this->text) . '</p>';
        return $output;
    }

    function getDefaultData()
    {
        return array('url' => '', 'text' => '', 'slideId' => '');
    }

    function isValid(&$data, &$message)
    {
        $dom = ZLanguage::getModuleDomain('content');
        // [slideshare id=525876&doc=oscon2008voicemashups-1216853182252884-9&w=425]
        $r = '/^[slideshare id=[0-9]+\&doc=([^&]+?)\]/';
        if (preg_match($r, $data['url'], $matches)) {
            $this->slideId = $data['slideId'] = $matches[1];
            return true;
        }
        $message = __('Not valid Slideshare Wordpress embed code', $dom);
        return false;
    }
}

function content_contenttypesapi_Slideshare($args)
{
    return new content_contenttypesapi_SlidesharePlugin($args['data']);
}

