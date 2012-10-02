<?php
/**
 * Validation summary plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformvalidationsummary.php 26867 2009-10-09 12:09:34Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Validation summary
 *
 * Insert this in your forms where you want to display a summary of all validation
 * errors on the page.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormValidationSummary extends pnFormPlugin
{
    /**
     * CSS class of the summary
     */
    var $cssClass = 'validationSummary z-errormsg';


    function getFilename()
    {
        return __FILE__; // FIXME: should be found in smarty's data???
    }


    function render(&$render)
    {
        $validators = & $render->pnFormValidators;
        $html = '';
        foreach ($validators as $validator)
        {
            if (!$validator->isValid)
            {
                $html .= "<li><label for=\"$validator->id\">" . DataUtil::formatForDisplay($validator->myLabel) . ': ' . DataUtil::formatForDisplay($validator->errorMessage) . "</label></li>\n";
            }
        }

        if ($html != '')
        {
            $html = "<div class=\"{$this->cssClass}\">\n<ul>\n" . $html . "</ul>\n</div>\n";
        }

        return $html;
    }
}

function smarty_function_pnformvalidationsummary($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormValidationSummary', $params);
}
