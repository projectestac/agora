<?php 

/**
 * Initialise the Export module creating module tables and module vars
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return bool true if successful, false otherwise
 */
function Export_init()
{
    // Create module's tables
	if (!DBUtil::createTable('export_routes')) return false;
	if (!DBUtil::createTable('export_tables')) return false;
	
	// Insert in the table initial information
	$obj = array(array('module_name'	=> 'iw_agendas',
                       'variable' 		=> 'urladjunts',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
                 array('module_name'	=> 'iw_forms',
                       'variable' 		=> 'attached',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
			     array('module_name'	=> 'iw_forums',
                       'variable' 		=> 'urladjunts',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
			     array('module_name'	=> 'iw_jclic',
                       'variable' 		=> 'jclicUpdatedFiles',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'iw_main',
                       'variable' 		=> 'tempFolder',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'iw_main',
                       'variable' 		=> 'usersPictureFolder',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'iw_messages',
                       'variable' 		=> 'uploadFolder',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'iw_noteboard',
                       'variable' 		=> 'attached',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'iw_vhmenu',
                       'variable' 		=> 'imagedir',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'iw_chat',
                       'variable' 		=> 'private_dir',
                       'root_module'  	=> 'iw_main',
                       'root_variable'	=> 'documentRoot'),
				 array('module_name'	=> 'Downloads',
                       'variable' 		=> 'upload_folder'),
				 array('module_name'	=> 'Downloads',
                       'variable' 		=> 'captcha_cache'),
				 array('module_name'	=> 'Downloads',
                       'variable' 		=> 'screenshotlink'),
				 array('module_name'	=> 'Users',
                       'variable' 		=> 'avatarpath'),
				 array('module_name'	=> 'Users',
                       'variable' 		=> 'userimg'),
				/* array('module_name'	=> 'News',
                       'variable' 		=> 'catimagepath'),*/
				/* array('module_name'	=> 'formicula',
                       'variable' 		=> 'upload_dir'),*/
				 array('module_name'	=> 'Files',
                       'variable' 		=> 'usersFolder',
                       'root_module'	=>	'Files',
                       'root_variable'	=>	'folderPath'));
                       
	DBUtil::insertObjectArray($obj, 'export_routes');
	
	$pre = pnConfigGetVar('prefix').'_';
	$obj = array(	array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_page'),
					array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_content'),
					array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_pagecategory'),
					array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_searchable'),
					array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_translatedpage'),
					array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_translatedcontent'),
					array('module_name'	=> 'content',
                       'table_name'		=> $pre.'content_history'),
					array('module_name'	=> 'Downloads',
                       'table_name'		=> $pre.'downloads_categories'),
					array('module_name'	=> 'Downloads',
                       'table_name'		=> $pre.'downloads_downloads'),
					array('module_name'	=> 'Downloads',
                       'table_name'		=> $pre.'downloads_modrequest'),
					array('module_name'	=> 'Ephemerids',
                       'table_name'		=> $pre.'ephem'),
					array('module_name'	=> 'EZComments',
                       'table_name'		=> $pre.'EZComments'),
					array('module_name'	=> 'FAQ',
                       'table_name'		=> $pre.'faqanswer'),
					array('module_name'	=> 'Feeds',
                       'table_name'		=> $pre.'feeds'),
					array('module_name'	=> 'Files',
                       'table_name'		=> $pre.'Files'),
					array('module_name'	=> 'formicula',
                       'table_name'		=> $pre.'formcontacts'),
					array('module_name'	=> 'iw_agendas',
                       'table_name'		=> $pre.'iw_agendas'),
					array('module_name'	=> 'iw_agendas',
                       'table_name'		=> $pre.'iw_agendas_def'),
					array('module_name'	=> 'iw_agendas',
                       'table_name'		=> $pre.'iw_agendas_subs'),
					array('module_name'	=> 'iw_bookings',
                       'table_name'		=> $pre.'iw_bookings'),
					array('module_name'	=> 'iw_bookings',
                       'table_name'		=> $pre.'iw_bookings_spaces'),
					array('module_name'	=> 'iw_books',
                       'table_name'		=> $pre.'iw_books'),
					array('module_name'	=> 'iw_books',
                       'table_name'		=> $pre.'iw_books_materies'),
					array('module_name'	=> 'iw_chat',
                       'table_name'		=> $pre.'iw_chat_rooms'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms_def'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms_cat'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms_note'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms_note_def'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms_validator'),
					array('module_name'	=> 'iw_forms',
                       'table_name'		=> $pre.'iw_forms_group'),
					array('module_name'	=> 'iw_forums',
                       'table_name'		=> $pre.'iw_forums_def'),
					array('module_name'	=> 'iw_forums',
                       'table_name'		=> $pre.'iw_forums_temes'),
					array('module_name'	=> 'iw_forums',
                       'table_name'		=> $pre.'iw_forums_msg'),
					array('module_name'	=> 'iw_jclic',
                       'table_name'		=> $pre.'iw_jclic'),
					array('module_name'	=> 'iw_jclic',
                       'table_name'		=> $pre.'iw_jclic_activities'),
					array('module_name'	=> 'iw_jclic',
                       'table_name'		=> $pre.'iw_jclic_sessions'),
					array('module_name'	=> 'iw_jclic',
                       'table_name'		=> $pre.'iw_jclic_groups'),
					array('module_name'	=> 'iw_jclic',
                       'table_name'		=> $pre.'iw_jclic_users'),
					array('module_name'	=> 'iw_jclic',
                       'table_name'		=> $pre.'iw_jclic_settings'),
					array('module_name'	=> 'iw_main',
                       'table_name'		=> $pre.'iw_main'),
					array('module_name'	=> 'iw_menu',
                       'table_name'		=> $pre.'iw_menu'),
					array('module_name'	=> 'iw_messages',
                       'table_name'		=> $pre.'iw_messages'),
					array('module_name'	=> 'iw_moodle',
                       'table_name'		=> $pre.'iw_moodle'),
					array('module_name'	=> 'iw_noteboard',
                       'table_name'		=> $pre.'iw_noteboard'),
					array('module_name'	=> 'iw_noteboard',
                       'table_name'		=> $pre.'iw_noteboard_topics'),
					array('module_name'	=> 'iw_noteboard',
                       'table_name'		=> $pre.'iw_noteboard_public'),
					array('module_name'	=> 'iw_qv',
                       'table_name'		=> $pre.'iw_qv'),
					array('module_name'	=> 'iw_qv',
                       'table_name'		=> $pre.'iw_qv_assignments'),
					array('module_name'	=> 'iw_qv',
                       'table_name'		=> $pre.'iw_qv_sections'),
					array('module_name'	=> 'iw_qv',
                       'table_name'		=> $pre.'iw_qv_messages'),
					array('module_name'	=> 'iw_qv',
                       'table_name'		=> $pre.'iw_qv_messages_read'),
					array('module_name'	=> 'iw_timeframes',
                       'table_name'		=> $pre.'iw_timeframes_def'),
					array('module_name'	=> 'iw_timeframes',
                       'table_name'		=> $pre.'iw_timeframes'),
					array('module_name'	=> 'iw_users',
                       'table_name'		=> $pre.'iw_users'),
					array('module_name'	=> 'iw_users',
                       'table_name'		=> $pre.'iw_users_import'),
					array('module_name'	=> 'iw_users',
                       'table_name'		=> $pre.'iw_users_aux'),
					array('module_name'	=> 'iw_users',
                       'table_name'		=> $pre.'iw_users_friends'),
					array('module_name'	=> 'iw_vhmenu',
                       'table_name'		=> $pre.'iw_vhmenu'),
					array('module_name'	=> 'iw_webbox',
                       'table_name'		=> $pre.'iw_webbox'),
					array('module_name'	=> 'mymap',
                       'table_name'		=> $pre.'mymap'),
					array('module_name'	=> 'mymap',
                       'table_name'		=> $pre.'mymap_markers'),
					array('module_name'	=> 'mymap',
                       'table_name'		=> $pre.'mymap_waypoints'),
					array('module_name'	=> 'news',
                       'table_name'		=> $pre.'news'),
					array('module_name'	=> 'pages',
                       'table_name'		=> $pre.'pages'),
					array('module_name'	=> 'pendingcontent',
                       'table_name'		=> $pre.'pendingcontent'),
					array('module_name'	=> 'Profile',
                       'table_name'		=> $pre.'user_property'),
					array('module_name'	=> 'Profile',
                       'table_name'		=> $pre.'user_data'),
					array('module_name'	=> 'Quotes',
                       'table_name'		=> $pre.'quotes'),
					array('module_name'	=> 'ratings',
                       'table_name'		=> $pre.'ratings'),
					array('module_name'	=> 'ratings',
                       'table_name'		=> $pre.'ratingslog'),
					array('module_name'	=> 'Referers',
                       'table_name'		=> $pre.'referer'),
					array('module_name'	=> 'Reviews',
                       'table_name'		=> $pre.'reviews'),
					array('module_name'	=> 'scribite',
                       'table_name'		=> $pre.'scribite'),
					array('module_name'	=> 'Stats',
                       'table_name'		=> $pre.'counter'),
					array('module_name'	=> 'Stats',
                       'table_name'		=> $pre.'stats_date'),
					array('module_name'	=> 'Stats',
                       'table_name'		=> $pre.'stats_hour'),
					array('module_name'	=> 'Stats',
                       'table_name'		=> $pre.'stats_week'),
					array('module_name'	=> 'Stats',
                       'table_name'		=> $pre.'stats_month'),
					array('module_name'	=> 'Web_links',
                       'table_name'		=> $pre.'links_categories'),
					array('module_name'	=> 'Web_links',
                       'table_name'		=> $pre.'links_links'),
					array('module_name'	=> 'Web_links',
                       'table_name'		=> $pre.'links_modrequest'),
					array('module_name'	=> 'Web_links',
                       'table_name'		=> $pre.'links_newlink'),
					array('module_name'	=> 'Web_links',
                       'table_name'		=> $pre.'links_votedata'));
                       
	DBUtil::insertObjectArray($obj, 'export_tables');
				   
    // Set up config variables
    pnModSetVar('export', 'backup_folder', '');
    // Set if only one user can import packages (blank is everybody)
    pnModSetVar('export', 'import_user', '');

    // Initialisation successful
    return true;
}


/**
 * Upgrade the Export module to new version
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return bool true if successful, false otherwise
 */
function Export_upgrade($oldversion)
{
    /*if (!DBUtil::changeTable('export')) {
        return false;
    }*/

    // Upgrade dependent on old version number
    /*switch($oldversion) {
        case 1.2:
            // version 1.2 shipped with postnuke .72x/.75
            pnModSetVar('Ephemerids', 'itemsperpage', 25);
            break;
    }*/

    // upgrade success
    return true;
}


/**
 * Delete the Export module
 * @author Felix Casanellas (felix.casanellas@gmail.com)
 * @return bool true if successful, false otherwise
 */
function Export_delete()
{
    if (!DBUtil::dropTable('export_routes')) {
        return false;
    }
    
    if (!DBUtil::dropTable('export_tables')) {
        return false;
    }

    // Delete module variables
    pnModDelVar('backup_folder');
    pnModDelVar('import_user');

    // Deletion successful
    return true;
}
