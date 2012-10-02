<?php
/**
 * URL input plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformdateinput.php 22632 2007-08-25 17:23:12Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
 is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
 get in conflict with that.*/
require_once('system/pnForm/plugins/function.pnformtextinput.php');


/**
 * URL input for pnForms
 *
 * The URL input plugin is a text input plugin that only allows URLs to be posted.
 *
 * You can also use all of the features from the pnFormTextInput plugin since the URL input
 * inherits from it.
 *
 * A valid URL must contain a protocol prefix ("http:" for instance)
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormURLInput extends pnFormTextInput
{
    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render, &$params)
    {
       $this->maxLength = 2000;

       parent::create($render, $params);

       $this->cssClass .= ' url';
    }


    function validate(&$render)
    {
        parent::validate($render);
        if (!$this->isValid)
            return;

        if (!empty($this->text))
        {
            if (!pnVarValidate($this->text, 'url'))
                $this->setError(__('Error! Invalid URL.'));
        }
    }
}


function smarty_function_pnformurlinput($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormURLInput', $params);
}

