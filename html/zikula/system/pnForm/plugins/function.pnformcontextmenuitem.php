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
 * Context menu item
 *
 * This plugin represents a menu item.
 *
 * @see pnFormContextMenu
 *
 * @package pnForm
 * @subpackage Plugins
*/
class pnFormContextMenuItem extends pnFormPlugin
{
    /**
     * Menu title
     *
     * Language constants can be used here.
     *
     * @var string
     */
    var $title;


    var $imageURL;

    /**
     * Command name passed to the event handler
     *
     * @var string
     */
    var $commandName;


    /**
     * JavaScript code to execute when menu item is selected
     *
     * Your script will be wrapped in a function that passes a parameter "commandArgument". This parameter
     * contains the command argument of the pnformcontextmenureference plugin. In this way your script
     * can work with the menu item data you clicked. Example:
     * <code>
     * <!--[pnformcontextmenuitem title=Preview imageURL="preview.gif" commandScript="popupPreview(commandArgument)"]-->
     *
     * <script type="text/javascript">
     * function popupPreview(commandArgument)
     * {
     *   alert(commandArgument);
     * }
     * </script>
     * </code>
     *
     * @var string
     */
    var $commandScript;


    /**
     * URL to redirect to when menu item is selected
     *
     * You can place {commandArgument} (including the braces) in your URL. This will get substituted with the
     * command argument value of the pnformcontextmenureference plugin. In this way you can redirect to something
     * depending on data.
     * @var string
     */
    var $commandRedirect;


    /**
     * Confirmation message
     *
     * If you set a confirmation message then a ok/cancel dialog box pops and asks the user to confirm
     * the menu item click - very usefull for menu selections that deletes items.
     * You can use _XXX language defines directly as the message, no need to call <!--[pnml]--> for
     * translation.
     * @var string
     */
    var $confirmMessage;


    function getFilename()
    {
        return __FILE__;
    }

        
    function create(&$render, &$params)
    {
    }


    function render(&$render)
    {
        $contextMenu =& $this->getParentContextMenu();

        // Avoid creating menu multiple times if included in a repeated template
        if (!$contextMenu->firstTime())
            return '';

        if (!empty($this->commandName))
        {
            $click = 'javascript:' . $this->renderConfirm($render, $render->pnFormGetPostBackEventReference($this, $this->commandName));
        }
        else if (!empty($this->commandScript))
        {
            $hiddenName = "contentMenuArgument" . $contextMenu->id;
            $click = 'javascript:' . $this->renderConfirm($render, "pnForm.contextMenu.commandScript('$hiddenName', function(commandArgument){" . $this->commandScript . "})");
        }
        else if (!empty($this->commandRedirect))
        {
            $hiddenName = "contentMenuArgument" . $contextMenu->id;
            $url = urlencode($this->commandRedirect);
            $click = 'javascript:' . $this->renderConfirm($render, "pnForm.contextMenu.redirect('$hiddenName','$url')");
        }
        else
        {
            pn_exit('Missing commandName, commandScript, or commandRedirect in context menu item');
        }

        $url = $click;
        $title = $render->pnFormTranslateForDisplay($this->title);

        if (!empty($this->imageURL))
        {
            $style = " style=\"background-image: url($this->imageURL)\"";
        }
        else
        {
            $style= '';
        }

        $html = "<li$style><a href=\"$url\">$title</a></li>";

        return $html;
    }


    function renderConfirm(&$render, $script)
    {
        if (!empty($this->confirmMessage))
        {
            $msg = $render->pnFormTranslateForDisplay($this->confirmMessage) . '?';
            return "if (confirm('$msg')) { $script }";
        }
        else
            return $script;
    }


    // Called by pnForms framework due to the use of pnFormGetPostBackEventReference() above
    function raisePostBackEvent(&$render, $eventArgument)
    {
        $contextMenu =& $this->getParentContextMenu();

        $hiddenName = "contentMenuArgument" . $contextMenu->id;
        $commandArgument = FormUtil::getPassedValue($hiddenName, null, 'POST');

        $args = array('commandName' => $eventArgument, 'commandArgument' => $commandArgument);
        $render->pnFormRaiseEvent($contextMenu->onCommand == null ? 'handleCommand' : $contextMenu->onCommand, $args);
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


function smarty_function_pnformcontextmenuitem($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormContextMenuItem', $params);
}
