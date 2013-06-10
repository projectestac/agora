<?php

function smarty_function_iwqvuserformyesnoselect($params, &$smarty) {
    $dom = ZLanguage::getModuleDomain('IWqv');
    if (!isset($params['class'])) {
        $params['class'] = "pn-form-text";
    }
    $html = "<select name='" . $params['selectname'] . "'  style='width: 100px;' class='$params[class]' >";
    $html.= "<option " . ($params['selectvalue'] == 0 || ($params['selectvalue'] == '' && $params['defaultvalue'] == 0) ? " selected " : "") . " value='0'>" . __('No', $dom) . "</option>";
    $html.= "<option " . ($params['selectvalue'] == 1 || ($params['selectvalue'] == '' && $params['defaultvalue'] == 1) ? " selected " : "") . "value='1'>" . __('Yes', $dom) . "</option>";
    $html.= "</select>";
    return $html;
}
