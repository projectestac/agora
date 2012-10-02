<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pncontentapi.php 386 2010-01-09 19:44:05Z herr.vorragend $
 * @license See license.txt
 */

Loader::requireOnce('modules/content/common.php');

/**
 * Base class for content plugins
 *
 * You must add a constructor taking an array of the plugin's data. This array
 * corresponds to what is return by pnFormRender::pnFormGetValues() when user
 * has submitted data after editing plugin. The constructor should initialize
 * object data based on the input.
 */
class contentTypeBase
{
    var $pageId;
    var $contentAreaIndex;
    var $position;
    var $contentId;

    /**
     * Style position (none, above, topLeft, topRight, aboveLeft, aboveRight)
     * @var string
     */
    var $stylePosition;

    /**
     * Style width (percentage)
     * @var int
     */
    var $styleWidth;

    /**
     * Style class (CSS class name)
     * @var int
     */
    var $styleClass;

    /**
     * Flag indicating if a styling <div> has been added
     */
    var $addedStyle = false;

    /**
     * Get module name (for use in pnModAPIFunc() calls)
     * @return string
     */
    function getModule()
    {
        return 'unknown';
    }

    /**
     * Get plugin name (use same casing as in the filename of the plugin)
     * @return string
     */
    function getName()
    {
        return 'unknown';
    }

    /**
     * Get displayed title
     * @return string
     */
    function getTitle()
    {
        return '- no title defined -';
    }

    /**
     * Get displayed description
     * @return string
     */
    function getDescription()
    {
        return '';
    }

    /**
     * Get extended plugin information to display on admin module dependency list
     * @return string
     */
    function getAdminInfo()
    {
        return '';
    }

    /**
     * Check for translation ability
     * @return bool True if content can be translated
     */
    function isTranslatable()
    {
        return false;
    }

    /**
     * Check for availability of plugin
     * @return bool True if active and ready to be used
     */
    function isActive()
    {
        return true;
    }

    /**
     * Load plugin object data from values stored in database
     *
     * @return bool True
     */
    function loadData(&$data)
    {
        return true;
    }

    /**
     * Get text displayed before actual content.
     *
     * Use this method to display styling like float and width for the content.
     * The default implementation adds a generic <div> around the content, but
     * you can choose to override this method in inherited plugins in order to
     * generate more compact HTML where the styling is included in the actual
     * content.
     * @return string Displayed text
     */
    function displayStart()
    {
        $style = '';
        $class = '';

        if (!empty($this->styleClass))
            $class .= $this->styleClass . ' ';

        switch ($this->stylePosition) {
            case 'above':
                $style .= "margin-left: auto; margin-right: auto;";
                break;
            case 'topLeft':
                $style .= "float: left;";
                break;
            case 'topRight':
                $style .= "float: right;";
                break;
            case 'aboveLeft':
                $style .= "margin-right: auto;";
                break;
            case 'aboveRight':
                $style .= "margin-left: auto;";
                break;
        }

        if ($this->stylePosition != 'none') {
            $class .= "figure-$this->stylePosition ";
            if (!empty($this->styleWidth))
                $class .= "$this->styleWidth ";
        }

        if (empty($style) && empty($class))
            return '';

        $styleHtml = empty($style) ? '' : " style=\"$style\"";
        $classHtml = empty($class) ? '' : " class=\"$class\"";

        $this->addedStyle = true;
        return "<div$styleHtml$classHtml>\n";
    }

    /**
     * Get output for normal display
     * @return string
     */
    function display()
    {
        return '- no display function defined -';
    }

    /**
     * Get text displayed after actual content.
     * @return string Displayed text
     */
    function displayEnd()
    {
        if (!$this->addedStyle)
            return '';
        else
            return '</div>';
    }

    /**
     * Get output for display in editing mode
     *
     * Default implementation simply returns plugin title
     * @return string
     */
    function displayEditing()
    {
        return $this->getTitle();
    }

