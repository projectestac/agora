<?php

/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */
class Content_Api_Page extends Zikula_AbstractApi
{
    /* =[ Fetch pages ]=============================================================== */

    /**
     * Get a single page
     *
     * Calls $this->getPages($args) directly and returns the first page in
     * the returned set of pages. It then adds layout data.
     *
     * @param id int Page ID
     *
     * @return array Page data
     */
    public function getPage($args)
    {
        if (!isset($args['filter']) || !is_array($args['filter'])) {
            $args['filter'] = array();
        }
        $args['filter']['pageId'] = $args['id'];

        $pages = $this->getPages($args);

        if ($pages === false || count($pages) == 0) {
            return false;
        }

        return $pages[0];
    }

    /**
     * Get a list of pages
     *
     * This function returns an array of pages depending on the various parameters. The most
     * interesting parameter may be "filter" which contains all the restrictions on the list.
     * The filter data is passed to contentGetPageListRestrictions() which is where you
     * will find the documentation.
     *
     * @param filter array See contentGetPageListRestrictions().
     * @param orderBy string Field for "order by" in SQL query
     * @param orderDir string Direction for "order by" in SQL query (desc/asc) default: asc
     * @param pageIndex int Zero based page index for browsing page by page.
     * @param pageSize int Number of pages to show on each "page".
     * @param language string Three letter language identifier used for translating content.
     * @param translate bool Enable translation.
     * @param makeTree bool Enable conversion of page list to recursive tree structure.
     * @param includeContent bool Enable inclusion of content items.
     * @param includeCategories bool Enable inclusion of secondary category data.
     * @param includeLanguages bool Enable inclusion of list of translated languages (array('dan','eng')).
     * @param editing bool Passed to content plugins to enable "edit" display (as opposed to normal user display).
     *
     * @return array Array of pages (each of which is an associative array).
     */
    public function getPages($args)
    {
        $filter = isset($args['filter']) ? $args['filter'] : array();
        $orderBy = !empty($args['orderBy']) ? $args['orderBy'] : 'cr_date';
        $orderDir = !empty($args['orderDir']) ? $args['orderDir'] : 'asc';
        $pageIndex = isset($args['pageIndex']) ? $args['pageIndex'] : 0;
        $pageSize = isset($args['pageSize']) ? $args['pageSize'] : 0;
        $language = (array_key_exists('language', $args) ? $args['language'] : ZLanguage::getLanguageCode());
        $translate = (array_key_exists('translate', $args) ? $args['translate'] : true);
        $makeTree = (array_key_exists('makeTree', $args) ? $args['makeTree'] : false);
        $includeLayout = (array_key_exists('includeLayout', $args) ? $args['includeLayout'] : true);
        $includeContent = (array_key_exists('includeContent', $args) ? $args['includeContent'] : false);
        $expandContent = (array_key_exists('expandContent', $args) ? $args['expandContent'] : true);
        $includeCategories = (array_key_exists('includeCategories', $args) ? $args['includeCategories'] : false);
        $includeVersionNo = (array_key_exists('includeVersionNo', $args) ? $args['includeVersionNo'] : false);
        $editing = (array_key_exists('editing', $args) ? $args['editing'] : false);

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];
        //$pageCategoryTable = $dbtables['content_pagecategory'];
        //$pageCategoryColumn = $dbtables['content_pagecategory_column'];
        $translatedTable = $dbtables['content_translatedpage'];
        $translatedColumn = $dbtables['content_translatedpage_column'];
        $userTable = $dbtables['users'];
        $userColumn = $dbtables['users_column'];

        $restrictions = array();
        $join = '';

        $this->contentGetPageListRestrictions($filter, $restrictions, $join);

        if (count($restrictions) > 0) {
            $where = 'WHERE ' . join(' AND ', $restrictions);
        } else {
            $where = '';
        }

        if (!empty($orderBy)) {
            $orderBy = ' ORDER BY ' . DataUtil::formatForStore($orderBy);
            $orderBy .= $orderDir == 'desc' ? ' DESC' : ' ASC';
        }

        $language = DataUtil::formatForStore($language);

        $cols = DBUtil::_getAllColumns('content_page');
        $ca   = DBUtil::getColumnsArray('content_page');
        $ca[] = 'translatedTitle';
        $ca[] = 'translatedMetaDescription';
        $ca[] = 'translatedMetaKeywords';
        $ca[] = 'uname';

        $sql = "
            SELECT DISTINCT
            $cols,
            $translatedColumn[title],
            $translatedColumn[metadescription],
            $translatedColumn[metakeywords],
            $userColumn[uname]
            FROM $pageTable
            LEFT JOIN $translatedTable t
            ON t.$translatedColumn[pageId] = $pageColumn[id]
            AND t.$translatedColumn[language] = '$language'
            LEFT JOIN $userTable usr
            ON usr.$userColumn[uid] = $pageColumn[lu_uid]
            $join
            $where
            $orderBy";

        if ($pageSize > 0) {
            $dbresult = DBUtil::executeSQL($sql, $pageSize * $pageIndex, $pageSize);
        } else {
            $dbresult = DBUtil::executeSQL($sql);
        }

        $pages = DBUtil::marshallObjects($dbresult, $ca);

        if (isset($filter['expandedPageIds']) && is_array($filter['expandedPageIds'])) {
            $expandedPageIdsMap = $filter['expandedPageIds'];
        } else {
            $expandedPageIdsMap = null;
        }

