<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnhistoryapi.php 387 2010-01-09 19:50:36Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');


function content_historyapi_getPageVersions($args)
{
  $dom = ZLanguage::getModuleDomain('content');
  $pageId = (int)$args['pageId'];
  $enableEscape = (array_key_exists('enableEscape', $args) ? $args['enableEscape'] : true);
  $offset = (array_key_exists('offset', $args) ? $args['offset'] : 0);
  $pageSize = (array_key_exists('pageSize', $args) ? $args['pageSize'] : 20);

  $pntable = &pnDBGetTables();
  $historyColumn = &$pntable['content_history_column'];

  $where = "$historyColumn[pageId] = $pageId";

  $versions = DBUtil::selectObjectArray('content_history', $where, 'revisionNo DESC', $offset, $pageSize);
  if (count($versions) == 0)
    return $versions;

  Loader::includeOnce('includes/UserUtil.class.php');
  Loader::includeOnce('includes/pnobjlib/UserUtil.class.php');

  for ($i=0,$cou=count($versions); $i<$cou; ++$i)
  {
    $version =& $versions[$i];
      
    $version['action'] = contentHistoryActionTranslate($version['action']);
    $version['userName'] = $version['userId'] == 0 ? __("Unknown user", $dom) : UserUtil::getPNUserField($version['userId'], 'uname');
  }

  return $versions;
}


function contentHistoryActionTranslate($action)
{
  $dom = ZLanguage::getModuleDomain('content');
  $textAndParam = explode('|', $action);
  $text = $textAndParam[0];
  $parametersStr = (count($textAndParam) > 1 ? $textAndParam[1] : '');
  $parameters = array();
  $parametersStr = explode(',', $parametersStr);
  foreach ($parametersStr as $parameterStr)
  {
    $varAndValue = explode('=', $parameterStr);
    if (count($varAndValue) == 2)
    {
      $parameters[$varAndValue[0]] = $varAndValue[1];
    }
  }
  
  switch ($text) {
      case '_CONTENT_HISTORYCONTENTUPDATED':
          $ActionTranslated = __("Content updated", $dom);
          break;
      case '_CONTENT_HISTORYCONTENTDELETED':
          $ActionTranslated = __("Content deleted", $dom);
          break;
      case '_CONTENT_HISTORYTRANSLATED':
          $ActionTranslated = __("Translated", $dom);
          break;
      case '_CONTENT_HISTORYTRANSLATIONDEL':
          $ActionTranslated = __("Translation deleted", $dom);
          break;
      case '_CONTENT_HISTORYCONTENTMOVED':
          $ActionTranslated = __("Content moved", $dom);
          break;
      case '_CONTENT_HISTORYCONTENTADDED':
          $ActionTranslated = __("Content added", $dom);
          break;
      case '_CONTENT_HISTORYPAGEADDED':
          $ActionTranslated = __("Page added", $dom);
          break;
      case '_CONTENT_HISTORYPAGEUPDATED':
          $ActionTranslated = __("Page updated", $dom);
          break;
      case '_CONTENT_HISTORYPAGERESTORED':
          $ActionTranslated = __f('Page restored from version [%s]', $parameters, $dom);
          break;
  }

  return $ActionTranslated;
}


function content_historyapi_addPageVersion($args)
{
  if (!pnModGetVar('content', 'enableVersioning'))
    return true;

  $pageId = $args['pageId'];
  $action = $args['action'];

  $page = pnModAPIFunc('content', 'page', 'getPage', 
                       array('id' => $pageId,
                             'editing' => true,
                             'filter' => array('checkActive' => false),
                             'enableEscape' => false,
                             'translate' => false,
                             'includeContent' => true));
  if ($page === false)
    return false;

  // Clear some of the redundant plugin data
  foreach (array_keys($page['content']) as $i)
  {
    foreach (array_keys($page['content'][$i]) as $j)
    {
      $c = & $page['content'][$i][$j];
      unset($c['plugin']);
      unset($c['output']);
      unset($c['translated']);
    }
  }

  $pageTranslations = pnModAPIFunc('content', 'page', 'getTranslations', 
                                   array('pageId' => $pageId));
  if ($pageTranslations === false)
    return false;

  $contentTranslations = pnModAPIFunc('content', 'content', 'getTranslations', 
                                   array('pageId' => $pageId));
  if ($contentTranslations === false)
    return false;

  $version = array('page' => $page,
                   'pageTranslations' => $pageTranslations,
                   'contentTranslations' => $contentTranslations);

  $versionData = serialize($version);

  $userId = pnUserGetVar('uid');
  $nextRevisionNo = contentGetNextRevisionNumber($pageId);

  $historyData = array('data' => $versionData,
                       'pageId' => $pageId,
                       'revisionNo' => $nextRevisionNo,
                       'action' => $action,
                       'date' => DateUtil::getDatetime(),
                       'ipno' => $_SERVER['REMOTE_ADDR'],
                       'userId' => $userId);

  DBUtil::insertObject($historyData, 'content_history');

  return true;
}


