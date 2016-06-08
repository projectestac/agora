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
class Files_Controller_Ajax extends Zikula_AbstractController {

    /**
     * shows the form to define a new group quota
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:     new quota form
     */
    public function newGroupQuota() {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $content = ModUtil::func('Files', 'admin', 'newGroupQuotaForm');
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * create a new quota assignment for a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      group identity
     * @param:      disk quota value
     * @return:     quotas table content
     */
    public function createGroupQuota($args) {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $gid = $this->request->getPost()->get('gid', '');
        if (!$gid) {
            throw new Zikula_Exception_Fatal($this->__('no group found'));
        }

        $quota = $this->request->getPost()->get('quota', '');
        if (!$quota) {
            throw new Zikula_Exception_Fatal($this->__('no quota defined'));
        }


        if (is_numeric($gid) && is_numeric($quota)) {
            //create a new assignament for a disk quote
            $data = array('gid' => $gid,
                'quota' => $quota);
            $assignments = unserialize(ModUtil::getVar('Files', 'groupsQuota'));
            if ($assignments == '') {
                $assignments = array();
            }
            array_push($assignments, $data);
            $data = serialize($assignments);
            ModUtil::setVar('Files', 'groupsQuota', $data);
        }
        $content = ModUtil::func('Files', 'admin', 'getQuotasTable');
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * delete a quota assigned to a group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      group identity
     * @return:     quotas table content
     */
    public function deleteGroupQuota($args) {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $gid = $this->request->getPost()->get('gid', '');
        if (!$gid) {
            throw new Zikula_Exception_Fatal($this->__('no group found'));
        }

        if (is_numeric($gid)) {
            $assignaments = unserialize(ModUtil::getVar('Files', 'groupsQuota'));
            $assignamentsArray = array();
            foreach ($assignaments as $assign) {
                if ($assign['gid'] != $gid) {
                    $assignamentsArray[] = array('gid' => $assign['gid'],
                        'quota' => $assign['quota']);
                }
            }
            $data = serialize($assignamentsArray);
            ModUtil::setVar('Files', 'groupsQuota', $data);
        }
        $content = ModUtil::func('Files', 'admin', 'getQuotasTable');
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * show the form needed to create a new directory
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      folder name
     * @return:     form content
     */
    public function createDir($args) {
        $folder = $this->request->getPost()->get('folder', '');
        $external = $this->request->getPost()->get('external', '');
        $editor = $this->request->getPost()->get('editor', '');
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $content = ModUtil::func('Files', 'user', 'createDirForm', array('folder' => $folder,
                    'external' => $external,
                    'editor' => $editor));

        // XTEC ************ AFEGIT - Don't allow directori creation in read only mode
        // 2016.06.17 @aginard
        if (ModUtil::getVar('IWmain', 'readonly') == 1) {
            $content = '<div style="color:red; padding:20px;">La Intraweb es troba en mode de només lectura</div>';
        }
        // ************ FI

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * show the form needed to upload a file into a folder
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:      folder where to upload the file
     * @return:     form content
     */
    public function uploadFile($args) {
        $folder = $this->request->getPost()->get('folder', '');
        $external = $this->request->getPost()->get('external', '');
        $editor = $this->request->getPost()->get('editor', '');

        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }
        $content = ModUtil::func('Files', 'user', 'uploadFileForm', array('folder' => $folder,
                    'external' => $external,
                    'editor' => $editor));

        // XTEC ************ AFEGIT - Don't allow directori creation in read only mode
        // 2016.06.17 @aginard
        if (ModUtil::getVar('IWmain', 'readonly') == 1) {
            $content = '<div style="color:red; padding:20px;">La Intraweb es troba en mode de només lectura</div>';
        }
        // ************ FI

        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    public function externalModifyImg($args) {
        if (!SecurityUtil::checkPermission('Files::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $factor = $this->request->getPost()->get('factor', '');
        if (!$factor) {
            throw new Zikula_Exception_Fatal($this->__('no size factor defined'));
        }
        $editor = $this->request->getPost()->get('editor', '');
        $image = $this->request->getPost()->get('image', '');
        if (!$image) {
            throw new Zikula_Exception_Fatal($this->__('no image found'));
        }

        $folderName = $this->request->getPost()->get('folder', '');
        if (!$folderName) {
            throw new Zikula_Exception_Fatal($this->__('No folder defined.'));
        }

        $action = $this->request->getPost()->get('action', '');
        if (!$action) {
            throw new Zikula_Exception_Fatal($this->__('No action defined.'));
        }

        $folderPath = (SecurityUtil::checkPermission('Files::', '::', ACCESS_ADMIN)) ? $folderName : ModUtil::getVar('Files', 'usersFolder') . '/' . strtolower(substr(UserUtil::getVar('uname'), 0, 1)) . '/' . UserUtil::getVar('uname') . '/' . $folderName;
        // gets root folder for the user
        $check = ModUtil::func('Files', 'user', 'checkingModule');
        if ($check['status'] != 'ok') {
	    $this->view->assign('check', $check);
            return $this->view->fetch('Files_user_failedConf.tpl');
        }
        $initFolderPath = $check['initFolderPath'];
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
        ModUtil::func('Files', 'user', 'thumbnail', array('fileName' => $image,
            'folder' => $folderName,
            'newWidth' => $newWidth,
            'fromAjax' => 1));
        
        $view = Zikula_View::getInstance($this->name);
        $this->view->setCaching(false);
        
        $this->view->assign('file', $file);
        $this->view->assign('folderPath', $folderPath);
        $this->view->assign('folderName', $folderName);
        $this->view->assign('hook', 0);
        $this->view->assign('editor',$editor);
        $content = $this->view->fetch('Files_external_getFilesImgContent.tpl');
        return new Zikula_Response_Ajax(array('image' => $image,
                    'content' => $content,
                ));
    }

}