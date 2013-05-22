<?php
/**
 * Content unfiltered text plugin
 *
 * @copyright (C) 2007-2011, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

class Content_ContentType_Unfiltered extends Content_AbstractContentType
{
    protected $text;
    protected $useiframe;
    protected $iframetitle;
    protected $iframename;
    protected $iframesrc;
    protected $iframestyle;
    protected $iframewidth;
    protected $iframeheight;
    protected $iframeborder;
    protected $iframescrolling;
    protected $iframeallowtransparancy;

    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
    }
    public function getUseiframe()
    {
        return $this->useiframe;
    }
    public function setUseiframe($useiframe)
    {
        $this->useiframe = $useiframe;
    }
    public function getIframetitle()
    {
        return $this->iframetitle;
    }
    public function setIframetitle($iframetitle)
    {
        $this->iframetitle = $iframetitle;
    }
    public function getIframename()
    {
        return $this->iframename;
    }
    public function setIframename($iframename)
    {
        $this->iframename = $iframename;
    }
    public function getIframesrc()
    {
        return $this->iframesrc;
    }
    public function setIframesrc($iframesrc)
    {
        $this->iframesrc = $iframesrc;
    }
    public function getIframestyle()
    {
        return $this->iframestyle;
    }
    public function setIframestyle($iframestyle)
    {
        $this->iframestyle = $iframestyle;
    }
    public function getIframewidth()
    {
        return $this->iframewidth;
    }
    public function setIframewidth($iframewidth)
    {
        $this->iframewidth = $iframewidth;
    }
    public function getIframeheight()
    {
        return $this->iframeheight;
    }
    public function setIframeheight($iframeheight)
    {
        $this->iframeheight = $iframeheight;
    }
    public function getIframeborder()
    {
        return $this->iframeborder;
    }
    public function setIframeborder($iframeborder)
    {
        $this->iframeborder = $iframeborder;
    }
    public function getIframescrolling()
    {
        return $this->iframescrolling;
    }
    public function setIframescrolling($iframescrolling)
    {
        $this->iframescrolling = $iframescrolling;
    }
    public function getIframeallowtransparancy()
    {
        return $this->iframeallowtransparancy;
    }
    public function setIframeallowtransparancy($iframeallowtransparancy)
    {
        $this->iframeallowtransparancy = $iframeallowtransparancy;
    }

    function getTitle()
    {
        return $this->__('Unfiltered raw text');
    }
    function getDescription()
    {
        return $this->__('A plugin for unfiltered raw output (iframes, JavaScript, banners, etc)');
    }
    function isTranslatable()
    {
        return true;
    }
    function isActive()
    {
        // Only active when the admin has enabled this plugin
        if (ModUtil::getVar('Content', 'enableRawPlugin')) {
            return true;
        } else {
            return false;
        }
    }
    function loadData(&$data)
    {
        $this->text = $data['text'];
        $this->useiframe = $data['useiframe'];
        $this->iframetitle = $data['iframetitle'];
        $this->iframename = $data['iframename'];
        $this->iframesrc = $data['iframesrc'];
        $this->iframestyle = $data['iframestyle'];
        $this->iframewidth = $data['iframewidth'];
        $this->iframeheight = $data['iframeheight'];
        $this->iframeborder = $data['iframeborder'];
        $this->iframescrolling = $data['iframescrolling'];
        $this->iframeallowtransparancy = $data['iframeallowtransparancy'];
    }

    function display()
    {
        $this->view->assign('text', $this->text);
        $this->view->assign('useiframe', $this->useiframe);
        $this->view->assign('iframetitle', $this->iframetitle);
        $this->view->assign('iframename', $this->iframename);
        $this->view->assign('iframesrc', $this->iframesrc);
        $this->view->assign('iframestyle', $this->iframestyle);
        $this->view->assign('iframewidth', $this->iframewidth);
        $this->view->assign('iframeheight', $this->iframeheight);
        $this->view->assign('iframeborder', $this->iframeborder);
        $this->view->assign('iframescrolling', $this->iframescrolling);
        $this->view->assign('iframeallowtransparancy', $this->iframeallowtransparancy);
        return $this->view->fetch($this->getTemplate());
    }

    function displayEditing()
    {
        if ($this->useiframe) {
            $output = '<div style="background-color:Lavender; padding:10px;">' . $this->__f('An <strong>iframe</strong> is included with<br />src = %1$s<br />width = %2$s and height = %3$s', array($this->iframesrc, $this->iframewidth, $this->iframeheight)) . '</div>';
        } else {
            $output = '<div style="background-color:Lavender; padding:10px;">' . $this->__f('The following <strong>unfiltered text</strong> will be included literally<br />%s', DataUtil::formatForDisplay($this->text)) . '</div>';
        }
        return $output;
    }

    function getDefaultData()
    {
        return array(
            'text' => $this->__('Add unfiltered text here ...'),
            'useiframe' => false,
            'iframetitle' => '',
            'iframename' => '',
            'iframesrc' => '',
            'iframestyle' => 'border:0',
            'iframewidth' => '800',
            'iframeheight' => '600',
            'iframeborder' => '0',
            'iframescrolling' => 'no',
            'iframeallowtransparancy' => true
            );
    }
    function startEditing()
    {
        $scripts = array('javascript/ajax/prototype.js');
        PageUtil::addVar('javascript', $scripts);
    }
}