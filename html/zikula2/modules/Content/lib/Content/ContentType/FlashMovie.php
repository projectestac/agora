<?php

/**
 * Content flash movie plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_ContentType_FlashMovie extends Content_AbstractContentType
{
    protected $text;
    protected $width;
    protected $height;
    protected $videoPath;
    protected $displayMode;
    protected $author;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
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

    public function getVideoPath()
    {
        return $this->videoPath;
    }

    public function setVideoPath($videoPath)
    {
        $this->videoPath = $videoPath;
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
        return $this->__('Flash video file');
    }

    function getDescription()
    {
        return $this->__('Display a Flash video.');
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    function isTranslatable()
    {
        return true;
    }

    function loadData(&$data)
    {
        $this->text = $data['text'];
        $this->width = $data['width'];
        $this->height = $data['height'];
        $this->videoPath = $data['videoPath'];
        $this->displayMode = isset($data['displayMode']) ? $data['displayMode'] : 'inline';
        $this->author = $data['author'];
    }

    function display()
    {
        $this->view->assign('text', $this->text)
                   ->assign('width', $this->width)
                   ->assign('height', $this->height)
                   ->assign('videoPath', $this->videoPath)
                   ->assign('displayMode', $this->displayMode)
                   ->assign('author', $this->author);

        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        $output = '<div style="background-color:Lavender; width:320px; height:200px; margin:0 auto; padding:10px;">'.__f('Flash Video-Path: %1$s<br>Size in pixels: %2$s', array($this->videoPath, $this->width.'x'.$this->height)) . '</div>';
        $output .= '<p style="width:320px; margin:0 auto;">' . __f('Video description: %s', DataUtil::formatForDisplay($this->text)) . '</p>';
        return $output;
    }

    function getDefaultData()
    {
        return array('text' => '',
            'videoPath' => '',
            'displayMode' => 'inline',
            'width' => '640',
            'height' => '498',
            'author' => '');
    }

    function isValid(&$data)
    {
        return true;
        if (file_exists($data['videoPath']) && is_file($data['videoPath'])) {
            $this->videoPath = $data['videoPath'];
            return true;
        }
        return false;
    }
}
