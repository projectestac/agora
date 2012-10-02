<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Jorn Wildt
 * @link http://www.elfisk.dk
 * @version $Id: block.contentformframe.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

require_once 'system/pnForm/plugins/function.pnformvalidationsummary.php';

class contentFormFrame extends pnFormPlugin
{
  var $useTabs;
  var $cssClass = 'tabs';


  function getFilename()
  {
    return __FILE__; // FIXME: may be found in smarty's data???
  }


  function create(&$render, &$params)
  {
    $this->useTabs = (array_key_exists('useTabs', $params) ? $params['useTabs'] : false);
  }


  function renderBegin(&$render)
  {
    $tabClass = $this->useTabs ? ' '.$this->cssClass : '';
    return "<div class=\"content-form{$tabClass}\">\n";
  }


  function renderEnd(&$render)
  {
    return "</div>\n";
  }
}


function smarty_block_contentFormFrame($params, $content, &$render)
{
    $result = $render->pnFormRegisterPlugin('pnFormValidationSummary', $params);
    $result .= $render->pnFormRegisterBlock('contentFormFrame', $params, $content);

    return $result;
}
