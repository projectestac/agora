<?php
/**
 * Image button plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformimagebutton.php 24436 2008-07-03 14:13:08Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformbutton.php"
 is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
 get in conflict with that.*/
require_once 'system/pnForm/plugins/function.pnformbutton.php';

/**
 * Image button
 * This button works like a normal {@link pnFormButton} with the exception
 * that it displays a clickable image instead of a text button. It further
 * more returns the X and Y coordinate of the click position in the image.
 *
 * The command event arguments contains four elements:
 * - commandName: command name
 * - commandArgument: command argument
 * - posX: X position of click
 * - posY: Y position of click
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormImageButton extends pnFormButton
{
    /**
     * Image URL
     * The URL pointing to the image for the button.
     * @var string
     */
    var $imageUrl;


    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function render(&$render)
    {
        $idHtml = $this->getIdHtml();

        $fullName = $this->id . '_' . $this->commandName;

        $onclickHtml = '';
        if ($this->confirmMessage != null)
        {
          $msg = $render->pnFormTranslateForDisplay($this->confirmMessage) . '?';
          $onclickHtml = " onclick=\"return confirm('$msg');\"";
        }

        $text = $render->pnFormTranslateForDisplay($this->text);
        $imageUrl = $this->imageUrl;

        $attributes = $this->renderAttributes($render);

        $result = "<input type=\"image\" name=\"$fullName\" title=\"$text\" alt=\"$text\" value=\"$text\" src=\"$imageUrl\"$onclickHtml{$attributes} />";

        return $result;
    }


    function decodePostBackEvent(&$render)
    {
        $fullNameX = $this->id . '_' . $this->commandName . '_x';
        $fullNameY = $this->id . '_' . $this->commandName . '_y';

        if (isset($_POST[$fullNameX]))
        {
            $args = array('commandName' => $this->commandName,
                          'commandArgument' => $this->commandArgument,
                          'posX' => (int)$_POST[$fullNameX],
                          'posY' => (int)$_POST[$fullNameY]);
            if (!empty($this->onCommand))
                if ($render->pnFormRaiseEvent($this->onCommand, $args) === false)
                    return false;
        }

        return true;
    }
}


function smarty_function_pnformimagebutton($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormImageButton', $params);
}
