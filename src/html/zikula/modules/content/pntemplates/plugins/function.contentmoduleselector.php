<?php
// Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
// is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
// get in conflict with that.
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

class ContentModuleSelector extends pnFormDropdownList
{
  function getFilename()
  {
    return __FILE__;
  }


  function load(&$render, $params)
  {
    if (!$render->pnFormIsPostBack())
    {
      $moduleList = pnModAPIFunc('modules', 'admin', 'list', array());
      $modules = array();
      foreach ($moduleList as $module)
      {
        if ($module['user_capable'] && $module['state'] == PNMODULE_STATE_ACTIVE)
        {
          $modules[] = array('text' => $module['displayname'],
                             'value' => $module['name']);
        }
      }
      $empty = array(array('text' => '', 'value' => ''));
      $modules = array_merge($empty, $modules);
      $this->setItems($modules);
    }
    parent::load($render, $params);
 }
}


function smarty_function_contentmoduleselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('ContentModuleSelector', $params);
}