    /**
     * Get array containing default data similar to what is returned by pnFormRender::pnFormGetValues()
     * @return array
     */
    function getDefaultData()
    {
        return null;
    }

    /**
     * Event handler called when plugin is loaded for use in editing window
     *
     * Can be used to include JavaScript using PageUtil::addVar() or assign
     * values to the render using $render->assign().
     * @return nothing
     */
    function startEditing(&$render)
    {
    }

    /* UNUSED ??? */
    function handleSomethingChanged(&$render, $data)
    {
    }

    /**
     * Event handler called when instance of plugin is deleted
     *
     * Can be used to clean up extra data stored in database
     * @return nothing
     */
    function delete()
    {
    }

    /**
     * Event handler called after user has submitted input
     *
     * Can be used to check user data as well as post-process submitted data.
     * @return bool True is data is valid - false otherwise.
     */
    function isValid(&$data)
    {
        return true;
    }

    /**
     * Return searchable text
     *
     * This function should return all the text that is searchable through PostNuke's standard
     * search interface. You must strip the text of any HTML tags and other structural information
     * before returning the text. If you have multiple searchable text fields then concatenate all
     * the text from these and return the full string.
     * @return string Searchable text
     */
    function getSearchableText()
    {
        return null;
    }
}
;

/*=[ Standard CRUD methods ]=====================================================*/

function content_contentapi_getContent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $id = (int) $args['id'];
    $language = (array_key_exists('language', $args) ? $args['language'] : ZLanguage::getLanguageCode());
    $translate = (array_key_exists('translate', $args) ? $args['translate'] : true);

    $content = contentGetContent('content', $id, $language, $translate);
    if ($content === false)
        return false;
    if (count($content) == 0)
        return LogUtil::registerError(__("Error! Unknown content-ID", $dom));

    return $content[0];
}

function content_contentapi_getPageContent($args)
{
    $pageId = (int) $args['pageId'];
    $editing = (array_key_exists('editing', $args) ? $args['editing'] : false);
    $language = (array_key_exists('language', $args) ? $args['language'] : ZLanguage::getLanguageCode());
    $translate = (array_key_exists('translate', $args) ? $args['translate'] : true);

    $contentList = contentGetContent('page', $pageId, $language, $translate);

    $content = array();
    foreach ($contentList as $c) {
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
        $content[$c['areaIndex']][] = $c;
    }

    return $content;
}

function content_contentapi_GetSimplePageContent($args)
{
    $pageId = (int) $args['pageId'];

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    $where = "$contentColumn[pageId] = $pageId";
    $content = DBUtil::selectObjectArray('content_content', $where);

    return $content;
}

function contentGetContent($mode, $id, $language, $translate, $orderBy = null)
{
    $dom = ZLanguage::getModuleDomain('content');
    $id = (int) $id;

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];
    $translatedTable = $pntable['content_translatedcontent'];
    $translatedColumn = $pntable['content_translatedcontent_column'];

    if ($mode == 'content')
        $restriction = "$contentColumn[id] = $id";
    else
        $restriction = "$contentColumn[pageId] = $id";

    $language = DataUtil::formatForStore($language);

    $cols = DBUtil::_getAllColumns('content_content');
    $ca = DBUtil::getColumnsArray('content_content');
    $ca[] = 'translated';

    $sql = "
SELECT $cols,
       $translatedColumn[data] AS translated
FROM $contentTable c
LEFT JOIN $translatedTable t
     ON     t.$translatedColumn[contentId] = $contentColumn[id]
        AND t.$translatedColumn[language] = '$language'
