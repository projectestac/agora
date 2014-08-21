<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */


function content_tables()
{
    $tables = array();

    // Page setup (pages can be nested beneath each other)
    $tables['content_page'] = 'content_page';
    $tables['content_page_column'] = array(
        'id'                => 'page_id',               // Page ID
        'parentPageId'      => 'page_ppid',             // Parent (containing) page ID
        'title'             => 'page_title',            // Title for this page
        'showTitle'         => 'page_showtitle',        // Display title on the page
        'urlname'           => 'page_urlname',          // URL name for this page
        'metadescription'   => 'page_metadescription',  // Meta description
        'metakeywords'      => 'page_metakeywords',     // Meta keywords
        'nohooks'           => 'page_nohooks',          // Page w/o hooks
        'layout'            => 'page_layout',           // Name of page layout
        'categoryId'        => 'page_categoryid',       // Primary category ID
        'views'             => 'page_views',            // # views of page
        'active'            => 'page_active',           // Bool flag: active or not?
        'activeFrom'        => 'page_activefrom',       // Date - publish start
        'activeTo'          => 'page_activeto',         // Date - publish end
        'inMenu'            => 'page_inmenu',           // Bool flag: include in menu?
        'position'          => 'page_pos',              // Position inside current level of pages (sorting order)
        'level'             => 'page_level',            // Nested set level
        'setLeft'           => 'page_setleft',          // Nested set left
        'setRight'          => 'page_setright',         // Nested set right
        'language'          => 'page_language',         // Language of initial version
        'optionalString1'   => 'page_optString1',       // Optional Information
        'optionalString2'   => 'page_optString2',       // Optional Information
        'optionalText'      => 'page_optText'           // Optional Information
    );
    $tables['content_page_column_def'] = array(
        'id'                => "I NOTNULL AUTO PRIMARY",
        'parentPageId'      => "I NOTNULL DEFAULT 0",
        'title'             => "C(255) NOTNULL DEFAULT ''",
        'showTitle'         => "I1 NOTNULL DEFAULT 1",
        'urlname'           => "C(255) NOTNULL DEFAULT ''",
        'metadescription'   => "X NOTNULL DEFAULT ''",
        'metakeywords'      => "X NOTNULL DEFAULT ''",
        'nohooks'           => "I1 NOTNULL DEFAULT 0",
        'layout'            => "C(100) NOTNULL",
        'categoryId'        => "I NOT NULL DEFAULT 0",
        'views'             => "I NOT NULL DEFAULT 0",
        'active'            => "I1 NOTNULL DEFAULT 1",
        'activeFrom'        => "T",
        'activeTo'          => "T",
        'inMenu'            => "I1 NOTNULL DEFAULT 1",
        'position'          => 'I NOTNULL DEFAULT 0',
        'level'             => 'I NOTNULL DEFAULT 0',
        'setLeft'           => 'I NOTNULL DEFAULT 0',
        'setRight'          => 'I NOTNULL DEFAULT 0',
        'language'          => 'C(10)',
        'optionalString1'   => "C(255) NOTNULL DEFAULT ''",
        'optionalString2'   => "C(255) NOTNULL DEFAULT ''",
        'optionalText'      => "X NOTNULL DEFAULT ''"
    );
    $tables['content_page_primary_key_column'] = 'id';
    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($tables['content_page_column'], 'page_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['content_page_column_def']);
    // additional indexes
    $tables['content_page_column_idx'] = array('parentPageId' => array('parentPageId', 'position'), 
                                               'leftright' => array('setLeft','setRight'), 
                                               'categoryId' => 'categoryId', 
                                               'urlname' => array('urlname', 'parentPageId'));

    // Content setup (multiple content items on each page)
    $tables['content_content'] = 'content_content';
    $tables['content_content_column'] = array(
        'id'              => 'con_id',          // Content item ID
        'pageId'          => 'con_pageid',      // Reference to owner page ID
        'areaIndex'       => 'con_areaindex',   // Content area index
        'position'        => 'con_position',    // Position inside content area
        'module'          => 'con_module',      // Content module
        'type'            => 'con_type',        // Content type (depending on module)
        'data'            => 'con_data',        // Data from the content providing module
        'active'          => 'con_active',      // Bool flag: active or not?
        'visiblefor'      => 'con_visiblefor',  // content only visible for members (0)/non members(2)/both (1)
        'stylePosition'   => 'con_stylepos',    // Styled floating position
        'styleWidth'      => 'con_stylewidth',  // Styled width
        'styleClass'      => 'con_styleclass'   // Styled CSS class
    );
    $tables['content_content_column_def'] = array(
        'id'              => "I NOTNULL AUTO PRIMARY",
        'pageId'          => "I NOTNULL DEFAULT 0",
        'areaIndex'       => "I NOTNULL DEFAULT 0",
        'position'        => "I NOTNULL DEFAULT 0",
        'module'          => "C(100) NOTNULL DEFAULT ''",
        'type'            => "C(100) NOTNULL DEFAULT ''",
        'data'            => "XL",
        'active'          => "I1 NOTNULL DEFAULT 1",
        'visiblefor'      => "I1 NOTNULL DEFAULT 1",
        'stylePosition'   => "C(20) NOTNULL DEFAULT 'none'",
        'styleWidth'      => "C(20) NOTNULL DEFAULT 'wauto'",
        'styleClass'      => "C(100) NOTNULL DEFAULT ''"
    );
    $tables['content_content_primary_key_column'] = 'id';
    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($tables['content_content_column'], 'con_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['content_content_column_def']);
    // additional indexes
    $tables['content_content_column_idx'] = array('pageActive' => array('pageId', 'active'), 
                                                  'pagePosition' => array('pageId', 'areaIndex', 'position'));

    // Multiple category relation
    $tables['content_pagecategory'] = 'content_pagecategory';
    $tables['content_pagecategory_column'] = array(
        'pageId'     => 'con_pageid',       // Related page ID
        'categoryId' => 'con_categoryid'    // Related category ID
    );
    $tables['content_pagecategory_column_def'] = array(
        'pageId'     => 'I NOTNULL DEFAULT 0',
        'categoryId' => 'I NOTNULL DEFAULT 0'
    );
    // additional indexes
    $tables['content_pagecategory_column_idx'] = array('pageId' => 'pageId');


    // Searchable text from content plugins
    $tables['content_searchable'] = 'content_searchable';
    $tables['content_searchable_column'] = array(
        'contentId' => 'search_cid',    // Content ID
        'text'      => 'search_text'    // Content searchable text
    );
    $tables['content_searchable_column_def'] = array(
        'contentId' => 'I NOTNULL AUTO PRIMARY',
        'text'      => 'X'
    );
    $tables['content_searchable_primary_key_column'] = 'contentId';

  
    // Translated pages
    $tables['content_translatedpage'] = 'content_translatedpage';
    $tables['content_translatedpage_column'] = array(
        'pageId'            => 'transp_pid',                // Page ID
        'language'          => 'transp_lang',               // Translated to language
        'title'             => 'transp_title',              // Translated title
        'metadescription'   => 'transp_metadescription',    // Translated meta description
        'metakeywords'      => 'transp_metakeywords'        // Translated meta keywords
    );
    $tables['content_translatedpage_column_def'] = array(
        'pageId'            => 'I NOTNULL DEFAULT 0',
        'language'          => 'C(10) NOTNULL',
        'title'             => 'C(255) NOTNULL',
        'metadescription'   => "X NOTNULL DEFAULT ''",
        'metakeywords'      => "X NOTNULL DEFAULT ''"
    );
    ObjectUtil::addStandardFieldsToTableDefinition ($tables['content_translatedpage_column'], 'transp_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['content_translatedpage_column_def']);
    // additional indexes
    $tables['content_translatedpage_column_idx'] = array('entry' => array('pageId', 'language'));


    // Translated content plugins
    $tables['content_translatedcontent'] = 'content_translatedcontent';
    $tables['content_translatedcontent_column'] = array(
        'contentId' => 'transc_cid',     // Content ID
        'language'  => 'transc_lang',    // Translated to language
        'data'      => 'transc_data'    // Translated content
    );
    $tables['content_translatedcontent_column_def'] = array(
        'contentId' => 'I NOTNULL DEFAULT 0',
        'language'  => 'C(10) NOTNULL',
        'data'      => 'XL'
    );
    ObjectUtil::addStandardFieldsToTableDefinition ($tables['content_translatedcontent_column'], 'transc_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($tables['content_translatedcontent_column_def']);
    // additional indexes
    $tables['content_translatedcontent_column_idx'] = array('entry' => array('contentId', 'language'));


    // History
    $tables['content_history'] = 'content_history';
    $tables['content_history_column'] = array(
        'id'            => 'ch_id',
        'pageId'        => 'ch_pageid',
        'data'          => 'ch_data',
        'revisionNo'    => 'ch_revisionno',
        'action'        => 'ch_action',
        'date'          => 'ch_date',
        'ipno'          => 'ch_ipno',
        'userId'        => 'ch_userid'
    );
    $tables['content_history_column_def'] = array(
        'id'           => "I NOTNULL AUTO PRIMARY",
        'pageId'       => "I NOTNULL DEFAULT 0",
        'data'         => "XL NOTNULL DEFAULT ''",
        'revisionNo'   => "I NOTNULL DEFAULT 0",
        'action'       => "C(255) NOTNULL DEFAULT ''",
        'date'         => "T NOTNULL DEFAULT ''",
        'ipno'         => "C(30) NOTNULL DEFAULT ''",
        'userId'       => "I NOTNULL DEFAULT 0"
    );
    // additional indexes
    $tables['content_history_column_idx'] = array('entry' => array('pageId', 'revisionNo'), 
                                                  'action' => 'action');

    return $tables;
}
