<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Webbox
 */

/**
 * Initialise the iw_vhmenu module creating module tables and module vars
 * @author Albert Perez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_menu_init()
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Checks if module iw_main is installed. If not returns error
	$modid = pnModGetIDFromName('iw_main');
	$modinfo = pnModGetInfo($modid);
	
	if ($modinfo['state'] != 3) {
		return LogUtil::registerError (__('Module iw_main is needed. You have to install the iw_main module previously to install it.', $dom));
	}
	
	// Check if the version needed is correct
	$versionNeeded = '2.0';
	if (!pnModFunc('iw_main', 'admin', 'checkVersion',
                    array('version' => $versionNeeded))) {
		return false;
	}

	// Create module table
	if (!DBUtil::createTable('iw_menu')) return false;

	//Create indexes
	$pntable = pnDBGetTables();
	$c = $pntable['iw_menu_column'];
	if (!DBUtil::createIndex($c['id_parent'],'iw_menu', 'id_parent')) return false;	
	
	//Create module vars
	pnModSetVar('iw_menu', 'height', 26);// Default height
	pnModSetVar('iw_menu', 'width', 200);// Default width
	pnModSetVar('iw_menu', 'imagedir', "menu");// Default directori of menu images
	
	// checks if module vhmenu exists. If it exists import module vhmenu tables
	$modid = pnModGetIDFromName('iw_vhmenu');
    $modinfo = pnModGetInfo($modid);
    if ($modinfo['state'] == 3) {
        // get the objects from the db
        pnModLoad('iw_vhmenu', 'user');
        $items = DBUtil::selectObjectArray('iw_vhmenu');                    
        if ($items) {
        	foreach ($items as $item) {
        		$groups = str_replace('|0', '', $item['groups']);
        		$groups = substr($groups, 1 , strlen($groups));
        		
        		//Change iw_vhmenu item for iw_menu
        		$vhmenu_start = strpos($item['url'], 'vhmenu');
        		if($vhmenu_start !== false){
					$item['url'] = substr_replace  ($item['url'], 'menu', $vhmenu_start, 6);				
        		}
        		
                $itemArray = array('text' => $item['text'],
                                   'url' => $item['url'],
		                           'icon' => '',
		                           'id_parent' => $item['id_parent'],
		                           'groups' => $groups,
		                           'active' => $item['active'],
		                           'target' => $item['target'],
		                           'descriu' => $item['descriu']);

                DBUtil::insertObject($itemArray, 'iw_menu', 'mid');
        	}
        }
    }
    
	return true;
}

/**
 * Delete the iw_menu module
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_menu_delete()
{
	// Delete module table
	DBUtil::dropTable('iw_menu');

	//Delete module vars
	pnModDelVar('iw_menu', 'height');
	pnModDelVar('iw_menu', 'width');	
	pnModDelVar('iw_menu', 'imagedir');

	//Deletion successfull
	return true;
}

/**
 * Update the iw_menu module
 * @author Albert Perez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function iw_menu_upgrade($oldversion)
{
	return true;
}
