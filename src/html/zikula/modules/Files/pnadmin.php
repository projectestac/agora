<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnadmin.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */

/**
 * Give access to the administrator main page
 * @author:    Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:    The form for general configuration values of the Intraweb modules
 */
function Files_admin_main()
{
    // Security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }   
    $multisites = false;
    if($GLOBALS['PNConfig']['Multisites']['multi'] == 1){
        $multisites = true;
    }
    if($GLOBALS['PNConfig']['Multisites']['multi'] == 1){
        $siteDNS = FormUtil::getPassedValue('siteDNS', '', 'GET');
   	    $folderPath = $GLOBALS['PNConfig']['Multisites']['filesRealPath'] . '/' . $siteDNS . $GLOBALS['PNConfig']['Multisites']['siteFilesFolder'];
    }else{
        $folderPath = pnModGetVar('Files', 'folderPath');
    }
   $moduleVars = array('usersFolder' => pnModGetVar('Files', 'usersFolder'),
                       'allowedExtensions' => pnModGetVar('Files', 'allowedExtensions'),
                       'defaultQuota' => pnModGetVar('Files', 'defaultQuota'),
                       'filesMaxSize' => pnModGetVar('Files', 'filesMaxSize'),
                       'maxWidth' => pnModGetVar('Files', 'maxWidth'),
                       'maxHeight' => pnModGetVar('Files', 'maxHeight'),
                       'showHideFiles' => pnModGetVar('Files', 'showHideFiles'),
                       'editableExtensions' => pnModGetVar('Files', 'editableExtensions'));
    $fileFileInModule = false;
    $fileFileNotInRoot = false;
    // check if file file.php exists in folder modules/Files
    if(file_exists('modules/Files/file.php')){
        $fileFileInModule = true;
    }
    // check if file file.php exists in folder modules/Files
    if(!file_exists('file.php')){
        $fileFileNotInRoot = true;
    }
    // Create output object
    $pnRender = pnRender::getInstance('Files',false);
    if(!is_writable($folderPath) || !file_exists($folderPath)){
        $pnRender -> assign('folderPathProblem', true);
    }
    if(!is_writable($folderPath . '/' . $moduleVars['usersFolder']) || !file_exists($folderPath . '/' . $moduleVars['usersFolder']) || $moduleVars['usersFolder'] == ''){
        $pnRender -> assign('usersFolderProblem', true);
    }
    $quotasTable = pnModFunc('Files', 'admin', 'getQuotasTable');
    $pnRender->assign('folderPath', $folderPath);
    $pnRender->assign('multisites', $multisites);
    $pnRender->assign('quotasTable', $quotasTable);
    $pnRender->assign('moduleVars', $moduleVars);
    $pnRender->assign('fileFileInModule', $fileFileInModule);
    $pnRender->assign('fileFileNotInRoot', $fileFileNotInRoot);

    return $pnRender -> fetch('Files_admin_conf.htm');
}

/**
 * Update the module configuration
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	True if success or false in other case
 */
