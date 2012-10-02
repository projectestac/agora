<?php
/**
 * List the files in server folder
 * @author:	Albert Pérez Monfort
 * @param:	args   the folder name where to list the files and subfolders
 * @return:	The list of files and folders
 */
function Files_external_getFiles($args)
{
    $hook = FormUtil::getPassedValue('hook', isset($args['hook']) ? $args['hook'] : 0, 'GET');
	PageUtil::AddVar('javascript', 'modules/Files/pnjavascript/getFiles.js');
    $dom = ZLanguage::getModuleDomain('Files');
    // get arguments
    $folder = FormUtil::getPassedValue('folder', isset($args['folder']) ? $args['folder'] : null, 'REQUEST');
    $folder = str_replace("|", "/", $folder);
    // security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD) || !pnUserLogin()) {
        $pnRender = pnRender::getInstance('Files', false);
        $errorMsg = __('Sorry! You have not been granted access to this page.', $dom);
        $pnRender->assign('errorMsg', $errorMsg);
        $pnRender->assign('external', 1);
        $pnRender->display('Files_user_errorMsg.htm');
        exit;
    }
    
    $oFolder = $folder;
    // gets root folder for the user
    $initFolderPath = pnModFunc('Files', 'user', 'getInitFolderPath');
    // check if the root folder exists
    if(!file_exists($initFolderPath)){
        $pnRender = pnRender::getInstance('Files', false);
        $errorMsg = __('The server directory does not exist. Contact with the website administrator to solve this problem.', $dom);
        $pnRender->assign('errorMsg',  $errorMsg);
        $pnRender->assign('external', 1);
        $pnRender->display('Files_user_errorMsg.htm');
        exit;
    }
    // protection. User can not navigate out their root folder
    if($folder == ".." || $folder == "."){
        $pnRender = pnRender::getInstance('Files', false);
        $errorMsg = __('Invalid folder', $dom) . ': ' . $folder;
        $pnRender->assign('errorMsg', $errorMsg);
        $pnRender->assign('external', 1);
        $pnRender->display('Files_user_errorMsg.htm');
        exit;
    }
    // get folder name
    $folderName = str_replace($initFolderPath . '/' , '', $folder);
    $folder = $initFolderPath . '/' .  $folder;
    // users can not browser the thumbnails folders
    if(strpos($folder, '.tbn') !== false) {
        LogUtil::registerError(__('It is not possible to browse this folder', $dom));
        return pnRedirect(pnModURL('Files', 'external', 'getFiles', array('folder' => substr($folderName, 0, strrpos($folderName, '/')))));
    }
    // needed arguments
    // check if the folder exists
    if(!file_exists($folder)){
        $pnRender = pnRender::getInstance('Files', false);
        $errorMsg = __('Invalid folder', $dom).': '.$folderName;
        $pnRender->assign('errorMsg',  $errorMsg);
        $pnRender->assign('external', 1);
        $pnRender->display('Files_user_errorMsg.htm');
        exit;
    }
    // get user's disk use
    $userDiskUse = pnModAPIFunc('Files', 'user', 'get');
    $usedSpace = $userDiskUse['diskUse'];
    // get user's allowed space
    $userAllowedSpace = pnModFunc('Files', 'user', 'getUserQuota');
    $maxDiskSpace = round($userAllowedSpace * 1024 * 1024);
    $percentage = round($usedSpace * 100 / $maxDiskSpace);
    $widthUsage = ($percentage > 100) ? 100 : $percentage;
    $usedSpaceArray = array('maxDiskSpace' => pnModFunc('Files', 'user', 'diskUseFormat',
                                                        array('value' => $maxDiskSpace)),
                            'percentage' => $percentage,
                            'usedDiskSpace' => pnModFunc('Files', 'user', 'diskUseFormat',
                                                         array('value' => $usedSpace)),
                            'widthUsage' => $widthUsage);
    // create output object
    $pnRender = pnRender::getInstance('Files', false);
    // get folder files and subfolders
    $fileList = pnModFunc('Files', 'user', 'dir_list',
                            array('folder' => $folder,
                                  'external' => 1,
                                   'hook' => $hook));
    sort($fileList[dir]);
    sort($fileList[file]);
    if(!is_writable($folder)){
        $pnRender->assign('notwriteable', true);
    }
    // check if it is a public directori
    if(!file_exists($folder.'/.locked')){
        // it is a public directori
        $is_public = true;
    }
    $pnRender->assign('publicFolder',  $is_public);
    $pnRender->assign('folderPrev', substr($folderName, 0 ,  strrpos($folderName, '/')));
    $folderPath = (SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) ? $folderName : pnModGetVar('Files', 'usersFolder') . '/' . strtolower(substr(pnUserGetVar('uname'), 0 , 1)) . '/' . pnUserGetVar('uname') . '/' .$folderName;
    $imagesArray = array();
    // get folder files and subfolders
    if(file_exists($folder . '/.tbn')) {
        $images = pnModFunc('Files', 'user', 'dir_list',
                            array('folder' => $folder . '/.tbn',
                                  'external' => 1));
        foreach($images['file'] as $file) {
            $fileExtension = FileUtil::getExtension($file['name']);
            if(in_array(strtolower($fileExtension), array('gif','png','jpg'))) {
                list($width, $height) = getimagesize($folder . '/' . $file['name']);
                list($newWidth, $newHeight) = getimagesize($folder . '/.tbn/' . $file['name']);
                $factor = round($width/$newWidth,2);
                $imagesArray[] = array('name' => $file['name'],
                                    'viewWidth' => $newWidth,
                                    'width' => $width,
                                    'viewHeight' => $newHeight,
                                    'height' => $height,
                                    'factor' => $factor);
            }
        }
    }
    $pnRender->assign('folderPath', DataUtil::formatForDisplay($folderPath));
    $pnRender->assign('folderName', DataUtil::formatForDisplay($folderName));
    $pnRender->assign('fileList', $fileList);
    $pnRender->assign('hook', $hook);
    $pnRender->assign('imagesArray', DataUtil::formatForDisplay($imagesArray));
    $pnRender->assign('usedSpace',  $usedSpaceArray);
    $pnRender->assign('pngetbaseURL',  pngetbaseURL());
    
    $pnRender->display('Files_external_getFiles.htm');
    return true;
}

