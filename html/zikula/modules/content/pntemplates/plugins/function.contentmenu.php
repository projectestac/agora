<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Jorn Wildt
 * @link http://www.elfisk.dk
 * @version $Id: function.contentmenu.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

function smarty_function_contentmenu($params, &$render) 
{
  $pages = $params['pages'];

  $html = smarty_function_contentmenurec($pages); 

  if (isset($params['assign']))
    $smarty->assign($params['assign'], $html);
  else
    return $html;
}


function smarty_function_contentmenurec(&$pages)
{
  $html = '';

  if (count($pages) > 0)
  {
    $html .= '<ul>';
    foreach ($pages as $page)
    {
      $html .= '<li>';
      $url = pnModURL('content', 'user', 'view', 
                      array('pid' => $page['id']));
      $url = DataUtil::formatForDisplay($url);
      $html .= "<a href=\"$url\">$page[title]</a>";
      $html .= smarty_function_contentmenurec($page['subPages']);
      $html .= '</li>';
    }
    $html .= '</ul>';
  }

  return $html;
}