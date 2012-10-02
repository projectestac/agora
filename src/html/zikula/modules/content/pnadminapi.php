<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnadminapi.php 371 2010-01-05 16:15:52Z herr.vorragend $
 * @license See license.txt
 */


/**
 * get available admin panel links
 *
 * @return array array of admin links
 */
function content_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('content');
    $links = array();

    $links[] = array('url' => pnModURL('content', 'admin', 'main'), 'text' => __('Administration', $dom));
    $links[] = array('url' => pnModURL('content', 'edit', 'main'), 'text' => __('Edit contents', $dom));
    $links[] = array('url' => pnModURL('content', 'admin', 'settings'), 'text' => __('Settings', $dom));

    return $links;
}


function content_adminapi_getStyleClasses($args)
{
  $classes = array();
  $userClasses = pnModGetVar('content', 'styleClasses');
  $userClasses = explode("\n", $userClasses);

  foreach ($userClasses as $class)
  {
    list($value,$text) = explode('|', $class);
    $value = trim($value);
    $text = trim($text);
    if (!empty($text) && !empty($value))
      $classes[] = array('text' => $text, 'value' => $value);
  }

  return $classes;
}