WHERE $restriction";

    if (empty($orderBy))
        $orderBy = "$contentColumn[areaIndex], $contentColumn[position]";

    $sql .= " ORDER BY $orderBy";

    $dbresult = DBUtil::executeSQL($sql);

    $content = DBUtil::marshallObjects($dbresult, $ca);

    for ($i = 0, $cou = count($content); $i < $cou; ++$i) {
        $c = &$content[$i];
        $c['data'] = (empty($c['data']) ? null : unserialize($c['data']));
        $c['translated'] = (empty($c['translated']) ? null : unserialize($c['translated']));

        if ($translate)
            if (is_array($c['translated']) && is_array($c['data']))
                $c['data'] = array_merge($c['data'], $c['translated']);

        $contentPlugin = pnModAPIFunc('content', 'content', 'getContentPlugin', $c);
        if ($contentPlugin === false)
            return LogUtil::registerError(__("Error! Can't load content plugin", $dom));
        $content[$i]['plugin'] = $contentPlugin;
        $content[$i]['isTranslatable'] = $contentPlugin->isTranslatable();
    }

    $dbresult->close();

    return $content;
}

function content_contentapi_getPageAndSubPageContent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $pageId = (int) $args['pageId'];

    $pntable = pnDBGetTables();
    $pageTable = $pntable['content_page'];
    $pageColumn = $pntable['content_page_column'];
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    // Fetch all content items that belongs to page X or any of it's sub pages
    $sql = "
SELECT co.*
FROM $pageTable page
JOIN $pageTable subPage
     ON     subPage.$pageColumn[setLeft] >= page.$pageColumn[setLeft]
        AND subPage.$pageColumn[setRight] <= page.$pageColumn[setRight]
JOIN $contentTable co
     ON co.$contentColumn[pageId] = subPage.$pageColumn[id]
WHERE page.$pageColumn[id] = $pageId";

    $dbresult = DBUtil::executeSQL($sql);

    $ca = DBUtil::getColumnsArray('content_content');
    $content = DBUtil::marshallObjects($dbresult, $ca);

    for ($i = 0, $cou = count($content); $i < $cou; ++$i) {
        $c = &$content[$i];
        $c['data'] = (empty($c['data']) ? null : unserialize($c['data']));
        $contentPlugin = pnModAPIFunc('content', 'content', 'getContentPlugin', $c);
        if ($contentPlugin === false)
            return LogUtil::registerError(__("Error! Can't load content plugin", $dom));
        $content[$i]['plugin'] = $contentPlugin;
    }

    return $content;
}

/*=[ Create new content element ]================================================*/

function content_contentapi_newContent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $contentData = $args['content'];
    $pageId = (int) $args['pageId'];
    $contentAreaIndex = (int) $args['contentAreaIndex'];
    $position = (int) $args['position'];
    $addVersion = isset($args['addVersion']) ? $args['addVersion'] : true;

    if (!contentMoveContentDown($position, $contentAreaIndex, $pageId))
        return false;

    $contentPlugin = pnModAPIFunc($contentData['module'], 'contenttypes', $contentData['type'], null);

    $contentData['pageId'] = $pageId;
    $contentData['areaIndex'] = $contentAreaIndex;
    $contentData['position'] = $position;
    if (!isset($contentData['data']))
        $contentData['data'] = serialize($contentPlugin->getDefaultData());
    else
        $contentData['data'] = serialize($contentData['data']);

    DBUtil::insertObject($contentData, 'content_content', 'id', true); // true => preserve values (id-column)


    if ($addVersion) {
        $ok = pnModAPIFunc('content', 'history', 'addPageVersion', array('pageId' => $pageId, 'action' => '_CONTENT_HISTORYCONTENTADDED' /* delayed translation */));
        if ($ok === false)
            return false;
    }

    contentClearCaches();
    return $contentData['id'];
}

function contentGetLastContentPosition($pageId, $contentAreaIndex)
{
    $pageId = (int) $pageId;
    $contentAreaIndex = (int) $contentAreaIndex;

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    $sql = "
SELECT MAX($contentColumn[position])
FROM $contentTable
WHERE $contentColumn[pageId] = $pageId";

    $pos = DBUtil::selectScalar($sql);
    return $pos === null ? -1 : (int) $pos;
}

/*=[ Update content element ]====================================================*/

