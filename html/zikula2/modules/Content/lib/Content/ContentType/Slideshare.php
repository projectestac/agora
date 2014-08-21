<?php
/**
 * Content Slideshare plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

class Content_ContentType_Slideshare extends Content_AbstractContentType
{
    protected $url;
    protected $text;
    protected $slideId;
    protected $playerType;
    protected $width;
    protected $height;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getSlideId()
    {
        return $this->slideId;
    }

    public function setSlideId($slideId)
    {
        $this->slideId = $slideId;
    }

    public function getPlayerType()
    {
        return $this->playerType;
    }

    public function setPlayerType($playerType)
    {
        $this->playerType = $playerType;
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

    function getTitle()
    {
        return $this->__('Slideshare');
    }
    function getDescription()
    {
        return $this->__('Display slides from slideshare.com');
    }
    function isTranslatable()
    {
        return true;
    }
    function loadData(&$data)
    {
        $this->url = $data['url'];
        $this->text = $data['text'];
        $this->slideId = $data['slideId'];
        $this->playerType = $data['playerType'];
        $this->width = $data['width'];
        $this->height = $data['height'];
    }
    function display()
    {
        $this->view->assign('url', $this->url);
        $this->view->assign('text', $this->text);
        $this->view->assign('slideId', $this->slideId);
        $this->view->assign('playerType', $this->playerType);
        $this->view->assign('width', $this->width);
        $this->view->assign('height', $this->height);

        return $this->view->fetch($this->getTemplate());
    }
    function displayEditing()
    {
        $output = '<div style="background-color:#ddd; width:320px; height:200px; margin:0 auto; padding:15px;">' . $this->__f('Slideshare: %s', $this->slideId) . '</div>';
        $output .= '<p style="width:320px; margin:0 auto;">' . DataUtil::formatForDisplay($this->text) . '</p>';
        return $output;
    }
    function getDefaultData()
    {
        return array('url' => '', 'text' => '', 'slideId' => '', 'playerType' => '0', 'width' => 425, 'height' => 355);
    }
    function isValid(&$data)
    {
        // [slideshare id=3318451&doc=rainfallreport-100302124103-phpapp02&type=d]
        // type=d is optional and player ssplayerd.swf should be used instead of the default one
        // Old expression without type=d $r = '/^[slideshare id=[0-9]+\&doc=([^&]+?)\]/';
        $r = '/^[slideshare id=[0-9]+\&doc=([^&]+?)\&([^&]+)\]/';
        if (preg_match($r, $data['url'], $matches)) {
            $this->slideId = $data['slideId'] = $matches[1];
            if (!empty($matches[2]) && $matches[2]=='type=d') {
                $this->playerType = $data['playerType'] = 1;
            } else {
                $this->playerType = $data['playerType'] = 0;
            }
            return true;
        }
        return false;
    }
}