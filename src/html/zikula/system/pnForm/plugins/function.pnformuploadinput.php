<?php
/**
 * Upload input plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformuploadinput.php 27057 2009-10-21 16:15:43Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * pnFormUploadInput
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormUploadInput extends pnFormStyledPlugin
{
    var $inputName;
    var $readOnly;

    var $dataField;
    var $dataBased;
    var $group;

    var $isValid;
    var $mandatory;
    var $errorMessage;
    var $myLabel;

    var $result;

    function getFilename()
    {
        return __FILE__; // FIXME: should be found in smarty's data???
    }

    function isEmpty()
    {
        return $this->result == null || $this->result['name'] == '';
    }

    function create(&$render, $params)
    {
        $this->inputName = (array_key_exists('inputName', $params) ? $params['inputName'] : $this->id);
        $this->readOnly = (array_key_exists('readOnly', $params) ? $params['readOnly'] : false);
        $this->mandatory = (array_key_exists('mandatory', $params) ? $params['mandatory'] : false);

        $this->dataBased = (array_key_exists('dataBased', $params) ? $params['dataBased'] : true);
        $this->dataField = (array_key_exists('dataField', $params) ? $params['dataField'] : $this->id);
        $this->group = (array_key_exists('group', $params) ? $params['group'] : null);

        $this->result = null;
        $this->isValid = true;
    }

    function initialize(&$render)
    {
        $render->pnFormAddValidator($this);
    }

    function render(&$render)
    {
        $idHtml = $this->getIdHtml();
        $nameHtml = " name=\"{$this->inputName}\"";
        $readOnlyHtml = ($this->readOnly ? " readonly=\"readonly\"" : '');

        $class = 'upload';
        if (!$this->isValid) {
            $class .= ' error';
        }

        if ($this->readOnly) {
            $class .= ' readonly';
        }

        $titleHtml = ($this->errorMessage != null ? " title=\"$this->errorMessage\"" : '');
        $attributes = $this->renderAttributes($render);
        $result = "<input type=\"file\" class=\"$class\"{$idHtml}{$nameHtml}{$readOnlyHtml}{$titleHtml}{$attributes} />";

        return $result;
    }

    function decode(&$render)
    {
        $this->result = $_FILES[$this->inputName];
    }

    function validate(&$render)
    {
        $this->clearValidation($render);

        if (isset($this->result['error']) && $this->result['error'] != 0 && $this->result['name'] != '') {
            $this->setError(__('Error! Did not succeed in uploading file.'));
        }

        if ($this->mandatory && $this->isEmpty() && !isset($this->upl_arr['orig_name'])) {
            $this->setError(__('Error! An entry in this field is mandatory.'));
        }
    }

    function setError($msg)
    {
        $this->isValid = false;
        $this->errorMessage = $msg;
        $this->toolTip = $msg;
    }

    function clearValidation(&$render)
    {
        $this->isValid = true;
        $this->errorMessage = null;
    }

    function saveValue(&$render, &$data)
    {
        if ($this->dataBased) {
            if ($this->group == null) {
                $data[$this->dataField] = $this->result;
            } else {
                if (!array_key_exists($this->group, $data))
                    $data[$this->group] = array();
                $data[$this->group][$this->dataField] = $this->result;
            }
        }
    }
}

function smarty_function_pnformuploadinput($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormUploadInput', $params);
}
