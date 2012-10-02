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
 * Context menu reference
 *
 * This plugin adds a menu reference (could also be called a "placeholder").
 *
 * @see pnFormContextMenu
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormContextMenuReference extends pnFormPlugin
{
    var $imageURL;
    var $menuId;
    var $commandArgument;


    function getFilename()
    {
        return __FILE__;
    }


    function render(&$render)
    {
        $imageURL = ($this->imageURL == null ? pnGetBaseURL().'images/icons/extrasmall/tab_right.gif' : $this->imageURL);

        $menuPlugin =& $render->pnFormGetPluginById($this->menuId);
        $menuId = $menuPlugin->id;
        $html = "<img src=\"$imageURL\" alt=\"\" class=\"contextMenu\" onclick=\"pnForm.contextMenu.showMenu(event, '$menuId', '$this->commandArgument')\" />";

        return $html;
    }
}


function smarty_function_pnformcontextmenureference($params, &$render)
{
    $output = $render->pnFormRegisterPlugin('pnFormContextMenuReference', $params);
    if (array_key_exists('assign', $params))
        $render->assign($params['assign'], $output);
    else
        return $output;
}