        for ($i = 0, $cou = count($pages); $i < $cou; ++$i) {
            $p = &$pages[$i];
            $p['translated'] = array('title' => $p['translatedTitle'], 'metadescription' => $p['translatedMetaDescription'], 'metakeywords' => $p['translatedMetaKeywords']);
            if ($includeLayout) {
                $p['layoutData'] = ModUtil::apiFunc('Content', 'Layout', 'getLayout',
                                                    array('layout' => $p['layout']));
                $p['layoutTemplate'] = $p['layoutData']['template'];
                $p['layoutEditTemplate'] = $p['layoutData']['editTemplate'];
                $p['titleintemplate'] = $p['layoutData']['plugin']->titleInTemplate;
            } else {
                $p['layoutData'] = array();
                $p['layoutTemplate'] = $p['layoutEditTemplate'] = '';
            }
            if ($includeCategories) {
                $p['categories'] = $this->contentGetPageCategories($p['id']);
            }
            if ($includeVersionNo) {
                $p['versionNo'] = ModUtil::apiFunc('Content', 'History', 'getPageVersionNo', array('pageId' => $p['id']));
            }

            if (!empty($p['translatedTitle'])) {
                if ($translate) {
                    $p = array_merge($p, $p['translated']);
                }
                $p['isTranslated'] = true;
            } else {
                $p['isTranslated'] = false;
            }

            // create page variables that represent the Online and Menu status, much like the old db fields
            $now = DateUtil::getDatetime();
            $p['isOnline'] = $p['active'] && (DateUtil::getDatetimeDiff_AsField($p['activeFrom'], $now, 6) >= 0 || $p['activeFrom'] == null) && (DateUtil::getDatetimeDiff_AsField($p['activeTo'], $now, 6) < 0 || $p['activeTo'] == null);
            $p['isInMenu'] = $p['isOnline'] && $p['inMenu'];

            $content = null;
            if ($includeContent) {
                $content = ModUtil::apiFunc('Content', 'Content', 'getPageContent', array(
                            'pageId' => $p['id'],
                            'editing' => $editing,
                            'translate' => $translate,
                            'expandContent' => $expandContent));
                if ($content === false) {
                    return false;
                }
            }

            $p['content'] = $content;

            if ($expandedPageIdsMap !== null) {
                if (!empty($expandedPageIdsMap[$p['id']])) {
                    $p['isExpanded'] = 1;
                } else {
                    $p['isExpanded'] = 0;
                }
            }
        }

        if ($makeTree && count($pages) > 0) {
            $i = 0;
            $pages = $this->contentMakePageTree($pages, $i, $pages[0]['level']);
        }

