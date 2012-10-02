<?php
/**
 * Tabbed panel set
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: block.pnformtabbedpanelset.php 28067 2010-01-07 18:59:04Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */

/**
 * Tabbed panel set
 *
 * This plugin is used to create a set of panels with their own tabs for selection.
 * The actual visibility management is handled in JavaScript by setting the CSS styling
 * attribute "display" to "hidden" or not hidden. Default styling of the tabs is rather rudimentary
 * but can be improved a lot with the techniques found at www.alistapart.com.
 * Usage:
 * <code>
 * <!--[pnformtabbedpanelset]-->
 *   <!--[pnformtabbedpanel title="Tab A"]-->
 *     ... content of first tab ...
 *   <!--[/pnformtabbedpanel]-->
 *   <!--[pnformtabbedpanel title="Tab B"]-->
 *     ... content of second tab ...
 *   <!--[/pnformtabbedpanel]-->
 * <!--[/pnformtabbedpanelset]-->
 * </code>
 * You can place any pnForms plugins inside the individual panels. The tabs 
 * require some special styling which is handled by the styles in system/pnForm/pnstyle/style.css.
 * If you want to override this styling then either copy the styles to another stylesheet in the
 * templates directory or change the cssClass attribute to something different than the default
 * class name.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormTabbedPanelSet extends pnFormPlugin
{
    /**
     * CSS class name for styling
     * @var string
     */
    var $cssClass = 'linktabs';

    /**
     * Currently selected tab
     * @var int
     */
    var $selectedIndex = 1;

    /**
     * Registered tab titles
     * @var string-array
     * @internal
     */
    var $titles = array();

    /**
     * Internal tab index counter
     * @var int
     */
    var $registeredTabIndex = 1;


    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function renderContent(&$render, $content)
    {
        // Beware - working on 1-based offset!

        static $first = true;
        if ($first)
        {
            PageUtil::addVar('javascript', 'javascript/ajax/prototype.js');
            PageUtil::addVar('javascript', 'system/pnForm/pnjavascript/pnform_tabbedpanelset.js');
            PageUtil::addVar('stylesheet', ThemeUtil::getModuleStylesheet('pnForm'));
            PageUtil::addVar('footer', "<script type=\"text/javascript\">$$('.tabsToHide').invoke('hide')</script>");
        }

        $first = false;

        $idHtml = $this->getIdHtml();

        $html = "<div class=\"{$this->cssClass}\"{$idHtml}><ul><li>&nbsp;</li>\n";

        for ($i=1, $titleCount=count($this->titles); $i<=$titleCount; ++$i)
        {
            $title = $this->titles[$i-1];

            $cssClass = 'linktab';
            $selected = ($i == $this->selectedIndex);

            $title = $render->pnFormTranslateForDisplay($title);

            if ($selected)
            {
                $cssClass .= ' selected';
            }

            $link = "<a href=\"#\" onclick=\"return pnFormTabbedPanelSet.handleTabClick($i,$titleCount,'{$this->id}')\">$title</a>";

            $html .= "<li id=\"{$this->id}Tab_{$i}\" class=\"$cssClass\">$link</li><li>&nbsp;</li>\n";
        }

        $html .= "</ul></div><div style=\"clear: both\"></div>\n";

        $html .= "<input type=\"hidden\" name=\"{$this->id}SelectedIndex\" id=\"{$this->id}SelectedIndex\" value=\"{$this->selectedIndex}\"/>\n";

        return $html . $content;
    }


    // Called by child panels to register themselves
    function registerTabbedPanel(&$render, &$panel, $title)
    {
        $panel->panelSetId = $this->id;
        if (!$render->pnFormIsPostBack())
        {
            $panel->index = $this->registeredTabIndex++;
            $this->titles[] = $title;
        }
        $panel->selected = ($this->selectedIndex == $panel->index);
    }


    function decode(&$render)
    {
        $this->selectedIndex = (int)FormUtil::getPassedValue("{$this->id}SelectedIndex", 1);
    }
}


function smarty_block_pnformtabbedpanelset($params, $content, &$render)
{
    return $render->pnFormRegisterBlock('pnFormTabbedPanelSet', $params, $content);
}
