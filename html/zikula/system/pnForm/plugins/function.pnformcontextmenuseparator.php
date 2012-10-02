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
 * @subpackage Functions
 */


/**
 * Context menu separator
 *
 * This plugin represents a menu item.
 *
 * @see pnFormContextMenu
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormContextMenuSeparator extends pnFormPlugin
{
    function getFilename()
    {
        return __FILE__;
    }


    function render(&$render)
    {
        $contextMenu =& $this->getParentContextMenu();

        // Avoid creating menu multiple times if included in a repeated template
        if (!$contextMenu->firstTime())
            return '';

        return "<li class=\"separator\">&nbsp;</li>";
    }


    function & getParentContextMenu()
    {
        // Locate parent context menu
        $contextMenu = &$this->parentPlugin;

        while ($contextMenu != null  &&  strcasecmp(get_class($contextMenu), 'pnformcontextmenu') != 0)
            $contextMenu = &$contextMenu->parentPlugin;

        return $contextMenu;
    }
}


function smarty_function_pnformcontextmenuseparator($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormContextMenuSeparator', $params);
}
