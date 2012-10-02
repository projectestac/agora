<?php
/**
 * Float input plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformfloatinput.php 27498 2009-11-10 07:03:28Z yokav $
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
 * Floating value input
 *
 * The pnFormFloatInput plugin is an input plugin that allows the user to enter floating point numeric data.
 * The value saved by {@link pnForm::pnFormGetValues()} is either null or a valid float.
 * 
 * Typical use in template file:
 * <code>
 * <!--[pnformfloatinput id="title" maxLength="50" width="30em" precision="4"]-->
 * </code>
 *
 * The pnFormFloatInput plugin supports basic CSS styling through attributes like "width", "color" and "font_weight". See
 * {@link pnFormTextInput} and {@link pnFormStyledPlugin} for more info.
 *
 * The precision attribute specifies the number of significant digits after the decimal point. When editing an existing
 * float value, the value is rounded to the specified number of digits after the decimal point. For example, if
 * precision is set to '4' and the initial value of the field is 123.45659 then the value displayed for editing will
 * be 123.4566. The default precision, if not specified, is 2 digits following the decimal.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormFloatInput extends pnFormTextInput
{
    /**
     * Minimum value for validation
     * @var float
     */
    var $minValue;

    /**
     * Maximum value for validation
     * @var float
     */
    var $maxValue;

    /**
     * Number of decimal places to display.
     * @var int
     */
    var $precision;

    function getFilename()
    {
        return __FILE__; // FIXME: may be found in smarty's data???
    }

    function create(&$render, &$params)
    {
        // Check if precision is provided, is a number, is an integer (even if its data type is a string), and is non-negative.
        if (isset($params['precision']) && is_numeric($params['precision']) && ((int)$params['precision'] == $params['precision'])
                && ($params['precision'] >= 0)) {
            // TODO - should we check if it is a non-negative integer separately so that we can throw or log an error or warning?
            $this->precision = (int)$params['precision'];
        } else {
            $this->precision = 2;
        }

        $this->maxLength = 30;
        $params['width'] = '6em';
        parent::create($render, $params);
    }

    function validate(&$render)
    {
        parent::validate($render);
        if (!$this->isValid) {
            return;
        }

        if ($this->text != '') {
            $this->text = DataUtil::transformNumberInternal($this->text);
            if (!is_numeric($this->text)) {
                $this->setError(__('Error! Invalid number.'));
            }

            $i = $this->text;
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

        // process float value
        $text = floatval($text);

        return $text;
    }

    function formatValue(&$render, $value)
    {
        return DataUtil::formatNumber($value, $this->precision);
    }
}

function smarty_function_pnformfloatinput($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormFloatInput', $params);
}