function content_historyapi_getPageVersionNo($args)
{
  $nextVersionNo = contentGetNextRevisionNumber($args['pageId']);
  if ($nextVersionNo <= 1)
    return 1;
  return $nextVersionNo-1;
}


function content_historyapi_getPageVersion($args)
{
  $dom = ZLanguage::getModuleDomain('content');
  $versionId = $args['id'];
  $language = (array_key_exists('language', $args) ? $args['language'] : ZLanguage::getLanguageCode());
  $editing = (array_key_exists('editing', $args) ? $args['editing'] : false);

  $version = DBUtil::selectObjectByID('content_history', $versionId);
  if (empty($version))
    return LogUtil::registerError(__f('Error! Unknown version ID [%s]', $versionId, $dom));
  
  Loader::includeOnce('includes/UserUtil.class.php');
  Loader::includeOnce('includes/pnobjlib/UserUtil.class.php');

  $version['userName'] = $version['userId'] == 0 ? __("Unknown user", $dom) : UserUtil::getPNUserField($version['userId'], 'uname');
  $version['data'] = unserialize($version['data']);
  $versionData = & $version['data'];
  $page = & $versionData['page'];

  // Load content plugins
  foreach (array_keys($page['content']) as $i)
  {
    for ($j=0,$couj=count($page['content'][$i]); $j<$couj; ++$j)
    {
      $c = & $page['content'][$i][$j];
      $c['plugin'] = pnModAPIFunc('content', 'content', 'getContentPlugin', $c);
    }
  }

  // Apply page translation
  if (!empty($versionData['pageTranslations']))
  {
    foreach ($versionData['pageTranslations'] as $translation)
    {
      if ($translation['language'] == $language)
      {
        $page['title'] = $translation['title'];
      }
    }
  }

  // Apply content translation
  if (!empty($versionData['contentTranslations']))
  {
    //var_dump($versionData['contentTranslations']);
    //var_dump($page);
    
    $translationMap = array();
    for ($i=0,$cou=count($versionData['contentTranslations']); $i<$cou; ++$i)
      if ($versionData['contentTranslations'][$i]['language'] == $language)
        $translationMap[$versionData['contentTranslations'][$i]['contentId']] = & $versionData['contentTranslations'][$i];

    foreach (array_keys($page['content']) as $i)
    {
      for ($j=0,$couj=count($page['content'][$i]); $j<$couj; ++$j)
      {
        $c = & $page['content'][$i][$j];
        if (!empty($translationMap[$c['id']]))
        {
          $translatedContent = unserialize($translationMap[$c['id']]['data']);
          if (is_array($c['data']))
          {
            $c['data'] = array_merge($c['data'], $translatedContent);
            $c['plugin']->loadData($c['data']);
          }
        }
      }
    }
  }

  // Display content plugins (copy/paste code from content api :-(
  foreach (array_keys($page['content']) as $i)
  {
    for ($j=0,$couj=count($page['content'][$i]); $j<$couj; ++$j)
    {
      $c = & $page['content'][$i][$j];
      $c['title'] = $c['plugin']->getTitle();
      $c['isTranslatable'] = $c['plugin']->isTranslatable();
      if ($editing)
      {
        $output = $c['plugin']->displayStart();
        $output .= $c['plugin']->displayEditing();
        $output .= $c['plugin']->displayEnd();
        $c['output'] = $output;
      }
      else
      {
        $output = $c['plugin']->displayStart();
        $output .= $c['plugin']->display();
        $output .= $c['plugin']->displayEnd();
        $c['output'] = $output;
      }
    }
  }

  return $version;
}


