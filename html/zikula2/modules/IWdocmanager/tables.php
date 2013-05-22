<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pntables.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Define module tables
 * @author Albert Pérez Monfort
 * @return module tables information
 */
function IWdocmanager_tables() {
    // Initialise table array
    $table = array();

    // define downloads table
    $table['IWdocmanager'] = DBUtil::getLimitedTablename('IWdocmanager');
    $table['IWdocmanager_column'] = array('documentId' => 'documentId',
        'documentName' => 'documentName',
        'categoryId' => 'categoryId',
        'fileName' => 'fileName',
        'description' => 'description',
        'filesize' => 'filesize',
        'author' => 'author',
        'nClicks' => 'nClicks',
        'validated' => 'validated',
        'version' => 'version',
        'authorName' => 'authorName',
        'documentLink' => 'documentLink',
        'fileOriginalName' => 'fileOriginalName',
        'versioned' => 'versioned',
        'versionFrom' => 'versionFrom',
    );

    $table['IWdocmanager_column_def'] = array('documentId' => "I NOTNULL AUTO PRIMARY",
        'documentName' => "C(200) NOTNULL DEFAULT ''",
        'categoryId' => "I NOTNULL DEFAULT 0",
        'fileName' => "C(10) NOTNULL DEFAULT ''",
        'description' => "X NOTNULL",
        'filesize' => "C(10) NOTNULL DEFAULT ''",
        'author' => "I NOTNULL DEFAULT 0",
        'nClicks' => "I NOTNULL DEFAULT '0'",
        'validated' => "I(4) NOTNULL DEFAULT '0'",
        'version' => "C(30) NOTNULL DEFAULT ''",
        'authorName' => "C(120) NOTNULL DEFAULT ''",
        'documentLink' => "C(200) NOTNULL DEFAULT ''",
        'fileOriginalName' => "C(100) NOTNULL DEFAULT ''",
        'versioned' => "I NOTNULL DEFAULT '0'",
        'versionFrom' => "C(255) NOTNULL DEFAULT ''",
    );

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWdocmanager_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWdocmanager_column_def'], 'iw_');

    // define categories table
    $table['IWdocmanager_categories'] = DBUtil::getLimitedTablename('IWdocmanager_categories');
    $table['IWdocmanager_categories_column'] = array('categoryId' => 'categoryId',
        'categoryName' => 'categoryName',
        'description' => 'description',
        'groups' => 'groups',
        'nDocuments' => 'nDocuments',
        'nDocumentsNV' => 'nDocumentsNV',
        'active' => 'active',
        'parentId' => 'parentId',
        'groupsAdd' => 'groupsAdd',
    );

    $table['IWdocmanager_categories_column_def'] = array('categoryId' => "I NOTNULL AUTO PRIMARY",
        'categoryName' => "C(200) NOTNULL DEFAULT ''",
        'description' => "X NOTNULL",
        'groups' => "X NOTNULL DEFAULT ''",
        'nDocuments' => "I NOTNULL DEFAULT '0'",
        'nDocumentsNV' => "I NOTNULL DEFAULT '0'",
        'active' => "I(4) NOTNULL DEFAULT '0'",
        'parentId' => "I NOTNULL DEFAULT '0'",
        'groupsAdd' => "X NOTNULL DEFAULT ''",
    );

    ObjectUtil::addStandardFieldsToTableDefinition($table['IWdocmanager_categories_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['IWdocmanager_categories_column_def'], 'iw_');

    // Return the table information
    return $table;
}