<?php

/**
 * Content computer code plugin
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_ContentType_ComputerCode extends Content_AbstractContentType
{

    protected $text;
    protected $codeFilter;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    function getTitle()
    {
        return $this->__('Computer Code');
    }

    function getDescription()
    {
        return $this->__('A text editor for computer code. Line numbers are added to the text and it is displayed in a monospaced font.');
    }

    function loadData(&$data)
    {
        if (!isset($data['codeFilter'])) {
            $data['codeFilter'] = 'native';
        }
        $this->text = $data['text'];
        $this->codeFilter = $data['codeFilter'];
    }

    function display()
    {
        if (ModUtil::available('BBCode') && ($this->codeFilter == 'bbcode')) {
            $code = '[code]' . $this->text . '[/code]';
            PageUtil::addVar('stylesheet', 'modules/BBCode/style/style.css');
            return ModUtil::apiFunc('BBCode', 'User', 'transform', array('message' => $code));
        } else {
            return $this->transformCode($this->text, true);
        }
    }

    function displayEditing()
    {
        // <pre> does not work in IE 7 with the portal javascript
        return $this->transformCode($this->text, false);
    }
    
    public function startEditing() {
        if (isset($this->codeFilter)) {
            $this->view->assign('codeFilter', $this->codeFilter);
        }
    }

    function getDefaultData()
    {
        return array(
            'text' => '',
            'codeFilter' => 'native');
    }

    function getSearchableText()
    {
        return html_entity_decode(strip_tags($this->text));
    }

    function transformCode($code, $usePre)
    {
        $lines = explode("\n", $code);
        $html = "<div class=\"content-computercode\"><ol class=\"codelisting\">\n";

        for ($i = 1, $cou = count($lines); $i <= $cou; ++$i) {
            if ($usePre) {
                $line = empty($lines[$i - 1]) ? ' ' : htmlspecialchars($lines[$i - 1]);
                $line = '<div><pre>' . $line . '</pre></div>';
            } else {
                $line = empty($lines[$i - 1]) ? '&nbsp;' : htmlspecialchars($lines[$i - 1]);
                $line = str_replace(' ', '&nbsp;', $line);
                $line = '<div>' . $line . '</div>';
            }
            $html .= "<li>$line</li>\n";
        }

        $html .= "</ol></div>\n";

        return $html;
    }

}