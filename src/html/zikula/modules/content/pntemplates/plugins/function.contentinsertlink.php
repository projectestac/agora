<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Jorn Wildt
 * @link http://www.elfisk.dk
 * @version $Id: function.contentinsertlink.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

function smarty_function_contentinsertlink($params, &$render) 
{
  $dom = ZLanguage::getModuleDomain('content');
  $pageId = $params['pageId'];
  $contentAreaIndex = $params['contentAreaIndex'];
  $position = isset($params['position']) ? $params['position'] : 0;
  $url = pnModURL('content', 'edit', 'newcontent', 
                  array('pid' => $pageId,
                        'cai' => $contentAreaIndex,
                        'position' => $position));
  $url = DataUtil::formatForDisplay($url);
  $html = "<a href=\"$url\" class=\"content-action\">" . __("Add new content here", $dom) . "</a>";

  if (isset($params['assign']))
    $smarty->assign($params['assign'], $html);
  else
    return $html;
}

