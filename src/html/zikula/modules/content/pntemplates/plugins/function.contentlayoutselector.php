<?php
// Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
// is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
// get in conflict with that.
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

class ContentLayoutSelector extends pnFormDropdownList
{
  function getFilename()
  {
      return __FILE__;
  }


  function load(&$render, $params)
  {
      $layouts = pnModAPIFunc('content', 'layout', 'getLayouts');
      if ($layouts === false)
          return false;

      foreach ($layouts as $layout)
      {
        $this->addItem($layout['title'], $layout['name']);
      }

      parent::load($render, $params);
  }
}


function smarty_function_contentlayoutselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('ContentLayoutSelector', $params);
}
