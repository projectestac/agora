<?php
/**
 * Tabbed panel element
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: block.pnformtabbedpanel.php 24993 2008-12-07 09:22:34Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */

/**
 * Tabbel panel element
 *
 * Use this with the {@link pnFormTabbedPanelSet}.
 *
 * @package pnForm
 * @subpackage Plugins
*/
class pnFormTabbedPanel extends pnFormPlugin
{
    /**
     * Panel title
     * @var string
     */
    var $title;

    /**
     * Panel selected status
     * @internal
     * @var bool
     */
    var $selected;

    /**
     * ID of parent panel set (don't touch)
     * @internal
     */
    var $panelSetId;

    /**
     * Panel index (don't touch)
     * @internal
     */
    var $index;


    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render, &$params)
    {
        $this->selected = false;
    }


    function renderBegin(&$render)
    {
        // Locate parent panelset and register with it
        $panelSet = &$this->parentPlugin;

        while ($panelSet != null  &&  strcasecmp(get_class($panelSet),'pnformtabbedpanelset') != 0)
          $panelSet = &$panelSet->parentPlugin;

        if ($panelSet != null)
          $panelSet->registerTabbedPanel($render, $this, $this->title);

        $class = ($this->selected ? '' : 'class="tabsToHide"');
        $html = "<div id=\"{$this->panelSetId}_{$this->index}\"$class>\n";
        return $html;
    }


    function renderEnd(&$render)
    {
        $html = "</div>\n";
        return $html;
    }
}


function smarty_block_pnformtabbedpanel($params, $content, &$render)
{
    return $render->pnFormRegisterBlock('pnFormTabbedPanel', $params, $content);
}
