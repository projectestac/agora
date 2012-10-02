<?php
/**
 * Content YouTube plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: youtube.php 375 2010-01-06 13:34:29Z herr.vorragend $
 * @license See license.txt
 */

class content_contenttypesapi_YouTubePlugin extends contentTypeBase
{
    var $url;
    var $text;
    var $videoId;
    var $displayMode;

    function getModule()
    {
        return 'content';
    }
    function getName()
    {
        return 'youtube';
    }
    function getTitle()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('YouTube video clip', $dom);
    }
    function getDescription()
    {
        $dom = ZLanguage::getModuleDomain('content');
        return __('Display YouTube video clip.', $dom);
    }
    function isTranslatable()
    {
        return true;
    }

    function loadData($data)
    {
        $this->url = $data['url'];
        $this->text = $data['text'];
        $this->videoId = $data['videoId'];
        $this->displayMode = isset($data['displayMode']) ? $data['displayMode'] : 'inline';
    }

    function display()
    {
        $render = & pnRender::getInstance('content', false);
        $render->assign('url', $this->url);
        $render->assign('text', $this->text);
        $render->assign('videoId', $this->videoId);
        $render->assign('displayMode', $this->displayMode);

        return $render->fetch('contenttype/youtube_view.html');
    }

    function displayEditing()
    {
        $output = '<div style="background-color:grey; width:320px; height:200px; margin:0 auto; padding:10px;">Video-ID : ' . $this->videoId . '</div>';
        $output .= '<p style="width:320px; margin:0 auto;">' . DataUtil::formatForDisplay($this->text) . '</p>';
        return $output;
    }

    function getDefaultData()
    {
        return array('url' => '', 'text' => '', 'videoId' => '', 'displayMode' => 'inline');
    }

    function isValid(&$data, &$message)
    {
        $r = '/\?v=([-a-zA-Z0-9_]+)(&|$)/';
        if (preg_match($r, $data['url'], $matches)) {
            $this->videoId = $data['videoId'] = $matches[1];
            return true;
        }
        $message = __('Unrecognized YouTube URL', $dom);
        return false;
    }
}

function content_contenttypesapi_YouTube($args)
{
    return new content_contenttypesapi_YouTubePlugin($args['data']);
}

