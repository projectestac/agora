<?php
/**
* Content YouTube plugin
*
* @copyright (C) 2007-2009, Content Development Team
* @link http://code.zikula.org/content
* @license See license.txt
*/

class Content_ContentType_Vimeo extends Content_AbstractContentType
{
    protected $url;
    protected $width;
    protected $height;
    protected $text;
    protected $clipId;
    protected $displayMode;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getClipId()
    {
        return $this->clipId;
    }

    public function setClipId($clipId)
    {
        $this->clipId = $clipId;
    }

    public function getDisplayMode()
    {
        return $this->displayMode;
    }

    public function setDisplayMode($displayMode)
    {
        $this->displayMode = $displayMode;
    }

    function getTitle()
    {
        return $this->__('Vimeo video clip');
    }
    function getDescription()
    {
        return $this->__('Display Vimeo video clip.');
    }
    function isTranslatable() 
    { 
        return true;
    }
    function loadData(&$data)
    {
        $this->url = $data['url'];
        $this->width = $data['width'];
        $this->height = $data['height'];
        $this->text = $data['text'];
        $this->clipId = $data['clipId'];
        $this->displayMode = isset($data['displayMode']) ? $data['displayMode'] : 'inline';
    }
    function display()
    {
        $this->view->assign('url', $this->url);
        $this->view->assign('width', $this->width);
        $this->view->assign('height', $this->height);
        $this->view->assign('text', $this->text);
        $this->view->assign('clipId', $this->clipId);
        $this->view->assign('displayMode', $this->displayMode);

        return $this->view->fetch($this->getTemplate());
    }
    function displayEditing()
    {
        $output = '<div style="background-color:Lavender; width:' . $this->width . 'px; height:' . $this->height . 'px; margin:0 auto; padding:10px;">Video-ID : ' . $this->clipId . '</div>';
        $output .= '<p style="width:' . $this->width . 'px; margin:0 auto;">' . DataUtil::formatForDisplay($this->text) . '</p>';
        return $output;
    }
    function getDefaultData()
    {
        return array('url' => '',
        'width' => '425',
        'height' => '340',
        'text' => '',
        'clipId' => '',
        'displayMode' => 'inline');
    }
    function isValid(&$data)
    {
        $r = '/vimeo.com\/([-a-zA-Z0-9_]+)/';
        if (preg_match($r, $data['url'], $matches))
        {
            $this->clipId = $data['clipId'] = $matches[1];
            return true;
        }
       
        //$message = $this->__('Error! Unrecognized Vimeo URL');
        return false;
    }
}