<?php
// Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
// is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
// get in conflict with that.
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

class ContentContentTypeSelector extends pnFormDropdownList
{
  function getFilename()
  {
    return __FILE__;
  }


  function load(&$render, $params)
  {
    parent::load($render, $params);

    $contentTypes = pnModAPIFunc('content', 'content', 'getContentTypes');

    foreach ($contentTypes as $type)
    {
      $this->addItem($type['title'], $type['module'].':'.$type['name']);
    }

    $this->attributes['onchange'] = "content.handleContenTypeSelected ('$this->id')";
    $this->attributes['onkeyup'] = "content.handleContenTypeSelected ('$this->id')";
 }


  function render(&$render)
  {
    $scripts = array('javascript/ajax/prototype.js', 'modules/content/pnjavascript/ajax.js');
    PageUtil::addVar('javascript', $scripts);

    $output = "<div class=\"z-formrow\">";
    $output .= parent::render($render);
    $output .= "</div>";

    $descr = array();

    $contentTypes = pnModAPIFunc('content', 'content', 'getContentTypes');

    foreach ($contentTypes as $type)
    {
      $descr[] = "\"$type[module]:$type[name]\" : \"" . htmlspecialchars($type['description']) . '"';
    }

    $descr = '<script type="text/javascript">/* <![CDATA[ */ var contentDescriptions = {' . implode(', ', $descr) . '} /* ]]> */</script>';

    $descr0 = (count($contentTypes) > 0 ? $contentTypes[0]['description'] : '');
    $descr0 = htmlspecialchars($descr0);
    $output .= "<div class=\"z-formrow\" id=\"{$this->id}_descr\">$descr0</div>";
    $output .= $descr;

    return $output;
  }
}


function smarty_function_contentcontenttypeselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('ContentContentTypeSelector', $params);
}
