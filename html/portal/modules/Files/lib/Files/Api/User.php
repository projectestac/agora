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

class Files_Api_User extends Zikula_AbstractApi
{
    /**
     * Get an user files information
     * @author:    Albert Pérez Monfort
     * @param:     UserId
     * @return:    And array with the users
    */
    public function get($args)
    {
        $userId = (isset($args['userId'])) ? $args['userId'] : UserUtil::getVar('uid');
        // security check
        if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }
        $item = DBUtil::selectObjectByID('Files', $userId, 'userId');
        // error message and return
        if ($item === false) {
            return LogUtil::registerError ($this->__('Error! Could not load items.'));
        }
        return $item;
    }

    /**
     * Create user files info
     * @author:    Albert Pérez Monfort
     * @return:    And a new row to table for the user
    */
    public function createUserFilesInfo()
    {
        // security check
        if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }
        $uid = UserUtil::getVar('uid');
        // check if user exists. If not create it
        if(!ModUtil::apiFunc('Files', 'user', 'get', array('userId' => $uid))){
            // get user disk quota
            $diskQuota = ModUtil::func('Files', 'user', 'getUserQuota', array('userId' => $uid));
            // create record for the user
            $item = array('userId' => DataUtil::formatForStore($uid),
                            'quota' => DataUtil::formatForStore($diskQuota));
            if (!DBUtil::insertObject($item, 'Files')) {
                return LogUtil::registerError ($this->__('Error! Could not create the new item.'));
            }
        }
        return true;
    }

    /**
     * update the used disk for the user
     * @author:    Albert Pérez Monfort
     * @return:    True if success and false otherwise
    */
    public function updateUsedSpace()
    {
        // security check
        if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }
        // get user used space
        $usedSpace = ModUtil::apiFunc('Files', 'user', 'get');
        if(!$usedSpace){
            // user row doesn't exists and it is created
            ModUtil::apiFunc('Files', 'user', 'createUserFilesInfo');
        }

        $check = ModUtil::func('Files', 'user', 'checkingModule');
        if ($check['status'] != 'ok') {
	    $this->view->assign('check', $check);
            return $this->view->fetch('Files_user_failedConf.tpl');
        }
        $initFolderPath = $check['initFolderPath'];
        $spaceUsed = ModUtil::apiFunc('Files', 'user', 'calcUsedSpace', array('folderToCalc' => $initFolderPath));
        $item = array('diskUse' => DataUtil::formatForStore($spaceUsed));
        $pntable =& DBUtil::getTables();
        $c = $pntable['Files_column'];
        $where = "$c[userId]=" . UserUtil::getVar('uid');
        if (!DBUtil::updateObject($item, 'Files', $where, 'fileId')) {
            return LogUtil::registerError ($this->__('Error! Could not update the used disk.'));
        }
        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * calc the bytes that the user has used
     * @author:    Albert Pérez Monfort
     * @param:     directory where it is necessary to begin the calc
     * @return:    The number of used bytes
    */
    public function calcUsedSpace($args)
    {
        $folderToCalc = FormUtil::getPassedValue('folderToCalc', isset($args['folderToCalc']) ? $args['folderToCalc'] : null, 'POST');
        if (!SecurityUtil::checkPermission('Files::', "::", ACCESS_ADD)) {
            return LogUtil::registerError($this->__('Sorry! No authorization to access this module.'), 403);
        }
        if ($handle = opendir($folderToCalc)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if ($dir. "/" . $file) {
                        $array_items +=  filesize($folderToCalc . "/" . $file);
                        $file = $folderToCalc . "/" . $file;
                        $array_items = $array_items + ModUtil::apiFunc('Files', 'user', 'calcUsedSpace', array('folderToCalc' => $file));
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
}