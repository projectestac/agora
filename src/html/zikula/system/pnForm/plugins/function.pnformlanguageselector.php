<?php
/**
 * Language selector plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformtextinput.php 21046 2007-01-11 21:36:57Z jornlind $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/** Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformdropdownlist.php"
 is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
 get in conflict with that.*/
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';

/**
 * Language selector
 *
 * This plugin creates a language selector using a dropdown list.
 * The selected value of the base dropdown list will be set to the 3-letter language code of
 * the selected language.
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormLanguageSelector extends pnFormDropdownList
{
  /**
   * Enable or disable use of installed languages only
   *
   * Normally you can only choose one of the installed languages with the language selector,
   * but by setting onlyInstalledLanguages to false you can get a list of all possible language.
   * @var bool
   */
  var $onlyInstalledLanguages = true;

  /**
   * Add an option 'All' on top of the language list
   *
   * @var bool
   */
  var $addAllOption = true;


  function getFilename()
  {
      return __FILE__; // FIXME: should be found in smarty's data???
  }


  function load(&$render, $params)
  {
      if ($this->mandatory)
          $this->addItem('---', null);

      if ($this->addAllOption) {
          $this->addItem(DataUtil::formatForDisplay(__('All')), '');
      }

      if ($this->onlyInstalledLanguages)
      {
        $langList = ZLanguage::getInstalledLanguageNames();

        foreach ($langList as $code => $name)
        {
            $this->addItem($name, $code);
        }
      }
      else
      {
        $langList = ZLanguage::languageMap();

        foreach ($langList as $code => $name)
        {
          $this->addItem($name, $code);
        }
      }

      parent::load($render, $params);
  }
}


function smarty_function_pnformlanguageselector($params, &$render)
{
  return $render->pnFormRegisterPlugin('pnFormLanguageSelector', $params);
}