function Files_admin_updateconfig($args)
{
    $dom = ZLanguage::getModuleDomain('Files');
    // Get parameters from whatever input we need.
    $showHideFiles = FormUtil::getPassedValue('showHideFiles', isset($args['showHideFiles']) ? $args['showHideFiles'] : 0, 'POST');
    $folderPath = FormUtil::getPassedValue('folderPath', isset($args['folderPath']) ? $args['folderPath'] : null, 'POST');
    $usersFolder = FormUtil::getPassedValue('usersFolder', isset($args['usersFolder']) ? $args['usersFolder'] : null, 'POST');
    $allowedExtensions = FormUtil::getPassedValue('allowedExtensions', isset($args['allowedExtensions']) ? $args['allowedExtensions'] : null, 'POST');
    $defaultQuota = FormUtil::getPassedValue('defaultQuota', isset($args['defaultQuota']) ? $args['defaultQuota'] : null, 'POST');
    $filesMaxSize = FormUtil::getPassedValue('filesMaxSize', isset($args['filesMaxSize']) ? $args['filesMaxSize'] : null, 'POST');
    $maxWidth = FormUtil::getPassedValue('maxWidth', isset($args['maxWidth']) ? $args['maxWidth'] : null, 'POST');
    $maxHeight = FormUtil::getPassedValue('maxHeight', isset($args['maxHeight']) ? $args['maxHeight'] : null, 'POST');
    $editableExtensions = FormUtil::getPassedValue('editableExtensions', isset($args['editableExtensions']) ? $args['editableExtensions'] : null, 'POST');
    // Security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }
    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('Files', 'admin', 'main'));
    }
    $moduleVars = array('showHideFiles' => $showHideFiles,
                        'allowedExtensions' => $allowedExtensions,
                        'defaultQuota' => $defaultQuota,
                        'filesMaxSize' => $filesMaxSize,
                        'maxWidth' => $maxWidth,
                        'maxHeight' => $maxHeight,
                        'editableExtensions' => $editableExtensions);
    if($GLOBALS['PNConfig']['Multisites']['multi'] != 1){
        if(!file_exists($folderPath)){
            pnModSetVars('Files', $moduleVars);
            LogUtil::registerError (__f('The directory <strong>%s</strong> does not exist', $folderPath, $dom));
            return pnRedirect(pnModURL('Files', 'admin', 'main'));
        }
        $folderPath = (substr($folderPath, -1) == '/') ? substr($folderPath, 0, strlen($folderPath) - 1) : $folderPath;
        $moduleVars['folderPath'] = $folderPath;
    }else{
        $folderPath = pnModGetVar('Files', 'folderPath');
    }
    
    if(!file_exists($folderPath . '/' . $usersFolder) || $usersFolder == '' || $usersFolder == null){
        pnModSetVars('Files', $moduleVars);
        LogUtil::registerError (__f('The directory <strong>%s</strong> for users does not exist', $usersFolder, $dom));
        return pnRedirect(pnModURL('Files', 'admin', 'main'));
    }
    $usersFolder = (substr($usersFolder, -1) == '/') ? substr($usersFolder, 0, strlen($usersFolder) - 1) : $usersFolder;
    $usersFolder = (substr($usersFolder, 0, 1) == '/') ? substr($usersFolder, 1, strlen($usersFolder)) : $usersFolder;
    $moduleVars['usersFolder'] = $usersFolder;
    pnModSetVars('Files', $moduleVars);
    LogUtil::registerStatus (__('The configuration has been updated', $dom));    
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Files', 'admin', 'main'));
}

/**
 * get form to create a new quota
 * @author:    Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:    The form fields
 */
function Files_admin_newGroupQuotaForm($args)
{
    // Security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }
    // get all the available groups
    $groups = pnModAPIFunc('Groups', 'user', 'getall');
    $groupsQuotas = pnModGetVar('Files', 'groupsQuota');
    $groupsQuotas = unserialize($groupsQuotas);
    foreach($groupsQuotas as $quota){
        $groupsQuotasArray[$quota['gid']] = array('gid' => $quota['gid'],
                                                    'quota' => $quota['quota']);
    }
    foreach($groups as $group){
        if(!array_key_exists($group['gid'], $groupsQuotasArray)){
            $groupsArray[] = array('name' => $group['name'],
                                    'gid' => $group['gid']);
        }
    }
    // create output object
    $pnRender = pnRender::getInstance('Files',false);
    $pnRender -> assign('groups', $groupsArray);
    return $pnRender -> fetch('Files_admin_newQuotaForm.htm');
}

/**
 * get the table of quotas in configuration pannel
 * @author:    Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:    The table of quotas fields
 */
function Files_admin_getQuotasTable()
{
    // Security check
    if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }
    $groupsQuotas = pnModGetVar('Files', 'groupsQuota');
    $groupsQuotas = unserialize($groupsQuotas);
    $i = 0;
    foreach($groupsQuotas as $group){
        if($group['gid'] > 0){
            // get group name
            $grupValues = pnModAPIFunc('Groups', 'user', 'get', array('gid' => $group['gid']));
            $groupsQuotas[$i]['name'] = $grupValues['name'];
            $i++;
        }
    }
    // sort the array using the field name
    foreach($groupsQuotas as $key => $row){
        $name[$key] = $row['name'];
    }
    array_multisort($name, SORT_ASC,$groupsQuotas);
    // Create output object
    $pnRender = pnRender::getInstance('Files',false);
    if(count(pnModAPIFunc('Groups', 'user', 'getall')) == $i){
        $pnRender -> assign('noMoreGroups', true);
    }
    $pnRender -> assign('groupsQuotas', $groupsQuotas);
    return $pnRender -> fetch('Files_admin_quotasTable.htm'); 
}
