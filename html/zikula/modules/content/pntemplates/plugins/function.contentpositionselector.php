<?php

class ContentPositionSelector extends pnFormPlugin
{
  var $inputName;

  var $dataBased;
  var $dataField;
  var $group;
  var $value;


  function getFilename()
  {
    return __FILE__;
  }


  function create(&$render, $params)
  {
    $this->inputName = $this->id;

    $this->dataBased = (array_key_exists('dataBased', $params) ? $params['dataBased'] : true);
    $this->dataField = (array_key_exists('dataField', $params) ? $params['dataField'] : $this->id);
  }


  function load(&$render, &$params)
  {
    $this->loadValue($render, $render->get_template_vars());
  }


  function render(&$render)
  {
    $dom = ZLanguage::getModuleDomain('content');
    $nameHtml = " name=\"{$this->inputName}\"";

    $nnChecked = ($this->value == 'none' ? ' checked="checked"' : '');
    $abChecked = ($this->value == 'above' ? ' checked="checked"' : '');
    $tlChecked = ($this->value == 'topLeft' ? ' checked="checked"' : '');
    $trChecked = ($this->value == 'topRight' ? ' checked="checked"' : '');
    $alChecked = ($this->value == 'aboveLeft' ? ' checked="checked"' : '');
    $arChecked = ($this->value == 'aboveRight' ? ' checked="checked"' : '');

    if (empty($nnChecked) && empty($abChecked) && empty($tlChecked) && empty($trChecked) && empty($alChecked) && empty($arChecked))
      $nnChecked = ' checked="checked"';

    $html = "<ul id=\"{$this->id}\" class=\"contentPositionSelector\">";
    $html .= "
<li>
<label for=\"{$this->id}_nn\"><img src=\"modules/content/pnimages/box-none.gif\" alt=\"" . __("No box", $dom) . "\"/></label>
<input type=\"radio\"{$nameHtml} value=\"none\" id=\"{$this->id}_nn\"{$nnChecked}/>
</li>";
    $html .= "
<li>
<label for=\"{$this->id}_ab\"><img src=\"modules/content/pnimages/box-above.gif\" alt=\"" . __("Above", $dom) . "\"/></label>
<input type=\"radio\"{$nameHtml} value=\"above\" id=\"{$this->id}_ab\"{$abChecked}/>
</li>";
    $html .= "
<li>
<label for=\"{$this->id}_tl\"><img src=\"modules/content/pnimages/box-topLeft.gif\" alt=\"" . __("Float, left", $dom) . "\"/></label>
<input type=\"radio\"{$nameHtml} value=\"topLeft\" id=\"{$this->id}_tl\"{$tlChecked}/>
</li>";
    $html .= "
<li>
<label for=\"{$this->id}_tr\"><img src=\"modules/content/pnimages/box-topRight.gif\" alt=\"" . __("Float, right", $dom) . "\"/></label>
<input type=\"radio\"{$nameHtml} value=\"topRight\" id=\"{$this->id}_tr\"{$trChecked}/>
</li>";
    $html .= "
<li>
<label for=\"{$this->id}_al\"><img src=\"modules/content/pnimages/box-aboveLeft.gif\" alt=\"" . __("Above, left", $dom) . "\"/></label>
<input type=\"radio\"{$nameHtml} value=\"aboveLeft\" id=\"{$this->id}_al\"{$alChecked}/>
</li>";
    $html .= "
<li>
<label for=\"{$this->id}_ar\"><img src=\"modules/content/pnimages/box-aboveRight.gif\" alt=\"" . __("Above, right", $dom) . "\"/></label>
<input type=\"radio\"{$nameHtml} value=\"aboveRight\" id=\"{$this->id}_ar\"{$arChecked}/>
</li>";
    $html .= "</ul>";

    return $html;
  }


  function decode(&$render)
  {
    $this->value = FormUtil::getPassedValue($this->inputName, null, 'POST');
    if (get_magic_quotes_gpc())
      $this->value = stripslashes($this->value);
  }


  function saveValue(&$render, &$data)
  {
    if ($this->dataBased)
    {
      if ($this->group == null)
      {
        $data[$this->dataField] = $this->value;
      }
      else
      {
        if (!array_key_exists($this->group, $data))
          $data[$this->group] = array();
        $data[$this->group][$this->dataField] = $this->value;
      }
    }
  }


  function loadValue(&$render, &$values)
  {
    if ($this->dataBased)
    {
      if ($this->group == null)
      {
        if ($this->dataField != null  &&  isset($values[$this->dataField]))
          $this->value = $values[$this->dataField];
      }
      else
      {
        if (isset($values[$this->group]))
        {
          $data = $values[$this->group];
          if (isset($data[$this->dataField]))
          {
            $this->value = $data[$this->dataField];
          }
        }
      }
    }
  }
}


function smarty_function_contentpositionselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('ContentPositionSelector', $params);
}