function content_contentapi_updateContent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $contentData = $args['content'];
    $addVersion = isset($args['addVersion']) ? $args['addVersion'] : true;

    $contentData['id'] = $args['id'];
    if (isset($contentData['data']))
        $contentData['data'] = serialize($contentData['data']);

    DBUtil::updateObject($contentData, 'content_content');

    if (!empty($args['searchableText'])) {
        if (!contentUpdateSearchableText((int) $args['id'], $args['searchableText']))
            return false;
    }

    $content = content_contentapi_getContent(array('id' => $contentData['id']));
    if ($content === false)
        return false;

    if ($addVersion) {
        $ok = pnModAPIFunc('content', 'history', 'addPageVersion', array('pageId' => $content['pageId'], 'action' => '_CONTENT_HISTORYCONTENTUPDATED' /* delayed translation */));
        if ($ok === false)
            return false;
    }

    contentClearCaches();
    return true;
}

function contentUpdateSearchableText($contentId, $text)
{
    $pntable = pnDBGetTables();
    $searchTable = $pntable['content_searchable'];
    $searchColumn = $pntable['content_searchable_column'];

    $sql = "DELETE FROM $searchTable WHERE $searchColumn[contentId] = $contentId";
    DBUtil::executeSQL($sql);

    $sql = "
INSERT INTO $searchTable
  ($searchColumn[contentId], $searchColumn[text])
VALUES
  ($contentId, '" . DataUtil::formatForStore($text) . "')";
    DBUtil::executeSQL($sql);

    return true;
}

/*=[ Delete content element ]====================================================*/

function content_contentapi_deleteContent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $contentId = (int) $args['contentId'];
    $addVersion = isset($args['addVersion']) ? $args['addVersion'] : true;

    $content = pnModAPIFunc('content', 'content', 'getContent', array('id' => $contentId));
    if ($content === false)
        return false;

    $contentType = pnModAPIFunc('content', 'content', 'getContentType', $content);
    if ($contentType === false)
        return false;

    $contentType['plugin']->delete();

    if (!contentRemoveContent($contentId))
        return false;

    DBUtil::deleteObjectByID('content_content', $contentId);

    $pntable = pnDBGetTables();
    $searchTable = $pntable['content_searchable'];
    $searchColumn = $pntable['content_searchable_column'];

    $sql = "DELETE FROM $searchTable WHERE $searchColumn[contentId] = $contentId";
    DBUtil::executeSQL($sql);

    $ok = pnModAPIFunc('content', 'content', 'deleteTranslation', array('contentId' => $contentId, 'includeHistory' => false));
    if ($ok === false)
        return false;

    if ($addVersion) {
        $ok = pnModAPIFunc('content', 'history', 'addPageVersion', array('pageId' => $content['pageId'], 'action' => '_CONTENT_HISTORYCONTENTDELETED' /* delayed translation */));
        if ($ok === false)
            return false;
    }

    contentClearCaches();
    return true;
}

function content_contentapi_deletePageAndSubPageContent($args)
{
    $pageId = (int) $args['pageId'];

    // Get all content items on this page and all it's sub pages
    $contentItems = pnModAPIFunc('content', 'content', 'getPageAndSubPageContent', array('pageId' => $pageId));
    if ($contentItems === false)
        return false;

    for ($i = 0, $cou = count($contentItems); $i < $cou; ++$i) {
        // Make sure content items get a chance to delete themselves
        $contentItems[$i]['plugin']->delete();

        // Delete from DB
        DBUtil::deleteObjectByID('content_content', $contentItems[$i]['id']);
    }

    contentClearCaches();
    return true;
}

/*=[ Translate content ]=========================================================*/