function content_historyapi_restoreVersion($args)
{
  $dom = ZLanguage::getModuleDomain('content');
  $versionId = $args['id'];

  $version = DBUtil::selectObjectByID('content_history', $versionId);
  if (empty($version))
    return LogUtil::registerError(__f('Error! Unknown version ID [%s]', $versionId, $dom));
  
  $version['data'] = unserialize($version['data']);

  $versionData = $version['data'];
  $page = $versionData['page'];
  $pageId = $page['id'];
  $content = $page['content'];
  $pageTranslations = $versionData['pageTranslations'];
  $contentTranslations = $versionData['contentTranslations'];

  unset($page['isInMenu']);
  unset($page['isActive']);
  unset($page['position']);
  unset($page['level']);
  unset($page['setLeft']);
  unset($page['setRight']);
  unset($page['cr_date']);
  unset($page['cr_uid']);
  unset($page['lu_date']);
  unset($page['lu_uid']);
  unset($page['translatedTitle']);
  unset($page['translated']);
  unset($page['uname']);
  unset($page['layoutData']);
  unset($page['layoutTemplate']);
  unset($page['isTranslated']);
  unset($page['content']);

  $ok = pnModAPIFunc('content', 'page', 'updatePage',
                     array('page' => $page,
                           'pageId' => $pageId,
                           'revisionText' => '_CONTENT_HISTORYPAGERESTORED' . "|revisionNo=$version[revisionNo]" /* delayed translation */));
  if ($ok === false)
    return false;

  $currentContentItems = pnModAPIFunc('content', 'content', 'getSimplePageContent',
                                      array('pageId' => $pageId));
  if ($currentContentItems === false)
    return false;

  $currentContentItemsIdMap = array();
  foreach ($currentContentItems as $currentContentItem)
  {
    $currentContentItemsIdMap[$currentContentItem['id']] = $currentContentItem;
  }

  // Iterate through old content items
  // - if not exist today, then create new, otherwise update existing
  foreach (array_keys($content) as $i)
  {
    foreach (array_keys($content[$i]) as $j)
    {
      $contentItem = $content[$i][$j];

      //echo "($i,$j : {$content[$i][$j]['type']}) ";
      if (isset($currentContentItemsIdMap[$contentItem['id']]))
      {
        //echo "Update $contentItem[id]! ";
        $ok = pnModAPIFunc('content', 'content', 'updateContent',
                           array('content' => $contentItem,
                                 'id' => $contentItem['id'],
                                 'addVersion' => false));
        if (!$ok)
          return false;
        
        unset($currentContentItemsIdMap[$contentItem['id']]);
      }
      else
      {
        //echo "Insert $contentItem[id]! ";
        $newContentItem = array('id' => $contentItem['id'],
                                'pageId' => $contentItem['pageId'],
                                'module' => $contentItem['module'],
                                'type' => $contentItem['type'],
                                'data' => $contentItem['data'],
                                'stylePosition' => $contentItem['stylePosition'],
                                'styleWidth' => $contentItem['styleWidth'],
                                'styleClass' => $contentItem['styleClass']);
        $id = pnModAPIFunc('content', 'content', 'newContent',
                           array('content' => $newContentItem,
                                 'pageId' => $pageId,
                                 'contentAreaIndex' => $contentItem['areaIndex'],
                                 'position' => $contentItem['position'],
                                 'addVersion' => false));
        if ($id === false)
          return false;
        if ($id != $contentItem['id'])
          return LogUtil::registerError(__("Error! Re-created old content item but did not restore old ID.", $dom));
        unset($currentContentItemsIdMap[$contentItem['id']]);
      }
    }
  }

  // Iterate through new items
  // - if not exist in old items then delete it
  foreach (array_keys($currentContentItemsIdMap) as $id)
  {
    //echo "Delete $id! ";
    $ok = pnModAPIFunc('content', 'content', 'deleteContent',
                       array('contentId' => $id,
                             'addVersion' => false));
    if (!$ok)
      return false;
  }

  // Delete all translations and replace with old translations
  $ok = pnModAPIFunc('content', 'page', 'deleteTranslation',
                     array('pageId' => $pageId,
                           'addVersion' => false));
  if ($ok === false)
    return false;

  foreach ($pageTranslations as $translation)
  {
    $language = $translation['language'];
    $ok = pnModAPIFunc('content', 'page', 'updateTranslation',
                       array('pageId' => $pageId,
                             'language' => $language,
                             'translated' => $translation));
    if ($ok === false)
      return false;
  }

  foreach ($contentTranslations as $translation)
  {
    $language = $translation['language'];
    $contentId = $translation['contentId'];
    $translatedData = unserialize($translation['data']);
    $ok = pnModAPIFunc('content', 'content', 'updateTranslation',
                       array('contentId' => $contentId,
                             'language' => $language,
                             'translated' => $translatedData,
                             'addVersion' => false));
    if ($ok === false)
      return false;
  }

  return true;
}


function content_historyapi_deletePage($args)
{
  if (!pnModGetVar('content', 'enableVersioning'))
    return true;

  $pageId = (int)$args['pageId'];

  $pntable = pnDBGetTables();
  $historyTable = &$pntable['content_history'];
  $historyColumn = &$pntable['content_history_column'];

  $sql = "
DELETE FROM $historyTable
WHERE $historyColumn[pageId] = $pageId";

  DBUtil::executeSQL($sql);

  return true;
}


function contentGetNextRevisionNumber($pageId)
{
  $pageId = (int)$pageId;

  $pntable = pnDBGetTables();
  $historyTable = &$pntable['content_history'];
  $historyColumn = &$pntable['content_history_column'];
  
  $sql = "
SELECT MAX($historyColumn[revisionNo])
FROM $historyTable
WHERE $historyColumn[pageId] = $pageId";

  // FIXME: how to avoid concurrency problems?
  $pos = DBUtil::selectScalar($sql);
  return $pos === null ? 1 : (int)$pos + 1;
}
