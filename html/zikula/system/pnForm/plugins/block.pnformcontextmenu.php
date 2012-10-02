<?php
/**
 * Context menu plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformdateinput.php 21129 2007-01-19 19:08:26Z jornlind $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */


/**
 * Context menu plugin
 *
 * This plugin creates a popup menu to be used as a right-click context menu. To use it you must do three things:
 *
 * - Create a menu
 * - Add menu items (as sub-pugins of the menu)
 * - Add a reference to the menu (there can be more than one of these)
 *
 * Example usage with two menu items:
 * <code>
 * <!--[pnformcontextmenu id="MyMenu" width="150px"]-->
 *   <!--[pnformcontextmenuitem title=_EDIT commandName="edit"]-->
 *   <!--[pnformcontextmenuitem title=_NEW commandName="new"]-->
 * <!--[/pnformcontextmenu]-->
 *
 * <!--[foreach from=items item=item]-->
 * <!--[$item.title]--> <!--[pnformcontextmenureference menuId="MyMenu" commandArgument=$item.id]-->
 * <!--[/foreach]-->
 * </code>
 * As you can see it is possible to reuse the same menu more than once on a page - in the example above it is
 * used as a context menu for each of the "items" (for instance articles or webshop goods). Where ever you
 * insert a "pnformcontextmenureference" you will get a small clickable arrow indicating the menu. Clicking
 * on the reference will bring op the menu.
 *
 * In your event handler (which defaults to "handleCommand") you should check for both commandName and
 * commandArgument:
 * <code>
 * function handleCommand(&$render, &$args)
 * {
 *   echo "Command: $args[commandName], $args[commandArgument]. ";
 * }
 * </code>
 * The commandName value indicates the menu item which was clicked and the commandArgument is the value set
 * at the menu reference. The use of commandArgument makes it easy to identify which $item the menu was
 * activated for.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormContextMenu extends pnFormStyledPlugin
{
    /**
     * CSS class name
     *
     * The class name is applied to the div element that surrounds the entire menu. Defaults to "contextMenu".
     *
     * @var string
     */
    var $cssClass;

    /**
     * Name of command event handler method
     *
     * Defaults to "handleCommand".
     *
     * @var string
     */
    var $onCommand;


    /**
     * Z-index for absolute positioning
     *
     * No need to change or set this unless there's a conflict with other libraries (for instance prototype).
     *
     * @var int
     */
    var $zIndex;


    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render)
    {
        $this->styleAttributes['display'] = 'none';
        $this->styleAttributes['z-index'] = ($this->zIndex === null ? 10 : $this->zIndex);
    }


    function dataBound(&$render)
    {
        PageUtil::AddVar('stylesheet', ThemeUtil::getModuleStylesheet('pnForm'));
        PageUtil::AddVar('javascript', 'system/pnForm/pnjavascript/pnform.js');
        PageUtil::AddVar('javascript', 'javascript/ajax/prototype.js');
    }


    function renderBegin(&$render)
    {
        if ($this->firstTime(false))
        {
            $cssClass = ($this->cssClass == null ? "contextMenu" : $this->cssClass);
            $attributes = $this->renderAttributes($render);
            $hiddenName = "contentMenuArgument" . $this->id;
            $html = "<div id=\"{$this->id}\" class=\"$cssClass\"$attributes><input type=\"hidden\" name=\"$hiddenName\" id=\"$hiddenName\"/><ul>";
            return $html;
        }
        else
            return '';
    }


    function renderEnd(&$render)
    {
        if ($this->firstTime(true))
        {
            $html = '</ul></div>';
            return $html;
        }
        else
            return '';
    }


    function firstTime($doSet=false)
    {
        static $createdMenus = array();
        if (isset($createdMenus[$this->id]))
            return false;
        if ($doSet)
            $createdMenus[$this->id] = true;
        return true;
    }
}


function smarty_block_pnformcontextmenu($params, $content, &$render)
{
    return $render->pnFormRegisterBlock('pnFormContextMenu', $params, $content);
}