function content_contentapi_updateTranslation($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $contentId = (int) $args['contentId'];
    $language = DataUtil::formatForStore($args['language']);
    $translated = $args['translated'];
    $addVersion = isset($args['addVersion']) ? $args['addVersion'] : true;

    $pntable = pnDBGetTables();
    $translatedTable = $pntable['content_translatedcontent'];
    $translatedColumn = $pntable['content_translatedcontent_column'];

    // Delete optional existing translation
    $where = "$translatedColumn[contentId] = $contentId AND $translatedColumn[language] = '$language'";
    DBUtil::deleteWhere('content_translatedcontent', $where);

    // Insert new
    $translatedData = array('contentId' => $contentId, 'language' => $language, 'data' => serialize($translated));
    DBUtil::insertObject($translatedData, 'content_translatedcontent');

    $content = content_contentapi_getContent(array('id' => $contentId));
    if ($content === false)
        return false;

    if ($addVersion) {
        $ok = pnModAPIFunc('content', 'history', 'addPageVersion', array('pageId' => $content['pageId'], 'action' => '_CONTENT_HISTORYTRANSLATED' /* delayed translation */));
        if ($ok === false)
            return false;
    }

    contentClearCaches();
    return true;
}

function content_contentapi_deleteTranslation($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $contentId = (int) $args['contentId'];
    $language = isset($args['language']) ? $args['language'] : null;
    $includeHistory = isset($args['includeHistory']) ? $args['includeHistory'] : true;

    $pntable = pnDBGetTables();
    $translatedColumn = $pntable['content_translatedcontent_column'];

    // Delete existing translation
    if ($language != null)
        $where = "$translatedColumn[contentId] = $contentId AND $translatedColumn[language] = '" . DataUtil::formatForStore($language) . "'";
    else
        $where = "$translatedColumn[contentId] = $contentId";

    DBUtil::deleteWhere('content_translatedcontent', $where);

    // Get content to find page ID
    if ($includeHistory) {
        $content = content_contentapi_getContent(array('id' => $contentId));
        if ($content === false)
            return false;

        $ok = pnModAPIFunc('content', 'history', 'addPageVersion', array('pageId' => $content['pageId'], 'action' => '_CONTENT_HISTORYTRANSLATIONDEL' /* delayed translation */));
        if ($ok === false)
            return false;
    }

    contentClearCaches();
    return true;
}

function content_contentapi_deletePageTranslations($args)
{
    $pageId = (int) $args['pageId'];
    $language = isset($args['language']) ? $args['language'] : null;

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];
    $translatedTable = $pntable['content_translatedcontent'];
    $translatedColumn = $pntable['content_translatedcontent_column'];

    if ($language != null)
        $restriction = "AND t.$translatedColumn[language] = '" . DataUtil::formatForStore($language) . "'";
    else
        $restriction = '';

    $sql = "
DELETE t
FROM $translatedTable t, $contentTable c
WHERE     t.$translatedColumn[contentId] = c.$contentColumn[id]
      $restriction
      AND c.$contentColumn[pageId] = $pageId";

    $dbresult = DBUtil::executeSQL($sql);

    contentClearCaches();
    return true;
}

function content_contentapi_getTranslationInfo($args)
{
    $contentId = (isset($args['contentId']) ? (int) $args['contentId'] : null);
    $pageId = (isset($args['pageId']) ? (int) $args['pageId'] : null);

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    // fetch content + page info


    if ($contentId != null) {
        $contentItem = pnModAPIFunc('content', 'content', 'getContent', array('id' => $contentId));
        if ($contentItem === false)
            return false;

        $pageId = $contentItem['pageId'];
    }

    $page = pnModAPIFunc('content', 'page', 'getPage', array('id' => $pageId));
    if ($page === false)
        return false;

    $layout = pnModAPIFunc('content', 'layout', 'getLayoutPlugin', array('layout' => $page['layout']));
    if ($layout === false)
        return false;

    $contentItems = contentGetContent('page', $pageId, null, false);
    if ($contentItems === false)
        return false;

    $translatableItems = array();
    foreach ($contentItems as $item) {
        if ($item['plugin']->isTranslatable())
            $translatableItems[] = $item;
    }

    $translationItems = array();
    $i = 1;
    $count = count($translatableItems);
    $currentIndex = -1;
    foreach ($translatableItems as $item) {
        if ($item['plugin']->isTranslatable()) {
            $translationItems[] = array('text' => $layout->getContentAreaTitle($item['areaIndex']) . ": $item[type] ($i/$count)", 'value' => $item['id']);
            if ($item['id'] == $contentId)
                $currentIndex = $i - 1;
            ++$i;
        }
    }

    $nextContentId = null;
    $prevContentId = null;

    if ($contentId != null) {
        if ($currentIndex < count($translationItems) - 1)
            $nextContentId = $translatableItems[$currentIndex + 1]['id'];
        if ($currentIndex > 0)
            $prevContentId = $translatableItems[$currentIndex - 1]['id'];
    } else {
        if (count($translatableItems) > 0)
            $nextContentId = $translatableItems[0]['id'];
    }

    return array('items' => $translationItems, 'nextContentId' => $nextContentId, 'prevContentId' => $prevContentId);
}

