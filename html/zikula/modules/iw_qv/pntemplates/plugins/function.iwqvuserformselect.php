<?php
function smarty_function_iwqvuserformselect($params, &$smarty)
{	
	if (!isset($params['width'])) {
		$params['width'] = "100px";
	}

	if (!isset($params['class'])) {
		$params['class'] = "pn-form-text";
	}

	$html = "<select id='".$params['selectname']."' name='".$params['selectname']."' style='width:".$params['width'].";' class='".$params['class']."'>";

	foreach ($params['selectvalues'] as $value) {
		$html .= "<option ";
		if (isset($params['selectvalue']) && ($params['selectvalue']== $value['id'])) {
			$html .= " selected ";
		}
		$html .= "value='".$value['id']."'>";
		$html .= pnML($value['name']);
		$html .= "</option>";
	}

	$html.= "</select>";

	return $html;
}
