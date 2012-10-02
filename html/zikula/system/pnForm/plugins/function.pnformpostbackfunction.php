<?php
/**
 * PostBack JavaScript function
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformtextinput.php 21083 2007-01-16 21:19:13Z jornlind $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * PostBack JavaScript function plugin
 *
 * Use this plugin to create a postback generating JavaScript function to be called from your
 * JavaScript code.
 *
 * Example:
 * <code>
 * <!--[pnformpostbackfunction function=startMyPostBack commandName=abc]-->
 * </code>
 * This generates a JavaScript function named startMyPostBack() that you can call from your own JavaScript.
 * When called it will generate a postback and fire an event to be handled by the $onCommand
 * method in the form event handler.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormPostBackFunction extends pnFormPlugin
{
    /**
     * Command name
     * 
     * This is the "commandName" parameter to pass in the event args of the command handler.
     * @var string
     */
    var $commandName;

    /**
     * JavaScript function name to generate
     *
     * This is the name of a JavaScript function you want to be created on the page. By calling this
     * function in your own JavaScript code you can initiate a postback that will call the 
     * {@link pnFormPostBackFunction::$onCommand} event handler and pass 
     * {@link pnFormPostBackFunction::$commandName} to it.
     */
    var $function;

    /**
     * Name of command event handler method
     * @var string Default is "handleCommand"
     */
    var $onCommand = 'handleCommand';


    /**
     * Get filename for this plugin
     *
     * A requirement from the framework - must be implemented like this. Used to restore plugins on postback.
     * @internal
     * @return string
     */
    function getFilename()
    {
        return __FILE__;
    }


    function render(&$render)
    {
      $html = '';

      $html .= "<script type=\"text/javascript\">\n<!--\n{$this->function} = function() { ";
      $html .= $render->pnFormGetPostBackEventReference($this, $this->commandName);
      $html .= " }\n// -->\n</script>";

      return $html;
    }


    function raisePostBackEvent(&$render, $eventArgument)
    {
        $args = array('commandName' => $eventArgument, 'commandArgument' => null);
        if (!empty($this->onCommand))
            $render->pnFormRaiseEvent($this->onCommand, $args);
    }
}


/**
 * Standard Smarty function for this plugin
 */
function smarty_function_pnformpostbackfunction($params, &$render)
{
    // Let the pnFormPlugin class do all the hard work
    return $render->pnFormRegisterPlugin('pnFormPostBackFunction', $params);
}
