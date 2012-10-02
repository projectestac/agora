<?php
/**
 * Integer input plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformintinput.php 27498 2009-11-10 07:03:28Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
 is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
 */
require_once 'system/pnForm/plugins/function.pnformtextinput.php';

/**
 * Integer input
 *
 * Use for text inputs where you only want to accept integers. The value saved by
 * {@link pnForm::pnFormGetValues()} is either null or a valid integer valid.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormIntInput extends pnFormTextInput
{
    /**
     * Minimum value for validation
     * @var int
     */
    var $minValue;

    /**
     * Maximum value for validation
     * @var int
     */
    var $maxValue;

    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }

    function create(&$render, &$params)
    {
        $this->maxLength = 20;
        $params['width'] = '6em';
        parent::create($render, $params);
        $this->regexValidationPattern = '/^\\s*[+-]?\\s*?[0-9]+\\s*$/';
        $this->regexValidationMessage = __('Error! Invalid integer.');
    }

    function validate(&$render)
    {
        parent::validate($render);
        if (!$this->isValid) {
            return;
        }

        if ($this->text != '') {
            $i = (int) $this->text;
            if ($this->minValue != null && $i < $this->minValue || $this->maxValue != null && $i > $this->maxValue) {
                if ($this->minValue != null && $this->maxValue != null) {
                    $this->setError(__f('Error! Range error. Value must be between %1$s and %2$s.', array(
                        $this->minValue,
                        $this->maxValue)));
                } else if ($this->minValue != null) {
                    $this->setError(__f('Error! The value must be %s or more.', $this->minValue));
                } else if ($this->maxValue != null) {
                    $this->setError(__f('Error! The value must be %s or less.', $this->maxValue));
                }
            }
        }
    }

    function parseValue(&$render, $text)
    {
        if ($text == '') {
            return null;
        }
        return (int) $text;
    }
}

function smarty_function_pnformintinput($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormIntInput', $params);
}
