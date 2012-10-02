<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnajax.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * show the form needed to create a new directory
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:		folder name
 * @return:		form content
*/
function Files_ajax_createDir($args)
{
    $folder = FormUtil::getPassedValue('folder', -1, 'POST');
    $external = FormUtil::getPassedValue('external', -1, 'POST');
    
    $dom = ZLanguage::getModuleDomain('Files');
	if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
	}
	if ($folder == -1) {
		AjaxUtil::error(__('No folder defined.', $dom));
	}
    $content = pnModFunc('Files', 'user', 'createDirForm', array('folder' => $folder,
                                                                    'external' => $external));
    AjaxUtil::output(array('content' => $content));
}

/**
 * show the form needed to upload a file into a folder
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:		folder where to upload the file
 * @return:		form content
*/
function Files_ajax_uploadFile($args)
{
    $folder = FormUtil::getPassedValue('folder', -1, 'POST');
    $external = FormUtil::getPassedValue('external', -1, 'POST');
    
    $dom = ZLanguage::getModuleDomain('Files');
	if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
	}
	if ($folder == -1) {
		AjaxUtil::error(__('No folder defined.', $dom));
	}
    $content = pnModFunc('Files', 'user', 'uploadFileForm', array('folder' => $folder,
																	'external' => $external));
    AjaxUtil::output(array('content' => $content));
}

/**
 * shows the form to define a new group quota
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:		new quota form
*/
function Files_ajax_newGroupQuota()
{
	if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
	}
    $content = pnModFunc('Files', 'admin', 'newGroupQuotaForm');
    AjaxUtil::output(array('content' => $content));
}

/**
 * create a new quota assignment for a group
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:      group identity
 * @param:      disk quota value
 * @return:		quotas table content
*/
function Files_ajax_createGroupQuota($args)
{
    $dom = ZLanguage::getModuleDomain('Files');
	if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
	}
    $gid = FormUtil::getPassedValue('gid', -1, 'GET');
	if ($gid == -1) {
		AjaxUtil::error(__('no group found', $dom));
	}
    $quota = FormUtil::getPassedValue('quota', -10, 'GET');
	if ($quota == -10) {
		AjaxUtil::error(__('no quota defined', $dom));
	}
    if(is_numeric($gid) && is_numeric($quota)){
        //create a new assignament for a disk quote
        $data = array('gid' => $gid, 'quota' => $quota);
        $assignments = unserialize(pnModGetVar('Files', 'groupsQuota'));
        if($assignments == ''){
            $assignments = array();
        }        
        array_push($assignments, $data);
        $data = serialize($assignments);
        pnModSetVar('Files', 'groupsQuota', $data);
    }
    $content = pnModFunc('Files', 'admin', 'getQuotasTable');
    AjaxUtil::output(array('content' => $content));
}

/**
 * delete a quota assigned to a group
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:      group identity
 * @return:		quotas table content
*/
function Files_ajax_deleteGroupQuota($args)
{
    $dom = ZLanguage::getModuleDomain('Files');
	if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
	}
    $gid = FormUtil::getPassedValue('gid', -1, 'GET');
	if ($gid == -1) {
		AjaxUtil::error(__('no group found', $dom));
	}
    if(is_numeric($gid)){
        $assignaments = unserialize(pnModGetVar('Files', 'groupsQuota'));
        $assignamentsArray = array();
        foreach($assignaments as $assign){
            if($assign['gid'] != $gid){
                $assignamentsArray[] = array('gid' => $assign['gid'],
                                               'quota' => $assign['quota']);
            }
        }
        $data = serialize($assignamentsArray);
        pnModSetVar('Files', 'groupsQuota', $data);
    }
    $content = pnModFunc('Files', 'admin', 'getQuotasTable');
    AjaxUtil::output(array('content' => $content));
}

function Files_ajax_externalModifyImg($args){
    $dom = ZLanguage::getModuleDomain('Files');
	if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
		AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
	}
    $image = FormUtil::getPassedValue('image', -1, 'GET');
	if ($image == -1) {
		AjaxUtil::error(__('no image found', $dom));
	}
    $factor = FormUtil::getPassedValue('factor', -1, 'GET');
	if ($factor == -1) {
		AjaxUtil::error(__('no size factor defined', $dom));
	}
    $folderName = FormUtil::getPassedValue('folder', -1, 'GET');
	if ($folderName == -1) {
		AjaxUtil::error(__('No folder defined.', $dom));
	}
    $action = FormUtil::getPassedValue('action', -1, 'GET');

    $folderPath = (SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) ? $folderName : pnModGetVar('Files', 'usersFolder') . '/' . strtolower(substr(pnUserGetVar('uname'), 0 , 1)) . '/' . pnUserGetVar('uname') . '/' .$folderName;
    // gets root folder for the user
    $initFolderPath = pnModFunc('Files', 'user', 'getInitFolderPath');
    list($width, $height) = getimagesize($initFolderPath . '/' . $folderName . '/' . $image);

    $factor = ($action == 'increase') ? round($factor / 1.2, 2) : round($factor * 1.2, 2);

    $newWidth = floor($width / $factor);
    $newHeight = floor($height / $factor);

    // create output object
    $file = array('name' => $image,
                    'width' => $width,
                    'viewWidth' => $newWidth,
                    'viewHeight' => $newHeight,
                    'height' => $height,
                    'factor' => $factor);
    // create new thumbnail
    pnModFunc('Files', 'user', 'thumbnail',
            array('fileName' => $image,
                  'folder' => $folderName,
                  'newWidth' => $newWidth,
                  'fromAjax' => 1));
    $pnRender = pnRender::getInstance('Files', false);
    $pnRender -> assign('file',  $file);
    $pnRender -> assign('folderPath',  $folderPath);
    $pnRender -> assign('folderName',  $folderName);
    $content = $pnRender -> fetch('Files_external_getFilesImgContent.htm');
    AjaxUtil::output(array('image' => $image,
                            'content' => $content));
}
