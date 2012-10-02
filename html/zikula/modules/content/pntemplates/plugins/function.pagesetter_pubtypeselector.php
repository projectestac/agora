<?php

// Make sure to use require_once() instead of Loader::requireOnce() since "function.pnformtextinput.php"
// is loaded by Smarty (the base render class) with the use of require_once(). We do not want to
// get in conflict with that.
require_once 'system/pnForm/plugins/function.pnformdropdownlist.php';


/**
 * Pagesetter pnforms plugin for selecting pagesetter publication type
 *
 * @copyright (C) 2008, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: function.pagesetter_pubtypeselector.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

/**
 * Pagesetter plugin generates pnforms select for selecting publication type
 *
 * Typical use in template file:
 * <code>
 * <!--[pagesetter_pubtypeselector id="tid"]-->
 * </code>
 */
class pagesetter_pubtypeselector extends pnFormDropdownList
{
  function getFilename()
  {
      return __FILE__;
  }


  function load(&$render, $params)
  {
	  if (!pnModAPILoad('pagesetter', 'admin'))	return false;
	  $pubtypeslist = pnModAPIFunc('pagesetter', 'admin', 'getPublicationTypes');

      $this->addItem('', 0);

      foreach ($pubtypeslist as $pubtype) {
          $this->addItem($pubtype[title], $pubtype[id]);
      }

      parent::load($render, $params);
  }
}


/**
 * Standard Smarty function for this plugin
 */
function smarty_function_pagesetter_pubtypeselector($params, &$render)
{
    // Let the pnFormPlugin class do all the hard work
    return $render->pnFormRegisterPlugin('pagesetter_pubtypeSelector', $params);
}
