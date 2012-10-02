<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Jorn Wildt
 * @link http://www.elfisk.dk
 * @version $Id: function.contentlabelhelp.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

function smarty_function_contentlabelhelp($params, &$render) 
{
  $text = $params['text'];
  $text = (strlen($text)>0 && $text[0]=='_' ? constant($text) : $text);
  if (!isset($params['html']) || !$params['html'])
    $text = DataUtil::formatForDisplay($text);
  $result = "<em class=\"z-sub z-formnote\">$text</em>";

  if (array_key_exists('assign', $params))
    $render->assign($params['assign'], $result);
  else
    return $result;
}
