<?php
/**
 * Button plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformbutton.php 23401 2008-01-06 20:57:34Z jornlind $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Plugins
 */


/**
 * LinkButton
 *
 * Link buttons can be used instead of normal buttons to fire command events in 
 * your form event handler. A link button is simply a link (anchor tag with 
 * some JavaScript) that can be used exactly like a normal button - but with
 * a different visualization.
 *
 * When the user activates a link button the command name and command argument
 * will be sent to the form event handlers handleCommand function.
 * Example:
 * <code>
 *  function handleCommand(&$render, &$args)
 *  {
 *    if ($args['commandName'] == 'update')
 *    {
 *      if (!$render->pnFormIsValid())
 *        return false;
 *
 *      $data = $render->pnFormGetValues();
 *
 *      DBUtil::updateObject($data, 'demo_data');
 *    }
 *
 *    return true;
 *  }
 * </code>
 *
 * The command arguments ($args) passed to the handler contains 'commandName' and
 * 'commandArgument' with the values you passed to the button in the template.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormLinkButton extends pnFormStyledPlugin
{
    /**
     * Displayed text in the link
     *
     * You can use _XXX language defines directly as the text, no need to call <!--[pnml]--> for
     * translation.
     * @var string
     */
    var $text;

    /**
     * Name of command event handler method
     * @var string Default is "handleCommand"
     */
    var $onCommand = 'handleCommand';

    /**
     * Command name
     * 
     * This is the "commandName" parameter to pass in the event args of the command handler.
     * @var string
     */
    var $commandName;

    /**
     * Command argument
     *
     * This value is passed in the event arguments to the form event handler as the commandArgument value.
     * @var string
     */
    var $commandArgument;

    /**
     * Confirmation message
     *
     * If you set a confirmation message then a ok/cancel dialog box pops and asks the user to confirm
     * the button click - very usefull for buttons that deletes items.
     * You can use _XXX language defines directly as the message, no need to call <!--[pnml]--> for
     * translation.
     * @var string
     */
    var $confirmMessage;

    /**
     * CSS styling
     *
     * Please ignore - to be changed.
     * @internal
     */
    var $styleHtml;


    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function render(&$render)
    {
        $idHtml = $this->getIdHtml();

        $onclickHtml = '';
        if ($this->confirmMessage != null)
        {
          $msg = $render->pnFormTranslateForDisplay($this->confirmMessage) . '?';
          $onclickHtml = " onclick=\"return confirm('$msg');\"";
        }

        $text = $render->pnFormTranslateForDisplay($this->text);

        $attributes = $this->renderAttributes($render);

        $carg = serialize(array('cname' => $this->commandName, 'carg' => $this->commandArgument));
        $href = $render->pnFormGetPostBackEventReference($this, $carg);
        $href = htmlspecialchars($href);

        $result = "<a {$idHtml}{$onclickHtml}{$attributes} href=\"javascript:$href\">$text</a>";
        //$result = "<input $idHtml type=\"submit\" name=\"$fullName\" value=\"$text\"$onclickHtml{$attributes} />";

        return $result;
    }


    function raisePostBackEvent(&$render, $eventArgument)
    {
        $carg = unserialize($eventArgument);
        $args = array('commandName' => $carg['cname'], 'commandArgument' => $carg['carg']);
        if (!empty($this->onCommand))
            $render->pnFormRaiseEvent($this->onCommand, $args);
    }
}


function smarty_function_pnformlinkbutton($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormLinkButton', $params);
}
