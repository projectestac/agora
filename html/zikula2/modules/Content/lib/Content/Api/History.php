<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */
class Content_Api_History extends Zikula_AbstractApi
{

    public function getPageVersions($args)
    {
        $pageId = (int) $args['pageId'];
        $enableEscape = (array_key_exists('enableEscape', $args) ? $args['enableEscape'] : true);
        $offset = (array_key_exists('offset', $args) ? $args['offset'] : 0);
        $pageSize = (array_key_exists('pageSize', $args) ? $args['pageSize'] : 20);

        $tables = DBUtil::getTables();
        $historyColumn = $tables['content_history_column'];

        $where = "$historyColumn[pageId] = $pageId";

        $versions = DBUtil::selectObjectArray('content_history', $where, 'revisionNo DESC', $offset, $pageSize);
        if (count($versions) == 0) {
            return $versions;
        }
        for ($i = 0, $cou = count($versions); $i < $cou; ++$i) {
            $version = & $versions[$i];
            $version['action'] = $this->contentHistoryActionTranslate($version['action']);
            $version['userName'] = $version['userId'] == 0 ? $this->__("Unknown user") : UserUtil::getVar('uname', $version['userId']);
        }

        return $versions;
    }

    public function getPageVersionsCount($args)
    {
        $pageId = (int) $args['pageId'];
        $tables = DBUtil::getTables();
        $historyColumn = $tables['content_history_column'];
        $where = "$historyColumn[pageId] = $pageId";
        return DBUtil::selectObjectCount('content_history', $where);
    }

    public function getDeletedPages($args)
    {
        $offset = (array_key_exists('offset', $args) ? $args['offset'] : 0);
        $pageSize = (array_key_exists('pageSize', $args) ? $args['pageSize'] : 20);

        $tables = DBUtil::getTables();
        $historyColumn = $tables['content_history_column'];
        $pageColumn = $tables['content_page_column'];
        $where = "$historyColumn[pageId] not in (select $pageColumn[id] from $tables[content_page]) and $historyColumn[action] = '_CONTENT_HISTORYPAGEDELETED'"; /* related to delayed translation */
        return DBUtil::selectObjectArray('content_history', $where, 'date DESC', $offset, $pageSize); // TODO: distinct
    }

    public function getDeletedPagesCount($args)
    {
        $tables = DBUtil::getTables();
        $historyColumn = $tables['content_history_column'];
        $pageColumn = $tables['content_page_column'];
        $where = "$historyColumn[pageId] not in (select $pageColumn[id] from $tables[content_page]) and $historyColumn[action] = '_CONTENT_HISTORYPAGEDELETED'"; /* related to delayed translation */
        return DBUtil::selectObjectCount('content_history', $where, 'pageId'); // TODO: distinct
    }

    protected function contentHistoryActionTranslate($action)
    {
        $textAndParam = explode('|', $action);
        $text = $textAndParam[0];
        $parametersStr = (count($textAndParam) > 1 ? $textAndParam[1] : '');
        $parameters = array();
        $parametersStr = explode(',', $parametersStr);
        foreach ($parametersStr as $parameterStr) {
            $varAndValue = explode('=', $parameterStr);
            if (count($varAndValue) == 2) {
                $parameters[$varAndValue[0]] = $varAndValue[1];
            }
        }

        switch ($text) {
             /* all the apparent lang defines below are related to a delayed translation */
            case '_CONTENT_HISTORYCONTENTUPDATED':
                $ActionTranslated = $this->__("Content updated");
                break;
            case '_CONTENT_HISTORYCONTENTDELETED':
                $ActionTranslated = $this->__("Content deleted");
                break;
            case '_CONTENT_HISTORYTRANSLATED':
                $ActionTranslated = $this->__("Translated");
                break;
            case '_CONTENT_HISTORYTRANSLATIONDEL':
                $ActionTranslated = $this->__("Translation deleted");
                break;
            case '_CONTENT_HISTORYCONTENTMOVED':
                $ActionTranslated = $this->__("Content moved");
                break;
            case '_CONTENT_HISTORYCONTENTADDED':
                $ActionTranslated = $this->__("Content added");
                break;
            case '_CONTENT_HISTORYPAGEADDED':
                $ActionTranslated = $this->__("Page added");
                break;
            case '_CONTENT_HISTORYPAGECLONED':
                $ActionTranslated = $this->__f('Page cloned from page [%s]', $parameters);
                break;
            case '_CONTENT_HISTORYPAGEUPDATED':
                $ActionTranslated = $this->__("Page updated");
                break;
            case '_CONTENT_HISTORYPAGERESTORED':
                $ActionTranslated = $this->__f('Page restored from version [%s]', $parameters);
                break;
            case '_CONTENT_HISTORYPAGEDELETED':
                $ActionTranslated = $this->__("Page deleted");
                break;
        }

        return $ActionTranslated;
    }

