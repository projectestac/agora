<?php
/**
 * Label plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformlabel.php 27841 2009-12-10 16:56:34Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Web form label
 * Use this to create labels for your input fields in a web form. Example:
 * <code>
 *   <!--[pnformlabel text="Title" for="title"]-->:
 *   <!--[pnformtextinput id="title"]-->
 * </code>
 * The rendered output is an HTML label element with the "for" value
 * set to the supplied id. In addition to this, the pnFormLabel plugin also sets
 * "myLabel" on the "pointed-to" plugin to the supplied label text. This enables
 * the validation summary to display the label text.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormLabel extends pnFormStyledPlugin
{
    /**
     * Text to show as label
     * @var string
     */
    var $text;

    /**
     * Allow HTML in label? 1=yes, otherwise no
     * @var int 
     */
    var $html;

    /**
     * Labelled plugin's ID
     * @var string
     */
    var $for;

    /**
     * CSS class to use
     * @var string
     */
    var $cssClass;

    /**
     * Enable or disable the mandatory asterisk
     * @var bool
     */
    var $mandatorysym;

    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }


    function create(&$render, &$params)
    {
    }


    function render(&$render)
    {
        $idHtml = $this->getIdHtml();

        $text = $render->pnFormTranslateForDisplay($this->text, ($this->html==1) ? false : true);

        if ($this->cssClass != null)
            $classHtml = " class=\"$this->cssClass\"";
        else
            $classHtml = '';

        $attributes = $this->renderAttributes($render);

        $result = "<label{$idHtml} for=\"{$this->for}\"{$classHtml}{$attributes}>$text";

        if ($this->mandatorysym) {
            $result .= '<span class="z-mandatorysym">*</span>';
        }

        $result .= '</label>';
        return $result;
    }


    function postRender(&$render)
    {
        $plugin = & $render->pnFormGetPluginById($this->for);
        if ($plugin != null)
        {
            $plugin->myLabel = $render->pnFormTranslateForDisplay($this->text, ($this->html==1) ? false : true);
            //echo "Set label '$this->text' on $plugin->id. ";
        }
    }
}


function smarty_function_pnformlabel($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormLabel', $params);
}
