<?php
/**
 * Error message plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformerrormessage.php 26867 2009-10-09 12:09:34Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Error message placeholder
 *
 * Use this plugin to display error messages. It should be added in your template in the exact location where
 * you want the error message to be displayed. Then, on postback, you can do as shown here to set the 
 * error message:
 * <code>
 *  function handleCommand(&$render, &$args)
 *  {
 *    if ($args['commandName'] == 'update')
 *    {
 *      if (!$render->pnFormIsValid())
 *        return false;
 *
 *      $data = $render->pnFormGetValues();
 *      if (... something is wrong ...)
 *      {
 *        $errorPlugin = $render->pnFormGetPluginById('MyPluginId');
 *        $errorPlugin->message = 'Something happend';
 *        return false;
 *      }
 *
 *      ... handle data ...
 *    }
 *
 *    return true;
 *  }
 * </code>
 * Beware that {@link pnFormRender::pnFormGetPluginById()} only works on postback.
 *
 * @package pnForm
 * @subpackage Plugins
*/
class pnFormErrorMessage extends pnFormPlugin
{
    /**
     * Displayed error message
     * @var string
     */
    var $message;

    /**
     * CSS class for styling
     * @var string
     */
    var $cssClass;


    function getFilename()
    {
        return __FILE__; // FIXME: should be found in smarty's data???
    }


    function render(&$render)
    {
        if ($this->message != '')
        {
            $cssClass = ($this->cssClass == null ? 'z-errormsg' : $this->cssClass);
            $html = "<div class=\"$cssClass\">" . $this->message . "</div>\n";

            return $html;
        }

        return '';
    }
}


function smarty_function_pnformerrormessage($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormErrorMessage', $params);
}
