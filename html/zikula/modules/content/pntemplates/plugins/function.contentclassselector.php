<?php
// Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
// is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
// get in conflict with that.
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

class ContentClassSelector extends pnFormDropdownList
{
  function getFilename()
  {
    return __FILE__;
  }


  function load(&$render, $params)
  {
    if (!$render->pnFormIsPostBack())
    {
      $classes = pnModAPIFunc('content', 'admin', 'getStyleClasses');
      $empty = array(array('text' => '', 'value' => ''));
      $classes = array_merge($empty, $classes);
      $this->setItems($classes);
    }
    parent::load($render, $params);
 }
}


function smarty_function_contentclassselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('ContentClassSelector', $params);
}
