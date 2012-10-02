<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pntables.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */


function content_pntables()
{
  $pntable = array();
  $prefix = pnConfigGetVar('prefix');

    // Page setup (pages can be nested beneath each other)

  $tableName = DBUtil::getLimitedTablename('content_page');
  $pntable['content_page'] = $tableName;

  $pntable['content_page_column'] = 
    array('id'            => 'page_id',         // Page ID
          'parentPageId'  => 'page_ppid',       // Parent (containing) page ID
          'title'         => 'page_title',      // Display title for this page
          'urlname'       => 'page_urlname',    // URL name for this page
          'layout'        => 'page_layout',     // Name of page layout
          'categoryId'    => 'page_categoryid', // Primary category ID
          'active'        => 'page_active',     // Bool flag: active or not?
          'activeFrom'    => 'page_activefrom', // Date - publish start
          'activeTo'      => 'page_activeto',   // Date - publish end
          'isActive'      => 'CASE WHEN page_active = 1 AND (page_activeFrom <= NOW() OR page_activeFrom IS NULL) AND  (page_activeTo > NOW() OR page_activeTo IS NULL)  THEN 1 ELSE 0 END',
          'inMenu'        => 'page_inmenu',     // Bool flag: include in menu?
          'isInMenu'      => 'CASE WHEN page_inmenu = 1 AND page_active = 1 AND (page_activeFrom <= NOW() OR page_activeFrom IS NULL) AND  (page_activeTo > NOW() OR page_activeTo IS NULL)  THEN 1 ELSE 0 END',
          'position'      => 'page_pos',        // Position inside current level of pages (sorting order)
          'level'         => 'page_level',      // Nested set level
          'setLeft'       => 'page_setleft',    // Nested set left
          'setRight'      => 'page_setright',   // Nested set right
          'language'      => 'page_language');  // Language of initial version

  ObjectUtil::addStandardFieldsToTableDefinition ($pntable['content_page_column'], 'page_');

  $def = array('id'           => "I NOTNULL AUTOINCREMENT KEY",
               'parentPageId' => "I NOTNULL DEFAULT 0",
               'title'        => "C(255) NOTNULL DEFAULT ''",
               'urlname'      => "C(255) NOTNULL DEFAULT ''",
               'layout'       => "C(100) NOTNULL",
               'categoryId'   => "I",
               'active'       => "I1 NOTNULL DEFAULT 1",
               'activeFrom'   => "T",
               'activeTo'     => "T",
               'inMenu'       => "I1 NOTNULL DEFAULT 1",
               'position'     => 'I NOTNULL',
               'level'        => 'I NOTNULL',
               'setLeft'      => 'I NOTNULL',
               'setRight'     => 'I NOTNULL',
               'language'      => 'C(10)');

  ObjectUtil::addStandardFieldsToTableDataDefinition($def, 'page_');
  $pntable['content_page_column_def'] = $def;


    // Content setup (multiple content items on each page)

  $tableName = DBUtil::getLimitedTablename('content_content');
  $pntable['content_content'] = $tableName;

  $pntable['content_content_column'] = 
    array('id'              => 'con_id',          // Content item ID
          'pageId'          => 'con_pageid',      // Reference to owner page ID
          'areaIndex'       => 'con_areaindex',   // Content area index
          'position'        => 'con_position',    // Position inside content area
          /* XTEC ******** REMOVED
          'module'          => 'con_module',      // Content module
          'type'            => 'con_type',        // Content type (depending on module)
          'data'            => 'con_data',        // Data from the content providing module
          */
          'stylePosition'   => 'con_stylepos',    // Styled floating position
          'styleWidth'      => 'con_stylewidth',  // Styled width
          'styleClass'      => 'con_styleclass', // Styled CSS class
           /* XTEC ******** ADDED*/
          'module'          => 'con_module',      // Content module
          'type'            => 'con_type',        // Content type (depending on module)
          'data'            => 'con_data',        // Data from the content providing module
          /*FINISH ADDED*/
          );

  ObjectUtil::addStandardFieldsToTableDefinition ($pntable['content_content_column'], 'con_');

  $def =
    array('id'              => 'I NOTNULL AUTOINCREMENT KEY',
          'pageId'          => 'I NOTNULL',
          'areaIndex'       => 'I NOTNULL',
          'position'        => 'I NOTNULL',
          /* XTEC ******** REMOVED
          'module'          => 'C(100) NOTNULL',
          'type'            => 'C(100) NOTNULL',
          'data'            => 'X NOTNULL',
          */
          'stylePosition'   => 'C(20) NOTNULL DEFAULT \'none\'',
          'styleWidth'      => 'C(20) NOTNULL DEFAULT \'100\'',
          'styleClass'      => 'C(100) NOTNULL DEFAULT \'\'',
          /* XTEC ******** ADDED*/
          'module'          => 'C(100) NOTNULL',
          'type'            => 'C(100) NOTNULL',
          'data'            => 'X NOTNULL',
          /*FINISH ADDED*/
          );

  ObjectUtil::addStandardFieldsToTableDataDefinition($def, 'con_');
  $pntable['content_content_column_def'] = $def;


    // Multiple category relation

  $tableName = DBUtil::getLimitedTablename('content_pagecategory');
  $pntable['content_pagecategory'] = $tableName;

  $pntable['content_pagecategory_column'] = 
    array('pageId'     => 'con_pageid',       // Related page ID
          'categoryId' => 'con_categoryid');  // Related category ID

  $def =
    array('pageId'     => 'I NOTNULL',
          'categoryId' => 'I NOTNULL');

  $pntable['content_pagecategory_column_def'] = $def;


    // Searchable text from content plugins

  $tableName = DBUtil::getLimitedTablename('content_searchable');
  $pntable['content_searchable'] = $tableName;

  $pntable['content_searchable_column'] = 
    array('contentId' => 'search_cid',    // Content ID
          'text'      => 'search_text');  // Content searchable text

  $def =
    array('contentId' => 'I NOTNULL KEY',
          'text'      => 'X');

  $pntable['content_searchable_column_def'] = $def;


    // Translated pages

  $tableName = DBUtil::getLimitedTablename('content_translatedpage');
  $pntable['content_translatedpage'] = $tableName;

  $pntable['content_translatedpage_column'] = 
    array('pageId'    => 'transp_pid',      // Page ID
          'language'  => 'transp_lang',     // Translated to language
          'title'     => 'transp_title');   // Translated title

  ObjectUtil::addStandardFieldsToTableDefinition ($pntable['content_translatedpage_column'], 'transp_');

  $def =
    array('pageId'    => 'I NOTNULL',
          'language'  => 'C(10) NOTNULL',
          'title'     => 'C(255) NOTNULL');

  ObjectUtil::addStandardFieldsToTableDataDefinition($def, 'transp_');
  $pntable['content_translatedpage_column_def'] = $def;


    // Translated content plugins

  $tableName = DBUtil::getLimitedTablename('content_translatedcontent');
  $pntable['content_translatedcontent'] = $tableName;

  $pntable['content_translatedcontent_column'] = 
    array('contentId' => 'transc_cid',     // Content ID
          'language'  => 'transc_lang',    // Translated to language
          'data'      => 'transc_data');   // Translated content

  ObjectUtil::addStandardFieldsToTableDefinition ($pntable['content_translatedcontent_column'], 'transc_');

  $def =
    array('contentId' => 'I NOTNULL',
          'language'  => 'C(10) NOTNULL',
          'data'      => 'X');

  ObjectUtil::addStandardFieldsToTableDataDefinition($def, 'trans_');
  $pntable['content_translatedcontent_column_def'] = $def;


    // History

  $tableName = DBUtil::getLimitedTablename('content_history');
  $pntable['content_history'] = $tableName;

  $pntable['content_history_column'] = 
    array('id'            => 'ch_id',
          'pageId'        => 'ch_pageid',
          'data'          => 'ch_data',
          'revisionNo'    => 'ch_revisionno',
          'action'        => 'ch_action',
          'date'          => 'ch_date',
          'ipno'          => 'ch_ipno',
          'userId'        => 'ch_userid');

  $def =
    array('id'           => "I NOTNULL AUTOINCREMENT KEY",
          'pageId'       => "I NOTNULL",
          'data'         => "XL NOTNULL DEFAULT",
          'revisionNo'   => "I NOTNULL",
          'action'       => "C(255) NOTNULL",
          'date'         => "T NOTNULL",
          'ipno'         => "C(30) NOTNULL",
          'userId'       => "I NOTNULL");

  $pntable['content_history_column_def'] = $def;

  return $pntable;
}
