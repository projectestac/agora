<?php
// Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
// is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
// get in conflict with that.
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

class ContentWidthSelector extends pnFormDropdownList
{
  function getFilename()
  {
    return __FILE__;
  }


  function load(&$render, $params)
  {
    $this->addItem('auto', 'wauto');
    $this->addItem('1/1', 'w100');
    $this->addItem('3/4', 'w75');
    $this->addItem('2/3', 'w66');
    $this->addItem('1/2', 'w50');
    $this->addItem('1/3', 'w33');
    $this->addItem('1/4', 'w25');
    parent::load($render, $params);
 }
}


function smarty_function_contentwidthselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('ContentWidthSelector', $params);
}
