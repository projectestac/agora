<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pninit.php 390 2010-01-10 14:49:36Z herr.vorragend $
 * @license See license.txt
 */

function content_init()
{
    $dom = ZLanguage::getModuleDomain('content');

    if (!DBUtil::createTable('content_page')) {
        return false;
    }
    if (!DBUtil::createTable('content_content')) {
        return false;
    }
    if (!DBUtil::createTable('content_pagecategory')) {
        return false;
    }
    if (!DBUtil::createTable('content_searchable')) {
        return false;
    }
    if (!DBUtil::createTable('content_translatedpage')) {
        return false;
    }
    if (!DBUtil::createTable('content_translatedcontent')) {
        return false;
    }
    if (!DBUtil::createTable('content_history')) {
        return false;
    }

    if (!_content_setCategoryRoot()) {
        return false;
    }

    if (!pnModSetVar('content', 'shorturlsuffix', '.html')) {
        return LogUtil::registerError(__("Error! Failed to set shorturlsuffix.", $dom));
    }
    
    if (!pnModSetVar('content', 'styleClasses', "greybox|Grey box\nredbox|Red box\nyellowbox|Yellow box\ngreenbox|Green box")) {
        return LogUtil::registerError(__("Error! Failed to set style classes.", $dom));
    }

    return true;
}

function _content_setCategoryRoot()
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Global');
    if ($rootcat) {
        // create an entry in the categories registry
        $registry = new PNCategoryRegistry();
        $registry->setDataField('modname', 'Content');
        $registry->setDataField('table', 'content_page');
        $registry->setDataField('property', 'primary');
        $registry->setDataField('category_id', $rootcat['id']);
        $registry->insert();
    }

    return true;
}

// -----------------------------------------------------------------------
// Module upgrade
// -----------------------------------------------------------------------


function content_upgrade($oldVersion)
{
    $ok = true;

    // Upgrade dependent on old version number
    switch ($oldVersion) {
        case '0.0.0':
        case '1.0.0':
        case '1.1.0':
            $ok = $ok && contentUpgrade_1_2_0($oldVersion);
        case '1.2.0':
            $ok = $ok && contentUpgrade_1_2_0_1($oldVersion);
        case '1.2.0.1':
        case '2.0.0':
        case '2.0.1':
            $ok = $ok && contentUpgrade_2_0_2($oldVersion);
        case '2.0.2':
        case '2.1.0':
            $ok = $ok && contentUpgrade_2_1_1($oldVersion);
        case '2.1.1':
            $ok = $ok && contentUpgrade_2_1_2($oldVersion);
        case '2.1.2':
        case '3.0.0':
        case '3.0.1':
        case '3.0.2':
        case '3.0.3':
            $ok = $ok && contentUpgrade_3_1_0($oldVersion);
        // future
    }

    // Update successful
    return $ok;
}

function contentUpgrade_1_2_0($oldVersion)
{
    if (!DBUtil::createTable('content_translatedcontent')) {
        return contentInitError(__FILE__, __LINE__, "Table creation failed for 'content_translatedcontent': " . $dbconn->ErrorMsg());
    }
    if (!DBUtil::createTable('content_translatedpage')) {
        return contentInitError(__FILE__, __LINE__, "Table creation failed for 'content_translatedpage': " . $dbconn->ErrorMsg());
    }
    if (!pnModSetVar('content', 'shorturlsuffix', '.html')) {
        return false;
    }

    return true;
}

function contentUpgrade_1_2_0_1($oldVersion)
{
    // Drop unused version 1.x column. Some people might have done this manually, so ignore errors.
    $dbconn = DBConnectionStack::getConnection();
    $pntables = pnDBGetTables();
    $dict = NewDataDictionary($dbconn);
    $table = $pntables['content_content'];
    $sqlarray = $dict->DropColumnSQL($table, array('con_language'));

    $dict->ExecuteSQLArray($sqlarray);

    return true;
}

function contentUpgrade_2_0_2($oldVersion)
{
    DBUtil::changeTable('content_content');
    pnModSetVar('content', 'styleClasses', "greybox|Grey box\nredbox|Red box");
    return true;
}

function contentUpgrade_2_1_1($oldVersion)
{
    if (!DBUtil::createTable('content_history')) {
        return false;
    }
    return true;
}

function contentUpgrade_2_1_2($oldVersion)
{
    // Add language column (again since version 1.2.0.1)
    DBUtil::changeTable('content_page');

    $dbconn = DBConnectionStack::getConnection();
    $pntables = pnDBGetTables();
    $language = ZLanguage::getLanguageCode();

    // Assume language of created pages is same as current lang
    $table = $pntables['content_page'];
    $column = $pntables['content_page_column'];
    $sql = "UPDATE $table SET $column[language] = '" . DataUtil::formatForStore($language) . "'";
    DBUtil::executeSQL($sql);

    return true;
}

function contentUpgrade_3_1_0($oldVersion)
{
    $tables = pnDBGetTables();

    // fix serialisations
    foreach (array('content' => 'id', 'history' => 'id', 'translatedcontent' => 'contentId') as $table => $idField) {
        $obj = DBUtil::selectObjectArray('content_' . $table);
        foreach ($obj as $contentItem) {
            $data = DataUtil::mb_unserialize($contentItem['data']);
            $contentItem['data'] = serialize($data);
            DBUtil::updateObject($contentItem, 'content_' . $table, '', $idField, true);
        }
    }

    // fix language codes
    foreach (array('page' => 'id', 'translatedcontent' => 'contentId', 'translatedpage' => 'pageId') as $table => $idField) {
        $obj = DBUtil::selectObjectArray('content_' . $table);
        if (!count($obj)) {
            continue;
        }
        foreach ($obj as $contentItem) {
            // translate l3 -> l2
           $l2 = ZLanguage::translateLegacyCode($contentItem['language']);
            if (!$l2) {
                continue;
            }
            $sql = 'UPDATE ' . $tables['content_' . $table] . ' a SET a.' . $tables['content_' . $table . '_column']['language'] . ' = \'' . $l2 . '\' WHERE a.' . $tables['content_' . $table . '_column'][$idField] . ' = \'' . $contentItem[$idField] . '\'';
            DBUtil::executeSQL($sql);
        }
    }
    
    return true;

}

// -----------------------------------------------------------------------
// Module delete
// -----------------------------------------------------------------------


function content_delete()
{
    DBUtil::dropTable('content_page');
    DBUtil::dropTable('content_content');
    DBUtil::dropTable('content_pagecategory');
    DBUtil::dropTable('content_searchable');
    DBUtil::dropTable('content_translatedcontent');
    DBUtil::dropTable('content_translatedpage');
    DBUtil::dropTable('content_history');

    pnModDelVar('content');

    // Deletion successful
    return true;
}
// -----------------------------------------------------------------------