    public function addPageVersion($args)
    {
        if (!$this->getVar('enableVersioning')) {
            return true;
        }

        $pageId = $args['pageId'];
        $action = $args['action'];

        $page = ModUtil::apiFunc('Content', 'Page', 'getPage',
                        array('id' => $pageId,
                            'editing' => true,
                            'filter' => array('checkActive' => false),
                            'enableEscape' => false,
                            'translate' => false,
                            'includeContent' => true));
        if ($page === false) {
            return false;
        }

        // Clear some of the redundant plugin data
        foreach (array_keys($page['content']) as $i) {
            foreach (array_keys($page['content'][$i]) as $j) {
                $c = & $page['content'][$i][$j];
                $c['plugin']->destroyView();
                unset($c['plugin']);
                unset($c['output']);
                unset($c['translated']);
            }
        }
        $page['layoutData']['plugin']->destroyView();

        $pageTranslations = ModUtil::apiFunc('Content', 'Page', 'getTranslations',
                        array('pageId' => $pageId));
        if ($pageTranslations === false) {
            return false;
        }

        $contentTranslations = ModUtil::apiFunc('Content', 'Content', 'getTranslations',
                        array('pageId' => $pageId));
        if ($contentTranslations === false) {
            return false;
        }

        $version = array('page' => $page,
            'pageTranslations' => $pageTranslations,
            'contentTranslations' => $contentTranslations);

        $versionData = serialize($version);
        $userId = UserUtil::getVar('uid');
        $nextRevisionNo = $this->contentGetNextRevisionNumber($pageId);

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

    public function getPageVersionNo($args)
    {
        $nextVersionNo = $this->contentGetNextRevisionNumber($args['pageId']);
        if ($nextVersionNo <= 1) {
            return 1;
        }
        return $nextVersionNo - 1;
    }

    public function getPageVersion($args)
    {
        $versionId = $args['id'];
        $language = (array_key_exists('language', $args) ? $args['language'] : ZLanguage::getLanguageCode());
        $editing = (array_key_exists('editing', $args) ? $args['editing'] : false);

        $version = DBUtil::selectObjectByID('content_history', $versionId);
        if (empty($version)) {
            return LogUtil::registerError($this->__f('Error! Unknown version ID [%s]', $versionId));
        }

        $version['userName'] = $version['userId'] == 0 ? $this->__("Unknown user") : UserUtil::getVar('uname', $version['userId']);
        $version['data'] = unserialize($version['data']);
        $versionData = & $version['data'];
        $page = & $versionData['page'];

        // Load content plugins
        foreach (array_keys($page['content']) as $i) {
            for ($j = 0, $couj = count($page['content'][$i]); $j < $couj; ++$j) {
                $c = & $page['content'][$i][$j];
                $c['plugin'] = ModUtil::apiFunc('Content', 'Content', 'getContentPlugin', $c);
            }
        }

        // Apply page translation
        if (!empty($versionData['pageTranslations'])) {
            foreach ($versionData['pageTranslations'] as $translation) {
                if ($translation['language'] == $language) {
                    $page['title'] = $translation['title'];
                }
            }
        }

        // Apply content translation
        if (!empty($versionData['contentTranslations'])) {
            $translationMap = array();
            for ($i = 0, $cou = count($versionData['contentTranslations']); $i < $cou; ++$i) {
                if ($versionData['contentTranslations'][$i]['language'] == $language) {
                    $translationMap[$versionData['contentTranslations'][$i]['contentId']] = & $versionData['contentTranslations'][$i];
                }
            }
            foreach (array_keys($page['content']) as $i) {
                for ($j = 0, $couj = count($page['content'][$i]); $j < $couj; ++$j) {
                    $c = & $page['content'][$i][$j];
                    if (!empty($translationMap[$c['id']])) {
                        $translatedContent = unserialize($translationMap[$c['id']]['data']);
                        if (is_array($c['data'])) {
                            $c['data'] = array_merge($c['data'], $translatedContent);
                            $c['plugin']->loadData($c['data']);
                        }
                    }
                }
            }
        }

        // Display content plugins (copy/paste code from content api :-(
        foreach (array_keys($page['content']) as $i) {
            for ($j = 0, $couj = count($page['content'][$i]); $j < $couj; ++$j) {
                $c = & $page['content'][$i][$j];
                $c['title'] = $c['plugin']->getTitle();
                $c['isTranslatable'] = $c['plugin']->isTranslatable();
                if ($editing) {
                    $output = $c['plugin']->displayStart();
                    $output .= $c['plugin']->displayEditing();
                    $output .= $c['plugin']->displayEnd();
                    $c['output'] = $output;
                } else {
                    $output = $c['plugin']->displayStart();
                    $output .= $c['plugin']->display();
                    $output .= $c['plugin']->displayEnd();
                    $c['output'] = $output;
                }
                $c['plugin']->destroyView();
            }
        }
        $version['data']['page']['layoutData']['plugin']->destroyView(); // cannot see where this is set above :-)

        return $version;
    }

    public function restoreVersion($args)
    {
        $versionId = $args['id'];
        $version = DBUtil::selectObjectByID('content_history', $versionId);
        if (empty($version)) {
            return LogUtil::registerError($this->__f('Error! Unknown version ID [%s]', $versionId));
        }

        $version['data'] = unserialize($version['data']);

        $versionData = $version['data'];
        $page = $versionData['page'];
        $pageId = $page['id'];
        $content = $page['content'];
        $pageTranslations = $versionData['pageTranslations'];
        $contentTranslations = $versionData['contentTranslations'];

        unset($page['layoutData']);
        unset($page['isTranslated']);
        unset($page['layoutTemplate']);
        unset($page['content']);

        $currentPage = ModUtil::apiFunc('Content', 'Page', 'getPage', array(
            'id' => $pageId, 
            'editing' => false, 
            'filter' => array('checkActive' => false), 
            'enableEscape' => true, 
            'translate' => false, 
            'includeContent' => false, 
            'includeCategories' => false));
        if ($currentPage === false) {
            // is a deleted page
            $retval = ModUtil::apiFunc('Content', 'Page', 'reinsertPage', array('page' => $page));
            if ($retval === false) {
                return LogUtil::registerError($this->__('Error! Could not reinsert page'));
            }
            $pageId = $page['id'] = $retval['id'];
            $page['urlname'] = $retval['urlname'];
        }

        unset($page['parentPageId']);
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

        $ok = ModUtil::apiFunc('Content', 'Page', 'updatePage',
                        array('page' => $page,
                            'pageId' => $pageId,
                            'revisionText' => '_CONTENT_HISTORYPAGERESTORED' . "|revisionNo=$version[revisionNo]" /* delayed translation */));
        if ($ok === false) {
            return false;
        }

        $currentContentItems = ModUtil::apiFunc('Content', 'Content', 'getSimplePageContent',
                        array('pageId' => $pageId));
        if ($currentContentItems === false) {
            return false;
        }

        $currentContentItemsIdMap = array();
        foreach ($currentContentItems as $currentContentItem) {
            $currentContentItemsIdMap[$currentContentItem['id']] = $currentContentItem;
        }

        // Iterate through old content items
        // - if not exist today, then create new, otherwise update existing
        foreach (array_keys($content) as $i) {
            foreach (array_keys($content[$i]) as $j) {
                $contentItem = $content[$i][$j];

                //echo "($i,$j : {$content[$i][$j]['type']}) ";
                if (isset($currentContentItemsIdMap[$contentItem['id']])) {
                    //echo "Update $contentItem[id]! ";
                    $ok = ModUtil::apiFunc('Content', 'Content', 'updateContent',
                                    array('content' => $contentItem,
                                        'id' => $contentItem['id'],
                                        'addVersion' => false));
                    if (!$ok) {
                        return false;
                    }
                    unset($currentContentItemsIdMap[$contentItem['id']]);
                } else
                {
                    //echo "Insert $contentItem[id]! ";
                    $newContentItem = array();
                    $aKeys = array_keys($contentItem);
                    $aVals = array_values($contentItem);
                    // copy all direct keys/values
                    for ($x = 0; $x < count($aKeys); $x++) {
                        $newContentItem[$aKeys[$x]] = $aVals[$x];
                    }
                    $id = ModUtil::apiFunc('Content', 'Content', 'newContent',
                                    array('content' => $newContentItem,
                                        'pageId' => $pageId,
                                        'contentAreaIndex' => $contentItem['areaIndex'],
                                        'position' => $contentItem['position'],
                                        'addVersion' => false));
                    if ($id === false) {
                        return false;
                    }
                    if ($id != $contentItem['id']) {
                        return LogUtil::registerError($this->__("Error! Re-created old content item but did not restore old ID."));
                    }
                    unset($currentContentItemsIdMap[$contentItem['id']]);
                }
            }
        }

        // Iterate through new items
        // - if not exist in old items then delete it
        foreach (array_keys($currentContentItemsIdMap) as $id) {
            //echo "Delete $id! ";
            $ok = ModUtil::apiFunc('Content', 'Content', 'deleteContent',
                            array('contentId' => $id,
                                'addVersion' => false));
            if (!$ok) {
                return false;
            }
        }

        // Delete all translations and replace with old translations
        $ok = ModUtil::apiFunc('Content', 'Page', 'deleteTranslation',
                        array('pageId' => $pageId,
                            'addVersion' => false));
        if ($ok === false) {
            return false;
        }

        foreach ($pageTranslations as $translation) {
            $language = $translation['language'];
            $ok = ModUtil::apiFunc('Content', 'Page', 'updateTranslation',
                            array('pageId' => $pageId,
                                'language' => $language,
                                'translated' => $translation));
            if ($ok === false) {
                return false;
            }
        }

        foreach ($contentTranslations as $translation) {
            $language = $translation['language'];
            $contentId = $translation['contentId'];
            $translatedData = unserialize($translation['data']);
            $ok = ModUtil::apiFunc('Content', 'Content', 'updateTranslation',
                            array('contentId' => $contentId,
                                'language' => $language,
                                'translated' => $translatedData,
                                'addVersion' => false));
            if ($ok === false) {
                return false;
            }
        }

        return true;
    }

    /*
      public function deletePage($args)
      {
      if (!$this->getVar('enableVersioning'))
      return true;

      $pageId = (int)$args['pageId'];

      $table = DBUtil::getTables();
      $historyTable = &$table['content_history'];
      $historyColumn = &$table['content_history_column'];

      $sql = "
      DELETE FROM $historyTable
      WHERE $historyColumn[pageId] = $pageId";

      DBUtil::executeSQL($sql);

      return true;
      }
     */

    protected function contentGetNextRevisionNumber($pageId)
    {
        $pageId = (int) $pageId;

        $tables = DBUtil::getTables();
        $historyTable = $tables['content_history'];
        $historyColumn = $tables['content_history_column'];

        $sql = "
            SELECT MAX($historyColumn[revisionNo])
            FROM $historyTable
            WHERE $historyColumn[pageId] = $pageId";

        // FIXME: how to avoid concurrency problems?
        $pos = DBUtil::selectScalar($sql);
        return $pos === null ? 1 : (int) $pos + 1;
    }
}
