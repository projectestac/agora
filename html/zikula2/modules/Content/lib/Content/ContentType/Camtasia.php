<?php

/**
 * Content camtasia plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_ContentType_Camtasia extends Content_AbstractContentType
{
    protected $text;
    protected $width;
    protected $height;
    protected $videoPath;
    protected $displayMode;
    protected $folder;
    protected $author;
    protected $thumbwidth;
    protected $thumbheight;

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

    public function getThumbWidth()
    {
        return $this->thumbwidth;
    }

    public function setThumbWidth($width)
    {
        $this->thumbwidth = $width;
    }
    
    public function getThumbHeight()
    {
        return $this->thumbheight;
    }

    public function setThumbHeight($height)
    {
        $this->thumbheight = $height;
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

    public function getFolder()
    {
        return $this->folder;
    }

    public function setFolder($folder)
    {
        $this->folder = $folder;
    }

    function getTitle()
    {
        return $this->__('Camtasia Flash video');
    }

    function getDescription()
    {
        return $this->__('Display a Camtasia Flash video.');
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
        $this->folder = $data['folder'];
        $this->author = $data['author'];
        $this->thumbwidth = $data['thumbwidth'];
        $this->thumbheight = $data['thumbheight'];
    }

    function display()
    {
        $this->view->assign('text', $this->text);
        $this->view->assign('width', $this->width);
        $this->view->assign('height', $this->height);
        $this->view->assign('videoPath', $this->videoPath);
        $this->view->assign('displayMode', $this->displayMode);
        $this->view->assign('folder', $this->folder);
        $this->view->assign('author', $this->author);
        $this->view->assign('thumbwidth', $this->thumbwidth);
        $this->view->assign('thumbheight', $this->thumbheight);

        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        $output = '<div style="background-color:Lavender; width:320px; height:200px; margin:0 auto; padding:10px;">'.__f('Flash Video-Path: %1$s<br>Size in pixels: %2$s', array($this->folder.'/'.$this->videoPath, $this->width.'x'.$this->height)) . '<img width="300" height="140" src="'.$this->folder.'/'.$this->videoPath.'/FirstFrame.png" alt="" /></div>';
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
            'folder' => 'camtasia',
            'author' => '',
            'thumbwidth' => '48',
            'thumbheight' => '48');
    }

    function isValid(&$data)
    {
        if (is_file($data['folder'] . '/' . $data['videoPath'] . '/' . $data['videoPath'] . '_controller.swf')) {
            $this->videoPath = $data['videoPath'];
            return true;
        }
        return false;
    }

    function altisValid(&$data)
    {
        $videoPath = $data['folder'] . '/' . $data['videoPath'] . '/' . $data['videoPath'] . '_controller.swf';
        //'camtasia/'.$data['videoPath'].'/'.$data['videoPath'].'_controller.swf';

        if (is_file($data['videoPath'])) {
            $this->videoPath = $data['videoPath'];
            return true;
        }
        return false;
    }
}