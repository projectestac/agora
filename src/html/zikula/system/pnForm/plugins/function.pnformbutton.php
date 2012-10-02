<?php
/**
 * Button plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformbutton.php 24851 2008-11-08 18:05:45Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Button
 *
 * Buttons can be used to fire command events in your form event handler.
 * When the user activates a button the command name and command argument
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
class pnFormButton extends pnFormStyledPlugin
{
    /**
     * Displayed text on the button
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

        $fullName = $this->id . '_' . $this->commandName;

        $onclickHtml = '';
        $onkeypressHtml = '';
        if ($this->confirmMessage != null)
        {
          $msg = $render->pnFormTranslateForDisplay($this->confirmMessage) . '?';
          $onclickHtml = " onclick=\"return confirm('$msg');\"";
          $onkeypressHtml = " onkeypress=\"return confirm('$msg');\"";
        }

        $text = $render->pnFormTranslateForDisplay($this->text);

        $attributes = $this->renderAttributes($render);

        $result = "<input $idHtml type=\"submit\" name=\"$fullName\" value=\"$text\"$onclickHtml$onkeypressHtml{$attributes} />";

        return $result;
    }


    function decodePostBackEvent(&$render)
    {
        $fullName = $this->id . '_' . $this->commandName;

        if (isset($_POST[$fullName]))
        {
            $args = array('commandName' => $this->commandName,
                          'commandArgument' => $this->commandArgument);
            if (!empty($this->onCommand))
                if ($render->pnFormRaiseEvent($this->onCommand, $args) === false)
                    return false;
        }

        return true;
    }
}


function smarty_function_pnformbutton($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormButton', $params);
}