function content_contentapi_getTranslations($args)
{
    $pageId = (int) $args['pageId'];

    $pntable = pnDBGetTables();
    $translatedTable = $pntable['content_translatedcontent'];
    $translatedColumn = $pntable['content_translatedcontent_column'];
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    $cols = DBUtil::_getAllColumns('content_translatedcontent');
    $ca = DBUtil::getColumnsArray('content_translatedcontent');

    $sql = "
SELECT $cols
FROM $translatedTable t
LEFT JOIN $contentTable c
     ON c.$contentColumn[id] = t.$translatedColumn[contentId]
WHERE c.$contentColumn[pageId] = $pageId";

    $dbresult = DBUtil::executeSQL($sql);

    $translations = DBUtil::marshallObjects($dbresult, $ca);

    return $translations;
}

/*=[ Moving content ]============================================================*/

function content_contentapi_dragContent($args)
{
    $dom = ZLanguage::getModuleDomain('content');
    if (!isset($args['pageId']) || !isset($args['contentId']) || !isset($args['contentAreaIndex']) || !isset($args['position']))
        return LogUtil::registerArgsError();

    $pageId = (int) $args['pageId'];
    $contentId = (int) $args['contentId'];
    $contentAreaIndex = (int) $args['contentAreaIndex'];
    $position = (int) $args['position'];

    if (!contentRemoveContent($contentId))
        return false;

    if (!contentInsertContent($contentId, $position, $contentAreaIndex, $pageId))
        return false;

    $ok = pnModAPIFunc('content', 'history', 'addPageVersion', array('pageId' => $pageId, 'action' => '_CONTENT_HISTORYCONTENTMOVED' /* delayed translation */));
    if ($ok === false)
        return false;

    contentClearCaches();
    return true;
}

// Remove content from content area, but do not delete it
function contentRemoveContent($contentId)
{
    $contentData = pnModAPIFunc('content', 'content', 'getContent', array('id' => $contentId));
    if ($contentData === false)
        return false;

    $pageId = (int) $contentData['pageId'];
    $contentAreaIndex = (int) $contentData['areaIndex'];
    $position = (int) $contentData['position'];

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    $sql = "
UPDATE $contentTable
SET $contentColumn[position] = $contentColumn[position]-1
WHERE     $contentColumn[pageId] = $pageId
      AND $contentColumn[areaIndex] = $contentAreaIndex
      AND $contentColumn[position] > $position";

    DBUtil::executeSQL($sql);

    contentClearCaches();
    return true;
}

// Insert content in content area
function contentInsertContent($contentId, $position, $contentAreaIndex, $pageId)
{
    $contentData = pnModAPIFunc('content', 'content', 'getContent', array('id' => $contentId));
    if ($contentData === false)
        return false;

    if (!contentMoveContentDown($position, $contentAreaIndex, $pageId))
        return false;

    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    $contentData = array('id' => $contentId, 'position' => $position, 'areaIndex' => $contentAreaIndex);
    DBUtil::updateObject($contentData, 'content_content');

    contentClearCaches();
    return true;
}

