<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnajax.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.l
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */
class Files_Controller_Ajax extends Zikula_AbstractController
{
    /**
     * shows the form to define a new group quota
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:     new quota form
    */
    public function newGroupQuota()
    {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        $content = ModUtil::func('Files', 'admin', 'newGroupQuotaForm');
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * create a new quota assignment for a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      group identity
     * @param:      disk quota value
     * @return:     quotas table content
    */
    public function createGroupQuota($args)
    {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        $gid = FormUtil::getPassedValue('gid', -1, 'GET');
        if ($gid == -1) {
            AjaxUtil::error($this->__('no group found'));
        }
        $quota = FormUtil::getPassedValue('quota', -10, 'GET');
        if ($quota == -10) {
            AjaxUtil::error($this->__('no quota defined'));
        }
        if(is_numeric($gid) && is_numeric($quota)){
            //create a new assignament for a disk quote
            $data = array('gid' => $gid,
                          'quota' => $quota);
            $assignments = unserialize(ModUtil::getVar('Files', 'groupsQuota'));
            if($assignments == ''){
                $assignments = array();
            }
            array_push($assignments, $data);
            $data = serialize($assignments);
            ModUtil::setVar('Files', 'groupsQuota', $data);
        }
        $content = ModUtil::func('Files', 'admin', 'getQuotasTable');
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * delete a quota assigned to a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      group identity
     * @return:     quotas table content
    */
    public function deleteGroupQuota($args)
    {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        $gid = FormUtil::getPassedValue('gid', -1, 'GET');
        if ($gid == -1) {
            AjaxUtil::error($this->__('no group found'));
        }
        if(is_numeric($gid)){
            $assignaments = unserialize(ModUtil::getVar('Files', 'groupsQuota'));
            $assignamentsArray = array();
            foreach($assignaments as $assign){
                if($assign['gid'] != $gid){
                    $assignamentsArray[] = array('gid' => $assign['gid'],
                                                 'quota' => $assign['quota']);
                }
            }
            $data = serialize($assignamentsArray);
            ModUtil::setVar('Files', 'groupsQuota', $data);
        }
        $content = ModUtil::func('Files', 'admin', 'getQuotasTable');
        AjaxUtil::output(array('content' => $content));
    }
    /**
     * show the form needed to create a new directory
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      folder name
     * @return:     form content
    */
    public function createDir($args)
    {
        $folder = FormUtil::getPassedValue('folder', -1, 'POST');
        $external = FormUtil::getPassedValue('external', -1, 'POST');

        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        if ($folder == -1) {
            AjaxUtil::error($this->__('No folder defined.'));
        }
        $content = ModUtil::func('Files', 'user', 'createDirForm',
                                  array('folder' => $folder,
                                        'external' => $external));
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * show the form needed to upload a file into a folder
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      folder where to upload the file
     * @return:     form content
    */
    public function uploadFile($args)
    {
        $folder = FormUtil::getPassedValue('folder', -1, 'POST');
        $external = FormUtil::getPassedValue('external', -1, 'POST');

        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        if ($folder == -1) {
            AjaxUtil::error($this->__('No folder defined.'));
        }
        $content = ModUtil::func('Files', 'user', 'uploadFileForm',
                                  array('folder' => $folder,
                                        'external' => $external));
        AjaxUtil::output(array('content' => $content));
    }

    public function externalModifyImg($args){
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML(_MODULENOAUTH));
        }
        $image = FormUtil::getPassedValue('image', -1, 'GET');
        if ($image == -1) {
            AjaxUtil::error($this->__('no image found'));
        }
        $factor = FormUtil::getPassedValue('factor', -1, 'GET');
        if ($factor == -1) {
            AjaxUtil::error($this->__('no size factor defined'));
        }
        $folderName = FormUtil::getPassedValue('folder', -1, 'GET');
        if ($folderName == -1) {
            AjaxUtil::error($this->__('No folder defined.'));
        }
        $action = FormUtil::getPassedValue('action', -1, 'GET');

        $folderPath = (SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) ? $folderName : ModUtil::getVar('Files', 'usersFolder') . '/' . strtolower(substr(UserUtil::getVar('uname'), 0 , 1)) . '/' . UserUtil::getVar('uname') . '/' . $folderName;
        // gets root folder for the user
        $initFolderPath = ModUtil::func('Files', 'user', 'getInitFolderPath');
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
        ModUtil::func('Files', 'user', 'thumbnail',
                       array('fileName' => $image,
                             'folder' => $folderName,
                             'newWidth' => $newWidth,
                             'fromAjax' => 1));
        $this->view->setCaching(false);
        $this->view->assign('file',  $file);
        $this->view->assign('folderPath',  $folderPath);
        $this->view->assign('folderName',  $folderName);
        $this->view->assign('hook',  0);
        $content = $this->view->fetch('Files_external_getFilesImgContent.tpl');
        AjaxUtil::output(array('image' => $image,
                               'content' => $content));
    }
}