        return $pages;
    }

    /**
     * Count number of pages for a given filter
     *
     * @param filter array See $this->contentGetPageListRestrictions().
     *
     * @return int Page count
     */
    public function getPageCount($args)
    {
        $filter = isset($args['filter']) ? $args['filter'] : array();

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];
        $pageCategoryTable = $dbtables['content_pagecategory'];
        $pageCategoryColumn = $dbtables['content_pagecategory_column'];

        $restrictions = array();
        $join = '';

        $this->contentGetPageListRestrictions($filter, $restrictions, $join);

        if (count($restrictions) > 0) {
            $where = 'WHERE ' . join(' AND ', $restrictions);
        } else {
            $where = '';
        }
        $sql = "
            SELECT COUNT(*)
            FROM $pageTable
            $join
            $where";

        $count = DBUtil::selectScalar($sql);

        return $count;
    }

    /**
     * Convert filter information to SQL
     *
     * @param filter[category] int Restrict to specific category ID.
     * @param filter[pageId] int Restrict to specific page ID.
     * @param filter[urlname] string Restrict to specific page using the page's permalink name.
     * @param filter[checkActive] bool Enable restricting to only active pages (default true).
     * @param filter[checkInMenu] bool Enable restricting to only pages that are shown in the menu (so active and inMenu) (default false).
     * @param filter[superParentId] int Restrict to pages beneath this ID (includes itself).
     * @param filter[where] string Any SQL to be used in the resulting restriction.
     * @param restrictions array Output array of restrictions (SQL expressions).
     * @param join string Output string with required join statement.
     *
     * @return void
     */
    protected function contentGetPageListRestrictions($filter, &$restrictions, &$join)
    {
        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];
        $pageCategoryTable = $dbtables['content_pagecategory'];
        $pageCategoryColumn = $dbtables['content_pagecategory_column'];

        if (!empty($filter['category'])) {
            $c = (int) $filter['category'];
            $restrictions[] = "($pageCategoryColumn[categoryId] = $c OR $pageColumn[categoryId] = $c)";
            $join .= "LEFT JOIN $pageCategoryTable ON $pageCategoryColumn[pageId] = $pageColumn[id]\n";
        }

        if (!empty($filter['pageId'])) {
            $restrictions[] = "$pageColumn[id] = " . (int) $filter['pageId'];
        }

        if (!empty($filter['urlname'])) {
            $restrictions[] = "$pageColumn[urlname] = '" . DataUtil::formatForStore($filter['urlname']) . "'";
        }

        // if not specified always filter
        if (!array_key_exists('checkActive', $filter) || (!empty($filter['checkActive']) && $filter['checkActive'])) {
            $restrictions[] = "$pageColumn[active] = 1 AND ($pageColumn[activeFrom] <= NOW() OR $pageColumn[activeFrom] IS NULL) AND ($pageColumn[activeTo] > NOW() OR $pageColumn[activeTo] IS NULL)";
        }

        // only filter explicitely, active check is done above
        if (array_key_exists('checkInMenu', $filter) && $filter['checkInMenu']) {
            $restrictions[] = "$pageColumn[inMenu] = 1";
        }

        if (!empty($filter['superParentId'])) {
            // get the setLeft/Right of the selected parent for filtering
            $pageData = DBUtil::selectObjectByID('content_page', $filter['superParentId'], 'id', array('setLeft', 'setRight'));
            if ($pageData) {
                $where = " $pageColumn[setLeft] >= $pageData[setLeft] AND $pageColumn[setRight] <= $pageData[setRight]";
                $restrictions[] = $where;
            }
        }

        if (!empty($filter['parentId'])) {
            $restrictions[] = " $pageColumn[parentPageId]= " . (int) $filter['parentId'];
        }

        if (isset($filter['expandedPageIds']) && is_array($filter['expandedPageIds'])) {
            $pageIdStr = '-1';
            foreach (array_keys($filter['expandedPageIds']) as $pageId) {
                $pageIdStr .= ',' . (int) $pageId;
            }

            // Only select pages that do not have a collapsed (not expanded) page above it
            $restriction = "NOT EXISTS (SELECT 1 FROM $pageTable parentPage
                WHERE parentPage.$pageColumn[setLeft] < $pageTable.$pageColumn[setLeft]
                AND $pageTable.$pageColumn[setRight] < parentPage.$pageColumn[setRight]
                AND parentPage.$pageColumn[id] NOT IN ($pageIdStr))";

            // MySQL 4.x users should remove the line below
            $restrictions[] = $restriction;
        }

        if (!empty($filter['where'])) {
            $restrictions[] = $filter['where'];
        }
    }

    /**
     * Convert linear array of pages to recursive page tree structure.
     */
    protected function contentMakePageTree(&$pages, &$i, $level)
    {
        $newPages = array();

        for ($cou = count($pages); $i < $cou; ++$i) {
            $page = $pages[$i];

            if ($page['level'] == $level) {
                $page['subPages'] = array();
                $newPages[] = $page;
            } else if ($page['level'] > $level) {
                $newPages[count($newPages) - 1]['subPages'] = $this->contentMakePageTree($pages, $i, $page['level']);
            } else if ($page['level'] < $level) {
                --$i;
                break;
            }
        }

        return $newPages;
    }

    protected function contentEscapePageData(&$page)
    {
        $page['title'] = DataUtil::formatForDisplay($page['title']);
    }

    /* =[ New page ]================================================================== */

    public function newPage($args)
    {
        $pageData = $args['page'];
        $pageId = (int) $args['pageId'];
        $location = $args['location'];

        if ($location == 'sub' && $pageId <= 0) {
            return LogUtil::registerError($this->__("Error! Cannot create sub-page without parent page ID"));
        }

        // check for parent page
        if ($pageId > 0) {
            $sourcePageData = $this->getPage(array('id' => $pageId, 'includeContent' => false));
            if ($sourcePageData === false) {
                return false;
            }
        } else {
            $sourcePageData = null;
        }

        // language set to active language
        $pageData['language'] = ZLanguage::getLanguageCode();
        
        if ($location == 'sub' || $pageId == 0) {
            $pageData['position'] = $this->contentGetLastSubPagePosition($pageId) + 1;
            $pageData['parentPageId'] = $pageId;
            $pageData['level'] = ($sourcePageData == null ? 0 : $sourcePageData['level'] + 1);
            // copy first category from parent to new subpage
            $pageData['categoryId'] = ($sourcePageData == null ? 0 : $sourcePageData['categoryId']);
        } else {
            $pageData['position'] = $this->contentGetLastPagePosition($pageId) + 1;
            $pageData['parentPageId'] = ($sourcePageData == null ? 0 : $sourcePageData['parentPageId']);
            $pageData['level'] = ($sourcePageData == null ? 0 : $sourcePageData['level']);
        }

        if (!isset($pageData['urlname']) || empty($pageData['urlname'])) {
            $pageData['urlname'] = $pageData['title'];
        }
        $pageData['urlname'] = DataUtil::formatPermalink($pageData['urlname']);

        $ok = $this->isUniqueUrlnameByParentID(array('urlname' => $pageData['urlname'], 'parentId' => $pageData['parentPageId']));
        if (!$ok) {
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }

        $pageData['setLeft'] = -2;
        $pageData['setRight'] = -1;

        $this->setInitialPageState($pageData);

        $newPage = DBUtil::insertObject($pageData, 'content_page');
        Content_Util::contentMainEditExpandSet($pageData['parentPageId'], true);

        $ok = $this->insertPage(array(
                    'pageId' => $pageData['id'],
                    'position' => $pageData['position'],
                    'parentPageId' => $pageData['parentPageId']));

        if ($ok === false) {
            return false;
        }

        $ok = ModUtil::apiFunc('Content', 'History', 'addPageVersion', array(
                    'pageId' => $pageData['id'],
                    'action' => '_CONTENT_HISTORYPAGEADDED' /* delayed translation */));

        if ($ok === false) {
            return false;
        }

        Content_Util::clearCache();
        return $pageData['id'];
    }

    /* =[ Update page ]=============================================================== */

    public function updatePage($args)
    {
        $pageData = $args['page'];
        $pageId = (int) $args['pageId'];
        $revisionText = (isset($args['revisionText']) ? $args['revisionText'] : '_CONTENT_HISTORYPAGEUPDATED' /* delayed translation */);

        if (!isset($pageData['urlname']) || empty($pageData['urlname'])) {
            $pageData['urlname'] = $pageData['title'];
        }
        $pageData['urlname'] = DataUtil::formatPermalink($pageData['urlname']);

        if (!$this->isUniqueUrlnameByPageId(array('urlname' => $pageData['urlname'], 'pageId' => $pageId))) {
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }

        $oldPageData = $this->getPage(array(
            'id' => $pageId, 
            'editing' => true, 
            'filter' => array('checkActive' => false)));
        if ($oldPageData === false) {
            return false;
        }

        if ($oldPageData['layout'] != $pageData['layout']) {
            if (!$this->contentUpdateLayout($pageId, $oldPageData['layout'], $pageData['layout'])) {
                return false;
            }
        }

        if (!$this->contentUpdatePageRelations($pageId, $pageData)) {
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }
        $pageData['id'] = $pageId;
        DBUtil::updateObject($pageData, 'content_page');

        $ok = ModUtil::apiFunc('Content', 'History', 'addPageVersion', array('pageId' => $pageId, 'action' => $revisionText));
        if ($ok === false) {
            return false;
        }

        Content_Util::clearCache();
        return true;
    }

    // Update layout
    protected function contentUpdateLayout($pageId, $oldLayoutName, $newLayoutName)
    {
        $oldLayout = ModUtil::apiFunc('Content', 'Layout', 'getLayoutPlugin', array(
            'layout' => $oldLayoutName));
        $newLayout = ModUtil::apiFunc('Content', 'Layout', 'getLayoutPlugin', array(
            'layout' => $newLayoutName));

        $dbtables = DBUtil::getTables();
        $contentTable = $dbtables['content_content'];
        $contentColumn = $dbtables['content_content_column'];

        for ($i = $newLayout->getNumberOfContentAreas(); $i < $oldLayout->getNumberOfContentAreas(); ++$i) {
            $sql = "
                SELECT MAX($contentColumn[position])
                FROM $contentTable
                WHERE $contentColumn[pageId] = $pageId
                AND $contentColumn[areaIndex] = " . ($newLayout->getNumberOfContentAreas() - 1);

            $maxPos = DBUtil::selectScalar($sql);
            if ($maxPos == null) {
                $maxPos = -1;
            }
            $sql = "
                UPDATE $contentTable SET
                $contentColumn[areaIndex] = " . ($newLayout->getNumberOfContentAreas() - 1) . ",
                $contentColumn[position] = $contentColumn[position] + $maxPos + 1
                WHERE $contentColumn[pageId] = $pageId
                AND $contentColumn[areaIndex] = $i";

            DBUtil::executeSQL($sql);
        }

        Content_Util::clearCache();
        return true;
    }

    protected function contentUpdatePageRelations($pageId, $pageData)
    {
        if (isset($pageData['categories'])) {
            // check for single selection secondary category
            if (!is_array($pageData['categories'])) {
                $pageData['categories'] = array($pageData['categories']);
            }
            $dbtables = DBUtil::getTables();
            $pageCategoryTable = $dbtables['content_pagecategory'];
            $pageCategoryColumn = $dbtables['content_pagecategory_column'];
            $pageId = (int) $pageId;

            $this->contentDeletePageRelations($pageId);
            foreach ($pageData['categories'] as $categoryId) {
                $categoryId = (int) $categoryId;
                $sql = "
                    INSERT INTO $pageCategoryTable
                    ($pageCategoryColumn[pageId], $pageCategoryColumn[categoryId])
                    VALUES ($pageId, $categoryId)";

                DBUtil::executeSQL($sql);
            }
        }

        return true;
    }

    protected function contentDeletePageRelations($pageId)
    {
        $dbtables = DBUtil::getTables();
        $pageCategoryColumn = $dbtables['content_pagecategory_column'];
        $pageId = (int) $pageId;

        // Delete optional existing translation
        $where = "$pageCategoryColumn[pageId] = $pageId";
        DBUtil::deleteWhere('content_pagecategory', $where);

        return true;
    }

    protected function contentGetPageCategories($pageId)
    {
        $dbtables = DBUtil::getTables();
        $pageCategoryColumn = $dbtables['content_pagecategory_column'];
        $pageId = (int) $pageId;

        $where = "$pageCategoryColumn[pageId] = $pageId";
        $categories = DBUtil::selectObjectArray('content_pagecategory', $where, '', -1, -1, '', null, null, array('categoryId'));

        return $categories;
    }

    /* =[ Translate page ]============================================================ */

    public function updateTranslation($args)
    {
        $pageId = (int) $args['pageId'];
        $language = DataUtil::formatForStore($args['language']);
        $translated = $args['translated'];
        $addVersion = isset($args['addVersion']) ? $args['addVersion'] : true;

        $dbtables = DBUtil::getTables();
        $translatedTable = $dbtables['content_translatedpage'];
        $translatedColumn = $dbtables['content_translatedpage_column'];

        // Delete optional existing translation
        $where = "$translatedColumn[pageId] = $pageId AND $translatedColumn[language] = '$language'";
        DBUtil::deleteWhere('content_translatedpage', $where);

        // Insert new
        $translatedData = array('pageId' => $pageId, 'language' => $language, 'title' => $translated['title'], 'metadescription' => $translated['metadescription'], 'metakeywords' => $translated['metakeywords']);
        DBUtil::insertObject($translatedData, 'content_translatedpage');

        if ($addVersion) {
            $ok = ModUtil::apiFunc('Content', 'History', 'addPageVersion', array('pageId' => $pageId, 'action' => $this->__("Translated") /* delayed translation */));
            if ($ok === false) {
                return false;
            }
        }

        Content_Util::clearCache();
        return true;
    }

    public function deleteTranslation($args)
    {
        $pageId = (int) $args['pageId'];
        $language = isset($args['language']) ? $args['language'] : null;
        $addVersion = isset($args['addVersion']) ? $args['addVersion'] : true;

        $dbtables = DBUtil::getTables();
        $translatedColumn = $dbtables['content_translatedpage_column'];

        // Delete existing translation
        if ($language != null) {
            $where = "$translatedColumn[pageId] = $pageId AND $translatedColumn[language] = '" . DataUtil::formatForStore($language) . "'";
        } else {
            $where = "$translatedColumn[pageId] = $pageId";
        }
        DBUtil::deleteWhere('content_translatedpage', $where);

        $ok = ModUtil::apiFunc('Content', 'Content', 'deletePageTranslations', array('pageId' => $pageId, 'language' => $language));
        if ($ok === false) {
            return false;
        }

        if ($addVersion) {
            $ok = ModUtil::apiFunc('Content', 'History', 'addPageVersion', array('pageId' => $pageId, 'action' => $this->__("Translation deleted") /* delayed translation */));
            if ($ok === false) {
                return false;
            }
        }

        Content_Util::clearCache();
        return true;
    }

    public function getTranslations($args)
    {
        $pageId = (int) $args['pageId'];

        $dbtables = DBUtil::getTables();
        $translatedTable = $dbtables['content_translatedpage'];
        $translatedColumn = $dbtables['content_translatedpage_column'];

        $where = "$translatedColumn[pageId] = $pageId";
        $translations = DBUtil::selectObjectArray('content_translatedpage', $where);

        return $translations;
    }

    /* =[ Clone page ]=============================================================== */

    public function clonePage($args)
    {
        $newPage = $args['page'];
        $pageId = (int) $args['pageId']; // the page to clone
        $cloneTranslation = isset($newPage['translation']) ? $newPage['translation'] : true;

        $sourcePageData = $this->getPage(array('id' => $pageId, 'filter' => array('checkActive' => false, 'includeContent' => false)));
        if ($sourcePageData === false) {
            return false;
        }

        $pageData = array();
        $aKeys = array_keys($sourcePageData);
        $aVals = array_values($sourcePageData);
        // copy all direct keys/values
        for ($x = 0; $x < count($aKeys); $x++) {
            if ($aKeys[$x] != 'id') {
                $pageData[$aKeys[$x]] = $aVals[$x];
            }
        }

        $pageData['position']++;
        $pageData['title'] = $newPage['title'];
        $pageData['urlname'] = $newPage['urlname'];

        if (!isset($pageData['urlname']) || empty($pageData['urlname'])) {
            $pageData['urlname'] = $pageData['title'];
        }
        $pageData['urlname'] = DataUtil::formatPermalink($pageData['urlname']);

        $ok = $this->isUniqueUrlnameByParentID(array('urlname' => $pageData['urlname'], 'parentId' => $pageData['parentPageId']));
        if (!$ok) {
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }

        $pageData['setLeft'] = -2;
        $pageData['setRight'] = -1;

        $this->setInitialPageState($pageData);

        $newPage = DBUtil::insertObject($pageData, 'content_page');
        Content_Util::contentMainEditExpandSet($pageData['parentPageId'], true);

        $ok = $this->insertPage(array('pageId' => $pageData['id'], 'position' => $sourcePageData['position'] + 1, 'parentPageId' => $pageData['parentPageId']));
        if ($ok === false) {
            return false;
        }

        $ok = ModUtil::apiFunc('Content', 'Content', 'copyContentOfPageToPage', array('fromPageId' => $sourcePageData['id'], 'toPageId' => $pageData['id'], 'cloneTranslation' => $cloneTranslation));
        if ($ok === false) {
            return false;
        }
        $ok = ModUtil::apiFunc('Content', 'History', 'addPageVersion', array('pageId' => $pageData['id'], 'action' => '_CONTENT_HISTORYPAGECLONED' . "|fromPage=" . $sourcePageData['id'] /* delayed translation */));
        if ($ok === false) {
            return false;
        }
        if ($cloneTranslation) {
            $translatedData = DBUtil::selectObjectByID('content_translatedpage', $sourcePageData['id'], 'pageId');
            if ($translatedData) {
                $translatedData['pageId'] = $pageData['id'];
                DBUtil::insertObject($translatedData, 'content_translatedpage');
            }
        }
        $this->contentUpdatePageRelations($pageData['id'], $pageData);

        Content_Util::clearCache();
        return $pageData['id'];
    }

    /* =[ Reinsert deleted page ]=============================================================== */

    public function reinsertPage($args)
    {
        $pageData = $args['page'];

        if ($pageData['parentPageId'] > 0) {
            $sourcePageData = $this->getPage(array('id' => $pageData['parentPageId'], 'checkActive' => false, 'includeContent' => false));
            if ($sourcePageData === false) {
                $pageData['parentPageId'] = 0;
            }
        } else {
            $sourcePageData = null;
        }

        $pageData['language'] = ZLanguage::getLanguageCode();

        // what does this mean?
        if ($pageData['parentPageId'] > 0) {
            $pageData['position'] = $this->contentGetLastSubPagePosition($pageData['parentPageId']) + 1;
            $pageData['level'] = ($sourcePageData == null ? 0 : $sourcePageData['level'] + 1);
        } else {
            $pageData['position'] = $this->contentGetLastPagePosition($pageData['parentPageId']) + 1;
            $pageData['parentPageId'] = ($sourcePageData == null ? 0 : $sourcePageData['parentPageId']);
            $pageData['level'] = ($sourcePageData == null ? 0 : $sourcePageData['level']);
        }

        $ok = $this->isUniqueUrlnameByParentID(array('urlname' => $pageData['urlname'], 'parentId' => $pageData['parentPageId']));
        while (!$ok) {
            $pageData['urlname'] = DataUtil::formatPermalink(RandomUtil::getString(12, 12, false, true, true, false, true, false, true));
            $ok = $this->isUniqueUrlnameByParentID(array('urlname' => $pageData['urlname'], 'parentId' => $pageData['parentPageId']));
        }

        $pageData['setLeft'] = -2;
        $pageData['setRight'] = -1;

        $this->setInitialPageState($pageData);

        $newPage = DBUtil::insertObject($pageData, 'content_page', true);
        Content_Util::contentMainEditExpandSet($pageData['parentPageId'], true);

        $ok = $this->insertPage(array('pageId' => $pageData['id'], 'position' => $pageData['position'], 'parentPageId' => $pageData['parentPageId']));
        if ($ok === false) {
            return false;
        }

        Content_Util::clearCache();
        return array('id' => $pageData['id'], 'urlname' => $pageData['urlname']);
    }

    /* =[ Delete page ]=============================================================== */

    public function deletePage($args)
    {
        $pageId = (int) $args['pageId'];

        $pageData = DBUtil::selectObjectByID('content_page', $pageId);
        if (!$pageData) {
            return false;
        }

        $table = DBUtil::getTables();
        $pageTable = $table['content_page'];
        $pageColumn = $table['content_page_column'];

        $subPages = DBUtil::selectObjectArray('content_page', "$pageColumn[setLeft] > $pageData[setLeft] AND $pageColumn[setRight] < $pageData[setRight] AND $pageColumn[level]=$pageData[level]+1", 'setLeft');
        foreach ($subPages as $page) {
            $this->deletePage(array('pageId' => $page['id']));
        }

        $ok = ModUtil::apiFunc('Content', 'History', 'addPageVersion', array('pageId' => $pageId, 'action' => '_CONTENT_HISTORYPAGEDELETED' /* delayed translation */));
        if ($ok === false) {
            return false;
        }

        // Delete translations first - they depend on content data
        $ok = $this->deleteTranslation(array('pageId' => $pageId, 'addVersion' => false));
        if (!$ok) {
            return false;
        }

        // Delete all content items on this page and all it's sub pages
        $ok = ModUtil::apiFunc('Content', 'Content', 'deletePageAndSubPageContent', array('pageId' => $pageId));
        if (!$ok) {
            return false;
        }

        if (!$this->removePage(array('id' => $pageId))) {
            return false;
        }

        // Now safe to delete page
        DBUtil::deleteObjectByID('content_page', $pageId);

        $this->contentDeletePageRelations($pageId);

        Content_Util::clearCache();
        return true;
    }

    /* =[ Helper functions for moving pages ]========================================= */

    protected function contentGetLastSubPagePosition($pageId)
    {
        $pageId = (int) $pageId;

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $sql = "
            SELECT MAX($pageColumn[position])
            FROM $pageTable
            WHERE $pageColumn[parentPageId] = $pageId";

        $pos = DBUtil::selectScalar($sql);

        return $pos === null ? -1 : (int) $pos;
    }

    protected function contentGetLastPagePosition($pageId)
    {
        $pageId = (int) $pageId;

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $sql = "
            SELECT MAX(page.$pageColumn[position])
            FROM $pageTable page
            JOIN $pageTable orgPage
            ON orgPage.$pageColumn[id] = $pageId
            WHERE page.$pageColumn[parentPageId] = orgPage.$pageColumn[parentPageId]";

        $pos = DBUtil::selectScalar($sql);

        return $pos === null ? -1 : (int) $pos;
    }

    protected function contentUpdateNestedSetValues_Rec($pageId, $level, &$count)
    {
        $pageId = (int) $pageId;

        $left = $count++;

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $ids = DBUtil::selectFieldArray('content_page', 'id', "$pageColumn[parentPageId] = $pageId", "$pageColumn[position]");
        foreach ($ids as $subPageId) {
            $this->contentUpdateNestedSetValues_Rec($subPageId, $level + 1, $count);
        }

        $right = $count++;

        $obj = array(
            'setLeft'   => $left,
            'setRight'  => $right,
            'level'     => $level,
            'id'        => $pageId
            );
        DBUtil::updateObject ($obj, 'content_page');

        return true;
    }

    public function pageDrop($args)
    {
        $srcId = (int) $args['srcId'];
        $dstId = (int) $args['dstId'];

        $srcPage = DBUtil::selectObjectByID('content_page', $srcId);
        $dstPage = DBUtil::selectObjectByID('content_page', $dstId);

        // Is $src a parent of $dst? This is not allowed
        if ($srcPage['setLeft'] < $dstPage['setLeft'] && $srcPage['setRight'] > $dstPage['setRight']) {
            return LogUtil::registerError($this->__('Error! It is not possible to move a parent page beneath one of its descendants.'));
        }

        // Remove the src page and reinsert later on.
        $ok = $this->removePage(array('id' => $srcId));
        if ($ok === false) {
            return false;
        }
        DBUtil::flushCache('content_page');

        // Get destination again so we get an updated position after the above "removePage" and DB flush
        $dstPage = DBUtil::selectObjectByID('content_page', $dstId);

        $test = $this->isUniqueUrlnameByParentID(array('urlname' => $srcPage['urlname'], 'parentId' => $dstPage['parentPageId'], 'currentPageId' => $srcId));
        if (!$test) {
            // not unique name so reinsert at src position
            $this->insertPage(array('pageId' => $srcId, 'position' => $srcPage['position'], 'parentPageId' => $srcPage['parentPageId']));
            // FIXME: This causes a "page not found". But I don't know why. Pls help ;)
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }
        // insert the srcPage as subpage of the dstPage
        $ok = $this->insertPage(array('pageId' => $srcId, 'position' => $dstPage['position'] + 1, 'parentPageId' => $dstPage['id']));
        if ($ok === false) {
            return false;
        } else {
            // Expand the destination page to show the new nested page
            Content_Util::contentMainEditExpandSet($dstPage['id'], true);
        }

        Content_Util::clearCache();
        return true;
    }

    public function decreaseIndent($args)
    {
        $pageId = (int) $args['pageId'];
        $page = DBUtil::selectObjectByID('content_page', $pageId);
        $parentPage = DBUtil::selectObjectByID('content_page', $page['parentPageId']);

        // Remove the src page and reinsert later on.
        $ok = $this->removePage(array('id' => $pageId));
        if ($ok === false) {
            return false;
        }
        DBUtil::flushCache('content_page');

        // Get destination again so we get an updated position after the above "removePage"
        $parentPage = DBUtil::selectObjectByID('content_page', $page['parentPageId']);

        $test = $this->isUniqueUrlnameByParentID(array('urlname' => $page['urlname'], 'parentId' => $parentPage['parentPageId'], 'currentPageId' => $pageId));
        if (!$test) {
            // not unique name so reinsert at src position
            $this->insertPage(array('pageId' => $pageId, 'position' => $page['position'], 'parentPageId' => $page['parentPageId']));
            // FIXME: This causes a "page not found". But I don't know why. Pls help ;)
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }
        // move the page up in the tree
        $ok = $this->insertPage(array('pageId' => $pageId, 'position' => $parentPage['position'] + 1, 'parentPageId' => $parentPage['parentPageId']));
        if ($ok === false) {
            return false;
        }

        Content_Util::clearCache();
        return true;
    }

    public function increaseIndent($args)
    {
        $pageId = (int) $args['pageId'];
        $page = DBUtil::selectObjectByID('content_page', $pageId);

        // Cannot indent topmost page
        if ($page['position'] == 0) {
            return true;
        }

        $parentPageId = $page['parentPageId'];
        $position = $page['position'];

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $where = "$pageColumn[parentPageId] = $parentPageId AND $pageColumn[position] = $position-1";

        $previousPage = DBUtil::selectObject('content_page', $where);
        $thisPage = DBUtil::selectObjectByID('content_page', $pageId);
        if (!isset($previousPage['id']) || !isset($thisPage['urlname'])) {
            return LogUtil::registerError($this->__('Error! The indentation of this page cannot be increased.'));
        }

        $ok = $this->isUniqueUrlnameByParentID(array('urlname' => $thisPage['urlname'], 'parentId' => $previousPage['id']));
        if (!$ok) {
            return LogUtil::registerError($this->__('Error! There is already another page registered with the supplied permalink URL.'));
        }

        $ok = $this->removePage(array('id' => $pageId));
        if ($ok === false) {
            return false;
        }
        DBUtil::flushCache('content_page');

        // Find new position (last in existing sub-pages)
        $sql = "
            SELECT MAX($pageColumn[position])
            FROM $pageTable
            WHERE $pageColumn[parentPageId] = $previousPage[id]";

        $newPosition = DBUtil::selectScalar($sql);
        if ($newPosition == null) {
            $newPosition = 0;
        }
        $ok = $this->insertPage(array('pageId' => $pageId, 'position' => $newPosition, 'parentPageId' => $previousPage['id']));
        if ($ok === false) {
            return false;
        }
        /*
          $ok = $this->updateNestedSetValues();
          if ($ok === false)
          return false;
         */
        Content_Util::clearCache();
        return true;
    }

    // Remove page from hierarchy, but don't delete it
    public function removePage($args)
    {
        $id = (int) $args['id'];

        // prevent caching!!! otherwise if you delete a page with subpages setright isn't up2date!
        $pageData = DBUtil::selectObjectByID('content_page', $id, 'id', null, null, null, false);

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $sql = "
            UPDATE $pageTable
            SET $pageColumn[position] = $pageColumn[position]-1
            WHERE $pageColumn[parentPageId] = $pageData[parentPageId]
            AND $pageColumn[position] > $pageData[position]";

        DBUtil::executeSQL($sql);

        // Move page and it's subpages out of the left/right system (to avoid later problems)
        $diff = $pageData['setRight'] + 1;
        //echo "diff=$diff. ";
        //var_dump($pageData);
        $sql = "
            UPDATE $pageTable SET
            $pageColumn[setLeft] = $pageColumn[setLeft]-$diff,
            $pageColumn[setRight] = $pageColumn[setRight]-$diff
            WHERE $pageData[setLeft] <= $pageColumn[setLeft] AND $pageColumn[setRight] <= $pageData[setRight]";

        DBUtil::executeSQL($sql);

        // Update all left/right values for all pages "right of this page"
        $diff = $pageData['setRight'] - $pageData['setLeft'] + 1;

        $sql = "
            UPDATE $pageTable SET
            $pageColumn[setLeft] = $pageColumn[setLeft]-$diff
            WHERE $pageColumn[setLeft] > $pageData[setRight]";

        DBUtil::executeSQL($sql);

        $sql = "
            UPDATE $pageTable SET
            $pageColumn[setRight] = $pageColumn[setRight]-$diff
            WHERE $pageColumn[setRight] > $pageData[setRight]";

        DBUtil::executeSQL($sql);

        return true;
    }

    // Insert page into hierarchy
    public function insertPage($args)
    {
        $pageId = (int) $args['pageId'];
        $position = (int) $args['position'];
        $parentPageId = (int) $args['parentPageId'];

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $sql = "
            UPDATE $pageTable
            SET $pageColumn[position] = $pageColumn[position]+1
            WHERE $pageColumn[parentPageId] = $parentPageId
            AND $pageColumn[position] >= $position";

        DBUtil::executeSQL($sql);

        // *** Update all left/right values for all pages "right of this page"
        // Assume "this page" has left/right values that matches it's subtree (but with a wrong offset)
        $pageData = DBUtil::selectObjectByID('content_page', $pageId);
        if ($parentPageId > 0) {
            $parentPageData = DBUtil::selectObjectByID('content_page', $parentPageId);
            $parentLevel = $parentPageData['level'];
        } else {
            $parentPageData = null;
            $parentLevel = -1;
        }

        // Fetch largest left/right value left of this page's new position
        $sql = "
            SELECT MAX($pageColumn[setRight])
            FROM $pageTable
            WHERE $pageColumn[parentPageId] = $parentPageId
            AND $pageColumn[position] < $position
            AND $pageColumn[id] != $pageId";

        $maxLeftOfthis = DBUtil::selectScalar($sql);
        if (empty($maxLeftOfthis)) {
            $maxLeftOfthis = -1;
        }
        if ($parentPageData != null && $parentPageData['setLeft'] > $maxLeftOfthis) {
            $maxLeftOfthis = $parentPageData['setLeft'];
        }
        $diff = $pageData['setRight'] - $pageData['setLeft'] + 1;
        $sql = "
            UPDATE $pageTable SET
            $pageColumn[setRight] = $pageColumn[setRight]+$diff
            WHERE $pageColumn[setRight] > $maxLeftOfthis AND $pageColumn[id] != $pageId";

        DBUtil::executeSQL($sql);

        $sql = "
            UPDATE $pageTable SET
            $pageColumn[setLeft] = $pageColumn[setLeft]+$diff
            WHERE $pageColumn[setLeft] > $maxLeftOfthis AND $pageColumn[id] != $pageId";

        DBUtil::executeSQL($sql);

        // *** Update level/left/right values for this page and all pages below
        $levelDiff = $pageData['level'] - ($parentLevel + 1);
        $diff2 = $pageData['setLeft'] - $maxLeftOfthis - 1;
        //echo "diff2=$diff2. ";
        $sql = "
            UPDATE $pageTable SET
            $pageColumn[setLeft] = $pageColumn[setLeft]-$diff2,
            $pageColumn[setRight] = $pageColumn[setRight]-$diff2,
            $pageColumn[level] = $pageColumn[level]-$levelDiff
            WHERE $pageData[setLeft] <= $pageColumn[setLeft] AND $pageColumn[setRight] <= $pageData[setRight]";

        DBUtil::executeSQL($sql);

        // Update this page
        $newPageData = array('id' => $pageId, 'position' => $position, 'parentPageId' => $parentPageId, 'level' => ($parentPageData == null ? 0 : $parentPageData['level'] + 1));
        DBUtil::updateObject($newPageData, 'content_page');

        return true;
    }

    /* =[ Utility functions ]========================================================= */

    /**
     * Test if the permalink url is already exists by urlname and the page ID of its parent
     *
     * @author Philipp Niethammer <webmaster@nochwer.de>
     * @param string    urlname
     * @param int       parentId
     * @return bool
     */
    public function isUniqueUrlnameByParentID($args)
    {
        if (!isset($args['urlname']) || empty($args['urlname']) || !isset($args['parentId'])) {
            return LogUtil::registerArgsError();
        }

        $currentPageId = isset($args['currentPageId']) ? (int) $args['currentPageId'] : -1;
        $url = $args['urlname'];

        if ($args['parentId'] > 0) {
            $parenturl = $this->getUrlPath(array('pageId' => $args['parentId']));
            $url = $parenturl . '/' . $url;
        }

        $pageId = $this->solveURLPath(array('urlname' => $url));

        // It is unique if no other page exists OR the found page is the same as we are testing from
        if ($pageId == false || $pageId == $currentPageId) {
            return true;
        }

        return false;
    }

    /**
     * Test if the permlink is unique with help of its pageId
     *
     * @param string urlname
     * @param string pageId
     * @return bool
     */
    public function isUniqueUrlnameByPageId($args)
    {
        // Argument check
        if (!isset($args['urlname']) || empty($args['urlname']) || !isset($args['pageId']) || empty($args['pageId'])) {
            return LogUtil::registerArgsError();
        }
        $page = $this->getPage(array('id' => $args['pageId'], 'includeContent' => false, 'filter' => array('checkActive' => false)));
        $parenturl = $this->getUrlPath(array('pageId' => $page['parentPageId']));
        $url = $parenturl . '/' . $args['urlname'];
        $pageId = $this->solveURLPath(array('urlname' => $url));

        if ($pageId == false || $pageId == $args['pageId']) {
            return true;
        }
        return false;
    }

    /**
     * get page path for url
     *
     * @author Philipp Niethammer <webmaster@nochwer.de>
     *
     * @param int   pageId
     * @return string page path
     */
    public function getURLPath($args)
    {
        // Argument check
        if (!isset($args['pageId'])) {
            return LogUtil::registerArgsError();
        }

        $pageId = (int) $args['pageId'];

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $sql = "SELECT parentPage.$pageColumn[urlname]
            FROM $pageTable parentPage
            LEFT OUTER JOIN $pageTable page
            ON page.$pageColumn[setLeft] >= parentPage.$pageColumn[setLeft]
            AND page.$pageColumn[setRight] <= parentPage.$pageColumn[setRight]
            WHERE page.$pageColumn[id] = $pageId
            ORDER BY parentPage.$pageColumn[setLeft]";

        $result = DBUtil::executeSQL($sql);

        if (!$result) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $objectArray = DBUtil::marshallObjects($result);
        $path = '';
        foreach ($objectArray as $object) {
            $path .= ( !empty($path) ? '/' : '') . $object['page_urlname'];
        }
        return $path;
    }

    /**
     * Solve url path to pageID
     *
     * XXX not very pretty, but it works. Please replace if you have a better solution.
     *
     * @param string urlname
     * @return int pageID
     */
    public function solveURLPath($args)
    {
        // Argument check
        if (!isset($args['urlname'])) {
            return LogUtil::registerArgsError();
        }
        $urlname = $args['urlname'];

        // Remove trailing slash
        if (substr($urlname, -1) == '/') {
            $urlname = substr($urlname, 0, -1);
        }
        $parts = explode('/', $urlname);

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $tables = array();
        $parent = array();
        for ($i = 0, $count = count($parts); $i < $count; $i++) {
            $tables[] = $pageTable . " tbl$i";
            $url = DataUtil::formatForStore($parts[$i]);
            $urlRestriction = "tbl$i.$pageColumn[urlname] = '$url'";
            if ($i < $count - 1) {
                $parent[] = $urlRestriction . " AND tbl$i.$pageColumn[id] = tbl" . ($i + 1) . ".$pageColumn[parentPageId]";
            } else {
                $parent[] = $urlRestriction;
            }
        }
        $tablesql = implode(",\n", $tables);
        $parentsql = implode("\nAND ", $parent);

        $lastelement = $count - 1;
        $sql = "SELECT tbl$lastelement.$pageColumn[id]
            FROM $tablesql
            WHERE tbl0.$pageColumn[parentPageId] = 0
            AND $parentsql";

        $result = DBUtil::executeSQL($sql);
        $objectArray = DBUtil::marshallObjects($result);
        $pageId = null;
        foreach ($objectArray as $object) {
            $pageId = reset($object);
        }
        return $pageId;
    }

    public function getPagePath($args)
    {
        // Argument check
        if (!isset($args['pageId'])) {
            return LogUtil::registerArgsError();
        }
        $pageId = (int) $args['pageId'];

        $dbtables = DBUtil::getTables();
        $pageTable = $dbtables['content_page'];
        $pageColumn = $dbtables['content_page_column'];

        $sql = "SELECT parentPage.$pageColumn[id],
            parentPage.$pageColumn[title]
            FROM $pageTable parentPage
            LEFT OUTER JOIN $pageTable page
            ON page.$pageColumn[setLeft] >= parentPage.$pageColumn[setLeft]
            AND page.$pageColumn[setRight] <= parentPage.$pageColumn[setRight]
            WHERE page.$pageColumn[id] = $pageId
            ORDER BY parentPage.$pageColumn[setLeft]";

        $result = DBUtil::executeSQL($sql);
        if (!$result) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $objectArray = DBUtil::marshallObjects($result);
        $path = array();
        foreach ($objectArray as $object) {
            $path[] = array('id' => $object['page_id'], 'title' => $object['page_title']);
        }
        return $path;
    }

    /**
     * Update the status of the page
     *
     * @param int pageId
     * @param string active (optional)
     * @param string inMenu (optional)
     *
     * @return true
     */
    public function updateState($args)
    {
        // Argument check
        if (!isset($args['pageId'])) {
            return LogUtil::registerArgsError();
        }

        $page = array('id' => $args['pageId']);
        if (isset($args['active'])) {
            $page['active'] = ($args['active'] == 'true') ? 0 : 1;
        }
        if (isset($args['inMenu'])) {
            $page['inMenu'] = ($args['inMenu'] == 'true') ? 0 : 1;
        }

        DBUtil::updateObject($page, 'content_page');
        return true;
    }

    /**
     * set appropriate array values based on modvar
     * @param array $page
     */
    protected function setInitialPageState(&$page)
    {
        // set the state of new pages
        switch ($this->getVar('newPageState')) {
            case '1':
                $page['active'] = 1;
                $page['inMenu'] = 1;
                break;
            case '2':
                $page['active'] = 0;
                $page['inMenu'] = 1;
                break;
            case '3':
                $page['active'] = 1;
                $page['inMenu'] = 0;
                break;
            case '4':
                $page['active'] = 0;
                $page['inMenu'] = 0;
                break;
        }
    }

    /**
     * orders subpages of a slected page by title
     * @param array $pageId
     */
    public function orderPages($args)
    {
        $pageId = (int) $args['pageId'];
        $page = $this->getPage(array('id' => $pageId, 'filter' => array('checkActive' => false)));
        if ($page === false) {
            return false;
        }
 
        $count = $page['setLeft'];
        $level = $page['level'];
 
        $subpages = $this->getPages(array('orderBy' => 'title', 'filter' => array('checkActive' => false, 'parentId' => $pageId)));
 
        for ($i = 0; $i < count($subpages); $i++) {
            $page = $subpages[$i];
            $page['position'] = $i;
            DBUtil::updateObject($page, 'content_page');
        }

        return $this->contentUpdateNestedSetValues_Rec($pageId, $level, $count);
    }
}