function contentMoveContentDown($position, $contentAreaIndex, $pageId)
{
    $pntable = pnDBGetTables();
    $contentTable = $pntable['content_content'];
    $contentColumn = $pntable['content_content_column'];

    $sql = "
UPDATE $contentTable
SET $contentColumn[position] = $contentColumn[position]+1
WHERE     $contentColumn[pageId] = $pageId
      AND $contentColumn[areaIndex] = $contentAreaIndex
      AND $contentColumn[position] >= $position";

    DBUtil::executeSQL($sql);

    contentClearCaches();
    return true;
}

/*=[ Scanning and loading content type plugins ]=================================*/

function &content_contentapi_getContentPlugins($args)
{
    $modules = pnModGetAllMods();
    $plugins = array();
    foreach ($modules as $module) {
        if (pnModAPILoad($module['name'], 'contenttypes')) {
            $dir = "modules/$module[directory]/pncontenttypesapi";
            if (is_dir($dir) && $dh = opendir($dir)) {
                while (($filename = readdir($dh)) !== false) {
                    if (preg_match('/^([-a-zA-Z0-9_]+).php$/', $filename, $matches)) {
                        $contentTypeName = $matches[1];
                        // check permissions for this contentType plugin
                        if (SecurityUtil::checkPermission('content:plugins:content', $contentTypeName . '::', ACCESS_READ)) {
                            $plugins[] = pnModAPIFunc($module['name'], 'contenttypes', $contentTypeName, null);
                        }
                    }
                }

                closedir($dh);
            }
        }
    }

    usort($plugins, 'contentPluginCompare');

    return $plugins;
}

function contentPluginCompare($a, $b)
{
    return strcmp($a->getTitle(), $b->getTitle());
}

function content_contentapi_getContentTypes($args)
{
    $includeInactive = isset($args['includeInactive']) ? $args['includeInactive'] : false;
    $plugins = content_contentapi_getContentPlugins(array());
    $contentTypes = array();

    for ($i = 0, $cou = count($plugins); $i < $cou; ++$i) {
        $plugin = &$plugins[$i];
        if ($includeInactive || $plugin->isActive()) {
            $contentTypes[] = array('module' => $plugin->getModule(), 'name' => $plugin->getName(), 'title' => $plugin->getTitle(), 'description' => $plugin->getDescription(), 'adminInfo' => $plugin->getAdminInfo(), 'isActive' => $plugin->isActive());
        }
    }

    return $contentTypes;
}

function content_contentapi_getContentPlugin(&$args)
{
    $dom = ZLanguage::getModuleDomain('content');
    $plugin = pnModAPIFunc($args['module'], 'contenttypes', $args['type'], $args);
    if (empty($plugin)) {
        if (!pnModAvailable($args['module']))
            return LogUtil::registerError(__f('Error! Unable to load plugin [%1$s] in module [%2$s] since the module is not available.', array($args[type], $args[module]), $dom));
        return LogUtil::registerError(__f('Error! Unable to load plugin [%1$s] in module [%2$s] for some unknown reason.', array($args[type], $args[module]), $dom));
    }
    $plugin->contentId = $args['id'];
    $plugin->pageId = $args['pageId'];
    $plugin->contentAreaIndex = $args['areaIndex'];
    $plugin->position = $args['position'];
    $plugin->stylePosition = $args['stylePosition'];
    $plugin->styleWidth = $args['styleWidth'];
    $plugin->styleClass = $args['styleClass'];
    if (isset($args['data']))
        $plugin->loadData($args['data']);
    return $plugin;
}

function content_contentapi_getContentType(&$args)
{
    $plugin = content_contentapi_getContentPlugin($args);
    if ($plugin === false)
        return false;
    return array('plugin' => &$plugin, 'module' => $plugin->getModule(), 'name' => $plugin->getName(), 'title' => $plugin->getTitle(), 'description' => $plugin->getDescription(), 'adminInfo' => $plugin->getAdminInfo(), 'isActive' => $plugin->isActive());
}
