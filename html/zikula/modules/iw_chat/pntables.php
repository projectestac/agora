<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pntables.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Forums
 */

/**
 * Define module tables
 * @author Fèlix Casanellas (fcasanel@xtec.cat)
 * @return module tables information
 */

function iw_chat_pntables()
{
	// Initialise table array
	$pntable = array();
		
	// iw_chat_rooms table definition
	$pntable['iw_chat_rooms'] = DBUtil::getLimitedTablename('iw_chat_rooms');

	//fields
	$pntable['iw_chat_rooms_column'] = array('rid' => 'iw_rid',
                                             'room_name' => 'iw_room_name',
                                             'room_desc' => 'iw_room_desc',
                                             'groups' => 'iw_groups',
                                             'active' => 'iw_active');

	$pntable['iw_chat_rooms_column_def'] = array('rid' => "INT(10) NOTNULL AUTOINCREMENT KEY",
                                                 'room_name' => "VARCHAR(50) NOTNULL DEFAULT ''",
                                                 'room_desc' => "VARCHAR(255) NOTNULL DEFAULT ''",
                                                 'groups' => "LONGTEXT NOTNULL DEFAULT ''",
                                                 'active' => "TINYINT(1) NOTNULL DEFAULT '0'");

    // iw_chat_msg table definition
    $pntable['iw_chat_msg'] = DBUtil::getLimitedTablename('iw_chat_msg');

    //fields
    $pntable['iw_chat_msg_column'] = array('server' => 'server',
                                           'group' => 'group',
                                           'subgroup' => 'subgroup',
                                           'leaf' => 'leaf',
                                           'leafvalue' => 'leafvalue',
                                           'timestamp' => 'timestamp');

    $pntable['iw_chat_msg_column_def'] = array('server' => "VARCHAR(32) NOTNULL DEFAULT ''",
                                               'group' => "VARCHAR(64) NOTNULL DEFAULT ''",
                                               'subgroup' => "VARCHAR(128) NOTNULL DEFAULT ''",
                                               'leaf' => "VARCHAR(128) NOTNULL DEFAULT ''",
                                               'leafvalue' => "TEXT NOTNULL",
                                               'timestamp' => "INT(11) NOTNULL DEFAULT'0'");

    //Retorna la informaciï¿œ de la taula
    return $pntable;
}
