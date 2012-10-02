<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnuserapi.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Get an user files information
 * @author:    Albert Pérez Monfort
 * @param:     UserId
 * @return:	   And array with the users
*/
function Files_userapi_get($args)
{
    $dom = ZLanguage::getModuleDomain('Files');
    $userId = (isset($args['userId'])) ? $args['userId'] : pnUserGetVar('uid');
    // security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }
    $item = DBUtil::selectObjectByID('Files', $userId, 'userId');    
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
    return $item;
}

/**
 * Create user files info
 * @author:    Albert Pérez Monfort
 * @return:	   And a new row to table for the user
*/
function Files_userapi_createUserFilesInfo()
{
    $dom = ZLanguage::getModuleDomain('Files');
    // security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }
    $uid = pnUserGetVar('uid');
    // check if user exists. If not create it
    if(!pnModAPIFunc('Files', 'user', 'get', array('userId' => $uid))){
        // get user disk quota
        $diskQuota = pnModFunc('Files', 'user', 'getUserQuota', array('userId' => $uid));
        // create record for the user
        $item = array('userId' => DataUtil::formatForStore($uid),
                        'quota' => DataUtil::formatForStore($diskQuota));
        if (!DBUtil::insertObject($item, 'Files')) {
            return LogUtil::registerError (__('Error! Could not create the new item.', $dom));
        }
    }
    return true;
}

/**
 * update the used disk for the user
 * @author:    Albert Pérez Monfort
 * @return:	   True if success and false otherwise
*/
function Files_userapi_updateUsedSpace()
{
    $dom = ZLanguage::getModuleDomain('Files');
    // security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }
    // get user used space
    $usedSpace = pnModAPIFunc('Files', 'user', 'get');
    if(!$usedSpace){
        // user row doesn't exists and it is created
        pnModAPIFunc('Files', 'user', 'createUserFilesInfo');        
    }
    
    $initFolderPath = pnModFunc('Files', 'user', 'getInitFolderPath');
    $spaceUsed = pnModAPIFunc('Files', 'user', 'calcUsedSpace', array('folderToCalc' => $initFolderPath));
    $item = array('diskUse' => DataUtil::formatForStore($spaceUsed));
	$pntable =& pnDBGetTables();
	$c = $pntable['Files_column'];
	$where = "$c[userId]=" . pnUserGetVar('uid');
	if (!DBUtil::updateObject($item, 'Files', $where, 'fileId')) {
		return LogUtil::registerError (__('Error! Could not update the used disk.'), $dom);
	}
    // Let the calling process know that we have finished successfully
	return true;
}

/**
 * calc the bytes that the user has used
 * @author:    Albert Pérez Monfort
 * @param:     directory where it is necessary to begin the calc
 * @return:	   The number of used bytes
*/
function Files_userapi_calcUsedSpace($args)
{
	$folderToCalc = FormUtil::getPassedValue('folderToCalc', isset($args['folderToCalc']) ? $args['folderToCalc'] : null, 'POST');
	if (!SecurityUtil::checkPermission('Files::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}
	if ($handle = opendir($folderToCalc)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {				
				if ($dir. "/" . $file) {
					$array_items +=  filesize($folderToCalc . "/" . $file);	
					$file = $folderToCalc . "/" . $file;
					$array_items = $array_items + pnModAPIFunc('Files', 'user', 'calcUsedSpace', array('folderToCalc' => $file));
				}
			}
            if($array_items > 209715200) {
                break;
            }
		}
		closedir($handle);
	}
	return $array_items;
}